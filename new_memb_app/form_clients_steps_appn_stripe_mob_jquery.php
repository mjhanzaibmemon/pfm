
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

  if ($oField.length > 0) {
    switch ($oField[0].name) {
      case 'dummy02':
      case 'dummy03':
      case 'co_name':
      case 'client_id':
      case 'mailing_address':
      case 'appn_date':
      case 'city':
      case 'pricing_level_id':
      case 'state':
      case 'bus_cat_id':
      case 'zip_code':
      case 'bus_subcat_id':
      case 'website_url':
      case 'bus_subcat_other':
      case 'acct_facebook':
      case 'acct_instagram':
      case 'dummy04':
      case 'dummy05':
      case 'memb_levels':
      case 'dummy07':
      case 'dummy08':
      case 'main_contact_name':
      case 'main_contact_phone':
      case 'main_contact_email':
      case 'main_contact_title':
      case 'main_contact_img_id':
        break;
      case 'doc_type':
      case 'doc_file':
      case 'appn_note':
        break;
      case 'memb_list':
        break;
      case 'est_memb_cost':
      case 'rules':
      case 'memb_qty':
      case 'read_at_sign':
      case 'applicant_name':
      case 'applicant_title':
      case 'js_strp_price_id':
      case 'js_prod_price':
      case 'js_mbr_ct':
      case 'js_client_id':
      case 'applicant_signature':
        break;
    }
  }

  if ($("#id_ac_" + sField).length > 0) {
    if ($oField.hasClass("select2-hidden-accessible")) {
      if (false == scSetFocusOnField($oField, sField)) {
        setTimeout(function() { scSetFocusOnField($oField, sField); }, 500);
      }
    }
    else {
      if (false == scSetFocusOnField($oField, sField)) {
        if (false == scSetFocusOnField($("#id_ac_" + sField, sField))) {
          setTimeout(function() { scSetFocusOnField($("#id_ac_" + sField, sField)); }, 500);
        }
      }
      else {
        setTimeout(function() { scSetFocusOnField($oField, sField); }, 500);
      }
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField, sField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField, sField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["dummy02" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dummy03" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["co_name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["client_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["mailing_address" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["appn_date" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["city" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pricing_level_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["state" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["bus_cat_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["zip_code" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["bus_subcat_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["website_url" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["bus_subcat_other" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["acct_facebook" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["acct_instagram" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dummy04" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dummy05" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["memb_levels" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dummy07" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dummy08" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["main_contact_name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["main_contact_phone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["main_contact_email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["main_contact_title" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["main_contact_img_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["doc_type" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["doc_file" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["appn_note" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["memb_list" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["est_memb_cost" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rules" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["memb_qty" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["read_at_sign" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["applicant_name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["applicant_title" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["js_strp_price_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["js_prod_price" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["js_mbr_ct" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["js_client_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["applicant_signature" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["dummy02" + iSeqRow] && scEventControl_data["dummy02" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dummy02" + iSeqRow] && scEventControl_data["dummy02" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dummy03" + iSeqRow] && scEventControl_data["dummy03" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dummy03" + iSeqRow] && scEventControl_data["dummy03" + iSeqRow]["change"]) {
    return true;
  }
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
  if (scEventControl_data["appn_date" + iSeqRow] && scEventControl_data["appn_date" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["appn_date" + iSeqRow] && scEventControl_data["appn_date" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["city" + iSeqRow] && scEventControl_data["city" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["city" + iSeqRow] && scEventControl_data["city" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pricing_level_id" + iSeqRow] && scEventControl_data["pricing_level_id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pricing_level_id" + iSeqRow] && scEventControl_data["pricing_level_id" + iSeqRow]["change"]) {
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
  if (scEventControl_data["website_url" + iSeqRow] && scEventControl_data["website_url" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["website_url" + iSeqRow] && scEventControl_data["website_url" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["bus_subcat_other" + iSeqRow] && scEventControl_data["bus_subcat_other" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bus_subcat_other" + iSeqRow] && scEventControl_data["bus_subcat_other" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["acct_facebook" + iSeqRow] && scEventControl_data["acct_facebook" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["acct_facebook" + iSeqRow] && scEventControl_data["acct_facebook" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["acct_instagram" + iSeqRow] && scEventControl_data["acct_instagram" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["acct_instagram" + iSeqRow] && scEventControl_data["acct_instagram" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dummy04" + iSeqRow] && scEventControl_data["dummy04" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dummy04" + iSeqRow] && scEventControl_data["dummy04" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dummy05" + iSeqRow] && scEventControl_data["dummy05" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dummy05" + iSeqRow] && scEventControl_data["dummy05" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["memb_levels" + iSeqRow] && scEventControl_data["memb_levels" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["memb_levels" + iSeqRow] && scEventControl_data["memb_levels" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dummy07" + iSeqRow] && scEventControl_data["dummy07" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dummy07" + iSeqRow] && scEventControl_data["dummy07" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dummy08" + iSeqRow] && scEventControl_data["dummy08" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dummy08" + iSeqRow] && scEventControl_data["dummy08" + iSeqRow]["change"]) {
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
  if (scEventControl_data["doc_type" + iSeqRow] && scEventControl_data["doc_type" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["doc_type" + iSeqRow] && scEventControl_data["doc_type" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["appn_note" + iSeqRow] && scEventControl_data["appn_note" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["appn_note" + iSeqRow] && scEventControl_data["appn_note" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["memb_list" + iSeqRow] && scEventControl_data["memb_list" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["memb_list" + iSeqRow] && scEventControl_data["memb_list" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["est_memb_cost" + iSeqRow] && scEventControl_data["est_memb_cost" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["est_memb_cost" + iSeqRow] && scEventControl_data["est_memb_cost" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rules" + iSeqRow] && scEventControl_data["rules" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rules" + iSeqRow] && scEventControl_data["rules" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["memb_qty" + iSeqRow] && scEventControl_data["memb_qty" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["memb_qty" + iSeqRow] && scEventControl_data["memb_qty" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["read_at_sign" + iSeqRow] && scEventControl_data["read_at_sign" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["read_at_sign" + iSeqRow] && scEventControl_data["read_at_sign" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["applicant_name" + iSeqRow] && scEventControl_data["applicant_name" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["applicant_name" + iSeqRow] && scEventControl_data["applicant_name" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["applicant_title" + iSeqRow] && scEventControl_data["applicant_title" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["applicant_title" + iSeqRow] && scEventControl_data["applicant_title" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["js_strp_price_id" + iSeqRow] && scEventControl_data["js_strp_price_id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["js_strp_price_id" + iSeqRow] && scEventControl_data["js_strp_price_id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["js_prod_price" + iSeqRow] && scEventControl_data["js_prod_price" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["js_prod_price" + iSeqRow] && scEventControl_data["js_prod_price" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["js_mbr_ct" + iSeqRow] && scEventControl_data["js_mbr_ct" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["js_mbr_ct" + iSeqRow] && scEventControl_data["js_mbr_ct" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["js_client_id" + iSeqRow] && scEventControl_data["js_client_id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["js_client_id" + iSeqRow] && scEventControl_data["js_client_id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["applicant_signature" + iSeqRow] && scEventControl_data["applicant_signature" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["applicant_signature" + iSeqRow] && scEventControl_data["applicant_signature" + iSeqRow]["change"]) {
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
  if ("bus_cat_id" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("bus_subcat_id" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("type_company" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("bus_cat_id" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("bus_subcat_id" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("main_contact_email" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("main_contact_name" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("main_contact_phone" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("main_contact_title" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("memb_qty" + iSeq == fieldName) {
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
  $('#id_sc_field_client_id' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_client_id_onblur('#id_sc_field_client_id' + iSeqRow, iSeqRow) })
                                       .bind('focus', function() { sc_form_clients_steps_appn_stripe_client_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_co_name' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_co_name_onblur('#id_sc_field_co_name' + iSeqRow, iSeqRow) })
                                     .bind('focus', function() { sc_form_clients_steps_appn_stripe_co_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_mailing_address' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_mailing_address_onblur('#id_sc_field_mailing_address' + iSeqRow, iSeqRow) })
                                             .bind('focus', function() { sc_form_clients_steps_appn_stripe_mailing_address_onfocus(this, iSeqRow) });
  $('#id_sc_field_city' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_city_onblur('#id_sc_field_city' + iSeqRow, iSeqRow) })
                                  .bind('focus', function() { sc_form_clients_steps_appn_stripe_city_onfocus(this, iSeqRow) });
  $('#id_sc_field_state' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_state_onblur('#id_sc_field_state' + iSeqRow, iSeqRow) })
                                   .bind('focus', function() { sc_form_clients_steps_appn_stripe_state_onfocus(this, iSeqRow) });
  $('#id_sc_field_zip_code' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_zip_code_onblur('#id_sc_field_zip_code' + iSeqRow, iSeqRow) })
                                      .bind('focus', function() { sc_form_clients_steps_appn_stripe_zip_code_onfocus(this, iSeqRow) });
  $('#id_sc_field_pricing_level_id' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_pricing_level_id_onblur('#id_sc_field_pricing_level_id' + iSeqRow, iSeqRow) })
                                              .bind('focus', function() { sc_form_clients_steps_appn_stripe_pricing_level_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_acct_instagram' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_acct_instagram_onblur('#id_sc_field_acct_instagram' + iSeqRow, iSeqRow) })
                                            .bind('focus', function() { sc_form_clients_steps_appn_stripe_acct_instagram_onfocus(this, iSeqRow) });
  $('#id_sc_field_acct_facebook' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_acct_facebook_onblur('#id_sc_field_acct_facebook' + iSeqRow, iSeqRow) })
                                           .bind('focus', function() { sc_form_clients_steps_appn_stripe_acct_facebook_onfocus(this, iSeqRow) });
  $('#id_sc_field_website_url' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_website_url_onblur('#id_sc_field_website_url' + iSeqRow, iSeqRow) })
                                         .bind('focus', function() { sc_form_clients_steps_appn_stripe_website_url_onfocus(this, iSeqRow) });
  $('#id_sc_field_bus_cat_id' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_bus_cat_id_onblur('#id_sc_field_bus_cat_id' + iSeqRow, iSeqRow) })
                                        .bind('change', function() { sc_form_clients_steps_appn_stripe_bus_cat_id_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_clients_steps_appn_stripe_bus_cat_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_bus_subcat_id' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_bus_subcat_id_onblur('#id_sc_field_bus_subcat_id' + iSeqRow, iSeqRow) })
                                           .bind('change', function() { sc_form_clients_steps_appn_stripe_bus_subcat_id_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_clients_steps_appn_stripe_bus_subcat_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_bus_subcat_other' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_bus_subcat_other_onblur('#id_sc_field_bus_subcat_other' + iSeqRow, iSeqRow) })
                                              .bind('focus', function() { sc_form_clients_steps_appn_stripe_bus_subcat_other_onfocus(this, iSeqRow) });
  $('#id_sc_field_appn_date' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_appn_date_onblur('#id_sc_field_appn_date' + iSeqRow, iSeqRow) })
                                       .bind('focus', function() { sc_form_clients_steps_appn_stripe_appn_date_onfocus(this, iSeqRow) });
  $('#id_sc_field_appn_note' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_appn_note_onblur('#id_sc_field_appn_note' + iSeqRow, iSeqRow) })
                                       .bind('focus', function() { sc_form_clients_steps_appn_stripe_appn_note_onfocus(this, iSeqRow) });
  $('#id_sc_field_doc_type' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_doc_type_onblur('#id_sc_field_doc_type' + iSeqRow, iSeqRow) })
                                      .bind('focus', function() { sc_form_clients_steps_appn_stripe_doc_type_onfocus(this, iSeqRow) });
  $('#id_sc_field_doc_file' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_doc_file_onblur('#id_sc_field_doc_file' + iSeqRow, iSeqRow) })
                                      .bind('focus', function() { sc_form_clients_steps_appn_stripe_doc_file_onfocus(this, iSeqRow) });
  $('#id_sc_field_applicant_name' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_applicant_name_onblur('#id_sc_field_applicant_name' + iSeqRow, iSeqRow) })
                                            .bind('focus', function() { sc_form_clients_steps_appn_stripe_applicant_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_applicant_signature' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_applicant_signature_onblur('#id_sc_field_applicant_signature' + iSeqRow, iSeqRow) })
                                                 .bind('focus', function() { sc_form_clients_steps_appn_stripe_applicant_signature_onfocus(this, iSeqRow) });
  $('#id_sc_field_applicant_title' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_applicant_title_onblur('#id_sc_field_applicant_title' + iSeqRow, iSeqRow) })
                                             .bind('focus', function() { sc_form_clients_steps_appn_stripe_applicant_title_onfocus(this, iSeqRow) });
  $('#id_sc_field_main_contact_name' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_main_contact_name_onblur('#id_sc_field_main_contact_name' + iSeqRow, iSeqRow) })
                                               .bind('change', function() { sc_form_clients_steps_appn_stripe_main_contact_name_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_clients_steps_appn_stripe_main_contact_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_main_contact_phone' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_main_contact_phone_onblur('#id_sc_field_main_contact_phone' + iSeqRow, iSeqRow) })
                                                .bind('change', function() { sc_form_clients_steps_appn_stripe_main_contact_phone_onchange(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_clients_steps_appn_stripe_main_contact_phone_onfocus(this, iSeqRow) });
  $('#id_sc_field_main_contact_email' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_main_contact_email_onblur('#id_sc_field_main_contact_email' + iSeqRow, iSeqRow) })
                                                .bind('change', function() { sc_form_clients_steps_appn_stripe_main_contact_email_onchange(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_clients_steps_appn_stripe_main_contact_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_main_contact_title' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_main_contact_title_onblur('#id_sc_field_main_contact_title' + iSeqRow, iSeqRow) })
                                                .bind('change', function() { sc_form_clients_steps_appn_stripe_main_contact_title_onchange(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_clients_steps_appn_stripe_main_contact_title_onfocus(this, iSeqRow) });
  $('#id_sc_field_main_contact_img_id' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_main_contact_img_id_onblur('#id_sc_field_main_contact_img_id' + iSeqRow, iSeqRow) })
                                                 .bind('focus', function() { sc_form_clients_steps_appn_stripe_main_contact_img_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_memb_qty' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_memb_qty_onblur('#id_sc_field_memb_qty' + iSeqRow, iSeqRow) })
                                      .bind('change', function() { sc_form_clients_steps_appn_stripe_memb_qty_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_clients_steps_appn_stripe_memb_qty_onfocus(this, iSeqRow) });
  $('#id_sc_field_dummy02' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_dummy02_onblur('#id_sc_field_dummy02' + iSeqRow, iSeqRow) })
                                     .bind('focus', function() { sc_form_clients_steps_appn_stripe_dummy02_onfocus(this, iSeqRow) });
  $('#id_sc_field_dummy03' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_dummy03_onblur('#id_sc_field_dummy03' + iSeqRow, iSeqRow) })
                                     .bind('focus', function() { sc_form_clients_steps_appn_stripe_dummy03_onfocus(this, iSeqRow) });
  $('#id_sc_field_dummy04' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_dummy04_onblur('#id_sc_field_dummy04' + iSeqRow, iSeqRow) })
                                     .bind('focus', function() { sc_form_clients_steps_appn_stripe_dummy04_onfocus(this, iSeqRow) });
  $('#id_sc_field_dummy05' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_dummy05_onblur('#id_sc_field_dummy05' + iSeqRow, iSeqRow) })
                                     .bind('focus', function() { sc_form_clients_steps_appn_stripe_dummy05_onfocus(this, iSeqRow) });
  $('#id_sc_field_dummy07' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_dummy07_onblur('#id_sc_field_dummy07' + iSeqRow, iSeqRow) })
                                     .bind('focus', function() { sc_form_clients_steps_appn_stripe_dummy07_onfocus(this, iSeqRow) });
  $('#id_sc_field_dummy08' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_dummy08_onblur('#id_sc_field_dummy08' + iSeqRow, iSeqRow) })
                                     .bind('focus', function() { sc_form_clients_steps_appn_stripe_dummy08_onfocus(this, iSeqRow) });
  $('#id_sc_field_est_memb_cost' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_est_memb_cost_onblur('#id_sc_field_est_memb_cost' + iSeqRow, iSeqRow) })
                                           .bind('focus', function() { sc_form_clients_steps_appn_stripe_est_memb_cost_onfocus(this, iSeqRow) });
  $('#id_sc_field_memb_levels' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_memb_levels_onblur('#id_sc_field_memb_levels' + iSeqRow, iSeqRow) })
                                         .bind('focus', function() { sc_form_clients_steps_appn_stripe_memb_levels_onfocus(this, iSeqRow) });
  $('#id_sc_field_memb_list' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_memb_list_onblur('#id_sc_field_memb_list' + iSeqRow, iSeqRow) })
                                       .bind('focus', function() { sc_form_clients_steps_appn_stripe_memb_list_onfocus(this, iSeqRow) });
  $('#id_sc_field_read_at_sign' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_read_at_sign_onblur('#id_sc_field_read_at_sign' + iSeqRow, iSeqRow) })
                                          .bind('focus', function() { sc_form_clients_steps_appn_stripe_read_at_sign_onfocus(this, iSeqRow) });
  $('#id_sc_field_rules' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_rules_onblur('#id_sc_field_rules' + iSeqRow, iSeqRow) })
                                   .bind('focus', function() { sc_form_clients_steps_appn_stripe_rules_onfocus(this, iSeqRow) });
  $('#id_sc_field_js_strp_price_id' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_js_strp_price_id_onblur('#id_sc_field_js_strp_price_id' + iSeqRow, iSeqRow) })
                                              .bind('focus', function() { sc_form_clients_steps_appn_stripe_js_strp_price_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_js_prod_price' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_js_prod_price_onblur('#id_sc_field_js_prod_price' + iSeqRow, iSeqRow) })
                                           .bind('focus', function() { sc_form_clients_steps_appn_stripe_js_prod_price_onfocus(this, iSeqRow) });
  $('#id_sc_field_js_mbr_ct' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_js_mbr_ct_onblur('#id_sc_field_js_mbr_ct' + iSeqRow, iSeqRow) })
                                       .bind('focus', function() { sc_form_clients_steps_appn_stripe_js_mbr_ct_onfocus(this, iSeqRow) });
  $('#id_sc_field_js_client_id' + iSeqRow).bind('blur', function() { sc_form_clients_steps_appn_stripe_js_client_id_onblur('#id_sc_field_js_client_id' + iSeqRow, iSeqRow) })
                                          .bind('focus', function() { sc_form_clients_steps_appn_stripe_js_client_id_onfocus(this, iSeqRow) });
  $('.sc-ui-checkbox-doc_type' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-archive' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-paid' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_form_clients_steps_appn_stripe_client_id_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_client_id();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_client_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_co_name_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_co_name();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_co_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_mailing_address_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_mailing_address();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_mailing_address_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_city_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_city();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_city_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_state_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_state();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_state_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_zip_code_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_zip_code();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_zip_code_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_pricing_level_id_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_pricing_level_id();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_pricing_level_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_acct_instagram_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_acct_instagram();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_acct_instagram_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_acct_facebook_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_acct_facebook();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_acct_facebook_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_website_url_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_website_url();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_website_url_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_bus_cat_id_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_bus_cat_id();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_bus_cat_id_onchange(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_event_bus_cat_id_onchange();
}

function sc_form_clients_steps_appn_stripe_bus_cat_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_bus_subcat_id_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_bus_subcat_id();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_bus_subcat_id_onchange(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_event_bus_subcat_id_onchange();
}

function sc_form_clients_steps_appn_stripe_bus_subcat_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_bus_subcat_other_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_bus_subcat_other();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_bus_subcat_other_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_appn_date_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_appn_date();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_appn_date_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_appn_note_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_appn_note();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_appn_note_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_doc_type_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_doc_type();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_doc_type_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_doc_file_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_doc_file_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_applicant_name_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_applicant_name();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_applicant_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_applicant_signature_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_applicant_signature();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_applicant_signature_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_applicant_title_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_applicant_title();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_applicant_title_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_main_contact_name_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_main_contact_name();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_main_contact_name_onchange(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_event_main_contact_name_onchange();
}

function sc_form_clients_steps_appn_stripe_main_contact_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_main_contact_phone_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_main_contact_phone();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_main_contact_phone_onchange(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_event_main_contact_phone_onchange();
}

function sc_form_clients_steps_appn_stripe_main_contact_phone_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_main_contact_email_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_main_contact_email();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_main_contact_email_onchange(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_event_main_contact_email_onchange();
}

function sc_form_clients_steps_appn_stripe_main_contact_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_main_contact_title_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_main_contact_title();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_main_contact_title_onchange(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_event_main_contact_title_onchange();
}

function sc_form_clients_steps_appn_stripe_main_contact_title_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_main_contact_img_id_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_main_contact_img_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_memb_qty_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_memb_qty();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_memb_qty_onchange(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_event_memb_qty_onchange();
}

function sc_form_clients_steps_appn_stripe_memb_qty_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_dummy02_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_dummy02();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_dummy02_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_dummy03_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_dummy03();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_dummy03_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_dummy04_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_dummy04();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_dummy04_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_dummy05_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_dummy05();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_dummy05_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_dummy07_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_dummy07();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_dummy07_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_dummy08_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_dummy08();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_dummy08_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_est_memb_cost_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_est_memb_cost();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_est_memb_cost_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_memb_levels_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_memb_levels();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_memb_levels_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_memb_list_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_memb_list();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_memb_list_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_read_at_sign_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_read_at_sign();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_read_at_sign_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_rules_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_rules();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_rules_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_js_strp_price_id_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_js_strp_price_id();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_js_strp_price_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_js_prod_price_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_js_prod_price();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_js_prod_price_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_js_mbr_ct_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_js_mbr_ct();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_js_mbr_ct_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_appn_stripe_js_client_id_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_appn_stripe_mob_validate_js_client_id();
  scCssBlur(oThis);
}

function sc_form_clients_steps_appn_stripe_js_client_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_page(page, status) {
        if ("0" == page) {
                displayChange_page_0(status);
        }
        if ("1" == page) {
                displayChange_page_1(status);
        }
        if ("2" == page) {
                displayChange_page_2(status);
        }
        if ("3" == page) {
                displayChange_page_3(status);
        }
}

function displayChange_page_0(status) {
        displayChange_block("0", status);
        displayChange_block("1", status);
        displayChange_block("2", status);
}

function displayChange_page_1(status) {
        displayChange_block("3", status);
        displayChange_block("4", status);
}

function displayChange_page_2(status) {
        displayChange_block("5", status);
}

function displayChange_page_3(status) {
        displayChange_block("6", status);
        displayChange_block("7", status);
        displayChange_block("8", status);
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
        if ("5" == block) {
                displayChange_block_5(status);
        }
        if ("6" == block) {
                displayChange_block_6(status);
        }
        if ("7" == block) {
                displayChange_block_7(status);
        }
        if ("8" == block) {
                displayChange_block_8(status);
        }
}

function displayChange_block_0(status) {
        displayChange_field("dummy02", "", status);
        displayChange_field("dummy03", "", status);
        displayChange_field("co_name", "", status);
        displayChange_field("client_id", "", status);
        displayChange_field("mailing_address", "", status);
        displayChange_field("appn_date", "", status);
        displayChange_field("city", "", status);
        displayChange_field("pricing_level_id", "", status);
        displayChange_field("state", "", status);
        displayChange_field("bus_cat_id", "", status);
        displayChange_field("zip_code", "", status);
        displayChange_field("bus_subcat_id", "", status);
        displayChange_field("website_url", "", status);
        displayChange_field("bus_subcat_other", "", status);
        displayChange_field("acct_facebook", "", status);
        displayChange_field("acct_instagram", "", status);
        displayChange_field("dummy04", "", status);
        displayChange_field("dummy05", "", status);
}

function displayChange_block_1(status) {
        displayChange_field("memb_levels", "", status);
}

function displayChange_block_2(status) {
        displayChange_field("dummy07", "", status);
        displayChange_field("dummy08", "", status);
        displayChange_field("main_contact_name", "", status);
        displayChange_field("main_contact_phone", "", status);
        displayChange_field("main_contact_email", "", status);
        displayChange_field("main_contact_title", "", status);
        displayChange_field("main_contact_img_id", "", status);
}

function displayChange_block_3(status) {
        displayChange_field("doc_type", "", status);
        displayChange_field("doc_file", "", status);
}

function displayChange_block_4(status) {
        displayChange_field("appn_note", "", status);
}

function displayChange_block_5(status) {
        displayChange_field("memb_list", "", status);
}

function displayChange_block_6(status) {
        displayChange_field("est_memb_cost", "", status);
        displayChange_field("rules", "", status);
        displayChange_field("memb_qty", "", status);
        displayChange_field("read_at_sign", "", status);
}

function displayChange_block_7(status) {
        displayChange_field("applicant_name", "", status);
        displayChange_field("applicant_title", "", status);
        displayChange_field("js_strp_price_id", "", status);
        displayChange_field("js_prod_price", "", status);
        displayChange_field("js_mbr_ct", "", status);
        displayChange_field("js_client_id", "", status);
}

function displayChange_block_8(status) {
        displayChange_field("applicant_signature", "", status);
}

function displayChange_row(row, status) {
        displayChange_field_dummy02(row, status);
        displayChange_field_dummy03(row, status);
        displayChange_field_co_name(row, status);
        displayChange_field_client_id(row, status);
        displayChange_field_mailing_address(row, status);
        displayChange_field_appn_date(row, status);
        displayChange_field_city(row, status);
        displayChange_field_pricing_level_id(row, status);
        displayChange_field_state(row, status);
        displayChange_field_bus_cat_id(row, status);
        displayChange_field_zip_code(row, status);
        displayChange_field_bus_subcat_id(row, status);
        displayChange_field_website_url(row, status);
        displayChange_field_bus_subcat_other(row, status);
        displayChange_field_acct_facebook(row, status);
        displayChange_field_acct_instagram(row, status);
        displayChange_field_dummy04(row, status);
        displayChange_field_dummy05(row, status);
        displayChange_field_memb_levels(row, status);
        displayChange_field_dummy07(row, status);
        displayChange_field_dummy08(row, status);
        displayChange_field_main_contact_name(row, status);
        displayChange_field_main_contact_phone(row, status);
        displayChange_field_main_contact_email(row, status);
        displayChange_field_main_contact_title(row, status);
        displayChange_field_main_contact_img_id(row, status);
        displayChange_field_doc_type(row, status);
        displayChange_field_doc_file(row, status);
        displayChange_field_appn_note(row, status);
        displayChange_field_memb_list(row, status);
        displayChange_field_est_memb_cost(row, status);
        displayChange_field_rules(row, status);
        displayChange_field_memb_qty(row, status);
        displayChange_field_read_at_sign(row, status);
        displayChange_field_applicant_name(row, status);
        displayChange_field_applicant_title(row, status);
        displayChange_field_js_strp_price_id(row, status);
        displayChange_field_js_prod_price(row, status);
        displayChange_field_js_mbr_ct(row, status);
        displayChange_field_js_client_id(row, status);
        displayChange_field_applicant_signature(row, status);
}

function displayChange_field(field, row, status) {
        if ("dummy02" == field) {
                displayChange_field_dummy02(row, status);
        }
        if ("dummy03" == field) {
                displayChange_field_dummy03(row, status);
        }
        if ("co_name" == field) {
                displayChange_field_co_name(row, status);
        }
        if ("client_id" == field) {
                displayChange_field_client_id(row, status);
        }
        if ("mailing_address" == field) {
                displayChange_field_mailing_address(row, status);
        }
        if ("appn_date" == field) {
                displayChange_field_appn_date(row, status);
        }
        if ("city" == field) {
                displayChange_field_city(row, status);
        }
        if ("pricing_level_id" == field) {
                displayChange_field_pricing_level_id(row, status);
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
        if ("website_url" == field) {
                displayChange_field_website_url(row, status);
        }
        if ("bus_subcat_other" == field) {
                displayChange_field_bus_subcat_other(row, status);
        }
        if ("acct_facebook" == field) {
                displayChange_field_acct_facebook(row, status);
        }
        if ("acct_instagram" == field) {
                displayChange_field_acct_instagram(row, status);
        }
        if ("dummy04" == field) {
                displayChange_field_dummy04(row, status);
        }
        if ("dummy05" == field) {
                displayChange_field_dummy05(row, status);
        }
        if ("memb_levels" == field) {
                displayChange_field_memb_levels(row, status);
        }
        if ("dummy07" == field) {
                displayChange_field_dummy07(row, status);
        }
        if ("dummy08" == field) {
                displayChange_field_dummy08(row, status);
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
        if ("doc_type" == field) {
                displayChange_field_doc_type(row, status);
        }
        if ("doc_file" == field) {
                displayChange_field_doc_file(row, status);
        }
        if ("appn_note" == field) {
                displayChange_field_appn_note(row, status);
        }
        if ("memb_list" == field) {
                displayChange_field_memb_list(row, status);
        }
        if ("est_memb_cost" == field) {
                displayChange_field_est_memb_cost(row, status);
        }
        if ("rules" == field) {
                displayChange_field_rules(row, status);
        }
        if ("memb_qty" == field) {
                displayChange_field_memb_qty(row, status);
        }
        if ("read_at_sign" == field) {
                displayChange_field_read_at_sign(row, status);
        }
        if ("applicant_name" == field) {
                displayChange_field_applicant_name(row, status);
        }
        if ("applicant_title" == field) {
                displayChange_field_applicant_title(row, status);
        }
        if ("js_strp_price_id" == field) {
                displayChange_field_js_strp_price_id(row, status);
        }
        if ("js_prod_price" == field) {
                displayChange_field_js_prod_price(row, status);
        }
        if ("js_mbr_ct" == field) {
                displayChange_field_js_mbr_ct(row, status);
        }
        if ("js_client_id" == field) {
                displayChange_field_js_client_id(row, status);
        }
        if ("applicant_signature" == field) {
                displayChange_field_applicant_signature(row, status);
        }
}

function displayChange_field_dummy02(row, status) {
    var fieldId;
}

function displayChange_field_dummy03(row, status) {
    var fieldId;
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

function displayChange_field_appn_date(row, status) {
    var fieldId;
}

function displayChange_field_city(row, status) {
    var fieldId;
}

function displayChange_field_pricing_level_id(row, status) {
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

function displayChange_field_website_url(row, status) {
    var fieldId;
}

function displayChange_field_bus_subcat_other(row, status) {
    var fieldId;
}

function displayChange_field_acct_facebook(row, status) {
    var fieldId;
}

function displayChange_field_acct_instagram(row, status) {
    var fieldId;
}

function displayChange_field_dummy04(row, status) {
    var fieldId;
}

function displayChange_field_dummy05(row, status) {
    var fieldId;
}

function displayChange_field_memb_levels(row, status) {
    var fieldId;
}

function displayChange_field_dummy07(row, status) {
    var fieldId;
}

function displayChange_field_dummy08(row, status) {
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

function displayChange_field_doc_type(row, status) {
    var fieldId;
}

function displayChange_field_doc_file(row, status) {
    var fieldId;
}

function displayChange_field_appn_note(row, status) {
    var fieldId;
        if ("on" == status) {
                if ("all" == row) {
                        var fieldList = $(".css_appn_note__obj");
                        for (var i = 0; i < fieldList.length; i++) {
                                fieldId = $(fieldList[i]).attr("id").substr(12);
                scAjaxExecFieldEditorHtml('mceRemoveControl', false, fieldId);
                scAjaxExecFieldEditorHtml('mceAddControl', false, fieldId);
                        }
                }
                else {
            scAjaxExecFieldEditorHtml('mceRemoveControl', false, "appn_note");
            scAjaxExecFieldEditorHtml('mceAddControl', false, "appn_note");
                }
        }
}

function displayChange_field_memb_list(row, status) {
    var fieldId;
        if ("on" == status && typeof $("#nmsc_iframe_liga_form_members_app_mob")[0].contentWindow.scRecreateSelect2 === "function") {
                $("#nmsc_iframe_liga_form_members_app_mob")[0].contentWindow.scRecreateSelect2();
        }
        $("#nmsc_iframe_liga_form_members_app_mob")[0].contentWindow.specificStyle();
}

function displayChange_field_est_memb_cost(row, status) {
    var fieldId;
}

function displayChange_field_rules(row, status) {
    var fieldId;
}

function displayChange_field_memb_qty(row, status) {
    var fieldId;
}

function displayChange_field_read_at_sign(row, status) {
    var fieldId;
}

function displayChange_field_applicant_name(row, status) {
    var fieldId;
}

function displayChange_field_applicant_title(row, status) {
    var fieldId;
}

function displayChange_field_js_strp_price_id(row, status) {
    var fieldId;
}

function displayChange_field_js_prod_price(row, status) {
    var fieldId;
}

function displayChange_field_js_mbr_ct(row, status) {
    var fieldId;
}

function displayChange_field_js_client_id(row, status) {
    var fieldId;
}

function displayChange_field_applicant_signature(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
        $(".sc-form-page").show();
}

function scHidePage(pageNo) {
        $("#id_form_clients_steps_appn_stripe_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
        if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
                var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
                if (inactiveTabs.length) {
                        var tabNo = $(inactiveTabs[0]).attr("id").substr(42);
                }
        }
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_starting_date" + iSeqRow).datepicker('destroy');
  $("#id_sc_field_starting_date" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_starting_date" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_clients_steps_appn_stripe_mob_validate_starting_date(iSeqRow);
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
      do_ajax_form_clients_steps_appn_stripe_mob_validate_renewal_date(iSeqRow);
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
      do_ajax_form_clients_steps_appn_stripe_mob_validate_expiration_date(iSeqRow);
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
      do_ajax_form_clients_steps_appn_stripe_mob_validate_cancel_date(iSeqRow);
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
      do_ajax_form_clients_steps_appn_stripe_mob_validate_retire_date(iSeqRow);
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
      do_ajax_form_clients_steps_appn_stripe_mob_validate_date_last_updated(iSeqRow);
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
      do_ajax_form_clients_steps_appn_stripe_mob_validate_archive_date(iSeqRow);
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
      do_ajax_form_clients_steps_appn_stripe_mob_validate_record_created(iSeqRow);
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
  $("#id_sc_field_permanent_member_date" + iSeqRow).datepicker('destroy');
  $("#id_sc_field_permanent_member_date" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_permanent_member_date" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_clients_steps_appn_stripe_mob_validate_permanent_member_date(iSeqRow);
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
} // scJQCalendarAdd

function scJQSpinAdd(iSeqRow) {
  $("#id_sc_field_buyers_excel_qty" + iSeqRow).spinner({
    max: 100,
    min: 0,
    step: 1,
    page: 5,
    change: function(event, ui) {
      $(this).trigger("change");
    },
    stop: function(event, ui) {
      $(this).trigger("change");
    }
  });
} // scJQSpinAdd

function scJQPopupAdd(iSeqRow) {
  $('.scFormPopupBubble' + iSeqRow).each(function() {
    var distance = 10;
    var time = 250;
    var hideDelay = 500;
    var hideDelayTimer = null;
    var beingShown = false;
    var shown = false;
    var trigger = $('.scFormPopupTrigger', this);
    var info = $('.scFormPopup', this).css('opacity', 0);
    $([trigger.get(0), info.get(0)]).mouseover(function() {
      if (hideDelayTimer) clearTimeout(hideDelayTimer);
      if (beingShown || shown) {
        // don't trigger the animation again
        return;
      } else {
        // reset position of info box
        beingShown = true;
        var left_pos = trigger.offset().left - ((info.width() - trigger.width()) / 2);
        if (left_pos < 10) {
            left_pos = 10;
        }
        info.css({
          top: trigger.offset().top - (info.height() - trigger.height()),
          left: left_pos,
          display: 'block'
        }).animate({
          top: '-=' + distance + 'px',
          opacity: 1
        }, time, 'swing', function() {
          beingShown = false;
          shown = true;
        });
      }
      return false;
      }).mouseout(function() {
      if (hideDelayTimer) clearTimeout(hideDelayTimer);
      hideDelayTimer = setTimeout(function() {
        hideDelayTimer = null;
        info.animate({
          top: '-=' + distance + 'px',
          opacity: 0
        }, time, 'swing', function() {
          shown = false;
          info.css('display', 'none');
        });
      }, hideDelay);
      return false;
    });
  });
} // scJQPopupAdd

                var scJQHtmlEditorData = (function() {
                    var data = {};
                    function scJQHtmlEditorData(a, b) {
                        if (a) {
                            if (typeof(a) === typeof({})) {
                                for (var d in a) {
                                    if (a.hasOwnProperty(d)) {
                                        data[d] = a[d];
                                    }
                                }
                            } else if ((typeof(a) === typeof('')) || (typeof(a) === typeof(1))) {
                                if (b) {
                                    data[a] = b;
                                } else {
                                    if (typeof(a) === typeof('')) {
                                        var v = data;
                                        a = a.split('.');
                                        a.forEach(function (r) {
                                            v = v[r];
                                        });
                                        return v;
                                    }
                                    return data[a];
                                }
                            }
                        }
                        return data;
                    }
                    return scJQHtmlEditorData;
                }());
 function scJQHtmlEditorAdd(iSeqRow) {
<?php
$sLangTest = '';
if(is_file('../_lib/lang/arr_langs_tinymce.php'))
{
    include('../_lib/lang/arr_langs_tinymce.php');
    if(isset($Nm_arr_lang_tinymce[ $this->Ini->str_lang ]))
    {
        $sLangTest = $Nm_arr_lang_tinymce[ $this->Ini->str_lang ];
    }
}
if(empty($sLangTest))
{
    $sLangTest = 'en_GB';
}
?>
 var baseData = {
  theme: "silver",
  browser_spellcheck : true,
  paste_data_images : true,
<?php
if ('novo' != $this->nmgp_opcao && isset($this->nmgp_cmp_readonly['appn_note']) && $this->nmgp_cmp_readonly['appn_note'] == 'on')
{
    unset($this->nmgp_cmp_readonly['appn_note']);
?>
   readonly: true,
<?php
}
else 
{
?>
   readonly: false,
<?php
}
?>
<?php
if ('yyyymmdd' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%Y{$_SESSION['scriptcase']['reg_conf']['date_sep']}%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%d";
}
elseif ('mmddyyyy' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%d{$_SESSION['scriptcase']['reg_conf']['date_sep']}%Y";
}
elseif ('ddmmyyyy' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%d{$_SESSION['scriptcase']['reg_conf']['date_sep']}%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%Y";
}
else {
    $tinymceDateFormat = "%D";
}
?>
  insertdatetime_formats: ["%H:%M:%S", "%Y-%m-%d", "%I:%M:%S %p", "<?php echo $tinymceDateFormat ?>"],
  relative_urls : false,
  remove_script_host : false,
  convert_urls  : true,
  language : '<?php echo $sLangTest; ?>',
  plugins : 'advlist print hr  autolink link image lists charmap preview anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking table directionality emoticons template',
  contextmenu: 'link linkchecker image imagetools table spellchecker configurepermanentpen',
  toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
  statusbar : false,
  menubar : 'file edit insert view format table tools',
  toolbar_items_size: 'small',
  content_style: ".mce-container-body {text-align: center !important}",
  selector: "#appn_note" + iSeqRow,
  toolbar_mode: 'sliding',
  block_unsupported_drop: false,
  paste_data_images : true,
  relative_urls : false,
  remove_script_host : false,
  convert_urls  : true,
  setup: function(ed) {
    ed.on("Change", function (e) {
        scFormHasChanged = true;
    }),
    ed.on("init", function (e) {
      if ($('textarea[name="appn_note' + iSeqRow + '"]').prop('disabled') == true) {
        ed.setMode("readonly");
      }
    });
  }
 };
 var data = 'function' === typeof Object.assign ? Object.assign({}, scJQHtmlEditorData(baseData)) : baseData;
 tinyMCE.init(data);
} // scJQHtmlEditorAdd

function scJQUploadAdd(iSeqRow) {
  $("#id_sc_field_main_contact_img_id" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_clients_steps_appn_stripe_mob_ul_save.php",
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
    change: function(e, data) {
      var checkUploadSize = scCheckUploadExtensionSize_main_contact_img_id(data);
      if ('ok' != checkUploadSize) {
        e.preventDefault();
        scJs_alert(scFormatExtensionSizeErrorMsg(checkUploadSize), function() {}, {'type': 'error'});
      }
    },
    drop: function(e, data) {
      var checkUploadSize = scCheckUploadExtensionSize_main_contact_img_id(data);
      if ('ok' != checkUploadSize) {
        scJs_alert(scFormatExtensionSizeErrorMsg(checkUploadSize), function() {}, {'type': 'error'});
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
      $("#id_ajax_doc_main_contact_img_id" + iSeqRow).html(fileData[0].name);
      $("#id_ajax_doc_main_contact_img_id" + iSeqRow).css("display", "");
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_main_contact_img_id" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_main_contact_img_id" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

  $("#id_sc_field_doc_file" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_clients_steps_appn_stripe_mob_ul_save.php",
    dropZone: "",
    formData: function() {
      return [
        {name: 'param_field', value: 'doc_file'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_doc_file" + iSeqRow);
        loaderContent = $("#id_img_loader_doc_file" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_doc_file" + iSeqRow);
        loader.show();
      }
    },
    change: function(e, data) {
      var checkUploadSize = scCheckUploadExtensionSize_doc_file(data);
      if ('ok' != checkUploadSize) {
        e.preventDefault();
        scJs_alert(scFormatExtensionSizeErrorMsg(checkUploadSize), function() {}, {'type': 'error'});
      }
    },
    drop: function(e, data) {
      var checkUploadSize = scCheckUploadExtensionSize_doc_file(data);
      if ('ok' != checkUploadSize) {
        scJs_alert(scFormatExtensionSizeErrorMsg(checkUploadSize), function() {}, {'type': 'error'});
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
        $("#id_img_loader_doc_file" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_doc_file" + iSeqRow).hide();
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
      $("#id_sc_field_doc_file" + iSeqRow).val("");
      $("#id_sc_field_doc_file_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_doc_file_ul_type" + iSeqRow).val(fileData[0].type);
      $("#id_ajax_doc_doc_file" + iSeqRow).html(fileData[0].name);
      $("#id_ajax_doc_doc_file" + iSeqRow).css("display", "");
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_doc_file" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_doc_file" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

  $("#id_sc_field_more_buyers_xlsx" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_clients_steps_appn_stripe_mob_ul_save.php",
    dropZone: "",
    formData: function() {
      return [
        {name: 'param_field', value: 'more_buyers_xlsx'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_more_buyers_xlsx" + iSeqRow);
        loaderContent = $("#id_img_loader_more_buyers_xlsx" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_more_buyers_xlsx" + iSeqRow);
        loader.show();
      }
    },
    change: function(e, data) {
      var checkUploadSize = scCheckUploadExtensionSize_more_buyers_xlsx(data);
      if ('ok' != checkUploadSize) {
        e.preventDefault();
        scJs_alert(scFormatExtensionSizeErrorMsg(checkUploadSize), function() {}, {'type': 'error'});
      }
    },
    drop: function(e, data) {
      var checkUploadSize = scCheckUploadExtensionSize_more_buyers_xlsx(data);
      if ('ok' != checkUploadSize) {
        scJs_alert(scFormatExtensionSizeErrorMsg(checkUploadSize), function() {}, {'type': 'error'});
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
        $("#id_img_loader_more_buyers_xlsx" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_more_buyers_xlsx" + iSeqRow).hide();
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
      $("#id_sc_field_more_buyers_xlsx" + iSeqRow).val("");
      $("#id_sc_field_more_buyers_xlsx_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_more_buyers_xlsx_ul_type" + iSeqRow).val(fileData[0].type);
      $("#id_ajax_doc_more_buyers_xlsx" + iSeqRow).html(fileData[0].name);
      $("#id_ajax_doc_more_buyers_xlsx" + iSeqRow).css("display", "");
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_more_buyers_xlsx" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_more_buyers_xlsx" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_clients_steps_appn_stripe_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

var scSignatureStarted = {};

function scJQSignatureReset() {
  scSignatureStarted = {};
}

function scJQSignatureChange(fieldName) {
    if (typeof scSignatureStarted[fieldName] == "undefined") {
        scSignatureStarted[fieldName] = true;
    } else if (scSignatureStarted[fieldName]) {
        $("#" + fieldName).trigger("change");
    }
}

function scJQSignatureAdd(seqRow) {
  $("#sc-id-sign-applicant_signature" + seqRow).jSignature({
    height: "ratio",
    sizeRatio: 3.33,
    color: "#000000"
  }).bind("change", function(e) {
    scJQSignatureChange("id_sc_field_applicant_signature" + seqRow);
    scJQSignatureRedrawReadonly("#id_sc_field_applicant_signature" + seqRow);
    var changedRow = $("input[name='sc_check_vert[" + seqRow + "]']");
    if (changedRow.length) {
      $(changedRow[0]).prop("checked", true);
    }
  });
  scJQSignatureRedraw("applicant_signature" + seqRow);
  var changedRow = $("input[name='sc_check_vert[" + seqRow + "]']");
  if (changedRow.length) {
    $(changedRow[0]).prop("checked", false);
  }
  scFormHasChanged = false;
} // scJQSignatureAdd

function scJQSignatureRedraw(fieldName) {
  var thisFieldValue = $("#id_sc_field_" + fieldName).val();
  if ("" != thisFieldValue && "data:image/jsignature;base30," != thisFieldValue && "data:image/jsignature;base30," == thisFieldValue.substr(0, 29)) {
    $("#sc-id-sign-" + fieldName).jSignature("reset").jSignature("setData", thisFieldValue);
    var pngDataUrl = $("#sc-id-sign-" + fieldName).jSignature("getData", "image");
    $("#sc-id-disabled-" + fieldName).find("img").attr("src", "data:" + pngDataUrl);
    scJQSignatureRedrawReadonly(fieldName);
  }
  else {
    scJQSignatureClear(fieldName);
  }
} // scJQSignatureRedraw

function scJQSignatureRedrawReadonly(fieldName) {
  var thisFieldValue = $("#id_sc_field_" + fieldName).val();
  if ("" != thisFieldValue) {
    var pngDataUrl = $("#sc-id-sign-" + fieldName).jSignature("getData", "image");
    $("#sc-id-ronly-" + fieldName).find("img").attr("src", "data:" + pngDataUrl);
    $("#sc-id-ronly-" + fieldName).show();
  }
} // scJQSignatureRedraw

function scJQSignatureClear(fieldName) {
  $("#sc-id-sign-" + fieldName).jSignature("reset");
  $("#sc-id-disabled-" + fieldName).find("img").attr("src", "");
  scJQSignatureClearReadOnly(fieldName);
} // scJQSignatureRedraw

function scJQSignatureClearReadOnly(fieldName) {
    $("#sc-id-ronly-" + fieldName).find("img").attr("src", "");
} // scJQSignatureRedraw

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

var wizardActualStep = <?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe_mob']['form_wizard']['actual_step']; ?>;
var wizardTotalSteps = <?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe_mob']['form_wizard']['total_steps']; ?>;
var wizardIsInsert = <?php echo ('novo' == $this->nmgp_opcao || $GLOBALS["erro_incl"] == 1 ? 'true' : 'false'); ?>;
var wizardViewMode = '<?php echo ('novo' == $this->nmgp_opcao || $GLOBALS["erro_incl"] == 1 ? 'wizard' : 'wizard'); ?>';
var pag_ativa = wizardActualStep;

function scJQWizardGoToPage(pageNo)
{
    pageNo = parseInt(pageNo);

    scJQWizardHideAllFormSteps();
    scJQWizardShowFormStep(pageNo);
    scJQWizardPreparePageNavigation(pageNo);
    scJQWizardPrepareStep(pageNo);

    wizardActualStep = pageNo;
    pag_ativa = wizardActualStep;
}

function scJQWizardPageClick(pageGoTo)
{
    var thisPage = $("#sc-ui-form-step-" + pageGoTo);

    pageGoTo = parseInt(pageGoTo);

    if (thisPage.hasClass("scTabInactive")) {
        scJQWizardGoToPage(pageGoTo);
    }
}

function scJQWizardPreparePageNavigation(pageNo)
{
    $("#sc-ui-form-step-" + wizardActualStep).removeClass("scTabActive").addClass("scTabInactive");
    $("#sc-ui-form-step-" + pageNo).removeClass("scTabInactive").addClass("scTabActive");

    $(".scTabInactive").css("cursor", "pointer");

    scJQWizardNavigationButtons();
}

function scJQWizardIsFirstStep()
{
    return 0 == wizardActualStep;
}

function scJQWizardIsLastStep()
{
    return wizardTotalSteps == wizardActualStep + 1;
}

function scJQWizardGoToNextStep()
{
    if (scJQWizardIsLastStep()) {
        return;
    }

    scJQWizardValidateStep(wizardActualStep + 1);
}

function scJQWizardGoToPreviousStep()
{
    if (scJQWizardIsFirstStep()) {
        return;
    }

    scJQWizardValidateStep(wizardActualStep - 1);
}

function scJQWizardStepClick(stepGoTo)
{
    var thisStep = $("#sc-ui-form-step-" + stepGoTo);

    stepGoTo = parseInt(stepGoTo);

    if (thisStep.hasClass("sc-ui-form-step-done")) {
        scJQWizardValidateStep(stepGoTo);
    } else if (thisStep.hasClass("sc-ui-form-step-next")) {
        scJQWizardValidateStep(stepGoTo);
    }
}

function scJQWizardValidateStep(stepGoTo)
{
    if (0 == wizardActualStep) {
        do_ajax_form_clients_steps_appn_stripe_mob_submit_page_0(stepGoTo);
    }
    if (1 == wizardActualStep) {
        do_ajax_form_clients_steps_appn_stripe_mob_submit_page_1(stepGoTo);
    }
    if (2 == wizardActualStep) {
        do_ajax_form_clients_steps_appn_stripe_mob_submit_page_2(stepGoTo);
    }
    if (3 == wizardActualStep) {
        do_ajax_form_clients_steps_appn_stripe_mob_submit_page_3(stepGoTo);
    }
}

function scJQWizardGoToStep(stepNo)
{
    stepNo = parseInt(stepNo);

    displayChange_page(wizardActualStep, 'off');

    if (typeof wizardMobileProgress === "object") {
        if (stepNo > wizardActualStep) {
            wizardMobileProgress.goToNextStep();
        } else if (stepNo < wizardActualStep) {
            wizardMobileProgress.goToPrevStep();
        }
    }

    scJQWizardHideAllFormSteps();
    scJQWizardShowFormStep(stepNo);
    scJQWizardPrepareNavigation(stepNo);
    scJQWizardPrepareStep(stepNo);

    displayChange_page(stepNo, 'on');

    wizardActualStep = stepNo;
    pag_ativa = wizardActualStep;

    if (wizardIsInsert) {
        if (scJQWizardIsLastStep()) {
            scJQWizardInsertButtonEnable();
        } else {
            scJQWizardInsertButtonDisable();
        }
    }

    if ('wizard' == wizardViewMode) {
        if (scJQWizardIsFirstStep()) {
            scJQWizardPreviousButtonHide();
        } else {
            scJQWizardPreviousButtonShow();
        }
        if (scJQWizardIsLastStep()) {
            scJQWizardNextButtonHide();
        } else {
            scJQWizardNextButtonShow();
        }
    }
}

function scJQWizardHideAllFormSteps()
{
    scJQWizardHideFormStep(0);
    scJQWizardHideFormStep(1);
    scJQWizardHideFormStep(2);
    scJQWizardHideFormStep(3);
}

function scJQWizardHideFormStep(stepNo)
{
    $("#form_clients_steps_appn_stripe_mob_form" + stepNo).css({
        "width": "1px",
        "height": "0",
        "display": "none",
        "overflow": "scroll",
    });
}

function scJQWizardShowFormStep(stepNo)
{
    $("#form_clients_steps_appn_stripe_mob_form" + stepNo).css({
        "width": "",
        "height": "",
        "display": "",
        "overflow": "visible",
    });
}

function scJQWizardPrepareNavigation(stepNo)
{
    scJQWizardNavigationDone(stepNo);
    scJQWizardNavigationNow(stepNo);
    scJQWizardNavigationNext(stepNo);
    scJQWizardNavigationToDo(stepNo);
    scJQWizardNavigationButtons();
}

function scJQWizardNavigationDone(stepNo)
{
    if (0 == stepNo) {
        return;
    }

    for (var i = 0; i < stepNo; i++) {
        scJQWizardNavigationAddClass("sc-ui-form-step-done", i);
        scJQWizardNavigationUpdateStep(i);
    }
}

function scJQWizardNavigationNow(stepNo)
{
    scJQWizardNavigationAddClass("sc-ui-form-step-now", stepNo);
    scJQWizardNavigationUpdateStep(stepNo);
}

function scJQWizardNavigationNext(stepNo)
{
    if (wizardTotalSteps == stepNo + 1) {
        return;
    }

    for (var i = stepNo + 1; i < wizardTotalSteps; i++) {
        scJQWizardNavigationAddClass("sc-ui-form-step-next", i);
        scJQWizardNavigationUpdateStep(i);
    }
}

function scJQWizardNavigationToDo(stepNo)
{
    if (!wizardIsInsert && 'wizard' != wizardViewMode) {
        return;
    }

    if (wizardTotalSteps == stepNo + 2) {
        return;
    }

    for (var i = stepNo + 2; i < wizardTotalSteps; i++) {
        scJQWizardNavigationAddClass("sc-ui-form-step-todo", i);
        scJQWizardNavigationUpdateStep(i);
    }
}

function scJQWizardNavigationAddClass(className, stepNo)
{
    $("#sc-ui-form-step-" + stepNo)
        .removeClass("sc-ui-form-step-done")
        .removeClass("sc-ui-form-step-now")
        .removeClass("sc-ui-form-step-next")
        .removeClass("sc-ui-form-step-todo")
        .removeClass("is-complete")
        .addClass(className);

    if ("sc-ui-form-step-done" == className) {
        $("#sc-ui-form-step-" + stepNo).addClass("is-complete");
    }
}

function scJQWizardNavigationUpdateStep(stepNo)
{
    var thisStep = $("#sc-ui-form-step-" + stepNo);

    if (thisStep.hasClass("sc-ui-form-step-done")) {
        thisStep.on("mouseover", function() {
            $(this).css("cursor", "pointer");
        });
    } else if (thisStep.hasClass("sc-ui-form-step-now")) {
        thisStep.on("mouseover", function() {
            $(this).css("cursor", "default");
        });
    } else if (thisStep.hasClass("sc-ui-form-step-next")) {
        thisStep.on("mouseover", function() {
            $(this).css("cursor", "pointer");
        });
    } else {
        thisStep.on("mouseover", function() {
            $(this).css("cursor", "not-allowed");
        });
    }
}

function scJQWizardInsertButtonHide()
{
    $("#sc_b_ins_t").hide();
    $("#sc_b_ins_b").hide();
}

function scJQWizardInsertButtonShow()
{
    $("#sc_b_ins_t").show();
    $("#sc_b_ins_b").show();
}

function scJQWizardInsertButtonDisable()
{
    $("#sc_b_ins_t").addClass("disabled");
    $("#sc_b_ins_b").addClass("disabled");
}

function scJQWizardInsertButtonEnable()
{
    $("#sc_b_ins_t").removeClass("disabled");
    $("#sc_b_ins_b").removeClass("disabled");
}

function scJQWizardPreviousButtonHide()
{
    $("#sc_b_stepret_t").hide();
    $("#sc_b_stepret_b").hide();
}

function scJQWizardPreviousButtonShow()
{
    $("#sc_b_stepret_t").show();
    $("#sc_b_stepret_b").show();
}

function scJQWizardPreviousButtonDisable()
{
    $("#sc_b_stepret_t").addClass("disabled");
    $("#sc_b_stepret_b").addClass("disabled");
}

function scJQWizardPreviousButtonEnable()
{
    $("#sc_b_stepret_t").removeClass("disabled");
    $("#sc_b_stepret_b").removeClass("disabled");
}

function scJQWizardNextButtonHide()
{
    $("#sc_b_stepavc_t").hide();
    $("#sc_b_stepavc_b").hide();
}

function scJQWizardNextButtonShow()
{
    $("#sc_b_stepavc_t").show();
    $("#sc_b_stepavc_b").show();
}

function scJQWizardNextButtonDisable()
{
    $("#sc_b_stepavc_t").addClass("disabled");
    $("#sc_b_stepavc_b").addClass("disabled");
}

function scJQWizardNextButtonEnable()
{
    $("#sc_b_stepavc_t").removeClass("disabled");
    $("#sc_b_stepavc_b").removeClass("disabled");
}

function scJQWizardNavigationButtons()
{
    if ('wizard' != wizardViewMode) {
        scJQWizardPreviousButtonHide();
        scJQWizardNextButtonHide();
    }
}

function scJQWizardPrepareStep(stepNo)
{
    if (0 == stepNo) {
        scJQWizardPrepareStep_0();
    }
    if (1 == stepNo) {
        scJQWizardPrepareStep_1();
    }
    if (2 == stepNo) {
        scJQWizardPrepareStep_2();
    }
    if (3 == stepNo) {
        scJQWizardPrepareStep_3();
    }
}

function scJQWizardPrepareStep_0()
{
}

function scJQWizardPrepareStep_1()
{
}

function scJQWizardPrepareStep_2()
{
    scAjaxDetailHeight("form_members_app", "600");
}

function scJQWizardPrepareStep_3()
{
}

<?php
if ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']) {
?>
class MobileWizard
{
    constructor(wrapper) {
        this.wrapper = document.querySelector(wrapper)

        // Circle
        this.circle = this.wrapper.querySelector('.js-progress-circle');
        this.radius = this.circle.r.baseVal.value;
        this.circumference = this.radius * 2 * Math.PI;

        // Steps
        this.steps = this.wrapper.querySelectorAll('.sc-steps .item');
        this.currentStep = this.wrapper.querySelector('.sc-ui-form-step-now');
        this.nextStep = this.wrapper.querySelector('.sc-ui-form-step-next');
        this.arraySteps = Array.from(this.steps);
        this.currentStepIndex = this.arraySteps.findIndex((step) => step === this.currentStep);

        // Counter
        this.currentStepCounter = document.querySelector('.js-current-step-counter');
        this.totalStepsCounter = document.querySelector('.js-total-steps-counter');
        this.totalCounter = this.steps.length;

        this.progress = 100 / this.totalCounter;

        // Initial Setup
        this.initialStyles();
        this.initialCounter();
        this.initialProgress();
        this.setNextStepTitle();
    }

    initialStyles() {
        this.circle.style.strokeDasharray = this.circumference + " " + this.circumference;
        this.circle.style.strokeDashoffset = this.circumference;
    }

    initialCounter() {
        this.currentStepCounter.textContent = this.currentStepIndex + 1;
        this.totalStepsCounter.textContent = this.totalCounter;
    }

    initialProgress() {
        this.percent = 100 / this.totalCounter;
        this.setProgress(this.progress);
    }

    setCounter(counter) {
        this.currentStepCounter.textContent = counter;
    }

    setProgress(percent) {
        const offset = this.circumference - percent / 100 * this.circumference;
        this.circle.style.strokeDashoffset = offset;
    }

    calcAndSetProgress() {
        this.progress = parseFloat(100 / this.totalCounter) * (this.currentStepIndex + 1);
        this.setProgress(this.progress);
        this.setCounter(this.currentStepIndex + 1);
    }

    goToNextStep = () => {
        if (this.currentStepIndex +1 < this.totalCounter) {
            this.setActiveStepsStatus(1);
            this.calcAndSetProgress();
            this.setNextStepTitle()
        }
    }

    goToPrevStep = () => {
        if (this.currentStepIndex !== 0 && this.currentStepIndex <= this.totalCounter) {
            this.setActiveStepsStatus(-1);
            this.calcAndSetProgress();
            this.setNextStepTitle()
        }
    }

    setActiveStepsStatus(operator) {
        this.steps[this.currentStepIndex].classList.remove('sc-ui-form-step-now');
        this.steps[this.currentStepIndex].classList.add('is-complete');

        this.currentStepIndex = this.currentStepIndex + operator;

        this.steps[this.currentStepIndex].classList.remove('sc-ui-form-step-next');
        this.steps[this.currentStepIndex].classList.add('sc-ui-form-step-now');

        if (this.currentStepIndex + 1 < this.totalCounter) {
            this.steps[this.currentStepIndex + 1].classList.add('sc-ui-form-step-next');
        }
    }

    setNextStepTitle() {
        const description = this.steps[this.currentStepIndex].querySelector('.description');
        const nextStep = document.querySelector('.sc-ui-form-step-next');
        let nextStepTitle = '';

        if (nextStep) {
            const title = nextStep.querySelector('.title').textContent;
            nextStepTitle = '<?php echo $this->Ini->Nm_lang['lang_btns_next']; ?>: ' + title;
        } else {
            nextStepTitle = ''
        }

        description.textContent = nextStepTitle
    }
}

var wizardMobileProgress;

$(function() {
//    const prevButton = document.querySelector('.js-example-prev');
//    const nextButton = document.querySelector('.js-example-next');

    wizardMobileProgress = new MobileWizard('.sc-div-steps');

//    nextButton.addEventListener('click', wizardMobileProgress.goToNextStep);
//    prevButton.addEventListener('click', wizardMobileProgress.goToPrevStep);
});
<?php
}
?>


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQSpinAdd(iLine);
  scJQPopupAdd(iLine);
  scJQHtmlEditorAdd(iLine);
  scJQUploadAdd(iLine);
  scJQSignatureAdd(iLine);
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

function scCheckUploadExtensionSize_main_contact_img_id(thisField)
{
    if ("files" in thisField && thisField.files.length > 0) {
        thisFileExtension = scGetFileExtension(thisField.files[0].name);

        if ("jpg" == thisFileExtension && 5242880 < thisField.files[0].size) {
            return 'err_size||JPG||5 MB';
        }
        if ("jpeg" == thisFileExtension && 5242880 < thisField.files[0].size) {
            return 'err_size||JPEG||5 MB';
        }
        if ("png" == thisFileExtension && 5242880 < thisField.files[0].size) {
            return 'err_size||PNG||5 MB';
        }
        if ("tiff" == thisFileExtension && 5242880 < thisField.files[0].size) {
            return 'err_size||TIFF||5 MB';
        }
        if ("gif" == thisFileExtension && 5242880 < thisField.files[0].size) {
            return 'err_size||GIF||5 MB';
        }
        if ("bmp" == thisFileExtension && 5242880 < thisField.files[0].size) {
            return 'err_size||BMP||5 MB';
        }
        if ("pdf" == thisFileExtension && 5242880 < thisField.files[0].size) {
            return 'err_size||PDF||5 MB';
        }

        if (!["jpg", "jpeg", "png", "tiff", "gif", "bmp", "pdf"].includes(thisFileExtension)) {
            return 'err_extension||' + thisFileExtension.toUpperCase();
        }
    }

    return 'ok';
}

function scCheckUploadExtensionSize_doc_file(thisField)
{
    if ("files" in thisField && thisField.files.length > 0) {
        thisFileExtension = scGetFileExtension(thisField.files[0].name);

        if ("pdf" == thisFileExtension && 15728640 < thisField.files[0].size) {
            return 'err_size||PDF||15 MB';
        }
        if ("jpg" == thisFileExtension && 15728640 < thisField.files[0].size) {
            return 'err_size||JPG||15 MB';
        }
        if ("jpeg" == thisFileExtension && 15728640 < thisField.files[0].size) {
            return 'err_size||JPEG||15 MB';
        }
        if ("png" == thisFileExtension && 15728640 < thisField.files[0].size) {
            return 'err_size||PNG||15 MB';
        }
        if ("bmp" == thisFileExtension && 15728640 < thisField.files[0].size) {
            return 'err_size||BMP||15 MB';
        }
        if ("gif" == thisFileExtension && 15728640 < thisField.files[0].size) {
            return 'err_size||GIF||15 MB';
        }
        if ("tiff" == thisFileExtension && 15728640 < thisField.files[0].size) {
            return 'err_size||TIFF||15 MB';
        }
        if ("svg" == thisFileExtension && 15728640 < thisField.files[0].size) {
            return 'err_size||SVG||15 MB';
        }
        if ("doc" == thisFileExtension && 15728640 < thisField.files[0].size) {
            return 'err_size||DOC||15 MB';
        }
        if ("docx" == thisFileExtension && 15728640 < thisField.files[0].size) {
            return 'err_size||DOCX||15 MB';
        }
        if ("odt" == thisFileExtension && 15728640 < thisField.files[0].size) {
            return 'err_size||ODT||15 MB';
        }
        if ("ods" == thisFileExtension && 15728640 < thisField.files[0].size) {
            return 'err_size||ODS||15 MB';
        }
        if ("odp" == thisFileExtension && 15728640 < thisField.files[0].size) {
            return 'err_size||ODP||15 MB';
        }
        if ("xls" == thisFileExtension && 15728640 < thisField.files[0].size) {
            return 'err_size||XLS||15 MB';
        }
        if ("xlsx" == thisFileExtension && 15728640 < thisField.files[0].size) {
            return 'err_size||XLSX||15 MB';
        }

        if (!["pdf", "jpg", "jpeg", "png", "bmp", "gif", "tiff", "svg", "doc", "docx", "odt", "ods", "odp", "xls", "xlsx"].includes(thisFileExtension)) {
            return 'err_extension||' + thisFileExtension.toUpperCase();
        }
    }

    return 'ok';
}

function scCheckUploadExtensionSize_more_buyers_xlsx(thisField)
{
    if ("files" in thisField && thisField.files.length > 0) {
        thisFileExtension = scGetFileExtension(thisField.files[0].name);

        if ("xlsx" == thisFileExtension && 15728640 < thisField.files[0].size) {
            return 'err_size||XLSX||15 MB';
        }
        if ("xls" == thisFileExtension && 15728640 < thisField.files[0].size) {
            return 'err_size||XLS||15 MB';
        }

        if (!["xlsx", "xls"].includes(thisFileExtension)) {
            return 'err_extension||' + thisFileExtension.toUpperCase();
        }
    }

    return 'ok';
}

