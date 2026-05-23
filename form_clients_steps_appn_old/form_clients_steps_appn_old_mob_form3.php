<div id="form_clients_steps_appn_old_mob_form3" style='<?php echo (3 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['form_wizard']['actual_step'] ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow scBlockRowFirst"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_4" class="scBlockFrame"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_4" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['client_id']))
           {
               $this->nmgp_cmp_readonly['client_id'] = 'on';
           }
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

    <TD class="scFormDataOdd css_applicant_name_line" id="hidden_field_data_applicant_name" style="<?php echo $sStyleHidden_applicant_name; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_applicant_name_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_applicant_name_label" style=""><span id="id_label_applicant_name"><?php echo $this->nm_new_label['applicant_name']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['php_cmp_required']['applicant_name']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['php_cmp_required']['applicant_name'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></span><br>
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






<?php $sStyleHidden_applicant_title_dumb = ('' == $sStyleHidden_applicant_title) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_applicant_title_dumb" style="<?php echo $sStyleHidden_applicant_title_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_5"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_5" class="scBlockFrame"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_5" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
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

    <TD class="scFormDataOdd css_applicant_signature_line" id="hidden_field_data_applicant_signature" style="<?php echo $sStyleHidden_applicant_signature; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_applicant_signature_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_applicant_signature_label" style=""><span id="id_label_applicant_signature"><?php echo $this->nm_new_label['applicant_signature']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['php_cmp_required']['applicant_signature']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['php_cmp_required']['applicant_signature'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></span><br><span id="id_read_on_applicant_signature" style="<?php echo $sStyleReadLab_applicant_signature; ?>"><div id="sc-id-ronly-applicant_signature" style="width: 100%; background-color: #F8F9FA"><img style="border-width: 0" /></div>
</span><span id="id_read_off_applicant_signature" class="css_read_off_applicant_signature" style="<?php echo $sStyleReadInp_applicant_signature; ?>"><input type="hidden" name="applicant_signature" id="id_sc_field_applicant_signature" value="<?php echo $this->applicant_signature ?>" />
<div class="sc-ui-sign" id="sc-id-sign-applicant_signature" style="width: 100%; background-color: #F8F9FA"></div>
<div id="sc-id-disabled-applicant_signature" style="display: none; width: 100%; background-color: #F8F9FA"><img style="border-width: 0" /></div>
<br />
<?php echo nmButtonOutput($this->arr_buttons, "bclear", "scJQSignatureClear('applicant_signature')", "scJQSignatureClear('applicant_signature')", "btn_sign_clear_applicant_signature", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>

</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_applicant_signature_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_applicant_signature_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
</td></tr>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
    $NM_btn = false;
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['run_iframe'] != "R")
{
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b"></span> 
<?php 
}
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['btn_label']['first'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['btn_label']['back'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['btn_label']['forward'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['btn_label']['last'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if (isset($this->NMSC_modal) && $this->NMSC_modal == "ok") {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-11';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai_modal()", "scBtnFn_sys_format_sai_modal()", "sc_b_sai_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
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
        scJQWizardGoToPage(<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['form_wizard']['actual_step']; ?>);
        $(".sc-form-page").on("click", function() {
            var thisStepNo = $(this).attr("id").substr(16);
            scJQWizardPageClick(thisStepNo);
        });
    } else {
        scJQWizardGoToStep(<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['form_wizard']['actual_step']; ?>);
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
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_clients_steps_appn_old_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_clients_steps_appn_old_mob");
 parent.scAjaxDetailHeight("form_clients_steps_appn_old_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_clients_steps_appn_old_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_clients_steps_appn_old_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['sc_modal'])
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
                        toggleToolbar(event, true); return;
                }
                if ($("#sc_b_ins_b.sc-unique-btn-2").length && $("#sc_b_ins_b.sc-unique-btn-2").is(":visible")) {
                    if ($("#sc_b_ins_b.sc-unique-btn-2").hasClass("disabled")) {
                        return;
                    }
                        nm_atualiza ('incluir');
                        toggleToolbar(event, true); return;
                }
        }
        function scBtnFn_sys_format_alt() {
                if ($("#sc_b_upd_b.sc-unique-btn-3").length && $("#sc_b_upd_b.sc-unique-btn-3").is(":visible")) {
                    if ($("#sc_b_upd_b.sc-unique-btn-3").hasClass("disabled")) {
                        return;
                    }
                        nm_atualiza ('alterar');
                        toggleToolbar(event, true); return;
                }
        }
        function scBtnFn_sys_format_stepret() {
                if ($("#sc_b_stepret_b.sc-unique-btn-4").length && $("#sc_b_stepret_b.sc-unique-btn-4").is(":visible")) {
                    if ($("#sc_b_stepret_b.sc-unique-btn-4").hasClass("disabled")) {
                        return;
                    }
                        scJQWizardGoToPreviousStep()
                        toggleToolbar(event, true); return;
                }
        }
        function scBtnFn_sys_format_stepava() {
                if ($("#sc_b_stepavc_b.sc-unique-btn-5").length && $("#sc_b_stepavc_b.sc-unique-btn-5").is(":visible")) {
                    if ($("#sc_b_stepavc_b.sc-unique-btn-5").hasClass("disabled")) {
                        return;
                    }
                        scJQWizardGoToNextStep()
                        toggleToolbar(event, true); return;
                }
        }
        function scBtnFn_pdf_download() {
                if ($("#sc_pdf_download_bot").length && $("#sc_pdf_download_bot").is(":visible")) {
                    if ($("#sc_pdf_download_bot").hasClass("disabled")) {
                        return;
                    }
                        sc_btn_pdf_download()
                        toggleToolbar(event, true); return;
                }
        }
        function scBtnFn_btn_exit_app() {
                if ($("#sc_btn_exit_app_bot").length && $("#sc_btn_exit_app_bot").is(":visible")) {
                    if ($("#sc_btn_exit_app_bot").hasClass("disabled")) {
                        return;
                    }
                        sc_btn_btn_exit_app()
                        toggleToolbar(event, true); return;
                }
        }
        function scBtnFn_sys_format_sai_modal() {
                if ($("#sc_b_sai_b.sc-unique-btn-6").length && $("#sc_b_sai_b.sc-unique-btn-6").is(":visible")) {
                    if ($("#sc_b_sai_b.sc-unique-btn-6").hasClass("disabled")) {
                        return;
                    }
                        scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
                        toggleToolbar(event, true); return;
                }
                if ($("#sc_b_sai_b.sc-unique-btn-11").length && $("#sc_b_sai_b.sc-unique-btn-11").is(":visible")) {
                    if ($("#sc_b_sai_b.sc-unique-btn-11").hasClass("disabled")) {
                        return;
                    }
                        scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
                        toggleToolbar(event, true); return;
                }
        }
        function scBtnFn_sys_format_ini() {
                if ($("#sc_b_ini_b.sc-unique-btn-7").length && $("#sc_b_ini_b.sc-unique-btn-7").is(":visible")) {
                    if ($("#sc_b_ini_b.sc-unique-btn-7").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('inicio');
                        toggleToolbar(event, true); return;
                }
        }
        function scBtnFn_sys_format_ret() {
                if ($("#sc_b_ret_b.sc-unique-btn-8").length && $("#sc_b_ret_b.sc-unique-btn-8").is(":visible")) {
                    if ($("#sc_b_ret_b.sc-unique-btn-8").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('retorna');
                        toggleToolbar(event, true); return;
                }
        }
        function scBtnFn_sys_format_ava() {
                if ($("#sc_b_avc_b.sc-unique-btn-9").length && $("#sc_b_avc_b.sc-unique-btn-9").is(":visible")) {
                    if ($("#sc_b_avc_b.sc-unique-btn-9").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('avanca');
                        toggleToolbar(event, true); return;
                }
        }
        function scBtnFn_sys_format_fim() {
                if ($("#sc_b_fim_b.sc-unique-btn-10").length && $("#sc_b_fim_b.sc-unique-btn-10").is(":visible")) {
                    if ($("#sc_b_fim_b.sc-unique-btn-10").hasClass("disabled")) {
                        return;
                    }
                        nm_move ('final');
                        toggleToolbar(event, true); return;
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
<span id="sc-id-mobile-out"><?php echo $this->Ini->Nm_lang['lang_version_web']; ?></span>
<?php
       }
?>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['buttonStatus'] = $this->nmgp_botoes;
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
