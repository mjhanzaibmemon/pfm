<div id="form_clients_steps_appn_form2" style='<?php echo (2 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn']['form_wizard']['actual_step'] ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
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
   <tr>


    <TD colspan="4" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf4\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>BUYERS (First 3 members are complimentary with yearly membership)<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
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

    <TD class="scFormDataOdd css_memb_name_line" id="hidden_field_data_memb_name" style="<?php echo $sStyleHidden_memb_name; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_memb_name_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_memb_name css_memb_name_line" style="<?php echo $sStyleReadLab_memb_name; ?>"><?php echo $fieldContent; ?></span><span id="id_read_off_memb_name" class="css_read_off_memb_name" style="<?php echo $sStyleReadInp_memb_name; ?>"><span id="id_ajax_label_memb_name"><?php echo $memb_name?></span>
</span><input type="hidden" name="memb_name" value="<?php echo $this->form_encode_input($memb_name); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_memb_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_memb_name_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_memb_phone_line" id="hidden_field_data_memb_phone" style="<?php echo $sStyleHidden_memb_phone; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_memb_phone_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_memb_phone css_memb_phone_line" style="<?php echo $sStyleReadLab_memb_phone; ?>"><?php echo $fieldContent; ?></span><span id="id_read_off_memb_phone" class="css_read_off_memb_phone" style="<?php echo $sStyleReadInp_memb_phone; ?>"><span id="id_ajax_label_memb_phone"><?php echo $memb_phone?></span>
</span><input type="hidden" name="memb_phone" value="<?php echo $this->form_encode_input($memb_phone); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_memb_phone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_memb_phone_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_memb_email_line" id="hidden_field_data_memb_email" style="<?php echo $sStyleHidden_memb_email; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_memb_email_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_memb_email css_memb_email_line" style="<?php echo $sStyleReadLab_memb_email; ?>"><?php echo $fieldContent; ?></span><span id="id_read_off_memb_email" class="css_read_off_memb_email" style="<?php echo $sStyleReadInp_memb_email; ?>"><span id="id_ajax_label_memb_email"><?php echo $memb_email?></span>
</span><input type="hidden" name="memb_email" value="<?php echo $this->form_encode_input($memb_email); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_memb_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_memb_email_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_memb_note_line" id="hidden_field_data_memb_note" style="<?php echo $sStyleHidden_memb_note; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_memb_note_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_memb_note css_memb_note_line" style="<?php echo $sStyleReadLab_memb_note; ?>"><?php echo $fieldContent; ?></span><span id="id_read_off_memb_note" class="css_read_off_memb_note" style="<?php echo $sStyleReadInp_memb_note; ?>"><span id="id_ajax_label_memb_note"><?php echo $memb_note?></span>
</span><input type="hidden" name="memb_note" value="<?php echo $this->form_encode_input($memb_note); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_memb_note_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_memb_note_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_memb_name_dumb = ('' == $sStyleHidden_memb_name) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_memb_name_dumb" style="<?php echo $sStyleHidden_memb_name_dumb; ?>"></TD>
<?php $sStyleHidden_memb_phone_dumb = ('' == $sStyleHidden_memb_phone) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_memb_phone_dumb" style="<?php echo $sStyleHidden_memb_phone_dumb; ?>"></TD>
<?php $sStyleHidden_memb_email_dumb = ('' == $sStyleHidden_memb_email) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_memb_email_dumb" style="<?php echo $sStyleHidden_memb_email_dumb; ?>"></TD>
<?php $sStyleHidden_memb_note_dumb = ('' == $sStyleHidden_memb_note) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_memb_note_dumb" style="<?php echo $sStyleHidden_memb_note_dumb; ?>"></TD>
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

    <TD class="scFormDataOdd css_member1_name_line" id="hidden_field_data_member1_name" style="<?php echo $sStyleHidden_member1_name; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member1_name_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member1_name"]) &&  $this->nmgp_cmp_readonly["member1_name"] == "on") { 

 ?>
<input type="hidden" name="member1_name" value="<?php echo $this->form_encode_input($member1_name) . "\">" . $member1_name . ""; ?>
<?php } else { ?>
<span id="id_read_on_member1_name" class="sc-ui-readonly-member1_name css_member1_name_line" style="<?php echo $sStyleReadLab_member1_name; ?>"><?php echo $this->form_format_readonly("member1_name", $this->form_encode_input($this->member1_name)); ?></span><span id="id_read_off_member1_name" class="css_read_off_member1_name<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member1_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_member1_name_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member1_name" type=text name="member1_name" value="<?php echo $this->form_encode_input($member1_name) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '(#01 - Firstname Lastname)', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member1_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member1_name_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_member1_phone_line" id="hidden_field_data_member1_phone" style="<?php echo $sStyleHidden_member1_phone; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member1_phone_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member1_phone"]) &&  $this->nmgp_cmp_readonly["member1_phone"] == "on") { 

 ?>
<input type="hidden" name="member1_phone" value="<?php echo $this->form_encode_input($member1_phone) . "\">" . $member1_phone . ""; ?>
<?php } else { ?>
<span id="id_read_on_member1_phone" class="sc-ui-readonly-member1_phone css_member1_phone_line" style="<?php echo $sStyleReadLab_member1_phone; ?>"><?php echo $this->form_format_readonly("member1_phone", $this->form_encode_input($this->member1_phone)); ?></span><span id="id_read_off_member1_phone" class="css_read_off_member1_phone<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member1_phone; ?>">
 <input class="sc-js-input scFormObjectOdd css_member1_phone_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member1_phone" type=text name="member1_phone" value="<?php echo $this->form_encode_input($member1_phone) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=116 alt="{datatype: 'mask', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', maskList: '(999) 999 - 9999', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member1_phone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member1_phone_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_member1_email_line" id="hidden_field_data_member1_email" style="<?php echo $sStyleHidden_member1_email; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member1_email_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member1_email"]) &&  $this->nmgp_cmp_readonly["member1_email"] == "on") { 

 ?>
<input type="hidden" name="member1_email" value="<?php echo $this->form_encode_input($member1_email) . "\">" . $member1_email . ""; ?>
<?php } else { ?>
<span id="id_read_on_member1_email" class="sc-ui-readonly-member1_email css_member1_email_line" style="<?php echo $sStyleReadLab_member1_email; ?>"><?php echo $this->form_format_readonly("member1_email", $this->form_encode_input($this->member1_email)); ?></span><span id="id_read_off_member1_email" class="css_read_off_member1_email<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member1_email; ?>">
 <input class="sc-js-input scFormObjectOdd css_member1_email_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member1_email" type=text name="member1_email" value="<?php echo $this->form_encode_input($member1_email) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span style="display: none"><?php echo nmButtonOutput($this->arr_buttons, "bemail", "if (document.F1.member1_email.value != '') {window.open('mailto:' + document.F1.member1_email.value); }", "if (document.F1.member1_email.value != '') {window.open('mailto:' + document.F1.member1_email.value); }", "member1_email_mail", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
</span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member1_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member1_email_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_member1_note_line" id="hidden_field_data_member1_note" style="<?php echo $sStyleHidden_member1_note; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member1_note_line" style="vertical-align: top;padding: 0px">
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
<?php $sStyleHidden_member1_name_dumb = ('' == $sStyleHidden_member1_name) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member1_name_dumb" style="<?php echo $sStyleHidden_member1_name_dumb; ?>"></TD>
<?php $sStyleHidden_member1_phone_dumb = ('' == $sStyleHidden_member1_phone) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member1_phone_dumb" style="<?php echo $sStyleHidden_member1_phone_dumb; ?>"></TD>
<?php $sStyleHidden_member1_email_dumb = ('' == $sStyleHidden_member1_email) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member1_email_dumb" style="<?php echo $sStyleHidden_member1_email_dumb; ?>"></TD>
<?php $sStyleHidden_member1_note_dumb = ('' == $sStyleHidden_member1_note) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member1_note_dumb" style="<?php echo $sStyleHidden_member1_note_dumb; ?>"></TD>
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

    <TD class="scFormDataOdd css_member2_name_line" id="hidden_field_data_member2_name" style="<?php echo $sStyleHidden_member2_name; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member2_name_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member2_name"]) &&  $this->nmgp_cmp_readonly["member2_name"] == "on") { 

 ?>
<input type="hidden" name="member2_name" value="<?php echo $this->form_encode_input($member2_name) . "\">" . $member2_name . ""; ?>
<?php } else { ?>
<span id="id_read_on_member2_name" class="sc-ui-readonly-member2_name css_member2_name_line" style="<?php echo $sStyleReadLab_member2_name; ?>"><?php echo $this->form_format_readonly("member2_name", $this->form_encode_input($this->member2_name)); ?></span><span id="id_read_off_member2_name" class="css_read_off_member2_name<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member2_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_member2_name_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member2_name" type=text name="member2_name" value="<?php echo $this->form_encode_input($member2_name) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '(#02 - Firstname Lastname)', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member2_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member2_name_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_member2_phone_line" id="hidden_field_data_member2_phone" style="<?php echo $sStyleHidden_member2_phone; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member2_phone_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member2_phone"]) &&  $this->nmgp_cmp_readonly["member2_phone"] == "on") { 

 ?>
<input type="hidden" name="member2_phone" value="<?php echo $this->form_encode_input($member2_phone) . "\">" . $member2_phone . ""; ?>
<?php } else { ?>
<span id="id_read_on_member2_phone" class="sc-ui-readonly-member2_phone css_member2_phone_line" style="<?php echo $sStyleReadLab_member2_phone; ?>"><?php echo $this->form_format_readonly("member2_phone", $this->form_encode_input($this->member2_phone)); ?></span><span id="id_read_off_member2_phone" class="css_read_off_member2_phone<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member2_phone; ?>">
 <input class="sc-js-input scFormObjectOdd css_member2_phone_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member2_phone" type=text name="member2_phone" value="<?php echo $this->form_encode_input($member2_phone) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=116 alt="{datatype: 'mask', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', maskList: '(999) 999 - 9999', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member2_phone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member2_phone_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_member2_email_line" id="hidden_field_data_member2_email" style="<?php echo $sStyleHidden_member2_email; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member2_email_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member2_email"]) &&  $this->nmgp_cmp_readonly["member2_email"] == "on") { 

 ?>
<input type="hidden" name="member2_email" value="<?php echo $this->form_encode_input($member2_email) . "\">" . $member2_email . ""; ?>
<?php } else { ?>
<span id="id_read_on_member2_email" class="sc-ui-readonly-member2_email css_member2_email_line" style="<?php echo $sStyleReadLab_member2_email; ?>"><?php echo $this->form_format_readonly("member2_email", $this->form_encode_input($this->member2_email)); ?></span><span id="id_read_off_member2_email" class="css_read_off_member2_email<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member2_email; ?>">
 <input class="sc-js-input scFormObjectOdd css_member2_email_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member2_email" type=text name="member2_email" value="<?php echo $this->form_encode_input($member2_email) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span style="display: none"><?php echo nmButtonOutput($this->arr_buttons, "bemail", "if (document.F1.member2_email.value != '') {window.open('mailto:' + document.F1.member2_email.value); }", "if (document.F1.member2_email.value != '') {window.open('mailto:' + document.F1.member2_email.value); }", "member2_email_mail", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
</span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member2_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member2_email_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_member2_note_line" id="hidden_field_data_member2_note" style="<?php echo $sStyleHidden_member2_note; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member2_note_line" style="vertical-align: top;padding: 0px">
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
<?php $sStyleHidden_member2_name_dumb = ('' == $sStyleHidden_member2_name) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member2_name_dumb" style="<?php echo $sStyleHidden_member2_name_dumb; ?>"></TD>
<?php $sStyleHidden_member2_phone_dumb = ('' == $sStyleHidden_member2_phone) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member2_phone_dumb" style="<?php echo $sStyleHidden_member2_phone_dumb; ?>"></TD>
<?php $sStyleHidden_member2_email_dumb = ('' == $sStyleHidden_member2_email) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member2_email_dumb" style="<?php echo $sStyleHidden_member2_email_dumb; ?>"></TD>
<?php $sStyleHidden_member2_note_dumb = ('' == $sStyleHidden_member2_note) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member2_note_dumb" style="<?php echo $sStyleHidden_member2_note_dumb; ?>"></TD>
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

    <TD class="scFormDataOdd css_member3_name_line" id="hidden_field_data_member3_name" style="<?php echo $sStyleHidden_member3_name; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member3_name_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member3_name"]) &&  $this->nmgp_cmp_readonly["member3_name"] == "on") { 

 ?>
<input type="hidden" name="member3_name" value="<?php echo $this->form_encode_input($member3_name) . "\">" . $member3_name . ""; ?>
<?php } else { ?>
<span id="id_read_on_member3_name" class="sc-ui-readonly-member3_name css_member3_name_line" style="<?php echo $sStyleReadLab_member3_name; ?>"><?php echo $this->form_format_readonly("member3_name", $this->form_encode_input($this->member3_name)); ?></span><span id="id_read_off_member3_name" class="css_read_off_member3_name<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member3_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_member3_name_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member3_name" type=text name="member3_name" value="<?php echo $this->form_encode_input($member3_name) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '(#03 - Firstname Lastname)', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member3_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member3_name_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_member3_phone_line" id="hidden_field_data_member3_phone" style="<?php echo $sStyleHidden_member3_phone; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member3_phone_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member3_phone"]) &&  $this->nmgp_cmp_readonly["member3_phone"] == "on") { 

 ?>
<input type="hidden" name="member3_phone" value="<?php echo $this->form_encode_input($member3_phone) . "\">" . $member3_phone . ""; ?>
<?php } else { ?>
<span id="id_read_on_member3_phone" class="sc-ui-readonly-member3_phone css_member3_phone_line" style="<?php echo $sStyleReadLab_member3_phone; ?>"><?php echo $this->form_format_readonly("member3_phone", $this->form_encode_input($this->member3_phone)); ?></span><span id="id_read_off_member3_phone" class="css_read_off_member3_phone<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member3_phone; ?>">
 <input class="sc-js-input scFormObjectOdd css_member3_phone_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member3_phone" type=text name="member3_phone" value="<?php echo $this->form_encode_input($member3_phone) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=116 alt="{datatype: 'mask', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', maskList: '(999) 999 - 9999', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member3_phone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member3_phone_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_member3_email_line" id="hidden_field_data_member3_email" style="<?php echo $sStyleHidden_member3_email; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member3_email_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member3_email"]) &&  $this->nmgp_cmp_readonly["member3_email"] == "on") { 

 ?>
<input type="hidden" name="member3_email" value="<?php echo $this->form_encode_input($member3_email) . "\">" . $member3_email . ""; ?>
<?php } else { ?>
<span id="id_read_on_member3_email" class="sc-ui-readonly-member3_email css_member3_email_line" style="<?php echo $sStyleReadLab_member3_email; ?>"><?php echo $this->form_format_readonly("member3_email", $this->form_encode_input($this->member3_email)); ?></span><span id="id_read_off_member3_email" class="css_read_off_member3_email<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member3_email; ?>">
 <input class="sc-js-input scFormObjectOdd css_member3_email_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member3_email" type=text name="member3_email" value="<?php echo $this->form_encode_input($member3_email) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span style="display: none"><?php echo nmButtonOutput($this->arr_buttons, "bemail", "if (document.F1.member3_email.value != '') {window.open('mailto:' + document.F1.member3_email.value); }", "if (document.F1.member3_email.value != '') {window.open('mailto:' + document.F1.member3_email.value); }", "member3_email_mail", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
</span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member3_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member3_email_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_member3_note_line" id="hidden_field_data_member3_note" style="<?php echo $sStyleHidden_member3_note; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member3_note_line" style="vertical-align: top;padding: 0px">
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
<?php $sStyleHidden_member3_name_dumb = ('' == $sStyleHidden_member3_name) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member3_name_dumb" style="<?php echo $sStyleHidden_member3_name_dumb; ?>"></TD>
<?php $sStyleHidden_member3_phone_dumb = ('' == $sStyleHidden_member3_phone) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member3_phone_dumb" style="<?php echo $sStyleHidden_member3_phone_dumb; ?>"></TD>
<?php $sStyleHidden_member3_email_dumb = ('' == $sStyleHidden_member3_email) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member3_email_dumb" style="<?php echo $sStyleHidden_member3_email_dumb; ?>"></TD>
<?php $sStyleHidden_member3_note_dumb = ('' == $sStyleHidden_member3_note) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member3_note_dumb" style="<?php echo $sStyleHidden_member3_note_dumb; ?>"></TD>
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

    <TD class="scFormDataOdd css_dummy05_line" id="hidden_field_data_dummy05" style="<?php echo $sStyleHidden_dummy05; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dummy05_line" style="vertical-align: top;padding: 0px"><span id="id_ajax_label_dummy05"><?php echo $dummy05?></span>
<input type="hidden" name="dummy05" value="<?php echo $this->form_encode_input($dummy05); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dummy05_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dummy05_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="3" >&nbsp;</TD>




<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
<?php $sStyleHidden_dummy05_dumb = ('' == $sStyleHidden_dummy05) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_dummy05_dumb" style="<?php echo $sStyleHidden_dummy05_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_5"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_5" class="scBlockFrame"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_5" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="4" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf5\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_exp . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>ADDITIONAL BUYERS (Additional members will be subject to supplementary fees)<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
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

    <TD class="scFormDataOdd css_adtl_memb_name_line" id="hidden_field_data_adtl_memb_name" style="<?php echo $sStyleHidden_adtl_memb_name; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_adtl_memb_name_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_adtl_memb_name css_adtl_memb_name_line" style="<?php echo $sStyleReadLab_adtl_memb_name; ?>"><?php echo $fieldContent; ?></span><span id="id_read_off_adtl_memb_name" class="css_read_off_adtl_memb_name" style="<?php echo $sStyleReadInp_adtl_memb_name; ?>"><span id="id_ajax_label_adtl_memb_name"><?php echo $adtl_memb_name?></span>
</span><input type="hidden" name="adtl_memb_name" value="<?php echo $this->form_encode_input($adtl_memb_name); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_adtl_memb_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_adtl_memb_name_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_adtl_memb_phone_line" id="hidden_field_data_adtl_memb_phone" style="<?php echo $sStyleHidden_adtl_memb_phone; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_adtl_memb_phone_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_adtl_memb_phone css_adtl_memb_phone_line" style="<?php echo $sStyleReadLab_adtl_memb_phone; ?>"><?php echo $fieldContent; ?></span><span id="id_read_off_adtl_memb_phone" class="css_read_off_adtl_memb_phone" style="<?php echo $sStyleReadInp_adtl_memb_phone; ?>"><span id="id_ajax_label_adtl_memb_phone"><?php echo $adtl_memb_phone?></span>
</span><input type="hidden" name="adtl_memb_phone" value="<?php echo $this->form_encode_input($adtl_memb_phone); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_adtl_memb_phone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_adtl_memb_phone_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_adtl_memb_note_line" id="hidden_field_data_adtl_memb_note" style="<?php echo $sStyleHidden_adtl_memb_note; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_adtl_memb_note_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_adtl_memb_note css_adtl_memb_note_line" style="<?php echo $sStyleReadLab_adtl_memb_note; ?>"><?php echo $fieldContent; ?></span><span id="id_read_off_adtl_memb_note" class="css_read_off_adtl_memb_note" style="<?php echo $sStyleReadInp_adtl_memb_note; ?>"><span id="id_ajax_label_adtl_memb_note"><?php echo $adtl_memb_note?></span>
</span><input type="hidden" name="adtl_memb_note" value="<?php echo $this->form_encode_input($adtl_memb_note); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_adtl_memb_note_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_adtl_memb_note_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['addtl_memb_mail']))
    {
        $this->nm_new_label['addtl_memb_mail'] = "Email";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $addtl_memb_mail = $this->addtl_memb_mail;
   $sStyleHidden_addtl_memb_mail = '';
   if (isset($this->nmgp_cmp_hidden['addtl_memb_mail']) && $this->nmgp_cmp_hidden['addtl_memb_mail'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['addtl_memb_mail']);
       $sStyleHidden_addtl_memb_mail = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_addtl_memb_mail = 'display: none;';
   $sStyleReadInp_addtl_memb_mail = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['addtl_memb_mail']) && $this->nmgp_cmp_readonly['addtl_memb_mail'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['addtl_memb_mail']);
       $sStyleReadLab_addtl_memb_mail = '';
       $sStyleReadInp_addtl_memb_mail = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['addtl_memb_mail']) && $this->nmgp_cmp_hidden['addtl_memb_mail'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="addtl_memb_mail" value="<?php echo $this->form_encode_input($addtl_memb_mail) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_addtl_memb_mail_line" id="hidden_field_data_addtl_memb_mail" style="<?php echo $sStyleHidden_addtl_memb_mail; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_addtl_memb_mail_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_addtl_memb_mail css_addtl_memb_mail_line" style="<?php echo $sStyleReadLab_addtl_memb_mail; ?>"><?php echo $fieldContent; ?></span><span id="id_read_off_addtl_memb_mail" class="css_read_off_addtl_memb_mail" style="<?php echo $sStyleReadInp_addtl_memb_mail; ?>"><span id="id_ajax_label_addtl_memb_mail"><?php echo $addtl_memb_mail?></span>
</span><input type="hidden" name="addtl_memb_mail" value="<?php echo $this->form_encode_input($addtl_memb_mail); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_addtl_memb_mail_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_addtl_memb_mail_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_adtl_memb_name_dumb = ('' == $sStyleHidden_adtl_memb_name) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_adtl_memb_name_dumb" style="<?php echo $sStyleHidden_adtl_memb_name_dumb; ?>"></TD>
<?php $sStyleHidden_adtl_memb_phone_dumb = ('' == $sStyleHidden_adtl_memb_phone) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_adtl_memb_phone_dumb" style="<?php echo $sStyleHidden_adtl_memb_phone_dumb; ?>"></TD>
<?php $sStyleHidden_adtl_memb_note_dumb = ('' == $sStyleHidden_adtl_memb_note) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_adtl_memb_note_dumb" style="<?php echo $sStyleHidden_adtl_memb_note_dumb; ?>"></TD>
<?php $sStyleHidden_addtl_memb_mail_dumb = ('' == $sStyleHidden_addtl_memb_mail) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_addtl_memb_mail_dumb" style="<?php echo $sStyleHidden_addtl_memb_mail_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
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

    <TD class="scFormDataOdd css_member4_name_line" id="hidden_field_data_member4_name" style="<?php echo $sStyleHidden_member4_name; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member4_name_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member4_name"]) &&  $this->nmgp_cmp_readonly["member4_name"] == "on") { 

 ?>
<input type="hidden" name="member4_name" value="<?php echo $this->form_encode_input($member4_name) . "\">" . $member4_name . ""; ?>
<?php } else { ?>
<span id="id_read_on_member4_name" class="sc-ui-readonly-member4_name css_member4_name_line" style="<?php echo $sStyleReadLab_member4_name; ?>"><?php echo $this->form_format_readonly("member4_name", $this->form_encode_input($this->member4_name)); ?></span><span id="id_read_off_member4_name" class="css_read_off_member4_name<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member4_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_member4_name_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member4_name" type=text name="member4_name" value="<?php echo $this->form_encode_input($member4_name) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '(#04 - Firstname Lastname)', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member4_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member4_name_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_member4_phone_line" id="hidden_field_data_member4_phone" style="<?php echo $sStyleHidden_member4_phone; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member4_phone_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member4_phone"]) &&  $this->nmgp_cmp_readonly["member4_phone"] == "on") { 

 ?>
<input type="hidden" name="member4_phone" value="<?php echo $this->form_encode_input($member4_phone) . "\">" . $member4_phone . ""; ?>
<?php } else { ?>
<span id="id_read_on_member4_phone" class="sc-ui-readonly-member4_phone css_member4_phone_line" style="<?php echo $sStyleReadLab_member4_phone; ?>"><?php echo $this->form_format_readonly("member4_phone", $this->form_encode_input($this->member4_phone)); ?></span><span id="id_read_off_member4_phone" class="css_read_off_member4_phone<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member4_phone; ?>">
 <input class="sc-js-input scFormObjectOdd css_member4_phone_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member4_phone" type=text name="member4_phone" value="<?php echo $this->form_encode_input($member4_phone) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=116 alt="{datatype: 'mask', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', maskList: '(999) 999 - 9999', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member4_phone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member4_phone_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_member4_email_line" id="hidden_field_data_member4_email" style="<?php echo $sStyleHidden_member4_email; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member4_email_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member4_email"]) &&  $this->nmgp_cmp_readonly["member4_email"] == "on") { 

 ?>
<input type="hidden" name="member4_email" value="<?php echo $this->form_encode_input($member4_email) . "\">" . $member4_email . ""; ?>
<?php } else { ?>
<span id="id_read_on_member4_email" class="sc-ui-readonly-member4_email css_member4_email_line" style="<?php echo $sStyleReadLab_member4_email; ?>"><?php echo $this->form_format_readonly("member4_email", $this->form_encode_input($this->member4_email)); ?></span><span id="id_read_off_member4_email" class="css_read_off_member4_email<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member4_email; ?>">
 <input class="sc-js-input scFormObjectOdd css_member4_email_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member4_email" type=text name="member4_email" value="<?php echo $this->form_encode_input($member4_email) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span style="display: none"><?php echo nmButtonOutput($this->arr_buttons, "bemail", "if (document.F1.member4_email.value != '') {window.open('mailto:' + document.F1.member4_email.value); }", "if (document.F1.member4_email.value != '') {window.open('mailto:' + document.F1.member4_email.value); }", "member4_email_mail", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
</span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member4_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member4_email_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_member4_note_line" id="hidden_field_data_member4_note" style="<?php echo $sStyleHidden_member4_note; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member4_note_line" style="vertical-align: top;padding: 0px">
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
<?php $sStyleHidden_member4_name_dumb = ('' == $sStyleHidden_member4_name) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member4_name_dumb" style="<?php echo $sStyleHidden_member4_name_dumb; ?>"></TD>
<?php $sStyleHidden_member4_phone_dumb = ('' == $sStyleHidden_member4_phone) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member4_phone_dumb" style="<?php echo $sStyleHidden_member4_phone_dumb; ?>"></TD>
<?php $sStyleHidden_member4_email_dumb = ('' == $sStyleHidden_member4_email) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member4_email_dumb" style="<?php echo $sStyleHidden_member4_email_dumb; ?>"></TD>
<?php $sStyleHidden_member4_note_dumb = ('' == $sStyleHidden_member4_note) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member4_note_dumb" style="<?php echo $sStyleHidden_member4_note_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
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

    <TD class="scFormDataOdd css_member5_name_line" id="hidden_field_data_member5_name" style="<?php echo $sStyleHidden_member5_name; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member5_name_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member5_name"]) &&  $this->nmgp_cmp_readonly["member5_name"] == "on") { 

 ?>
<input type="hidden" name="member5_name" value="<?php echo $this->form_encode_input($member5_name) . "\">" . $member5_name . ""; ?>
<?php } else { ?>
<span id="id_read_on_member5_name" class="sc-ui-readonly-member5_name css_member5_name_line" style="<?php echo $sStyleReadLab_member5_name; ?>"><?php echo $this->form_format_readonly("member5_name", $this->form_encode_input($this->member5_name)); ?></span><span id="id_read_off_member5_name" class="css_read_off_member5_name<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member5_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_member5_name_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member5_name" type=text name="member5_name" value="<?php echo $this->form_encode_input($member5_name) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '(#05 - Firstname Lastname)', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member5_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member5_name_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_member5_phone_line" id="hidden_field_data_member5_phone" style="<?php echo $sStyleHidden_member5_phone; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member5_phone_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member5_phone"]) &&  $this->nmgp_cmp_readonly["member5_phone"] == "on") { 

 ?>
<input type="hidden" name="member5_phone" value="<?php echo $this->form_encode_input($member5_phone) . "\">" . $member5_phone . ""; ?>
<?php } else { ?>
<span id="id_read_on_member5_phone" class="sc-ui-readonly-member5_phone css_member5_phone_line" style="<?php echo $sStyleReadLab_member5_phone; ?>"><?php echo $this->form_format_readonly("member5_phone", $this->form_encode_input($this->member5_phone)); ?></span><span id="id_read_off_member5_phone" class="css_read_off_member5_phone<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member5_phone; ?>">
 <input class="sc-js-input scFormObjectOdd css_member5_phone_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member5_phone" type=text name="member5_phone" value="<?php echo $this->form_encode_input($member5_phone) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=116 alt="{datatype: 'mask', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', maskList: '(999) 999 - 9999', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member5_phone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member5_phone_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_member5_email_line" id="hidden_field_data_member5_email" style="<?php echo $sStyleHidden_member5_email; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member5_email_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member5_email"]) &&  $this->nmgp_cmp_readonly["member5_email"] == "on") { 

 ?>
<input type="hidden" name="member5_email" value="<?php echo $this->form_encode_input($member5_email) . "\">" . $member5_email . ""; ?>
<?php } else { ?>
<span id="id_read_on_member5_email" class="sc-ui-readonly-member5_email css_member5_email_line" style="<?php echo $sStyleReadLab_member5_email; ?>"><?php echo $this->form_format_readonly("member5_email", $this->form_encode_input($this->member5_email)); ?></span><span id="id_read_off_member5_email" class="css_read_off_member5_email<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member5_email; ?>">
 <input class="sc-js-input scFormObjectOdd css_member5_email_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member5_email" type=text name="member5_email" value="<?php echo $this->form_encode_input($member5_email) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span style="display: none"><?php echo nmButtonOutput($this->arr_buttons, "bemail", "if (document.F1.member5_email.value != '') {window.open('mailto:' + document.F1.member5_email.value); }", "if (document.F1.member5_email.value != '') {window.open('mailto:' + document.F1.member5_email.value); }", "member5_email_mail", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
</span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member5_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member5_email_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_member5_note_line" id="hidden_field_data_member5_note" style="<?php echo $sStyleHidden_member5_note; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member5_note_line" style="vertical-align: top;padding: 0px">
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
<?php $sStyleHidden_member5_name_dumb = ('' == $sStyleHidden_member5_name) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member5_name_dumb" style="<?php echo $sStyleHidden_member5_name_dumb; ?>"></TD>
<?php $sStyleHidden_member5_phone_dumb = ('' == $sStyleHidden_member5_phone) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member5_phone_dumb" style="<?php echo $sStyleHidden_member5_phone_dumb; ?>"></TD>
<?php $sStyleHidden_member5_email_dumb = ('' == $sStyleHidden_member5_email) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member5_email_dumb" style="<?php echo $sStyleHidden_member5_email_dumb; ?>"></TD>
<?php $sStyleHidden_member5_note_dumb = ('' == $sStyleHidden_member5_note) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member5_note_dumb" style="<?php echo $sStyleHidden_member5_note_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
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

    <TD class="scFormDataOdd css_member6_name_line" id="hidden_field_data_member6_name" style="<?php echo $sStyleHidden_member6_name; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member6_name_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member6_name"]) &&  $this->nmgp_cmp_readonly["member6_name"] == "on") { 

 ?>
<input type="hidden" name="member6_name" value="<?php echo $this->form_encode_input($member6_name) . "\">" . $member6_name . ""; ?>
<?php } else { ?>
<span id="id_read_on_member6_name" class="sc-ui-readonly-member6_name css_member6_name_line" style="<?php echo $sStyleReadLab_member6_name; ?>"><?php echo $this->form_format_readonly("member6_name", $this->form_encode_input($this->member6_name)); ?></span><span id="id_read_off_member6_name" class="css_read_off_member6_name<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member6_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_member6_name_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member6_name" type=text name="member6_name" value="<?php echo $this->form_encode_input($member6_name) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '(#06 - Firstname Lastname)', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member6_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member6_name_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_member6_phone_line" id="hidden_field_data_member6_phone" style="<?php echo $sStyleHidden_member6_phone; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member6_phone_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member6_phone"]) &&  $this->nmgp_cmp_readonly["member6_phone"] == "on") { 

 ?>
<input type="hidden" name="member6_phone" value="<?php echo $this->form_encode_input($member6_phone) . "\">" . $member6_phone . ""; ?>
<?php } else { ?>
<span id="id_read_on_member6_phone" class="sc-ui-readonly-member6_phone css_member6_phone_line" style="<?php echo $sStyleReadLab_member6_phone; ?>"><?php echo $this->form_format_readonly("member6_phone", $this->form_encode_input($this->member6_phone)); ?></span><span id="id_read_off_member6_phone" class="css_read_off_member6_phone<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member6_phone; ?>">
 <input class="sc-js-input scFormObjectOdd css_member6_phone_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member6_phone" type=text name="member6_phone" value="<?php echo $this->form_encode_input($member6_phone) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=116 alt="{datatype: 'mask', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', maskList: '(999) 999 - 9999', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member6_phone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member6_phone_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_member6_email_line" id="hidden_field_data_member6_email" style="<?php echo $sStyleHidden_member6_email; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member6_email_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member6_email"]) &&  $this->nmgp_cmp_readonly["member6_email"] == "on") { 

 ?>
<input type="hidden" name="member6_email" value="<?php echo $this->form_encode_input($member6_email) . "\">" . $member6_email . ""; ?>
<?php } else { ?>
<span id="id_read_on_member6_email" class="sc-ui-readonly-member6_email css_member6_email_line" style="<?php echo $sStyleReadLab_member6_email; ?>"><?php echo $this->form_format_readonly("member6_email", $this->form_encode_input($this->member6_email)); ?></span><span id="id_read_off_member6_email" class="css_read_off_member6_email<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member6_email; ?>">
 <input class="sc-js-input scFormObjectOdd css_member6_email_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member6_email" type=text name="member6_email" value="<?php echo $this->form_encode_input($member6_email) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span style="display: none"><?php echo nmButtonOutput($this->arr_buttons, "bemail", "if (document.F1.member6_email.value != '') {window.open('mailto:' + document.F1.member6_email.value); }", "if (document.F1.member6_email.value != '') {window.open('mailto:' + document.F1.member6_email.value); }", "member6_email_mail", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
</span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member6_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member6_email_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_member6_note_line" id="hidden_field_data_member6_note" style="<?php echo $sStyleHidden_member6_note; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member6_note_line" style="vertical-align: top;padding: 0px">
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
<?php $sStyleHidden_member6_name_dumb = ('' == $sStyleHidden_member6_name) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member6_name_dumb" style="<?php echo $sStyleHidden_member6_name_dumb; ?>"></TD>
<?php $sStyleHidden_member6_phone_dumb = ('' == $sStyleHidden_member6_phone) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member6_phone_dumb" style="<?php echo $sStyleHidden_member6_phone_dumb; ?>"></TD>
<?php $sStyleHidden_member6_email_dumb = ('' == $sStyleHidden_member6_email) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member6_email_dumb" style="<?php echo $sStyleHidden_member6_email_dumb; ?>"></TD>
<?php $sStyleHidden_member6_note_dumb = ('' == $sStyleHidden_member6_note) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member6_note_dumb" style="<?php echo $sStyleHidden_member6_note_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
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

    <TD class="scFormDataOdd css_member7_name_line" id="hidden_field_data_member7_name" style="<?php echo $sStyleHidden_member7_name; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member7_name_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member7_name"]) &&  $this->nmgp_cmp_readonly["member7_name"] == "on") { 

 ?>
<input type="hidden" name="member7_name" value="<?php echo $this->form_encode_input($member7_name) . "\">" . $member7_name . ""; ?>
<?php } else { ?>
<span id="id_read_on_member7_name" class="sc-ui-readonly-member7_name css_member7_name_line" style="<?php echo $sStyleReadLab_member7_name; ?>"><?php echo $this->form_format_readonly("member7_name", $this->form_encode_input($this->member7_name)); ?></span><span id="id_read_off_member7_name" class="css_read_off_member7_name<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member7_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_member7_name_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member7_name" type=text name="member7_name" value="<?php echo $this->form_encode_input($member7_name) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '(#07 - Firstname Lastname)', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member7_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member7_name_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_member7_phone_line" id="hidden_field_data_member7_phone" style="<?php echo $sStyleHidden_member7_phone; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member7_phone_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member7_phone"]) &&  $this->nmgp_cmp_readonly["member7_phone"] == "on") { 

 ?>
<input type="hidden" name="member7_phone" value="<?php echo $this->form_encode_input($member7_phone) . "\">" . $member7_phone . ""; ?>
<?php } else { ?>
<span id="id_read_on_member7_phone" class="sc-ui-readonly-member7_phone css_member7_phone_line" style="<?php echo $sStyleReadLab_member7_phone; ?>"><?php echo $this->form_format_readonly("member7_phone", $this->form_encode_input($this->member7_phone)); ?></span><span id="id_read_off_member7_phone" class="css_read_off_member7_phone<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member7_phone; ?>">
 <input class="sc-js-input scFormObjectOdd css_member7_phone_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member7_phone" type=text name="member7_phone" value="<?php echo $this->form_encode_input($member7_phone) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=116 alt="{datatype: 'mask', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', maskList: '(999) 999 - 9999', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member7_phone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member7_phone_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_member7_email_line" id="hidden_field_data_member7_email" style="<?php echo $sStyleHidden_member7_email; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member7_email_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member7_email"]) &&  $this->nmgp_cmp_readonly["member7_email"] == "on") { 

 ?>
<input type="hidden" name="member7_email" value="<?php echo $this->form_encode_input($member7_email) . "\">" . $member7_email . ""; ?>
<?php } else { ?>
<span id="id_read_on_member7_email" class="sc-ui-readonly-member7_email css_member7_email_line" style="<?php echo $sStyleReadLab_member7_email; ?>"><?php echo $this->form_format_readonly("member7_email", $this->form_encode_input($this->member7_email)); ?></span><span id="id_read_off_member7_email" class="css_read_off_member7_email<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member7_email; ?>">
 <input class="sc-js-input scFormObjectOdd css_member7_email_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member7_email" type=text name="member7_email" value="<?php echo $this->form_encode_input($member7_email) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span style="display: none"><?php echo nmButtonOutput($this->arr_buttons, "bemail", "if (document.F1.member7_email.value != '') {window.open('mailto:' + document.F1.member7_email.value); }", "if (document.F1.member7_email.value != '') {window.open('mailto:' + document.F1.member7_email.value); }", "member7_email_mail", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
</span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member7_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member7_email_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_member7_note_line" id="hidden_field_data_member7_note" style="<?php echo $sStyleHidden_member7_note; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member7_note_line" style="vertical-align: top;padding: 0px">
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
<?php $sStyleHidden_member7_name_dumb = ('' == $sStyleHidden_member7_name) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member7_name_dumb" style="<?php echo $sStyleHidden_member7_name_dumb; ?>"></TD>
<?php $sStyleHidden_member7_phone_dumb = ('' == $sStyleHidden_member7_phone) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member7_phone_dumb" style="<?php echo $sStyleHidden_member7_phone_dumb; ?>"></TD>
<?php $sStyleHidden_member7_email_dumb = ('' == $sStyleHidden_member7_email) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member7_email_dumb" style="<?php echo $sStyleHidden_member7_email_dumb; ?>"></TD>
<?php $sStyleHidden_member7_note_dumb = ('' == $sStyleHidden_member7_note) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member7_note_dumb" style="<?php echo $sStyleHidden_member7_note_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
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

    <TD class="scFormDataOdd css_member8_name_line" id="hidden_field_data_member8_name" style="<?php echo $sStyleHidden_member8_name; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member8_name_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member8_name"]) &&  $this->nmgp_cmp_readonly["member8_name"] == "on") { 

 ?>
<input type="hidden" name="member8_name" value="<?php echo $this->form_encode_input($member8_name) . "\">" . $member8_name . ""; ?>
<?php } else { ?>
<span id="id_read_on_member8_name" class="sc-ui-readonly-member8_name css_member8_name_line" style="<?php echo $sStyleReadLab_member8_name; ?>"><?php echo $this->form_format_readonly("member8_name", $this->form_encode_input($this->member8_name)); ?></span><span id="id_read_off_member8_name" class="css_read_off_member8_name<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member8_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_member8_name_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member8_name" type=text name="member8_name" value="<?php echo $this->form_encode_input($member8_name) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '(#08 - Firstname Lastname)', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member8_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member8_name_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_member8_phone_line" id="hidden_field_data_member8_phone" style="<?php echo $sStyleHidden_member8_phone; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member8_phone_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member8_phone"]) &&  $this->nmgp_cmp_readonly["member8_phone"] == "on") { 

 ?>
<input type="hidden" name="member8_phone" value="<?php echo $this->form_encode_input($member8_phone) . "\">" . $member8_phone . ""; ?>
<?php } else { ?>
<span id="id_read_on_member8_phone" class="sc-ui-readonly-member8_phone css_member8_phone_line" style="<?php echo $sStyleReadLab_member8_phone; ?>"><?php echo $this->form_format_readonly("member8_phone", $this->form_encode_input($this->member8_phone)); ?></span><span id="id_read_off_member8_phone" class="css_read_off_member8_phone<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member8_phone; ?>">
 <input class="sc-js-input scFormObjectOdd css_member8_phone_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member8_phone" type=text name="member8_phone" value="<?php echo $this->form_encode_input($member8_phone) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=116 alt="{datatype: 'mask', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', maskList: '(999) 999 - 9999', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member8_phone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member8_phone_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_member8_email_line" id="hidden_field_data_member8_email" style="<?php echo $sStyleHidden_member8_email; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member8_email_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member8_email"]) &&  $this->nmgp_cmp_readonly["member8_email"] == "on") { 

 ?>
<input type="hidden" name="member8_email" value="<?php echo $this->form_encode_input($member8_email) . "\">" . $member8_email . ""; ?>
<?php } else { ?>
<span id="id_read_on_member8_email" class="sc-ui-readonly-member8_email css_member8_email_line" style="<?php echo $sStyleReadLab_member8_email; ?>"><?php echo $this->form_format_readonly("member8_email", $this->form_encode_input($this->member8_email)); ?></span><span id="id_read_off_member8_email" class="css_read_off_member8_email<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member8_email; ?>">
 <input class="sc-js-input scFormObjectOdd css_member8_email_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member8_email" type=text name="member8_email" value="<?php echo $this->form_encode_input($member8_email) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span style="display: none"><?php echo nmButtonOutput($this->arr_buttons, "bemail", "if (document.F1.member8_email.value != '') {window.open('mailto:' + document.F1.member8_email.value); }", "if (document.F1.member8_email.value != '') {window.open('mailto:' + document.F1.member8_email.value); }", "member8_email_mail", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
</span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member8_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member8_email_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_member8_note_line" id="hidden_field_data_member8_note" style="<?php echo $sStyleHidden_member8_note; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member8_note_line" style="vertical-align: top;padding: 0px">
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
<?php $sStyleHidden_member8_name_dumb = ('' == $sStyleHidden_member8_name) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member8_name_dumb" style="<?php echo $sStyleHidden_member8_name_dumb; ?>"></TD>
<?php $sStyleHidden_member8_phone_dumb = ('' == $sStyleHidden_member8_phone) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member8_phone_dumb" style="<?php echo $sStyleHidden_member8_phone_dumb; ?>"></TD>
<?php $sStyleHidden_member8_email_dumb = ('' == $sStyleHidden_member8_email) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member8_email_dumb" style="<?php echo $sStyleHidden_member8_email_dumb; ?>"></TD>
<?php $sStyleHidden_member8_note_dumb = ('' == $sStyleHidden_member8_note) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member8_note_dumb" style="<?php echo $sStyleHidden_member8_note_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
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

    <TD class="scFormDataOdd css_member9_name_line" id="hidden_field_data_member9_name" style="<?php echo $sStyleHidden_member9_name; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member9_name_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member9_name"]) &&  $this->nmgp_cmp_readonly["member9_name"] == "on") { 

 ?>
<input type="hidden" name="member9_name" value="<?php echo $this->form_encode_input($member9_name) . "\">" . $member9_name . ""; ?>
<?php } else { ?>
<span id="id_read_on_member9_name" class="sc-ui-readonly-member9_name css_member9_name_line" style="<?php echo $sStyleReadLab_member9_name; ?>"><?php echo $this->form_format_readonly("member9_name", $this->form_encode_input($this->member9_name)); ?></span><span id="id_read_off_member9_name" class="css_read_off_member9_name<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member9_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_member9_name_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member9_name" type=text name="member9_name" value="<?php echo $this->form_encode_input($member9_name) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '(#09 - Firstname Lastname)', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member9_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member9_name_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_member9_phone_line" id="hidden_field_data_member9_phone" style="<?php echo $sStyleHidden_member9_phone; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member9_phone_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member9_phone"]) &&  $this->nmgp_cmp_readonly["member9_phone"] == "on") { 

 ?>
<input type="hidden" name="member9_phone" value="<?php echo $this->form_encode_input($member9_phone) . "\">" . $member9_phone . ""; ?>
<?php } else { ?>
<span id="id_read_on_member9_phone" class="sc-ui-readonly-member9_phone css_member9_phone_line" style="<?php echo $sStyleReadLab_member9_phone; ?>"><?php echo $this->form_format_readonly("member9_phone", $this->form_encode_input($this->member9_phone)); ?></span><span id="id_read_off_member9_phone" class="css_read_off_member9_phone<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member9_phone; ?>">
 <input class="sc-js-input scFormObjectOdd css_member9_phone_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member9_phone" type=text name="member9_phone" value="<?php echo $this->form_encode_input($member9_phone) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=116 alt="{datatype: 'mask', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', maskList: '(999) 999 - 9999', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member9_phone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member9_phone_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_member9_email_line" id="hidden_field_data_member9_email" style="<?php echo $sStyleHidden_member9_email; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member9_email_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member9_email"]) &&  $this->nmgp_cmp_readonly["member9_email"] == "on") { 

 ?>
<input type="hidden" name="member9_email" value="<?php echo $this->form_encode_input($member9_email) . "\">" . $member9_email . ""; ?>
<?php } else { ?>
<span id="id_read_on_member9_email" class="sc-ui-readonly-member9_email css_member9_email_line" style="<?php echo $sStyleReadLab_member9_email; ?>"><?php echo $this->form_format_readonly("member9_email", $this->form_encode_input($this->member9_email)); ?></span><span id="id_read_off_member9_email" class="css_read_off_member9_email<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member9_email; ?>">
 <input class="sc-js-input scFormObjectOdd css_member9_email_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member9_email" type=text name="member9_email" value="<?php echo $this->form_encode_input($member9_email) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span style="display: none"><?php echo nmButtonOutput($this->arr_buttons, "bemail", "if (document.F1.member9_email.value != '') {window.open('mailto:' + document.F1.member9_email.value); }", "if (document.F1.member9_email.value != '') {window.open('mailto:' + document.F1.member9_email.value); }", "member9_email_mail", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
</span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member9_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member9_email_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_member9_note_line" id="hidden_field_data_member9_note" style="<?php echo $sStyleHidden_member9_note; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member9_note_line" style="vertical-align: top;padding: 0px">
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
<?php $sStyleHidden_member9_name_dumb = ('' == $sStyleHidden_member9_name) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member9_name_dumb" style="<?php echo $sStyleHidden_member9_name_dumb; ?>"></TD>
<?php $sStyleHidden_member9_phone_dumb = ('' == $sStyleHidden_member9_phone) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member9_phone_dumb" style="<?php echo $sStyleHidden_member9_phone_dumb; ?>"></TD>
<?php $sStyleHidden_member9_email_dumb = ('' == $sStyleHidden_member9_email) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member9_email_dumb" style="<?php echo $sStyleHidden_member9_email_dumb; ?>"></TD>
<?php $sStyleHidden_member9_note_dumb = ('' == $sStyleHidden_member9_note) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member9_note_dumb" style="<?php echo $sStyleHidden_member9_note_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
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

    <TD class="scFormDataOdd css_member10_name_line" id="hidden_field_data_member10_name" style="<?php echo $sStyleHidden_member10_name; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member10_name_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member10_name"]) &&  $this->nmgp_cmp_readonly["member10_name"] == "on") { 

 ?>
<input type="hidden" name="member10_name" value="<?php echo $this->form_encode_input($member10_name) . "\">" . $member10_name . ""; ?>
<?php } else { ?>
<span id="id_read_on_member10_name" class="sc-ui-readonly-member10_name css_member10_name_line" style="<?php echo $sStyleReadLab_member10_name; ?>"><?php echo $this->form_format_readonly("member10_name", $this->form_encode_input($this->member10_name)); ?></span><span id="id_read_off_member10_name" class="css_read_off_member10_name<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member10_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_member10_name_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member10_name" type=text name="member10_name" value="<?php echo $this->form_encode_input($member10_name) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '(#10 - Firstname Lastname)', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member10_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member10_name_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_member10_phone_line" id="hidden_field_data_member10_phone" style="<?php echo $sStyleHidden_member10_phone; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member10_phone_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member10_phone"]) &&  $this->nmgp_cmp_readonly["member10_phone"] == "on") { 

 ?>
<input type="hidden" name="member10_phone" value="<?php echo $this->form_encode_input($member10_phone) . "\">" . $member10_phone . ""; ?>
<?php } else { ?>
<span id="id_read_on_member10_phone" class="sc-ui-readonly-member10_phone css_member10_phone_line" style="<?php echo $sStyleReadLab_member10_phone; ?>"><?php echo $this->form_format_readonly("member10_phone", $this->form_encode_input($this->member10_phone)); ?></span><span id="id_read_off_member10_phone" class="css_read_off_member10_phone<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member10_phone; ?>">
 <input class="sc-js-input scFormObjectOdd css_member10_phone_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member10_phone" type=text name="member10_phone" value="<?php echo $this->form_encode_input($member10_phone) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=116 alt="{datatype: 'mask', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', maskList: '(999) 999 - 9999', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member10_phone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member10_phone_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_member10_email_line" id="hidden_field_data_member10_email" style="<?php echo $sStyleHidden_member10_email; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member10_email_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["member10_email"]) &&  $this->nmgp_cmp_readonly["member10_email"] == "on") { 

 ?>
<input type="hidden" name="member10_email" value="<?php echo $this->form_encode_input($member10_email) . "\">" . $member10_email . ""; ?>
<?php } else { ?>
<span id="id_read_on_member10_email" class="sc-ui-readonly-member10_email css_member10_email_line" style="<?php echo $sStyleReadLab_member10_email; ?>"><?php echo $this->form_format_readonly("member10_email", $this->form_encode_input($this->member10_email)); ?></span><span id="id_read_off_member10_email" class="css_read_off_member10_email<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_member10_email; ?>">
 <input class="sc-js-input scFormObjectOdd css_member10_email_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_member10_email" type=text name="member10_email" value="<?php echo $this->form_encode_input($member10_email) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=255 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span style="display: none"><?php echo nmButtonOutput($this->arr_buttons, "bemail", "if (document.F1.member10_email.value != '') {window.open('mailto:' + document.F1.member10_email.value); }", "if (document.F1.member10_email.value != '') {window.open('mailto:' + document.F1.member10_email.value); }", "member10_email_mail", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>
</span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_member10_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_member10_email_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_member10_note_line" id="hidden_field_data_member10_note" style="<?php echo $sStyleHidden_member10_note; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_member10_note_line" style="vertical-align: top;padding: 0px">
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
<?php $sStyleHidden_member10_name_dumb = ('' == $sStyleHidden_member10_name) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member10_name_dumb" style="<?php echo $sStyleHidden_member10_name_dumb; ?>"></TD>
<?php $sStyleHidden_member10_phone_dumb = ('' == $sStyleHidden_member10_phone) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member10_phone_dumb" style="<?php echo $sStyleHidden_member10_phone_dumb; ?>"></TD>
<?php $sStyleHidden_member10_email_dumb = ('' == $sStyleHidden_member10_email) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member10_email_dumb" style="<?php echo $sStyleHidden_member10_email_dumb; ?>"></TD>
<?php $sStyleHidden_member10_note_dumb = ('' == $sStyleHidden_member10_note) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_member10_note_dumb" style="<?php echo $sStyleHidden_member10_note_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
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

    <TD class="scFormDataOdd css_dummy06_line" id="hidden_field_data_dummy06" style="<?php echo $sStyleHidden_dummy06; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dummy06_line" style="vertical-align: top;padding: 0px"><span id="id_ajax_label_dummy06"><?php echo $dummy06?></span>
<input type="hidden" name="dummy06" value="<?php echo $this->form_encode_input($dummy06); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dummy06_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dummy06_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="3" >&nbsp;</TD>




<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
<?php $sStyleHidden_dummy06_dumb = ('' == $sStyleHidden_dummy06) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_dummy06_dumb" style="<?php echo $sStyleHidden_dummy06_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_6"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_6" class="scBlockFrame"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_6" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont" style="color: #999999"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf6\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_exp . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;color: #999999; \" class=\"scFormBlockAlign\">"; } ?>NEED TO ADD MORE?<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
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
<input type="hidden" name="more_buyers_xlsx" value="<?php echo $this->form_encode_input($more_buyers_xlsx) . "\"><img id=\"more_buyers_xlsx_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><span id=\"id_ajax_doc_more_buyers_xlsx\"><a href=\"javascript:nm_mostra_doc('2', '" . str_replace(array("'", '%'), array("\'", '**Perc**'), substr($sTmpFile_more_buyers_xlsx, 3)) . "', 'form_clients_steps_appn')\">" . $more_buyers_xlsx . "</a></span>"; ?>
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
<img id="more_buyers_xlsx_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><span id="id_ajax_doc_more_buyers_xlsx"><a href="javascript:nm_mostra_doc('2', '<?php echo str_replace(array("'", '%'), array("\'", '**Perc**'), substr($sTmpFile_more_buyers_xlsx, 3)); ?>', 'form_clients_steps_appn')"><?php echo $more_buyers_xlsx ?></a></span><div id="id_img_loader_more_buyers_xlsx" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_more_buyers_xlsx" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
<div id="id_sc_dragdrop_more_buyers_xlsx" class="scFormDataDragNDrop"  style="<?php echo $sStyleReadInp_more_buyers_xlsx ?>cursor:pointer" onclick="$('#id_sc_field_more_buyers_xlsx').click()"><i class='fas fa-cloud-upload-alt'></i><br/>
<?php echo $this->Ini->Nm_lang['lang_errm_mu_dragfile_clickable'] ?></div>
<span class="scFormDataTagOdd" style="display: block">Please note that we only accept files in the <b>.xlsx</b> or <b>.xls</b> formats.</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_more_buyers_xlsx_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_more_buyers_xlsx_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_xlsx_sample_dumb = ('' == $sStyleHidden_xlsx_sample) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_xlsx_sample_dumb" style="<?php echo $sStyleHidden_xlsx_sample_dumb; ?>"></TD>
<?php $sStyleHidden_more_buyers_xlsx_dumb = ('' == $sStyleHidden_more_buyers_xlsx) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_more_buyers_xlsx_dumb" style="<?php echo $sStyleHidden_more_buyers_xlsx_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
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
<?php $sStyleHidden_buyers_excel_qty_dumb = ('' == $sStyleHidden_buyers_excel_qty) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_buyers_excel_qty_dumb" style="<?php echo $sStyleHidden_buyers_excel_qty_dumb; ?>"></TD>
<?php $sStyleHidden_dummy09_dumb = ('' == $sStyleHidden_dummy09) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_dummy09_dumb" style="<?php echo $sStyleHidden_dummy09_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr style=\"display: none;\">"; }; 
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

    <TD class="scFormDataOdd" colspan="1" >&nbsp;</TD>




<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
