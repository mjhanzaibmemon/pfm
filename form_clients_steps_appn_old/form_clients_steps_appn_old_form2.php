<div id="form_clients_steps_appn_old_form2" style='<?php echo (2 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_old']['form_wizard']['actual_step'] ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow scBlockRowFirst"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2" class="scBlockFrame"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_2" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['client_id']))
           {
               $this->nmgp_cmp_readonly['client_id'] = 'on';
           }
?>
   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">UPLOAD DOCUMENT SUPPORTING BUSINESS OPERATION - (Choose ONE Document from the options below to Upload)</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php $sStyleHidden_dummy05_dumb = ('' == $sStyleHidden_dummy05) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_dummy05_dumb" style="<?php echo $sStyleHidden_dummy05_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['doc_sec_of_state']))
    {
        $this->nm_new_label['doc_sec_of_state'] = "Active Secretary of State Registration";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $doc_sec_of_state = $this->doc_sec_of_state;
   $sStyleHidden_doc_sec_of_state = '';
   if (isset($this->nmgp_cmp_hidden['doc_sec_of_state']) && $this->nmgp_cmp_hidden['doc_sec_of_state'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['doc_sec_of_state']);
       $sStyleHidden_doc_sec_of_state = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_doc_sec_of_state = 'display: none;';
   $sStyleReadInp_doc_sec_of_state = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['doc_sec_of_state']) && $this->nmgp_cmp_readonly['doc_sec_of_state'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['doc_sec_of_state']);
       $sStyleReadLab_doc_sec_of_state = '';
       $sStyleReadInp_doc_sec_of_state = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['doc_sec_of_state']) && $this->nmgp_cmp_hidden['doc_sec_of_state'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="doc_sec_of_state" value="<?php echo $this->form_encode_input($doc_sec_of_state) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_doc_sec_of_state_line" id="hidden_field_data_doc_sec_of_state" style="<?php echo $sStyleHidden_doc_sec_of_state; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_doc_sec_of_state_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_doc_sec_of_state_label" style=""><span id="id_label_doc_sec_of_state"><?php echo $this->nm_new_label['doc_sec_of_state']; ?></span></span><br>
 <?php $this->NM_ajax_info['varList'][] = array("var_ajax_img_doc_sec_of_state" => $out_doc_sec_of_state); ?><script>var var_ajax_img_doc_sec_of_state = '<?php echo $out_doc_sec_of_state; ?>';</script><input type="hidden" name="temp_out_doc_sec_of_state" value="<?php echo $this->form_encode_input($out_doc_sec_of_state); ?>" /><?php if (!empty($out_doc_sec_of_state)) {  echo "<a  href=\"javascript:nm_mostra_img(var_ajax_img_doc_sec_of_state, '" . $this->nmgp_return_img['doc_sec_of_state'][0] . "', '" . $this->nmgp_return_img['doc_sec_of_state'][1] . "')\"><img id=\"id_ajax_img_doc_sec_of_state\"  border=\"0\" src=\"$out_doc_sec_of_state\"></a>"; } else {  echo "<img id=\"id_ajax_img_doc_sec_of_state\" border=\"0\" style=\"display: none\">"; } ?><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["doc_sec_of_state"]) &&  $this->nmgp_cmp_readonly["doc_sec_of_state"] == "on") { 

 ?>
<img id=\"doc_sec_of_state_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><input type="hidden" name="doc_sec_of_state" value="<?php echo $this->form_encode_input($doc_sec_of_state) . "\">" . $doc_sec_of_state . ""; ?>
<?php } else { ?>
<span id="id_read_off_doc_sec_of_state" class="css_read_off_doc_sec_of_state<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_doc_sec_of_state; ?>"><span style="display:none"><span id="sc-id-upload-select-doc_sec_of_state" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_doc_sec_of_state_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="doc_sec_of_state[]" id="id_sc_field_doc_sec_of_state" onchange="<?php if ($this->nmgp_opcao == "novo") {echo "if (document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]']) { document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]'].checked = true }"; }?>"></span></span>
<?php
   $sCheckInsert = "";
?>
<span id="chk_ajax_img_doc_sec_of_state"<?php if ($this->nmgp_opcao == "novo" || empty($doc_sec_of_state)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="doc_sec_of_state_limpa" value="<?php echo $doc_sec_of_state_limpa . '" '; if ($doc_sec_of_state_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};<?php echo $sCheckInsert ?>"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="doc_sec_of_state_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><div id="id_img_loader_doc_sec_of_state" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_doc_sec_of_state" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
<div id="id_sc_dragdrop_doc_sec_of_state" class="scFormDataDragNDrop"  style="<?php echo $sStyleReadInp_doc_sec_of_state ?>cursor:pointer" onclick="$('#id_sc_field_doc_sec_of_state').click()"><i class='fas fa-cloud-upload-alt'></i><br/>
<?php echo $this->Ini->Nm_lang['lang_errm_mu_dragimg_clickable'] ?></div>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_doc_sec_of_state_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_doc_sec_of_state_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['doc_city_bus_lic']))
    {
        $this->nm_new_label['doc_city_bus_lic'] = "City Business License";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $doc_city_bus_lic = $this->doc_city_bus_lic;
   $sStyleHidden_doc_city_bus_lic = '';
   if (isset($this->nmgp_cmp_hidden['doc_city_bus_lic']) && $this->nmgp_cmp_hidden['doc_city_bus_lic'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['doc_city_bus_lic']);
       $sStyleHidden_doc_city_bus_lic = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_doc_city_bus_lic = 'display: none;';
   $sStyleReadInp_doc_city_bus_lic = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['doc_city_bus_lic']) && $this->nmgp_cmp_readonly['doc_city_bus_lic'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['doc_city_bus_lic']);
       $sStyleReadLab_doc_city_bus_lic = '';
       $sStyleReadInp_doc_city_bus_lic = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['doc_city_bus_lic']) && $this->nmgp_cmp_hidden['doc_city_bus_lic'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="doc_city_bus_lic" value="<?php echo $this->form_encode_input($doc_city_bus_lic) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_doc_city_bus_lic_line" id="hidden_field_data_doc_city_bus_lic" style="<?php echo $sStyleHidden_doc_city_bus_lic; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_doc_city_bus_lic_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_doc_city_bus_lic_label" style=""><span id="id_label_doc_city_bus_lic"><?php echo $this->nm_new_label['doc_city_bus_lic']; ?></span></span><br>
 <?php $this->NM_ajax_info['varList'][] = array("var_ajax_img_doc_city_bus_lic" => $out_doc_city_bus_lic); ?><script>var var_ajax_img_doc_city_bus_lic = '<?php echo $out_doc_city_bus_lic; ?>';</script><input type="hidden" name="temp_out_doc_city_bus_lic" value="<?php echo $this->form_encode_input($out_doc_city_bus_lic); ?>" /><?php if (!empty($out_doc_city_bus_lic)) {  echo "<a  href=\"javascript:nm_mostra_img(var_ajax_img_doc_city_bus_lic, '" . $this->nmgp_return_img['doc_city_bus_lic'][0] . "', '" . $this->nmgp_return_img['doc_city_bus_lic'][1] . "')\"><img id=\"id_ajax_img_doc_city_bus_lic\"  border=\"0\" src=\"$out_doc_city_bus_lic\"></a>"; } else {  echo "<img id=\"id_ajax_img_doc_city_bus_lic\" border=\"0\" style=\"display: none\">"; } ?><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["doc_city_bus_lic"]) &&  $this->nmgp_cmp_readonly["doc_city_bus_lic"] == "on") { 

 ?>
<img id=\"doc_city_bus_lic_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><input type="hidden" name="doc_city_bus_lic" value="<?php echo $this->form_encode_input($doc_city_bus_lic) . "\">" . $doc_city_bus_lic . ""; ?>
<?php } else { ?>
<span id="id_read_off_doc_city_bus_lic" class="css_read_off_doc_city_bus_lic<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_doc_city_bus_lic; ?>"><span style="display:none"><span id="sc-id-upload-select-doc_city_bus_lic" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_doc_city_bus_lic_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="doc_city_bus_lic[]" id="id_sc_field_doc_city_bus_lic" onchange="<?php if ($this->nmgp_opcao == "novo") {echo "if (document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]']) { document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]'].checked = true }"; }?>"></span></span>
<?php
   $sCheckInsert = "";
?>
<span id="chk_ajax_img_doc_city_bus_lic"<?php if ($this->nmgp_opcao == "novo" || empty($doc_city_bus_lic)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="doc_city_bus_lic_limpa" value="<?php echo $doc_city_bus_lic_limpa . '" '; if ($doc_city_bus_lic_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};<?php echo $sCheckInsert ?>"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="doc_city_bus_lic_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><div id="id_img_loader_doc_city_bus_lic" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_doc_city_bus_lic" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
<div id="id_sc_dragdrop_doc_city_bus_lic" class="scFormDataDragNDrop"  style="<?php echo $sStyleReadInp_doc_city_bus_lic ?>cursor:pointer" onclick="$('#id_sc_field_doc_city_bus_lic').click()"><i class='fas fa-cloud-upload-alt'></i><br/>
<?php echo $this->Ini->Nm_lang['lang_errm_mu_dragimg_clickable'] ?></div>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_doc_city_bus_lic_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_doc_city_bus_lic_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_doc_sec_of_state_dumb = ('' == $sStyleHidden_doc_sec_of_state) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_doc_sec_of_state_dumb" style="<?php echo $sStyleHidden_doc_sec_of_state_dumb; ?>"></TD>
<?php $sStyleHidden_doc_city_bus_lic_dumb = ('' == $sStyleHidden_doc_city_bus_lic) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_doc_city_bus_lic_dumb" style="<?php echo $sStyleHidden_doc_city_bus_lic_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['doc_agric_lic']))
    {
        $this->nm_new_label['doc_agric_lic'] = "Agricultural License";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $doc_agric_lic = $this->doc_agric_lic;
   $sStyleHidden_doc_agric_lic = '';
   if (isset($this->nmgp_cmp_hidden['doc_agric_lic']) && $this->nmgp_cmp_hidden['doc_agric_lic'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['doc_agric_lic']);
       $sStyleHidden_doc_agric_lic = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_doc_agric_lic = 'display: none;';
   $sStyleReadInp_doc_agric_lic = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['doc_agric_lic']) && $this->nmgp_cmp_readonly['doc_agric_lic'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['doc_agric_lic']);
       $sStyleReadLab_doc_agric_lic = '';
       $sStyleReadInp_doc_agric_lic = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['doc_agric_lic']) && $this->nmgp_cmp_hidden['doc_agric_lic'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="doc_agric_lic" value="<?php echo $this->form_encode_input($doc_agric_lic) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_doc_agric_lic_line" id="hidden_field_data_doc_agric_lic" style="<?php echo $sStyleHidden_doc_agric_lic; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_doc_agric_lic_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_doc_agric_lic_label" style=""><span id="id_label_doc_agric_lic"><?php echo $this->nm_new_label['doc_agric_lic']; ?></span></span><br>
 <?php $this->NM_ajax_info['varList'][] = array("var_ajax_img_doc_agric_lic" => $out_doc_agric_lic); ?><script>var var_ajax_img_doc_agric_lic = '<?php echo $out_doc_agric_lic; ?>';</script><input type="hidden" name="temp_out_doc_agric_lic" value="<?php echo $this->form_encode_input($out_doc_agric_lic); ?>" /><?php if (!empty($out_doc_agric_lic)) {  echo "<a  href=\"javascript:nm_mostra_img(var_ajax_img_doc_agric_lic, '" . $this->nmgp_return_img['doc_agric_lic'][0] . "', '" . $this->nmgp_return_img['doc_agric_lic'][1] . "')\"><img id=\"id_ajax_img_doc_agric_lic\"  border=\"0\" src=\"$out_doc_agric_lic\"></a>"; } else {  echo "<img id=\"id_ajax_img_doc_agric_lic\" border=\"0\" style=\"display: none\">"; } ?><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["doc_agric_lic"]) &&  $this->nmgp_cmp_readonly["doc_agric_lic"] == "on") { 

 ?>
<img id=\"doc_agric_lic_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><input type="hidden" name="doc_agric_lic" value="<?php echo $this->form_encode_input($doc_agric_lic) . "\">" . $doc_agric_lic . ""; ?>
<?php } else { ?>
<span id="id_read_off_doc_agric_lic" class="css_read_off_doc_agric_lic<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_doc_agric_lic; ?>"><span style="display:none"><span id="sc-id-upload-select-doc_agric_lic" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_doc_agric_lic_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="doc_agric_lic[]" id="id_sc_field_doc_agric_lic" onchange="<?php if ($this->nmgp_opcao == "novo") {echo "if (document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]']) { document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]'].checked = true }"; }?>"></span></span>
<?php
   $sCheckInsert = "";
?>
<span id="chk_ajax_img_doc_agric_lic"<?php if ($this->nmgp_opcao == "novo" || empty($doc_agric_lic)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="doc_agric_lic_limpa" value="<?php echo $doc_agric_lic_limpa . '" '; if ($doc_agric_lic_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};<?php echo $sCheckInsert ?>"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="doc_agric_lic_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><div id="id_img_loader_doc_agric_lic" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_doc_agric_lic" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
<div id="id_sc_dragdrop_doc_agric_lic" class="scFormDataDragNDrop"  style="<?php echo $sStyleReadInp_doc_agric_lic ?>cursor:pointer" onclick="$('#id_sc_field_doc_agric_lic').click()"><i class='fas fa-cloud-upload-alt'></i><br/>
<?php echo $this->Ini->Nm_lang['lang_errm_mu_dragimg_clickable'] ?></div>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_doc_agric_lic_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_doc_agric_lic_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['doc_last_year_tax']))
    {
        $this->nm_new_label['doc_last_year_tax'] = "Last Year's Business Tax return";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $doc_last_year_tax = $this->doc_last_year_tax;
   $sStyleHidden_doc_last_year_tax = '';
   if (isset($this->nmgp_cmp_hidden['doc_last_year_tax']) && $this->nmgp_cmp_hidden['doc_last_year_tax'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['doc_last_year_tax']);
       $sStyleHidden_doc_last_year_tax = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_doc_last_year_tax = 'display: none;';
   $sStyleReadInp_doc_last_year_tax = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['doc_last_year_tax']) && $this->nmgp_cmp_readonly['doc_last_year_tax'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['doc_last_year_tax']);
       $sStyleReadLab_doc_last_year_tax = '';
       $sStyleReadInp_doc_last_year_tax = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['doc_last_year_tax']) && $this->nmgp_cmp_hidden['doc_last_year_tax'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="doc_last_year_tax" value="<?php echo $this->form_encode_input($doc_last_year_tax) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_doc_last_year_tax_line" id="hidden_field_data_doc_last_year_tax" style="<?php echo $sStyleHidden_doc_last_year_tax; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_doc_last_year_tax_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_doc_last_year_tax_label" style=""><span id="id_label_doc_last_year_tax"><?php echo $this->nm_new_label['doc_last_year_tax']; ?></span></span><br>
 <?php $this->NM_ajax_info['varList'][] = array("var_ajax_img_doc_last_year_tax" => $out_doc_last_year_tax); ?><script>var var_ajax_img_doc_last_year_tax = '<?php echo $out_doc_last_year_tax; ?>';</script><input type="hidden" name="temp_out_doc_last_year_tax" value="<?php echo $this->form_encode_input($out_doc_last_year_tax); ?>" /><?php if (!empty($out_doc_last_year_tax)) {  echo "<a  href=\"javascript:nm_mostra_img(var_ajax_img_doc_last_year_tax, '" . $this->nmgp_return_img['doc_last_year_tax'][0] . "', '" . $this->nmgp_return_img['doc_last_year_tax'][1] . "')\"><img id=\"id_ajax_img_doc_last_year_tax\"  border=\"0\" src=\"$out_doc_last_year_tax\"></a>"; } else {  echo "<img id=\"id_ajax_img_doc_last_year_tax\" border=\"0\" style=\"display: none\">"; } ?><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["doc_last_year_tax"]) &&  $this->nmgp_cmp_readonly["doc_last_year_tax"] == "on") { 

 ?>
<img id=\"doc_last_year_tax_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><input type="hidden" name="doc_last_year_tax" value="<?php echo $this->form_encode_input($doc_last_year_tax) . "\">" . $doc_last_year_tax . ""; ?>
<?php } else { ?>
<span id="id_read_off_doc_last_year_tax" class="css_read_off_doc_last_year_tax<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_doc_last_year_tax; ?>"><span style="display:none"><span id="sc-id-upload-select-doc_last_year_tax" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_doc_last_year_tax_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="doc_last_year_tax[]" id="id_sc_field_doc_last_year_tax" onchange="<?php if ($this->nmgp_opcao == "novo") {echo "if (document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]']) { document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]'].checked = true }"; }?>"></span></span>
<?php
   $sCheckInsert = "";
?>
<span id="chk_ajax_img_doc_last_year_tax"<?php if ($this->nmgp_opcao == "novo" || empty($doc_last_year_tax)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="doc_last_year_tax_limpa" value="<?php echo $doc_last_year_tax_limpa . '" '; if ($doc_last_year_tax_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};<?php echo $sCheckInsert ?>"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="doc_last_year_tax_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><div id="id_img_loader_doc_last_year_tax" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_doc_last_year_tax" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
<div id="id_sc_dragdrop_doc_last_year_tax" class="scFormDataDragNDrop"  style="<?php echo $sStyleReadInp_doc_last_year_tax ?>cursor:pointer" onclick="$('#id_sc_field_doc_last_year_tax').click()"><i class='fas fa-cloud-upload-alt'></i><br/>
<?php echo $this->Ini->Nm_lang['lang_errm_mu_dragimg_clickable'] ?></div>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_doc_last_year_tax_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_doc_last_year_tax_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_doc_agric_lic_dumb = ('' == $sStyleHidden_doc_agric_lic) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_doc_agric_lic_dumb" style="<?php echo $sStyleHidden_doc_agric_lic_dumb; ?>"></TD>
<?php $sStyleHidden_doc_last_year_tax_dumb = ('' == $sStyleHidden_doc_last_year_tax) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_doc_last_year_tax_dumb" style="<?php echo $sStyleHidden_doc_last_year_tax_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_3"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_3" class="scBlockFrame"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_3" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">COMMENTS</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
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

    <TD class="scFormDataOdd css_appn_note_line" id="hidden_field_data_appn_note" style="<?php echo $sStyleHidden_appn_note; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_appn_note_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_appn_note" style="<?php echo $sStyleReadLab_appn_note; ?>"><?php echo $this->form_format_readonly("appn_note", sc_strip_script($this->appn_note)); ?></span><span id="id_read_off_appn_note" class="css_read_off_appn_note" style="<?php echo $sStyleReadInp_appn_note; ?>"><textarea id="appn_note" name="appn_note" cols="50" rows="10" class="mceEditor_appn_note" style="width: 100%; height:300px;"><?php echo $this->form_encode_input($this->appn_note); ?></textarea>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_appn_note_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_appn_note_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
