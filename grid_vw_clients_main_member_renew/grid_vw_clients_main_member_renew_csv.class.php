<?php

class grid_vw_clients_main_member_renew_csv
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;

   var $Arquivo;
   var $Tit_doc;
   var $Delim_dados;
   var $Delim_line;
   var $Delim_col;
   var $Csv_label;
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
   function monta_csv()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if ($this->Ini->sc_export_ajax)
      {
          $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Csv_f);
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
                   nm_limpa_str_grid_vw_clients_main_member_renew($cadapar[1]);
                   nm_protect_num_grid_vw_clients_main_member_renew($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_vw_clients_main_member_renew']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($gv_email_confirm_msg)) 
      {
          $_SESSION['gv_email_confirm_msg'] = $gv_email_confirm_msg;
          nm_limpa_str_grid_vw_clients_main_member_renew($_SESSION["gv_email_confirm_msg"]);
      }
      if (isset($gv_tab_title)) 
      {
          $_SESSION['gv_tab_title'] = $gv_tab_title;
          nm_limpa_str_grid_vw_clients_main_member_renew($_SESSION["gv_tab_title"]);
      }
      if (isset($gv_curr_where)) 
      {
          $_SESSION['gv_curr_where'] = $gv_curr_where;
          nm_limpa_str_grid_vw_clients_main_member_renew($_SESSION["gv_curr_where"]);
      }
      if (isset($gv_curr_filter)) 
      {
          $_SESSION['gv_curr_filter'] = $gv_curr_filter;
          nm_limpa_str_grid_vw_clients_main_member_renew($_SESSION["gv_curr_filter"]);
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_vw_clients_main_member_renew_total.class.php"); 
      $this->Tot      = new grid_vw_clients_main_member_renew_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['tot_geral'][1];
      }
      $this->Csv_password = "";
      $this->Arquivo   = "sc_csv";
      $this->Arquivo  .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arq_zip   = $this->Arquivo . "_grid_vw_clients_main_member_renew.zip";
      $this->Arquivo  .= "_grid_vw_clients_main_member_renew";
      $this->Arquivo  .= ".csv";
      $this->Tit_doc   = "grid_vw_clients_main_member_renew.csv";
      $this->Tit_zip   = "grid_vw_clients_main_member_renew.zip";
      $this->Label_CSV = "N";
      $this->Delim_dados = "\"";
      $this->Delim_col   = ";";
      $this->Delim_line  = "\r\n";
      $this->Tem_csv_res = false;
      if (isset($_REQUEST['nm_delim_line']) && !empty($_REQUEST['nm_delim_line']))
      {
          $this->Delim_line = str_replace(array(1,2,3), array("\r\n","\r","\n"), $_REQUEST['nm_delim_line']);
      }
      if (isset($_REQUEST['nm_delim_col']) && !empty($_REQUEST['nm_delim_col']))
      {
          $this->Delim_col = str_replace(array(1,2,3,4,5), array(";",",","\	","#",""), $_REQUEST['nm_delim_col']);
      }
      if (isset($_REQUEST['nm_delim_dados']) && !empty($_REQUEST['nm_delim_dados']))
      {
          $this->Delim_dados = str_replace(array(1,2,3,4), array('"',"'","","|"), $_REQUEST['nm_delim_dados']);
      }
      if (isset($_REQUEST['nm_label_csv']) && !empty($_REQUEST['nm_label_csv']))
      {
          $this->Label_CSV = $_REQUEST['nm_label_csv'];
      }
          $this->Tem_csv_res  = true;
          if (isset($_REQUEST['SC_module_export']) && $_REQUEST['SC_module_export'] != "")
          { 
              $this->Tem_csv_res = (strpos(" " . $_REQUEST['SC_module_export'], "resume") !== false) ? true : false;
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['SC_Ind_Groupby'] == "sc_free_total")
          {
              $this->Tem_csv_res  = false;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['SC_Gb_Free_cmp']))
          {
              $this->Tem_csv_res  = false;
          }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_vw_clients_main_member_renew']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['csv_return']);
          if ($this->Tem_csv_res) {
              $PB_plus = intval ($this->count_ger * 0.04);
              $PB_plus = ($PB_plus < 2) ? 2 : $PB_plus;
          }
          else {
              $PB_plus = intval ($this->count_ger * 0.02);
              $PB_plus = ($PB_plus < 1) ? 1 : $PB_plus;
          }
          $PB_tot = $this->count_ger + $PB_plus;
          $this->PB_dif = $PB_tot - $this->count_ger;
          $this->pb->setTotalSteps($PB_tot );
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_vw_clients_main_member_renew']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_vw_clients_main_member_renew']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_vw_clients_main_member_renew']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['campos_busca'];
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
      $this->nm_where_dinamico = "";
      $_SESSION['scriptcase']['grid_vw_clients_main_member_renew']['contr_erro'] = 'on';
if (!isset($_SESSION['gv_tab_title'])) {$_SESSION['gv_tab_title'] = "";}
if (!isset($this->sc_temp_gv_tab_title)) {$this->sc_temp_gv_tab_title = (isset($_SESSION['gv_tab_title'])) ? $_SESSION['gv_tab_title'] : "";}
  $this->sc_temp_gv_tab_title = 'Renewal Review';
if (isset($this->sc_temp_gv_tab_title)) {$_SESSION['gv_tab_title'] = $this->sc_temp_gv_tab_title;}
$_SESSION['scriptcase']['grid_vw_clients_main_member_renew']['contr_erro'] = 'off'; 
      if  (!empty($this->nm_where_dinamico)) 
      {   
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['where_pesq'] .= $this->nm_where_dinamico;
      }   
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['csv_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['csv_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['csv_name'] .= ".csv";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['csv_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['csv_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['csv_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['csv_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['csv_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['csv_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Csv_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
      $csv_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      if ($this->Label_CSV == "S")
      { 
          $this->NM_prim_col  = 0;
          $this->csv_registro = "";
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['field_order'] as $Cada_col)
          { 
              $SC_Label = (isset($this->New_label['client_id'])) ? $this->New_label['client_id'] : "ID"; 
              if ($Cada_col == "client_id" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['membershipid'])) ? $this->New_label['membershipid'] : "ID (MSA)"; 
              if ($Cada_col == "membershipid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['status'])) ? $this->New_label['status'] : "Status"; 
              if ($Cada_col == "status" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['renewal_date'])) ? $this->New_label['renewal_date'] : "Renewal Date"; 
              if ($Cada_col == "renewal_date" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['day_count'])) ? $this->New_label['day_count'] : "Days"; 
              if ($Cada_col == "day_count" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['co_name'])) ? $this->New_label['co_name'] : "Company"; 
              if ($Cada_col == "co_name" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['main_contact_name'])) ? $this->New_label['main_contact_name'] : "Main Contact Name"; 
              if ($Cada_col == "main_contact_name" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['main_contact_phone'])) ? $this->New_label['main_contact_phone'] : "Main Contact Phone"; 
              if ($Cada_col == "main_contact_phone" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['email_sent'])) ? $this->New_label['email_sent'] : "Notified On"; 
              if ($Cada_col == "email_sent" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['renewal_msg'])) ? $this->New_label['renewal_msg'] : "Membership"; 
              if ($Cada_col == "renewal_msg" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['main_phone'])) ? $this->New_label['main_phone'] : "Main Phone"; 
              if ($Cada_col == "main_phone" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['main_email'])) ? $this->New_label['main_email'] : "Main Email"; 
              if ($Cada_col == "main_email" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['bus_cat'])) ? $this->New_label['bus_cat'] : "Bus. Category"; 
              if ($Cada_col == "bus_cat" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['bus_subcategory'])) ? $this->New_label['bus_subcategory'] : "Bus. Subcategory"; 
              if ($Cada_col == "bus_subcategory" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['street_address'])) ? $this->New_label['street_address'] : "Street Address"; 
              if ($Cada_col == "street_address" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['mailing_address'])) ? $this->New_label['mailing_address'] : "Mailing Address"; 
              if ($Cada_col == "mailing_address" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['city'])) ? $this->New_label['city'] : "City"; 
              if ($Cada_col == "city" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['state'])) ? $this->New_label['state'] : "State"; 
              if ($Cada_col == "state" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['zip_code'])) ? $this->New_label['zip_code'] : "Zip Code"; 
              if ($Cada_col == "zip_code" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['home_phone'])) ? $this->New_label['home_phone'] : "Home Phone"; 
              if ($Cada_col == "home_phone" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['main_contact_email'])) ? $this->New_label['main_contact_email'] : "Main Contact Email"; 
              if ($Cada_col == "main_contact_email" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['main_contact_title'])) ? $this->New_label['main_contact_title'] : "Main Contact Title"; 
              if ($Cada_col == "main_contact_title" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['permanent_member_date'])) ? $this->New_label['permanent_member_date'] : "Member Since"; 
              if ($Cada_col == "permanent_member_date" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
          } 
          $this->csv_registro .= $this->Delim_line;
          fwrite($csv_f, $this->csv_registro);
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT client_id, MembershipID, status, str_replace (convert(char(10),renewal_date,102), '.', '-') + ' ' + convert(char(8),renewal_date,20), day_count, co_name, main_contact_name, main_contact_phone, renewal_msg, main_phone, main_email, bus_cat, bus_subcategory, street_address, mailing_address, city, state, zip_code, home_phone, main_contact_email, main_contact_title, str_replace (convert(char(10),permanent_member_date,102), '.', '-') + ' ' + convert(char(8),permanent_member_date,20), notif_color from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT client_id, MembershipID, status, renewal_date, day_count, co_name, main_contact_name, main_contact_phone, renewal_msg, main_phone, main_email, bus_cat, bus_subcategory, street_address, mailing_address, city, state, zip_code, home_phone, main_contact_email, main_contact_title, permanent_member_date, notif_color from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT client_id, MembershipID, status, convert(char(23),renewal_date,121), day_count, co_name, main_contact_name, main_contact_phone, renewal_msg, main_phone, main_email, bus_cat, bus_subcategory, street_address, mailing_address, city, state, zip_code, home_phone, main_contact_email, main_contact_title, convert(char(23),permanent_member_date,121), notif_color from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT client_id, MembershipID, status, renewal_date, day_count, co_name, main_contact_name, main_contact_phone, renewal_msg, main_phone, main_email, bus_cat, bus_subcategory, street_address, mailing_address, city, state, zip_code, home_phone, main_contact_email, main_contact_title, permanent_member_date, notif_color from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT client_id, MembershipID, status, EXTEND(renewal_date, YEAR TO FRACTION), day_count, co_name, main_contact_name, main_contact_phone, renewal_msg, main_phone, main_email, bus_cat, bus_subcategory, street_address, mailing_address, city, state, zip_code, home_phone, main_contact_email, main_contact_title, EXTEND(permanent_member_date, YEAR TO FRACTION), notif_color from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT client_id, MembershipID, status, renewal_date, day_count, co_name, main_contact_name, main_contact_phone, renewal_msg, main_phone, main_email, bus_cat, bus_subcategory, street_address, mailing_address, city, state, zip_code, home_phone, main_contact_email, main_contact_title, permanent_member_date, notif_color from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['order_grid'];
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
         $this->membershipid = $rs->fields[1] ;  
         $this->membershipid = (string)$this->membershipid;
         $this->status = $rs->fields[2] ;  
         $this->renewal_date = $rs->fields[3] ;  
         $this->day_count = $rs->fields[4] ;  
         $this->day_count = (string)$this->day_count;
         $this->co_name = $rs->fields[5] ;  
         $this->main_contact_name = $rs->fields[6] ;  
         $this->main_contact_phone = $rs->fields[7] ;  
         $this->renewal_msg = $rs->fields[8] ;  
         $this->main_phone = $rs->fields[9] ;  
         $this->main_email = $rs->fields[10] ;  
         $this->bus_cat = $rs->fields[11] ;  
         $this->bus_subcategory = $rs->fields[12] ;  
         $this->street_address = $rs->fields[13] ;  
         $this->mailing_address = $rs->fields[14] ;  
         $this->city = $rs->fields[15] ;  
         $this->state = $rs->fields[16] ;  
         $this->zip_code = $rs->fields[17] ;  
         $this->home_phone = $rs->fields[18] ;  
         $this->main_contact_email = $rs->fields[19] ;  
         $this->main_contact_title = $rs->fields[20] ;  
         $this->permanent_member_date = $rs->fields[21] ;  
         $this->notif_color = $rs->fields[22] ;  
   $_SESSION['scriptcase']['grid_vw_clients_main_member_renew']['contr_erro'] = 'on';
if (!isset($_SESSION['gv_email_confirm_msg'])) {$_SESSION['gv_email_confirm_msg'] = "";}
if (!isset($this->sc_temp_gv_email_confirm_msg)) {$this->sc_temp_gv_email_confirm_msg = (isset($_SESSION['gv_email_confirm_msg'])) ? $_SESSION['gv_email_confirm_msg'] : "";}
  $this->sc_temp_gv_email_confirm_msg = "Sure about sending " . $this->count_ger  . " renewal emails?";
if (isset($this->sc_temp_gv_email_confirm_msg)) {$_SESSION['gv_email_confirm_msg'] = $this->sc_temp_gv_email_confirm_msg;}
$_SESSION['scriptcase']['grid_vw_clients_main_member_renew']['contr_erro'] = 'off';
      }
      $this->SC_seq_register = 0;
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->csv_registro = "";
         $this->NM_prim_col  = 0;
         $this->client_id = $rs->fields[0] ;  
         $this->client_id = (string)$this->client_id;
         $this->membershipid = $rs->fields[1] ;  
         $this->membershipid = (string)$this->membershipid;
         $this->status = $rs->fields[2] ;  
         $this->renewal_date = $rs->fields[3] ;  
         $this->day_count = $rs->fields[4] ;  
         $this->day_count = (string)$this->day_count;
         $this->co_name = $rs->fields[5] ;  
         $this->main_contact_name = $rs->fields[6] ;  
         $this->main_contact_phone = $rs->fields[7] ;  
         $this->renewal_msg = $rs->fields[8] ;  
         $this->main_phone = $rs->fields[9] ;  
         $this->main_email = $rs->fields[10] ;  
         $this->bus_cat = $rs->fields[11] ;  
         $this->bus_subcategory = $rs->fields[12] ;  
         $this->street_address = $rs->fields[13] ;  
         $this->mailing_address = $rs->fields[14] ;  
         $this->city = $rs->fields[15] ;  
         $this->state = $rs->fields[16] ;  
         $this->zip_code = $rs->fields[17] ;  
         $this->home_phone = $rs->fields[18] ;  
         $this->main_contact_email = $rs->fields[19] ;  
         $this->main_contact_title = $rs->fields[20] ;  
         $this->permanent_member_date = $rs->fields[21] ;  
         $this->notif_color = $rs->fields[22] ;  
         $this->sc_proc_grid = true; 
         //----- lookup - email_sent
         $this->Lookup->lookup_email_sent($this->email_sent, $this->client_id, $this->array_email_sent); 
         $this->email_sent = str_replace("<br>", " ", $this->email_sent); 
         $this->email_sent = ($this->email_sent == "&nbsp;") ? "" : $this->email_sent; 
         $_SESSION['scriptcase']['grid_vw_clients_main_member_renew']['contr_erro'] = 'on';
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
$_SESSION['scriptcase']['grid_vw_clients_main_member_renew']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->csv_registro .= $this->Delim_line;
         fwrite($csv_f, $this->csv_registro);
         $rs->MoveNext();
      }
      fclose($csv_f);
      if ($this->Tem_csv_res)
      { 
          if (!$this->Ini->sc_export_ajax) {
              $this->PB_dif = intval ($this->PB_dif / 2);
              $Mens_bar  = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
              $Mens_smry = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_smry_titl']);
              $this->pb->setProgressbarMessage($Mens_bar . ": " . $Mens_smry);
              $this->pb->addSteps($this->PB_dif);
          }
          require_once($this->Ini->path_aplicacao . "grid_vw_clients_main_member_renew_res_csv.class.php");
          $this->Res = new grid_vw_clients_main_member_renew_res_csv();
          $this->prep_modulos("Res");
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['csv_res_grid'] = true;
          $this->Res->monta_csv();
      } 
      if (!$this->Ini->sc_export_ajax) {
          $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_btns_export_finished']);
          $this->pb->setProgressbarMessage($Mens_bar);
          $this->pb->addSteps($this->PB_dif);
      }
      if ($this->Csv_password != "" || $this->Tem_csv_res)
      { 
          $str_zip    = "";
          $Parm_pass  = ($this->Csv_password != "") ? " -p" : "";
          $Zip_f      = (FALSE !== strpos($this->Zip_f, ' ')) ? " \"" . $this->Zip_f . "\"" :  $this->Zip_f;
          $Arq_input  = (FALSE !== strpos($this->Csv_f, ' ')) ? " \"" . $this->Csv_f . "\"" :  $this->Csv_f;
          if (is_file($Zip_f)) {
              unlink($Zip_f);
          }
          if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
          {
              chdir($this->Ini->path_third . "/zip/windows");
              $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $this->Csv_password . " " . $Zip_f . " " . $Arq_input;
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
                $str_zip = "./7za " . $Parm_pass . $this->Csv_password . " a " . $Zip_f . " " . $Arq_input;
          }
          elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
          {
              chdir($this->Ini->path_third . "/zip/mac/bin");
              $str_zip = "./7za " . $Parm_pass . $this->Csv_password . " a " . $Zip_f . " " . $Arq_input;
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
          if ($this->Tem_csv_res)
          { 
              $str_zip    = "";
              $Arq_res    = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['csv_res_file'];
              $Arq_input  = (FALSE !== strpos($Arq_res, ' ')) ? " \"" . $Arq_res . "\"" :  $Arq_res;
              if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
              {
                  $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $this->Csv_password . " " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
              {
                  $str_zip = "./7za " . $Parm_pass . $this->Csv_password . " a " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
              {
                  $str_zip = "./7za " . $Parm_pass . $this->Csv_password . " a " . $Zip_f . " " . $Arq_input;
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
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['csv_res_grid']);
              unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['csv_res_file']);
          }
          unlink($Arq_input);
          $this->Arquivo = $this->Arq_zip;
          $this->Csv_f   = $this->Zip_f;
          $this->Tit_doc = $this->Tit_zip;
      } 
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- client_id
   function NM_export_client_id()
   {
             nmgp_Form_Num_Val($this->client_id, "", "", "0", "S", "2", "", "N:1", "-") ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->client_id);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- membershipid
   function NM_export_membershipid()
   {
             nmgp_Form_Num_Val($this->membershipid, "", "", "0", "S", "2", "", "N:1", "-") ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->membershipid);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- status
   function NM_export_status()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->status);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
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
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->renewal_date);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- day_count
   function NM_export_day_count()
   {
             nmgp_Form_Num_Val($this->day_count, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->day_count);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- co_name
   function NM_export_co_name()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->co_name);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- main_contact_name
   function NM_export_main_contact_name()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->main_contact_name);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- main_contact_phone
   function NM_export_main_contact_phone()
   {
             if ($this->main_contact_phone !== "&nbsp;") 
             { 
                 $this->nm_gera_mask($this->main_contact_phone, "(xxx) xxx-xxxx"); 
             } 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->main_contact_phone);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- email_sent
   function NM_export_email_sent()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->email_sent);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- renewal_msg
   function NM_export_renewal_msg()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->renewal_msg);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- main_phone
   function NM_export_main_phone()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->main_phone);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- main_email
   function NM_export_main_email()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->main_email);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- bus_cat
   function NM_export_bus_cat()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->bus_cat);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- bus_subcategory
   function NM_export_bus_subcategory()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->bus_subcategory);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- street_address
   function NM_export_street_address()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->street_address);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- mailing_address
   function NM_export_mailing_address()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->mailing_address);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- city
   function NM_export_city()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->city);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- state
   function NM_export_state()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->state);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- zip_code
   function NM_export_zip_code()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->zip_code);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- home_phone
   function NM_export_home_phone()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->home_phone);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- main_contact_email
   function NM_export_main_contact_email()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->main_contact_email);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- main_contact_title
   function NM_export_main_contact_title()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->main_contact_title);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
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
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->permanent_member_date);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['csv_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['csv_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE html>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_title'] ?> vw_clients_main_member_renew :: CSV</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?>" GMT">
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0">
 <META http-equiv="Pragma" content="no-cache">
 <link rel="shortcut icon" href="../_lib/img/grp__NM__bg__NM__pfm_img.png">
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
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
   <td class="scExportTitle" style="height: 25px">CSV</td>
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
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_vw_clients_main_member_renew_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_vw_clients_main_member_renew"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_vw_clients_main_member_renew']['csv_return']); ?>"> 
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
$_SESSION['scriptcase']['grid_vw_clients_main_member_renew']['contr_erro'] = 'on';
  

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

$_SESSION['scriptcase']['grid_vw_clients_main_member_renew']['contr_erro'] = 'off';
}
function localEnviron() {
$_SESSION['scriptcase']['grid_vw_clients_main_member_renew']['contr_erro'] = 'on';
  

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

$_SESSION['scriptcase']['grid_vw_clients_main_member_renew']['contr_erro'] = 'off';
}
function insMembrStatusChg($client_id, $login, $memb_status_id) {
$_SESSION['scriptcase']['grid_vw_clients_main_member_renew']['contr_erro'] = 'on';
  

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
      
$_SESSION['scriptcase']['grid_vw_clients_main_member_renew']['contr_erro'] = 'off';
}
}

?>
