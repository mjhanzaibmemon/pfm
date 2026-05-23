<div id="form_clients_steps_appn_stripe_renew_mob_form1" style='<?php echo (1 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe_renew_mob']['form_wizard']['actual_step'] ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow scBlockRowFirst"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_3" class="scBlockFrame"><!-- bloco_c -->
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
<TABLE align="center" id="hidden_bloco_3" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['client_id']))
           {
               $this->nmgp_cmp_readonly['client_id'] = 'on';
           }
?>
   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">UPLOAD DOCUMENT SUPPORTING BUSINESS OPERATION</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
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

    <TD class="scFormDataOdd css_doc_type_line" id="hidden_field_data_doc_type" style="<?php echo $sStyleHidden_doc_type; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_doc_type_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_doc_type_label" style=""><span id="id_label_doc_type"><?php echo $this->nm_new_label['doc_type']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe_renew_mob']['php_cmp_required']['doc_type']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe_renew_mob']['php_cmp_required']['doc_type'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></span><br>
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
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe_renew_mob']['Lookup_doc_type'][] = 'Active Secretary of State Registration'; ?>
<?php  if (in_array("Active Secretary of State Registration", $this->doc_type_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>">Active Secretary of State Registration</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_doc_type_line"><?php $tempOptionId = "id-opt-doc_type" . $sc_seq_vert . "-2"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-doc_type sc-ui-checkbox-doc_type" name="doc_type[]" value="City Business License"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe_renew_mob']['Lookup_doc_type'][] = 'City Business License'; ?>
<?php  if (in_array("City Business License", $this->doc_type_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>">City Business License</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_doc_type_line"><?php $tempOptionId = "id-opt-doc_type" . $sc_seq_vert . "-3"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-doc_type sc-ui-checkbox-doc_type" name="doc_type[]" value="Agricultural License"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe_renew_mob']['Lookup_doc_type'][] = 'Agricultural License'; ?>
<?php  if (in_array("Agricultural License", $this->doc_type_1))  { echo " checked" ;} ?> onClick="" ><label for="<?php echo $tempOptionId ?>">Agricultural License</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_doc_type_line"><?php $tempOptionId = "id-opt-doc_type" . $sc_seq_vert . "-4"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-doc_type sc-ui-checkbox-doc_type" name="doc_type[]" value="Other type of document"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe_renew_mob']['Lookup_doc_type'][] = 'Other type of document'; ?>
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
   $doc_filename = $this->doc_filename;
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

    <TD class="scFormDataOdd css_doc_file_line" id="hidden_field_data_doc_file" style="<?php echo $sStyleHidden_doc_file; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_doc_file_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat scFormLabelAboveOddFormat css_doc_file_label" style=""><span id="id_label_doc_file"><?php echo $this->nm_new_label['doc_file']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe_renew_mob']['php_cmp_required']['doc_file']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_steps_appn_stripe_renew_mob']['php_cmp_required']['doc_file'] == "on") { ?> <span class="scFormRequiredMarkOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["doc_file"]) &&  $this->nmgp_cmp_readonly["doc_file"] == "on") { 

 ?>
<input type="hidden" name="doc_file" value=""><img id=\"doc_file_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><span id=\"id_ajax_doc_doc_file\"><a href=\"javascript:nm_mostra_doc('documento_db', '" . str_replace("'", "\'", trim($doc_filename)) . "', 'form_clients_steps_appn_stripe_renew')\">" . $doc_filename"</a></span>"; ?>
<?php } else { ?>
<span id="id_read_on_doc_file" class="scFormLinkOdd sc-ui-readonly-doc_file css_doc_file_line" style="<?php echo $sStyleReadLab_doc_file; ?>"><?php echo $this->form_format_readonly("doc_filename", $doc_filename) ?></span><span id="id_read_off_doc_file" class="css_read_off_doc_file" style="white-space: nowrap;<?php echo $sStyleReadInp_doc_file; ?>"><span style="display:inline-block"><span id="sc-id-upload-select-doc_file" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_doc_file_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="doc_file[]" id="id_sc_field_doc_file" ></span></span>
<?php
   $sCheckInsert = "";
?>
<span style="display: none"><span id="chk_ajax_img_doc_file"<?php if ($this->nmgp_opcao == "novo" || empty($doc_file)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="doc_file_limpa" value="<?php echo $doc_file_limpa . '" '; if ($doc_file_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};<?php echo $sCheckInsert ?>"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span></span>
<?php 
   $doc_filename = trim($doc_filename); 
   if (!empty($doc_filename)) 
   { 
       $nm_img_icone = $this->gera_icone($doc_filename); 
       if (!empty($nm_img_icone)) 
       { 
           $nm_img_icone = "<img src=\"$nm_img_icone\" id=\"id_ajax_doc_icon_doc_file\">&nbsp;";
       } 
       echo  $nm_img_icone;
   } 
?> 
<img id="doc_file_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><span id="id_ajax_doc_doc_file"><a href="javascript:nm_mostra_doc('documento_db', '<?php echo str_replace("'", "\'", substr($sTmpFile_doc_filename, 3)) ;?>', 'form_clients_steps_appn_stripe_renew')"><?php echo $doc_filename ?></a></span><div id="id_img_loader_doc_file" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_doc_file" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_doc_file_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_doc_file_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_doc_file_dumb = ('' == $sStyleHidden_doc_file) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_doc_file_dumb" style="<?php echo $sStyleHidden_doc_file_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_4"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0 class="scBlockRow"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_4" class="scBlockFrame"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_4" class="scFormTable scFormDataOdd<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>


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

    <TD class="scFormDataOdd css_appn_note_line" id="hidden_field_data_appn_note" style="<?php echo $sStyleHidden_appn_note; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_appn_note_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_appn_note" style="<?php echo $sStyleReadLab_appn_note; ?>"><?php echo $this->form_format_readonly("appn_note", sc_strip_script($this->appn_note)); ?></span><span id="id_read_off_appn_note" class="css_read_off_appn_note" style="<?php echo $sStyleReadInp_appn_note; ?>"><textarea id="appn_note" name="appn_note" cols="50" rows="10" class="mceEditor_appn_note" style="width: 100%; height:300px;"><?php echo $this->form_encode_input($this->appn_note); ?></textarea>
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
