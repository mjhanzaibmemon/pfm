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
.css_read_off_starting_date button {
        background-color: transparent;
        border: 0;
        padding: 0
}
.css_read_off_renewal_date button {
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
.css_read_off_permanent_member_date button {
        background-color: transparent;
        border: 0;
        padding: 0
}
</style>
<?php
}
?>
 <style type="text/css">
  .scSpin_buyers_excel_qty_obj {
   border: 0 !important;
   margin: 0 20px 0 0 !important;
  }
 </style>
<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/jsignature/flashcanvas.js"></script>
<![endif]-->
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/jsignature/jSignature.min.js"></script>
<?php

if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['link_info']['margin_top']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['link_info']['margin_top']) {
?>
<style>
.scFormBorder {
    padding-top: 0 !important;
}
.scBlockRowFirst .scFormTable {
    margin-top: <?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['link_info']['margin_top'] ?>;
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="form_clients_steps_appn_test_wizard.css" />
<?php
if ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']) {
?>
 <link rel="stylesheet" type="text/css" href="form_clients_steps_appn_test_wizard_mobile.css" />
<?php
}
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_clients_steps_appn_test/form_clients_steps_appn_test_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_tiny_mce; ?>"></SCRIPT>
 <STYLE>
.tox-toolbar, .tox-toolbar__primary {justify-content: left !important}
 </STYLE>

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php if (isset($this->scFormFocusErrorName)) {echo $this->scFormFocusErrorName;} ?>";
</script>

<?php
include_once("form_clients_steps_appn_test_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_disabled']['last'] : 'off'); ?>";
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
<?php

include_once('form_clients_steps_appn_test_jquery.php');

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
  addAutocomplete(this);

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
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

function addAutocomplete(elem) {
 $(".sc-ui-autocomp-business_type", elem).each(function() {

  $(this).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "business_type" != sId ? sId.substr(13) : "";
   if ("" == $(this).val()) {
    var hasChanged = "" != $("#id_sc_field_" + sId).val();
    $("#id_sc_field_" + sId).val("");
    if (hasChanged) {
     if ('function' == typeof do_ajax_form_clients_steps_appn_test_event_business_type_onchange) { do_ajax_form_clients_steps_appn_test_event_business_type_onchange(sRow); }
    }
   }
   scEventControl_data[sId]["autocomp"] = false;
  }).on("keydown", function(e) {
   if(e.keyCode == $.ui.keyCode.TAB && $(".ui-autocomplete").filter(":visible").length) {
    e.keyCode = $.ui.keyCode.DOWN;
    $(this).trigger(e);
    e.keyCode = $.ui.keyCode.ENTER;
    $(this).trigger(e);
   }
  }).autocomplete({
   minLength: 1,
   source: function (request, response) {
    $.ajax({
     url: "form_clients_steps_appn_test.php",
     dataType: "json",
     data: {
      term: request.term,
      nmgp_opcao: "ajax_autocomp",
      nmgp_parms: "NM_ajax_opcao?#?autocomp_business_type",
      script_case_init: document.F2.script_case_init.value
     },
     success: function (data) {
      if (data == "ss_time_out") {
          nm_move('novo');
      }
      response(data);
     }
    });
   },
   focus: function (event, ui) {
    event.preventDefault();
   },
   select: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'business_type' != sId ? sId.substr(13) : '';
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
    $("#id_sc_field_" + sId).trigger("focus");
   }
  });
  $("#id_ac_business_type", elem).on("focus", function() {
    $("#id_sc_field_business_type").trigger("focus");
  }).on("blur", function() {
    $("#id_sc_field_business_type").trigger("blur");
  });
 });
}
</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    $remove_background = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['dashboard_info']['remove_background']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['dashboard_info']['remove_background'] ? 'background-color: transparent; background-image: none; ' : '';
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['link_info']['remove_margin']) {
        $remove_margin = 'margin: 0; ';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['link_info']['remove_background']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['link_info']['remove_background']) {
        $remove_background = 'background-color: transparent; background-image: none; ';
    }
    if ('' != $remove_margin && isset($str_iframe_body) && '' != $str_iframe_body) {
        $str_iframe_body = '';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['link_info']['remove_border']) {
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
 include_once("form_clients_steps_appn_test_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['insert_validation']; ?>">
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
<input type="hidden" name="doc_file_salva" value="<?php  echo $this->form_encode_input($this->doc_file) ?>">
<input type="hidden" name="more_buyers_xlsx_salva" value="<?php  echo $this->form_encode_input($this->more_buyers_xlsx) ?>">
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_clients_steps_appn_test'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_clients_steps_appn_test'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<?php
$this->displayAppHeader();
?>
<tr><td>
<?php
$this->displayTopToolbar();
?>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
    $NM_btn = false;
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['run_iframe'] != "R")
{
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['empty_filter'] = true;
       }
  }
?>
</td></tr>
<tr><td>
<?php
$stepsDivClass = 'sc-div-steps';
$stepsDivStyle = '';
if ('novo' != $this->nmgp_opcao) {
}
?>
<div class='<?php echo $stepsDivClass ?><?php if ('RTL' == $_SESSION['scriptcase']['reg_conf']['css_dir']) { echo ' is-rtl'; } ?>' style='<?php echo $stepsDivStyle ?>'>
<?php
$this->wizard_display('numbered');
?>
</div>
</td></tr>
<tr><td style="padding: 0px">
<div id="form_clients_steps_appn_test_form0" style='<?php echo (3 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['form_wizard']['actual_step'] ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow scBlockRowFirst"><tr valign="top"><td width="60%" height="">
<div id="div_hidden_bloco_0" class="scBlockFrame"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><input type="hidden" name="doc_file_ul_name" id="id_sc_field_doc_file_ul_name" value="<?php echo $this->form_encode_input($this->doc_file_ul_name);?>">
<input type="hidden" name="doc_file_ul_type" id="id_sc_field_doc_file_ul_type" value="<?php echo $this->form_encode_input($this->doc_file_ul_type);?>">
<input type="hidden" name="main_contact_img_id_ul_name" id="id_sc_field_main_contact_img_id_ul_name" value="<?php echo $this->form_encode_input($this->main_contact_img_id_ul_name);?>">
<input type="hidden" name="main_contact_img_id_ul_type" id="id_sc_field_main_contact_img_id_ul_type" value="<?php echo $this->form_encode_input($this->main_contact_img_id_ul_type);?>">
<input type="hidden" name="more_buyers_xlsx_ul_name" id="id_sc_field_more_buyers_xlsx_ul_name" value="<?php echo $this->form_encode_input($this->more_buyers_xlsx_ul_name);?>">
<input type="hidden" name="more_buyers_xlsx_ul_type" id="id_sc_field_more_buyers_xlsx_ul_type" value="<?php echo $this->form_encode_input($this->more_buyers_xlsx_ul_type);?>">
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['client_id']))
           {
               $this->nmgp_cmp_readonly['client_id'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['client_id']))
    {
        $this->nm_new_label['client_id'] = "Application #";
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
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormDataOdd css_client_id_line" id="hidden_field_data_client_id" style="<?php echo $sStyleHidden_client_id; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_client_id_line" style="padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_client_id_label" style=""><span id="id_label_client_id"><?php echo $this->nm_new_label['client_id']; ?></span></span><br><span id="id_read_on_client_id" class="css_client_id_line" style="<?php echo $sStyleReadLab_client_id; ?>"><?php echo $this->form_format_readonly("client_id", $this->form_encode_input($this->client_id)); ?></span><span id="id_read_off_client_id" class="css_read_off_client_id" style="<?php echo $sStyleReadInp_client_id; ?>"><input type="hidden" name="client_id" value="<?php echo $this->form_encode_input($client_id) . "\">"?><span id="id_ajax_label_client_id"><?php echo nl2br($client_id); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_client_id_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_client_id_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }
      else
      {
         $sc_hidden_no--;
      }
?>
<?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


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

    <TD class="scFormDataOdd css_co_name_line" id="hidden_field_data_co_name" style="<?php echo $sStyleHidden_co_name; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_co_name_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_co_name_label" style=""><span id="id_label_co_name"><?php echo $this->nm_new_label['co_name']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['co_name']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['co_name'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["co_name"]) &&  $this->nmgp_cmp_readonly["co_name"] == "on") { 

 ?>
<input type="hidden" name="co_name" value="<?php echo $this->form_encode_input($co_name) . "\">" . $co_name . ""; ?>
<?php } else { ?>
<span id="id_read_on_co_name" class="sc-ui-readonly-co_name css_co_name_line" style="<?php echo $sStyleReadLab_co_name; ?>"><?php echo $this->form_format_readonly("co_name", $this->form_encode_input($this->co_name)); ?></span><span id="id_read_off_co_name" class="css_read_off_co_name<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_co_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_co_name_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_co_name" type=text name="co_name" value="<?php echo $this->form_encode_input($co_name) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_co_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_co_name_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ofa_contact']))
    {
        $this->nm_new_label['ofa_contact'] = "Ofa Contact";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ofa_contact = $this->ofa_contact;
   $sStyleHidden_ofa_contact = '';
   if (isset($this->nmgp_cmp_hidden['ofa_contact']) && $this->nmgp_cmp_hidden['ofa_contact'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ofa_contact']);
       $sStyleHidden_ofa_contact = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ofa_contact = 'display: none;';
   $sStyleReadInp_ofa_contact = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ofa_contact']) && $this->nmgp_cmp_readonly['ofa_contact'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ofa_contact']);
       $sStyleReadLab_ofa_contact = '';
       $sStyleReadInp_ofa_contact = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ofa_contact']) && $this->nmgp_cmp_hidden['ofa_contact'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ofa_contact" value="<?php echo $this->form_encode_input($ofa_contact) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ofa_contact_line" id="hidden_field_data_ofa_contact" style="<?php echo $sStyleHidden_ofa_contact; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ofa_contact_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_ofa_contact_label" style=""><span id="id_label_ofa_contact"><?php echo $this->nm_new_label['ofa_contact']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ofa_contact"]) &&  $this->nmgp_cmp_readonly["ofa_contact"] == "on") { 

 ?>
<input type="hidden" name="ofa_contact" value="<?php echo $this->form_encode_input($ofa_contact) . "\">" . $ofa_contact . ""; ?>
<?php } else { ?>
<span id="id_read_on_ofa_contact" class="sc-ui-readonly-ofa_contact css_ofa_contact_line" style="<?php echo $sStyleReadLab_ofa_contact; ?>"><?php echo $this->form_format_readonly("ofa_contact", $this->form_encode_input($this->ofa_contact)); ?></span><span id="id_read_off_ofa_contact" class="css_read_off_ofa_contact<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ofa_contact; ?>">
 <input class="sc-js-input scFormObjectOdd css_ofa_contact_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ofa_contact" type=text name="ofa_contact" value="<?php echo $this->form_encode_input($ofa_contact) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ofa_contact_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ofa_contact_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['street_address']))
    {
        $this->nm_new_label['street_address'] = "Street Address";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $street_address = $this->street_address;
   $sStyleHidden_street_address = '';
   if (isset($this->nmgp_cmp_hidden['street_address']) && $this->nmgp_cmp_hidden['street_address'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['street_address']);
       $sStyleHidden_street_address = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_street_address = 'display: none;';
   $sStyleReadInp_street_address = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['street_address']) && $this->nmgp_cmp_readonly['street_address'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['street_address']);
       $sStyleReadLab_street_address = '';
       $sStyleReadInp_street_address = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['street_address']) && $this->nmgp_cmp_hidden['street_address'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="street_address" value="<?php echo $this->form_encode_input($street_address) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_street_address_line" id="hidden_field_data_street_address" style="<?php echo $sStyleHidden_street_address; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_street_address_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_street_address_label" style=""><span id="id_label_street_address"><?php echo $this->nm_new_label['street_address']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["street_address"]) &&  $this->nmgp_cmp_readonly["street_address"] == "on") { 

 ?>
<input type="hidden" name="street_address" value="<?php echo $this->form_encode_input($street_address) . "\">" . $street_address . ""; ?>
<?php } else { ?>
<span id="id_read_on_street_address" class="sc-ui-readonly-street_address css_street_address_line" style="<?php echo $sStyleReadLab_street_address; ?>"><?php echo $this->form_format_readonly("street_address", $this->form_encode_input($this->street_address)); ?></span><span id="id_read_off_street_address" class="css_read_off_street_address<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_street_address; ?>">
 <input class="sc-js-input scFormObjectOdd css_street_address_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_street_address" type=text name="street_address" value="<?php echo $this->form_encode_input($street_address) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_street_address_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_street_address_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




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

    <TD class="scFormDataOdd css_mailing_address_line" id="hidden_field_data_mailing_address" style="<?php echo $sStyleHidden_mailing_address; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_mailing_address_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_mailing_address_label" style=""><span id="id_label_mailing_address"><?php echo $this->nm_new_label['mailing_address']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['mailing_address']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['mailing_address'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["mailing_address"]) &&  $this->nmgp_cmp_readonly["mailing_address"] == "on") { 

 ?>
<input type="hidden" name="mailing_address" value="<?php echo $this->form_encode_input($mailing_address) . "\">" . $mailing_address . ""; ?>
<?php } else { ?>
<span id="id_read_on_mailing_address" class="sc-ui-readonly-mailing_address css_mailing_address_line" style="<?php echo $sStyleReadLab_mailing_address; ?>"><?php echo $this->form_format_readonly("mailing_address", $this->form_encode_input($this->mailing_address)); ?></span><span id="id_read_off_mailing_address" class="css_read_off_mailing_address<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_mailing_address; ?>">
 <input class="sc-js-input scFormObjectOdd css_mailing_address_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_mailing_address" type=text name="mailing_address" value="<?php echo $this->form_encode_input($mailing_address) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_mailing_address_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_mailing_address_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




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

    <TD class="scFormDataOdd css_city_line" id="hidden_field_data_city" style="<?php echo $sStyleHidden_city; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_city_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_city_label" style=""><span id="id_label_city"><?php echo $this->nm_new_label['city']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['city']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['city'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["city"]) &&  $this->nmgp_cmp_readonly["city"] == "on") { 

 ?>
<input type="hidden" name="city" value="<?php echo $this->form_encode_input($city) . "\">" . $city . ""; ?>
<?php } else { ?>
<span id="id_read_on_city" class="sc-ui-readonly-city css_city_line" style="<?php echo $sStyleReadLab_city; ?>"><?php echo $this->form_format_readonly("city", $this->form_encode_input($this->city)); ?></span><span id="id_read_off_city" class="css_read_off_city<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_city; ?>">
 <input class="sc-js-input scFormObjectOdd css_city_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_city" type=text name="city" value="<?php echo $this->form_encode_input($city) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_city_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_city_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




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

    <TD class="scFormDataOdd css_state_line" id="hidden_field_data_state" style="<?php echo $sStyleHidden_state; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_state_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_state_label" style=""><span id="id_label_state"><?php echo $this->nm_new_label['state']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['state']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['state'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["state"]) &&  $this->nmgp_cmp_readonly["state"] == "on") { 

 ?>
<input type="hidden" name="state" value="<?php echo $this->form_encode_input($state) . "\">" . $state . ""; ?>
<?php } else { ?>
<span id="id_read_on_state" class="sc-ui-readonly-state css_state_line" style="<?php echo $sStyleReadLab_state; ?>"><?php echo $this->form_format_readonly("state", $this->form_encode_input($this->state)); ?></span><span id="id_read_off_state" class="css_read_off_state<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_state; ?>">
 <input class="sc-js-input scFormObjectOdd css_state_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_state" type=text name="state" value="<?php echo $this->form_encode_input($state) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=2 alt="{datatype: 'text', maxLength: 2, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_state_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_state_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




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

    <TD class="scFormDataOdd css_zip_code_line" id="hidden_field_data_zip_code" style="<?php echo $sStyleHidden_zip_code; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_zip_code_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_zip_code_label" style=""><span id="id_label_zip_code"><?php echo $this->nm_new_label['zip_code']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['zip_code']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['zip_code'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["zip_code"]) &&  $this->nmgp_cmp_readonly["zip_code"] == "on") { 

 ?>
<input type="hidden" name="zip_code" value="<?php echo $this->form_encode_input($zip_code) . "\">" . $zip_code . ""; ?>
<?php } else { ?>
<span id="id_read_on_zip_code" class="sc-ui-readonly-zip_code css_zip_code_line" style="<?php echo $sStyleReadLab_zip_code; ?>"><?php echo $this->form_format_readonly("zip_code", $this->form_encode_input($this->zip_code)); ?></span><span id="id_read_off_zip_code" class="css_read_off_zip_code<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_zip_code; ?>">
 <input class="sc-js-input scFormObjectOdd css_zip_code_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_zip_code" type=text name="zip_code" value="<?php echo $this->form_encode_input($zip_code) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_zip_code_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_zip_code_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['phone_number']))
    {
        $this->nm_new_label['phone_number'] = "Phone Number";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $phone_number = $this->phone_number;
   $sStyleHidden_phone_number = '';
   if (isset($this->nmgp_cmp_hidden['phone_number']) && $this->nmgp_cmp_hidden['phone_number'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['phone_number']);
       $sStyleHidden_phone_number = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_phone_number = 'display: none;';
   $sStyleReadInp_phone_number = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['phone_number']) && $this->nmgp_cmp_readonly['phone_number'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['phone_number']);
       $sStyleReadLab_phone_number = '';
       $sStyleReadInp_phone_number = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['phone_number']) && $this->nmgp_cmp_hidden['phone_number'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="phone_number" value="<?php echo $this->form_encode_input($phone_number) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_phone_number_line" id="hidden_field_data_phone_number" style="<?php echo $sStyleHidden_phone_number; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_phone_number_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_phone_number_label" style=""><span id="id_label_phone_number"><?php echo $this->nm_new_label['phone_number']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['phone_number']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['phone_number'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["phone_number"]) &&  $this->nmgp_cmp_readonly["phone_number"] == "on") { 

 ?>
<input type="hidden" name="phone_number" value="<?php echo $this->form_encode_input($phone_number) . "\">" . $phone_number . ""; ?>
<?php } else { ?>
<span id="id_read_on_phone_number" class="sc-ui-readonly-phone_number css_phone_number_line" style="<?php echo $sStyleReadLab_phone_number; ?>"><?php echo $this->form_format_readonly("phone_number", $this->form_encode_input($this->phone_number)); ?></span><span id="id_read_off_phone_number" class="css_read_off_phone_number<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_phone_number; ?>">
 <input class="sc-js-input scFormObjectOdd css_phone_number_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_phone_number" type=text name="phone_number" value="<?php echo $this->form_encode_input($phone_number) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_phone_number_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_phone_number_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['home_phone']))
    {
        $this->nm_new_label['home_phone'] = "Home Phone";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $home_phone = $this->home_phone;
   $sStyleHidden_home_phone = '';
   if (isset($this->nmgp_cmp_hidden['home_phone']) && $this->nmgp_cmp_hidden['home_phone'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['home_phone']);
       $sStyleHidden_home_phone = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_home_phone = 'display: none;';
   $sStyleReadInp_home_phone = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['home_phone']) && $this->nmgp_cmp_readonly['home_phone'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['home_phone']);
       $sStyleReadLab_home_phone = '';
       $sStyleReadInp_home_phone = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['home_phone']) && $this->nmgp_cmp_hidden['home_phone'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="home_phone" value="<?php echo $this->form_encode_input($home_phone) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_home_phone_line" id="hidden_field_data_home_phone" style="<?php echo $sStyleHidden_home_phone; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_home_phone_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_home_phone_label" style=""><span id="id_label_home_phone"><?php echo $this->nm_new_label['home_phone']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["home_phone"]) &&  $this->nmgp_cmp_readonly["home_phone"] == "on") { 

 ?>
<input type="hidden" name="home_phone" value="<?php echo $this->form_encode_input($home_phone) . "\">" . $home_phone . ""; ?>
<?php } else { ?>
<span id="id_read_on_home_phone" class="sc-ui-readonly-home_phone css_home_phone_line" style="<?php echo $sStyleReadLab_home_phone; ?>"><?php echo $this->form_format_readonly("home_phone", $this->form_encode_input($this->home_phone)); ?></span><span id="id_read_off_home_phone" class="css_read_off_home_phone<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_home_phone; ?>">
 <input class="sc-js-input scFormObjectOdd css_home_phone_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_home_phone" type=text name="home_phone" value="<?php echo $this->form_encode_input($home_phone) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_home_phone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_home_phone_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fax_number']))
    {
        $this->nm_new_label['fax_number'] = "Fax Number";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fax_number = $this->fax_number;
   $sStyleHidden_fax_number = '';
   if (isset($this->nmgp_cmp_hidden['fax_number']) && $this->nmgp_cmp_hidden['fax_number'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fax_number']);
       $sStyleHidden_fax_number = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fax_number = 'display: none;';
   $sStyleReadInp_fax_number = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fax_number']) && $this->nmgp_cmp_readonly['fax_number'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fax_number']);
       $sStyleReadLab_fax_number = '';
       $sStyleReadInp_fax_number = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fax_number']) && $this->nmgp_cmp_hidden['fax_number'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fax_number" value="<?php echo $this->form_encode_input($fax_number) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fax_number_line" id="hidden_field_data_fax_number" style="<?php echo $sStyleHidden_fax_number; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fax_number_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_fax_number_label" style=""><span id="id_label_fax_number"><?php echo $this->nm_new_label['fax_number']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fax_number"]) &&  $this->nmgp_cmp_readonly["fax_number"] == "on") { 

 ?>
<input type="hidden" name="fax_number" value="<?php echo $this->form_encode_input($fax_number) . "\">" . $fax_number . ""; ?>
<?php } else { ?>
<span id="id_read_on_fax_number" class="sc-ui-readonly-fax_number css_fax_number_line" style="<?php echo $sStyleReadLab_fax_number; ?>"><?php echo $this->form_format_readonly("fax_number", $this->form_encode_input($this->fax_number)); ?></span><span id="id_read_off_fax_number" class="css_read_off_fax_number<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fax_number; ?>">
 <input class="sc-js-input scFormObjectOdd css_fax_number_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fax_number" type=text name="fax_number" value="<?php echo $this->form_encode_input($fax_number) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fax_number_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fax_number_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['email']))
    {
        $this->nm_new_label['email'] = "Email";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $email = $this->email;
   $sStyleHidden_email = '';
   if (isset($this->nmgp_cmp_hidden['email']) && $this->nmgp_cmp_hidden['email'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['email']);
       $sStyleHidden_email = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_email = 'display: none;';
   $sStyleReadInp_email = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['email']) && $this->nmgp_cmp_readonly['email'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['email']);
       $sStyleReadLab_email = '';
       $sStyleReadInp_email = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['email']) && $this->nmgp_cmp_hidden['email'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="email" value="<?php echo $this->form_encode_input($email) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_email_line" id="hidden_field_data_email" style="<?php echo $sStyleHidden_email; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_email_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_email_label" style=""><span id="id_label_email"><?php echo $this->nm_new_label['email']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['email']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['email'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["email"]) &&  $this->nmgp_cmp_readonly["email"] == "on") { 

 ?>
<input type="hidden" name="email" value="<?php echo $this->form_encode_input($email) . "\">" . $email . ""; ?>
<?php } else { ?>
<span id="id_read_on_email" class="sc-ui-readonly-email css_email_line" style="<?php echo $sStyleReadLab_email; ?>"><?php echo $this->form_format_readonly("email", $this->form_encode_input($this->email)); ?></span><span id="id_read_off_email" class="css_read_off_email<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_email; ?>">
 <input class="sc-js-input scFormObjectOdd css_email_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_email" type=text name="email" value="<?php echo $this->form_encode_input($email) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span style="display: none"><?php echo nmButtonOutput($this->arr_buttons, "bemail", "if (document.F1.email.value != '') {window.open('mailto:' + document.F1.email.value); }", "if (document.F1.email.value != '') {window.open('mailto:' + document.F1.email.value); }", "email_mail", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
</span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_email_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['business_type']))
    {
        $this->nm_new_label['business_type'] = "Business Type";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $business_type = $this->business_type;
   $sStyleHidden_business_type = '';
   if (isset($this->nmgp_cmp_hidden['business_type']) && $this->nmgp_cmp_hidden['business_type'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['business_type']);
       $sStyleHidden_business_type = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_business_type = 'display: none;';
   $sStyleReadInp_business_type = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['business_type']) && $this->nmgp_cmp_readonly['business_type'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['business_type']);
       $sStyleReadLab_business_type = '';
       $sStyleReadInp_business_type = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['business_type']) && $this->nmgp_cmp_hidden['business_type'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="business_type" value="<?php echo $this->form_encode_input($business_type) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_business_type_line" id="hidden_field_data_business_type" style="<?php echo $sStyleHidden_business_type; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_business_type_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_business_type_label" style=""><span id="id_label_business_type"><?php echo $this->nm_new_label['business_type']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["business_type"]) &&  $this->nmgp_cmp_readonly["business_type"] == "on") { 

 ?>
<input type="hidden" name="business_type" value="<?php echo $this->form_encode_input($business_type) . "\">" . $business_type . ""; ?>
<?php } else { ?>

<?php
$aRecData['business_type'] = $this->business_type;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_business_type']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_business_type'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_business_type']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_business_type'] = array(); 
    }

   $old_value_client_id = $this->client_id;
   $old_value_starting_date = $this->starting_date;
   $old_value_renewal_date = $this->renewal_date;
   $old_value_expiration_date = $this->expiration_date;
   $old_value_cancel_date = $this->cancel_date;
   $old_value_retire_date = $this->retire_date;
   $old_value_date_last_updated = $this->date_last_updated;
   $old_value_archive_date = $this->archive_date;
   $old_value_record_created = $this->record_created;
   $old_value_record_created_hora = $this->record_created_hora;
   $old_value_permanent_member_date = $this->permanent_member_date;
   $old_value_appn_date = $this->appn_date;
   $old_value_buyers_excel_qty = $this->buyers_excel_qty;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_client_id = $this->client_id;
   $unformatted_value_starting_date = $this->starting_date;
   $unformatted_value_renewal_date = $this->renewal_date;
   $unformatted_value_expiration_date = $this->expiration_date;
   $unformatted_value_cancel_date = $this->cancel_date;
   $unformatted_value_retire_date = $this->retire_date;
   $unformatted_value_date_last_updated = $this->date_last_updated;
   $unformatted_value_archive_date = $this->archive_date;
   $unformatted_value_record_created = $this->record_created;
   $unformatted_value_record_created_hora = $this->record_created_hora;
   $unformatted_value_permanent_member_date = $this->permanent_member_date;
   $unformatted_value_appn_date = $this->appn_date;
   $unformatted_value_buyers_excel_qty = $this->buyers_excel_qty;

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
   $nm_comando = "SELECT location, location FROM client_location WHERE location = '" . substr($this->Db->qstr($this->business_type), 1, -1) . "' ORDER BY location";

   $this->client_id = $old_value_client_id;
   $this->starting_date = $old_value_starting_date;
   $this->renewal_date = $old_value_renewal_date;
   $this->expiration_date = $old_value_expiration_date;
   $this->cancel_date = $old_value_cancel_date;
   $this->retire_date = $old_value_retire_date;
   $this->date_last_updated = $old_value_date_last_updated;
   $this->archive_date = $old_value_archive_date;
   $this->record_created = $old_value_record_created;
   $this->record_created_hora = $old_value_record_created_hora;
   $this->permanent_member_date = $old_value_permanent_member_date;
   $this->appn_date = $old_value_appn_date;
   $this->buyers_excel_qty = $old_value_buyers_excel_qty;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_business_type'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->business_type])) ? $aLookup[0][$this->business_type] : $this->business_type;
$business_type_look = (isset($aLookup[0][$this->business_type])) ? $aLookup[0][$this->business_type] : $this->business_type;
?>
<span id="id_read_on_business_type" class="sc-ui-readonly-business_type css_business_type_line" style="<?php echo $sStyleReadLab_business_type; ?>"><?php echo $this->form_format_readonly("business_type", str_replace("<", "&lt;", $business_type_look)); ?></span><span id="id_read_off_business_type" class="css_read_off_business_type<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_business_type; ?>">
 <input class="sc-js-input scFormObjectOdd css_business_type_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="display: none;" id="id_sc_field_business_type" type=text name="business_type" value="<?php echo $this->form_encode_input($business_type) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=14 style="display: none" alt="{datatype: 'text', maxLength: 14, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['business_type'] = $this->business_type;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_business_type']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_business_type'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_business_type']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_business_type'] = array(); 
    }

   $old_value_client_id = $this->client_id;
   $old_value_starting_date = $this->starting_date;
   $old_value_renewal_date = $this->renewal_date;
   $old_value_expiration_date = $this->expiration_date;
   $old_value_cancel_date = $this->cancel_date;
   $old_value_retire_date = $this->retire_date;
   $old_value_date_last_updated = $this->date_last_updated;
   $old_value_archive_date = $this->archive_date;
   $old_value_record_created = $this->record_created;
   $old_value_record_created_hora = $this->record_created_hora;
   $old_value_permanent_member_date = $this->permanent_member_date;
   $old_value_appn_date = $this->appn_date;
   $old_value_buyers_excel_qty = $this->buyers_excel_qty;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_client_id = $this->client_id;
   $unformatted_value_starting_date = $this->starting_date;
   $unformatted_value_renewal_date = $this->renewal_date;
   $unformatted_value_expiration_date = $this->expiration_date;
   $unformatted_value_cancel_date = $this->cancel_date;
   $unformatted_value_retire_date = $this->retire_date;
   $unformatted_value_date_last_updated = $this->date_last_updated;
   $unformatted_value_archive_date = $this->archive_date;
   $unformatted_value_record_created = $this->record_created;
   $unformatted_value_record_created_hora = $this->record_created_hora;
   $unformatted_value_permanent_member_date = $this->permanent_member_date;
   $unformatted_value_appn_date = $this->appn_date;
   $unformatted_value_buyers_excel_qty = $this->buyers_excel_qty;

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
   $nm_comando = "SELECT location, location FROM client_location WHERE location = '" . substr($this->Db->qstr($this->business_type), 1, -1) . "' ORDER BY location";

   $this->client_id = $old_value_client_id;
   $this->starting_date = $old_value_starting_date;
   $this->renewal_date = $old_value_renewal_date;
   $this->expiration_date = $old_value_expiration_date;
   $this->cancel_date = $old_value_cancel_date;
   $this->retire_date = $old_value_retire_date;
   $this->date_last_updated = $old_value_date_last_updated;
   $this->archive_date = $old_value_archive_date;
   $this->record_created = $old_value_record_created;
   $this->record_created_hora = $old_value_record_created_hora;
   $this->permanent_member_date = $old_value_permanent_member_date;
   $this->appn_date = $old_value_appn_date;
   $this->buyers_excel_qty = $old_value_buyers_excel_qty;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_business_type'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->business_type])) ? $aLookup[0][$this->business_type] : '';
$business_type_look = (isset($aLookup[0][$this->business_type])) ? $aLookup[0][$this->business_type] : '';
?>
<input type="text" id="id_ac_business_type" name="business_type_autocomp" class="scFormObjectOdd sc-ui-autocomp-business_type css_business_type_obj<?php echo $this->classes_100perc_fields['input'] ?>" size="30" value="<?php echo $sAutocompValue; ?>" alt="{datatype: 'text', maxLength: 14, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"  /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_business_type_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_business_type_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fresh_cut_allowed']))
    {
        $this->nm_new_label['fresh_cut_allowed'] = "Fresh Cut Allowed";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fresh_cut_allowed = $this->fresh_cut_allowed;
   $sStyleHidden_fresh_cut_allowed = '';
   if (isset($this->nmgp_cmp_hidden['fresh_cut_allowed']) && $this->nmgp_cmp_hidden['fresh_cut_allowed'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fresh_cut_allowed']);
       $sStyleHidden_fresh_cut_allowed = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fresh_cut_allowed = 'display: none;';
   $sStyleReadInp_fresh_cut_allowed = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fresh_cut_allowed']) && $this->nmgp_cmp_readonly['fresh_cut_allowed'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fresh_cut_allowed']);
       $sStyleReadLab_fresh_cut_allowed = '';
       $sStyleReadInp_fresh_cut_allowed = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fresh_cut_allowed']) && $this->nmgp_cmp_hidden['fresh_cut_allowed'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fresh_cut_allowed" value="<?php echo $this->form_encode_input($fresh_cut_allowed) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fresh_cut_allowed_line" id="hidden_field_data_fresh_cut_allowed" style="<?php echo $sStyleHidden_fresh_cut_allowed; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fresh_cut_allowed_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_fresh_cut_allowed_label" style=""><span id="id_label_fresh_cut_allowed"><?php echo $this->nm_new_label['fresh_cut_allowed']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fresh_cut_allowed"]) &&  $this->nmgp_cmp_readonly["fresh_cut_allowed"] == "on") { 

 ?>
<input type="hidden" name="fresh_cut_allowed" value="<?php echo $this->form_encode_input($fresh_cut_allowed) . "\">" . $fresh_cut_allowed . ""; ?>
<?php } else { ?>
<span id="id_read_on_fresh_cut_allowed" class="sc-ui-readonly-fresh_cut_allowed css_fresh_cut_allowed_line" style="<?php echo $sStyleReadLab_fresh_cut_allowed; ?>"><?php echo $this->form_format_readonly("fresh_cut_allowed", $this->form_encode_input($this->fresh_cut_allowed)); ?></span><span id="id_read_off_fresh_cut_allowed" class="css_read_off_fresh_cut_allowed<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fresh_cut_allowed; ?>">
 <input class="sc-js-input scFormObjectOdd css_fresh_cut_allowed_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fresh_cut_allowed" type=text name="fresh_cut_allowed" value="<?php echo $this->form_encode_input($fresh_cut_allowed) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fresh_cut_allowed_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fresh_cut_allowed_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['business_license']))
    {
        $this->nm_new_label['business_license'] = "Business License";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $business_license = $this->business_license;
   $sStyleHidden_business_license = '';
   if (isset($this->nmgp_cmp_hidden['business_license']) && $this->nmgp_cmp_hidden['business_license'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['business_license']);
       $sStyleHidden_business_license = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_business_license = 'display: none;';
   $sStyleReadInp_business_license = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['business_license']) && $this->nmgp_cmp_readonly['business_license'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['business_license']);
       $sStyleReadLab_business_license = '';
       $sStyleReadInp_business_license = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['business_license']) && $this->nmgp_cmp_hidden['business_license'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="business_license" value="<?php echo $this->form_encode_input($business_license) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_business_license_line" id="hidden_field_data_business_license" style="<?php echo $sStyleHidden_business_license; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_business_license_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_business_license_label" style=""><span id="id_label_business_license"><?php echo $this->nm_new_label['business_license']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["business_license"]) &&  $this->nmgp_cmp_readonly["business_license"] == "on") { 

 ?>
<input type="hidden" name="business_license" value="<?php echo $this->form_encode_input($business_license) . "\">" . $business_license . ""; ?>
<?php } else { ?>
<span id="id_read_on_business_license" class="sc-ui-readonly-business_license css_business_license_line" style="<?php echo $sStyleReadLab_business_license; ?>"><?php echo $this->form_format_readonly("business_license", $this->form_encode_input($this->business_license)); ?></span><span id="id_read_off_business_license" class="css_read_off_business_license<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_business_license; ?>">
 <input class="sc-js-input scFormObjectOdd css_business_license_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_business_license" type=text name="business_license" value="<?php echo $this->form_encode_input($business_license) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_business_license_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_business_license_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nursery_license']))
    {
        $this->nm_new_label['nursery_license'] = "Nursery License";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nursery_license = $this->nursery_license;
   $sStyleHidden_nursery_license = '';
   if (isset($this->nmgp_cmp_hidden['nursery_license']) && $this->nmgp_cmp_hidden['nursery_license'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nursery_license']);
       $sStyleHidden_nursery_license = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nursery_license = 'display: none;';
   $sStyleReadInp_nursery_license = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nursery_license']) && $this->nmgp_cmp_readonly['nursery_license'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nursery_license']);
       $sStyleReadLab_nursery_license = '';
       $sStyleReadInp_nursery_license = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nursery_license']) && $this->nmgp_cmp_hidden['nursery_license'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nursery_license" value="<?php echo $this->form_encode_input($nursery_license) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nursery_license_line" id="hidden_field_data_nursery_license" style="<?php echo $sStyleHidden_nursery_license; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nursery_license_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_nursery_license_label" style=""><span id="id_label_nursery_license"><?php echo $this->nm_new_label['nursery_license']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nursery_license"]) &&  $this->nmgp_cmp_readonly["nursery_license"] == "on") { 

 ?>
<input type="hidden" name="nursery_license" value="<?php echo $this->form_encode_input($nursery_license) . "\">" . $nursery_license . ""; ?>
<?php } else { ?>
<span id="id_read_on_nursery_license" class="sc-ui-readonly-nursery_license css_nursery_license_line" style="<?php echo $sStyleReadLab_nursery_license; ?>"><?php echo $this->form_format_readonly("nursery_license", $this->form_encode_input($this->nursery_license)); ?></span><span id="id_read_off_nursery_license" class="css_read_off_nursery_license<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nursery_license; ?>">
 <input class="sc-js-input scFormObjectOdd css_nursery_license_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nursery_license" type=text name="nursery_license" value="<?php echo $this->form_encode_input($nursery_license) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nursery_license_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nursery_license_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['federal_tax_id']))
    {
        $this->nm_new_label['federal_tax_id'] = "Federal Tax Id";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $federal_tax_id = $this->federal_tax_id;
   $sStyleHidden_federal_tax_id = '';
   if (isset($this->nmgp_cmp_hidden['federal_tax_id']) && $this->nmgp_cmp_hidden['federal_tax_id'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['federal_tax_id']);
       $sStyleHidden_federal_tax_id = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_federal_tax_id = 'display: none;';
   $sStyleReadInp_federal_tax_id = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['federal_tax_id']) && $this->nmgp_cmp_readonly['federal_tax_id'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['federal_tax_id']);
       $sStyleReadLab_federal_tax_id = '';
       $sStyleReadInp_federal_tax_id = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['federal_tax_id']) && $this->nmgp_cmp_hidden['federal_tax_id'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="federal_tax_id" value="<?php echo $this->form_encode_input($federal_tax_id) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_federal_tax_id_line" id="hidden_field_data_federal_tax_id" style="<?php echo $sStyleHidden_federal_tax_id; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_federal_tax_id_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_federal_tax_id_label" style=""><span id="id_label_federal_tax_id"><?php echo $this->nm_new_label['federal_tax_id']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["federal_tax_id"]) &&  $this->nmgp_cmp_readonly["federal_tax_id"] == "on") { 

 ?>
<input type="hidden" name="federal_tax_id" value="<?php echo $this->form_encode_input($federal_tax_id) . "\">" . $federal_tax_id . ""; ?>
<?php } else { ?>
<span id="id_read_on_federal_tax_id" class="sc-ui-readonly-federal_tax_id css_federal_tax_id_line" style="<?php echo $sStyleReadLab_federal_tax_id; ?>"><?php echo $this->form_format_readonly("federal_tax_id", $this->form_encode_input($this->federal_tax_id)); ?></span><span id="id_read_off_federal_tax_id" class="css_read_off_federal_tax_id<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_federal_tax_id; ?>">
 <input class="sc-js-input scFormObjectOdd css_federal_tax_id_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_federal_tax_id" type=text name="federal_tax_id" value="<?php echo $this->form_encode_input($federal_tax_id) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_federal_tax_id_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_federal_tax_id_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['temporary_pass']))
    {
        $this->nm_new_label['temporary_pass'] = "Temporary Pass";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $temporary_pass = $this->temporary_pass;
   $sStyleHidden_temporary_pass = '';
   if (isset($this->nmgp_cmp_hidden['temporary_pass']) && $this->nmgp_cmp_hidden['temporary_pass'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['temporary_pass']);
       $sStyleHidden_temporary_pass = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_temporary_pass = 'display: none;';
   $sStyleReadInp_temporary_pass = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['temporary_pass']) && $this->nmgp_cmp_readonly['temporary_pass'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['temporary_pass']);
       $sStyleReadLab_temporary_pass = '';
       $sStyleReadInp_temporary_pass = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['temporary_pass']) && $this->nmgp_cmp_hidden['temporary_pass'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="temporary_pass" value="<?php echo $this->form_encode_input($temporary_pass) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_temporary_pass_line" id="hidden_field_data_temporary_pass" style="<?php echo $sStyleHidden_temporary_pass; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_temporary_pass_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_temporary_pass_label" style=""><span id="id_label_temporary_pass"><?php echo $this->nm_new_label['temporary_pass']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["temporary_pass"]) &&  $this->nmgp_cmp_readonly["temporary_pass"] == "on") { 

 ?>
<input type="hidden" name="temporary_pass" value="<?php echo $this->form_encode_input($temporary_pass) . "\">" . $temporary_pass . ""; ?>
<?php } else { ?>
<span id="id_read_on_temporary_pass" class="sc-ui-readonly-temporary_pass css_temporary_pass_line" style="<?php echo $sStyleReadLab_temporary_pass; ?>"><?php echo $this->form_format_readonly("temporary_pass", $this->form_encode_input($this->temporary_pass)); ?></span><span id="id_read_off_temporary_pass" class="css_read_off_temporary_pass<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_temporary_pass; ?>">
 <input class="sc-js-input scFormObjectOdd css_temporary_pass_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_temporary_pass" type=text name="temporary_pass" value="<?php echo $this->form_encode_input($temporary_pass) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_temporary_pass_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_temporary_pass_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ofa_member']))
    {
        $this->nm_new_label['ofa_member'] = "Ofa Member";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ofa_member = $this->ofa_member;
   $sStyleHidden_ofa_member = '';
   if (isset($this->nmgp_cmp_hidden['ofa_member']) && $this->nmgp_cmp_hidden['ofa_member'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ofa_member']);
       $sStyleHidden_ofa_member = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ofa_member = 'display: none;';
   $sStyleReadInp_ofa_member = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ofa_member']) && $this->nmgp_cmp_readonly['ofa_member'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ofa_member']);
       $sStyleReadLab_ofa_member = '';
       $sStyleReadInp_ofa_member = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ofa_member']) && $this->nmgp_cmp_hidden['ofa_member'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ofa_member" value="<?php echo $this->form_encode_input($ofa_member) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ofa_member_line" id="hidden_field_data_ofa_member" style="<?php echo $sStyleHidden_ofa_member; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ofa_member_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_ofa_member_label" style=""><span id="id_label_ofa_member"><?php echo $this->nm_new_label['ofa_member']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ofa_member"]) &&  $this->nmgp_cmp_readonly["ofa_member"] == "on") { 

 ?>
<input type="hidden" name="ofa_member" value="<?php echo $this->form_encode_input($ofa_member) . "\">" . $ofa_member . ""; ?>
<?php } else { ?>
<span id="id_read_on_ofa_member" class="sc-ui-readonly-ofa_member css_ofa_member_line" style="<?php echo $sStyleReadLab_ofa_member; ?>"><?php echo $this->form_format_readonly("ofa_member", $this->form_encode_input($this->ofa_member)); ?></span><span id="id_read_off_ofa_member" class="css_read_off_ofa_member<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ofa_member; ?>">
 <input class="sc-js-input scFormObjectOdd css_ofa_member_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ofa_member" type=text name="ofa_member" value="<?php echo $this->form_encode_input($ofa_member) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ofa_member_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ofa_member_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['starting_date']))
    {
        $this->nm_new_label['starting_date'] = "Joined on";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $starting_date = $this->starting_date;
   $sStyleHidden_starting_date = '';
   if (isset($this->nmgp_cmp_hidden['starting_date']) && $this->nmgp_cmp_hidden['starting_date'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['starting_date']);
       $sStyleHidden_starting_date = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_starting_date = 'display: none;';
   $sStyleReadInp_starting_date = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['starting_date']) && $this->nmgp_cmp_readonly['starting_date'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['starting_date']);
       $sStyleReadLab_starting_date = '';
       $sStyleReadInp_starting_date = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['starting_date']) && $this->nmgp_cmp_hidden['starting_date'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="starting_date" value="<?php echo $this->form_encode_input($starting_date) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_starting_date_line" id="hidden_field_data_starting_date" style="<?php echo $sStyleHidden_starting_date; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_starting_date_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_starting_date_label" style=""><span id="id_label_starting_date"><?php echo $this->nm_new_label['starting_date']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["starting_date"]) &&  $this->nmgp_cmp_readonly["starting_date"] == "on") { 

 ?>
<input type="hidden" name="starting_date" value="<?php echo $this->form_encode_input($starting_date) . "\">" . $starting_date . ""; ?>
<?php } else { ?>
<span id="id_read_on_starting_date" class="sc-ui-readonly-starting_date css_starting_date_line" style="<?php echo $sStyleReadLab_starting_date; ?>"><?php echo $this->form_format_readonly("starting_date", $this->form_encode_input($starting_date)); ?></span><span id="id_read_off_starting_date" class="css_read_off_starting_date<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_starting_date; ?>"><?php
$tmp_form_data = $this->field_config['starting_date']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_starting_date_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_starting_date" type=text name="starting_date" value="<?php echo $this->form_encode_input($starting_date) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['starting_date']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['starting_date']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_starting_date_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_starting_date_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




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

    <TD class="scFormDataOdd css_renewal_date_line" id="hidden_field_data_renewal_date" style="<?php echo $sStyleHidden_renewal_date; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_renewal_date_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_renewal_date_label" style=""><span id="id_label_renewal_date"><?php echo $this->nm_new_label['renewal_date']; ?></span></span><br>
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_renewal_date_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_renewal_date_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['expiration_date']))
    {
        $this->nm_new_label['expiration_date'] = "Expiration Date";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $expiration_date = $this->expiration_date;
   $sStyleHidden_expiration_date = '';
   if (isset($this->nmgp_cmp_hidden['expiration_date']) && $this->nmgp_cmp_hidden['expiration_date'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['expiration_date']);
       $sStyleHidden_expiration_date = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_expiration_date = 'display: none;';
   $sStyleReadInp_expiration_date = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['expiration_date']) && $this->nmgp_cmp_readonly['expiration_date'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['expiration_date']);
       $sStyleReadLab_expiration_date = '';
       $sStyleReadInp_expiration_date = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['expiration_date']) && $this->nmgp_cmp_hidden['expiration_date'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="expiration_date" value="<?php echo $this->form_encode_input($expiration_date) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_expiration_date_line" id="hidden_field_data_expiration_date" style="<?php echo $sStyleHidden_expiration_date; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_expiration_date_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_expiration_date_label" style=""><span id="id_label_expiration_date"><?php echo $this->nm_new_label['expiration_date']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["expiration_date"]) &&  $this->nmgp_cmp_readonly["expiration_date"] == "on") { 

 ?>
<input type="hidden" name="expiration_date" value="<?php echo $this->form_encode_input($expiration_date) . "\">" . $expiration_date . ""; ?>
<?php } else { ?>
<span id="id_read_on_expiration_date" class="sc-ui-readonly-expiration_date css_expiration_date_line" style="<?php echo $sStyleReadLab_expiration_date; ?>"><?php echo $this->form_format_readonly("expiration_date", $this->form_encode_input($expiration_date)); ?></span><span id="id_read_off_expiration_date" class="css_read_off_expiration_date<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_expiration_date; ?>"><?php
$tmp_form_data = $this->field_config['expiration_date']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_expiration_date_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_expiration_date" type=text name="expiration_date" value="<?php echo $this->form_encode_input($expiration_date) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['expiration_date']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['expiration_date']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_expiration_date_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_expiration_date_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['canceled']))
    {
        $this->nm_new_label['canceled'] = "Canceled";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $canceled = $this->canceled;
   $sStyleHidden_canceled = '';
   if (isset($this->nmgp_cmp_hidden['canceled']) && $this->nmgp_cmp_hidden['canceled'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['canceled']);
       $sStyleHidden_canceled = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_canceled = 'display: none;';
   $sStyleReadInp_canceled = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['canceled']) && $this->nmgp_cmp_readonly['canceled'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['canceled']);
       $sStyleReadLab_canceled = '';
       $sStyleReadInp_canceled = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['canceled']) && $this->nmgp_cmp_hidden['canceled'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="canceled" value="<?php echo $this->form_encode_input($canceled) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_canceled_line" id="hidden_field_data_canceled" style="<?php echo $sStyleHidden_canceled; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_canceled_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_canceled_label" style=""><span id="id_label_canceled"><?php echo $this->nm_new_label['canceled']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["canceled"]) &&  $this->nmgp_cmp_readonly["canceled"] == "on") { 

 ?>
<input type="hidden" name="canceled" value="<?php echo $this->form_encode_input($canceled) . "\">" . $canceled . ""; ?>
<?php } else { ?>
<span id="id_read_on_canceled" class="sc-ui-readonly-canceled css_canceled_line" style="<?php echo $sStyleReadLab_canceled; ?>"><?php echo $this->form_format_readonly("canceled", $this->form_encode_input($this->canceled)); ?></span><span id="id_read_off_canceled" class="css_read_off_canceled<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_canceled; ?>">
 <input class="sc-js-input scFormObjectOdd css_canceled_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_canceled" type=text name="canceled" value="<?php echo $this->form_encode_input($canceled) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_canceled_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_canceled_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cancel_date']))
    {
        $this->nm_new_label['cancel_date'] = "Cancel Date";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cancel_date = $this->cancel_date;
   $sStyleHidden_cancel_date = '';
   if (isset($this->nmgp_cmp_hidden['cancel_date']) && $this->nmgp_cmp_hidden['cancel_date'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cancel_date']);
       $sStyleHidden_cancel_date = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cancel_date = 'display: none;';
   $sStyleReadInp_cancel_date = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cancel_date']) && $this->nmgp_cmp_readonly['cancel_date'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cancel_date']);
       $sStyleReadLab_cancel_date = '';
       $sStyleReadInp_cancel_date = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cancel_date']) && $this->nmgp_cmp_hidden['cancel_date'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cancel_date" value="<?php echo $this->form_encode_input($cancel_date) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cancel_date_line" id="hidden_field_data_cancel_date" style="<?php echo $sStyleHidden_cancel_date; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cancel_date_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_cancel_date_label" style=""><span id="id_label_cancel_date"><?php echo $this->nm_new_label['cancel_date']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cancel_date"]) &&  $this->nmgp_cmp_readonly["cancel_date"] == "on") { 

 ?>
<input type="hidden" name="cancel_date" value="<?php echo $this->form_encode_input($cancel_date) . "\">" . $cancel_date . ""; ?>
<?php } else { ?>
<span id="id_read_on_cancel_date" class="sc-ui-readonly-cancel_date css_cancel_date_line" style="<?php echo $sStyleReadLab_cancel_date; ?>"><?php echo $this->form_format_readonly("cancel_date", $this->form_encode_input($cancel_date)); ?></span><span id="id_read_off_cancel_date" class="css_read_off_cancel_date<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cancel_date; ?>"><?php
$tmp_form_data = $this->field_config['cancel_date']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_cancel_date_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cancel_date" type=text name="cancel_date" value="<?php echo $this->form_encode_input($cancel_date) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['cancel_date']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['cancel_date']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cancel_date_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cancel_date_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['canceled_by']))
    {
        $this->nm_new_label['canceled_by'] = "Canceled By";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $canceled_by = $this->canceled_by;
   $sStyleHidden_canceled_by = '';
   if (isset($this->nmgp_cmp_hidden['canceled_by']) && $this->nmgp_cmp_hidden['canceled_by'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['canceled_by']);
       $sStyleHidden_canceled_by = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_canceled_by = 'display: none;';
   $sStyleReadInp_canceled_by = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['canceled_by']) && $this->nmgp_cmp_readonly['canceled_by'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['canceled_by']);
       $sStyleReadLab_canceled_by = '';
       $sStyleReadInp_canceled_by = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['canceled_by']) && $this->nmgp_cmp_hidden['canceled_by'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="canceled_by" value="<?php echo $this->form_encode_input($canceled_by) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_canceled_by_line" id="hidden_field_data_canceled_by" style="<?php echo $sStyleHidden_canceled_by; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_canceled_by_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_canceled_by_label" style=""><span id="id_label_canceled_by"><?php echo $this->nm_new_label['canceled_by']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["canceled_by"]) &&  $this->nmgp_cmp_readonly["canceled_by"] == "on") { 

 ?>
<input type="hidden" name="canceled_by" value="<?php echo $this->form_encode_input($canceled_by) . "\">" . $canceled_by . ""; ?>
<?php } else { ?>
<span id="id_read_on_canceled_by" class="sc-ui-readonly-canceled_by css_canceled_by_line" style="<?php echo $sStyleReadLab_canceled_by; ?>"><?php echo $this->form_format_readonly("canceled_by", $this->form_encode_input($this->canceled_by)); ?></span><span id="id_read_off_canceled_by" class="css_read_off_canceled_by<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_canceled_by; ?>">
 <input class="sc-js-input scFormObjectOdd css_canceled_by_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_canceled_by" type=text name="canceled_by" value="<?php echo $this->form_encode_input($canceled_by) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_canceled_by_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_canceled_by_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['reason_canceled']))
    {
        $this->nm_new_label['reason_canceled'] = "Reason Canceled";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $reason_canceled = $this->reason_canceled;
   $sStyleHidden_reason_canceled = '';
   if (isset($this->nmgp_cmp_hidden['reason_canceled']) && $this->nmgp_cmp_hidden['reason_canceled'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['reason_canceled']);
       $sStyleHidden_reason_canceled = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_reason_canceled = 'display: none;';
   $sStyleReadInp_reason_canceled = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['reason_canceled']) && $this->nmgp_cmp_readonly['reason_canceled'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['reason_canceled']);
       $sStyleReadLab_reason_canceled = '';
       $sStyleReadInp_reason_canceled = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['reason_canceled']) && $this->nmgp_cmp_hidden['reason_canceled'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="reason_canceled" value="<?php echo $this->form_encode_input($reason_canceled) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_reason_canceled_line" id="hidden_field_data_reason_canceled" style="<?php echo $sStyleHidden_reason_canceled; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_reason_canceled_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_reason_canceled_label" style=""><span id="id_label_reason_canceled"><?php echo $this->nm_new_label['reason_canceled']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["reason_canceled"]) &&  $this->nmgp_cmp_readonly["reason_canceled"] == "on") { 

 ?>
<input type="hidden" name="reason_canceled" value="<?php echo $this->form_encode_input($reason_canceled) . "\">" . $reason_canceled . ""; ?>
<?php } else { ?>
<span id="id_read_on_reason_canceled" class="sc-ui-readonly-reason_canceled css_reason_canceled_line" style="<?php echo $sStyleReadLab_reason_canceled; ?>"><?php echo $this->form_format_readonly("reason_canceled", $this->form_encode_input($this->reason_canceled)); ?></span><span id="id_read_off_reason_canceled" class="css_read_off_reason_canceled<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_reason_canceled; ?>">
 <input class="sc-js-input scFormObjectOdd css_reason_canceled_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_reason_canceled" type=text name="reason_canceled" value="<?php echo $this->form_encode_input($reason_canceled) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_reason_canceled_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_reason_canceled_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['retire_date']))
    {
        $this->nm_new_label['retire_date'] = "Retire Date";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $retire_date = $this->retire_date;
   $sStyleHidden_retire_date = '';
   if (isset($this->nmgp_cmp_hidden['retire_date']) && $this->nmgp_cmp_hidden['retire_date'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['retire_date']);
       $sStyleHidden_retire_date = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_retire_date = 'display: none;';
   $sStyleReadInp_retire_date = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['retire_date']) && $this->nmgp_cmp_readonly['retire_date'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['retire_date']);
       $sStyleReadLab_retire_date = '';
       $sStyleReadInp_retire_date = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['retire_date']) && $this->nmgp_cmp_hidden['retire_date'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="retire_date" value="<?php echo $this->form_encode_input($retire_date) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_retire_date_line" id="hidden_field_data_retire_date" style="<?php echo $sStyleHidden_retire_date; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_retire_date_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_retire_date_label" style=""><span id="id_label_retire_date"><?php echo $this->nm_new_label['retire_date']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["retire_date"]) &&  $this->nmgp_cmp_readonly["retire_date"] == "on") { 

 ?>
<input type="hidden" name="retire_date" value="<?php echo $this->form_encode_input($retire_date) . "\">" . $retire_date . ""; ?>
<?php } else { ?>
<span id="id_read_on_retire_date" class="sc-ui-readonly-retire_date css_retire_date_line" style="<?php echo $sStyleReadLab_retire_date; ?>"><?php echo $this->form_format_readonly("retire_date", $this->form_encode_input($retire_date)); ?></span><span id="id_read_off_retire_date" class="css_read_off_retire_date<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_retire_date; ?>"><?php
$tmp_form_data = $this->field_config['retire_date']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_retire_date_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_retire_date" type=text name="retire_date" value="<?php echo $this->form_encode_input($retire_date) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['retire_date']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['retire_date']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_retire_date_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_retire_date_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['verified_receipts']))
    {
        $this->nm_new_label['verified_receipts'] = "Verified Receipts";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $verified_receipts = $this->verified_receipts;
   $sStyleHidden_verified_receipts = '';
   if (isset($this->nmgp_cmp_hidden['verified_receipts']) && $this->nmgp_cmp_hidden['verified_receipts'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['verified_receipts']);
       $sStyleHidden_verified_receipts = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_verified_receipts = 'display: none;';
   $sStyleReadInp_verified_receipts = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['verified_receipts']) && $this->nmgp_cmp_readonly['verified_receipts'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['verified_receipts']);
       $sStyleReadLab_verified_receipts = '';
       $sStyleReadInp_verified_receipts = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['verified_receipts']) && $this->nmgp_cmp_hidden['verified_receipts'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="verified_receipts" value="<?php echo $this->form_encode_input($verified_receipts) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_verified_receipts_line" id="hidden_field_data_verified_receipts" style="<?php echo $sStyleHidden_verified_receipts; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_verified_receipts_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_verified_receipts_label" style=""><span id="id_label_verified_receipts"><?php echo $this->nm_new_label['verified_receipts']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["verified_receipts"]) &&  $this->nmgp_cmp_readonly["verified_receipts"] == "on") { 

 ?>
<input type="hidden" name="verified_receipts" value="<?php echo $this->form_encode_input($verified_receipts) . "\">" . $verified_receipts . ""; ?>
<?php } else { ?>
<span id="id_read_on_verified_receipts" class="sc-ui-readonly-verified_receipts css_verified_receipts_line" style="<?php echo $sStyleReadLab_verified_receipts; ?>"><?php echo $this->form_format_readonly("verified_receipts", $this->form_encode_input($this->verified_receipts)); ?></span><span id="id_read_off_verified_receipts" class="css_read_off_verified_receipts<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_verified_receipts; ?>">
 <input class="sc-js-input scFormObjectOdd css_verified_receipts_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_verified_receipts" type=text name="verified_receipts" value="<?php echo $this->form_encode_input($verified_receipts) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_verified_receipts_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_verified_receipts_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['date_last_updated']))
    {
        $this->nm_new_label['date_last_updated'] = "Date Last Updated";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $date_last_updated = $this->date_last_updated;
   $sStyleHidden_date_last_updated = '';
   if (isset($this->nmgp_cmp_hidden['date_last_updated']) && $this->nmgp_cmp_hidden['date_last_updated'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['date_last_updated']);
       $sStyleHidden_date_last_updated = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_date_last_updated = 'display: none;';
   $sStyleReadInp_date_last_updated = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['date_last_updated']) && $this->nmgp_cmp_readonly['date_last_updated'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['date_last_updated']);
       $sStyleReadLab_date_last_updated = '';
       $sStyleReadInp_date_last_updated = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['date_last_updated']) && $this->nmgp_cmp_hidden['date_last_updated'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="date_last_updated" value="<?php echo $this->form_encode_input($date_last_updated) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_date_last_updated_line" id="hidden_field_data_date_last_updated" style="<?php echo $sStyleHidden_date_last_updated; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_date_last_updated_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_date_last_updated_label" style=""><span id="id_label_date_last_updated"><?php echo $this->nm_new_label['date_last_updated']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["date_last_updated"]) &&  $this->nmgp_cmp_readonly["date_last_updated"] == "on") { 

 ?>
<input type="hidden" name="date_last_updated" value="<?php echo $this->form_encode_input($date_last_updated) . "\">" . $date_last_updated . ""; ?>
<?php } else { ?>
<span id="id_read_on_date_last_updated" class="sc-ui-readonly-date_last_updated css_date_last_updated_line" style="<?php echo $sStyleReadLab_date_last_updated; ?>"><?php echo $this->form_format_readonly("date_last_updated", $this->form_encode_input($date_last_updated)); ?></span><span id="id_read_off_date_last_updated" class="css_read_off_date_last_updated<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_date_last_updated; ?>"><?php
$tmp_form_data = $this->field_config['date_last_updated']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_date_last_updated_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_date_last_updated" type=text name="date_last_updated" value="<?php echo $this->form_encode_input($date_last_updated) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['date_last_updated']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['date_last_updated']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_date_last_updated_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_date_last_updated_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['restricted']))
    {
        $this->nm_new_label['restricted'] = "Restricted";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $restricted = $this->restricted;
   $sStyleHidden_restricted = '';
   if (isset($this->nmgp_cmp_hidden['restricted']) && $this->nmgp_cmp_hidden['restricted'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['restricted']);
       $sStyleHidden_restricted = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_restricted = 'display: none;';
   $sStyleReadInp_restricted = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['restricted']) && $this->nmgp_cmp_readonly['restricted'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['restricted']);
       $sStyleReadLab_restricted = '';
       $sStyleReadInp_restricted = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['restricted']) && $this->nmgp_cmp_hidden['restricted'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="restricted" value="<?php echo $this->form_encode_input($restricted) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_restricted_line" id="hidden_field_data_restricted" style="<?php echo $sStyleHidden_restricted; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_restricted_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_restricted_label" style=""><span id="id_label_restricted"><?php echo $this->nm_new_label['restricted']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["restricted"]) &&  $this->nmgp_cmp_readonly["restricted"] == "on") { 

 ?>
<input type="hidden" name="restricted" value="<?php echo $this->form_encode_input($restricted) . "\">" . $restricted . ""; ?>
<?php } else { ?>
<span id="id_read_on_restricted" class="sc-ui-readonly-restricted css_restricted_line" style="<?php echo $sStyleReadLab_restricted; ?>"><?php echo $this->form_format_readonly("restricted", $this->form_encode_input($this->restricted)); ?></span><span id="id_read_off_restricted" class="css_read_off_restricted<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_restricted; ?>">
 <input class="sc-js-input scFormObjectOdd css_restricted_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_restricted" type=text name="restricted" value="<?php echo $this->form_encode_input($restricted) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_restricted_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_restricted_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['committee_approval_required']))
    {
        $this->nm_new_label['committee_approval_required'] = "Committee Approval Required";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $committee_approval_required = $this->committee_approval_required;
   $sStyleHidden_committee_approval_required = '';
   if (isset($this->nmgp_cmp_hidden['committee_approval_required']) && $this->nmgp_cmp_hidden['committee_approval_required'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['committee_approval_required']);
       $sStyleHidden_committee_approval_required = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_committee_approval_required = 'display: none;';
   $sStyleReadInp_committee_approval_required = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['committee_approval_required']) && $this->nmgp_cmp_readonly['committee_approval_required'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['committee_approval_required']);
       $sStyleReadLab_committee_approval_required = '';
       $sStyleReadInp_committee_approval_required = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['committee_approval_required']) && $this->nmgp_cmp_hidden['committee_approval_required'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="committee_approval_required" value="<?php echo $this->form_encode_input($committee_approval_required) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_committee_approval_required_line" id="hidden_field_data_committee_approval_required" style="<?php echo $sStyleHidden_committee_approval_required; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_committee_approval_required_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_committee_approval_required_label" style=""><span id="id_label_committee_approval_required"><?php echo $this->nm_new_label['committee_approval_required']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["committee_approval_required"]) &&  $this->nmgp_cmp_readonly["committee_approval_required"] == "on") { 

 ?>
<input type="hidden" name="committee_approval_required" value="<?php echo $this->form_encode_input($committee_approval_required) . "\">" . $committee_approval_required . ""; ?>
<?php } else { ?>
<span id="id_read_on_committee_approval_required" class="sc-ui-readonly-committee_approval_required css_committee_approval_required_line" style="<?php echo $sStyleReadLab_committee_approval_required; ?>"><?php echo $this->form_format_readonly("committee_approval_required", $this->form_encode_input($this->committee_approval_required)); ?></span><span id="id_read_off_committee_approval_required" class="css_read_off_committee_approval_required<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_committee_approval_required; ?>">
 <input class="sc-js-input scFormObjectOdd css_committee_approval_required_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_committee_approval_required" type=text name="committee_approval_required" value="<?php echo $this->form_encode_input($committee_approval_required) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_committee_approval_required_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_committee_approval_required_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['type_company']))
   {
       $this->nm_new_label['type_company'] = "Company Type (Dep)";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $type_company = $this->type_company;
   $sStyleHidden_type_company = '';
   if (isset($this->nmgp_cmp_hidden['type_company']) && $this->nmgp_cmp_hidden['type_company'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['type_company']);
       $sStyleHidden_type_company = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_type_company = 'display: none;';
   $sStyleReadInp_type_company = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['type_company']) && $this->nmgp_cmp_readonly['type_company'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['type_company']);
       $sStyleReadLab_type_company = '';
       $sStyleReadInp_type_company = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['type_company']) && $this->nmgp_cmp_hidden['type_company'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="type_company" value="<?php echo $this->form_encode_input($this->type_company) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_type_company_line" id="hidden_field_data_type_company" style="<?php echo $sStyleHidden_type_company; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_type_company_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_type_company_label" style=""><span id="id_label_type_company"><?php echo $this->nm_new_label['type_company']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["type_company"]) &&  $this->nmgp_cmp_readonly["type_company"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_type_company']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_type_company'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_type_company']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_type_company'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_type_company']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_type_company'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_type_company']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_type_company'] = array(); 
    }

   $old_value_client_id = $this->client_id;
   $old_value_starting_date = $this->starting_date;
   $old_value_renewal_date = $this->renewal_date;
   $old_value_expiration_date = $this->expiration_date;
   $old_value_cancel_date = $this->cancel_date;
   $old_value_retire_date = $this->retire_date;
   $old_value_date_last_updated = $this->date_last_updated;
   $old_value_archive_date = $this->archive_date;
   $old_value_record_created = $this->record_created;
   $old_value_record_created_hora = $this->record_created_hora;
   $old_value_permanent_member_date = $this->permanent_member_date;
   $old_value_appn_date = $this->appn_date;
   $old_value_buyers_excel_qty = $this->buyers_excel_qty;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_client_id = $this->client_id;
   $unformatted_value_starting_date = $this->starting_date;
   $unformatted_value_renewal_date = $this->renewal_date;
   $unformatted_value_expiration_date = $this->expiration_date;
   $unformatted_value_cancel_date = $this->cancel_date;
   $unformatted_value_retire_date = $this->retire_date;
   $unformatted_value_date_last_updated = $this->date_last_updated;
   $unformatted_value_archive_date = $this->archive_date;
   $unformatted_value_record_created = $this->record_created;
   $unformatted_value_record_created_hora = $this->record_created_hora;
   $unformatted_value_permanent_member_date = $this->permanent_member_date;
   $unformatted_value_appn_date = $this->appn_date;
   $unformatted_value_buyers_excel_qty = $this->buyers_excel_qty;

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
   $nm_comando = "SELECT company_type, company_type  FROM members_pass_type  ORDER BY company_type";

   $this->client_id = $old_value_client_id;
   $this->starting_date = $old_value_starting_date;
   $this->renewal_date = $old_value_renewal_date;
   $this->expiration_date = $old_value_expiration_date;
   $this->cancel_date = $old_value_cancel_date;
   $this->retire_date = $old_value_retire_date;
   $this->date_last_updated = $old_value_date_last_updated;
   $this->archive_date = $old_value_archive_date;
   $this->record_created = $old_value_record_created;
   $this->record_created_hora = $old_value_record_created_hora;
   $this->permanent_member_date = $old_value_permanent_member_date;
   $this->appn_date = $old_value_appn_date;
   $this->buyers_excel_qty = $old_value_buyers_excel_qty;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_type_company'][] = $rs->fields[0];
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
   $type_company_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->type_company_1))
          {
              foreach ($this->type_company_1 as $tmp_type_company)
              {
                  if (trim($tmp_type_company) === trim($cadaselect[1])) {$type_company_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->type_company) && trim($this->type_company) === trim($cadaselect[1])) {$type_company_look .= $cadaselect[0];} 
          $x++; 
   }

?>
<input type="hidden" name="type_company" value="<?php echo $this->form_encode_input($type_company) . "\">" . $type_company_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_type_company();
   $x = 0 ; 
   $type_company_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->type_company_1))
          {
              foreach ($this->type_company_1 as $tmp_type_company)
              {
                  if (trim($tmp_type_company) === trim($cadaselect[1])) {$type_company_look .= $cadaselect[0] . '__SC_BREAK_LINE__';}
              }
          }
          elseif (isset($cadaselect[1]) && is_string($this->type_company) && trim($this->type_company) === trim($cadaselect[1])) { $type_company_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($type_company_look))
          {
              $type_company_look = $this->type_company;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_type_company\" class=\"css_type_company_line\" style=\"" .  $sStyleReadLab_type_company . "\">" . $this->form_format_readonly("type_company", $this->form_encode_input($type_company_look)) . "</span><span id=\"id_read_off_type_company\" class=\"css_read_off_type_company" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_type_company . "\">";
   echo " <span id=\"idAjaxSelect_type_company\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_type_company_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_type_company\" name=\"type_company\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_type_company'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Choose") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->type_company) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->type_company)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_type_company_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_type_company_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['archive']))
   {
       $this->nm_new_label['archive'] = "";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $archive = $this->archive;
   $sStyleHidden_archive = '';
   if (isset($this->nmgp_cmp_hidden['archive']) && $this->nmgp_cmp_hidden['archive'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['archive']);
       $sStyleHidden_archive = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_archive = 'display: none;';
   $sStyleReadInp_archive = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['archive']) && $this->nmgp_cmp_readonly['archive'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['archive']);
       $sStyleReadLab_archive = '';
       $sStyleReadInp_archive = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['archive']) && $this->nmgp_cmp_hidden['archive'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="archive" value="<?php echo $this->form_encode_input($this->archive) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->archive_1 = explode(";", trim($this->archive));
  } 
  else
  {
      if (empty($this->archive))
      {
          $this->archive_1= array(); 
          $this->archive= "0";
      } 
      else
      {
          $this->archive_1= $this->archive; 
          $this->archive= ""; 
          foreach ($this->archive_1 as $cada_archive)
          {
             if (!empty($archive))
             {
                 $this->archive.= ";"; 
             } 
             $this->archive.= $cada_archive; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_archive_line" id="hidden_field_data_archive" style="<?php echo $sStyleHidden_archive; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_archive_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_archive_label" style=""><span id="id_label_archive"><?php echo $this->nm_new_label['archive']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["archive"]) &&  $this->nmgp_cmp_readonly["archive"] == "on") { 

$archive_look = "";
 if ($this->archive == "1") { $archive_look .= "Inactive Membership" ;} 
 if (empty($archive_look)) { $archive_look = $this->archive; }
?>
<input type="hidden" name="archive" value="<?php echo $this->form_encode_input($archive) . "\">" . $archive_look . ""; ?>
<?php } else { ?>

<?php

$archive_look = "";
 if ($this->archive == "1") { $archive_look .= "Inactive Membership" ;} 
 if (empty($archive_look)) { $archive_look = $this->archive; }
?>
<span id="id_read_on_archive" class="css_archive_line" style="<?php echo $sStyleReadLab_archive; ?>"><?php echo $this->form_format_readonly("archive", $this->form_encode_input($archive_look)); ?></span><span id="id_read_off_archive" class="css_read_off_archive css_archive_line" style="<?php echo $sStyleReadInp_archive; ?>"><?php echo "<div id=\"idAjaxCheckbox_archive\" style=\"display: inline-block\" class=\"css_archive_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_archive_line"><?php $tempOptionId = "id-opt-archive" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-archive sc-ui-checkbox-archive" name="archive[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_archive'][] = '1'; ?>
<?php  if (in_array("1", $this->archive_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>">Inactive Membership</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_archive_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_archive_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['archive_date']))
    {
        $this->nm_new_label['archive_date'] = "Archive Date";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $archive_date = $this->archive_date;
   $sStyleHidden_archive_date = '';
   if (isset($this->nmgp_cmp_hidden['archive_date']) && $this->nmgp_cmp_hidden['archive_date'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['archive_date']);
       $sStyleHidden_archive_date = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_archive_date = 'display: none;';
   $sStyleReadInp_archive_date = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['archive_date']) && $this->nmgp_cmp_readonly['archive_date'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['archive_date']);
       $sStyleReadLab_archive_date = '';
       $sStyleReadInp_archive_date = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['archive_date']) && $this->nmgp_cmp_hidden['archive_date'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="archive_date" value="<?php echo $this->form_encode_input($archive_date) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_archive_date_line" id="hidden_field_data_archive_date" style="<?php echo $sStyleHidden_archive_date; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_archive_date_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_archive_date_label" style=""><span id="id_label_archive_date"><?php echo $this->nm_new_label['archive_date']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["archive_date"]) &&  $this->nmgp_cmp_readonly["archive_date"] == "on") { 

 ?>
<input type="hidden" name="archive_date" value="<?php echo $this->form_encode_input($archive_date) . "\">" . $archive_date . ""; ?>
<?php } else { ?>
<span id="id_read_on_archive_date" class="sc-ui-readonly-archive_date css_archive_date_line" style="<?php echo $sStyleReadLab_archive_date; ?>"><?php echo $this->form_format_readonly("archive_date", $this->form_encode_input($archive_date)); ?></span><span id="id_read_off_archive_date" class="css_read_off_archive_date<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_archive_date; ?>"><?php
$tmp_form_data = $this->field_config['archive_date']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_archive_date_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_archive_date" type=text name="archive_date" value="<?php echo $this->form_encode_input($archive_date) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['archive_date']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['archive_date']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_archive_date_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_archive_date_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['pricing_level_id']))
   {
       $this->nm_new_label['pricing_level_id'] = "Pricing Level";
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

    <TD class="scFormDataOdd css_pricing_level_id_line" id="hidden_field_data_pricing_level_id" style="<?php echo $sStyleHidden_pricing_level_id; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pricing_level_id_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_pricing_level_id_label" style=""><span id="id_label_pricing_level_id"><?php echo $this->nm_new_label['pricing_level_id']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pricing_level_id"]) &&  $this->nmgp_cmp_readonly["pricing_level_id"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_pricing_level_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_pricing_level_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_pricing_level_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_pricing_level_id'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_pricing_level_id']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_pricing_level_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_pricing_level_id']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_pricing_level_id'] = array(); 
    }

   $old_value_client_id = $this->client_id;
   $old_value_starting_date = $this->starting_date;
   $old_value_renewal_date = $this->renewal_date;
   $old_value_expiration_date = $this->expiration_date;
   $old_value_cancel_date = $this->cancel_date;
   $old_value_retire_date = $this->retire_date;
   $old_value_date_last_updated = $this->date_last_updated;
   $old_value_archive_date = $this->archive_date;
   $old_value_record_created = $this->record_created;
   $old_value_record_created_hora = $this->record_created_hora;
   $old_value_permanent_member_date = $this->permanent_member_date;
   $old_value_appn_date = $this->appn_date;
   $old_value_buyers_excel_qty = $this->buyers_excel_qty;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_client_id = $this->client_id;
   $unformatted_value_starting_date = $this->starting_date;
   $unformatted_value_renewal_date = $this->renewal_date;
   $unformatted_value_expiration_date = $this->expiration_date;
   $unformatted_value_cancel_date = $this->cancel_date;
   $unformatted_value_retire_date = $this->retire_date;
   $unformatted_value_date_last_updated = $this->date_last_updated;
   $unformatted_value_archive_date = $this->archive_date;
   $unformatted_value_record_created = $this->record_created;
   $unformatted_value_record_created_hora = $this->record_created_hora;
   $unformatted_value_permanent_member_date = $this->permanent_member_date;
   $unformatted_value_appn_date = $this->appn_date;
   $unformatted_value_buyers_excel_qty = $this->buyers_excel_qty;

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
   $nm_comando = "SELECT memb_lev_id, pricing_level  FROM members_level  WHERE active ORDER BY sort_by";

   $this->client_id = $old_value_client_id;
   $this->starting_date = $old_value_starting_date;
   $this->renewal_date = $old_value_renewal_date;
   $this->expiration_date = $old_value_expiration_date;
   $this->cancel_date = $old_value_cancel_date;
   $this->retire_date = $old_value_retire_date;
   $this->date_last_updated = $old_value_date_last_updated;
   $this->archive_date = $old_value_archive_date;
   $this->record_created = $old_value_record_created;
   $this->record_created_hora = $old_value_record_created_hora;
   $this->permanent_member_date = $old_value_permanent_member_date;
   $this->appn_date = $old_value_appn_date;
   $this->buyers_excel_qty = $old_value_buyers_excel_qty;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_pricing_level_id'][] = $rs->fields[0];
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
          elseif (isset($cadaselect[1]) && is_string($this->pricing_level_id) && trim($this->pricing_level_id) === trim($cadaselect[1])) { $pricing_level_id_look .= $cadaselect[0]; } 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_pricing_level_id'][] = ''; 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pricing_level_id_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pricing_level_id_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['store_front_address']))
    {
        $this->nm_new_label['store_front_address'] = "Store Front Address";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $store_front_address = $this->store_front_address;
   $sStyleHidden_store_front_address = '';
   if (isset($this->nmgp_cmp_hidden['store_front_address']) && $this->nmgp_cmp_hidden['store_front_address'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['store_front_address']);
       $sStyleHidden_store_front_address = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_store_front_address = 'display: none;';
   $sStyleReadInp_store_front_address = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['store_front_address']) && $this->nmgp_cmp_readonly['store_front_address'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['store_front_address']);
       $sStyleReadLab_store_front_address = '';
       $sStyleReadInp_store_front_address = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['store_front_address']) && $this->nmgp_cmp_hidden['store_front_address'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="store_front_address" value="<?php echo $this->form_encode_input($store_front_address) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_store_front_address_line" id="hidden_field_data_store_front_address" style="<?php echo $sStyleHidden_store_front_address; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_store_front_address_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_store_front_address_label" style=""><span id="id_label_store_front_address"><?php echo $this->nm_new_label['store_front_address']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["store_front_address"]) &&  $this->nmgp_cmp_readonly["store_front_address"] == "on") { 

 ?>
<input type="hidden" name="store_front_address" value="<?php echo $this->form_encode_input($store_front_address) . "\">" . $store_front_address . ""; ?>
<?php } else { ?>
<span id="id_read_on_store_front_address" class="sc-ui-readonly-store_front_address css_store_front_address_line" style="<?php echo $sStyleReadLab_store_front_address; ?>"><?php echo $this->form_format_readonly("store_front_address", $this->form_encode_input($this->store_front_address)); ?></span><span id="id_read_off_store_front_address" class="css_read_off_store_front_address<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_store_front_address; ?>">
 <input class="sc-js-input scFormObjectOdd css_store_front_address_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_store_front_address" type=text name="store_front_address" value="<?php echo $this->form_encode_input($store_front_address) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_store_front_address_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_store_front_address_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['store_front_city']))
    {
        $this->nm_new_label['store_front_city'] = "Store Front City";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $store_front_city = $this->store_front_city;
   $sStyleHidden_store_front_city = '';
   if (isset($this->nmgp_cmp_hidden['store_front_city']) && $this->nmgp_cmp_hidden['store_front_city'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['store_front_city']);
       $sStyleHidden_store_front_city = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_store_front_city = 'display: none;';
   $sStyleReadInp_store_front_city = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['store_front_city']) && $this->nmgp_cmp_readonly['store_front_city'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['store_front_city']);
       $sStyleReadLab_store_front_city = '';
       $sStyleReadInp_store_front_city = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['store_front_city']) && $this->nmgp_cmp_hidden['store_front_city'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="store_front_city" value="<?php echo $this->form_encode_input($store_front_city) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_store_front_city_line" id="hidden_field_data_store_front_city" style="<?php echo $sStyleHidden_store_front_city; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_store_front_city_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_store_front_city_label" style=""><span id="id_label_store_front_city"><?php echo $this->nm_new_label['store_front_city']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["store_front_city"]) &&  $this->nmgp_cmp_readonly["store_front_city"] == "on") { 

 ?>
<input type="hidden" name="store_front_city" value="<?php echo $this->form_encode_input($store_front_city) . "\">" . $store_front_city . ""; ?>
<?php } else { ?>
<span id="id_read_on_store_front_city" class="sc-ui-readonly-store_front_city css_store_front_city_line" style="<?php echo $sStyleReadLab_store_front_city; ?>"><?php echo $this->form_format_readonly("store_front_city", $this->form_encode_input($this->store_front_city)); ?></span><span id="id_read_off_store_front_city" class="css_read_off_store_front_city<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_store_front_city; ?>">
 <input class="sc-js-input scFormObjectOdd css_store_front_city_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_store_front_city" type=text name="store_front_city" value="<?php echo $this->form_encode_input($store_front_city) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_store_front_city_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_store_front_city_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['store_front_zip']))
    {
        $this->nm_new_label['store_front_zip'] = "Store Front Zip";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $store_front_zip = $this->store_front_zip;
   $sStyleHidden_store_front_zip = '';
   if (isset($this->nmgp_cmp_hidden['store_front_zip']) && $this->nmgp_cmp_hidden['store_front_zip'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['store_front_zip']);
       $sStyleHidden_store_front_zip = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_store_front_zip = 'display: none;';
   $sStyleReadInp_store_front_zip = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['store_front_zip']) && $this->nmgp_cmp_readonly['store_front_zip'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['store_front_zip']);
       $sStyleReadLab_store_front_zip = '';
       $sStyleReadInp_store_front_zip = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['store_front_zip']) && $this->nmgp_cmp_hidden['store_front_zip'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="store_front_zip" value="<?php echo $this->form_encode_input($store_front_zip) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_store_front_zip_line" id="hidden_field_data_store_front_zip" style="<?php echo $sStyleHidden_store_front_zip; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_store_front_zip_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_store_front_zip_label" style=""><span id="id_label_store_front_zip"><?php echo $this->nm_new_label['store_front_zip']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["store_front_zip"]) &&  $this->nmgp_cmp_readonly["store_front_zip"] == "on") { 

 ?>
<input type="hidden" name="store_front_zip" value="<?php echo $this->form_encode_input($store_front_zip) . "\">" . $store_front_zip . ""; ?>
<?php } else { ?>
<span id="id_read_on_store_front_zip" class="sc-ui-readonly-store_front_zip css_store_front_zip_line" style="<?php echo $sStyleReadLab_store_front_zip; ?>"><?php echo $this->form_format_readonly("store_front_zip", $this->form_encode_input($this->store_front_zip)); ?></span><span id="id_read_off_store_front_zip" class="css_read_off_store_front_zip<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_store_front_zip; ?>">
 <input class="sc-js-input scFormObjectOdd css_store_front_zip_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_store_front_zip" type=text name="store_front_zip" value="<?php echo $this->form_encode_input($store_front_zip) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_store_front_zip_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_store_front_zip_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['home_base_address']))
    {
        $this->nm_new_label['home_base_address'] = "Home Base Address";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $home_base_address = $this->home_base_address;
   $sStyleHidden_home_base_address = '';
   if (isset($this->nmgp_cmp_hidden['home_base_address']) && $this->nmgp_cmp_hidden['home_base_address'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['home_base_address']);
       $sStyleHidden_home_base_address = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_home_base_address = 'display: none;';
   $sStyleReadInp_home_base_address = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['home_base_address']) && $this->nmgp_cmp_readonly['home_base_address'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['home_base_address']);
       $sStyleReadLab_home_base_address = '';
       $sStyleReadInp_home_base_address = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['home_base_address']) && $this->nmgp_cmp_hidden['home_base_address'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="home_base_address" value="<?php echo $this->form_encode_input($home_base_address) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_home_base_address_line" id="hidden_field_data_home_base_address" style="<?php echo $sStyleHidden_home_base_address; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_home_base_address_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_home_base_address_label" style=""><span id="id_label_home_base_address"><?php echo $this->nm_new_label['home_base_address']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["home_base_address"]) &&  $this->nmgp_cmp_readonly["home_base_address"] == "on") { 

 ?>
<input type="hidden" name="home_base_address" value="<?php echo $this->form_encode_input($home_base_address) . "\">" . $home_base_address . ""; ?>
<?php } else { ?>
<span id="id_read_on_home_base_address" class="sc-ui-readonly-home_base_address css_home_base_address_line" style="<?php echo $sStyleReadLab_home_base_address; ?>"><?php echo $this->form_format_readonly("home_base_address", $this->form_encode_input($this->home_base_address)); ?></span><span id="id_read_off_home_base_address" class="css_read_off_home_base_address<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_home_base_address; ?>">
 <input class="sc-js-input scFormObjectOdd css_home_base_address_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_home_base_address" type=text name="home_base_address" value="<?php echo $this->form_encode_input($home_base_address) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_home_base_address_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_home_base_address_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['home_base_city']))
    {
        $this->nm_new_label['home_base_city'] = "Home Base City";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $home_base_city = $this->home_base_city;
   $sStyleHidden_home_base_city = '';
   if (isset($this->nmgp_cmp_hidden['home_base_city']) && $this->nmgp_cmp_hidden['home_base_city'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['home_base_city']);
       $sStyleHidden_home_base_city = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_home_base_city = 'display: none;';
   $sStyleReadInp_home_base_city = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['home_base_city']) && $this->nmgp_cmp_readonly['home_base_city'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['home_base_city']);
       $sStyleReadLab_home_base_city = '';
       $sStyleReadInp_home_base_city = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['home_base_city']) && $this->nmgp_cmp_hidden['home_base_city'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="home_base_city" value="<?php echo $this->form_encode_input($home_base_city) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_home_base_city_line" id="hidden_field_data_home_base_city" style="<?php echo $sStyleHidden_home_base_city; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_home_base_city_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_home_base_city_label" style=""><span id="id_label_home_base_city"><?php echo $this->nm_new_label['home_base_city']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["home_base_city"]) &&  $this->nmgp_cmp_readonly["home_base_city"] == "on") { 

 ?>
<input type="hidden" name="home_base_city" value="<?php echo $this->form_encode_input($home_base_city) . "\">" . $home_base_city . ""; ?>
<?php } else { ?>
<span id="id_read_on_home_base_city" class="sc-ui-readonly-home_base_city css_home_base_city_line" style="<?php echo $sStyleReadLab_home_base_city; ?>"><?php echo $this->form_format_readonly("home_base_city", $this->form_encode_input($this->home_base_city)); ?></span><span id="id_read_off_home_base_city" class="css_read_off_home_base_city<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_home_base_city; ?>">
 <input class="sc-js-input scFormObjectOdd css_home_base_city_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_home_base_city" type=text name="home_base_city" value="<?php echo $this->form_encode_input($home_base_city) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_home_base_city_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_home_base_city_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['home_base_zip']))
    {
        $this->nm_new_label['home_base_zip'] = "Home Base Zip";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $home_base_zip = $this->home_base_zip;
   $sStyleHidden_home_base_zip = '';
   if (isset($this->nmgp_cmp_hidden['home_base_zip']) && $this->nmgp_cmp_hidden['home_base_zip'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['home_base_zip']);
       $sStyleHidden_home_base_zip = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_home_base_zip = 'display: none;';
   $sStyleReadInp_home_base_zip = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['home_base_zip']) && $this->nmgp_cmp_readonly['home_base_zip'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['home_base_zip']);
       $sStyleReadLab_home_base_zip = '';
       $sStyleReadInp_home_base_zip = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['home_base_zip']) && $this->nmgp_cmp_hidden['home_base_zip'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="home_base_zip" value="<?php echo $this->form_encode_input($home_base_zip) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_home_base_zip_line" id="hidden_field_data_home_base_zip" style="<?php echo $sStyleHidden_home_base_zip; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_home_base_zip_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_home_base_zip_label" style=""><span id="id_label_home_base_zip"><?php echo $this->nm_new_label['home_base_zip']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["home_base_zip"]) &&  $this->nmgp_cmp_readonly["home_base_zip"] == "on") { 

 ?>
<input type="hidden" name="home_base_zip" value="<?php echo $this->form_encode_input($home_base_zip) . "\">" . $home_base_zip . ""; ?>
<?php } else { ?>
<span id="id_read_on_home_base_zip" class="sc-ui-readonly-home_base_zip css_home_base_zip_line" style="<?php echo $sStyleReadLab_home_base_zip; ?>"><?php echo $this->form_format_readonly("home_base_zip", $this->form_encode_input($this->home_base_zip)); ?></span><span id="id_read_off_home_base_zip" class="css_read_off_home_base_zip<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_home_base_zip; ?>">
 <input class="sc-js-input scFormObjectOdd css_home_base_zip_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_home_base_zip" type=text name="home_base_zip" value="<?php echo $this->form_encode_input($home_base_zip) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_home_base_zip_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_home_base_zip_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['store_front_state']))
    {
        $this->nm_new_label['store_front_state'] = "Store Front State";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $store_front_state = $this->store_front_state;
   $sStyleHidden_store_front_state = '';
   if (isset($this->nmgp_cmp_hidden['store_front_state']) && $this->nmgp_cmp_hidden['store_front_state'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['store_front_state']);
       $sStyleHidden_store_front_state = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_store_front_state = 'display: none;';
   $sStyleReadInp_store_front_state = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['store_front_state']) && $this->nmgp_cmp_readonly['store_front_state'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['store_front_state']);
       $sStyleReadLab_store_front_state = '';
       $sStyleReadInp_store_front_state = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['store_front_state']) && $this->nmgp_cmp_hidden['store_front_state'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="store_front_state" value="<?php echo $this->form_encode_input($store_front_state) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_store_front_state_line" id="hidden_field_data_store_front_state" style="<?php echo $sStyleHidden_store_front_state; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_store_front_state_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_store_front_state_label" style=""><span id="id_label_store_front_state"><?php echo $this->nm_new_label['store_front_state']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["store_front_state"]) &&  $this->nmgp_cmp_readonly["store_front_state"] == "on") { 

 ?>
<input type="hidden" name="store_front_state" value="<?php echo $this->form_encode_input($store_front_state) . "\">" . $store_front_state . ""; ?>
<?php } else { ?>
<span id="id_read_on_store_front_state" class="sc-ui-readonly-store_front_state css_store_front_state_line" style="<?php echo $sStyleReadLab_store_front_state; ?>"><?php echo $this->form_format_readonly("store_front_state", $this->form_encode_input($this->store_front_state)); ?></span><span id="id_read_off_store_front_state" class="css_read_off_store_front_state<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_store_front_state; ?>">
 <input class="sc-js-input scFormObjectOdd css_store_front_state_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_store_front_state" type=text name="store_front_state" value="<?php echo $this->form_encode_input($store_front_state) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_store_front_state_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_store_front_state_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['home_base_state']))
    {
        $this->nm_new_label['home_base_state'] = "Home Base State";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $home_base_state = $this->home_base_state;
   $sStyleHidden_home_base_state = '';
   if (isset($this->nmgp_cmp_hidden['home_base_state']) && $this->nmgp_cmp_hidden['home_base_state'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['home_base_state']);
       $sStyleHidden_home_base_state = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_home_base_state = 'display: none;';
   $sStyleReadInp_home_base_state = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['home_base_state']) && $this->nmgp_cmp_readonly['home_base_state'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['home_base_state']);
       $sStyleReadLab_home_base_state = '';
       $sStyleReadInp_home_base_state = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['home_base_state']) && $this->nmgp_cmp_hidden['home_base_state'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="home_base_state" value="<?php echo $this->form_encode_input($home_base_state) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_home_base_state_line" id="hidden_field_data_home_base_state" style="<?php echo $sStyleHidden_home_base_state; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_home_base_state_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_home_base_state_label" style=""><span id="id_label_home_base_state"><?php echo $this->nm_new_label['home_base_state']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["home_base_state"]) &&  $this->nmgp_cmp_readonly["home_base_state"] == "on") { 

 ?>
<input type="hidden" name="home_base_state" value="<?php echo $this->form_encode_input($home_base_state) . "\">" . $home_base_state . ""; ?>
<?php } else { ?>
<span id="id_read_on_home_base_state" class="sc-ui-readonly-home_base_state css_home_base_state_line" style="<?php echo $sStyleReadLab_home_base_state; ?>"><?php echo $this->form_format_readonly("home_base_state", $this->form_encode_input($this->home_base_state)); ?></span><span id="id_read_off_home_base_state" class="css_read_off_home_base_state<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_home_base_state; ?>">
 <input class="sc-js-input scFormObjectOdd css_home_base_state_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_home_base_state" type=text name="home_base_state" value="<?php echo $this->form_encode_input($home_base_state) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_home_base_state_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_home_base_state_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['record_created']))
    {
        $this->nm_new_label['record_created'] = "Record Created";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_record_created = $this->record_created;
   if (strlen($this->record_created_hora) > 8 ) {$this->record_created_hora = substr($this->record_created_hora, 0, 8);}
   $this->record_created .= ' ' . $this->record_created_hora;
   $this->record_created  = trim($this->record_created);
   $record_created = $this->record_created;
   $sStyleHidden_record_created = '';
   if (isset($this->nmgp_cmp_hidden['record_created']) && $this->nmgp_cmp_hidden['record_created'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['record_created']);
       $sStyleHidden_record_created = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_record_created = 'display: none;';
   $sStyleReadInp_record_created = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['record_created']) && $this->nmgp_cmp_readonly['record_created'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['record_created']);
       $sStyleReadLab_record_created = '';
       $sStyleReadInp_record_created = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['record_created']) && $this->nmgp_cmp_hidden['record_created'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="record_created" value="<?php echo $this->form_encode_input($record_created) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_record_created_line" id="hidden_field_data_record_created" style="<?php echo $sStyleHidden_record_created; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_record_created_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_record_created_label" style=""><span id="id_label_record_created"><?php echo $this->nm_new_label['record_created']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["record_created"]) &&  $this->nmgp_cmp_readonly["record_created"] == "on") { 

 ?>
<input type="hidden" name="record_created" value="<?php echo $this->form_encode_input($record_created) . "\">" . $record_created . ""; ?>
<?php } else { ?>
<span id="id_read_on_record_created" class="sc-ui-readonly-record_created css_record_created_line" style="<?php echo $sStyleReadLab_record_created; ?>"><?php echo $this->form_format_readonly("record_created", $this->form_encode_input($record_created)); ?></span><span id="id_read_off_record_created" class="css_read_off_record_created<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_record_created; ?>"><?php
$tmp_form_data = $this->field_config['record_created']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_record_created_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_record_created" type=text name="record_created" value="<?php echo $this->form_encode_input($record_created) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['record_created']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['record_created']['date_format']; ?>', timeSep: '<?php echo $this->field_config['record_created']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_record_created_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_record_created_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->record_created = $old_dt_record_created;
?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['permanent_member_date']))
    {
        $this->nm_new_label['permanent_member_date'] = "Start Date";
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

    <TD class="scFormDataOdd css_permanent_member_date_line" id="hidden_field_data_permanent_member_date" style="<?php echo $sStyleHidden_permanent_member_date; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_permanent_member_date_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_permanent_member_date_label" style=""><span id="id_label_permanent_member_date"><?php echo $this->nm_new_label['permanent_member_date']; ?></span></span><br>
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_permanent_member_date_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_permanent_member_date_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


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

    <TD class="scFormDataOdd css_acct_instagram_line" id="hidden_field_data_acct_instagram" style="<?php echo $sStyleHidden_acct_instagram; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_acct_instagram_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_acct_instagram_label" style=""><span id="id_label_acct_instagram"><?php echo $this->nm_new_label['acct_instagram']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["acct_instagram"]) &&  $this->nmgp_cmp_readonly["acct_instagram"] == "on") { 

 ?>
<input type="hidden" name="acct_instagram" value="<?php echo $this->form_encode_input($acct_instagram) . "\">" . $acct_instagram . ""; ?>
<?php } else { ?>
<span id="id_read_on_acct_instagram" class="sc-ui-readonly-acct_instagram css_acct_instagram_line" style="<?php echo $sStyleReadLab_acct_instagram; ?>"><?php echo $this->form_format_readonly("acct_instagram", $this->form_encode_input($this->acct_instagram)); ?></span><span id="id_read_off_acct_instagram" class="css_read_off_acct_instagram<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_acct_instagram; ?>">
 <input class="sc-js-input scFormObjectOdd css_acct_instagram_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_acct_instagram" type=text name="acct_instagram" value="<?php echo $this->form_encode_input($acct_instagram) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=500 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span style="display: none"><?php echo nmButtonOutput($this->arr_buttons, "blink", "window.open(nm_link_url(document.F1.acct_instagram.value), '_blank')", "window.open(nm_link_url(document.F1.acct_instagram.value), '_blank')", "acct_instagram_url", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
</span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_acct_instagram_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_acct_instagram_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


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

    <TD class="scFormDataOdd css_acct_facebook_line" id="hidden_field_data_acct_facebook" style="<?php echo $sStyleHidden_acct_facebook; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_acct_facebook_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_acct_facebook_label" style=""><span id="id_label_acct_facebook"><?php echo $this->nm_new_label['acct_facebook']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["acct_facebook"]) &&  $this->nmgp_cmp_readonly["acct_facebook"] == "on") { 

 ?>
<input type="hidden" name="acct_facebook" value="<?php echo $this->form_encode_input($acct_facebook) . "\">" . $acct_facebook . ""; ?>
<?php } else { ?>
<span id="id_read_on_acct_facebook" class="sc-ui-readonly-acct_facebook css_acct_facebook_line" style="<?php echo $sStyleReadLab_acct_facebook; ?>"><?php echo $this->form_format_readonly("acct_facebook", $this->form_encode_input($this->acct_facebook)); ?></span><span id="id_read_off_acct_facebook" class="css_read_off_acct_facebook<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_acct_facebook; ?>">
 <input class="sc-js-input scFormObjectOdd css_acct_facebook_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_acct_facebook" type=text name="acct_facebook" value="<?php echo $this->form_encode_input($acct_facebook) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=500 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span style="display: none"><?php echo nmButtonOutput($this->arr_buttons, "blink", "window.open(nm_link_url(document.F1.acct_facebook.value), '_blank')", "window.open(nm_link_url(document.F1.acct_facebook.value), '_blank')", "acct_facebook_url", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
</span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_acct_facebook_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_acct_facebook_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




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

    <TD class="scFormDataOdd css_website_url_line" id="hidden_field_data_website_url" style="<?php echo $sStyleHidden_website_url; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_website_url_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_website_url_label" style=""><span id="id_label_website_url"><?php echo $this->nm_new_label['website_url']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["website_url"]) &&  $this->nmgp_cmp_readonly["website_url"] == "on") { 

 ?>
<input type="hidden" name="website_url" value="<?php echo $this->form_encode_input($website_url) . "\">" . $website_url . ""; ?>
<?php } else { ?>
<span id="id_read_on_website_url" class="sc-ui-readonly-website_url css_website_url_line" style="<?php echo $sStyleReadLab_website_url; ?>"><?php echo $this->form_format_readonly("website_url", $this->form_encode_input($this->website_url)); ?></span><span id="id_read_off_website_url" class="css_read_off_website_url<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_website_url; ?>">
 <input class="sc-js-input scFormObjectOdd css_website_url_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_website_url" type=text name="website_url" value="<?php echo $this->form_encode_input($website_url) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=500 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span style="display: none"><?php echo nmButtonOutput($this->arr_buttons, "blink", "window.open(nm_link_url(document.F1.website_url.value), '_blank')", "window.open(nm_link_url(document.F1.website_url.value), '_blank')", "website_url_url", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
</span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_website_url_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_website_url_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


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

    <TD class="scFormDataOdd css_bus_cat_id_line" id="hidden_field_data_bus_cat_id" style="<?php echo $sStyleHidden_bus_cat_id; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_bus_cat_id_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_bus_cat_id_label" style=""><span id="id_label_bus_cat_id"><?php echo $this->nm_new_label['bus_cat_id']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['bus_cat_id']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['bus_cat_id'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bus_cat_id"]) &&  $this->nmgp_cmp_readonly["bus_cat_id"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_bus_cat_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_bus_cat_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_bus_cat_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_bus_cat_id'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_bus_cat_id']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_bus_cat_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_bus_cat_id']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_bus_cat_id'] = array(); 
    }

   $old_value_client_id = $this->client_id;
   $old_value_starting_date = $this->starting_date;
   $old_value_renewal_date = $this->renewal_date;
   $old_value_expiration_date = $this->expiration_date;
   $old_value_cancel_date = $this->cancel_date;
   $old_value_retire_date = $this->retire_date;
   $old_value_date_last_updated = $this->date_last_updated;
   $old_value_archive_date = $this->archive_date;
   $old_value_record_created = $this->record_created;
   $old_value_record_created_hora = $this->record_created_hora;
   $old_value_permanent_member_date = $this->permanent_member_date;
   $old_value_appn_date = $this->appn_date;
   $old_value_buyers_excel_qty = $this->buyers_excel_qty;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_client_id = $this->client_id;
   $unformatted_value_starting_date = $this->starting_date;
   $unformatted_value_renewal_date = $this->renewal_date;
   $unformatted_value_expiration_date = $this->expiration_date;
   $unformatted_value_cancel_date = $this->cancel_date;
   $unformatted_value_retire_date = $this->retire_date;
   $unformatted_value_date_last_updated = $this->date_last_updated;
   $unformatted_value_archive_date = $this->archive_date;
   $unformatted_value_record_created = $this->record_created;
   $unformatted_value_record_created_hora = $this->record_created_hora;
   $unformatted_value_permanent_member_date = $this->permanent_member_date;
   $unformatted_value_appn_date = $this->appn_date;
   $unformatted_value_buyers_excel_qty = $this->buyers_excel_qty;

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
   $nm_comando = "SELECT bus_cat_id, bus_cat  FROM bus_categories  ORDER BY bus_cat";

   $this->client_id = $old_value_client_id;
   $this->starting_date = $old_value_starting_date;
   $this->renewal_date = $old_value_renewal_date;
   $this->expiration_date = $old_value_expiration_date;
   $this->cancel_date = $old_value_cancel_date;
   $this->retire_date = $old_value_retire_date;
   $this->date_last_updated = $old_value_date_last_updated;
   $this->archive_date = $old_value_archive_date;
   $this->record_created = $old_value_record_created;
   $this->record_created_hora = $old_value_record_created_hora;
   $this->permanent_member_date = $old_value_permanent_member_date;
   $this->appn_date = $old_value_appn_date;
   $this->buyers_excel_qty = $old_value_buyers_excel_qty;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_bus_cat_id'][] = $rs->fields[0];
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
          elseif (isset($cadaselect[1]) && is_string($this->bus_cat_id) && trim($this->bus_cat_id) === trim($cadaselect[1])) { $bus_cat_id_look .= $cadaselect[0]; } 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_bus_cat_id'][] = ''; 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bus_cat_id_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bus_cat_id_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


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

    <TD class="scFormDataOdd css_bus_subcat_id_line" id="hidden_field_data_bus_subcat_id" style="<?php echo $sStyleHidden_bus_subcat_id; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_bus_subcat_id_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_bus_subcat_id_label" style=""><span id="id_label_bus_subcat_id"><?php echo $this->nm_new_label['bus_subcat_id']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['bus_subcat_id']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['bus_subcat_id'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bus_subcat_id"]) &&  $this->nmgp_cmp_readonly["bus_subcat_id"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_bus_subcat_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_bus_subcat_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_bus_subcat_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_bus_subcat_id'] = array(); 
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_bus_subcat_id']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_bus_subcat_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_bus_subcat_id']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_bus_subcat_id'] = array(); 
    }

   $old_value_client_id = $this->client_id;
   $old_value_starting_date = $this->starting_date;
   $old_value_renewal_date = $this->renewal_date;
   $old_value_expiration_date = $this->expiration_date;
   $old_value_cancel_date = $this->cancel_date;
   $old_value_retire_date = $this->retire_date;
   $old_value_date_last_updated = $this->date_last_updated;
   $old_value_archive_date = $this->archive_date;
   $old_value_record_created = $this->record_created;
   $old_value_record_created_hora = $this->record_created_hora;
   $old_value_permanent_member_date = $this->permanent_member_date;
   $old_value_appn_date = $this->appn_date;
   $old_value_buyers_excel_qty = $this->buyers_excel_qty;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_client_id = $this->client_id;
   $unformatted_value_starting_date = $this->starting_date;
   $unformatted_value_renewal_date = $this->renewal_date;
   $unformatted_value_expiration_date = $this->expiration_date;
   $unformatted_value_cancel_date = $this->cancel_date;
   $unformatted_value_retire_date = $this->retire_date;
   $unformatted_value_date_last_updated = $this->date_last_updated;
   $unformatted_value_archive_date = $this->archive_date;
   $unformatted_value_record_created = $this->record_created;
   $unformatted_value_record_created_hora = $this->record_created_hora;
   $unformatted_value_permanent_member_date = $this->permanent_member_date;
   $unformatted_value_appn_date = $this->appn_date;
   $unformatted_value_buyers_excel_qty = $this->buyers_excel_qty;

   $nm_comando = "SELECT bus_subcat_id, bus_subcategory  FROM bus_subcats  WHERE bus_cat_id = $this->bus_cat_id  ORDER BY sort_by";

   $this->client_id = $old_value_client_id;
   $this->starting_date = $old_value_starting_date;
   $this->renewal_date = $old_value_renewal_date;
   $this->expiration_date = $old_value_expiration_date;
   $this->cancel_date = $old_value_cancel_date;
   $this->retire_date = $old_value_retire_date;
   $this->date_last_updated = $old_value_date_last_updated;
   $this->archive_date = $old_value_archive_date;
   $this->record_created = $old_value_record_created;
   $this->record_created_hora = $old_value_record_created_hora;
   $this->permanent_member_date = $old_value_permanent_member_date;
   $this->appn_date = $old_value_appn_date;
   $this->buyers_excel_qty = $old_value_buyers_excel_qty;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_bus_subcat_id'][] = $rs->fields[0];
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
          elseif (isset($cadaselect[1]) && is_string($this->bus_subcat_id) && trim($this->bus_subcat_id) === trim($cadaselect[1])) { $bus_subcat_id_look .= $cadaselect[0]; } 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_bus_subcat_id'][] = ''; 
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
</tbody></table></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bus_subcat_id_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bus_subcat_id_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


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

    <TD class="scFormDataOdd css_bus_subcat_other_line" id="hidden_field_data_bus_subcat_other" style="<?php echo $sStyleHidden_bus_subcat_other; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_bus_subcat_other_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_bus_subcat_other_label" style=""><span id="id_label_bus_subcat_other"><?php echo $this->nm_new_label['bus_subcat_other']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bus_subcat_other"]) &&  $this->nmgp_cmp_readonly["bus_subcat_other"] == "on") { 

 ?>
<input type="hidden" name="bus_subcat_other" value="<?php echo $this->form_encode_input($bus_subcat_other) . "\">" . $bus_subcat_other . ""; ?>
<?php } else { ?>
<span id="id_read_on_bus_subcat_other" class="sc-ui-readonly-bus_subcat_other css_bus_subcat_other_line" style="<?php echo $sStyleReadLab_bus_subcat_other; ?>"><?php echo $this->form_format_readonly("bus_subcat_other", $this->form_encode_input($this->bus_subcat_other)); ?></span><span id="id_read_off_bus_subcat_other" class="css_read_off_bus_subcat_other<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_bus_subcat_other; ?>">
 <input class="sc-js-input scFormObjectOdd css_bus_subcat_other_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_bus_subcat_other" type=text name="bus_subcat_other" value="<?php echo $this->form_encode_input($bus_subcat_other) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bus_subcat_other_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bus_subcat_other_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['appn_date']))
    {
        $this->nm_new_label['appn_date'] = "Application Date";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $appn_date = $this->appn_date;
   $sStyleHidden_appn_date = '';
   if (isset($this->nmgp_cmp_hidden['appn_date']) && $this->nmgp_cmp_hidden['appn_date'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['appn_date']);
       $sStyleHidden_appn_date = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_appn_date = 'display: none;';
   $sStyleReadInp_appn_date = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['appn_date']) && $this->nmgp_cmp_readonly['appn_date'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['appn_date']);
       $sStyleReadLab_appn_date = '';
       $sStyleReadInp_appn_date = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['appn_date']) && $this->nmgp_cmp_hidden['appn_date'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="appn_date" value="<?php echo $this->form_encode_input($appn_date) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_appn_date_line" id="hidden_field_data_appn_date" style="<?php echo $sStyleHidden_appn_date; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_appn_date_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_appn_date_label" style=""><span id="id_label_appn_date"><?php echo $this->nm_new_label['appn_date']; ?></span></span><br><input type="hidden" name="appn_date" value="<?php echo $this->form_encode_input($appn_date); ?>"><span id="id_ajax_label_appn_date"><?php echo nl2br($appn_date); ?></span>
<?php
$tmp_form_data = $this->field_config['appn_date']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_appn_date_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_appn_date_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['appn_note']))
    {
        $this->nm_new_label['appn_note'] = "Appn Note";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $appn_note = $this->appn_note;
   $sStyleHidden_appn_note = '';
   if (isset($this->nmgp_cmp_hidden['appn_note']) && $this->nmgp_cmp_hidden['appn_note'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['appn_note']);
       $sStyleHidden_appn_note = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_appn_note = 'display: none;';
   $sStyleReadInp_appn_note = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['appn_note']) && $this->nmgp_cmp_readonly['appn_note'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['appn_note']);
       $sStyleReadLab_appn_note = '';
       $sStyleReadInp_appn_note = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['appn_note']) && $this->nmgp_cmp_hidden['appn_note'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="appn_note" value="<?php echo $this->form_encode_input($appn_note) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_appn_note_line" id="hidden_field_data_appn_note" style="<?php echo $sStyleHidden_appn_note; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_appn_note_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_appn_note_label" style=""><span id="id_label_appn_note"><?php echo $this->nm_new_label['appn_note']; ?></span></span><br><span id="id_read_on_appn_note" style="<?php echo $sStyleReadLab_appn_note; ?>"><?php echo $this->form_format_readonly("appn_note", sc_strip_script($this->appn_note)); ?></span><span id="id_read_off_appn_note" class="css_read_off_appn_note" style="<?php echo $sStyleReadInp_appn_note; ?>"><textarea id="appn_note" name="appn_note" cols="50" rows="10" class="mceEditor_appn_note" style="width: 100%; height:300px;"><?php echo $this->form_encode_input($this->appn_note); ?></textarea>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_appn_note_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_appn_note_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['doc_type']))
   {
       $this->nm_new_label['doc_type'] = "Choose ONE Document from the options below to Upload:";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $doc_type = $this->doc_type;
   $sStyleHidden_doc_type = '';
   if (isset($this->nmgp_cmp_hidden['doc_type']) && $this->nmgp_cmp_hidden['doc_type'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['doc_type']);
       $sStyleHidden_doc_type = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_doc_type = 'display: none;';
   $sStyleReadInp_doc_type = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['doc_type']) && $this->nmgp_cmp_readonly['doc_type'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['doc_type']);
       $sStyleReadLab_doc_type = '';
       $sStyleReadInp_doc_type = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['doc_type']) && $this->nmgp_cmp_hidden['doc_type'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="doc_type" value="<?php echo $this->form_encode_input($this->doc_type) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->doc_type_1 = explode(";", trim($this->doc_type));
  } 
  else
  {
      if (empty($this->doc_type))
      {
          $this->doc_type_1= array(); 
      } 
      else
      {
          $this->doc_type_1= $this->doc_type; 
          $this->doc_type= ""; 
          foreach ($this->doc_type_1 as $cada_doc_type)
          {
             if (!empty($doc_type))
             {
                 $this->doc_type.= ";"; 
             } 
             $this->doc_type.= $cada_doc_type; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOdd css_doc_type_line" id="hidden_field_data_doc_type" style="<?php echo $sStyleHidden_doc_type; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_doc_type_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_doc_type_label" style=""><span id="id_label_doc_type"><?php echo $this->nm_new_label['doc_type']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['doc_type']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['doc_type'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["doc_type"]) &&  $this->nmgp_cmp_readonly["doc_type"] == "on") { 

$doc_type_look = "";
 if (in_array("Active Secretary of State Registration", $this->doc_type_1))  { $doc_type_look .= "Active Secretary of State Registration<br />";} 
 if (in_array("City Business License", $this->doc_type_1))  { $doc_type_look .= "City Business License<br />";} 
 if (in_array("Agricultural License", $this->doc_type_1))  { $doc_type_look .= "Agricultural License<br />";} 
 if (in_array("Other type of document", $this->doc_type_1))  { $doc_type_look .= "Other type of document<br />";} 
?>
<input type="hidden" name="doc_type" value="<?php echo $this->form_encode_input($doc_type) . "\">" . $doc_type_look . ""; ?>
<?php } else { ?>

<?php

$doc_type_look = "";
 if (in_array("Active Secretary of State Registration", $this->doc_type_1))  { $doc_type_look .= "Active Secretary of State Registration<br />";} 
 if (in_array("City Business License", $this->doc_type_1))  { $doc_type_look .= "City Business License<br />";} 
 if (in_array("Agricultural License", $this->doc_type_1))  { $doc_type_look .= "Agricultural License<br />";} 
 if (in_array("Other type of document", $this->doc_type_1))  { $doc_type_look .= "Other type of document<br />";} 
?>
<span id="id_read_on_doc_type" class="css_doc_type_line" style="<?php echo $sStyleReadLab_doc_type; ?>"><?php echo $this->form_format_readonly("doc_type", $this->form_encode_input($doc_type_look)); ?></span><span id="id_read_off_doc_type" class="css_read_off_doc_type css_doc_type_line" style="<?php echo $sStyleReadInp_doc_type; ?>"><?php echo "<div id=\"idAjaxCheckbox_doc_type\" style=\"display: inline-block\" class=\"css_doc_type_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_doc_type_line"><?php $tempOptionId = "id-opt-doc_type" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-doc_type sc-ui-checkbox-doc_type" name="doc_type[]" value="Active Secretary of State Registration"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_doc_type'][] = 'Active Secretary of State Registration'; ?>
<?php  if (in_array("Active Secretary of State Registration", $this->doc_type_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>">Active Secretary of State Registration</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_doc_type_line"><?php $tempOptionId = "id-opt-doc_type" . $sc_seq_vert . "-2"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-doc_type sc-ui-checkbox-doc_type" name="doc_type[]" value="City Business License"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_doc_type'][] = 'City Business License'; ?>
<?php  if (in_array("City Business License", $this->doc_type_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>">City Business License</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_doc_type_line"><?php $tempOptionId = "id-opt-doc_type" . $sc_seq_vert . "-3"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-doc_type sc-ui-checkbox-doc_type" name="doc_type[]" value="Agricultural License"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_doc_type'][] = 'Agricultural License'; ?>
<?php  if (in_array("Agricultural License", $this->doc_type_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>">Agricultural License</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_doc_type_line"><?php $tempOptionId = "id-opt-doc_type" . $sc_seq_vert . "-4"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-doc_type sc-ui-checkbox-doc_type" name="doc_type[]" value="Other type of document"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['Lookup_doc_type'][] = 'Other type of document'; ?>
<?php  if (in_array("Other type of document", $this->doc_type_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>">Other type of document</label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_doc_type_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_doc_type_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['doc_file']))
    {
        $this->nm_new_label['doc_file'] = "Attachment:";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $doc_file = $this->doc_file;
   $sStyleHidden_doc_file = '';
   if (isset($this->nmgp_cmp_hidden['doc_file']) && $this->nmgp_cmp_hidden['doc_file'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['doc_file']);
       $sStyleHidden_doc_file = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_doc_file = 'display: none;';
   $sStyleReadInp_doc_file = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['doc_file']) && $this->nmgp_cmp_readonly['doc_file'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['doc_file']);
       $sStyleReadLab_doc_file = '';
       $sStyleReadInp_doc_file = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['doc_file']) && $this->nmgp_cmp_hidden['doc_file'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="doc_file" value="<?php echo $this->form_encode_input($doc_file) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_doc_file_line" id="hidden_field_data_doc_file" style="<?php echo $sStyleHidden_doc_file; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_doc_file_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_doc_file_label" style=""><span id="id_label_doc_file"><?php echo $this->nm_new_label['doc_file']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['doc_file']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['doc_file'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["doc_file"]) &&  $this->nmgp_cmp_readonly["doc_file"] == "on") { 

 ?>
<input type="hidden" name="doc_file" value="<?php echo $this->form_encode_input($doc_file) . "\"><img id=\"doc_file_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><span id=\"id_ajax_doc_doc_file\"><a href=\"javascript:nm_mostra_doc('0', '" . str_replace(array("'", '%'), array("\'", '**Perc**'), substr($sTmpFile_doc_file, 3)) . "', 'form_clients_steps_appn_test')\">" . $doc_file . "</a></span>"; ?>
<?php } else { ?>
<span id="id_read_on_doc_file" class="scFormLinkOdd sc-ui-readonly-doc_file css_doc_file_line" style="<?php echo $sStyleReadLab_doc_file; ?>"><?php echo $this->form_format_readonly("doc_file", $this->doc_file) ?></span><span id="id_read_off_doc_file" class="css_read_off_doc_file" style="white-space: nowrap;<?php echo $sStyleReadInp_doc_file; ?>"><span style="display:none"><span id="sc-id-upload-select-doc_file" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_doc_file_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="doc_file[]" id="id_sc_field_doc_file" ></span></span>
<?php
   $sCheckInsert = "";
?>
<span style="display: none"><span id="chk_ajax_img_doc_file"<?php if ($this->nmgp_opcao == "novo" || empty($doc_file)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="doc_file_limpa" value="<?php echo $doc_file_limpa . '" '; if ($doc_file_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};<?php echo $sCheckInsert ?>"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span></span>
<?php 
   $doc_file = trim($doc_file); 
   if (!empty($doc_file)) 
   { 
       $nm_img_icone = $this->gera_icone($doc_file); 
       if (!empty($nm_img_icone)) 
       { 
           $nm_img_icone = "<img src=\"$nm_img_icone\" id=\"id_ajax_doc_icon_doc_file\">&nbsp;";
       } 
       echo  $nm_img_icone;
   } 
?> 
<img id="doc_file_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><span id="id_ajax_doc_doc_file"><a href="javascript:nm_mostra_doc('0', '<?php echo str_replace(array("'", '%'), array("\'", '**Perc**'), substr($sTmpFile_doc_file, 3)); ?>', 'form_clients_steps_appn_test')"><?php echo $doc_file ?></a></span><div id="id_img_loader_doc_file" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_doc_file" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
<div id="id_sc_dragdrop_doc_file" class="scFormDataDragNDrop"  style="<?php echo $sStyleReadInp_doc_file ?>cursor:pointer" onclick="$('#id_sc_field_doc_file').click()"><i class='fas fa-cloud-upload-alt'></i><br/>
<?php echo $this->Ini->Nm_lang['lang_errm_mu_dragfile_clickable'] ?></div>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_doc_file_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_doc_file_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member1_name']))
    {
        $this->nm_new_label['member1_name'] = "Name";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member1_name = $this->member1_name;
   $sStyleHidden_member1_name = '';
   if (isset($this->nmgp_cmp_hidden['member1_name']) && $this->nmgp_cmp_hidden['member1_name'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member1_name']);
       $sStyleHidden_member1_name = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member1_name = 'display: none;';
   $sStyleReadInp_member1_name = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member1_name']) && $this->nmgp_cmp_readonly['member1_name'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member1_name']);
       $sStyleReadLab_member1_name = '';
       $sStyleReadInp_member1_name = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member1_name']) && $this->nmgp_cmp_hidden['member1_name'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member1_name" value="<?php echo $this->form_encode_input($member1_name) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member1_name_line" id="hidden_field_data_member1_name" style="<?php echo $sStyleHidden_member1_name; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member1_name_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member1_name_label" style=""><span id="id_label_member1_name"><?php echo $this->nm_new_label['member1_name']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['member1_name']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['member1_name'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member1_name"]) &&  $this->nmgp_cmp_readonly["member1_name"] == "on") { 

 ?>
<input type="hidden" name="member1_name" value="<?php echo $this->form_encode_input($member1_name) . "\">" . $member1_name . ""; ?>
<?php } else { ?>
<span id="id_read_on_member1_name" class="sc-ui-readonly-member1_name css_member1_name_line" style="<?php echo $sStyleReadLab_member1_name; ?>"><?php echo $this->form_format_readonly("member1_name", $this->form_encode_input($this->member1_name)); ?></span><span id="id_read_off_member1_name" class="css_read_off_member1_name<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member1_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_member1_name_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member1_name" type=text name="member1_name" value="<?php echo $this->form_encode_input($member1_name) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '(#01 - Firstname Lastname)', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member1_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member1_name_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member1_phone']))
    {
        $this->nm_new_label['member1_phone'] = "Phone";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member1_phone = $this->member1_phone;
   $sStyleHidden_member1_phone = '';
   if (isset($this->nmgp_cmp_hidden['member1_phone']) && $this->nmgp_cmp_hidden['member1_phone'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member1_phone']);
       $sStyleHidden_member1_phone = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member1_phone = 'display: none;';
   $sStyleReadInp_member1_phone = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member1_phone']) && $this->nmgp_cmp_readonly['member1_phone'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member1_phone']);
       $sStyleReadLab_member1_phone = '';
       $sStyleReadInp_member1_phone = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member1_phone']) && $this->nmgp_cmp_hidden['member1_phone'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member1_phone" value="<?php echo $this->form_encode_input($member1_phone) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member1_phone_line" id="hidden_field_data_member1_phone" style="<?php echo $sStyleHidden_member1_phone; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member1_phone_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member1_phone_label" style=""><span id="id_label_member1_phone"><?php echo $this->nm_new_label['member1_phone']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member1_phone"]) &&  $this->nmgp_cmp_readonly["member1_phone"] == "on") { 

 ?>
<input type="hidden" name="member1_phone" value="<?php echo $this->form_encode_input($member1_phone) . "\">" . $member1_phone . ""; ?>
<?php } else { ?>
<span id="id_read_on_member1_phone" class="sc-ui-readonly-member1_phone css_member1_phone_line" style="<?php echo $sStyleReadLab_member1_phone; ?>"><?php echo $this->form_format_readonly("member1_phone", $this->form_encode_input($this->member1_phone)); ?></span><span id="id_read_off_member1_phone" class="css_read_off_member1_phone<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member1_phone; ?>">
 <input class="sc-js-input scFormObjectOdd css_member1_phone_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member1_phone" type=text name="member1_phone" value="<?php echo $this->form_encode_input($member1_phone) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member1_phone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member1_phone_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member1_email']))
    {
        $this->nm_new_label['member1_email'] = "Email";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member1_email = $this->member1_email;
   $sStyleHidden_member1_email = '';
   if (isset($this->nmgp_cmp_hidden['member1_email']) && $this->nmgp_cmp_hidden['member1_email'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member1_email']);
       $sStyleHidden_member1_email = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member1_email = 'display: none;';
   $sStyleReadInp_member1_email = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member1_email']) && $this->nmgp_cmp_readonly['member1_email'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member1_email']);
       $sStyleReadLab_member1_email = '';
       $sStyleReadInp_member1_email = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member1_email']) && $this->nmgp_cmp_hidden['member1_email'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member1_email" value="<?php echo $this->form_encode_input($member1_email) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member1_email_line" id="hidden_field_data_member1_email" style="<?php echo $sStyleHidden_member1_email; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member1_email_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member1_email_label" style=""><span id="id_label_member1_email"><?php echo $this->nm_new_label['member1_email']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member1_email"]) &&  $this->nmgp_cmp_readonly["member1_email"] == "on") { 

 ?>
<input type="hidden" name="member1_email" value="<?php echo $this->form_encode_input($member1_email) . "\">" . $member1_email . ""; ?>
<?php } else { ?>
<span id="id_read_on_member1_email" class="sc-ui-readonly-member1_email css_member1_email_line" style="<?php echo $sStyleReadLab_member1_email; ?>"><?php echo $this->form_format_readonly("member1_email", $this->form_encode_input($this->member1_email)); ?></span><span id="id_read_off_member1_email" class="css_read_off_member1_email<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member1_email; ?>">
 <input class="sc-js-input scFormObjectOdd css_member1_email_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member1_email" type=text name="member1_email" value="<?php echo $this->form_encode_input($member1_email) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member1_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member1_email_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member1_note']))
    {
        $this->nm_new_label['member1_note'] = "Note";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member1_note = $this->member1_note;
   $sStyleHidden_member1_note = '';
   if (isset($this->nmgp_cmp_hidden['member1_note']) && $this->nmgp_cmp_hidden['member1_note'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member1_note']);
       $sStyleHidden_member1_note = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member1_note = 'display: none;';
   $sStyleReadInp_member1_note = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member1_note']) && $this->nmgp_cmp_readonly['member1_note'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member1_note']);
       $sStyleReadLab_member1_note = '';
       $sStyleReadInp_member1_note = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member1_note']) && $this->nmgp_cmp_hidden['member1_note'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member1_note" value="<?php echo $this->form_encode_input($member1_note) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member1_note_line" id="hidden_field_data_member1_note" style="<?php echo $sStyleHidden_member1_note; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member1_note_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member1_note_label" style=""><span id="id_label_member1_note"><?php echo $this->nm_new_label['member1_note']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member1_note"]) &&  $this->nmgp_cmp_readonly["member1_note"] == "on") { 

 ?>
<input type="hidden" name="member1_note" value="<?php echo $this->form_encode_input($member1_note) . "\">" . $member1_note . ""; ?>
<?php } else { ?>
<span id="id_read_on_member1_note" class="sc-ui-readonly-member1_note css_member1_note_line" style="<?php echo $sStyleReadLab_member1_note; ?>"><?php echo $this->form_format_readonly("member1_note", $this->form_encode_input($this->member1_note)); ?></span><span id="id_read_off_member1_note" class="css_read_off_member1_note<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member1_note; ?>">
 <input class="sc-js-input scFormObjectOdd css_member1_note_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member1_note" type=text name="member1_note" value="<?php echo $this->form_encode_input($member1_note) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member1_note_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member1_note_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member2_name']))
    {
        $this->nm_new_label['member2_name'] = "Name";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member2_name = $this->member2_name;
   $sStyleHidden_member2_name = '';
   if (isset($this->nmgp_cmp_hidden['member2_name']) && $this->nmgp_cmp_hidden['member2_name'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member2_name']);
       $sStyleHidden_member2_name = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member2_name = 'display: none;';
   $sStyleReadInp_member2_name = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member2_name']) && $this->nmgp_cmp_readonly['member2_name'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member2_name']);
       $sStyleReadLab_member2_name = '';
       $sStyleReadInp_member2_name = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member2_name']) && $this->nmgp_cmp_hidden['member2_name'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member2_name" value="<?php echo $this->form_encode_input($member2_name) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member2_name_line" id="hidden_field_data_member2_name" style="<?php echo $sStyleHidden_member2_name; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member2_name_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member2_name_label" style=""><span id="id_label_member2_name"><?php echo $this->nm_new_label['member2_name']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member2_name"]) &&  $this->nmgp_cmp_readonly["member2_name"] == "on") { 

 ?>
<input type="hidden" name="member2_name" value="<?php echo $this->form_encode_input($member2_name) . "\">" . $member2_name . ""; ?>
<?php } else { ?>
<span id="id_read_on_member2_name" class="sc-ui-readonly-member2_name css_member2_name_line" style="<?php echo $sStyleReadLab_member2_name; ?>"><?php echo $this->form_format_readonly("member2_name", $this->form_encode_input($this->member2_name)); ?></span><span id="id_read_off_member2_name" class="css_read_off_member2_name<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member2_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_member2_name_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member2_name" type=text name="member2_name" value="<?php echo $this->form_encode_input($member2_name) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '(#02 - Firstname Lastname)', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member2_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member2_name_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member2_phone']))
    {
        $this->nm_new_label['member2_phone'] = "Phone";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member2_phone = $this->member2_phone;
   $sStyleHidden_member2_phone = '';
   if (isset($this->nmgp_cmp_hidden['member2_phone']) && $this->nmgp_cmp_hidden['member2_phone'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member2_phone']);
       $sStyleHidden_member2_phone = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member2_phone = 'display: none;';
   $sStyleReadInp_member2_phone = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member2_phone']) && $this->nmgp_cmp_readonly['member2_phone'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member2_phone']);
       $sStyleReadLab_member2_phone = '';
       $sStyleReadInp_member2_phone = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member2_phone']) && $this->nmgp_cmp_hidden['member2_phone'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member2_phone" value="<?php echo $this->form_encode_input($member2_phone) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member2_phone_line" id="hidden_field_data_member2_phone" style="<?php echo $sStyleHidden_member2_phone; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member2_phone_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member2_phone_label" style=""><span id="id_label_member2_phone"><?php echo $this->nm_new_label['member2_phone']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member2_phone"]) &&  $this->nmgp_cmp_readonly["member2_phone"] == "on") { 

 ?>
<input type="hidden" name="member2_phone" value="<?php echo $this->form_encode_input($member2_phone) . "\">" . $member2_phone . ""; ?>
<?php } else { ?>
<span id="id_read_on_member2_phone" class="sc-ui-readonly-member2_phone css_member2_phone_line" style="<?php echo $sStyleReadLab_member2_phone; ?>"><?php echo $this->form_format_readonly("member2_phone", $this->form_encode_input($this->member2_phone)); ?></span><span id="id_read_off_member2_phone" class="css_read_off_member2_phone<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member2_phone; ?>">
 <input class="sc-js-input scFormObjectOdd css_member2_phone_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member2_phone" type=text name="member2_phone" value="<?php echo $this->form_encode_input($member2_phone) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member2_phone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member2_phone_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member2_email']))
    {
        $this->nm_new_label['member2_email'] = "Email";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member2_email = $this->member2_email;
   $sStyleHidden_member2_email = '';
   if (isset($this->nmgp_cmp_hidden['member2_email']) && $this->nmgp_cmp_hidden['member2_email'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member2_email']);
       $sStyleHidden_member2_email = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member2_email = 'display: none;';
   $sStyleReadInp_member2_email = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member2_email']) && $this->nmgp_cmp_readonly['member2_email'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member2_email']);
       $sStyleReadLab_member2_email = '';
       $sStyleReadInp_member2_email = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member2_email']) && $this->nmgp_cmp_hidden['member2_email'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member2_email" value="<?php echo $this->form_encode_input($member2_email) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member2_email_line" id="hidden_field_data_member2_email" style="<?php echo $sStyleHidden_member2_email; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member2_email_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member2_email_label" style=""><span id="id_label_member2_email"><?php echo $this->nm_new_label['member2_email']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member2_email"]) &&  $this->nmgp_cmp_readonly["member2_email"] == "on") { 

 ?>
<input type="hidden" name="member2_email" value="<?php echo $this->form_encode_input($member2_email) . "\">" . $member2_email . ""; ?>
<?php } else { ?>
<span id="id_read_on_member2_email" class="sc-ui-readonly-member2_email css_member2_email_line" style="<?php echo $sStyleReadLab_member2_email; ?>"><?php echo $this->form_format_readonly("member2_email", $this->form_encode_input($this->member2_email)); ?></span><span id="id_read_off_member2_email" class="css_read_off_member2_email<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member2_email; ?>">
 <input class="sc-js-input scFormObjectOdd css_member2_email_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member2_email" type=text name="member2_email" value="<?php echo $this->form_encode_input($member2_email) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member2_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member2_email_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member2_note']))
    {
        $this->nm_new_label['member2_note'] = "Note";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member2_note = $this->member2_note;
   $sStyleHidden_member2_note = '';
   if (isset($this->nmgp_cmp_hidden['member2_note']) && $this->nmgp_cmp_hidden['member2_note'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member2_note']);
       $sStyleHidden_member2_note = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member2_note = 'display: none;';
   $sStyleReadInp_member2_note = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member2_note']) && $this->nmgp_cmp_readonly['member2_note'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member2_note']);
       $sStyleReadLab_member2_note = '';
       $sStyleReadInp_member2_note = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member2_note']) && $this->nmgp_cmp_hidden['member2_note'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member2_note" value="<?php echo $this->form_encode_input($member2_note) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member2_note_line" id="hidden_field_data_member2_note" style="<?php echo $sStyleHidden_member2_note; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member2_note_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member2_note_label" style=""><span id="id_label_member2_note"><?php echo $this->nm_new_label['member2_note']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member2_note"]) &&  $this->nmgp_cmp_readonly["member2_note"] == "on") { 

 ?>
<input type="hidden" name="member2_note" value="<?php echo $this->form_encode_input($member2_note) . "\">" . $member2_note . ""; ?>
<?php } else { ?>
<span id="id_read_on_member2_note" class="sc-ui-readonly-member2_note css_member2_note_line" style="<?php echo $sStyleReadLab_member2_note; ?>"><?php echo $this->form_format_readonly("member2_note", $this->form_encode_input($this->member2_note)); ?></span><span id="id_read_off_member2_note" class="css_read_off_member2_note<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member2_note; ?>">
 <input class="sc-js-input scFormObjectOdd css_member2_note_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member2_note" type=text name="member2_note" value="<?php echo $this->form_encode_input($member2_note) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member2_note_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member2_note_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member3_name']))
    {
        $this->nm_new_label['member3_name'] = "Name";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member3_name = $this->member3_name;
   $sStyleHidden_member3_name = '';
   if (isset($this->nmgp_cmp_hidden['member3_name']) && $this->nmgp_cmp_hidden['member3_name'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member3_name']);
       $sStyleHidden_member3_name = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member3_name = 'display: none;';
   $sStyleReadInp_member3_name = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member3_name']) && $this->nmgp_cmp_readonly['member3_name'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member3_name']);
       $sStyleReadLab_member3_name = '';
       $sStyleReadInp_member3_name = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member3_name']) && $this->nmgp_cmp_hidden['member3_name'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member3_name" value="<?php echo $this->form_encode_input($member3_name) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member3_name_line" id="hidden_field_data_member3_name" style="<?php echo $sStyleHidden_member3_name; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member3_name_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member3_name_label" style=""><span id="id_label_member3_name"><?php echo $this->nm_new_label['member3_name']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member3_name"]) &&  $this->nmgp_cmp_readonly["member3_name"] == "on") { 

 ?>
<input type="hidden" name="member3_name" value="<?php echo $this->form_encode_input($member3_name) . "\">" . $member3_name . ""; ?>
<?php } else { ?>
<span id="id_read_on_member3_name" class="sc-ui-readonly-member3_name css_member3_name_line" style="<?php echo $sStyleReadLab_member3_name; ?>"><?php echo $this->form_format_readonly("member3_name", $this->form_encode_input($this->member3_name)); ?></span><span id="id_read_off_member3_name" class="css_read_off_member3_name<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member3_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_member3_name_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member3_name" type=text name="member3_name" value="<?php echo $this->form_encode_input($member3_name) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '(#03 - Firstname Lastname)', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member3_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member3_name_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member3_phone']))
    {
        $this->nm_new_label['member3_phone'] = "Phone";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member3_phone = $this->member3_phone;
   $sStyleHidden_member3_phone = '';
   if (isset($this->nmgp_cmp_hidden['member3_phone']) && $this->nmgp_cmp_hidden['member3_phone'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member3_phone']);
       $sStyleHidden_member3_phone = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member3_phone = 'display: none;';
   $sStyleReadInp_member3_phone = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member3_phone']) && $this->nmgp_cmp_readonly['member3_phone'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member3_phone']);
       $sStyleReadLab_member3_phone = '';
       $sStyleReadInp_member3_phone = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member3_phone']) && $this->nmgp_cmp_hidden['member3_phone'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member3_phone" value="<?php echo $this->form_encode_input($member3_phone) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member3_phone_line" id="hidden_field_data_member3_phone" style="<?php echo $sStyleHidden_member3_phone; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member3_phone_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member3_phone_label" style=""><span id="id_label_member3_phone"><?php echo $this->nm_new_label['member3_phone']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member3_phone"]) &&  $this->nmgp_cmp_readonly["member3_phone"] == "on") { 

 ?>
<input type="hidden" name="member3_phone" value="<?php echo $this->form_encode_input($member3_phone) . "\">" . $member3_phone . ""; ?>
<?php } else { ?>
<span id="id_read_on_member3_phone" class="sc-ui-readonly-member3_phone css_member3_phone_line" style="<?php echo $sStyleReadLab_member3_phone; ?>"><?php echo $this->form_format_readonly("member3_phone", $this->form_encode_input($this->member3_phone)); ?></span><span id="id_read_off_member3_phone" class="css_read_off_member3_phone<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member3_phone; ?>">
 <input class="sc-js-input scFormObjectOdd css_member3_phone_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member3_phone" type=text name="member3_phone" value="<?php echo $this->form_encode_input($member3_phone) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member3_phone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member3_phone_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member3_email']))
    {
        $this->nm_new_label['member3_email'] = "Email";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member3_email = $this->member3_email;
   $sStyleHidden_member3_email = '';
   if (isset($this->nmgp_cmp_hidden['member3_email']) && $this->nmgp_cmp_hidden['member3_email'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member3_email']);
       $sStyleHidden_member3_email = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member3_email = 'display: none;';
   $sStyleReadInp_member3_email = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member3_email']) && $this->nmgp_cmp_readonly['member3_email'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member3_email']);
       $sStyleReadLab_member3_email = '';
       $sStyleReadInp_member3_email = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member3_email']) && $this->nmgp_cmp_hidden['member3_email'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member3_email" value="<?php echo $this->form_encode_input($member3_email) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member3_email_line" id="hidden_field_data_member3_email" style="<?php echo $sStyleHidden_member3_email; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member3_email_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member3_email_label" style=""><span id="id_label_member3_email"><?php echo $this->nm_new_label['member3_email']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member3_email"]) &&  $this->nmgp_cmp_readonly["member3_email"] == "on") { 

 ?>
<input type="hidden" name="member3_email" value="<?php echo $this->form_encode_input($member3_email) . "\">" . $member3_email . ""; ?>
<?php } else { ?>
<span id="id_read_on_member3_email" class="sc-ui-readonly-member3_email css_member3_email_line" style="<?php echo $sStyleReadLab_member3_email; ?>"><?php echo $this->form_format_readonly("member3_email", $this->form_encode_input($this->member3_email)); ?></span><span id="id_read_off_member3_email" class="css_read_off_member3_email<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member3_email; ?>">
 <input class="sc-js-input scFormObjectOdd css_member3_email_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member3_email" type=text name="member3_email" value="<?php echo $this->form_encode_input($member3_email) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member3_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member3_email_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member3_note']))
    {
        $this->nm_new_label['member3_note'] = "Member 3 Note";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member3_note = $this->member3_note;
   $sStyleHidden_member3_note = '';
   if (isset($this->nmgp_cmp_hidden['member3_note']) && $this->nmgp_cmp_hidden['member3_note'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member3_note']);
       $sStyleHidden_member3_note = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member3_note = 'display: none;';
   $sStyleReadInp_member3_note = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member3_note']) && $this->nmgp_cmp_readonly['member3_note'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member3_note']);
       $sStyleReadLab_member3_note = '';
       $sStyleReadInp_member3_note = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member3_note']) && $this->nmgp_cmp_hidden['member3_note'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member3_note" value="<?php echo $this->form_encode_input($member3_note) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member3_note_line" id="hidden_field_data_member3_note" style="<?php echo $sStyleHidden_member3_note; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member3_note_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member3_note_label" style=""><span id="id_label_member3_note"><?php echo $this->nm_new_label['member3_note']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member3_note"]) &&  $this->nmgp_cmp_readonly["member3_note"] == "on") { 

 ?>
<input type="hidden" name="member3_note" value="<?php echo $this->form_encode_input($member3_note) . "\">" . $member3_note . ""; ?>
<?php } else { ?>
<span id="id_read_on_member3_note" class="sc-ui-readonly-member3_note css_member3_note_line" style="<?php echo $sStyleReadLab_member3_note; ?>"><?php echo $this->form_format_readonly("member3_note", $this->form_encode_input($this->member3_note)); ?></span><span id="id_read_off_member3_note" class="css_read_off_member3_note<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member3_note; ?>">
 <input class="sc-js-input scFormObjectOdd css_member3_note_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member3_note" type=text name="member3_note" value="<?php echo $this->form_encode_input($member3_note) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member3_note_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member3_note_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['applicant_name']))
    {
        $this->nm_new_label['applicant_name'] = "Applicant Name";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $applicant_name = $this->applicant_name;
   $sStyleHidden_applicant_name = '';
   if (isset($this->nmgp_cmp_hidden['applicant_name']) && $this->nmgp_cmp_hidden['applicant_name'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['applicant_name']);
       $sStyleHidden_applicant_name = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_applicant_name = 'display: none;';
   $sStyleReadInp_applicant_name = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['applicant_name']) && $this->nmgp_cmp_readonly['applicant_name'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['applicant_name']);
       $sStyleReadLab_applicant_name = '';
       $sStyleReadInp_applicant_name = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['applicant_name']) && $this->nmgp_cmp_hidden['applicant_name'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="applicant_name" value="<?php echo $this->form_encode_input($applicant_name) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_applicant_name_line" id="hidden_field_data_applicant_name" style="<?php echo $sStyleHidden_applicant_name; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_applicant_name_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_applicant_name_label" style=""><span id="id_label_applicant_name"><?php echo $this->nm_new_label['applicant_name']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['applicant_name']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['applicant_name'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["applicant_name"]) &&  $this->nmgp_cmp_readonly["applicant_name"] == "on") { 

 ?>
<input type="hidden" name="applicant_name" value="<?php echo $this->form_encode_input($applicant_name) . "\">" . $applicant_name . ""; ?>
<?php } else { ?>
<span id="id_read_on_applicant_name" class="sc-ui-readonly-applicant_name css_applicant_name_line" style="<?php echo $sStyleReadLab_applicant_name; ?>"><?php echo $this->form_format_readonly("applicant_name", $this->form_encode_input($this->applicant_name)); ?></span><span id="id_read_off_applicant_name" class="css_read_off_applicant_name<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_applicant_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_applicant_name_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_applicant_name" type=text name="applicant_name" value="<?php echo $this->form_encode_input($applicant_name) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_applicant_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_applicant_name_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['applicant_signature']))
    {
        $this->nm_new_label['applicant_signature'] = "Applicant Signature";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $applicant_signature = $this->applicant_signature;
   $sStyleHidden_applicant_signature = '';
   if (isset($this->nmgp_cmp_hidden['applicant_signature']) && $this->nmgp_cmp_hidden['applicant_signature'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['applicant_signature']);
       $sStyleHidden_applicant_signature = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_applicant_signature = 'display: none;';
   $sStyleReadInp_applicant_signature = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['applicant_signature']) && $this->nmgp_cmp_readonly['applicant_signature'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['applicant_signature']);
       $sStyleReadLab_applicant_signature = '';
       $sStyleReadInp_applicant_signature = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['applicant_signature']) && $this->nmgp_cmp_hidden['applicant_signature'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="applicant_signature" value="<?php echo $this->form_encode_input($applicant_signature) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_applicant_signature_line" id="hidden_field_data_applicant_signature" style="<?php echo $sStyleHidden_applicant_signature; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_applicant_signature_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_applicant_signature_label" style=""><span id="id_label_applicant_signature"><?php echo $this->nm_new_label['applicant_signature']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['applicant_signature']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['applicant_signature'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></span><br><span id="id_read_on_applicant_signature" style="<?php echo $sStyleReadLab_applicant_signature; ?>"><div id="sc-id-ronly-applicant_signature" style="width: 500px; height: 150px; background-color: #F8F9FA"><img style="border-width: 0" /></div>
</span><span id="id_read_off_applicant_signature" class="css_read_off_applicant_signature" style="<?php echo $sStyleReadInp_applicant_signature; ?>"><input type="hidden" name="applicant_signature" id="id_sc_field_applicant_signature" value="<?php echo $this->applicant_signature ?>" />
<div class="sc-ui-sign" id="sc-id-sign-applicant_signature" style="width: 500px; height: 150px; background-color: #F8F9FA"></div>
<div id="sc-id-disabled-applicant_signature" style="display: none; width: 500px; height: 150px; background-color: #F8F9FA"><img style="border-width: 0" /></div>
<br />
<?php echo nmButtonOutput($this->arr_buttons, "bclear", "scJQSignatureClear('applicant_signature')", "scJQSignatureClear('applicant_signature')", "btn_sign_clear_applicant_signature", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>

</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_applicant_signature_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_applicant_signature_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['applicant_title']))
    {
        $this->nm_new_label['applicant_title'] = "Applicant Title";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $applicant_title = $this->applicant_title;
   $sStyleHidden_applicant_title = '';
   if (isset($this->nmgp_cmp_hidden['applicant_title']) && $this->nmgp_cmp_hidden['applicant_title'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['applicant_title']);
       $sStyleHidden_applicant_title = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_applicant_title = 'display: none;';
   $sStyleReadInp_applicant_title = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['applicant_title']) && $this->nmgp_cmp_readonly['applicant_title'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['applicant_title']);
       $sStyleReadLab_applicant_title = '';
       $sStyleReadInp_applicant_title = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['applicant_title']) && $this->nmgp_cmp_hidden['applicant_title'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="applicant_title" value="<?php echo $this->form_encode_input($applicant_title) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_applicant_title_line" id="hidden_field_data_applicant_title" style="<?php echo $sStyleHidden_applicant_title; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_applicant_title_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_applicant_title_label" style=""><span id="id_label_applicant_title"><?php echo $this->nm_new_label['applicant_title']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["applicant_title"]) &&  $this->nmgp_cmp_readonly["applicant_title"] == "on") { 

 ?>
<input type="hidden" name="applicant_title" value="<?php echo $this->form_encode_input($applicant_title) . "\">" . $applicant_title . ""; ?>
<?php } else { ?>
<span id="id_read_on_applicant_title" class="sc-ui-readonly-applicant_title css_applicant_title_line" style="<?php echo $sStyleReadLab_applicant_title; ?>"><?php echo $this->form_format_readonly("applicant_title", $this->form_encode_input($this->applicant_title)); ?></span><span id="id_read_off_applicant_title" class="css_read_off_applicant_title<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_applicant_title; ?>">
 <input class="sc-js-input scFormObjectOdd css_applicant_title_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_applicant_title" type=text name="applicant_title" value="<?php echo $this->form_encode_input($applicant_title) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_applicant_title_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_applicant_title_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member4_name']))
    {
        $this->nm_new_label['member4_name'] = "Member 4 Name";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member4_name = $this->member4_name;
   $sStyleHidden_member4_name = '';
   if (isset($this->nmgp_cmp_hidden['member4_name']) && $this->nmgp_cmp_hidden['member4_name'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member4_name']);
       $sStyleHidden_member4_name = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member4_name = 'display: none;';
   $sStyleReadInp_member4_name = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member4_name']) && $this->nmgp_cmp_readonly['member4_name'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member4_name']);
       $sStyleReadLab_member4_name = '';
       $sStyleReadInp_member4_name = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member4_name']) && $this->nmgp_cmp_hidden['member4_name'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member4_name" value="<?php echo $this->form_encode_input($member4_name) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member4_name_line" id="hidden_field_data_member4_name" style="<?php echo $sStyleHidden_member4_name; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member4_name_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member4_name_label" style=""><span id="id_label_member4_name"><?php echo $this->nm_new_label['member4_name']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member4_name"]) &&  $this->nmgp_cmp_readonly["member4_name"] == "on") { 

 ?>
<input type="hidden" name="member4_name" value="<?php echo $this->form_encode_input($member4_name) . "\">" . $member4_name . ""; ?>
<?php } else { ?>
<span id="id_read_on_member4_name" class="sc-ui-readonly-member4_name css_member4_name_line" style="<?php echo $sStyleReadLab_member4_name; ?>"><?php echo $this->form_format_readonly("member4_name", $this->form_encode_input($this->member4_name)); ?></span><span id="id_read_off_member4_name" class="css_read_off_member4_name<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member4_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_member4_name_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member4_name" type=text name="member4_name" value="<?php echo $this->form_encode_input($member4_name) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '(#04 - Firstname Lastname)', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member4_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member4_name_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member4_phone']))
    {
        $this->nm_new_label['member4_phone'] = "Member 4 Phone";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member4_phone = $this->member4_phone;
   $sStyleHidden_member4_phone = '';
   if (isset($this->nmgp_cmp_hidden['member4_phone']) && $this->nmgp_cmp_hidden['member4_phone'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member4_phone']);
       $sStyleHidden_member4_phone = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member4_phone = 'display: none;';
   $sStyleReadInp_member4_phone = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member4_phone']) && $this->nmgp_cmp_readonly['member4_phone'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member4_phone']);
       $sStyleReadLab_member4_phone = '';
       $sStyleReadInp_member4_phone = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member4_phone']) && $this->nmgp_cmp_hidden['member4_phone'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member4_phone" value="<?php echo $this->form_encode_input($member4_phone) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member4_phone_line" id="hidden_field_data_member4_phone" style="<?php echo $sStyleHidden_member4_phone; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member4_phone_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member4_phone_label" style=""><span id="id_label_member4_phone"><?php echo $this->nm_new_label['member4_phone']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member4_phone"]) &&  $this->nmgp_cmp_readonly["member4_phone"] == "on") { 

 ?>
<input type="hidden" name="member4_phone" value="<?php echo $this->form_encode_input($member4_phone) . "\">" . $member4_phone . ""; ?>
<?php } else { ?>
<span id="id_read_on_member4_phone" class="sc-ui-readonly-member4_phone css_member4_phone_line" style="<?php echo $sStyleReadLab_member4_phone; ?>"><?php echo $this->form_format_readonly("member4_phone", $this->form_encode_input($this->member4_phone)); ?></span><span id="id_read_off_member4_phone" class="css_read_off_member4_phone<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member4_phone; ?>">
 <input class="sc-js-input scFormObjectOdd css_member4_phone_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member4_phone" type=text name="member4_phone" value="<?php echo $this->form_encode_input($member4_phone) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member4_phone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member4_phone_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member4_email']))
    {
        $this->nm_new_label['member4_email'] = "Member 4 Email";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member4_email = $this->member4_email;
   $sStyleHidden_member4_email = '';
   if (isset($this->nmgp_cmp_hidden['member4_email']) && $this->nmgp_cmp_hidden['member4_email'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member4_email']);
       $sStyleHidden_member4_email = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member4_email = 'display: none;';
   $sStyleReadInp_member4_email = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member4_email']) && $this->nmgp_cmp_readonly['member4_email'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member4_email']);
       $sStyleReadLab_member4_email = '';
       $sStyleReadInp_member4_email = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member4_email']) && $this->nmgp_cmp_hidden['member4_email'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member4_email" value="<?php echo $this->form_encode_input($member4_email) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member4_email_line" id="hidden_field_data_member4_email" style="<?php echo $sStyleHidden_member4_email; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member4_email_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member4_email_label" style=""><span id="id_label_member4_email"><?php echo $this->nm_new_label['member4_email']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member4_email"]) &&  $this->nmgp_cmp_readonly["member4_email"] == "on") { 

 ?>
<input type="hidden" name="member4_email" value="<?php echo $this->form_encode_input($member4_email) . "\">" . $member4_email . ""; ?>
<?php } else { ?>
<span id="id_read_on_member4_email" class="sc-ui-readonly-member4_email css_member4_email_line" style="<?php echo $sStyleReadLab_member4_email; ?>"><?php echo $this->form_format_readonly("member4_email", $this->form_encode_input($this->member4_email)); ?></span><span id="id_read_off_member4_email" class="css_read_off_member4_email<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member4_email; ?>">
 <input class="sc-js-input scFormObjectOdd css_member4_email_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member4_email" type=text name="member4_email" value="<?php echo $this->form_encode_input($member4_email) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member4_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member4_email_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member4_note']))
    {
        $this->nm_new_label['member4_note'] = "Member 4 Note";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member4_note = $this->member4_note;
   $sStyleHidden_member4_note = '';
   if (isset($this->nmgp_cmp_hidden['member4_note']) && $this->nmgp_cmp_hidden['member4_note'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member4_note']);
       $sStyleHidden_member4_note = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member4_note = 'display: none;';
   $sStyleReadInp_member4_note = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member4_note']) && $this->nmgp_cmp_readonly['member4_note'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member4_note']);
       $sStyleReadLab_member4_note = '';
       $sStyleReadInp_member4_note = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member4_note']) && $this->nmgp_cmp_hidden['member4_note'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member4_note" value="<?php echo $this->form_encode_input($member4_note) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member4_note_line" id="hidden_field_data_member4_note" style="<?php echo $sStyleHidden_member4_note; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member4_note_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member4_note_label" style=""><span id="id_label_member4_note"><?php echo $this->nm_new_label['member4_note']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member4_note"]) &&  $this->nmgp_cmp_readonly["member4_note"] == "on") { 

 ?>
<input type="hidden" name="member4_note" value="<?php echo $this->form_encode_input($member4_note) . "\">" . $member4_note . ""; ?>
<?php } else { ?>
<span id="id_read_on_member4_note" class="sc-ui-readonly-member4_note css_member4_note_line" style="<?php echo $sStyleReadLab_member4_note; ?>"><?php echo $this->form_format_readonly("member4_note", $this->form_encode_input($this->member4_note)); ?></span><span id="id_read_off_member4_note" class="css_read_off_member4_note<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member4_note; ?>">
 <input class="sc-js-input scFormObjectOdd css_member4_note_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member4_note" type=text name="member4_note" value="<?php echo $this->form_encode_input($member4_note) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member4_note_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member4_note_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member5_name']))
    {
        $this->nm_new_label['member5_name'] = "Member 5 Name";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member5_name = $this->member5_name;
   $sStyleHidden_member5_name = '';
   if (isset($this->nmgp_cmp_hidden['member5_name']) && $this->nmgp_cmp_hidden['member5_name'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member5_name']);
       $sStyleHidden_member5_name = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member5_name = 'display: none;';
   $sStyleReadInp_member5_name = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member5_name']) && $this->nmgp_cmp_readonly['member5_name'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member5_name']);
       $sStyleReadLab_member5_name = '';
       $sStyleReadInp_member5_name = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member5_name']) && $this->nmgp_cmp_hidden['member5_name'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member5_name" value="<?php echo $this->form_encode_input($member5_name) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member5_name_line" id="hidden_field_data_member5_name" style="<?php echo $sStyleHidden_member5_name; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member5_name_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member5_name_label" style=""><span id="id_label_member5_name"><?php echo $this->nm_new_label['member5_name']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member5_name"]) &&  $this->nmgp_cmp_readonly["member5_name"] == "on") { 

 ?>
<input type="hidden" name="member5_name" value="<?php echo $this->form_encode_input($member5_name) . "\">" . $member5_name . ""; ?>
<?php } else { ?>
<span id="id_read_on_member5_name" class="sc-ui-readonly-member5_name css_member5_name_line" style="<?php echo $sStyleReadLab_member5_name; ?>"><?php echo $this->form_format_readonly("member5_name", $this->form_encode_input($this->member5_name)); ?></span><span id="id_read_off_member5_name" class="css_read_off_member5_name<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member5_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_member5_name_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member5_name" type=text name="member5_name" value="<?php echo $this->form_encode_input($member5_name) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '(#05 - Firstname Lastname)', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member5_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member5_name_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member5_phone']))
    {
        $this->nm_new_label['member5_phone'] = "Member 5 Phone";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member5_phone = $this->member5_phone;
   $sStyleHidden_member5_phone = '';
   if (isset($this->nmgp_cmp_hidden['member5_phone']) && $this->nmgp_cmp_hidden['member5_phone'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member5_phone']);
       $sStyleHidden_member5_phone = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member5_phone = 'display: none;';
   $sStyleReadInp_member5_phone = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member5_phone']) && $this->nmgp_cmp_readonly['member5_phone'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member5_phone']);
       $sStyleReadLab_member5_phone = '';
       $sStyleReadInp_member5_phone = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member5_phone']) && $this->nmgp_cmp_hidden['member5_phone'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member5_phone" value="<?php echo $this->form_encode_input($member5_phone) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member5_phone_line" id="hidden_field_data_member5_phone" style="<?php echo $sStyleHidden_member5_phone; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member5_phone_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member5_phone_label" style=""><span id="id_label_member5_phone"><?php echo $this->nm_new_label['member5_phone']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member5_phone"]) &&  $this->nmgp_cmp_readonly["member5_phone"] == "on") { 

 ?>
<input type="hidden" name="member5_phone" value="<?php echo $this->form_encode_input($member5_phone) . "\">" . $member5_phone . ""; ?>
<?php } else { ?>
<span id="id_read_on_member5_phone" class="sc-ui-readonly-member5_phone css_member5_phone_line" style="<?php echo $sStyleReadLab_member5_phone; ?>"><?php echo $this->form_format_readonly("member5_phone", $this->form_encode_input($this->member5_phone)); ?></span><span id="id_read_off_member5_phone" class="css_read_off_member5_phone<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member5_phone; ?>">
 <input class="sc-js-input scFormObjectOdd css_member5_phone_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member5_phone" type=text name="member5_phone" value="<?php echo $this->form_encode_input($member5_phone) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member5_phone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member5_phone_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member5_email']))
    {
        $this->nm_new_label['member5_email'] = "Member 5 Email";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member5_email = $this->member5_email;
   $sStyleHidden_member5_email = '';
   if (isset($this->nmgp_cmp_hidden['member5_email']) && $this->nmgp_cmp_hidden['member5_email'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member5_email']);
       $sStyleHidden_member5_email = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member5_email = 'display: none;';
   $sStyleReadInp_member5_email = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member5_email']) && $this->nmgp_cmp_readonly['member5_email'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member5_email']);
       $sStyleReadLab_member5_email = '';
       $sStyleReadInp_member5_email = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member5_email']) && $this->nmgp_cmp_hidden['member5_email'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member5_email" value="<?php echo $this->form_encode_input($member5_email) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member5_email_line" id="hidden_field_data_member5_email" style="<?php echo $sStyleHidden_member5_email; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member5_email_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member5_email_label" style=""><span id="id_label_member5_email"><?php echo $this->nm_new_label['member5_email']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member5_email"]) &&  $this->nmgp_cmp_readonly["member5_email"] == "on") { 

 ?>
<input type="hidden" name="member5_email" value="<?php echo $this->form_encode_input($member5_email) . "\">" . $member5_email . ""; ?>
<?php } else { ?>
<span id="id_read_on_member5_email" class="sc-ui-readonly-member5_email css_member5_email_line" style="<?php echo $sStyleReadLab_member5_email; ?>"><?php echo $this->form_format_readonly("member5_email", $this->form_encode_input($this->member5_email)); ?></span><span id="id_read_off_member5_email" class="css_read_off_member5_email<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member5_email; ?>">
 <input class="sc-js-input scFormObjectOdd css_member5_email_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member5_email" type=text name="member5_email" value="<?php echo $this->form_encode_input($member5_email) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member5_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member5_email_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member5_note']))
    {
        $this->nm_new_label['member5_note'] = "Member 5 Note";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member5_note = $this->member5_note;
   $sStyleHidden_member5_note = '';
   if (isset($this->nmgp_cmp_hidden['member5_note']) && $this->nmgp_cmp_hidden['member5_note'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member5_note']);
       $sStyleHidden_member5_note = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member5_note = 'display: none;';
   $sStyleReadInp_member5_note = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member5_note']) && $this->nmgp_cmp_readonly['member5_note'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member5_note']);
       $sStyleReadLab_member5_note = '';
       $sStyleReadInp_member5_note = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member5_note']) && $this->nmgp_cmp_hidden['member5_note'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member5_note" value="<?php echo $this->form_encode_input($member5_note) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member5_note_line" id="hidden_field_data_member5_note" style="<?php echo $sStyleHidden_member5_note; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member5_note_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member5_note_label" style=""><span id="id_label_member5_note"><?php echo $this->nm_new_label['member5_note']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member5_note"]) &&  $this->nmgp_cmp_readonly["member5_note"] == "on") { 

 ?>
<input type="hidden" name="member5_note" value="<?php echo $this->form_encode_input($member5_note) . "\">" . $member5_note . ""; ?>
<?php } else { ?>
<span id="id_read_on_member5_note" class="sc-ui-readonly-member5_note css_member5_note_line" style="<?php echo $sStyleReadLab_member5_note; ?>"><?php echo $this->form_format_readonly("member5_note", $this->form_encode_input($this->member5_note)); ?></span><span id="id_read_off_member5_note" class="css_read_off_member5_note<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member5_note; ?>">
 <input class="sc-js-input scFormObjectOdd css_member5_note_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member5_note" type=text name="member5_note" value="<?php echo $this->form_encode_input($member5_note) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member5_note_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member5_note_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member6_name']))
    {
        $this->nm_new_label['member6_name'] = "Member 6 Name";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member6_name = $this->member6_name;
   $sStyleHidden_member6_name = '';
   if (isset($this->nmgp_cmp_hidden['member6_name']) && $this->nmgp_cmp_hidden['member6_name'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member6_name']);
       $sStyleHidden_member6_name = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member6_name = 'display: none;';
   $sStyleReadInp_member6_name = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member6_name']) && $this->nmgp_cmp_readonly['member6_name'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member6_name']);
       $sStyleReadLab_member6_name = '';
       $sStyleReadInp_member6_name = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member6_name']) && $this->nmgp_cmp_hidden['member6_name'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member6_name" value="<?php echo $this->form_encode_input($member6_name) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member6_name_line" id="hidden_field_data_member6_name" style="<?php echo $sStyleHidden_member6_name; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member6_name_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member6_name_label" style=""><span id="id_label_member6_name"><?php echo $this->nm_new_label['member6_name']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member6_name"]) &&  $this->nmgp_cmp_readonly["member6_name"] == "on") { 

 ?>
<input type="hidden" name="member6_name" value="<?php echo $this->form_encode_input($member6_name) . "\">" . $member6_name . ""; ?>
<?php } else { ?>
<span id="id_read_on_member6_name" class="sc-ui-readonly-member6_name css_member6_name_line" style="<?php echo $sStyleReadLab_member6_name; ?>"><?php echo $this->form_format_readonly("member6_name", $this->form_encode_input($this->member6_name)); ?></span><span id="id_read_off_member6_name" class="css_read_off_member6_name<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member6_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_member6_name_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member6_name" type=text name="member6_name" value="<?php echo $this->form_encode_input($member6_name) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '(#06 - Firstname Lastname)', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member6_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member6_name_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member6_phone']))
    {
        $this->nm_new_label['member6_phone'] = "Member 6 Phone";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member6_phone = $this->member6_phone;
   $sStyleHidden_member6_phone = '';
   if (isset($this->nmgp_cmp_hidden['member6_phone']) && $this->nmgp_cmp_hidden['member6_phone'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member6_phone']);
       $sStyleHidden_member6_phone = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member6_phone = 'display: none;';
   $sStyleReadInp_member6_phone = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member6_phone']) && $this->nmgp_cmp_readonly['member6_phone'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member6_phone']);
       $sStyleReadLab_member6_phone = '';
       $sStyleReadInp_member6_phone = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member6_phone']) && $this->nmgp_cmp_hidden['member6_phone'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member6_phone" value="<?php echo $this->form_encode_input($member6_phone) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member6_phone_line" id="hidden_field_data_member6_phone" style="<?php echo $sStyleHidden_member6_phone; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member6_phone_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member6_phone_label" style=""><span id="id_label_member6_phone"><?php echo $this->nm_new_label['member6_phone']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member6_phone"]) &&  $this->nmgp_cmp_readonly["member6_phone"] == "on") { 

 ?>
<input type="hidden" name="member6_phone" value="<?php echo $this->form_encode_input($member6_phone) . "\">" . $member6_phone . ""; ?>
<?php } else { ?>
<span id="id_read_on_member6_phone" class="sc-ui-readonly-member6_phone css_member6_phone_line" style="<?php echo $sStyleReadLab_member6_phone; ?>"><?php echo $this->form_format_readonly("member6_phone", $this->form_encode_input($this->member6_phone)); ?></span><span id="id_read_off_member6_phone" class="css_read_off_member6_phone<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member6_phone; ?>">
 <input class="sc-js-input scFormObjectOdd css_member6_phone_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member6_phone" type=text name="member6_phone" value="<?php echo $this->form_encode_input($member6_phone) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member6_phone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member6_phone_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member6_email']))
    {
        $this->nm_new_label['member6_email'] = "Member 6 Email";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member6_email = $this->member6_email;
   $sStyleHidden_member6_email = '';
   if (isset($this->nmgp_cmp_hidden['member6_email']) && $this->nmgp_cmp_hidden['member6_email'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member6_email']);
       $sStyleHidden_member6_email = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member6_email = 'display: none;';
   $sStyleReadInp_member6_email = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member6_email']) && $this->nmgp_cmp_readonly['member6_email'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member6_email']);
       $sStyleReadLab_member6_email = '';
       $sStyleReadInp_member6_email = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member6_email']) && $this->nmgp_cmp_hidden['member6_email'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member6_email" value="<?php echo $this->form_encode_input($member6_email) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member6_email_line" id="hidden_field_data_member6_email" style="<?php echo $sStyleHidden_member6_email; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member6_email_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member6_email_label" style=""><span id="id_label_member6_email"><?php echo $this->nm_new_label['member6_email']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member6_email"]) &&  $this->nmgp_cmp_readonly["member6_email"] == "on") { 

 ?>
<input type="hidden" name="member6_email" value="<?php echo $this->form_encode_input($member6_email) . "\">" . $member6_email . ""; ?>
<?php } else { ?>
<span id="id_read_on_member6_email" class="sc-ui-readonly-member6_email css_member6_email_line" style="<?php echo $sStyleReadLab_member6_email; ?>"><?php echo $this->form_format_readonly("member6_email", $this->form_encode_input($this->member6_email)); ?></span><span id="id_read_off_member6_email" class="css_read_off_member6_email<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member6_email; ?>">
 <input class="sc-js-input scFormObjectOdd css_member6_email_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member6_email" type=text name="member6_email" value="<?php echo $this->form_encode_input($member6_email) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member6_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member6_email_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member6_note']))
    {
        $this->nm_new_label['member6_note'] = "Member 6 Note";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member6_note = $this->member6_note;
   $sStyleHidden_member6_note = '';
   if (isset($this->nmgp_cmp_hidden['member6_note']) && $this->nmgp_cmp_hidden['member6_note'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member6_note']);
       $sStyleHidden_member6_note = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member6_note = 'display: none;';
   $sStyleReadInp_member6_note = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member6_note']) && $this->nmgp_cmp_readonly['member6_note'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member6_note']);
       $sStyleReadLab_member6_note = '';
       $sStyleReadInp_member6_note = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member6_note']) && $this->nmgp_cmp_hidden['member6_note'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member6_note" value="<?php echo $this->form_encode_input($member6_note) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member6_note_line" id="hidden_field_data_member6_note" style="<?php echo $sStyleHidden_member6_note; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member6_note_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member6_note_label" style=""><span id="id_label_member6_note"><?php echo $this->nm_new_label['member6_note']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member6_note"]) &&  $this->nmgp_cmp_readonly["member6_note"] == "on") { 

 ?>
<input type="hidden" name="member6_note" value="<?php echo $this->form_encode_input($member6_note) . "\">" . $member6_note . ""; ?>
<?php } else { ?>
<span id="id_read_on_member6_note" class="sc-ui-readonly-member6_note css_member6_note_line" style="<?php echo $sStyleReadLab_member6_note; ?>"><?php echo $this->form_format_readonly("member6_note", $this->form_encode_input($this->member6_note)); ?></span><span id="id_read_off_member6_note" class="css_read_off_member6_note<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member6_note; ?>">
 <input class="sc-js-input scFormObjectOdd css_member6_note_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member6_note" type=text name="member6_note" value="<?php echo $this->form_encode_input($member6_note) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member6_note_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member6_note_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member7_name']))
    {
        $this->nm_new_label['member7_name'] = "Member 7 Name";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member7_name = $this->member7_name;
   $sStyleHidden_member7_name = '';
   if (isset($this->nmgp_cmp_hidden['member7_name']) && $this->nmgp_cmp_hidden['member7_name'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member7_name']);
       $sStyleHidden_member7_name = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member7_name = 'display: none;';
   $sStyleReadInp_member7_name = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member7_name']) && $this->nmgp_cmp_readonly['member7_name'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member7_name']);
       $sStyleReadLab_member7_name = '';
       $sStyleReadInp_member7_name = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member7_name']) && $this->nmgp_cmp_hidden['member7_name'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member7_name" value="<?php echo $this->form_encode_input($member7_name) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member7_name_line" id="hidden_field_data_member7_name" style="<?php echo $sStyleHidden_member7_name; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member7_name_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member7_name_label" style=""><span id="id_label_member7_name"><?php echo $this->nm_new_label['member7_name']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member7_name"]) &&  $this->nmgp_cmp_readonly["member7_name"] == "on") { 

 ?>
<input type="hidden" name="member7_name" value="<?php echo $this->form_encode_input($member7_name) . "\">" . $member7_name . ""; ?>
<?php } else { ?>
<span id="id_read_on_member7_name" class="sc-ui-readonly-member7_name css_member7_name_line" style="<?php echo $sStyleReadLab_member7_name; ?>"><?php echo $this->form_format_readonly("member7_name", $this->form_encode_input($this->member7_name)); ?></span><span id="id_read_off_member7_name" class="css_read_off_member7_name<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member7_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_member7_name_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member7_name" type=text name="member7_name" value="<?php echo $this->form_encode_input($member7_name) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '(#07 - Firstname Lastname)', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member7_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member7_name_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member7_phone']))
    {
        $this->nm_new_label['member7_phone'] = "Member 7 Phone";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member7_phone = $this->member7_phone;
   $sStyleHidden_member7_phone = '';
   if (isset($this->nmgp_cmp_hidden['member7_phone']) && $this->nmgp_cmp_hidden['member7_phone'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member7_phone']);
       $sStyleHidden_member7_phone = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member7_phone = 'display: none;';
   $sStyleReadInp_member7_phone = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member7_phone']) && $this->nmgp_cmp_readonly['member7_phone'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member7_phone']);
       $sStyleReadLab_member7_phone = '';
       $sStyleReadInp_member7_phone = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member7_phone']) && $this->nmgp_cmp_hidden['member7_phone'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member7_phone" value="<?php echo $this->form_encode_input($member7_phone) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member7_phone_line" id="hidden_field_data_member7_phone" style="<?php echo $sStyleHidden_member7_phone; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member7_phone_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member7_phone_label" style=""><span id="id_label_member7_phone"><?php echo $this->nm_new_label['member7_phone']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member7_phone"]) &&  $this->nmgp_cmp_readonly["member7_phone"] == "on") { 

 ?>
<input type="hidden" name="member7_phone" value="<?php echo $this->form_encode_input($member7_phone) . "\">" . $member7_phone . ""; ?>
<?php } else { ?>
<span id="id_read_on_member7_phone" class="sc-ui-readonly-member7_phone css_member7_phone_line" style="<?php echo $sStyleReadLab_member7_phone; ?>"><?php echo $this->form_format_readonly("member7_phone", $this->form_encode_input($this->member7_phone)); ?></span><span id="id_read_off_member7_phone" class="css_read_off_member7_phone<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member7_phone; ?>">
 <input class="sc-js-input scFormObjectOdd css_member7_phone_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member7_phone" type=text name="member7_phone" value="<?php echo $this->form_encode_input($member7_phone) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member7_phone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member7_phone_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member7_email']))
    {
        $this->nm_new_label['member7_email'] = "Member 7 Email";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member7_email = $this->member7_email;
   $sStyleHidden_member7_email = '';
   if (isset($this->nmgp_cmp_hidden['member7_email']) && $this->nmgp_cmp_hidden['member7_email'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member7_email']);
       $sStyleHidden_member7_email = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member7_email = 'display: none;';
   $sStyleReadInp_member7_email = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member7_email']) && $this->nmgp_cmp_readonly['member7_email'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member7_email']);
       $sStyleReadLab_member7_email = '';
       $sStyleReadInp_member7_email = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member7_email']) && $this->nmgp_cmp_hidden['member7_email'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member7_email" value="<?php echo $this->form_encode_input($member7_email) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member7_email_line" id="hidden_field_data_member7_email" style="<?php echo $sStyleHidden_member7_email; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member7_email_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member7_email_label" style=""><span id="id_label_member7_email"><?php echo $this->nm_new_label['member7_email']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member7_email"]) &&  $this->nmgp_cmp_readonly["member7_email"] == "on") { 

 ?>
<input type="hidden" name="member7_email" value="<?php echo $this->form_encode_input($member7_email) . "\">" . $member7_email . ""; ?>
<?php } else { ?>
<span id="id_read_on_member7_email" class="sc-ui-readonly-member7_email css_member7_email_line" style="<?php echo $sStyleReadLab_member7_email; ?>"><?php echo $this->form_format_readonly("member7_email", $this->form_encode_input($this->member7_email)); ?></span><span id="id_read_off_member7_email" class="css_read_off_member7_email<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member7_email; ?>">
 <input class="sc-js-input scFormObjectOdd css_member7_email_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member7_email" type=text name="member7_email" value="<?php echo $this->form_encode_input($member7_email) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member7_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member7_email_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member7_note']))
    {
        $this->nm_new_label['member7_note'] = "Member 7 Note";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member7_note = $this->member7_note;
   $sStyleHidden_member7_note = '';
   if (isset($this->nmgp_cmp_hidden['member7_note']) && $this->nmgp_cmp_hidden['member7_note'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member7_note']);
       $sStyleHidden_member7_note = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member7_note = 'display: none;';
   $sStyleReadInp_member7_note = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member7_note']) && $this->nmgp_cmp_readonly['member7_note'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member7_note']);
       $sStyleReadLab_member7_note = '';
       $sStyleReadInp_member7_note = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member7_note']) && $this->nmgp_cmp_hidden['member7_note'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member7_note" value="<?php echo $this->form_encode_input($member7_note) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member7_note_line" id="hidden_field_data_member7_note" style="<?php echo $sStyleHidden_member7_note; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member7_note_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member7_note_label" style=""><span id="id_label_member7_note"><?php echo $this->nm_new_label['member7_note']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member7_note"]) &&  $this->nmgp_cmp_readonly["member7_note"] == "on") { 

 ?>
<input type="hidden" name="member7_note" value="<?php echo $this->form_encode_input($member7_note) . "\">" . $member7_note . ""; ?>
<?php } else { ?>
<span id="id_read_on_member7_note" class="sc-ui-readonly-member7_note css_member7_note_line" style="<?php echo $sStyleReadLab_member7_note; ?>"><?php echo $this->form_format_readonly("member7_note", $this->form_encode_input($this->member7_note)); ?></span><span id="id_read_off_member7_note" class="css_read_off_member7_note<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member7_note; ?>">
 <input class="sc-js-input scFormObjectOdd css_member7_note_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member7_note" type=text name="member7_note" value="<?php echo $this->form_encode_input($member7_note) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member7_note_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member7_note_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member8_name']))
    {
        $this->nm_new_label['member8_name'] = "Member 8 Name";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member8_name = $this->member8_name;
   $sStyleHidden_member8_name = '';
   if (isset($this->nmgp_cmp_hidden['member8_name']) && $this->nmgp_cmp_hidden['member8_name'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member8_name']);
       $sStyleHidden_member8_name = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member8_name = 'display: none;';
   $sStyleReadInp_member8_name = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member8_name']) && $this->nmgp_cmp_readonly['member8_name'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member8_name']);
       $sStyleReadLab_member8_name = '';
       $sStyleReadInp_member8_name = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member8_name']) && $this->nmgp_cmp_hidden['member8_name'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member8_name" value="<?php echo $this->form_encode_input($member8_name) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member8_name_line" id="hidden_field_data_member8_name" style="<?php echo $sStyleHidden_member8_name; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member8_name_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member8_name_label" style=""><span id="id_label_member8_name"><?php echo $this->nm_new_label['member8_name']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member8_name"]) &&  $this->nmgp_cmp_readonly["member8_name"] == "on") { 

 ?>
<input type="hidden" name="member8_name" value="<?php echo $this->form_encode_input($member8_name) . "\">" . $member8_name . ""; ?>
<?php } else { ?>
<span id="id_read_on_member8_name" class="sc-ui-readonly-member8_name css_member8_name_line" style="<?php echo $sStyleReadLab_member8_name; ?>"><?php echo $this->form_format_readonly("member8_name", $this->form_encode_input($this->member8_name)); ?></span><span id="id_read_off_member8_name" class="css_read_off_member8_name<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member8_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_member8_name_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member8_name" type=text name="member8_name" value="<?php echo $this->form_encode_input($member8_name) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '(#08 - Firstname Lastname)', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member8_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member8_name_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member8_phone']))
    {
        $this->nm_new_label['member8_phone'] = "Member 8 Phone";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member8_phone = $this->member8_phone;
   $sStyleHidden_member8_phone = '';
   if (isset($this->nmgp_cmp_hidden['member8_phone']) && $this->nmgp_cmp_hidden['member8_phone'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member8_phone']);
       $sStyleHidden_member8_phone = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member8_phone = 'display: none;';
   $sStyleReadInp_member8_phone = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member8_phone']) && $this->nmgp_cmp_readonly['member8_phone'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member8_phone']);
       $sStyleReadLab_member8_phone = '';
       $sStyleReadInp_member8_phone = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member8_phone']) && $this->nmgp_cmp_hidden['member8_phone'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member8_phone" value="<?php echo $this->form_encode_input($member8_phone) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member8_phone_line" id="hidden_field_data_member8_phone" style="<?php echo $sStyleHidden_member8_phone; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member8_phone_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member8_phone_label" style=""><span id="id_label_member8_phone"><?php echo $this->nm_new_label['member8_phone']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member8_phone"]) &&  $this->nmgp_cmp_readonly["member8_phone"] == "on") { 

 ?>
<input type="hidden" name="member8_phone" value="<?php echo $this->form_encode_input($member8_phone) . "\">" . $member8_phone . ""; ?>
<?php } else { ?>
<span id="id_read_on_member8_phone" class="sc-ui-readonly-member8_phone css_member8_phone_line" style="<?php echo $sStyleReadLab_member8_phone; ?>"><?php echo $this->form_format_readonly("member8_phone", $this->form_encode_input($this->member8_phone)); ?></span><span id="id_read_off_member8_phone" class="css_read_off_member8_phone<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member8_phone; ?>">
 <input class="sc-js-input scFormObjectOdd css_member8_phone_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member8_phone" type=text name="member8_phone" value="<?php echo $this->form_encode_input($member8_phone) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member8_phone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member8_phone_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member8_email']))
    {
        $this->nm_new_label['member8_email'] = "Member 8 Email";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member8_email = $this->member8_email;
   $sStyleHidden_member8_email = '';
   if (isset($this->nmgp_cmp_hidden['member8_email']) && $this->nmgp_cmp_hidden['member8_email'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member8_email']);
       $sStyleHidden_member8_email = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member8_email = 'display: none;';
   $sStyleReadInp_member8_email = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member8_email']) && $this->nmgp_cmp_readonly['member8_email'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member8_email']);
       $sStyleReadLab_member8_email = '';
       $sStyleReadInp_member8_email = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member8_email']) && $this->nmgp_cmp_hidden['member8_email'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member8_email" value="<?php echo $this->form_encode_input($member8_email) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member8_email_line" id="hidden_field_data_member8_email" style="<?php echo $sStyleHidden_member8_email; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member8_email_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member8_email_label" style=""><span id="id_label_member8_email"><?php echo $this->nm_new_label['member8_email']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member8_email"]) &&  $this->nmgp_cmp_readonly["member8_email"] == "on") { 

 ?>
<input type="hidden" name="member8_email" value="<?php echo $this->form_encode_input($member8_email) . "\">" . $member8_email . ""; ?>
<?php } else { ?>
<span id="id_read_on_member8_email" class="sc-ui-readonly-member8_email css_member8_email_line" style="<?php echo $sStyleReadLab_member8_email; ?>"><?php echo $this->form_format_readonly("member8_email", $this->form_encode_input($this->member8_email)); ?></span><span id="id_read_off_member8_email" class="css_read_off_member8_email<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member8_email; ?>">
 <input class="sc-js-input scFormObjectOdd css_member8_email_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member8_email" type=text name="member8_email" value="<?php echo $this->form_encode_input($member8_email) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member8_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member8_email_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member8_note']))
    {
        $this->nm_new_label['member8_note'] = "Member 8 Note";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member8_note = $this->member8_note;
   $sStyleHidden_member8_note = '';
   if (isset($this->nmgp_cmp_hidden['member8_note']) && $this->nmgp_cmp_hidden['member8_note'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member8_note']);
       $sStyleHidden_member8_note = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member8_note = 'display: none;';
   $sStyleReadInp_member8_note = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member8_note']) && $this->nmgp_cmp_readonly['member8_note'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member8_note']);
       $sStyleReadLab_member8_note = '';
       $sStyleReadInp_member8_note = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member8_note']) && $this->nmgp_cmp_hidden['member8_note'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member8_note" value="<?php echo $this->form_encode_input($member8_note) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member8_note_line" id="hidden_field_data_member8_note" style="<?php echo $sStyleHidden_member8_note; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member8_note_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member8_note_label" style=""><span id="id_label_member8_note"><?php echo $this->nm_new_label['member8_note']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member8_note"]) &&  $this->nmgp_cmp_readonly["member8_note"] == "on") { 

 ?>
<input type="hidden" name="member8_note" value="<?php echo $this->form_encode_input($member8_note) . "\">" . $member8_note . ""; ?>
<?php } else { ?>
<span id="id_read_on_member8_note" class="sc-ui-readonly-member8_note css_member8_note_line" style="<?php echo $sStyleReadLab_member8_note; ?>"><?php echo $this->form_format_readonly("member8_note", $this->form_encode_input($this->member8_note)); ?></span><span id="id_read_off_member8_note" class="css_read_off_member8_note<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member8_note; ?>">
 <input class="sc-js-input scFormObjectOdd css_member8_note_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member8_note" type=text name="member8_note" value="<?php echo $this->form_encode_input($member8_note) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member8_note_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member8_note_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member9_name']))
    {
        $this->nm_new_label['member9_name'] = "Member 9 Name";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member9_name = $this->member9_name;
   $sStyleHidden_member9_name = '';
   if (isset($this->nmgp_cmp_hidden['member9_name']) && $this->nmgp_cmp_hidden['member9_name'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member9_name']);
       $sStyleHidden_member9_name = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member9_name = 'display: none;';
   $sStyleReadInp_member9_name = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member9_name']) && $this->nmgp_cmp_readonly['member9_name'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member9_name']);
       $sStyleReadLab_member9_name = '';
       $sStyleReadInp_member9_name = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member9_name']) && $this->nmgp_cmp_hidden['member9_name'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member9_name" value="<?php echo $this->form_encode_input($member9_name) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member9_name_line" id="hidden_field_data_member9_name" style="<?php echo $sStyleHidden_member9_name; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member9_name_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member9_name_label" style=""><span id="id_label_member9_name"><?php echo $this->nm_new_label['member9_name']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member9_name"]) &&  $this->nmgp_cmp_readonly["member9_name"] == "on") { 

 ?>
<input type="hidden" name="member9_name" value="<?php echo $this->form_encode_input($member9_name) . "\">" . $member9_name . ""; ?>
<?php } else { ?>
<span id="id_read_on_member9_name" class="sc-ui-readonly-member9_name css_member9_name_line" style="<?php echo $sStyleReadLab_member9_name; ?>"><?php echo $this->form_format_readonly("member9_name", $this->form_encode_input($this->member9_name)); ?></span><span id="id_read_off_member9_name" class="css_read_off_member9_name<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member9_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_member9_name_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member9_name" type=text name="member9_name" value="<?php echo $this->form_encode_input($member9_name) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '(#09 - Firstname Lastname)', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member9_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member9_name_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member9_phone']))
    {
        $this->nm_new_label['member9_phone'] = "Member 9 Phone";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member9_phone = $this->member9_phone;
   $sStyleHidden_member9_phone = '';
   if (isset($this->nmgp_cmp_hidden['member9_phone']) && $this->nmgp_cmp_hidden['member9_phone'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member9_phone']);
       $sStyleHidden_member9_phone = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member9_phone = 'display: none;';
   $sStyleReadInp_member9_phone = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member9_phone']) && $this->nmgp_cmp_readonly['member9_phone'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member9_phone']);
       $sStyleReadLab_member9_phone = '';
       $sStyleReadInp_member9_phone = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member9_phone']) && $this->nmgp_cmp_hidden['member9_phone'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member9_phone" value="<?php echo $this->form_encode_input($member9_phone) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member9_phone_line" id="hidden_field_data_member9_phone" style="<?php echo $sStyleHidden_member9_phone; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member9_phone_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member9_phone_label" style=""><span id="id_label_member9_phone"><?php echo $this->nm_new_label['member9_phone']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member9_phone"]) &&  $this->nmgp_cmp_readonly["member9_phone"] == "on") { 

 ?>
<input type="hidden" name="member9_phone" value="<?php echo $this->form_encode_input($member9_phone) . "\">" . $member9_phone . ""; ?>
<?php } else { ?>
<span id="id_read_on_member9_phone" class="sc-ui-readonly-member9_phone css_member9_phone_line" style="<?php echo $sStyleReadLab_member9_phone; ?>"><?php echo $this->form_format_readonly("member9_phone", $this->form_encode_input($this->member9_phone)); ?></span><span id="id_read_off_member9_phone" class="css_read_off_member9_phone<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member9_phone; ?>">
 <input class="sc-js-input scFormObjectOdd css_member9_phone_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member9_phone" type=text name="member9_phone" value="<?php echo $this->form_encode_input($member9_phone) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member9_phone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member9_phone_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member9_email']))
    {
        $this->nm_new_label['member9_email'] = "Member 9 Email";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member9_email = $this->member9_email;
   $sStyleHidden_member9_email = '';
   if (isset($this->nmgp_cmp_hidden['member9_email']) && $this->nmgp_cmp_hidden['member9_email'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member9_email']);
       $sStyleHidden_member9_email = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member9_email = 'display: none;';
   $sStyleReadInp_member9_email = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member9_email']) && $this->nmgp_cmp_readonly['member9_email'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member9_email']);
       $sStyleReadLab_member9_email = '';
       $sStyleReadInp_member9_email = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member9_email']) && $this->nmgp_cmp_hidden['member9_email'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member9_email" value="<?php echo $this->form_encode_input($member9_email) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member9_email_line" id="hidden_field_data_member9_email" style="<?php echo $sStyleHidden_member9_email; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member9_email_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member9_email_label" style=""><span id="id_label_member9_email"><?php echo $this->nm_new_label['member9_email']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member9_email"]) &&  $this->nmgp_cmp_readonly["member9_email"] == "on") { 

 ?>
<input type="hidden" name="member9_email" value="<?php echo $this->form_encode_input($member9_email) . "\">" . $member9_email . ""; ?>
<?php } else { ?>
<span id="id_read_on_member9_email" class="sc-ui-readonly-member9_email css_member9_email_line" style="<?php echo $sStyleReadLab_member9_email; ?>"><?php echo $this->form_format_readonly("member9_email", $this->form_encode_input($this->member9_email)); ?></span><span id="id_read_off_member9_email" class="css_read_off_member9_email<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member9_email; ?>">
 <input class="sc-js-input scFormObjectOdd css_member9_email_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member9_email" type=text name="member9_email" value="<?php echo $this->form_encode_input($member9_email) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member9_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member9_email_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member9_note']))
    {
        $this->nm_new_label['member9_note'] = "Member 9 Note";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member9_note = $this->member9_note;
   $sStyleHidden_member9_note = '';
   if (isset($this->nmgp_cmp_hidden['member9_note']) && $this->nmgp_cmp_hidden['member9_note'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member9_note']);
       $sStyleHidden_member9_note = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member9_note = 'display: none;';
   $sStyleReadInp_member9_note = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member9_note']) && $this->nmgp_cmp_readonly['member9_note'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member9_note']);
       $sStyleReadLab_member9_note = '';
       $sStyleReadInp_member9_note = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member9_note']) && $this->nmgp_cmp_hidden['member9_note'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member9_note" value="<?php echo $this->form_encode_input($member9_note) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member9_note_line" id="hidden_field_data_member9_note" style="<?php echo $sStyleHidden_member9_note; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member9_note_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member9_note_label" style=""><span id="id_label_member9_note"><?php echo $this->nm_new_label['member9_note']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member9_note"]) &&  $this->nmgp_cmp_readonly["member9_note"] == "on") { 

 ?>
<input type="hidden" name="member9_note" value="<?php echo $this->form_encode_input($member9_note) . "\">" . $member9_note . ""; ?>
<?php } else { ?>
<span id="id_read_on_member9_note" class="sc-ui-readonly-member9_note css_member9_note_line" style="<?php echo $sStyleReadLab_member9_note; ?>"><?php echo $this->form_format_readonly("member9_note", $this->form_encode_input($this->member9_note)); ?></span><span id="id_read_off_member9_note" class="css_read_off_member9_note<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member9_note; ?>">
 <input class="sc-js-input scFormObjectOdd css_member9_note_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member9_note" type=text name="member9_note" value="<?php echo $this->form_encode_input($member9_note) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member9_note_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member9_note_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member10_name']))
    {
        $this->nm_new_label['member10_name'] = "Member 10 Name";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member10_name = $this->member10_name;
   $sStyleHidden_member10_name = '';
   if (isset($this->nmgp_cmp_hidden['member10_name']) && $this->nmgp_cmp_hidden['member10_name'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member10_name']);
       $sStyleHidden_member10_name = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member10_name = 'display: none;';
   $sStyleReadInp_member10_name = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member10_name']) && $this->nmgp_cmp_readonly['member10_name'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member10_name']);
       $sStyleReadLab_member10_name = '';
       $sStyleReadInp_member10_name = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member10_name']) && $this->nmgp_cmp_hidden['member10_name'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member10_name" value="<?php echo $this->form_encode_input($member10_name) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member10_name_line" id="hidden_field_data_member10_name" style="<?php echo $sStyleHidden_member10_name; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member10_name_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member10_name_label" style=""><span id="id_label_member10_name"><?php echo $this->nm_new_label['member10_name']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member10_name"]) &&  $this->nmgp_cmp_readonly["member10_name"] == "on") { 

 ?>
<input type="hidden" name="member10_name" value="<?php echo $this->form_encode_input($member10_name) . "\">" . $member10_name . ""; ?>
<?php } else { ?>
<span id="id_read_on_member10_name" class="sc-ui-readonly-member10_name css_member10_name_line" style="<?php echo $sStyleReadLab_member10_name; ?>"><?php echo $this->form_format_readonly("member10_name", $this->form_encode_input($this->member10_name)); ?></span><span id="id_read_off_member10_name" class="css_read_off_member10_name<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member10_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_member10_name_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member10_name" type=text name="member10_name" value="<?php echo $this->form_encode_input($member10_name) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '(#10 - Firstname Lastname)', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member10_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member10_name_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member10_phone']))
    {
        $this->nm_new_label['member10_phone'] = "Member 10 Phone";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member10_phone = $this->member10_phone;
   $sStyleHidden_member10_phone = '';
   if (isset($this->nmgp_cmp_hidden['member10_phone']) && $this->nmgp_cmp_hidden['member10_phone'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member10_phone']);
       $sStyleHidden_member10_phone = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member10_phone = 'display: none;';
   $sStyleReadInp_member10_phone = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member10_phone']) && $this->nmgp_cmp_readonly['member10_phone'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member10_phone']);
       $sStyleReadLab_member10_phone = '';
       $sStyleReadInp_member10_phone = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member10_phone']) && $this->nmgp_cmp_hidden['member10_phone'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member10_phone" value="<?php echo $this->form_encode_input($member10_phone) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member10_phone_line" id="hidden_field_data_member10_phone" style="<?php echo $sStyleHidden_member10_phone; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member10_phone_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member10_phone_label" style=""><span id="id_label_member10_phone"><?php echo $this->nm_new_label['member10_phone']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member10_phone"]) &&  $this->nmgp_cmp_readonly["member10_phone"] == "on") { 

 ?>
<input type="hidden" name="member10_phone" value="<?php echo $this->form_encode_input($member10_phone) . "\">" . $member10_phone . ""; ?>
<?php } else { ?>
<span id="id_read_on_member10_phone" class="sc-ui-readonly-member10_phone css_member10_phone_line" style="<?php echo $sStyleReadLab_member10_phone; ?>"><?php echo $this->form_format_readonly("member10_phone", $this->form_encode_input($this->member10_phone)); ?></span><span id="id_read_off_member10_phone" class="css_read_off_member10_phone<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member10_phone; ?>">
 <input class="sc-js-input scFormObjectOdd css_member10_phone_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member10_phone" type=text name="member10_phone" value="<?php echo $this->form_encode_input($member10_phone) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member10_phone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member10_phone_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member10_email']))
    {
        $this->nm_new_label['member10_email'] = "Member 10 Email";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member10_email = $this->member10_email;
   $sStyleHidden_member10_email = '';
   if (isset($this->nmgp_cmp_hidden['member10_email']) && $this->nmgp_cmp_hidden['member10_email'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member10_email']);
       $sStyleHidden_member10_email = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member10_email = 'display: none;';
   $sStyleReadInp_member10_email = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member10_email']) && $this->nmgp_cmp_readonly['member10_email'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member10_email']);
       $sStyleReadLab_member10_email = '';
       $sStyleReadInp_member10_email = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member10_email']) && $this->nmgp_cmp_hidden['member10_email'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member10_email" value="<?php echo $this->form_encode_input($member10_email) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member10_email_line" id="hidden_field_data_member10_email" style="<?php echo $sStyleHidden_member10_email; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member10_email_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member10_email_label" style=""><span id="id_label_member10_email"><?php echo $this->nm_new_label['member10_email']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member10_email"]) &&  $this->nmgp_cmp_readonly["member10_email"] == "on") { 

 ?>
<input type="hidden" name="member10_email" value="<?php echo $this->form_encode_input($member10_email) . "\">" . $member10_email . ""; ?>
<?php } else { ?>
<span id="id_read_on_member10_email" class="sc-ui-readonly-member10_email css_member10_email_line" style="<?php echo $sStyleReadLab_member10_email; ?>"><?php echo $this->form_format_readonly("member10_email", $this->form_encode_input($this->member10_email)); ?></span><span id="id_read_off_member10_email" class="css_read_off_member10_email<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member10_email; ?>">
 <input class="sc-js-input scFormObjectOdd css_member10_email_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member10_email" type=text name="member10_email" value="<?php echo $this->form_encode_input($member10_email) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member10_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member10_email_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member10_note']))
    {
        $this->nm_new_label['member10_note'] = "Member 10 Note";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member10_note = $this->member10_note;
   $sStyleHidden_member10_note = '';
   if (isset($this->nmgp_cmp_hidden['member10_note']) && $this->nmgp_cmp_hidden['member10_note'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member10_note']);
       $sStyleHidden_member10_note = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member10_note = 'display: none;';
   $sStyleReadInp_member10_note = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member10_note']) && $this->nmgp_cmp_readonly['member10_note'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member10_note']);
       $sStyleReadLab_member10_note = '';
       $sStyleReadInp_member10_note = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member10_note']) && $this->nmgp_cmp_hidden['member10_note'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member10_note" value="<?php echo $this->form_encode_input($member10_note) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member10_note_line" id="hidden_field_data_member10_note" style="<?php echo $sStyleHidden_member10_note; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member10_note_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member10_note_label" style=""><span id="id_label_member10_note"><?php echo $this->nm_new_label['member10_note']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member10_note"]) &&  $this->nmgp_cmp_readonly["member10_note"] == "on") { 

 ?>
<input type="hidden" name="member10_note" value="<?php echo $this->form_encode_input($member10_note) . "\">" . $member10_note . ""; ?>
<?php } else { ?>
<span id="id_read_on_member10_note" class="sc-ui-readonly-member10_note css_member10_note_line" style="<?php echo $sStyleReadLab_member10_note; ?>"><?php echo $this->form_format_readonly("member10_note", $this->form_encode_input($this->member10_note)); ?></span><span id="id_read_off_member10_note" class="css_read_off_member10_note<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member10_note; ?>">
 <input class="sc-js-input scFormObjectOdd css_member10_note_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member10_note" type=text name="member10_note" value="<?php echo $this->form_encode_input($member10_note) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member10_note_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member10_note_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['main_contact_name']))
    {
        $this->nm_new_label['main_contact_name'] = "Name";
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

    <TD class="scFormDataOdd css_main_contact_name_line" id="hidden_field_data_main_contact_name" style="<?php echo $sStyleHidden_main_contact_name; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_main_contact_name_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_main_contact_name_label" style=""><span id="id_label_main_contact_name"><?php echo $this->nm_new_label['main_contact_name']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['main_contact_name']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['main_contact_name'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["main_contact_name"]) &&  $this->nmgp_cmp_readonly["main_contact_name"] == "on") { 

 ?>
<input type="hidden" name="main_contact_name" value="<?php echo $this->form_encode_input($main_contact_name) . "\">" . $main_contact_name . ""; ?>
<?php } else { ?>
<span id="id_read_on_main_contact_name" class="sc-ui-readonly-main_contact_name css_main_contact_name_line" style="<?php echo $sStyleReadLab_main_contact_name; ?>"><?php echo $this->form_format_readonly("main_contact_name", $this->form_encode_input($this->main_contact_name)); ?></span><span id="id_read_off_main_contact_name" class="css_read_off_main_contact_name<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_main_contact_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_main_contact_name_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_main_contact_name" type=text name="main_contact_name" value="<?php echo $this->form_encode_input($main_contact_name) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_main_contact_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_main_contact_name_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['main_contact_phone']))
    {
        $this->nm_new_label['main_contact_phone'] = "Phone";
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

    <TD class="scFormDataOdd css_main_contact_phone_line" id="hidden_field_data_main_contact_phone" style="<?php echo $sStyleHidden_main_contact_phone; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_main_contact_phone_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_main_contact_phone_label" style=""><span id="id_label_main_contact_phone"><?php echo $this->nm_new_label['main_contact_phone']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['main_contact_phone']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['main_contact_phone'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["main_contact_phone"]) &&  $this->nmgp_cmp_readonly["main_contact_phone"] == "on") { 

 ?>
<input type="hidden" name="main_contact_phone" value="<?php echo $this->form_encode_input($main_contact_phone) . "\">" . $main_contact_phone . ""; ?>
<?php } else { ?>
<span id="id_read_on_main_contact_phone" class="sc-ui-readonly-main_contact_phone css_main_contact_phone_line" style="<?php echo $sStyleReadLab_main_contact_phone; ?>"><?php echo $this->form_format_readonly("main_contact_phone", $this->form_encode_input($this->main_contact_phone)); ?></span><span id="id_read_off_main_contact_phone" class="css_read_off_main_contact_phone<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_main_contact_phone; ?>">
 <input class="sc-js-input scFormObjectOdd css_main_contact_phone_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_main_contact_phone" type=text name="main_contact_phone" value="<?php echo $this->form_encode_input($main_contact_phone) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_main_contact_phone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_main_contact_phone_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['main_contact_email']))
    {
        $this->nm_new_label['main_contact_email'] = "Email";
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

    <TD class="scFormDataOdd css_main_contact_email_line" id="hidden_field_data_main_contact_email" style="<?php echo $sStyleHidden_main_contact_email; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_main_contact_email_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_main_contact_email_label" style=""><span id="id_label_main_contact_email"><?php echo $this->nm_new_label['main_contact_email']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['main_contact_email']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['main_contact_email'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["main_contact_email"]) &&  $this->nmgp_cmp_readonly["main_contact_email"] == "on") { 

 ?>
<input type="hidden" name="main_contact_email" value="<?php echo $this->form_encode_input($main_contact_email) . "\">" . $main_contact_email . ""; ?>
<?php } else { ?>
<span id="id_read_on_main_contact_email" class="sc-ui-readonly-main_contact_email css_main_contact_email_line" style="<?php echo $sStyleReadLab_main_contact_email; ?>"><?php echo $this->form_format_readonly("main_contact_email", $this->form_encode_input($this->main_contact_email)); ?></span><span id="id_read_off_main_contact_email" class="css_read_off_main_contact_email<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_main_contact_email; ?>">
 <input class="sc-js-input scFormObjectOdd css_main_contact_email_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_main_contact_email" type=text name="main_contact_email" value="<?php echo $this->form_encode_input($main_contact_email) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_main_contact_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_main_contact_email_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['main_contact_title']))
    {
        $this->nm_new_label['main_contact_title'] = "Title";
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

    <TD class="scFormDataOdd css_main_contact_title_line" id="hidden_field_data_main_contact_title" style="<?php echo $sStyleHidden_main_contact_title; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_main_contact_title_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_main_contact_title_label" style=""><span id="id_label_main_contact_title"><?php echo $this->nm_new_label['main_contact_title']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['main_contact_title']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['main_contact_title'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["main_contact_title"]) &&  $this->nmgp_cmp_readonly["main_contact_title"] == "on") { 

 ?>
<input type="hidden" name="main_contact_title" value="<?php echo $this->form_encode_input($main_contact_title) . "\">" . $main_contact_title . ""; ?>
<?php } else { ?>
<span id="id_read_on_main_contact_title" class="sc-ui-readonly-main_contact_title css_main_contact_title_line" style="<?php echo $sStyleReadLab_main_contact_title; ?>"><?php echo $this->form_format_readonly("main_contact_title", $this->form_encode_input($this->main_contact_title)); ?></span><span id="id_read_off_main_contact_title" class="css_read_off_main_contact_title<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_main_contact_title; ?>">
 <input class="sc-js-input scFormObjectOdd css_main_contact_title_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_main_contact_title" type=text name="main_contact_title" value="<?php echo $this->form_encode_input($main_contact_title) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_main_contact_title_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_main_contact_title_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['main_contact_img_id']))
    {
        $this->nm_new_label['main_contact_img_id'] = "Driver License or ID";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $main_contact_img_id = $this->main_contact_img_id;
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

    <TD class="scFormDataOdd css_main_contact_img_id_line" id="hidden_field_data_main_contact_img_id" style="<?php echo $sStyleHidden_main_contact_img_id; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_main_contact_img_id_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_main_contact_img_id_label" style=""><span id="id_label_main_contact_img_id"><?php echo $this->nm_new_label['main_contact_img_id']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['main_contact_img_id']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['php_cmp_required']['main_contact_img_id'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></span><br>
 <?php $this->NM_ajax_info['varList'][] = array("var_ajax_img_main_contact_img_id" => $out_main_contact_img_id); ?><script>var var_ajax_img_main_contact_img_id = '<?php echo $out_main_contact_img_id; ?>';</script><input type="hidden" name="temp_out_main_contact_img_id" value="<?php echo $this->form_encode_input($out_main_contact_img_id); ?>" /><?php if (!empty($out_main_contact_img_id)){ echo "<a id=\"id_ajax_link_main_contact_img_id\" href=\"javascript:nm_mostra_img(var_ajax_img_main_contact_img_id, '" . $this->nmgp_return_img['main_contact_img_id'][0] . "', '" . $this->nmgp_return_img['main_contact_img_id'][1] . "')\">" . $this->Ini->Nm_lang['lang_othr_show_imgg'] . "</a>"; if (!empty($main_contact_img_id)){ echo "<br>";} } ?><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["main_contact_img_id"]) &&  $this->nmgp_cmp_readonly["main_contact_img_id"] == "on") { 

 ?>
<img id=\"main_contact_img_id_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><input type="hidden" name="main_contact_img_id" value="<?php echo $this->form_encode_input($main_contact_img_id) . "\">" . $main_contact_img_id . ""; ?>
<?php } else { ?>
<span id="id_read_off_main_contact_img_id" class="css_read_off_main_contact_img_id<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_main_contact_img_id; ?>"><span style="display:none"><span id="sc-id-upload-select-main_contact_img_id" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_main_contact_img_id_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="main_contact_img_id[]" id="id_sc_field_main_contact_img_id" onchange="<?php if ($this->nmgp_opcao == "novo") {echo "if (document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]']) { document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]'].checked = true }"; }?>"></span></span>
<?php
   $sCheckInsert = "";
?>
<span style="display: none"><span id="chk_ajax_img_main_contact_img_id"<?php if ($this->nmgp_opcao == "novo" || empty($main_contact_img_id)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="main_contact_img_id_limpa" value="<?php echo $main_contact_img_id_limpa . '" '; if ($main_contact_img_id_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};<?php echo $sCheckInsert ?>"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span></span><img id="main_contact_img_id_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><div id="id_img_loader_main_contact_img_id" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_main_contact_img_id" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
<div id="id_sc_dragdrop_main_contact_img_id" class="scFormDataDragNDrop"  style="<?php echo $sStyleReadInp_main_contact_img_id ?>cursor:pointer" onclick="$('#id_sc_field_main_contact_img_id').click()"><i class='fas fa-cloud-upload-alt'></i><br/>
<?php echo $this->Ini->Nm_lang['lang_errm_mu_dragimg_clickable'] ?></div>
<span class="scFormDataTagOdd" style="display: block">Kindly submit the primary contact's ID scan</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_main_contact_img_id_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_main_contact_img_id_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['more_buyers_xlsx']))
    {
        $this->nm_new_label['more_buyers_xlsx'] = "Attachment:";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $more_buyers_xlsx = $this->more_buyers_xlsx;
   $sStyleHidden_more_buyers_xlsx = '';
   if (isset($this->nmgp_cmp_hidden['more_buyers_xlsx']) && $this->nmgp_cmp_hidden['more_buyers_xlsx'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['more_buyers_xlsx']);
       $sStyleHidden_more_buyers_xlsx = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_more_buyers_xlsx = 'display: none;';
   $sStyleReadInp_more_buyers_xlsx = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['more_buyers_xlsx']) && $this->nmgp_cmp_readonly['more_buyers_xlsx'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['more_buyers_xlsx']);
       $sStyleReadLab_more_buyers_xlsx = '';
       $sStyleReadInp_more_buyers_xlsx = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['more_buyers_xlsx']) && $this->nmgp_cmp_hidden['more_buyers_xlsx'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="more_buyers_xlsx" value="<?php echo $this->form_encode_input($more_buyers_xlsx) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_more_buyers_xlsx_line" id="hidden_field_data_more_buyers_xlsx" style="<?php echo $sStyleHidden_more_buyers_xlsx; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_more_buyers_xlsx_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_more_buyers_xlsx_label" style=""><span id="id_label_more_buyers_xlsx"><?php echo $this->nm_new_label['more_buyers_xlsx']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["more_buyers_xlsx"]) &&  $this->nmgp_cmp_readonly["more_buyers_xlsx"] == "on") { 

 ?>
<input type="hidden" name="more_buyers_xlsx" value="<?php echo $this->form_encode_input($more_buyers_xlsx) . "\"><img id=\"more_buyers_xlsx_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><span id=\"id_ajax_doc_more_buyers_xlsx\"><a href=\"javascript:nm_mostra_doc('2', '" . str_replace(array("'", '%'), array("\'", '**Perc**'), substr($sTmpFile_more_buyers_xlsx, 3)) . "', 'form_clients_steps_appn_test')\">" . $more_buyers_xlsx . "</a></span>"; ?>
<?php } else { ?>
<span id="id_read_on_more_buyers_xlsx" class="scFormLinkOdd sc-ui-readonly-more_buyers_xlsx css_more_buyers_xlsx_line" style="<?php echo $sStyleReadLab_more_buyers_xlsx; ?>"><?php echo $this->form_format_readonly("more_buyers_xlsx", $this->more_buyers_xlsx) ?></span><span id="id_read_off_more_buyers_xlsx" class="css_read_off_more_buyers_xlsx" style="white-space: nowrap;<?php echo $sStyleReadInp_more_buyers_xlsx; ?>"><span style="display:none"><span id="sc-id-upload-select-more_buyers_xlsx" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_more_buyers_xlsx_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="more_buyers_xlsx[]" id="id_sc_field_more_buyers_xlsx" ></span></span>
<?php
   $sCheckInsert = "";
?>
<span id="chk_ajax_img_more_buyers_xlsx"<?php if ($this->nmgp_opcao == "novo" || empty($more_buyers_xlsx)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="more_buyers_xlsx_limpa" value="<?php echo $more_buyers_xlsx_limpa . '" '; if ($more_buyers_xlsx_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};<?php echo $sCheckInsert ?>"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span>
<?php 
   $more_buyers_xlsx = trim($more_buyers_xlsx); 
   if (!empty($more_buyers_xlsx)) 
   { 
       $nm_img_icone = $this->gera_icone($more_buyers_xlsx); 
       if (!empty($nm_img_icone)) 
       { 
           $nm_img_icone = "<img src=\"$nm_img_icone\" id=\"id_ajax_doc_icon_more_buyers_xlsx\">&nbsp;";
       } 
       echo  $nm_img_icone;
   } 
?> 
<img id="more_buyers_xlsx_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><span id="id_ajax_doc_more_buyers_xlsx"><a href="javascript:nm_mostra_doc('2', '<?php echo str_replace(array("'", '%'), array("\'", '**Perc**'), substr($sTmpFile_more_buyers_xlsx, 3)); ?>', 'form_clients_steps_appn_test')"><?php echo $more_buyers_xlsx ?></a></span><div id="id_img_loader_more_buyers_xlsx" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_more_buyers_xlsx" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
<div id="id_sc_dragdrop_more_buyers_xlsx" class="scFormDataDragNDrop"  style="<?php echo $sStyleReadInp_more_buyers_xlsx ?>cursor:pointer" onclick="$('#id_sc_field_more_buyers_xlsx').click()"><i class='fas fa-cloud-upload-alt'></i><br/>
<?php echo $this->Ini->Nm_lang['lang_errm_mu_dragfile_clickable'] ?></div>
<span class="scFormDataTagOdd" style="display: block">Please note that we only accept files in the <b>.xlsx</b> or <b>.xls</b> formats.</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_more_buyers_xlsx_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_more_buyers_xlsx_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['buyers_excel_qty']))
    {
        $this->nm_new_label['buyers_excel_qty'] = "Please enter the number of buyers included in the attached Excel file:";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $buyers_excel_qty = $this->buyers_excel_qty;
   $sStyleHidden_buyers_excel_qty = '';
   if (isset($this->nmgp_cmp_hidden['buyers_excel_qty']) && $this->nmgp_cmp_hidden['buyers_excel_qty'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['buyers_excel_qty']);
       $sStyleHidden_buyers_excel_qty = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_buyers_excel_qty = 'display: none;';
   $sStyleReadInp_buyers_excel_qty = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['buyers_excel_qty']) && $this->nmgp_cmp_readonly['buyers_excel_qty'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['buyers_excel_qty']);
       $sStyleReadLab_buyers_excel_qty = '';
       $sStyleReadInp_buyers_excel_qty = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['buyers_excel_qty']) && $this->nmgp_cmp_hidden['buyers_excel_qty'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="buyers_excel_qty" value="<?php echo $this->form_encode_input($buyers_excel_qty) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_buyers_excel_qty_line" id="hidden_field_data_buyers_excel_qty" style="<?php echo $sStyleHidden_buyers_excel_qty; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_buyers_excel_qty_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_buyers_excel_qty_label" style=""><span id="id_label_buyers_excel_qty"><?php echo $this->nm_new_label['buyers_excel_qty']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["buyers_excel_qty"]) &&  $this->nmgp_cmp_readonly["buyers_excel_qty"] == "on") { 

 ?>
<input type="hidden" name="buyers_excel_qty" value="<?php echo $this->form_encode_input($buyers_excel_qty) . "\">" . $buyers_excel_qty . ""; ?>
<?php } else { ?>
<span id="id_read_on_buyers_excel_qty" class="sc-ui-readonly-buyers_excel_qty css_buyers_excel_qty_line" style="<?php echo $sStyleReadLab_buyers_excel_qty; ?>"><?php echo $this->form_format_readonly("buyers_excel_qty", $this->form_encode_input($this->buyers_excel_qty)); ?></span><span id="id_read_off_buyers_excel_qty" class="css_read_off_buyers_excel_qty<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_buyers_excel_qty; ?>">
 <input class="sc-js-input scFormObjectOdd scFormObjectOddSpin scSpin_buyers_excel_qty_obj css_buyers_excel_qty_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_buyers_excel_qty" type=text name="buyers_excel_qty" value="<?php echo $this->form_encode_input($buyers_excel_qty) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['buyers_excel_qty']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['buyers_excel_qty']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['buyers_excel_qty']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ><div style="padding-top: 5px; width: 200px">
<div id="sc-ui-slide-buyers_excel_qty"></div>
</div>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_buyers_excel_qty_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_buyers_excel_qty_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['adtl_memb_name']))
    {
        $this->nm_new_label['adtl_memb_name'] = "Name";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $adtl_memb_name = $this->adtl_memb_name;
   $sStyleHidden_adtl_memb_name = '';
   if (isset($this->nmgp_cmp_hidden['adtl_memb_name']) && $this->nmgp_cmp_hidden['adtl_memb_name'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['adtl_memb_name']);
       $sStyleHidden_adtl_memb_name = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_adtl_memb_name = 'display: none;';
   $sStyleReadInp_adtl_memb_name = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['adtl_memb_name']) && $this->nmgp_cmp_readonly['adtl_memb_name'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['adtl_memb_name']);
       $sStyleReadLab_adtl_memb_name = '';
       $sStyleReadInp_adtl_memb_name = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['adtl_memb_name']) && $this->nmgp_cmp_hidden['adtl_memb_name'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="adtl_memb_name" value="<?php echo $this->form_encode_input($adtl_memb_name) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_adtl_memb_name_line" id="hidden_field_data_adtl_memb_name" style="<?php echo $sStyleHidden_adtl_memb_name; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_adtl_memb_name_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_adtl_memb_name_label" style=""><span id="id_label_adtl_memb_name"><?php echo $this->nm_new_label['adtl_memb_name']; ?></span></span><br><span id="id_read_on_adtl_memb_name css_adtl_memb_name_line" style="<?php echo $sStyleReadLab_adtl_memb_name; ?>"><?php echo $fieldContent; ?></span><span id="id_read_off_adtl_memb_name" class="css_read_off_adtl_memb_name" style="<?php echo $sStyleReadInp_adtl_memb_name; ?>"><span id="id_ajax_label_adtl_memb_name"><?php echo $adtl_memb_name?></span>
</span><input type="hidden" name="adtl_memb_name" value="<?php echo $this->form_encode_input($adtl_memb_name); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_adtl_memb_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_adtl_memb_name_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['adtl_memb_note']))
    {
        $this->nm_new_label['adtl_memb_note'] = "Note";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $adtl_memb_note = $this->adtl_memb_note;
   $sStyleHidden_adtl_memb_note = '';
   if (isset($this->nmgp_cmp_hidden['adtl_memb_note']) && $this->nmgp_cmp_hidden['adtl_memb_note'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['adtl_memb_note']);
       $sStyleHidden_adtl_memb_note = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_adtl_memb_note = 'display: none;';
   $sStyleReadInp_adtl_memb_note = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['adtl_memb_note']) && $this->nmgp_cmp_readonly['adtl_memb_note'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['adtl_memb_note']);
       $sStyleReadLab_adtl_memb_note = '';
       $sStyleReadInp_adtl_memb_note = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['adtl_memb_note']) && $this->nmgp_cmp_hidden['adtl_memb_note'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="adtl_memb_note" value="<?php echo $this->form_encode_input($adtl_memb_note) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_adtl_memb_note_line" id="hidden_field_data_adtl_memb_note" style="<?php echo $sStyleHidden_adtl_memb_note; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_adtl_memb_note_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_adtl_memb_note_label" style=""><span id="id_label_adtl_memb_note"><?php echo $this->nm_new_label['adtl_memb_note']; ?></span></span><br><span id="id_read_on_adtl_memb_note css_adtl_memb_note_line" style="<?php echo $sStyleReadLab_adtl_memb_note; ?>"><?php echo $fieldContent; ?></span><span id="id_read_off_adtl_memb_note" class="css_read_off_adtl_memb_note" style="<?php echo $sStyleReadInp_adtl_memb_note; ?>"><span id="id_ajax_label_adtl_memb_note"><?php echo $adtl_memb_note?></span>
</span><input type="hidden" name="adtl_memb_note" value="<?php echo $this->form_encode_input($adtl_memb_note); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_adtl_memb_note_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_adtl_memb_note_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['adtl_memb_phone']))
    {
        $this->nm_new_label['adtl_memb_phone'] = "Phone";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $adtl_memb_phone = $this->adtl_memb_phone;
   $sStyleHidden_adtl_memb_phone = '';
   if (isset($this->nmgp_cmp_hidden['adtl_memb_phone']) && $this->nmgp_cmp_hidden['adtl_memb_phone'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['adtl_memb_phone']);
       $sStyleHidden_adtl_memb_phone = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_adtl_memb_phone = 'display: none;';
   $sStyleReadInp_adtl_memb_phone = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['adtl_memb_phone']) && $this->nmgp_cmp_readonly['adtl_memb_phone'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['adtl_memb_phone']);
       $sStyleReadLab_adtl_memb_phone = '';
       $sStyleReadInp_adtl_memb_phone = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['adtl_memb_phone']) && $this->nmgp_cmp_hidden['adtl_memb_phone'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="adtl_memb_phone" value="<?php echo $this->form_encode_input($adtl_memb_phone) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_adtl_memb_phone_line" id="hidden_field_data_adtl_memb_phone" style="<?php echo $sStyleHidden_adtl_memb_phone; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_adtl_memb_phone_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_adtl_memb_phone_label" style=""><span id="id_label_adtl_memb_phone"><?php echo $this->nm_new_label['adtl_memb_phone']; ?></span></span><br><span id="id_read_on_adtl_memb_phone css_adtl_memb_phone_line" style="<?php echo $sStyleReadLab_adtl_memb_phone; ?>"><?php echo $fieldContent; ?></span><span id="id_read_off_adtl_memb_phone" class="css_read_off_adtl_memb_phone" style="<?php echo $sStyleReadInp_adtl_memb_phone; ?>"><span id="id_ajax_label_adtl_memb_phone"><?php echo $adtl_memb_phone?></span>
</span><input type="hidden" name="adtl_memb_phone" value="<?php echo $this->form_encode_input($adtl_memb_phone); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_adtl_memb_phone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_adtl_memb_phone_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dummy01']))
    {
        $this->nm_new_label['dummy01'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dummy01 = $this->dummy01;
   $sStyleHidden_dummy01 = '';
   if (isset($this->nmgp_cmp_hidden['dummy01']) && $this->nmgp_cmp_hidden['dummy01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dummy01']);
       $sStyleHidden_dummy01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dummy01 = 'display: none;';
   $sStyleReadInp_dummy01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dummy01']) && $this->nmgp_cmp_readonly['dummy01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dummy01']);
       $sStyleReadLab_dummy01 = '';
       $sStyleReadInp_dummy01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dummy01']) && $this->nmgp_cmp_hidden['dummy01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dummy01" value="<?php echo $this->form_encode_input($dummy01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_dummy01_line" id="hidden_field_data_dummy01" style="<?php echo $sStyleHidden_dummy01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dummy01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_dummy01_label" style=""><span id="id_label_dummy01"><?php echo $this->nm_new_label['dummy01']; ?></span></span><br><span id="id_ajax_label_dummy01"><?php echo $dummy01?></span>
<input type="hidden" name="dummy01" value="<?php echo $this->form_encode_input($dummy01); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dummy01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dummy01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
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

    <TD class="scFormDataOdd css_dummy02_line" id="hidden_field_data_dummy02" style="<?php echo $sStyleHidden_dummy02; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dummy02_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_dummy02_label" style=""><span id="id_label_dummy02"><?php echo $this->nm_new_label['dummy02']; ?></span></span><br><span id="id_ajax_label_dummy02"><?php echo $dummy02?></span>
<input type="hidden" name="dummy02" value="<?php echo $this->form_encode_input($dummy02); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dummy02_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dummy02_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dummy03']))
    {
        $this->nm_new_label['dummy03'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dummy03 = $this->dummy03;
   $sStyleHidden_dummy03 = '';
   if (isset($this->nmgp_cmp_hidden['dummy03']) && $this->nmgp_cmp_hidden['dummy03'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dummy03']);
       $sStyleHidden_dummy03 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dummy03 = 'display: none;';
   $sStyleReadInp_dummy03 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dummy03']) && $this->nmgp_cmp_readonly['dummy03'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dummy03']);
       $sStyleReadLab_dummy03 = '';
       $sStyleReadInp_dummy03 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dummy03']) && $this->nmgp_cmp_hidden['dummy03'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dummy03" value="<?php echo $this->form_encode_input($dummy03) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_dummy03_line" id="hidden_field_data_dummy03" style="<?php echo $sStyleHidden_dummy03; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dummy03_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_dummy03_label" style=""><span id="id_label_dummy03"><?php echo $this->nm_new_label['dummy03']; ?></span></span><br><span id="id_ajax_label_dummy03"><?php echo $dummy03?></span>
<input type="hidden" name="dummy03" value="<?php echo $this->form_encode_input($dummy03); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dummy03_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dummy03_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dummy04']))
    {
        $this->nm_new_label['dummy04'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dummy04 = $this->dummy04;
   $sStyleHidden_dummy04 = '';
   if (isset($this->nmgp_cmp_hidden['dummy04']) && $this->nmgp_cmp_hidden['dummy04'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dummy04']);
       $sStyleHidden_dummy04 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dummy04 = 'display: none;';
   $sStyleReadInp_dummy04 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dummy04']) && $this->nmgp_cmp_readonly['dummy04'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dummy04']);
       $sStyleReadLab_dummy04 = '';
       $sStyleReadInp_dummy04 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dummy04']) && $this->nmgp_cmp_hidden['dummy04'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dummy04" value="<?php echo $this->form_encode_input($dummy04) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_dummy04_line" id="hidden_field_data_dummy04" style="<?php echo $sStyleHidden_dummy04; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dummy04_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_dummy04_label" style=""><span id="id_label_dummy04"><?php echo $this->nm_new_label['dummy04']; ?></span></span><br><span id="id_ajax_label_dummy04"><?php echo $dummy04?></span>
<input type="hidden" name="dummy04" value="<?php echo $this->form_encode_input($dummy04); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dummy04_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dummy04_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dummy05']))
    {
        $this->nm_new_label['dummy05'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dummy05 = $this->dummy05;
   $sStyleHidden_dummy05 = '';
   if (isset($this->nmgp_cmp_hidden['dummy05']) && $this->nmgp_cmp_hidden['dummy05'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dummy05']);
       $sStyleHidden_dummy05 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dummy05 = 'display: none;';
   $sStyleReadInp_dummy05 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dummy05']) && $this->nmgp_cmp_readonly['dummy05'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dummy05']);
       $sStyleReadLab_dummy05 = '';
       $sStyleReadInp_dummy05 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dummy05']) && $this->nmgp_cmp_hidden['dummy05'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dummy05" value="<?php echo $this->form_encode_input($dummy05) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_dummy05_line" id="hidden_field_data_dummy05" style="<?php echo $sStyleHidden_dummy05; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dummy05_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_dummy05_label" style=""><span id="id_label_dummy05"><?php echo $this->nm_new_label['dummy05']; ?></span></span><br><span id="id_ajax_label_dummy05"><?php echo $dummy05?></span>
<input type="hidden" name="dummy05" value="<?php echo $this->form_encode_input($dummy05); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dummy05_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dummy05_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dummy06']))
    {
        $this->nm_new_label['dummy06'] = "#";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dummy06 = $this->dummy06;
   $sStyleHidden_dummy06 = '';
   if (isset($this->nmgp_cmp_hidden['dummy06']) && $this->nmgp_cmp_hidden['dummy06'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dummy06']);
       $sStyleHidden_dummy06 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dummy06 = 'display: none;';
   $sStyleReadInp_dummy06 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dummy06']) && $this->nmgp_cmp_readonly['dummy06'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dummy06']);
       $sStyleReadLab_dummy06 = '';
       $sStyleReadInp_dummy06 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dummy06']) && $this->nmgp_cmp_hidden['dummy06'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dummy06" value="<?php echo $this->form_encode_input($dummy06) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_dummy06_line" id="hidden_field_data_dummy06" style="<?php echo $sStyleHidden_dummy06; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dummy06_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_dummy06_label" style=""><span id="id_label_dummy06"><?php echo $this->nm_new_label['dummy06']; ?></span></span><br><span id="id_ajax_label_dummy06"><?php echo $dummy06?></span>
<input type="hidden" name="dummy06" value="<?php echo $this->form_encode_input($dummy06); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dummy06_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dummy06_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
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

    <TD class="scFormDataOdd css_dummy07_line" id="hidden_field_data_dummy07" style="<?php echo $sStyleHidden_dummy07; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dummy07_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_dummy07_label" style=""><span id="id_label_dummy07"><?php echo $this->nm_new_label['dummy07']; ?></span></span><br><span id="id_ajax_label_dummy07"><?php echo $dummy07?></span>
<input type="hidden" name="dummy07" value="<?php echo $this->form_encode_input($dummy07); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dummy07_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dummy07_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


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

    <TD class="scFormDataOdd css_dummy08_line" id="hidden_field_data_dummy08" style="<?php echo $sStyleHidden_dummy08; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dummy08_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_dummy08_label" style=""><span id="id_label_dummy08"><?php echo $this->nm_new_label['dummy08']; ?></span></span><br><span id="id_ajax_label_dummy08"><?php echo $dummy08?></span>
<input type="hidden" name="dummy08" value="<?php echo $this->form_encode_input($dummy08); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dummy08_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dummy08_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dummy09']))
    {
        $this->nm_new_label['dummy09'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dummy09 = $this->dummy09;
   $sStyleHidden_dummy09 = '';
   if (isset($this->nmgp_cmp_hidden['dummy09']) && $this->nmgp_cmp_hidden['dummy09'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dummy09']);
       $sStyleHidden_dummy09 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dummy09 = 'display: none;';
   $sStyleReadInp_dummy09 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dummy09']) && $this->nmgp_cmp_readonly['dummy09'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dummy09']);
       $sStyleReadLab_dummy09 = '';
       $sStyleReadInp_dummy09 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dummy09']) && $this->nmgp_cmp_hidden['dummy09'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dummy09" value="<?php echo $this->form_encode_input($dummy09) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_dummy09_line" id="hidden_field_data_dummy09" style="<?php echo $sStyleHidden_dummy09; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dummy09_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_dummy09_label" style=""><span id="id_label_dummy09"><?php echo $this->nm_new_label['dummy09']; ?></span></span><br><span id="id_ajax_label_dummy09"><?php echo $dummy09?></span>
<input type="hidden" name="dummy09" value="<?php echo $this->form_encode_input($dummy09); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dummy09_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dummy09_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dummy10']))
    {
        $this->nm_new_label['dummy10'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dummy10 = $this->dummy10;
   $sStyleHidden_dummy10 = '';
   if (isset($this->nmgp_cmp_hidden['dummy10']) && $this->nmgp_cmp_hidden['dummy10'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dummy10']);
       $sStyleHidden_dummy10 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dummy10 = 'display: none;';
   $sStyleReadInp_dummy10 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dummy10']) && $this->nmgp_cmp_readonly['dummy10'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dummy10']);
       $sStyleReadLab_dummy10 = '';
       $sStyleReadInp_dummy10 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dummy10']) && $this->nmgp_cmp_hidden['dummy10'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dummy10" value="<?php echo $this->form_encode_input($dummy10) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_dummy10_line" id="hidden_field_data_dummy10" style="<?php echo $sStyleHidden_dummy10; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dummy10_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_dummy10_label" style=""><span id="id_label_dummy10"><?php echo $this->nm_new_label['dummy10']; ?></span></span><br><span id="id_ajax_label_dummy10"><?php echo $dummy10?></span>
<input type="hidden" name="dummy10" value="<?php echo $this->form_encode_input($dummy10); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dummy10_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dummy10_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dummy11']))
    {
        $this->nm_new_label['dummy11'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dummy11 = $this->dummy11;
   $sStyleHidden_dummy11 = '';
   if (isset($this->nmgp_cmp_hidden['dummy11']) && $this->nmgp_cmp_hidden['dummy11'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dummy11']);
       $sStyleHidden_dummy11 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dummy11 = 'display: none;';
   $sStyleReadInp_dummy11 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dummy11']) && $this->nmgp_cmp_readonly['dummy11'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dummy11']);
       $sStyleReadLab_dummy11 = '';
       $sStyleReadInp_dummy11 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dummy11']) && $this->nmgp_cmp_hidden['dummy11'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dummy11" value="<?php echo $this->form_encode_input($dummy11) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_dummy11_line" id="hidden_field_data_dummy11" style="<?php echo $sStyleHidden_dummy11; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dummy11_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_dummy11_label" style=""><span id="id_label_dummy11"><?php echo $this->nm_new_label['dummy11']; ?></span></span><br><span id="id_ajax_label_dummy11"><?php echo $dummy11?></span>
<input type="hidden" name="dummy11" value="<?php echo $this->form_encode_input($dummy11); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dummy11_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dummy11_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dummy12']))
    {
        $this->nm_new_label['dummy12'] = "dummy12";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dummy12 = $this->dummy12;
   $sStyleHidden_dummy12 = '';
   if (isset($this->nmgp_cmp_hidden['dummy12']) && $this->nmgp_cmp_hidden['dummy12'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dummy12']);
       $sStyleHidden_dummy12 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dummy12 = 'display: none;';
   $sStyleReadInp_dummy12 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dummy12']) && $this->nmgp_cmp_readonly['dummy12'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dummy12']);
       $sStyleReadLab_dummy12 = '';
       $sStyleReadInp_dummy12 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dummy12']) && $this->nmgp_cmp_hidden['dummy12'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dummy12" value="<?php echo $this->form_encode_input($dummy12) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_dummy12_line" id="hidden_field_data_dummy12" style="<?php echo $sStyleHidden_dummy12; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dummy12_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_dummy12_label" style=""><span id="id_label_dummy12"><?php echo $this->nm_new_label['dummy12']; ?></span></span><br><span id="id_ajax_label_dummy12"><?php echo $dummy12?></span>
<input type="hidden" name="dummy12" value="<?php echo $this->form_encode_input($dummy12); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dummy12_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dummy12_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dummy13']))
    {
        $this->nm_new_label['dummy13'] = "dummy13";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dummy13 = $this->dummy13;
   $sStyleHidden_dummy13 = '';
   if (isset($this->nmgp_cmp_hidden['dummy13']) && $this->nmgp_cmp_hidden['dummy13'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dummy13']);
       $sStyleHidden_dummy13 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dummy13 = 'display: none;';
   $sStyleReadInp_dummy13 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dummy13']) && $this->nmgp_cmp_readonly['dummy13'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dummy13']);
       $sStyleReadLab_dummy13 = '';
       $sStyleReadInp_dummy13 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dummy13']) && $this->nmgp_cmp_hidden['dummy13'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dummy13" value="<?php echo $this->form_encode_input($dummy13) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_dummy13_line" id="hidden_field_data_dummy13" style="<?php echo $sStyleHidden_dummy13; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dummy13_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_dummy13_label" style=""><span id="id_label_dummy13"><?php echo $this->nm_new_label['dummy13']; ?></span></span><br><span id="id_ajax_label_dummy13"><?php echo $dummy13?></span>
<input type="hidden" name="dummy13" value="<?php echo $this->form_encode_input($dummy13); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dummy13_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dummy13_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['main_contact_title_lbl']))
    {
        $this->nm_new_label['main_contact_title_lbl'] = "Title";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $main_contact_title_lbl = $this->main_contact_title_lbl;
   $sStyleHidden_main_contact_title_lbl = '';
   if (isset($this->nmgp_cmp_hidden['main_contact_title_lbl']) && $this->nmgp_cmp_hidden['main_contact_title_lbl'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['main_contact_title_lbl']);
       $sStyleHidden_main_contact_title_lbl = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_main_contact_title_lbl = 'display: none;';
   $sStyleReadInp_main_contact_title_lbl = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['main_contact_title_lbl']) && $this->nmgp_cmp_readonly['main_contact_title_lbl'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['main_contact_title_lbl']);
       $sStyleReadLab_main_contact_title_lbl = '';
       $sStyleReadInp_main_contact_title_lbl = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['main_contact_title_lbl']) && $this->nmgp_cmp_hidden['main_contact_title_lbl'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="main_contact_title_lbl" value="<?php echo $this->form_encode_input($main_contact_title_lbl) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_main_contact_title_lbl_line" id="hidden_field_data_main_contact_title_lbl" style="<?php echo $sStyleHidden_main_contact_title_lbl; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_main_contact_title_lbl_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_main_contact_title_lbl_label" style=""><span id="id_label_main_contact_title_lbl"><?php echo $this->nm_new_label['main_contact_title_lbl']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["main_contact_title_lbl"]) &&  $this->nmgp_cmp_readonly["main_contact_title_lbl"] == "on") { 

 ?>
<input type="hidden" name="main_contact_title_lbl" value="<?php echo $this->form_encode_input($main_contact_title_lbl) . "\">" . $main_contact_title_lbl . ""; ?>
<?php } else { ?>
<span id="id_read_on_main_contact_title_lbl" class="sc-ui-readonly-main_contact_title_lbl css_main_contact_title_lbl_line" style="<?php echo $sStyleReadLab_main_contact_title_lbl; ?>"><?php echo $this->form_format_readonly("main_contact_title_lbl", $this->form_encode_input($this->main_contact_title_lbl)); ?></span><span id="id_read_off_main_contact_title_lbl" class="css_read_off_main_contact_title_lbl<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_main_contact_title_lbl; ?>">
 <input class="sc-js-input scFormObjectOdd css_main_contact_title_lbl_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_main_contact_title_lbl" type=text name="main_contact_title_lbl" value="<?php echo $this->form_encode_input($main_contact_title_lbl) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_main_contact_title_lbl_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_main_contact_title_lbl_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['memb_01']))
    {
        $this->nm_new_label['memb_01'] = "1";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $memb_01 = $this->memb_01;
   $sStyleHidden_memb_01 = '';
   if (isset($this->nmgp_cmp_hidden['memb_01']) && $this->nmgp_cmp_hidden['memb_01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['memb_01']);
       $sStyleHidden_memb_01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_memb_01 = 'display: none;';
   $sStyleReadInp_memb_01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['memb_01']) && $this->nmgp_cmp_readonly['memb_01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['memb_01']);
       $sStyleReadLab_memb_01 = '';
       $sStyleReadInp_memb_01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['memb_01']) && $this->nmgp_cmp_hidden['memb_01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="memb_01" value="<?php echo $this->form_encode_input($memb_01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_memb_01_line" id="hidden_field_data_memb_01" style="<?php echo $sStyleHidden_memb_01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_memb_01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_memb_01_label" style=""><span id="id_label_memb_01"><?php echo $this->nm_new_label['memb_01']; ?></span></span><br><span id="id_ajax_label_memb_01"><?php echo $memb_01?></span>
<input type="hidden" name="memb_01" value="<?php echo $this->form_encode_input($memb_01); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_memb_01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_memb_01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['memb_02']))
    {
        $this->nm_new_label['memb_02'] = "2";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $memb_02 = $this->memb_02;
   $sStyleHidden_memb_02 = '';
   if (isset($this->nmgp_cmp_hidden['memb_02']) && $this->nmgp_cmp_hidden['memb_02'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['memb_02']);
       $sStyleHidden_memb_02 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_memb_02 = 'display: none;';
   $sStyleReadInp_memb_02 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['memb_02']) && $this->nmgp_cmp_readonly['memb_02'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['memb_02']);
       $sStyleReadLab_memb_02 = '';
       $sStyleReadInp_memb_02 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['memb_02']) && $this->nmgp_cmp_hidden['memb_02'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="memb_02" value="<?php echo $this->form_encode_input($memb_02) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_memb_02_line" id="hidden_field_data_memb_02" style="<?php echo $sStyleHidden_memb_02; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_memb_02_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_memb_02_label" style=""><span id="id_label_memb_02"><?php echo $this->nm_new_label['memb_02']; ?></span></span><br><span id="id_ajax_label_memb_02"><?php echo $memb_02?></span>
<input type="hidden" name="memb_02" value="<?php echo $this->form_encode_input($memb_02); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_memb_02_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_memb_02_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['memb_03']))
    {
        $this->nm_new_label['memb_03'] = "3";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $memb_03 = $this->memb_03;
   $sStyleHidden_memb_03 = '';
   if (isset($this->nmgp_cmp_hidden['memb_03']) && $this->nmgp_cmp_hidden['memb_03'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['memb_03']);
       $sStyleHidden_memb_03 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_memb_03 = 'display: none;';
   $sStyleReadInp_memb_03 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['memb_03']) && $this->nmgp_cmp_readonly['memb_03'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['memb_03']);
       $sStyleReadLab_memb_03 = '';
       $sStyleReadInp_memb_03 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['memb_03']) && $this->nmgp_cmp_hidden['memb_03'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="memb_03" value="<?php echo $this->form_encode_input($memb_03) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_memb_03_line" id="hidden_field_data_memb_03" style="<?php echo $sStyleHidden_memb_03; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_memb_03_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_memb_03_label" style=""><span id="id_label_memb_03"><?php echo $this->nm_new_label['memb_03']; ?></span></span><br><span id="id_ajax_label_memb_03"><?php echo $memb_03?></span>
<input type="hidden" name="memb_03" value="<?php echo $this->form_encode_input($memb_03); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_memb_03_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_memb_03_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['memb_04']))
    {
        $this->nm_new_label['memb_04'] = "#4";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $memb_04 = $this->memb_04;
   $sStyleHidden_memb_04 = '';
   if (isset($this->nmgp_cmp_hidden['memb_04']) && $this->nmgp_cmp_hidden['memb_04'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['memb_04']);
       $sStyleHidden_memb_04 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_memb_04 = 'display: none;';
   $sStyleReadInp_memb_04 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['memb_04']) && $this->nmgp_cmp_readonly['memb_04'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['memb_04']);
       $sStyleReadLab_memb_04 = '';
       $sStyleReadInp_memb_04 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['memb_04']) && $this->nmgp_cmp_hidden['memb_04'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="memb_04" value="<?php echo $this->form_encode_input($memb_04) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_memb_04_line" id="hidden_field_data_memb_04" style="<?php echo $sStyleHidden_memb_04; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_memb_04_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_memb_04_label" style=""><span id="id_label_memb_04"><?php echo $this->nm_new_label['memb_04']; ?></span></span><br><span id="id_ajax_label_memb_04"><?php echo $memb_04?></span>
<input type="hidden" name="memb_04" value="<?php echo $this->form_encode_input($memb_04); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_memb_04_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_memb_04_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['memb_05']))
    {
        $this->nm_new_label['memb_05'] = "#5";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $memb_05 = $this->memb_05;
   $sStyleHidden_memb_05 = '';
   if (isset($this->nmgp_cmp_hidden['memb_05']) && $this->nmgp_cmp_hidden['memb_05'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['memb_05']);
       $sStyleHidden_memb_05 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_memb_05 = 'display: none;';
   $sStyleReadInp_memb_05 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['memb_05']) && $this->nmgp_cmp_readonly['memb_05'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['memb_05']);
       $sStyleReadLab_memb_05 = '';
       $sStyleReadInp_memb_05 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['memb_05']) && $this->nmgp_cmp_hidden['memb_05'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="memb_05" value="<?php echo $this->form_encode_input($memb_05) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_memb_05_line" id="hidden_field_data_memb_05" style="<?php echo $sStyleHidden_memb_05; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_memb_05_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_memb_05_label" style=""><span id="id_label_memb_05"><?php echo $this->nm_new_label['memb_05']; ?></span></span><br><span id="id_ajax_label_memb_05"><?php echo $memb_05?></span>
<input type="hidden" name="memb_05" value="<?php echo $this->form_encode_input($memb_05); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_memb_05_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_memb_05_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['memb_06']))
    {
        $this->nm_new_label['memb_06'] = "#6";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $memb_06 = $this->memb_06;
   $sStyleHidden_memb_06 = '';
   if (isset($this->nmgp_cmp_hidden['memb_06']) && $this->nmgp_cmp_hidden['memb_06'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['memb_06']);
       $sStyleHidden_memb_06 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_memb_06 = 'display: none;';
   $sStyleReadInp_memb_06 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['memb_06']) && $this->nmgp_cmp_readonly['memb_06'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['memb_06']);
       $sStyleReadLab_memb_06 = '';
       $sStyleReadInp_memb_06 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['memb_06']) && $this->nmgp_cmp_hidden['memb_06'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="memb_06" value="<?php echo $this->form_encode_input($memb_06) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_memb_06_line" id="hidden_field_data_memb_06" style="<?php echo $sStyleHidden_memb_06; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_memb_06_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_memb_06_label" style=""><span id="id_label_memb_06"><?php echo $this->nm_new_label['memb_06']; ?></span></span><br><span id="id_ajax_label_memb_06"><?php echo $memb_06?></span>
<input type="hidden" name="memb_06" value="<?php echo $this->form_encode_input($memb_06); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_memb_06_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_memb_06_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['memb_07']))
    {
        $this->nm_new_label['memb_07'] = "#7";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $memb_07 = $this->memb_07;
   $sStyleHidden_memb_07 = '';
   if (isset($this->nmgp_cmp_hidden['memb_07']) && $this->nmgp_cmp_hidden['memb_07'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['memb_07']);
       $sStyleHidden_memb_07 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_memb_07 = 'display: none;';
   $sStyleReadInp_memb_07 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['memb_07']) && $this->nmgp_cmp_readonly['memb_07'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['memb_07']);
       $sStyleReadLab_memb_07 = '';
       $sStyleReadInp_memb_07 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['memb_07']) && $this->nmgp_cmp_hidden['memb_07'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="memb_07" value="<?php echo $this->form_encode_input($memb_07) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_memb_07_line" id="hidden_field_data_memb_07" style="<?php echo $sStyleHidden_memb_07; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_memb_07_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_memb_07_label" style=""><span id="id_label_memb_07"><?php echo $this->nm_new_label['memb_07']; ?></span></span><br><span id="id_ajax_label_memb_07"><?php echo $memb_07?></span>
<input type="hidden" name="memb_07" value="<?php echo $this->form_encode_input($memb_07); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_memb_07_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_memb_07_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['memb_08']))
    {
        $this->nm_new_label['memb_08'] = "#8";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $memb_08 = $this->memb_08;
   $sStyleHidden_memb_08 = '';
   if (isset($this->nmgp_cmp_hidden['memb_08']) && $this->nmgp_cmp_hidden['memb_08'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['memb_08']);
       $sStyleHidden_memb_08 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_memb_08 = 'display: none;';
   $sStyleReadInp_memb_08 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['memb_08']) && $this->nmgp_cmp_readonly['memb_08'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['memb_08']);
       $sStyleReadLab_memb_08 = '';
       $sStyleReadInp_memb_08 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['memb_08']) && $this->nmgp_cmp_hidden['memb_08'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="memb_08" value="<?php echo $this->form_encode_input($memb_08) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_memb_08_line" id="hidden_field_data_memb_08" style="<?php echo $sStyleHidden_memb_08; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_memb_08_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_memb_08_label" style=""><span id="id_label_memb_08"><?php echo $this->nm_new_label['memb_08']; ?></span></span><br><span id="id_ajax_label_memb_08"><?php echo $memb_08?></span>
<input type="hidden" name="memb_08" value="<?php echo $this->form_encode_input($memb_08); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_memb_08_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_memb_08_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['memb_09']))
    {
        $this->nm_new_label['memb_09'] = "#9";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $memb_09 = $this->memb_09;
   $sStyleHidden_memb_09 = '';
   if (isset($this->nmgp_cmp_hidden['memb_09']) && $this->nmgp_cmp_hidden['memb_09'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['memb_09']);
       $sStyleHidden_memb_09 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_memb_09 = 'display: none;';
   $sStyleReadInp_memb_09 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['memb_09']) && $this->nmgp_cmp_readonly['memb_09'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['memb_09']);
       $sStyleReadLab_memb_09 = '';
       $sStyleReadInp_memb_09 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['memb_09']) && $this->nmgp_cmp_hidden['memb_09'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="memb_09" value="<?php echo $this->form_encode_input($memb_09) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_memb_09_line" id="hidden_field_data_memb_09" style="<?php echo $sStyleHidden_memb_09; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_memb_09_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_memb_09_label" style=""><span id="id_label_memb_09"><?php echo $this->nm_new_label['memb_09']; ?></span></span><br><span id="id_ajax_label_memb_09"><?php echo $memb_09?></span>
<input type="hidden" name="memb_09" value="<?php echo $this->form_encode_input($memb_09); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_memb_09_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_memb_09_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['memb_10']))
    {
        $this->nm_new_label['memb_10'] = "#10";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $memb_10 = $this->memb_10;
   $sStyleHidden_memb_10 = '';
   if (isset($this->nmgp_cmp_hidden['memb_10']) && $this->nmgp_cmp_hidden['memb_10'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['memb_10']);
       $sStyleHidden_memb_10 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_memb_10 = 'display: none;';
   $sStyleReadInp_memb_10 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['memb_10']) && $this->nmgp_cmp_readonly['memb_10'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['memb_10']);
       $sStyleReadLab_memb_10 = '';
       $sStyleReadInp_memb_10 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['memb_10']) && $this->nmgp_cmp_hidden['memb_10'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="memb_10" value="<?php echo $this->form_encode_input($memb_10) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_memb_10_line" id="hidden_field_data_memb_10" style="<?php echo $sStyleHidden_memb_10; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_memb_10_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_memb_10_label" style=""><span id="id_label_memb_10"><?php echo $this->nm_new_label['memb_10']; ?></span></span><br><span id="id_ajax_label_memb_10"><?php echo $memb_10?></span>
<input type="hidden" name="memb_10" value="<?php echo $this->form_encode_input($memb_10); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_memb_10_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_memb_10_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['memb_11']))
    {
        $this->nm_new_label['memb_11'] = "#11";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $memb_11 = $this->memb_11;
   $sStyleHidden_memb_11 = '';
   if (isset($this->nmgp_cmp_hidden['memb_11']) && $this->nmgp_cmp_hidden['memb_11'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['memb_11']);
       $sStyleHidden_memb_11 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_memb_11 = 'display: none;';
   $sStyleReadInp_memb_11 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['memb_11']) && $this->nmgp_cmp_readonly['memb_11'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['memb_11']);
       $sStyleReadLab_memb_11 = '';
       $sStyleReadInp_memb_11 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['memb_11']) && $this->nmgp_cmp_hidden['memb_11'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="memb_11" value="<?php echo $this->form_encode_input($memb_11) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_memb_11_line" id="hidden_field_data_memb_11" style="<?php echo $sStyleHidden_memb_11; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_memb_11_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_memb_11_label" style=""><span id="id_label_memb_11"><?php echo $this->nm_new_label['memb_11']; ?></span></span><br><span id="id_ajax_label_memb_11"><?php echo $memb_11?></span>
<input type="hidden" name="memb_11" value="<?php echo $this->form_encode_input($memb_11); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_memb_11_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_memb_11_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['memb_12']))
    {
        $this->nm_new_label['memb_12'] = "#12";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $memb_12 = $this->memb_12;
   $sStyleHidden_memb_12 = '';
   if (isset($this->nmgp_cmp_hidden['memb_12']) && $this->nmgp_cmp_hidden['memb_12'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['memb_12']);
       $sStyleHidden_memb_12 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_memb_12 = 'display: none;';
   $sStyleReadInp_memb_12 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['memb_12']) && $this->nmgp_cmp_readonly['memb_12'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['memb_12']);
       $sStyleReadLab_memb_12 = '';
       $sStyleReadInp_memb_12 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['memb_12']) && $this->nmgp_cmp_hidden['memb_12'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="memb_12" value="<?php echo $this->form_encode_input($memb_12) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_memb_12_line" id="hidden_field_data_memb_12" style="<?php echo $sStyleHidden_memb_12; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_memb_12_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_memb_12_label" style=""><span id="id_label_memb_12"><?php echo $this->nm_new_label['memb_12']; ?></span></span><br><span id="id_ajax_label_memb_12"><?php echo $memb_12?></span>
<input type="hidden" name="memb_12" value="<?php echo $this->form_encode_input($memb_12); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_memb_12_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_memb_12_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['memb_13']))
    {
        $this->nm_new_label['memb_13'] = "#13";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $memb_13 = $this->memb_13;
   $sStyleHidden_memb_13 = '';
   if (isset($this->nmgp_cmp_hidden['memb_13']) && $this->nmgp_cmp_hidden['memb_13'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['memb_13']);
       $sStyleHidden_memb_13 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_memb_13 = 'display: none;';
   $sStyleReadInp_memb_13 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['memb_13']) && $this->nmgp_cmp_readonly['memb_13'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['memb_13']);
       $sStyleReadLab_memb_13 = '';
       $sStyleReadInp_memb_13 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['memb_13']) && $this->nmgp_cmp_hidden['memb_13'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="memb_13" value="<?php echo $this->form_encode_input($memb_13) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_memb_13_line" id="hidden_field_data_memb_13" style="<?php echo $sStyleHidden_memb_13; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_memb_13_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_memb_13_label" style=""><span id="id_label_memb_13"><?php echo $this->nm_new_label['memb_13']; ?></span></span><br><span id="id_ajax_label_memb_13"><?php echo $memb_13?></span>
<input type="hidden" name="memb_13" value="<?php echo $this->form_encode_input($memb_13); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_memb_13_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_memb_13_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['memb_email']))
    {
        $this->nm_new_label['memb_email'] = "Email";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $memb_email = $this->memb_email;
   $sStyleHidden_memb_email = '';
   if (isset($this->nmgp_cmp_hidden['memb_email']) && $this->nmgp_cmp_hidden['memb_email'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['memb_email']);
       $sStyleHidden_memb_email = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_memb_email = 'display: none;';
   $sStyleReadInp_memb_email = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['memb_email']) && $this->nmgp_cmp_readonly['memb_email'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['memb_email']);
       $sStyleReadLab_memb_email = '';
       $sStyleReadInp_memb_email = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['memb_email']) && $this->nmgp_cmp_hidden['memb_email'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="memb_email" value="<?php echo $this->form_encode_input($memb_email) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_memb_email_line" id="hidden_field_data_memb_email" style="<?php echo $sStyleHidden_memb_email; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_memb_email_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_memb_email_label" style=""><span id="id_label_memb_email"><?php echo $this->nm_new_label['memb_email']; ?></span></span><br><span id="id_read_on_memb_email css_memb_email_line" style="<?php echo $sStyleReadLab_memb_email; ?>"><?php echo $fieldContent; ?></span><span id="id_read_off_memb_email" class="css_read_off_memb_email" style="<?php echo $sStyleReadInp_memb_email; ?>"><span id="id_ajax_label_memb_email"><?php echo $memb_email?></span>
</span><input type="hidden" name="memb_email" value="<?php echo $this->form_encode_input($memb_email); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_memb_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_memb_email_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['memb_levels']))
    {
        $this->nm_new_label['memb_levels'] = "memb_levels";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $memb_levels = $this->memb_levels;
   $sStyleHidden_memb_levels = '';
   if (isset($this->nmgp_cmp_hidden['memb_levels']) && $this->nmgp_cmp_hidden['memb_levels'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['memb_levels']);
       $sStyleHidden_memb_levels = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_memb_levels = 'display: none;';
   $sStyleReadInp_memb_levels = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['memb_levels']) && $this->nmgp_cmp_readonly['memb_levels'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['memb_levels']);
       $sStyleReadLab_memb_levels = '';
       $sStyleReadInp_memb_levels = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['memb_levels']) && $this->nmgp_cmp_hidden['memb_levels'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="memb_levels" value="<?php echo $this->form_encode_input($memb_levels) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_memb_levels_line" id="hidden_field_data_memb_levels" style="<?php echo $sStyleHidden_memb_levels; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_memb_levels_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_memb_levels_label" style=""><span id="id_label_memb_levels"><?php echo $this->nm_new_label['memb_levels']; ?></span></span><br><span id="id_read_on_memb_levels css_memb_levels_line" style="<?php echo $sStyleReadLab_memb_levels; ?>"><?php echo $fieldContent; ?></span><span id="id_read_off_memb_levels" class="css_read_off_memb_levels" style="<?php echo $sStyleReadInp_memb_levels; ?>"><span id="id_ajax_label_memb_levels"><?php echo $memb_levels?></span>
</span><input type="hidden" name="memb_levels" value="<?php echo $this->form_encode_input($memb_levels); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_memb_levels_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_memb_levels_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['memb_name']))
    {
        $this->nm_new_label['memb_name'] = "Name";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $memb_name = $this->memb_name;
   $sStyleHidden_memb_name = '';
   if (isset($this->nmgp_cmp_hidden['memb_name']) && $this->nmgp_cmp_hidden['memb_name'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['memb_name']);
       $sStyleHidden_memb_name = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_memb_name = 'display: none;';
   $sStyleReadInp_memb_name = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['memb_name']) && $this->nmgp_cmp_readonly['memb_name'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['memb_name']);
       $sStyleReadLab_memb_name = '';
       $sStyleReadInp_memb_name = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['memb_name']) && $this->nmgp_cmp_hidden['memb_name'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="memb_name" value="<?php echo $this->form_encode_input($memb_name) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_memb_name_line" id="hidden_field_data_memb_name" style="<?php echo $sStyleHidden_memb_name; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_memb_name_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_memb_name_label" style=""><span id="id_label_memb_name"><?php echo $this->nm_new_label['memb_name']; ?></span></span><br><span id="id_read_on_memb_name css_memb_name_line" style="<?php echo $sStyleReadLab_memb_name; ?>"><?php echo $fieldContent; ?></span><span id="id_read_off_memb_name" class="css_read_off_memb_name" style="<?php echo $sStyleReadInp_memb_name; ?>"><span id="id_ajax_label_memb_name"><?php echo $memb_name?></span>
</span><input type="hidden" name="memb_name" value="<?php echo $this->form_encode_input($memb_name); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_memb_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_memb_name_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['memb_note']))
    {
        $this->nm_new_label['memb_note'] = "Note";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $memb_note = $this->memb_note;
   $sStyleHidden_memb_note = '';
   if (isset($this->nmgp_cmp_hidden['memb_note']) && $this->nmgp_cmp_hidden['memb_note'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['memb_note']);
       $sStyleHidden_memb_note = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_memb_note = 'display: none;';
   $sStyleReadInp_memb_note = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['memb_note']) && $this->nmgp_cmp_readonly['memb_note'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['memb_note']);
       $sStyleReadLab_memb_note = '';
       $sStyleReadInp_memb_note = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['memb_note']) && $this->nmgp_cmp_hidden['memb_note'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="memb_note" value="<?php echo $this->form_encode_input($memb_note) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_memb_note_line" id="hidden_field_data_memb_note" style="<?php echo $sStyleHidden_memb_note; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_memb_note_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_memb_note_label" style=""><span id="id_label_memb_note"><?php echo $this->nm_new_label['memb_note']; ?></span></span><br><span id="id_read_on_memb_note css_memb_note_line" style="<?php echo $sStyleReadLab_memb_note; ?>"><?php echo $fieldContent; ?></span><span id="id_read_off_memb_note" class="css_read_off_memb_note" style="<?php echo $sStyleReadInp_memb_note; ?>"><span id="id_ajax_label_memb_note"><?php echo $memb_note?></span>
</span><input type="hidden" name="memb_note" value="<?php echo $this->form_encode_input($memb_note); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_memb_note_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_memb_note_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['memb_phone']))
    {
        $this->nm_new_label['memb_phone'] = "Phone";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $memb_phone = $this->memb_phone;
   $sStyleHidden_memb_phone = '';
   if (isset($this->nmgp_cmp_hidden['memb_phone']) && $this->nmgp_cmp_hidden['memb_phone'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['memb_phone']);
       $sStyleHidden_memb_phone = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_memb_phone = 'display: none;';
   $sStyleReadInp_memb_phone = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['memb_phone']) && $this->nmgp_cmp_readonly['memb_phone'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['memb_phone']);
       $sStyleReadLab_memb_phone = '';
       $sStyleReadInp_memb_phone = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['memb_phone']) && $this->nmgp_cmp_hidden['memb_phone'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="memb_phone" value="<?php echo $this->form_encode_input($memb_phone) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_memb_phone_line" id="hidden_field_data_memb_phone" style="<?php echo $sStyleHidden_memb_phone; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_memb_phone_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_memb_phone_label" style=""><span id="id_label_memb_phone"><?php echo $this->nm_new_label['memb_phone']; ?></span></span><br><span id="id_read_on_memb_phone css_memb_phone_line" style="<?php echo $sStyleReadLab_memb_phone; ?>"><?php echo $fieldContent; ?></span><span id="id_read_off_memb_phone" class="css_read_off_memb_phone" style="<?php echo $sStyleReadInp_memb_phone; ?>"><span id="id_ajax_label_memb_phone"><?php echo $memb_phone?></span>
</span><input type="hidden" name="memb_phone" value="<?php echo $this->form_encode_input($memb_phone); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_memb_phone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_memb_phone_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['read_at_sign']))
    {
        $this->nm_new_label['read_at_sign'] = "";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $read_at_sign = $this->read_at_sign;
   $sStyleHidden_read_at_sign = '';
   if (isset($this->nmgp_cmp_hidden['read_at_sign']) && $this->nmgp_cmp_hidden['read_at_sign'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['read_at_sign']);
       $sStyleHidden_read_at_sign = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_read_at_sign = 'display: none;';
   $sStyleReadInp_read_at_sign = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['read_at_sign']) && $this->nmgp_cmp_readonly['read_at_sign'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['read_at_sign']);
       $sStyleReadLab_read_at_sign = '';
       $sStyleReadInp_read_at_sign = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['read_at_sign']) && $this->nmgp_cmp_hidden['read_at_sign'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="read_at_sign" value="<?php echo $this->form_encode_input($read_at_sign) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_read_at_sign_line" id="hidden_field_data_read_at_sign" style="<?php echo $sStyleHidden_read_at_sign; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_read_at_sign_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_read_at_sign_label" style=""><span id="id_label_read_at_sign"><?php echo $this->nm_new_label['read_at_sign']; ?></span></span><br><span id="id_read_on_read_at_sign css_read_at_sign_line" style="<?php echo $sStyleReadLab_read_at_sign; ?>"><?php echo $fieldContent; ?></span><span id="id_read_off_read_at_sign" class="css_read_off_read_at_sign" style="<?php echo $sStyleReadInp_read_at_sign; ?>"><span id="id_ajax_label_read_at_sign"><?php echo $read_at_sign?></span>
</span><input type="hidden" name="read_at_sign" value="<?php echo $this->form_encode_input($read_at_sign); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_read_at_sign_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_read_at_sign_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rules']))
    {
        $this->nm_new_label['rules'] = "rules";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rules = $this->rules;
   $sStyleHidden_rules = '';
   if (isset($this->nmgp_cmp_hidden['rules']) && $this->nmgp_cmp_hidden['rules'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rules']);
       $sStyleHidden_rules = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rules = 'display: none;';
   $sStyleReadInp_rules = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rules']) && $this->nmgp_cmp_readonly['rules'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rules']);
       $sStyleReadLab_rules = '';
       $sStyleReadInp_rules = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rules']) && $this->nmgp_cmp_hidden['rules'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rules" value="<?php echo $this->form_encode_input($rules) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_rules_line" id="hidden_field_data_rules" style="<?php echo $sStyleHidden_rules; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rules_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_rules_label" style=""><span id="id_label_rules"><?php echo $this->nm_new_label['rules']; ?></span></span><br><span id="id_read_on_rules css_rules_line" style="<?php echo $sStyleReadLab_rules; ?>"><?php echo $fieldContent; ?></span><span id="id_read_off_rules" class="css_read_off_rules" style="<?php echo $sStyleReadInp_rules; ?>"><span id="id_ajax_label_rules"><?php echo $rules?></span>
</span><input type="hidden" name="rules" value="<?php echo $this->form_encode_input($rules); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rules_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rules_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rules_warn']))
    {
        $this->nm_new_label['rules_warn'] = "rules_warn";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rules_warn = $this->rules_warn;
   $sStyleHidden_rules_warn = '';
   if (isset($this->nmgp_cmp_hidden['rules_warn']) && $this->nmgp_cmp_hidden['rules_warn'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rules_warn']);
       $sStyleHidden_rules_warn = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rules_warn = 'display: none;';
   $sStyleReadInp_rules_warn = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rules_warn']) && $this->nmgp_cmp_readonly['rules_warn'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rules_warn']);
       $sStyleReadLab_rules_warn = '';
       $sStyleReadInp_rules_warn = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rules_warn']) && $this->nmgp_cmp_hidden['rules_warn'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rules_warn" value="<?php echo $this->form_encode_input($rules_warn) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_rules_warn_line" id="hidden_field_data_rules_warn" style="<?php echo $sStyleHidden_rules_warn; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rules_warn_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_rules_warn_label" style=""><span id="id_label_rules_warn"><?php echo $this->nm_new_label['rules_warn']; ?></span></span><br><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__bg__NM__pfm_logo_small.png"))
          { 
              $rules_warn = "&nbsp;" ;  
          } 
          elseif ($this->Ini->Gd_missing) 
          { 
              $rules_warn = "<span class=\"scFormErrorMessage scFormToastMessage\">" . $this->Ini->Nm_lang['lang_errm_gd'] . "</span>"; 
          } 
          else 
          { 
              $in_rules_warn = $this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__bg__NM__pfm_logo_small.png"; 
              $img_time = filemtime($this->Ini->root . $this->Ini->path_imag_cab . "/grp__NM__bg__NM__pfm_logo_small.png"); 
              $out_rules_warn = str_replace("/", "_", $this->Ini->path_imag_cab); 
              $prt_rules_warn = "sc_" . $out_rules_warn . "_rules_warn_100100_" . $img_time . "_grp__NM__bg__NM__pfm_logo_small.png";
              $out_rules_warn = $this->Ini->path_imag_temp . "/sc_" . $out_rules_warn . "_rules_warn_100100_" . $img_time . "_grp__NM__bg__NM__pfm_logo_small.png";
              if (!is_file($this->Ini->root . $out_rules_warn)) 
              {  
                  $sc_obj_img = new nm_trata_img($in_rules_warn, true);
                  $sc_obj_img->setWidth(100);
                  $sc_obj_img->setHeight(100);
                  $sc_obj_img->setManterAspecto(true);
                  $sc_obj_img->createImg($this->Ini->root . $out_rules_warn);
              } 
              if ($this->Ini->Export_img_zip) {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . $out_rules_warn;
                  $rules_warn = "<img  border=\"0\" src=\"" . $prt_rules_warn . "\"/>" ; 
              }
              else {
                  $rules_warn = "<img  border=\"0\" src=\"" . $out_rules_warn . "\"/>" ; 
              }
          } 
?>
<span id="id_imghtml_rules_warn"><?php echo $rules_warn; ?>
</span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rules_warn"]) &&  $this->nmgp_cmp_readonly["rules_warn"] == "on") { 

 ?>
<input type="hidden" name="rules_warn" value="<?php echo $this->form_encode_input($rules_warn) . "\">" . $rules_warn . ""; ?>
<?php } else { ?>
<span id="id_read_on_rules_warn" class="sc-ui-readonly-rules_warn css_rules_warn_line" style="<?php echo $sStyleReadLab_rules_warn; ?>"><?php echo $this->form_format_readonly("rules_warn", $this->form_encode_input($this->rules_warn)); ?></span><span id="id_read_off_rules_warn" class="css_read_off_rules_warn<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rules_warn; ?>"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rules_warn_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rules_warn_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['xlsx_sample']))
    {
        $this->nm_new_label['xlsx_sample'] = "If more than 10 buyers are needed, you can use an <b>Excel file</b> to upload any additional buyers beyond the 10 already entered.<br>Please create, fill out, and upload an <b>Excel file</b> including the column headers listed in the example below:<br>";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $xlsx_sample = $this->xlsx_sample;
   $sStyleHidden_xlsx_sample = '';
   if (isset($this->nmgp_cmp_hidden['xlsx_sample']) && $this->nmgp_cmp_hidden['xlsx_sample'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['xlsx_sample']);
       $sStyleHidden_xlsx_sample = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_xlsx_sample = 'display: none;';
   $sStyleReadInp_xlsx_sample = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['xlsx_sample']) && $this->nmgp_cmp_readonly['xlsx_sample'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['xlsx_sample']);
       $sStyleReadLab_xlsx_sample = '';
       $sStyleReadInp_xlsx_sample = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['xlsx_sample']) && $this->nmgp_cmp_hidden['xlsx_sample'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="xlsx_sample" value="<?php echo $this->form_encode_input($xlsx_sample) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_xlsx_sample_line" id="hidden_field_data_xlsx_sample" style="<?php echo $sStyleHidden_xlsx_sample; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_xlsx_sample_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_xlsx_sample_label" style=""><span id="id_label_xlsx_sample"><?php echo $this->nm_new_label['xlsx_sample']; ?></span></span><br><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__bg__NM__buyers_upload_sample.png"))
          { 
              $xlsx_sample = "&nbsp;" ;  
          } 
          else 
          { 
              if ($this->Ini->Export_img_zip) {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . "/grp__NM__bg__NM__buyers_upload_sample.png";
                  $xlsx_sample = "<img border=\"1\" src=\"grp__NM__bg__NM__buyers_upload_sample.png\"/>" ; 
              }
              else {
                  $xlsx_sample = "<img border=\"1\" src=\"" . $this->Ini->path_imag_cab . "/grp__NM__bg__NM__buyers_upload_sample.png\"/>" ; 
              }
          } 
?>
<span id="id_imghtml_xlsx_sample"><?php echo $xlsx_sample; ?>
</span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["xlsx_sample"]) &&  $this->nmgp_cmp_readonly["xlsx_sample"] == "on") { 

 ?>
<input type="hidden" name="xlsx_sample" value="<?php echo $this->form_encode_input($xlsx_sample) . "\">" . $xlsx_sample . ""; ?>
<?php } else { ?>
<span id="id_read_on_xlsx_sample" class="sc-ui-readonly-xlsx_sample css_xlsx_sample_line" style="<?php echo $sStyleReadLab_xlsx_sample; ?>"><?php echo $this->form_format_readonly("xlsx_sample", $this->form_encode_input($this->xlsx_sample)); ?></span><span id="id_read_off_xlsx_sample" class="css_read_off_xlsx_sample<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_xlsx_sample; ?>"></span><?php } ?>
<span class="scFormDataTagOdd" style="display: block">Example of the Excel File Format for Uploading Additional Buyers</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_xlsx_sample_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_xlsx_sample_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['est_memb_cost']))
    {
        $this->nm_new_label['est_memb_cost'] = "est_memb_cost";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $est_memb_cost = $this->est_memb_cost;
   $sStyleHidden_est_memb_cost = '';
   if (isset($this->nmgp_cmp_hidden['est_memb_cost']) && $this->nmgp_cmp_hidden['est_memb_cost'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['est_memb_cost']);
       $sStyleHidden_est_memb_cost = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_est_memb_cost = 'display: none;';
   $sStyleReadInp_est_memb_cost = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['est_memb_cost']) && $this->nmgp_cmp_readonly['est_memb_cost'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['est_memb_cost']);
       $sStyleReadLab_est_memb_cost = '';
       $sStyleReadInp_est_memb_cost = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['est_memb_cost']) && $this->nmgp_cmp_hidden['est_memb_cost'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="est_memb_cost" value="<?php echo $this->form_encode_input($est_memb_cost) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_est_memb_cost_line" id="hidden_field_data_est_memb_cost" style="<?php echo $sStyleHidden_est_memb_cost; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_est_memb_cost_line" style="padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_est_memb_cost_label" style=""><span id="id_label_est_memb_cost"><?php echo $this->nm_new_label['est_memb_cost']; ?></span></span><br><span id="id_read_on_est_memb_cost css_est_memb_cost_line" style="<?php echo $sStyleReadLab_est_memb_cost; ?>"><?php echo $fieldContent; ?></span><span id="id_read_off_est_memb_cost" class="css_read_off_est_memb_cost" style="<?php echo $sStyleReadInp_est_memb_cost; ?>"><span id="id_ajax_label_est_memb_cost"><?php echo $est_memb_cost?></span>
</span><input type="hidden" name="est_memb_cost" value="<?php echo $this->form_encode_input($est_memb_cost); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_est_memb_cost_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_est_memb_cost_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['pay']))
    {
        $this->nm_new_label['pay'] = "Pay Membership";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pay = $this->pay;
   $sStyleHidden_pay = '';
   if (isset($this->nmgp_cmp_hidden['pay']) && $this->nmgp_cmp_hidden['pay'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pay']);
       $sStyleHidden_pay = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pay = 'display: none;';
   $sStyleReadInp_pay = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pay']) && $this->nmgp_cmp_readonly['pay'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pay']);
       $sStyleReadLab_pay = '';
       $sStyleReadInp_pay = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pay']) && $this->nmgp_cmp_hidden['pay'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pay" value="<?php echo $this->form_encode_input($pay) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_pay_line" id="hidden_field_data_pay" style="<?php echo $sStyleHidden_pay; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pay_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_pay_label" style=""><span id="id_label_pay"><?php echo $this->nm_new_label['pay']; ?></span></span><br><?php
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__bg__NM__memb_pmt_02.png"))
          { 
              $pay = "&nbsp;" ;  
          } 
          else 
          { 
              if ($this->Ini->Export_img_zip) {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . "/grp__NM__bg__NM__memb_pmt_02.png";
                  $pay = "<img border=\"0\" src=\"grp__NM__bg__NM__memb_pmt_02.png\"/>" ; 
              }
              else {
                  $pay = "<img border=\"0\" src=\"" . $this->Ini->path_imag_cab . "/grp__NM__bg__NM__memb_pmt_02.png\"/>" ; 
              }
          } 
?>
<span id="id_imghtml_pay"><?php echo $pay; ?>
</span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pay"]) &&  $this->nmgp_cmp_readonly["pay"] == "on") { 

 ?>
<input type="hidden" name="pay" value="<?php echo $this->form_encode_input($pay) . "\">" . $pay . ""; ?>
<?php } else { ?>
<span id="id_read_on_pay" class="sc-ui-readonly-pay css_pay_line" style="<?php echo $sStyleReadLab_pay; ?>"><?php echo $this->form_format_readonly("pay", $this->form_encode_input($this->pay)); ?></span><span id="id_read_off_pay" class="css_read_off_pay<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pay; ?>"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pay_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pay_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
   </td></tr></table>
   </tr>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
    $NM_btn = false;
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['run_iframe'] != "R")
{
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-1';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_label']['new'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-2';
        $buttonMacroLabel = "Submit Application";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_label']['insert'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "Enabled once all needed fields are completed", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-3';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_label']['update'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-4';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_disabled']['bstepretorna']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_disabled']['bstepretorna']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_label']['bstepretorna']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_label']['bstepretorna']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_label']['bstepretorna'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bstepretorna", "scBtnFn_sys_format_stepret()", "scBtnFn_sys_format_stepret()", "sc_b_stepret_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-5';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_disabled']['bstepavanca']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_disabled']['bstepavanca']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_label']['bstepavanca']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_label']['bstepavanca']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_label']['bstepavanca'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bstepavanca", "scBtnFn_sys_format_stepava()", "scBtnFn_sys_format_stepava()", "sc_b_stepavc_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
        $sCondStyle = ($this->nmgp_botoes['pdf_download'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_disabled']['pdf_download']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_disabled']['pdf_download']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_label']['pdf_download']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_label']['pdf_download']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_label']['pdf_download'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "pdf_download", "scBtnFn_pdf_download()", "scBtnFn_pdf_download()", "sc_pdf_download_bot", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
        $sCondStyle = ($this->nmgp_botoes['btn_exit_app'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_disabled']['btn_exit_app']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_disabled']['btn_exit_app']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_label']['btn_exit_app']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_label']['btn_exit_app']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_label']['btn_exit_app'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "btn_exit_app", "scBtnFn_btn_exit_app()", "scBtnFn_btn_exit_app()", "sc_btn_exit_app_bot", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    if (isset($this->NMSC_modal) && $this->NMSC_modal == "ok") {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai_modal()", "scBtnFn_sys_format_sai_modal()", "sc_b_sai_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['run_iframe'] != "R")
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
<script type="text/javascript">
$(function() {
    if ('page' == wizardViewMode) {
        scJQWizardGoToPage(<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['form_wizard']['actual_step']; ?>);
        $(".sc-form-page").on("click", function() {
            var thisStepNo = $(this).attr("id").substr(16);
            scJQWizardPageClick(thisStepNo);
        });
    } else {
        scJQWizardGoToStep(<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['form_wizard']['actual_step']; ?>);
        $(".sc-ui-form-step").on("click", function() {
            var thisStepNo = $(this).attr("id").substr(16);
            scJQWizardStepClick(thisStepNo);
        });
    }
});
</script>
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
  $nm_sc_blocos_da_pag = array(0);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_clients_steps_appn_test");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_clients_steps_appn_test");
 parent.scAjaxDetailHeight("form_clients_steps_appn_test", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_clients_steps_appn_test", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_clients_steps_appn_test", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['sc_modal'])
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
        function scBtnFn_sys_format_inc() {
                if ($("#sc_b_new_b.sc-unique-btn-1").length && $("#sc_b_new_b.sc-unique-btn-1").is(":visible")) {
                    if ($("#sc_b_new_b.sc-unique-btn-1").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('novo');
                         return;
                }
                if ($("#sc_b_ins_b.sc-unique-btn-2").length && $("#sc_b_ins_b.sc-unique-btn-2").is(":visible")) {
                    if ($("#sc_b_ins_b.sc-unique-btn-2").hasClass("disabled")) {
                        return;
                    }
                        nm_atualiza ('incluir');
                         return;
                }
        }
        function scBtnFn_sys_format_alt() {
                if ($("#sc_b_upd_b.sc-unique-btn-3").length && $("#sc_b_upd_b.sc-unique-btn-3").is(":visible")) {
                    if ($("#sc_b_upd_b.sc-unique-btn-3").hasClass("disabled")) {
                        return;
                    }
                        nm_atualiza ('alterar');
                         return;
                }
        }
        function scBtnFn_sys_format_stepret() {
                if ($("#sc_b_stepret_b.sc-unique-btn-4").length && $("#sc_b_stepret_b.sc-unique-btn-4").is(":visible")) {
                    if ($("#sc_b_stepret_b.sc-unique-btn-4").hasClass("disabled")) {
                        return;
                    }
                        scJQWizardGoToPreviousStep()
                         return;
                }
        }
        function scBtnFn_sys_format_stepava() {
                if ($("#sc_b_stepavc_b.sc-unique-btn-5").length && $("#sc_b_stepavc_b.sc-unique-btn-5").is(":visible")) {
                    if ($("#sc_b_stepavc_b.sc-unique-btn-5").hasClass("disabled")) {
                        return;
                    }
                        scJQWizardGoToNextStep()
                         return;
                }
        }
        function scBtnFn_pdf_download() {
                if ($("#sc_pdf_download_bot").length && $("#sc_pdf_download_bot").is(":visible")) {
                    if ($("#sc_pdf_download_bot").hasClass("disabled")) {
                        return;
                    }
                        sc_btn_pdf_download()
                         return;
                }
        }
        function scBtnFn_btn_exit_app() {
                if ($("#sc_btn_exit_app_bot").length && $("#sc_btn_exit_app_bot").is(":visible")) {
                    if ($("#sc_btn_exit_app_bot").hasClass("disabled")) {
                        return;
                    }
                        sc_btn_btn_exit_app()
                         return;
                }
        }
        function scBtnFn_sys_format_sai_modal() {
                if ($("#sc_b_sai_b.sc-unique-btn-6").length && $("#sc_b_sai_b.sc-unique-btn-6").is(":visible")) {
                    if ($("#sc_b_sai_b.sc-unique-btn-6").hasClass("disabled")) {
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_test']['buttonStatus'] = $this->nmgp_botoes;
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
