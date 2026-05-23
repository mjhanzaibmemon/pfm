<div id="form_clients_steps_renew_form3" style='<?php echo (3 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['form_wizard']['actual_step'] ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow scBlockRowFirst"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_7" class="scBlockFrame"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_7" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['client_id']))
           {
               $this->nmgp_cmp_readonly['client_id'] = 'on';
           }
?>
   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf7\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>RULES & REGULATIONS<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php $sStyleHidden_dummy11_dumb = ('' == $sStyleHidden_dummy11) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_dummy11_dumb" style="<?php echo $sStyleHidden_dummy11_dumb; ?>"></TD>
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

    <TD class="scFormDataOdd css_rules_line" id="hidden_field_data_rules" style="<?php echo $sStyleHidden_rules; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rules_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_rules css_rules_line" style="<?php echo $sStyleReadLab_rules; ?>"><?php echo $fieldContent; ?></span><span id="id_read_off_rules" class="css_read_off_rules" style="<?php echo $sStyleReadInp_rules; ?>"><span id="id_ajax_label_rules"><?php echo $rules?></span>
</span><input type="hidden" name="rules" value="<?php echo $this->form_encode_input($rules); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rules_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rules_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_rules_warn_line" id="hidden_field_data_rules_warn" style="<?php echo $sStyleHidden_rules_warn; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rules_warn_line" style="vertical-align: top;padding: 0px"><?php
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






<?php $sStyleHidden_rules_dumb = ('' == $sStyleHidden_rules) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_rules_dumb" style="<?php echo $sStyleHidden_rules_dumb; ?>"></TD>
<?php $sStyleHidden_rules_warn_dumb = ('' == $sStyleHidden_rules_warn) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_rules_warn_dumb" style="<?php echo $sStyleHidden_rules_warn_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_8"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow"><tr valign="top"><td width="50%" height="">
<div id="div_hidden_bloco_8" class="scBlockFrame"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_8" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf8\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>MEMBERSHIP LEVELS<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
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

    <TD class="scFormDataOdd css_memb_levels_line" id="hidden_field_data_memb_levels" style="<?php echo $sStyleHidden_memb_levels; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_memb_levels_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_memb_levels css_memb_levels_line" style="<?php echo $sStyleReadLab_memb_levels; ?>"><?php echo $fieldContent; ?></span><span id="id_read_off_memb_levels" class="css_read_off_memb_levels" style="<?php echo $sStyleReadInp_memb_levels; ?>"><span id="id_ajax_label_memb_levels"><?php echo $memb_levels?></span>
</span><input type="hidden" name="memb_levels" value="<?php echo $this->form_encode_input($memb_levels); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_memb_levels_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_memb_levels_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_9"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_9" class="scBlockFrame"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_9" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
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

    <TD class="scFormDataOdd css_est_memb_cost_line" id="hidden_field_data_est_memb_cost" style="<?php echo $sStyleHidden_est_memb_cost; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_est_memb_cost_line" style="padding: 0px"><span id="id_read_on_est_memb_cost css_est_memb_cost_line" style="<?php echo $sStyleReadLab_est_memb_cost; ?>"><?php echo $fieldContent; ?></span><span id="id_read_off_est_memb_cost" class="css_read_off_est_memb_cost" style="<?php echo $sStyleReadInp_est_memb_cost; ?>"><span id="id_ajax_label_est_memb_cost"><?php echo $est_memb_cost?></span>
</span><input type="hidden" name="est_memb_cost" value="<?php echo $this->form_encode_input($est_memb_cost); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_est_memb_cost_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_est_memb_cost_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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

    <TD class="scFormDataOdd css_pay_line" id="hidden_field_data_pay" style="<?php echo $sStyleHidden_pay; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pay_line" style="vertical-align: top;padding: 0px"><?php
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
<span id="id_imghtml_pay"><a href="javascript:nm_gp_submit('<?php echo $this->Ini->link_blank_steps_pmt_links . "', '$this->nm_location', 'SC_glo_par_gv_bus_cat*scingv_bus_cat*scoutSC_glo_par_gv_members_ct*scingv_members_ct*scout', '', '_blank', '0', '0', 'blank_steps_pmt_links')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $pay ; ?></font></a></span>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pay"]) &&  $this->nmgp_cmp_readonly["pay"] == "on") { 

 ?>
<input type="hidden" name="pay" value="<?php echo $this->form_encode_input($pay) . "\">" . $pay . ""; ?>
<?php } else { ?>
<span id="id_read_on_pay" class="sc-ui-readonly-pay css_pay_line" style="<?php echo $sStyleReadLab_pay; ?>"><?php echo $this->form_format_readonly("pay", $this->form_encode_input($this->pay)); ?></span><span id="id_read_off_pay" class="css_read_off_pay<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pay; ?>"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pay_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pay_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_est_memb_cost_dumb = ('' == $sStyleHidden_est_memb_cost) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_est_memb_cost_dumb" style="<?php echo $sStyleHidden_est_memb_cost_dumb; ?>"></TD>
<?php $sStyleHidden_pay_dumb = ('' == $sStyleHidden_pay) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_pay_dumb" style="<?php echo $sStyleHidden_pay_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_10"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow"><tr valign="top"><td width="40%" height="">
<div id="div_hidden_bloco_10" class="scBlockFrame"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_10" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
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

    <TD class="scFormDataOdd css_applicant_name_line" id="hidden_field_data_applicant_name" style="<?php echo $sStyleHidden_applicant_name; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_applicant_name_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_applicant_name_label" style=""><span id="id_label_applicant_name"><?php echo $this->nm_new_label['applicant_name']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['php_cmp_required']['applicant_name']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['php_cmp_required']['applicant_name'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></span><br>
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

    <TD class="scFormDataOdd css_applicant_title_line" id="hidden_field_data_applicant_title" style="<?php echo $sStyleHidden_applicant_title; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_applicant_title_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_applicant_title_label" style=""><span id="id_label_applicant_title"><?php echo $this->nm_new_label['applicant_title']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['php_cmp_required']['applicant_title']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['php_cmp_required']['applicant_title'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></span><br>
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
   <td width="60%" height="">
   <a name="bloco_11"></a>
<div id="div_hidden_bloco_11" class="scBlockFrame"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_11" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
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
    if (!isset($this->nm_new_label['applicant_signature']))
    {
        $this->nm_new_label['applicant_signature'] = "Applicant Signature (Please use your mouse or input device to sign below)";
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

    <TD class="scFormDataOdd css_applicant_signature_line" id="hidden_field_data_applicant_signature" style="<?php echo $sStyleHidden_applicant_signature; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_applicant_signature_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_applicant_signature_label" style=""><span id="id_label_applicant_signature"><?php echo $this->nm_new_label['applicant_signature']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['php_cmp_required']['applicant_signature']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['php_cmp_required']['applicant_signature'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></span><br><span id="id_read_on_applicant_signature" style="<?php echo $sStyleReadLab_applicant_signature; ?>"><div id="sc-id-ronly-applicant_signature" style="width: 500px; height: 150px; background-color: #F8F9FA"><img style="border-width: 0" /></div>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
    $NM_btn = false;
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['run_iframe'] != "R")
{
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-1';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_label']['new'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_label']['insert'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_label']['update'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_disabled']['bstepretorna']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_disabled']['bstepretorna']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_label']['bstepretorna']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_label']['bstepretorna']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_label']['bstepretorna'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bstepretorna", "scBtnFn_sys_format_stepret()", "scBtnFn_sys_format_stepret()", "sc_b_stepret_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-5';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_disabled']['bstepavanca']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_disabled']['bstepavanca']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_label']['bstepavanca']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_label']['bstepavanca']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_label']['bstepavanca'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_disabled']['pdf_download']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_disabled']['pdf_download']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_label']['pdf_download']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_label']['pdf_download']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_label']['pdf_download'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "pdf_download", "scBtnFn_pdf_download()", "scBtnFn_pdf_download()", "sc_pdf_download_bot", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
        $sCondStyle = ($this->nmgp_botoes['reload'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_disabled']['breload']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_disabled']['breload']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_label']['breload']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_label']['breload']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_label']['breload'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "breload", "scBtnFn_sys_format_reload()", "scBtnFn_sys_format_reload()", "sc_b_reload_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
        $sCondStyle = ($this->nmgp_botoes['btn_exit_app'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_disabled']['btn_exit_app']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_disabled']['btn_exit_app']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_label']['btn_exit_app']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_label']['btn_exit_app']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_label']['btn_exit_app'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "btn_exit_app", "scBtnFn_btn_exit_app()", "scBtnFn_btn_exit_app()", "sc_btn_exit_app_bot", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    if (isset($this->NMSC_modal) && $this->NMSC_modal == "ok") {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai_modal()", "scBtnFn_sys_format_sai_modal()", "sc_b_sai_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "", '', '', '', '', '', '', '', '', "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['run_iframe'] != "R")
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
        scJQWizardGoToPage(<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['form_wizard']['actual_step']; ?>);
        $(".sc-form-page").on("click", function() {
            var thisStepNo = $(this).attr("id").substr(16);
            scJQWizardPageClick(thisStepNo);
        });
    } else {
        scJQWizardGoToStep(<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['form_wizard']['actual_step']; ?>);
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
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5,6,7,8,9,10,11);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_clients_steps_renew");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_clients_steps_renew");
 parent.scAjaxDetailHeight("form_clients_steps_renew", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_clients_steps_renew", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_clients_steps_renew", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['sc_modal'])
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
        function scBtnFn_sys_format_reload() {
                if ($("#sc_b_reload_b.sc-unique-btn-6").length && $("#sc_b_reload_b.sc-unique-btn-6").is(":visible")) {
                    if ($("#sc_b_reload_b.sc-unique-btn-6").hasClass("disabled")) {
                        return;
                    }
                        scAjax_formReload();
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
                if ($("#sc_b_sai_b.sc-unique-btn-7").length && $("#sc_b_sai_b.sc-unique-btn-7").is(":visible")) {
                    if ($("#sc_b_sai_b.sc-unique-btn-7").hasClass("disabled")) {
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_renew']['buttonStatus'] = $this->nmgp_botoes;
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
