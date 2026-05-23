
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
  scEventControl_data["client_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["bus_name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cat" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sub_cat" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["main_contact" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["membs_num" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["status" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["total" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cost_per_buyer" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["client_id" + iSeqRow] && scEventControl_data["client_id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["client_id" + iSeqRow] && scEventControl_data["client_id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["bus_name" + iSeqRow] && scEventControl_data["bus_name" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bus_name" + iSeqRow] && scEventControl_data["bus_name" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cat" + iSeqRow] && scEventControl_data["cat" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cat" + iSeqRow] && scEventControl_data["cat" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sub_cat" + iSeqRow] && scEventControl_data["sub_cat" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sub_cat" + iSeqRow] && scEventControl_data["sub_cat" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["main_contact" + iSeqRow] && scEventControl_data["main_contact" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["main_contact" + iSeqRow] && scEventControl_data["main_contact" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow] && scEventControl_data["email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow] && scEventControl_data["email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["membs_num" + iSeqRow] && scEventControl_data["membs_num" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["membs_num" + iSeqRow] && scEventControl_data["membs_num" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["status" + iSeqRow] && scEventControl_data["status" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["status" + iSeqRow] && scEventControl_data["status" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["total" + iSeqRow] && scEventControl_data["total" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["total" + iSeqRow] && scEventControl_data["total" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cost_per_buyer" + iSeqRow] && scEventControl_data["cost_per_buyer" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cost_per_buyer" + iSeqRow] && scEventControl_data["cost_per_buyer" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  if ("membs_num" + iSeq == fieldName) {
    _scCalculatorBlurOk[fieldId] = false;
  }
  if ("total" + iSeq == fieldName) {
    _scCalculatorBlurOk[fieldId] = false;
  }
  scEventControl_data[fieldName]["blur"] = true;
  if ("membs_num" + iSeq == fieldName) {
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

function scEventControl_onCalculator_membs_num() {
  if (!_scCalculatorControl["id_sc_field_membs_num"]) {
    _scCalculatorBlurOk["id_sc_field_membs_num"] = true;
    do_ajax_control_members_add_charge_mob_event_membs_num_onblur();
  }
} // scEventControl_onCalculator_membs_num

function scEventControl_onCalculator_total() {
  if (!_scCalculatorControl["id_sc_field_total"]) {
    _scCalculatorBlurOk["id_sc_field_total"] = true;
    do_ajax_control_members_add_charge_mob_event_total_onblur();
  }
} // scEventControl_onCalculator_total

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_client_id' + iSeqRow).bind('blur', function() { sc_control_members_add_charge_client_id_onblur('#id_sc_field_client_id' + iSeqRow, iSeqRow) })
                                       .bind('focus', function() { sc_control_members_add_charge_client_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_membs_num' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_control_members_add_charge_membs_num_onblur('#id_sc_field_membs_num' + iSeqRow, iSeqRow);}, 300) })
                                       .bind('change', function() { sc_control_members_add_charge_membs_num_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_control_members_add_charge_membs_num_onfocus(this, iSeqRow) });
  $('#id_sc_field_total' + iSeqRow).bind('blur', function() { sc_control_members_add_charge_total_onblur('#id_sc_field_total' + iSeqRow, iSeqRow) })
                                   .bind('focus', function() { sc_control_members_add_charge_total_onfocus(this, iSeqRow) });
  $('#id_sc_field_cat' + iSeqRow).bind('blur', function() { sc_control_members_add_charge_cat_onblur('#id_sc_field_cat' + iSeqRow, iSeqRow) })
                                 .bind('focus', function() { sc_control_members_add_charge_cat_onfocus(this, iSeqRow) });
  $('#id_sc_field_sub_cat' + iSeqRow).bind('blur', function() { sc_control_members_add_charge_sub_cat_onblur('#id_sc_field_sub_cat' + iSeqRow, iSeqRow) })
                                     .bind('focus', function() { sc_control_members_add_charge_sub_cat_onfocus(this, iSeqRow) });
  $('#id_sc_field_bus_name' + iSeqRow).bind('blur', function() { sc_control_members_add_charge_bus_name_onblur('#id_sc_field_bus_name' + iSeqRow, iSeqRow) })
                                      .bind('focus', function() { sc_control_members_add_charge_bus_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_email' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_control_members_add_charge_email_onblur('#id_sc_field_email' + iSeqRow, iSeqRow);}, 300) })
                                   .bind('focus', function() { sc_control_members_add_charge_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_main_contact' + iSeqRow).bind('blur', function() { setTimeout(function() {sc_control_members_add_charge_main_contact_onblur('#id_sc_field_main_contact' + iSeqRow, iSeqRow);}, 300) })
                                          .bind('focus', function() { sc_control_members_add_charge_main_contact_onfocus(this, iSeqRow) });
  $('#id_sc_field_status' + iSeqRow).bind('blur', function() { sc_control_members_add_charge_status_onblur('#id_sc_field_status' + iSeqRow, iSeqRow) })
                                    .bind('focus', function() { sc_control_members_add_charge_status_onfocus(this, iSeqRow) });
  $('#id_sc_field_cost_per_buyer' + iSeqRow).bind('blur', function() { sc_control_members_add_charge_cost_per_buyer_onblur('#id_sc_field_cost_per_buyer' + iSeqRow, iSeqRow) })
                                            .bind('focus', function() { sc_control_members_add_charge_cost_per_buyer_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_control_members_add_charge_client_id_onblur(oThis, iSeqRow) {
  do_ajax_control_members_add_charge_mob_validate_client_id();
  scCssBlur(oThis);
}

function sc_control_members_add_charge_client_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_members_add_charge_membs_num_onblur(oThis, iSeqRow) {
  do_ajax_control_members_add_charge_mob_validate_membs_num();
  scCssBlur(oThis);
}

function sc_control_members_add_charge_membs_num_onchange(oThis, iSeqRow) {
  do_ajax_control_members_add_charge_mob_event_membs_num_onchange();
}

function sc_control_members_add_charge_membs_num_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_members_add_charge_total_onblur(oThis, iSeqRow) {
  do_ajax_control_members_add_charge_mob_validate_total();
  scCssBlur(oThis);
}

function sc_control_members_add_charge_total_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_members_add_charge_cat_onblur(oThis, iSeqRow) {
  do_ajax_control_members_add_charge_mob_validate_cat();
  scCssBlur(oThis);
}

function sc_control_members_add_charge_cat_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_members_add_charge_sub_cat_onblur(oThis, iSeqRow) {
  do_ajax_control_members_add_charge_mob_validate_sub_cat();
  scCssBlur(oThis);
}

function sc_control_members_add_charge_sub_cat_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_members_add_charge_bus_name_onblur(oThis, iSeqRow) {
  do_ajax_control_members_add_charge_mob_validate_bus_name();
  scCssBlur(oThis);
}

function sc_control_members_add_charge_bus_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_members_add_charge_email_onblur(oThis, iSeqRow) {
  do_ajax_control_members_add_charge_mob_validate_email();
  scCssBlur(oThis);
}

function sc_control_members_add_charge_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_members_add_charge_main_contact_onblur(oThis, iSeqRow) {
  do_ajax_control_members_add_charge_mob_validate_main_contact();
  scCssBlur(oThis);
}

function sc_control_members_add_charge_main_contact_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_members_add_charge_status_onblur(oThis, iSeqRow) {
  do_ajax_control_members_add_charge_mob_validate_status();
  scCssBlur(oThis);
}

function sc_control_members_add_charge_status_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_members_add_charge_cost_per_buyer_onblur(oThis, iSeqRow) {
  do_ajax_control_members_add_charge_mob_validate_cost_per_buyer();
  scCssBlur(oThis);
}

function sc_control_members_add_charge_cost_per_buyer_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
        if ("0" == block) {
                displayChange_block_0(status);
        }
}

function displayChange_block_0(status) {
        displayChange_field("client_id", "", status);
        displayChange_field("bus_name", "", status);
        displayChange_field("cat", "", status);
        displayChange_field("sub_cat", "", status);
        displayChange_field("main_contact", "", status);
        displayChange_field("email", "", status);
        displayChange_field("membs_num", "", status);
        displayChange_field("status", "", status);
        displayChange_field("total", "", status);
        displayChange_field("cost_per_buyer", "", status);
}

function displayChange_row(row, status) {
        displayChange_field_client_id(row, status);
        displayChange_field_bus_name(row, status);
        displayChange_field_cat(row, status);
        displayChange_field_sub_cat(row, status);
        displayChange_field_main_contact(row, status);
        displayChange_field_email(row, status);
        displayChange_field_membs_num(row, status);
        displayChange_field_status(row, status);
        displayChange_field_total(row, status);
        displayChange_field_cost_per_buyer(row, status);
}

function displayChange_field(field, row, status) {
        if ("client_id" == field) {
                displayChange_field_client_id(row, status);
        }
        if ("bus_name" == field) {
                displayChange_field_bus_name(row, status);
        }
        if ("cat" == field) {
                displayChange_field_cat(row, status);
        }
        if ("sub_cat" == field) {
                displayChange_field_sub_cat(row, status);
        }
        if ("main_contact" == field) {
                displayChange_field_main_contact(row, status);
        }
        if ("email" == field) {
                displayChange_field_email(row, status);
        }
        if ("membs_num" == field) {
                displayChange_field_membs_num(row, status);
        }
        if ("status" == field) {
                displayChange_field_status(row, status);
        }
        if ("total" == field) {
                displayChange_field_total(row, status);
        }
        if ("cost_per_buyer" == field) {
                displayChange_field_cost_per_buyer(row, status);
        }
}

function displayChange_field_client_id(row, status) {
    var fieldId;
}

function displayChange_field_bus_name(row, status) {
    var fieldId;
}

function displayChange_field_cat(row, status) {
    var fieldId;
}

function displayChange_field_sub_cat(row, status) {
    var fieldId;
}

function displayChange_field_main_contact(row, status) {
    var fieldId;
}

function displayChange_field_email(row, status) {
    var fieldId;
}

function displayChange_field_membs_num(row, status) {
    var fieldId;
}

function displayChange_field_status(row, status) {
    var fieldId;
}

function displayChange_field_total(row, status) {
    var fieldId;
}

function displayChange_field_cost_per_buyer(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
        $(".sc-form-page").show();
}

function scHidePage(pageNo) {
        $("#id_control_members_add_charge_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
        if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
                var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
                if (inactiveTabs.length) {
                        var tabNo = $(inactiveTabs[0]).attr("id").substr(38);
                }
        }
}
var jqCalcMonetPos = {};
var _scCalculatorBlurOk = {};

function scJQCalculatorAdd(iSeqRow) {
  _scCalculatorBlurOk["id_sc_field_token_exp" + iSeqRow] = true;
  $("#id_sc_field_membs_num" + iSeqRow).calculator({
    onOpen: function(value, inst) {
      if (typeof _scCalculatorControl !== "undefined") {
        if (!_scCalculatorControl["id_sc_field_membs_num" + iSeqRow]) {
          _scCalculatorControl["id_sc_field_membs_num" + iSeqRow] = true;
        }
      }
      value = scJQCalculatorUnformat(value, "#id_sc_field_membs_num" + iSeqRow, '<?php echo str_replace("'", "\'", $this->field_config['membs_num']['symbol_grp']); ?>', <?php echo $this->field_config['membs_num']['symbol_fmt']; ?>, '', '');
      $(this).val(value);
      $(".calculator-popup").css("min-width", "200px");
    },
    onClose: function(value, inst) {
      var oldValue = $(this.val);
      if (typeof _scCalculatorControl !== "undefined") {
        if (_scCalculatorControl["id_sc_field_membs_num" + iSeqRow]) {
          _scCalculatorControl["id_sc_field_membs_num" + iSeqRow] = null;
        }
      }
      value = scJQCalculatorFormat(value, "#id_sc_field_membs_num" + iSeqRow, '<?php echo str_replace("'", "\'", $this->field_config['membs_num']['symbol_grp']); ?>', <?php echo $this->field_config['membs_num']['symbol_fmt']; ?>, '', 0, '');
      $(this).val(value);
      if (oldValue != value) {
        $(this).trigger('change');
      }
    },
    precision: 1,
    showOn: "button",
<?php
$miniCalculatorIcon = $this->jqueryIconFile('calculator');
$miniCalculatorFA   = $this->jqueryFAFile('calculator');
if ('' != $miniCalculatorIcon) {
?>
    buttonImage: "<?php echo $miniCalculatorIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalculatorFA) {
?>
    buttonText: "",
<?php
}
?>
  })
<?php
if ('' != $miniCalculatorFA) {
?>
    .next('button').append("<?php echo $miniCalculatorFA; ?>")
<?php
}
?>
;

  $("#id_sc_field_total" + iSeqRow).calculator({
    onOpen: function(value, inst) {
      if (typeof _scCalculatorControl !== "undefined") {
        if (!_scCalculatorControl["id_sc_field_total" + iSeqRow]) {
          _scCalculatorControl["id_sc_field_total" + iSeqRow] = true;
        }
      }
      value = scJQCalculatorUnformat(value, "#id_sc_field_total" + iSeqRow, '<?php echo str_replace("'", "\'", $this->field_config['total']['symbol_grp']); ?>', <?php echo $this->field_config['total']['symbol_fmt']; ?>, '<?php echo str_replace("'", "\'", $this->field_config['total']['symbol_dec']); ?>', '<?php echo str_replace("'", "\'", $this->field_config['total']['symbol_mon']); ?>');
      $(this).val(value);
      $(".calculator-popup").css("min-width", "200px");
    },
    onClose: function(value, inst) {
      var oldValue = $(this.val);
      if (typeof _scCalculatorControl !== "undefined") {
        if (_scCalculatorControl["id_sc_field_total" + iSeqRow]) {
          _scCalculatorControl["id_sc_field_total" + iSeqRow] = null;
        }
      }
      value = scJQCalculatorFormat(value, "#id_sc_field_total" + iSeqRow, '<?php echo str_replace("'", "\'", $this->field_config['total']['symbol_grp']); ?>', <?php echo $this->field_config['total']['symbol_fmt']; ?>, '<?php echo str_replace("'", "\'", $this->field_config['total']['symbol_dec']); ?>', 2, '<?php echo str_replace("'", "\'", $this->field_config['total']['symbol_mon']); ?>');
      $(this).val(value);
      if (oldValue != value) {
        $(this).trigger('change');
      }
    },
    precision: 2,
    showOn: "button",
<?php
$miniCalculatorIcon = $this->jqueryIconFile('calculator');
$miniCalculatorFA   = $this->jqueryFAFile('calculator');
if ('' != $miniCalculatorIcon) {
?>
    buttonImage: "<?php echo $miniCalculatorIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalculatorFA) {
?>
    buttonText: "",
<?php
}
?>
  })
<?php
if ('' != $miniCalculatorFA) {
?>
    .next('button').append("<?php echo $miniCalculatorFA; ?>")
<?php
}
?>
;

} // scJQCalculatorAdd

function scJQCalculatorUnformat(fValue, sField, sThousands, sFormat, sDecimals, sMonetary) {
  fValue = scJQCalculatorCurrency(fValue, sField, sMonetary);
  if ("" != sThousands) {
    if ("." == sThousands) {
      sThousands = "\\.";
    }
    sRegEx = eval("/" + sThousands + "/g");
    fValue = fValue.replace(sRegEx, "");
  }
  if ("." != sDecimals) {
    sRegEx = eval("/" + sDecimals + "/g");
    fValue = fValue.replace(sRegEx, ".");
  }
  if ("." == fValue.substr(0, 1) || "," == fValue.substr(0, 1)) {
    fValue = "0" + fValue;
  }
  return fValue;
} // scJQCalculatorUnformat

function scJQCalculatorFormat(fValue, sField, sThousands, sFormat, sDecimals, iPrecision, sMonetary) {
  fValue = scJQCalculatorCurrency(fValue.toString(), sField, sMonetary);
  if (-1 < fValue.indexOf('.')) {
    var parts = fValue.split('.'),
        pref = parts[0],
        suf = parts[1];
  }
  else {
    var pref = fValue,
        suf = '';
  }
  if ('' != sThousands) {
    if (3 == sFormat) {
      if (4 <= pref.length) {
        pref_rest = pref.substr(0, pref.length - 3);
        pref = sThousands + pref.substr(pref.length - 3);
        while (2 < pref_rest.length) {
          pref = sThousands + pref_rest.substr(pref_rest.length - 2) + pref;
          pref_rest = pref_rest.substr(0, pref_rest.length - 2);
        }
        if ('' != pref_rest) {
          pref = pref_rest + pref;
        }
      }
    }
    else if (2 == sFormat) {
      if (4 <= pref.length) {
        pref = pref.substr(0, pref.length - 3) + sThousands + pref.substr(pref.length - 3);
      }
    }
    else {
      pref_rest = pref;
      pref = '';
      while (3 < pref_rest.length) {
        pref = sThousands + pref_rest.substr(pref_rest.length - 3) + pref;
        pref_rest = pref_rest.substr(0, pref_rest.length - 3);
      }
      if ('' != pref_rest) {
        pref = pref_rest + pref;
      }
    }
  }
  if ('' != iPrecision) {
    if (suf.length > iPrecision) {
      suf = '1' + suf.substr(0, iPrecision) + '.' + suf.substr(iPrecision);
      suf = Math.round(parseFloat(suf)).toString().substr(1);
    }
    else {
      while (suf.length < iPrecision) {
        suf += '0';
      }
    }
  }
  if ('' != sDecimals && '' != suf) {
    fValue = pref + sDecimals + suf;
  }
  else {
    fValue = pref;
  }
  if ('' != sMonetary) {
    fValue = 'left' == jqCalcMonetPos[sField] ? sMonetary + ' ' + fValue : fValue + ' ' + sMonetary;
  }
  return fValue;
} // scJQCalculatorFormat

function scJQCalculatorCurrency(fValue, sField, sMonetary) {
  if ("" != sMonetary) {
    if (sMonetary + ' ' == fValue.substr(0, sMonetary.length + 1)) {
        fValue = fValue.substr(sMonetary.length + 1);
        jqCalcMonetPos[sField] = 'left';
    }
    else if (sMonetary == fValue.substr(0, sMonetary.length)) {
        fValue = fValue.substr(sMonetary.length + 1);
        jqCalcMonetPos[sField] = 'left';
    }
    else if (' ' + sMonetary == fValue.substr(fValue.length - sMonetary.length - 1)) {
        fValue = fValue.substr(0, fValue.length - sMonetary.length - 1);
        jqCalcMonetPos[sField] = 'right';
    }
    else if (sMonetary == fValue.substr(fValue.length - sMonetary.length)) {
        fValue = fValue.substr(0, fValue.length - sMonetary.length);
        jqCalcMonetPos[sField] = 'right';
    }
  }
  if ("" == fValue) {
    fValue = "0";
  }
  return fValue;
} // scJQCalculatorCurrency

function scJQSpinAdd(iSeqRow) {
  $("#id_sc_field_membs_num" + iSeqRow).spinner({
    max: 9999,
    min: 1,
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

function scJQUploadAdd(iSeqRow) {
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'control_members_add_charge_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalculatorAdd(iLine);
  scJQSpinAdd(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
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

