
 <form name="form_ajax_redir_1" method="post" style="display: none">
  <input type="hidden" name="nmgp_parms">
  <input type="hidden" name="nmgp_outra_jan">
  <input type="hidden" name="script_case_session" value="<?php echo session_id() ?>">
 </form>
 <form name="form_ajax_redir_2" method="post" style="display: none">
  <input type="hidden" name="nmgp_parms">
  <input type="hidden" name="nmgp_url_saida">
  <input type="hidden" name="script_case_init">
  <input type="hidden" name="script_case_session" value="<?php echo session_id() ?>">
 </form>

 <SCRIPT>
<?php
sajax_show_javascript();
?>

  function scCenterElement(oElem)
  {
    var $oElem    = $(oElem),
        $oWindow  = $(this),
        iElemTop  = Math.round(($oWindow.height() - $oElem.height()) / 2),
        iElemLeft = Math.round(($oWindow.width()  - $oElem.width())  / 2);

    $oElem.offset({top: iElemTop, left: iElemLeft});
  } // scCenterElement

  function scAjaxHideAutocomp(sFrameId)
  {
    if (document.getElementById("id_ac_frame_" + sFrameId))
    {
      document.getElementById("id_ac_frame_" + sFrameId).style.display = "none";
    }
  } // scAjaxHideAutocomp

  function scAjaxShowAutocomp(sFrameId)
  {
    if (document.getElementById("id_ac_frame_" + sFrameId))
    {
      document.getElementById("id_ac_frame_" + sFrameId).style.display = "";
      document.getElementById("id_ac_" + sFrameId).focus();
    }
  } // scAjaxShowAutocomp

  function scAjaxHideDebug()
  {
    if (document.getElementById("id_debug_window"))
    {
      document.getElementById("id_debug_window").style.display = "none";
      document.getElementById("id_debug_text").innerHTML = "";
    }
  } // scAjaxHideDebug

  function scAjaxShowDebug(oTemp)
  {
    if (!document.getElementById("id_debug_window"))
    {
      return;
    }
    if (oTemp && oTemp != null)
    {
        oResp = oTemp;
    }
    if (oResp["htmOutput"] && "" != oResp["htmOutput"])
    {
      document.getElementById("id_debug_window").style.display = "";
      document.getElementById("id_debug_text").innerHTML = scAjaxFormatDebug(oResp["htmOutput"]) + document.getElementById("id_debug_text").innerHTML;
      //scCenterElement(document.getElementById("id_debug_window"));
    }
  } // scAjaxShowDebug

  function scAjaxFormatDebug(sDebugMsg)
  {
    return "<table class=\"scFormMessageTable\" style=\"margin: 1px; width: 100%\"><tr><td class=\"scFormMessageMessage\">" + scAjaxSpecCharParser(sDebugMsg) + "</td></tr></table>";
  } // scAjaxFormatDebug

  function scAjaxHideErrorDisplay_default(sErrorId, bForce)
  {
    if (document.getElementById("id_error_display_" + sErrorId + "_frame"))
    {
        document.getElementById("id_error_display_" + sErrorId + "_frame").style.display = "none";
        document.getElementById("id_error_display_" + sErrorId + "_text").innerHTML = "";
        if (null == bForce)
        {
            bForce = true;
        }
        if (bForce)
        {
            var $oField = $('#id_sc_field_' + sErrorId);
            if (0 < $oField.length)
            {
                scAjax_removeFieldErrorStyle($oField);
            }
        }
    }
    if (document.getElementById("id_error_display_fixed"))
    {
        document.getElementById("id_error_display_fixed").style.display = "none";
    }
  } // scAjaxHideErrorDisplay_default

  function scAjaxShowErrorDisplay_default(sErrorId, sErrorMsg)
  {
    if (oResp && oResp['redirExitInfo'])
    {
      sErrorMsg += "<br /><input type=\"button\" onClick=\"window.location='" + oResp['redirExitInfo']['action'] + "'\" value=\"Ok\">";
    }
    sErrorMsg = scAjaxErrorSql(sErrorMsg);
    if (document.getElementById("id_error_display_" + sErrorId + "_frame"))
    {
      document.getElementById("id_error_display_" + sErrorId + "_frame").style.display = "";
      document.getElementById("id_error_display_" + sErrorId + "_text").innerHTML = sErrorMsg;
      if ("table" == sErrorId)
      {
        scCenterElement(document.getElementById("id_error_display_" + sErrorId + "_frame"));
      }
      var $oField = $('#id_sc_field_' + sErrorId);
      if (0 < $oField.length)
      {
        scAjax_applyFieldErrorStyle($oField);
      }
    }
    if (ajax_error_list && ajax_error_list[sErrorId] && ajax_error_list[sErrorId]["timeout"] && 0 < ajax_error_list[sErrorId]["timeout"])
    {
      setTimeout("scAjaxHideErrorDisplay('" + sErrorId + "', false)", ajax_error_list[sErrorId]["timeout"] * 1000);
    }
  } // scAjaxShowErrorDisplay_default

  var iErrorSqlId = 1;

  function scAjaxErrorSql(sErrorMsg)
  {
    var iTmpPos = sErrorMsg.indexOf("{SC_DB_ERROR_INI}"),
        sTmpId;
    while (-1 < iTmpPos)
    {
      sTmpId    = "sc_id_error_sql_" + iErrorSqlId;
      sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "<br /><span style=\"text-decoration: underline\" onClick=\"$('#" + sTmpId + "').show(); scCenterElement(document.getElementById('" + sTmpId + "'))\">" + sErrorMsg.substr(iTmpPos + 17);
      iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_MID}");
      sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "</span><table class=\"scFormErrorTable\" id=\"" + sTmpId + "\" style=\"display: none; position: absolute\"><tr><td>" + sErrorMsg.substr(iTmpPos + 17);
      iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_CLS}");
      sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "<br /><br /><span onClick=\"$('#" + sTmpId + "').hide()\">" + sErrorMsg.substr(iTmpPos + 17);
      iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_END}");
      sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "</span></td></tr></table>" + sErrorMsg.substr(iTmpPos + 17);
      iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_INI}");
      iErrorSqlId++;
    }
    return sErrorMsg;
  } // scAjaxErrorSql

  function scAjaxHideMessage_default()
  {
    if (document.getElementById("id_message_display_frame"))
    {
      document.getElementById("id_message_display_frame").style.display = "none";
      document.getElementById("id_message_display_text").innerHTML = "";
    }
  } // scAjaxHideMessage

  function scAjaxShowMessage_default()
  {
    if (!oResp["msgDisplay"] || !oResp["msgDisplay"]["msgText"])
    {
      return;
    }
    _scAjaxShowMessage_default({title: scMsgDefTitle, message: oResp["msgDisplay"]["msgText"], isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: false, toastPos: ""});
  } // scAjaxShowMessage

  var scMsgDefClose = "";

  function _scAjaxShowMessage_default(params) {
        var sTitle = params["title"],
                sMessage = params["message"],
                bModal = params["isModal"],
                iTimeout = params["timeout"],
                bButton = params["showButton"],
                sButton = params["buttonLabel"],
                iTop = params["topPos"],
                iLeft = params["leftPos"],
                iWidth = params["width"],
                iHeight = params["height"],
                sRedir = params["redirUrl"],
                sTarget = params["redirTarget"],
                sParam = params["redirParam"],
                bClose = params["showClose"],
                bBodyIcon = params["showBodyIcon"],
                bToast = params["isToast"],
                sToastPos = params["toastPos"];
    if ("" == sMessage) {
      if (bModal) {
        scMsgDefClick = "close_modal";
      }
      else {
        scMsgDefClick = "close";
      }
      _scAjaxMessageBtnClick();
      document.getElementById("id_message_display_title").innerHTML = scMsgDefTitle;
      document.getElementById("id_message_display_text").innerHTML = "";
      document.getElementById("id_message_display_buttone").value = scMsgDefButton;
      document.getElementById("id_message_display_buttond").style.display = "none";
    }
    else {
      document.getElementById("id_message_display_title").innerHTML = scAjaxSpecCharParser(sTitle);
      document.getElementById("id_message_display_text").innerHTML = scAjaxSpecCharParser(sMessage);
      document.getElementById("id_message_display_buttone").value = sButton;
      document.getElementById("id_message_display_buttond").style.display = bButton ? "" : "none";
      document.getElementById("id_message_display_buttond").style.display = bButton ? "" : "none";
      document.getElementById("id_message_display_title_line").style.display = (bClose || "" != sTitle) ? "" : "none";
      document.getElementById("id_message_display_close_icon").style.display = bClose ? "" : "none";
      if (document.getElementById("id_message_display_body_icon")) {
        document.getElementById("id_message_display_body_icon").style.display = bBodyIcon ? "" : "none";
      }
      $("#id_message_display_content").css('width', (0 < iWidth ? iWidth + 'px' : ''));
      $("#id_message_display_content").css('height', (0 < iHeight ? iHeight + 'px' : ''));
      if (bModal) {
        iWidth = iWidth || 250;
        iHeight = iHeight || 200;
        scMsgDefClose = "close_modal";
        tb_show('', '#TB_inline?height=' + (iHeight + 6) + '&width=' + (iWidth + 4) + '&inlineId=id_message_display_frame&modal=true', '');
        if (bButton) {
          if ("" != sRedir && "" != sTarget) {
            scMsgDefClick = "redir2_modal";
            document.form_ajax_redir_2.action = sRedir;
            document.form_ajax_redir_2.target = sTarget;
            document.form_ajax_redir_2.nmgp_parms.value = sParam;
            document.form_ajax_redir_2.script_case_init.value = scMsgDefScInit;
          }
          else if ("" != sRedir && "" == sTarget) {
            scMsgDefClick = "redir1";
            document.form_ajax_redir_1.action = sRedir;
            document.form_ajax_redir_1.nmgp_parms.value = sParam;
          }
          else {
            scMsgDefClick = "close_modal";
          }
        }
        else if (null != iTimeout && 0 < iTimeout) {
          scMsgDefClick = "close_modal";
          setTimeout("_scAjaxMessageBtnClick()", iTimeout * 1000);
        }
      }
      else
      {
        scMsgDefClose = "close";
        $("#id_message_display_frame").css('top', (0 < iTop ? iTop + 'px' : ''));
        $("#id_message_display_frame").css('left', (0 < iLeft ? iLeft + 'px' : ''));
        document.getElementById("id_message_display_frame").style.display = "";
        if (0 == iTop && 0 == iLeft) {
          scCenterElement(document.getElementById("id_message_display_frame"));
        }
        if (bButton) {
          if ("" != sRedir && "" != sTarget) {
            scMsgDefClick = "redir2";
            document.form_ajax_redir_2.action = sRedir;
            document.form_ajax_redir_2.target = sTarget;
            document.form_ajax_redir_2.nmgp_parms.value = sParam;
            document.form_ajax_redir_2.script_case_init.value = scMsgDefScInit;
          }
          else if ("" != sRedir && "" == sTarget) {
            scMsgDefClick = "redir1";
            document.form_ajax_redir_1.action = sRedir;
            document.form_ajax_redir_1.nmgp_parms.value = sParam;
          }
          else {
            scMsgDefClick = "close";
          }
        }
        else if (null != iTimeout && 0 < iTimeout) {
          scMsgDefClick = "close";
          setTimeout("_scAjaxMessageBtnClick()", iTimeout * 1000);
        }
      }
    }
  } // _scAjaxShowMessage_default

  function _scAjaxMessageBtnClose() {
    switch (scMsgDefClose) {
      case "close":
        document.getElementById("id_message_display_frame").style.display = "none";
        break;
      case "close_modal":
        tb_remove();
        break;
    }
  } // _scAjaxMessageBtnClick

  function _scAjaxMessageBtnClick() {
    switch (scMsgDefClick) {
      case "close":
        document.getElementById("id_message_display_frame").style.display = "none";
        break;
      case "close_modal":
        tb_remove();
        break;
      case "dismiss":
        scAjaxHideMessage();
        break;
      case "redir1":
        document.form_ajax_redir_1.submit();
        break;
      case "redir2":
        document.form_ajax_redir_2.submit();
        document.getElementById("id_message_display_frame").style.display = "none";
        break;
      case "redir2_modal":
        document.form_ajax_redir_2.submit();
        tb_remove();
        break;
    }
  } // _scAjaxMessageBtnClick

  function scAjaxHasError()
  {
    if (!oResp["result"])
    {
      return false;
    }
    return "ERROR" == oResp["result"];
  } // scAjaxHasError

  function scAjaxIsOk()
  {
    if (!oResp["result"])
    {
      return false;
    }
    return "OK" == oResp["result"] || "SET" == oResp["result"];
  } // scAjaxIsOk

  function scAjaxIsSet()
  {
    if (!oResp["result"])
    {
      return false;
    }
    return "SET" == oResp["result"];
  } // scAjaxIsSet

  function scAjaxCalendarReload()
  {
    if (oResp["calendarReload"] && "OK" == oResp["calendarReload"] && typeof self.parent.calendar_reload == "function")
    {
<?php
if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && isset($_SESSION['scriptcase']['display_mobile']) && $_SESSION['scriptcase']['display_mobile']) {
?>
      self.parent.calendar_reload();
      self.parent.tb_remove();
<?php
} else {
?>
      self.parent.calendar_reload();
      self.parent.tb_remove();
<?php
}
?>
      return true;
    }
    return false;
  } // scCalendarReload

  function scAjaxUpdateErrors(sType)
  {
    ajax_error_geral = "";
    oFieldErrors     = {};
    if (oResp["errList"])
    {
      for (iFieldErrors = 0; iFieldErrors < oResp["errList"].length; iFieldErrors++)
      {
        sTestField = oResp["errList"][iFieldErrors]["fldName"];
        if ("geral_form_clients_steps_renew_mob" == sTestField)
        {
          if (ajax_error_geral != '') { ajax_error_geral += '<br>';}
          ajax_error_geral += scAjaxSpecCharParser(oResp["errList"][iFieldErrors]["msgText"]);
        }
        else
        {
          if (scFocusFirstErrorField && '' == scFocusFirstErrorName)
          {
            scFocusFirstErrorName = sTestField;
          }
          if (oResp["errList"][iFieldErrors]["numLinha"])
          {
            sTestField += oResp["errList"][iFieldErrors]["numLinha"];
          }
          if (!oFieldErrors[sTestField])
          {
            oFieldErrors[sTestField] = new Array();
          }
          oFieldErrors[sTestField][oFieldErrors[sTestField].length] = scAjaxSpecCharParser(oResp["errList"][iFieldErrors]["msgText"]);
        }
      }
    }
    for (iUpdateErrors = 0; iUpdateErrors < ajax_field_list.length; iUpdateErrors++)
    {
      sTestField = ajax_field_list[iUpdateErrors];
      if (oFieldErrors[sTestField])
      {
        ajax_error_list[sTestField][sType] = oFieldErrors[sTestField];
      }
    }
  } // scAjaxUpdateErrors

  function scAjaxUpdateFieldErrors(sField, sType)
  {
    aFieldErrors = new Array();
    if (oResp["errList"])
    {
      iErrorPos  = 0;
      for (iFieldErrors = 0; iFieldErrors < oResp["errList"].length; iFieldErrors++)
      {
        sTestField = oResp["errList"][iFieldErrors]["fldName"];
        if (oResp["errList"][iFieldErrors]["numLinha"])
        {
          sTestField += oResp["errList"][iFieldErrors]["numLinha"];
        }
        if (sField == sTestField)
        {
          aFieldErrors[iErrorPos] = scAjaxSpecCharParser(oResp["errList"][iFieldErrors]["msgText"]);
          iErrorPos++;
        }
      }
    }
        if (ajax_error_list[sField])
        {
        ajax_error_list[sField][sType] = aFieldErrors;
        }
  } // scAjaxUpdateFieldErrors

  function scAjaxListErrors(bLabel)
  {
    bFirst        = false;
    sAppErrorText = "";
    if ("" != ajax_error_geral)
    {
      bFirst         = true;
      sAppErrorText += ajax_error_geral;
    }
    for (iFieldList = 0; iFieldList < ajax_field_list.length; iFieldList++)
    {
      sFieldError = scAjaxListFieldErrors(ajax_field_list[iFieldList], bLabel);
      if ("" != sFieldError)
      {
        if (bFirst)
        {
          bFirst         = false
          sAppErrorText += "<hr size=\"1\" width=\"80%\" />";
        }
        sAppErrorText += sFieldError;
      }
    }
    return sAppErrorText;
  } // scAjaxListErrors

  function scAjaxListFieldErrors(sField, bLabel)
  {
    sErrorText = "";
    for (iErrorType = 0; iErrorType < ajax_error_type.length; iErrorType++)
    {
      if (ajax_error_list[sField])
      {
        for (iListErrors = 0; iListErrors < ajax_error_list[sField][ajax_error_type[iErrorType]].length; iListErrors++)
        {
          if (bLabel)
          {
            sErrorText += ajax_error_list[sField]["label"] + ": ";
          }
          sErrorText += ajax_error_list[sField][ajax_error_type[iErrorType]][iListErrors] + "<br />";
        }
      }
    }
    return sErrorText;
  } // scAjaxListFieldErrors

        function scAjaxClearErrors() {
                var fieldName;

                for (fieldName in ajax_error_list) {
            if (null != ajax_error_list[fieldName]) {
                ajax_error_list[fieldName]["valid"] = new Array();
                ajax_error_list[fieldName]["onblur"] = new Array();
                ajax_error_list[fieldName]["onchange"] = new Array();
                ajax_error_list[fieldName]["onclick"] = new Array();
                ajax_error_list[fieldName]["onfocus"] = new Array();
            }
                }
        } // scAjaxClearErrors

  function scAjaxSetVariables()
  {
    if (!oResp["varList"])
    {
      return true;
    }
    for (var iVarFields = 0; iVarFields < oResp["varList"].length; iVarFields++)
    {
          if(typeof oResp["varList"][iVarFields] === 'object' && oResp["varList"][iVarFields] !== null)
          {
              var sVarName  = oResp["varList"][iVarFields].index;
              var sVarValue = oResp["varList"][iVarFields].value;
          }
          else
          {
              var sVarName  = oResp["varList"][iVarFields]["index"];
              var sVarValue = oResp["varList"][iVarFields]["value"];
          }

          if (sVarValue == 'new Array()') {
            eval(sVarName + " = new Array();");
          } else {
            eval(sVarName + " = \"" + sVarValue + "\";");
          }
    }
  } // scAjaxSetVariables
/*
  function scAjaxSetVariables()
  {
    if (!oResp["varList"])
    {
      return true;
    }
    for (var iVarFields = 0; iVarFields < oResp["varList"].length; iVarFields++)
    {
      var sVarName  = oResp["varList"][iVarFields]["index"];
      var sVarValue = oResp["varList"][iVarFields]["value"];
              if (sVarValue.indexOf('new Array') > -1) {
                        eval(sVarName + " = sVarValue;");
                  } else {
                        eval(sVarName + " = \"" + sVarValue + "\";");
                  }
        }
  } // scAjaxSetVariables
*/
  function scAjaxSetSummaryLine()
  {
    if (!oResp["navSummary"] || !oResp["navSummary"]["summary_line"])
    {
      return true;
    }
    $("#sc-summary-line").html(oResp["navSummary"]["summary_line"]);
  } // scAjaxSetSummaryLine

  function scAjaxSetFields()
  {
    if (!oResp["fldList"])
    {
      return true;
    }
    for (iSetFields = 0; iSetFields < oResp["fldList"].length; iSetFields++)
    {
      var sFieldName = oResp["fldList"][iSetFields]["fldName"];
      var sFieldType = oResp["fldList"][iSetFields]["fldType"];

      if ("selectdd" == sFieldType)
      {
        var bSelectDD = true;
        sFieldType = "select";
      }
      else
      {
        var bSelectDD = false;
      }
      if ("select2_ac" == sFieldType)
      {
        var bSelect2AC = true;
        sFieldType = "select";
      }
      else
      {
        var bSelect2AC = false;
      }
      if (oResp["fldList"][iSetFields]["valList"])
      {
        var oFieldValues = oResp["fldList"][iSetFields]["valList"];
        if (0 == oFieldValues.length)
        {
          oFieldValues = null;
        }
      }
      else
      {
        var oFieldValues = null;
      }
      if (oResp["fldList"][iSetFields]["optList"])
      {
        var oFieldOptions = oResp["fldList"][iSetFields]["optList"];
      }
      else
      {
        var oFieldOptions = null;
      }
/*
      if ("_autocomp" == sFieldName.substr(sFieldName.length - 9) &&
          iSetFields > 0 &&
          sFieldName.substr(0, sFieldName.length - 9) == oResp["fldList"][iSetFields - 1]["fldName"] &&
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)) &&
          oFieldValues[0]['value'])
      {
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)).innerHTML = oFieldValues[0]['value'];
      }
*/

      if ("corhtml" == sFieldType)
      {
        sFieldType = 'text';

        /*sCor = (oFieldValues[0]['value']) ? oFieldValues[0]['value'] : "";
        setaCorPaleta(sFieldName, sCor);*/
      }

      if ("_autocomp" == sFieldName.substr(sFieldName.length - 9) &&
          iSetFields > 0 &&
          sFieldName.substr(0, sFieldName.length - 9) == oResp["fldList"][iSetFields - 1]["fldName"] &&
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)))
      {
          sLabel_auto_Comp = (oFieldValues[0]['value']) ? oFieldValues[0]['value'] : "";
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)).innerHTML = sLabel_auto_Comp;
      }


      if (oResp["fldList"][iSetFields]["colNum"])
      {
        var iColNum = oResp["fldList"][iSetFields]["colNum"];
      }
      else
      {
        var iColNum = 1;
      }
      if (oResp["fldList"][iSetFields]["row"])
      {
        var iRow = oResp["fldList"][iSetFields]["row"];
                var thisRow = oResp["fldList"][iSetFields]["row"];
      }
      else
      {
        var iRow = 1;
                var thisRow = "";
      }
      if (oResp["fldList"][iSetFields]["htmComp"])
      {
        var sHtmComp = oResp["fldList"][iSetFields]["htmComp"];
        sHtmComp     = sHtmComp.replace(/__AD__/gi, '"');
        sHtmComp     = sHtmComp.replace(/__AS__/gi, "'");
      }
      else
      {
        var sHtmComp = null;
      }
      if (oResp["fldList"][iSetFields]["imgFile"])
      {
        var sImgFile = oResp["fldList"][iSetFields]["imgFile"];
      }
      else
      {
        var sImgFile = "";
      }
      if (oResp["fldList"][iSetFields]["imgOrig"])
      {
        var sImgOrig = oResp["fldList"][iSetFields]["imgOrig"];
      }
      else
      {
        var sImgOrig = "";
      }
      if (oResp["fldList"][iSetFields]["keepImg"])
      {
        var sKeepImg = oResp["fldList"][iSetFields]["keepImg"];
      }
      else
      {
        var sKeepImg = "N";
      }
      if (oResp["fldList"][iSetFields]["hideName"])
      {
        var sHideName = oResp["fldList"][iSetFields]["hideName"];
      }
      else
      {
        var sHideName = "N";
      }
      if (oResp["fldList"][iSetFields]["imgLink"])
      {
        var sImgLink = oResp["fldList"][iSetFields]["imgLink"];
      }
      else
      {
        var sImgLink = null;
      }
      if (oResp["fldList"][iSetFields]["docLink"])
      {
        var sDocLink = oResp["fldList"][iSetFields]["docLink"];
      }
      else
      {
        var sDocLink = "";
      }
      if (oResp["fldList"][iSetFields]["docIcon"])
      {
        var sDocIcon = oResp["fldList"][iSetFields]["docIcon"];
      }
      else
      {
        var sDocIcon = "";
      }

      if (oResp["fldList"][iSetFields]["docReadonly"])
      {
        var sDocReadonly = oResp["fldList"][iSetFields]["docReadonly"];
      }
      else
      {
        var sDocReadonly = "";
      }

      if (oResp["fldList"][iSetFields]["optComp"])
      {
        var sOptComp = oResp["fldList"][iSetFields]["optComp"];
      }
      else
      {
        var sOptComp = "";
      }
      if (oResp["fldList"][iSetFields]["optClass"])
      {
        var sOptClass = oResp["fldList"][iSetFields]["optClass"];
      }
      else
      {
        var sOptClass = "";
      }
      if (oResp["fldList"][iSetFields]["optMulti"])
      {
        var sOptMulti = oResp["fldList"][iSetFields]["optMulti"];
      }
      else
      {
        var sOptMulti = "";
      }
      if (oResp["fldList"][iSetFields]["imgHtml"])
      {
        var sImgHtml = oResp["fldList"][iSetFields]["imgHtml"];
      }
      else
      {
        var sImgHtml = "";
      }
      if (oResp["fldList"][iSetFields]["mulHtml"])
      {
        var sMULHtml = oResp["fldList"][iSetFields]["mulHtml"];
      }
      else
      {
        var sMULHtml = "";
      }
      if (oResp["fldList"][iSetFields]["updInnerHtml"])
      {
        var sInnerHtml = scAjaxSpecCharParser(oResp["fldList"][iSetFields]["updInnerHtml"]);
      }
      else
      {
        var sInnerHtml = null;
      }
      if (oResp["fldList"][iSetFields]["lookupCons"])
      {
        var sLookupCons = scAjaxSpecCharParser(oResp["fldList"][iSetFields]["lookupCons"]);
      }
      else
      {
        var sLookupCons = "";
      }
      if (oResp["clearUpload"])
      {
        var sClearUpload = scAjaxSpecCharParser(oResp["clearUpload"]);
      }
      else
      {
        var sClearUpload = "N";
      }
      if (oResp["eventField"])
      {
        var sEventField = scAjaxSpecCharParser(oResp["eventField"]);
      }
      else
      {
        var sEventField = "__SC_NO_FIELD";
      }
      if (oResp["fldList"][iSetFields]["switch"])
      {
        var bSwitch = true == oResp["fldList"][iSetFields]["switch"];
      }
      else
      {
        var bSwitch = false;
      }
      if ("checkbox" == sFieldType)
      {
        scAjaxSetFieldCheckbox(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sInnerHtml, sOptComp, sOptClass, sOptMulti, bSwitch, sEventField);
      }
      else if ("duplosel" == sFieldType)
      {
        scAjaxSetFieldDuplosel(sFieldName, oFieldValues, oFieldOptions);
      }
      else if ("imagem" == sFieldType)
      {
        scAjaxSetFieldImage(sFieldName, oFieldValues, sImgFile, sImgOrig, sImgLink, sKeepImg, sHideName);
      }
      else if ("documento" == sFieldType)
      {
        scAjaxSetFieldDocument(sFieldName, oFieldValues, sDocLink, sDocIcon, sClearUpload, sDocReadonly);
      }
      else if ("label" == sFieldType)
      {
        scAjaxSetFieldLabel(sFieldName, oFieldValues, oFieldOptions, sLookupCons);
      }
      else if ("radio" == sFieldType)
      {
        scAjaxSetFieldRadio(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, bSwitch, sEventField);
      }
      else if ("select" == sFieldType)
      {
        scAjaxSetFieldSelect(sFieldName, oFieldValues, oFieldOptions, bSelectDD, bSelect2AC, iRow, sEventField, thisRow);
      }
      else if ("text" == sFieldType)
      {
        scAjaxSetFieldText(sFieldName, oFieldValues, sLookupCons, thisRow, sEventField);
      }
      else if ("color_palette" == sFieldType)
      {
        scAjaxSetFieldColorPalette(sFieldName, oFieldValues);
      }
      else if ("editor_html" == sFieldType)
      {
        scAjaxSetFieldEditorHtml(sFieldName, oFieldValues);
      }
      else if ("imagehtml" == sFieldType)
      {
        scAjaxSetFieldImageHtml(sFieldName, oFieldValues, sImgHtml);
      }
      else if ("innerhtml" == sFieldType)
      {
        scAjaxSetFieldInnerHtml(sFieldName, oFieldValues);
      }
      else if ("multi_upload" == sFieldType)
      {
        scAjaxSetFieldMultiUpload(sFieldName, sMULHtml);
      }
      else if ("recur_info" == sFieldType)
      {
        scAjaxSetFieldRecurInfo(sFieldName, sMULHtml);
      }
      else if ("signature" == sFieldType)
      {
        scAjaxSetFieldSignature(sFieldName, oFieldValues);
      }
      else if ("rating" == sFieldType)
      {
        scAjaxSetFieldRating(sFieldName, oFieldValues, thisRow);
      }
      else if ("ratingstar" == sFieldType)
      {
        scAjaxSetFieldRatingStar(sFieldName, oFieldValues, thisRow);
      }
      else if ("ratingsmile" == sFieldType)
      {
        scAjaxSetFieldRatingSmile(sFieldName, oFieldValues, thisRow);
      }
      else if ("ratingthumb" == sFieldType)
      {
        scAjaxSetFieldRatingThumb(sFieldName, oFieldValues, thisRow);
      }
      scAjaxUpdateHeaderFooter(sFieldName, oFieldValues);
    }
  } // scAjaxSetFields

  function scAjaxUpdateHeaderFooter(sFieldName, oFieldValues)
  {
    if (self.updateHeaderFooter)
    {
      if (null == oFieldValues)
      {
        sNewValue = '';
      }
      else if (oFieldValues[0]["label"])
      {
        sNewValue = oFieldValues[0]["label"];
      }
      else
      {
        sNewValue = oFieldValues[0]["value"];
      }
      updateHeaderFooter(sFieldName, scAjaxSpecCharParser(sNewValue));
    }
  } // scAjaxUpdateHeaderFooter

  function scAjaxSetFieldText(sFieldName, oFieldValues, sLookupCons, thisRow, sEventField)
  {
    if (document.F1.elements[sFieldName])
    {
      var jqField = $("#id_sc_field_" + sFieldName),
          Temp_text = scAjaxReturnBreakLine(scAjaxSpecCharParser(scAjaxProtectBreakLine(oFieldValues[0]['value'])));
      if (jqField.length)
      {
        jqField.val(Temp_text);
        if (sEventField != sFieldName && sEventField != "__SC_NO_FIELD" && sEventField != "")
        {
          //jqField.trigger("change");
        }
      }
      else
      {
        eval("document.F1." + sFieldName + ".value = Temp_text");
      }
      if (scEventControl_data[sFieldName]) {
        scEventControl_data[sFieldName]["calculated"] = Temp_text;
      }
    }
    if (document.getElementById("id_lookup_" + sFieldName))
    {
      document.getElementById("id_lookup_" + sFieldName).innerHTML = sLookupCons;
    }
    if (oFieldValues[0]['label'])
    {
      scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues);
    }
    else
    {
      oFieldValues[0]['value'] = scAjaxBreakLine(oFieldValues[0]['value']);
      scAjaxSetReadonlyValue(sFieldName, oFieldValues[0]['value']);
    }
        scAjaxSetSliderValue(sFieldName, thisRow);
  } // scAjaxSetFieldText

  function scAjaxSetSliderValue(fieldName, thisRow)
  {
          var sliderObject = $("#sc-ui-slide-" + fieldName);
          if (!sliderObject.length) {
                  return;
          }
          scJQSlideValue(fieldName, thisRow);
  } // scAjaxSetSliderValue

  function scAjaxSetFieldColorPalette(sFieldName, oFieldValues)
  {
    if (document.F1.elements[sFieldName])
    {
        var Temp_text = scAjaxReturnBreakLine(scAjaxSpecCharParser(scAjaxProtectBreakLine(oFieldValues[0]['value'])));
        eval ("document.F1." + sFieldName + ".value = Temp_text");
    }
    if (oFieldValues[0]['label'])
    {
      scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues);
    }
    else
    {
      oFieldValues[0]['value'] = scAjaxBreakLine(oFieldValues[0]['value']);
          setaCorPaleta(sFieldName, oFieldValues[0]['value']);
      scAjaxSetReadonlyValue(sFieldName, oFieldValues[0]['value']);
    }
  } // scAjaxSetFieldColorPalette

  function scAjaxSetFieldSelect(sFieldName, oFieldValues, oFieldOptions, bSelectDD, bSelect2AC, iRow, sEventField, thisRow)
  {
    sFieldNameHtml = sFieldName;
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return;
    }
    if (bSelectDD)
    {
        $("#id_sc_field_" + sFieldName).dropdownchecklist("destroy");
    }
    if (!document.F1.elements[sFieldName] && document.F1.elements[sFieldName + "[]"])
    {
      sFieldNameHtml += "[]";
    }
    if ("hidden" == document.F1.elements[sFieldNameHtml].type)
    {
      scAjaxSetFieldText(sFieldNameHtml, oFieldValues, "", "", sEventField);
      return;
    }

    if (null != oFieldOptions)
    {
      $("#id_sc_field_" + sFieldName).children().remove()
      if ("<select" != oFieldOptions.substr(0, 7))
      {
        var $oField = $("#id_sc_field_" + sFieldName);
        if (0 < $oField.length)
        {
          $oField.html(oFieldOptions);
        }
        else
        {
          document.getElementById("idAjaxSelect_" + sFieldName).innerHTML = oFieldOptions;
        }
      }
      else
      {
        document.getElementById("idAjaxSelect_" + sFieldName).innerHTML = oFieldOptions;
      }
    }
    var aValues = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        aValues[iFieldSelect] = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
      }
    }
    var oFormField = $("#id_sc_field_" + sFieldName);
    for (iFieldSelect = 0; iFieldSelect < oFormField[0].length; iFieldSelect++)
    {
      if (scAjaxInArray(oFormField[0].options[iFieldSelect].value, aValues))
      {
        oFormField[0].options[iFieldSelect].selected = true;
      }
      else
      {
        oFormField[0].options[iFieldSelect].selected = false;
      }
    }
        scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
    if (bSelectDD)
    {
        scJQDDCheckBoxAdd(thisRow, true);
    }
        if (bSelect2AC)
        {
                var newOption = new Option(oFieldValues[0]["label"], oFieldValues[0]["value"], true, true);
                $("#id_ac_" + sFieldName).append(newOption);
                $("#id_sc_field_" + sFieldName).val(oFieldValues[0]["value"]);
        }
        else if (oFormField.hasClass("select2-hidden-accessible"))
        {
        $("#id_sc_field_" + sFieldName).select2("destroy");
                var select2Field = sFieldName;
                if ("" != thisRow) {
                        select2Field = select2Field.substr(0, select2Field.length - thisRow.toString().length);
                }
        scJQSelect2Add(thisRow, select2Field);
        }
  } // scAjaxSetFieldSelect

  function scAjaxSetFieldDuplosel(sFieldName, oFieldValues, oFieldOptions)
  {
    var sFieldNameOrig = sFieldName + "_orig";
    var sFieldNameDest = sFieldName + "_dest";
    var oFormFieldOrig = document.F1.elements[sFieldNameOrig];
    var oFormFieldDest = document.F1.elements[sFieldNameDest];

    if (null != oFieldOptions)
    {
      scAjaxClearSelect(sFieldNameOrig);
      for (iFieldSelect = 0; iFieldSelect < oFieldOptions.length; iFieldSelect++)
      {
        oFormFieldOrig.options[iFieldSelect] = new Option(scAjaxSpecCharParser(oFieldOptions[iFieldSelect]["label"]), scAjaxSpecCharParser(oFieldOptions[iFieldSelect]["value"]));
      }
    }
    while (oFormFieldDest.length > 0)
    {
      oFormFieldDest.options[0] = null;
    }
    var aValues = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        sNewOptionLabel = oFieldValues[iFieldSelect]["label"] ? scAjaxSpecCharParser(oFieldValues[iFieldSelect]["label"]) : scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
        sNewOptionValue = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
        if (sNewOptionValue.substr(0, 8) == "@NMorder")
        {
           sNewOptionValue                      = sNewOptionValue.substr(8);
           oFormFieldDest.options[iFieldSelect] = new Option(scAjaxSpecCharParser(sNewOptionLabel), sNewOptionValue);
           sNewOptionValue                      = sNewOptionValue.substr(1);
           aValues[iFieldSelect]                = sNewOptionValue;
        }
        else
        {
           aValues[iFieldSelect]                = sNewOptionValue;
           oFormFieldDest.options[iFieldSelect] = new Option(scAjaxSpecCharParser(sNewOptionLabel), sNewOptionValue);
        }
      }
    }
    for (iFieldSelect = 0; iFieldSelect < oFormFieldOrig.length; iFieldSelect++)
    {
      oFormFieldOrig.options[iFieldSelect].selected = false;
      if (scAjaxInArray(oFormFieldOrig.options[iFieldSelect].value, aValues))
      {
        oFormFieldOrig.options[iFieldSelect].disabled    = true;
        oFormFieldOrig.options[iFieldSelect].style.color = "#A0A0A0";
      }
      else
      {
        oFormFieldOrig.options[iFieldSelect].disabled = false;
      }
    }
    scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
  } // scAjaxSetFieldDuplosel

  function scAjaxSetFieldCheckbox(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sInnerHtml, sOptComp, sOptClass, sOptMulti, bSwitch, sEventField)
  {
        if (null == bSwitch)
        {
          bSwitch = false;
        }
    if (document.getElementById("idAjaxCheckbox_" + sFieldName) && null != sInnerHtml)
    {
      document.getElementById("idAjaxCheckbox_" + sFieldName).innerHTML = sInnerHtml;
      return;
    }
    if (null != oFieldOptions)
    {
        scAjaxClearCheckbox(sFieldName);
    }
    if (document.F1.elements[sFieldName] && "hidden" == document.F1.elements[sFieldName].type)
    {
      scAjaxSetFieldText(sFieldName, oFieldValues, "", "", sEventField);
      return;
    }
    if (null != oFieldOptions && "" != oFieldOptions)
    {
/*      scAjaxClearCheckbox(sFieldName); */
      scAjaxRecreateOptions("Checkbox", "checkbox", sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, sOptClass, sOptMulti, bSwitch);
    }
    else
    {
      scAjaxSetCheckboxOptions(sFieldName, oFieldValues);
    }
        scAjaxSetSwitchOptions(sFieldName, "checkbox");
    scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
  } // scAjaxSetFieldCheckbox

  function scAjaxSetFieldRadio(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, bSwitch, sEventField)
  {
        if (null == bSwitch)
        {
          bSwitch = false;
        }
    if (document.F1.elements[sFieldName] && "hidden" == document.F1.elements[sFieldName].type)
    {
      scAjaxSetFieldText(sFieldName, oFieldValues, "", "", sEventField);
      return;
    }
    if (null != oFieldOptions)
    {
        scAjaxClearRadio(sFieldName);
    }
    if (null != oFieldOptions && "" != oFieldOptions)
    {
/*      scAjaxClearRadio(sFieldName); */
      scAjaxRecreateOptions("Radio", "radio", sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, "", "", bSwitch);
    }
    else
    {
      scAjaxSetRadioOptions(sFieldName, oFieldValues);
    }
        scAjaxSetSwitchOptions(sFieldName, "radio");
    scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
  } // scAjaxSetFieldRadio

  function scAjaxSetSwitchOptions(fieldName, fieldType)
  {
        var fieldOptions = $(".sc-ui-" + fieldType + "-" + fieldName + ".lc-switch");
        if (!fieldOptions.length) {
                return;
        }
        for (var i = 0; i < fieldOptions.length; i++) {
                if ($(fieldOptions[i]).prop("checked")) {
                        $(fieldOptions[i]).lcs_on();
                }
                else {
                        $(fieldOptions[i]).lcs_off();
                }
        }
  }

  function scAjaxSetFieldLabel(sFieldName, oFieldValues, oFieldOptions, sLookupCons)
  {
    sFieldValue = oFieldValues[0]["value"];
    if ("undefined" == typeof oFieldValues[0]["label"]) {
      sFieldLabel = oFieldValues[0]["value"];
    } else {
      sFieldLabel = oFieldValues[0]["label"];
    }
    sFieldLabel = scAjaxBreakLine(sFieldLabel);
    if (null != oFieldOptions)
    {
      for (iRecreate = 0; iRecreate < oFieldOptions.length; iRecreate++)
      {
        sOptText  = scAjaxSpecCharParser(oFieldOptions[iRecreate]["value"]);
        sOptValue = scAjaxSpecCharParser(oFieldOptions[iRecreate]["label"]);
        if (sFieldValue == sOptText)
        {
          sFieldLabel = sOptValue;
        }
      }
    }
    if (document.getElementById("id_ajax_label_" + sFieldName))
    {
      document.getElementById("id_ajax_label_" + sFieldName).innerHTML = scAjaxSpecCharParser(sFieldLabel);
    }
    if (document.F1.elements[sFieldName])
    {
//      document.F1.elements[sFieldName].value = scAjaxSpecCharParser(sFieldValue);
        Temp_text = scAjaxProtectBreakLine(sFieldValue);
        Temp_text = scAjaxSpecCharParser(Temp_text);
        document.F1.elements[sFieldName].value = scAjaxReturnBreakLine(Temp_text);

    }
    if (document.getElementById("id_lookup_" + sFieldName))
    {
      document.getElementById("id_lookup_" + sFieldName).innerHTML = sLookupCons;
    }
    scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(sFieldLabel));
  } // scAjaxSetFieldLabel

  function scAjaxSetFieldImage(sFieldName, oFieldValues, sImgFile, sImgOrig, sImgLink, sKeepImg, sHideName)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return;
    }
    if ("N" == sKeepImg && document.getElementById("id_ajax_img_"  + sFieldName))
    {
      document.getElementById("id_ajax_img_"  + sFieldName).src           = scAjaxSpecCharParser(sImgFile);
      document.getElementById("id_ajax_img_"  + sFieldName).style.display = ("" == sImgFile) ? "none" : "";
    }
    if (document.getElementById("id_ajax_link_" + sFieldName) && null != sImgLink)
    {
      document.getElementById("id_ajax_link_" + sFieldName).innerHTML = oFieldValues[0]["value"];
      document.getElementById("id_ajax_link_" + sFieldName).href      = scAjaxSpecCharParser(sImgLink);
    }
    if (document.getElementById("chk_ajax_img_" + sFieldName))
    {
      document.getElementById("chk_ajax_img_" + sFieldName).style.display = ("" == oFieldValues[0]["value"]) ? "none" : "";
    }
    if ("" == oFieldValues[0]["value"] && document.F1.elements[sFieldName + "_limpa"])
    {
      document.F1.elements[sFieldName + "_limpa"].checked = false;
    }
    if ("N" == sKeepImg && document.getElementById("txt_ajax_img_" + sFieldName))
    {
      document.getElementById("txt_ajax_img_" + sFieldName).innerHTML     = oFieldValues[0]["value"];
      document.getElementById("txt_ajax_img_" + sFieldName).style.display = ("" == oFieldValues[0]["value"] || "S" == sHideName) ? "none" : "";
    }
    if ("" != sImgOrig)
    {
      eval("if (var_ajax_img_" + sFieldName + ") var_ajax_img_" + sFieldName + " = '" + sImgOrig + "';");
      if (document.F1.elements["temp_out1_" + sFieldName])
      {
        document.F1.elements["temp_out_" + sFieldName].value = sImgFile;
        document.F1.elements["temp_out1_" + sFieldName].value = sImgOrig;
      }
      else if (document.F1.elements["temp_out_" + sFieldName])
      {
        document.F1.elements["temp_out_" + sFieldName].value = sImgOrig;
      }
    }
    if ("" != oFieldValues[0]["value"])
    {
      if (document.F1.elements[sFieldName + "_salva"]) document.F1.elements[sFieldName + "_salva"].value = oFieldValues[0]["value"];
    }
    else if (oResp && oResp["ajaxRequest"] && "navigate_form" == oResp["ajaxRequest"])
    {
      if (document.F1.elements[sFieldName + "_salva"]) document.F1.elements[sFieldName + "_salva"].value = "";
    }
    scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]["value"]));
  } // scAjaxSetFieldImage

  function scAjaxSetFieldDocument(sFieldName, oFieldValues, sDocLink, sDocIcon, sClearUpload, sDocReadonly)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return;
    }
    document.getElementById("id_ajax_doc_"  + sFieldName).innerHTML = scAjaxSpecCharParser(sDocLink);
    if (document.getElementById("id_ajax_doc_icon_"  + sFieldName))
    {
      document.getElementById("id_ajax_doc_icon_"  + sFieldName).src = scAjaxSpecCharParser(sDocIcon);
    }
    if ("" == oFieldValues[0]["value"])
    {
      document.getElementById("chk_ajax_img_" + sFieldName).style.display = "none";
      document.getElementById("id_ajax_doc_" + sFieldName).style.display = "none";
    }
    else
    {
      document.getElementById("chk_ajax_img_" + sFieldName).style.display = "";
      document.getElementById("id_ajax_doc_" + sFieldName).style.display = "";
    }
    if ("" == oFieldValues[0]["value"] && document.F1.elements[sFieldName + "_limpa"])
    {
      document.F1.elements[sFieldName + "_limpa"].checked = false;
    }
    if ("S" == sClearUpload && document.F1.elements[sFieldName + "_ul_name"])
    {
      document.F1.elements[sFieldName + "_ul_name"].value = "";
    }
    if ("" != sDocLink && sDocReadonly == "S")
    {
      scAjaxSetReadonlyValue(sFieldName, sDocLink);
    }
    else
    {
      scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]["value"]));
    }
  } // scAjaxSetFieldDocument

  function scAjaxSetFieldInnerHtml(sFieldName, oFieldValues)
  {
    if (document.getElementById(sFieldName))
    {
      document.getElementById(sFieldName).innerHTML = scAjaxSpecCharParser(oFieldValues[0]["value"]);
    }
  } // scAjaxSetFieldInnerHtml

  function scAjaxSetFieldMultiUpload(sFieldName, sMULHtml)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return;
    }
    $("#id_sc_loaded_" + sFieldName).html(scAjaxSpecCharParser(sMULHtml));
  } // scAjaxSetFieldMultiUpload

  function scAjaxExecFieldEditorHtml(strOption, bolUI, oField)
  {
                  if(tinymce.majorVersion > 3)
                {
                        if(strOption == 'mceAddControl')
                        {
                                tinymce.execCommand('mceAddEditor', bolUI, oField);
                        }else
                        if(strOption == 'mceRemoveControl')
                        {
                                tinymce.execCommand('mceRemoveEditor', bolUI, oField);
                        }
                }
                else
                {
                        tinyMCE.execCommand(strOption, bolUI, oField);
                }
  }

  function scAjaxSetFieldEditorHtml(sFieldName, oFieldValues)
  {
    if (!document.F1.elements[sFieldName])
    {
      return;
    }
        if(tinymce.majorVersion > 3)
        {
                var oFormField = tinyMCE.get(sFieldName);
        }
        else
        {
                var oFormField = tinyMCE.getInstanceById(sFieldName);
        }
    oFormField.setContent(scAjaxSpecCharParser(oFieldValues[0]["value"]));
    scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]["value"]));
  } // scAjaxSetFieldEditorHtml

  function scAjaxSetFieldImageHtml(sFieldName, oFieldValues, sImgHtml)
  {
    if (document.getElementById("id_imghtml_" + sFieldName))
    {
      document.getElementById("id_imghtml_" + sFieldName).innerHTML = scAjaxSpecCharParser(sImgHtml);
    }
  } // scAjaxSetFieldEditorHtml

  function scAjaxSetFieldRecurInfo(sFieldName, oFieldValues)
  {
          var jsonData = "" != oFieldValues[0]["value"]
                       ? JSON.parse(oFieldValues[0]["value"])
                                   : { repeat: "1", endon: "E", endafter: "", endin: ""};
          $("#id_rinf_repeat_" + sFieldName).val(jsonData.repeat);
          $(".cl_rinf_endon_" + sFieldName).filter(function(index) {return $(this).val() == jsonData.endon}).prop("checked", true),
          $("#id_rinf_endafter_" + sFieldName).val(jsonData.endafter);
          $("#id_rinf_endin_" + sFieldName).val(jsonData.endin);
          scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]["value"]));
  } // scAjaxSetFieldRecurInfo

  function scAjaxSetFieldSignature(sFieldName, oFieldValues)
  {
        var fieldValue = scAjaxSpecCharParser(oFieldValues[0]['value']);
        if ("data:image/png;base64," != fieldValue.substr(0, 22) && "data:image/jsignature;base30," != fieldValue.substr(0, 29))
        {
                scJQSignatureClear(sFieldName);
                return;
        }
        $("#id_sc_field_" + sFieldName).val(fieldValue);
        scJQSignatureRedraw(sFieldName);
         scFormHasChanged = false; // mantis 0020638
  } // scAjaxSetFieldSignature

  function scAjaxSetFieldRating(sFieldName, oFieldValues, thisRow)
  {
        $("#id_sc_field_" + sFieldName).val(oFieldValues[0]['value']);
        if ("" != thisRow) {
      sFieldName = sFieldName.substr(0, sFieldName.lastIndexOf("_") + 1);
        }
        scJQRatingRedraw(sFieldName, thisRow);
  } // scAjaxSetFieldRating

  function scAjaxSetFieldRatingStar(sFieldName, oFieldValues, thisRow)
  {
        $("#id_sc_field_" + sFieldName).val(oFieldValues[0]['value']);
        if ("" != thisRow) {
      sFieldName = sFieldName.substr(0, sFieldName.lastIndexOf("_") + 1);
        }
        scJQRatingStarRedraw(sFieldName, thisRow);
  } // scAjaxSetFieldRating

  function scAjaxSetFieldRatingSmile(sFieldName, oFieldValues, thisRow)
  {
        $("#id_sc_field_" + sFieldName).val(oFieldValues[0]['value']);
        if ("" != thisRow) {
      sFieldName = sFieldName.substr(0, sFieldName.lastIndexOf("_") + 1);
        }
        scJQRatingSmileRedraw(sFieldName, thisRow);
  } // scAjaxSetFieldRating

  function scAjaxSetFieldRatingThumb(sFieldName, oFieldValues, thisRow)
  {
        $("#id_sc_field_" + sFieldName).val(oFieldValues[0]['value']);
        if ("" != thisRow) {
      sFieldName = sFieldName.substr(0, sFieldName.lastIndexOf("_") + 1);
        }
        scJQRatingThumbRedraw(sFieldName, thisRow);
  } // scAjaxSetFieldRating

  function scAjaxSetCheckboxOptions(sFieldName, oFieldValues)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"] && !document.F1.elements[sFieldName + "[0]"])
    {
      return;
    }
    var aValues    = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        aValues[iFieldSelect] = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
      }
    }
    if (document.F1.elements[sFieldName + "[]"])
    {
      var oFormField = document.F1.elements[sFieldName + "[]"];
      if (oFormField.length)
      {
        for (iFieldCheckbox = 0; iFieldCheckbox < oFormField.length; iFieldCheckbox++)
        {
          if (scAjaxInArray(oFormField[iFieldCheckbox].value, aValues))
          {
            oFormField[iFieldCheckbox].checked = true;
          }
          else
          {
            oFormField[iFieldCheckbox].checked = false;
          }
        }
      }
      else
      {
        if (scAjaxInArray(oFormField.value, aValues))
        {
          oFormField.checked = true;
        }
        else
        {
          oFormField.checked = false;
        }
      }
    }
    else if (document.F1.elements[sFieldName + "[0]"])
    {
      for (iFieldCheckbox = 0; iFieldCheckbox < document.F1.elements.length; iFieldCheckbox++)
      {
        oFormElement = document.F1.elements[iFieldCheckbox];
        if (sFieldName + "[" == oFormElement.name.substr(0, sFieldName.length + 1) && scAjaxInArray(oFormElement.value, aValues))
        {
          oFormElement.checked = true;
        }
        else if (sFieldName + "[" == oFormElement.name.substr(0, sFieldName.length + 1))
        {
          oFormElement.checked = false;
        }
      }
    }
    else
    {
      oFormElement = document.F1.elements[sFieldName];
      if (scAjaxInArray(oFormElement.value, aValues))
      {
        oFormElement.checked = true;
      }
      else
      {
        oFormElement.checked = false;
      }
    }
  } // scAjaxSetCheckboxOptions

  function scAjaxSetRadioOptions(sFieldName, oFieldValues)
  {
    if (!document.F1.elements[sFieldName])
    {
      return;
    }
    var oFormField = document.F1.elements[sFieldName];
    var aValues    = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        aValues[iFieldSelect] = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
      }
    }
    for (iFieldRadio = 0; iFieldRadio < oFormField.length; iFieldRadio++)
    {
      oFormField[iFieldRadio].checked = false;
    }
    for (iFieldRadio = 0; iFieldRadio < oFormField.length; iFieldRadio++)
    {
      if (scAjaxInArray(oFormField[iFieldRadio].value, aValues))
      {
        oFormField[iFieldRadio].checked = true;
      }
    }
  } // scAjaxSetRadioOptions

  function scAjaxSetReadonlyValue(sFieldName, sFieldValue)
  {
    if (document.getElementById("id_read_on_" + sFieldName))
    {
      document.getElementById("id_read_on_" + sFieldName).innerHTML = sFieldValue;
    }
  } // scAjaxSetReadonlyValue

  function scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, sDelim)
  {
    if (null == oFieldValues)
    {
      return;
    }
    if (null == sDelim)
    {
      sDelim = " ";
    }
    sReadLabel = "";
    for (iReadArray = 0; iReadArray < oFieldValues.length; iReadArray++)
    {
      if (oFieldValues[iReadArray]["label"])
      {
        if ("" != sReadLabel)
        {
          sReadLabel += sDelim;
        }
        sReadLabel += oFieldValues[iReadArray]["label"];
      }
      else if (oFieldValues[iReadArray]["value"])
      {
        if ("" != sReadLabel)
        {
          sReadLabel += sDelim;
        }
        sReadLabel += oFieldValues[iReadArray]["value"];
      }
    }
    scAjaxSetReadonlyValue(sFieldName, sReadLabel);
  } // scAjaxSetReadonlyArrayValue

  function scAjaxGetFieldValue(sFieldGet)
  {
    sValue = "";
    if (!oResp["fldList"])
    {
      return sValue;
    }
    for (iFieldValue = 0; iFieldValue < oResp["fldList"].length; iFieldValue++)
    {
      var sFieldName  = oResp["fldList"][iFieldValue]["fldName"];
      if (oResp["fldList"][iFieldValue]["valList"])
      {
        var oFieldValues = oResp["fldList"][iFieldValue]["valList"];
        if (0 == oFieldValues.length)
        {
          oFieldValues = null;
        }
      }
      else
      {
        var oFieldValues = null;
      }
      if (sFieldGet == sFieldName && null != oFieldValues)
      {
        if (1 == oFieldValues.length)
        {
          sValue = scAjaxSpecCharParser(oFieldValues[0]["value"]);
        }
        else
        {
          sValue = new Array();
          for (jFieldValue = 0; jFieldValue < oFieldValues.length; jFieldValue++)
          {
            sValue[jFieldValue] = scAjaxSpecCharParser(oFieldValues[jFieldValue]["value"]);
          }
        }
      }
    }
    return sValue;
  } // scAjaxGetFieldValue

  function scAjaxGetKeyValue(sFieldGet)
  {
    sValue = "";
    if (!oResp["fldList"])
    {
      return sValue;
    }
    for (iKeyValue = 0; iKeyValue < oResp["fldList"].length; iKeyValue++)
    {
      var sFieldName = oResp["fldList"][iKeyValue]["fldName"];
      if (sFieldGet == sFieldName)
      {
        if (oResp["fldList"][iKeyValue]["keyVal"])
        {
          return scAjaxSpecCharParser(oResp["fldList"][iKeyValue]["keyVal"]);
        }
        else
        {
          return scAjaxGetFieldValue(sFieldGet);
        }
      }
    }
    return sValue;
  } // scAjaxGetKeyValue

  function scAjaxGetLineNumber()
  {
    sLineNumber = "";
    if (oResp["errList"])
    {
      for (iLineNumber = 0; iLineNumber < oResp["errList"].length; iLineNumber++)
      {
        if (oResp["errList"][iLineNumber]["numLinha"])
        {
          sLineNumber = oResp["errList"][iLineNumber]["numLinha"];
        }
      }
      return sLineNumber;
    }
    if (oResp["fldList"])
    {
      return oResp["fldList"][0]["numLinha"];
    }
    if (oResp["msgDisplay"])
    {
      return oResp["msgDisplay"]["numLinha"];
    }
    return sLineNumber;
  } // scAjaxGetLineNumber

  function scAjaxFieldExists(sFieldGet)
  {
    bExists = false;
    if (!oResp["fldList"])
    {
      return bExists;
    }
    for (iFieldValue = 0; iFieldValue < oResp["fldList"].length; iFieldValue++)
    {
      var sFieldName  = oResp["fldList"][iFieldValue]["fldName"];
      if (oResp["fldList"][iFieldValue]["valList"])
      {
        var oFieldValues = oResp["fldList"][iFieldValue]["valList"];
        if (0 == oFieldValues.length)
        {
          oFieldValues = null;
        }
      }
      else
      {
        var oFieldValues = null;
      }
      if (sFieldGet == sFieldName && null != oFieldValues)
      {
        bExists = true;
      }
    }
    return bExists;
  } // scAjaxFieldExists

  function scAjaxGetFieldText(sFieldName)
  {
    $oHidden = $("input[name='" + sFieldName + "']");
    if (!$oHidden.length)
    {
      $oHidden = $("input[name='" + sFieldName + "_']");
    }
    if ($oHidden.length)
    {
      for (var i = 0; i < $oHidden.length; i++)
      {
        if ("hidden" == $oHidden[i].type && $oHidden[i].form && $oHidden[i].form.name && "F1" == $oHidden[i].form.name)
        {
          return scAjaxSpecCharProtect($oHidden[i].value);//.replace(/[+]/g, "__NM_PLUS__");
        }
      }
    }
    $oField = $("#id_sc_field_" + sFieldName);
    if(!$oField.length)
    {
      $oField = $("#id_sc_field_" + sFieldName + "_");
    }
    if ($oField.length && "select" != $oField[0].type.substr(0, 6))
    {
      return scAjaxSpecCharProtect($oField.val());//.replace(/[+]/g, "__NM_PLUS__");
    }
    else if (document.F1.elements[sFieldName])
    {
      return scAjaxSpecCharProtect(document.F1.elements[sFieldName].value);//.replace(/[+]/g, "__NM_PLUS__");
    }
    else if (document.F1.elements[sFieldName + '_'])
    {
      return scAjaxSpecCharProtect(document.F1.elements[sFieldName + '_'].value);//.replace(/[+]/g, "__NM_PLUS__");
    }
    else
    {
      return '';
    }
  } // scAjaxGetFieldText

  function scAjaxGetFieldHidden(sFieldName)
  {
    for( i= 0; i < document.F1.elements.length; i++)
    {
       if (document.F1.elements[i].name == sFieldName)
       {
          return scAjaxSpecCharProtect(document.F1.elements[i].value);//.replace(/[+]/g, "__NM_PLUS__");
       }
    }
//    return document.F1.elements[sFieldName].value.replace(/[+]/g, "__NM_PLUS__");
  } // scAjaxGetFieldHidden

  function scAjaxGetFieldSelect(sFieldName)
  {
    sFieldNameHtml = sFieldName;
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return "";
    }
    if (!document.F1.elements[sFieldName] && document.F1.elements[sFieldName + "[]"])
    {
      sFieldNameHtml += "[]";
    }
    if ("hidden" == document.F1.elements[sFieldNameHtml].type)
    {
      return scAjaxGetFieldHidden(sFieldNameHtml);
    }
    var oFormField = document.F1.elements[sFieldNameHtml];
    var iSelected  = oFormField.selectedIndex;
    if (-1 < iSelected)
    {
      return scAjaxSpecCharProtect(oFormField.options[iSelected].value);//.replace(/[+]/g, "__NM_PLUS__");
    }
    else
    {
      return "";
    }
  } // scAjaxGetFieldSelect

  function scAjaxGetFieldSelectMult(sFieldName, sFieldDelim)
  {
    sFieldNameHtml = sFieldName;
    if (!document.F1.elements[sFieldName] && document.F1.elements[sFieldName + "[]"])
    {
      sFieldNameHtml += "[]";
    }
    if ("hidden" == document.F1.elements[sFieldNameHtml].type)
    {
      return scAjaxGetFieldHidden(sFieldNameHtml);
    }
    var oFormField = document.F1.elements[sFieldNameHtml];
    var sFieldVals = "";
    for (iFieldSelect = 0; iFieldSelect < oFormField.length; iFieldSelect++)
    {
      if (oFormField[iFieldSelect].selected)
      {
        if ("" != sFieldVals)
        {
          sFieldVals += sFieldDelim;
        }
        sFieldVals += scAjaxSpecCharProtect(oFormField[iFieldSelect].value);//.replace(/[+]/g, "__NM_PLUS__");
      }
    }
    return sFieldVals;
  } // scAjaxGetFieldSelectMult

  function scAjaxGetFieldCheckbox(sFieldName, sDelim)
  {
    var aValues = new Array();
    var sValue  = "";
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"] && !document.F1.elements[sFieldName + "[0]"])
    {
      return sValue;
    }
    if (document.F1.elements[sFieldName + "[]"] && "hidden" == document.F1.elements[sFieldName + "[]"].type)
    {
      return scAjaxGetFieldHidden(sFieldName + "[]");
    }
    if (document.F1.elements[sFieldName] && "hidden" == document.F1.elements[sFieldName].type)
    {
      return scAjaxGetFieldHidden(sFieldName);
    }
    if (document.F1.elements[sFieldName + "[]"])
    {
      var oFormField = document.F1.elements[sFieldName + "[]"];
      if (oFormField.length)
      {
        for (iFieldCheck = 0; iFieldCheck < oFormField.length; iFieldCheck++)
        {
          if (oFormField[iFieldCheck].checked)
          {
            aValues[aValues.length] = oFormField[iFieldCheck].value;
          }
        }
      }
      else
      {
        if (oFormField.checked)
        {
          aValues[aValues.length] = oFormField.value;
        }
      }
    }
    else
    {
      for (iFieldCheck = 0; iFieldCheck < document.F1.elements.length; iFieldCheck++)
      {
        oFormElement = document.F1.elements[iFieldCheck];
        if (sFieldName + "[" == oFormElement.name.substr(0, sFieldName.length + 1) && oFormElement.checked)
        {
          aValues[aValues.length] = oFormElement.value;
        }
        else if (sFieldName == oFormElement.name && oFormElement.checked)
        {
          aValues[aValues.length] = oFormElement.value;
        }
      }
    }
    for (iFieldCheck = 0; iFieldCheck < aValues.length; iFieldCheck++)
    {
      sValue += scAjaxSpecCharProtect(aValues[iFieldCheck]);//.replace(/[+]/g, "__NM_PLUS__");
      if (iFieldCheck + 1 != aValues.length)
      {
        sValue += sDelim;
      }
    }
    return sValue;
  } // scAjaxGetFieldCheckbox

  function scAjaxGetFieldRadio(sFieldName)
  {
    if ("hidden" == document.F1.elements[sFieldName].type)
    {
      return scAjaxGetFieldHidden(sFieldName);
    }
    var sValue = "";
    if (!document.F1.elements[sFieldName])
    {
      return sValue;
    }
    var oFormField = document.F1.elements[sFieldName];
    if (!oFormField.length)
    {
        var sc_cmp_radio = eval("document.F1." + sFieldName);
        if (sc_cmp_radio.checked)
        {
           sValue = scAjaxSpecCharProtect(sc_cmp_radio.value);//.replace(/[+]/g, "__NM_PLUS__");
        }
    }
    else
    {
      for (iFieldRadio = 0; iFieldRadio < oFormField.length; iFieldRadio++)
      {
        if (oFormField[iFieldRadio].checked)
        {
          sValue = scAjaxSpecCharProtect(oFormField[iFieldRadio].value);//.replace(/[+]/g, "__NM_PLUS__");
        }
      }
    }
    return sValue;
  } // scAjaxGetFieldRadio

  function scAjaxGetFieldEditorHtml(sFieldName)
  {
    if ("hidden" == document.F1.elements[sFieldName].type)
    {
      return scAjaxGetFieldHidden(sFieldName);
    }
    var sValue = "";
    if (!document.F1.elements[sFieldName])
    {
      return sValue;
    }

        if(tinymce.majorVersion > 3)
        {
                var oFormField = tinyMCE.get(sFieldName);
        }
        else
        {
                var oFormField = tinyMCE.getInstanceById(sFieldName);
        }
    return scAjaxSpecCharParser(scAjaxSpecCharProtect(oFormField.getContent()));//.replace(/[+]/g, "__NM_PLUS__"));
  } // scAjaxGetFieldEditorHtml

  function scAjaxGetFieldSignature(sFieldName)
  {
    var signatureData = $("#sc-id-sign-" + sFieldName).jSignature("getData", "base30");
        $("#id_sc_field_" + sFieldName).val("data:" + signatureData[0] + "," + signatureData[1]);
        return $("#id_sc_field_" + sFieldName).val();
  } // scAjaxGetFieldEditorHtml

  function scAjaxGetFieldRecurInfo(sFieldName)
  {
          var repeatInList = $(".cl_rinf_repeatin_" + sFieldName).filter(":checked"), repeatInValues = [], jsonData, i;
          for (i = 0; i < repeatInList.length; i++) {
                  repeatInValues.push($(repeatInList[i]).val());
          }
          jsonData = {
                  repeat: $("#id_rinf_repeat_" + sFieldName).val(),
                  repeatin: repeatInValues.join(";"),
                  endon: $(".cl_rinf_endon_" + sFieldName).filter(":checked").val(),
                  endafter: $("#id_rinf_endafter_" + sFieldName).val(),
                  endin: $("#id_rinf_endin_" + sFieldName).val()
          };
          return JSON.stringify(jsonData);
  } // scAjaxGetFieldRecurInfo

  function scAjaxDoNothing(e)
  {
  } // scAjaxDoNothing

  function scAjaxInArray(mVal, aList)
  {
    for (iInArray = 0; iInArray < aList.length; iInArray++)
    {
      if (aList[iInArray] == mVal)
      {
        return true;
      }
    }
    return false;
  } // scAjaxInArray

  function scAjaxSpecCharParser(sParseString)
  {
    if (null == sParseString) {
      return "";
    }
    var ta = document.createElement("textarea");
    ta.innerHTML = sParseString.replace(/</g, "&lt;").replace(/>/g, "&gt;");
    return ta.value;
  } // scAjaxSpecCharParser

  function scAjaxSpecCharProtect(sOriginal)
  {
        var sProtected;
        sProtected = sOriginal.replace(/[+]/g, "__NM_PLUS__");
        sProtected = sProtected.replace(/[%]/g, "__NM_PERC__");
        return sProtected;
  } // scAjaxSpecCharProtect

  function scAjaxRecreateOptions(sFieldType, sHtmlType, sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, sOptClass, sOptMulti, bSwitch)
  {
    var sSuffix  = ("checkbox" == sHtmlType) ? "[]" : "";
    var sDivName = "idAjax" + sFieldType + "_" + sFieldName;
    var sDivText = "";
    var iCntLine = 0;
    var aValues  = new Array();
    var sClass;
    var markChangedClass;
    if (null != oFieldValues)
    {
      for (iRecreate = 0; iRecreate < oFieldValues.length; iRecreate++)
      {
        aValues[iRecreate] = scAjaxSpecCharParser(oFieldValues[iRecreate]["value"]);
      }
    }
    sDivText += "<table border=0>";
    if ("checkbox" == sHtmlType)
    {
        markChangedClass = "sc-ui-checkbox-" + sFieldName;
    }
    if ("radio" == sHtmlType)
    {
        markChangedClass = "sc-ui-radio-" + sFieldName;
    }
    for (iRecreate = 0; iRecreate < oFieldOptions.length; iRecreate++)
    {
        sOptText  = scAjaxSpecCharParser(oFieldOptions[iRecreate]["label"]);
        sOptValue = scAjaxSpecCharParser(oFieldOptions[iRecreate]["value"]);
        if (0 == iCntLine)
        {
            sDivText += "<tr>";
        }
        iCntLine++;
        if ("" != sOptClass)
        {
            sClass = " class=\"" + sOptClass;
            if ("" != sOptMulti)
            {
                sClass += " " + sOptClass + sOptMulti;
            }
            if ("" != markChangedClass)
            {
                sClass += " " + markChangedClass;
            }
            sClass += "\"";
        }
        else
        {
            sClass = " class=\"";
            if ("" != markChangedClass)
            {
                sClass += " " + markChangedClass;
            }
            sClass += "\"";
        }
        if (sHtmComp == null)
        {
            sHtmComp = "";
        }
        sChecked  = (scAjaxInArray(sOptValue, aValues)) ? " checked" : "";
        sDivText += "<td class=\"scFormDataFontOdd\">";
                if (bSwitch)
                {
                        sDivText += "<div class=\"sc ";
                        if ("Checkbox" == sFieldType)
                        {
                                sDivText += "switch";
                        }
                        else
                        {
                                sDivText += "radio";
                        }
                        sDivText += "\">";
                }
        sDivText += "<input id=\"id-opt-" + sFieldName + "-"  + iRecreate + "\" type=\"" + sHtmlType + "\" name=\"" + sFieldName + sSuffix + "\" value=\"" + sOptValue + "\"" + sChecked + " " + sHtmComp + " " + sOptComp + sClass + ">";
                if (bSwitch)
                {
                        sDivText += "<span></span>";
                }
        sDivText += "<label for=\"id-opt-" + sFieldName + "-"  + iRecreate + "\">" + sOptText + "</label>";
                if (bSwitch)
                {
                        sDivText += "</div>";
                }
        sDivText += "</td>";
        if (iColNum == iCntLine)
        {
            sDivText += "</tr>";
            iCntLine  = 0;
        }
    }
    sDivText += "</table>";
    document.getElementById(sDivName).innerHTML = sDivText;
    if ("" != markChangedClass)
    {
      $("." + markChangedClass).on("click", function() { scMarkFormAsChanged(); });
    }
  } // scAjaxRecreateOptions

  function scAjaxProcOn(bForce)
  {
    if (null == bForce)
    {
      bForce = false;
    }
    if (document.getElementById("id_div_process"))
    {
      if ($ && $.blockUI && !bForce)
      {
        $.blockUI({
          message: $("#id_div_process_block"),
          overlayCSS: { backgroundColor: sc_ajaxBg },
          css: {
            borderColor: sc_ajaxBordC,
            borderStyle: sc_ajaxBordS,
            borderWidth: sc_ajaxBordW
          }
        });
      }
      else
      {
        document.getElementById("id_div_process").style.display = "";
        document.getElementById("id_fatal_error").style.display = "none";
        if (null != scCenterElement)
        {
          scCenterElement(document.getElementById("id_div_process"));
        }
      }
    }
  } // scAjaxProcOn

  function scAjaxProcOff(bForce)
  {
    if (null == bForce)
    {
      bForce = false;
    }
    if (document.getElementById("id_div_process"))
    {
      if ($ && $.unblockUI && !bForce)
      {
        $.unblockUI();
      }
      else
      {
        document.getElementById("id_div_process").style.display = "none";
      }
    }
  } // scAjaxProcOff

  function scAjaxSetMaster()
  {
    if (!oResp["masterValue"])
    {
      return;
    }
        if (scMasterDetailParentIframe && "" != scMasterDetailParentIframe)
        {
      var dbParentFrame = $(parent.document).find("[name='" + scMasterDetailParentIframe + "']");
          if (!dbParentFrame || !dbParentFrame[0] || !dbParentFrame[0].contentWindow.scAjaxDetailValue)
          {
                return;
          }
      for (iMaster = 0; iMaster < oResp["masterValue"].length; iMaster++)
      {
        dbParentFrame[0].contentWindow.scAjaxDetailValue(oResp["masterValue"][iMaster]["index"], oResp["masterValue"][iMaster]["value"]);
      }
        }
    if (!parent || !parent.scAjaxDetailValue)
    {
      return;
    }
    for (iMaster = 0; iMaster < oResp["masterValue"].length; iMaster++)
    {
      parent.scAjaxDetailValue(oResp["masterValue"][iMaster]["index"], oResp["masterValue"][iMaster]["value"]);
    }
  } // scAjaxSetMaster

  function scAjaxSetFocus()
  {
    if (!oResp["setFocus"] && '' == scFocusFirstErrorName)
    {
      return;
    }
    sFieldName = oResp["setFocus"];
    if (document.F1.elements[sFieldName])
    {
        scFocusField(sFieldName);
    }
    scAjaxFocusError();
  } // scAjaxSetFocus

  function scAjaxFocusError()
  {
    if ('' != scFocusFirstErrorName)
    {
      scFocusField(scFocusFirstErrorName);
      scFocusFirstErrorName = '';
    }
  } // scAjaxFocusError

  function scAjaxSetNavStatus(sBarPos)
  {
    if (!oResp["navStatus"])
    {
      return;
    }
    sNavRet = "S";
    sNavAva = "S";
    if (oResp["navStatus"]["ret"])
    {
      sNavRet = oResp["navStatus"]["ret"];
    }
    if (oResp["navStatus"]["ava"])
    {
      sNavAva = oResp["navStatus"]["ava"];
    }
    if ("S" != sNavRet && "N" != sNavRet)
    {
      sNavRet = "S";
    }
    if ("S" != sNavAva && "N" != sNavAva)
    {
      sNavAva = "S";
    }
    Nav_permite_ret = sNavRet;
    Nav_permite_ava = sNavAva;
    nav_atualiza(Nav_permite_ret, Nav_permite_ava, sBarPos);
  } // scAjaxSetNavStatus

  function scAjaxSetSummary()
  {
    if (!oResp["navSummary"])
    {
      return;
    }
    sreg_ini = oResp["navSummary"].reg_ini;
    sreg_qtd = oResp["navSummary"].reg_qtd;
    sreg_tot = oResp["navSummary"].reg_tot;
    summary_atualiza(sreg_ini, sreg_qtd, sreg_tot);
  } // scAjaxSetSummary

  function scAjaxSetNavpage()
  {
    navpage_atualiza(oResp["navPage"]);
  } // scAjaxSetNavpage


  function scAjaxRedir(oTemp)
  {
    if (oTemp && oTemp != null)
    {
        oResp = oTemp;
    }
    if (!oResp["redirInfo"])
    {
      return;
    }
    sMetodo = oResp["redirInfo"]["metodo"];
    sAction = oResp["redirInfo"]["action"];
    if ("location" == sMetodo)
    {
      if ("parent.parent" == oResp["redirInfo"]["target"])
      {
        parent.parent.location = sAction;
      }
      else if ("parent" == oResp["redirInfo"]["target"])
      {
        parent.location = sAction;
      }
      else if ("_blank" == oResp["redirInfo"]["target"])
      {
        window.open(sAction, "_blank");
      }
      else
      {
        document.location = sAction;
      }
    }
    else if ("html" == sMetodo)
    {
        document.write(scAjaxSpecCharParser(oResp["redirInfo"]["action"]));
    }
    else
    {
      if (oResp["redirInfo"]["target"] == "modal")
      {
          tb_show('', sAction + '?script_case_init=' +  oResp["redirInfo"]["script_case_init"] + '&script_case_session=<?php echo session_id() ?>&nmgp_parms=' + oResp["redirInfo"]["nmgp_parms"] + '&nmgp_outra_jan=true&nmgp_url_saida=modal&NMSC_modal=ok&TB_iframe=true&modal=true&height=' +  oResp["redirInfo"]["h_modal"] + '&width=' + oResp["redirInfo"]["w_modal"], '');
          return;
      }
      sFormRedir = (oResp["redirInfo"]["nmgp_outra_jan"]) ? "form_ajax_redir_1" : "form_ajax_redir_2";
      document.forms[sFormRedir].action           = sAction;
      document.forms[sFormRedir].target           = oResp["redirInfo"]["target"];
      document.forms[sFormRedir].nmgp_parms.value = oResp["redirInfo"]["nmgp_parms"];
      if ("form_ajax_redir_1" == sFormRedir)
      {
        document.forms[sFormRedir].nmgp_outra_jan.value = oResp["redirInfo"]["nmgp_outra_jan"];
      }
      else
      {
        document.forms[sFormRedir].nmgp_url_saida.value   = oResp["redirInfo"]["nmgp_url_saida"];
        document.forms[sFormRedir].script_case_init.value = oResp["redirInfo"]["script_case_init"];
      }
      document.forms[sFormRedir].submit();
    }
  } // scAjaxRedir

  function scAjaxSetDisplay(bReset)
  {
    if (null == bReset)
    {
      bReset = false;
    }
    var aDispData = new Array();
    var aDispCont = {};
    var vertButton;
    if (bReset)
    {
      for (iDisplay = 0; iDisplay < ajax_block_list.length; iDisplay++)
      {
        aDispCont[ajax_block_list[iDisplay]] = aDispData.length;
        aDispData[aDispData.length] = new Array(ajax_block_id[ajax_block_list[iDisplay]], "on");
      }
      for (iDisplay = 0; iDisplay < ajax_field_list.length; iDisplay++)
      {
        if (ajax_field_id[ajax_field_list[iDisplay]])
        {
          aFieldIds = ajax_field_id[ajax_field_list[iDisplay]];
          for (iDisplay2 = 0; iDisplay2 < aFieldIds.length; iDisplay2++)
          {
            aDispCont[aFieldIds[iDisplay2]] = aDispData.length;
            aDispData[aDispData.length] = new Array(aFieldIds[iDisplay2], "on");
          }
        }
      }
    }
        var blockDisplay = {};
    if (oResp["blockDisplay"])
    {
      for (iDisplay = 0; iDisplay < oResp["blockDisplay"].length; iDisplay++)
      {
        if (bReset)
        {
          aDispData[ aDispCont[ oResp["blockDisplay"][iDisplay][0] ] ][1] = oResp["blockDisplay"][iDisplay][1];
        }
        else
        {
          aDispData[aDispData.length] = new Array(ajax_block_id[ oResp["blockDisplay"][iDisplay][0] ], oResp["blockDisplay"][iDisplay][1]);
        }
                blockDisplay[ oResp["blockDisplay"][iDisplay][0] ] = oResp["blockDisplay"][iDisplay][1];
      }
          //scCheckPagesWithoutBlock();
    }
        var fieldDisplay = {}, controlHtmlHideField = [], controlHtmlShowField = [];
    if (oResp["fieldDisplay"])
    {
      for (iDisplay = 0; iDisplay < oResp["fieldDisplay"].length; iDisplay++)
      {
        if (typeof scHideUserField === "function" && "off" == oResp["fieldDisplay"][iDisplay][1]) {
          controlHtmlHideField.push(oResp["fieldDisplay"][iDisplay][0]);
        }
        if (typeof scShowUserField === "function" && "on" == oResp["fieldDisplay"][iDisplay][1]) {
          controlHtmlShowField.push(oResp["fieldDisplay"][iDisplay][0]);
        }
        for (iDisplay2 = 1; iDisplay2 < ajax_field_mult[ oResp["fieldDisplay"][iDisplay][0] ].length; iDisplay2++)
        {
          aFieldIds = ajax_field_id[ ajax_field_mult[ oResp["fieldDisplay"][iDisplay][0] ][iDisplay2] ];
          for (iDisplay3 = 0; iDisplay3 < aFieldIds.length; iDisplay3++)
          {
            if (bReset)
            {
              aDispData[ aDispCont[ aFieldIds[iDisplay3] ] ][1] = oResp["fieldDisplay"][iDisplay][1];
            }
            else
            {
              aDispData[aDispData.length] = new Array(aFieldIds[iDisplay3], oResp["fieldDisplay"][iDisplay][1]);
            }
                        if ("hidden_field_data_" == aFieldIds[iDisplay3].substr(0, 18)) {
                          fieldDisplay[ aFieldIds[iDisplay3].substr(18) ] = oResp["fieldDisplay"][iDisplay][1];
                        }
          }
        }
      }
    }
    if (oResp["buttonDisplay"])
    {
      for (iDisplay = 0; iDisplay < oResp["buttonDisplay"].length; iDisplay++)
      {
        var sBtnName2 = "";
        var sBtnName3 = "";
        switch (oResp["buttonDisplay"][iDisplay][0])
        {
          case "first": var sBtnName = "sc_b_ini"; break;
          case "back": var sBtnName = "sc_b_ret"; break;
          case "forward": var sBtnName = "sc_b_avc"; break;
          case "last": var sBtnName = "sc_b_fim"; break;
          case "insert": var sBtnName = "sc_b_ins"; break;
          case "update": var sBtnName = "sc_b_upd"; break;
          case "delete": var sBtnName = "sc_b_del"; break;
          default: var sBtnName = "sc_b_" + oResp["buttonDisplay"][iDisplay][0]; sBtnName2 = "sc_" + oResp["buttonDisplay"][iDisplay][0]; sBtnName3 = "gbl_sc_" + oResp["buttonDisplay"][iDisplay][0]; break;
        }
        aDispData[aDispData.length] = new Array(sBtnName, oResp["buttonDisplay"][iDisplay][1]);
        aDispData[aDispData.length] = new Array(sBtnName + "_t", oResp["buttonDisplay"][iDisplay][1]);
        aDispData[aDispData.length] = new Array(sBtnName + "_b", oResp["buttonDisplay"][iDisplay][1]);
        if ("" != sBtnName2)
        {
          aDispData[aDispData.length] = new Array(sBtnName2, oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName2 + "_top", oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName2 + "_bot", oResp["buttonDisplay"][iDisplay][1]);
        }
        if ("" != sBtnName3)
        {
          aDispData[aDispData.length] = new Array(sBtnName3, oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName3 + "_top", oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName3 + "_bot", oResp["buttonDisplay"][iDisplay][1]);
        }
      }
    }
    if (oResp["buttonDisplayVert"])
    {
      for (iDisplay = 0; iDisplay < oResp["buttonDisplayVert"].length; iDisplay++)
      {
        vertButton = oResp["buttonDisplayVert"][iDisplay];
        aDispData[aDispData.length] = new Array("sc_exc_line_" + vertButton.seq, vertButton.delete);
        if (vertButton.gridView)
        {
          aDispData[aDispData.length] = new Array("sc_open_line_" + vertButton.seq, vertButton.update);
        }
        else
        {
          aDispData[aDispData.length] = new Array("sc_upd_line_" + vertButton.seq, vertButton.update);
        }
      }
    }
    for (iDisplay = 0; iDisplay < aDispData.length; iDisplay++)
    {
      scAjaxElementDisplay(aDispData[iDisplay][0], aDispData[iDisplay][1]);
    }
        for (var blockId in blockDisplay) {
                displayChange_block(blockId, blockDisplay[blockId]);
        }
        for (var fieldId in fieldDisplay) {
                displayChange_field(fieldId, "", fieldDisplay[fieldId]);
        }
        if (controlHtmlHideField.length) {
          for (iDisplay = 0; iDisplay < controlHtmlHideField.length; iDisplay++) {
            scHideUserField(controlHtmlHideField[iDisplay]);
          }
        }
        if (controlHtmlShowField.length) {
          for (iDisplay = 0; iDisplay < controlHtmlShowField.length; iDisplay++) {
            scShowUserField(controlHtmlShowField[iDisplay]);
          }
        }
  } // scAjaxSetDisplay

  function scAjaxNavigateButtonDisplay(sButton, sStatus)
  {
    sButton2 = sButton + "_off";

    if ("off" == sStatus)
    {
      sStatus2 = "off";
    }
    else
    {
      if ("sc_b_ini" == sButton || "sc_b_ret" == sButton)
      {
        if ("S" == Nav_permite_ret)
        {
          sStatus  = "on";
          sStatus2 = "off";
        }
        else
        {
          sStatus  = "off";
          sStatus2 = "on";
        }
      }
      else
      {
        if ("S" == Nav_permite_ava)
        {
          sStatus  = "on";
          sStatus2 = "off";
        }
        else
        {
          sStatus  = "off";
          sStatus2 = "on";
        }
      }
    }

    scAjaxElementDisplay(sButton        , sStatus);
    scAjaxElementDisplay(sButton + "_t" , sStatus);
    scAjaxElementDisplay(sButton + "_b" , sStatus);
    scAjaxElementDisplay(sButton2       , sStatus2);
    scAjaxElementDisplay(sButton2 + "_t", sStatus2);
    scAjaxElementDisplay(sButton2 + "_b", sStatus2);
  } // scAjaxNavigateButtonDisplay

  function scAjaxElementDisplay(sElement, sAction)
  {
    if (ajax_block_tab && ajax_block_tab[sElement] && "" != ajax_block_tab[sElement])
    {
      scAjaxElementDisplay(ajax_block_tab[sElement], sAction);
    }
    if (document.getElementById(sElement))
    {

      if("off" == sAction)
      {
        $('#' + sElement).hide();
      }
      else
      {
        $('#' + sElement).show();
        if (typeof $('#' + sElement).data('elementDisplay') != undefined) {
          $('#' + sElement).css('display', $('#' + sElement).data('elementDisplay'));
        }
      }
      if (document.getElementById(sElement + "_dumb"))
      {
        if("off" == sAction)
        {
          $('#' + sElement + "_dumb").show();
          if (typeof $('#' + sElement).data('elementDisplay') != undefined) {
            $('#' + sElement).css('display', $('#' + sElement).data('elementDisplay'));
          }
        }
        else
        {
          $('#' + sElement + "_dumb").hide();
        }
      }
    }
  } // scAjaxElementDisplay

  function scAjaxSetLabel(bReset)
  {
    if (null == bReset)
    {
      bReset = false;
    }
    if (bReset)
    {
      for (iLabel = 0; iLabel < ajax_field_list.length; iLabel++)
      {
        if (ajax_field_list[iLabel] && ajax_error_list[ajax_field_list[iLabel]])
        {
          scAjaxFieldLabel(ajax_field_list[iLabel], ajax_error_list[ajax_field_list[iLabel]]["label"]);
        }
      }
    }
    if (oResp["fieldLabel"])
    {
      for (iLabel = 0; iLabel < oResp["fieldLabel"].length; iLabel++)
      {
        scAjaxFieldLabel(oResp["fieldLabel"][iLabel][0], scAjaxSpecCharParser(oResp["fieldLabel"][iLabel][1]));
      }
    }
  } // scAjaxSetLabel

  function scAjaxFieldLabel(sField, sLabel)
  {
    if (document.getElementById("id_label_" + sField))
    {
      if (document.getElementById("id_label_" + sField).innerHTML != sLabel)
      {
        document.getElementById("id_label_" + sField).innerHTML = sLabel;
      }
    }
    else if (document.getElementById("hidden_field_label_" + sField) && document.getElementById("hidden_field_label_" + sField).innerHTML != sLabel)
    {
      document.getElementById("hidden_field_label_" + sField).innerHTML = sLabel;
    }
  } // scAjaxFieldLabel

  function scAjaxSetReadonly(bReset)
  {
    if (null == bReset)
    {
      bReset = false;
    }
    if (bReset)
    {
      for (iRead = 0; iRead < ajax_field_list.length; iRead++)
      {
        scAjaxFieldRead(ajax_field_list[iRead], ajax_read_only[ajax_field_list[iRead]]);
      }
      for (iRead = 0; iRead < ajax_field_Dt_Hr.length; iRead++)
      {
        scAjaxFieldRead(ajax_field_Dt_Hr[iRead], ajax_read_only[ajax_field_Dt_Hr[iRead]]);
      }
    }
    if (oResp["readOnly"])
    {
      for (iRead = 0; iRead < oResp["readOnly"].length; iRead++)
      {
        if (ajax_read_only[ oResp["readOnly"][iRead][0] ])
        {
          scAjaxFieldRead(oResp["readOnly"][iRead][0], oResp["readOnly"][iRead][1]);
        }
        else if (oResp["rsSize"])
        {
          for (var i = 0; i <= oResp["rsSize"]; i++)
          {
            if (ajax_read_only[ oResp["readOnly"][iRead][0] + i ])
            {
              scAjaxFieldRead(oResp["readOnly"][iRead][0] + i, oResp["readOnly"][iRead][1]);
            }
          }
        }
      }
    }
  } // scAjaxSetReadonly

  function scAjaxFieldRead(sField, sStatus)
  {
    if ("on" == sStatus)
    {
      var sDisplayOff = "none";
      var sDisplayOn  = "";
    }
    else
    {
      var sDisplayOff = "";
      var sDisplayOn  = "none";
    }
    if (document.getElementById("id_read_off_" + sField))
    {
      document.getElementById("id_read_off_" + sField).style.display = sDisplayOff;
    }
    if (document.getElementById("id_sc_dragdrop_" + sField))
    {
      document.getElementById("id_sc_dragdrop_" + sField).style.display = sDisplayOff;
    }
    if (document.getElementById("id_read_on_" + sField))
    {
      document.getElementById("id_read_on_" + sField).style.display = sDisplayOn;
    }
  } // scAjaxFieldRead

  function scAjaxSetBtnVars()
  {
    if (oResp["btnVars"])
    {
      for (iBtn = 0; iBtn < oResp["btnVars"].length; iBtn++)
      {
        eval(oResp["btnVars"][iBtn][0] + " = scAjaxSpecCharParser('" + oResp["btnVars"][iBtn][1] + "');");
      }
    }
  } // scAjaxSetBtnVars

  function scAjaxClearText(sFormField)
  {
    document.F1.elements[sFormField].value = "";
  } // scAjaxClearText

  function scAjaxClearLabel(sFormField)
  {
    document.getElementById("id_ajax_label_" + sFormField).innerHTML = "";
  } // scAjaxClearLabel

  function scAjaxClearSelect(sFormField)
  {
    document.F1.elements[sFormField].length = 0;
  } // scAjaxClearSelect

  function scAjaxClearCheckbox(sFormField)
  {
    document.getElementById("idAjaxCheckbox_" + sFormField).innerHTML = "";
  } // scAjaxClearCheckbox

  function scAjaxClearRadio(sFormField)
  {
    document.getElementById("idAjaxRadio_" + sFormField).innerHTML = "";
  } // scAjaxClearRadio

  function scAjaxClearEditorHtml(sFormField)
  {
    if(tinymce.majorVersion > 3)
        {
                var oFormField = tinyMCE.get(sFieldName);
        }
        else
        {
                var oFormField = tinyMCE.getInstanceById(sFieldName);
        }
    oFormField.setContent("");
  } // scAjaxClearEditorHtml

  function scCheckPagesWithoutBlock()
  {
        var page_id, block_id, has_block_shown;
    for (page_id in ajax_page_blocks) {
          has_block_shown = false;
      for (block_id in ajax_page_blocks[page_id]) {
                console.log(page_id + ' ' + ajax_page_blocks[page_id][block_id]);
                console.log($("#div_" + ajax_block_id[ajax_page_blocks[page_id][block_id]]).css('display'));
        //$("#div_" + ajax_block_id[block_id]);
      }
    }
  }

  function scAjaxJavascript()
  {
    if (oResp["ajaxJavascript"])
    {
      var sJsFunc = "";
      for (var i = 0; i < oResp["ajaxJavascript"].length; i++)
      {
        sJsFunc = scAjaxSpecCharParser(oResp["ajaxJavascript"][i][0]);
        if ("" != sJsFunc)
        {
          var aParam = new Array();
          if (oResp["ajaxJavascript"][i][1] && 0 < oResp["ajaxJavascript"][i][1].length)
          {
            for (var j = 0; j < oResp["ajaxJavascript"][i][1].length; j++)
            {
              aParam.push("'" + oResp["ajaxJavascript"][i][1][j] + "'");
            }
          }
          eval("if (" + sJsFunc + ") { " + sJsFunc + "(" + aParam.join(", ") + ") }");
        }
      }
    }
  } // scAjaxJavascript

  function scAjaxAlert(callbackOk)
  {
    if (oResp["ajaxAlert"] && oResp["ajaxAlert"]["message"] && "" != oResp["ajaxAlert"]["message"])
    {
      scJs_alert(oResp["ajaxAlert"]["message"], callbackOk, oResp["ajaxAlert"]["params"]);
    }
    else
    {
      callbackOk();
    }
  } // scAjaxAlert

        function scJs_alert_default(message, callbackOk) {
                alert(message);
                if (typeof callbackOk == "function") {
                        callbackOk();
                }
        } // scJs_alert_default

        function scJs_confirm_default(message, callbackOk, callbackCancel) {
                if (confirm(message)) {
                        callbackOk();
                }
                else {
                        callbackCancel();
                }
        } // scJs_confirm_default

  function scAjaxMessage(oTemp)
  {
    if (oTemp && oTemp != null)
    {
        oResp = oTemp;
    }
    if (oResp["ajaxMessage"] && oResp["ajaxMessage"]["message"] && "" != oResp["ajaxMessage"]["message"])
    {
      var sTitle    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["title"])        ? oResp["ajaxMessage"]["title"]               : scMsgDefTitle,
          bModal    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["modal"])        ? ("Y" == oResp["ajaxMessage"]["modal"])      : false,
          iTimeout  = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["timeout"])      ? parseInt(oResp["ajaxMessage"]["timeout"])   : 0,
          bButton   = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["button"])       ? ("Y" == oResp["ajaxMessage"]["button"])     : false,
          sButton   = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["button_label"]) ? oResp["ajaxMessage"]["button_label"]        : "Ok",
          iTop      = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["top"])          ? parseInt(oResp["ajaxMessage"]["top"])       : 0,
          iLeft     = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["left"])         ? parseInt(oResp["ajaxMessage"]["left"])      : 0,
          iWidth    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["width"])        ? parseInt(oResp["ajaxMessage"]["width"])     : 0,
          iHeight   = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["height"])       ? parseInt(oResp["ajaxMessage"]["height"])    : 0,
          bClose    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["show_close"])   ? ("Y" == oResp["ajaxMessage"]["show_close"]) : true,
          bBodyIcon = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["body_icon"])    ? ("Y" == oResp["ajaxMessage"]["body_icon"])  : true,
          sRedir    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["redir"])        ? oResp["ajaxMessage"]["redir"]               : "",
          sTarget   = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["redir_target"]) ? oResp["ajaxMessage"]["redir_target"]        : "",
          sParam    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["redir_par"])    ? oResp["ajaxMessage"]["redir_par"]           : "",
          bToast    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["toast"])        ? ("Y" == oResp["ajaxMessage"]["toast"])      : false,
          sToastPos = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["toast_pos"])    ? oResp["ajaxMessage"]["toast_pos"]           : "",
          sType     = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["type"])         ? oResp["ajaxMessage"]["type"]                : "";
      if (typeof scDisplayUserMessage == "function") {
        scDisplayUserMessage(oResp["ajaxMessage"]["message"]);
      }
      else {
                  var params = {
                          title: sTitle,
                          message: oResp["ajaxMessage"]["message"],
                          isModal: bModal,
                          timeout: iTimeout,
                          showButton: bButton,
                          buttonLabel: sButton,
                          topPos: iTop,
                          leftPos: iLeft,
                          width: iWidth,
                          height: iHeight,
                          redirUrl: sRedir,
                          redirTarget: sTarget,
                          redirParams: sParam,
                          showClose: bClose,
                          showBodyIcon: bBodyIcon,
                          isToast: bToast,
                          toastPos: sToastPos,
                          type: sType
                  };
        _scAjaxShowMessage(params);
      }
    }
  } // scAjaxMessage

  function scAjaxResponse(sResp)
  {
    eval("var oResp = " + sResp);
    return oResp;
  } // scAjaxResponse

  function scAjaxBreakLine(input)
  {
      if (null == input)
      {
          return "";
      }
      input += "";
      while (input.lastIndexOf(String.fromCharCode(10)) > -1)
      {
         input = input.replace(String.fromCharCode(10), '<br>');
      }
      return input;
  } // scAjaxBreakLine

  function scAjaxProtectBreakLine(input)
  {
      if (null == input)
      {
          return "";
      }
      var input1 = input + "";
      while (input1.lastIndexOf(String.fromCharCode(10)) > -1)
      {
         input1 = input1.replace(String.fromCharCode(10), '#@NM#@');
      }
      return input1;
  } // scAjaxProtectBreakLine

  function scAjaxReturnBreakLine(input)
  {
      if (null == input)
      {
          return "";
      }
      while (input.lastIndexOf('#@NM#@') > -1)
      {
         input = input.replace('#@NM#@', String.fromCharCode(10));
      }
      return input;
  } // scAjaxReturnBreakLine

  function scOpenMasterDetail(widget, url)
  {
          var iframe = $(parent.document).find("[name='" +  widget+ "']");
          iframe.attr("src", url);
  } // scOpenMasterDetail

  function scMoveMasterDetail(widget)
  {
          var iframe = $(parent.document).find("[name='" +  widget+ "']");
          iframe[0].contentWindow.nm_move("apl_detalhe", true);
  } // scMoveMasterDetail

        function scAjaxError_markList() {
            if ('undefined' == typeof oResp.errList) {
                return;
            }
                var i, fieldName, fieldList = new Array();
                for (i = 0; i < oResp.errList.length; i++) {
                        fieldName = oResp.errList[i]["fldName"];
                        if (oResp.errList[i]["numLinha"]) {
                                fieldName += oResp.errList[i]["numLinha"];
                        }
            fieldList.push(fieldName);
                }
                scAjaxError_markFieldList(fieldList);
        } // scAjaxError_markList

        function scAjaxError_markFieldList(fieldList) {
                var i;
                for (i = 0; i < fieldList.length; i++) {
            scAjaxError_markField(fieldList[i]);
                }
        } // scAjaxError_markFieldList

        function scAjaxError_unmarkList() {
                var i;
                for (i = 0; i < ajax_field_list.length; i++) {
            scAjaxError_unmarkField(ajax_field_list[i]);
                }
        } // scAjaxError_unmarkList

        function scAjaxError_markField(fieldName) {
                var $oField = $("#id_sc_field_" + fieldName);
                if (0 < $oField.length) {
                        scAjax_applyFieldErrorStyle($oField);
                }
        } // scAjaxError_markField

        function scAjaxError_unmarkField(fieldName) {
                var $oField = $("#id_sc_field_" + fieldName);
                if (0 < $oField.length) {
                        scAjax_removeFieldErrorStyle($oField);
                }
        } // scAjaxError_unmarkField

        function scAjax_displayEmptyForm() {
        $("#sc-ui-empty-form").show();
        $(".sc-ui-page-tab-line").hide();
        $("#sc-id-required-row").hide();
        sc_hide_form_clients_steps_renew_mob_form();
        }

  function scAjax_applyFieldErrorStyle(fieldObj) {
    if (fieldObj.hasClass("sc-ui-pwd-toggle")) {
        fieldObj.addClass(sc_css_status_pwd_text);
        fieldObj.parent().addClass(sc_css_status_pwd_box);
      } else {
        fieldObj.addClass(sc_css_status);
      }
  }

  function scAjax_removeFieldErrorStyle(fieldObj) {
    if (fieldObj.hasClass("sc-ui-pwd-toggle")) {
        fieldObj.removeClass(sc_css_status_pwd_text);
        fieldObj.parent().removeClass(sc_css_status_pwd_box);
      } else {
        fieldObj.removeClass(sc_css_status);
      }
  }

  function scAjax_formReload() {
<?php
    if ($this->nmgp_opcao == 'novo') {
        echo "      nm_move('reload_novo');";
    } else {
        echo "      nm_move('igual');";
    }
?>
  }

  function scBtnDisabled()
  {
    var btnNameNav, hasNavButton = false;

    if (typeof oResp.btnDisabled != undefined) {
      for (var btnName in oResp.btnDisabled) {
        btnNameNav = btnName.substring(0, 9);

        if ("on" == oResp.btnDisabled[btnName]) {
          $("#" + btnName).addClass("disabled");

          if ("sc_b_ini_" == btnNameNav) {
            Nav_binicio_macro_disabled = "on";
            hasNavButton = true;
          } else if ("sc_b_ret_" == btnNameNav) {
            Nav_bretorna_macro_disabled = "on";
            hasNavButton = true;
          } else if ("sc_b_avc_" == btnNameNav) {
            Nav_bavanca_macro_disabled = "on";
            hasNavButton = true;
          } else if ("sc_b_fim_" == btnNameNav) {
            Nav_bfinal_macro_disabled = "on";
            hasNavButton = true;
          }
        } else {
          $("#" + btnName).removeClass("disabled");

          if ("sc_b_ini_" == btnNameNav) {
            Nav_binicio_macro_disabled = "off";
            hasNavButton = true;
          } else if ("sc_b_ret_" == btnNameNav) {
            Nav_bretorna_macro_disabled = "off";
            hasNavButton = true;
          } else if ("sc_b_avc_" == btnNameNav) {
            Nav_bavanca_macro_disabled = "off";
            hasNavButton = true;
          } else if ("sc_b_fim_" == btnNameNav) {
            Nav_bfinal_macro_disabled = "off";
            hasNavButton = true;
          }
        }
      }
    }

    if (hasNavButton) {
      nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');
      nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');
    }
  }

  function scBtnLabel()
  {
    if (typeof oResp.btnLabel != undefined) {
      for (var btnName in oResp.btnLabel) {
        $("#" + btnName).find(".btn-label").html(oResp.btnLabel[btnName]);
      }
    }
  }

  var scFormHasChanged = false;

  function scMarkFormAsChanged() {
    scFormHasChanged = true;
  }

  function scResetFormChanges() {
    scFormHasChanged = false;
  }

  var isRunning_scFormClose_F5 = false;
  function scFormClose_F5(exitUrl) {
    if (isRunning_scFormClose_F5) {
      return;
    }
    isRunning_scFormClose_F5 = true;
    setTimeout(function() { isRunning_scFormClose_F5 = false; }, 3000);

    if (scFormHasChanged) {
      scJs_confirm('<?php echo html_entity_decode($this->Ini->Nm_lang['lang_reload_confirm']) ?>', function() { document.F5.action = exitUrl; document.F5.submit(); }, function() {});
    } else {
      document.F5.action = exitUrl;
      document.F5.submit();
    }

  }

  var isRunning_scFormClose_F6 = false;
  function scFormClose_F6(exitUrl) {
    if (isRunning_scFormClose_F6) {
      return;
    }
    isRunning_scFormClose_F6 = true;
    setTimeout(function() { isRunning_scFormClose_F6 = false; }, 3000);

    if (scFormHasChanged) {
      scJs_confirm('<?php echo html_entity_decode($this->Ini->Nm_lang['lang_reload_confirm']) ?>', function() { document.F6.action = exitUrl; document.F6.submit(); }, function() {});
    } else {
      document.F6.action = exitUrl;
      document.F6.submit();
    }

  }

  // ---------- Validate dummy02
  function do_ajax_form_clients_steps_renew_mob_validate_dummy02()
  {
  } // do_ajax_form_clients_steps_renew_mob_validate_dummy02

  function do_ajax_form_clients_steps_renew_mob_validate_dummy02_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "dummy02";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_dummy02_cb

  // ---------- Validate dummy03
  function do_ajax_form_clients_steps_renew_mob_validate_dummy03()
  {
  } // do_ajax_form_clients_steps_renew_mob_validate_dummy03

  function do_ajax_form_clients_steps_renew_mob_validate_dummy03_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "dummy03";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_dummy03_cb

  // ---------- Validate co_name
  function do_ajax_form_clients_steps_renew_mob_validate_co_name()
  {
    var nomeCampo_co_name = "co_name";
    var var_co_name = scAjaxGetFieldText(nomeCampo_co_name);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_co_name(var_co_name, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_co_name_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_co_name

  function do_ajax_form_clients_steps_renew_mob_validate_co_name_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "co_name";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_co_name_cb

  // ---------- Validate client_id
  function do_ajax_form_clients_steps_renew_mob_validate_client_id()
  {
    var nomeCampo_client_id = "client_id";
    var var_client_id = scAjaxGetFieldHidden(nomeCampo_client_id);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_client_id(var_client_id, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_client_id_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_client_id

  function do_ajax_form_clients_steps_renew_mob_validate_client_id_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "client_id";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_client_id_cb

  // ---------- Validate mailing_address
  function do_ajax_form_clients_steps_renew_mob_validate_mailing_address()
  {
    var nomeCampo_mailing_address = "mailing_address";
    var var_mailing_address = scAjaxGetFieldText(nomeCampo_mailing_address);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_mailing_address(var_mailing_address, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_mailing_address_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_mailing_address

  function do_ajax_form_clients_steps_renew_mob_validate_mailing_address_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "mailing_address";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_mailing_address_cb

  // ---------- Validate appn_date
  function do_ajax_form_clients_steps_renew_mob_validate_appn_date()
  {
    var nomeCampo_appn_date = "appn_date";
    var var_appn_date = scAjaxGetFieldHidden(nomeCampo_appn_date);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_appn_date(var_appn_date, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_appn_date_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_appn_date

  function do_ajax_form_clients_steps_renew_mob_validate_appn_date_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "appn_date";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_appn_date_cb

  // ---------- Validate city
  function do_ajax_form_clients_steps_renew_mob_validate_city()
  {
    var nomeCampo_city = "city";
    var var_city = scAjaxGetFieldText(nomeCampo_city);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_city(var_city, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_city_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_city

  function do_ajax_form_clients_steps_renew_mob_validate_city_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "city";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_city_cb

  // ---------- Validate bus_cat_id
  function do_ajax_form_clients_steps_renew_mob_validate_bus_cat_id()
  {
    var nomeCampo_bus_cat_id = "bus_cat_id";
    var var_bus_cat_id = scAjaxGetFieldSelect(nomeCampo_bus_cat_id);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_bus_cat_id(var_bus_cat_id, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_bus_cat_id_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_bus_cat_id

  function do_ajax_form_clients_steps_renew_mob_validate_bus_cat_id_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "bus_cat_id";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_bus_cat_id_cb

  // ---------- Validate state
  function do_ajax_form_clients_steps_renew_mob_validate_state()
  {
    var nomeCampo_state = "state";
    var var_state = scAjaxGetFieldText(nomeCampo_state);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_state(var_state, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_state_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_state

  function do_ajax_form_clients_steps_renew_mob_validate_state_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "state";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_state_cb

  // ---------- Validate bus_subcat_id
  function do_ajax_form_clients_steps_renew_mob_validate_bus_subcat_id()
  {
    var nomeCampo_bus_subcat_id = "bus_subcat_id";
    var var_bus_subcat_id = scAjaxGetFieldSelect(nomeCampo_bus_subcat_id);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_bus_subcat_id(var_bus_subcat_id, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_bus_subcat_id_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_bus_subcat_id

  function do_ajax_form_clients_steps_renew_mob_validate_bus_subcat_id_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "bus_subcat_id";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_bus_subcat_id_cb

  // ---------- Validate zip_code
  function do_ajax_form_clients_steps_renew_mob_validate_zip_code()
  {
    var nomeCampo_zip_code = "zip_code";
    var var_zip_code = scAjaxGetFieldText(nomeCampo_zip_code);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_zip_code(var_zip_code, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_zip_code_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_zip_code

  function do_ajax_form_clients_steps_renew_mob_validate_zip_code_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "zip_code";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_zip_code_cb

  // ---------- Validate bus_subcat_other
  function do_ajax_form_clients_steps_renew_mob_validate_bus_subcat_other()
  {
    var nomeCampo_bus_subcat_other = "bus_subcat_other";
    var var_bus_subcat_other = scAjaxGetFieldText(nomeCampo_bus_subcat_other);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_bus_subcat_other(var_bus_subcat_other, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_bus_subcat_other_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_bus_subcat_other

  function do_ajax_form_clients_steps_renew_mob_validate_bus_subcat_other_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "bus_subcat_other";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_bus_subcat_other_cb

  // ---------- Validate phone_number
  function do_ajax_form_clients_steps_renew_mob_validate_phone_number()
  {
    var nomeCampo_phone_number = "phone_number";
    var var_phone_number = scAjaxGetFieldText(nomeCampo_phone_number);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_phone_number(var_phone_number, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_phone_number_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_phone_number

  function do_ajax_form_clients_steps_renew_mob_validate_phone_number_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "phone_number";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_phone_number_cb

  // ---------- Validate website_url
  function do_ajax_form_clients_steps_renew_mob_validate_website_url()
  {
    var nomeCampo_website_url = "website_url";
    var var_website_url = scAjaxGetFieldText(nomeCampo_website_url);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_website_url(var_website_url, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_website_url_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_website_url

  function do_ajax_form_clients_steps_renew_mob_validate_website_url_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "website_url";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_website_url_cb

  // ---------- Validate email
  function do_ajax_form_clients_steps_renew_mob_validate_email()
  {
    var nomeCampo_email = "email";
    var var_email = scAjaxGetFieldText(nomeCampo_email);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_email(var_email, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_email_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_email

  function do_ajax_form_clients_steps_renew_mob_validate_email_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "email";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_email_cb

  // ---------- Validate acct_instagram
  function do_ajax_form_clients_steps_renew_mob_validate_acct_instagram()
  {
    var nomeCampo_acct_instagram = "acct_instagram";
    var var_acct_instagram = scAjaxGetFieldText(nomeCampo_acct_instagram);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_acct_instagram(var_acct_instagram, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_acct_instagram_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_acct_instagram

  function do_ajax_form_clients_steps_renew_mob_validate_acct_instagram_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "acct_instagram";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_acct_instagram_cb

  // ---------- Validate dummy01
  function do_ajax_form_clients_steps_renew_mob_validate_dummy01()
  {
  } // do_ajax_form_clients_steps_renew_mob_validate_dummy01

  function do_ajax_form_clients_steps_renew_mob_validate_dummy01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "dummy01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_dummy01_cb

  // ---------- Validate acct_facebook
  function do_ajax_form_clients_steps_renew_mob_validate_acct_facebook()
  {
    var nomeCampo_acct_facebook = "acct_facebook";
    var var_acct_facebook = scAjaxGetFieldText(nomeCampo_acct_facebook);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_acct_facebook(var_acct_facebook, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_acct_facebook_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_acct_facebook

  function do_ajax_form_clients_steps_renew_mob_validate_acct_facebook_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "acct_facebook";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_acct_facebook_cb

  // ---------- Validate dummy04
  function do_ajax_form_clients_steps_renew_mob_validate_dummy04()
  {
  } // do_ajax_form_clients_steps_renew_mob_validate_dummy04

  function do_ajax_form_clients_steps_renew_mob_validate_dummy04_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "dummy04";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_dummy04_cb

  // ---------- Validate dummy07
  function do_ajax_form_clients_steps_renew_mob_validate_dummy07()
  {
  } // do_ajax_form_clients_steps_renew_mob_validate_dummy07

  function do_ajax_form_clients_steps_renew_mob_validate_dummy07_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "dummy07";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_dummy07_cb

  // ---------- Validate dummy08
  function do_ajax_form_clients_steps_renew_mob_validate_dummy08()
  {
  } // do_ajax_form_clients_steps_renew_mob_validate_dummy08

  function do_ajax_form_clients_steps_renew_mob_validate_dummy08_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "dummy08";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_dummy08_cb

  // ---------- Validate main_contact_name
  function do_ajax_form_clients_steps_renew_mob_validate_main_contact_name()
  {
    var nomeCampo_main_contact_name = "main_contact_name";
    var var_main_contact_name = scAjaxGetFieldText(nomeCampo_main_contact_name);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_main_contact_name(var_main_contact_name, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_main_contact_name_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_main_contact_name

  function do_ajax_form_clients_steps_renew_mob_validate_main_contact_name_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "main_contact_name";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_main_contact_name_cb

  // ---------- Validate main_contact_phone
  function do_ajax_form_clients_steps_renew_mob_validate_main_contact_phone()
  {
    var nomeCampo_main_contact_phone = "main_contact_phone";
    var var_main_contact_phone = scAjaxGetFieldText(nomeCampo_main_contact_phone);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_main_contact_phone(var_main_contact_phone, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_main_contact_phone_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_main_contact_phone

  function do_ajax_form_clients_steps_renew_mob_validate_main_contact_phone_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "main_contact_phone";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_main_contact_phone_cb

  // ---------- Validate main_contact_email
  function do_ajax_form_clients_steps_renew_mob_validate_main_contact_email()
  {
    var nomeCampo_main_contact_email = "main_contact_email";
    var var_main_contact_email = scAjaxGetFieldText(nomeCampo_main_contact_email);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_main_contact_email(var_main_contact_email, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_main_contact_email_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_main_contact_email

  function do_ajax_form_clients_steps_renew_mob_validate_main_contact_email_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "main_contact_email";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_main_contact_email_cb

  // ---------- Validate main_contact_title
  function do_ajax_form_clients_steps_renew_mob_validate_main_contact_title()
  {
    var nomeCampo_main_contact_title = "main_contact_title";
    var var_main_contact_title = scAjaxGetFieldText(nomeCampo_main_contact_title);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_main_contact_title(var_main_contact_title, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_main_contact_title_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_main_contact_title

  function do_ajax_form_clients_steps_renew_mob_validate_main_contact_title_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "main_contact_title";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_main_contact_title_cb

  // ---------- Validate main_contact_img_id
  function do_ajax_form_clients_steps_renew_mob_validate_main_contact_img_id()
  {
    var nomeCampo_main_contact_img_id = "main_contact_img_id";
    var var_main_contact_img_id = scAjaxGetFieldText(nomeCampo_main_contact_img_id);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_main_contact_img_id(var_main_contact_img_id, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_main_contact_img_id_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_main_contact_img_id

  function do_ajax_form_clients_steps_renew_mob_validate_main_contact_img_id_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "main_contact_img_id";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_main_contact_img_id_cb

  // ---------- Validate doc_type
  function do_ajax_form_clients_steps_renew_mob_validate_doc_type()
  {
    var nomeCampo_doc_type = "doc_type";
    var var_doc_type = scAjaxGetFieldCheckbox(nomeCampo_doc_type, ";");
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_doc_type(var_doc_type, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_doc_type_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_doc_type

  function do_ajax_form_clients_steps_renew_mob_validate_doc_type_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "doc_type";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_doc_type_cb

  // ---------- Validate doc_file
  function do_ajax_form_clients_steps_renew_mob_validate_doc_file()
  {
    var nomeCampo_doc_file = "doc_file";
    var var_doc_file = scAjaxGetFieldText(nomeCampo_doc_file);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_doc_file(var_doc_file, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_doc_file_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_doc_file

  function do_ajax_form_clients_steps_renew_mob_validate_doc_file_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "doc_file";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_doc_file_cb

  // ---------- Validate appn_note
  function do_ajax_form_clients_steps_renew_mob_validate_appn_note()
  {
    var nomeCampo_appn_note = "appn_note";
    var var_appn_note = scAjaxGetFieldEditorHtml(nomeCampo_appn_note);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_appn_note(var_appn_note, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_appn_note_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_appn_note

  function do_ajax_form_clients_steps_renew_mob_validate_appn_note_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "appn_note";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_appn_note_cb

  // ---------- Validate memb_name
  function do_ajax_form_clients_steps_renew_mob_validate_memb_name()
  {
  } // do_ajax_form_clients_steps_renew_mob_validate_memb_name

  function do_ajax_form_clients_steps_renew_mob_validate_memb_name_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "memb_name";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_memb_name_cb

  // ---------- Validate memb_phone
  function do_ajax_form_clients_steps_renew_mob_validate_memb_phone()
  {
  } // do_ajax_form_clients_steps_renew_mob_validate_memb_phone

  function do_ajax_form_clients_steps_renew_mob_validate_memb_phone_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "memb_phone";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_memb_phone_cb

  // ---------- Validate memb_email
  function do_ajax_form_clients_steps_renew_mob_validate_memb_email()
  {
  } // do_ajax_form_clients_steps_renew_mob_validate_memb_email

  function do_ajax_form_clients_steps_renew_mob_validate_memb_email_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "memb_email";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_memb_email_cb

  // ---------- Validate memb_note
  function do_ajax_form_clients_steps_renew_mob_validate_memb_note()
  {
  } // do_ajax_form_clients_steps_renew_mob_validate_memb_note

  function do_ajax_form_clients_steps_renew_mob_validate_memb_note_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "memb_note";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_memb_note_cb

  // ---------- Validate member1_name
  function do_ajax_form_clients_steps_renew_mob_validate_member1_name()
  {
    var nomeCampo_member1_name = "member1_name";
    var var_member1_name = scAjaxGetFieldText(nomeCampo_member1_name);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member1_name(var_member1_name, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member1_name_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member1_name

  function do_ajax_form_clients_steps_renew_mob_validate_member1_name_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member1_name";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member1_name_cb

  // ---------- Validate member1_phone
  function do_ajax_form_clients_steps_renew_mob_validate_member1_phone()
  {
    var nomeCampo_member1_phone = "member1_phone";
    var var_member1_phone = scAjaxGetFieldText(nomeCampo_member1_phone);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member1_phone(var_member1_phone, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member1_phone_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member1_phone

  function do_ajax_form_clients_steps_renew_mob_validate_member1_phone_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member1_phone";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member1_phone_cb

  // ---------- Validate member1_email
  function do_ajax_form_clients_steps_renew_mob_validate_member1_email()
  {
    var nomeCampo_member1_email = "member1_email";
    var var_member1_email = scAjaxGetFieldText(nomeCampo_member1_email);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member1_email(var_member1_email, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member1_email_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member1_email

  function do_ajax_form_clients_steps_renew_mob_validate_member1_email_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member1_email";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member1_email_cb

  // ---------- Validate member1_note
  function do_ajax_form_clients_steps_renew_mob_validate_member1_note()
  {
    var nomeCampo_member1_note = "member1_note";
    var var_member1_note = scAjaxGetFieldText(nomeCampo_member1_note);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member1_note(var_member1_note, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member1_note_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member1_note

  function do_ajax_form_clients_steps_renew_mob_validate_member1_note_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member1_note";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member1_note_cb

  // ---------- Validate member2_name
  function do_ajax_form_clients_steps_renew_mob_validate_member2_name()
  {
    var nomeCampo_member2_name = "member2_name";
    var var_member2_name = scAjaxGetFieldText(nomeCampo_member2_name);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member2_name(var_member2_name, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member2_name_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member2_name

  function do_ajax_form_clients_steps_renew_mob_validate_member2_name_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member2_name";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member2_name_cb

  // ---------- Validate member2_phone
  function do_ajax_form_clients_steps_renew_mob_validate_member2_phone()
  {
    var nomeCampo_member2_phone = "member2_phone";
    var var_member2_phone = scAjaxGetFieldText(nomeCampo_member2_phone);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member2_phone(var_member2_phone, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member2_phone_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member2_phone

  function do_ajax_form_clients_steps_renew_mob_validate_member2_phone_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member2_phone";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member2_phone_cb

  // ---------- Validate member2_email
  function do_ajax_form_clients_steps_renew_mob_validate_member2_email()
  {
    var nomeCampo_member2_email = "member2_email";
    var var_member2_email = scAjaxGetFieldText(nomeCampo_member2_email);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member2_email(var_member2_email, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member2_email_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member2_email

  function do_ajax_form_clients_steps_renew_mob_validate_member2_email_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member2_email";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member2_email_cb

  // ---------- Validate member2_note
  function do_ajax_form_clients_steps_renew_mob_validate_member2_note()
  {
    var nomeCampo_member2_note = "member2_note";
    var var_member2_note = scAjaxGetFieldText(nomeCampo_member2_note);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member2_note(var_member2_note, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member2_note_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member2_note

  function do_ajax_form_clients_steps_renew_mob_validate_member2_note_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member2_note";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member2_note_cb

  // ---------- Validate member3_name
  function do_ajax_form_clients_steps_renew_mob_validate_member3_name()
  {
    var nomeCampo_member3_name = "member3_name";
    var var_member3_name = scAjaxGetFieldText(nomeCampo_member3_name);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member3_name(var_member3_name, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member3_name_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member3_name

  function do_ajax_form_clients_steps_renew_mob_validate_member3_name_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member3_name";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member3_name_cb

  // ---------- Validate member3_phone
  function do_ajax_form_clients_steps_renew_mob_validate_member3_phone()
  {
    var nomeCampo_member3_phone = "member3_phone";
    var var_member3_phone = scAjaxGetFieldText(nomeCampo_member3_phone);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member3_phone(var_member3_phone, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member3_phone_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member3_phone

  function do_ajax_form_clients_steps_renew_mob_validate_member3_phone_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member3_phone";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member3_phone_cb

  // ---------- Validate member3_email
  function do_ajax_form_clients_steps_renew_mob_validate_member3_email()
  {
    var nomeCampo_member3_email = "member3_email";
    var var_member3_email = scAjaxGetFieldText(nomeCampo_member3_email);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member3_email(var_member3_email, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member3_email_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member3_email

  function do_ajax_form_clients_steps_renew_mob_validate_member3_email_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member3_email";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member3_email_cb

  // ---------- Validate member3_note
  function do_ajax_form_clients_steps_renew_mob_validate_member3_note()
  {
    var nomeCampo_member3_note = "member3_note";
    var var_member3_note = scAjaxGetFieldText(nomeCampo_member3_note);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member3_note(var_member3_note, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member3_note_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member3_note

  function do_ajax_form_clients_steps_renew_mob_validate_member3_note_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member3_note";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member3_note_cb

  // ---------- Validate dummy05
  function do_ajax_form_clients_steps_renew_mob_validate_dummy05()
  {
  } // do_ajax_form_clients_steps_renew_mob_validate_dummy05

  function do_ajax_form_clients_steps_renew_mob_validate_dummy05_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "dummy05";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_dummy05_cb

  // ---------- Validate adtl_memb_name
  function do_ajax_form_clients_steps_renew_mob_validate_adtl_memb_name()
  {
  } // do_ajax_form_clients_steps_renew_mob_validate_adtl_memb_name

  function do_ajax_form_clients_steps_renew_mob_validate_adtl_memb_name_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "adtl_memb_name";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_adtl_memb_name_cb

  // ---------- Validate adtl_memb_phone
  function do_ajax_form_clients_steps_renew_mob_validate_adtl_memb_phone()
  {
  } // do_ajax_form_clients_steps_renew_mob_validate_adtl_memb_phone

  function do_ajax_form_clients_steps_renew_mob_validate_adtl_memb_phone_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "adtl_memb_phone";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_adtl_memb_phone_cb

  // ---------- Validate adtl_memb_note
  function do_ajax_form_clients_steps_renew_mob_validate_adtl_memb_note()
  {
  } // do_ajax_form_clients_steps_renew_mob_validate_adtl_memb_note

  function do_ajax_form_clients_steps_renew_mob_validate_adtl_memb_note_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "adtl_memb_note";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_adtl_memb_note_cb

  // ---------- Validate addtl_memb_mail
  function do_ajax_form_clients_steps_renew_mob_validate_addtl_memb_mail()
  {
  } // do_ajax_form_clients_steps_renew_mob_validate_addtl_memb_mail

  function do_ajax_form_clients_steps_renew_mob_validate_addtl_memb_mail_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "addtl_memb_mail";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_addtl_memb_mail_cb

  // ---------- Validate member4_name
  function do_ajax_form_clients_steps_renew_mob_validate_member4_name()
  {
    var nomeCampo_member4_name = "member4_name";
    var var_member4_name = scAjaxGetFieldText(nomeCampo_member4_name);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member4_name(var_member4_name, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member4_name_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member4_name

  function do_ajax_form_clients_steps_renew_mob_validate_member4_name_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member4_name";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member4_name_cb

  // ---------- Validate member4_phone
  function do_ajax_form_clients_steps_renew_mob_validate_member4_phone()
  {
    var nomeCampo_member4_phone = "member4_phone";
    var var_member4_phone = scAjaxGetFieldText(nomeCampo_member4_phone);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member4_phone(var_member4_phone, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member4_phone_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member4_phone

  function do_ajax_form_clients_steps_renew_mob_validate_member4_phone_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member4_phone";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member4_phone_cb

  // ---------- Validate member4_email
  function do_ajax_form_clients_steps_renew_mob_validate_member4_email()
  {
    var nomeCampo_member4_email = "member4_email";
    var var_member4_email = scAjaxGetFieldText(nomeCampo_member4_email);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member4_email(var_member4_email, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member4_email_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member4_email

  function do_ajax_form_clients_steps_renew_mob_validate_member4_email_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member4_email";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member4_email_cb

  // ---------- Validate member4_note
  function do_ajax_form_clients_steps_renew_mob_validate_member4_note()
  {
    var nomeCampo_member4_note = "member4_note";
    var var_member4_note = scAjaxGetFieldText(nomeCampo_member4_note);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member4_note(var_member4_note, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member4_note_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member4_note

  function do_ajax_form_clients_steps_renew_mob_validate_member4_note_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member4_note";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member4_note_cb

  // ---------- Validate member5_name
  function do_ajax_form_clients_steps_renew_mob_validate_member5_name()
  {
    var nomeCampo_member5_name = "member5_name";
    var var_member5_name = scAjaxGetFieldText(nomeCampo_member5_name);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member5_name(var_member5_name, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member5_name_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member5_name

  function do_ajax_form_clients_steps_renew_mob_validate_member5_name_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member5_name";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member5_name_cb

  // ---------- Validate member5_phone
  function do_ajax_form_clients_steps_renew_mob_validate_member5_phone()
  {
    var nomeCampo_member5_phone = "member5_phone";
    var var_member5_phone = scAjaxGetFieldText(nomeCampo_member5_phone);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member5_phone(var_member5_phone, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member5_phone_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member5_phone

  function do_ajax_form_clients_steps_renew_mob_validate_member5_phone_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member5_phone";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member5_phone_cb

  // ---------- Validate member5_email
  function do_ajax_form_clients_steps_renew_mob_validate_member5_email()
  {
    var nomeCampo_member5_email = "member5_email";
    var var_member5_email = scAjaxGetFieldText(nomeCampo_member5_email);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member5_email(var_member5_email, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member5_email_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member5_email

  function do_ajax_form_clients_steps_renew_mob_validate_member5_email_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member5_email";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member5_email_cb

  // ---------- Validate member5_note
  function do_ajax_form_clients_steps_renew_mob_validate_member5_note()
  {
    var nomeCampo_member5_note = "member5_note";
    var var_member5_note = scAjaxGetFieldText(nomeCampo_member5_note);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member5_note(var_member5_note, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member5_note_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member5_note

  function do_ajax_form_clients_steps_renew_mob_validate_member5_note_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member5_note";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member5_note_cb

  // ---------- Validate member6_name
  function do_ajax_form_clients_steps_renew_mob_validate_member6_name()
  {
    var nomeCampo_member6_name = "member6_name";
    var var_member6_name = scAjaxGetFieldText(nomeCampo_member6_name);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member6_name(var_member6_name, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member6_name_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member6_name

  function do_ajax_form_clients_steps_renew_mob_validate_member6_name_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member6_name";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member6_name_cb

  // ---------- Validate member6_phone
  function do_ajax_form_clients_steps_renew_mob_validate_member6_phone()
  {
    var nomeCampo_member6_phone = "member6_phone";
    var var_member6_phone = scAjaxGetFieldText(nomeCampo_member6_phone);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member6_phone(var_member6_phone, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member6_phone_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member6_phone

  function do_ajax_form_clients_steps_renew_mob_validate_member6_phone_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member6_phone";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member6_phone_cb

  // ---------- Validate member6_email
  function do_ajax_form_clients_steps_renew_mob_validate_member6_email()
  {
    var nomeCampo_member6_email = "member6_email";
    var var_member6_email = scAjaxGetFieldText(nomeCampo_member6_email);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member6_email(var_member6_email, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member6_email_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member6_email

  function do_ajax_form_clients_steps_renew_mob_validate_member6_email_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member6_email";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member6_email_cb

  // ---------- Validate member6_note
  function do_ajax_form_clients_steps_renew_mob_validate_member6_note()
  {
    var nomeCampo_member6_note = "member6_note";
    var var_member6_note = scAjaxGetFieldText(nomeCampo_member6_note);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member6_note(var_member6_note, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member6_note_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member6_note

  function do_ajax_form_clients_steps_renew_mob_validate_member6_note_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member6_note";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member6_note_cb

  // ---------- Validate member7_name
  function do_ajax_form_clients_steps_renew_mob_validate_member7_name()
  {
    var nomeCampo_member7_name = "member7_name";
    var var_member7_name = scAjaxGetFieldText(nomeCampo_member7_name);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member7_name(var_member7_name, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member7_name_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member7_name

  function do_ajax_form_clients_steps_renew_mob_validate_member7_name_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member7_name";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member7_name_cb

  // ---------- Validate member7_phone
  function do_ajax_form_clients_steps_renew_mob_validate_member7_phone()
  {
    var nomeCampo_member7_phone = "member7_phone";
    var var_member7_phone = scAjaxGetFieldText(nomeCampo_member7_phone);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member7_phone(var_member7_phone, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member7_phone_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member7_phone

  function do_ajax_form_clients_steps_renew_mob_validate_member7_phone_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member7_phone";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member7_phone_cb

  // ---------- Validate member7_email
  function do_ajax_form_clients_steps_renew_mob_validate_member7_email()
  {
    var nomeCampo_member7_email = "member7_email";
    var var_member7_email = scAjaxGetFieldText(nomeCampo_member7_email);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member7_email(var_member7_email, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member7_email_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member7_email

  function do_ajax_form_clients_steps_renew_mob_validate_member7_email_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member7_email";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member7_email_cb

  // ---------- Validate member7_note
  function do_ajax_form_clients_steps_renew_mob_validate_member7_note()
  {
    var nomeCampo_member7_note = "member7_note";
    var var_member7_note = scAjaxGetFieldText(nomeCampo_member7_note);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member7_note(var_member7_note, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member7_note_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member7_note

  function do_ajax_form_clients_steps_renew_mob_validate_member7_note_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member7_note";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member7_note_cb

  // ---------- Validate member8_name
  function do_ajax_form_clients_steps_renew_mob_validate_member8_name()
  {
    var nomeCampo_member8_name = "member8_name";
    var var_member8_name = scAjaxGetFieldText(nomeCampo_member8_name);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member8_name(var_member8_name, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member8_name_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member8_name

  function do_ajax_form_clients_steps_renew_mob_validate_member8_name_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member8_name";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member8_name_cb

  // ---------- Validate member8_phone
  function do_ajax_form_clients_steps_renew_mob_validate_member8_phone()
  {
    var nomeCampo_member8_phone = "member8_phone";
    var var_member8_phone = scAjaxGetFieldText(nomeCampo_member8_phone);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member8_phone(var_member8_phone, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member8_phone_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member8_phone

  function do_ajax_form_clients_steps_renew_mob_validate_member8_phone_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member8_phone";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member8_phone_cb

  // ---------- Validate member8_email
  function do_ajax_form_clients_steps_renew_mob_validate_member8_email()
  {
    var nomeCampo_member8_email = "member8_email";
    var var_member8_email = scAjaxGetFieldText(nomeCampo_member8_email);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member8_email(var_member8_email, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member8_email_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member8_email

  function do_ajax_form_clients_steps_renew_mob_validate_member8_email_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member8_email";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member8_email_cb

  // ---------- Validate member8_note
  function do_ajax_form_clients_steps_renew_mob_validate_member8_note()
  {
    var nomeCampo_member8_note = "member8_note";
    var var_member8_note = scAjaxGetFieldText(nomeCampo_member8_note);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member8_note(var_member8_note, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member8_note_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member8_note

  function do_ajax_form_clients_steps_renew_mob_validate_member8_note_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member8_note";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member8_note_cb

  // ---------- Validate member9_name
  function do_ajax_form_clients_steps_renew_mob_validate_member9_name()
  {
    var nomeCampo_member9_name = "member9_name";
    var var_member9_name = scAjaxGetFieldText(nomeCampo_member9_name);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member9_name(var_member9_name, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member9_name_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member9_name

  function do_ajax_form_clients_steps_renew_mob_validate_member9_name_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member9_name";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member9_name_cb

  // ---------- Validate member9_phone
  function do_ajax_form_clients_steps_renew_mob_validate_member9_phone()
  {
    var nomeCampo_member9_phone = "member9_phone";
    var var_member9_phone = scAjaxGetFieldText(nomeCampo_member9_phone);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member9_phone(var_member9_phone, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member9_phone_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member9_phone

  function do_ajax_form_clients_steps_renew_mob_validate_member9_phone_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member9_phone";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member9_phone_cb

  // ---------- Validate member9_email
  function do_ajax_form_clients_steps_renew_mob_validate_member9_email()
  {
    var nomeCampo_member9_email = "member9_email";
    var var_member9_email = scAjaxGetFieldText(nomeCampo_member9_email);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member9_email(var_member9_email, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member9_email_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member9_email

  function do_ajax_form_clients_steps_renew_mob_validate_member9_email_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member9_email";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member9_email_cb

  // ---------- Validate member9_note
  function do_ajax_form_clients_steps_renew_mob_validate_member9_note()
  {
    var nomeCampo_member9_note = "member9_note";
    var var_member9_note = scAjaxGetFieldText(nomeCampo_member9_note);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member9_note(var_member9_note, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member9_note_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member9_note

  function do_ajax_form_clients_steps_renew_mob_validate_member9_note_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member9_note";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member9_note_cb

  // ---------- Validate member10_name
  function do_ajax_form_clients_steps_renew_mob_validate_member10_name()
  {
    var nomeCampo_member10_name = "member10_name";
    var var_member10_name = scAjaxGetFieldText(nomeCampo_member10_name);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member10_name(var_member10_name, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member10_name_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member10_name

  function do_ajax_form_clients_steps_renew_mob_validate_member10_name_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member10_name";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member10_name_cb

  // ---------- Validate member10_phone
  function do_ajax_form_clients_steps_renew_mob_validate_member10_phone()
  {
    var nomeCampo_member10_phone = "member10_phone";
    var var_member10_phone = scAjaxGetFieldText(nomeCampo_member10_phone);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member10_phone(var_member10_phone, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member10_phone_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member10_phone

  function do_ajax_form_clients_steps_renew_mob_validate_member10_phone_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member10_phone";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member10_phone_cb

  // ---------- Validate member10_email
  function do_ajax_form_clients_steps_renew_mob_validate_member10_email()
  {
    var nomeCampo_member10_email = "member10_email";
    var var_member10_email = scAjaxGetFieldText(nomeCampo_member10_email);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member10_email(var_member10_email, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member10_email_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member10_email

  function do_ajax_form_clients_steps_renew_mob_validate_member10_email_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member10_email";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member10_email_cb

  // ---------- Validate member10_note
  function do_ajax_form_clients_steps_renew_mob_validate_member10_note()
  {
    var nomeCampo_member10_note = "member10_note";
    var var_member10_note = scAjaxGetFieldText(nomeCampo_member10_note);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_member10_note(var_member10_note, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_member10_note_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_member10_note

  function do_ajax_form_clients_steps_renew_mob_validate_member10_note_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "member10_note";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_member10_note_cb

  // ---------- Validate dummy06
  function do_ajax_form_clients_steps_renew_mob_validate_dummy06()
  {
  } // do_ajax_form_clients_steps_renew_mob_validate_dummy06

  function do_ajax_form_clients_steps_renew_mob_validate_dummy06_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "dummy06";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_dummy06_cb

  // ---------- Validate xlsx_sample
  function do_ajax_form_clients_steps_renew_mob_validate_xlsx_sample()
  {
    var nomeCampo_xlsx_sample = "xlsx_sample";
    var var_xlsx_sample = scAjaxGetFieldText(nomeCampo_xlsx_sample);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_xlsx_sample(var_xlsx_sample, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_xlsx_sample_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_xlsx_sample

  function do_ajax_form_clients_steps_renew_mob_validate_xlsx_sample_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "xlsx_sample";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_xlsx_sample_cb

  // ---------- Validate more_buyers_xlsx
  function do_ajax_form_clients_steps_renew_mob_validate_more_buyers_xlsx()
  {
    var nomeCampo_more_buyers_xlsx = "more_buyers_xlsx";
    var var_more_buyers_xlsx = scAjaxGetFieldText(nomeCampo_more_buyers_xlsx);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_more_buyers_xlsx(var_more_buyers_xlsx, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_more_buyers_xlsx_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_more_buyers_xlsx

  function do_ajax_form_clients_steps_renew_mob_validate_more_buyers_xlsx_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "more_buyers_xlsx";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_more_buyers_xlsx_cb

  // ---------- Validate buyers_excel_qty
  function do_ajax_form_clients_steps_renew_mob_validate_buyers_excel_qty()
  {
    var nomeCampo_buyers_excel_qty = "buyers_excel_qty";
    var var_buyers_excel_qty = scAjaxGetFieldText(nomeCampo_buyers_excel_qty);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_buyers_excel_qty(var_buyers_excel_qty, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_buyers_excel_qty_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_buyers_excel_qty

  function do_ajax_form_clients_steps_renew_mob_validate_buyers_excel_qty_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "buyers_excel_qty";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_buyers_excel_qty_cb

  // ---------- Validate dummy09
  function do_ajax_form_clients_steps_renew_mob_validate_dummy09()
  {
  } // do_ajax_form_clients_steps_renew_mob_validate_dummy09

  function do_ajax_form_clients_steps_renew_mob_validate_dummy09_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "dummy09";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_dummy09_cb

  // ---------- Validate dummy11
  function do_ajax_form_clients_steps_renew_mob_validate_dummy11()
  {
  } // do_ajax_form_clients_steps_renew_mob_validate_dummy11

  function do_ajax_form_clients_steps_renew_mob_validate_dummy11_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "dummy11";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_dummy11_cb

  // ---------- Validate rules
  function do_ajax_form_clients_steps_renew_mob_validate_rules()
  {
  } // do_ajax_form_clients_steps_renew_mob_validate_rules

  function do_ajax_form_clients_steps_renew_mob_validate_rules_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rules";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_rules_cb

  // ---------- Validate rules_warn
  function do_ajax_form_clients_steps_renew_mob_validate_rules_warn()
  {
    var nomeCampo_rules_warn = "rules_warn";
    var var_rules_warn = scAjaxGetFieldText(nomeCampo_rules_warn);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_rules_warn(var_rules_warn, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_rules_warn_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_rules_warn

  function do_ajax_form_clients_steps_renew_mob_validate_rules_warn_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "rules_warn";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_rules_warn_cb

  // ---------- Validate memb_levels
  function do_ajax_form_clients_steps_renew_mob_validate_memb_levels()
  {
  } // do_ajax_form_clients_steps_renew_mob_validate_memb_levels

  function do_ajax_form_clients_steps_renew_mob_validate_memb_levels_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "memb_levels";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_memb_levels_cb

  // ---------- Validate est_memb_cost
  function do_ajax_form_clients_steps_renew_mob_validate_est_memb_cost()
  {
  } // do_ajax_form_clients_steps_renew_mob_validate_est_memb_cost

  function do_ajax_form_clients_steps_renew_mob_validate_est_memb_cost_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "est_memb_cost";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_est_memb_cost_cb

  // ---------- Validate pay
  function do_ajax_form_clients_steps_renew_mob_validate_pay()
  {
    var nomeCampo_pay = "pay";
    var var_pay = scAjaxGetFieldText(nomeCampo_pay);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_pay(var_pay, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_pay_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_pay

  function do_ajax_form_clients_steps_renew_mob_validate_pay_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "pay";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_pay_cb

  // ---------- Validate read_at_sign
  function do_ajax_form_clients_steps_renew_mob_validate_read_at_sign()
  {
  } // do_ajax_form_clients_steps_renew_mob_validate_read_at_sign

  function do_ajax_form_clients_steps_renew_mob_validate_read_at_sign_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "read_at_sign";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_read_at_sign_cb

  // ---------- Validate applicant_name
  function do_ajax_form_clients_steps_renew_mob_validate_applicant_name()
  {
    var nomeCampo_applicant_name = "applicant_name";
    var var_applicant_name = scAjaxGetFieldText(nomeCampo_applicant_name);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_applicant_name(var_applicant_name, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_applicant_name_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_applicant_name

  function do_ajax_form_clients_steps_renew_mob_validate_applicant_name_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "applicant_name";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_applicant_name_cb

  // ---------- Validate applicant_title
  function do_ajax_form_clients_steps_renew_mob_validate_applicant_title()
  {
    var nomeCampo_applicant_title = "applicant_title";
    var var_applicant_title = scAjaxGetFieldText(nomeCampo_applicant_title);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_applicant_title(var_applicant_title, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_applicant_title_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_applicant_title

  function do_ajax_form_clients_steps_renew_mob_validate_applicant_title_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "applicant_title";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_applicant_title_cb

  // ---------- Validate dummy10
  function do_ajax_form_clients_steps_renew_mob_validate_dummy10()
  {
  } // do_ajax_form_clients_steps_renew_mob_validate_dummy10

  function do_ajax_form_clients_steps_renew_mob_validate_dummy10_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "dummy10";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_dummy10_cb

  // ---------- Validate applicant_signature
  function do_ajax_form_clients_steps_renew_mob_validate_applicant_signature()
  {
    var nomeCampo_applicant_signature = "applicant_signature";
    var var_applicant_signature = scAjaxGetFieldSignature(nomeCampo_applicant_signature);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_clients_steps_renew_mob_validate_applicant_signature(var_applicant_signature, var_script_case_init, do_ajax_form_clients_steps_renew_mob_validate_applicant_signature_cb);
  } // do_ajax_form_clients_steps_renew_mob_validate_applicant_signature

  function do_ajax_form_clients_steps_renew_mob_validate_applicant_signature_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "applicant_signature";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_validate_applicant_signature_cb

  // ---------- Refresh bus_cat_id
  function do_ajax_form_clients_steps_renew_mob_refresh_bus_cat_id()
  {
    var var_bus_cat_id = scAjaxGetFieldSelect("bus_cat_id");
    var var_nmgp_refresh_fields = "bus_subcat_id";
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_form_clients_steps_renew_mob_refresh_bus_cat_id(var_bus_cat_id, var_nmgp_refresh_fields, var_script_case_init, do_ajax_form_clients_steps_renew_mob_refresh_bus_cat_id_cb);
  } // do_ajax_form_clients_steps_renew_mob_refresh_bus_cat_id

  function do_ajax_form_clients_steps_renew_mob_refresh_bus_cat_id_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    scAjaxSetFields(false);
    scAjaxSetVariables();
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_clients_steps_renew_mob_refresh_bus_cat_id_cb

  // ---------- Event onchange bus_cat_id
  function do_ajax_form_clients_steps_renew_mob_event_bus_cat_id_onchange()
  {
    var var_bus_cat_id = scAjaxGetFieldSelect("bus_cat_id");
    var var_member1_name = scAjaxGetFieldText("member1_name");
    var var_member2_name = scAjaxGetFieldText("member2_name");
    var var_member3_name = scAjaxGetFieldText("member3_name");
    var var_member4_name = scAjaxGetFieldText("member4_name");
    var var_member5_name = scAjaxGetFieldText("member5_name");
    var var_member6_name = scAjaxGetFieldText("member6_name");
    var var_member7_name = scAjaxGetFieldText("member7_name");
    var var_member8_name = scAjaxGetFieldText("member8_name");
    var var_member9_name = scAjaxGetFieldText("member9_name");
    var var_member10_name = scAjaxGetFieldText("member10_name");
    var var_buyers_excel_qty = scAjaxGetFieldText("buyers_excel_qty");
    var var_bus_subcat_id = scAjaxGetFieldSelect("bus_subcat_id");
    var var_est_memb_cost = scAjaxGetFieldHidden("est_memb_cost");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_form_clients_steps_renew_mob_event_bus_cat_id_onchange(var_bus_cat_id, var_member1_name, var_member2_name, var_member3_name, var_member4_name, var_member5_name, var_member6_name, var_member7_name, var_member8_name, var_member9_name, var_member10_name, var_buyers_excel_qty, var_bus_subcat_id, var_est_memb_cost, var_script_case_init, do_ajax_form_clients_steps_renew_mob_event_bus_cat_id_onchange_cb);
  } // do_ajax_form_clients_steps_renew_mob_event_bus_cat_id_onchange

  function do_ajax_form_clients_steps_renew_mob_event_bus_cat_id_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "bus_cat_id";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
      scAjaxSetVariables();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scBtnDisabled();
    scBtnLabel();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert(do_ajax_form_clients_steps_renew_mob_event_bus_cat_id_onchange_cb_after_alert);
  } // do_ajax_form_clients_steps_renew_mob_event_bus_cat_id_onchange_cb
  function do_ajax_form_clients_steps_renew_mob_event_bus_cat_id_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    do_ajax_form_clients_steps_renew_mob_refresh_bus_cat_id();
    scAjaxRedir();
  } // do_ajax_form_clients_steps_renew_mob_event_bus_cat_id_onchange_cb_after_alert

  // ---------- Event onchange bus_subcat_id
  function do_ajax_form_clients_steps_renew_mob_event_bus_subcat_id_onchange()
  {
    var var_member1_name = scAjaxGetFieldText("member1_name");
    var var_member2_name = scAjaxGetFieldText("member2_name");
    var var_member3_name = scAjaxGetFieldText("member3_name");
    var var_member4_name = scAjaxGetFieldText("member4_name");
    var var_member5_name = scAjaxGetFieldText("member5_name");
    var var_member6_name = scAjaxGetFieldText("member6_name");
    var var_member7_name = scAjaxGetFieldText("member7_name");
    var var_member8_name = scAjaxGetFieldText("member8_name");
    var var_member9_name = scAjaxGetFieldText("member9_name");
    var var_member10_name = scAjaxGetFieldText("member10_name");
    var var_buyers_excel_qty = scAjaxGetFieldText("buyers_excel_qty");
    var var_bus_cat_id = scAjaxGetFieldSelect("bus_cat_id");
    var var_bus_subcat_id = scAjaxGetFieldSelect("bus_subcat_id");
    var var_est_memb_cost = scAjaxGetFieldHidden("est_memb_cost");
    var var_bus_subcat_other = scAjaxGetFieldText("bus_subcat_other");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_form_clients_steps_renew_mob_event_bus_subcat_id_onchange(var_member1_name, var_member2_name, var_member3_name, var_member4_name, var_member5_name, var_member6_name, var_member7_name, var_member8_name, var_member9_name, var_member10_name, var_buyers_excel_qty, var_bus_cat_id, var_bus_subcat_id, var_est_memb_cost, var_bus_subcat_other, var_script_case_init, do_ajax_form_clients_steps_renew_mob_event_bus_subcat_id_onchange_cb);
  } // do_ajax_form_clients_steps_renew_mob_event_bus_subcat_id_onchange

  function do_ajax_form_clients_steps_renew_mob_event_bus_subcat_id_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "bus_subcat_id";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
      scAjaxSetVariables();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scBtnDisabled();
    scBtnLabel();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert(do_ajax_form_clients_steps_renew_mob_event_bus_subcat_id_onchange_cb_after_alert);
  } // do_ajax_form_clients_steps_renew_mob_event_bus_subcat_id_onchange_cb
  function do_ajax_form_clients_steps_renew_mob_event_bus_subcat_id_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_form_clients_steps_renew_mob_event_bus_subcat_id_onchange_cb_after_alert

  // ---------- Event onchange buyers_excel_qty
  function do_ajax_form_clients_steps_renew_mob_event_buyers_excel_qty_onchange()
  {
    var var_member1_name = scAjaxGetFieldText("member1_name");
    var var_member2_name = scAjaxGetFieldText("member2_name");
    var var_member3_name = scAjaxGetFieldText("member3_name");
    var var_member4_name = scAjaxGetFieldText("member4_name");
    var var_member5_name = scAjaxGetFieldText("member5_name");
    var var_member6_name = scAjaxGetFieldText("member6_name");
    var var_member7_name = scAjaxGetFieldText("member7_name");
    var var_member8_name = scAjaxGetFieldText("member8_name");
    var var_member9_name = scAjaxGetFieldText("member9_name");
    var var_member10_name = scAjaxGetFieldText("member10_name");
    var var_buyers_excel_qty = scAjaxGetFieldText("buyers_excel_qty");
    var var_bus_cat_id = scAjaxGetFieldSelect("bus_cat_id");
    var var_bus_subcat_id = scAjaxGetFieldSelect("bus_subcat_id");
    var var_est_memb_cost = scAjaxGetFieldHidden("est_memb_cost");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_form_clients_steps_renew_mob_event_buyers_excel_qty_onchange(var_member1_name, var_member2_name, var_member3_name, var_member4_name, var_member5_name, var_member6_name, var_member7_name, var_member8_name, var_member9_name, var_member10_name, var_buyers_excel_qty, var_bus_cat_id, var_bus_subcat_id, var_est_memb_cost, var_script_case_init, do_ajax_form_clients_steps_renew_mob_event_buyers_excel_qty_onchange_cb);
  } // do_ajax_form_clients_steps_renew_mob_event_buyers_excel_qty_onchange

  function do_ajax_form_clients_steps_renew_mob_event_buyers_excel_qty_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "buyers_excel_qty";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
      scAjaxSetVariables();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scBtnDisabled();
    scBtnLabel();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert(do_ajax_form_clients_steps_renew_mob_event_buyers_excel_qty_onchange_cb_after_alert);
  } // do_ajax_form_clients_steps_renew_mob_event_buyers_excel_qty_onchange_cb
  function do_ajax_form_clients_steps_renew_mob_event_buyers_excel_qty_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_form_clients_steps_renew_mob_event_buyers_excel_qty_onchange_cb_after_alert

  // ---------- Event onchange main_contact_email
  function do_ajax_form_clients_steps_renew_mob_event_main_contact_email_onchange()
  {
    var var_member1_email = scAjaxGetFieldText("member1_email");
    var var_main_contact_email = scAjaxGetFieldText("main_contact_email");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_form_clients_steps_renew_mob_event_main_contact_email_onchange(var_member1_email, var_main_contact_email, var_script_case_init, do_ajax_form_clients_steps_renew_mob_event_main_contact_email_onchange_cb);
  } // do_ajax_form_clients_steps_renew_mob_event_main_contact_email_onchange

  function do_ajax_form_clients_steps_renew_mob_event_main_contact_email_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "main_contact_email";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
      scAjaxSetVariables();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scBtnDisabled();
    scBtnLabel();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert(do_ajax_form_clients_steps_renew_mob_event_main_contact_email_onchange_cb_after_alert);
  } // do_ajax_form_clients_steps_renew_mob_event_main_contact_email_onchange_cb
  function do_ajax_form_clients_steps_renew_mob_event_main_contact_email_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_form_clients_steps_renew_mob_event_main_contact_email_onchange_cb_after_alert

  // ---------- Event onchange main_contact_name
  function do_ajax_form_clients_steps_renew_mob_event_main_contact_name_onchange()
  {
    var var_member1_name = scAjaxGetFieldText("member1_name");
    var var_main_contact_name = scAjaxGetFieldText("main_contact_name");
    var var_applicant_name = scAjaxGetFieldText("applicant_name");
    var var_member2_name = scAjaxGetFieldText("member2_name");
    var var_member3_name = scAjaxGetFieldText("member3_name");
    var var_member4_name = scAjaxGetFieldText("member4_name");
    var var_member5_name = scAjaxGetFieldText("member5_name");
    var var_member6_name = scAjaxGetFieldText("member6_name");
    var var_member7_name = scAjaxGetFieldText("member7_name");
    var var_member8_name = scAjaxGetFieldText("member8_name");
    var var_member9_name = scAjaxGetFieldText("member9_name");
    var var_member10_name = scAjaxGetFieldText("member10_name");
    var var_buyers_excel_qty = scAjaxGetFieldText("buyers_excel_qty");
    var var_bus_cat_id = scAjaxGetFieldSelect("bus_cat_id");
    var var_bus_subcat_id = scAjaxGetFieldSelect("bus_subcat_id");
    var var_est_memb_cost = scAjaxGetFieldHidden("est_memb_cost");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_form_clients_steps_renew_mob_event_main_contact_name_onchange(var_member1_name, var_main_contact_name, var_applicant_name, var_member2_name, var_member3_name, var_member4_name, var_member5_name, var_member6_name, var_member7_name, var_member8_name, var_member9_name, var_member10_name, var_buyers_excel_qty, var_bus_cat_id, var_bus_subcat_id, var_est_memb_cost, var_script_case_init, do_ajax_form_clients_steps_renew_mob_event_main_contact_name_onchange_cb);
  } // do_ajax_form_clients_steps_renew_mob_event_main_contact_name_onchange

  function do_ajax_form_clients_steps_renew_mob_event_main_contact_name_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "main_contact_name";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
      scAjaxSetVariables();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scBtnDisabled();
    scBtnLabel();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert(do_ajax_form_clients_steps_renew_mob_event_main_contact_name_onchange_cb_after_alert);
  } // do_ajax_form_clients_steps_renew_mob_event_main_contact_name_onchange_cb
  function do_ajax_form_clients_steps_renew_mob_event_main_contact_name_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_form_clients_steps_renew_mob_event_main_contact_name_onchange_cb_after_alert

  // ---------- Event onchange main_contact_phone
  function do_ajax_form_clients_steps_renew_mob_event_main_contact_phone_onchange()
  {
    var var_member1_phone = scAjaxGetFieldText("member1_phone");
    var var_main_contact_phone = scAjaxGetFieldText("main_contact_phone");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_form_clients_steps_renew_mob_event_main_contact_phone_onchange(var_member1_phone, var_main_contact_phone, var_script_case_init, do_ajax_form_clients_steps_renew_mob_event_main_contact_phone_onchange_cb);
  } // do_ajax_form_clients_steps_renew_mob_event_main_contact_phone_onchange

  function do_ajax_form_clients_steps_renew_mob_event_main_contact_phone_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "main_contact_phone";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
      scAjaxSetVariables();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scBtnDisabled();
    scBtnLabel();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert(do_ajax_form_clients_steps_renew_mob_event_main_contact_phone_onchange_cb_after_alert);
  } // do_ajax_form_clients_steps_renew_mob_event_main_contact_phone_onchange_cb
  function do_ajax_form_clients_steps_renew_mob_event_main_contact_phone_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_form_clients_steps_renew_mob_event_main_contact_phone_onchange_cb_after_alert

  // ---------- Event onchange main_contact_title
  function do_ajax_form_clients_steps_renew_mob_event_main_contact_title_onchange()
  {
    var var_applicant_title = scAjaxGetFieldText("applicant_title");
    var var_main_contact_title = scAjaxGetFieldText("main_contact_title");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_form_clients_steps_renew_mob_event_main_contact_title_onchange(var_applicant_title, var_main_contact_title, var_script_case_init, do_ajax_form_clients_steps_renew_mob_event_main_contact_title_onchange_cb);
  } // do_ajax_form_clients_steps_renew_mob_event_main_contact_title_onchange

  function do_ajax_form_clients_steps_renew_mob_event_main_contact_title_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "main_contact_title";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
      scAjaxSetVariables();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scBtnDisabled();
    scBtnLabel();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert(do_ajax_form_clients_steps_renew_mob_event_main_contact_title_onchange_cb_after_alert);
  } // do_ajax_form_clients_steps_renew_mob_event_main_contact_title_onchange_cb
  function do_ajax_form_clients_steps_renew_mob_event_main_contact_title_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_form_clients_steps_renew_mob_event_main_contact_title_onchange_cb_after_alert

  // ---------- Event onchange member10_name
  function do_ajax_form_clients_steps_renew_mob_event_member10_name_onchange()
  {
    var var_member1_name = scAjaxGetFieldText("member1_name");
    var var_member2_name = scAjaxGetFieldText("member2_name");
    var var_member3_name = scAjaxGetFieldText("member3_name");
    var var_member4_name = scAjaxGetFieldText("member4_name");
    var var_member5_name = scAjaxGetFieldText("member5_name");
    var var_member6_name = scAjaxGetFieldText("member6_name");
    var var_member7_name = scAjaxGetFieldText("member7_name");
    var var_member8_name = scAjaxGetFieldText("member8_name");
    var var_member9_name = scAjaxGetFieldText("member9_name");
    var var_member10_name = scAjaxGetFieldText("member10_name");
    var var_buyers_excel_qty = scAjaxGetFieldText("buyers_excel_qty");
    var var_bus_cat_id = scAjaxGetFieldSelect("bus_cat_id");
    var var_bus_subcat_id = scAjaxGetFieldSelect("bus_subcat_id");
    var var_est_memb_cost = scAjaxGetFieldHidden("est_memb_cost");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_form_clients_steps_renew_mob_event_member10_name_onchange(var_member1_name, var_member2_name, var_member3_name, var_member4_name, var_member5_name, var_member6_name, var_member7_name, var_member8_name, var_member9_name, var_member10_name, var_buyers_excel_qty, var_bus_cat_id, var_bus_subcat_id, var_est_memb_cost, var_script_case_init, do_ajax_form_clients_steps_renew_mob_event_member10_name_onchange_cb);
  } // do_ajax_form_clients_steps_renew_mob_event_member10_name_onchange

  function do_ajax_form_clients_steps_renew_mob_event_member10_name_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "member10_name";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
      scAjaxSetVariables();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scBtnDisabled();
    scBtnLabel();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert(do_ajax_form_clients_steps_renew_mob_event_member10_name_onchange_cb_after_alert);
  } // do_ajax_form_clients_steps_renew_mob_event_member10_name_onchange_cb
  function do_ajax_form_clients_steps_renew_mob_event_member10_name_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_form_clients_steps_renew_mob_event_member10_name_onchange_cb_after_alert

  // ---------- Event onchange member1_name
  function do_ajax_form_clients_steps_renew_mob_event_member1_name_onchange()
  {
    var var_est_memb_cost = scAjaxGetFieldHidden("est_memb_cost");
    var var_member1_name = scAjaxGetFieldText("member1_name");
    var var_member2_name = scAjaxGetFieldText("member2_name");
    var var_member3_name = scAjaxGetFieldText("member3_name");
    var var_member4_name = scAjaxGetFieldText("member4_name");
    var var_member5_name = scAjaxGetFieldText("member5_name");
    var var_member6_name = scAjaxGetFieldText("member6_name");
    var var_member7_name = scAjaxGetFieldText("member7_name");
    var var_member8_name = scAjaxGetFieldText("member8_name");
    var var_member9_name = scAjaxGetFieldText("member9_name");
    var var_member10_name = scAjaxGetFieldText("member10_name");
    var var_buyers_excel_qty = scAjaxGetFieldText("buyers_excel_qty");
    var var_bus_cat_id = scAjaxGetFieldSelect("bus_cat_id");
    var var_bus_subcat_id = scAjaxGetFieldSelect("bus_subcat_id");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_form_clients_steps_renew_mob_event_member1_name_onchange(var_est_memb_cost, var_member1_name, var_member2_name, var_member3_name, var_member4_name, var_member5_name, var_member6_name, var_member7_name, var_member8_name, var_member9_name, var_member10_name, var_buyers_excel_qty, var_bus_cat_id, var_bus_subcat_id, var_script_case_init, do_ajax_form_clients_steps_renew_mob_event_member1_name_onchange_cb);
  } // do_ajax_form_clients_steps_renew_mob_event_member1_name_onchange

  function do_ajax_form_clients_steps_renew_mob_event_member1_name_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "member1_name";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
      scAjaxSetVariables();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scBtnDisabled();
    scBtnLabel();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert(do_ajax_form_clients_steps_renew_mob_event_member1_name_onchange_cb_after_alert);
  } // do_ajax_form_clients_steps_renew_mob_event_member1_name_onchange_cb
  function do_ajax_form_clients_steps_renew_mob_event_member1_name_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_form_clients_steps_renew_mob_event_member1_name_onchange_cb_after_alert

  // ---------- Event onchange member2_name
  function do_ajax_form_clients_steps_renew_mob_event_member2_name_onchange()
  {
    var var_est_memb_cost = scAjaxGetFieldHidden("est_memb_cost");
    var var_member1_name = scAjaxGetFieldText("member1_name");
    var var_member2_name = scAjaxGetFieldText("member2_name");
    var var_member3_name = scAjaxGetFieldText("member3_name");
    var var_member4_name = scAjaxGetFieldText("member4_name");
    var var_member5_name = scAjaxGetFieldText("member5_name");
    var var_member6_name = scAjaxGetFieldText("member6_name");
    var var_member7_name = scAjaxGetFieldText("member7_name");
    var var_member8_name = scAjaxGetFieldText("member8_name");
    var var_member9_name = scAjaxGetFieldText("member9_name");
    var var_member10_name = scAjaxGetFieldText("member10_name");
    var var_buyers_excel_qty = scAjaxGetFieldText("buyers_excel_qty");
    var var_bus_cat_id = scAjaxGetFieldSelect("bus_cat_id");
    var var_bus_subcat_id = scAjaxGetFieldSelect("bus_subcat_id");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_form_clients_steps_renew_mob_event_member2_name_onchange(var_est_memb_cost, var_member1_name, var_member2_name, var_member3_name, var_member4_name, var_member5_name, var_member6_name, var_member7_name, var_member8_name, var_member9_name, var_member10_name, var_buyers_excel_qty, var_bus_cat_id, var_bus_subcat_id, var_script_case_init, do_ajax_form_clients_steps_renew_mob_event_member2_name_onchange_cb);
  } // do_ajax_form_clients_steps_renew_mob_event_member2_name_onchange

  function do_ajax_form_clients_steps_renew_mob_event_member2_name_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "member2_name";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
      scAjaxSetVariables();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scBtnDisabled();
    scBtnLabel();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert(do_ajax_form_clients_steps_renew_mob_event_member2_name_onchange_cb_after_alert);
  } // do_ajax_form_clients_steps_renew_mob_event_member2_name_onchange_cb
  function do_ajax_form_clients_steps_renew_mob_event_member2_name_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_form_clients_steps_renew_mob_event_member2_name_onchange_cb_after_alert

  // ---------- Event onchange member3_name
  function do_ajax_form_clients_steps_renew_mob_event_member3_name_onchange()
  {
    var var_member1_name = scAjaxGetFieldText("member1_name");
    var var_member2_name = scAjaxGetFieldText("member2_name");
    var var_member3_name = scAjaxGetFieldText("member3_name");
    var var_member4_name = scAjaxGetFieldText("member4_name");
    var var_member5_name = scAjaxGetFieldText("member5_name");
    var var_member6_name = scAjaxGetFieldText("member6_name");
    var var_member7_name = scAjaxGetFieldText("member7_name");
    var var_member8_name = scAjaxGetFieldText("member8_name");
    var var_member9_name = scAjaxGetFieldText("member9_name");
    var var_member10_name = scAjaxGetFieldText("member10_name");
    var var_buyers_excel_qty = scAjaxGetFieldText("buyers_excel_qty");
    var var_bus_cat_id = scAjaxGetFieldSelect("bus_cat_id");
    var var_bus_subcat_id = scAjaxGetFieldSelect("bus_subcat_id");
    var var_est_memb_cost = scAjaxGetFieldHidden("est_memb_cost");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_form_clients_steps_renew_mob_event_member3_name_onchange(var_member1_name, var_member2_name, var_member3_name, var_member4_name, var_member5_name, var_member6_name, var_member7_name, var_member8_name, var_member9_name, var_member10_name, var_buyers_excel_qty, var_bus_cat_id, var_bus_subcat_id, var_est_memb_cost, var_script_case_init, do_ajax_form_clients_steps_renew_mob_event_member3_name_onchange_cb);
  } // do_ajax_form_clients_steps_renew_mob_event_member3_name_onchange

  function do_ajax_form_clients_steps_renew_mob_event_member3_name_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "member3_name";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
      scAjaxSetVariables();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scBtnDisabled();
    scBtnLabel();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert(do_ajax_form_clients_steps_renew_mob_event_member3_name_onchange_cb_after_alert);
  } // do_ajax_form_clients_steps_renew_mob_event_member3_name_onchange_cb
  function do_ajax_form_clients_steps_renew_mob_event_member3_name_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_form_clients_steps_renew_mob_event_member3_name_onchange_cb_after_alert

  // ---------- Event onchange member4_name
  function do_ajax_form_clients_steps_renew_mob_event_member4_name_onchange()
  {
    var var_member1_name = scAjaxGetFieldText("member1_name");
    var var_member2_name = scAjaxGetFieldText("member2_name");
    var var_member3_name = scAjaxGetFieldText("member3_name");
    var var_member4_name = scAjaxGetFieldText("member4_name");
    var var_member5_name = scAjaxGetFieldText("member5_name");
    var var_member6_name = scAjaxGetFieldText("member6_name");
    var var_member7_name = scAjaxGetFieldText("member7_name");
    var var_member8_name = scAjaxGetFieldText("member8_name");
    var var_member9_name = scAjaxGetFieldText("member9_name");
    var var_member10_name = scAjaxGetFieldText("member10_name");
    var var_buyers_excel_qty = scAjaxGetFieldText("buyers_excel_qty");
    var var_bus_cat_id = scAjaxGetFieldSelect("bus_cat_id");
    var var_bus_subcat_id = scAjaxGetFieldSelect("bus_subcat_id");
    var var_est_memb_cost = scAjaxGetFieldHidden("est_memb_cost");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_form_clients_steps_renew_mob_event_member4_name_onchange(var_member1_name, var_member2_name, var_member3_name, var_member4_name, var_member5_name, var_member6_name, var_member7_name, var_member8_name, var_member9_name, var_member10_name, var_buyers_excel_qty, var_bus_cat_id, var_bus_subcat_id, var_est_memb_cost, var_script_case_init, do_ajax_form_clients_steps_renew_mob_event_member4_name_onchange_cb);
  } // do_ajax_form_clients_steps_renew_mob_event_member4_name_onchange

  function do_ajax_form_clients_steps_renew_mob_event_member4_name_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "member4_name";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
      scAjaxSetVariables();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scBtnDisabled();
    scBtnLabel();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert(do_ajax_form_clients_steps_renew_mob_event_member4_name_onchange_cb_after_alert);
  } // do_ajax_form_clients_steps_renew_mob_event_member4_name_onchange_cb
  function do_ajax_form_clients_steps_renew_mob_event_member4_name_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_form_clients_steps_renew_mob_event_member4_name_onchange_cb_after_alert

  // ---------- Event onchange member5_name
  function do_ajax_form_clients_steps_renew_mob_event_member5_name_onchange()
  {
    var var_member1_name = scAjaxGetFieldText("member1_name");
    var var_member2_name = scAjaxGetFieldText("member2_name");
    var var_member3_name = scAjaxGetFieldText("member3_name");
    var var_member4_name = scAjaxGetFieldText("member4_name");
    var var_member5_name = scAjaxGetFieldText("member5_name");
    var var_member6_name = scAjaxGetFieldText("member6_name");
    var var_member7_name = scAjaxGetFieldText("member7_name");
    var var_member8_name = scAjaxGetFieldText("member8_name");
    var var_member9_name = scAjaxGetFieldText("member9_name");
    var var_member10_name = scAjaxGetFieldText("member10_name");
    var var_buyers_excel_qty = scAjaxGetFieldText("buyers_excel_qty");
    var var_bus_cat_id = scAjaxGetFieldSelect("bus_cat_id");
    var var_bus_subcat_id = scAjaxGetFieldSelect("bus_subcat_id");
    var var_est_memb_cost = scAjaxGetFieldHidden("est_memb_cost");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_form_clients_steps_renew_mob_event_member5_name_onchange(var_member1_name, var_member2_name, var_member3_name, var_member4_name, var_member5_name, var_member6_name, var_member7_name, var_member8_name, var_member9_name, var_member10_name, var_buyers_excel_qty, var_bus_cat_id, var_bus_subcat_id, var_est_memb_cost, var_script_case_init, do_ajax_form_clients_steps_renew_mob_event_member5_name_onchange_cb);
  } // do_ajax_form_clients_steps_renew_mob_event_member5_name_onchange

  function do_ajax_form_clients_steps_renew_mob_event_member5_name_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "member5_name";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
      scAjaxSetVariables();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scBtnDisabled();
    scBtnLabel();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert(do_ajax_form_clients_steps_renew_mob_event_member5_name_onchange_cb_after_alert);
  } // do_ajax_form_clients_steps_renew_mob_event_member5_name_onchange_cb
  function do_ajax_form_clients_steps_renew_mob_event_member5_name_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_form_clients_steps_renew_mob_event_member5_name_onchange_cb_after_alert

  // ---------- Event onchange member6_name
  function do_ajax_form_clients_steps_renew_mob_event_member6_name_onchange()
  {
    var var_member1_name = scAjaxGetFieldText("member1_name");
    var var_member2_name = scAjaxGetFieldText("member2_name");
    var var_member3_name = scAjaxGetFieldText("member3_name");
    var var_member4_name = scAjaxGetFieldText("member4_name");
    var var_member5_name = scAjaxGetFieldText("member5_name");
    var var_member6_name = scAjaxGetFieldText("member6_name");
    var var_member7_name = scAjaxGetFieldText("member7_name");
    var var_member8_name = scAjaxGetFieldText("member8_name");
    var var_member9_name = scAjaxGetFieldText("member9_name");
    var var_member10_name = scAjaxGetFieldText("member10_name");
    var var_buyers_excel_qty = scAjaxGetFieldText("buyers_excel_qty");
    var var_bus_cat_id = scAjaxGetFieldSelect("bus_cat_id");
    var var_bus_subcat_id = scAjaxGetFieldSelect("bus_subcat_id");
    var var_est_memb_cost = scAjaxGetFieldHidden("est_memb_cost");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_form_clients_steps_renew_mob_event_member6_name_onchange(var_member1_name, var_member2_name, var_member3_name, var_member4_name, var_member5_name, var_member6_name, var_member7_name, var_member8_name, var_member9_name, var_member10_name, var_buyers_excel_qty, var_bus_cat_id, var_bus_subcat_id, var_est_memb_cost, var_script_case_init, do_ajax_form_clients_steps_renew_mob_event_member6_name_onchange_cb);
  } // do_ajax_form_clients_steps_renew_mob_event_member6_name_onchange

  function do_ajax_form_clients_steps_renew_mob_event_member6_name_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "member6_name";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
      scAjaxSetVariables();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scBtnDisabled();
    scBtnLabel();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert(do_ajax_form_clients_steps_renew_mob_event_member6_name_onchange_cb_after_alert);
  } // do_ajax_form_clients_steps_renew_mob_event_member6_name_onchange_cb
  function do_ajax_form_clients_steps_renew_mob_event_member6_name_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_form_clients_steps_renew_mob_event_member6_name_onchange_cb_after_alert

  // ---------- Event onchange member7_name
  function do_ajax_form_clients_steps_renew_mob_event_member7_name_onchange()
  {
    var var_member1_name = scAjaxGetFieldText("member1_name");
    var var_member2_name = scAjaxGetFieldText("member2_name");
    var var_member3_name = scAjaxGetFieldText("member3_name");
    var var_member4_name = scAjaxGetFieldText("member4_name");
    var var_member5_name = scAjaxGetFieldText("member5_name");
    var var_member6_name = scAjaxGetFieldText("member6_name");
    var var_member7_name = scAjaxGetFieldText("member7_name");
    var var_member8_name = scAjaxGetFieldText("member8_name");
    var var_member9_name = scAjaxGetFieldText("member9_name");
    var var_member10_name = scAjaxGetFieldText("member10_name");
    var var_buyers_excel_qty = scAjaxGetFieldText("buyers_excel_qty");
    var var_bus_cat_id = scAjaxGetFieldSelect("bus_cat_id");
    var var_bus_subcat_id = scAjaxGetFieldSelect("bus_subcat_id");
    var var_est_memb_cost = scAjaxGetFieldHidden("est_memb_cost");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_form_clients_steps_renew_mob_event_member7_name_onchange(var_member1_name, var_member2_name, var_member3_name, var_member4_name, var_member5_name, var_member6_name, var_member7_name, var_member8_name, var_member9_name, var_member10_name, var_buyers_excel_qty, var_bus_cat_id, var_bus_subcat_id, var_est_memb_cost, var_script_case_init, do_ajax_form_clients_steps_renew_mob_event_member7_name_onchange_cb);
  } // do_ajax_form_clients_steps_renew_mob_event_member7_name_onchange

  function do_ajax_form_clients_steps_renew_mob_event_member7_name_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "member7_name";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
      scAjaxSetVariables();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scBtnDisabled();
    scBtnLabel();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert(do_ajax_form_clients_steps_renew_mob_event_member7_name_onchange_cb_after_alert);
  } // do_ajax_form_clients_steps_renew_mob_event_member7_name_onchange_cb
  function do_ajax_form_clients_steps_renew_mob_event_member7_name_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_form_clients_steps_renew_mob_event_member7_name_onchange_cb_after_alert

  // ---------- Event onchange member8_name
  function do_ajax_form_clients_steps_renew_mob_event_member8_name_onchange()
  {
    var var_member1_name = scAjaxGetFieldText("member1_name");
    var var_member2_name = scAjaxGetFieldText("member2_name");
    var var_member3_name = scAjaxGetFieldText("member3_name");
    var var_member4_name = scAjaxGetFieldText("member4_name");
    var var_member5_name = scAjaxGetFieldText("member5_name");
    var var_member6_name = scAjaxGetFieldText("member6_name");
    var var_member7_name = scAjaxGetFieldText("member7_name");
    var var_member8_name = scAjaxGetFieldText("member8_name");
    var var_member9_name = scAjaxGetFieldText("member9_name");
    var var_member10_name = scAjaxGetFieldText("member10_name");
    var var_buyers_excel_qty = scAjaxGetFieldText("buyers_excel_qty");
    var var_bus_cat_id = scAjaxGetFieldSelect("bus_cat_id");
    var var_bus_subcat_id = scAjaxGetFieldSelect("bus_subcat_id");
    var var_est_memb_cost = scAjaxGetFieldHidden("est_memb_cost");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_form_clients_steps_renew_mob_event_member8_name_onchange(var_member1_name, var_member2_name, var_member3_name, var_member4_name, var_member5_name, var_member6_name, var_member7_name, var_member8_name, var_member9_name, var_member10_name, var_buyers_excel_qty, var_bus_cat_id, var_bus_subcat_id, var_est_memb_cost, var_script_case_init, do_ajax_form_clients_steps_renew_mob_event_member8_name_onchange_cb);
  } // do_ajax_form_clients_steps_renew_mob_event_member8_name_onchange

  function do_ajax_form_clients_steps_renew_mob_event_member8_name_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "member8_name";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
      scAjaxSetVariables();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scBtnDisabled();
    scBtnLabel();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert(do_ajax_form_clients_steps_renew_mob_event_member8_name_onchange_cb_after_alert);
  } // do_ajax_form_clients_steps_renew_mob_event_member8_name_onchange_cb
  function do_ajax_form_clients_steps_renew_mob_event_member8_name_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_form_clients_steps_renew_mob_event_member8_name_onchange_cb_after_alert

  // ---------- Event onchange member9_name
  function do_ajax_form_clients_steps_renew_mob_event_member9_name_onchange()
  {
    var var_member1_name = scAjaxGetFieldText("member1_name");
    var var_member2_name = scAjaxGetFieldText("member2_name");
    var var_member3_name = scAjaxGetFieldText("member3_name");
    var var_member4_name = scAjaxGetFieldText("member4_name");
    var var_member5_name = scAjaxGetFieldText("member5_name");
    var var_member6_name = scAjaxGetFieldText("member6_name");
    var var_member7_name = scAjaxGetFieldText("member7_name");
    var var_member8_name = scAjaxGetFieldText("member8_name");
    var var_member9_name = scAjaxGetFieldText("member9_name");
    var var_member10_name = scAjaxGetFieldText("member10_name");
    var var_buyers_excel_qty = scAjaxGetFieldText("buyers_excel_qty");
    var var_bus_cat_id = scAjaxGetFieldSelect("bus_cat_id");
    var var_bus_subcat_id = scAjaxGetFieldSelect("bus_subcat_id");
    var var_est_memb_cost = scAjaxGetFieldHidden("est_memb_cost");
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_form_clients_steps_renew_mob_event_member9_name_onchange(var_member1_name, var_member2_name, var_member3_name, var_member4_name, var_member5_name, var_member6_name, var_member7_name, var_member8_name, var_member9_name, var_member10_name, var_buyers_excel_qty, var_bus_cat_id, var_bus_subcat_id, var_est_memb_cost, var_script_case_init, do_ajax_form_clients_steps_renew_mob_event_member9_name_onchange_cb);
  } // do_ajax_form_clients_steps_renew_mob_event_member9_name_onchange

  function do_ajax_form_clients_steps_renew_mob_event_member9_name_onchange_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    sFieldValid = "member9_name";
    scEventControl_onChange(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "onchange");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
      scAjaxSetVariables();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scBtnDisabled();
    scBtnLabel();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert(do_ajax_form_clients_steps_renew_mob_event_member9_name_onchange_cb_after_alert);
  } // do_ajax_form_clients_steps_renew_mob_event_member9_name_onchange_cb
  function do_ajax_form_clients_steps_renew_mob_event_member9_name_onchange_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_form_clients_steps_renew_mob_event_member9_name_onchange_cb_after_alert
function scAjaxShowErrorDisplay(sErrorId, sErrorMsg) {
        if ("table" != sErrorId && !$("id_error_display_" + sErrorId + "_frame").hasClass('scFormToastDivFixed')) {
                scAjaxShowErrorDisplay_default(sErrorId, sErrorMsg);
        }
        else {
                scAjaxShowErrorDisplay_toast(sErrorId, sErrorMsg);
        }
} // scAjaxShowErrorDisplay

function scAjaxHideErrorDisplay(sErrorId, sErrorMsg) {
        if ("table" != sErrorId && !$("id_error_display_" + sErrorId + "_frame").hasClass('scFormToastDivFixed')) {
                scAjaxHideErrorDisplay_default(sErrorId, sErrorMsg);
        }
        else {
                scAjaxHideErrorDisplay_toast(sErrorId, sErrorMsg);
        }
} // scAjaxHideErrorDisplay

function scAjaxShowErrorDisplay_toast(sErrorId, sErrorMsg) {
        params = {type: 'error'};
        scJs_alert_sweetalert(sErrorMsg, function() { scAjaxHideErrorDisplay(sErrorId, sErrorMsg); }, scJs_sweetalert_params(params));
} // scAjaxShowErrorDisplay_toast

function scAjaxHideErrorDisplay_toast(sErrorId, bForce) {
        if (document.getElementById("id_error_display_" + sErrorId + "_frame")) {
                if (null == bForce) {
                        bForce = true;
                }
                if (bForce) {
                        var $oField = $('#id_sc_field_' + sErrorId);
                        if (0 < $oField.length) {
                                $oField.removeClass(sc_css_status);
                        }
                }
        }
} // scAjaxHideErrorDisplay_toast

function scAjaxShowMessage(messageType) {
        scAjaxShowMessage_toast(true, messageType);
} // scAjaxShowMessage_toast

function scAjaxHideMessage() {
} // scAjaxHideMessage_toast

function scAjaxShowMessage_toast(isToast, messageType) {
        if (!oResp["msgDisplay"] || !oResp["msgDisplay"]["msgText"]) {
                return;
        }

        if (oResp["msgDisplay"]["toast"] || isToast) {
                _scAjaxShowMessageToast({title: scMsgDefTitle, message: oResp["msgDisplay"]["msgText"], isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, toastPos: "", type: messageType});
        }
        else {
                scJs_alert(oResp["msgDisplay"]["msgText"], scForm_cancel, {});
        }
} // scAjaxShowMessage_toast

function _scAjaxShowMessageToast(params) {
        var sweetAlertParams = {toast: true, showConfirmButton: false};

        if ("" != params["type"]) {
                sweetAlertParams["type"] = params["type"];
        }

        if ("" != params["title"]) {
                sweetAlertParams["title"] = scAjaxSpecCharParser(params["title"]);
        }

        if ("" != params["toastPos"]) {
                sweetAlertParams["position"] = params["toastPos"];
        }

        if (null == sweetAlertParams["position"]) {
                sweetAlertParams["position"] = "top-end";
        }

        if (null == sweetAlertParams["timer"]) {
                sweetAlertParams["timer"] = 3000;
        }

        scJs_alert_sweetalert(scAjaxSpecCharParser(params["message"]), scForm_cancel, scJs_sweetalert_params(sweetAlertParams));
} // _scAjaxShowMessageToast

function _scAjaxShowMessage(params) {
        if (params["isToast"]) {
                _scAjaxShowMessageToast(params);
        }
        else {
                if ("" != params["redirUrl"] && "" != params["redirTarget"]) {
            document.form_ajax_redir_2.action = params["redirUrl"];
            document.form_ajax_redir_2.target = params["redirTarget"];
            document.form_ajax_redir_2.nmgp_parms.value = params["redirParams"];
            document.form_ajax_redir_2.script_case_init.value = scMsgDefScInit;
                        callbackOk = function() { document.form_ajax_redir_2.submit(); };
                }
                else if ("" != params["redirUrl"] && "" == params["redirTarget"]) {
            document.form_ajax_redir_1.action = params["redirUrl"];
            document.form_ajax_redir_1.nmgp_parms.value = params["redirParams"];
                        callbackOk = function() { document.form_ajax_redir_1.submit(); };
                }
                else {
                        callbackOk = scForm_cancel;
                }

                var alertParams = {title: params["title"]};
                if (0 < params["width"]) {
                        alertParams["width"] = params["width"];
                }
                if (0 < params["timeout"]) {
                        alertParams["timer"] = params["timeout"] * 1000;
                }
                if (!params["showButton"]) {
                        alertParams["showConfirmButton"] = false;
                }
                if ("" != params["buttonLabel"]) {
                        alertParams["confirmButtonText"] = params["buttonLabel"];
                }
                if ("" != params["type"]) {
                        alertParams["type"] = params["type"];
                }

                scJs_alert_sweetalert(params["message"], callbackOk, scJs_sweetalert_params(alertParams));
        }
} // _scAjaxShowMessage

<?php
$confirmButtonClass = '';
$cancelButtonClass  = '';
$confirmButtonFA    = '';
$cancelButtonFA     = '';
$confirmButtonFAPos = '';
$cancelButtonFAPos  = '';
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['style']) && '' != $this->arr_buttons['bsweetalert_ok']['style']) {
        $confirmButtonClass = 'scButton_' . $this->arr_buttons['bsweetalert_ok']['style'];
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['style']) && '' != $this->arr_buttons['bsweetalert_cancel']['style']) {
        $cancelButtonClass = 'scButton_' . $this->arr_buttons['bsweetalert_cancel']['style'];
}
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['fontawesomeicon']) && '' != $this->arr_buttons['bsweetalert_ok']['fontawesomeicon']) {
        $confirmButtonFA = $this->arr_buttons['bsweetalert_ok']['fontawesomeicon'];
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['fontawesomeicon']) && '' != $this->arr_buttons['bsweetalert_cancel']['fontawesomeicon']) {
        $cancelButtonFA = $this->arr_buttons['bsweetalert_cancel']['fontawesomeicon'];
}
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['display_position']) && 'img_right' != $this->arr_buttons['bsweetalert_ok']['display_position']) {
        $confirmButtonFAPos = 'text_right';
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['display_position']) && 'img_right' != $this->arr_buttons['bsweetalert_cancel']['display_position']) {
        $cancelButtonFAPos = 'text_right';
}
?>
function scJs_alert(message, callbackOk, params) {
    message = message.replace(/<!--SC_NL-->/gi, "<br />");
        scJs_alert_sweetalert(message, callbackOk, scJs_sweetalert_params(params));
} // scJs_alert

function scJs_confirm(message, callbackOk, callbackCancel) {
        scJs_confirm_sweetalert(message, callbackOk, callbackCancel);
} // scJs_confirm

function scJs_alert_sweetalert(message, callbackOk, params) {
        var sweetAlertConfig;

        if (null == params) {
                params = {};
        }

        params['html'] = message;

        sweetAlertConfig = params;

        Swal.fire(sweetAlertConfig).then(function (result) {
                if (result.value) {
                        if (typeof callbackOk == "function") {
                                callbackOk();
                        }
                }
                else if (result.dismiss == Swal.DismissReason.timer || result.dismiss == Swal.DismissReason.close) {
                        Swal.close();
            $(".swal2-container.swal2-shown").remove();
                }
        else {
            console.log(result.dismiss);
        }
        });
} // scJs_alert_sweetalert

function scJs_confirm_sweetalert(message, callbackOk, callbackCancel) {
        var sweetAlertConfig, params = {};

        params['html'] = message;
        params['type'] = 'question';
        params['showCancelButton'] = true;

        sweetAlertConfig = scJs_sweetalert_params(params);

        Swal.fire(sweetAlertConfig).then(function (result) {
                if (result.value) {
                        callbackOk();
                }
                else if (result.dismiss === Swal.DismissReason.backdrop || result.dismiss === Swal.DismissReason.cancel || result.dismiss === Swal.DismissReason.esc) {
                        callbackCancel();
                }
        });
} // scJs_confirm_sweetalert

function scJs_sweetalert_params(params) {
        var parName, confirmText, confirmFA, confirmPos, cancelText, cancelFA, cancelPos, sweetAlertConfig;

        sweetAlertConfig = {
                customClass: {
                        popup: 'scSweetAlertPopup',
                        header: 'scSweetAlertHeader',
                        content: 'scSweetAlertMessage',
                        confirmButton: '<?php echo $confirmButtonClass; ?>',
                        cancelButton: '<?php echo $cancelButtonClass; ?>'
                }
        };

        confirmText = '<?php echo isset($this->arr_buttons['bsweetalert_ok']['value']) ? $this->arr_buttons['bsweetalert_ok']['value'] : $this->Ini->Nm_lang['lang_btns_cfrm'] ?>';
        confirmFA = '<?php echo $confirmButtonFA ?>';
        confirmPos = '<?php echo $confirmButtonFAPos ?>';
        cancelText = '<?php echo isset($this->arr_buttons['bsweetalert_cancel']['value']) ? $this->arr_buttons['bsweetalert_cancel']['value'] : $this->Ini->Nm_lang['lang_btns_cncl'] ?>';
        cancelFA = '<?php echo $cancelButtonFA ?>';
        cancelPos = '<?php echo $cancelButtonFAPos ?>';

        for (parName in params) {
                if ('confirmButtonText' == parName) {
                        confirmText = params[parName];
                }
                else if ('confirmButtonFA' == parName) {
                        confirmFA = params[parName];
                }
                else if ('confirmButtonFAPos' == parName) {
                        confirmPos = params[parName];
                }
                else if ('cancelButtonText' == parName) {
                        cancelText = params[parName];
                }
                else if ('cancelButtonFA' == parName) {
                        cancelFA = params[parName];
                }
                else if ('cancelButtonFAPos' == parName) {
                        cancelPos = params[parName];
                }
                else {
                        sweetAlertConfig[parName] = params[parName];
                }
        }

        if ('' != confirmFA) {
                if ('text_right' == confirmPos) {
                        confirmText = '<i class="fas ' + confirmFA + '"></i> ' + confirmText;
                }
                else {
                        confirmText += ' <i class="fas ' + confirmFA + '"></i>';
                }
        }
        if ('' != cancelFA) {
                if ('text_right' == cancelPos) {
                        cancelText = '<i class="fas ' + cancelFA + '"></i> ' + cancelText;
                }
                else {
                        cancelText += ' <i class="fas ' + cancelFA + '"></i>';
                }
        }

        sweetAlertConfig['confirmButtonText'] = confirmText;
        sweetAlertConfig['cancelButtonText'] = cancelText;

        if (sweetAlertConfig['toast']) {
                sweetAlertConfig['showConfirmButton'] = false;
                sweetAlertConfig['showCancelButton'] = false;
                sweetAlertConfig['customClass']['popup'] = 'scToastPopup';
                sweetAlertConfig['customClass']['header'] = 'scToastHeader';
                sweetAlertConfig['customClass']['content'] = 'scToastMessage';
                if (null == sweetAlertConfig['timer']) {
                        sweetAlertConfig['timer'] = 3000;
                }
                if (null == sweetAlertConfig["position"]) {
                        sweetAlertConfig["position"] = "top-end";
                }
        }

        return sweetAlertConfig;
} // scJs_sweetalert_params

  // ---------- Form
  function do_ajax_form_clients_steps_renew_mob_submit_page_0(stepGoTo) {
    if (scEventControl_active("")) {
      setTimeout(function() { do_ajax_form_clients_steps_renew_mob_submit_page_0(stepGoTo); }, 500);
      return;
    }
    scAjaxHideMessage();
    scAjaxProcOn();
    $.ajax({
      url: "form_clients_steps_renew_mob.php",
      method: "POST",
      dataType: "json",
      data: {
        dummy02: scAjaxGetFieldHidden("dummy02"),
        dummy03: scAjaxGetFieldHidden("dummy03"),
        co_name: scAjaxGetFieldText("co_name"),
        client_id: scAjaxGetFieldHidden("client_id"),
        mailing_address: scAjaxGetFieldText("mailing_address"),
        appn_date: scAjaxGetFieldHidden("appn_date"),
        city: scAjaxGetFieldText("city"),
        bus_cat_id: scAjaxGetFieldSelect("bus_cat_id"),
        state: scAjaxGetFieldText("state"),
        bus_subcat_id: scAjaxGetFieldSelect("bus_subcat_id"),
        zip_code: scAjaxGetFieldText("zip_code"),
        bus_subcat_other: scAjaxGetFieldText("bus_subcat_other"),
        phone_number: scAjaxGetFieldText("phone_number"),
        website_url: scAjaxGetFieldText("website_url"),
        email: scAjaxGetFieldText("email"),
        acct_instagram: scAjaxGetFieldText("acct_instagram"),
        dummy01: scAjaxGetFieldHidden("dummy01"),
        acct_facebook: scAjaxGetFieldText("acct_facebook"),
        dummy04: scAjaxGetFieldHidden("dummy04"),
        dummy07: scAjaxGetFieldHidden("dummy07"),
        dummy08: scAjaxGetFieldHidden("dummy08"),
        main_contact_name: scAjaxGetFieldText("main_contact_name"),
        main_contact_phone: scAjaxGetFieldText("main_contact_phone"),
        main_contact_email: scAjaxGetFieldText("main_contact_email"),
        main_contact_title: scAjaxGetFieldText("main_contact_title"),
        main_contact_img_id: scAjaxGetFieldText("main_contact_img_id"),
        main_contact_img_id_ul_name: scAjaxSpecCharProtect(document.F1.main_contact_img_id_ul_name.value),
        main_contact_img_id_ul_type: document.F1.main_contact_img_id_ul_type.value,
        main_contact_img_id_limpa: document.F1.main_contact_img_id_limpa.checked ? "S" : "N",
        nm_form_submit: document.F1.nm_form_submit.value,
        nmgp_url_saida: document.F1.nmgp_url_saida.value,
        nmgp_ancora: document.F1.nmgp_ancora.value,
        nmgp_num_form: document.F1.nmgp_num_form.value,
        nmgp_parms: document.F1.nmgp_parms.value,
        script_case_init: document.F1.script_case_init.value,
        csrf_token: scAjaxGetFieldText("csrf_token"),
        wizard_step_now: wizardActualStep,
        wizard_step_goto: stepGoTo,
        wizard_action: "change_step",
        nmgp_opcao: wizardIsInsert ? "incluir" : "atualizar",
      },
      success: function(data, textStatus, jqXHR) {
        do_ajax_form_clients_steps_renew_mob_submit_page_cb_0(data);
      },
      error: function(jqXHR, textStatus, errorThrown) {
      },
    });
  } // do_ajax_form_clients_steps_renew_mob_submit_page_0

  function do_ajax_form_clients_steps_renew_mob_submit_page_cb_0(data) {
    scAjaxProcOff();
    oResp = data;
    scAjaxClearErrors();
    scAjaxUpdateErrors("valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors || "menu_link" == document.F1.nmgp_opcao.value) {
      $('.sc-js-ui-statusimg').css('display', 'none');
      scAjaxHideErrorDisplay("table");
    } else {
      scAjaxError_markList();
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    if (scAjaxIsOk()) {
      scAjaxShowDebug();
      switch (oResp.wizard.action) {
        case "change_step":
          scJQWizardGoToStep(oResp.wizard.next_step);
          break;
      }
    }
  } // do_ajax_form_clients_steps_renew_mob_submit_page_cb_0

  function do_ajax_form_clients_steps_renew_mob_submit_page_1(stepGoTo) {
    if (scEventControl_active("")) {
      setTimeout(function() { do_ajax_form_clients_steps_renew_mob_submit_page_1(stepGoTo); }, 500);
      return;
    }
    scAjaxHideMessage();
    scAjaxProcOn();
    $.ajax({
      url: "form_clients_steps_renew_mob.php",
      method: "POST",
      dataType: "json",
      data: {
        doc_type: scAjaxGetFieldCheckbox("doc_type", ";"),
        doc_file: scAjaxGetFieldText("doc_file"),
        appn_note: scAjaxGetFieldEditorHtml("appn_note"),
        doc_file_ul_name: scAjaxSpecCharProtect(document.F1.doc_file_ul_name.value),
        doc_file_ul_type: document.F1.doc_file_ul_type.value,
        doc_file_salva: scAjaxSpecCharProtect(document.F1.doc_file_salva.value),
        doc_file_limpa: document.F1.doc_file_limpa.checked ? "S" : "N",
        nm_form_submit: document.F1.nm_form_submit.value,
        nmgp_url_saida: document.F1.nmgp_url_saida.value,
        nmgp_ancora: document.F1.nmgp_ancora.value,
        nmgp_num_form: document.F1.nmgp_num_form.value,
        nmgp_parms: document.F1.nmgp_parms.value,
        script_case_init: document.F1.script_case_init.value,
        csrf_token: scAjaxGetFieldText("csrf_token"),
        wizard_step_now: wizardActualStep,
        wizard_step_goto: stepGoTo,
        wizard_action: "change_step",
        nmgp_opcao: wizardIsInsert ? "incluir" : "atualizar",
      },
      success: function(data, textStatus, jqXHR) {
        do_ajax_form_clients_steps_renew_mob_submit_page_cb_1(data);
      },
      error: function(jqXHR, textStatus, errorThrown) {
      },
    });
  } // do_ajax_form_clients_steps_renew_mob_submit_page_1

  function do_ajax_form_clients_steps_renew_mob_submit_page_cb_1(data) {
    scAjaxProcOff();
    oResp = data;
    scAjaxClearErrors();
    scAjaxUpdateErrors("valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors || "menu_link" == document.F1.nmgp_opcao.value) {
      $('.sc-js-ui-statusimg').css('display', 'none');
      scAjaxHideErrorDisplay("table");
    } else {
      scAjaxError_markList();
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    if (scAjaxIsOk()) {
      scAjaxShowDebug();
      switch (oResp.wizard.action) {
        case "change_step":
          scJQWizardGoToStep(oResp.wizard.next_step);
          break;
      }
    }
  } // do_ajax_form_clients_steps_renew_mob_submit_page_cb_1

  function do_ajax_form_clients_steps_renew_mob_submit_page_2(stepGoTo) {
    if (scEventControl_active("")) {
      setTimeout(function() { do_ajax_form_clients_steps_renew_mob_submit_page_2(stepGoTo); }, 500);
      return;
    }
    scAjaxHideMessage();
    scAjaxProcOn();
    $.ajax({
      url: "form_clients_steps_renew_mob.php",
      method: "POST",
      dataType: "json",
      data: {
        memb_name: scAjaxGetFieldHidden("memb_name"),
        memb_phone: scAjaxGetFieldHidden("memb_phone"),
        memb_email: scAjaxGetFieldHidden("memb_email"),
        memb_note: scAjaxGetFieldHidden("memb_note"),
        member1_name: scAjaxGetFieldText("member1_name"),
        member1_phone: scAjaxGetFieldText("member1_phone"),
        member1_email: scAjaxGetFieldText("member1_email"),
        member1_note: scAjaxGetFieldText("member1_note"),
        member2_name: scAjaxGetFieldText("member2_name"),
        member2_phone: scAjaxGetFieldText("member2_phone"),
        member2_email: scAjaxGetFieldText("member2_email"),
        member2_note: scAjaxGetFieldText("member2_note"),
        member3_name: scAjaxGetFieldText("member3_name"),
        member3_phone: scAjaxGetFieldText("member3_phone"),
        member3_email: scAjaxGetFieldText("member3_email"),
        member3_note: scAjaxGetFieldText("member3_note"),
        dummy05: scAjaxGetFieldHidden("dummy05"),
        adtl_memb_name: scAjaxGetFieldHidden("adtl_memb_name"),
        adtl_memb_phone: scAjaxGetFieldHidden("adtl_memb_phone"),
        adtl_memb_note: scAjaxGetFieldHidden("adtl_memb_note"),
        addtl_memb_mail: scAjaxGetFieldHidden("addtl_memb_mail"),
        member4_name: scAjaxGetFieldText("member4_name"),
        member4_phone: scAjaxGetFieldText("member4_phone"),
        member4_email: scAjaxGetFieldText("member4_email"),
        member4_note: scAjaxGetFieldText("member4_note"),
        member5_name: scAjaxGetFieldText("member5_name"),
        member5_phone: scAjaxGetFieldText("member5_phone"),
        member5_email: scAjaxGetFieldText("member5_email"),
        member5_note: scAjaxGetFieldText("member5_note"),
        member6_name: scAjaxGetFieldText("member6_name"),
        member6_phone: scAjaxGetFieldText("member6_phone"),
        member6_email: scAjaxGetFieldText("member6_email"),
        member6_note: scAjaxGetFieldText("member6_note"),
        member7_name: scAjaxGetFieldText("member7_name"),
        member7_phone: scAjaxGetFieldText("member7_phone"),
        member7_email: scAjaxGetFieldText("member7_email"),
        member7_note: scAjaxGetFieldText("member7_note"),
        member8_name: scAjaxGetFieldText("member8_name"),
        member8_phone: scAjaxGetFieldText("member8_phone"),
        member8_email: scAjaxGetFieldText("member8_email"),
        member8_note: scAjaxGetFieldText("member8_note"),
        member9_name: scAjaxGetFieldText("member9_name"),
        member9_phone: scAjaxGetFieldText("member9_phone"),
        member9_email: scAjaxGetFieldText("member9_email"),
        member9_note: scAjaxGetFieldText("member9_note"),
        member10_name: scAjaxGetFieldText("member10_name"),
        member10_phone: scAjaxGetFieldText("member10_phone"),
        member10_email: scAjaxGetFieldText("member10_email"),
        member10_note: scAjaxGetFieldText("member10_note"),
        dummy06: scAjaxGetFieldHidden("dummy06"),
        xlsx_sample: "",
        more_buyers_xlsx: scAjaxGetFieldText("more_buyers_xlsx"),
        buyers_excel_qty: scAjaxGetFieldText("buyers_excel_qty"),
        dummy09: scAjaxGetFieldHidden("dummy09"),
        dummy11: scAjaxGetFieldHidden("dummy11"),
        more_buyers_xlsx_ul_name: scAjaxSpecCharProtect(document.F1.more_buyers_xlsx_ul_name.value),
        more_buyers_xlsx_ul_type: document.F1.more_buyers_xlsx_ul_type.value,
        more_buyers_xlsx_salva: scAjaxSpecCharProtect(document.F1.more_buyers_xlsx_salva.value),
        more_buyers_xlsx_limpa: document.F1.more_buyers_xlsx_limpa.checked ? "S" : "N",
        nm_form_submit: document.F1.nm_form_submit.value,
        nmgp_url_saida: document.F1.nmgp_url_saida.value,
        nmgp_ancora: document.F1.nmgp_ancora.value,
        nmgp_num_form: document.F1.nmgp_num_form.value,
        nmgp_parms: document.F1.nmgp_parms.value,
        script_case_init: document.F1.script_case_init.value,
        csrf_token: scAjaxGetFieldText("csrf_token"),
        wizard_step_now: wizardActualStep,
        wizard_step_goto: stepGoTo,
        wizard_action: "change_step",
        nmgp_opcao: wizardIsInsert ? "incluir" : "atualizar",
      },
      success: function(data, textStatus, jqXHR) {
        do_ajax_form_clients_steps_renew_mob_submit_page_cb_2(data);
      },
      error: function(jqXHR, textStatus, errorThrown) {
      },
    });
  } // do_ajax_form_clients_steps_renew_mob_submit_page_2

  function do_ajax_form_clients_steps_renew_mob_submit_page_cb_2(data) {
    scAjaxProcOff();
    oResp = data;
    scAjaxClearErrors();
    scAjaxUpdateErrors("valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors || "menu_link" == document.F1.nmgp_opcao.value) {
      $('.sc-js-ui-statusimg').css('display', 'none');
      scAjaxHideErrorDisplay("table");
    } else {
      scAjaxError_markList();
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    if (scAjaxIsOk()) {
      scAjaxShowDebug();
      switch (oResp.wizard.action) {
        case "change_step":
          scJQWizardGoToStep(oResp.wizard.next_step);
          break;
      }
    }
  } // do_ajax_form_clients_steps_renew_mob_submit_page_cb_2

  function do_ajax_form_clients_steps_renew_mob_submit_page_3(stepGoTo) {
    if (scEventControl_active("")) {
      setTimeout(function() { do_ajax_form_clients_steps_renew_mob_submit_page_3(stepGoTo); }, 500);
      return;
    }
    scAjaxHideMessage();
    scAjaxProcOn();
    $.ajax({
      url: "form_clients_steps_renew_mob.php",
      method: "POST",
      dataType: "json",
      data: {
        rules: scAjaxGetFieldHidden("rules"),
        rules_warn: "",
        memb_levels: scAjaxGetFieldHidden("memb_levels"),
        est_memb_cost: scAjaxGetFieldHidden("est_memb_cost"),
        pay: "",
        read_at_sign: scAjaxGetFieldHidden("read_at_sign"),
        applicant_name: scAjaxGetFieldText("applicant_name"),
        applicant_title: scAjaxGetFieldText("applicant_title"),
        dummy10: scAjaxGetFieldHidden("dummy10"),
        applicant_signature: scAjaxGetFieldSignature("applicant_signature"),
        nm_form_submit: document.F1.nm_form_submit.value,
        nmgp_url_saida: document.F1.nmgp_url_saida.value,
        nmgp_ancora: document.F1.nmgp_ancora.value,
        nmgp_num_form: document.F1.nmgp_num_form.value,
        nmgp_parms: document.F1.nmgp_parms.value,
        script_case_init: document.F1.script_case_init.value,
        csrf_token: scAjaxGetFieldText("csrf_token"),
        wizard_step_now: wizardActualStep,
        wizard_step_goto: stepGoTo,
        wizard_action: "change_step",
        nmgp_opcao: wizardIsInsert ? "incluir" : "atualizar",
      },
      success: function(data, textStatus, jqXHR) {
        do_ajax_form_clients_steps_renew_mob_submit_page_cb_3(data);
      },
      error: function(jqXHR, textStatus, errorThrown) {
      },
    });
  } // do_ajax_form_clients_steps_renew_mob_submit_page_3

  function do_ajax_form_clients_steps_renew_mob_submit_page_cb_3(data) {
    scAjaxProcOff();
    oResp = data;
    scAjaxClearErrors();
    scAjaxUpdateErrors("valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors || "menu_link" == document.F1.nmgp_opcao.value) {
      $('.sc-js-ui-statusimg').css('display', 'none');
      scAjaxHideErrorDisplay("table");
    } else {
      scAjaxError_markList();
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    if (scAjaxIsOk()) {
      scAjaxShowDebug();
      switch (oResp.wizard.action) {
        case "change_step":
          scJQWizardGoToStep(oResp.wizard.next_step);
          break;
      }
    }
  } // do_ajax_form_clients_steps_renew_mob_submit_page_cb_3

  function do_ajax_form_clients_steps_renew_mob_submit_form()
  {
    if (scEventControl_active("")) {
      setTimeout(function() { do_ajax_form_clients_steps_renew_mob_submit_form(); }, 500);
      return;
    }
    scAjaxHideMessage();
    var var_dummy02 = scAjaxGetFieldHidden("dummy02");
    var var_dummy03 = scAjaxGetFieldHidden("dummy03");
    var var_co_name = scAjaxGetFieldText("co_name");
    var var_client_id = scAjaxGetFieldHidden("client_id");
    var var_mailing_address = scAjaxGetFieldText("mailing_address");
    var var_appn_date = scAjaxGetFieldHidden("appn_date");
    var var_city = scAjaxGetFieldText("city");
    var var_bus_cat_id = scAjaxGetFieldSelect("bus_cat_id");
    var var_state = scAjaxGetFieldText("state");
    var var_bus_subcat_id = scAjaxGetFieldSelect("bus_subcat_id");
    var var_zip_code = scAjaxGetFieldText("zip_code");
    var var_bus_subcat_other = scAjaxGetFieldText("bus_subcat_other");
    var var_phone_number = scAjaxGetFieldText("phone_number");
    var var_website_url = scAjaxGetFieldText("website_url");
    var var_email = scAjaxGetFieldText("email");
    var var_acct_instagram = scAjaxGetFieldText("acct_instagram");
    var var_dummy01 = scAjaxGetFieldHidden("dummy01");
    var var_acct_facebook = scAjaxGetFieldText("acct_facebook");
    var var_dummy04 = scAjaxGetFieldHidden("dummy04");
    var var_dummy07 = scAjaxGetFieldHidden("dummy07");
    var var_dummy08 = scAjaxGetFieldHidden("dummy08");
    var var_main_contact_name = scAjaxGetFieldText("main_contact_name");
    var var_main_contact_phone = scAjaxGetFieldText("main_contact_phone");
    var var_main_contact_email = scAjaxGetFieldText("main_contact_email");
    var var_main_contact_title = scAjaxGetFieldText("main_contact_title");
    var var_main_contact_img_id = scAjaxGetFieldText("main_contact_img_id");
    var var_doc_type = scAjaxGetFieldCheckbox("doc_type", ";");
    var var_doc_file = scAjaxGetFieldText("doc_file");
    var var_appn_note = scAjaxGetFieldEditorHtml("appn_note");
    var var_memb_name = scAjaxGetFieldHidden("memb_name");
    var var_memb_phone = scAjaxGetFieldHidden("memb_phone");
    var var_memb_email = scAjaxGetFieldHidden("memb_email");
    var var_memb_note = scAjaxGetFieldHidden("memb_note");
    var var_member1_name = scAjaxGetFieldText("member1_name");
    var var_member1_phone = scAjaxGetFieldText("member1_phone");
    var var_member1_email = scAjaxGetFieldText("member1_email");
    var var_member1_note = scAjaxGetFieldText("member1_note");
    var var_member2_name = scAjaxGetFieldText("member2_name");
    var var_member2_phone = scAjaxGetFieldText("member2_phone");
    var var_member2_email = scAjaxGetFieldText("member2_email");
    var var_member2_note = scAjaxGetFieldText("member2_note");
    var var_member3_name = scAjaxGetFieldText("member3_name");
    var var_member3_phone = scAjaxGetFieldText("member3_phone");
    var var_member3_email = scAjaxGetFieldText("member3_email");
    var var_member3_note = scAjaxGetFieldText("member3_note");
    var var_dummy05 = scAjaxGetFieldHidden("dummy05");
    var var_adtl_memb_name = scAjaxGetFieldHidden("adtl_memb_name");
    var var_adtl_memb_phone = scAjaxGetFieldHidden("adtl_memb_phone");
    var var_adtl_memb_note = scAjaxGetFieldHidden("adtl_memb_note");
    var var_addtl_memb_mail = scAjaxGetFieldHidden("addtl_memb_mail");
    var var_member4_name = scAjaxGetFieldText("member4_name");
    var var_member4_phone = scAjaxGetFieldText("member4_phone");
    var var_member4_email = scAjaxGetFieldText("member4_email");
    var var_member4_note = scAjaxGetFieldText("member4_note");
    var var_member5_name = scAjaxGetFieldText("member5_name");
    var var_member5_phone = scAjaxGetFieldText("member5_phone");
    var var_member5_email = scAjaxGetFieldText("member5_email");
    var var_member5_note = scAjaxGetFieldText("member5_note");
    var var_member6_name = scAjaxGetFieldText("member6_name");
    var var_member6_phone = scAjaxGetFieldText("member6_phone");
    var var_member6_email = scAjaxGetFieldText("member6_email");
    var var_member6_note = scAjaxGetFieldText("member6_note");
    var var_member7_name = scAjaxGetFieldText("member7_name");
    var var_member7_phone = scAjaxGetFieldText("member7_phone");
    var var_member7_email = scAjaxGetFieldText("member7_email");
    var var_member7_note = scAjaxGetFieldText("member7_note");
    var var_member8_name = scAjaxGetFieldText("member8_name");
    var var_member8_phone = scAjaxGetFieldText("member8_phone");
    var var_member8_email = scAjaxGetFieldText("member8_email");
    var var_member8_note = scAjaxGetFieldText("member8_note");
    var var_member9_name = scAjaxGetFieldText("member9_name");
    var var_member9_phone = scAjaxGetFieldText("member9_phone");
    var var_member9_email = scAjaxGetFieldText("member9_email");
    var var_member9_note = scAjaxGetFieldText("member9_note");
    var var_member10_name = scAjaxGetFieldText("member10_name");
    var var_member10_phone = scAjaxGetFieldText("member10_phone");
    var var_member10_email = scAjaxGetFieldText("member10_email");
    var var_member10_note = scAjaxGetFieldText("member10_note");
    var var_dummy06 = scAjaxGetFieldHidden("dummy06");
    var var_xlsx_sample = "";
    var var_more_buyers_xlsx = scAjaxGetFieldText("more_buyers_xlsx");
    var var_buyers_excel_qty = scAjaxGetFieldText("buyers_excel_qty");
    var var_dummy09 = scAjaxGetFieldHidden("dummy09");
    var var_dummy11 = scAjaxGetFieldHidden("dummy11");
    var var_rules = scAjaxGetFieldHidden("rules");
    var var_rules_warn = "";
    var var_memb_levels = scAjaxGetFieldHidden("memb_levels");
    var var_est_memb_cost = scAjaxGetFieldHidden("est_memb_cost");
    var var_pay = "";
    var var_read_at_sign = scAjaxGetFieldHidden("read_at_sign");
    var var_applicant_name = scAjaxGetFieldText("applicant_name");
    var var_applicant_title = scAjaxGetFieldText("applicant_title");
    var var_dummy10 = scAjaxGetFieldHidden("dummy10");
    var var_applicant_signature = scAjaxGetFieldSignature("applicant_signature");
    var var_doc_file_ul_name = scAjaxSpecCharProtect(document.F1.doc_file_ul_name.value);//.replace(/[+]/g, "__NM_PLUS__");
    var var_doc_file_ul_type = document.F1.doc_file_ul_type.value;
    var var_main_contact_img_id_ul_name = scAjaxSpecCharProtect(document.F1.main_contact_img_id_ul_name.value);//.replace(/[+]/g, "__NM_PLUS__");
    var var_main_contact_img_id_ul_type = document.F1.main_contact_img_id_ul_type.value;
    var var_more_buyers_xlsx_ul_name = scAjaxSpecCharProtect(document.F1.more_buyers_xlsx_ul_name.value);//.replace(/[+]/g, "__NM_PLUS__");
    var var_more_buyers_xlsx_ul_type = document.F1.more_buyers_xlsx_ul_type.value;
    var var_main_contact_img_id_limpa = document.F1.main_contact_img_id_limpa.checked ? "S" : "N";
    var var_doc_file_salva = scAjaxSpecCharProtect(document.F1.doc_file_salva.value);//.replace(/[+]/g, "__NM_PLUS__");
    var var_doc_file_limpa = document.F1.doc_file_limpa.checked ? "S" : "N";
    var var_more_buyers_xlsx_salva = scAjaxSpecCharProtect(document.F1.more_buyers_xlsx_salva.value);//.replace(/[+]/g, "__NM_PLUS__");
    var var_more_buyers_xlsx_limpa = document.F1.more_buyers_xlsx_limpa.checked ? "S" : "N";
    var var_nm_form_submit = document.F1.nm_form_submit.value;
    var var_nmgp_url_saida = document.F1.nmgp_url_saida.value;
    var var_nmgp_opcao = document.F1.nmgp_opcao.value;
    var var_nmgp_ancora = document.F1.nmgp_ancora.value;
    var var_nmgp_num_form = document.F1.nmgp_num_form.value;
    var var_nmgp_parms = document.F1.nmgp_parms.value;
    var var_script_case_init = document.F1.script_case_init.value;
    var var_csrf_token = scAjaxGetFieldText("csrf_token");
    scAjaxProcOn();
    x_ajax_form_clients_steps_renew_mob_submit_form(var_dummy02, var_dummy03, var_co_name, var_client_id, var_mailing_address, var_appn_date, var_city, var_bus_cat_id, var_state, var_bus_subcat_id, var_zip_code, var_bus_subcat_other, var_phone_number, var_website_url, var_email, var_acct_instagram, var_dummy01, var_acct_facebook, var_dummy04, var_dummy07, var_dummy08, var_main_contact_name, var_main_contact_phone, var_main_contact_email, var_main_contact_title, var_main_contact_img_id, var_doc_type, var_doc_file, var_appn_note, var_memb_name, var_memb_phone, var_memb_email, var_memb_note, var_member1_name, var_member1_phone, var_member1_email, var_member1_note, var_member2_name, var_member2_phone, var_member2_email, var_member2_note, var_member3_name, var_member3_phone, var_member3_email, var_member3_note, var_dummy05, var_adtl_memb_name, var_adtl_memb_phone, var_adtl_memb_note, var_addtl_memb_mail, var_member4_name, var_member4_phone, var_member4_email, var_member4_note, var_member5_name, var_member5_phone, var_member5_email, var_member5_note, var_member6_name, var_member6_phone, var_member6_email, var_member6_note, var_member7_name, var_member7_phone, var_member7_email, var_member7_note, var_member8_name, var_member8_phone, var_member8_email, var_member8_note, var_member9_name, var_member9_phone, var_member9_email, var_member9_note, var_member10_name, var_member10_phone, var_member10_email, var_member10_note, var_dummy06, var_xlsx_sample, var_more_buyers_xlsx, var_buyers_excel_qty, var_dummy09, var_dummy11, var_rules, var_rules_warn, var_memb_levels, var_est_memb_cost, var_pay, var_read_at_sign, var_applicant_name, var_applicant_title, var_dummy10, var_applicant_signature, var_doc_file_ul_name, var_doc_file_ul_type, var_main_contact_img_id_ul_name, var_main_contact_img_id_ul_type, var_more_buyers_xlsx_ul_name, var_more_buyers_xlsx_ul_type, var_main_contact_img_id_limpa, var_doc_file_salva, var_doc_file_limpa, var_more_buyers_xlsx_salva, var_more_buyers_xlsx_limpa, var_nm_form_submit, var_nmgp_url_saida, var_nmgp_opcao, var_nmgp_ancora, var_nmgp_num_form, var_nmgp_parms, var_script_case_init, var_csrf_token, do_ajax_form_clients_steps_renew_mob_submit_form_cb);
  } // do_ajax_form_clients_steps_renew_mob_submit_form

  function do_ajax_form_clients_steps_renew_mob_submit_form_cb(sResp)
  {
    scAjaxProcOff();
    oResp = scAjaxResponse(sResp);
    scAjaxUpdateErrors("valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors || "menu_link" == document.F1.nmgp_opcao.value)
    {
      $('.sc-js-ui-statusimg').css('display', 'none');
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      scAjaxError_markList();
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    if (scAjaxIsOk())
    {
      scResetFormChanges();
      scAjaxShowMessage("success");
      scAjaxHideErrorDisplay("table");
      scAjaxHideErrorDisplay("dummy02");
      scAjaxHideErrorDisplay("dummy03");
      scAjaxHideErrorDisplay("co_name");
      scAjaxHideErrorDisplay("client_id");
      scAjaxHideErrorDisplay("mailing_address");
      scAjaxHideErrorDisplay("appn_date");
      scAjaxHideErrorDisplay("city");
      scAjaxHideErrorDisplay("bus_cat_id");
      scAjaxHideErrorDisplay("state");
      scAjaxHideErrorDisplay("bus_subcat_id");
      scAjaxHideErrorDisplay("zip_code");
      scAjaxHideErrorDisplay("bus_subcat_other");
      scAjaxHideErrorDisplay("phone_number");
      scAjaxHideErrorDisplay("website_url");
      scAjaxHideErrorDisplay("email");
      scAjaxHideErrorDisplay("acct_instagram");
      scAjaxHideErrorDisplay("dummy01");
      scAjaxHideErrorDisplay("acct_facebook");
      scAjaxHideErrorDisplay("dummy04");
      scAjaxHideErrorDisplay("dummy07");
      scAjaxHideErrorDisplay("dummy08");
      scAjaxHideErrorDisplay("main_contact_name");
      scAjaxHideErrorDisplay("main_contact_phone");
      scAjaxHideErrorDisplay("main_contact_email");
      scAjaxHideErrorDisplay("main_contact_title");
      scAjaxHideErrorDisplay("main_contact_img_id");
      scAjaxHideErrorDisplay("doc_type");
      scAjaxHideErrorDisplay("doc_file");
      scAjaxHideErrorDisplay("appn_note");
      scAjaxHideErrorDisplay("memb_name");
      scAjaxHideErrorDisplay("memb_phone");
      scAjaxHideErrorDisplay("memb_email");
      scAjaxHideErrorDisplay("memb_note");
      scAjaxHideErrorDisplay("member1_name");
      scAjaxHideErrorDisplay("member1_phone");
      scAjaxHideErrorDisplay("member1_email");
      scAjaxHideErrorDisplay("member1_note");
      scAjaxHideErrorDisplay("member2_name");
      scAjaxHideErrorDisplay("member2_phone");
      scAjaxHideErrorDisplay("member2_email");
      scAjaxHideErrorDisplay("member2_note");
      scAjaxHideErrorDisplay("member3_name");
      scAjaxHideErrorDisplay("member3_phone");
      scAjaxHideErrorDisplay("member3_email");
      scAjaxHideErrorDisplay("member3_note");
      scAjaxHideErrorDisplay("dummy05");
      scAjaxHideErrorDisplay("adtl_memb_name");
      scAjaxHideErrorDisplay("adtl_memb_phone");
      scAjaxHideErrorDisplay("adtl_memb_note");
      scAjaxHideErrorDisplay("addtl_memb_mail");
      scAjaxHideErrorDisplay("member4_name");
      scAjaxHideErrorDisplay("member4_phone");
      scAjaxHideErrorDisplay("member4_email");
      scAjaxHideErrorDisplay("member4_note");
      scAjaxHideErrorDisplay("member5_name");
      scAjaxHideErrorDisplay("member5_phone");
      scAjaxHideErrorDisplay("member5_email");
      scAjaxHideErrorDisplay("member5_note");
      scAjaxHideErrorDisplay("member6_name");
      scAjaxHideErrorDisplay("member6_phone");
      scAjaxHideErrorDisplay("member6_email");
      scAjaxHideErrorDisplay("member6_note");
      scAjaxHideErrorDisplay("member7_name");
      scAjaxHideErrorDisplay("member7_phone");
      scAjaxHideErrorDisplay("member7_email");
      scAjaxHideErrorDisplay("member7_note");
      scAjaxHideErrorDisplay("member8_name");
      scAjaxHideErrorDisplay("member8_phone");
      scAjaxHideErrorDisplay("member8_email");
      scAjaxHideErrorDisplay("member8_note");
      scAjaxHideErrorDisplay("member9_name");
      scAjaxHideErrorDisplay("member9_phone");
      scAjaxHideErrorDisplay("member9_email");
      scAjaxHideErrorDisplay("member9_note");
      scAjaxHideErrorDisplay("member10_name");
      scAjaxHideErrorDisplay("member10_phone");
      scAjaxHideErrorDisplay("member10_email");
      scAjaxHideErrorDisplay("member10_note");
      scAjaxHideErrorDisplay("dummy06");
      scAjaxHideErrorDisplay("xlsx_sample");
      scAjaxHideErrorDisplay("more_buyers_xlsx");
      scAjaxHideErrorDisplay("buyers_excel_qty");
      scAjaxHideErrorDisplay("dummy09");
      scAjaxHideErrorDisplay("dummy11");
      scAjaxHideErrorDisplay("rules");
      scAjaxHideErrorDisplay("rules_warn");
      scAjaxHideErrorDisplay("memb_levels");
      scAjaxHideErrorDisplay("est_memb_cost");
      scAjaxHideErrorDisplay("pay");
      scAjaxHideErrorDisplay("read_at_sign");
      scAjaxHideErrorDisplay("applicant_name");
      scAjaxHideErrorDisplay("applicant_title");
      scAjaxHideErrorDisplay("dummy10");
      scAjaxHideErrorDisplay("applicant_signature");
      scLigEditLookupCall();
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew_mob']['dashboard_info']['under_dashboard']) {
?>
      var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew_mob']['dashboard_info']['parent_widget']; ?>']");
      if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.nm_gp_move) {
        dbParentFrame[0].contentWindow.nm_gp_move("igual");
      }
<?php
}
?>
    }
    Nm_Proc_Atualiz = false;
    if (!scAjaxHasError())
    {
      scAjaxSetFields(false);
      scAjaxSetVariables();
      scAjaxSetMaster();
      if (scInlineFormSend())
      {
        self.parent.tb_remove();
        return;
      }
      if (document.F1.main_contact_img_id_limpa && document.F1.main_contact_img_id_limpa.checked)
      {
        var oImgTemp = {0: {"value" : ""}};
        scAjaxSetFieldImage("main_contact_img_id", oImgTemp, "", "", "", "N");
      }
      if (document.F1.doc_file_limpa && document.F1.doc_file_limpa.checked)
      {
        var oImgTemp = {0: {"value" : ""}};
        scAjaxSetFieldDocument("doc_file", oImgTemp, "", "");
      }
      else if (document.getElementById("id_ajax_doc_doc_file") && "" != document.getElementById("id_ajax_doc_doc_file").innerHTML)
      {
        document.getElementById("id_ajax_doc_doc_file").style.display = "";
      }
      if (document.F1.more_buyers_xlsx_limpa && document.F1.more_buyers_xlsx_limpa.checked)
      {
        var oImgTemp = {0: {"value" : ""}};
        scAjaxSetFieldDocument("more_buyers_xlsx", oImgTemp, "", "");
      }
      else if (document.getElementById("id_ajax_doc_more_buyers_xlsx") && "" != document.getElementById("id_ajax_doc_more_buyers_xlsx").innerHTML)
      {
        document.getElementById("id_ajax_doc_more_buyers_xlsx").style.display = "";
      }
    document.F1.main_contact_img_id_ul_name.value = '';
    document.F1.main_contact_img_id_ul_type.value = '';
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scBtnDisabled();
    scBtnLabel();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxAlert(do_ajax_form_clients_steps_renew_mob_submit_form_cb_after_alert);
  } // do_ajax_form_clients_steps_renew_mob_submit_form_cb
  function do_ajax_form_clients_steps_renew_mob_submit_form_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
    if (hasJsFormOnload)
    {
      sc_form_onload();
    }
  } // do_ajax_form_clients_steps_renew_mob_submit_form_cb_after_alert

  var scStatusDetail = {};

  function do_ajax_form_clients_steps_renew_mob_navigate_form()
  {
    if (scFormHasChanged) {
      scJs_confirm('<?php echo html_entity_decode($this->Ini->Nm_lang['lang_reload_confirm']) ?>', perform_ajax_form_clients_steps_renew_mob_navigate_form, function() {});
    } else {
      perform_ajax_form_clients_steps_renew_mob_navigate_form();
    }
  }

  function perform_ajax_form_clients_steps_renew_mob_navigate_form()
  {
    if (scRefreshTable())
    {
      return;
    }
    scAjaxHideMessage();
    scAjaxHideErrorDisplay("table");
    scAjaxHideErrorDisplay("dummy02");
    scAjaxHideErrorDisplay("dummy03");
    scAjaxHideErrorDisplay("co_name");
    scAjaxHideErrorDisplay("client_id");
    scAjaxHideErrorDisplay("mailing_address");
    scAjaxHideErrorDisplay("appn_date");
    scAjaxHideErrorDisplay("city");
    scAjaxHideErrorDisplay("bus_cat_id");
    scAjaxHideErrorDisplay("state");
    scAjaxHideErrorDisplay("bus_subcat_id");
    scAjaxHideErrorDisplay("zip_code");
    scAjaxHideErrorDisplay("bus_subcat_other");
    scAjaxHideErrorDisplay("phone_number");
    scAjaxHideErrorDisplay("website_url");
    scAjaxHideErrorDisplay("email");
    scAjaxHideErrorDisplay("acct_instagram");
    scAjaxHideErrorDisplay("dummy01");
    scAjaxHideErrorDisplay("acct_facebook");
    scAjaxHideErrorDisplay("dummy04");
    scAjaxHideErrorDisplay("dummy07");
    scAjaxHideErrorDisplay("dummy08");
    scAjaxHideErrorDisplay("main_contact_name");
    scAjaxHideErrorDisplay("main_contact_phone");
    scAjaxHideErrorDisplay("main_contact_email");
    scAjaxHideErrorDisplay("main_contact_title");
    scAjaxHideErrorDisplay("main_contact_img_id");
    scAjaxHideErrorDisplay("doc_type");
    scAjaxHideErrorDisplay("doc_file");
    scAjaxHideErrorDisplay("appn_note");
    scAjaxHideErrorDisplay("memb_name");
    scAjaxHideErrorDisplay("memb_phone");
    scAjaxHideErrorDisplay("memb_email");
    scAjaxHideErrorDisplay("memb_note");
    scAjaxHideErrorDisplay("member1_name");
    scAjaxHideErrorDisplay("member1_phone");
    scAjaxHideErrorDisplay("member1_email");
    scAjaxHideErrorDisplay("member1_note");
    scAjaxHideErrorDisplay("member2_name");
    scAjaxHideErrorDisplay("member2_phone");
    scAjaxHideErrorDisplay("member2_email");
    scAjaxHideErrorDisplay("member2_note");
    scAjaxHideErrorDisplay("member3_name");
    scAjaxHideErrorDisplay("member3_phone");
    scAjaxHideErrorDisplay("member3_email");
    scAjaxHideErrorDisplay("member3_note");
    scAjaxHideErrorDisplay("dummy05");
    scAjaxHideErrorDisplay("adtl_memb_name");
    scAjaxHideErrorDisplay("adtl_memb_phone");
    scAjaxHideErrorDisplay("adtl_memb_note");
    scAjaxHideErrorDisplay("addtl_memb_mail");
    scAjaxHideErrorDisplay("member4_name");
    scAjaxHideErrorDisplay("member4_phone");
    scAjaxHideErrorDisplay("member4_email");
    scAjaxHideErrorDisplay("member4_note");
    scAjaxHideErrorDisplay("member5_name");
    scAjaxHideErrorDisplay("member5_phone");
    scAjaxHideErrorDisplay("member5_email");
    scAjaxHideErrorDisplay("member5_note");
    scAjaxHideErrorDisplay("member6_name");
    scAjaxHideErrorDisplay("member6_phone");
    scAjaxHideErrorDisplay("member6_email");
    scAjaxHideErrorDisplay("member6_note");
    scAjaxHideErrorDisplay("member7_name");
    scAjaxHideErrorDisplay("member7_phone");
    scAjaxHideErrorDisplay("member7_email");
    scAjaxHideErrorDisplay("member7_note");
    scAjaxHideErrorDisplay("member8_name");
    scAjaxHideErrorDisplay("member8_phone");
    scAjaxHideErrorDisplay("member8_email");
    scAjaxHideErrorDisplay("member8_note");
    scAjaxHideErrorDisplay("member9_name");
    scAjaxHideErrorDisplay("member9_phone");
    scAjaxHideErrorDisplay("member9_email");
    scAjaxHideErrorDisplay("member9_note");
    scAjaxHideErrorDisplay("member10_name");
    scAjaxHideErrorDisplay("member10_phone");
    scAjaxHideErrorDisplay("member10_email");
    scAjaxHideErrorDisplay("member10_note");
    scAjaxHideErrorDisplay("dummy06");
    scAjaxHideErrorDisplay("xlsx_sample");
    scAjaxHideErrorDisplay("more_buyers_xlsx");
    scAjaxHideErrorDisplay("buyers_excel_qty");
    scAjaxHideErrorDisplay("dummy09");
    scAjaxHideErrorDisplay("dummy11");
    scAjaxHideErrorDisplay("rules");
    scAjaxHideErrorDisplay("rules_warn");
    scAjaxHideErrorDisplay("memb_levels");
    scAjaxHideErrorDisplay("est_memb_cost");
    scAjaxHideErrorDisplay("pay");
    scAjaxHideErrorDisplay("read_at_sign");
    scAjaxHideErrorDisplay("applicant_name");
    scAjaxHideErrorDisplay("applicant_title");
    scAjaxHideErrorDisplay("dummy10");
    scAjaxHideErrorDisplay("applicant_signature");
    var var_client_id = document.F2.client_id.value;
    var var_nm_form_submit = document.F2.nm_form_submit.value;
    var var_nmgp_opcao = document.F2.nmgp_opcao.value;
    var var_nmgp_ordem = document.F2.nmgp_ordem.value;
    var var_nmgp_arg_dyn_search = document.F2.nmgp_arg_dyn_search.value;
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn();
    x_ajax_form_clients_steps_renew_mob_navigate_form(var_client_id, var_nm_form_submit, var_nmgp_opcao, var_nmgp_ordem, var_nmgp_arg_dyn_search, var_script_case_init, do_ajax_form_clients_steps_renew_mob_navigate_form_cb);
  } // do_ajax_form_clients_steps_renew_mob_navigate_form

  var scMasterDetailParentIframe = "<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew_mob']['dashboard_info']['parent_widget'] ?>";
  var scMasterDetailIframe = {};
<?php
foreach ($this->Ini->sc_lig_iframe as $tmp_i => $tmp_v)
{
?>
  scMasterDetailIframe["<?php echo $tmp_i; ?>"] = "<?php echo $tmp_v; ?>";
<?php
}
?>
  function do_ajax_form_clients_steps_renew_mob_navigate_form_cb(sResp)
  {
    scAjaxProcOff();
    oResp = scAjaxResponse(sResp);
    var var_nmgp_opcao = document.F2.nmgp_opcao.value;
    scAjaxRedir();
    if (oResp['empty_filter'] && oResp['empty_filter'] == "ok")
    {
        document.F5.nmgp_opcao.value = "inicio";
        document.F5.nmgp_parms.value = "";
        document.F5.submit();
    }
    scAjaxClearErrors()
    scResetFormChanges()
    scJQSignatureReset();
    sc_mupload_ok = true;
    scAjaxSetFields(false);
    scAjaxSetVariables();
    scAjaxSetSummaryLine();
    document.F2.client_id.value = scAjaxGetKeyValue("client_id");
    scAjaxSetSummary();
    scAjaxShowDebug();
    scAjaxSetLabel(true);
    scAjaxSetReadonly(true);
    scAjaxSetMaster();
    scAjaxSetNavStatus("b");
    scAjaxSetDisplay(true);
    document.F1.main_contact_img_id_ul_name.value = '';
    document.F1.main_contact_img_id_ul_type.value = '';
    scAjaxSetBtnVars();
    $('.sc-js-ui-statusimg').css('display', 'none');
    scAjaxAlert(do_ajax_form_clients_steps_renew_mob_navigate_form_cb_after_alert);
  } // do_ajax_form_clients_steps_renew_mob_navigate_form_cb
  function do_ajax_form_clients_steps_renew_mob_navigate_form_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scFocusField('co_name');

    scAjaxSetFocus();
<?php
if ($this->Embutida_form)
{
?>
    do_ajax_form_clients_steps_renew_mob_restore_buttons();
<?php
}
?>
    if (hasJsFormOnload)
    {
      sc_form_onload();
    }
  } // do_ajax_form_clients_steps_renew_mob_navigate_form_cb_after_alert

  function sc_hide_form_clients_steps_renew_mob_form()
  {
    for (var block_id in ajax_block_id) {
      $("#div_" + ajax_block_id[block_id]).hide();
    }
  } // sc_hide_form_clients_steps_renew_mob_form


  function scAjaxDetailProc()
  {
    return true;
  } // scAjaxDetailProc


  var ajax_error_geral = "";

  var ajax_error_type = new Array("valid", "onblur", "onchange", "onclick", "onfocus");

  var ajax_field_list = new Array();
  var ajax_field_Dt_Hr = new Array();
  ajax_field_list[0] = "dummy02";
  ajax_field_list[1] = "dummy03";
  ajax_field_list[2] = "co_name";
  ajax_field_list[3] = "client_id";
  ajax_field_list[4] = "mailing_address";
  ajax_field_list[5] = "appn_date";
  ajax_field_list[6] = "city";
  ajax_field_list[7] = "bus_cat_id";
  ajax_field_list[8] = "state";
  ajax_field_list[9] = "bus_subcat_id";
  ajax_field_list[10] = "zip_code";
  ajax_field_list[11] = "bus_subcat_other";
  ajax_field_list[12] = "phone_number";
  ajax_field_list[13] = "website_url";
  ajax_field_list[14] = "email";
  ajax_field_list[15] = "acct_instagram";
  ajax_field_list[16] = "dummy01";
  ajax_field_list[17] = "acct_facebook";
  ajax_field_list[18] = "dummy04";
  ajax_field_list[19] = "dummy07";
  ajax_field_list[20] = "dummy08";
  ajax_field_list[21] = "main_contact_name";
  ajax_field_list[22] = "main_contact_phone";
  ajax_field_list[23] = "main_contact_email";
  ajax_field_list[24] = "main_contact_title";
  ajax_field_list[25] = "main_contact_img_id";
  ajax_field_list[26] = "doc_type";
  ajax_field_list[27] = "doc_file";
  ajax_field_list[28] = "appn_note";
  ajax_field_list[29] = "memb_name";
  ajax_field_list[30] = "memb_phone";
  ajax_field_list[31] = "memb_email";
  ajax_field_list[32] = "memb_note";
  ajax_field_list[33] = "member1_name";
  ajax_field_list[34] = "member1_phone";
  ajax_field_list[35] = "member1_email";
  ajax_field_list[36] = "member1_note";
  ajax_field_list[37] = "member2_name";
  ajax_field_list[38] = "member2_phone";
  ajax_field_list[39] = "member2_email";
  ajax_field_list[40] = "member2_note";
  ajax_field_list[41] = "member3_name";
  ajax_field_list[42] = "member3_phone";
  ajax_field_list[43] = "member3_email";
  ajax_field_list[44] = "member3_note";
  ajax_field_list[45] = "dummy05";
  ajax_field_list[46] = "adtl_memb_name";
  ajax_field_list[47] = "adtl_memb_phone";
  ajax_field_list[48] = "adtl_memb_note";
  ajax_field_list[49] = "addtl_memb_mail";
  ajax_field_list[50] = "member4_name";
  ajax_field_list[51] = "member4_phone";
  ajax_field_list[52] = "member4_email";
  ajax_field_list[53] = "member4_note";
  ajax_field_list[54] = "member5_name";
  ajax_field_list[55] = "member5_phone";
  ajax_field_list[56] = "member5_email";
  ajax_field_list[57] = "member5_note";
  ajax_field_list[58] = "member6_name";
  ajax_field_list[59] = "member6_phone";
  ajax_field_list[60] = "member6_email";
  ajax_field_list[61] = "member6_note";
  ajax_field_list[62] = "member7_name";
  ajax_field_list[63] = "member7_phone";
  ajax_field_list[64] = "member7_email";
  ajax_field_list[65] = "member7_note";
  ajax_field_list[66] = "member8_name";
  ajax_field_list[67] = "member8_phone";
  ajax_field_list[68] = "member8_email";
  ajax_field_list[69] = "member8_note";
  ajax_field_list[70] = "member9_name";
  ajax_field_list[71] = "member9_phone";
  ajax_field_list[72] = "member9_email";
  ajax_field_list[73] = "member9_note";
  ajax_field_list[74] = "member10_name";
  ajax_field_list[75] = "member10_phone";
  ajax_field_list[76] = "member10_email";
  ajax_field_list[77] = "member10_note";
  ajax_field_list[78] = "dummy06";
  ajax_field_list[79] = "xlsx_sample";
  ajax_field_list[80] = "more_buyers_xlsx";
  ajax_field_list[81] = "buyers_excel_qty";
  ajax_field_list[82] = "dummy09";
  ajax_field_list[83] = "dummy11";
  ajax_field_list[84] = "rules";
  ajax_field_list[85] = "rules_warn";
  ajax_field_list[86] = "memb_levels";
  ajax_field_list[87] = "est_memb_cost";
  ajax_field_list[88] = "pay";
  ajax_field_list[89] = "read_at_sign";
  ajax_field_list[90] = "applicant_name";
  ajax_field_list[91] = "applicant_title";
  ajax_field_list[92] = "dummy10";
  ajax_field_list[93] = "applicant_signature";

  var ajax_block_list = new Array();
  ajax_block_list[0] = "0";
  ajax_block_list[1] = "1";
  ajax_block_list[2] = "2";
  ajax_block_list[3] = "3";
  ajax_block_list[4] = "4";
  ajax_block_list[5] = "5";
  ajax_block_list[6] = "6";
  ajax_block_list[7] = "7";
  ajax_block_list[8] = "8";
  ajax_block_list[9] = "9";
  ajax_block_list[10] = "10";
  ajax_block_list[11] = "11";

  var ajax_error_list = {
    "dummy02": {"label": "", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "dummy03": {"label": "", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "co_name": {"label": "Company Name", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "client_id": {"label": "Application #", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "mailing_address": {"label": "Mailing Address", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "appn_date": {"label": "Application Date", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "city": {"label": "City", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "bus_cat_id": {"label": "Business Category", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "state": {"label": "State", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "bus_subcat_id": {"label": "Subcategory", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "zip_code": {"label": "Zip Code", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "bus_subcat_other": {"label": "If Other", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "phone_number": {"label": "Phone Number", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "website_url": {"label": "Company Website", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "email": {"label": "Email", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "acct_instagram": {"label": "Instagram", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "dummy01": {"label": "", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "acct_facebook": {"label": "Facebook", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "dummy04": {"label": "", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "dummy07": {"label": "", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "dummy08": {"label": "", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "main_contact_name": {"label": "Contact Name", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "main_contact_phone": {"label": "Contact Phone", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "main_contact_email": {"label": "Contact Email", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "main_contact_title": {"label": "Contact Title", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "main_contact_img_id": {"label": "Contact Driver<br>License or ID", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "doc_type": {"label": "Choose ONE Document from the options below to Upload:", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "doc_file": {"label": "Attachment:", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "appn_note": {"label": "Appn Note", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "memb_name": {"label": "Name", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "memb_phone": {"label": "Phone", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "memb_email": {"label": "Email", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "memb_note": {"label": "Note", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member1_name": {"label": "Name", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member1_phone": {"label": "Phone", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member1_email": {"label": "Email", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member1_note": {"label": "Note", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member2_name": {"label": "Name", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member2_phone": {"label": "Phone", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member2_email": {"label": "Email", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member2_note": {"label": "Note", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member3_name": {"label": "Name", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member3_phone": {"label": "Phone", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member3_email": {"label": "Email", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member3_note": {"label": "Member 3 Note", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "dummy05": {"label": "", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "adtl_memb_name": {"label": "Name", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "adtl_memb_phone": {"label": "Phone", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "adtl_memb_note": {"label": "Note", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "addtl_memb_mail": {"label": "Email", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member4_name": {"label": "Member 4 Name", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member4_phone": {"label": "Member 4 Phone", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member4_email": {"label": "Member 4 Email", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member4_note": {"label": "Member 4 Note", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member5_name": {"label": "Member 5 Name", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member5_phone": {"label": "Member 5 Phone", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member5_email": {"label": "Member 5 Email", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member5_note": {"label": "Member 5 Note", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member6_name": {"label": "Member 6 Name", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member6_phone": {"label": "Member 6 Phone", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member6_email": {"label": "Member 6 Email", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member6_note": {"label": "Member 6 Note", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member7_name": {"label": "Member 7 Name", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member7_phone": {"label": "Member 7 Phone", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member7_email": {"label": "Member 7 Email", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member7_note": {"label": "Member 7 Note", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member8_name": {"label": "Member 8 Name", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member8_phone": {"label": "Member 8 Phone", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member8_email": {"label": "Member 8 Email", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member8_note": {"label": "Member 8 Note", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member9_name": {"label": "Member 9 Name", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member9_phone": {"label": "Member 9 Phone", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member9_email": {"label": "Member 9 Email", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member9_note": {"label": "Member 9 Note", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member10_name": {"label": "Member 10 Name", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member10_phone": {"label": "Member 10 Phone", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member10_email": {"label": "Member 10 Email", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "member10_note": {"label": "Member 10 Note", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "dummy06": {"label": "#", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "xlsx_sample": {"label": "If more than 10 buyers are needed, you can use an <b>Excel file</b> to upload any additional buyers beyond the 10 already entered.<br>Please create, fill out, and upload an <b>Excel file</b> including the column headers listed in the example below:<br>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "more_buyers_xlsx": {"label": "Attachment:", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "buyers_excel_qty": {"label": "Please enter the number of buyers included in the attached Excel file:", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "dummy09": {"label": "", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "dummy11": {"label": "", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "rules": {"label": "rules", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "rules_warn": {"label": "rules_warn", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "memb_levels": {"label": "memb_levels", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "est_memb_cost": {"label": "est_memb_cost", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "pay": {"label": "Pay Membership", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "read_at_sign": {"label": "", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "applicant_name": {"label": "Applicant Name", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "applicant_title": {"label": "Applicant Title", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "dummy10": {"label": "", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0},
    "applicant_signature": {"label": "Applicant Signature (Please use your mouse or input device to sign below)", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 0}
  };
  var ajax_error_timeout = 0;

  var ajax_block_id = {
    "0": "hidden_bloco_0",
    "1": "hidden_bloco_1",
    "2": "hidden_bloco_2",
    "3": "hidden_bloco_3",
    "4": "hidden_bloco_4",
    "5": "hidden_bloco_5",
    "6": "hidden_bloco_6",
    "7": "hidden_bloco_7",
    "8": "hidden_bloco_8",
    "9": "hidden_bloco_9",
    "10": "hidden_bloco_10",
    "11": "hidden_bloco_11"
  };

  var ajax_block_tab = {
    "hidden_bloco_0": "",
    "hidden_bloco_1": "",
    "hidden_bloco_2": "",
    "hidden_bloco_3": "",
    "hidden_bloco_4": "",
    "hidden_bloco_5": "",
    "hidden_bloco_6": "",
    "hidden_bloco_7": "",
    "hidden_bloco_8": "",
    "hidden_bloco_9": "",
    "hidden_bloco_10": "",
    "hidden_bloco_11": ""
  };

  var ajax_field_mult = {
    "dummy02": new Array(),
    "dummy03": new Array(),
    "co_name": new Array(),
    "client_id": new Array(),
    "mailing_address": new Array(),
    "appn_date": new Array(),
    "city": new Array(),
    "bus_cat_id": new Array(),
    "state": new Array(),
    "bus_subcat_id": new Array(),
    "zip_code": new Array(),
    "bus_subcat_other": new Array(),
    "phone_number": new Array(),
    "website_url": new Array(),
    "email": new Array(),
    "acct_instagram": new Array(),
    "dummy01": new Array(),
    "acct_facebook": new Array(),
    "dummy04": new Array(),
    "dummy07": new Array(),
    "dummy08": new Array(),
    "main_contact_name": new Array(),
    "main_contact_phone": new Array(),
    "main_contact_email": new Array(),
    "main_contact_title": new Array(),
    "main_contact_img_id": new Array(),
    "doc_type": new Array(),
    "doc_file": new Array(),
    "appn_note": new Array(),
    "memb_name": new Array(),
    "memb_phone": new Array(),
    "memb_email": new Array(),
    "memb_note": new Array(),
    "member1_name": new Array(),
    "member1_phone": new Array(),
    "member1_email": new Array(),
    "member1_note": new Array(),
    "member2_name": new Array(),
    "member2_phone": new Array(),
    "member2_email": new Array(),
    "member2_note": new Array(),
    "member3_name": new Array(),
    "member3_phone": new Array(),
    "member3_email": new Array(),
    "member3_note": new Array(),
    "dummy05": new Array(),
    "adtl_memb_name": new Array(),
    "adtl_memb_phone": new Array(),
    "adtl_memb_note": new Array(),
    "addtl_memb_mail": new Array(),
    "member4_name": new Array(),
    "member4_phone": new Array(),
    "member4_email": new Array(),
    "member4_note": new Array(),
    "member5_name": new Array(),
    "member5_phone": new Array(),
    "member5_email": new Array(),
    "member5_note": new Array(),
    "member6_name": new Array(),
    "member6_phone": new Array(),
    "member6_email": new Array(),
    "member6_note": new Array(),
    "member7_name": new Array(),
    "member7_phone": new Array(),
    "member7_email": new Array(),
    "member7_note": new Array(),
    "member8_name": new Array(),
    "member8_phone": new Array(),
    "member8_email": new Array(),
    "member8_note": new Array(),
    "member9_name": new Array(),
    "member9_phone": new Array(),
    "member9_email": new Array(),
    "member9_note": new Array(),
    "member10_name": new Array(),
    "member10_phone": new Array(),
    "member10_email": new Array(),
    "member10_note": new Array(),
    "dummy06": new Array(),
    "xlsx_sample": new Array(),
    "more_buyers_xlsx": new Array(),
    "buyers_excel_qty": new Array(),
    "dummy09": new Array(),
    "dummy11": new Array(),
    "rules": new Array(),
    "rules_warn": new Array(),
    "memb_levels": new Array(),
    "est_memb_cost": new Array(),
    "pay": new Array(),
    "read_at_sign": new Array(),
    "applicant_name": new Array(),
    "applicant_title": new Array(),
    "dummy10": new Array(),
    "applicant_signature": new Array()
  };
  ajax_field_mult["dummy02"][1] = "dummy02";
  ajax_field_mult["dummy03"][1] = "dummy03";
  ajax_field_mult["co_name"][1] = "co_name";
  ajax_field_mult["client_id"][1] = "client_id";
  ajax_field_mult["mailing_address"][1] = "mailing_address";
  ajax_field_mult["appn_date"][1] = "appn_date";
  ajax_field_mult["city"][1] = "city";
  ajax_field_mult["bus_cat_id"][1] = "bus_cat_id";
  ajax_field_mult["state"][1] = "state";
  ajax_field_mult["bus_subcat_id"][1] = "bus_subcat_id";
  ajax_field_mult["zip_code"][1] = "zip_code";
  ajax_field_mult["bus_subcat_other"][1] = "bus_subcat_other";
  ajax_field_mult["phone_number"][1] = "phone_number";
  ajax_field_mult["website_url"][1] = "website_url";
  ajax_field_mult["email"][1] = "email";
  ajax_field_mult["acct_instagram"][1] = "acct_instagram";
  ajax_field_mult["dummy01"][1] = "dummy01";
  ajax_field_mult["acct_facebook"][1] = "acct_facebook";
  ajax_field_mult["dummy04"][1] = "dummy04";
  ajax_field_mult["dummy07"][1] = "dummy07";
  ajax_field_mult["dummy08"][1] = "dummy08";
  ajax_field_mult["main_contact_name"][1] = "main_contact_name";
  ajax_field_mult["main_contact_phone"][1] = "main_contact_phone";
  ajax_field_mult["main_contact_email"][1] = "main_contact_email";
  ajax_field_mult["main_contact_title"][1] = "main_contact_title";
  ajax_field_mult["main_contact_img_id"][1] = "main_contact_img_id";
  ajax_field_mult["doc_type"][1] = "doc_type";
  ajax_field_mult["doc_file"][1] = "doc_file";
  ajax_field_mult["appn_note"][1] = "appn_note";
  ajax_field_mult["memb_name"][1] = "memb_name";
  ajax_field_mult["memb_phone"][1] = "memb_phone";
  ajax_field_mult["memb_email"][1] = "memb_email";
  ajax_field_mult["memb_note"][1] = "memb_note";
  ajax_field_mult["member1_name"][1] = "member1_name";
  ajax_field_mult["member1_phone"][1] = "member1_phone";
  ajax_field_mult["member1_email"][1] = "member1_email";
  ajax_field_mult["member1_note"][1] = "member1_note";
  ajax_field_mult["member2_name"][1] = "member2_name";
  ajax_field_mult["member2_phone"][1] = "member2_phone";
  ajax_field_mult["member2_email"][1] = "member2_email";
  ajax_field_mult["member2_note"][1] = "member2_note";
  ajax_field_mult["member3_name"][1] = "member3_name";
  ajax_field_mult["member3_phone"][1] = "member3_phone";
  ajax_field_mult["member3_email"][1] = "member3_email";
  ajax_field_mult["member3_note"][1] = "member3_note";
  ajax_field_mult["dummy05"][1] = "dummy05";
  ajax_field_mult["adtl_memb_name"][1] = "adtl_memb_name";
  ajax_field_mult["adtl_memb_phone"][1] = "adtl_memb_phone";
  ajax_field_mult["adtl_memb_note"][1] = "adtl_memb_note";
  ajax_field_mult["addtl_memb_mail"][1] = "addtl_memb_mail";
  ajax_field_mult["member4_name"][1] = "member4_name";
  ajax_field_mult["member4_phone"][1] = "member4_phone";
  ajax_field_mult["member4_email"][1] = "member4_email";
  ajax_field_mult["member4_note"][1] = "member4_note";
  ajax_field_mult["member5_name"][1] = "member5_name";
  ajax_field_mult["member5_phone"][1] = "member5_phone";
  ajax_field_mult["member5_email"][1] = "member5_email";
  ajax_field_mult["member5_note"][1] = "member5_note";
  ajax_field_mult["member6_name"][1] = "member6_name";
  ajax_field_mult["member6_phone"][1] = "member6_phone";
  ajax_field_mult["member6_email"][1] = "member6_email";
  ajax_field_mult["member6_note"][1] = "member6_note";
  ajax_field_mult["member7_name"][1] = "member7_name";
  ajax_field_mult["member7_phone"][1] = "member7_phone";
  ajax_field_mult["member7_email"][1] = "member7_email";
  ajax_field_mult["member7_note"][1] = "member7_note";
  ajax_field_mult["member8_name"][1] = "member8_name";
  ajax_field_mult["member8_phone"][1] = "member8_phone";
  ajax_field_mult["member8_email"][1] = "member8_email";
  ajax_field_mult["member8_note"][1] = "member8_note";
  ajax_field_mult["member9_name"][1] = "member9_name";
  ajax_field_mult["member9_phone"][1] = "member9_phone";
  ajax_field_mult["member9_email"][1] = "member9_email";
  ajax_field_mult["member9_note"][1] = "member9_note";
  ajax_field_mult["member10_name"][1] = "member10_name";
  ajax_field_mult["member10_phone"][1] = "member10_phone";
  ajax_field_mult["member10_email"][1] = "member10_email";
  ajax_field_mult["member10_note"][1] = "member10_note";
  ajax_field_mult["dummy06"][1] = "dummy06";
  ajax_field_mult["xlsx_sample"][1] = "xlsx_sample";
  ajax_field_mult["more_buyers_xlsx"][1] = "more_buyers_xlsx";
  ajax_field_mult["buyers_excel_qty"][1] = "buyers_excel_qty";
  ajax_field_mult["dummy09"][1] = "dummy09";
  ajax_field_mult["dummy11"][1] = "dummy11";
  ajax_field_mult["rules"][1] = "rules";
  ajax_field_mult["rules_warn"][1] = "rules_warn";
  ajax_field_mult["memb_levels"][1] = "memb_levels";
  ajax_field_mult["est_memb_cost"][1] = "est_memb_cost";
  ajax_field_mult["pay"][1] = "pay";
  ajax_field_mult["read_at_sign"][1] = "read_at_sign";
  ajax_field_mult["applicant_name"][1] = "applicant_name";
  ajax_field_mult["applicant_title"][1] = "applicant_title";
  ajax_field_mult["dummy10"][1] = "dummy10";
  ajax_field_mult["applicant_signature"][1] = "applicant_signature";

  var ajax_field_id = {
    "dummy02": new Array("hidden_field_label_dummy02", "hidden_field_data_dummy02"),
    "dummy03": new Array("hidden_field_label_dummy03", "hidden_field_data_dummy03"),
    "co_name": new Array("hidden_field_label_co_name", "hidden_field_data_co_name"),
    "client_id": new Array("hidden_field_label_client_id", "hidden_field_data_client_id"),
    "mailing_address": new Array("hidden_field_label_mailing_address", "hidden_field_data_mailing_address"),
    "appn_date": new Array("hidden_field_label_appn_date", "hidden_field_data_appn_date"),
    "city": new Array("hidden_field_label_city", "hidden_field_data_city"),
    "bus_cat_id": new Array("hidden_field_label_bus_cat_id", "hidden_field_data_bus_cat_id"),
    "state": new Array("hidden_field_label_state", "hidden_field_data_state"),
    "bus_subcat_id": new Array("hidden_field_label_bus_subcat_id", "hidden_field_data_bus_subcat_id"),
    "zip_code": new Array("hidden_field_label_zip_code", "hidden_field_data_zip_code"),
    "bus_subcat_other": new Array("hidden_field_label_bus_subcat_other", "hidden_field_data_bus_subcat_other"),
    "phone_number": new Array("hidden_field_label_phone_number", "hidden_field_data_phone_number"),
    "website_url": new Array("hidden_field_label_website_url", "hidden_field_data_website_url"),
    "email": new Array("hidden_field_label_email", "hidden_field_data_email"),
    "acct_instagram": new Array("hidden_field_label_acct_instagram", "hidden_field_data_acct_instagram"),
    "dummy01": new Array("hidden_field_label_dummy01", "hidden_field_data_dummy01"),
    "acct_facebook": new Array("hidden_field_label_acct_facebook", "hidden_field_data_acct_facebook"),
    "dummy04": new Array("hidden_field_label_dummy04", "hidden_field_data_dummy04"),
    "dummy07": new Array("hidden_field_label_dummy07", "hidden_field_data_dummy07"),
    "dummy08": new Array("hidden_field_label_dummy08", "hidden_field_data_dummy08"),
    "main_contact_name": new Array("hidden_field_label_main_contact_name", "hidden_field_data_main_contact_name"),
    "main_contact_phone": new Array("hidden_field_label_main_contact_phone", "hidden_field_data_main_contact_phone"),
    "main_contact_email": new Array("hidden_field_label_main_contact_email", "hidden_field_data_main_contact_email"),
    "main_contact_title": new Array("hidden_field_label_main_contact_title", "hidden_field_data_main_contact_title"),
    "main_contact_img_id": new Array("hidden_field_label_main_contact_img_id", "hidden_field_data_main_contact_img_id"),
    "doc_type": new Array("hidden_field_label_doc_type", "hidden_field_data_doc_type"),
    "doc_file": new Array("hidden_field_label_doc_file", "hidden_field_data_doc_file"),
    "appn_note": new Array("hidden_field_label_appn_note", "hidden_field_data_appn_note"),
    "memb_name": new Array("hidden_field_label_memb_name", "hidden_field_data_memb_name"),
    "memb_phone": new Array("hidden_field_label_memb_phone", "hidden_field_data_memb_phone"),
    "memb_email": new Array("hidden_field_label_memb_email", "hidden_field_data_memb_email"),
    "memb_note": new Array("hidden_field_label_memb_note", "hidden_field_data_memb_note"),
    "member1_name": new Array("hidden_field_label_member1_name", "hidden_field_data_member1_name"),
    "member1_phone": new Array("hidden_field_label_member1_phone", "hidden_field_data_member1_phone"),
    "member1_email": new Array("hidden_field_label_member1_email", "hidden_field_data_member1_email"),
    "member1_note": new Array("hidden_field_label_member1_note", "hidden_field_data_member1_note"),
    "member2_name": new Array("hidden_field_label_member2_name", "hidden_field_data_member2_name"),
    "member2_phone": new Array("hidden_field_label_member2_phone", "hidden_field_data_member2_phone"),
    "member2_email": new Array("hidden_field_label_member2_email", "hidden_field_data_member2_email"),
    "member2_note": new Array("hidden_field_label_member2_note", "hidden_field_data_member2_note"),
    "member3_name": new Array("hidden_field_label_member3_name", "hidden_field_data_member3_name"),
    "member3_phone": new Array("hidden_field_label_member3_phone", "hidden_field_data_member3_phone"),
    "member3_email": new Array("hidden_field_label_member3_email", "hidden_field_data_member3_email"),
    "member3_note": new Array("hidden_field_label_member3_note", "hidden_field_data_member3_note"),
    "dummy05": new Array("hidden_field_label_dummy05", "hidden_field_data_dummy05"),
    "adtl_memb_name": new Array("hidden_field_label_adtl_memb_name", "hidden_field_data_adtl_memb_name"),
    "adtl_memb_phone": new Array("hidden_field_label_adtl_memb_phone", "hidden_field_data_adtl_memb_phone"),
    "adtl_memb_note": new Array("hidden_field_label_adtl_memb_note", "hidden_field_data_adtl_memb_note"),
    "addtl_memb_mail": new Array("hidden_field_label_addtl_memb_mail", "hidden_field_data_addtl_memb_mail"),
    "member4_name": new Array("hidden_field_label_member4_name", "hidden_field_data_member4_name"),
    "member4_phone": new Array("hidden_field_label_member4_phone", "hidden_field_data_member4_phone"),
    "member4_email": new Array("hidden_field_label_member4_email", "hidden_field_data_member4_email"),
    "member4_note": new Array("hidden_field_label_member4_note", "hidden_field_data_member4_note"),
    "member5_name": new Array("hidden_field_label_member5_name", "hidden_field_data_member5_name"),
    "member5_phone": new Array("hidden_field_label_member5_phone", "hidden_field_data_member5_phone"),
    "member5_email": new Array("hidden_field_label_member5_email", "hidden_field_data_member5_email"),
    "member5_note": new Array("hidden_field_label_member5_note", "hidden_field_data_member5_note"),
    "member6_name": new Array("hidden_field_label_member6_name", "hidden_field_data_member6_name"),
    "member6_phone": new Array("hidden_field_label_member6_phone", "hidden_field_data_member6_phone"),
    "member6_email": new Array("hidden_field_label_member6_email", "hidden_field_data_member6_email"),
    "member6_note": new Array("hidden_field_label_member6_note", "hidden_field_data_member6_note"),
    "member7_name": new Array("hidden_field_label_member7_name", "hidden_field_data_member7_name"),
    "member7_phone": new Array("hidden_field_label_member7_phone", "hidden_field_data_member7_phone"),
    "member7_email": new Array("hidden_field_label_member7_email", "hidden_field_data_member7_email"),
    "member7_note": new Array("hidden_field_label_member7_note", "hidden_field_data_member7_note"),
    "member8_name": new Array("hidden_field_label_member8_name", "hidden_field_data_member8_name"),
    "member8_phone": new Array("hidden_field_label_member8_phone", "hidden_field_data_member8_phone"),
    "member8_email": new Array("hidden_field_label_member8_email", "hidden_field_data_member8_email"),
    "member8_note": new Array("hidden_field_label_member8_note", "hidden_field_data_member8_note"),
    "member9_name": new Array("hidden_field_label_member9_name", "hidden_field_data_member9_name"),
    "member9_phone": new Array("hidden_field_label_member9_phone", "hidden_field_data_member9_phone"),
    "member9_email": new Array("hidden_field_label_member9_email", "hidden_field_data_member9_email"),
    "member9_note": new Array("hidden_field_label_member9_note", "hidden_field_data_member9_note"),
    "member10_name": new Array("hidden_field_label_member10_name", "hidden_field_data_member10_name"),
    "member10_phone": new Array("hidden_field_label_member10_phone", "hidden_field_data_member10_phone"),
    "member10_email": new Array("hidden_field_label_member10_email", "hidden_field_data_member10_email"),
    "member10_note": new Array("hidden_field_label_member10_note", "hidden_field_data_member10_note"),
    "dummy06": new Array("hidden_field_label_dummy06", "hidden_field_data_dummy06"),
    "xlsx_sample": new Array("hidden_field_label_xlsx_sample", "hidden_field_data_xlsx_sample"),
    "more_buyers_xlsx": new Array("hidden_field_label_more_buyers_xlsx", "hidden_field_data_more_buyers_xlsx"),
    "buyers_excel_qty": new Array("hidden_field_label_buyers_excel_qty", "hidden_field_data_buyers_excel_qty"),
    "dummy09": new Array("hidden_field_label_dummy09", "hidden_field_data_dummy09"),
    "dummy11": new Array("hidden_field_label_dummy11", "hidden_field_data_dummy11"),
    "rules": new Array("hidden_field_label_rules", "hidden_field_data_rules"),
    "rules_warn": new Array("hidden_field_label_rules_warn", "hidden_field_data_rules_warn"),
    "memb_levels": new Array("hidden_field_label_memb_levels", "hidden_field_data_memb_levels"),
    "est_memb_cost": new Array("hidden_field_label_est_memb_cost", "hidden_field_data_est_memb_cost"),
    "pay": new Array("hidden_field_label_pay", "hidden_field_data_pay"),
    "read_at_sign": new Array("hidden_field_label_read_at_sign", "hidden_field_data_read_at_sign"),
    "applicant_name": new Array("hidden_field_label_applicant_name", "hidden_field_data_applicant_name"),
    "applicant_title": new Array("hidden_field_label_applicant_title", "hidden_field_data_applicant_title"),
    "dummy10": new Array("hidden_field_label_dummy10", "hidden_field_data_dummy10"),
    "applicant_signature": new Array("hidden_field_label_applicant_signature", "hidden_field_data_applicant_signature")
  };

  var ajax_read_only = {
    "dummy02": "off",
    "dummy03": "off",
    "co_name": "off",
    "client_id": "on",
    "mailing_address": "off",
    "appn_date": "off",
    "city": "off",
    "bus_cat_id": "off",
    "state": "off",
    "bus_subcat_id": "off",
    "zip_code": "off",
    "bus_subcat_other": "off",
    "phone_number": "off",
    "website_url": "off",
    "email": "off",
    "acct_instagram": "off",
    "dummy01": "off",
    "acct_facebook": "off",
    "dummy04": "off",
    "dummy07": "off",
    "dummy08": "off",
    "main_contact_name": "off",
    "main_contact_phone": "off",
    "main_contact_email": "off",
    "main_contact_title": "off",
    "main_contact_img_id": "off",
    "doc_type": "off",
    "doc_file": "off",
    "appn_note": "off",
    "memb_name": "off",
    "memb_phone": "off",
    "memb_email": "off",
    "memb_note": "off",
    "member1_name": "off",
    "member1_phone": "off",
    "member1_email": "off",
    "member1_note": "off",
    "member2_name": "off",
    "member2_phone": "off",
    "member2_email": "off",
    "member2_note": "off",
    "member3_name": "off",
    "member3_phone": "off",
    "member3_email": "off",
    "member3_note": "off",
    "dummy05": "off",
    "adtl_memb_name": "off",
    "adtl_memb_phone": "off",
    "adtl_memb_note": "off",
    "addtl_memb_mail": "off",
    "member4_name": "off",
    "member4_phone": "off",
    "member4_email": "off",
    "member4_note": "off",
    "member5_name": "off",
    "member5_phone": "off",
    "member5_email": "off",
    "member5_note": "off",
    "member6_name": "off",
    "member6_phone": "off",
    "member6_email": "off",
    "member6_note": "off",
    "member7_name": "off",
    "member7_phone": "off",
    "member7_email": "off",
    "member7_note": "off",
    "member8_name": "off",
    "member8_phone": "off",
    "member8_email": "off",
    "member8_note": "off",
    "member9_name": "off",
    "member9_phone": "off",
    "member9_email": "off",
    "member9_note": "off",
    "member10_name": "off",
    "member10_phone": "off",
    "member10_email": "off",
    "member10_note": "off",
    "dummy06": "off",
    "xlsx_sample": "off",
    "more_buyers_xlsx": "off",
    "buyers_excel_qty": "off",
    "dummy09": "off",
    "dummy11": "off",
    "rules": "off",
    "rules_warn": "off",
    "memb_levels": "off",
    "est_memb_cost": "off",
    "pay": "off",
    "read_at_sign": "off",
    "applicant_name": "off",
    "applicant_title": "off",
    "dummy10": "off",
    "applicant_signature": "off"
  };
  var bRefreshTable = false;
  function scRefreshTable()
  {
    return false;
  }

  function scAjaxDetailValue(sIndex, sValue)
  {
    var aValue = new Array();
    aValue[0] = {"value" : sValue};
    if ("dummy02" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("dummy03" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("co_name" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("client_id" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("mailing_address" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("appn_date" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("city" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("bus_cat_id" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("state" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("bus_subcat_id" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("zip_code" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("bus_subcat_other" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("phone_number" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("website_url" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("email" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("acct_instagram" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("dummy01" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("acct_facebook" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("dummy04" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("dummy07" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("dummy08" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("main_contact_name" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("main_contact_phone" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("main_contact_email" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("main_contact_title" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("main_contact_img_id" == sIndex)
    {
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("doc_type" == sIndex)
    {
      scAjaxSetFieldCheckbox(sIndex, aValue, null, 1, null, null, "", "", "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("doc_file" == sIndex)
    {
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("appn_note" == sIndex)
    {
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("memb_name" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("memb_phone" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("memb_email" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("memb_note" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member1_name" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member1_phone" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member1_email" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member1_note" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member2_name" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member2_phone" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member2_email" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member2_note" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member3_name" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member3_phone" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member3_email" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member3_note" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("dummy05" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("adtl_memb_name" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("adtl_memb_phone" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("adtl_memb_note" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("addtl_memb_mail" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member4_name" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member4_phone" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member4_email" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member4_note" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member5_name" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member5_phone" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member5_email" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member5_note" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member6_name" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member6_phone" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member6_email" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member6_note" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member7_name" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member7_phone" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member7_email" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member7_note" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member8_name" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member8_phone" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member8_email" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member8_note" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member9_name" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member9_phone" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member9_email" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member9_note" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member10_name" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member10_phone" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member10_email" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("member10_note" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("dummy06" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("xlsx_sample" == sIndex)
    {
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("more_buyers_xlsx" == sIndex)
    {
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("buyers_excel_qty" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("dummy09" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("dummy11" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rules" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("rules_warn" == sIndex)
    {
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("memb_levels" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("est_memb_cost" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("pay" == sIndex)
    {
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("read_at_sign" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("applicant_name" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("applicant_title" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("dummy10" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("applicant_signature" == sIndex)
    {
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    scAjaxSetFieldInnerHtml(sIndex, aValue);
  }
 </SCRIPT>
