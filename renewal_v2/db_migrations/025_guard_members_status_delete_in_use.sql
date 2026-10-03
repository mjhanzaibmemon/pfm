-- ─────────────────────────────────────────────────────────────────
-- Migration 025: a Membership Status cannot be deleted while records
--                are still assigned to it
--
-- Context
-- -------
-- On 2026-10-02 05:07:54 the "Renewing Active" status (memb_status_id = 9)
-- was deleted through "Membership Status (Email)" (form_members_status),
-- whose red Delete button sits next to Save and only asks a browser
-- "Do you really want to delete the record?". The row looked unused (empty
-- Subject/Message) but 1,283 customers still pointed at it; they lost their
-- label, and saving such a customer wrote 0/1 instead (investigation:
-- larissa_rebuild.md, 2026-10-02). Nothing in the database stopped it.
--
-- Larissa approved "Option A" on 2026-10-03: preventing deletion of a status
-- when customers are currently assigned to it, as long as she can still edit
-- the Subject and Message wording.
--
-- What this does
-- --------------
-- A BEFORE DELETE trigger on members_status. If any customer (clients) or
-- legacy application (clients_app — the "Requests" grid reads those labels
-- too) still has that memb_status_id, the DELETE is rejected with a readable
-- message (SQLSTATE 45000, shown by ScriptCase as the error text).
--   • UPDATE is untouched, so Subject / Message / status name edits still
--     work (the separate BEFORE UPDATE trigger members_status_prevent_broken_link
--     from migration 017 is not affected).
--   • A status that nobody uses can still be deleted.
--   • A multi-row DELETE fails as a whole (InnoDB statement rollback).
--
-- Known limit (documented, not built): a status that code looks up BY NAME
-- (grid_vw_clients_main_member_renew uses status = 'Renewing Active') could
-- still be deleted at a moment when no customer happens to hold it. If
-- Larissa wants that closed too, protect those statuses by name/id — her call.
--
-- Run as an admin user (the trigger is created with the DEFINER of whoever
-- runs this). Staging-tested before production, see
-- NEW_CUSTOMER_APPLICATION_SPEC.md 13.31.
-- ─────────────────────────────────────────────────────────────────

-- Re-running: DROP TRIGGER IF EXISTS first (Muhammad runs this one himself).
DROP TRIGGER IF EXISTS `pfm`.`members_status_prevent_delete_in_use`;

DELIMITER //

CREATE TRIGGER `pfm`.`members_status_prevent_delete_in_use`
BEFORE DELETE ON `pfm`.`members_status`
FOR EACH ROW
BEGIN
    DECLARE v_customers INT DEFAULT 0;
    DECLARE v_apps      INT DEFAULT 0;
    DECLARE v_msg       VARCHAR(128);

    SELECT COUNT(*) INTO v_customers FROM `pfm`.`clients`     WHERE memb_status_id = OLD.memb_status_id;
    SELECT COUNT(*) INTO v_apps      FROM `pfm`.`clients_app` WHERE memb_status_id = OLD.memb_status_id;

    IF v_customers + v_apps > 0 THEN
        -- MESSAGE_TEXT is limited to 128 characters (keep the name short) and
        -- SIGNAL only accepts a literal or a variable, so build it first.
        SET v_msg = LEFT(CONCAT(
            'Cannot delete "', LEFT(COALESCE(OLD.status, ''), 25),
            '": still used by ', v_customers, ' customer(s), ',
            v_apps, ' application(s). Reassign them first.'
        ), 128);
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = v_msg;
    END IF;
END//

DELIMITER ;

-- Verify after running:
--   SELECT TRIGGER_NAME, EVENT_MANIPULATION, ACTION_TIMING
--     FROM information_schema.TRIGGERS
--    WHERE TRIGGER_SCHEMA = 'pfm' AND EVENT_OBJECT_TABLE = 'members_status';
-- Expect two rows: members_status_prevent_broken_link (UPDATE, BEFORE) and
-- members_status_prevent_delete_in_use (DELETE, BEFORE).
--
-- Behaviour check (staging only; Muhammad runs deletes):
--   START TRANSACTION;
--   DELETE FROM members_status WHERE memb_status_id = 9;
--   -- expect: ERROR 1644 (45000): Cannot delete "Renewing Active": still used by N customer(s), ...
--   ROLLBACK;
