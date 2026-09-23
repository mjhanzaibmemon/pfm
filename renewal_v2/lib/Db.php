<?php
/**
 * PFM Renewal v2 — Database Wrapper
 *
 * Singleton PDO wrapper providing safe, prepared-statement-based DB access
 * for the PFM renewal flow.
 *
 * Usage:
 *   $row  = Db::one('SELECT * FROM clients WHERE client_id = ?', [4]);
 *   $rows = Db::all('SELECT * FROM members WHERE client_id = ?', [4]);
 *   $id   = Db::insert('INSERT INTO renewal_sessions (client_id, token) VALUES (?, ?)', [4, 'abc']);
 *   $n    = Db::exec('UPDATE clients SET co_name = ? WHERE client_id = ?', ['New Co', 4]);
 *
 * Transactions:
 *   Db::begin();
 *   try {
 *       // ... multiple statements ...
 *       Db::commit();
 *   } catch (Throwable $e) {
 *       Db::rollback();
 *       throw $e;
 *   }
 */

declare(strict_types=1);

require_once __DIR__ . '/../config/config.php';

class Db
{
    private static ?PDO $pdo = null;
    private static ?PDO $stripePdo = null;

    /**
     * Get the main PFM database PDO instance (lazy-initialised singleton).
     */
    public static function pdo(): PDO
    {
        if (self::$pdo === null) {
            $dsn = sprintf(
                'mysql:host=%s;dbname=%s;charset=%s',
                PFM_RNW_DB_HOST,
                PFM_RNW_DB_NAME,
                PFM_RNW_DB_CHARSET
            );

            self::$pdo = new PDO($dsn, PFM_RNW_DB_USER, PFM_RNW_DB_PASS, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . PFM_RNW_DB_CHARSET,
            ]);
        }
        return self::$pdo;
    }

    /**
     * Get a PDO instance connected to the Stripe database (read-only).
     */
    public static function stripePdo(): PDO
    {
        if (self::$stripePdo === null) {
            $dsn = sprintf(
                'mysql:host=%s;dbname=%s;charset=%s',
                PFM_RNW_DB_HOST,
                PFM_RNW_STRIPE_DB_NAME,
                PFM_RNW_DB_CHARSET
            );

            self::$stripePdo = new PDO($dsn, PFM_RNW_DB_USER, PFM_RNW_DB_PASS, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
        }
        return self::$stripePdo;
    }

    // ---------- Query helpers ----------

    /**
     * Run a SELECT and return the first row (or null if none).
     *
     * @param string $sql
     * @param array $params
     * @return array|null
     */
    public static function one(string $sql, array $params = []): ?array
    {
        $stmt = self::pdo()->prepare($sql);
        $stmt->execute($params);
        $row = $stmt->fetch();
        return $row === false ? null : $row;
    }

    /**
     * Run a SELECT and return all rows.
     */
    public static function all(string $sql, array $params = []): array
    {
        $stmt = self::pdo()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    /**
     * Run a SELECT that returns a single scalar value (e.g. COUNT(*)).
     */
    public static function scalar(string $sql, array $params = [])
    {
        $stmt = self::pdo()->prepare($sql);
        $stmt->execute($params);
        $val = $stmt->fetchColumn();
        return $val === false ? null : $val;
    }

    /**
     * Execute an INSERT and return the new auto-increment ID.
     */
    public static function insert(string $sql, array $params = []): int
    {
        $stmt = self::pdo()->prepare($sql);
        $stmt->execute($params);
        return (int) self::pdo()->lastInsertId();
    }

    /**
     * Execute UPDATE/DELETE and return rows affected.
     */
    public static function exec(string $sql, array $params = []): int
    {
        $stmt = self::pdo()->prepare($sql);
        $stmt->execute($params);
        return $stmt->rowCount();
    }

    // ---------- Transactions ----------

    public static function begin(): void
    {
        self::pdo()->beginTransaction();
    }

    public static function commit(): void
    {
        self::pdo()->commit();
    }

    public static function rollback(): void
    {
        if (self::pdo()->inTransaction()) {
            self::pdo()->rollBack();
        }
    }

    /**
     * Convenience: run a callable inside a transaction.
     * Automatically commits on success or rolls back on exception.
     *
     * @param callable $fn
     * @return mixed Return value of the callable
     */
    public static function transaction(callable $fn)
    {
        self::begin();
        try {
            $result = $fn();
            self::commit();
            return $result;
        } catch (Throwable $e) {
            self::rollback();
            throw $e;
        }
    }

    // ---------- Stripe DB helpers (read-only) ----------

    public static function stripeOne(string $sql, array $params = []): ?array
    {
        $stmt = self::stripePdo()->prepare($sql);
        $stmt->execute($params);
        $row = $stmt->fetch();
        return $row === false ? null : $row;
    }

    public static function stripeAll(string $sql, array $params = []): array
    {
        $stmt = self::stripePdo()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }
}
