<div id="form_clients_steps_appn_stripe_form3" style='<?php echo (3 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['form_wizard']['actual_step'] ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow scBlockRowFirst"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_6" class="scBlockFrame"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['memb_qty']))
   {
       $this->nmgp_cmp_hidden['memb_qty'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['js_strp_price_id']))
   {
       $this->nmgp_cmp_hidden['js_strp_price_id'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['js_prod_price']))
   {
       $this->nmgp_cmp_hidden['js_prod_price'] = 'off';
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
<TABLE align="center" id="hidden_bloco_6" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['client_id']))
           {
               $this->nmgp_cmp_readonly['client_id'] = 'on';
           }
?>
   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">MEMBERSHIP DETAILS</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['est_memb_cost']))
    {
        $this->nm_new_label['est_memb_cost'] = "";
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

    <TD class="scFormDataOdd css_est_memb_cost_line" id="hidden_field_data_est_memb_cost" style="<?php echo $sStyleHidden_est_memb_cost; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_est_memb_cost_line" style="padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_est_memb_cost_label" style=""><span id="id_label_est_memb_cost"><?php echo $this->nm_new_label['est_memb_cost']; ?></span></span><br><span id="id_read_on_est_memb_cost css_est_memb_cost_line" style="<?php echo $sStyleReadLab_est_memb_cost; ?>"><?php echo $fieldContent; ?></span><span id="id_read_off_est_memb_cost" class="css_read_off_est_memb_cost" style="<?php echo $sStyleReadInp_est_memb_cost; ?>"><span id="id_ajax_label_est_memb_cost"><?php echo $est_memb_cost?></span>
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
    if (!isset($this->nm_new_label['rules']))
    {
        $this->nm_new_label['rules'] = "";
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

    <TD class="scFormDataOdd css_rules_line" id="hidden_field_data_rules" style="<?php echo $sStyleHidden_rules; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rules_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_rules_label" style=""><span id="id_label_rules"><?php echo $this->nm_new_label['rules']; ?></span></span><br><span id="id_read_on_rules css_rules_line" style="<?php echo $sStyleReadLab_rules; ?>"><?php echo $fieldContent; ?></span><span id="id_read_off_rules" class="css_read_off_rules" style="<?php echo $sStyleReadInp_rules; ?>"><span id="id_ajax_label_rules"><?php echo $rules?></span>
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
    if (!isset($this->nm_new_label['memb_qty']))
    {
        $this->nm_new_label['memb_qty'] = "Memb Qty";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $memb_qty = $this->memb_qty;
   if (!isset($this->nmgp_cmp_hidden['memb_qty']))
   {
       $this->nmgp_cmp_hidden['memb_qty'] = 'off';
   }
   $sStyleHidden_memb_qty = '';
   if (isset($this->nmgp_cmp_hidden['memb_qty']) && $this->nmgp_cmp_hidden['memb_qty'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['memb_qty']);
       $sStyleHidden_memb_qty = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_memb_qty = 'display: none;';
   $sStyleReadInp_memb_qty = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['memb_qty']) && $this->nmgp_cmp_readonly['memb_qty'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['memb_qty']);
       $sStyleReadLab_memb_qty = '';
       $sStyleReadInp_memb_qty = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['memb_qty']) && $this->nmgp_cmp_hidden['memb_qty'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="memb_qty" value="<?php echo $this->form_encode_input($memb_qty) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_memb_qty_line" id="hidden_field_data_memb_qty" style="<?php echo $sStyleHidden_memb_qty; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_memb_qty_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_memb_qty_label" style=""><span id="id_label_memb_qty"><?php echo $this->nm_new_label['memb_qty']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["memb_qty"]) &&  $this->nmgp_cmp_readonly["memb_qty"] == "on") { 

 ?>
<input type="hidden" name="memb_qty" value="<?php echo $this->form_encode_input($memb_qty) . "\">" . $memb_qty . ""; ?>
<?php } else { ?>
<span id="id_read_on_memb_qty" class="sc-ui-readonly-memb_qty css_memb_qty_line" style="<?php echo $sStyleReadLab_memb_qty; ?>"><?php echo $this->form_format_readonly("memb_qty", $this->form_encode_input($this->memb_qty)); ?></span><span id="id_read_off_memb_qty" class="css_read_off_memb_qty<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_memb_qty; ?>">
 <input class="sc-js-input scFormObjectOdd css_memb_qty_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_memb_qty" type=text name="memb_qty" value="<?php echo $this->form_encode_input($memb_qty) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['memb_qty']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['memb_qty']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['memb_qty']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_memb_qty_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_memb_qty_text"></span></td></tr></table></td></tr></table> </TD>
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

    <TD class="scFormDataOdd css_read_at_sign_line" id="hidden_field_data_read_at_sign" style="<?php echo $sStyleHidden_read_at_sign; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_read_at_sign_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_read_at_sign_label" style=""><span id="id_label_read_at_sign"><?php echo $this->nm_new_label['read_at_sign']; ?></span></span><br><span id="id_read_on_read_at_sign css_read_at_sign_line" style="<?php echo $sStyleReadLab_read_at_sign; ?>"><?php echo $fieldContent; ?></span><span id="id_read_off_read_at_sign" class="css_read_off_read_at_sign" style="<?php echo $sStyleReadInp_read_at_sign; ?>"><span id="id_ajax_label_read_at_sign"><?php echo $read_at_sign?></span>
</span><input type="hidden" name="read_at_sign" value="<?php echo $this->form_encode_input($read_at_sign); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_read_at_sign_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_read_at_sign_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_read_at_sign_dumb = ('' == $sStyleHidden_read_at_sign) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_read_at_sign_dumb" style="<?php echo $sStyleHidden_read_at_sign_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_7"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow"><tr valign="top"><td width="1000%" height="">
<div id="div_hidden_bloco_7" class="scBlockFrame"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_7" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
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

    <TD class="scFormDataOdd css_applicant_name_line" id="hidden_field_data_applicant_name" style="<?php echo $sStyleHidden_applicant_name; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_applicant_name_line" style="padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_applicant_name_label" style=""><span id="id_label_applicant_name"><?php echo $this->nm_new_label['applicant_name']; ?></span></span><br>
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

    <TD class="scFormDataOdd css_applicant_title_line" id="hidden_field_data_applicant_title" style="<?php echo $sStyleHidden_applicant_title; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_applicant_title_line" style="padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_applicant_title_label" style=""><span id="id_label_applicant_title"><?php echo $this->nm_new_label['applicant_title']; ?></span></span><br>
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

    <TD class="scFormDataOdd css_js_strp_price_id_line" id="hidden_field_data_js_strp_price_id" style="<?php echo $sStyleHidden_js_strp_price_id; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_js_strp_price_id_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_js_strp_price_id_label" style=""><span id="id_label_js_strp_price_id"><?php echo $this->nm_new_label['js_strp_price_id']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["js_strp_price_id"]) &&  $this->nmgp_cmp_readonly["js_strp_price_id"] == "on") { 

 ?>
<input type="hidden" name="js_strp_price_id" value="<?php echo $this->form_encode_input($js_strp_price_id) . "\">" . $js_strp_price_id . ""; ?>
<?php } else { ?>
<span id="id_read_on_js_strp_price_id" class="sc-ui-readonly-js_strp_price_id css_js_strp_price_id_line" style="<?php echo $sStyleReadLab_js_strp_price_id; ?>"><?php echo $this->form_format_readonly("js_strp_price_id", $this->form_encode_input($this->js_strp_price_id)); ?></span><span id="id_read_off_js_strp_price_id" class="css_read_off_js_strp_price_id<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_js_strp_price_id; ?>">
 <input class="sc-js-input scFormObjectOdd css_js_strp_price_id_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_js_strp_price_id" type=text name="js_strp_price_id" value="<?php echo $this->form_encode_input($js_strp_price_id) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_js_strp_price_id_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_js_strp_price_id_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




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

    <TD class="scFormDataOdd css_js_prod_price_line" id="hidden_field_data_js_prod_price" style="<?php echo $sStyleHidden_js_prod_price; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_js_prod_price_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_js_prod_price_label" style=""><span id="id_label_js_prod_price"><?php echo $this->nm_new_label['js_prod_price']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["js_prod_price"]) &&  $this->nmgp_cmp_readonly["js_prod_price"] == "on") { 

 ?>
<input type="hidden" name="js_prod_price" value="<?php echo $this->form_encode_input($js_prod_price) . "\">" . $js_prod_price . ""; ?>
<?php } else { ?>
<span id="id_read_on_js_prod_price" class="sc-ui-readonly-js_prod_price css_js_prod_price_line" style="<?php echo $sStyleReadLab_js_prod_price; ?>"><?php echo $this->form_format_readonly("js_prod_price", $this->form_encode_input($this->js_prod_price)); ?></span><span id="id_read_off_js_prod_price" class="css_read_off_js_prod_price<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_js_prod_price; ?>">
 <input class="sc-js-input scFormObjectOdd css_js_prod_price_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_js_prod_price" type=text name="js_prod_price" value="<?php echo $this->form_encode_input($js_prod_price) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_js_prod_price_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_js_prod_price_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




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

    <TD class="scFormDataOdd css_js_mbr_ct_line" id="hidden_field_data_js_mbr_ct" style="<?php echo $sStyleHidden_js_mbr_ct; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_js_mbr_ct_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_js_mbr_ct_label" style=""><span id="id_label_js_mbr_ct"><?php echo $this->nm_new_label['js_mbr_ct']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["js_mbr_ct"]) &&  $this->nmgp_cmp_readonly["js_mbr_ct"] == "on") { 

 ?>
<input type="hidden" name="js_mbr_ct" value="<?php echo $this->form_encode_input($js_mbr_ct) . "\">" . $js_mbr_ct . ""; ?>
<?php } else { ?>
<span id="id_read_on_js_mbr_ct" class="sc-ui-readonly-js_mbr_ct css_js_mbr_ct_line" style="<?php echo $sStyleReadLab_js_mbr_ct; ?>"><?php echo $this->form_format_readonly("js_mbr_ct", $this->form_encode_input($this->js_mbr_ct)); ?></span><span id="id_read_off_js_mbr_ct" class="css_read_off_js_mbr_ct<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_js_mbr_ct; ?>">
 <input class="sc-js-input scFormObjectOdd css_js_mbr_ct_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_js_mbr_ct" type=text name="js_mbr_ct" value="<?php echo $this->form_encode_input($js_mbr_ct) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_js_mbr_ct_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_js_mbr_ct_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


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

    <TD class="scFormDataOdd css_js_client_id_line" id="hidden_field_data_js_client_id" style="<?php echo $sStyleHidden_js_client_id; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_js_client_id_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_js_client_id_label" style=""><span id="id_label_js_client_id"><?php echo $this->nm_new_label['js_client_id']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["js_client_id"]) &&  $this->nmgp_cmp_readonly["js_client_id"] == "on") { 

 ?>
<input type="hidden" name="js_client_id" value="<?php echo $this->form_encode_input($js_client_id) . "\">" . $js_client_id . ""; ?>
<?php } else { ?>
<span id="id_read_on_js_client_id" class="sc-ui-readonly-js_client_id css_js_client_id_line" style="<?php echo $sStyleReadLab_js_client_id; ?>"><?php echo $this->form_format_readonly("js_client_id", $this->form_encode_input($this->js_client_id)); ?></span><span id="id_read_off_js_client_id" class="css_read_off_js_client_id<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_js_client_id; ?>">
 <input class="sc-js-input scFormObjectOdd css_js_client_id_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_js_client_id" type=text name="js_client_id" value="<?php echo $this->form_encode_input($js_client_id) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_js_client_id_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_js_client_id_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_js_client_id_dumb = ('' == $sStyleHidden_js_client_id) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_js_client_id_dumb" style="<?php echo $sStyleHidden_js_client_id_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_8"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_8" class="scBlockFrame"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_8" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['applicant_signature']))
    {
        $this->nm_new_label['applicant_signature'] = "Applicant Signature<br>(Please use your mouse or input device to sign below)";
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

    <TD class="scFormDataOdd css_applicant_signature_line" id="hidden_field_data_applicant_signature" style="<?php echo $sStyleHidden_applicant_signature; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_applicant_signature_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_applicant_signature_label" style=""><span id="id_label_applicant_signature"><?php echo $this->nm_new_label['applicant_signature']; ?></span></span><br><span id="id_read_on_applicant_signature" style="<?php echo $sStyleReadLab_applicant_signature; ?>"><div id="sc-id-ronly-applicant_signature" style="width: 500px; height: 150px; background-color: #FFFFFF"><img style="border-width: 0" /></div>
</span><span id="id_read_off_applicant_signature" class="css_read_off_applicant_signature" style="<?php echo $sStyleReadInp_applicant_signature; ?>"><input type="hidden" name="applicant_signature" id="id_sc_field_applicant_signature" value="<?php echo $this->applicant_signature ?>" />
<div class="sc-ui-sign" id="sc-id-sign-applicant_signature" style="width: 500px; height: 150px; background-color: #FFFFFF"></div>
<div id="sc-id-disabled-applicant_signature" style="display: none; width: 500px; height: 150px; background-color: #FFFFFF"><img style="border-width: 0" /></div>
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
<tr><td>
<?php
$this->displayBottomToolbar();
?>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
    $NM_btn = false;
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['run_iframe'] != "R")
{
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-1';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['btn_disabled']['bstepretorna']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['btn_disabled']['bstepretorna']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['btn_label']['bstepretorna']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['btn_label']['bstepretorna']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['btn_label']['bstepretorna'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bstepretorna", "scBtnFn_sys_format_stepret()", "scBtnFn_sys_format_stepret()", "sc_b_stepret_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-2';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['btn_disabled']['bstepavanca']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['btn_disabled']['bstepavanca']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['btn_label']['bstepavanca']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['btn_label']['bstepavanca']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['btn_label']['bstepavanca'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bstepavanca", "scBtnFn_sys_format_stepava()", "scBtnFn_sys_format_stepava()", "sc_b_stepavc_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['pmt_js'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['btn_disabled']['pmt_js']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['btn_disabled']['pmt_js']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['btn_label']['pmt_js']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['btn_label']['pmt_js']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['btn_label']['pmt_js'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "pmt_js", "scBtnFn_pmt_js()", "scBtnFn_pmt_js()", "sc_pmt_js_bot", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-3';
        $buttonMacroLabel = "(2) Submit Application";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['btn_label']['update'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
    if (isset($this->NMSC_modal) && $this->NMSC_modal == "ok") {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-4';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai_modal()", "scBtnFn_sys_format_sai_modal()", "sc_b_sai_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['run_iframe'] != "R")
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
        scJQWizardGoToPage(<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['form_wizard']['actual_step']; ?>);
        $(".sc-form-page").on("click", function() {
            var thisStepNo = $(this).attr("id").substr(16);
            scJQWizardPageClick(thisStepNo);
        });
    } else {
        scJQWizardGoToStep(<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['form_wizard']['actual_step']; ?>);
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
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5,6,7,8);

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
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5,6,7,8);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_clients_steps_appn_stripe");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_clients_steps_appn_stripe");
 parent.scAjaxDetailHeight("form_clients_steps_appn_stripe", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_clients_steps_appn_stripe", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_clients_steps_appn_stripe", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['sc_modal'])
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
        function scBtnFn_sys_format_stepret() {
                if ($("#sc_b_stepret_b.sc-unique-btn-1").length && $("#sc_b_stepret_b.sc-unique-btn-1").is(":visible")) {
                    if ($("#sc_b_stepret_b.sc-unique-btn-1").hasClass("disabled")) {
                        return;
                    }
                        scJQWizardGoToPreviousStep()
                         return;
                }
        }
        function scBtnFn_sys_format_stepava() {
                if ($("#sc_b_stepavc_b.sc-unique-btn-2").length && $("#sc_b_stepavc_b.sc-unique-btn-2").is(":visible")) {
                    if ($("#sc_b_stepavc_b.sc-unique-btn-2").hasClass("disabled")) {
                        return;
                    }
                        scJQWizardGoToNextStep()
                         return;
                }
        }
        function scBtnFn_pmt_js() {
                if ($("#sc_pmt_js_bot").length && $("#sc_pmt_js_bot").is(":visible")) {
                    if ($("#sc_pmt_js_bot").hasClass("disabled")) {
                        return;
                    }
                        sc_btn_pmt_js()
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
        function scBtnFn_sys_format_sai_modal() {
                if ($("#sc_b_sai_b.sc-unique-btn-4").length && $("#sc_b_sai_b.sc-unique-btn-4").is(":visible")) {
                    if ($("#sc_b_sai_b.sc-unique-btn-4").hasClass("disabled")) {
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe']['buttonStatus'] = $this->nmgp_botoes;
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
