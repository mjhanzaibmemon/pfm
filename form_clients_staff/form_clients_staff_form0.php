<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

header("X-XSS-Protection: 1; mode=block");
header("X-Frame-Options: SAMEORIGIN");

?>
<!DOCTYPE html>

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("PFM - Buyers Pass App"); } else { echo strip_tags("PFM - Buyers Pass App"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <link rel="shortcut icon" href="../_lib/img/grp__NM__bg__NM__pfm_img.png">
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
            <meta name="viewport" content="minimal-ui, width=300, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
            <meta name="mobile-web-app-capable" content="yes">
            <meta name="apple-mobile-web-app-capable" content="yes">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <link rel="apple-touch-icon"   sizes="57x57" href="">
            <link rel="apple-touch-icon"   sizes="60x60" href="">
            <link rel="apple-touch-icon"   sizes="72x72" href="">
            <link rel="apple-touch-icon"   sizes="76x76" href="">
            <link rel="apple-touch-icon" sizes="114x114" href="">
            <link rel="apple-touch-icon" sizes="120x120" href="">
            <link rel="apple-touch-icon" sizes="144x144" href="">
            <link rel="apple-touch-icon" sizes="152x152" href="">
            <link rel="apple-touch-icon" sizes="180x180" href="">
            <link rel="icon" type="image/png" sizes="192x192" href="">
            <link rel="icon" type="image/png"   sizes="32x32" href="">
            <link rel="icon" type="image/png"   sizes="96x96" href="">
            <link rel="icon" type="image/png"   sizes="16x16" href="">
            <meta name="msapplication-TileColor" content="___">
            <meta name="msapplication-TileImage" content="">
            <meta name="theme-color" content="___">
            <meta name="apple-mobile-web-app-status-bar-style" content="___">
            <link rel="shortcut icon" href=""> <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_userSweetAlertDisplayed = false;
 </SCRIPT>
 <SCRIPT type="text/javascript">
  var sc_blockCol = '<?php echo $this->Ini->Block_img_col; ?>';
  var sc_blockExp = '<?php echo $this->Ini->Block_img_exp; ?>';
  var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax; ?>';
  var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax; ?>';
  var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax; ?>';
  var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax; ?>';
  var sc_ajaxMsgTime = 2;
  var sc_img_status_ok = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_ok; ?>';
  var sc_img_status_err = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_err; ?>';
  var sc_css_status = '<?php echo $this->Ini->Css_status; ?>';
  var sc_css_status_pwd_box = '<?php echo $this->Ini->Css_status_pwd_box; ?>';
  var sc_css_status_pwd_text = '<?php echo $this->Ini->Css_status_pwd_text; ?>';
 </SCRIPT>
        <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_third; ?>jquery/js/jquery.js"></SCRIPT>
            <?php
               if ($_SESSION['scriptcase']['display_mobile'] && $_SESSION['scriptcase']['device_mobile']) {
                   $forced_mobile = (isset($_SESSION['scriptcase']['force_mobile']) && $_SESSION['scriptcase']['force_mobile']) ? 'true' : 'false';
                   $sc_app_data   = json_encode([
                       'forceMobile' => $forced_mobile,
                       'appType' => 'form',
                       'improvements' => true,
                       'displayOptionsButton' => false,
                       'displayScrollUp' => true,
                       'scrollUpPosition' => 'A',
                       'toolbarOrientation' => 'H',
                       'mobilePanes' => 'true',
                       'navigationBarButtons' => unserialize('a:3:{i:0;s:2:"NP";i:1;s:2:"FL";i:2;s:2:"RC";}'),
                       'mobileSimpleToolbar' => true,
                       'bottomToolbarFixed' => true
                   ]); ?>
            <input type="hidden" id="sc-mobile-app-data" value='<?php echo $sc_app_data; ?>' />
            <script type="text/javascript" src="../_lib/lib/js/nm_modal_panes.jquery.js"></script>
            <script type="text/javascript" src="../_lib/lib/js/nm_form_mobile.js"></script>
            <link rel='stylesheet' href='../_lib/lib/css/nm_form_mobile.css' type='text/css'/>
            <script>
                $(document).ready(function(){

                    bootstrapMobile();

                });
            </script>
            <?php } ?> <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
<style type="text/css">
.ui-datepicker { z-index: 6 !important }
</style>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>frameControl.js"></script>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/viewerjs/viewer.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/viewerjs/viewer.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
<style type="text/css">
.sc-button-image.disabled {
        opacity: 0.25
}
.sc-button-image.disabled img {
        cursor: default !important
}
</style>
 <style type="text/css">
  .fileinput-button-padding {
   padding: 3px 10px !important;
  }
  .fileinput-button {
   position: relative;
   overflow: hidden;
   float: left;
   margin-right: 4px;
  }
  .fileinput-button input {
   position: absolute;
   top: 0;
   right: 0;
   margin: 0;
   border: solid transparent;
   border-width: 0 0 100px 200px;
   opacity: 0;
   filter: alpha(opacity=0);
   -moz-transform: translate(-300px, 0) scale(4);
   direction: ltr;
   cursor: pointer;
  }
 </style>
<?php
$miniCalendarFA = $this->jqueryFAFile('calendar');
if ('' != $miniCalendarFA) {
?>
<style type="text/css">
.css_read_off_permanent_member_date button {
        background-color: transparent;
        border: 0;
        padding: 0
}
.css_read_off_renewal_date button {
        background-color: transparent;
        border: 0;
        padding: 0
}
.css_read_off_starting_date button {
        background-color: transparent;
        border: 0;
        padding: 0
}
.css_read_off_expiration_date button {
        background-color: transparent;
        border: 0;
        padding: 0
}
.css_read_off_cancel_date button {
        background-color: transparent;
        border: 0;
        padding: 0
}
.css_read_off_retire_date button {
        background-color: transparent;
        border: 0;
        padding: 0
}
.css_read_off_date_last_updated button {
        background-color: transparent;
        border: 0;
        padding: 0
}
.css_read_off_archive_date button {
        background-color: transparent;
        border: 0;
        padding: 0
}
.css_read_off_record_created button {
        background-color: transparent;
        border: 0;
        padding: 0
}
</style>
<?php
}
?>
 <style type="text/css">
  .scSpin_membershipid_obj {
   border: 0 !important;
   margin: 0 20px 0 0 !important;
  }
 </style>
<?php

if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['link_info']['margin_top']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['link_info']['margin_top']) {
?>
<style>
.scFormBorder {
    padding-top: 0 !important;
}
.scBlockRowFirst .scFormTable {
    margin-top: <?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['link_info']['margin_top'] ?>;
}
</style>
<?php
}

?>

<style type="text/css">
        .sc.switch {
                position: relative;
                display: inline-flex;
        }

        .sc.switch span {
                display: inline-block;
                margin-right: 5px;
        }

        .sc.switch span {
                background: #DFDFDF;
                width: 22px;
                height: 14px;
                display: block;
                position: relative;
                top: 0px;
                left: 0;
                border-radius: 15px;
                padding: 0 3px;
                transition: all .2s linear;
                box-shadow: 0px 0px 2px rgba(164, 164, 164, 0.8) inset;
        }

        .sc.switch span:before {
                content: '\2713';
                display: inline-block;
                color: white;
                font-size: 10px;
                z-index: 0;
                position: absolute;
                top: 0;
                left: 4px;
        }

        .sc.switch span:after {
                content: '';
                background: white;
                width: 12px;
                height: 12px;
                display: block;
                position: absolute;
                top: 1px;
                left: 1px;
                border-radius: 15px;
                transition: all .2s linear;
                z-index: 1;
        }

        .sc.switch input {
                margin-right: 10px;
                cursor: pointer;
                z-index: 2;
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                opacity: 0;
                margin: 0;
                padding: 0;
        }

        .sc.switch input:disabled + span {
                opacity: 0.35;
        }

        .sc.switch input:checked + span {
                background: #66AFE9;
        }

        .sc.switch input:checked + span:after {
                left: calc(100% - 1px);
                transform: translateX(-100%);
        }

        .sc.radio {
                position: relative;
                display: inline-flex;
        }

        .sc.radio span {
                display: inline-block;
                margin-right: 5px;
        }

        .sc.radio span {
                background: #ffffff;
                border: 1px solid #66AFE9;
                width: 12px;
                height: 12px;
                display: block;
                position: relative;
                top: 0px;
                left: 0;
                border-radius: 15px;
                transition: all .2s;
                box-shadow: 0px 0px 2px rgba(164, 164, 164, 0.8) inset;
        }

        .sc.radio span:after {
                content: '';
                background: #66AFE9;
                width: 12px;
                height: 12px;
                display: block;
                position: absolute;
                top: 0;
                left: 0;
                border-radius: 15px;
                transition: all .2s;
                z-index: 1;
                transform: scale(0);
        }

        .sc.radio input {
                cursor: pointer;
                z-index: 2;
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                opacity: 0;
                margin: 0;
                padding: 0;
        }

        .sc.radio input:disabled + span {
                opacity: 0.35;
        }

        .sc.radio input:checked + span {
                background: #66AFE9;
        }

        .sc.radio input:checked + span:after {
                transform: translateX(-100%);
                transform: scale(1);
        }
</style>
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
  <?php 
  if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
  { 
  ?> 
  <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
  <?php 
  } 
  ?> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/6/css/all.min.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_clients_staff/form_clients_staff_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_tiny_mce; ?>"></SCRIPT>
 <STYLE>
.tox-toolbar, .tox-toolbar__primary {justify-content: left !important}
 </STYLE>

<script>
var scFocusFirstErrorField = true;
var scFocusFirstErrorName  = "<?php if (isset($this->scFormFocusErrorName)) {echo $this->scFormFocusErrorName;} ?>";
</script>

<?php
include_once("form_clients_staff_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
var scFormCtrlChanged = true;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_binicio     = "<?php echo $this->arr_buttons['binicio']['type']; ?>";
var Nav_bavanca     = "<?php echo $this->arr_buttons['bavanca']['type']; ?>";
var Nav_bretorna    = "<?php echo $this->arr_buttons['bretorna']['type']; ?>";
var Nav_bfinal      = "<?php echo $this->arr_buttons['bfinal']['type']; ?>";
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['last'] : 'off'); ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
<?php
 if (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)
 {
     echo " return;";
 }
 else
 {
?>
 if ('S' == str_ret)
 {
<?php
    if (isset($this->nmgp_botoes['first']) && $this->nmgp_botoes['first'] == "on")
    {
?>
       if ("off" == Nav_binicio_macro_disabled) { $("#sc_b_ini_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
    if (isset($this->nmgp_botoes['back']) && $this->nmgp_botoes['back'] == "on")
    {
?>
       if ("off" == Nav_bretorna_macro_disabled) { $("#sc_b_ret_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
?>
 }
 else
 {
<?php
    if (isset($this->nmgp_botoes['first']) && $this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if (isset($this->nmgp_botoes['back']) && $this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
 if ('S' == str_ava)
 {
<?php
    if (isset($this->nmgp_botoes['last']) && $this->nmgp_botoes['last'] == "on")
    {
?>
       if ("off" == Nav_bfinal_macro_disabled) { $("#sc_b_fim_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
    if (isset($this->nmgp_botoes['forward']) && $this->nmgp_botoes['forward'] == "on")
    {
?>
       if ("off" == Nav_bavanca_macro_disabled) { $("#sc_b_avc_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
?>
 }
 else
 {
<?php
    if (isset($this->nmgp_botoes['last']) && $this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if (isset($this->nmgp_botoes['forward']) && $this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
<?php
  }
?>
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}

 function refresh_member_list() {
  // Refresh details form : members
  document.getElementById('nmsc_iframe_liga_form_members_staff').contentDocument.location.reload(true);
  
  
 } // refresh_member_list
<?php

include_once('form_clients_staff_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

<?php
if (!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName)
{
?>
  scFocusField('co_name');

<?php
}
?>
  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

  var i, iTestWidth, iMaxLabelWidth = 0, $labelList = $(".scUiLabelWidthFix");
  for (i = 0; i < $labelList.length; i++) {
    iTestWidth = $($labelList[i]).width();
    sTestWidth = iTestWidth + "";
    if ("" == iTestWidth) {
      iTestWidth = 0;
    }
    else if ("px" == sTestWidth.substr(sTestWidth.length - 2)) {
      iTestWidth = parseInt(sTestWidth.substr(0, sTestWidth.length - 2));
    }
    iMaxLabelWidth = Math.max(iMaxLabelWidth, iTestWidth);
  }
  if (0 < iMaxLabelWidth) {
    $(".scUiLabelWidthFix").css("width", iMaxLabelWidth + "px");
  }
<?php
if (!$this->NM_ajax_flag && isset($this->NM_non_ajax_info['ajaxJavascript']) && !empty($this->NM_non_ajax_info['ajaxJavascript']))
{
    foreach ($this->NM_non_ajax_info['ajaxJavascript'] as $aFnData)
    {
?>
  <?php echo $aFnData[0]; ?>(<?php echo implode(', ', $aFnData[1]); ?>);

<?php
    }
}
?>
 });

   $(window).on('load', function() {
   });
 if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
  
 };

 function toggleBlock(e) {
  var block = e.data.block,
      block_id = $(block).attr("id");
      block_img = $("#" + block_id + " .sc-ui-block-control");

  if (1 >= block.rows.length) {
   return;
  }

  show_block[block_id] = !show_block[block_id];

  if (show_block[block_id]) {
    $(block).css("height", "100%");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockCol));
  }
  else {
    $(block).css("height", "");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockExp));
  }

  for (var i = 1; i < block.rows.length; i++) {
   if (show_block[block_id])
    $(block.rows[i]).show();
   else
    $(block.rows[i]).hide();
  }

  if (show_block[block_id]) {
    if ("hidden_bloco_2" == block_id) {
      scAjaxDetailHeight("form_members_staff", "600");
    }
    if ("hidden_bloco_3" == block_id) {
      scAjaxDetailHeight("grid_client_docs_2", "500");
    }
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    $remove_background = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['remove_background']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['remove_background'] ? 'background-color: transparent; background-image: none; ' : '';
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['link_info']['remove_margin']) {
        $remove_margin = 'margin: 0; ';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['link_info']['remove_background']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['link_info']['remove_background']) {
        $remove_background = 'background-color: transparent; background-image: none; ';
    }
    if ('' != $remove_margin && isset($str_iframe_body) && '' != $str_iframe_body) {
        $str_iframe_body = '';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['link_info']['remove_border']) {
        $remove_border = 'border-width: 0; ';
    }
    if ('' != $remove_background) {
?>
<style>
.scFormBorder { <?php echo $remove_background ?> }
.scFormToolbar { <?php echo $remove_background ?> }
</style>
<?php
    }
    $vertical_center = '';
?>
<body class="scFormPage sc-app-form" style="<?php echo $remove_margin . $remove_background . $str_iframe_body . $vertical_center; ?>">
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
<div id="idJSSpecChar" style="display: none;"></div>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("form_clients_staff_js0.php");
?>
<script type="text/javascript"> 
 function setLocale(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_idioma_novo.value = sLocale;
 }
 function setSchema(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_schema_f.value = sLocale;
 }
var scInsertFieldWithErrors = new Array();
<?php
foreach ($this->NM_ajax_info['fieldsWithErrors'] as $insertFieldName) {
?>
scInsertFieldWithErrors.push("<?php echo $insertFieldName; ?>");
<?php
}
?>
$(function() {
        scAjaxError_markFieldList(scInsertFieldWithErrors);
});
 </script>
<form  name="F1" method="post" enctype="multipart/form-data" 
               action="./" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['insert_validation']; ?>">
<?php
}
?>
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>">
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>">
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" />
<input type="hidden" name="upload_file_flag" value="">
<input type="hidden" name="upload_file_check" value="">
<input type="hidden" name="upload_file_name" value="">
<input type="hidden" name="upload_file_temp" value="">
<input type="hidden" name="upload_file_libs" value="">
<input type="hidden" name="upload_file_height" value="">
<input type="hidden" name="upload_file_width" value="">
<input type="hidden" name="upload_file_aspect" value="">
<input type="hidden" name="upload_file_type" value="">
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_clients_staff'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_clients_staff'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable scFormToastTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle scFormToastTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?><?php echo $this->Ini->Nm_lang['lang_errm_errt'] ?></td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
</td></tr></table></td></tr>
<tr><td class="scFormErrorMessage scFormToastMessage"><span id="id_error_display_table_text"></span></td></tr>
</table>
</div>
<div style="display: none; position: absolute; z-index: 1000" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><?php
if ('' != $this->Ini->Msg_ico_title) {
?>
<img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_title; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmessageclose", "_scAjaxMessageBtnClose()", "_scAjaxMessageBtnClose()", "id_message_display_close_icon", "", "", "float: right", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><?php
if ('' != $this->Ini->Msg_ico_body) {
?>
<img id="id_message_display_body_icon" src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_body; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br /><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onClick="_scAjaxMessageBtnClick()" ></div></td>
  </tr>
 </table>
</div>
<?php
$msgDefClose = isset($this->arr_buttons['bmessageclose']) ? $this->arr_buttons['bmessageclose']['value'] : 'Ok';
?>
<script type="text/javascript">
var scMsgDefTitle = "<?php if (isset($this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl'])) {echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl'];} ?>";
var scMsgDefButton = "Ok";
var scMsgDefClose = "<?php echo $msgDefClose; ?>";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->sc_page; ?>";
</script>
<?php
if ($this->record_insert_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmi']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
if ($this->record_delete_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmd']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
?>
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="65%">
 <tr>
  <td>
  <div class="scFormBorder" style="<?php echo (isset($remove_border) ? $remove_border : ''); ?>">
   <table width='100%' cellspacing=0 cellpadding=0>
<tr><td>
<?php
$this->displayTopToolbar();
?>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
    $NM_btn = false;
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['run_iframe'] != "R")
{
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-1';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['update'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['btn_delete_backend'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['btn_delete_backend']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['btn_delete_backend']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['btn_delete_backend']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['btn_delete_backend']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['btn_delete_backend'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "btn_delete_backend", "scBtnFn_btn_delete_backend()", "scBtnFn_btn_delete_backend()", "sc_btn_delete_backend_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['coll_pmt_js'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['coll_pmt_js']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['coll_pmt_js']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['coll_pmt_js']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['coll_pmt_js']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['coll_pmt_js'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "coll_pmt_js", "scBtnFn_coll_pmt_js()", "scBtnFn_coll_pmt_js()", "sc_coll_pmt_js_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['email_client_if_active'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['email_client_if_active']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['email_client_if_active']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['email_client_if_active']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['email_client_if_active']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['email_client_if_active'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "email_client_if_active", "scBtnFn_email_client_if_active()", "scBtnFn_email_client_if_active()", "sc_email_client_if_active_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
        $sCondStyle = ($this->nmgp_botoes['reload'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-2';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['breload']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['breload']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['breload']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['breload']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['breload'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "breload", "scBtnFn_sys_format_reload()", "scBtnFn_sys_format_reload()", "sc_b_reload_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['btn_back_reqs'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['btn_back_reqs']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['btn_back_reqs']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['btn_back_reqs']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['btn_back_reqs']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['btn_back_reqs'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "btn_back_reqs", "scBtnFn_btn_back_reqs()", "scBtnFn_btn_back_reqs()", "sc_btn_back_reqs_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
        $sCondStyle = ($this->nmgp_botoes['btn_back_renewals'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['btn_back_renewals']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['btn_back_renewals']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['btn_back_renewals']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['btn_back_renewals']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['btn_back_renewals'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "btn_back_renewals", "scBtnFn_btn_back_renewals()", "scBtnFn_btn_back_renewals()", "sc_btn_back_renewals_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
        $sCondStyle = ($this->nmgp_botoes['back_clients'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['back_clients']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['back_clients']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['back_clients']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['back_clients']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['back_clients'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "back_clients", "scBtnFn_back_clients()", "scBtnFn_back_clients()", "sc_back_clients_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['close_tab'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['close_tab']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['close_tab']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['close_tab']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['close_tab']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['close_tab'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "close_tab", "scBtnFn_close_tab()", "scBtnFn_close_tab()", "sc_close_tab_top", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');</script><?php } ?>
</td></tr> 
<tr><td>
<?php
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow scBlockRowFirst"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0" class="scBlockFrame"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['js_prod_price']))
   {
       $this->nmgp_cmp_hidden['js_prod_price'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['js_strp_price_id']))
   {
       $this->nmgp_cmp_hidden['js_strp_price_id'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['js_mbr_ct']))
   {
       $this->nmgp_cmp_hidden['js_mbr_ct'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['js_client_id']))
   {
       $this->nmgp_cmp_hidden['js_client_id'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><script type="text/javascript">
function sc_change_tabs(bTabDisp, sTabId, sTabParts)
{
  if (document.getElementById(sTabId)) {
    if (bTabDisp) {
      document.getElementById("div_" + sTabId).style.width = "";
      document.getElementById("div_" + sTabId).style.height = "";
      document.getElementById("div_" + sTabId).style.display = "";
      document.getElementById("div_" + sTabId).style.overflow = "visible";
      document.getElementById(sTabParts).className = "scTabActive";
      if ("hidden_bloco_2" == sTabId) {
        scAjaxDetailHeight("form_members_staff", "600");
      }
      if ("hidden_bloco_3" == sTabId) {
        scAjaxDetailHeight("grid_client_docs_2", "500");
      }
      if ("hidden_bloco_4" == sTabId) {
        scAjaxDetailHeight("form_client_pmts", "500");
      }
      if ("hidden_bloco_5" == sTabId) {
        scAjaxDetailHeight("grid_client_notes", "500");
      }
    }
    else {
      document.getElementById("div_" + sTabId).style.width = "1px";
      document.getElementById("div_" + sTabId).style.height = "0px";
      document.getElementById("div_" + sTabId).style.display = "none";
      document.getElementById("div_" + sTabId).style.overflow = "scroll";
      document.getElementById(sTabParts).className = "scTabInactive";
    }
  }
}
</script>
<input type="hidden" name="main_contact_img_id_ul_name" id="id_sc_field_main_contact_img_id_ul_name" value="<?php echo $this->form_encode_input($this->main_contact_img_id_ul_name);?>">
<input type="hidden" name="main_contact_img_id_ul_type" id="id_sc_field_main_contact_img_id_ul_type" value="<?php echo $this->form_encode_input($this->main_contact_img_id_ul_type);?>">
   <tr>


    <TD colspan="4" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">COMPANY  INFORMATION</TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dummy02']))
    {
        $this->nm_new_label['dummy02'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dummy02 = $this->dummy02;
   $sStyleHidden_dummy02 = '';
   if (isset($this->nmgp_cmp_hidden['dummy02']) && $this->nmgp_cmp_hidden['dummy02'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dummy02']);
       $sStyleHidden_dummy02 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dummy02 = 'display: none;';
   $sStyleReadInp_dummy02 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dummy02']) && $this->nmgp_cmp_readonly['dummy02'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dummy02']);
       $sStyleReadLab_dummy02 = '';
       $sStyleReadInp_dummy02 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dummy02']) && $this->nmgp_cmp_hidden['dummy02'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dummy02" value="<?php echo $this->form_encode_input($dummy02) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_dummy02_label" id="hidden_field_label_dummy02" style="<?php echo $sStyleHidden_dummy02; ?>"><span id="id_label_dummy02"><?php echo $this->nm_new_label['dummy02']; ?></span></TD>
    <TD class="scFormDataOdd css_dummy02_line" id="hidden_field_data_dummy02" style="<?php echo $sStyleHidden_dummy02; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dummy02_line" style="vertical-align: top;padding: 0px"><span id="id_ajax_label_dummy02"><?php echo $dummy02?></span>
<input type="hidden" name="dummy02" value="<?php echo $this->form_encode_input($dummy02); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dummy02_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dummy02_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['membershipid']))
    {
        $this->nm_new_label['membershipid'] = "Membership No.";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $membershipid = $this->membershipid;
   $sStyleHidden_membershipid = 'display: none;';
   if (isset($this->nmgp_cmp_hidden['membershipid']) && $this->nmgp_cmp_hidden['membershipid'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['membershipid']);
       $sStyleHidden_membershipid = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_membershipid = 'display: none;';
   $sStyleReadInp_membershipid = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['membershipid']) && $this->nmgp_cmp_readonly['membershipid'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['membershipid']);
       $sStyleReadLab_membershipid = '';
       $sStyleReadInp_membershipid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['membershipid']) && $this->nmgp_cmp_hidden['membershipid'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="membershipid" value="<?php echo $this->form_encode_input($membershipid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_membershipid_label" id="hidden_field_label_membershipid" style="<?php echo $sStyleHidden_membershipid; ?>"><span id="id_label_membershipid"><?php echo $this->nm_new_label['membershipid']; ?></span></TD>
    <TD class="scFormDataOdd css_membershipid_line" id="hidden_field_data_membershipid" style="<?php echo $sStyleHidden_membershipid; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_membershipid_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["membershipid"]) &&  $this->nmgp_cmp_readonly["membershipid"] == "on") { 

 ?>
<input type="hidden" name="membershipid" value="<?php echo $this->form_encode_input($membershipid) . "\">" . $membershipid . ""; ?>
<?php } else { ?>
<span id="id_read_on_membershipid" class="sc-ui-readonly-membershipid css_membershipid_line" style="<?php echo $sStyleReadLab_membershipid; ?>"><?php echo $this->form_format_readonly("membershipid", $this->form_encode_input($this->membershipid)); ?></span><span id="id_read_off_membershipid" class="css_read_off_membershipid<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_membershipid; ?>">
 <input class="sc-js-input scFormObjectOdd scFormObjectOddSpin scSpin_membershipid_obj css_membershipid_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_membershipid" type=text name="membershipid" value="<?php echo $this->form_encode_input($membershipid) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '', thousandsFormat: <?php echo $this->field_config['membershipid']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['membershipid']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span class="css_membershipid_label scFormHelpOdd">&nbsp;(MS Access database ID)
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_membershipid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_membershipid_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['client_id']))
           {
               $this->nmgp_cmp_readonly['client_id'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['co_name']))
    {
        $this->nm_new_label['co_name'] = "Company Name";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $co_name = $this->co_name;
   $sStyleHidden_co_name = '';
   if (isset($this->nmgp_cmp_hidden['co_name']) && $this->nmgp_cmp_hidden['co_name'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['co_name']);
       $sStyleHidden_co_name = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_co_name = 'display: none;';
   $sStyleReadInp_co_name = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['co_name']) && $this->nmgp_cmp_readonly['co_name'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['co_name']);
       $sStyleReadLab_co_name = '';
       $sStyleReadInp_co_name = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['co_name']) && $this->nmgp_cmp_hidden['co_name'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="co_name" value="<?php echo $this->form_encode_input($co_name) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_co_name_label" id="hidden_field_label_co_name" style="<?php echo $sStyleHidden_co_name; ?>"><span id="id_label_co_name"><?php echo $this->nm_new_label['co_name']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['co_name']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['co_name'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_co_name_line" id="hidden_field_data_co_name" style="<?php echo $sStyleHidden_co_name; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_co_name_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["co_name"]) &&  $this->nmgp_cmp_readonly["co_name"] == "on") { 

 ?>
<input type="hidden" name="co_name" value="<?php echo $this->form_encode_input($co_name) . "\">" . $co_name . ""; ?>
<?php } else { ?>
<span id="id_read_on_co_name" class="sc-ui-readonly-co_name css_co_name_line" style="<?php echo $sStyleReadLab_co_name; ?>"><?php echo $this->form_format_readonly("co_name", $this->form_encode_input($this->co_name)); ?></span><span id="id_read_off_co_name" class="css_read_off_co_name<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_co_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_co_name_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_co_name" type=text name="co_name" value="<?php echo $this->form_encode_input($co_name) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_co_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_co_name_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['client_id']))
    {
        $this->nm_new_label['client_id'] = "Membership No.";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $client_id = $this->client_id;
   $sStyleHidden_client_id = '';
   if (isset($this->nmgp_cmp_hidden['client_id']) && $this->nmgp_cmp_hidden['client_id'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['client_id']);
       $sStyleHidden_client_id = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_client_id = 'display: none;';
   $sStyleReadInp_client_id = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["client_id"]) &&  $this->nmgp_cmp_readonly["client_id"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['client_id']);
       $sStyleReadLab_client_id = '';
       $sStyleReadInp_client_id = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['client_id']) && $this->nmgp_cmp_hidden['client_id'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="client_id" value="<?php echo $this->form_encode_input($client_id) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_client_id_label" id="hidden_field_label_client_id" style="<?php echo $sStyleHidden_client_id; ?>"><span id="id_label_client_id"><?php echo $this->nm_new_label['client_id']; ?></span></TD>
    <TD class="scFormDataOdd css_client_id_line" id="hidden_field_data_client_id" style="<?php echo $sStyleHidden_client_id; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_client_id_line" style="padding: 0px">
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { 
 ?>
<span id="id_read_on_client_id" css_client_id_line" style="<?php echo $sStyleReadLab_client_id; ?>"><?php echo $this->form_format_readonly("client_id", $this->form_encode_input($this->client_id)); ?></span><span id="id_read_off_client_id" class="css_read_off_client_id" style="<?php echo $sStyleReadInp_client_id; ?>"><input type="hidden" name="client_id" value="<?php echo $this->form_encode_input($client_id) . "\">"?><span id="id_ajax_label_client_id"><?php echo nl2br($client_id); ?></span>
</span><?php } else { ?>
&nbsp;
<?php } ?>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_client_id_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_client_id_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['mailing_address']))
    {
        $this->nm_new_label['mailing_address'] = "Mailing Address";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $mailing_address = $this->mailing_address;
   $sStyleHidden_mailing_address = '';
   if (isset($this->nmgp_cmp_hidden['mailing_address']) && $this->nmgp_cmp_hidden['mailing_address'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['mailing_address']);
       $sStyleHidden_mailing_address = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_mailing_address = 'display: none;';
   $sStyleReadInp_mailing_address = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['mailing_address']) && $this->nmgp_cmp_readonly['mailing_address'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['mailing_address']);
       $sStyleReadLab_mailing_address = '';
       $sStyleReadInp_mailing_address = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['mailing_address']) && $this->nmgp_cmp_hidden['mailing_address'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="mailing_address" value="<?php echo $this->form_encode_input($mailing_address) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_mailing_address_label" id="hidden_field_label_mailing_address" style="<?php echo $sStyleHidden_mailing_address; ?>"><span id="id_label_mailing_address"><?php echo $this->nm_new_label['mailing_address']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['mailing_address']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['mailing_address'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_mailing_address_line" id="hidden_field_data_mailing_address" style="<?php echo $sStyleHidden_mailing_address; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_mailing_address_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["mailing_address"]) &&  $this->nmgp_cmp_readonly["mailing_address"] == "on") { 

 ?>
<input type="hidden" name="mailing_address" value="<?php echo $this->form_encode_input($mailing_address) . "\">" . $mailing_address . ""; ?>
<?php } else { ?>
<span id="id_read_on_mailing_address" class="sc-ui-readonly-mailing_address css_mailing_address_line" style="<?php echo $sStyleReadLab_mailing_address; ?>"><?php echo $this->form_format_readonly("mailing_address", $this->form_encode_input($this->mailing_address)); ?></span><span id="id_read_off_mailing_address" class="css_read_off_mailing_address<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_mailing_address; ?>">
 <input class="sc-js-input scFormObjectOdd css_mailing_address_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_mailing_address" type=text name="mailing_address" value="<?php echo $this->form_encode_input($mailing_address) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_mailing_address_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_mailing_address_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['memb_status_id']))
   {
       $this->nm_new_label['memb_status_id'] = "Membership Status";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $memb_status_id = $this->memb_status_id;
   $sStyleHidden_memb_status_id = '';
   if (isset($this->nmgp_cmp_hidden['memb_status_id']) && $this->nmgp_cmp_hidden['memb_status_id'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['memb_status_id']);
       $sStyleHidden_memb_status_id = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_memb_status_id = 'display: none;';
   $sStyleReadInp_memb_status_id = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['memb_status_id']) && $this->nmgp_cmp_readonly['memb_status_id'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['memb_status_id']);
       $sStyleReadLab_memb_status_id = '';
       $sStyleReadInp_memb_status_id = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['memb_status_id']) && $this->nmgp_cmp_hidden['memb_status_id'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="memb_status_id" value="<?php echo $this->form_encode_input($this->memb_status_id) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_memb_status_id_label" id="hidden_field_label_memb_status_id" style="<?php echo $sStyleHidden_memb_status_id; ?>"><span id="id_label_memb_status_id"><?php echo $this->nm_new_label['memb_status_id']; ?></span></TD>
    <TD class="scFormDataOdd css_memb_status_id_line" id="hidden_field_data_memb_status_id" style="<?php echo $sStyleHidden_memb_status_id; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_memb_status_id_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["memb_status_id"]) &&  $this->nmgp_cmp_readonly["memb_status_id"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_memb_status_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_memb_status_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_memb_status_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_memb_status_id'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_memb_status_id']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_memb_status_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_memb_status_id']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_memb_status_id'] = array(); 
    }

   $old_value_membershipid = $this->membershipid;
   $old_value_client_id = $this->client_id;
   $old_value_state = $this->state;
   $old_value_zip_code = $this->zip_code;
   $old_value_permanent_member_date = $this->permanent_member_date;
   $old_value_renewal_date = $this->renewal_date;
   $old_value_main_contact_phone = $this->main_contact_phone;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_membershipid = $this->membershipid;
   $unformatted_value_client_id = $this->client_id;
   $unformatted_value_state = $this->state;
   $unformatted_value_zip_code = $this->zip_code;
   $unformatted_value_permanent_member_date = $this->permanent_member_date;
   $unformatted_value_renewal_date = $this->renewal_date;
   $unformatted_value_main_contact_phone = $this->main_contact_phone;

   $archive_val_str = "";
   if (!empty($this->archive))
   {
       if (is_array($this->archive))
       {
           $Tmp_array = $this->archive;
       }
       else
       {
           $Tmp_array = explode(";", $this->archive);
       }
       $archive_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $archive_val_str)
          {
             $archive_val_str .= ", ";
          }
          $archive_val_str .= $Tmp_val_cmp;
       }
   }
   $doc_type_val_str = "''";
   if (!empty($this->doc_type))
   {
       if (is_array($this->doc_type))
       {
           $Tmp_array = $this->doc_type;
       }
       else
       {
           $Tmp_array = explode(";", $this->doc_type);
       }
       $doc_type_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $doc_type_val_str)
          {
             $doc_type_val_str .= ", ";
          }
          $doc_type_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $paid_val_str = "''";
   if (!empty($this->paid))
   {
       if (is_array($this->paid))
       {
           $Tmp_array = $this->paid;
       }
       else
       {
           $Tmp_array = explode(";", $this->paid);
       }
       $paid_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $paid_val_str)
          {
             $paid_val_str .= ", ";
          }
          $paid_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT memb_status_id, status  FROM members_status  ORDER BY status";

   $this->membershipid = $old_value_membershipid;
   $this->client_id = $old_value_client_id;
   $this->state = $old_value_state;
   $this->zip_code = $old_value_zip_code;
   $this->permanent_member_date = $old_value_permanent_member_date;
   $this->renewal_date = $old_value_renewal_date;
   $this->main_contact_phone = $old_value_main_contact_phone;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_memb_status_id'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $memb_status_id_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->memb_status_id_1))
          {
              foreach ($this->memb_status_id_1 as $tmp_memb_status_id)
              {
                  if (trim($tmp_memb_status_id) === trim($cadaselect[1])) {$memb_status_id_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->memb_status_id) && trim($this->memb_status_id) === trim($cadaselect[1])) {$memb_status_id_look .= $cadaselect[0];} 
          $x++; 
   }

?>
<input type="hidden" name="memb_status_id" value="<?php echo $this->form_encode_input($memb_status_id) . "\">" . $memb_status_id_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_memb_status_id();
   $x = 0 ; 
   $memb_status_id_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->memb_status_id_1))
          {
              foreach ($this->memb_status_id_1 as $tmp_memb_status_id)
              {
                  if (trim($tmp_memb_status_id) === trim($cadaselect[1])) {$memb_status_id_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->memb_status_id)) {
                 if (trim($this->memb_status_id) == trim($cadaselect[1])) { $memb_status_id_look .= $cadaselect[0]; } 
          }
          elseif (isset($cadaselect[1]) && $this->memb_status_id == $cadaselect[1]) { $memb_status_id_look .= $cadaselect[0]; 
          }
          $x++; 
   }
          if (empty($memb_status_id_look))
          {
              $memb_status_id_look = $this->memb_status_id;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_memb_status_id\" class=\"css_memb_status_id_line\" style=\"" .  $sStyleReadLab_memb_status_id . "\">" . $this->form_format_readonly("memb_status_id", $this->form_encode_input($memb_status_id_look)) . "</span><span id=\"id_read_off_memb_status_id\" class=\"css_read_off_memb_status_id" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_memb_status_id . "\">";
   echo " <span id=\"idAjaxSelect_memb_status_id\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_memb_status_id_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_memb_status_id\" name=\"memb_status_id\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_memb_status_id'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Choose") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->memb_status_id) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->memb_status_id)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_memb_status_id_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_memb_status_id_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['city']))
    {
        $this->nm_new_label['city'] = "City";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $city = $this->city;
   $sStyleHidden_city = '';
   if (isset($this->nmgp_cmp_hidden['city']) && $this->nmgp_cmp_hidden['city'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['city']);
       $sStyleHidden_city = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_city = 'display: none;';
   $sStyleReadInp_city = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['city']) && $this->nmgp_cmp_readonly['city'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['city']);
       $sStyleReadLab_city = '';
       $sStyleReadInp_city = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['city']) && $this->nmgp_cmp_hidden['city'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="city" value="<?php echo $this->form_encode_input($city) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_city_label" id="hidden_field_label_city" style="<?php echo $sStyleHidden_city; ?>"><span id="id_label_city"><?php echo $this->nm_new_label['city']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['city']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['city'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_city_line" id="hidden_field_data_city" style="<?php echo $sStyleHidden_city; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_city_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["city"]) &&  $this->nmgp_cmp_readonly["city"] == "on") { 

 ?>
<input type="hidden" name="city" value="<?php echo $this->form_encode_input($city) . "\">" . $city . ""; ?>
<?php } else { ?>
<span id="id_read_on_city" class="sc-ui-readonly-city css_city_line" style="<?php echo $sStyleReadLab_city; ?>"><?php echo $this->form_format_readonly("city", $this->form_encode_input($this->city)); ?></span><span id="id_read_off_city" class="css_read_off_city<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_city; ?>">
 <input class="sc-js-input scFormObjectOdd css_city_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_city" type=text name="city" value="<?php echo $this->form_encode_input($city) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'first', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_city_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_city_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['pricing_level_id']))
   {
       $this->nm_new_label['pricing_level_id'] = "Membership Level";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pricing_level_id = $this->pricing_level_id;
   $sStyleHidden_pricing_level_id = '';
   if (isset($this->nmgp_cmp_hidden['pricing_level_id']) && $this->nmgp_cmp_hidden['pricing_level_id'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pricing_level_id']);
       $sStyleHidden_pricing_level_id = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pricing_level_id = 'display: none;';
   $sStyleReadInp_pricing_level_id = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pricing_level_id']) && $this->nmgp_cmp_readonly['pricing_level_id'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pricing_level_id']);
       $sStyleReadLab_pricing_level_id = '';
       $sStyleReadInp_pricing_level_id = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pricing_level_id']) && $this->nmgp_cmp_hidden['pricing_level_id'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="pricing_level_id" value="<?php echo $this->form_encode_input($this->pricing_level_id) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_pricing_level_id_label" id="hidden_field_label_pricing_level_id" style="<?php echo $sStyleHidden_pricing_level_id; ?>"><span id="id_label_pricing_level_id"><?php echo $this->nm_new_label['pricing_level_id']; ?></span></TD>
    <TD class="scFormDataOdd css_pricing_level_id_line" id="hidden_field_data_pricing_level_id" style="<?php echo $sStyleHidden_pricing_level_id; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pricing_level_id_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pricing_level_id"]) &&  $this->nmgp_cmp_readonly["pricing_level_id"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_pricing_level_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_pricing_level_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_pricing_level_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_pricing_level_id'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_pricing_level_id']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_pricing_level_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_pricing_level_id']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_pricing_level_id'] = array(); 
    }

   $old_value_membershipid = $this->membershipid;
   $old_value_client_id = $this->client_id;
   $old_value_state = $this->state;
   $old_value_zip_code = $this->zip_code;
   $old_value_permanent_member_date = $this->permanent_member_date;
   $old_value_renewal_date = $this->renewal_date;
   $old_value_main_contact_phone = $this->main_contact_phone;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_membershipid = $this->membershipid;
   $unformatted_value_client_id = $this->client_id;
   $unformatted_value_state = $this->state;
   $unformatted_value_zip_code = $this->zip_code;
   $unformatted_value_permanent_member_date = $this->permanent_member_date;
   $unformatted_value_renewal_date = $this->renewal_date;
   $unformatted_value_main_contact_phone = $this->main_contact_phone;

   $archive_val_str = "";
   if (!empty($this->archive))
   {
       if (is_array($this->archive))
       {
           $Tmp_array = $this->archive;
       }
       else
       {
           $Tmp_array = explode(";", $this->archive);
       }
       $archive_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $archive_val_str)
          {
             $archive_val_str .= ", ";
          }
          $archive_val_str .= $Tmp_val_cmp;
       }
   }
   $doc_type_val_str = "''";
   if (!empty($this->doc_type))
   {
       if (is_array($this->doc_type))
       {
           $Tmp_array = $this->doc_type;
       }
       else
       {
           $Tmp_array = explode(";", $this->doc_type);
       }
       $doc_type_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $doc_type_val_str)
          {
             $doc_type_val_str .= ", ";
          }
          $doc_type_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $paid_val_str = "''";
   if (!empty($this->paid))
   {
       if (is_array($this->paid))
       {
           $Tmp_array = $this->paid;
       }
       else
       {
           $Tmp_array = explode(";", $this->paid);
       }
       $paid_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $paid_val_str)
          {
             $paid_val_str .= ", ";
          }
          $paid_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT memb_lev_id, descript  FROM members_level  WHERE active ORDER BY sort_by";

   $this->membershipid = $old_value_membershipid;
   $this->client_id = $old_value_client_id;
   $this->state = $old_value_state;
   $this->zip_code = $old_value_zip_code;
   $this->permanent_member_date = $old_value_permanent_member_date;
   $this->renewal_date = $old_value_renewal_date;
   $this->main_contact_phone = $old_value_main_contact_phone;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_pricing_level_id'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $pricing_level_id_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->pricing_level_id_1))
          {
              foreach ($this->pricing_level_id_1 as $tmp_pricing_level_id)
              {
                  if (trim($tmp_pricing_level_id) === trim($cadaselect[1])) {$pricing_level_id_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->pricing_level_id) && trim($this->pricing_level_id) === trim($cadaselect[1])) {$pricing_level_id_look .= $cadaselect[0];} 
          $x++; 
   }

?>
<input type="hidden" name="pricing_level_id" value="<?php echo $this->form_encode_input($pricing_level_id) . "\">" . $pricing_level_id_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_pricing_level_id();
   $x = 0 ; 
   $pricing_level_id_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->pricing_level_id_1))
          {
              foreach ($this->pricing_level_id_1 as $tmp_pricing_level_id)
              {
                  if (trim($tmp_pricing_level_id) === trim($cadaselect[1])) {$pricing_level_id_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->pricing_level_id)) {
                 if (trim($this->pricing_level_id) == trim($cadaselect[1])) { $pricing_level_id_look .= $cadaselect[0]; } 
          }
          elseif (isset($cadaselect[1]) && $this->pricing_level_id == $cadaselect[1]) { $pricing_level_id_look .= $cadaselect[0]; 
          }
          $x++; 
   }
          if (empty($pricing_level_id_look))
          {
              $pricing_level_id_look = $this->pricing_level_id;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_pricing_level_id\" class=\"css_pricing_level_id_line\" style=\"" .  $sStyleReadLab_pricing_level_id . "\">" . $this->form_format_readonly("pricing_level_id", $this->form_encode_input($pricing_level_id_look)) . "</span><span id=\"id_read_off_pricing_level_id\" class=\"css_read_off_pricing_level_id" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_pricing_level_id . "\">";
   echo " <span id=\"idAjaxSelect_pricing_level_id\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_pricing_level_id_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_pricing_level_id\" name=\"pricing_level_id\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_pricing_level_id'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Choose") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->pricing_level_id) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->pricing_level_id)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pricing_level_id_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pricing_level_id_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['state']))
    {
        $this->nm_new_label['state'] = "State";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $state = $this->state;
   $sStyleHidden_state = '';
   if (isset($this->nmgp_cmp_hidden['state']) && $this->nmgp_cmp_hidden['state'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['state']);
       $sStyleHidden_state = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_state = 'display: none;';
   $sStyleReadInp_state = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['state']) && $this->nmgp_cmp_readonly['state'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['state']);
       $sStyleReadLab_state = '';
       $sStyleReadInp_state = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['state']) && $this->nmgp_cmp_hidden['state'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="state" value="<?php echo $this->form_encode_input($state) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_state_label" id="hidden_field_label_state" style="<?php echo $sStyleHidden_state; ?>"><span id="id_label_state"><?php echo $this->nm_new_label['state']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['state']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['state'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_state_line" id="hidden_field_data_state" style="<?php echo $sStyleHidden_state; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_state_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["state"]) &&  $this->nmgp_cmp_readonly["state"] == "on") { 

 ?>
<input type="hidden" name="state" value="<?php echo $this->form_encode_input($state) . "\">" . $state . ""; ?>
<?php } else { ?>
<span id="id_read_on_state" class="sc-ui-readonly-state css_state_line" style="<?php echo $sStyleReadLab_state; ?>"><?php echo $this->form_format_readonly("state", $this->form_encode_input($this->state)); ?></span><span id="id_read_off_state" class="css_read_off_state<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_state; ?>">
 <input class="sc-js-input scFormObjectOdd css_state_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_state" type=text name="state" value="<?php echo $this->form_encode_input($state) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> maxlength=4 alt="{datatype: 'mask', maxLength: 2, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', maskList: 'aa', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_state_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_state_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['bus_cat_id']))
   {
       $this->nm_new_label['bus_cat_id'] = "Business Category";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $bus_cat_id = $this->bus_cat_id;
   $sStyleHidden_bus_cat_id = '';
   if (isset($this->nmgp_cmp_hidden['bus_cat_id']) && $this->nmgp_cmp_hidden['bus_cat_id'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['bus_cat_id']);
       $sStyleHidden_bus_cat_id = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_bus_cat_id = 'display: none;';
   $sStyleReadInp_bus_cat_id = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['bus_cat_id']) && $this->nmgp_cmp_readonly['bus_cat_id'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['bus_cat_id']);
       $sStyleReadLab_bus_cat_id = '';
       $sStyleReadInp_bus_cat_id = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['bus_cat_id']) && $this->nmgp_cmp_hidden['bus_cat_id'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="bus_cat_id" value="<?php echo $this->form_encode_input($this->bus_cat_id) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_bus_cat_id_label" id="hidden_field_label_bus_cat_id" style="<?php echo $sStyleHidden_bus_cat_id; ?>"><span id="id_label_bus_cat_id"><?php echo $this->nm_new_label['bus_cat_id']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['bus_cat_id']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['bus_cat_id'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_bus_cat_id_line" id="hidden_field_data_bus_cat_id" style="<?php echo $sStyleHidden_bus_cat_id; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_bus_cat_id_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bus_cat_id"]) &&  $this->nmgp_cmp_readonly["bus_cat_id"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_cat_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_cat_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_cat_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_cat_id'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_cat_id']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_cat_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_cat_id']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_cat_id'] = array(); 
    }

   $old_value_membershipid = $this->membershipid;
   $old_value_client_id = $this->client_id;
   $old_value_state = $this->state;
   $old_value_zip_code = $this->zip_code;
   $old_value_permanent_member_date = $this->permanent_member_date;
   $old_value_renewal_date = $this->renewal_date;
   $old_value_main_contact_phone = $this->main_contact_phone;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_membershipid = $this->membershipid;
   $unformatted_value_client_id = $this->client_id;
   $unformatted_value_state = $this->state;
   $unformatted_value_zip_code = $this->zip_code;
   $unformatted_value_permanent_member_date = $this->permanent_member_date;
   $unformatted_value_renewal_date = $this->renewal_date;
   $unformatted_value_main_contact_phone = $this->main_contact_phone;

   $archive_val_str = "";
   if (!empty($this->archive))
   {
       if (is_array($this->archive))
       {
           $Tmp_array = $this->archive;
       }
       else
       {
           $Tmp_array = explode(";", $this->archive);
       }
       $archive_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $archive_val_str)
          {
             $archive_val_str .= ", ";
          }
          $archive_val_str .= $Tmp_val_cmp;
       }
   }
   $doc_type_val_str = "''";
   if (!empty($this->doc_type))
   {
       if (is_array($this->doc_type))
       {
           $Tmp_array = $this->doc_type;
       }
       else
       {
           $Tmp_array = explode(";", $this->doc_type);
       }
       $doc_type_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $doc_type_val_str)
          {
             $doc_type_val_str .= ", ";
          }
          $doc_type_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $paid_val_str = "''";
   if (!empty($this->paid))
   {
       if (is_array($this->paid))
       {
           $Tmp_array = $this->paid;
       }
       else
       {
           $Tmp_array = explode(";", $this->paid);
       }
       $paid_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $paid_val_str)
          {
             $paid_val_str .= ", ";
          }
          $paid_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT bus_cat_id, bus_cat  FROM bus_categories  ORDER BY bus_cat";

   $this->membershipid = $old_value_membershipid;
   $this->client_id = $old_value_client_id;
   $this->state = $old_value_state;
   $this->zip_code = $old_value_zip_code;
   $this->permanent_member_date = $old_value_permanent_member_date;
   $this->renewal_date = $old_value_renewal_date;
   $this->main_contact_phone = $old_value_main_contact_phone;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_cat_id'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $bus_cat_id_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->bus_cat_id_1))
          {
              foreach ($this->bus_cat_id_1 as $tmp_bus_cat_id)
              {
                  if (trim($tmp_bus_cat_id) === trim($cadaselect[1])) {$bus_cat_id_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->bus_cat_id) && trim($this->bus_cat_id) === trim($cadaselect[1])) {$bus_cat_id_look .= $cadaselect[0];} 
          $x++; 
   }

?>
<input type="hidden" name="bus_cat_id" value="<?php echo $this->form_encode_input($bus_cat_id) . "\">" . $bus_cat_id_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_bus_cat_id();
   $x = 0 ; 
   $bus_cat_id_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->bus_cat_id_1))
          {
              foreach ($this->bus_cat_id_1 as $tmp_bus_cat_id)
              {
                  if (trim($tmp_bus_cat_id) === trim($cadaselect[1])) {$bus_cat_id_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->bus_cat_id)) {
                 if (trim($this->bus_cat_id) == trim($cadaselect[1])) { $bus_cat_id_look .= $cadaselect[0]; } 
          }
          elseif (isset($cadaselect[1]) && $this->bus_cat_id == $cadaselect[1]) { $bus_cat_id_look .= $cadaselect[0]; 
          }
          $x++; 
   }
          if (empty($bus_cat_id_look))
          {
              $bus_cat_id_look = $this->bus_cat_id;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_bus_cat_id\" class=\"css_bus_cat_id_line\" style=\"" .  $sStyleReadLab_bus_cat_id . "\">" . $this->form_format_readonly("bus_cat_id", $this->form_encode_input($bus_cat_id_look)) . "</span><span id=\"id_read_off_bus_cat_id\" class=\"css_read_off_bus_cat_id" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_bus_cat_id . "\">";
   echo " <span id=\"idAjaxSelect_bus_cat_id\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_bus_cat_id_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_bus_cat_id\" name=\"bus_cat_id\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_cat_id'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Choose") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->bus_cat_id) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->bus_cat_id)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bus_cat_id_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bus_cat_id_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['zip_code']))
    {
        $this->nm_new_label['zip_code'] = "Zip Code";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $zip_code = $this->zip_code;
   $sStyleHidden_zip_code = '';
   if (isset($this->nmgp_cmp_hidden['zip_code']) && $this->nmgp_cmp_hidden['zip_code'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['zip_code']);
       $sStyleHidden_zip_code = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_zip_code = 'display: none;';
   $sStyleReadInp_zip_code = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['zip_code']) && $this->nmgp_cmp_readonly['zip_code'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['zip_code']);
       $sStyleReadLab_zip_code = '';
       $sStyleReadInp_zip_code = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['zip_code']) && $this->nmgp_cmp_hidden['zip_code'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="zip_code" value="<?php echo $this->form_encode_input($zip_code) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_zip_code_label" id="hidden_field_label_zip_code" style="<?php echo $sStyleHidden_zip_code; ?>"><span id="id_label_zip_code"><?php echo $this->nm_new_label['zip_code']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['zip_code']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['zip_code'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_zip_code_line" id="hidden_field_data_zip_code" style="<?php echo $sStyleHidden_zip_code; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_zip_code_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["zip_code"]) &&  $this->nmgp_cmp_readonly["zip_code"] == "on") { 

 ?>
<input type="hidden" name="zip_code" value="<?php echo $this->form_encode_input($zip_code) . "\">" . $zip_code . ""; ?>
<?php } else { ?>
<span id="id_read_on_zip_code" class="sc-ui-readonly-zip_code css_zip_code_line" style="<?php echo $sStyleReadLab_zip_code; ?>"><?php echo $this->form_format_readonly("zip_code", $this->form_encode_input($this->zip_code)); ?></span><span id="id_read_off_zip_code" class="css_read_off_zip_code<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_zip_code; ?>">
 <input class="sc-js-input scFormObjectOdd css_zip_code_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_zip_code" type=text name="zip_code" value="<?php echo $this->form_encode_input($zip_code) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=110 alt="{datatype: 'mask', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', maskList: '99999-9999', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_zip_code_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_zip_code_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['bus_subcat_id']))
   {
       $this->nm_new_label['bus_subcat_id'] = "Subcategory";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $bus_subcat_id = $this->bus_subcat_id;
   $sStyleHidden_bus_subcat_id = '';
   if (isset($this->nmgp_cmp_hidden['bus_subcat_id']) && $this->nmgp_cmp_hidden['bus_subcat_id'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['bus_subcat_id']);
       $sStyleHidden_bus_subcat_id = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_bus_subcat_id = 'display: none;';
   $sStyleReadInp_bus_subcat_id = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['bus_subcat_id']) && $this->nmgp_cmp_readonly['bus_subcat_id'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['bus_subcat_id']);
       $sStyleReadLab_bus_subcat_id = '';
       $sStyleReadInp_bus_subcat_id = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['bus_subcat_id']) && $this->nmgp_cmp_hidden['bus_subcat_id'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="bus_subcat_id" value="<?php echo $this->form_encode_input($this->bus_subcat_id) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_bus_subcat_id_label" id="hidden_field_label_bus_subcat_id" style="<?php echo $sStyleHidden_bus_subcat_id; ?>"><span id="id_label_bus_subcat_id"><?php echo $this->nm_new_label['bus_subcat_id']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['bus_subcat_id']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['bus_subcat_id'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_bus_subcat_id_line" id="hidden_field_data_bus_subcat_id" style="<?php echo $sStyleHidden_bus_subcat_id; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_bus_subcat_id_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bus_subcat_id"]) &&  $this->nmgp_cmp_readonly["bus_subcat_id"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_subcat_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_subcat_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_subcat_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_subcat_id'] = array(); 
}
if ($this->bus_cat_id != "")
{ 
   $this->nm_clear_val("bus_cat_id");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_subcat_id']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_subcat_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_subcat_id']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_subcat_id'] = array(); 
    }

   $old_value_membershipid = $this->membershipid;
   $old_value_client_id = $this->client_id;
   $old_value_state = $this->state;
   $old_value_zip_code = $this->zip_code;
   $old_value_permanent_member_date = $this->permanent_member_date;
   $old_value_renewal_date = $this->renewal_date;
   $old_value_main_contact_phone = $this->main_contact_phone;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_membershipid = $this->membershipid;
   $unformatted_value_client_id = $this->client_id;
   $unformatted_value_state = $this->state;
   $unformatted_value_zip_code = $this->zip_code;
   $unformatted_value_permanent_member_date = $this->permanent_member_date;
   $unformatted_value_renewal_date = $this->renewal_date;
   $unformatted_value_main_contact_phone = $this->main_contact_phone;

   $nm_comando = "SELECT bus_subcat_id, bus_subcategory  FROM bus_subcats  WHERE bus_cat_id = $this->bus_cat_id  ORDER BY sort_by";

   $this->membershipid = $old_value_membershipid;
   $this->client_id = $old_value_client_id;
   $this->state = $old_value_state;
   $this->zip_code = $old_value_zip_code;
   $this->permanent_member_date = $old_value_permanent_member_date;
   $this->renewal_date = $old_value_renewal_date;
   $this->main_contact_phone = $old_value_main_contact_phone;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_subcat_id'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
} 
   $x = 0; 
   $bus_subcat_id_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->bus_subcat_id_1))
          {
              foreach ($this->bus_subcat_id_1 as $tmp_bus_subcat_id)
              {
                  if (trim($tmp_bus_subcat_id) === trim($cadaselect[1])) {$bus_subcat_id_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->bus_subcat_id) && trim($this->bus_subcat_id) === trim($cadaselect[1])) {$bus_subcat_id_look .= $cadaselect[0];} 
          $x++; 
   }

?>
<input type="hidden" name="bus_subcat_id" value="<?php echo $this->form_encode_input($bus_subcat_id) . "\">" . $bus_subcat_id_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_bus_subcat_id();
   $x = 0 ; 
   $bus_subcat_id_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->bus_subcat_id_1))
          {
              foreach ($this->bus_subcat_id_1 as $tmp_bus_subcat_id)
              {
                  if (trim($tmp_bus_subcat_id) === trim($cadaselect[1])) {$bus_subcat_id_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->bus_subcat_id)) {
                 if (trim($this->bus_subcat_id) == trim($cadaselect[1])) { $bus_subcat_id_look .= $cadaselect[0]; } 
          }
          elseif (isset($cadaselect[1]) && $this->bus_subcat_id == $cadaselect[1]) { $bus_subcat_id_look .= $cadaselect[0]; 
          }
          $x++; 
   }
          if (empty($bus_subcat_id_look))
          {
              $bus_subcat_id_look = $this->bus_subcat_id;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_bus_subcat_id\" class=\"css_bus_subcat_id_line\" style=\"" .  $sStyleReadLab_bus_subcat_id . "\">" . $this->form_format_readonly("bus_subcat_id", $this->form_encode_input($bus_subcat_id_look)) . "</span><span id=\"id_read_off_bus_subcat_id\" class=\"css_read_off_bus_subcat_id" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_bus_subcat_id . "\">";
   echo " <span id=\"idAjaxSelect_bus_subcat_id\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_bus_subcat_id_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_bus_subcat_id\" name=\"bus_subcat_id\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_subcat_id'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Choose") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->bus_subcat_id) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->bus_subcat_id)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
<span class="scFormPopupBubble" style="display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
</span><table class="scFormPopup"><tbody><?php
if (isset($_SESSION['scriptcase']['reg_conf']['html_dir']) && $_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'") {
?>
<tr><td class="scFormPopupTopRight scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopLeft scFormPopupCorner"></td></tr><tr><td class="scFormPopupRight"></td><td class="scFormPopupContent"><span style="color: blue; font-weight: bold;">TYPE OF BUSINESS - </span><span style="color: red;">OPTIONS (Select ONE that best applies)</span><br><br />
FLORIST...............................Storefront, Website, Home-Based, Other<br />
PLANT SALES.....................Storefront, Website, Home-Based, Plant Maintenance, Other<br />
ART.......................................Art Studio, Photographer, Theater, Videography, Other<br />
RETAIL.................................Antique, Apparel, Gift, Grocery, Jewelry, Other<br />
BUSINESS SERVICES........Construction, Funeral Parlor, Interior Design, Landscaping, Manufacturing, Marketing, Real Estate, Beauty, Wedding Chapel, Other<br />
FOOD SERVICES................Bakery, Bar, Coffee Shop, Restaurant, Winery, Other<br />
MEDICAL............................Assisted Living, Chiropractor, Dentist, Dr. Office, Therapist, Other<br />
NON-PROFIT.......................Church, School, Club, Other<br />
</td><td class="scFormPopupLeft"></td></tr><tr><td class="scFormPopupBottomRight scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomLeft scFormPopupCorner"></td></tr><?php
} else {
?>
<tr><td class="scFormPopupTopLeft scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopRight scFormPopupCorner"></td></tr><tr><td class="scFormPopupLeft"></td><td class="scFormPopupContent"><span style="color: blue; font-weight: bold;">TYPE OF BUSINESS - </span><span style="color: red;">OPTIONS (Select ONE that best applies)</span><br><br />
FLORIST...............................Storefront, Website, Home-Based, Other<br />
PLANT SALES.....................Storefront, Website, Home-Based, Plant Maintenance, Other<br />
ART.......................................Art Studio, Photographer, Theater, Videography, Other<br />
RETAIL.................................Antique, Apparel, Gift, Grocery, Jewelry, Other<br />
BUSINESS SERVICES........Construction, Funeral Parlor, Interior Design, Landscaping, Manufacturing, Marketing, Real Estate, Beauty, Wedding Chapel, Other<br />
FOOD SERVICES................Bakery, Bar, Coffee Shop, Restaurant, Winery, Other<br />
MEDICAL............................Assisted Living, Chiropractor, Dentist, Dr. Office, Therapist, Other<br />
NON-PROFIT.......................Church, School, Club, Other<br />
</td><td class="scFormPopupRight"></td></tr><tr><td class="scFormPopupBottomLeft scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomRight scFormPopupCorner"></td></tr><?php
}
?>
</tbody></table></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bus_subcat_id_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bus_subcat_id_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['permanent_member_date']))
    {
        $this->nm_new_label['permanent_member_date'] = "Member since";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $permanent_member_date = $this->permanent_member_date;
   $sStyleHidden_permanent_member_date = '';
   if (isset($this->nmgp_cmp_hidden['permanent_member_date']) && $this->nmgp_cmp_hidden['permanent_member_date'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['permanent_member_date']);
       $sStyleHidden_permanent_member_date = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_permanent_member_date = 'display: none;';
   $sStyleReadInp_permanent_member_date = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['permanent_member_date']) && $this->nmgp_cmp_readonly['permanent_member_date'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['permanent_member_date']);
       $sStyleReadLab_permanent_member_date = '';
       $sStyleReadInp_permanent_member_date = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['permanent_member_date']) && $this->nmgp_cmp_hidden['permanent_member_date'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="permanent_member_date" value="<?php echo $this->form_encode_input($permanent_member_date) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_permanent_member_date_label" id="hidden_field_label_permanent_member_date" style="<?php echo $sStyleHidden_permanent_member_date; ?>"><span id="id_label_permanent_member_date"><?php echo $this->nm_new_label['permanent_member_date']; ?></span></TD>
    <TD class="scFormDataOdd css_permanent_member_date_line" id="hidden_field_data_permanent_member_date" style="<?php echo $sStyleHidden_permanent_member_date; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_permanent_member_date_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["permanent_member_date"]) &&  $this->nmgp_cmp_readonly["permanent_member_date"] == "on") { 

 ?>
<input type="hidden" name="permanent_member_date" value="<?php echo $this->form_encode_input($permanent_member_date) . "\">" . $permanent_member_date . ""; ?>
<?php } else { ?>
<span id="id_read_on_permanent_member_date" class="sc-ui-readonly-permanent_member_date css_permanent_member_date_line" style="<?php echo $sStyleReadLab_permanent_member_date; ?>"><?php echo $this->form_format_readonly("permanent_member_date", $this->form_encode_input($permanent_member_date)); ?></span><span id="id_read_off_permanent_member_date" class="css_read_off_permanent_member_date<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_permanent_member_date; ?>"><?php
$tmp_form_data = $this->field_config['permanent_member_date']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_permanent_member_date_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_permanent_member_date" type=text name="permanent_member_date" value="<?php echo $this->form_encode_input($permanent_member_date) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['permanent_member_date']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['permanent_member_date']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_permanent_member_date_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_permanent_member_date_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['bus_subcat_other']))
    {
        $this->nm_new_label['bus_subcat_other'] = "If Other";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $bus_subcat_other = $this->bus_subcat_other;
   $sStyleHidden_bus_subcat_other = '';
   if (isset($this->nmgp_cmp_hidden['bus_subcat_other']) && $this->nmgp_cmp_hidden['bus_subcat_other'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['bus_subcat_other']);
       $sStyleHidden_bus_subcat_other = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_bus_subcat_other = 'display: none;';
   $sStyleReadInp_bus_subcat_other = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['bus_subcat_other']) && $this->nmgp_cmp_readonly['bus_subcat_other'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['bus_subcat_other']);
       $sStyleReadLab_bus_subcat_other = '';
       $sStyleReadInp_bus_subcat_other = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['bus_subcat_other']) && $this->nmgp_cmp_hidden['bus_subcat_other'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="bus_subcat_other" value="<?php echo $this->form_encode_input($bus_subcat_other) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_bus_subcat_other_label" id="hidden_field_label_bus_subcat_other" style="<?php echo $sStyleHidden_bus_subcat_other; ?>"><span id="id_label_bus_subcat_other"><?php echo $this->nm_new_label['bus_subcat_other']; ?></span></TD>
    <TD class="scFormDataOdd css_bus_subcat_other_line" id="hidden_field_data_bus_subcat_other" style="<?php echo $sStyleHidden_bus_subcat_other; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_bus_subcat_other_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bus_subcat_other"]) &&  $this->nmgp_cmp_readonly["bus_subcat_other"] == "on") { 

 ?>
<input type="hidden" name="bus_subcat_other" value="<?php echo $this->form_encode_input($bus_subcat_other) . "\">" . $bus_subcat_other . ""; ?>
<?php } else { ?>
<span id="id_read_on_bus_subcat_other" class="sc-ui-readonly-bus_subcat_other css_bus_subcat_other_line" style="<?php echo $sStyleReadLab_bus_subcat_other; ?>"><?php echo $this->form_format_readonly("bus_subcat_other", $this->form_encode_input($this->bus_subcat_other)); ?></span><span id="id_read_off_bus_subcat_other" class="css_read_off_bus_subcat_other<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_bus_subcat_other; ?>">
 <input class="sc-js-input scFormObjectOdd css_bus_subcat_other_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_bus_subcat_other" type=text name="bus_subcat_other" value="<?php echo $this->form_encode_input($bus_subcat_other) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bus_subcat_other_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bus_subcat_other_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['renewal_date']))
    {
        $this->nm_new_label['renewal_date'] = "Renewal Date";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $renewal_date = $this->renewal_date;
   $sStyleHidden_renewal_date = '';
   if (isset($this->nmgp_cmp_hidden['renewal_date']) && $this->nmgp_cmp_hidden['renewal_date'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['renewal_date']);
       $sStyleHidden_renewal_date = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_renewal_date = 'display: none;';
   $sStyleReadInp_renewal_date = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['renewal_date']) && $this->nmgp_cmp_readonly['renewal_date'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['renewal_date']);
       $sStyleReadLab_renewal_date = '';
       $sStyleReadInp_renewal_date = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['renewal_date']) && $this->nmgp_cmp_hidden['renewal_date'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="renewal_date" value="<?php echo $this->form_encode_input($renewal_date) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_renewal_date_label" id="hidden_field_label_renewal_date" style="<?php echo $sStyleHidden_renewal_date; ?>"><span id="id_label_renewal_date"><?php echo $this->nm_new_label['renewal_date']; ?></span></TD>
    <TD class="scFormDataOdd css_renewal_date_line" id="hidden_field_data_renewal_date" style="<?php echo $sStyleHidden_renewal_date; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_renewal_date_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["renewal_date"]) &&  $this->nmgp_cmp_readonly["renewal_date"] == "on") { 

 ?>
<input type="hidden" name="renewal_date" value="<?php echo $this->form_encode_input($renewal_date) . "\">" . $renewal_date . ""; ?>
<?php } else { ?>
<span id="id_read_on_renewal_date" class="sc-ui-readonly-renewal_date css_renewal_date_line" style="<?php echo $sStyleReadLab_renewal_date; ?>"><?php echo $this->form_format_readonly("renewal_date", $this->form_encode_input($renewal_date)); ?></span><span id="id_read_off_renewal_date" class="css_read_off_renewal_date<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_renewal_date; ?>"><?php
$tmp_form_data = $this->field_config['renewal_date']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_renewal_date_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_renewal_date" type=text name="renewal_date" value="<?php echo $this->form_encode_input($renewal_date) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['renewal_date']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['renewal_date']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_renewal_date_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_renewal_date_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['acct_instagram']))
    {
        $this->nm_new_label['acct_instagram'] = "Instagram";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $acct_instagram = $this->acct_instagram;
   $sStyleHidden_acct_instagram = '';
   if (isset($this->nmgp_cmp_hidden['acct_instagram']) && $this->nmgp_cmp_hidden['acct_instagram'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['acct_instagram']);
       $sStyleHidden_acct_instagram = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_acct_instagram = 'display: none;';
   $sStyleReadInp_acct_instagram = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['acct_instagram']) && $this->nmgp_cmp_readonly['acct_instagram'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['acct_instagram']);
       $sStyleReadLab_acct_instagram = '';
       $sStyleReadInp_acct_instagram = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['acct_instagram']) && $this->nmgp_cmp_hidden['acct_instagram'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="acct_instagram" value="<?php echo $this->form_encode_input($acct_instagram) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_acct_instagram_label" id="hidden_field_label_acct_instagram" style="<?php echo $sStyleHidden_acct_instagram; ?>"><span id="id_label_acct_instagram"><?php echo $this->nm_new_label['acct_instagram']; ?></span></TD>
    <TD class="scFormDataOdd css_acct_instagram_line" id="hidden_field_data_acct_instagram" style="<?php echo $sStyleHidden_acct_instagram; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_acct_instagram_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["acct_instagram"]) &&  $this->nmgp_cmp_readonly["acct_instagram"] == "on") { 

 ?>
<input type="hidden" name="acct_instagram" value="<?php echo $this->form_encode_input($acct_instagram) . "\">" . $acct_instagram . ""; ?>
<?php } else { ?>
<span id="id_read_on_acct_instagram" class="sc-ui-readonly-acct_instagram css_acct_instagram_line" style="<?php echo $sStyleReadLab_acct_instagram; ?>"><?php echo $this->form_format_readonly("acct_instagram", $this->form_encode_input($this->acct_instagram)); ?></span><span id="id_read_off_acct_instagram" class="css_read_off_acct_instagram<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_acct_instagram; ?>">
 <input class="sc-js-input scFormObjectOdd css_acct_instagram_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_acct_instagram" type=text name="acct_instagram" value="<?php echo $this->form_encode_input($acct_instagram) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=500 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<?php echo nmButtonOutput($this->arr_buttons, "blink", "window.open(nm_link_url(document.F1.acct_instagram.value), '_blank')", "window.open(nm_link_url(document.F1.acct_instagram.value), '_blank')", "acct_instagram_url", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>

</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_acct_instagram_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_acct_instagram_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['website_url']))
    {
        $this->nm_new_label['website_url'] = "Company Website";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $website_url = $this->website_url;
   $sStyleHidden_website_url = '';
   if (isset($this->nmgp_cmp_hidden['website_url']) && $this->nmgp_cmp_hidden['website_url'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['website_url']);
       $sStyleHidden_website_url = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_website_url = 'display: none;';
   $sStyleReadInp_website_url = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['website_url']) && $this->nmgp_cmp_readonly['website_url'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['website_url']);
       $sStyleReadLab_website_url = '';
       $sStyleReadInp_website_url = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['website_url']) && $this->nmgp_cmp_hidden['website_url'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="website_url" value="<?php echo $this->form_encode_input($website_url) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_website_url_label" id="hidden_field_label_website_url" style="<?php echo $sStyleHidden_website_url; ?>"><span id="id_label_website_url"><?php echo $this->nm_new_label['website_url']; ?></span></TD>
    <TD class="scFormDataOdd css_website_url_line" id="hidden_field_data_website_url" style="<?php echo $sStyleHidden_website_url; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_website_url_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["website_url"]) &&  $this->nmgp_cmp_readonly["website_url"] == "on") { 

 ?>
<input type="hidden" name="website_url" value="<?php echo $this->form_encode_input($website_url) . "\">" . $website_url . ""; ?>
<?php } else { ?>
<span id="id_read_on_website_url" class="sc-ui-readonly-website_url css_website_url_line" style="<?php echo $sStyleReadLab_website_url; ?>"><?php echo $this->form_format_readonly("website_url", $this->form_encode_input($this->website_url)); ?></span><span id="id_read_off_website_url" class="css_read_off_website_url<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_website_url; ?>">
 <input class="sc-js-input scFormObjectOdd css_website_url_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_website_url" type=text name="website_url" value="<?php echo $this->form_encode_input($website_url) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=500 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<?php echo nmButtonOutput($this->arr_buttons, "blink", "window.open(nm_link_url(document.F1.website_url.value), '_blank')", "window.open(nm_link_url(document.F1.website_url.value), '_blank')", "website_url_url", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>

</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_website_url_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_website_url_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['acct_facebook']))
    {
        $this->nm_new_label['acct_facebook'] = "Facebook";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $acct_facebook = $this->acct_facebook;
   $sStyleHidden_acct_facebook = '';
   if (isset($this->nmgp_cmp_hidden['acct_facebook']) && $this->nmgp_cmp_hidden['acct_facebook'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['acct_facebook']);
       $sStyleHidden_acct_facebook = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_acct_facebook = 'display: none;';
   $sStyleReadInp_acct_facebook = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['acct_facebook']) && $this->nmgp_cmp_readonly['acct_facebook'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['acct_facebook']);
       $sStyleReadLab_acct_facebook = '';
       $sStyleReadInp_acct_facebook = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['acct_facebook']) && $this->nmgp_cmp_hidden['acct_facebook'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="acct_facebook" value="<?php echo $this->form_encode_input($acct_facebook) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_acct_facebook_label" id="hidden_field_label_acct_facebook" style="<?php echo $sStyleHidden_acct_facebook; ?>"><span id="id_label_acct_facebook"><?php echo $this->nm_new_label['acct_facebook']; ?></span></TD>
    <TD class="scFormDataOdd css_acct_facebook_line" id="hidden_field_data_acct_facebook" style="<?php echo $sStyleHidden_acct_facebook; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_acct_facebook_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["acct_facebook"]) &&  $this->nmgp_cmp_readonly["acct_facebook"] == "on") { 

 ?>
<input type="hidden" name="acct_facebook" value="<?php echo $this->form_encode_input($acct_facebook) . "\">" . $acct_facebook . ""; ?>
<?php } else { ?>
<span id="id_read_on_acct_facebook" class="sc-ui-readonly-acct_facebook css_acct_facebook_line" style="<?php echo $sStyleReadLab_acct_facebook; ?>"><?php echo $this->form_format_readonly("acct_facebook", $this->form_encode_input($this->acct_facebook)); ?></span><span id="id_read_off_acct_facebook" class="css_read_off_acct_facebook<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_acct_facebook; ?>">
 <input class="sc-js-input scFormObjectOdd css_acct_facebook_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_acct_facebook" type=text name="acct_facebook" value="<?php echo $this->form_encode_input($acct_facebook) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=500 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<?php echo nmButtonOutput($this->arr_buttons, "blink", "window.open(nm_link_url(document.F1.acct_facebook.value), '_blank')", "window.open(nm_link_url(document.F1.acct_facebook.value), '_blank')", "acct_facebook_url", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>

</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_acct_facebook_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_acct_facebook_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['js_prod_price']))
    {
        $this->nm_new_label['js_prod_price'] = "js_prod_price";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $js_prod_price = $this->js_prod_price;
   if (!isset($this->nmgp_cmp_hidden['js_prod_price']))
   {
       $this->nmgp_cmp_hidden['js_prod_price'] = 'off';
   }
   $sStyleHidden_js_prod_price = '';
   if (isset($this->nmgp_cmp_hidden['js_prod_price']) && $this->nmgp_cmp_hidden['js_prod_price'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['js_prod_price']);
       $sStyleHidden_js_prod_price = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_js_prod_price = 'display: none;';
   $sStyleReadInp_js_prod_price = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['js_prod_price']) && $this->nmgp_cmp_readonly['js_prod_price'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['js_prod_price']);
       $sStyleReadLab_js_prod_price = '';
       $sStyleReadInp_js_prod_price = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['js_prod_price']) && $this->nmgp_cmp_hidden['js_prod_price'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="js_prod_price" value="<?php echo $this->form_encode_input($js_prod_price) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_js_prod_price_label" id="hidden_field_label_js_prod_price" style="<?php echo $sStyleHidden_js_prod_price; ?>"><span id="id_label_js_prod_price"><?php echo $this->nm_new_label['js_prod_price']; ?></span></TD>
    <TD class="scFormDataOdd css_js_prod_price_line" id="hidden_field_data_js_prod_price" style="<?php echo $sStyleHidden_js_prod_price; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_js_prod_price_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["js_prod_price"]) &&  $this->nmgp_cmp_readonly["js_prod_price"] == "on") { 

 ?>
<input type="hidden" name="js_prod_price" value="<?php echo $this->form_encode_input($js_prod_price) . "\">" . $js_prod_price . ""; ?>
<?php } else { ?>
<span id="id_read_on_js_prod_price" class="sc-ui-readonly-js_prod_price css_js_prod_price_line" style="<?php echo $sStyleReadLab_js_prod_price; ?>"><?php echo $this->form_format_readonly("js_prod_price", $this->form_encode_input($this->js_prod_price)); ?></span><span id="id_read_off_js_prod_price" class="css_read_off_js_prod_price<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_js_prod_price; ?>">
 <input class="sc-js-input scFormObjectOdd css_js_prod_price_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_js_prod_price" type=text name="js_prod_price" value="<?php echo $this->form_encode_input($js_prod_price) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_js_prod_price_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_js_prod_price_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['js_strp_price_id']))
    {
        $this->nm_new_label['js_strp_price_id'] = "js_strp_price_id";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $js_strp_price_id = $this->js_strp_price_id;
   if (!isset($this->nmgp_cmp_hidden['js_strp_price_id']))
   {
       $this->nmgp_cmp_hidden['js_strp_price_id'] = 'off';
   }
   $sStyleHidden_js_strp_price_id = '';
   if (isset($this->nmgp_cmp_hidden['js_strp_price_id']) && $this->nmgp_cmp_hidden['js_strp_price_id'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['js_strp_price_id']);
       $sStyleHidden_js_strp_price_id = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_js_strp_price_id = 'display: none;';
   $sStyleReadInp_js_strp_price_id = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['js_strp_price_id']) && $this->nmgp_cmp_readonly['js_strp_price_id'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['js_strp_price_id']);
       $sStyleReadLab_js_strp_price_id = '';
       $sStyleReadInp_js_strp_price_id = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['js_strp_price_id']) && $this->nmgp_cmp_hidden['js_strp_price_id'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="js_strp_price_id" value="<?php echo $this->form_encode_input($js_strp_price_id) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_js_strp_price_id_label" id="hidden_field_label_js_strp_price_id" style="<?php echo $sStyleHidden_js_strp_price_id; ?>"><span id="id_label_js_strp_price_id"><?php echo $this->nm_new_label['js_strp_price_id']; ?></span></TD>
    <TD class="scFormDataOdd css_js_strp_price_id_line" id="hidden_field_data_js_strp_price_id" style="<?php echo $sStyleHidden_js_strp_price_id; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_js_strp_price_id_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["js_strp_price_id"]) &&  $this->nmgp_cmp_readonly["js_strp_price_id"] == "on") { 

 ?>
<input type="hidden" name="js_strp_price_id" value="<?php echo $this->form_encode_input($js_strp_price_id) . "\">" . $js_strp_price_id . ""; ?>
<?php } else { ?>
<span id="id_read_on_js_strp_price_id" class="sc-ui-readonly-js_strp_price_id css_js_strp_price_id_line" style="<?php echo $sStyleReadLab_js_strp_price_id; ?>"><?php echo $this->form_format_readonly("js_strp_price_id", $this->form_encode_input($this->js_strp_price_id)); ?></span><span id="id_read_off_js_strp_price_id" class="css_read_off_js_strp_price_id<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_js_strp_price_id; ?>">
 <input class="sc-js-input scFormObjectOdd css_js_strp_price_id_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_js_strp_price_id" type=text name="js_strp_price_id" value="<?php echo $this->form_encode_input($js_strp_price_id) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_js_strp_price_id_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_js_strp_price_id_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['js_mbr_ct']))
    {
        $this->nm_new_label['js_mbr_ct'] = "js_mbr_ct";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $js_mbr_ct = $this->js_mbr_ct;
   if (!isset($this->nmgp_cmp_hidden['js_mbr_ct']))
   {
       $this->nmgp_cmp_hidden['js_mbr_ct'] = 'off';
   }
   $sStyleHidden_js_mbr_ct = '';
   if (isset($this->nmgp_cmp_hidden['js_mbr_ct']) && $this->nmgp_cmp_hidden['js_mbr_ct'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['js_mbr_ct']);
       $sStyleHidden_js_mbr_ct = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_js_mbr_ct = 'display: none;';
   $sStyleReadInp_js_mbr_ct = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['js_mbr_ct']) && $this->nmgp_cmp_readonly['js_mbr_ct'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['js_mbr_ct']);
       $sStyleReadLab_js_mbr_ct = '';
       $sStyleReadInp_js_mbr_ct = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['js_mbr_ct']) && $this->nmgp_cmp_hidden['js_mbr_ct'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="js_mbr_ct" value="<?php echo $this->form_encode_input($js_mbr_ct) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_js_mbr_ct_label" id="hidden_field_label_js_mbr_ct" style="<?php echo $sStyleHidden_js_mbr_ct; ?>"><span id="id_label_js_mbr_ct"><?php echo $this->nm_new_label['js_mbr_ct']; ?></span></TD>
    <TD class="scFormDataOdd css_js_mbr_ct_line" id="hidden_field_data_js_mbr_ct" style="<?php echo $sStyleHidden_js_mbr_ct; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_js_mbr_ct_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["js_mbr_ct"]) &&  $this->nmgp_cmp_readonly["js_mbr_ct"] == "on") { 

 ?>
<input type="hidden" name="js_mbr_ct" value="<?php echo $this->form_encode_input($js_mbr_ct) . "\">" . $js_mbr_ct . ""; ?>
<?php } else { ?>
<span id="id_read_on_js_mbr_ct" class="sc-ui-readonly-js_mbr_ct css_js_mbr_ct_line" style="<?php echo $sStyleReadLab_js_mbr_ct; ?>"><?php echo $this->form_format_readonly("js_mbr_ct", $this->form_encode_input($this->js_mbr_ct)); ?></span><span id="id_read_off_js_mbr_ct" class="css_read_off_js_mbr_ct<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_js_mbr_ct; ?>">
 <input class="sc-js-input scFormObjectOdd css_js_mbr_ct_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_js_mbr_ct" type=text name="js_mbr_ct" value="<?php echo $this->form_encode_input($js_mbr_ct) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_js_mbr_ct_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_js_mbr_ct_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['js_client_id']))
    {
        $this->nm_new_label['js_client_id'] = "js_client_id";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $js_client_id = $this->js_client_id;
   if (!isset($this->nmgp_cmp_hidden['js_client_id']))
   {
       $this->nmgp_cmp_hidden['js_client_id'] = 'off';
   }
   $sStyleHidden_js_client_id = '';
   if (isset($this->nmgp_cmp_hidden['js_client_id']) && $this->nmgp_cmp_hidden['js_client_id'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['js_client_id']);
       $sStyleHidden_js_client_id = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_js_client_id = 'display: none;';
   $sStyleReadInp_js_client_id = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['js_client_id']) && $this->nmgp_cmp_readonly['js_client_id'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['js_client_id']);
       $sStyleReadLab_js_client_id = '';
       $sStyleReadInp_js_client_id = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['js_client_id']) && $this->nmgp_cmp_hidden['js_client_id'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="js_client_id" value="<?php echo $this->form_encode_input($js_client_id) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_js_client_id_label" id="hidden_field_label_js_client_id" style="<?php echo $sStyleHidden_js_client_id; ?>"><span id="id_label_js_client_id"><?php echo $this->nm_new_label['js_client_id']; ?></span></TD>
    <TD class="scFormDataOdd css_js_client_id_line" id="hidden_field_data_js_client_id" style="<?php echo $sStyleHidden_js_client_id; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_js_client_id_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["js_client_id"]) &&  $this->nmgp_cmp_readonly["js_client_id"] == "on") { 

 ?>
<input type="hidden" name="js_client_id" value="<?php echo $this->form_encode_input($js_client_id) . "\">" . $js_client_id . ""; ?>
<?php } else { ?>
<span id="id_read_on_js_client_id" class="sc-ui-readonly-js_client_id css_js_client_id_line" style="<?php echo $sStyleReadLab_js_client_id; ?>"><?php echo $this->form_format_readonly("js_client_id", $this->form_encode_input($this->js_client_id)); ?></span><span id="id_read_off_js_client_id" class="css_read_off_js_client_id<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_js_client_id; ?>">
 <input class="sc-js-input scFormObjectOdd css_js_client_id_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_js_client_id" type=text name="js_client_id" value="<?php echo $this->form_encode_input($js_client_id) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_js_client_id_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_js_client_id_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
<script type="text/javascript">
function sc_control_tabs_1(iTabIndex)
{
  sc_change_tabs(iTabIndex == 1, 'hidden_bloco_1', 'id_tabs_1_1');
  if (iTabIndex == 1) {
    displayChange_block("1", "on");
  }
  sc_change_tabs(iTabIndex == 2, 'hidden_bloco_2', 'id_tabs_1_2');
  if (iTabIndex == 2) {
    displayChange_block("2", "on");
  }
  sc_change_tabs(iTabIndex == 3, 'hidden_bloco_3', 'id_tabs_1_3');
  if (iTabIndex == 3) {
    displayChange_block("3", "on");
  }
  sc_change_tabs(iTabIndex == 4, 'hidden_bloco_4', 'id_tabs_1_4');
  if (iTabIndex == 4) {
    displayChange_block("4", "on");
  }
  sc_change_tabs(iTabIndex == 5, 'hidden_bloco_5', 'id_tabs_1_5');
  if (iTabIndex == 5) {
    displayChange_block("5", "on");
  }
}
</script>
<ul class="scTabLine">
<li id="id_tabs_1_1" class="scTabActive"><a href="javascript: sc_control_tabs_1(1)">MAIN CONTACT</a></li>
<li id="id_tabs_1_2" class="scTabInactive"><a href="javascript: sc_control_tabs_1(2)">CURRENT BUYERS</a></li>
<li id="id_tabs_1_3" class="scTabInactive"><a href="javascript: sc_control_tabs_1(3)">OPERATIONAL RECORDS</a></li>
<li id="id_tabs_1_4" class="scTabInactive"><a href="javascript: sc_control_tabs_1(4)">PAYMENTS</a></li>
<li id="id_tabs_1_5" class="scTabInactive"><a href="javascript: sc_control_tabs_1(5)">NOTES</a></li>
</ul>
<div style='clear:both'></div>
<div id="div_hidden_bloco_1" class="scBlockFrame"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dummy07']))
    {
        $this->nm_new_label['dummy07'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dummy07 = $this->dummy07;
   $sStyleHidden_dummy07 = '';
   if (isset($this->nmgp_cmp_hidden['dummy07']) && $this->nmgp_cmp_hidden['dummy07'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dummy07']);
       $sStyleHidden_dummy07 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dummy07 = 'display: none;';
   $sStyleReadInp_dummy07 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dummy07']) && $this->nmgp_cmp_readonly['dummy07'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dummy07']);
       $sStyleReadLab_dummy07 = '';
       $sStyleReadInp_dummy07 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dummy07']) && $this->nmgp_cmp_hidden['dummy07'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dummy07" value="<?php echo $this->form_encode_input($dummy07) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_dummy07_label" id="hidden_field_label_dummy07" style="<?php echo $sStyleHidden_dummy07; ?>"><span id="id_label_dummy07"><?php echo $this->nm_new_label['dummy07']; ?></span></TD>
    <TD class="scFormDataOdd css_dummy07_line" id="hidden_field_data_dummy07" style="<?php echo $sStyleHidden_dummy07; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dummy07_line" style="vertical-align: top;padding: 0px"><span id="id_ajax_label_dummy07"><?php echo $dummy07?></span>
<input type="hidden" name="dummy07" value="<?php echo $this->form_encode_input($dummy07); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dummy07_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dummy07_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['dummy08']))
    {
        $this->nm_new_label['dummy08'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dummy08 = $this->dummy08;
   $sStyleHidden_dummy08 = '';
   if (isset($this->nmgp_cmp_hidden['dummy08']) && $this->nmgp_cmp_hidden['dummy08'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dummy08']);
       $sStyleHidden_dummy08 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dummy08 = 'display: none;';
   $sStyleReadInp_dummy08 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dummy08']) && $this->nmgp_cmp_readonly['dummy08'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dummy08']);
       $sStyleReadLab_dummy08 = '';
       $sStyleReadInp_dummy08 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dummy08']) && $this->nmgp_cmp_hidden['dummy08'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dummy08" value="<?php echo $this->form_encode_input($dummy08) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_dummy08_label" id="hidden_field_label_dummy08" style="<?php echo $sStyleHidden_dummy08; ?>"><span id="id_label_dummy08"><?php echo $this->nm_new_label['dummy08']; ?></span></TD>
    <TD class="scFormDataOdd css_dummy08_line" id="hidden_field_data_dummy08" style="<?php echo $sStyleHidden_dummy08; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dummy08_line" style="vertical-align: top;padding: 0px"><span id="id_ajax_label_dummy08"><?php echo $dummy08?></span>
<input type="hidden" name="dummy08" value="<?php echo $this->form_encode_input($dummy08); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dummy08_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dummy08_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['main_contact_name']))
    {
        $this->nm_new_label['main_contact_name'] = "Contact Name";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $main_contact_name = $this->main_contact_name;
   $sStyleHidden_main_contact_name = '';
   if (isset($this->nmgp_cmp_hidden['main_contact_name']) && $this->nmgp_cmp_hidden['main_contact_name'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['main_contact_name']);
       $sStyleHidden_main_contact_name = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_main_contact_name = 'display: none;';
   $sStyleReadInp_main_contact_name = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['main_contact_name']) && $this->nmgp_cmp_readonly['main_contact_name'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['main_contact_name']);
       $sStyleReadLab_main_contact_name = '';
       $sStyleReadInp_main_contact_name = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['main_contact_name']) && $this->nmgp_cmp_hidden['main_contact_name'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="main_contact_name" value="<?php echo $this->form_encode_input($main_contact_name) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_main_contact_name_label" id="hidden_field_label_main_contact_name" style="<?php echo $sStyleHidden_main_contact_name; ?>"><span id="id_label_main_contact_name"><?php echo $this->nm_new_label['main_contact_name']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['main_contact_name']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['main_contact_name'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_main_contact_name_line" id="hidden_field_data_main_contact_name" style="<?php echo $sStyleHidden_main_contact_name; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_main_contact_name_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["main_contact_name"]) &&  $this->nmgp_cmp_readonly["main_contact_name"] == "on") { 

 ?>
<input type="hidden" name="main_contact_name" value="<?php echo $this->form_encode_input($main_contact_name) . "\">" . $main_contact_name . ""; ?>
<?php } else { ?>
<span id="id_read_on_main_contact_name" class="sc-ui-readonly-main_contact_name css_main_contact_name_line" style="<?php echo $sStyleReadLab_main_contact_name; ?>"><?php echo $this->form_format_readonly("main_contact_name", $this->form_encode_input($this->main_contact_name)); ?></span><span id="id_read_off_main_contact_name" class="css_read_off_main_contact_name<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_main_contact_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_main_contact_name_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_main_contact_name" type=text name="main_contact_name" value="<?php echo $this->form_encode_input($main_contact_name) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span class="scFormDataTagOdd" style="display: block">(First name Last name)</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_main_contact_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_main_contact_name_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['main_contact_phone']))
    {
        $this->nm_new_label['main_contact_phone'] = "Contact Phone";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $main_contact_phone = $this->main_contact_phone;
   $sStyleHidden_main_contact_phone = '';
   if (isset($this->nmgp_cmp_hidden['main_contact_phone']) && $this->nmgp_cmp_hidden['main_contact_phone'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['main_contact_phone']);
       $sStyleHidden_main_contact_phone = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_main_contact_phone = 'display: none;';
   $sStyleReadInp_main_contact_phone = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['main_contact_phone']) && $this->nmgp_cmp_readonly['main_contact_phone'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['main_contact_phone']);
       $sStyleReadLab_main_contact_phone = '';
       $sStyleReadInp_main_contact_phone = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['main_contact_phone']) && $this->nmgp_cmp_hidden['main_contact_phone'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="main_contact_phone" value="<?php echo $this->form_encode_input($main_contact_phone) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_main_contact_phone_label" id="hidden_field_label_main_contact_phone" style="<?php echo $sStyleHidden_main_contact_phone; ?>"><span id="id_label_main_contact_phone"><?php echo $this->nm_new_label['main_contact_phone']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['main_contact_phone']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['main_contact_phone'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_main_contact_phone_line" id="hidden_field_data_main_contact_phone" style="<?php echo $sStyleHidden_main_contact_phone; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_main_contact_phone_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["main_contact_phone"]) &&  $this->nmgp_cmp_readonly["main_contact_phone"] == "on") { 

 ?>
<input type="hidden" name="main_contact_phone" value="<?php echo $this->form_encode_input($main_contact_phone) . "\">" . $main_contact_phone . ""; ?>
<?php } else { ?>
<span id="id_read_on_main_contact_phone" class="sc-ui-readonly-main_contact_phone css_main_contact_phone_line" style="<?php echo $sStyleReadLab_main_contact_phone; ?>"><?php echo $this->form_format_readonly("main_contact_phone", $this->form_encode_input($this->main_contact_phone)); ?></span><span id="id_read_off_main_contact_phone" class="css_read_off_main_contact_phone<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_main_contact_phone; ?>">
 <input class="sc-js-input scFormObjectOdd css_main_contact_phone_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_main_contact_phone" type=text name="main_contact_phone" value="<?php echo $this->form_encode_input($main_contact_phone) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=116 alt="{datatype: 'mask', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', maskList: '(999) 999 - 9999', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_main_contact_phone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_main_contact_phone_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['main_contact_email']))
    {
        $this->nm_new_label['main_contact_email'] = "Contact Email";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $main_contact_email = $this->main_contact_email;
   $sStyleHidden_main_contact_email = '';
   if (isset($this->nmgp_cmp_hidden['main_contact_email']) && $this->nmgp_cmp_hidden['main_contact_email'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['main_contact_email']);
       $sStyleHidden_main_contact_email = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_main_contact_email = 'display: none;';
   $sStyleReadInp_main_contact_email = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['main_contact_email']) && $this->nmgp_cmp_readonly['main_contact_email'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['main_contact_email']);
       $sStyleReadLab_main_contact_email = '';
       $sStyleReadInp_main_contact_email = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['main_contact_email']) && $this->nmgp_cmp_hidden['main_contact_email'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="main_contact_email" value="<?php echo $this->form_encode_input($main_contact_email) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_main_contact_email_label" id="hidden_field_label_main_contact_email" style="<?php echo $sStyleHidden_main_contact_email; ?>"><span id="id_label_main_contact_email"><?php echo $this->nm_new_label['main_contact_email']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['main_contact_email']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['main_contact_email'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_main_contact_email_line" id="hidden_field_data_main_contact_email" style="<?php echo $sStyleHidden_main_contact_email; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_main_contact_email_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["main_contact_email"]) &&  $this->nmgp_cmp_readonly["main_contact_email"] == "on") { 

 ?>
<input type="hidden" name="main_contact_email" value="<?php echo $this->form_encode_input($main_contact_email) . "\">" . $main_contact_email . ""; ?>
<?php } else { ?>
<span id="id_read_on_main_contact_email" class="sc-ui-readonly-main_contact_email css_main_contact_email_line" style="<?php echo $sStyleReadLab_main_contact_email; ?>"><?php echo $this->form_format_readonly("main_contact_email", $this->form_encode_input($this->main_contact_email)); ?></span><span id="id_read_off_main_contact_email" class="css_read_off_main_contact_email<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_main_contact_email; ?>">
 <input class="sc-js-input scFormObjectOdd css_main_contact_email_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_main_contact_email" type=text name="main_contact_email" value="<?php echo $this->form_encode_input($main_contact_email) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=100 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<?php if ($this->nmgp_opcao != "novo"){ ?><?php echo nmButtonOutput($this->arr_buttons, "bemail", "if (document.F1.main_contact_email.value != '') {window.open('mailto:' + document.F1.main_contact_email.value); }", "if (document.F1.main_contact_email.value != '') {window.open('mailto:' + document.F1.main_contact_email.value); }", "main_contact_email_mail", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
<?php } ?>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_main_contact_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_main_contact_email_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['main_contact_title']))
    {
        $this->nm_new_label['main_contact_title'] = "Contact Title";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $main_contact_title = $this->main_contact_title;
   $sStyleHidden_main_contact_title = '';
   if (isset($this->nmgp_cmp_hidden['main_contact_title']) && $this->nmgp_cmp_hidden['main_contact_title'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['main_contact_title']);
       $sStyleHidden_main_contact_title = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_main_contact_title = 'display: none;';
   $sStyleReadInp_main_contact_title = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['main_contact_title']) && $this->nmgp_cmp_readonly['main_contact_title'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['main_contact_title']);
       $sStyleReadLab_main_contact_title = '';
       $sStyleReadInp_main_contact_title = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['main_contact_title']) && $this->nmgp_cmp_hidden['main_contact_title'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="main_contact_title" value="<?php echo $this->form_encode_input($main_contact_title) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_main_contact_title_label" id="hidden_field_label_main_contact_title" style="<?php echo $sStyleHidden_main_contact_title; ?>"><span id="id_label_main_contact_title"><?php echo $this->nm_new_label['main_contact_title']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['main_contact_title']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['main_contact_title'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_main_contact_title_line" id="hidden_field_data_main_contact_title" style="<?php echo $sStyleHidden_main_contact_title; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_main_contact_title_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["main_contact_title"]) &&  $this->nmgp_cmp_readonly["main_contact_title"] == "on") { 

 ?>
<input type="hidden" name="main_contact_title" value="<?php echo $this->form_encode_input($main_contact_title) . "\">" . $main_contact_title . ""; ?>
<?php } else { ?>
<span id="id_read_on_main_contact_title" class="sc-ui-readonly-main_contact_title css_main_contact_title_line" style="<?php echo $sStyleReadLab_main_contact_title; ?>"><?php echo $this->form_format_readonly("main_contact_title", $this->form_encode_input($this->main_contact_title)); ?></span><span id="id_read_off_main_contact_title" class="css_read_off_main_contact_title<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_main_contact_title; ?>">
 <input class="sc-js-input scFormObjectOdd css_main_contact_title_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_main_contact_title" type=text name="main_contact_title" value="<?php echo $this->form_encode_input($main_contact_title) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_main_contact_title_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_main_contact_title_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['main_contact_img_id']))
    {
        $this->nm_new_label['main_contact_img_id'] = "Contact Driver<br>License or ID";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $main_contact_img_id = $this->main_contact_img_id;
   $main_contact_img_file = $this->main_contact_img_file;
   $sStyleHidden_main_contact_img_id = '';
   if (isset($this->nmgp_cmp_hidden['main_contact_img_id']) && $this->nmgp_cmp_hidden['main_contact_img_id'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['main_contact_img_id']);
       $sStyleHidden_main_contact_img_id = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_main_contact_img_id = 'display: none;';
   $sStyleReadInp_main_contact_img_id = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['main_contact_img_id']) && $this->nmgp_cmp_readonly['main_contact_img_id'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['main_contact_img_id']);
       $sStyleReadLab_main_contact_img_id = '';
       $sStyleReadInp_main_contact_img_id = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['main_contact_img_id']) && $this->nmgp_cmp_hidden['main_contact_img_id'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="main_contact_img_id" value="<?php echo $this->form_encode_input($main_contact_img_id) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_main_contact_img_id_label" id="hidden_field_label_main_contact_img_id" style="<?php echo $sStyleHidden_main_contact_img_id; ?>"><span id="id_label_main_contact_img_id"><?php echo $this->nm_new_label['main_contact_img_id']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['main_contact_img_id']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['main_contact_img_id'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_main_contact_img_id_line" id="hidden_field_data_main_contact_img_id" style="<?php echo $sStyleHidden_main_contact_img_id; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_main_contact_img_id_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["main_contact_img_id"]) &&  $this->nmgp_cmp_readonly["main_contact_img_id"] == "on") { 

 ?>
<input type="hidden" name="main_contact_img_id" value=""><img id=\"main_contact_img_id_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><span id=\"id_ajax_doc_main_contact_img_id\"><a href=\"javascript:nm_mostra_doc('documento_db', '" . str_replace("'", "\'", trim($main_contact_img_file)) . "', 'form_clients_staff')\">" . $main_contact_img_file"</a></span>"; ?>
<?php } else { ?>
<span id="id_read_on_main_contact_img_id" class="scFormLinkOdd sc-ui-readonly-main_contact_img_id css_main_contact_img_id_line" style="<?php echo $sStyleReadLab_main_contact_img_id; ?>"><?php echo $this->form_format_readonly("main_contact_img_file", $main_contact_img_file) ?></span><span id="id_read_off_main_contact_img_id" class="css_read_off_main_contact_img_id" style="white-space: nowrap;<?php echo $sStyleReadInp_main_contact_img_id; ?>"><span style="display:none"><span id="sc-id-upload-select-main_contact_img_id" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_main_contact_img_id_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="main_contact_img_id[]" id="id_sc_field_main_contact_img_id" ></span></span>
<?php
   $sCheckInsert = "";
?>
<span style="display: none"><span id="chk_ajax_img_main_contact_img_id"<?php if ($this->nmgp_opcao == "novo" || empty($main_contact_img_id)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="main_contact_img_id_limpa" value="<?php echo $main_contact_img_id_limpa . '" '; if ($main_contact_img_id_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};<?php echo $sCheckInsert ?>"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span></span>
<?php 
   $main_contact_img_file = trim($main_contact_img_file); 
   if (!empty($main_contact_img_file)) 
   { 
       $nm_img_icone = $this->gera_icone($main_contact_img_file); 
       if (!empty($nm_img_icone)) 
       { 
           $nm_img_icone = "<img src=\"$nm_img_icone\" id=\"id_ajax_doc_icon_main_contact_img_id\">&nbsp;";
       } 
       echo  $nm_img_icone;
   } 
?> 
<img id="main_contact_img_id_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><span id="id_ajax_doc_main_contact_img_id"><a href="javascript:nm_mostra_doc('documento_db', '<?php echo str_replace("'", "\'", substr($sTmpFile_main_contact_img_file, 3)) ;?>', 'form_clients_staff')"><?php echo $main_contact_img_file ?></a></span><div id="id_img_loader_main_contact_img_id" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_main_contact_img_id" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
<div id="id_sc_dragdrop_main_contact_img_id" class="scFormDataDragNDrop"  style="<?php echo $sStyleReadInp_main_contact_img_id ?>cursor:pointer" onclick="$('#id_sc_field_main_contact_img_id').click()"><i class='fas fa-cloud-upload-alt'></i><br/>
<?php echo $this->Ini->Nm_lang['lang_errm_mu_dragfile_clickable'] ?></div>
<span class="scFormDataTagOdd" style="display: block">Primary contact's ID scan</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_main_contact_img_id_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_main_contact_img_id_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="2" >&nbsp;</TD>
<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } ?>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   <a name="bloco_2"></a>
<div id="div_hidden_bloco_2" style="display: none; width: 1px; height: 0px; overflow: scroll" class="scBlockFrame"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['memb_list']))
    {
        $this->nm_new_label['memb_list'] = "Buyers";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $memb_list = $this->memb_list;
   $sStyleHidden_memb_list = '';
   if (isset($this->nmgp_cmp_hidden['memb_list']) && $this->nmgp_cmp_hidden['memb_list'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['memb_list']);
       $sStyleHidden_memb_list = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_memb_list = 'display: none;';
   $sStyleReadInp_memb_list = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['memb_list']) && $this->nmgp_cmp_readonly['memb_list'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['memb_list']);
       $sStyleReadLab_memb_list = '';
       $sStyleReadInp_memb_list = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['memb_list']) && $this->nmgp_cmp_hidden['memb_list'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="memb_list" value="<?php echo $this->form_encode_input($memb_list) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_memb_list_line" id="hidden_field_data_memb_list" style="<?php echo $sStyleHidden_memb_list; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_memb_list_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_memb_list'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_memb_list'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_members_staff_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_memb_list'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_members_staff_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_members_staff_script_case_init'] ]['form_members_staff']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_members_staff_script_case_init'] ]['form_members_staff']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_members_staff_script_case_init'] ]['form_members_staff']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_members_staff_script_case_init'] ]['form_members_staff']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_members_staff_script_case_init'] ]['form_members_staff']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_members_staff_script_case_init'] ]['form_members_staff']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_members_staff_script_case_init'] ]['form_members_staff']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_members_staff_script_case_init'] ]['form_members_staff']['embutida_liga_form_btn_nav'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_members_staff_script_case_init'] ]['form_members_staff']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_members_staff_script_case_init'] ]['form_members_staff']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_members_staff_script_case_init'] ]['form_members_staff']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_members_staff_script_case_init'] ]['form_members_staff']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_members_staff_script_case_init'] ]['form_members_staff']['embutida_parms'] = "SC_glo_par_gv_members_ct*scingv_members_ct*scoutgv_client_id*scin" . $this->nmgp_dados_form['client_id'] . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinS*scoutlink_remove_margin*scinok*scoutlink_remove_border*scinok*scoutlink_remove_background*scinok*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_members_staff_script_case_init'] ]['form_members_staff']['foreign_key']['client_id'] = $this->nmgp_dados_form['client_id'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_members_staff_script_case_init'] ]['form_members_staff']['where_filter'] = "client_id = " . $this->nmgp_dados_form['client_id'] . "";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_members_staff_script_case_init'] ]['form_members_staff']['where_detal']  = "client_id = " . $this->nmgp_dados_form['client_id'] . "";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_members_staff_script_case_init'] ]['form_clients_staff']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_members_staff_script_case_init'] ]['form_members_staff']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_clients_staff_empty.htm' : $this->Ini->link_form_members_staff_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y&sc_ifr_height=600';
if (isset($this->Ini->sc_lig_target['C_@scinf_memb_list']) && 'nmsc_iframe_liga_form_members_staff' != $this->Ini->sc_lig_target['C_@scinf_memb_list'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_memb_list'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_members_staff_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_memb_list'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_members_staff"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="600" width="1100" name="nmsc_iframe_liga_form_members_staff"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_memb_list_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_memb_list_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_memb_list_dumb = ('' == $sStyleHidden_memb_list) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_memb_list_dumb" style="<?php echo $sStyleHidden_memb_list_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   <a name="bloco_3"></a>
<div id="div_hidden_bloco_3" style="display: none; width: 1px; height: 0px; overflow: scroll" class="scBlockFrame"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_3" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['docs']))
    {
        $this->nm_new_label['docs'] = "Docs";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $docs = $this->docs;
   $sStyleHidden_docs = '';
   if (isset($this->nmgp_cmp_hidden['docs']) && $this->nmgp_cmp_hidden['docs'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['docs']);
       $sStyleHidden_docs = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_docs = 'display: none;';
   $sStyleReadInp_docs = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['docs']) && $this->nmgp_cmp_readonly['docs'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['docs']);
       $sStyleReadLab_docs = '';
       $sStyleReadInp_docs = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['docs']) && $this->nmgp_cmp_hidden['docs'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="docs" value="<?php echo $this->form_encode_input($docs) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_docs_line" id="hidden_field_data_docs" style="<?php echo $sStyleHidden_docs; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_docs_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_docs'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_docs'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['grid_client_docs_2_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_docs'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['grid_client_docs_2_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['grid_client_docs_2_script_case_init'] ]['grid_client_docs_2']['embutida_form_full']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['grid_client_docs_2_script_case_init'] ]['grid_client_docs_2']['embutida_form']       = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['grid_client_docs_2_script_case_init'] ]['grid_client_docs_2']['embutida_pai']        = "form_clients_staff";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['grid_client_docs_2_script_case_init'] ]['grid_client_docs_2']['embutida_form_parms'] = "gv_client_id*scin" . $this->nmgp_dados_form['client_id'] . "*scoutNMSC_inicial*scininicio*scoutNMSC_rows*scin5*scoutNMSC_paginacao*scinPARCIAL*scoutNMSC_cab*scinN*scoutlink_remove_margin*scinok*scoutlink_remove_border*scinok*scoutlink_remove_background*scinok*scout";
 if (isset($this->Ini->sc_lig_md5["grid_client_docs_2"]) && $this->Ini->sc_lig_md5["grid_client_docs_2"] == "S") {
     $Parms_Lig  = "gv_client_id*scin" . $this->nmgp_dados_form['client_id'] . "*scoutNMSC_inicial*scininicio*scoutNMSC_rows*scin5*scoutNMSC_paginacao*scinPARCIAL*scoutNMSC_cab*scinN*scoutlink_remove_margin*scinok*scoutlink_remove_border*scinok*scoutlink_remove_background*scinok*scout";
     $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_clients_staff@SC_par@" . md5($Parms_Lig);
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
 } else {
     $Md5_Lig  = "gv_client_id*scin" . $this->nmgp_dados_form['client_id'] . "*scoutNMSC_inicial*scininicio*scoutNMSC_rows*scin5*scoutNMSC_paginacao*scinPARCIAL*scoutNMSC_cab*scinN*scoutlink_remove_margin*scinok*scoutlink_remove_border*scinok*scoutlink_remove_background*scinok*scout";
 }
 $parms_lig_cons = "&nmgp_parms=" . $Md5_Lig;
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_clients_staff_empty.htm' : $this->Ini->link_grid_client_docs_2_cons . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y&sc_ifr_height=500' . $parms_lig_cons;
if (isset($this->Ini->sc_lig_target['C_@scinf_docs']) && 'nmsc_iframe_liga_grid_client_docs_2' != $this->Ini->sc_lig_target['C_@scinf_docs'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_docs'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['grid_client_docs_2_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_docs'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_grid_client_docs_2"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="500" width="100%" name="nmsc_iframe_liga_grid_client_docs_2"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_docs_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_docs_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="1" >&nbsp;</TD>




<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   <a name="bloco_4"></a>
<div id="div_hidden_bloco_4" style="display: none; width: 1px; height: 0px; overflow: scroll" class="scBlockFrame"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_4" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['client_pmts']))
    {
        $this->nm_new_label['client_pmts'] = "Payments";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $client_pmts = $this->client_pmts;
   $sStyleHidden_client_pmts = '';
   if (isset($this->nmgp_cmp_hidden['client_pmts']) && $this->nmgp_cmp_hidden['client_pmts'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['client_pmts']);
       $sStyleHidden_client_pmts = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_client_pmts = 'display: none;';
   $sStyleReadInp_client_pmts = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['client_pmts']) && $this->nmgp_cmp_readonly['client_pmts'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['client_pmts']);
       $sStyleReadLab_client_pmts = '';
       $sStyleReadInp_client_pmts = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['client_pmts']) && $this->nmgp_cmp_hidden['client_pmts'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="client_pmts" value="<?php echo $this->form_encode_input($client_pmts) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_client_pmts_line" id="hidden_field_data_client_pmts" style="<?php echo $sStyleHidden_client_pmts; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_client_pmts_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_client_pmts'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_client_pmts'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_client_pmts_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_client_pmts'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_client_pmts_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_client_pmts_script_case_init'] ]['form_client_pmts']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_client_pmts_script_case_init'] ]['form_client_pmts']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_client_pmts_script_case_init'] ]['form_client_pmts']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_client_pmts_script_case_init'] ]['form_client_pmts']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_client_pmts_script_case_init'] ]['form_client_pmts']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_client_pmts_script_case_init'] ]['form_client_pmts']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_client_pmts_script_case_init'] ]['form_client_pmts']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_client_pmts_script_case_init'] ]['form_client_pmts']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_client_pmts_script_case_init'] ]['form_client_pmts']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_client_pmts_script_case_init'] ]['form_client_pmts']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_client_pmts_script_case_init'] ]['form_client_pmts']['embutida_liga_qtd_reg'] = '5';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_client_pmts_script_case_init'] ]['form_client_pmts']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_client_pmts_script_case_init'] ]['form_client_pmts']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scoutlink_remove_margin*scinok*scoutlink_remove_border*scinok*scoutlink_remove_background*scinok*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_client_pmts_script_case_init'] ]['form_client_pmts']['foreign_key']['client_id'] = $this->nmgp_dados_form['client_id'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_client_pmts_script_case_init'] ]['form_client_pmts']['where_filter'] = "client_id = " . $this->nmgp_dados_form['client_id'] . "";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_client_pmts_script_case_init'] ]['form_client_pmts']['where_detal']  = "client_id = " . $this->nmgp_dados_form['client_id'] . "";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_client_pmts_script_case_init'] ]['form_clients_staff']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_client_pmts_script_case_init'] ]['form_client_pmts']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_clients_staff_empty.htm' : $this->Ini->link_form_client_pmts_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y&sc_ifr_height=500';
if (isset($this->Ini->sc_lig_target['C_@scinf_client_pmts']) && 'nmsc_iframe_liga_form_client_pmts' != $this->Ini->sc_lig_target['C_@scinf_client_pmts'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_client_pmts'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_client_pmts_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_client_pmts'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_client_pmts"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="500" width="100%" name="nmsc_iframe_liga_form_client_pmts"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_client_pmts_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_client_pmts_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   <a name="bloco_5"></a>
<div id="div_hidden_bloco_5" style="display: none; width: 1px; height: 0px; overflow: scroll" class="scBlockFrame"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_5" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['notes']))
    {
        $this->nm_new_label['notes'] = "Notes";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $notes = $this->notes;
   $sStyleHidden_notes = '';
   if (isset($this->nmgp_cmp_hidden['notes']) && $this->nmgp_cmp_hidden['notes'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['notes']);
       $sStyleHidden_notes = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_notes = 'display: none;';
   $sStyleReadInp_notes = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['notes']) && $this->nmgp_cmp_readonly['notes'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['notes']);
       $sStyleReadLab_notes = '';
       $sStyleReadInp_notes = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['notes']) && $this->nmgp_cmp_hidden['notes'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="notes" value="<?php echo $this->form_encode_input($notes) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_notes_line" id="hidden_field_data_notes" style="<?php echo $sStyleHidden_notes; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_notes_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_notes'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_notes'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['grid_client_notes_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_notes'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['grid_client_notes_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['grid_client_notes_script_case_init'] ]['grid_client_notes']['embutida_form_full']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['grid_client_notes_script_case_init'] ]['grid_client_notes']['embutida_form']       = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['grid_client_notes_script_case_init'] ]['grid_client_notes']['embutida_pai']        = "form_clients_staff";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['grid_client_notes_script_case_init'] ]['grid_client_notes']['embutida_form_parms'] = "gv_client_id*scin" . $this->nmgp_dados_form['client_id'] . "*scoutNMSC_inicial*scininicio*scoutNMSC_rows*scin5*scoutNMSC_paginacao*scinPARCIAL*scoutNMSC_cab*scinN*scoutlink_remove_margin*scinok*scoutlink_remove_border*scinok*scoutlink_remove_background*scinok*scout";
 if (isset($this->Ini->sc_lig_md5["grid_client_notes"]) && $this->Ini->sc_lig_md5["grid_client_notes"] == "S") {
     $Parms_Lig  = "gv_client_id*scin" . $this->nmgp_dados_form['client_id'] . "*scoutNMSC_inicial*scininicio*scoutNMSC_rows*scin5*scoutNMSC_paginacao*scinPARCIAL*scoutNMSC_cab*scinN*scoutlink_remove_margin*scinok*scoutlink_remove_border*scinok*scoutlink_remove_background*scinok*scout";
     $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_clients_staff@SC_par@" . md5($Parms_Lig);
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
 } else {
     $Md5_Lig  = "gv_client_id*scin" . $this->nmgp_dados_form['client_id'] . "*scoutNMSC_inicial*scininicio*scoutNMSC_rows*scin5*scoutNMSC_paginacao*scinPARCIAL*scoutNMSC_cab*scinN*scoutlink_remove_margin*scinok*scoutlink_remove_border*scinok*scoutlink_remove_background*scinok*scout";
 }
 $parms_lig_cons = "&nmgp_parms=" . $Md5_Lig;
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_clients_staff_empty.htm' : $this->Ini->link_grid_client_notes_cons . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y&sc_ifr_height=500' . $parms_lig_cons;
if (isset($this->Ini->sc_lig_target['C_@scinf_notes']) && 'nmsc_iframe_liga_grid_client_notes' != $this->Ini->sc_lig_target['C_@scinf_notes'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_notes'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['grid_client_notes_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_notes'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_grid_client_notes"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="500" width="1100" name="nmsc_iframe_liga_grid_client_notes"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_notes_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_notes_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






</TABLE></div><!-- bloco_f -->
</td></tr>
<tr id="sc-id-required-row"><td class="scFormPageText">
<?php
$requiredMessage = $this->Ini->Nm_lang['lang_othr_reqr'];
?>
<span class="scFormRequiredOddColor">* <?php echo $requiredMessage; ?></span>
</td></tr> 
<tr><td>
<?php
$this->displayBottomToolbar();
?>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
    $NM_btn = false;
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['run_iframe'] != "R")
{
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-3';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['update'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['btn_delete_backend'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['btn_delete_backend']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['btn_delete_backend']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['btn_delete_backend']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['btn_delete_backend']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['btn_delete_backend'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "btn_delete_backend", "scBtnFn_btn_delete_backend()", "scBtnFn_btn_delete_backend()", "sc_btn_delete_backend_bot", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
        $sCondStyle = ($this->nmgp_botoes['reload'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-4';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['breload']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['breload']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['breload']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['breload']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['breload'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "breload", "scBtnFn_sys_format_reload()", "scBtnFn_sys_format_reload()", "sc_b_reload_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['btn_back_reqs'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['btn_back_reqs']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['btn_back_reqs']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['btn_back_reqs']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['btn_back_reqs']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['btn_back_reqs'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "btn_back_reqs", "scBtnFn_btn_back_reqs()", "scBtnFn_btn_back_reqs()", "sc_btn_back_reqs_bot", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
        $sCondStyle = ($this->nmgp_botoes['btn_back_renewals'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['btn_back_renewals']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['btn_back_renewals']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['btn_back_renewals']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['btn_back_renewals']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['btn_back_renewals'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "btn_back_renewals", "scBtnFn_btn_back_renewals()", "scBtnFn_btn_back_renewals()", "sc_btn_back_renewals_bot", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
        $sCondStyle = ($this->nmgp_botoes['back_clients'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['back_clients']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['back_clients']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['back_clients']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['back_clients']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['back_clients'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "back_clients", "scBtnFn_back_clients()", "scBtnFn_back_clients()", "sc_back_clients_bot", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    if (isset($this->NMSC_modal) && $this->NMSC_modal == "ok") {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-5';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai_modal()", "scBtnFn_sys_format_sai_modal()", "sc_b_sai_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');</script><?php } ?>
</td></tr> 
</table> 
</div> 
</td> 
</tr> 
</table> 

<div id="id_debug_window" style="display: none;" class='scDebugWindow'><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>

</form> 
<?php
      $Tzone = ini_get('date.timezone');
      if (empty($Tzone))
      {
?>
<script> 
  _scAjaxShowMessage({title: '', message: "<?php echo $this->Ini->Nm_lang['lang_errm_tz']; ?>", isModal: false, timeout: 0, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: true, showBodyIcon: false, isToast: false, toastPos: ""});
</script> 
<?php
      }
?>
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5);
  $nm_sc_blocos_aba    = array(1 => 1,2 => 1,3 => 1,4 => 1,5 => 1);
  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = 'hidden';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
$(window).bind("load", function() {
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5);
  $nm_sc_blocos_aba    = array(1 => 1,2 => 1,3 => 1,4 => 1,5 => 1);
  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = '';";
      }
  }
?>
});
</script> 
<script>
<?php
if (isset($this->NM_ajax_info['focus']) && '' != $this->NM_ajax_info['focus'])
{
?>
scFocusField('<?php echo $this->NM_ajax_info['focus']; ?>');
<?php
}
?>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['masterValue']);
?>
}
<?php
    }
}
?>
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_clients_staff");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_clients_staff");
 parent.scAjaxDetailHeight("form_clients_staff", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_clients_staff", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_clients_staff", <?php echo $sTamanhoIframe; ?>);
 }
</script>
<?php
    }
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
    $isToast   = isset($this->NM_ajax_info['displayMsgToast']) && $this->NM_ajax_info['displayMsgToast'] ? 'true' : 'false';
    $toastType = $isToast && isset($this->NM_ajax_info['displayMsgToastType']) ? $this->NM_ajax_info['displayMsgToastType'] : '';
?>
<script type="text/javascript">
_scAjaxShowMessage({title: scMsgDefTitle, message: "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: <?php echo $isToast ?>, toastPos: "", type: "<?php echo $toastType ?>"});
</script>
<?php
}
?>
<?php
if (isset($this->scFormFocusErrorName) && '' != $this->scFormFocusErrorName)
{
?>
<script>
scAjaxFocusError();
</script>
<?php
}
?>
<script type='text/javascript'>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['sc_modal'])
{
?>
  parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
elseif ($this->lig_edit_lookup)
{
?>
  opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
?>
}
if (bLigEditLookupCall)
{
  scLigEditLookupCall();
}
<?php
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
<?php
if ($this->nmgp_form_empty) {
?>
<script type="text/javascript">
scAjax_displayEmptyForm();
</script>
<?php
}
?>
<script type="text/javascript">
        function scBtnFn_sys_format_alt() {
                if ($("#sc_b_upd_t.sc-unique-btn-1").length && $("#sc_b_upd_t.sc-unique-btn-1").is(":visible")) {
                    if ($("#sc_b_upd_t.sc-unique-btn-1").hasClass("disabled")) {
                        return;
                    }
                        nm_atualiza ('alterar');
                         return;
                }
                if ($("#sc_b_upd_b.sc-unique-btn-3").length && $("#sc_b_upd_b.sc-unique-btn-3").is(":visible")) {
                    if ($("#sc_b_upd_b.sc-unique-btn-3").hasClass("disabled")) {
                        return;
                    }
                        nm_atualiza ('alterar');
                         return;
                }
        }
        function scBtnFn_btn_delete_backend() {
                if ($("#sc_btn_delete_backend_top").length && $("#sc_btn_delete_backend_top").is(":visible")) {
                    if ($("#sc_btn_delete_backend_top").hasClass("disabled")) {
                        return;
                    }
                        sc_btn_btn_delete_backend()
                         return;
                }
                if ($("#sc_btn_delete_backend_bot").length && $("#sc_btn_delete_backend_bot").is(":visible")) {
                    if ($("#sc_btn_delete_backend_bot").hasClass("disabled")) {
                        return;
                    }
                        sc_btn_btn_delete_backend()
                         return;
                }
        }
        function scBtnFn_coll_pmt_js() {
                if ($("#sc_coll_pmt_js_top").length && $("#sc_coll_pmt_js_top").is(":visible")) {
                    if ($("#sc_coll_pmt_js_top").hasClass("disabled")) {
                        return;
                    }
                        sc_btn_coll_pmt_js()
                         return;
                }
        }
        function scBtnFn_email_client_if_active() {
                if ($("#sc_email_client_if_active_top").length && $("#sc_email_client_if_active_top").is(":visible")) {
                    if ($("#sc_email_client_if_active_top").hasClass("disabled")) {
                        return;
                    }
                        sc_btn_email_client_if_active()
                         return;
                }
        }
        function scBtnFn_sys_format_reload() {
                if ($("#sc_b_reload_t.sc-unique-btn-2").length && $("#sc_b_reload_t.sc-unique-btn-2").is(":visible")) {
                    if ($("#sc_b_reload_t.sc-unique-btn-2").hasClass("disabled")) {
                        return;
                    }
                        scAjax_formReload();
                         return;
                }
                if ($("#sc_b_reload_b.sc-unique-btn-4").length && $("#sc_b_reload_b.sc-unique-btn-4").is(":visible")) {
                    if ($("#sc_b_reload_b.sc-unique-btn-4").hasClass("disabled")) {
                        return;
                    }
                        scAjax_formReload();
                         return;
                }
        }
        function scBtnFn_btn_back_reqs() {
                if ($("#sc_btn_back_reqs_top").length && $("#sc_btn_back_reqs_top").is(":visible")) {
                    if ($("#sc_btn_back_reqs_top").hasClass("disabled")) {
                        return;
                    }
                        sc_btn_btn_back_reqs()
                         return;
                }
                if ($("#sc_btn_back_reqs_bot").length && $("#sc_btn_back_reqs_bot").is(":visible")) {
                    if ($("#sc_btn_back_reqs_bot").hasClass("disabled")) {
                        return;
                    }
                        sc_btn_btn_back_reqs()
                         return;
                }
        }
        function scBtnFn_btn_back_renewals() {
                if ($("#sc_btn_back_renewals_top").length && $("#sc_btn_back_renewals_top").is(":visible")) {
                    if ($("#sc_btn_back_renewals_top").hasClass("disabled")) {
                        return;
                    }
                        sc_btn_btn_back_renewals()
                         return;
                }
                if ($("#sc_btn_back_renewals_bot").length && $("#sc_btn_back_renewals_bot").is(":visible")) {
                    if ($("#sc_btn_back_renewals_bot").hasClass("disabled")) {
                        return;
                    }
                        sc_btn_btn_back_renewals()
                         return;
                }
        }
        function scBtnFn_back_clients() {
                if ($("#sc_back_clients_top").length && $("#sc_back_clients_top").is(":visible")) {
                    if ($("#sc_back_clients_top").hasClass("disabled")) {
                        return;
                    }
                        sc_btn_back_clients()
                         return;
                }
                if ($("#sc_back_clients_bot").length && $("#sc_back_clients_bot").is(":visible")) {
                    if ($("#sc_back_clients_bot").hasClass("disabled")) {
                        return;
                    }
                        sc_btn_back_clients()
                         return;
                }
        }
        function scBtnFn_close_tab() {
                if ($("#sc_close_tab_top").length && $("#sc_close_tab_top").is(":visible")) {
                    if ($("#sc_close_tab_top").hasClass("disabled")) {
                        return;
                    }
                        sc_btn_close_tab()
                         return;
                }
        }
        function scBtnFn_sys_format_sai_modal() {
                if ($("#sc_b_sai_b.sc-unique-btn-5").length && $("#sc_b_sai_b.sc-unique-btn-5").is(":visible")) {
                    if ($("#sc_b_sai_b.sc-unique-btn-5").hasClass("disabled")) {
                        return;
                    }
                        scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
                         return;
                }
        }
</script>
<script type="text/javascript">
$(function() {
 $("#sc-id-mobile-in").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("in");
 });
 $("#sc-id-mobile-out").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("out");
 });
});
function scMobileDisplayControl(sOption) {
 $("#sc-id-mobile-control").val(sOption);
 nm_atualiza("recarga_mobile");
}
</script>
<?php
       if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'])
       {
?>
<span id="sc-id-mobile-in"><?php echo $this->Ini->Nm_lang['lang_version_mobile']; ?></span>
<?php
       }
?>
<iframe id="sc-id-download-iframe" name="sc_name_download_iframe" style="display: none"></iframe>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['buttonStatus'] = $this->nmgp_botoes;
?>
<script type="text/javascript">
   function sc_session_redir(url_redir)
   {
       if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')
       {
           window.parent.sc_session_redir(url_redir);
       }
       else
       {
           if (window.opener && typeof window.opener.sc_session_redir === 'function')
           {
               window.close();
               window.opener.sc_session_redir(url_redir);
           }
           else
           {
               window.location = url_redir;
           }
       }
   }
</script>
</body> 
</html> 
