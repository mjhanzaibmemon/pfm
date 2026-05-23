<?php

class grid_vw_clients_main_member_inactive_xml
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;

   var $Arquivo;
   var $Arquivo_view;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();
   var $count_ger;

   //---- 
   function __construct()
   {
      $this->nm_data   = new nm_data("en_us");
   }


function actionBar_isValidState($buttonName, $buttonState)
{
    switch ($buttonName) {
        case 'notify_renewal':
            return in_array($buttonState, array("state1"));
        case 'open':
            return in_array($buttonState, array("state1"));
        case 'set_inactive':
            return in_array($buttonState, array("state1"));
    }

    return false;
}


function actionBar_displayState($buttonName)
{
    switch ($buttonName) {
        case 'notify_renewal':
            return $this->actionBar_displayState_notify_renewal();
        case 'open':
            return $this->actionBar_displayState_open();
        case 'set_inactive':
            return $this->actionBar_displayState_set_inactive();
    }
}

function actionBar_displayState_notify_renewal()
{
    switch ($this->sc_actionbar_states['notify_renewal']) {
        case 'state1':
            return "<i class=\"icon_fa sc-actb-notify_renewal sc-acts-state1 far fa-envelope\"></i>";
    }
}

function actionBar_displayState_open()
{
    switch ($this->sc_actionbar_states['open']) {
        case 'state1':
            return "<i class=\"icon_fa sc-actb-open sc-acts-state1 far fa-folder-open\"></i>";
    }
}

function actionBar_displayState_set_inactive()
{
    switch ($this->sc_actionbar_states['set_inactive']) {
        case 'state1':
            return "<i class=\"icon_fa sc-actb-set_inactive sc-acts-state1 fas fa-user-minus\"></i>";
    }
}

function actionBar_getStateHint($buttonName)
{
    switch ($buttonName) {
        case 'notify_renewal':
            return $this->actionBar_getStateHint_notify_renewal();
        case 'open':
            return $this->actionBar_getStateHint_open();
        case 'set_inactive':
            return $this->actionBar_getStateHint_set_inactive();
    }
}

function actionBar_getStateHint_notify_renewal()
{
    switch ($this->sc_actionbar_states['notify_renewal']) {
        case 'state1':
            return "Email client renewal notification";
    }
}

function actionBar_getStateHint_open()
{
    switch ($this->sc_actionbar_states['open']) {
        case 'state1':
            return "Open record";
    }
}

function actionBar_getStateHint_set_inactive()
{
    switch ($this->sc_actionbar_states['set_inactive']) {
        case 'state1':
            return "Set Inactive";
    }
}

function actionBar_getStateConfirm($buttonName)
{
    switch ($buttonName) {
        case 'notify_renewal':
            return $this->actionBar_getStateConfirm_notify_renewal();
        case 'open':
            return $this->actionBar_getStateConfirm_open();
        case 'set_inactive':
            return $this->actionBar_getStateConfirm_set_inactive();
    }
}

function actionBar_getStateConfirm_notify_renewal()
{
    switch ($this->sc_actionbar_states['notify_renewal']) {
        case 'state1':
            return "Notify of renewal?";
    }
}

function actionBar_getStateConfirm_open()
{
    switch ($this->sc_actionbar_states['open']) {
        case 'state1':
            return "";
    }
}

function actionBar_getStateConfirm_set_inactive()
{
    switch ($this->sc_actionbar_states['set_inactive']) {
        case 'state1':
            return "Set Inactive?";
    }
}

function actionBar_getStateDisable($buttonName)
{
    if (isset($this->sc_actionbar_disabled[$buttonName]) && $this->sc_actionbar_disabled[$buttonName]) {
        return ' disabled';
    }

    return '';
}

function actionBar_getStateHide($buttonName)
{
    if (isset($this->sc_actionbar_hidden[$buttonName]) && $this->sc_actionbar_hidden[$buttonName]) {
        return ' sc-actionbar-button-hidden';
    }

    return '';
}

   //---- 
   function monta_xml()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['embutida'])
      {
          if ($this->Ini->sc_export_ajax)
          {
              $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Xml_f);
              $this->Arr_result['title_export'] = NM_charset_to_utf8($this->Tit_doc);
              $Temp = ob_get_clean();
              if ($Temp !== false && trim($Temp) != "")
              {
                  $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
              }
              $oJson = new Services_JSON();
              echo $oJson->encode($this->Arr_result);
              exit;
          }
          else
          {
              $this->progress_bar_end();
          }
      }
      else
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['opcao'] = "";
      }
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      if (isset($GLOBALS['nmgp_parms']) && !empty($GLOBALS['nmgp_parms'])) 
      { 
          $GLOBALS['nmgp_parms'] = str_replace("@aspass@", "'", $GLOBALS['nmgp_parms']);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $GLOBALS["nmgp_parms"]);
          $todo  = explode("?@?", $todox);
          foreach ($todo as $param)
          {
               $cadapar = explode("?#?", $param);
               if (1 < sizeof($cadapar))
               {
                   if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                   {
                       $cadapar[0] = substr($cadapar[0], 11);
                       $cadapar[1] = $_SESSION[$cadapar[1]];
                   }
                   if (isset($GLOBALS['sc_conv_var'][$cadapar[0]]))
                   {
                       $cadapar[0] = $GLOBALS['sc_conv_var'][$cadapar[0]];
                   }
                   elseif (isset($GLOBALS['sc_conv_var'][strtolower($cadapar[0])]))
                   {
                       $cadapar[0] = $GLOBALS['sc_conv_var'][strtolower($cadapar[0])];
                   }
                   nm_limpa_str_grid_vw_clients_main_member_inactive($cadapar[1]);
                   nm_protect_num_grid_vw_clients_main_member_inactive($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_vw_clients_main_member_inactive']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($gv_email_confirm_msg)) 
      {
          $_SESSION['gv_email_confirm_msg'] = $gv_email_confirm_msg;
          nm_limpa_str_grid_vw_clients_main_member_inactive($_SESSION["gv_email_confirm_msg"]);
      }
      if (isset($gv_curr_where)) 
      {
          $_SESSION['gv_curr_where'] = $gv_curr_where;
          nm_limpa_str_grid_vw_clients_main_member_inactive($_SESSION["gv_curr_where"]);
      }
      if (isset($gv_curr_filter)) 
      {
          $_SESSION['gv_curr_filter'] = $gv_curr_filter;
          nm_limpa_str_grid_vw_clients_main_member_inactive($_SESSION["gv_curr_filter"]);
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->New_Format  = true;
      $this->Xml_tag_label = true;
      $this->Tem_xml_res = false;
      $this->Xml_password = "";
      if (isset($_REQUEST['nm_xml_tag']) && !empty($_REQUEST['nm_xml_tag']))
      {
          $this->New_Format = ($_REQUEST['nm_xml_tag'] == "tag") ? true : false;
      }
      if (isset($_REQUEST['nm_xml_label']) && !empty($_REQUEST['nm_xml_label']))
      {
          $this->Xml_tag_label = ($_REQUEST['nm_xml_label'] == "S") ? true : false;
      }
      $this->Tem_xml_res  = true;
      if (isset($_REQUEST['SC_module_export']) && $_REQUEST['SC_module_export'] != "")
      { 
          $this->Tem_xml_res = (strpos(" " . $_REQUEST['SC_module_export'], "resume") !== false) ? true : false;
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['SC_Ind_Groupby'] == "sc_free_total")
      {
          $this->Tem_xml_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['SC_Gb_Free_cmp']))
      {
          $this->Tem_xml_res  = false;
      }
      if (!is_file($this->Ini->root . $this->Ini->path_link . "grid_vw_clients_main_member_inactive/grid_vw_clients_main_member_inactive_res_xml.class.php"))
      {
          $this->Tem_xml_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['xml_label']))
      {
          $this->Xml_tag_label = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['xml_label'];
          $this->New_Format    = true;
      }
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_vw_clients_main_member_inactive_total.class.php"); 
      $this->Tot      = new grid_vw_clients_main_member_inactive_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['tot_geral'][1];
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_vw_clients_main_member_inactive']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['xml_return']);
          if ($this->Tem_xml_res) {
              $PB_plus = intval ($this->count_ger * 0.04);
              $PB_plus = ($PB_plus < 2) ? 2 : $PB_plus;
          }
          else {
              $PB_plus = intval ($this->count_ger * 0.02);
              $PB_plus = ($PB_plus < 1) ? 1 : $PB_plus;
          }
          $PB_tot = $this->count_ger + $PB_plus;
          $this->PB_dif = $PB_tot - $this->count_ger;
          $this->pb->setTotalSteps($PB_tot);
      }
      $this->nm_data    = new nm_data("en_us");
      $this->Arquivo      = "sc_xml";
      $this->Arquivo     .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arq_zip      = $this->Arquivo . "_grid_vw_clients_main_member_inactive.zip";
      $this->Arquivo     .= "_grid_vw_clients_main_member_inactive";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "grid_vw_clients_main_member_inactive.xml";
      $this->Tit_zip      = "grid_vw_clients_main_member_inactive.zip";
      $this->Grava_view   = false;
      if (strtolower($_SESSION['scriptcase']['charset']) != strtolower($_SESSION['scriptcase']['charset_html']))
      {
          $this->Grava_view = true;
      }
   }

   //---- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini    = $this->Ini;
      $this->$modulo->Db     = $this->Db;
      $this->$modulo->Erro   = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }

   //----- 
   function grava_arquivo()
   {
      global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_vw_clients_main_member_inactive']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_vw_clients_main_member_inactive']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_vw_clients_main_member_inactive']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->renewal_date = (isset($Busca_temp['renewal_date'])) ? $Busca_temp['renewal_date'] : ""; 
          $tmp_pos = (is_string($this->renewal_date)) ? strpos($this->renewal_date, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->renewal_date))
          {
              $this->renewal_date = substr($this->renewal_date, 0, $tmp_pos);
          }
          $this->renewal_date_2 = (isset($Busca_temp['renewal_date_input_2'])) ? $Busca_temp['renewal_date_input_2'] : ""; 
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['xml_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['xml_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['xml_name'] .= ".xml";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['xml_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['xml_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['xml_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['xml_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['embutida'])
      { 
          $xml_charset = $_SESSION['scriptcase']['charset'];
          $this->Xml_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
          $xml_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
          fwrite($xml_f, "<?xml version=\"1.0\" encoding=\"$xml_charset\" ?>\r\n");
          fwrite($xml_f, "<root>\r\n");
          if ($this->Grava_view)
          {
              $xml_charset_v = $_SESSION['scriptcase']['charset_html'];
              $xml_v         = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo_view, "w");
              fwrite($xml_v, "<?xml version=\"1.0\" encoding=\"$xml_charset_v\" ?>\r\n");
              fwrite($xml_v, "<root>\r\n");
          }
      }
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT client_id, status, str_replace (convert(char(10),renewal_date,102), '.', '-') + ' ' + convert(char(8),renewal_date,20), day_count, co_name, main_contact_name, main_contact_phone, renewal_msg, main_phone, main_email, bus_cat, bus_subcategory, street_address, mailing_address, city, state, zip_code, home_phone, main_contact_email, main_contact_title, str_replace (convert(char(10),permanent_member_date,102), '.', '-') + ' ' + convert(char(8),permanent_member_date,20), notif_color from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT client_id, status, renewal_date, day_count, co_name, main_contact_name, main_contact_phone, renewal_msg, main_phone, main_email, bus_cat, bus_subcategory, street_address, mailing_address, city, state, zip_code, home_phone, main_contact_email, main_contact_title, permanent_member_date, notif_color from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT client_id, status, convert(char(23),renewal_date,121), day_count, co_name, main_contact_name, main_contact_phone, renewal_msg, main_phone, main_email, bus_cat, bus_subcategory, street_address, mailing_address, city, state, zip_code, home_phone, main_contact_email, main_contact_title, convert(char(23),permanent_member_date,121), notif_color from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT client_id, status, renewal_date, day_count, co_name, main_contact_name, main_contact_phone, renewal_msg, main_phone, main_email, bus_cat, bus_subcategory, street_address, mailing_address, city, state, zip_code, home_phone, main_contact_email, main_contact_title, permanent_member_date, notif_color from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT client_id, status, EXTEND(renewal_date, YEAR TO FRACTION), day_count, co_name, main_contact_name, main_contact_phone, renewal_msg, main_phone, main_email, bus_cat, bus_subcategory, street_address, mailing_address, city, state, zip_code, home_phone, main_contact_email, main_contact_title, EXTEND(permanent_member_date, YEAR TO FRACTION), notif_color from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT client_id, status, renewal_date, day_count, co_name, main_contact_name, main_contact_phone, renewal_msg, main_phone, main_email, bus_cat, bus_subcategory, street_address, mailing_address, city, state, zip_code, home_phone, main_contact_email, main_contact_title, permanent_member_date, notif_color from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select_count;
      $rt = $this->Db->Execute($nmgp_select_count);
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->count_ger = $rt->fields[0];
      $rt->Close();
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      if (!$rs->EOF)
      {
         $this->client_id = $rs->fields[0] ;  
         $this->client_id = (string)$this->client_id;
         $this->status = $rs->fields[1] ;  
         $this->renewal_date = $rs->fields[2] ;  
         $this->day_count = $rs->fields[3] ;  
         $this->day_count = (string)$this->day_count;
         $this->co_name = $rs->fields[4] ;  
         $this->main_contact_name = $rs->fields[5] ;  
         $this->main_contact_phone = $rs->fields[6] ;  
         $this->renewal_msg = $rs->fields[7] ;  
         $this->main_phone = $rs->fields[8] ;  
         $this->main_email = $rs->fields[9] ;  
         $this->bus_cat = $rs->fields[10] ;  
         $this->bus_subcategory = $rs->fields[11] ;  
         $this->street_address = $rs->fields[12] ;  
         $this->mailing_address = $rs->fields[13] ;  
         $this->city = $rs->fields[14] ;  
         $this->state = $rs->fields[15] ;  
         $this->zip_code = $rs->fields[16] ;  
         $this->home_phone = $rs->fields[17] ;  
         $this->main_contact_email = $rs->fields[18] ;  
         $this->main_contact_title = $rs->fields[19] ;  
         $this->permanent_member_date = $rs->fields[20] ;  
         $this->notif_color = $rs->fields[21] ;  
   $_SESSION['scriptcase']['grid_vw_clients_main_member_inactive']['contr_erro'] = 'on';
if (!isset($_SESSION['gv_email_confirm_msg'])) {$_SESSION['gv_email_confirm_msg'] = "";}
if (!isset($this->sc_temp_gv_email_confirm_msg)) {$this->sc_temp_gv_email_confirm_msg = (isset($_SESSION['gv_email_confirm_msg'])) ? $_SESSION['gv_email_confirm_msg'] : "";}
  $this->sc_temp_gv_email_confirm_msg = "Sure about sending " . $this->count_ger  . " renewal emails?";
if (isset($this->sc_temp_gv_email_confirm_msg)) {$_SESSION['gv_email_confirm_msg'] = $this->sc_temp_gv_email_confirm_msg;}
$_SESSION['scriptcase']['grid_vw_clients_main_member_inactive']['contr_erro'] = 'off';
      }
      $this->SC_seq_register = 0;
      $this->xml_registro = "";
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['embutida'])
         { 
             $this->xml_registro .= "<" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['embutida_tit'] . ">\r\n";
         }
         elseif ($this->New_Format)
         {
             $this->xml_registro = "<grid_vw_clients_main_member_inactive>\r\n";
         }
         else
         {
             $this->xml_registro = "<grid_vw_clients_main_member_inactive";
         }
         $this->client_id = $rs->fields[0] ;  
         $this->client_id = (string)$this->client_id;
         $this->status = $rs->fields[1] ;  
         $this->renewal_date = $rs->fields[2] ;  
         $this->day_count = $rs->fields[3] ;  
         $this->day_count = (string)$this->day_count;
         $this->co_name = $rs->fields[4] ;  
         $this->main_contact_name = $rs->fields[5] ;  
         $this->main_contact_phone = $rs->fields[6] ;  
         $this->renewal_msg = $rs->fields[7] ;  
         $this->main_phone = $rs->fields[8] ;  
         $this->main_email = $rs->fields[9] ;  
         $this->bus_cat = $rs->fields[10] ;  
         $this->bus_subcategory = $rs->fields[11] ;  
         $this->street_address = $rs->fields[12] ;  
         $this->mailing_address = $rs->fields[13] ;  
         $this->city = $rs->fields[14] ;  
         $this->state = $rs->fields[15] ;  
         $this->zip_code = $rs->fields[16] ;  
         $this->home_phone = $rs->fields[17] ;  
         $this->main_contact_email = $rs->fields[18] ;  
         $this->main_contact_title = $rs->fields[19] ;  
         $this->permanent_member_date = $rs->fields[20] ;  
         $this->notif_color = $rs->fields[21] ;  
         $this->sc_proc_grid = true; 
         //----- lookup - email_sent
         $this->Lookup->lookup_email_sent($this->email_sent, $this->client_id, $this->array_email_sent); 
         $this->email_sent = str_replace("<br>", " ", $this->email_sent); 
         $this->email_sent = ($this->email_sent == "&nbsp;") ? "" : $this->email_sent; 
         $_SESSION['scriptcase']['grid_vw_clients_main_member_inactive']['contr_erro'] = 'on';
if (!isset($_SESSION['gv_email_confirm_msg'])) {$_SESSION['gv_email_confirm_msg'] = "";}
if (!isset($this->sc_temp_gv_email_confirm_msg)) {$this->sc_temp_gv_email_confirm_msg = (isset($_SESSION['gv_email_confirm_msg'])) ? $_SESSION['gv_email_confirm_msg'] : "";}
if (!isset($_SESSION['gv_curr_filter'])) {$_SESSION['gv_curr_filter'] = "";}
if (!isset($this->sc_temp_gv_curr_filter)) {$this->sc_temp_gv_curr_filter = (isset($_SESSION['gv_curr_filter'])) ? $_SESSION['gv_curr_filter'] : "";}
if (!isset($_SESSION['gv_curr_where'])) {$_SESSION['gv_curr_where'] = "";}
if (!isset($this->sc_temp_gv_curr_where)) {$this->sc_temp_gv_curr_where = (isset($_SESSION['gv_curr_where'])) ? $_SESSION['gv_curr_where'] : "";}
  $this->sc_temp_gv_curr_where  = $this->sc_where_atual ;
$this->sc_temp_gv_curr_filter = $this->sc_where_filtro ;


switch ( $this->notif_color  ) {
    case 'orange':
		$this->NM_field_style["renewal_date"] = "background-color:#ffa500;font-size:15px;color:#000000;font-family:arial, sans-serif;font-weight:bold;";
		$this->NM_field_style["day_count"] = "background-color:#ffa500;font-size:15px;color:#000000;font-family:arial, sans-serif;font-weight:bold;";
        break;
    case 'green':
		$this->NM_field_style["renewal_date"] = "background-color:#008000;font-size:15px;color:#ffffff;font-family:arial, sans-serif;font-weight:bold;";
		$this->NM_field_style["day_count"] = "background-color:#008000;font-size:15px;color:#ffffff;font-family:arial, sans-serif;font-weight:bold;";
        break;
    case 'red':
		$this->NM_field_style["renewal_date"] = "background-color:#ff0000;font-size:15px;color:#000000;font-family:arial, sans-serif;font-weight:bold;";
		$this->NM_field_style["day_count"] = "background-color:#ff0000;font-size:15px;color:#000000;font-family:arial, sans-serif;font-weight:bold;";
        break;
	case 'light red':
		$this->NM_field_style["renewal_date"] = "background-color:#ff9999;font-size:15px;color:#000000;font-family:arial, sans-serif;font-weight:bold;";
		$this->NM_field_style["day_count"] = "background-color:#ff9999;font-size:15px;color:#000000;font-family:arial, sans-serif;font-weight:bold;";
        break;
    case 'black text':
        break;
    case 'red text':
		$this->NM_field_style["renewal_date"] = "background-color:#ffffff;font-size:17px;color:#ff0000;font-family:arial, sans-serif;font-weight:bold;";
		$this->NM_field_style["day_count"] = "background-color:#ffffff;font-size:17px;color:#ff0000;font-family:arial, sans-serif;font-weight:bold;";
		$this->NM_field_style["co_name"] = "background-color:#ffffff;font-size:17px;color:#ff0000;font-family:arial, sans-serif;font-weight:bold;";
		$this->NM_field_style["main_contact_name"] = "background-color:#ffffff;font-size:17px;color:#ff0000;font-family:arial, sans-serif;font-weight:bold;";
		$this->NM_field_style["main_contact_phone"] = "background-color:#ffffff;font-size:17px;color:#ff0000;font-family:arial, sans-serif;font-weight:bold;";
		$this->NM_field_style["renewal_msg"] = "background-color:#ffff00;font-size:17px;color:#ff0000;font-family:arial, sans-serif;font-weight:bold;";
        break;
    default:
        break;
}
$this->sc_temp_gv_email_confirm_msg = "Sure about sending " . $this->count_ger  . " renewal emails?";
if (isset($this->sc_temp_gv_curr_where)) {$_SESSION['gv_curr_where'] = $this->sc_temp_gv_curr_where;}
if (isset($this->sc_temp_gv_curr_filter)) {$_SESSION['gv_curr_filter'] = $this->sc_temp_gv_curr_filter;}
if (isset($this->sc_temp_gv_email_confirm_msg)) {$_SESSION['gv_email_confirm_msg'] = $this->sc_temp_gv_email_confirm_msg;}
$_SESSION['scriptcase']['grid_vw_clients_main_member_inactive']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['embutida'])
         { 
             $this->xml_registro .= "</" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['embutida_tit'] . ">\r\n";
         }
         elseif ($this->New_Format)
         {
             $this->xml_registro .= "</grid_vw_clients_main_member_inactive>\r\n";
         }
         else
         {
             $this->xml_registro .= " />\r\n";
         }
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['embutida'])
         { 
             fwrite($xml_f, $this->xml_registro);
             if ($this->Grava_view)
             {
                fwrite($xml_v, $this->xml_registro);
             }
         }
         $rs->MoveNext();
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['embutida'])
      { 
          if (!$this->New_Format)
          {
              $this->xml_registro = "";
          }
          $_SESSION['scriptcase']['export_return'] = $this->xml_registro;
      }
      else
      { 
          fwrite($xml_f, "</root>");
          fclose($xml_f);
          if ($this->Grava_view)
          {
             fwrite($xml_v, "</root>");
             fclose($xml_v);
          }
          if ($this->Tem_xml_res)
          { 
              if (!$this->Ini->sc_export_ajax) {
                  $this->PB_dif = intval ($this->PB_dif / 2);
                  $Mens_bar  = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
                  $Mens_smry = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_smry_titl']);
                  $this->pb->setProgressbarMessage($Mens_bar . ": " . $Mens_smry);
                  $this->pb->addSteps($this->PB_dif);
              }
              require_once($this->Ini->path_aplicacao . "grid_vw_clients_main_member_inactive_res_xml.class.php");
              $this->Res = new grid_vw_clients_main_member_inactive_res_xml();
              $this->prep_modulos("Res");
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['xml_res_grid'] = true;
              $this->Res->monta_xml();
          } 
          if (!$this->Ini->sc_export_ajax) {
              $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_btns_export_finished']);
              $this->pb->setProgressbarMessage($Mens_bar);
              $this->pb->addSteps($this->PB_dif);
          }
          if ($this->Xml_password != "" || $this->Tem_xml_res)
          { 
              $str_zip    = "";
              $Parm_pass  = ($this->Xml_password != "") ? " -p" : "";
              $Zip_f      = (FALSE !== strpos($this->Zip_f, ' ')) ? " \"" . $this->Zip_f . "\"" :  $this->Zip_f;
              $Arq_input  = (FALSE !== strpos($this->Xml_f, ' ')) ? " \"" . $this->Xml_f . "\"" :  $this->Xml_f;
              if (is_file($Zip_f)) {
                  unlink($Zip_f);
              }
              if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
              {
                  chdir($this->Ini->path_third . "/zip/windows");
                  $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
              {
                  if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                  {
                      chdir($this->Ini->path_third . "/zip/linux-i386/bin");
                  }
                  else
                  {
                      chdir($this->Ini->path_third . "/zip/linux-amd64/bin");
                  }
                  $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
              {
                  chdir($this->Ini->path_third . "/zip/mac/bin");
                  $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
              }
              if (!empty($str_zip)) {
                  exec($str_zip);
              }
              // ----- ZIP log
              $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'w');
              if ($fp)
              {
                  @fwrite($fp, $str_zip . "\r\n\r\n");
                  @fclose($fp);
              }
              unlink($Arq_input);
              $this->Arquivo = $this->Arq_zip;
              $this->Xml_f   = $this->Zip_f;
              $this->Tit_doc = $this->Tit_zip;
              if ($this->Tem_xml_res)
              { 
                  $str_zip   = "";
                  $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['xml_res_file']['xml'];
                  $Arq_input = (FALSE !== strpos($Arq_res, ' ')) ? " \"" . $Arq_res . "\"" :  $Arq_res;
                  if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                  {
                      $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
                  {
                      $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                  {
                      $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  if (!empty($str_zip)) {
                      exec($str_zip);
                  }
                  // ----- ZIP log
                  $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
                  if ($fp)
                  {
                      @fwrite($fp, $str_zip . "\r\n\r\n");
                      @fclose($fp);
                  }
                  unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['xml_res_file']['xml']);
              }
              if ($this->Grava_view)
              {
                  $str_zip    = "";
                  $xml_view_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo_view;
                  $zip_view_f = str_replace(".zip", "_view.zip", $this->Zip_f);
                  $zip_arq_v  = str_replace(".zip", "_view.zip", $this->Arq_zip);
                  $Zip_f      = (FALSE !== strpos($zip_view_f, ' ')) ? " \"" . $zip_view_f . "\"" :  $zip_view_f;
                  $Arq_input  = (FALSE !== strpos($xml_view_ff, ' ')) ? " \"" . $xml_view_f . "\"" :  $xml_view_f;
                  if (is_file($Zip_f)) {
                      unlink($Zip_f);
                  }
                  if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                  {
                      chdir($this->Ini->path_third . "/zip/windows");
                      $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
                  {
                      if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                      {
                          chdir($this->Ini->path_third . "/zip/linux-i386/bin");
                      }
                      else
                      {
                          chdir($this->Ini->path_third . "/zip/linux-amd64/bin");
                      }
                      $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                  {
                      chdir($this->Ini->path_third . "/zip/mac/bin");
                      $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  if (!empty($str_zip)) {
                      exec($str_zip);
                  }
                  // ----- ZIP log
                  $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
                  if ($fp)
                  {
                      @fwrite($fp, $str_zip . "\r\n\r\n");
                      @fclose($fp);
                  }
                  unlink($Arq_input);
                  $this->Arquivo_view = $zip_arq_v;
                  if ($this->Tem_xml_res)
                  { 
                      $str_zip   = "";
                      $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['xml_res_file']['view'];
                      $Arq_input = (FALSE !== strpos($Arq_res, ' ')) ? " \"" . $Arq_res . "\"" :  $Arq_res;
                      if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                      {
                          $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
                      }
                      elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
                      {
                          $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                      }
                      elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                      {
                          $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                      }
                      if (!empty($str_zip)) {
                          exec($str_zip);
                      }
                      // ----- ZIP log
                      $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
                      if ($fp)
                      {
                          @fwrite($fp, $str_zip . "\r\n\r\n");
                          @fclose($fp);
                      }
                      unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['xml_res_file']['view']);
                  }
              } 
              else 
              {
                  $this->Arquivo_view = $this->Arq_zip;
              } 
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['xml_res_grid']);
          } 
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- client_id
   function NM_export_client_id()
   {
             nmgp_Form_Num_Val($this->client_id, "", "", "0", "S", "2", "", "N:1", "-") ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['client_id'])) ? $this->New_label['client_id'] : "Client ID"; 
         }
         else
         {
             $SC_Label = "client_id"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->client_id) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->client_id) . "\"";
         }
   }
   //----- status
   function NM_export_status()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->status))
         {
             $this->status = sc_convert_encoding($this->status, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['status'])) ? $this->New_label['status'] : "Status"; 
         }
         else
         {
             $SC_Label = "status"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->status) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->status) . "\"";
         }
   }
   //----- renewal_date
   function NM_export_renewal_date()
   {
             $conteudo_x =  $this->renewal_date;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->renewal_date, "YYYY-MM-DD  ");
                 $this->renewal_date = $this->nm_data->FormataSaida("m-d-Y");
             } 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['renewal_date'])) ? $this->New_label['renewal_date'] : "Renewal Date"; 
         }
         else
         {
             $SC_Label = "renewal_date"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->renewal_date) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->renewal_date) . "\"";
         }
   }
   //----- day_count
   function NM_export_day_count()
   {
             nmgp_Form_Num_Val($this->day_count, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['day_count'])) ? $this->New_label['day_count'] : "Days"; 
         }
         else
         {
             $SC_Label = "day_count"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->day_count) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->day_count) . "\"";
         }
   }
   //----- co_name
   function NM_export_co_name()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->co_name))
         {
             $this->co_name = sc_convert_encoding($this->co_name, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['co_name'])) ? $this->New_label['co_name'] : "Company"; 
         }
         else
         {
             $SC_Label = "co_name"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->co_name) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->co_name) . "\"";
         }
   }
   //----- main_contact_name
   function NM_export_main_contact_name()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->main_contact_name))
         {
             $this->main_contact_name = sc_convert_encoding($this->main_contact_name, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['main_contact_name'])) ? $this->New_label['main_contact_name'] : "Main Contact Name"; 
         }
         else
         {
             $SC_Label = "main_contact_name"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->main_contact_name) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->main_contact_name) . "\"";
         }
   }
   //----- main_contact_phone
   function NM_export_main_contact_phone()
   {
             if ($this->main_contact_phone !== "&nbsp;") 
             { 
                 $this->nm_gera_mask($this->main_contact_phone, "(xxx) xxx-xxxx"); 
             } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->main_contact_phone))
         {
             $this->main_contact_phone = sc_convert_encoding($this->main_contact_phone, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['main_contact_phone'])) ? $this->New_label['main_contact_phone'] : "Main Contact Phone"; 
         }
         else
         {
             $SC_Label = "main_contact_phone"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->main_contact_phone) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->main_contact_phone) . "\"";
         }
   }
   //----- email_sent
   function NM_export_email_sent()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->email_sent))
         {
             $this->email_sent = sc_convert_encoding($this->email_sent, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['email_sent'])) ? $this->New_label['email_sent'] : "Notified On"; 
         }
         else
         {
             $SC_Label = "email_sent"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->email_sent) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->email_sent) . "\"";
         }
   }
   //----- renewal_msg
   function NM_export_renewal_msg()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->renewal_msg))
         {
             $this->renewal_msg = sc_convert_encoding($this->renewal_msg, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['renewal_msg'])) ? $this->New_label['renewal_msg'] : "Membership"; 
         }
         else
         {
             $SC_Label = "renewal_msg"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->renewal_msg) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->renewal_msg) . "\"";
         }
   }
   //----- main_phone
   function NM_export_main_phone()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->main_phone))
         {
             $this->main_phone = sc_convert_encoding($this->main_phone, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['main_phone'])) ? $this->New_label['main_phone'] : "Main Phone"; 
         }
         else
         {
             $SC_Label = "main_phone"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->main_phone) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->main_phone) . "\"";
         }
   }
   //----- main_email
   function NM_export_main_email()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->main_email))
         {
             $this->main_email = sc_convert_encoding($this->main_email, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['main_email'])) ? $this->New_label['main_email'] : "Main Email"; 
         }
         else
         {
             $SC_Label = "main_email"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->main_email) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->main_email) . "\"";
         }
   }
   //----- bus_cat
   function NM_export_bus_cat()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->bus_cat))
         {
             $this->bus_cat = sc_convert_encoding($this->bus_cat, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['bus_cat'])) ? $this->New_label['bus_cat'] : "Bus. Category"; 
         }
         else
         {
             $SC_Label = "bus_cat"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->bus_cat) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->bus_cat) . "\"";
         }
   }
   //----- bus_subcategory
   function NM_export_bus_subcategory()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->bus_subcategory))
         {
             $this->bus_subcategory = sc_convert_encoding($this->bus_subcategory, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['bus_subcategory'])) ? $this->New_label['bus_subcategory'] : "Bus. Subcategory"; 
         }
         else
         {
             $SC_Label = "bus_subcategory"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->bus_subcategory) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->bus_subcategory) . "\"";
         }
   }
   //----- street_address
   function NM_export_street_address()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->street_address))
         {
             $this->street_address = sc_convert_encoding($this->street_address, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['street_address'])) ? $this->New_label['street_address'] : "Street Address"; 
         }
         else
         {
             $SC_Label = "street_address"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->street_address) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->street_address) . "\"";
         }
   }
   //----- mailing_address
   function NM_export_mailing_address()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->mailing_address))
         {
             $this->mailing_address = sc_convert_encoding($this->mailing_address, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['mailing_address'])) ? $this->New_label['mailing_address'] : "Mailing Address"; 
         }
         else
         {
             $SC_Label = "mailing_address"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->mailing_address) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->mailing_address) . "\"";
         }
   }
   //----- city
   function NM_export_city()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->city))
         {
             $this->city = sc_convert_encoding($this->city, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['city'])) ? $this->New_label['city'] : "City"; 
         }
         else
         {
             $SC_Label = "city"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->city) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->city) . "\"";
         }
   }
   //----- state
   function NM_export_state()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->state))
         {
             $this->state = sc_convert_encoding($this->state, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['state'])) ? $this->New_label['state'] : "State"; 
         }
         else
         {
             $SC_Label = "state"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->state) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->state) . "\"";
         }
   }
   //----- zip_code
   function NM_export_zip_code()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->zip_code))
         {
             $this->zip_code = sc_convert_encoding($this->zip_code, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['zip_code'])) ? $this->New_label['zip_code'] : "Zip Code"; 
         }
         else
         {
             $SC_Label = "zip_code"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->zip_code) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->zip_code) . "\"";
         }
   }
   //----- home_phone
   function NM_export_home_phone()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->home_phone))
         {
             $this->home_phone = sc_convert_encoding($this->home_phone, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['home_phone'])) ? $this->New_label['home_phone'] : "Home Phone"; 
         }
         else
         {
             $SC_Label = "home_phone"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->home_phone) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->home_phone) . "\"";
         }
   }
   //----- main_contact_email
   function NM_export_main_contact_email()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->main_contact_email))
         {
             $this->main_contact_email = sc_convert_encoding($this->main_contact_email, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['main_contact_email'])) ? $this->New_label['main_contact_email'] : "Main Contact Email"; 
         }
         else
         {
             $SC_Label = "main_contact_email"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->main_contact_email) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->main_contact_email) . "\"";
         }
   }
   //----- main_contact_title
   function NM_export_main_contact_title()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->main_contact_title))
         {
             $this->main_contact_title = sc_convert_encoding($this->main_contact_title, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['main_contact_title'])) ? $this->New_label['main_contact_title'] : "Main Contact Title"; 
         }
         else
         {
             $SC_Label = "main_contact_title"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->main_contact_title) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->main_contact_title) . "\"";
         }
   }
   //----- permanent_member_date
   function NM_export_permanent_member_date()
   {
             if (substr($this->permanent_member_date, 10, 1) == "-") 
             { 
                 $this->permanent_member_date = substr($this->permanent_member_date, 0, 10) . " " . substr($this->permanent_member_date, 11);
             } 
             if (substr($this->permanent_member_date, 13, 1) == ".") 
             { 
                $this->permanent_member_date = substr($this->permanent_member_date, 0, 13) . ":" . substr($this->permanent_member_date, 14, 2) . ":" . substr($this->permanent_member_date, 17);
             } 
             $conteudo_x =  $this->permanent_member_date;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->permanent_member_date, "YYYY-MM-DD HH:II:SS  ");
                 $this->permanent_member_date = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['permanent_member_date'])) ? $this->New_label['permanent_member_date'] : "Member Since"; 
         }
         else
         {
             $SC_Label = "permanent_member_date"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->permanent_member_date) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->permanent_member_date) . "\"";
         }
   }

   //----- 
   function trata_dados($conteudo)
   {
      $str_temp =  $conteudo;
      $str_temp =  str_replace("<br />", "",  $str_temp);
      $str_temp =  str_replace("&", "&amp;",  $str_temp);
      $str_temp =  str_replace("<", "&lt;",   $str_temp);
      $str_temp =  str_replace(">", "&gt;",   $str_temp);
      $str_temp =  str_replace("'", "&apos;", $str_temp);
      $str_temp =  str_replace('"', "&quot;",  $str_temp);
      $str_temp =  str_replace('(', "_",  $str_temp);
      $str_temp =  str_replace(')', "",  $str_temp);
      return ($str_temp);
   }

   function clear_tag(&$conteudo)
   {
      $out = (is_numeric(substr($conteudo, 0, 1)) || substr($conteudo, 0, 1) == "") ? "_" : "";
      $str_temp = "abcdefghijklmnopqrstuvwxyz0123456789";
      for ($i = 0; $i < strlen($conteudo); $i++)
      {
          $char = substr($conteudo, $i, 1);
          $ok = false;
          for ($z = 0; $z < strlen($str_temp); $z++)
          {
              if (strtolower($char) == substr($str_temp, $z, 1))
              {
                  $ok = true;
                  break;
              }
          }
          $out .= ($ok) ? $char : "_";
      }
      $conteudo = $out;
   }

   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT") {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT") {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "SC_FORMAT_REGION") {
           $this->nm_data->SetaData($dt_in, strtoupper($form_in));
           $prep_out  = (strpos(strtolower($form_in), "dd") !== false) ? "dd" : "";
           $prep_out .= (strpos(strtolower($form_in), "mm") !== false) ? "mm" : "";
           $prep_out .= (strpos(strtolower($form_in), "aa") !== false) ? "aaaa" : "";
           $prep_out .= (strpos(strtolower($form_in), "yy") !== false) ? "aaaa" : "";
           return $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", $prep_out));
       }
       else {
           nm_conv_form_data($dt_out, $form_in, $form_out);
           return $dt_out;
       }
   }
   function progress_bar_end()
   {
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive'][$path_doc_md5][1] = $this->Tit_doc;
      $Mens_bar = $this->Ini->Nm_lang['lang_othr_file_msge'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
          $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
      }
      $this->pb->setProgressbarMessage($Mens_bar);
      $this->pb->setDownloadLink($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $this->pb->setDownloadMd5($path_doc_md5);
      $this->pb->completed();
   }
   //---- 
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE html>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_title'] ?> vw_clients_main_member_renew :: XML</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
 <link rel="shortcut icon" href="../_lib/img/grp__NM__bg__NM__pfm_img.png">
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <?php
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts))
 {
 ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->str_google_fonts ?>" />
 <?php
 }
 ?>
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">XML</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo_view ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_vw_clients_main_member_inactive_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_vw_clients_main_member_inactive"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_inactive']['xml_return']); ?>"> 
</FORM> 
</BODY>
</HTML>
<?php
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $str_highlight_ini = "";
      $str_highlight_fim = "";
      if(substr($nm_campo, 0, 23) == '<div class="highlight">' && substr($nm_campo, -6) == '</div>')
      {
           $str_highlight_ini = substr($nm_campo, 0, 23);
           $str_highlight_fim = substr($nm_campo, -6);

           $trab_campo = substr($nm_campo, 23, -6);
           $tam_campo  = strlen($trab_campo);
      }      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($tam_campo >= $cont2)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
   } 
function sendEmail($emails, $subject, $body, $attachment = null) {
$_SESSION['scriptcase']['grid_vw_clients_main_member_inactive']['contr_erro'] = 'on';
  

sc_include_library("sys", "/PHPMailerLib/PHPMailer", "PHPMailer.php", true, true);
sc_include_library("sys", "/PHPMailerLib/PHPMailer", "SMTP.php", true, true);

	$mail = new PHPMailer();
	$mail->IsSMTP();			
	$mail->SMTPDebug = 0;		
	$mail->SMTPAuth = true;		
	$mail->SMTPSecure = "tls"; 
	$mail->Host = "smtp.mailersend.net"; 
	$mail->Port = 587; 
	$mail->Username = "MS_na9Ypx@pdxflowermarket.com";	
	$mail->Password = "NFYRB9kV0BbLHMYW";	
	$mail->CharSet = 'UTF-8';	
	$mail->SetFrom ("pfm@pdxflowermarket.com");	
	$addresses = explode(',', $emails);
	foreach ($addresses as $address) {
		$mail->AddAddress($address);
	}
	$mail->Subject = $subject;
	$mail->IsHTML(true);
	$mail->Body = $body; 


    if ($attachment !== null && file_exists($attachment)) {
        $mail->addAttachment($attachment);
    }
	
	if(!$mail->Send()) 
	{
		$message = "Mailer Error: " . $mail->ErrorInfo;
		return array(false, $message);
	} 
	else 
	{
		$message = "Successfully sent!";
		return array(true, $message);
	}

$_SESSION['scriptcase']['grid_vw_clients_main_member_inactive']['contr_erro'] = 'off';
}
function localEnviron() {
$_SESSION['scriptcase']['grid_vw_clients_main_member_inactive']['contr_erro'] = 'on';
  

	$serverName = $_SERVER['SERVER_NAME']; 
	if (in_array($serverName, ['localhost', '127.0.0.1', '192.168.0.240'])) {

		error_reporting(E_ALL); 
		ini_set('display_errors', 1); 
		return 1;
	} else { 

		error_reporting(0); 
		ini_set('display_errors', 0); 
		return 0;
	}

$_SESSION['scriptcase']['grid_vw_clients_main_member_inactive']['contr_erro'] = 'off';
}
function insMembrStatusChg($client_id, $login, $memb_status_id) {
$_SESSION['scriptcase']['grid_vw_clients_main_member_inactive']['contr_erro'] = 'on';
  

    $insert_sql = "INSERT INTO sec_approvals (client_id, login, memb_status_id, ts) 
                   VALUES (" . $this->client_id . ", '" . $login . "', " . $memb_status_id . ", NOW())";

    
     $nm_select = $insert_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      
$_SESSION['scriptcase']['grid_vw_clients_main_member_inactive']['contr_erro'] = 'off';
}
}

?>
