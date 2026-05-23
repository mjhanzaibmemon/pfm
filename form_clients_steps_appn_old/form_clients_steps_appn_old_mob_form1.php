<div id="form_clients_steps_appn_old_mob_form1" style='<?php echo (1 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['form_wizard']['actual_step'] ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow scBlockRowFirst"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1" class="scBlockFrame"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_1" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['client_id']))
           {
               $this->nmgp_cmp_readonly['client_id'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['memb_01']))
    {
        $this->nm_new_label['memb_01'] = "#1";
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

    <TD class="scFormDataOdd css_member1_name_line" id="hidden_field_data_member1_name" style="<?php echo $sStyleHidden_member1_name; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member1_name_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member1_name_label" style=""><span id="id_label_member1_name"><?php echo $this->nm_new_label['member1_name']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['php_cmp_required']['member1_name']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['php_cmp_required']['member1_name'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member1_name"]) &&  $this->nmgp_cmp_readonly["member1_name"] == "on") { 

 ?>
<input type="hidden" name="member1_name" value="<?php echo $this->form_encode_input($member1_name) . "\">" . $member1_name . ""; ?>
<?php } else { ?>
<span id="id_read_on_member1_name" class="sc-ui-readonly-member1_name css_member1_name_line" style="<?php echo $sStyleReadLab_member1_name; ?>"><?php echo $this->form_format_readonly("member1_name", $this->form_encode_input($this->member1_name)); ?></span><span id="id_read_off_member1_name" class="css_read_off_member1_name<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member1_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_member1_name_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member1_name" type=text name="member1_name" value="<?php echo $this->form_encode_input($member1_name) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
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
   if (!isset($this->nm_new_label['member1_main_cont']))
   {
       $this->nm_new_label['member1_main_cont'] = "Main Contact";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member1_main_cont = $this->member1_main_cont;
   $sStyleHidden_member1_main_cont = '';
   if (isset($this->nmgp_cmp_hidden['member1_main_cont']) && $this->nmgp_cmp_hidden['member1_main_cont'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member1_main_cont']);
       $sStyleHidden_member1_main_cont = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member1_main_cont = 'display: none;';
   $sStyleReadInp_member1_main_cont = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member1_main_cont']) && $this->nmgp_cmp_readonly['member1_main_cont'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member1_main_cont']);
       $sStyleReadLab_member1_main_cont = '';
       $sStyleReadInp_member1_main_cont = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member1_main_cont']) && $this->nmgp_cmp_hidden['member1_main_cont'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="member1_main_cont" value="<?php echo $this->form_encode_input($this->member1_main_cont) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member1_main_cont_line" id="hidden_field_data_member1_main_cont" style="<?php echo $sStyleHidden_member1_main_cont; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member1_main_cont_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member1_main_cont_label" style=""><span id="id_label_member1_main_cont"><?php echo $this->nm_new_label['member1_main_cont']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member1_main_cont"]) &&  $this->nmgp_cmp_readonly["member1_main_cont"] == "on") { 

$member1_main_cont_look = "";
 if ($this->member1_main_cont == "1") { $member1_main_cont_look .= "Yes" ;} 
 if ($this->member1_main_cont == "0") { $member1_main_cont_look .= "No" ;} 
 if (empty($member1_main_cont_look)) { $member1_main_cont_look = $this->member1_main_cont; }
?>
<input type="hidden" name="member1_main_cont" value="<?php echo $this->form_encode_input($member1_main_cont) . "\">" . $member1_main_cont_look . ""; ?>
<?php } else { ?>
<?php

$member1_main_cont_look = "";
 if ($this->member1_main_cont == "1") { $member1_main_cont_look .= "Yes" ;} 
 if ($this->member1_main_cont == "0") { $member1_main_cont_look .= "No" ;} 
 if (empty($member1_main_cont_look)) { $member1_main_cont_look = $this->member1_main_cont; }
?>
<span id="id_read_on_member1_main_cont" class="css_member1_main_cont_line"  style="<?php echo $sStyleReadLab_member1_main_cont; ?>"><?php echo $this->form_format_readonly("member1_main_cont", $this->form_encode_input($member1_main_cont_look)); ?></span><span id="id_read_off_member1_main_cont" class="css_read_off_member1_main_cont<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_member1_main_cont; ?>">
 <span id="idAjaxSelect_member1_main_cont" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_member1_main_cont_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member1_main_cont" name="member1_main_cont" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="1" <?php  if ($this->member1_main_cont == "1") { echo " selected" ;} ?>>Yes</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['Lookup_member1_main_cont'][] = '1'; ?>
 <option  value="0" <?php  if ($this->member1_main_cont == "0") { echo " selected" ;} ?><?php  if (empty($this->member1_main_cont)) { echo " selected" ;} ?>>No</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['Lookup_member1_main_cont'][] = '0'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member1_main_cont_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member1_main_cont_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member1_driver_lic_id']))
    {
        $this->nm_new_label['member1_driver_lic_id'] = "Driver Lic or ID";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member1_driver_lic_id = $this->member1_driver_lic_id;
   $sStyleHidden_member1_driver_lic_id = '';
   if (isset($this->nmgp_cmp_hidden['member1_driver_lic_id']) && $this->nmgp_cmp_hidden['member1_driver_lic_id'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member1_driver_lic_id']);
       $sStyleHidden_member1_driver_lic_id = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member1_driver_lic_id = 'display: none;';
   $sStyleReadInp_member1_driver_lic_id = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member1_driver_lic_id']) && $this->nmgp_cmp_readonly['member1_driver_lic_id'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member1_driver_lic_id']);
       $sStyleReadLab_member1_driver_lic_id = '';
       $sStyleReadInp_member1_driver_lic_id = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member1_driver_lic_id']) && $this->nmgp_cmp_hidden['member1_driver_lic_id'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member1_driver_lic_id" value="<?php echo $this->form_encode_input($member1_driver_lic_id) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member1_driver_lic_id_line" id="hidden_field_data_member1_driver_lic_id" style="<?php echo $sStyleHidden_member1_driver_lic_id; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member1_driver_lic_id_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member1_driver_lic_id_label" style=""><span id="id_label_member1_driver_lic_id"><?php echo $this->nm_new_label['member1_driver_lic_id']; ?></span></span><br>
 <?php $this->NM_ajax_info['varList'][] = array("var_ajax_img_member1_driver_lic_id" => $out_member1_driver_lic_id); ?><script>var var_ajax_img_member1_driver_lic_id = '<?php echo $out_member1_driver_lic_id; ?>';</script><input type="hidden" name="temp_out_member1_driver_lic_id" value="<?php echo $this->form_encode_input($out_member1_driver_lic_id); ?>" /><?php if (!empty($out_member1_driver_lic_id)){ echo "<a id=\"id_ajax_link_member1_driver_lic_id\" href=\"javascript:nm_mostra_img(var_ajax_img_member1_driver_lic_id, '" . $this->nmgp_return_img['member1_driver_lic_id'][0] . "', '" . $this->nmgp_return_img['member1_driver_lic_id'][1] . "')\">" . $this->Ini->Nm_lang['lang_othr_show_imgg'] . "</a>"; if (!empty($member1_driver_lic_id)){ echo "<br>";} } ?><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member1_driver_lic_id"]) &&  $this->nmgp_cmp_readonly["member1_driver_lic_id"] == "on") { 

 ?>
<img id=\"member1_driver_lic_id_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><input type="hidden" name="member1_driver_lic_id" value="<?php echo $this->form_encode_input($member1_driver_lic_id) . "\">" . $member1_driver_lic_id . ""; ?>
<?php } else { ?>
<span id="id_read_off_member1_driver_lic_id" class="css_read_off_member1_driver_lic_id<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member1_driver_lic_id; ?>"><span style="display:inline-block"><span id="sc-id-upload-select-member1_driver_lic_id" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_member1_driver_lic_id_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="member1_driver_lic_id[]" id="id_sc_field_member1_driver_lic_id" onchange="<?php if ($this->nmgp_opcao == "novo") {echo "if (document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]']) { document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]'].checked = true }"; }?>"></span></span>
<?php
   $sCheckInsert = "";
?>
<span id="chk_ajax_img_member1_driver_lic_id"<?php if ($this->nmgp_opcao == "novo" || empty($member1_driver_lic_id)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="member1_driver_lic_id_limpa" value="<?php echo $member1_driver_lic_id_limpa . '" '; if ($member1_driver_lic_id_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};<?php echo $sCheckInsert ?>"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="member1_driver_lic_id_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><div id="id_img_loader_member1_driver_lic_id" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_member1_driver_lic_id" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member1_driver_lic_id_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member1_driver_lic_id_text"></span></td></tr></table></td></tr></table> </TD>
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
        $this->nm_new_label['memb_02'] = "#2";
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
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
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
   if (!isset($this->nm_new_label['member2_main_cont']))
   {
       $this->nm_new_label['member2_main_cont'] = "Main Contact";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member2_main_cont = $this->member2_main_cont;
   $sStyleHidden_member2_main_cont = '';
   if (isset($this->nmgp_cmp_hidden['member2_main_cont']) && $this->nmgp_cmp_hidden['member2_main_cont'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member2_main_cont']);
       $sStyleHidden_member2_main_cont = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member2_main_cont = 'display: none;';
   $sStyleReadInp_member2_main_cont = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member2_main_cont']) && $this->nmgp_cmp_readonly['member2_main_cont'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member2_main_cont']);
       $sStyleReadLab_member2_main_cont = '';
       $sStyleReadInp_member2_main_cont = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member2_main_cont']) && $this->nmgp_cmp_hidden['member2_main_cont'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="member2_main_cont" value="<?php echo $this->form_encode_input($this->member2_main_cont) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member2_main_cont_line" id="hidden_field_data_member2_main_cont" style="<?php echo $sStyleHidden_member2_main_cont; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member2_main_cont_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member2_main_cont_label" style=""><span id="id_label_member2_main_cont"><?php echo $this->nm_new_label['member2_main_cont']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member2_main_cont"]) &&  $this->nmgp_cmp_readonly["member2_main_cont"] == "on") { 

$member2_main_cont_look = "";
 if ($this->member2_main_cont == "1") { $member2_main_cont_look .= "Yes" ;} 
 if ($this->member2_main_cont == "0") { $member2_main_cont_look .= "No" ;} 
 if (empty($member2_main_cont_look)) { $member2_main_cont_look = $this->member2_main_cont; }
?>
<input type="hidden" name="member2_main_cont" value="<?php echo $this->form_encode_input($member2_main_cont) . "\">" . $member2_main_cont_look . ""; ?>
<?php } else { ?>
<?php

$member2_main_cont_look = "";
 if ($this->member2_main_cont == "1") { $member2_main_cont_look .= "Yes" ;} 
 if ($this->member2_main_cont == "0") { $member2_main_cont_look .= "No" ;} 
 if (empty($member2_main_cont_look)) { $member2_main_cont_look = $this->member2_main_cont; }
?>
<span id="id_read_on_member2_main_cont" class="css_member2_main_cont_line"  style="<?php echo $sStyleReadLab_member2_main_cont; ?>"><?php echo $this->form_format_readonly("member2_main_cont", $this->form_encode_input($member2_main_cont_look)); ?></span><span id="id_read_off_member2_main_cont" class="css_read_off_member2_main_cont<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_member2_main_cont; ?>">
 <span id="idAjaxSelect_member2_main_cont" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_member2_main_cont_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member2_main_cont" name="member2_main_cont" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="1" <?php  if ($this->member2_main_cont == "1") { echo " selected" ;} ?>>Yes</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['Lookup_member2_main_cont'][] = '1'; ?>
 <option  value="0" <?php  if ($this->member2_main_cont == "0") { echo " selected" ;} ?><?php  if (empty($this->member2_main_cont)) { echo " selected" ;} ?>>No</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['Lookup_member2_main_cont'][] = '0'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member2_main_cont_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member2_main_cont_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member2_driver_lic_id']))
    {
        $this->nm_new_label['member2_driver_lic_id'] = "Driver Lic or ID";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member2_driver_lic_id = $this->member2_driver_lic_id;
   $sStyleHidden_member2_driver_lic_id = '';
   if (isset($this->nmgp_cmp_hidden['member2_driver_lic_id']) && $this->nmgp_cmp_hidden['member2_driver_lic_id'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member2_driver_lic_id']);
       $sStyleHidden_member2_driver_lic_id = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member2_driver_lic_id = 'display: none;';
   $sStyleReadInp_member2_driver_lic_id = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member2_driver_lic_id']) && $this->nmgp_cmp_readonly['member2_driver_lic_id'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member2_driver_lic_id']);
       $sStyleReadLab_member2_driver_lic_id = '';
       $sStyleReadInp_member2_driver_lic_id = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member2_driver_lic_id']) && $this->nmgp_cmp_hidden['member2_driver_lic_id'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member2_driver_lic_id" value="<?php echo $this->form_encode_input($member2_driver_lic_id) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member2_driver_lic_id_line" id="hidden_field_data_member2_driver_lic_id" style="<?php echo $sStyleHidden_member2_driver_lic_id; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member2_driver_lic_id_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member2_driver_lic_id_label" style=""><span id="id_label_member2_driver_lic_id"><?php echo $this->nm_new_label['member2_driver_lic_id']; ?></span></span><br>
 <?php $this->NM_ajax_info['varList'][] = array("var_ajax_img_member2_driver_lic_id" => $out_member2_driver_lic_id); ?><script>var var_ajax_img_member2_driver_lic_id = '<?php echo $out_member2_driver_lic_id; ?>';</script><input type="hidden" name="temp_out_member2_driver_lic_id" value="<?php echo $this->form_encode_input($out_member2_driver_lic_id); ?>" /><?php if (!empty($out_member2_driver_lic_id)){ echo "<a id=\"id_ajax_link_member2_driver_lic_id\" href=\"javascript:nm_mostra_img(var_ajax_img_member2_driver_lic_id, '" . $this->nmgp_return_img['member2_driver_lic_id'][0] . "', '" . $this->nmgp_return_img['member2_driver_lic_id'][1] . "')\">" . $this->Ini->Nm_lang['lang_othr_show_imgg'] . "</a>"; if (!empty($member2_driver_lic_id)){ echo "<br>";} } ?><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member2_driver_lic_id"]) &&  $this->nmgp_cmp_readonly["member2_driver_lic_id"] == "on") { 

 ?>
<img id=\"member2_driver_lic_id_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><input type="hidden" name="member2_driver_lic_id" value="<?php echo $this->form_encode_input($member2_driver_lic_id) . "\">" . $member2_driver_lic_id . ""; ?>
<?php } else { ?>
<span id="id_read_off_member2_driver_lic_id" class="css_read_off_member2_driver_lic_id<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member2_driver_lic_id; ?>"><span style="display:inline-block"><span id="sc-id-upload-select-member2_driver_lic_id" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_member2_driver_lic_id_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="member2_driver_lic_id[]" id="id_sc_field_member2_driver_lic_id" onchange="<?php if ($this->nmgp_opcao == "novo") {echo "if (document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]']) { document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]'].checked = true }"; }?>"></span></span>
<?php
   $sCheckInsert = "";
?>
<span id="chk_ajax_img_member2_driver_lic_id"<?php if ($this->nmgp_opcao == "novo" || empty($member2_driver_lic_id)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="member2_driver_lic_id_limpa" value="<?php echo $member2_driver_lic_id_limpa . '" '; if ($member2_driver_lic_id_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};<?php echo $sCheckInsert ?>"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="member2_driver_lic_id_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><div id="id_img_loader_member2_driver_lic_id" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_member2_driver_lic_id" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member2_driver_lic_id_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member2_driver_lic_id_text"></span></td></tr></table></td></tr></table> </TD>
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
        $this->nm_new_label['memb_03'] = "#3";
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
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
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
   if (!isset($this->nm_new_label['member3_main_cont']))
   {
       $this->nm_new_label['member3_main_cont'] = "Main Contact";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member3_main_cont = $this->member3_main_cont;
   $sStyleHidden_member3_main_cont = '';
   if (isset($this->nmgp_cmp_hidden['member3_main_cont']) && $this->nmgp_cmp_hidden['member3_main_cont'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member3_main_cont']);
       $sStyleHidden_member3_main_cont = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member3_main_cont = 'display: none;';
   $sStyleReadInp_member3_main_cont = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member3_main_cont']) && $this->nmgp_cmp_readonly['member3_main_cont'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member3_main_cont']);
       $sStyleReadLab_member3_main_cont = '';
       $sStyleReadInp_member3_main_cont = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member3_main_cont']) && $this->nmgp_cmp_hidden['member3_main_cont'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="member3_main_cont" value="<?php echo $this->form_encode_input($this->member3_main_cont) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member3_main_cont_line" id="hidden_field_data_member3_main_cont" style="<?php echo $sStyleHidden_member3_main_cont; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member3_main_cont_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member3_main_cont_label" style=""><span id="id_label_member3_main_cont"><?php echo $this->nm_new_label['member3_main_cont']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member3_main_cont"]) &&  $this->nmgp_cmp_readonly["member3_main_cont"] == "on") { 

$member3_main_cont_look = "";
 if ($this->member3_main_cont == "1") { $member3_main_cont_look .= "Yes" ;} 
 if ($this->member3_main_cont == "0") { $member3_main_cont_look .= "No" ;} 
 if (empty($member3_main_cont_look)) { $member3_main_cont_look = $this->member3_main_cont; }
?>
<input type="hidden" name="member3_main_cont" value="<?php echo $this->form_encode_input($member3_main_cont) . "\">" . $member3_main_cont_look . ""; ?>
<?php } else { ?>
<?php

$member3_main_cont_look = "";
 if ($this->member3_main_cont == "1") { $member3_main_cont_look .= "Yes" ;} 
 if ($this->member3_main_cont == "0") { $member3_main_cont_look .= "No" ;} 
 if (empty($member3_main_cont_look)) { $member3_main_cont_look = $this->member3_main_cont; }
?>
<span id="id_read_on_member3_main_cont" class="css_member3_main_cont_line"  style="<?php echo $sStyleReadLab_member3_main_cont; ?>"><?php echo $this->form_format_readonly("member3_main_cont", $this->form_encode_input($member3_main_cont_look)); ?></span><span id="id_read_off_member3_main_cont" class="css_read_off_member3_main_cont<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_member3_main_cont; ?>">
 <span id="idAjaxSelect_member3_main_cont" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_member3_main_cont_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member3_main_cont" name="member3_main_cont" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="1" <?php  if ($this->member3_main_cont == "1") { echo " selected" ;} ?>>Yes</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['Lookup_member3_main_cont'][] = '1'; ?>
 <option  value="0" <?php  if ($this->member3_main_cont == "0") { echo " selected" ;} ?><?php  if (empty($this->member3_main_cont)) { echo " selected" ;} ?>>No</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old_mob']['Lookup_member3_main_cont'][] = '0'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member3_main_cont_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member3_main_cont_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['member3_drive_lic_id']))
    {
        $this->nm_new_label['member3_drive_lic_id'] = "Drive Lic or ID";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $member3_drive_lic_id = $this->member3_drive_lic_id;
   $sStyleHidden_member3_drive_lic_id = '';
   if (isset($this->nmgp_cmp_hidden['member3_drive_lic_id']) && $this->nmgp_cmp_hidden['member3_drive_lic_id'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['member3_drive_lic_id']);
       $sStyleHidden_member3_drive_lic_id = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_member3_drive_lic_id = 'display: none;';
   $sStyleReadInp_member3_drive_lic_id = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['member3_drive_lic_id']) && $this->nmgp_cmp_readonly['member3_drive_lic_id'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['member3_drive_lic_id']);
       $sStyleReadLab_member3_drive_lic_id = '';
       $sStyleReadInp_member3_drive_lic_id = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['member3_drive_lic_id']) && $this->nmgp_cmp_hidden['member3_drive_lic_id'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="member3_drive_lic_id" value="<?php echo $this->form_encode_input($member3_drive_lic_id) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_member3_drive_lic_id_line" id="hidden_field_data_member3_drive_lic_id" style="<?php echo $sStyleHidden_member3_drive_lic_id; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member3_drive_lic_id_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_member3_drive_lic_id_label" style=""><span id="id_label_member3_drive_lic_id"><?php echo $this->nm_new_label['member3_drive_lic_id']; ?></span></span><br>
 <?php $this->NM_ajax_info['varList'][] = array("var_ajax_img_member3_drive_lic_id" => $out_member3_drive_lic_id); ?><script>var var_ajax_img_member3_drive_lic_id = '<?php echo $out_member3_drive_lic_id; ?>';</script><input type="hidden" name="temp_out_member3_drive_lic_id" value="<?php echo $this->form_encode_input($out_member3_drive_lic_id); ?>" /><?php if (!empty($out_member3_drive_lic_id)){ echo "<a id=\"id_ajax_link_member3_drive_lic_id\" href=\"javascript:nm_mostra_img(var_ajax_img_member3_drive_lic_id, '" . $this->nmgp_return_img['member3_drive_lic_id'][0] . "', '" . $this->nmgp_return_img['member3_drive_lic_id'][1] . "')\">" . $this->Ini->Nm_lang['lang_othr_show_imgg'] . "</a>"; if (!empty($member3_drive_lic_id)){ echo "<br>";} } ?><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member3_drive_lic_id"]) &&  $this->nmgp_cmp_readonly["member3_drive_lic_id"] == "on") { 

 ?>
<img id=\"member3_drive_lic_id_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><input type="hidden" name="member3_drive_lic_id" value="<?php echo $this->form_encode_input($member3_drive_lic_id) . "\">" . $member3_drive_lic_id . ""; ?>
<?php } else { ?>
<span id="id_read_off_member3_drive_lic_id" class="css_read_off_member3_drive_lic_id<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member3_drive_lic_id; ?>"><span style="display:inline-block"><span id="sc-id-upload-select-member3_drive_lic_id" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_member3_drive_lic_id_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="member3_drive_lic_id[]" id="id_sc_field_member3_drive_lic_id" onchange="<?php if ($this->nmgp_opcao == "novo") {echo "if (document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]']) { document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]'].checked = true }"; }?>"></span></span>
<?php
   $sCheckInsert = "";
?>
<span id="chk_ajax_img_member3_drive_lic_id"<?php if ($this->nmgp_opcao == "novo" || empty($member3_drive_lic_id)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="member3_drive_lic_id_limpa" value="<?php echo $member3_drive_lic_id_limpa . '" '; if ($member3_drive_lic_id_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};<?php echo $sCheckInsert ?>"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="member3_drive_lic_id_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><div id="id_img_loader_member3_drive_lic_id" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_member3_drive_lic_id" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member3_drive_lic_id_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member3_drive_lic_id_text"></span></td></tr></table></td></tr></table> </TD>
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






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
