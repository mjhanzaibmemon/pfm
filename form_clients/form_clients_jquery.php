
function scJQGeneralAdd() {
  scLoadScInput('input:text.sc-js-input');
  scLoadScInput('input:password.sc-js-input');
  scLoadScInput('input:checkbox.sc-js-input');
  scLoadScInput('input:radio.sc-js-input');
  scLoadScInput('select.sc-js-input');
  scLoadScInput('textarea.sc-js-input');

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if ($("#id_ac_" + sField).length > 0) {
    if ($oField.hasClass("select2-hidden-accessible")) {
      if (false == scSetFocusOnField($oField)) {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
    else {
      if (false == scSetFocusOnField($oField)) {
        if (false == scSetFocusOnField($("#id_ac_" + sField))) {
          setTimeout(function() { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
        }
      }
      else {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["co_name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["client_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["mailing_address" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pricing_level_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["city" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["type_company" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["state" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["bus_cat_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["zip_code" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["bus_subcat_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["phone_number" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["bus_subcat_other" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["website_url" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["permanent_member_date" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["acct_instagram" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["renewal_date" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["acct_facebook" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["archive" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["memb_status_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["main_contact_name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["main_contact_phone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["main_contact_email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["main_contact_title" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["main_contact_img_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["buyers" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pmts" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["notes" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["co_name" + iSeqRow] && scEventControl_data["co_name" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["co_name" + iSeqRow] && scEventControl_data["co_name" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["client_id" + iSeqRow] && scEventControl_data["client_id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["client_id" + iSeqRow] && scEventControl_data["client_id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["mailing_address" + iSeqRow] && scEventControl_data["mailing_address" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["mailing_address" + iSeqRow] && scEventControl_data["mailing_address" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pricing_level_id" + iSeqRow] && scEventControl_data["pricing_level_id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pricing_level_id" + iSeqRow] && scEventControl_data["pricing_level_id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["city" + iSeqRow] && scEventControl_data["city" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["city" + iSeqRow] && scEventControl_data["city" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["type_company" + iSeqRow] && scEventControl_data["type_company" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["type_company" + iSeqRow] && scEventControl_data["type_company" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["state" + iSeqRow] && scEventControl_data["state" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["state" + iSeqRow] && scEventControl_data["state" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["bus_cat_id" + iSeqRow] && scEventControl_data["bus_cat_id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bus_cat_id" + iSeqRow] && scEventControl_data["bus_cat_id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["zip_code" + iSeqRow] && scEventControl_data["zip_code" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["zip_code" + iSeqRow] && scEventControl_data["zip_code" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["bus_subcat_id" + iSeqRow] && scEventControl_data["bus_subcat_id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bus_subcat_id" + iSeqRow] && scEventControl_data["bus_subcat_id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["phone_number" + iSeqRow] && scEventControl_data["phone_number" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["phone_number" + iSeqRow] && scEventControl_data["phone_number" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["bus_subcat_other" + iSeqRow] && scEventControl_data["bus_subcat_other" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bus_subcat_other" + iSeqRow] && scEventControl_data["bus_subcat_other" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow] && scEventControl_data["email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow] && scEventControl_data["email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["website_url" + iSeqRow] && scEventControl_data["website_url" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["website_url" + iSeqRow] && scEventControl_data["website_url" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["permanent_member_date" + iSeqRow] && scEventControl_data["permanent_member_date" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["permanent_member_date" + iSeqRow] && scEventControl_data["permanent_member_date" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["acct_instagram" + iSeqRow] && scEventControl_data["acct_instagram" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["acct_instagram" + iSeqRow] && scEventControl_data["acct_instagram" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["renewal_date" + iSeqRow] && scEventControl_data["renewal_date" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["renewal_date" + iSeqRow] && scEventControl_data["renewal_date" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["acct_facebook" + iSeqRow] && scEventControl_data["acct_facebook" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["acct_facebook" + iSeqRow] && scEventControl_data["acct_facebook" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["archive" + iSeqRow] && scEventControl_data["archive" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["archive" + iSeqRow] && scEventControl_data["archive" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["memb_status_id" + iSeqRow] && scEventControl_data["memb_status_id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["memb_status_id" + iSeqRow] && scEventControl_data["memb_status_id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["main_contact_name" + iSeqRow] && scEventControl_data["main_contact_name" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["main_contact_name" + iSeqRow] && scEventControl_data["main_contact_name" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["main_contact_phone" + iSeqRow] && scEventControl_data["main_contact_phone" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["main_contact_phone" + iSeqRow] && scEventControl_data["main_contact_phone" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["main_contact_email" + iSeqRow] && scEventControl_data["main_contact_email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["main_contact_email" + iSeqRow] && scEventControl_data["main_contact_email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["main_contact_title" + iSeqRow] && scEventControl_data["main_contact_title" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["main_contact_title" + iSeqRow] && scEventControl_data["main_contact_title" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["buyers" + iSeqRow] && scEventControl_data["buyers" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["buyers" + iSeqRow] && scEventControl_data["buyers" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pmts" + iSeqRow] && scEventControl_data["pmts" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pmts" + iSeqRow] && scEventControl_data["pmts" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["notes" + iSeqRow] && scEventControl_data["notes" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["notes" + iSeqRow] && scEventControl_data["notes" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("pricing_level_id" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("type_company" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("bus_cat_id" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("bus_subcat_id" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("memb_status_id" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("bus_subcat_id" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val() || scEventControl_data[sFieldName]["calculated"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_client_id' + iSeqRow).bind('blur', function() { sc_form_clients_client_id_onblur('#id_sc_field_client_id' + iSeqRow, iSeqRow) })
                                       .bind('change', function() { sc_form_clients_client_id_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_clients_client_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_co_name' + iSeqRow).bind('blur', function() { sc_form_clients_co_name_onblur('#id_sc_field_co_name' + iSeqRow, iSeqRow) })
                                     .bind('change', function() { sc_form_clients_co_name_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_clients_co_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_ofa_contact' + iSeqRow).bind('change', function() { sc_form_clients_ofa_contact_onchange(this, iSeqRow) });
  $('#id_sc_field_street_address' + iSeqRow).bind('change', function() { sc_form_clients_street_address_onchange(this, iSeqRow) });
  $('#id_sc_field_mailing_address' + iSeqRow).bind('blur', function() { sc_form_clients_mailing_address_onblur('#id_sc_field_mailing_address' + iSeqRow, iSeqRow) })
                                             .bind('change', function() { sc_form_clients_mailing_address_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_clients_mailing_address_onfocus(this, iSeqRow) });
  $('#id_sc_field_city' + iSeqRow).bind('blur', function() { sc_form_clients_city_onblur('#id_sc_field_city' + iSeqRow, iSeqRow) })
                                  .bind('change', function() { sc_form_clients_city_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_clients_city_onfocus(this, iSeqRow) });
  $('#id_sc_field_state' + iSeqRow).bind('blur', function() { sc_form_clients_state_onblur('#id_sc_field_state' + iSeqRow, iSeqRow) })
                                   .bind('change', function() { sc_form_clients_state_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_clients_state_onfocus(this, iSeqRow) });
  $('#id_sc_field_zip_code' + iSeqRow).bind('blur', function() { sc_form_clients_zip_code_onblur('#id_sc_field_zip_code' + iSeqRow, iSeqRow) })
                                      .bind('change', function() { sc_form_clients_zip_code_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_clients_zip_code_onfocus(this, iSeqRow) });
  $('#id_sc_field_phone_number' + iSeqRow).bind('blur', function() { sc_form_clients_phone_number_onblur('#id_sc_field_phone_number' + iSeqRow, iSeqRow) })
                                          .bind('change', function() { sc_form_clients_phone_number_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_clients_phone_number_onfocus(this, iSeqRow) });
  $('#id_sc_field_home_phone' + iSeqRow).bind('change', function() { sc_form_clients_home_phone_onchange(this, iSeqRow) });
  $('#id_sc_field_fax_number' + iSeqRow).bind('change', function() { sc_form_clients_fax_number_onchange(this, iSeqRow) });
  $('#id_sc_field_email' + iSeqRow).bind('blur', function() { sc_form_clients_email_onblur('#id_sc_field_email' + iSeqRow, iSeqRow) })
                                   .bind('change', function() { sc_form_clients_email_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_clients_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_business_type' + iSeqRow).bind('change', function() { sc_form_clients_business_type_onchange(this, iSeqRow) });
  $('#id_sc_field_fresh_cut_allowed' + iSeqRow).bind('change', function() { sc_form_clients_fresh_cut_allowed_onchange(this, iSeqRow) });
  $('#id_sc_field_business_license' + iSeqRow).bind('change', function() { sc_form_clients_business_license_onchange(this, iSeqRow) });
  $('#id_sc_field_nursery_license' + iSeqRow).bind('change', function() { sc_form_clients_nursery_license_onchange(this, iSeqRow) });
  $('#id_sc_field_federal_tax_id' + iSeqRow).bind('change', function() { sc_form_clients_federal_tax_id_onchange(this, iSeqRow) });
  $('#id_sc_field_temporary_pass' + iSeqRow).bind('change', function() { sc_form_clients_temporary_pass_onchange(this, iSeqRow) });
  $('#id_sc_field_ofa_member' + iSeqRow).bind('change', function() { sc_form_clients_ofa_member_onchange(this, iSeqRow) });
  $('#id_sc_field_starting_date' + iSeqRow).bind('change', function() { sc_form_clients_starting_date_onchange(this, iSeqRow) });
  $('#id_sc_field_renewal_date' + iSeqRow).bind('blur', function() { sc_form_clients_renewal_date_onblur('#id_sc_field_renewal_date' + iSeqRow, iSeqRow) })
                                          .bind('change', function() { sc_form_clients_renewal_date_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_clients_renewal_date_onfocus(this, iSeqRow) });
  $('#id_sc_field_expiration_date' + iSeqRow).bind('change', function() { sc_form_clients_expiration_date_onchange(this, iSeqRow) });
  $('#id_sc_field_canceled' + iSeqRow).bind('change', function() { sc_form_clients_canceled_onchange(this, iSeqRow) });
  $('#id_sc_field_cancel_date' + iSeqRow).bind('change', function() { sc_form_clients_cancel_date_onchange(this, iSeqRow) });
  $('#id_sc_field_canceled_by' + iSeqRow).bind('change', function() { sc_form_clients_canceled_by_onchange(this, iSeqRow) });
  $('#id_sc_field_reason_canceled' + iSeqRow).bind('change', function() { sc_form_clients_reason_canceled_onchange(this, iSeqRow) });
  $('#id_sc_field_retire_date' + iSeqRow).bind('change', function() { sc_form_clients_retire_date_onchange(this, iSeqRow) });
  $('#id_sc_field_verified_receipts' + iSeqRow).bind('change', function() { sc_form_clients_verified_receipts_onchange(this, iSeqRow) });
  $('#id_sc_field_date_last_updated' + iSeqRow).bind('change', function() { sc_form_clients_date_last_updated_onchange(this, iSeqRow) });
  $('#id_sc_field_restricted' + iSeqRow).bind('change', function() { sc_form_clients_restricted_onchange(this, iSeqRow) });
  $('#id_sc_field_committee_approval_required' + iSeqRow).bind('change', function() { sc_form_clients_committee_approval_required_onchange(this, iSeqRow) });
  $('#id_sc_field_type_company' + iSeqRow).bind('blur', function() { sc_form_clients_type_company_onblur('#id_sc_field_type_company' + iSeqRow, iSeqRow) })
                                          .bind('change', function() { sc_form_clients_type_company_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_clients_type_company_onfocus(this, iSeqRow) });
  $('#id_sc_field_archive' + iSeqRow).bind('blur', function() { sc_form_clients_archive_onblur('#id_sc_field_archive' + iSeqRow, iSeqRow) })
                                     .bind('change', function() { sc_form_clients_archive_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_clients_archive_onfocus(this, iSeqRow) });
  $('#id_sc_field_archive_date' + iSeqRow).bind('change', function() { sc_form_clients_archive_date_onchange(this, iSeqRow) });
  $('#id_sc_field_pricing_level_id' + iSeqRow).bind('blur', function() { sc_form_clients_pricing_level_id_onblur('#id_sc_field_pricing_level_id' + iSeqRow, iSeqRow) })
                                              .bind('change', function() { sc_form_clients_pricing_level_id_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_clients_pricing_level_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_store_front_address' + iSeqRow).bind('change', function() { sc_form_clients_store_front_address_onchange(this, iSeqRow) });
  $('#id_sc_field_store_front_city' + iSeqRow).bind('change', function() { sc_form_clients_store_front_city_onchange(this, iSeqRow) });
  $('#id_sc_field_store_front_zip' + iSeqRow).bind('change', function() { sc_form_clients_store_front_zip_onchange(this, iSeqRow) });
  $('#id_sc_field_home_base_address' + iSeqRow).bind('change', function() { sc_form_clients_home_base_address_onchange(this, iSeqRow) });
  $('#id_sc_field_home_base_city' + iSeqRow).bind('change', function() { sc_form_clients_home_base_city_onchange(this, iSeqRow) });
  $('#id_sc_field_home_base_zip' + iSeqRow).bind('change', function() { sc_form_clients_home_base_zip_onchange(this, iSeqRow) });
  $('#id_sc_field_store_front_state' + iSeqRow).bind('change', function() { sc_form_clients_store_front_state_onchange(this, iSeqRow) });
  $('#id_sc_field_home_base_state' + iSeqRow).bind('change', function() { sc_form_clients_home_base_state_onchange(this, iSeqRow) });
  $('#id_sc_field_record_created' + iSeqRow).bind('change', function() { sc_form_clients_record_created_onchange(this, iSeqRow) });
  $('#id_sc_field_record_created_hora' + iSeqRow).bind('change', function() { sc_form_clients_record_created_hora_onchange(this, iSeqRow) });
  $('#id_sc_field_permanent_member_date' + iSeqRow).bind('blur', function() { sc_form_clients_permanent_member_date_onblur('#id_sc_field_permanent_member_date' + iSeqRow, iSeqRow) })
                                                   .bind('change', function() { sc_form_clients_permanent_member_date_onchange(this, iSeqRow) })
                                                   .bind('focus', function() { sc_form_clients_permanent_member_date_onfocus(this, iSeqRow) });
  $('#id_sc_field_acct_instagram' + iSeqRow).bind('blur', function() { sc_form_clients_acct_instagram_onblur('#id_sc_field_acct_instagram' + iSeqRow, iSeqRow) })
                                            .bind('change', function() { sc_form_clients_acct_instagram_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_clients_acct_instagram_onfocus(this, iSeqRow) });
  $('#id_sc_field_acct_facebook' + iSeqRow).bind('blur', function() { sc_form_clients_acct_facebook_onblur('#id_sc_field_acct_facebook' + iSeqRow, iSeqRow) })
                                           .bind('change', function() { sc_form_clients_acct_facebook_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_clients_acct_facebook_onfocus(this, iSeqRow) });
  $('#id_sc_field_website_url' + iSeqRow).bind('blur', function() { sc_form_clients_website_url_onblur('#id_sc_field_website_url' + iSeqRow, iSeqRow) })
                                         .bind('change', function() { sc_form_clients_website_url_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_clients_website_url_onfocus(this, iSeqRow) });
  $('#id_sc_field_bus_cat_id' + iSeqRow).bind('blur', function() { sc_form_clients_bus_cat_id_onblur('#id_sc_field_bus_cat_id' + iSeqRow, iSeqRow) })
                                        .bind('change', function() { sc_form_clients_bus_cat_id_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_clients_bus_cat_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_bus_subcat_id' + iSeqRow).bind('blur', function() { sc_form_clients_bus_subcat_id_onblur('#id_sc_field_bus_subcat_id' + iSeqRow, iSeqRow) })
                                           .bind('change', function() { sc_form_clients_bus_subcat_id_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_clients_bus_subcat_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_bus_subcat_other' + iSeqRow).bind('blur', function() { sc_form_clients_bus_subcat_other_onblur('#id_sc_field_bus_subcat_other' + iSeqRow, iSeqRow) })
                                              .bind('change', function() { sc_form_clients_bus_subcat_other_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_clients_bus_subcat_other_onfocus(this, iSeqRow) });
  $('#id_sc_field_appn_date' + iSeqRow).bind('change', function() { sc_form_clients_appn_date_onchange(this, iSeqRow) });
  $('#id_sc_field_appn_date_hora' + iSeqRow).bind('change', function() { sc_form_clients_appn_date_hora_onchange(this, iSeqRow) });
  $('#id_sc_field_appn_note' + iSeqRow).bind('change', function() { sc_form_clients_appn_note_onchange(this, iSeqRow) });
  $('#id_sc_field_doc_sec_of_state' + iSeqRow).bind('change', function() { sc_form_clients_doc_sec_of_state_onchange(this, iSeqRow) });
  $('#id_sc_field_doc_city_bus_lic' + iSeqRow).bind('change', function() { sc_form_clients_doc_city_bus_lic_onchange(this, iSeqRow) });
  $('#id_sc_field_doc_agric_lic' + iSeqRow).bind('change', function() { sc_form_clients_doc_agric_lic_onchange(this, iSeqRow) });
  $('#id_sc_field_doc_last_year_tax' + iSeqRow).bind('change', function() { sc_form_clients_doc_last_year_tax_onchange(this, iSeqRow) });
  $('#id_sc_field_qb_id' + iSeqRow).bind('change', function() { sc_form_clients_qb_id_onchange(this, iSeqRow) });
  $('#id_sc_field_main_contact_name' + iSeqRow).bind('blur', function() { sc_form_clients_main_contact_name_onblur('#id_sc_field_main_contact_name' + iSeqRow, iSeqRow) })
                                               .bind('change', function() { sc_form_clients_main_contact_name_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_clients_main_contact_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_main_contact_phone' + iSeqRow).bind('blur', function() { sc_form_clients_main_contact_phone_onblur('#id_sc_field_main_contact_phone' + iSeqRow, iSeqRow) })
                                                .bind('change', function() { sc_form_clients_main_contact_phone_onchange(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_clients_main_contact_phone_onfocus(this, iSeqRow) });
  $('#id_sc_field_main_contact_email' + iSeqRow).bind('blur', function() { sc_form_clients_main_contact_email_onblur('#id_sc_field_main_contact_email' + iSeqRow, iSeqRow) })
                                                .bind('change', function() { sc_form_clients_main_contact_email_onchange(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_clients_main_contact_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_main_contact_title' + iSeqRow).bind('blur', function() { sc_form_clients_main_contact_title_onblur('#id_sc_field_main_contact_title' + iSeqRow, iSeqRow) })
                                                .bind('change', function() { sc_form_clients_main_contact_title_onchange(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_clients_main_contact_title_onfocus(this, iSeqRow) });
  $('#id_sc_field_main_contact_img_id' + iSeqRow).bind('blur', function() { sc_form_clients_main_contact_img_id_onblur('#id_sc_field_main_contact_img_id' + iSeqRow, iSeqRow) })
                                                 .bind('change', function() { sc_form_clients_main_contact_img_id_onchange(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_clients_main_contact_img_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_memb_status_id' + iSeqRow).bind('blur', function() { sc_form_clients_memb_status_id_onblur('#id_sc_field_memb_status_id' + iSeqRow, iSeqRow) })
                                            .bind('change', function() { sc_form_clients_memb_status_id_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_clients_memb_status_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_buyers' + iSeqRow).bind('blur', function() { sc_form_clients_buyers_onblur('#id_sc_field_buyers' + iSeqRow, iSeqRow) })
                                    .bind('change', function() { sc_form_clients_buyers_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_clients_buyers_onfocus(this, iSeqRow) });
  $('#id_sc_field_dummy01' + iSeqRow).bind('change', function() { sc_form_clients_dummy01_onchange(this, iSeqRow) });
  $('#id_sc_field_notes' + iSeqRow).bind('blur', function() { sc_form_clients_notes_onblur('#id_sc_field_notes' + iSeqRow, iSeqRow) })
                                   .bind('change', function() { sc_form_clients_notes_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_clients_notes_onfocus(this, iSeqRow) });
  $('#id_sc_field_pmts' + iSeqRow).bind('blur', function() { sc_form_clients_pmts_onblur('#id_sc_field_pmts' + iSeqRow, iSeqRow) })
                                  .bind('change', function() { sc_form_clients_pmts_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_clients_pmts_onfocus(this, iSeqRow) });
  $('.sc-ui-checkbox-archive' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_form_clients_client_id_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_validate_client_id();
  scCssBlur(oThis);
}

function sc_form_clients_client_id_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_client_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_co_name_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_validate_co_name();
  scCssBlur(oThis);
}

function sc_form_clients_co_name_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_co_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_ofa_contact_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_street_address_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_mailing_address_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_validate_mailing_address();
  scCssBlur(oThis);
}

function sc_form_clients_mailing_address_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_mailing_address_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_city_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_validate_city();
  scCssBlur(oThis);
}

function sc_form_clients_city_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_city_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_state_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_validate_state();
  scCssBlur(oThis);
}

function sc_form_clients_state_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_state_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_zip_code_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_validate_zip_code();
  scCssBlur(oThis);
}

function sc_form_clients_zip_code_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_zip_code_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_phone_number_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_validate_phone_number();
  scCssBlur(oThis);
}

function sc_form_clients_phone_number_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_phone_number_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_home_phone_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_fax_number_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_email_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_validate_email();
  scCssBlur(oThis);
}

function sc_form_clients_email_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_business_type_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_fresh_cut_allowed_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_business_license_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_nursery_license_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_federal_tax_id_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_temporary_pass_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_ofa_member_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_starting_date_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_renewal_date_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_validate_renewal_date();
  scCssBlur(oThis);
}

function sc_form_clients_renewal_date_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_renewal_date_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_expiration_date_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_canceled_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_cancel_date_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_canceled_by_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_reason_canceled_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_retire_date_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_verified_receipts_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_date_last_updated_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_restricted_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_committee_approval_required_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_type_company_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_validate_type_company();
  scCssBlur(oThis);
}

function sc_form_clients_type_company_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_type_company_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_archive_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_validate_archive();
  scCssBlur(oThis);
}

function sc_form_clients_archive_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_archive_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_archive_date_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_pricing_level_id_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_validate_pricing_level_id();
  scCssBlur(oThis);
}

function sc_form_clients_pricing_level_id_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_pricing_level_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_store_front_address_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_store_front_city_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_store_front_zip_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_home_base_address_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_home_base_city_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_home_base_zip_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_store_front_state_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_home_base_state_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_record_created_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_record_created_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_permanent_member_date_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_validate_permanent_member_date();
  scCssBlur(oThis);
}

function sc_form_clients_permanent_member_date_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_permanent_member_date_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_acct_instagram_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_validate_acct_instagram();
  scCssBlur(oThis);
}

function sc_form_clients_acct_instagram_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_acct_instagram_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_acct_facebook_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_validate_acct_facebook();
  scCssBlur(oThis);
}

function sc_form_clients_acct_facebook_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_acct_facebook_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_website_url_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_validate_website_url();
  scCssBlur(oThis);
}

function sc_form_clients_website_url_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_website_url_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_bus_cat_id_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_validate_bus_cat_id();
  scCssBlur(oThis);
}

function sc_form_clients_bus_cat_id_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_clients_refresh_bus_cat_id();
}

function sc_form_clients_bus_cat_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_bus_subcat_id_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_validate_bus_subcat_id();
  scCssBlur(oThis);
}

function sc_form_clients_bus_subcat_id_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_clients_event_bus_subcat_id_onchange();
}

function sc_form_clients_bus_subcat_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_bus_subcat_other_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_validate_bus_subcat_other();
  scCssBlur(oThis);
}

function sc_form_clients_bus_subcat_other_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_bus_subcat_other_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_appn_date_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_appn_date_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_appn_note_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_doc_sec_of_state_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_doc_city_bus_lic_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_doc_agric_lic_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_doc_last_year_tax_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_qb_id_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_main_contact_name_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_validate_main_contact_name();
  scCssBlur(oThis);
}

function sc_form_clients_main_contact_name_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_main_contact_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_main_contact_phone_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_validate_main_contact_phone();
  scCssBlur(oThis);
}

function sc_form_clients_main_contact_phone_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_main_contact_phone_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_main_contact_email_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_validate_main_contact_email();
  scCssBlur(oThis);
}

function sc_form_clients_main_contact_email_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_main_contact_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_main_contact_title_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_validate_main_contact_title();
  scCssBlur(oThis);
}

function sc_form_clients_main_contact_title_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_main_contact_title_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_main_contact_img_id_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_clients_main_contact_img_id_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_main_contact_img_id_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_clients_memb_status_id_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_validate_memb_status_id();
  scCssBlur(oThis);
}

function sc_form_clients_memb_status_id_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_memb_status_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_buyers_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_validate_buyers();
  scCssBlur(oThis);
}

function sc_form_clients_buyers_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_buyers_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_dummy01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_notes_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_validate_notes();
  scCssBlur(oThis);
}

function sc_form_clients_notes_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_notes_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_pmts_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_validate_pmts();
  scCssBlur(oThis);
}

function sc_form_clients_pmts_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_pmts_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
        if ("0" == block) {
                displayChange_block_0(status);
        }
        if ("1" == block) {
                displayChange_block_1(status);
        }
        if ("2" == block) {
                displayChange_block_2(status);
        }
        if ("3" == block) {
                displayChange_block_3(status);
        }
        if ("4" == block) {
                displayChange_block_4(status);
        }
}

function displayChange_block_0(status) {
        displayChange_field("co_name", "", status);
        displayChange_field("client_id", "", status);
        displayChange_field("mailing_address", "", status);
        displayChange_field("pricing_level_id", "", status);
        displayChange_field("city", "", status);
        displayChange_field("type_company", "", status);
        displayChange_field("state", "", status);
        displayChange_field("bus_cat_id", "", status);
        displayChange_field("zip_code", "", status);
        displayChange_field("bus_subcat_id", "", status);
        displayChange_field("phone_number", "", status);
        displayChange_field("bus_subcat_other", "", status);
        displayChange_field("email", "", status);
        displayChange_field("website_url", "", status);
        displayChange_field("permanent_member_date", "", status);
        displayChange_field("acct_instagram", "", status);
        displayChange_field("renewal_date", "", status);
        displayChange_field("acct_facebook", "", status);
        displayChange_field("archive", "", status);
        displayChange_field("memb_status_id", "", status);
}

function displayChange_block_1(status) {
        displayChange_field("main_contact_name", "", status);
        displayChange_field("main_contact_phone", "", status);
        displayChange_field("main_contact_email", "", status);
        displayChange_field("main_contact_title", "", status);
        displayChange_field("main_contact_img_id", "", status);
}

function displayChange_block_2(status) {
        displayChange_field("buyers", "", status);
}

function displayChange_block_3(status) {
        displayChange_field("pmts", "", status);
}

function displayChange_block_4(status) {
        displayChange_field("notes", "", status);
}

function displayChange_row(row, status) {
        displayChange_field_co_name(row, status);
        displayChange_field_client_id(row, status);
        displayChange_field_mailing_address(row, status);
        displayChange_field_pricing_level_id(row, status);
        displayChange_field_city(row, status);
        displayChange_field_type_company(row, status);
        displayChange_field_state(row, status);
        displayChange_field_bus_cat_id(row, status);
        displayChange_field_zip_code(row, status);
        displayChange_field_bus_subcat_id(row, status);
        displayChange_field_phone_number(row, status);
        displayChange_field_bus_subcat_other(row, status);
        displayChange_field_email(row, status);
        displayChange_field_website_url(row, status);
        displayChange_field_permanent_member_date(row, status);
        displayChange_field_acct_instagram(row, status);
        displayChange_field_renewal_date(row, status);
        displayChange_field_acct_facebook(row, status);
        displayChange_field_archive(row, status);
        displayChange_field_memb_status_id(row, status);
        displayChange_field_main_contact_name(row, status);
        displayChange_field_main_contact_phone(row, status);
        displayChange_field_main_contact_email(row, status);
        displayChange_field_main_contact_title(row, status);
        displayChange_field_main_contact_img_id(row, status);
        displayChange_field_buyers(row, status);
        displayChange_field_pmts(row, status);
        displayChange_field_notes(row, status);
}

function displayChange_field(field, row, status) {
        if ("co_name" == field) {
                displayChange_field_co_name(row, status);
        }
        if ("client_id" == field) {
                displayChange_field_client_id(row, status);
        }
        if ("mailing_address" == field) {
                displayChange_field_mailing_address(row, status);
        }
        if ("pricing_level_id" == field) {
                displayChange_field_pricing_level_id(row, status);
        }
        if ("city" == field) {
                displayChange_field_city(row, status);
        }
        if ("type_company" == field) {
                displayChange_field_type_company(row, status);
        }
        if ("state" == field) {
                displayChange_field_state(row, status);
        }
        if ("bus_cat_id" == field) {
                displayChange_field_bus_cat_id(row, status);
        }
        if ("zip_code" == field) {
                displayChange_field_zip_code(row, status);
        }
        if ("bus_subcat_id" == field) {
                displayChange_field_bus_subcat_id(row, status);
        }
        if ("phone_number" == field) {
                displayChange_field_phone_number(row, status);
        }
        if ("bus_subcat_other" == field) {
                displayChange_field_bus_subcat_other(row, status);
        }
        if ("email" == field) {
                displayChange_field_email(row, status);
        }
        if ("website_url" == field) {
                displayChange_field_website_url(row, status);
        }
        if ("permanent_member_date" == field) {
                displayChange_field_permanent_member_date(row, status);
        }
        if ("acct_instagram" == field) {
                displayChange_field_acct_instagram(row, status);
        }
        if ("renewal_date" == field) {
                displayChange_field_renewal_date(row, status);
        }
        if ("acct_facebook" == field) {
                displayChange_field_acct_facebook(row, status);
        }
        if ("archive" == field) {
                displayChange_field_archive(row, status);
        }
        if ("memb_status_id" == field) {
                displayChange_field_memb_status_id(row, status);
        }
        if ("main_contact_name" == field) {
                displayChange_field_main_contact_name(row, status);
        }
        if ("main_contact_phone" == field) {
                displayChange_field_main_contact_phone(row, status);
        }
        if ("main_contact_email" == field) {
                displayChange_field_main_contact_email(row, status);
        }
        if ("main_contact_title" == field) {
                displayChange_field_main_contact_title(row, status);
        }
        if ("main_contact_img_id" == field) {
                displayChange_field_main_contact_img_id(row, status);
        }
        if ("buyers" == field) {
                displayChange_field_buyers(row, status);
        }
        if ("pmts" == field) {
                displayChange_field_pmts(row, status);
        }
        if ("notes" == field) {
                displayChange_field_notes(row, status);
        }
}

function displayChange_field_co_name(row, status) {
    var fieldId;
}

function displayChange_field_client_id(row, status) {
    var fieldId;
}

function displayChange_field_mailing_address(row, status) {
    var fieldId;
}

function displayChange_field_pricing_level_id(row, status) {
    var fieldId;
}

function displayChange_field_city(row, status) {
    var fieldId;
}

function displayChange_field_type_company(row, status) {
    var fieldId;
}

function displayChange_field_state(row, status) {
    var fieldId;
}

function displayChange_field_bus_cat_id(row, status) {
    var fieldId;
}

function displayChange_field_zip_code(row, status) {
    var fieldId;
}

function displayChange_field_bus_subcat_id(row, status) {
    var fieldId;
}

function displayChange_field_phone_number(row, status) {
    var fieldId;
}

function displayChange_field_bus_subcat_other(row, status) {
    var fieldId;
}

function displayChange_field_email(row, status) {
    var fieldId;
}

function displayChange_field_website_url(row, status) {
    var fieldId;
}

function displayChange_field_permanent_member_date(row, status) {
    var fieldId;
}

function displayChange_field_acct_instagram(row, status) {
    var fieldId;
}

function displayChange_field_renewal_date(row, status) {
    var fieldId;
}

function displayChange_field_acct_facebook(row, status) {
    var fieldId;
}

function displayChange_field_archive(row, status) {
    var fieldId;
}

function displayChange_field_memb_status_id(row, status) {
    var fieldId;
}

function displayChange_field_main_contact_name(row, status) {
    var fieldId;
}

function displayChange_field_main_contact_phone(row, status) {
    var fieldId;
}

function displayChange_field_main_contact_email(row, status) {
    var fieldId;
}

function displayChange_field_main_contact_title(row, status) {
    var fieldId;
}

function displayChange_field_main_contact_img_id(row, status) {
    var fieldId;
}

function displayChange_field_buyers(row, status) {
    var fieldId;
        if ("on" == status && typeof $("#nmsc_iframe_liga_form_members")[0].contentWindow.scRecreateSelect2 === "function") {
                $("#nmsc_iframe_liga_form_members")[0].contentWindow.scRecreateSelect2();
        }
}

function displayChange_field_pmts(row, status) {
    var fieldId;
        if ("on" == status && typeof $("#nmsc_iframe_liga_form_client_pmts")[0].contentWindow.scRecreateSelect2 === "function") {
                $("#nmsc_iframe_liga_form_client_pmts")[0].contentWindow.scRecreateSelect2();
        }
}

function displayChange_field_notes(row, status) {
    var fieldId;
        if ("on" == status && typeof $("#nmsc_iframe_liga_form_client_notes")[0].contentWindow.scRecreateSelect2 === "function") {
                $("#nmsc_iframe_liga_form_client_notes")[0].contentWindow.scRecreateSelect2();
        }
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
        $(".sc-form-page").show();
}

function scHidePage(pageNo) {
        $("#id_form_clients_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
        if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
                var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
                if (inactiveTabs.length) {
                        var tabNo = $(inactiveTabs[0]).attr("id").substr(20);
                }
        }
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_permanent_member_date" + iSeqRow).datepicker('destroy');
  $("#id_sc_field_permanent_member_date" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_permanent_member_date" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_clients_validate_permanent_member_date(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("SU"); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("mmddyyyy", "-"); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  })
<?php
if ('' != $miniCalendarFA) {
?>
    .next('button').append("<?php echo $miniCalendarFA; ?>")
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    .next('button').append("<?php echo $miniCalendarButton[0]; ?>")
<?php
}
?>
  $("#id_sc_field_renewal_date" + iSeqRow).datepicker('destroy');
  $("#id_sc_field_renewal_date" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_renewal_date" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_clients_validate_renewal_date(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("SU"); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("mmddyyyy", "-"); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  })
<?php
if ('' != $miniCalendarFA) {
?>
    .next('button').append("<?php echo $miniCalendarFA; ?>")
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    .next('button').append("<?php echo $miniCalendarButton[0]; ?>")
<?php
}
?>
  $("#id_sc_field_starting_date" + iSeqRow).datepicker('destroy');
  $("#id_sc_field_starting_date" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_starting_date" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_clients_validate_starting_date(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("SU"); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("mmddyyyy", "-"); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  })
<?php
if ('' != $miniCalendarFA) {
?>
    .next('button').append("<?php echo $miniCalendarFA; ?>")
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    .next('button').append("<?php echo $miniCalendarButton[0]; ?>")
<?php
}
?>
  $("#id_sc_field_expiration_date" + iSeqRow).datepicker('destroy');
  $("#id_sc_field_expiration_date" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_expiration_date" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_clients_validate_expiration_date(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("SU"); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("mmddyyyy", "-"); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  })
<?php
if ('' != $miniCalendarFA) {
?>
    .next('button').append("<?php echo $miniCalendarFA; ?>")
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    .next('button').append("<?php echo $miniCalendarButton[0]; ?>")
<?php
}
?>
  $("#id_sc_field_cancel_date" + iSeqRow).datepicker('destroy');
  $("#id_sc_field_cancel_date" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_cancel_date" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_clients_validate_cancel_date(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("SU"); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("mmddyyyy", "-"); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  })
<?php
if ('' != $miniCalendarFA) {
?>
    .next('button').append("<?php echo $miniCalendarFA; ?>")
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    .next('button').append("<?php echo $miniCalendarButton[0]; ?>")
<?php
}
?>
  $("#id_sc_field_retire_date" + iSeqRow).datepicker('destroy');
  $("#id_sc_field_retire_date" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_retire_date" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_clients_validate_retire_date(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("SU"); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("mmddyyyy", "-"); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  })
<?php
if ('' != $miniCalendarFA) {
?>
    .next('button').append("<?php echo $miniCalendarFA; ?>")
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    .next('button').append("<?php echo $miniCalendarButton[0]; ?>")
<?php
}
?>
  $("#id_sc_field_date_last_updated" + iSeqRow).datepicker('destroy');
  $("#id_sc_field_date_last_updated" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_date_last_updated" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_clients_validate_date_last_updated(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("SU"); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("mmddyyyy", "-"); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  })
<?php
if ('' != $miniCalendarFA) {
?>
    .next('button').append("<?php echo $miniCalendarFA; ?>")
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    .next('button').append("<?php echo $miniCalendarButton[0]; ?>")
<?php
}
?>
  $("#id_sc_field_archive_date" + iSeqRow).datepicker('destroy');
  $("#id_sc_field_archive_date" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_archive_date" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_clients_validate_archive_date(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("SU"); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("mmddyyyy", "-"); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  })
<?php
if ('' != $miniCalendarFA) {
?>
    .next('button').append("<?php echo $miniCalendarFA; ?>")
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    .next('button').append("<?php echo $miniCalendarButton[0]; ?>")
<?php
}
?>
  $("#id_sc_field_record_created" + iSeqRow).datepicker('destroy');
  $("#id_sc_field_record_created" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_record_created" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['record_created']['date_format'], 'start'); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['record_created']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime)
<?php
if ('' != $miniCalendarFA) {
?>
    .next('button').append("<?php echo $miniCalendarFA; ?>")
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    .next('button').append("<?php echo $miniCalendarButton[0]; ?>")
<?php
}
?>
    },
    onClose: function(dateText, inst) {
      do_ajax_form_clients_validate_record_created(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['record_created']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  })
<?php
if ('' != $miniCalendarFA) {
?>
    .next('button').append("<?php echo $miniCalendarFA; ?>")
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    .next('button').append("<?php echo $miniCalendarButton[0]; ?>")
<?php
}
?>
  $("#id_sc_field_appn_date" + iSeqRow).datepicker('destroy');
  $("#id_sc_field_appn_date" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_appn_date" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['appn_date']['date_format'], 'start'); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['appn_date']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime)
<?php
if ('' != $miniCalendarFA) {
?>
    .next('button').append("<?php echo $miniCalendarFA; ?>")
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    .next('button').append("<?php echo $miniCalendarButton[0]; ?>")
<?php
}
?>
    },
    onClose: function(dateText, inst) {
      do_ajax_form_clients_validate_appn_date(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['appn_date']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  })
<?php
if ('' != $miniCalendarFA) {
?>
    .next('button').append("<?php echo $miniCalendarFA; ?>")
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    .next('button').append("<?php echo $miniCalendarButton[0]; ?>")
<?php
}
?>
} // scJQCalendarAdd

function scJQUploadAdd(iSeqRow) {
  $("#id_sc_field_main_contact_img_id" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_clients_ul_save.php",
    dropZone: "",
    formData: function() {
      return [
        {name: 'param_field', value: 'main_contact_img_id'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_main_contact_img_id" + iSeqRow);
        loaderContent = $("#id_img_loader_main_contact_img_id" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_main_contact_img_id" + iSeqRow);
        loader.show();
      }
    },
    done: function(e, data) {
      var fileData, respData, respPos, respMsg, thumbDisplay, checkDisplay, var_ajax_img_thumb, oTemp;
      fileData = null;
      respMsg = "";
      if (data && data.result && data.result[0] && data.result[0].body) {
        respData = data.result[0].body.innerText;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = $.parseJSON(respData);
        }
        else {
          respMsg = respData;
        }
      }
      else {
        respData = data.result;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = eval(respData);
        }
        else {
          respMsg = respData;
        }
      }
      if (window.FormData !== undefined)
      {
        $("#id_img_loader_main_contact_img_id" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_main_contact_img_id" + iSeqRow).hide();
      }
      if (null == fileData) {
        if ("" != respMsg) {
          oTemp = {"htmOutput" : "<?php echo $this->Ini->Nm_lang['lang_errm_upld_admn']; ?>"};
          scAjaxShowDebug(oTemp);
        }
        return;
      }
      if (fileData[0].error && "" != fileData[0].error) {
        var uploadErrorMessage = "";
        oResp = {};
        if ("acceptFileTypes" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_invl']) ?>";
        }
        else if ("maxFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("minFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("emptyFile" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_empty']) ?>";
        }
        scAjaxShowErrorDisplay("table", uploadErrorMessage);
        return;
      }
      $("#id_sc_field_main_contact_img_id" + iSeqRow).val("");
      $("#id_sc_field_main_contact_img_id_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_main_contact_img_id_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_main_contact_img_id = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_main_contact_img_id) ? "none" : "";
      $("#id_ajax_img_main_contact_img_id" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_main_contact_img_id" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_main_contact_img_id) {
        document.F1.temp_out_main_contact_img_id.value = var_ajax_img_thumb;
        document.F1.temp_out1_main_contact_img_id.value = var_ajax_img_main_contact_img_id;
      }
      else if (document.F1.temp_out_main_contact_img_id) {
        document.F1.temp_out_main_contact_img_id.value = var_ajax_img_main_contact_img_id;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_main_contact_img_id" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_main_contact_img_id" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_main_contact_img_id" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_main_contact_img_id" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

  $("#id_sc_field_doc_sec_of_state" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_clients_ul_save.php",
    dropZone: $("#hidden_field_data_doc_sec_of_state" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'doc_sec_of_state'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_doc_sec_of_state" + iSeqRow);
        loaderContent = $("#id_img_loader_doc_sec_of_state" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_doc_sec_of_state" + iSeqRow);
        loader.show();
      }
    },
    done: function(e, data) {
      var fileData, respData, respPos, respMsg, thumbDisplay, checkDisplay, var_ajax_img_thumb, oTemp;
      fileData = null;
      respMsg = "";
      if (data && data.result && data.result[0] && data.result[0].body) {
        respData = data.result[0].body.innerText;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = $.parseJSON(respData);
        }
        else {
          respMsg = respData;
        }
      }
      else {
        respData = data.result;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = eval(respData);
        }
        else {
          respMsg = respData;
        }
      }
      if (window.FormData !== undefined)
      {
        $("#id_img_loader_doc_sec_of_state" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_doc_sec_of_state" + iSeqRow).hide();
      }
      if (null == fileData) {
        if ("" != respMsg) {
          oTemp = {"htmOutput" : "<?php echo $this->Ini->Nm_lang['lang_errm_upld_admn']; ?>"};
          scAjaxShowDebug(oTemp);
        }
        return;
      }
      if (fileData[0].error && "" != fileData[0].error) {
        var uploadErrorMessage = "";
        oResp = {};
        if ("acceptFileTypes" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_invl']) ?>";
        }
        else if ("maxFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("minFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("emptyFile" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_empty']) ?>";
        }
        scAjaxShowErrorDisplay("table", uploadErrorMessage);
        return;
      }
      $("#id_sc_field_doc_sec_of_state" + iSeqRow).val("");
      $("#id_sc_field_doc_sec_of_state_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_doc_sec_of_state_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_doc_sec_of_state = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_doc_sec_of_state) ? "none" : "";
      $("#id_ajax_img_doc_sec_of_state" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_doc_sec_of_state" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_doc_sec_of_state) {
        document.F1.temp_out_doc_sec_of_state.value = var_ajax_img_thumb;
        document.F1.temp_out1_doc_sec_of_state.value = var_ajax_img_doc_sec_of_state;
      }
      else if (document.F1.temp_out_doc_sec_of_state) {
        document.F1.temp_out_doc_sec_of_state.value = var_ajax_img_doc_sec_of_state;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_doc_sec_of_state" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_doc_sec_of_state" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_doc_sec_of_state" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_doc_sec_of_state" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

  $("#id_sc_field_doc_city_bus_lic" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_clients_ul_save.php",
    dropZone: $("#hidden_field_data_doc_city_bus_lic" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'doc_city_bus_lic'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_doc_city_bus_lic" + iSeqRow);
        loaderContent = $("#id_img_loader_doc_city_bus_lic" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_doc_city_bus_lic" + iSeqRow);
        loader.show();
      }
    },
    done: function(e, data) {
      var fileData, respData, respPos, respMsg, thumbDisplay, checkDisplay, var_ajax_img_thumb, oTemp;
      fileData = null;
      respMsg = "";
      if (data && data.result && data.result[0] && data.result[0].body) {
        respData = data.result[0].body.innerText;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = $.parseJSON(respData);
        }
        else {
          respMsg = respData;
        }
      }
      else {
        respData = data.result;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = eval(respData);
        }
        else {
          respMsg = respData;
        }
      }
      if (window.FormData !== undefined)
      {
        $("#id_img_loader_doc_city_bus_lic" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_doc_city_bus_lic" + iSeqRow).hide();
      }
      if (null == fileData) {
        if ("" != respMsg) {
          oTemp = {"htmOutput" : "<?php echo $this->Ini->Nm_lang['lang_errm_upld_admn']; ?>"};
          scAjaxShowDebug(oTemp);
        }
        return;
      }
      if (fileData[0].error && "" != fileData[0].error) {
        var uploadErrorMessage = "";
        oResp = {};
        if ("acceptFileTypes" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_invl']) ?>";
        }
        else if ("maxFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("minFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("emptyFile" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_empty']) ?>";
        }
        scAjaxShowErrorDisplay("table", uploadErrorMessage);
        return;
      }
      $("#id_sc_field_doc_city_bus_lic" + iSeqRow).val("");
      $("#id_sc_field_doc_city_bus_lic_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_doc_city_bus_lic_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_doc_city_bus_lic = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_doc_city_bus_lic) ? "none" : "";
      $("#id_ajax_img_doc_city_bus_lic" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_doc_city_bus_lic" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_doc_city_bus_lic) {
        document.F1.temp_out_doc_city_bus_lic.value = var_ajax_img_thumb;
        document.F1.temp_out1_doc_city_bus_lic.value = var_ajax_img_doc_city_bus_lic;
      }
      else if (document.F1.temp_out_doc_city_bus_lic) {
        document.F1.temp_out_doc_city_bus_lic.value = var_ajax_img_doc_city_bus_lic;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_doc_city_bus_lic" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_doc_city_bus_lic" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_doc_city_bus_lic" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_doc_city_bus_lic" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

  $("#id_sc_field_doc_agric_lic" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_clients_ul_save.php",
    dropZone: $("#hidden_field_data_doc_agric_lic" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'doc_agric_lic'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_doc_agric_lic" + iSeqRow);
        loaderContent = $("#id_img_loader_doc_agric_lic" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_doc_agric_lic" + iSeqRow);
        loader.show();
      }
    },
    done: function(e, data) {
      var fileData, respData, respPos, respMsg, thumbDisplay, checkDisplay, var_ajax_img_thumb, oTemp;
      fileData = null;
      respMsg = "";
      if (data && data.result && data.result[0] && data.result[0].body) {
        respData = data.result[0].body.innerText;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = $.parseJSON(respData);
        }
        else {
          respMsg = respData;
        }
      }
      else {
        respData = data.result;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = eval(respData);
        }
        else {
          respMsg = respData;
        }
      }
      if (window.FormData !== undefined)
      {
        $("#id_img_loader_doc_agric_lic" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_doc_agric_lic" + iSeqRow).hide();
      }
      if (null == fileData) {
        if ("" != respMsg) {
          oTemp = {"htmOutput" : "<?php echo $this->Ini->Nm_lang['lang_errm_upld_admn']; ?>"};
          scAjaxShowDebug(oTemp);
        }
        return;
      }
      if (fileData[0].error && "" != fileData[0].error) {
        var uploadErrorMessage = "";
        oResp = {};
        if ("acceptFileTypes" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_invl']) ?>";
        }
        else if ("maxFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("minFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("emptyFile" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_empty']) ?>";
        }
        scAjaxShowErrorDisplay("table", uploadErrorMessage);
        return;
      }
      $("#id_sc_field_doc_agric_lic" + iSeqRow).val("");
      $("#id_sc_field_doc_agric_lic_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_doc_agric_lic_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_doc_agric_lic = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_doc_agric_lic) ? "none" : "";
      $("#id_ajax_img_doc_agric_lic" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_doc_agric_lic" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_doc_agric_lic) {
        document.F1.temp_out_doc_agric_lic.value = var_ajax_img_thumb;
        document.F1.temp_out1_doc_agric_lic.value = var_ajax_img_doc_agric_lic;
      }
      else if (document.F1.temp_out_doc_agric_lic) {
        document.F1.temp_out_doc_agric_lic.value = var_ajax_img_doc_agric_lic;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_doc_agric_lic" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_doc_agric_lic" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_doc_agric_lic" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_doc_agric_lic" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

  $("#id_sc_field_doc_last_year_tax" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_clients_ul_save.php",
    dropZone: $("#hidden_field_data_doc_last_year_tax" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'doc_last_year_tax'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_doc_last_year_tax" + iSeqRow);
        loaderContent = $("#id_img_loader_doc_last_year_tax" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_doc_last_year_tax" + iSeqRow);
        loader.show();
      }
    },
    done: function(e, data) {
      var fileData, respData, respPos, respMsg, thumbDisplay, checkDisplay, var_ajax_img_thumb, oTemp;
      fileData = null;
      respMsg = "";
      if (data && data.result && data.result[0] && data.result[0].body) {
        respData = data.result[0].body.innerText;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = $.parseJSON(respData);
        }
        else {
          respMsg = respData;
        }
      }
      else {
        respData = data.result;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = eval(respData);
        }
        else {
          respMsg = respData;
        }
      }
      if (window.FormData !== undefined)
      {
        $("#id_img_loader_doc_last_year_tax" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_doc_last_year_tax" + iSeqRow).hide();
      }
      if (null == fileData) {
        if ("" != respMsg) {
          oTemp = {"htmOutput" : "<?php echo $this->Ini->Nm_lang['lang_errm_upld_admn']; ?>"};
          scAjaxShowDebug(oTemp);
        }
        return;
      }
      if (fileData[0].error && "" != fileData[0].error) {
        var uploadErrorMessage = "";
        oResp = {};
        if ("acceptFileTypes" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_invl']) ?>";
        }
        else if ("maxFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("minFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("emptyFile" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_empty']) ?>";
        }
        scAjaxShowErrorDisplay("table", uploadErrorMessage);
        return;
      }
      $("#id_sc_field_doc_last_year_tax" + iSeqRow).val("");
      $("#id_sc_field_doc_last_year_tax_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_doc_last_year_tax_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_doc_last_year_tax = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_doc_last_year_tax) ? "none" : "";
      $("#id_ajax_img_doc_last_year_tax" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_doc_last_year_tax" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_doc_last_year_tax) {
        document.F1.temp_out_doc_last_year_tax.value = var_ajax_img_thumb;
        document.F1.temp_out1_doc_last_year_tax.value = var_ajax_img_doc_last_year_tax;
      }
      else if (document.F1.temp_out_doc_last_year_tax) {
        document.F1.temp_out_doc_last_year_tax.value = var_ajax_img_doc_last_year_tax;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_doc_last_year_tax" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_doc_last_year_tax" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_doc_last_year_tax" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_doc_last_year_tax" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

} // scJQUploadAdd

var api_cache_requests = [];
function ajax_check_file(img_name, field  ,t, p, p_cache, iSeqRow, hasRun, img_before){
    setTimeout(function(){
        if(img_name == '') return;
        iSeqRow= iSeqRow !== undefined && iSeqRow !== null ? iSeqRow : '';
        var hasVar = p.indexOf('_@NM@_') > -1 || p_cache.indexOf('_@NM@_') > -1 ? true : false;

        p = p.split('_@NM@_');
        $.each(p, function(i,v){
            try{
                p[i] = $('[name='+v+iSeqRow+']').val();
            }
            catch(err){
                p[i] = v;
            }
        });
        p = p.join('');

        p_cache = p_cache.split('_@NM@_');
        $.each(p_cache, function(i,v){
            try{
                p_cache[i] = $('[name='+v+iSeqRow+']').val();
            }
            catch(err){
                p_cache[i] = v;
            }
        });
        p_cache = p_cache.join('');

        img_before = img_before !== undefined ? img_before : $(t).attr('src');
        var str_key_cache = '<?php echo $this->Ini->sc_page; ?>' + img_name+field+p+p_cache;
        if(api_cache_requests[ str_key_cache ] !== undefined && api_cache_requests[ str_key_cache ] !== null){
            if(api_cache_requests[ str_key_cache ] != false){
                do_ajax_check_file(api_cache_requests[ str_key_cache ], field  ,t, iSeqRow);
            }
            return;
        }
        //scAjaxProcOn();
        $(t).attr('src', '<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif');
        api_cache_requests[ str_key_cache ] = false;
        var rs =$.ajax({
                    type: "POST",
                    url: 'index.php?script_case_init=<?php echo $this->Ini->sc_page; ?>',
                    async: true,
                    data:'nmgp_opcao=ajax_check_file&AjaxCheckImg=' + encodeURI(img_name) +'&rsargs='+ field + '&p=' + p + '&p_cache=' + p_cache,
                    success: function (rs) {
                        if(rs.indexOf('</span>') != -1){
                            rs = rs.substr(rs.indexOf('</span>') + 7);
                        }
                        if(rs.indexOf('/') != -1 && rs.indexOf('/') != 0){
                            rs = rs.substr(rs.indexOf('/'));
                        }
                        rs = sc_trim(rs);

                        // if(rs == 0 && hasVar && hasRun === undefined){
                        //     delete window.api_cache_requests[ str_key_cache ];
                        //     ajax_check_file(img_name, field  ,t, p, p_cache, iSeqRow, 1, img_before);
                        //     return;
                        // }
                        window.api_cache_requests[ str_key_cache ] = rs;
                        do_ajax_check_file(rs, field  ,t, iSeqRow)
                        if(rs == 0){
                            delete window.api_cache_requests[ str_key_cache ];

                           // $(t).attr('src',img_before);
                            do_ajax_check_file(img_before+'_@@NM@@_' + img_before, field  ,t, iSeqRow)

                        }


                    }
        });
    },100);
}

function do_ajax_check_file(rs, field  ,t, iSeqRow){
    if (rs != 0) {
        rs_split = rs.split('_@@NM@@_');
        rs_orig = rs_split[0];
        rs2 = rs_split[1];
        try{
            if(!$(t).is('img')){

                if($('#id_read_on_'+field+iSeqRow).length > 0 ){
                                    var usa_read_only = false;

                switch(field){

                }
                     if(usa_read_only && $('a',$('#id_read_on_'+field+iSeqRow)).length == 0){
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_clients')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
                     }
                }
                if($('#id_ajax_doc_'+field+iSeqRow+' a').length > 0){
                    var target = $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href').split(',');
                    target[1] = "'"+rs2+"'";
                    $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href', target.join(','));
                }else{
                    var target = $(t).attr('href').split(',');
                     target[1] = "'"+rs2+"'";
                     $(t).attr('href', target.join(','));
                }
            }else{
                $(t).attr('src', rs2);
                $(t).css('display', '');
                if($('#id_ajax_doc_'+field+iSeqRow+' a').length > 0){
                    var target = $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href').split(',');
                    target[1] = "'"+rs2+"'";
                    $(t).attr('href', target.join(','));
                }else{
                     var t_link = $(t).parent('a');
                     var target = $(t_link).attr('href').split(',');
                     target[0] = "javascript:nm_mostra_img('"+rs_orig+"'";
                     $(t_link).attr('href', target.join(','));
                }

            }
            eval("window.var_ajax_img_"+field+iSeqRow+" = '"+rs_orig+"';");

        } catch(err){
                        eval("window.var_ajax_img_"+field+iSeqRow+" = '"+rs_orig+"';");

        }
    }
   /* hasFalseCacheRequest = false;
    $.each(api_cache_requests, function(i,v){
        if(v == false){
            hasFalseCacheRequest = true;
        }
    });
    if(hasFalseCacheRequest == false){
        scAjaxProcOff();
    }*/
}

$(document).ready(function(){
});

function scJQPasswordToggleAdd(seqRow) {
  $(".sc-ui-pwd-toggle-icon" + seqRow).on("click", function() {
    var fieldName = $(this).attr("id").substr(17), fieldObj = $("#id_sc_field_" + fieldName), fieldFA = $("#id_pwd_fa_" + fieldName);
    if ("text" == fieldObj.attr("type")) {
      fieldObj.attr("type", "password");
      fieldFA.attr("class", "fa fa-eye sc-ui-pwd-eye");
    } else {
      fieldObj.attr("type", "text");
      fieldFA.attr("class", "fa fa-eye-slash sc-ui-pwd-eye");
    }
  });
} // scJQPasswordToggleAdd

function scJQSelect2Add(seqRow, specificField) {
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
} // scJQElementsAdd

function scGetFileExtension(fileName)
{
    fileNameParts = fileName.split(".");

    if (1 === fileNameParts.length || (2 === fileNameParts.length && "" == fileNameParts[0])) {
        return "";
    }

    return fileNameParts.pop().toLowerCase();
}

function scFormatExtensionSizeErrorMsg(errorMsg)
{
    var msgInfo = errorMsg.split("||"), returnMsg = "";

    if ("err_size" == msgInfo[0]) {
        returnMsg = "<?php echo $this->Ini->Nm_lang['lang_errm_file_size'] ?>. <?php echo $this->Ini->Nm_lang['lang_errm_file_size_extension'] ?>".replace("{SC_EXTENSION}", msgInfo[1]).replace("{SC_LIMIT}", msgInfo[2]);
    } else if ("err_extension" == msgInfo[0]) {
        returnMsg = "<?php echo $this->Ini->Nm_lang['lang_errm_file_invl'] ?>";
    }

    return returnMsg;
}

