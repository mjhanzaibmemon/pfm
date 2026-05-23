
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
      case 'bus_cat_id':
      case 'state':
      case 'bus_subcat_id':
      case 'zip_code':
      case 'bus_subcat_other':
      case 'phone_number':
      case 'website_url':
      case 'email':
      case 'acct_instagram':
      case 'dummy01':
      case 'acct_facebook':
      case 'dummy04':
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
      case 'memb_name':
      case 'memb_phone':
      case 'memb_email':
      case 'memb_note':
      case 'member1_name':
      case 'member1_phone':
      case 'member1_email':
      case 'member1_note':
      case 'member2_name':
      case 'member2_phone':
      case 'member2_email':
      case 'member2_note':
      case 'member3_name':
      case 'member3_phone':
      case 'member3_email':
      case 'member3_note':
      case 'dummy05':
      case 'adtl_memb_name':
      case 'adtl_memb_phone':
      case 'adtl_memb_note':
      case 'addtl_memb_mail':
      case 'member4_name':
      case 'member4_phone':
      case 'member4_email':
      case 'member4_note':
      case 'member5_name':
      case 'member5_phone':
      case 'member5_email':
      case 'member5_note':
      case 'member6_name':
      case 'member6_phone':
      case 'member6_email':
      case 'member6_note':
      case 'member7_name':
      case 'member7_phone':
      case 'member7_email':
      case 'member7_note':
      case 'member8_name':
      case 'member8_phone':
      case 'member8_email':
      case 'member8_note':
      case 'member9_name':
      case 'member9_phone':
      case 'member9_email':
      case 'member9_note':
      case 'member10_name':
      case 'member10_phone':
      case 'member10_email':
      case 'member10_note':
      case 'dummy06':
      case 'xlsx_sample':
      case 'more_buyers_xlsx':
      case 'buyers_excel_qty':
      case 'dummy09':
      case 'dummy11':
        break;
      case 'rules':
      case 'rules_warn':
      case 'memb_levels':
      case 'est_memb_cost':
      case 'pay':
      case 'read_at_sign':
      case 'applicant_name':
      case 'applicant_title':
      case 'dummy10':
      case 'applicant_signature':
        break;
    }
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
  scEventControl_data["dummy02" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dummy03" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["co_name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["client_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["mailing_address" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["appn_date" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["city" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["bus_cat_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["state" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["bus_subcat_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["zip_code" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["bus_subcat_other" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["phone_number" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["website_url" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["acct_instagram" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dummy01" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["acct_facebook" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dummy04" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
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
  scEventControl_data["memb_name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["memb_phone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["memb_email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["memb_note" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member1_name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member1_phone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member1_email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member1_note" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member2_name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member2_phone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member2_email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member2_note" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member3_name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member3_phone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member3_email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member3_note" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dummy05" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["adtl_memb_name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["adtl_memb_phone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["adtl_memb_note" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["addtl_memb_mail" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member4_name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member4_phone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member4_email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member4_note" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member5_name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member5_phone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member5_email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member5_note" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member6_name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member6_phone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member6_email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member6_note" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member7_name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member7_phone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member7_email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member7_note" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member8_name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member8_phone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member8_email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member8_note" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member9_name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member9_phone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member9_email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member9_note" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member10_name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member10_phone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member10_email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["member10_note" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dummy06" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["xlsx_sample" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["more_buyers_xlsx" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["buyers_excel_qty" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dummy09" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dummy11" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rules" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rules_warn" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["memb_levels" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["est_memb_cost" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pay" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["read_at_sign" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["applicant_name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["applicant_title" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dummy10" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
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
  if (scEventControl_data["bus_cat_id" + iSeqRow] && scEventControl_data["bus_cat_id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bus_cat_id" + iSeqRow] && scEventControl_data["bus_cat_id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["state" + iSeqRow] && scEventControl_data["state" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["state" + iSeqRow] && scEventControl_data["state" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["bus_subcat_id" + iSeqRow] && scEventControl_data["bus_subcat_id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bus_subcat_id" + iSeqRow] && scEventControl_data["bus_subcat_id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["zip_code" + iSeqRow] && scEventControl_data["zip_code" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["zip_code" + iSeqRow] && scEventControl_data["zip_code" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["bus_subcat_other" + iSeqRow] && scEventControl_data["bus_subcat_other" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bus_subcat_other" + iSeqRow] && scEventControl_data["bus_subcat_other" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["phone_number" + iSeqRow] && scEventControl_data["phone_number" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["phone_number" + iSeqRow] && scEventControl_data["phone_number" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["website_url" + iSeqRow] && scEventControl_data["website_url" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["website_url" + iSeqRow] && scEventControl_data["website_url" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow] && scEventControl_data["email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow] && scEventControl_data["email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["acct_instagram" + iSeqRow] && scEventControl_data["acct_instagram" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["acct_instagram" + iSeqRow] && scEventControl_data["acct_instagram" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dummy01" + iSeqRow] && scEventControl_data["dummy01" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dummy01" + iSeqRow] && scEventControl_data["dummy01" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["acct_facebook" + iSeqRow] && scEventControl_data["acct_facebook" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["acct_facebook" + iSeqRow] && scEventControl_data["acct_facebook" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dummy04" + iSeqRow] && scEventControl_data["dummy04" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dummy04" + iSeqRow] && scEventControl_data["dummy04" + iSeqRow]["change"]) {
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
  if (scEventControl_data["memb_name" + iSeqRow] && scEventControl_data["memb_name" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["memb_name" + iSeqRow] && scEventControl_data["memb_name" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["memb_phone" + iSeqRow] && scEventControl_data["memb_phone" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["memb_phone" + iSeqRow] && scEventControl_data["memb_phone" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["memb_email" + iSeqRow] && scEventControl_data["memb_email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["memb_email" + iSeqRow] && scEventControl_data["memb_email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["memb_note" + iSeqRow] && scEventControl_data["memb_note" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["memb_note" + iSeqRow] && scEventControl_data["memb_note" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member1_name" + iSeqRow] && scEventControl_data["member1_name" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member1_name" + iSeqRow] && scEventControl_data["member1_name" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member1_phone" + iSeqRow] && scEventControl_data["member1_phone" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member1_phone" + iSeqRow] && scEventControl_data["member1_phone" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member1_email" + iSeqRow] && scEventControl_data["member1_email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member1_email" + iSeqRow] && scEventControl_data["member1_email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member1_note" + iSeqRow] && scEventControl_data["member1_note" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member1_note" + iSeqRow] && scEventControl_data["member1_note" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member2_name" + iSeqRow] && scEventControl_data["member2_name" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member2_name" + iSeqRow] && scEventControl_data["member2_name" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member2_phone" + iSeqRow] && scEventControl_data["member2_phone" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member2_phone" + iSeqRow] && scEventControl_data["member2_phone" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member2_email" + iSeqRow] && scEventControl_data["member2_email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member2_email" + iSeqRow] && scEventControl_data["member2_email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member2_note" + iSeqRow] && scEventControl_data["member2_note" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member2_note" + iSeqRow] && scEventControl_data["member2_note" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member3_name" + iSeqRow] && scEventControl_data["member3_name" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member3_name" + iSeqRow] && scEventControl_data["member3_name" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member3_phone" + iSeqRow] && scEventControl_data["member3_phone" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member3_phone" + iSeqRow] && scEventControl_data["member3_phone" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member3_email" + iSeqRow] && scEventControl_data["member3_email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member3_email" + iSeqRow] && scEventControl_data["member3_email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member3_note" + iSeqRow] && scEventControl_data["member3_note" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member3_note" + iSeqRow] && scEventControl_data["member3_note" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dummy05" + iSeqRow] && scEventControl_data["dummy05" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dummy05" + iSeqRow] && scEventControl_data["dummy05" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["adtl_memb_name" + iSeqRow] && scEventControl_data["adtl_memb_name" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["adtl_memb_name" + iSeqRow] && scEventControl_data["adtl_memb_name" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["adtl_memb_phone" + iSeqRow] && scEventControl_data["adtl_memb_phone" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["adtl_memb_phone" + iSeqRow] && scEventControl_data["adtl_memb_phone" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["adtl_memb_note" + iSeqRow] && scEventControl_data["adtl_memb_note" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["adtl_memb_note" + iSeqRow] && scEventControl_data["adtl_memb_note" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["addtl_memb_mail" + iSeqRow] && scEventControl_data["addtl_memb_mail" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["addtl_memb_mail" + iSeqRow] && scEventControl_data["addtl_memb_mail" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member4_name" + iSeqRow] && scEventControl_data["member4_name" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member4_name" + iSeqRow] && scEventControl_data["member4_name" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member4_phone" + iSeqRow] && scEventControl_data["member4_phone" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member4_phone" + iSeqRow] && scEventControl_data["member4_phone" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member4_email" + iSeqRow] && scEventControl_data["member4_email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member4_email" + iSeqRow] && scEventControl_data["member4_email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member4_note" + iSeqRow] && scEventControl_data["member4_note" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member4_note" + iSeqRow] && scEventControl_data["member4_note" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member5_name" + iSeqRow] && scEventControl_data["member5_name" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member5_name" + iSeqRow] && scEventControl_data["member5_name" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member5_phone" + iSeqRow] && scEventControl_data["member5_phone" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member5_phone" + iSeqRow] && scEventControl_data["member5_phone" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member5_email" + iSeqRow] && scEventControl_data["member5_email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member5_email" + iSeqRow] && scEventControl_data["member5_email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member5_note" + iSeqRow] && scEventControl_data["member5_note" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member5_note" + iSeqRow] && scEventControl_data["member5_note" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member6_name" + iSeqRow] && scEventControl_data["member6_name" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member6_name" + iSeqRow] && scEventControl_data["member6_name" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member6_phone" + iSeqRow] && scEventControl_data["member6_phone" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member6_phone" + iSeqRow] && scEventControl_data["member6_phone" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member6_email" + iSeqRow] && scEventControl_data["member6_email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member6_email" + iSeqRow] && scEventControl_data["member6_email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member6_note" + iSeqRow] && scEventControl_data["member6_note" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member6_note" + iSeqRow] && scEventControl_data["member6_note" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member7_name" + iSeqRow] && scEventControl_data["member7_name" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member7_name" + iSeqRow] && scEventControl_data["member7_name" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member7_phone" + iSeqRow] && scEventControl_data["member7_phone" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member7_phone" + iSeqRow] && scEventControl_data["member7_phone" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member7_email" + iSeqRow] && scEventControl_data["member7_email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member7_email" + iSeqRow] && scEventControl_data["member7_email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member7_note" + iSeqRow] && scEventControl_data["member7_note" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member7_note" + iSeqRow] && scEventControl_data["member7_note" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member8_name" + iSeqRow] && scEventControl_data["member8_name" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member8_name" + iSeqRow] && scEventControl_data["member8_name" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member8_phone" + iSeqRow] && scEventControl_data["member8_phone" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member8_phone" + iSeqRow] && scEventControl_data["member8_phone" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member8_email" + iSeqRow] && scEventControl_data["member8_email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member8_email" + iSeqRow] && scEventControl_data["member8_email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member8_note" + iSeqRow] && scEventControl_data["member8_note" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member8_note" + iSeqRow] && scEventControl_data["member8_note" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member9_name" + iSeqRow] && scEventControl_data["member9_name" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member9_name" + iSeqRow] && scEventControl_data["member9_name" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member9_phone" + iSeqRow] && scEventControl_data["member9_phone" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member9_phone" + iSeqRow] && scEventControl_data["member9_phone" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member9_email" + iSeqRow] && scEventControl_data["member9_email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member9_email" + iSeqRow] && scEventControl_data["member9_email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member9_note" + iSeqRow] && scEventControl_data["member9_note" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member9_note" + iSeqRow] && scEventControl_data["member9_note" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member10_name" + iSeqRow] && scEventControl_data["member10_name" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member10_name" + iSeqRow] && scEventControl_data["member10_name" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member10_phone" + iSeqRow] && scEventControl_data["member10_phone" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member10_phone" + iSeqRow] && scEventControl_data["member10_phone" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member10_email" + iSeqRow] && scEventControl_data["member10_email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member10_email" + iSeqRow] && scEventControl_data["member10_email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["member10_note" + iSeqRow] && scEventControl_data["member10_note" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["member10_note" + iSeqRow] && scEventControl_data["member10_note" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dummy06" + iSeqRow] && scEventControl_data["dummy06" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dummy06" + iSeqRow] && scEventControl_data["dummy06" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["xlsx_sample" + iSeqRow] && scEventControl_data["xlsx_sample" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["xlsx_sample" + iSeqRow] && scEventControl_data["xlsx_sample" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["buyers_excel_qty" + iSeqRow] && scEventControl_data["buyers_excel_qty" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["buyers_excel_qty" + iSeqRow] && scEventControl_data["buyers_excel_qty" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dummy09" + iSeqRow] && scEventControl_data["dummy09" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dummy09" + iSeqRow] && scEventControl_data["dummy09" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dummy11" + iSeqRow] && scEventControl_data["dummy11" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dummy11" + iSeqRow] && scEventControl_data["dummy11" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rules" + iSeqRow] && scEventControl_data["rules" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rules" + iSeqRow] && scEventControl_data["rules" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rules_warn" + iSeqRow] && scEventControl_data["rules_warn" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rules_warn" + iSeqRow] && scEventControl_data["rules_warn" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["memb_levels" + iSeqRow] && scEventControl_data["memb_levels" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["memb_levels" + iSeqRow] && scEventControl_data["memb_levels" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["est_memb_cost" + iSeqRow] && scEventControl_data["est_memb_cost" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["est_memb_cost" + iSeqRow] && scEventControl_data["est_memb_cost" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pay" + iSeqRow] && scEventControl_data["pay" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pay" + iSeqRow] && scEventControl_data["pay" + iSeqRow]["change"]) {
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
  if (scEventControl_data["dummy10" + iSeqRow] && scEventControl_data["dummy10" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dummy10" + iSeqRow] && scEventControl_data["dummy10" + iSeqRow]["change"]) {
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
  if ("bus_cat_id" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("bus_subcat_id" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("type_company" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("pricing_level_id" + iSeq == fieldName) {
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
  if ("buyers_excel_qty" + iSeq == fieldName) {
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
  if ("member10_name" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("member1_name" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("member2_name" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("member3_name" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("member4_name" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("member5_name" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("member6_name" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("member7_name" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("member8_name" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("member9_name" + iSeq == fieldName) {
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
  $('#id_sc_field_client_id' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_client_id_onblur('#id_sc_field_client_id' + iSeqRow, iSeqRow) })
                                       .bind('change', function() { sc_form_clients_steps_renew_client_id_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_clients_steps_renew_client_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_co_name' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_clients_steps_renew_co_name_onblur('#id_sc_field_co_name' + iSeqRow, iSeqRow);}, 300) })
                                     .bind('change', function() { sc_form_clients_steps_renew_co_name_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_clients_steps_renew_co_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_ofa_contact' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_ofa_contact_onchange(this, iSeqRow) });
  $('#id_sc_field_street_address' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_street_address_onchange(this, iSeqRow) });
  $('#id_sc_field_mailing_address' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_clients_steps_renew_mailing_address_onblur('#id_sc_field_mailing_address' + iSeqRow, iSeqRow);}, 300) })
                                             .bind('change', function() { sc_form_clients_steps_renew_mailing_address_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_clients_steps_renew_mailing_address_onfocus(this, iSeqRow) });
  $('#id_sc_field_city' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_clients_steps_renew_city_onblur('#id_sc_field_city' + iSeqRow, iSeqRow);}, 300) })
                                  .bind('change', function() { sc_form_clients_steps_renew_city_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_clients_steps_renew_city_onfocus(this, iSeqRow) });
  $('#id_sc_field_state' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_clients_steps_renew_state_onblur('#id_sc_field_state' + iSeqRow, iSeqRow);}, 300) })
                                   .bind('change', function() { sc_form_clients_steps_renew_state_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_clients_steps_renew_state_onfocus(this, iSeqRow) });
  $('#id_sc_field_zip_code' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_clients_steps_renew_zip_code_onblur('#id_sc_field_zip_code' + iSeqRow, iSeqRow);}, 300) })
                                      .bind('change', function() { sc_form_clients_steps_renew_zip_code_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_clients_steps_renew_zip_code_onfocus(this, iSeqRow) });
  $('#id_sc_field_phone_number' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_clients_steps_renew_phone_number_onblur('#id_sc_field_phone_number' + iSeqRow, iSeqRow);}, 300) })
                                          .bind('change', function() { sc_form_clients_steps_renew_phone_number_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_clients_steps_renew_phone_number_onfocus(this, iSeqRow) });
  $('#id_sc_field_home_phone' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_home_phone_onchange(this, iSeqRow) });
  $('#id_sc_field_fax_number' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_fax_number_onchange(this, iSeqRow) });
  $('#id_sc_field_email' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_clients_steps_renew_email_onblur('#id_sc_field_email' + iSeqRow, iSeqRow);}, 300) })
                                   .bind('change', function() { sc_form_clients_steps_renew_email_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_clients_steps_renew_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_business_type' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_business_type_onchange(this, iSeqRow) });
  $('#id_sc_field_fresh_cut_allowed' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_fresh_cut_allowed_onchange(this, iSeqRow) });
  $('#id_sc_field_business_license' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_business_license_onchange(this, iSeqRow) });
  $('#id_sc_field_nursery_license' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_nursery_license_onchange(this, iSeqRow) });
  $('#id_sc_field_federal_tax_id' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_federal_tax_id_onchange(this, iSeqRow) });
  $('#id_sc_field_temporary_pass' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_temporary_pass_onchange(this, iSeqRow) });
  $('#id_sc_field_ofa_member' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_ofa_member_onchange(this, iSeqRow) });
  $('#id_sc_field_starting_date' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_starting_date_onchange(this, iSeqRow) });
  $('#id_sc_field_renewal_date' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_renewal_date_onchange(this, iSeqRow) });
  $('#id_sc_field_expiration_date' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_expiration_date_onchange(this, iSeqRow) });
  $('#id_sc_field_canceled' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_canceled_onchange(this, iSeqRow) });
  $('#id_sc_field_cancel_date' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_cancel_date_onchange(this, iSeqRow) });
  $('#id_sc_field_canceled_by' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_canceled_by_onchange(this, iSeqRow) });
  $('#id_sc_field_reason_canceled' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_reason_canceled_onchange(this, iSeqRow) });
  $('#id_sc_field_retire_date' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_retire_date_onchange(this, iSeqRow) });
  $('#id_sc_field_verified_receipts' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_verified_receipts_onchange(this, iSeqRow) });
  $('#id_sc_field_date_last_updated' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_date_last_updated_onchange(this, iSeqRow) });
  $('#id_sc_field_restricted' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_restricted_onchange(this, iSeqRow) });
  $('#id_sc_field_committee_approval_required' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_committee_approval_required_onchange(this, iSeqRow) });
  $('#id_sc_field_type_company' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_type_company_onchange(this, iSeqRow) });
  $('#id_sc_field_archive' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_archive_onchange(this, iSeqRow) });
  $('#id_sc_field_archive_date' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_archive_date_onchange(this, iSeqRow) });
  $('#id_sc_field_pricing_level_id' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_pricing_level_id_onchange(this, iSeqRow) });
  $('#id_sc_field_store_front_address' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_store_front_address_onchange(this, iSeqRow) });
  $('#id_sc_field_store_front_city' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_store_front_city_onchange(this, iSeqRow) });
  $('#id_sc_field_store_front_zip' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_store_front_zip_onchange(this, iSeqRow) });
  $('#id_sc_field_home_base_address' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_home_base_address_onchange(this, iSeqRow) });
  $('#id_sc_field_home_base_city' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_home_base_city_onchange(this, iSeqRow) });
  $('#id_sc_field_home_base_zip' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_home_base_zip_onchange(this, iSeqRow) });
  $('#id_sc_field_store_front_state' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_store_front_state_onchange(this, iSeqRow) });
  $('#id_sc_field_home_base_state' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_home_base_state_onchange(this, iSeqRow) });
  $('#id_sc_field_record_created' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_record_created_onchange(this, iSeqRow) });
  $('#id_sc_field_record_created_hora' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_record_created_hora_onchange(this, iSeqRow) });
  $('#id_sc_field_permanent_member_date' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_permanent_member_date_onchange(this, iSeqRow) });
  $('#id_sc_field_acct_instagram' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_acct_instagram_onblur('#id_sc_field_acct_instagram' + iSeqRow, iSeqRow) })
                                            .bind('change', function() { sc_form_clients_steps_renew_acct_instagram_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_clients_steps_renew_acct_instagram_onfocus(this, iSeqRow) });
  $('#id_sc_field_acct_facebook' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_acct_facebook_onblur('#id_sc_field_acct_facebook' + iSeqRow, iSeqRow) })
                                           .bind('change', function() { sc_form_clients_steps_renew_acct_facebook_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_clients_steps_renew_acct_facebook_onfocus(this, iSeqRow) });
  $('#id_sc_field_website_url' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_website_url_onblur('#id_sc_field_website_url' + iSeqRow, iSeqRow) })
                                         .bind('change', function() { sc_form_clients_steps_renew_website_url_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_clients_steps_renew_website_url_onfocus(this, iSeqRow) });
  $('#id_sc_field_bus_cat_id' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_clients_steps_renew_bus_cat_id_onblur('#id_sc_field_bus_cat_id' + iSeqRow, iSeqRow);}, 300) })
                                        .bind('change', function() { sc_form_clients_steps_renew_bus_cat_id_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_clients_steps_renew_bus_cat_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_bus_subcat_id' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_clients_steps_renew_bus_subcat_id_onblur('#id_sc_field_bus_subcat_id' + iSeqRow, iSeqRow);}, 300) })
                                           .bind('change', function() { sc_form_clients_steps_renew_bus_subcat_id_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_clients_steps_renew_bus_subcat_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_bus_subcat_other' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_bus_subcat_other_onblur('#id_sc_field_bus_subcat_other' + iSeqRow, iSeqRow) })
                                              .bind('change', function() { sc_form_clients_steps_renew_bus_subcat_other_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_clients_steps_renew_bus_subcat_other_onfocus(this, iSeqRow) });
  $('#id_sc_field_appn_date' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_appn_date_onblur('#id_sc_field_appn_date' + iSeqRow, iSeqRow) })
                                       .bind('change', function() { sc_form_clients_steps_renew_appn_date_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_clients_steps_renew_appn_date_onfocus(this, iSeqRow) });
  $('#id_sc_field_appn_note' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_appn_note_onblur('#id_sc_field_appn_note' + iSeqRow, iSeqRow) })
                                       .bind('change', function() { sc_form_clients_steps_renew_appn_note_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_clients_steps_renew_appn_note_onfocus(this, iSeqRow) });
  $('#id_sc_field_doc_type' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_clients_steps_renew_doc_type_onblur('#id_sc_field_doc_type' + iSeqRow, iSeqRow);}, 300) })
                                      .bind('change', function() { sc_form_clients_steps_renew_doc_type_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_clients_steps_renew_doc_type_onfocus(this, iSeqRow) });
  $('#id_sc_field_doc_file' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_clients_steps_renew_doc_file_onblur('#id_sc_field_doc_file' + iSeqRow, iSeqRow);}, 300) })
                                      .bind('change', function() { sc_form_clients_steps_renew_doc_file_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_clients_steps_renew_doc_file_onfocus(this, iSeqRow) });
  $('#id_sc_field_member1_name' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_clients_steps_renew_member1_name_onblur('#id_sc_field_member1_name' + iSeqRow, iSeqRow);}, 300) })
                                          .bind('change', function() { sc_form_clients_steps_renew_member1_name_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_clients_steps_renew_member1_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_member1_phone' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member1_phone_onblur('#id_sc_field_member1_phone' + iSeqRow, iSeqRow) })
                                           .bind('change', function() { sc_form_clients_steps_renew_member1_phone_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_clients_steps_renew_member1_phone_onfocus(this, iSeqRow) });
  $('#id_sc_field_member1_email' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member1_email_onblur('#id_sc_field_member1_email' + iSeqRow, iSeqRow) })
                                           .bind('change', function() { sc_form_clients_steps_renew_member1_email_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_clients_steps_renew_member1_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_member1_note' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member1_note_onblur('#id_sc_field_member1_note' + iSeqRow, iSeqRow) })
                                          .bind('change', function() { sc_form_clients_steps_renew_member1_note_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_clients_steps_renew_member1_note_onfocus(this, iSeqRow) });
  $('#id_sc_field_member2_name' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member2_name_onblur('#id_sc_field_member2_name' + iSeqRow, iSeqRow) })
                                          .bind('change', function() { sc_form_clients_steps_renew_member2_name_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_clients_steps_renew_member2_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_member2_phone' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member2_phone_onblur('#id_sc_field_member2_phone' + iSeqRow, iSeqRow) })
                                           .bind('change', function() { sc_form_clients_steps_renew_member2_phone_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_clients_steps_renew_member2_phone_onfocus(this, iSeqRow) });
  $('#id_sc_field_member2_email' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member2_email_onblur('#id_sc_field_member2_email' + iSeqRow, iSeqRow) })
                                           .bind('change', function() { sc_form_clients_steps_renew_member2_email_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_clients_steps_renew_member2_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_member2_note' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member2_note_onblur('#id_sc_field_member2_note' + iSeqRow, iSeqRow) })
                                          .bind('change', function() { sc_form_clients_steps_renew_member2_note_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_clients_steps_renew_member2_note_onfocus(this, iSeqRow) });
  $('#id_sc_field_member3_name' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member3_name_onblur('#id_sc_field_member3_name' + iSeqRow, iSeqRow) })
                                          .bind('change', function() { sc_form_clients_steps_renew_member3_name_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_clients_steps_renew_member3_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_member3_phone' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member3_phone_onblur('#id_sc_field_member3_phone' + iSeqRow, iSeqRow) })
                                           .bind('change', function() { sc_form_clients_steps_renew_member3_phone_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_clients_steps_renew_member3_phone_onfocus(this, iSeqRow) });
  $('#id_sc_field_member3_email' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member3_email_onblur('#id_sc_field_member3_email' + iSeqRow, iSeqRow) })
                                           .bind('change', function() { sc_form_clients_steps_renew_member3_email_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_clients_steps_renew_member3_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_member3_note' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member3_note_onblur('#id_sc_field_member3_note' + iSeqRow, iSeqRow) })
                                          .bind('change', function() { sc_form_clients_steps_renew_member3_note_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_clients_steps_renew_member3_note_onfocus(this, iSeqRow) });
  $('#id_sc_field_applicant_name' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_clients_steps_renew_applicant_name_onblur('#id_sc_field_applicant_name' + iSeqRow, iSeqRow);}, 300) })
                                            .bind('change', function() { sc_form_clients_steps_renew_applicant_name_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_clients_steps_renew_applicant_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_applicant_signature' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_clients_steps_renew_applicant_signature_onblur('#id_sc_field_applicant_signature' + iSeqRow, iSeqRow);}, 300) })
                                                 .bind('change', function() { sc_form_clients_steps_renew_applicant_signature_onchange(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_clients_steps_renew_applicant_signature_onfocus(this, iSeqRow) });
  $('#id_sc_field_applicant_title' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_clients_steps_renew_applicant_title_onblur('#id_sc_field_applicant_title' + iSeqRow, iSeqRow);}, 300) })
                                             .bind('change', function() { sc_form_clients_steps_renew_applicant_title_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_clients_steps_renew_applicant_title_onfocus(this, iSeqRow) });
  $('#id_sc_field_member4_name' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member4_name_onblur('#id_sc_field_member4_name' + iSeqRow, iSeqRow) })
                                          .bind('change', function() { sc_form_clients_steps_renew_member4_name_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_clients_steps_renew_member4_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_member4_phone' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member4_phone_onblur('#id_sc_field_member4_phone' + iSeqRow, iSeqRow) })
                                           .bind('change', function() { sc_form_clients_steps_renew_member4_phone_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_clients_steps_renew_member4_phone_onfocus(this, iSeqRow) });
  $('#id_sc_field_member4_email' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member4_email_onblur('#id_sc_field_member4_email' + iSeqRow, iSeqRow) })
                                           .bind('change', function() { sc_form_clients_steps_renew_member4_email_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_clients_steps_renew_member4_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_member4_note' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member4_note_onblur('#id_sc_field_member4_note' + iSeqRow, iSeqRow) })
                                          .bind('change', function() { sc_form_clients_steps_renew_member4_note_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_clients_steps_renew_member4_note_onfocus(this, iSeqRow) });
  $('#id_sc_field_member5_name' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member5_name_onblur('#id_sc_field_member5_name' + iSeqRow, iSeqRow) })
                                          .bind('change', function() { sc_form_clients_steps_renew_member5_name_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_clients_steps_renew_member5_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_member5_phone' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member5_phone_onblur('#id_sc_field_member5_phone' + iSeqRow, iSeqRow) })
                                           .bind('change', function() { sc_form_clients_steps_renew_member5_phone_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_clients_steps_renew_member5_phone_onfocus(this, iSeqRow) });
  $('#id_sc_field_member5_email' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member5_email_onblur('#id_sc_field_member5_email' + iSeqRow, iSeqRow) })
                                           .bind('change', function() { sc_form_clients_steps_renew_member5_email_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_clients_steps_renew_member5_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_member5_note' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member5_note_onblur('#id_sc_field_member5_note' + iSeqRow, iSeqRow) })
                                          .bind('change', function() { sc_form_clients_steps_renew_member5_note_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_clients_steps_renew_member5_note_onfocus(this, iSeqRow) });
  $('#id_sc_field_member6_name' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member6_name_onblur('#id_sc_field_member6_name' + iSeqRow, iSeqRow) })
                                          .bind('change', function() { sc_form_clients_steps_renew_member6_name_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_clients_steps_renew_member6_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_member6_phone' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member6_phone_onblur('#id_sc_field_member6_phone' + iSeqRow, iSeqRow) })
                                           .bind('change', function() { sc_form_clients_steps_renew_member6_phone_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_clients_steps_renew_member6_phone_onfocus(this, iSeqRow) });
  $('#id_sc_field_member6_email' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member6_email_onblur('#id_sc_field_member6_email' + iSeqRow, iSeqRow) })
                                           .bind('change', function() { sc_form_clients_steps_renew_member6_email_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_clients_steps_renew_member6_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_member6_note' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member6_note_onblur('#id_sc_field_member6_note' + iSeqRow, iSeqRow) })
                                          .bind('change', function() { sc_form_clients_steps_renew_member6_note_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_clients_steps_renew_member6_note_onfocus(this, iSeqRow) });
  $('#id_sc_field_member7_name' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member7_name_onblur('#id_sc_field_member7_name' + iSeqRow, iSeqRow) })
                                          .bind('change', function() { sc_form_clients_steps_renew_member7_name_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_clients_steps_renew_member7_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_member7_phone' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member7_phone_onblur('#id_sc_field_member7_phone' + iSeqRow, iSeqRow) })
                                           .bind('change', function() { sc_form_clients_steps_renew_member7_phone_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_clients_steps_renew_member7_phone_onfocus(this, iSeqRow) });
  $('#id_sc_field_member7_email' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member7_email_onblur('#id_sc_field_member7_email' + iSeqRow, iSeqRow) })
                                           .bind('change', function() { sc_form_clients_steps_renew_member7_email_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_clients_steps_renew_member7_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_member7_note' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member7_note_onblur('#id_sc_field_member7_note' + iSeqRow, iSeqRow) })
                                          .bind('change', function() { sc_form_clients_steps_renew_member7_note_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_clients_steps_renew_member7_note_onfocus(this, iSeqRow) });
  $('#id_sc_field_member8_name' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member8_name_onblur('#id_sc_field_member8_name' + iSeqRow, iSeqRow) })
                                          .bind('change', function() { sc_form_clients_steps_renew_member8_name_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_clients_steps_renew_member8_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_member8_phone' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member8_phone_onblur('#id_sc_field_member8_phone' + iSeqRow, iSeqRow) })
                                           .bind('change', function() { sc_form_clients_steps_renew_member8_phone_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_clients_steps_renew_member8_phone_onfocus(this, iSeqRow) });
  $('#id_sc_field_member8_email' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member8_email_onblur('#id_sc_field_member8_email' + iSeqRow, iSeqRow) })
                                           .bind('change', function() { sc_form_clients_steps_renew_member8_email_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_clients_steps_renew_member8_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_member8_note' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member8_note_onblur('#id_sc_field_member8_note' + iSeqRow, iSeqRow) })
                                          .bind('change', function() { sc_form_clients_steps_renew_member8_note_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_clients_steps_renew_member8_note_onfocus(this, iSeqRow) });
  $('#id_sc_field_member9_name' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member9_name_onblur('#id_sc_field_member9_name' + iSeqRow, iSeqRow) })
                                          .bind('change', function() { sc_form_clients_steps_renew_member9_name_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_clients_steps_renew_member9_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_member9_phone' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member9_phone_onblur('#id_sc_field_member9_phone' + iSeqRow, iSeqRow) })
                                           .bind('change', function() { sc_form_clients_steps_renew_member9_phone_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_clients_steps_renew_member9_phone_onfocus(this, iSeqRow) });
  $('#id_sc_field_member9_email' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member9_email_onblur('#id_sc_field_member9_email' + iSeqRow, iSeqRow) })
                                           .bind('change', function() { sc_form_clients_steps_renew_member9_email_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_clients_steps_renew_member9_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_member9_note' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member9_note_onblur('#id_sc_field_member9_note' + iSeqRow, iSeqRow) })
                                          .bind('change', function() { sc_form_clients_steps_renew_member9_note_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_clients_steps_renew_member9_note_onfocus(this, iSeqRow) });
  $('#id_sc_field_member10_name' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member10_name_onblur('#id_sc_field_member10_name' + iSeqRow, iSeqRow) })
                                           .bind('change', function() { sc_form_clients_steps_renew_member10_name_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_clients_steps_renew_member10_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_member10_phone' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member10_phone_onblur('#id_sc_field_member10_phone' + iSeqRow, iSeqRow) })
                                            .bind('change', function() { sc_form_clients_steps_renew_member10_phone_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_clients_steps_renew_member10_phone_onfocus(this, iSeqRow) });
  $('#id_sc_field_member10_email' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member10_email_onblur('#id_sc_field_member10_email' + iSeqRow, iSeqRow) })
                                            .bind('change', function() { sc_form_clients_steps_renew_member10_email_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_clients_steps_renew_member10_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_member10_note' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_member10_note_onblur('#id_sc_field_member10_note' + iSeqRow, iSeqRow) })
                                           .bind('change', function() { sc_form_clients_steps_renew_member10_note_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_clients_steps_renew_member10_note_onfocus(this, iSeqRow) });
  $('#id_sc_field_main_contact_name' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_clients_steps_renew_main_contact_name_onblur('#id_sc_field_main_contact_name' + iSeqRow, iSeqRow);}, 300) })
                                               .bind('change', function() { sc_form_clients_steps_renew_main_contact_name_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_clients_steps_renew_main_contact_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_main_contact_phone' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_clients_steps_renew_main_contact_phone_onblur('#id_sc_field_main_contact_phone' + iSeqRow, iSeqRow);}, 300) })
                                                .bind('change', function() { sc_form_clients_steps_renew_main_contact_phone_onchange(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_clients_steps_renew_main_contact_phone_onfocus(this, iSeqRow) });
  $('#id_sc_field_main_contact_email' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_clients_steps_renew_main_contact_email_onblur('#id_sc_field_main_contact_email' + iSeqRow, iSeqRow);}, 300) })
                                                .bind('change', function() { sc_form_clients_steps_renew_main_contact_email_onchange(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_clients_steps_renew_main_contact_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_main_contact_title' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_clients_steps_renew_main_contact_title_onblur('#id_sc_field_main_contact_title' + iSeqRow, iSeqRow);}, 300) })
                                                .bind('change', function() { sc_form_clients_steps_renew_main_contact_title_onchange(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_clients_steps_renew_main_contact_title_onfocus(this, iSeqRow) });
  $('#id_sc_field_main_contact_img_id' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_form_clients_steps_renew_main_contact_img_id_onblur('#id_sc_field_main_contact_img_id' + iSeqRow, iSeqRow);}, 300) })
                                                 .bind('change', function() { sc_form_clients_steps_renew_main_contact_img_id_onchange(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_clients_steps_renew_main_contact_img_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_more_buyers_xlsx' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_more_buyers_xlsx_onblur('#id_sc_field_more_buyers_xlsx' + iSeqRow, iSeqRow) })
                                              .bind('change', function() { sc_form_clients_steps_renew_more_buyers_xlsx_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_clients_steps_renew_more_buyers_xlsx_onfocus(this, iSeqRow) });
  $('#id_sc_field_buyers_excel_qty' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_buyers_excel_qty_onblur('#id_sc_field_buyers_excel_qty' + iSeqRow, iSeqRow) })
                                              .bind('change', function() { sc_form_clients_steps_renew_buyers_excel_qty_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_clients_steps_renew_buyers_excel_qty_onfocus(this, iSeqRow) });
  $('#id_sc_field_adtl_memb_name' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_adtl_memb_name_onblur('#id_sc_field_adtl_memb_name' + iSeqRow, iSeqRow) })
                                            .bind('change', function() { sc_form_clients_steps_renew_adtl_memb_name_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_clients_steps_renew_adtl_memb_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_adtl_memb_note' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_adtl_memb_note_onblur('#id_sc_field_adtl_memb_note' + iSeqRow, iSeqRow) })
                                            .bind('change', function() { sc_form_clients_steps_renew_adtl_memb_note_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_clients_steps_renew_adtl_memb_note_onfocus(this, iSeqRow) });
  $('#id_sc_field_adtl_memb_phone' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_adtl_memb_phone_onblur('#id_sc_field_adtl_memb_phone' + iSeqRow, iSeqRow) })
                                             .bind('change', function() { sc_form_clients_steps_renew_adtl_memb_phone_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_clients_steps_renew_adtl_memb_phone_onfocus(this, iSeqRow) });
  $('#id_sc_field_dummy01' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_dummy01_onblur('#id_sc_field_dummy01' + iSeqRow, iSeqRow) })
                                     .bind('change', function() { sc_form_clients_steps_renew_dummy01_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_clients_steps_renew_dummy01_onfocus(this, iSeqRow) });
  $('#id_sc_field_dummy02' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_dummy02_onblur('#id_sc_field_dummy02' + iSeqRow, iSeqRow) })
                                     .bind('change', function() { sc_form_clients_steps_renew_dummy02_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_clients_steps_renew_dummy02_onfocus(this, iSeqRow) });
  $('#id_sc_field_dummy03' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_dummy03_onblur('#id_sc_field_dummy03' + iSeqRow, iSeqRow) })
                                     .bind('change', function() { sc_form_clients_steps_renew_dummy03_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_clients_steps_renew_dummy03_onfocus(this, iSeqRow) });
  $('#id_sc_field_dummy04' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_dummy04_onblur('#id_sc_field_dummy04' + iSeqRow, iSeqRow) })
                                     .bind('change', function() { sc_form_clients_steps_renew_dummy04_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_clients_steps_renew_dummy04_onfocus(this, iSeqRow) });
  $('#id_sc_field_dummy05' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_dummy05_onblur('#id_sc_field_dummy05' + iSeqRow, iSeqRow) })
                                     .bind('change', function() { sc_form_clients_steps_renew_dummy05_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_clients_steps_renew_dummy05_onfocus(this, iSeqRow) });
  $('#id_sc_field_dummy06' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_dummy06_onblur('#id_sc_field_dummy06' + iSeqRow, iSeqRow) })
                                     .bind('change', function() { sc_form_clients_steps_renew_dummy06_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_clients_steps_renew_dummy06_onfocus(this, iSeqRow) });
  $('#id_sc_field_dummy07' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_dummy07_onblur('#id_sc_field_dummy07' + iSeqRow, iSeqRow) })
                                     .bind('change', function() { sc_form_clients_steps_renew_dummy07_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_clients_steps_renew_dummy07_onfocus(this, iSeqRow) });
  $('#id_sc_field_dummy08' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_dummy08_onblur('#id_sc_field_dummy08' + iSeqRow, iSeqRow) })
                                     .bind('change', function() { sc_form_clients_steps_renew_dummy08_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_clients_steps_renew_dummy08_onfocus(this, iSeqRow) });
  $('#id_sc_field_dummy09' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_dummy09_onblur('#id_sc_field_dummy09' + iSeqRow, iSeqRow) })
                                     .bind('change', function() { sc_form_clients_steps_renew_dummy09_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_clients_steps_renew_dummy09_onfocus(this, iSeqRow) });
  $('#id_sc_field_dummy10' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_dummy10_onblur('#id_sc_field_dummy10' + iSeqRow, iSeqRow) })
                                     .bind('change', function() { sc_form_clients_steps_renew_dummy10_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_clients_steps_renew_dummy10_onfocus(this, iSeqRow) });
  $('#id_sc_field_dummy11' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_dummy11_onblur('#id_sc_field_dummy11' + iSeqRow, iSeqRow) })
                                     .bind('change', function() { sc_form_clients_steps_renew_dummy11_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_clients_steps_renew_dummy11_onfocus(this, iSeqRow) });
  $('#id_sc_field_dummy12' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_dummy12_onchange(this, iSeqRow) });
  $('#id_sc_field_dummy13' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_dummy13_onchange(this, iSeqRow) });
  $('#id_sc_field_main_contact_title_lbl' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_main_contact_title_lbl_onchange(this, iSeqRow) });
  $('#id_sc_field_memb_01' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_memb_01_onchange(this, iSeqRow) });
  $('#id_sc_field_memb_02' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_memb_02_onchange(this, iSeqRow) });
  $('#id_sc_field_memb_03' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_memb_03_onchange(this, iSeqRow) });
  $('#id_sc_field_memb_04' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_memb_04_onchange(this, iSeqRow) });
  $('#id_sc_field_memb_05' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_memb_05_onchange(this, iSeqRow) });
  $('#id_sc_field_memb_06' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_memb_06_onchange(this, iSeqRow) });
  $('#id_sc_field_memb_07' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_memb_07_onchange(this, iSeqRow) });
  $('#id_sc_field_memb_08' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_memb_08_onchange(this, iSeqRow) });
  $('#id_sc_field_memb_09' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_memb_09_onchange(this, iSeqRow) });
  $('#id_sc_field_memb_10' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_memb_10_onchange(this, iSeqRow) });
  $('#id_sc_field_memb_11' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_memb_11_onchange(this, iSeqRow) });
  $('#id_sc_field_memb_12' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_memb_12_onchange(this, iSeqRow) });
  $('#id_sc_field_memb_13' + iSeqRow).bind('change', function() { sc_form_clients_steps_renew_memb_13_onchange(this, iSeqRow) });
  $('#id_sc_field_memb_email' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_memb_email_onblur('#id_sc_field_memb_email' + iSeqRow, iSeqRow) })
                                        .bind('change', function() { sc_form_clients_steps_renew_memb_email_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_clients_steps_renew_memb_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_memb_levels' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_memb_levels_onblur('#id_sc_field_memb_levels' + iSeqRow, iSeqRow) })
                                         .bind('change', function() { sc_form_clients_steps_renew_memb_levels_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_clients_steps_renew_memb_levels_onfocus(this, iSeqRow) });
  $('#id_sc_field_memb_name' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_memb_name_onblur('#id_sc_field_memb_name' + iSeqRow, iSeqRow) })
                                       .bind('change', function() { sc_form_clients_steps_renew_memb_name_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_clients_steps_renew_memb_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_memb_note' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_memb_note_onblur('#id_sc_field_memb_note' + iSeqRow, iSeqRow) })
                                       .bind('change', function() { sc_form_clients_steps_renew_memb_note_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_clients_steps_renew_memb_note_onfocus(this, iSeqRow) });
  $('#id_sc_field_memb_phone' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_memb_phone_onblur('#id_sc_field_memb_phone' + iSeqRow, iSeqRow) })
                                        .bind('change', function() { sc_form_clients_steps_renew_memb_phone_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_clients_steps_renew_memb_phone_onfocus(this, iSeqRow) });
  $('#id_sc_field_read_at_sign' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_read_at_sign_onblur('#id_sc_field_read_at_sign' + iSeqRow, iSeqRow) })
                                          .bind('change', function() { sc_form_clients_steps_renew_read_at_sign_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_clients_steps_renew_read_at_sign_onfocus(this, iSeqRow) });
  $('#id_sc_field_rules' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_rules_onblur('#id_sc_field_rules' + iSeqRow, iSeqRow) })
                                   .bind('change', function() { sc_form_clients_steps_renew_rules_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_clients_steps_renew_rules_onfocus(this, iSeqRow) });
  $('#id_sc_field_rules_warn' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_rules_warn_onblur('#id_sc_field_rules_warn' + iSeqRow, iSeqRow) })
                                        .bind('change', function() { sc_form_clients_steps_renew_rules_warn_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_clients_steps_renew_rules_warn_onfocus(this, iSeqRow) });
  $('#id_sc_field_xlsx_sample' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_xlsx_sample_onblur('#id_sc_field_xlsx_sample' + iSeqRow, iSeqRow) })
                                         .bind('change', function() { sc_form_clients_steps_renew_xlsx_sample_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_clients_steps_renew_xlsx_sample_onfocus(this, iSeqRow) });
  $('#id_sc_field_est_memb_cost' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_est_memb_cost_onblur('#id_sc_field_est_memb_cost' + iSeqRow, iSeqRow) })
                                           .bind('change', function() { sc_form_clients_steps_renew_est_memb_cost_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_clients_steps_renew_est_memb_cost_onfocus(this, iSeqRow) });
  $('#id_sc_field_pay' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_pay_onblur('#id_sc_field_pay' + iSeqRow, iSeqRow) })
                                 .bind('change', function() { sc_form_clients_steps_renew_pay_onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_clients_steps_renew_pay_onfocus(this, iSeqRow) });
  $('#id_sc_field_addtl_memb_mail' + iSeqRow).bind('blur', function() { sc_form_clients_steps_renew_addtl_memb_mail_onblur('#id_sc_field_addtl_memb_mail' + iSeqRow, iSeqRow) })
                                             .bind('change', function() { sc_form_clients_steps_renew_addtl_memb_mail_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_clients_steps_renew_addtl_memb_mail_onfocus(this, iSeqRow) });
  $('.sc-ui-checkbox-doc_type' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-archive' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_form_clients_steps_renew_client_id_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_client_id();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_client_id_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_client_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_co_name_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_co_name();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_co_name_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_co_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_ofa_contact_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_street_address_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_mailing_address_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_mailing_address();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_mailing_address_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_mailing_address_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_city_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_city();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_city_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_city_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_state_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_state();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_state_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_state_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_zip_code_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_zip_code();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_zip_code_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_zip_code_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_phone_number_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_phone_number();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_phone_number_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_phone_number_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_home_phone_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_fax_number_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_email_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_email();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_email_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_business_type_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_fresh_cut_allowed_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_business_license_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_nursery_license_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_federal_tax_id_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_temporary_pass_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_ofa_member_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_starting_date_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_renewal_date_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_expiration_date_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_canceled_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_cancel_date_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_canceled_by_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_reason_canceled_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_retire_date_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_verified_receipts_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_date_last_updated_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_restricted_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_committee_approval_required_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_type_company_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_archive_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_archive_date_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_pricing_level_id_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_store_front_address_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_store_front_city_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_store_front_zip_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_home_base_address_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_home_base_city_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_home_base_zip_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_store_front_state_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_home_base_state_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_record_created_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_record_created_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_permanent_member_date_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_acct_instagram_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_acct_instagram();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_acct_instagram_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_acct_instagram_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_acct_facebook_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_acct_facebook();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_acct_facebook_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_acct_facebook_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_website_url_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_website_url();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_website_url_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_website_url_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_bus_cat_id_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_bus_cat_id();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_bus_cat_id_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_clients_steps_renew_event_bus_cat_id_onchange();
}

function sc_form_clients_steps_renew_bus_cat_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_bus_subcat_id_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_bus_subcat_id();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_bus_subcat_id_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_clients_steps_renew_event_bus_subcat_id_onchange();
}

function sc_form_clients_steps_renew_bus_subcat_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_bus_subcat_other_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_bus_subcat_other();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_bus_subcat_other_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_bus_subcat_other_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_appn_date_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_appn_date();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_appn_date_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_appn_date_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_appn_note_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_appn_note();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_appn_note_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_appn_note_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_doc_type_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_doc_type();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_doc_type_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_doc_type_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_doc_file_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_doc_file_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_doc_file_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member1_name_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member1_name();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member1_name_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_clients_steps_renew_event_member1_name_onchange();
}

function sc_form_clients_steps_renew_member1_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member1_phone_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member1_phone();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member1_phone_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_member1_phone_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member1_email_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member1_email();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member1_email_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_member1_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member1_note_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member1_note();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member1_note_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_member1_note_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member2_name_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member2_name();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member2_name_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_clients_steps_renew_event_member2_name_onchange();
}

function sc_form_clients_steps_renew_member2_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member2_phone_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member2_phone();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member2_phone_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_member2_phone_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member2_email_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member2_email();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member2_email_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_member2_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member2_note_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member2_note();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member2_note_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_member2_note_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member3_name_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member3_name();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member3_name_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_clients_steps_renew_event_member3_name_onchange();
}

function sc_form_clients_steps_renew_member3_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member3_phone_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member3_phone();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member3_phone_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_member3_phone_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member3_email_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member3_email();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member3_email_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_member3_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member3_note_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member3_note();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member3_note_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_member3_note_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_applicant_name_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_applicant_name();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_applicant_name_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_applicant_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_applicant_signature_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_applicant_signature();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_applicant_signature_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_applicant_signature_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_applicant_title_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_applicant_title();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_applicant_title_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_applicant_title_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member4_name_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member4_name();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member4_name_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_clients_steps_renew_event_member4_name_onchange();
}

function sc_form_clients_steps_renew_member4_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member4_phone_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member4_phone();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member4_phone_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_member4_phone_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member4_email_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member4_email();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member4_email_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_member4_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member4_note_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member4_note();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member4_note_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_member4_note_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member5_name_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member5_name();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member5_name_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_clients_steps_renew_event_member5_name_onchange();
}

function sc_form_clients_steps_renew_member5_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member5_phone_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member5_phone();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member5_phone_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_member5_phone_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member5_email_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member5_email();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member5_email_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_member5_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member5_note_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member5_note();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member5_note_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_member5_note_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member6_name_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member6_name();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member6_name_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_clients_steps_renew_event_member6_name_onchange();
}

function sc_form_clients_steps_renew_member6_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member6_phone_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member6_phone();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member6_phone_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_member6_phone_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member6_email_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member6_email();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member6_email_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_member6_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member6_note_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member6_note();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member6_note_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_member6_note_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member7_name_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member7_name();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member7_name_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_clients_steps_renew_event_member7_name_onchange();
}

function sc_form_clients_steps_renew_member7_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member7_phone_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member7_phone();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member7_phone_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_member7_phone_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member7_email_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member7_email();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member7_email_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_member7_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member7_note_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member7_note();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member7_note_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_member7_note_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member8_name_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member8_name();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member8_name_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_clients_steps_renew_event_member8_name_onchange();
}

function sc_form_clients_steps_renew_member8_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member8_phone_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member8_phone();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member8_phone_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_member8_phone_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member8_email_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member8_email();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member8_email_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_member8_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member8_note_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member8_note();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member8_note_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_member8_note_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member9_name_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member9_name();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member9_name_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_clients_steps_renew_event_member9_name_onchange();
}

function sc_form_clients_steps_renew_member9_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member9_phone_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member9_phone();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member9_phone_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_member9_phone_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member9_email_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member9_email();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member9_email_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_member9_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member9_note_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member9_note();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member9_note_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_member9_note_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member10_name_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member10_name();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member10_name_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_clients_steps_renew_event_member10_name_onchange();
}

function sc_form_clients_steps_renew_member10_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member10_phone_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member10_phone();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member10_phone_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_member10_phone_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member10_email_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member10_email();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member10_email_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_member10_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_member10_note_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_member10_note();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_member10_note_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_member10_note_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_main_contact_name_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_main_contact_name();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_main_contact_name_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_clients_steps_renew_event_main_contact_name_onchange();
}

function sc_form_clients_steps_renew_main_contact_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_main_contact_phone_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_main_contact_phone();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_main_contact_phone_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_clients_steps_renew_event_main_contact_phone_onchange();
}

function sc_form_clients_steps_renew_main_contact_phone_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_main_contact_email_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_main_contact_email();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_main_contact_email_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_clients_steps_renew_event_main_contact_email_onchange();
}

function sc_form_clients_steps_renew_main_contact_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_main_contact_title_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_main_contact_title();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_main_contact_title_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_clients_steps_renew_event_main_contact_title_onchange();
}

function sc_form_clients_steps_renew_main_contact_title_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_main_contact_img_id_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_main_contact_img_id_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_main_contact_img_id_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_more_buyers_xlsx_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_more_buyers_xlsx_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_more_buyers_xlsx_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_buyers_excel_qty_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_buyers_excel_qty();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_buyers_excel_qty_onchange(oThis, iSeqRow) {
  scJQSlideValue("buyers_excel_qty" + iSeqRow, iSeqRow);
  scMarkFormAsChanged();
  do_ajax_form_clients_steps_renew_event_buyers_excel_qty_onchange();
}

function sc_form_clients_steps_renew_buyers_excel_qty_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_adtl_memb_name_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_adtl_memb_name();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_adtl_memb_name_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_adtl_memb_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_adtl_memb_note_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_adtl_memb_note();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_adtl_memb_note_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_adtl_memb_note_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_adtl_memb_phone_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_adtl_memb_phone();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_adtl_memb_phone_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_adtl_memb_phone_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_dummy01_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_dummy01();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_dummy01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_dummy01_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_dummy02_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_dummy02();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_dummy02_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_dummy02_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_dummy03_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_dummy03();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_dummy03_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_dummy03_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_dummy04_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_dummy04();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_dummy04_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_dummy04_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_dummy05_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_dummy05();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_dummy05_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_dummy05_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_dummy06_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_dummy06();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_dummy06_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_dummy06_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_dummy07_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_dummy07();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_dummy07_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_dummy07_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_dummy08_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_dummy08();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_dummy08_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_dummy08_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_dummy09_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_dummy09();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_dummy09_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_dummy09_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_dummy10_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_dummy10();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_dummy10_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_dummy10_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_dummy11_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_dummy11();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_dummy11_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_dummy11_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_dummy12_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_dummy13_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_main_contact_title_lbl_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_memb_01_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_memb_02_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_memb_03_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_memb_04_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_memb_05_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_memb_06_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_memb_07_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_memb_08_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_memb_09_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_memb_10_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_memb_11_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_memb_12_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_memb_13_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_memb_email_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_memb_email();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_memb_email_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_memb_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_memb_levels_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_memb_levels();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_memb_levels_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_memb_levels_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_memb_name_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_memb_name();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_memb_name_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_memb_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_memb_note_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_memb_note();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_memb_note_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_memb_note_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_memb_phone_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_memb_phone();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_memb_phone_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_memb_phone_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_read_at_sign_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_read_at_sign();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_read_at_sign_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_read_at_sign_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_rules_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_rules();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_rules_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_rules_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_rules_warn_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_rules_warn();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_rules_warn_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_rules_warn_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_xlsx_sample_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_xlsx_sample();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_xlsx_sample_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_xlsx_sample_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_est_memb_cost_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_est_memb_cost();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_est_memb_cost_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_est_memb_cost_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_pay_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_pay();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_pay_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_pay_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_clients_steps_renew_addtl_memb_mail_onblur(oThis, iSeqRow) {
  do_ajax_form_clients_steps_renew_validate_addtl_memb_mail();
  scCssBlur(oThis);
}

function sc_form_clients_steps_renew_addtl_memb_mail_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_clients_steps_renew_addtl_memb_mail_onfocus(oThis, iSeqRow) {
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
}

function displayChange_page_1(status) {
        displayChange_block("2", status);
        displayChange_block("3", status);
}

function displayChange_page_2(status) {
        displayChange_block("4", status);
        displayChange_block("5", status);
        displayChange_block("6", status);
}

function displayChange_page_3(status) {
        displayChange_block("7", status);
        displayChange_block("8", status);
        displayChange_block("9", status);
        displayChange_block("10", status);
        displayChange_block("11", status);
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
        if ("9" == block) {
                displayChange_block_9(status);
        }
        if ("10" == block) {
                displayChange_block_10(status);
        }
        if ("11" == block) {
                displayChange_block_11(status);
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
        displayChange_field("bus_cat_id", "", status);
        displayChange_field("state", "", status);
        displayChange_field("bus_subcat_id", "", status);
        displayChange_field("zip_code", "", status);
        displayChange_field("bus_subcat_other", "", status);
        displayChange_field("phone_number", "", status);
        displayChange_field("website_url", "", status);
        displayChange_field("email", "", status);
        displayChange_field("acct_instagram", "", status);
        displayChange_field("dummy01", "", status);
        displayChange_field("acct_facebook", "", status);
        displayChange_field("dummy04", "", status);
}

function displayChange_block_1(status) {
        displayChange_field("dummy07", "", status);
        displayChange_field("dummy08", "", status);
        displayChange_field("main_contact_name", "", status);
        displayChange_field("main_contact_phone", "", status);
        displayChange_field("main_contact_email", "", status);
        displayChange_field("main_contact_title", "", status);
        displayChange_field("main_contact_img_id", "", status);
}

function displayChange_block_2(status) {
        displayChange_field("doc_type", "", status);
        displayChange_field("doc_file", "", status);
}

function displayChange_block_3(status) {
        displayChange_field("appn_note", "", status);
}

function displayChange_block_4(status) {
        displayChange_field("memb_name", "", status);
        displayChange_field("memb_phone", "", status);
        displayChange_field("memb_email", "", status);
        displayChange_field("memb_note", "", status);
        displayChange_field("member1_name", "", status);
        displayChange_field("member1_phone", "", status);
        displayChange_field("member1_email", "", status);
        displayChange_field("member1_note", "", status);
        displayChange_field("member2_name", "", status);
        displayChange_field("member2_phone", "", status);
        displayChange_field("member2_email", "", status);
        displayChange_field("member2_note", "", status);
        displayChange_field("member3_name", "", status);
        displayChange_field("member3_phone", "", status);
        displayChange_field("member3_email", "", status);
        displayChange_field("member3_note", "", status);
        displayChange_field("dummy05", "", status);
}

function displayChange_block_5(status) {
        displayChange_field("adtl_memb_name", "", status);
        displayChange_field("adtl_memb_phone", "", status);
        displayChange_field("adtl_memb_note", "", status);
        displayChange_field("addtl_memb_mail", "", status);
        displayChange_field("member4_name", "", status);
        displayChange_field("member4_phone", "", status);
        displayChange_field("member4_email", "", status);
        displayChange_field("member4_note", "", status);
        displayChange_field("member5_name", "", status);
        displayChange_field("member5_phone", "", status);
        displayChange_field("member5_email", "", status);
        displayChange_field("member5_note", "", status);
        displayChange_field("member6_name", "", status);
        displayChange_field("member6_phone", "", status);
        displayChange_field("member6_email", "", status);
        displayChange_field("member6_note", "", status);
        displayChange_field("member7_name", "", status);
        displayChange_field("member7_phone", "", status);
        displayChange_field("member7_email", "", status);
        displayChange_field("member7_note", "", status);
        displayChange_field("member8_name", "", status);
        displayChange_field("member8_phone", "", status);
        displayChange_field("member8_email", "", status);
        displayChange_field("member8_note", "", status);
        displayChange_field("member9_name", "", status);
        displayChange_field("member9_phone", "", status);
        displayChange_field("member9_email", "", status);
        displayChange_field("member9_note", "", status);
        displayChange_field("member10_name", "", status);
        displayChange_field("member10_phone", "", status);
        displayChange_field("member10_email", "", status);
        displayChange_field("member10_note", "", status);
        displayChange_field("dummy06", "", status);
}

function displayChange_block_6(status) {
        displayChange_field("xlsx_sample", "", status);
        displayChange_field("more_buyers_xlsx", "", status);
        displayChange_field("buyers_excel_qty", "", status);
        displayChange_field("dummy09", "", status);
        displayChange_field("dummy11", "", status);
}

function displayChange_block_7(status) {
        displayChange_field("rules", "", status);
        displayChange_field("rules_warn", "", status);
}

function displayChange_block_8(status) {
        displayChange_field("memb_levels", "", status);
}

function displayChange_block_9(status) {
        displayChange_field("est_memb_cost", "", status);
        displayChange_field("pay", "", status);
}

function displayChange_block_10(status) {
        displayChange_field("read_at_sign", "", status);
        displayChange_field("applicant_name", "", status);
        displayChange_field("applicant_title", "", status);
}

function displayChange_block_11(status) {
        displayChange_field("dummy10", "", status);
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
        displayChange_field_bus_cat_id(row, status);
        displayChange_field_state(row, status);
        displayChange_field_bus_subcat_id(row, status);
        displayChange_field_zip_code(row, status);
        displayChange_field_bus_subcat_other(row, status);
        displayChange_field_phone_number(row, status);
        displayChange_field_website_url(row, status);
        displayChange_field_email(row, status);
        displayChange_field_acct_instagram(row, status);
        displayChange_field_dummy01(row, status);
        displayChange_field_acct_facebook(row, status);
        displayChange_field_dummy04(row, status);
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
        displayChange_field_memb_name(row, status);
        displayChange_field_memb_phone(row, status);
        displayChange_field_memb_email(row, status);
        displayChange_field_memb_note(row, status);
        displayChange_field_member1_name(row, status);
        displayChange_field_member1_phone(row, status);
        displayChange_field_member1_email(row, status);
        displayChange_field_member1_note(row, status);
        displayChange_field_member2_name(row, status);
        displayChange_field_member2_phone(row, status);
        displayChange_field_member2_email(row, status);
        displayChange_field_member2_note(row, status);
        displayChange_field_member3_name(row, status);
        displayChange_field_member3_phone(row, status);
        displayChange_field_member3_email(row, status);
        displayChange_field_member3_note(row, status);
        displayChange_field_dummy05(row, status);
        displayChange_field_adtl_memb_name(row, status);
        displayChange_field_adtl_memb_phone(row, status);
        displayChange_field_adtl_memb_note(row, status);
        displayChange_field_addtl_memb_mail(row, status);
        displayChange_field_member4_name(row, status);
        displayChange_field_member4_phone(row, status);
        displayChange_field_member4_email(row, status);
        displayChange_field_member4_note(row, status);
        displayChange_field_member5_name(row, status);
        displayChange_field_member5_phone(row, status);
        displayChange_field_member5_email(row, status);
        displayChange_field_member5_note(row, status);
        displayChange_field_member6_name(row, status);
        displayChange_field_member6_phone(row, status);
        displayChange_field_member6_email(row, status);
        displayChange_field_member6_note(row, status);
        displayChange_field_member7_name(row, status);
        displayChange_field_member7_phone(row, status);
        displayChange_field_member7_email(row, status);
        displayChange_field_member7_note(row, status);
        displayChange_field_member8_name(row, status);
        displayChange_field_member8_phone(row, status);
        displayChange_field_member8_email(row, status);
        displayChange_field_member8_note(row, status);
        displayChange_field_member9_name(row, status);
        displayChange_field_member9_phone(row, status);
        displayChange_field_member9_email(row, status);
        displayChange_field_member9_note(row, status);
        displayChange_field_member10_name(row, status);
        displayChange_field_member10_phone(row, status);
        displayChange_field_member10_email(row, status);
        displayChange_field_member10_note(row, status);
        displayChange_field_dummy06(row, status);
        displayChange_field_xlsx_sample(row, status);
        displayChange_field_more_buyers_xlsx(row, status);
        displayChange_field_buyers_excel_qty(row, status);
        displayChange_field_dummy09(row, status);
        displayChange_field_dummy11(row, status);
        displayChange_field_rules(row, status);
        displayChange_field_rules_warn(row, status);
        displayChange_field_memb_levels(row, status);
        displayChange_field_est_memb_cost(row, status);
        displayChange_field_pay(row, status);
        displayChange_field_read_at_sign(row, status);
        displayChange_field_applicant_name(row, status);
        displayChange_field_applicant_title(row, status);
        displayChange_field_dummy10(row, status);
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
        if ("bus_cat_id" == field) {
                displayChange_field_bus_cat_id(row, status);
        }
        if ("state" == field) {
                displayChange_field_state(row, status);
        }
        if ("bus_subcat_id" == field) {
                displayChange_field_bus_subcat_id(row, status);
        }
        if ("zip_code" == field) {
                displayChange_field_zip_code(row, status);
        }
        if ("bus_subcat_other" == field) {
                displayChange_field_bus_subcat_other(row, status);
        }
        if ("phone_number" == field) {
                displayChange_field_phone_number(row, status);
        }
        if ("website_url" == field) {
                displayChange_field_website_url(row, status);
        }
        if ("email" == field) {
                displayChange_field_email(row, status);
        }
        if ("acct_instagram" == field) {
                displayChange_field_acct_instagram(row, status);
        }
        if ("dummy01" == field) {
                displayChange_field_dummy01(row, status);
        }
        if ("acct_facebook" == field) {
                displayChange_field_acct_facebook(row, status);
        }
        if ("dummy04" == field) {
                displayChange_field_dummy04(row, status);
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
        if ("memb_name" == field) {
                displayChange_field_memb_name(row, status);
        }
        if ("memb_phone" == field) {
                displayChange_field_memb_phone(row, status);
        }
        if ("memb_email" == field) {
                displayChange_field_memb_email(row, status);
        }
        if ("memb_note" == field) {
                displayChange_field_memb_note(row, status);
        }
        if ("member1_name" == field) {
                displayChange_field_member1_name(row, status);
        }
        if ("member1_phone" == field) {
                displayChange_field_member1_phone(row, status);
        }
        if ("member1_email" == field) {
                displayChange_field_member1_email(row, status);
        }
        if ("member1_note" == field) {
                displayChange_field_member1_note(row, status);
        }
        if ("member2_name" == field) {
                displayChange_field_member2_name(row, status);
        }
        if ("member2_phone" == field) {
                displayChange_field_member2_phone(row, status);
        }
        if ("member2_email" == field) {
                displayChange_field_member2_email(row, status);
        }
        if ("member2_note" == field) {
                displayChange_field_member2_note(row, status);
        }
        if ("member3_name" == field) {
                displayChange_field_member3_name(row, status);
        }
        if ("member3_phone" == field) {
                displayChange_field_member3_phone(row, status);
        }
        if ("member3_email" == field) {
                displayChange_field_member3_email(row, status);
        }
        if ("member3_note" == field) {
                displayChange_field_member3_note(row, status);
        }
        if ("dummy05" == field) {
                displayChange_field_dummy05(row, status);
        }
        if ("adtl_memb_name" == field) {
                displayChange_field_adtl_memb_name(row, status);
        }
        if ("adtl_memb_phone" == field) {
                displayChange_field_adtl_memb_phone(row, status);
        }
        if ("adtl_memb_note" == field) {
                displayChange_field_adtl_memb_note(row, status);
        }
        if ("addtl_memb_mail" == field) {
                displayChange_field_addtl_memb_mail(row, status);
        }
        if ("member4_name" == field) {
                displayChange_field_member4_name(row, status);
        }
        if ("member4_phone" == field) {
                displayChange_field_member4_phone(row, status);
        }
        if ("member4_email" == field) {
                displayChange_field_member4_email(row, status);
        }
        if ("member4_note" == field) {
                displayChange_field_member4_note(row, status);
        }
        if ("member5_name" == field) {
                displayChange_field_member5_name(row, status);
        }
        if ("member5_phone" == field) {
                displayChange_field_member5_phone(row, status);
        }
        if ("member5_email" == field) {
                displayChange_field_member5_email(row, status);
        }
        if ("member5_note" == field) {
                displayChange_field_member5_note(row, status);
        }
        if ("member6_name" == field) {
                displayChange_field_member6_name(row, status);
        }
        if ("member6_phone" == field) {
                displayChange_field_member6_phone(row, status);
        }
        if ("member6_email" == field) {
                displayChange_field_member6_email(row, status);
        }
        if ("member6_note" == field) {
                displayChange_field_member6_note(row, status);
        }
        if ("member7_name" == field) {
                displayChange_field_member7_name(row, status);
        }
        if ("member7_phone" == field) {
                displayChange_field_member7_phone(row, status);
        }
        if ("member7_email" == field) {
                displayChange_field_member7_email(row, status);
        }
        if ("member7_note" == field) {
                displayChange_field_member7_note(row, status);
        }
        if ("member8_name" == field) {
                displayChange_field_member8_name(row, status);
        }
        if ("member8_phone" == field) {
                displayChange_field_member8_phone(row, status);
        }
        if ("member8_email" == field) {
                displayChange_field_member8_email(row, status);
        }
        if ("member8_note" == field) {
                displayChange_field_member8_note(row, status);
        }
        if ("member9_name" == field) {
                displayChange_field_member9_name(row, status);
        }
        if ("member9_phone" == field) {
                displayChange_field_member9_phone(row, status);
        }
        if ("member9_email" == field) {
                displayChange_field_member9_email(row, status);
        }
        if ("member9_note" == field) {
                displayChange_field_member9_note(row, status);
        }
        if ("member10_name" == field) {
                displayChange_field_member10_name(row, status);
        }
        if ("member10_phone" == field) {
                displayChange_field_member10_phone(row, status);
        }
        if ("member10_email" == field) {
                displayChange_field_member10_email(row, status);
        }
        if ("member10_note" == field) {
                displayChange_field_member10_note(row, status);
        }
        if ("dummy06" == field) {
                displayChange_field_dummy06(row, status);
        }
        if ("xlsx_sample" == field) {
                displayChange_field_xlsx_sample(row, status);
        }
        if ("more_buyers_xlsx" == field) {
                displayChange_field_more_buyers_xlsx(row, status);
        }
        if ("buyers_excel_qty" == field) {
                displayChange_field_buyers_excel_qty(row, status);
        }
        if ("dummy09" == field) {
                displayChange_field_dummy09(row, status);
        }
        if ("dummy11" == field) {
                displayChange_field_dummy11(row, status);
        }
        if ("rules" == field) {
                displayChange_field_rules(row, status);
        }
        if ("rules_warn" == field) {
                displayChange_field_rules_warn(row, status);
        }
        if ("memb_levels" == field) {
                displayChange_field_memb_levels(row, status);
        }
        if ("est_memb_cost" == field) {
                displayChange_field_est_memb_cost(row, status);
        }
        if ("pay" == field) {
                displayChange_field_pay(row, status);
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
        if ("dummy10" == field) {
                displayChange_field_dummy10(row, status);
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

function displayChange_field_bus_cat_id(row, status) {
    var fieldId;
}

function displayChange_field_state(row, status) {
    var fieldId;
}

function displayChange_field_bus_subcat_id(row, status) {
    var fieldId;
}

function displayChange_field_zip_code(row, status) {
    var fieldId;
}

function displayChange_field_bus_subcat_other(row, status) {
    var fieldId;
}

function displayChange_field_phone_number(row, status) {
    var fieldId;
}

function displayChange_field_website_url(row, status) {
    var fieldId;
}

function displayChange_field_email(row, status) {
    var fieldId;
}

function displayChange_field_acct_instagram(row, status) {
    var fieldId;
}

function displayChange_field_dummy01(row, status) {
    var fieldId;
}

function displayChange_field_acct_facebook(row, status) {
    var fieldId;
}

function displayChange_field_dummy04(row, status) {
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

function displayChange_field_memb_name(row, status) {
    var fieldId;
}

function displayChange_field_memb_phone(row, status) {
    var fieldId;
}

function displayChange_field_memb_email(row, status) {
    var fieldId;
}

function displayChange_field_memb_note(row, status) {
    var fieldId;
}

function displayChange_field_member1_name(row, status) {
    var fieldId;
}

function displayChange_field_member1_phone(row, status) {
    var fieldId;
}

function displayChange_field_member1_email(row, status) {
    var fieldId;
}

function displayChange_field_member1_note(row, status) {
    var fieldId;
}

function displayChange_field_member2_name(row, status) {
    var fieldId;
}

function displayChange_field_member2_phone(row, status) {
    var fieldId;
}

function displayChange_field_member2_email(row, status) {
    var fieldId;
}

function displayChange_field_member2_note(row, status) {
    var fieldId;
}

function displayChange_field_member3_name(row, status) {
    var fieldId;
}

function displayChange_field_member3_phone(row, status) {
    var fieldId;
}

function displayChange_field_member3_email(row, status) {
    var fieldId;
}

function displayChange_field_member3_note(row, status) {
    var fieldId;
}

function displayChange_field_dummy05(row, status) {
    var fieldId;
}

function displayChange_field_adtl_memb_name(row, status) {
    var fieldId;
}

function displayChange_field_adtl_memb_phone(row, status) {
    var fieldId;
}

function displayChange_field_adtl_memb_note(row, status) {
    var fieldId;
}

function displayChange_field_addtl_memb_mail(row, status) {
    var fieldId;
}

function displayChange_field_member4_name(row, status) {
    var fieldId;
}

function displayChange_field_member4_phone(row, status) {
    var fieldId;
}

function displayChange_field_member4_email(row, status) {
    var fieldId;
}

function displayChange_field_member4_note(row, status) {
    var fieldId;
}

function displayChange_field_member5_name(row, status) {
    var fieldId;
}

function displayChange_field_member5_phone(row, status) {
    var fieldId;
}

function displayChange_field_member5_email(row, status) {
    var fieldId;
}

function displayChange_field_member5_note(row, status) {
    var fieldId;
}

function displayChange_field_member6_name(row, status) {
    var fieldId;
}

function displayChange_field_member6_phone(row, status) {
    var fieldId;
}

function displayChange_field_member6_email(row, status) {
    var fieldId;
}

function displayChange_field_member6_note(row, status) {
    var fieldId;
}

function displayChange_field_member7_name(row, status) {
    var fieldId;
}

function displayChange_field_member7_phone(row, status) {
    var fieldId;
}

function displayChange_field_member7_email(row, status) {
    var fieldId;
}

function displayChange_field_member7_note(row, status) {
    var fieldId;
}

function displayChange_field_member8_name(row, status) {
    var fieldId;
}

function displayChange_field_member8_phone(row, status) {
    var fieldId;
}

function displayChange_field_member8_email(row, status) {
    var fieldId;
}

function displayChange_field_member8_note(row, status) {
    var fieldId;
}

function displayChange_field_member9_name(row, status) {
    var fieldId;
}

function displayChange_field_member9_phone(row, status) {
    var fieldId;
}

function displayChange_field_member9_email(row, status) {
    var fieldId;
}

function displayChange_field_member9_note(row, status) {
    var fieldId;
}

function displayChange_field_member10_name(row, status) {
    var fieldId;
}

function displayChange_field_member10_phone(row, status) {
    var fieldId;
}

function displayChange_field_member10_email(row, status) {
    var fieldId;
}

function displayChange_field_member10_note(row, status) {
    var fieldId;
}

function displayChange_field_dummy06(row, status) {
    var fieldId;
}

function displayChange_field_xlsx_sample(row, status) {
    var fieldId;
}

function displayChange_field_more_buyers_xlsx(row, status) {
    var fieldId;
}

function displayChange_field_buyers_excel_qty(row, status) {
    var fieldId;
}

function displayChange_field_dummy09(row, status) {
    var fieldId;
}

function displayChange_field_dummy11(row, status) {
    var fieldId;
}

function displayChange_field_rules(row, status) {
    var fieldId;
}

function displayChange_field_rules_warn(row, status) {
    var fieldId;
}

function displayChange_field_memb_levels(row, status) {
    var fieldId;
}

function displayChange_field_est_memb_cost(row, status) {
    var fieldId;
}

function displayChange_field_pay(row, status) {
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

function displayChange_field_dummy10(row, status) {
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
        $("#id_form_clients_steps_renew_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
        if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
                var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
                if (inactiveTabs.length) {
                        var tabNo = $(inactiveTabs[0]).attr("id").substr(32);
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
      do_ajax_form_clients_steps_renew_validate_starting_date(iSeqRow);
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
      do_ajax_form_clients_steps_renew_validate_renewal_date(iSeqRow);
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
      do_ajax_form_clients_steps_renew_validate_expiration_date(iSeqRow);
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
      do_ajax_form_clients_steps_renew_validate_cancel_date(iSeqRow);
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
      do_ajax_form_clients_steps_renew_validate_retire_date(iSeqRow);
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
      do_ajax_form_clients_steps_renew_validate_date_last_updated(iSeqRow);
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
      do_ajax_form_clients_steps_renew_validate_archive_date(iSeqRow);
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
      do_ajax_form_clients_steps_renew_validate_record_created(iSeqRow);
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
      do_ajax_form_clients_steps_renew_validate_permanent_member_date(iSeqRow);
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
        info.css({
          top: trigger.offset().top - (info.height() - trigger.height()),
          left: trigger.offset().left - ((info.width() - trigger.width()) / 2),
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
    url: "form_clients_steps_renew_ul_save.php",
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

  $("#id_sc_field_doc_file" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_clients_steps_renew_ul_save.php",
    dropZone: $("#hidden_field_data_doc_file" + iSeqRow),
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
    url: "form_clients_steps_renew_ul_save.php",
    dropZone: $("#hidden_field_data_more_buyers_xlsx" + iSeqRow),
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_clients_steps_renew')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
    width: "500px",
    height: "150px",
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

function scJQSlideAdd(seqRow) {
  $("#sc-ui-slide-buyers_excel_qty" + seqRow).slider({
    min: 0,
    max: 100,
    range: "min",
    step: 1,
    slide: function(event, ui) {
      var thisValue = ui.value;
      if (_scOnInputSupport && !_scMacOs) {
        $("#id_sc_field_buyers_excel_qty" + seqRow).val(thisValue);
        $("#id_sc_field_buyers_excel_qty" + seqRow).scInput("formatValue");
      }
      else {
        $("#id_sc_field_buyers_excel_qty" + seqRow).val(scFormatValue_buyers_excel_qty(thisValue));
      }
      var changedRow = $("input[name='sc_check_vert[" + seqRow + "]']");
      if (changedRow.length) {
        $(changedRow[0]).prop("checked", true);
      }
    },
    stop: function(event, ui) {
        $("#id_sc_field_buyers_excel_qty" + seqRow).change();
    }
  });
  scJQSlideValue("buyers_excel_qty" + seqRow, seqRow);
} // scJQSlideAdd

function scFormatValue_buyers_excel_qty(thisValue) {
<?php
if ('.' == $this->field_config['buyers_excel_qty']['symbol_grp']) {
?>
  thisValue = thisValue.toLocaleString("pt");
<?php
}
elseif (',' == $this->field_config['buyers_excel_qty']['symbol_grp']) {
?>
  thisValue = thisValue.toLocaleString("en");
<?php
}
elseif ('' != $this->field_config['buyers_excel_qty']['symbol_grp']) {
?>
  thisValue = thisValue.toLocaleString("pt").replace(new RegExp(scRegExpQuote("."), "g"), "<?php echo $this->field_config['buyers_excel_qty']['symbol_grp']; ?>");
<?php
}
?>
  return thisValue;
} // scFormatValue_buyers_excel_qty

function scUnformatValue_buyers_excel_qty(thisValue) {
<?php
if ('' != $this->field_config['buyers_excel_qty']['symbol_grp']) {
?>
  thisValue = thisValue.replace(new RegExp(scRegExpQuote("<?php echo $this->field_config['buyers_excel_qty']['symbol_grp']; ?>"), "g"), "");
<?php
}
?>
  return thisValue;
} // scUnformatValue_buyers_excel_qty

function scJQSlideValue(fieldName, seqRow) {
  var fieldValue = $("#id_sc_field_" + fieldName).val();
  var testFieldName = fieldName;
  if ("" != seqRow) {
    testFieldName = testFieldName.substr(0, testFieldName.length - seqRow.toString().length);
  }
  if ("buyers_excel_qty" == testFieldName) {
    fieldValue = scUnformatValue_buyers_excel_qty(fieldValue);
  }
  if ("" == fieldValue) {
    return;
  }
  fieldValue = parseFloat(fieldValue);
  if ("number" != typeof(fieldValue)) {
    return;
  }
  $("#sc-ui-slide-" + fieldName).slider("value", fieldValue);
} // scJQSlideValue

function scRegExpQuote(str) {
  return str.replace(/([.?*+^$[\]\\(){}|-])/g, "\\$1");
} // scRegExpQuote

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

var wizardActualStep = <?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['form_wizard']['actual_step']; ?>;
var wizardTotalSteps = <?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['form_wizard']['total_steps']; ?>;
var wizardIsInsert = <?php echo ('novo' == $this->nmgp_opcao || $GLOBALS["erro_incl"] == 1 ? 'true' : 'false'); ?>;
var wizardViewMode = '<?php echo ('novo' == $this->nmgp_opcao || $GLOBALS["erro_incl"] == 1 ? 'wizard' : 'wiz_step'); ?>';
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
        do_ajax_form_clients_steps_renew_submit_page_0(stepGoTo);
    }
    if (1 == wizardActualStep) {
        do_ajax_form_clients_steps_renew_submit_page_1(stepGoTo);
    }
    if (2 == wizardActualStep) {
        do_ajax_form_clients_steps_renew_submit_page_2(stepGoTo);
    }
    if (3 == wizardActualStep) {
        do_ajax_form_clients_steps_renew_submit_page_3(stepGoTo);
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
            scJQWizardPreviousButtonDisable();
        } else {
            scJQWizardPreviousButtonEnable();
        }
        if (scJQWizardIsLastStep()) {
            scJQWizardNextButtonDisable();
        } else {
            scJQWizardNextButtonEnable();
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
    $("#form_clients_steps_renew_form" + stepNo).css({
        "width": "1px",
        "height": "0",
        "display": "none",
        "overflow": "scroll",
    });
}

function scJQWizardShowFormStep(stepNo)
{
    $("#form_clients_steps_renew_form" + stepNo).css({
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
  scJQSlideAdd(iLine);
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
        if ("tiff" == thisFileExtension && 15728640 < thisField.files[0].size) {
            return 'err_size||TIFF||15 MB';
        }
        if ("gif" == thisFileExtension && 15728640 < thisField.files[0].size) {
            return 'err_size||GIF||15 MB';
        }
        if ("bmp" == thisFileExtension && 15728640 < thisField.files[0].size) {
            return 'err_size||BMP||15 MB';
        }

        if (!["pdf", "jpg", "jpeg", "png", "tiff", "gif", "bmp"].includes(thisFileExtension)) {
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

        if (!["pdf", "jpg", "jpeg", "png", "bmp", "gif", "tiff", "svg"].includes(thisFileExtension)) {
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

