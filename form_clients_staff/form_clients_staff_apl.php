<?php
//
class form_clients_staff_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $formatado = false;
   var $use_100perc_fields = false;
   var $classes_100perc_fields = array();
   var $close_modal_after_insert = false;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'            => '',
                                'param'             => array(),
                                'autoComp'          => '',
                                'rsSize'            => '',
                                'msgDisplay'        => '',
                                'errList'           => array(),
                                'fldList'           => array(),
                                'varList'           => array(),
                                'focus'             => '',
                                'navStatus'         => array(),
                                'redir'             => array(),
                                'blockDisplay'      => array(),
                                'fieldDisplay'      => array(),
                                'fieldLabel'        => array(),
                                'readOnly'          => array(),
                                'btnVars'           => array(),
                                'ajaxAlert'         => array(),
                                'ajaxMessage'       => array(),
                                'ajaxJavascript'    => array(),
                                'buttonDisplay'     => array(),
                                'buttonDisplayVert' => array(),
                                'calendarReload'    => false,
                                'quickSearchRes'    => false,
                                'displayMsg'        => false,
                                'displayMsgTxt'     => '',
                                'dyn_search'        => array(),
                                'empty_filter'      => '',
                                'event_field'       => '',
                                'fieldsWithErrors'  => array(),
                               );
   var $NM_ajax_force_values = false;
   var $captcha_code;
   var $captcha_sent;
   var $Nav_permite_ava     = true;
   var $Nav_permite_ret     = true;
   var $Apl_com_erro        = false;
   var $app_is_initializing = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $client_id;
   var $membershipid;
   var $memb_status_id;
   var $memb_status_id_1;
   var $appn_id;
   var $co_name;
   var $ofa_contact;
   var $street_address;
   var $mailing_address;
   var $city;
   var $state;
   var $zip_code;
   var $phone_number;
   var $home_phone;
   var $fax_number;
   var $email;
   var $business_type;
   var $fresh_cut_allowed;
   var $business_license;
   var $nursery_license;
   var $federal_tax_id;
   var $temporary_pass;
   var $ofa_member;
   var $starting_date;
   var $renewal_date;
   var $expiration_date;
   var $canceled;
   var $cancel_date;
   var $canceled_by;
   var $reason_canceled;
   var $retire_date;
   var $verified_receipts;
   var $date_last_updated;
   var $restricted;
   var $committee_approval_required;
   var $type_company;
   var $type_company_1;
   var $archive;
   var $archive_1;
   var $archive_date;
   var $pricing_level_id;
   var $pricing_level_id_1;
   var $store_front_address;
   var $store_front_city;
   var $store_front_zip;
   var $home_base_address;
   var $home_base_city;
   var $home_base_zip;
   var $store_front_state;
   var $home_base_state;
   var $record_created;
   var $record_created_hora;
   var $permanent_member_date;
   var $acct_instagram;
   var $acct_facebook;
   var $website_url;
   var $bus_cat_id;
   var $bus_cat_id_1;
   var $bus_subcat_id;
   var $bus_subcat_id_1;
   var $bus_subcat_other;
   var $appn_date;
   var $appn_note;
   var $doc_sec_of_state;
   var $doc_sec_of_state_scfile_name;
   var $doc_sec_of_state_ul_name;
   var $doc_sec_of_state_scfile_type;
   var $doc_sec_of_state_ul_type;
   var $doc_sec_of_state_limpa;
   var $doc_sec_of_state_salva;
   var $out_doc_sec_of_state;
   var $doc_city_bus_lic;
   var $doc_city_bus_lic_scfile_name;
   var $doc_city_bus_lic_ul_name;
   var $doc_city_bus_lic_scfile_type;
   var $doc_city_bus_lic_ul_type;
   var $doc_city_bus_lic_limpa;
   var $doc_city_bus_lic_salva;
   var $out_doc_city_bus_lic;
   var $doc_agric_lic;
   var $doc_agric_lic_scfile_name;
   var $doc_agric_lic_ul_name;
   var $doc_agric_lic_scfile_type;
   var $doc_agric_lic_ul_type;
   var $doc_agric_lic_limpa;
   var $doc_agric_lic_salva;
   var $out_doc_agric_lic;
   var $doc_last_year_tax;
   var $doc_last_year_tax_scfile_name;
   var $doc_last_year_tax_ul_name;
   var $doc_last_year_tax_scfile_type;
   var $doc_last_year_tax_ul_type;
   var $doc_last_year_tax_limpa;
   var $doc_last_year_tax_salva;
   var $out_doc_last_year_tax;
   var $qb_id;
   var $main_contact_name;
   var $main_contact_phone;
   var $main_contact_email;
   var $main_contact_title;
   var $main_contact_img_id;
   var $main_contact_img_id_scfile_name;
   var $main_contact_img_id_ul_name;
   var $main_contact_img_id_ul_type;
   var $main_contact_img_id_limpa;
   var $main_contact_img_id_salva;
   var $main_contact_img_file;
   var $main_contact_img_size;
   var $main_contact_img_id_prev;
   var $main_contact_img_id_prev_scfile_name;
   var $main_contact_img_id_prev_ul_name;
   var $main_contact_img_id_prev_scfile_type;
   var $main_contact_img_id_prev_ul_type;
   var $main_contact_img_id_prev_limpa;
   var $main_contact_img_id_prev_salva;
   var $out_main_contact_img_id_prev;
   var $memb_qty;
   var $doc_type;
   var $doc_type_1;
   var $doc_file;
   var $doc_file_scfile_name;
   var $doc_file_ul_name;
   var $doc_file_ul_type;
   var $doc_file_limpa;
   var $doc_file_salva;
   var $doc_filename;
   var $doc_filesize;
   var $applicant_name;
   var $applicant_signature;
   var $applicant_signature_scfile_name;
   var $applicant_signature_ul_name;
   var $applicant_signature_scfile_type;
   var $applicant_signature_ul_type;
   var $applicant_signature_limpa;
   var $applicant_signature_salva;
   var $out_applicant_signature;
   var $applicant_title;
   var $addtl_memb_mail;
   var $adtl_memb_name;
   var $adtl_memb_note;
   var $adtl_memb_phone;
   var $client_pmts;
   var $docs;
   var $dummy01;
   var $dummy02;
   var $dummy03;
   var $dummy04;
   var $dummy05;
   var $dummy06;
   var $dummy07;
   var $dummy08;
   var $dummy09;
   var $dummy10;
   var $dummy11;
   var $dummy12;
   var $dummy13;
   var $est_memb_cost;
   var $main_contact_title_lbl;
   var $memb_01;
   var $memb_02;
   var $memb_03;
   var $memb_04;
   var $memb_05;
   var $memb_06;
   var $memb_07;
   var $memb_08;
   var $memb_09;
   var $memb_10;
   var $memb_11;
   var $memb_12;
   var $memb_13;
   var $memb_email;
   var $memb_levels;
   var $memb_list;
   var $memb_name;
   var $memb_note;
   var $memb_phone;
   var $notes;
   var $paid;
   var $paid_1;
   var $pay;
   var $read_at_sign;
   var $rules;
   var $rules_warn;
   var $submitted;
   var $transaction;
   var $xlsx_sample;
   var $js_prod_price;
   var $js_strp_price_id;
   var $js_mbr_ct;
   var $js_client_id;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $NM_size_docs = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden   = array();
   var $Field_no_validate  = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = false;
   var $Grid_editavel  = false;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
   var $record_insert_ok = false;
   var $record_delete_ok = false;
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['acct_facebook']))
          {
              $this->acct_facebook = $this->NM_ajax_info['param']['acct_facebook'];
          }
          if (isset($this->NM_ajax_info['param']['acct_instagram']))
          {
              $this->acct_instagram = $this->NM_ajax_info['param']['acct_instagram'];
          }
          if (isset($this->NM_ajax_info['param']['bus_cat_id']))
          {
              $this->bus_cat_id = $this->NM_ajax_info['param']['bus_cat_id'];
          }
          if (isset($this->NM_ajax_info['param']['bus_subcat_id']))
          {
              $this->bus_subcat_id = $this->NM_ajax_info['param']['bus_subcat_id'];
          }
          if (isset($this->NM_ajax_info['param']['bus_subcat_other']))
          {
              $this->bus_subcat_other = $this->NM_ajax_info['param']['bus_subcat_other'];
          }
          if (isset($this->NM_ajax_info['param']['city']))
          {
              $this->city = $this->NM_ajax_info['param']['city'];
          }
          if (isset($this->NM_ajax_info['param']['client_id']))
          {
              $this->client_id = $this->NM_ajax_info['param']['client_id'];
          }
          if (isset($this->NM_ajax_info['param']['client_pmts']))
          {
              $this->client_pmts = $this->NM_ajax_info['param']['client_pmts'];
          }
          if (isset($this->NM_ajax_info['param']['co_name']))
          {
              $this->co_name = $this->NM_ajax_info['param']['co_name'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['docs']))
          {
              $this->docs = $this->NM_ajax_info['param']['docs'];
          }
          if (isset($this->NM_ajax_info['param']['dummy02']))
          {
              $this->dummy02 = $this->NM_ajax_info['param']['dummy02'];
          }
          if (isset($this->NM_ajax_info['param']['dummy07']))
          {
              $this->dummy07 = $this->NM_ajax_info['param']['dummy07'];
          }
          if (isset($this->NM_ajax_info['param']['dummy08']))
          {
              $this->dummy08 = $this->NM_ajax_info['param']['dummy08'];
          }
          if (isset($this->NM_ajax_info['param']['js_client_id']))
          {
              $this->js_client_id = $this->NM_ajax_info['param']['js_client_id'];
          }
          if (isset($this->NM_ajax_info['param']['js_mbr_ct']))
          {
              $this->js_mbr_ct = $this->NM_ajax_info['param']['js_mbr_ct'];
          }
          if (isset($this->NM_ajax_info['param']['js_prod_price']))
          {
              $this->js_prod_price = $this->NM_ajax_info['param']['js_prod_price'];
          }
          if (isset($this->NM_ajax_info['param']['js_strp_price_id']))
          {
              $this->js_strp_price_id = $this->NM_ajax_info['param']['js_strp_price_id'];
          }
          if (isset($this->NM_ajax_info['param']['mailing_address']))
          {
              $this->mailing_address = $this->NM_ajax_info['param']['mailing_address'];
          }
          if (isset($this->NM_ajax_info['param']['main_contact_email']))
          {
              $this->main_contact_email = $this->NM_ajax_info['param']['main_contact_email'];
          }
          if (isset($this->NM_ajax_info['param']['main_contact_img_id']))
          {
              $this->main_contact_img_id = $this->NM_ajax_info['param']['main_contact_img_id'];
          }
          if (isset($this->NM_ajax_info['param']['main_contact_img_id_limpa']))
          {
              $this->main_contact_img_id_limpa = $this->NM_ajax_info['param']['main_contact_img_id_limpa'];
          }
          if (isset($this->NM_ajax_info['param']['main_contact_img_id_ul_name']))
          {
              $this->main_contact_img_id_ul_name = $this->NM_ajax_info['param']['main_contact_img_id_ul_name'];
          }
          if (isset($this->NM_ajax_info['param']['main_contact_img_id_ul_type']))
          {
              $this->main_contact_img_id_ul_type = $this->NM_ajax_info['param']['main_contact_img_id_ul_type'];
          }
          if (isset($this->NM_ajax_info['param']['main_contact_name']))
          {
              $this->main_contact_name = $this->NM_ajax_info['param']['main_contact_name'];
          }
          if (isset($this->NM_ajax_info['param']['main_contact_phone']))
          {
              $this->main_contact_phone = $this->NM_ajax_info['param']['main_contact_phone'];
          }
          if (isset($this->NM_ajax_info['param']['main_contact_title']))
          {
              $this->main_contact_title = $this->NM_ajax_info['param']['main_contact_title'];
          }
          if (isset($this->NM_ajax_info['param']['memb_list']))
          {
              $this->memb_list = $this->NM_ajax_info['param']['memb_list'];
          }
          if (isset($this->NM_ajax_info['param']['memb_status_id']))
          {
              $this->memb_status_id = $this->NM_ajax_info['param']['memb_status_id'];
          }
          if (isset($this->NM_ajax_info['param']['membershipid']))
          {
              $this->membershipid = $this->NM_ajax_info['param']['membershipid'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_dyn_search']))
          {
              $this->nmgp_arg_dyn_search = $this->NM_ajax_info['param']['nmgp_arg_dyn_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ordem']))
          {
              $this->nmgp_ordem = $this->NM_ajax_info['param']['nmgp_ordem'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_refresh_fields']))
          {
              $this->nmgp_refresh_fields = $this->NM_ajax_info['param']['nmgp_refresh_fields'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['notes']))
          {
              $this->notes = $this->NM_ajax_info['param']['notes'];
          }
          if (isset($this->NM_ajax_info['param']['permanent_member_date']))
          {
              $this->permanent_member_date = $this->NM_ajax_info['param']['permanent_member_date'];
          }
          if (isset($this->NM_ajax_info['param']['pricing_level_id']))
          {
              $this->pricing_level_id = $this->NM_ajax_info['param']['pricing_level_id'];
          }
          if (isset($this->NM_ajax_info['param']['renewal_date']))
          {
              $this->renewal_date = $this->NM_ajax_info['param']['renewal_date'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['state']))
          {
              $this->state = $this->NM_ajax_info['param']['state'];
          }
          if (isset($this->NM_ajax_info['param']['website_url']))
          {
              $this->website_url = $this->NM_ajax_info['param']['website_url'];
          }
          if (isset($this->NM_ajax_info['param']['zip_code']))
          {
              $this->zip_code = $this->NM_ajax_info['param']['zip_code'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
          if (!isset($this->nmgp_refresh_row))
          {
              $this->nmgp_refresh_row = '';
          }
      }

      $this->scSajaxReservedWords = array('rs', 'rst', 'rsrnd', 'rsargs');
      $this->sc_conv_var = array();
      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               if (!in_array(strtolower($nmgp_campo), $this->scSajaxReservedWords)) {
                   if (isset($this->sc_conv_var[$nmgp_campo]))
                   {
                       $nmgp_campo = $this->sc_conv_var[$nmgp_campo];
                   }
                   elseif (isset($this->sc_conv_var[strtolower($nmgp_campo)]))
                   {
                       $nmgp_campo = $this->sc_conv_var[strtolower($nmgp_campo)];
                   }
               }
               $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
               $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
               $this->$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
               $this->$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
               $this->$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
          }
      }
      $Sc_lig_md5 = false;
      if (!empty($_POST))
      {
          foreach ($_POST as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                      $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (!in_array(strtolower($nmgp_var), $this->scSajaxReservedWords)) {
                   if (isset($this->sc_conv_var[$nmgp_var]))
                   {
                       $nmgp_var = $this->sc_conv_var[$nmgp_var];
                   }
                   elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
                   {
                       $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
                   }
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
      {
          foreach ($_GET as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                       $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (!in_array(strtolower($nmgp_var), $this->scSajaxReservedWords)) {
                   if (isset($this->sc_conv_var[$nmgp_var]))
                   {
                       $nmgp_var = $this->sc_conv_var[$nmgp_var];
                   }
                   elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
                   {
                       $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
                   }
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
      {
          $_SESSION['sc_session']['SC_parm_violation'] = true;
      }
      if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
      {
          $nmgp_parms = "";
      }
      if (isset($this->gv_contact_pfm) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gv_contact_pfm'] = $this->gv_contact_pfm;
      }
      if (isset($this->gv_bus_cat) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gv_bus_cat'] = $this->gv_bus_cat;
      }
      if (isset($this->usr_login) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($this->gv_members_ct) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gv_members_ct'] = $this->gv_members_ct;
      }
      if (isset($this->gv_cust_id) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gv_cust_id'] = $this->gv_cust_id;
      }
      if (isset($this->gv_strp_id) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gv_strp_id'] = $this->gv_strp_id;
      }
      if (isset($this->gv_membership_price) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gv_membership_price'] = $this->gv_membership_price;
      }
      if (isset($this->gv_from_grid) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gv_from_grid'] = $this->gv_from_grid;
      }
      if (isset($this->gv_last_memb_status_id) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gv_last_memb_status_id'] = $this->gv_last_memb_status_id;
      }
      if (isset($this->gv_memb_cost) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gv_memb_cost'] = $this->gv_memb_cost;
      }
      if (isset($this->gv_cost_adtl_buyer) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gv_cost_adtl_buyer'] = $this->gv_cost_adtl_buyer;
      }
      if (isset($this->gv_descript) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gv_descript'] = $this->gv_descript;
      }
      if (isset($_POST["gv_contact_pfm"]) && isset($this->gv_contact_pfm)) 
      {
          $_SESSION['gv_contact_pfm'] = $this->gv_contact_pfm;
      }
      if (isset($_POST["gv_bus_cat"]) && isset($this->gv_bus_cat)) 
      {
          $_SESSION['gv_bus_cat'] = $this->gv_bus_cat;
      }
      if (isset($_POST["usr_login"]) && isset($this->usr_login)) 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_POST["gv_members_ct"]) && isset($this->gv_members_ct)) 
      {
          $_SESSION['gv_members_ct'] = $this->gv_members_ct;
      }
      if (isset($_POST["gv_cust_id"]) && isset($this->gv_cust_id)) 
      {
          $_SESSION['gv_cust_id'] = $this->gv_cust_id;
      }
      if (isset($_POST["gv_strp_id"]) && isset($this->gv_strp_id)) 
      {
          $_SESSION['gv_strp_id'] = $this->gv_strp_id;
      }
      if (isset($_POST["gv_membership_price"]) && isset($this->gv_membership_price)) 
      {
          $_SESSION['gv_membership_price'] = $this->gv_membership_price;
      }
      if (isset($_POST["gv_from_grid"]) && isset($this->gv_from_grid)) 
      {
          $_SESSION['gv_from_grid'] = $this->gv_from_grid;
      }
      if (isset($_POST["gv_last_memb_status_id"]) && isset($this->gv_last_memb_status_id)) 
      {
          $_SESSION['gv_last_memb_status_id'] = $this->gv_last_memb_status_id;
      }
      if (isset($_POST["gv_memb_cost"]) && isset($this->gv_memb_cost)) 
      {
          $_SESSION['gv_memb_cost'] = $this->gv_memb_cost;
      }
      if (isset($_POST["gv_cost_adtl_buyer"]) && isset($this->gv_cost_adtl_buyer)) 
      {
          $_SESSION['gv_cost_adtl_buyer'] = $this->gv_cost_adtl_buyer;
      }
      if (isset($_POST["gv_descript"]) && isset($this->gv_descript)) 
      {
          $_SESSION['gv_descript'] = $this->gv_descript;
      }
      if (isset($_GET["gv_contact_pfm"]) && isset($this->gv_contact_pfm)) 
      {
          $_SESSION['gv_contact_pfm'] = $this->gv_contact_pfm;
      }
      if (isset($_GET["gv_bus_cat"]) && isset($this->gv_bus_cat)) 
      {
          $_SESSION['gv_bus_cat'] = $this->gv_bus_cat;
      }
      if (isset($_GET["usr_login"]) && isset($this->usr_login)) 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_GET["gv_members_ct"]) && isset($this->gv_members_ct)) 
      {
          $_SESSION['gv_members_ct'] = $this->gv_members_ct;
      }
      if (isset($_GET["gv_cust_id"]) && isset($this->gv_cust_id)) 
      {
          $_SESSION['gv_cust_id'] = $this->gv_cust_id;
      }
      if (isset($_GET["gv_strp_id"]) && isset($this->gv_strp_id)) 
      {
          $_SESSION['gv_strp_id'] = $this->gv_strp_id;
      }
      if (isset($_GET["gv_membership_price"]) && isset($this->gv_membership_price)) 
      {
          $_SESSION['gv_membership_price'] = $this->gv_membership_price;
      }
      if (isset($_GET["gv_from_grid"]) && isset($this->gv_from_grid)) 
      {
          $_SESSION['gv_from_grid'] = $this->gv_from_grid;
      }
      if (isset($_GET["gv_last_memb_status_id"]) && isset($this->gv_last_memb_status_id)) 
      {
          $_SESSION['gv_last_memb_status_id'] = $this->gv_last_memb_status_id;
      }
      if (isset($_GET["gv_memb_cost"]) && isset($this->gv_memb_cost)) 
      {
          $_SESSION['gv_memb_cost'] = $this->gv_memb_cost;
      }
      if (isset($_GET["gv_cost_adtl_buyer"]) && isset($this->gv_cost_adtl_buyer)) 
      {
          $_SESSION['gv_cost_adtl_buyer'] = $this->gv_cost_adtl_buyer;
      }
      if (isset($_GET["gv_descript"]) && isset($this->gv_descript)) 
      {
          $_SESSION['gv_descript'] = $this->gv_descript;
      }
      if (isset($this->Refresh_aba_menu)) {
          $_SESSION['sc_session'][$script_case_init]['form_clients_staff']['Refresh_aba_menu'] = $this->Refresh_aba_menu;
      }
      if (isset($this->nmgp_opcao) && $this->nmgp_opcao == "reload_novo") {
          $_POST['nmgp_opcao'] = "novo";
          $this->nmgp_opcao    = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_clients_staff']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_clients_staff']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_clients_staff']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_clients_staff']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_clients_staff']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
          $todo  = explode("?@?", $todox);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             if (1 < sizeof($cadapar))
             {
                if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                {
                    $cadapar[0] = substr($cadapar[0], 11);
                    $cadapar[1] = $_SESSION[$cadapar[1]];
                }
                 if (isset($this->sc_conv_var[$cadapar[0]]))
                 {
                     $cadapar[0] = $this->sc_conv_var[$cadapar[0]];
                 }
                 elseif (isset($this->sc_conv_var[strtolower($cadapar[0])]))
                 {
                     $cadapar[0] = $this->sc_conv_var[strtolower($cadapar[0])];
                 }
                 nm_limpa_str_form_clients_staff($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->gv_contact_pfm)) 
          {
              $_SESSION['gv_contact_pfm'] = $this->gv_contact_pfm;
          }
          if (isset($this->gv_bus_cat)) 
          {
              $_SESSION['gv_bus_cat'] = $this->gv_bus_cat;
          }
          if (isset($this->usr_login)) 
          {
              $_SESSION['usr_login'] = $this->usr_login;
          }
          if (isset($this->gv_members_ct)) 
          {
              $_SESSION['gv_members_ct'] = $this->gv_members_ct;
          }
          if (isset($this->gv_cust_id)) 
          {
              $_SESSION['gv_cust_id'] = $this->gv_cust_id;
          }
          if (isset($this->gv_strp_id)) 
          {
              $_SESSION['gv_strp_id'] = $this->gv_strp_id;
          }
          if (isset($this->gv_membership_price)) 
          {
              $_SESSION['gv_membership_price'] = $this->gv_membership_price;
          }
          if (isset($this->gv_from_grid)) 
          {
              $_SESSION['gv_from_grid'] = $this->gv_from_grid;
          }
          if (isset($this->gv_last_memb_status_id)) 
          {
              $_SESSION['gv_last_memb_status_id'] = $this->gv_last_memb_status_id;
          }
          if (isset($this->gv_memb_cost)) 
          {
              $_SESSION['gv_memb_cost'] = $this->gv_memb_cost;
          }
          if (isset($this->gv_cost_adtl_buyer)) 
          {
              $_SESSION['gv_cost_adtl_buyer'] = $this->gv_cost_adtl_buyer;
          }
          if (isset($this->gv_descript)) 
          {
              $_SESSION['gv_descript'] = $this->gv_descript;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_clients_staff']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_clients_staff']['total']);
          }
          if (!isset($_SESSION['sc_session'][$script_case_init]['form_clients_staff']['total']))
          {
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_clients_staff']['form_members_staff_script_case_init'] ]['form_members_staff']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_clients_staff']['form_members_staff_script_case_init'] ]['form_members_staff']['total']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_clients_staff']['form_client_pmts_script_case_init'] ]['form_client_pmts']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_clients_staff']['form_client_pmts_script_case_init'] ]['form_client_pmts']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_clients_staff']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_clients_staff']['sc_redir_insert'] = $this->sc_redir_insert;
              unset($_SESSION['sc_session'][$script_case_init]['form_clients_staff']['opc_ant']);
          }
          if (isset($this->gv_contact_pfm)) 
          {
              $_SESSION['gv_contact_pfm'] = $this->gv_contact_pfm;
          }
          if (isset($this->gv_bus_cat)) 
          {
              $_SESSION['gv_bus_cat'] = $this->gv_bus_cat;
          }
          if (isset($this->usr_login)) 
          {
              $_SESSION['usr_login'] = $this->usr_login;
          }
          if (isset($this->gv_members_ct)) 
          {
              $_SESSION['gv_members_ct'] = $this->gv_members_ct;
          }
          if (isset($this->gv_cust_id)) 
          {
              $_SESSION['gv_cust_id'] = $this->gv_cust_id;
          }
          if (isset($this->gv_strp_id)) 
          {
              $_SESSION['gv_strp_id'] = $this->gv_strp_id;
          }
          if (isset($this->gv_membership_price)) 
          {
              $_SESSION['gv_membership_price'] = $this->gv_membership_price;
          }
          if (isset($this->gv_from_grid)) 
          {
              $_SESSION['gv_from_grid'] = $this->gv_from_grid;
          }
          if (isset($this->gv_last_memb_status_id)) 
          {
              $_SESSION['gv_last_memb_status_id'] = $this->gv_last_memb_status_id;
          }
          if (isset($this->gv_memb_cost)) 
          {
              $_SESSION['gv_memb_cost'] = $this->gv_memb_cost;
          }
          if (isset($this->gv_cost_adtl_buyer)) 
          {
              $_SESSION['gv_cost_adtl_buyer'] = $this->gv_cost_adtl_buyer;
          }
          if (isset($this->gv_descript)) 
          {
              $_SESSION['gv_descript'] = $this->gv_descript;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_clients_staff']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_clients_staff']['parms']);
              $todo  = explode("?@?", $todox);
              $ix = 0;
              while (!empty($todo[$ix]))
              {
                 $cadapar = explode("?#?", $todo[$ix]);
                 if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                 {
                     $cadapar[0] = substr($cadapar[0], 11);
                     $cadapar[1] = $_SESSION[$cadapar[1]];
                 }
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['form_clients_staff']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_clients_staff']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_clients_staff']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_clients_staff']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_clients_staff']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_clients_staff']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_clients_staff']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_clients_staff']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_clients_staff_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("en_us");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['initialize'];
          $this->Db = $this->Ini->Db; 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['initialize']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['initialize'])
          {
              $_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'on';
  ?>
<style>
    .scFormDataFontOdd.css_est_memb_cost_line,
	.scFormDataFontOdd.css_rules_line {
        padding: 0px 25px 10px 25px !important;
    }
	.scFormDataOdd.css_applicant_signature_line {
        padding: 40px 25px 10px 25px !important;
    }
</style>
<?php
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'off';
          }
          $this->Ini->init2();
      } 
      else 
      { 
         $this->nm_data = new nm_data("en_us");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_clients_staff']['upload_field_info'] = array();

      $_SESSION['sc_session'][$script_case_init]['form_clients_staff']['upload_field_info']['main_contact_img_id'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_clients_staff',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/\.(jpg|jpeg|png|tiff|gif|bmp|pdf)$/i',
          'upload_max_size'  => null,
          'upload_file_height' => '',
          'upload_file_width'  => '',
          'upload_file_aspect' => '',
          'upload_file_type'   => 'A',
      );

      $_SESSION['sc_session'][$script_case_init]['form_clients_staff']['upload_field_info']['doc_sec_of_state'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_clients_staff',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/.+$/i',
          'upload_max_size'  => null,
          'upload_file_height' => '0',
          'upload_file_width'  => '0',
          'upload_file_aspect' => 'S',
          'upload_file_type'   => 'I',
      );

      $_SESSION['sc_session'][$script_case_init]['form_clients_staff']['upload_field_info']['doc_city_bus_lic'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_clients_staff',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/.+$/i',
          'upload_max_size'  => null,
          'upload_file_height' => '0',
          'upload_file_width'  => '0',
          'upload_file_aspect' => 'S',
          'upload_file_type'   => 'I',
      );

      $_SESSION['sc_session'][$script_case_init]['form_clients_staff']['upload_field_info']['doc_agric_lic'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_clients_staff',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/.+$/i',
          'upload_max_size'  => null,
          'upload_file_height' => '0',
          'upload_file_width'  => '0',
          'upload_file_aspect' => 'S',
          'upload_file_type'   => 'I',
      );

      $_SESSION['sc_session'][$script_case_init]['form_clients_staff']['upload_field_info']['doc_last_year_tax'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_clients_staff',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/.+$/i',
          'upload_max_size'  => null,
          'upload_file_height' => '0',
          'upload_file_width'  => '0',
          'upload_file_aspect' => 'S',
          'upload_file_type'   => 'I',
      );

      $_SESSION['sc_session'][$script_case_init]['form_clients_staff']['upload_field_info']['main_contact_img_id_prev'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_clients_staff',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/.+$/i',
          'upload_max_size'  => null,
          'upload_file_height' => '0',
          'upload_file_width'  => '0',
          'upload_file_aspect' => 'S',
          'upload_file_type'   => 'I',
      );

      $_SESSION['sc_session'][$script_case_init]['form_clients_staff']['upload_field_info']['doc_file'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_clients_staff',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/\.(pdf|doc|docx|odt|ods|odp|jpg|jpeg|gif|tiff|png|xls|xlsx|svg|bmp)$/i',
          'upload_max_size'  => null,
          'upload_file_height' => '',
          'upload_file_width'  => '',
          'upload_file_aspect' => '',
          'upload_file_type'   => 'A',
      );

      $_SESSION['sc_session'][$script_case_init]['form_clients_staff']['upload_field_info']['applicant_signature'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_clients_staff',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/.+$/i',
          'upload_max_size'  => null,
          'upload_file_height' => '0',
          'upload_file_width'  => '0',
          'upload_file_aspect' => 'S',
          'upload_file_type'   => 'I',
      );

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_clients_staff']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_clients_staff'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_clients_staff']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_clients_staff']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_clients_staff') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_clients_staff']['label'] = "PFM - Buyers Pass App";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_clients_staff")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      if (!function_exists("nmButtonOutput"))
      {
          include_once($this->Ini->path_lib_php . "nm_gp_config_btn.php");
      }
      include("../_lib/css/" . $this->Ini->str_schema_all . "_form.php");
      $this->Ini->Str_btn_form = (isset($_SESSION['scriptcase']['str_button_all'])) ? $_SESSION['scriptcase']['str_button_all'] : "scriptcase9_SweetBlue";
      $_SESSION['scriptcase']['str_button_all'] = $this->Ini->Str_btn_form;
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
      $_SESSION['scriptcase']['css_form_help'] = '../_lib/css/' . $this->Ini->str_schema_all . "_form.css";
      $_SESSION['scriptcase']['css_form_help_dir'] = '../_lib/css/' . $this->Ini->str_schema_all . "_form" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
      $this->Db = $this->Ini->Db; 
      $this->Ini->str_google_fonts = isset($str_google_fonts)?$str_google_fonts:'';
      $this->Ini->Img_sep_form    = "/" . trim($str_toolbar_separator);
      $this->Ini->Color_bg_ajax   = !isset($str_ajax_bg)         || "" == trim($str_ajax_bg)         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax   = !isset($str_ajax_border_c)   || "" == trim($str_ajax_border_c)   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax   = !isset($str_ajax_border_s)   || "" == trim($str_ajax_border_s)   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax   = !isset($str_ajax_border_w)   || "" == trim($str_ajax_border_w)   ? ""     : $str_ajax_border_w;
      $this->Ini->Block_img_exp   = !isset($str_block_exp)       || "" == trim($str_block_exp)       ? ""     : $str_block_exp;
      $this->Ini->Block_img_col   = !isset($str_block_col)       || "" == trim($str_block_col)       ? ""     : $str_block_col;
      $this->Ini->Msg_ico_title   = !isset($str_msg_ico_title)   || "" == trim($str_msg_ico_title)   ? ""     : $str_msg_ico_title;
      $this->Ini->Msg_ico_body    = !isset($str_msg_ico_body)    || "" == trim($str_msg_ico_body)    ? ""     : $str_msg_ico_body;
      $this->Ini->Err_ico_title   = !isset($str_err_ico_title)   || "" == trim($str_err_ico_title)   ? ""     : $str_err_ico_title;
      $this->Ini->Err_ico_body    = !isset($str_err_ico_body)    || "" == trim($str_err_ico_body)    ? ""     : $str_err_ico_body;
      $this->Ini->Cal_ico_back    = !isset($str_cal_ico_back)    || "" == trim($str_cal_ico_back)    ? ""     : $str_cal_ico_back;
      $this->Ini->Cal_ico_for     = !isset($str_cal_ico_for)     || "" == trim($str_cal_ico_for)     ? ""     : $str_cal_ico_for;
      $this->Ini->Cal_ico_close   = !isset($str_cal_ico_close)   || "" == trim($str_cal_ico_close)   ? ""     : $str_cal_ico_close;
      $this->Ini->Tab_space       = !isset($str_tab_space)       || "" == trim($str_tab_space)       ? ""     : $str_tab_space;
      $this->Ini->Bubble_tail     = !isset($str_bubble_tail)     || "" == trim($str_bubble_tail)     ? ""     : $str_bubble_tail;
      $this->Ini->Label_sort_pos  = !isset($str_label_sort_pos)  || "" == trim($str_label_sort_pos)  ? ""     : $str_label_sort_pos;
      $this->Ini->Label_sort      = !isset($str_label_sort)      || "" == trim($str_label_sort)      ? ""     : $str_label_sort;
      $this->Ini->Label_sort_asc  = !isset($str_label_sort_asc)  || "" == trim($str_label_sort_asc)  ? ""     : $str_label_sort_asc;
      $this->Ini->Label_sort_desc = !isset($str_label_sort_desc) || "" == trim($str_label_sort_desc) ? ""     : $str_label_sort_desc;
      $this->Ini->Img_status_ok       = !isset($str_img_status_ok)  || "" == trim($str_img_status_ok)   ? ""     : $str_img_status_ok;
      $this->Ini->Img_status_err      = !isset($str_img_status_err) || "" == trim($str_img_status_err)  ? ""     : $str_img_status_err;
      $this->Ini->Css_status          = "scFormInputError";
      $this->Ini->Css_status_pwd_box  = "scFormInputErrorPwdBox";
      $this->Ini->Css_status_pwd_text = "scFormInputErrorPwdText";
      $this->Ini->Error_icon_span      = !isset($str_error_icon_span)  || "" == trim($str_error_icon_span)  ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = !isset($img_qs_search)        || "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = !isset($img_qs_clean)         || "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = !isset($str_qs_image_padding) || "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);
      $this->Ini->form_table_width     = isset($str_form_table_width) && '' != trim($str_form_table_width) ? $str_form_table_width : '';
      $this->Ini->Bubble_tail          = trim($str_bubble_tail);

        $this->classes_100perc_fields['table'] = '';
        $this->classes_100perc_fields['input'] = '';
        $this->classes_100perc_fields['span_input'] = '';
        $this->classes_100perc_fields['span_select'] = '';
        $this->classes_100perc_fields['style_category'] = '';
        $this->classes_100perc_fields['keep_field_size'] = true;


      $this->arr_buttons['btn_exit_app']['hint']             = "";
      $this->arr_buttons['btn_exit_app']['type']             = "button";
      $this->arr_buttons['btn_exit_app']['value']            = "Exit";
      $this->arr_buttons['btn_exit_app']['display']          = "text_fontawesomeicon";
      $this->arr_buttons['btn_exit_app']['display_position'] = "text_right";
      $this->arr_buttons['btn_exit_app']['style']            = "default";
      $this->arr_buttons['btn_exit_app']['image']            = "";
      $this->arr_buttons['btn_exit_app']['has_fa']            = "true";
      $this->arr_buttons['btn_exit_app']['fontawesomeicon']            = "fas fa-sign-out-alt";

      $this->arr_buttons['pdf_download']['hint']             = "Download PDF Application";
      $this->arr_buttons['pdf_download']['type']             = "image";
      $this->arr_buttons['pdf_download']['value']            = "PDF Application";
      $this->arr_buttons['pdf_download']['display']          = "only_img";
      $this->arr_buttons['pdf_download']['display_position'] = "text_right";
      $this->arr_buttons['pdf_download']['style']            = "";
      $this->arr_buttons['pdf_download']['image']            = "scriptcase__NM__ico__NM__nm_icon_pdf.gif";
      $this->arr_buttons['pdf_download']['has_fa']            = "true";
      $this->arr_buttons['pdf_download']['fontawesomeicon']            = "fas fa-arrow-circle-down";

      $this->arr_buttons['btn_back_reqs']['hint']             = "";
      $this->arr_buttons['btn_back_reqs']['type']             = "button";
      $this->arr_buttons['btn_back_reqs']['value']            = "Back";
      $this->arr_buttons['btn_back_reqs']['display']          = "text_fontawesomeicon";
      $this->arr_buttons['btn_back_reqs']['display_position'] = "text_right";
      $this->arr_buttons['btn_back_reqs']['style']            = "default";
      $this->arr_buttons['btn_back_reqs']['image']            = "";
      $this->arr_buttons['btn_back_reqs']['has_fa']            = "true";
      $this->arr_buttons['btn_back_reqs']['fontawesomeicon']            = "fas fa-arrow-left";

      $this->arr_buttons['btn_back_renewals']['hint']             = "";
      $this->arr_buttons['btn_back_renewals']['type']             = "button";
      $this->arr_buttons['btn_back_renewals']['value']            = "Back";
      $this->arr_buttons['btn_back_renewals']['display']          = "text_fontawesomeicon";
      $this->arr_buttons['btn_back_renewals']['display_position'] = "text_right";
      $this->arr_buttons['btn_back_renewals']['style']            = "default";
      $this->arr_buttons['btn_back_renewals']['image']            = "";
      $this->arr_buttons['btn_back_renewals']['has_fa']            = "true";
      $this->arr_buttons['btn_back_renewals']['fontawesomeicon']            = "fas fa-arrow-left";

      $this->arr_buttons['email_client_if_active']['hint']             = "Approve & Email the customer to inform them that their membership is Active";
      $this->arr_buttons['email_client_if_active']['type']             = "button";
      $this->arr_buttons['email_client_if_active']['value']            = "Approve";
      $this->arr_buttons['email_client_if_active']['display']          = "text_fontawesomeicon";
      $this->arr_buttons['email_client_if_active']['display_position'] = "text_right";
      $this->arr_buttons['email_client_if_active']['style']            = "ok";
      $this->arr_buttons['email_client_if_active']['image']            = "";
      $this->arr_buttons['email_client_if_active']['has_fa']            = "true";
      $this->arr_buttons['email_client_if_active']['fontawesomeicon']            = "fas fa-check-circle";

      $this->arr_buttons['back_clients']['hint']             = "";
      $this->arr_buttons['back_clients']['type']             = "button";
      $this->arr_buttons['back_clients']['value']            = "Back";
      $this->arr_buttons['back_clients']['display']          = "text_fontawesomeicon";
      $this->arr_buttons['back_clients']['display_position'] = "text_right";
      $this->arr_buttons['back_clients']['style']            = "default";
      $this->arr_buttons['back_clients']['image']            = "";
      $this->arr_buttons['back_clients']['has_fa']            = "true";
      $this->arr_buttons['back_clients']['fontawesomeicon']            = "fas fa-arrow-left";

      $this->arr_buttons['close_tab']['hint']             = "";
      $this->arr_buttons['close_tab']['type']             = "button";
      $this->arr_buttons['close_tab']['value']            = "Close";
      $this->arr_buttons['close_tab']['display']          = "text_fontawesomeicon";
      $this->arr_buttons['close_tab']['display_position'] = "text_right";
      $this->arr_buttons['close_tab']['style']            = "default";
      $this->arr_buttons['close_tab']['image']            = "";
      $this->arr_buttons['close_tab']['has_fa']            = "true";
      $this->arr_buttons['close_tab']['fontawesomeicon']            = "far fa-times-circle";

      $this->arr_buttons['btn_delete_backend']['hint']             = "Delete current recoord";
      $this->arr_buttons['btn_delete_backend']['type']             = "button";
      $this->arr_buttons['btn_delete_backend']['value']            = "Delete";
      $this->arr_buttons['btn_delete_backend']['display']          = "text_fontawesomeicon";
      $this->arr_buttons['btn_delete_backend']['display_position'] = "text_right";
      $this->arr_buttons['btn_delete_backend']['style']            = "danger";
      $this->arr_buttons['btn_delete_backend']['image']            = "";
      $this->arr_buttons['btn_delete_backend']['has_fa']            = "true";
      $this->arr_buttons['btn_delete_backend']['fontawesomeicon']            = "fas fa-eraser";

      $this->arr_buttons['coll_pmt_js']['hint']             = "Take Renewal Payment";
      $this->arr_buttons['coll_pmt_js']['type']             = "button";
      $this->arr_buttons['coll_pmt_js']['value']            = "Collect Membership Fee";
      $this->arr_buttons['coll_pmt_js']['display']          = "text_fontawesomeicon";
      $this->arr_buttons['coll_pmt_js']['display_position'] = "text_right";
      $this->arr_buttons['coll_pmt_js']['style']            = "paypal";
      $this->arr_buttons['coll_pmt_js']['image']            = "";
      $this->arr_buttons['coll_pmt_js']['has_fa']            = "true";
      $this->arr_buttons['coll_pmt_js']['fontawesomeicon']            = "far fa-credit-card";


      $_SESSION['scriptcase']['error_icon']['form_clients_staff']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_clients_staff'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_call'] : $this->Embutida_call;

      $this->form_3versions_single = false;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      if (isset($this->NM_ajax_info['param']['main_contact_img_id_ul_name']) && '' != $this->NM_ajax_info['param']['main_contact_img_id_ul_name'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['upload_field_ul_name'][$this->main_contact_img_id_ul_name]))
          {
              $this->NM_ajax_info['param']['main_contact_img_id_ul_name'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['upload_field_ul_name'][$this->main_contact_img_id_ul_name];
          }
          $this->main_contact_img_id = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['main_contact_img_id_ul_name'];
          $this->main_contact_img_id_scfile_name = substr($this->NM_ajax_info['param']['main_contact_img_id_ul_name'], 12);
          $this->main_contact_img_id_scfile_type = $this->NM_ajax_info['param']['main_contact_img_id_ul_type'];
          $this->main_contact_img_id_ul_name = $this->NM_ajax_info['param']['main_contact_img_id_ul_name'];
          $this->main_contact_img_id_ul_type = $this->NM_ajax_info['param']['main_contact_img_id_ul_type'];
      }
      elseif (isset($this->main_contact_img_id_ul_name) && '' != $this->main_contact_img_id_ul_name)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['upload_field_ul_name'][$this->main_contact_img_id_ul_name]))
          {
              $this->main_contact_img_id_ul_name = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['upload_field_ul_name'][$this->main_contact_img_id_ul_name];
          }
          $this->main_contact_img_id = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->main_contact_img_id_ul_name;
          $this->main_contact_img_id_scfile_name = substr($this->main_contact_img_id_ul_name, 12);
          $this->main_contact_img_id_scfile_type = $this->main_contact_img_id_ul_type;
      }

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_clients_staff']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_clients_staff']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_clients_staff']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_clients_staff']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_clients_staff']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_clients_staff']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "off";
      $this->nmgp_botoes['new']  = "off";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['insert'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "off";
      $this->nmgp_botoes['first'] = "off";
      $this->nmgp_botoes['back'] = "off";
      $this->nmgp_botoes['forward'] = "off";
      $this->nmgp_botoes['last'] = "off";
      $this->nmgp_botoes['summary'] = "off";
      $this->nmgp_botoes['navpage'] = "off";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "off";
      $this->nmgp_botoes['reload'] = "on";
      $this->nmgp_botoes['btn_exit_app'] = "on";
      $this->nmgp_botoes['pdf_download'] = "on";
      $this->nmgp_botoes['btn_back_reqs'] = "on";
      $this->nmgp_botoes['btn_back_renewals'] = "on";
      $this->nmgp_botoes['email_client_if_active'] = "on";
      $this->nmgp_botoes['back_clients'] = "on";
      $this->nmgp_botoes['close_tab'] = "on";
      $this->nmgp_botoes['btn_delete_backend'] = "on";
      $this->nmgp_botoes['coll_pmt_js'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_clients_staff']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_clients_staff']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_clients_staff']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_clients_staff']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_clients_staff'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_clients_staff'];

              $this->nmgp_botoes['update']     = $tmpDashboardButtons['form_update']    ? 'on' : 'off';
              $this->nmgp_botoes['new']        = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['insert']     = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['delete']     = $tmpDashboardButtons['form_delete']    ? 'on' : 'off';
              $this->nmgp_botoes['copy']       = $tmpDashboardButtons['form_copy']      ? 'on' : 'off';
              $this->nmgp_botoes['first']      = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['back']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['last']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['forward']    = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['navpage']    = $tmpDashboardButtons['form_navpage']   ? 'on' : 'off';
              $this->nmgp_botoes['goto']       = $tmpDashboardButtons['form_goto']      ? 'on' : 'off';
              $this->nmgp_botoes['qtline']     = $tmpDashboardButtons['form_lineqty']   ? 'on' : 'off';
              $this->nmgp_botoes['summary']    = $tmpDashboardButtons['form_summary']   ? 'on' : 'off';
              $this->nmgp_botoes['qsearch']    = $tmpDashboardButtons['form_qsearch']   ? 'on' : 'off';
              $this->nmgp_botoes['dynsearch']  = $tmpDashboardButtons['form_dynsearch'] ? 'on' : 'off';
              $this->nmgp_botoes['reload']     = $tmpDashboardButtons['form_reload']    ? 'on' : 'off';
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_clients_staff']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_clients_staff']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_clients_staff']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_clients_staff']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_clients_staff']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_clients_staff']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_clients_staff']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_clients_staff']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_clients_staff']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_clients_staff']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_clients_staff']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_clients_staff']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_clients_staff']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_clients_staff']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_clients_staff']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_clients_staff']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_clients_staff']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_clients_staff']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_clients_staff']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dados_form'];
          if (!isset($this->appn_id)){$this->appn_id = $this->nmgp_dados_form['appn_id'];} 
          if (!isset($this->ofa_contact)){$this->ofa_contact = $this->nmgp_dados_form['ofa_contact'];} 
          if (!isset($this->street_address)){$this->street_address = $this->nmgp_dados_form['street_address'];} 
          if (!isset($this->phone_number)){$this->phone_number = $this->nmgp_dados_form['phone_number'];} 
          if (!isset($this->home_phone)){$this->home_phone = $this->nmgp_dados_form['home_phone'];} 
          if (!isset($this->fax_number)){$this->fax_number = $this->nmgp_dados_form['fax_number'];} 
          if (!isset($this->email)){$this->email = $this->nmgp_dados_form['email'];} 
          if (!isset($this->business_type)){$this->business_type = $this->nmgp_dados_form['business_type'];} 
          if (!isset($this->fresh_cut_allowed)){$this->fresh_cut_allowed = $this->nmgp_dados_form['fresh_cut_allowed'];} 
          if (!isset($this->business_license)){$this->business_license = $this->nmgp_dados_form['business_license'];} 
          if (!isset($this->nursery_license)){$this->nursery_license = $this->nmgp_dados_form['nursery_license'];} 
          if (!isset($this->federal_tax_id)){$this->federal_tax_id = $this->nmgp_dados_form['federal_tax_id'];} 
          if (!isset($this->temporary_pass)){$this->temporary_pass = $this->nmgp_dados_form['temporary_pass'];} 
          if (!isset($this->ofa_member)){$this->ofa_member = $this->nmgp_dados_form['ofa_member'];} 
          if (!isset($this->starting_date)){$this->starting_date = $this->nmgp_dados_form['starting_date'];} 
          if (!isset($this->expiration_date)){$this->expiration_date = $this->nmgp_dados_form['expiration_date'];} 
          if (!isset($this->canceled)){$this->canceled = $this->nmgp_dados_form['canceled'];} 
          if (!isset($this->cancel_date)){$this->cancel_date = $this->nmgp_dados_form['cancel_date'];} 
          if (!isset($this->canceled_by)){$this->canceled_by = $this->nmgp_dados_form['canceled_by'];} 
          if (!isset($this->reason_canceled)){$this->reason_canceled = $this->nmgp_dados_form['reason_canceled'];} 
          if (!isset($this->retire_date)){$this->retire_date = $this->nmgp_dados_form['retire_date'];} 
          if (!isset($this->verified_receipts)){$this->verified_receipts = $this->nmgp_dados_form['verified_receipts'];} 
          if (!isset($this->date_last_updated)){$this->date_last_updated = $this->nmgp_dados_form['date_last_updated'];} 
          if (!isset($this->restricted)){$this->restricted = $this->nmgp_dados_form['restricted'];} 
          if (!isset($this->committee_approval_required)){$this->committee_approval_required = $this->nmgp_dados_form['committee_approval_required'];} 
          if (!isset($this->type_company)){$this->type_company = $this->nmgp_dados_form['type_company'];} 
          if (!isset($this->archive)){$this->archive = $this->nmgp_dados_form['archive'];} 
          if (!isset($this->archive_date)){$this->archive_date = $this->nmgp_dados_form['archive_date'];} 
          if (!isset($this->store_front_address)){$this->store_front_address = $this->nmgp_dados_form['store_front_address'];} 
          if (!isset($this->store_front_city)){$this->store_front_city = $this->nmgp_dados_form['store_front_city'];} 
          if (!isset($this->store_front_zip)){$this->store_front_zip = $this->nmgp_dados_form['store_front_zip'];} 
          if (!isset($this->home_base_address)){$this->home_base_address = $this->nmgp_dados_form['home_base_address'];} 
          if (!isset($this->home_base_city)){$this->home_base_city = $this->nmgp_dados_form['home_base_city'];} 
          if (!isset($this->home_base_zip)){$this->home_base_zip = $this->nmgp_dados_form['home_base_zip'];} 
          if (!isset($this->store_front_state)){$this->store_front_state = $this->nmgp_dados_form['store_front_state'];} 
          if (!isset($this->home_base_state)){$this->home_base_state = $this->nmgp_dados_form['home_base_state'];} 
          if (!isset($this->record_created)){$this->record_created = $this->nmgp_dados_form['record_created'];} 
          if (!isset($this->appn_date)){$this->appn_date = $this->nmgp_dados_form['appn_date'];} 
          if (!isset($this->appn_note)){$this->appn_note = $this->nmgp_dados_form['appn_note'];} 
          if (!isset($this->doc_sec_of_state)){$this->doc_sec_of_state = $this->nmgp_dados_form['doc_sec_of_state'];} 
          if (!isset($this->doc_city_bus_lic)){$this->doc_city_bus_lic = $this->nmgp_dados_form['doc_city_bus_lic'];} 
          if (!isset($this->doc_agric_lic)){$this->doc_agric_lic = $this->nmgp_dados_form['doc_agric_lic'];} 
          if (!isset($this->doc_last_year_tax)){$this->doc_last_year_tax = $this->nmgp_dados_form['doc_last_year_tax'];} 
          if (!isset($this->qb_id)){$this->qb_id = $this->nmgp_dados_form['qb_id'];} 
          if (!isset($this->main_contact_img_file)){$this->main_contact_img_file = $this->nmgp_dados_form['main_contact_img_file'];} 
          if (!isset($this->main_contact_img_size)){$this->main_contact_img_size = $this->nmgp_dados_form['main_contact_img_size'];} 
          if (!isset($this->main_contact_img_id_prev)){$this->main_contact_img_id_prev = $this->nmgp_dados_form['main_contact_img_id_prev'];} 
          if (!isset($this->memb_qty)){$this->memb_qty = $this->nmgp_dados_form['memb_qty'];} 
          if (!isset($this->doc_type)){$this->doc_type = $this->nmgp_dados_form['doc_type'];} 
          if (!isset($this->doc_file)){$this->doc_file = $this->nmgp_dados_form['doc_file'];} 
          if (!isset($this->doc_filename)){$this->doc_filename = $this->nmgp_dados_form['doc_filename'];} 
          if (!isset($this->doc_filesize)){$this->doc_filesize = $this->nmgp_dados_form['doc_filesize'];} 
          if (!isset($this->applicant_name)){$this->applicant_name = $this->nmgp_dados_form['applicant_name'];} 
          if (!isset($this->applicant_signature)){$this->applicant_signature = $this->nmgp_dados_form['applicant_signature'];} 
          if (!isset($this->applicant_title)){$this->applicant_title = $this->nmgp_dados_form['applicant_title'];} 
          if (!isset($this->addtl_memb_mail)){$this->addtl_memb_mail = $this->nmgp_dados_form['addtl_memb_mail'];} 
          if (!isset($this->adtl_memb_name)){$this->adtl_memb_name = $this->nmgp_dados_form['adtl_memb_name'];} 
          if (!isset($this->adtl_memb_note)){$this->adtl_memb_note = $this->nmgp_dados_form['adtl_memb_note'];} 
          if (!isset($this->adtl_memb_phone)){$this->adtl_memb_phone = $this->nmgp_dados_form['adtl_memb_phone'];} 
          if (!isset($this->dummy01)){$this->dummy01 = $this->nmgp_dados_form['dummy01'];} 
          if (!isset($this->dummy03)){$this->dummy03 = $this->nmgp_dados_form['dummy03'];} 
          if (!isset($this->dummy04)){$this->dummy04 = $this->nmgp_dados_form['dummy04'];} 
          if (!isset($this->dummy05)){$this->dummy05 = $this->nmgp_dados_form['dummy05'];} 
          if (!isset($this->dummy06)){$this->dummy06 = $this->nmgp_dados_form['dummy06'];} 
          if (!isset($this->dummy09)){$this->dummy09 = $this->nmgp_dados_form['dummy09'];} 
          if (!isset($this->dummy10)){$this->dummy10 = $this->nmgp_dados_form['dummy10'];} 
          if (!isset($this->dummy11)){$this->dummy11 = $this->nmgp_dados_form['dummy11'];} 
          if (!isset($this->dummy12)){$this->dummy12 = $this->nmgp_dados_form['dummy12'];} 
          if (!isset($this->dummy13)){$this->dummy13 = $this->nmgp_dados_form['dummy13'];} 
          if (!isset($this->est_memb_cost)){$this->est_memb_cost = $this->nmgp_dados_form['est_memb_cost'];} 
          if (!isset($this->main_contact_title_lbl)){$this->main_contact_title_lbl = $this->nmgp_dados_form['main_contact_title_lbl'];} 
          if (!isset($this->memb_01)){$this->memb_01 = $this->nmgp_dados_form['memb_01'];} 
          if (!isset($this->memb_02)){$this->memb_02 = $this->nmgp_dados_form['memb_02'];} 
          if (!isset($this->memb_03)){$this->memb_03 = $this->nmgp_dados_form['memb_03'];} 
          if (!isset($this->memb_04)){$this->memb_04 = $this->nmgp_dados_form['memb_04'];} 
          if (!isset($this->memb_05)){$this->memb_05 = $this->nmgp_dados_form['memb_05'];} 
          if (!isset($this->memb_06)){$this->memb_06 = $this->nmgp_dados_form['memb_06'];} 
          if (!isset($this->memb_07)){$this->memb_07 = $this->nmgp_dados_form['memb_07'];} 
          if (!isset($this->memb_08)){$this->memb_08 = $this->nmgp_dados_form['memb_08'];} 
          if (!isset($this->memb_09)){$this->memb_09 = $this->nmgp_dados_form['memb_09'];} 
          if (!isset($this->memb_10)){$this->memb_10 = $this->nmgp_dados_form['memb_10'];} 
          if (!isset($this->memb_11)){$this->memb_11 = $this->nmgp_dados_form['memb_11'];} 
          if (!isset($this->memb_12)){$this->memb_12 = $this->nmgp_dados_form['memb_12'];} 
          if (!isset($this->memb_13)){$this->memb_13 = $this->nmgp_dados_form['memb_13'];} 
          if (!isset($this->memb_email)){$this->memb_email = $this->nmgp_dados_form['memb_email'];} 
          if (!isset($this->memb_levels)){$this->memb_levels = $this->nmgp_dados_form['memb_levels'];} 
          if (!isset($this->memb_name)){$this->memb_name = $this->nmgp_dados_form['memb_name'];} 
          if (!isset($this->memb_note)){$this->memb_note = $this->nmgp_dados_form['memb_note'];} 
          if (!isset($this->memb_phone)){$this->memb_phone = $this->nmgp_dados_form['memb_phone'];} 
          if (!isset($this->paid)){$this->paid = $this->nmgp_dados_form['paid'];} 
          if (!isset($this->pay)){$this->pay = $this->nmgp_dados_form['pay'];} 
          if (!isset($this->read_at_sign)){$this->read_at_sign = $this->nmgp_dados_form['read_at_sign'];} 
          if (!isset($this->rules)){$this->rules = $this->nmgp_dados_form['rules'];} 
          if (!isset($this->rules_warn)){$this->rules_warn = $this->nmgp_dados_form['rules_warn'];} 
          if (!isset($this->submitted)){$this->submitted = $this->nmgp_dados_form['submitted'];} 
          if (!isset($this->transaction)){$this->transaction = $this->nmgp_dados_form['transaction'];} 
          if (!isset($this->xlsx_sample)){$this->xlsx_sample = $this->nmgp_dados_form['xlsx_sample'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_clients_staff", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                      $this->Ini->Nm_lang['lang_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_mnth_june'],
                                      $this->Ini->Nm_lang['lang_mnth_july'],
                                      $this->Ini->Nm_lang['lang_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                      $this->Ini->Nm_lang['lang_days_sund'],
                                      $this->Ini->Nm_lang['lang_days_mond'],
                                      $this->Ini->Nm_lang['lang_days_tued'],
                                      $this->Ini->Nm_lang['lang_days_wend'],
                                      $this->Ini->Nm_lang['lang_days_thud'],
                                      $this->Ini->Nm_lang['lang_days_frid'],
                                      $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                      $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                      $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                      $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                      $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                      $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                      $this->Ini->Nm_lang['lang_shrt_days_satd']);
      nm_gc($this->Ini->path_libs);
      $this->Ini->Gd_missing  = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $this->Ini->Gd_missing = false;
         }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 
      if (isset($_GET['nm_cal_display']))
      {
          if ($this->Embutida_proc)
          { 
              include_once($this->Ini->path_embutida . 'form_clients_staff/form_clients_staff_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_clients_staff_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_clients_staff_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_clients_staff_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('form:' == substr($str_link_webhelp, 0, 5))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'form_clients_staff/form_clients_staff_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_clients_staff_erro.class.php"); 
      }
      $this->Erro      = new form_clients_staff_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ((!isset($nm_opc_lookup) || $nm_opc_lookup != "lookup") && (!isset($nm_opc_php) || $nm_opc_php != "formphp"))
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['opcao']))
         { 
             if ($this->client_id != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_clients_staff']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_clients_staff']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_clients_staff']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['opc_ant'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['opc_ant'] : "";
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['btn_exit_app'] = "on";
          $this->nmgp_botoes['pdf_download'] = "on";
          $this->nmgp_botoes['btn_back_reqs'] = "off";
          $this->nmgp_botoes['btn_back_renewals'] = "on";
          $this->nmgp_botoes['email_client_if_active'] = "off";
          $this->nmgp_botoes['back_clients'] = "on";
          $this->nmgp_botoes['close_tab'] = "off";
          $this->nmgp_botoes['btn_delete_backend'] = "off";
          $this->nmgp_botoes['coll_pmt_js'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['btn_exit_app'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['botoes']['btn_exit_app'];
          $this->nmgp_botoes['pdf_download'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['botoes']['pdf_download'];
          $this->nmgp_botoes['btn_back_reqs'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['botoes']['btn_back_reqs'];
          $this->nmgp_botoes['btn_back_renewals'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['botoes']['btn_back_renewals'];
          $this->nmgp_botoes['email_client_if_active'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['botoes']['email_client_if_active'];
          $this->nmgp_botoes['back_clients'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['botoes']['back_clients'];
          $this->nmgp_botoes['close_tab'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['botoes']['close_tab'];
          $this->nmgp_botoes['btn_delete_backend'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['botoes']['btn_delete_backend'];
          $this->nmgp_botoes['coll_pmt_js'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['botoes']['coll_pmt_js'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      if ($this->nmgp_opcao == "excluir")
      {
          $GLOBALS['script_case_init'] = $this->Ini->sc_page;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_members_staff_script_case_init'] ]['form_members_staff']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_members_staff_script_case_init'] ]['form_members_staff']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_members_staff_script_case_init'] ]['form_members_staff']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_members_staff_script_case_init'] ]['form_members_staff']['total']);
          $detailAppObject = "form_members_staff_apl";
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_members_staff') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_members_staff') . "/form_members_staff_apl.php");
          $this->form_members_staff = new $detailAppObject;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_client_pmts_script_case_init'] ]['form_client_pmts']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_client_pmts_script_case_init'] ]['form_client_pmts']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_client_pmts_script_case_init'] ]['form_client_pmts']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_client_pmts_script_case_init'] ]['form_client_pmts']['total']);
          $detailAppObject = "form_client_pmts_apl";
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_client_pmts') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_client_pmts') . "/form_client_pmts_apl.php");
          $this->form_client_pmts = new $detailAppObject;
      }
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
      if (!isset($this->NM_ajax_flag) || ('validate_' != substr($this->NM_ajax_opcao, 0, 9) && 'add_new_line' != $this->NM_ajax_opcao && 'autocomp_' != substr($this->NM_ajax_opcao, 0, 9)))
      {
      $_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'on';
if (!isset($this->sc_temp_gv_from_grid)) {$this->sc_temp_gv_from_grid = (isset($_SESSION['gv_from_grid'])) ? $_SESSION['gv_from_grid'] : "";}
  switch ( $this->sc_temp_gv_from_grid ) {
		
	case "renewals":	
		$this->NM_ajax_info['buttonDisplay']['btn_back_renewals'] = $this->nmgp_botoes["btn_back_renewals"] = 'off';;
		$this->NM_ajax_info['buttonDisplay']['btn_back_reqs'] = $this->nmgp_botoes["btn_back_reqs"] = 'off';;
		$this->NM_ajax_info['buttonDisplay']['back_clients'] = $this->nmgp_botoes["back_clients"] = 'off';;
		$this->sc_btn_label('email_client_if_active','Approve Renewal');
		break;
		
	case "requests":	
		$this->NM_ajax_info['buttonDisplay']['btn_back_reqs'] = $this->nmgp_botoes["btn_back_reqs"] = 'on';;
		$this->NM_ajax_info['buttonDisplay']['back_clients'] = $this->nmgp_botoes["back_clients"] = 'off';;
		$this->NM_ajax_info['buttonDisplay']['btn_back_renewals'] = $this->nmgp_botoes["btn_back_renewals"] = 'off';;
		$this->NM_ajax_info['buttonDisplay']['close_tab'] = $this->nmgp_botoes["close_tab"] = 'off';;
		$this->sc_btn_label('email_client_if_active','Approve Membership');
		break;
	
	case "clients":	
	case "members":	
		$this->NM_ajax_info['buttonDisplay']['back_clients'] = $this->nmgp_botoes["back_clients"] = 'on';;
		$this->NM_ajax_info['buttonDisplay']['btn_back_reqs'] = $this->nmgp_botoes["btn_back_reqs"] = 'off';;
		$this->NM_ajax_info['buttonDisplay']['btn_back_renewals'] = $this->nmgp_botoes["btn_back_renewals"] = 'off';;
		$this->NM_ajax_info['buttonDisplay']['close_tab'] = $this->nmgp_botoes["close_tab"] = 'off';;
}
if (isset($this->sc_temp_gv_from_grid)) { $_SESSION['gv_from_grid'] = $this->sc_temp_gv_from_grid;}
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'off'; 
      }
            if ('ajax_check_file' == $this->nmgp_opcao ){
                 ob_start(); 
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_POST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

            $out1_img_cache = $_SESSION['scriptcase']['form_clients_staff']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['form_clients_staff']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
            copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$orig_img);
            echo $orig_img . '_@@NM@@_';            copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            $sc_obj_img = new nm_trata_img($_SERVER['DOCUMENT_ROOT'].$out1_img_cache, true);

            if(!empty($img_width) && !empty($img_height)){
                $sc_obj_img->setWidth($img_width);
                $sc_obj_img->setHeight($img_height);
            }            $sc_obj_img->createImg($_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            echo $out1_img_cache;
               exit;
            }
      if (isset($this->client_id)) { $this->nm_limpa_alfa($this->client_id); }
      if (isset($this->membershipid)) { $this->nm_limpa_alfa($this->membershipid); }
      if (isset($this->memb_status_id)) { $this->nm_limpa_alfa($this->memb_status_id); }
      if (isset($this->co_name)) { $this->nm_limpa_alfa($this->co_name); }
      if (isset($this->mailing_address)) { $this->nm_limpa_alfa($this->mailing_address); }
      if (isset($this->city)) { $this->nm_limpa_alfa($this->city); }
      if (isset($this->state)) { $this->nm_limpa_alfa($this->state); }
      if (isset($this->zip_code)) { $this->nm_limpa_alfa($this->zip_code); }
      if (isset($this->pricing_level_id)) { $this->nm_limpa_alfa($this->pricing_level_id); }
      if (isset($this->acct_instagram)) { $this->nm_limpa_alfa($this->acct_instagram); }
      if (isset($this->acct_facebook)) { $this->nm_limpa_alfa($this->acct_facebook); }
      if (isset($this->website_url)) { $this->nm_limpa_alfa($this->website_url); }
      if (isset($this->bus_cat_id)) { $this->nm_limpa_alfa($this->bus_cat_id); }
      if (isset($this->bus_subcat_id)) { $this->nm_limpa_alfa($this->bus_subcat_id); }
      if (isset($this->bus_subcat_other)) { $this->nm_limpa_alfa($this->bus_subcat_other); }
      if (isset($this->main_contact_name)) { $this->nm_limpa_alfa($this->main_contact_name); }
      if (isset($this->main_contact_phone)) { $this->nm_limpa_alfa($this->main_contact_phone); }
      if (isset($this->main_contact_email)) { $this->nm_limpa_alfa($this->main_contact_email); }
      if (isset($this->main_contact_title)) { $this->nm_limpa_alfa($this->main_contact_title); }
      if (isset($this->client_pmts)) { $this->nm_limpa_alfa($this->client_pmts); }
      if (isset($this->docs)) { $this->nm_limpa_alfa($this->docs); }
      if (isset($this->memb_list)) { $this->nm_limpa_alfa($this->memb_list); }
      if (isset($this->notes)) { $this->nm_limpa_alfa($this->notes); }
      if ($nm_opc_form_php == "formphp")
      { 
          if ($nm_call_php == "pdf_download")
          { 
              $this->sc_btn_pdf_download();
          } 
          if ($nm_call_php == "email_client_if_active")
          { 
              $this->sc_btn_email_client_if_active();
          } 
          if ($nm_call_php == "btn_delete_backend")
          { 
              $this->sc_btn_btn_delete_backend();
          } 
          $this->NM_close_db(); 
          exit;
      } 
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->Field_no_validate = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Field_no_validate'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Field_no_validate'] : array();
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- membershipid
      $this->field_config['membershipid']               = array();
      $this->field_config['membershipid']['symbol_grp'] = '';
      $this->field_config['membershipid']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['membershipid']['symbol_dec'] = '';
      $this->field_config['membershipid']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['membershipid']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- client_id
      $this->field_config['client_id']               = array();
      $this->field_config['client_id']['symbol_grp'] = '';
      $this->field_config['client_id']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['client_id']['symbol_dec'] = '';
      $this->field_config['client_id']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['client_id']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- permanent_member_date
      $this->field_config['permanent_member_date']                 = array();
      $this->field_config['permanent_member_date']['date_format']  = "mm/dd/aaaa";
      $this->field_config['permanent_member_date']['date_sep']     = "-";
      $this->field_config['permanent_member_date']['date_display'] = "mm/dd/aaaa";
      $this->new_date_format('DT', 'permanent_member_date');
      //-- renewal_date
      $this->field_config['renewal_date']                 = array();
      $this->field_config['renewal_date']['date_format']  = "mm/dd/aaaa";
      $this->field_config['renewal_date']['date_sep']     = "-";
      $this->field_config['renewal_date']['date_display'] = "mm/dd/aaaa";
      $this->new_date_format('DT', 'renewal_date');
      //-- appn_id
      $this->field_config['appn_id']               = array();
      $this->field_config['appn_id']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['appn_id']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['appn_id']['symbol_dec'] = '';
      $this->field_config['appn_id']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['appn_id']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- starting_date
      $this->field_config['starting_date']                 = array();
      $this->field_config['starting_date']['date_format']  = "mm/dd/aaaa";
      $this->field_config['starting_date']['date_sep']     = "-";
      $this->field_config['starting_date']['date_display'] = "mm/dd/aaaa";
      $this->new_date_format('DT', 'starting_date');
      //-- expiration_date
      $this->field_config['expiration_date']                 = array();
      $this->field_config['expiration_date']['date_format']  = "mm/dd/aaaa";
      $this->field_config['expiration_date']['date_sep']     = "-";
      $this->field_config['expiration_date']['date_display'] = "mm/dd/aaaa";
      $this->new_date_format('DT', 'expiration_date');
      //-- cancel_date
      $this->field_config['cancel_date']                 = array();
      $this->field_config['cancel_date']['date_format']  = "mm/dd/aaaa";
      $this->field_config['cancel_date']['date_sep']     = "-";
      $this->field_config['cancel_date']['date_display'] = "mm/dd/aaaa";
      $this->new_date_format('DT', 'cancel_date');
      //-- retire_date
      $this->field_config['retire_date']                 = array();
      $this->field_config['retire_date']['date_format']  = "mm/dd/aaaa";
      $this->field_config['retire_date']['date_sep']     = "-";
      $this->field_config['retire_date']['date_display'] = "mm/dd/aaaa";
      $this->new_date_format('DT', 'retire_date');
      //-- date_last_updated
      $this->field_config['date_last_updated']                 = array();
      $this->field_config['date_last_updated']['date_format']  = "mm/dd/aaaa";
      $this->field_config['date_last_updated']['date_sep']     = "-";
      $this->field_config['date_last_updated']['date_display'] = "mm/dd/aaaa";
      $this->new_date_format('DT', 'date_last_updated');
      //-- archive_date
      $this->field_config['archive_date']                 = array();
      $this->field_config['archive_date']['date_format']  = "mm/dd/aaaa";
      $this->field_config['archive_date']['date_sep']     = "-";
      $this->field_config['archive_date']['date_display'] = "mm/dd/aaaa";
      $this->new_date_format('DT', 'archive_date');
      //-- record_created
      $this->field_config['record_created']                 = array();
      $this->field_config['record_created']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['record_created']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['record_created']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['record_created']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'record_created');
      //-- appn_date
      $this->field_config['appn_date']                 = array();
      $this->field_config['appn_date']['date_format']  = "mm/dd/aaaa";
      $this->field_config['appn_date']['date_sep']     = "-";
      $this->field_config['appn_date']['date_display'] = "mm/dd/aaaa";
      $this->new_date_format('DT', 'appn_date');
      //-- qb_id
      $this->field_config['qb_id']               = array();
      $this->field_config['qb_id']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['qb_id']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['qb_id']['symbol_dec'] = '';
      $this->field_config['qb_id']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['qb_id']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- memb_qty
      $this->field_config['memb_qty']               = array();
      $this->field_config['memb_qty']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['memb_qty']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['memb_qty']['symbol_dec'] = '';
      $this->field_config['memb_qty']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['memb_qty']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- submitted
      $this->field_config['submitted']                 = array();
      $this->field_config['submitted']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['submitted']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['submitted']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DT', 'submitted');
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Gera_log_access'])
      {
          $this->NM_gera_log_insert("Scriptcase", "access");
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Gera_log_access'] = false;
      }

      if ('' != $_SESSION['scriptcase']['change_regional_old'])
      {
          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_old'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $this->nm_tira_formatacao();

          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_new'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $guarda_formatado = $this->formatado;
          $this->nm_formatar_campos();
          $this->formatado = $guarda_formatado;

          $_SESSION['scriptcase']['change_regional_old'] = '';
          $_SESSION['scriptcase']['change_regional_new'] = '';
      }

      if ($nm_form_submit == 1 && ($this->nmgp_opcao == 'inicio' || $this->nmgp_opcao == 'igual'))
      {
          $this->nm_tira_formatacao();
      }
      if (!$this->NM_ajax_flag || 'alterar' != $this->nmgp_opcao || 'submit_form' != $this->NM_ajax_opcao)
      {
         $this->dummy02 = "";
         $this->dummy07 = "";
         $this->dummy08 = "";
         $this->addtl_memb_mail = "Email";
         $this->adtl_memb_name = "<label for=\"name\">Name <span style=\"color: darkred;\">*</span></label>";
         $this->adtl_memb_note = "Note";
         $this->adtl_memb_phone = "Phone";
         $this->dummy01 = "";
         $this->dummy03 = "";
         $this->dummy04 = "";
         $this->dummy05 = "";
         $this->dummy06 = "";
         $this->dummy09 = "";
         $this->dummy11 = "";
         $this->dummy12 = "";
         $this->dummy13 = "";
         $this->est_memb_cost = "Considering the data supplied in this application for a business categorized as ##BUSINESS CATEGORY## and involving " . $_SESSION['gv_members_ct'] . " members, 
the initial membership fee amounts to ##AMOUNT##. We will carefully review this data, and you can expect a response to your application with the precise amount.";
         $this->memb_01 = "";
         $this->memb_02 = "";
         $this->memb_03 = "";
         $this->memb_04 = "";
         $this->memb_05 = "";
         $this->memb_06 = "";
         $this->memb_07 = "";
         $this->memb_08 = "";
         $this->memb_09 = "";
         $this->memb_10 = "";
         $this->memb_11 = "";
         $this->memb_12 = "";
         $this->memb_13 = "";
         $this->memb_email = "Email";
         $this->memb_levels = "<html>
<head>
    <style>
        table#memb_lev {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #3498db;
        }

        th#memb_lev, td#memb_lev {
            padding: 8px;
            text-align: center;
            border: 1px solid #3498db;
            font-size: 12px;
        }

        th#memb_lev {
            background-color: #3498db;
            color: #ffffff;
        }

        tr#memb_lev:nth-child(odd) {
            background-color: #f2f2f2;
        }

        tr#memb_lev:nth-child(even) {
            background-color: #ffffff;
        }

        td#memb_lev:first-child, td#memb_lev:nth-child(5) {
            font-weight: bold;
            text-align: left; /* Align text to the left in columns 1 and 5 */
        }

        td#memb_lev:nth-child(2), td#memb_lev:nth-child(3) {
            font-weight: bold;
            color: #8B0000; /* Dark Red */
        }

        td#memb_lev:nth-child(4) {
            font-size: 12px;
        }

        tr#memb_lev:last-child {
            background-color: #f2f2f2; /* Separated background color for the last row */
            margin-top: 20px; /* Extra spacing below the last row */
            border-top: 2px solid #3498db; /* Add a thick top border to the third row */
        }

        /* Changed color to Dark Red for the specified sentence */
        tr#memb_lev:first-child td#memb_lev:nth-child(5) {
            color: #8B0000; /* Dark Red */
        }
    </style>
</head>
<body>
    <table id=\"memb_lev\">
        <tr id=\"memb_lev\">
            <th id=\"memb_lev\">Membership Level</th>
            <th id=\"memb_lev\">Cost per Year<br><span style='font-size: 13px;'>(up to 3 buyers)</span></th>
            <th id=\"memb_lev\">Additional buyer cost</th>
            <th id=\"memb_lev\">Shopping Hours</th>
            <th id=\"memb_lev\">Guidelines</th>
        </tr>
        <tr id=\"memb_lev\">
            <td id=\"memb_lev\"><strong>Business-to-Business Membership</strong></td>
            <td id=\"memb_lev\"><strong>$125</strong></td>
            <td id=\"memb_lev\"><strong>$50 ea.</strong></td>
            <td id=\"memb_lev\">Mon, Wed, Thu, Fri: 5:30am-1:00pm; Tue: 5:30am-12:00pm</td>
            <td id=\"memb_lev\"><span style='color: #8B0000;'>All new members start at this membership level (excludes Clubs/Non-Profits)</span></td>
        </tr>
        <tr id=\"memb_lev\">
            <td id=\"memb_lev\"><strong>Horticultural & Floral Trade Membership</strong></td>
            <td id=\"memb_lev\"><strong>$50</strong></td>
            <td id=\"memb_lev\"><strong>$15 ea.</strong></td>
            <td id=\"memb_lev\">Mon, Wed, Thu, Fri: 5:30am-1:00pm;<br>Tue: 5:30am-12:00pm</td>
            <td id=\"memb_lev\">Must be a member for at least one year, maintain a website or store front, and spend $5000 in the entire market over the course of the previous year</td>
        </tr>
        <tr id=\"memb_lev\">
            <td id=\"memb_lev\"><strong>Club, School, Non-Profit Membership</strong></td>
            <td id=\"memb_lev\"><strong>$175</strong></td>
            <td id=\"memb_lev\"><strong>$50 ea.</strong></td>
            <td id=\"memb_lev\">Mon, Wed, Thu: 10am-1pm;<br>Tue: 10am-Noon; Fri: 5:30am-1pm</td>
            <td id=\"memb_lev\">Offered to churches, clubs, schools, and non-profit businesses</td>
        </tr>
        <tr id=\"memb_lev\">
            <td id=\"memb_lev\"><strong>Day Pass</strong></td>
            <td id=\"memb_lev\"><strong>-</strong></td>
            <td id=\"memb_lev\"><strong>$25 ea.</strong></td>
            <td id=\"memb_lev\">Mon, Wed, Thu, Fri: 5:30am-1:00pm;<br>Tue: 5:30am-12:00pm</td>
            <td id=\"memb_lev\">Active business registration is required</td>
        </tr>
    </table>
</body>
</html>
";
         $this->memb_name = "<label for=\"name\">Name <span style=\"color: darkred;\">*</span></label>";
         $this->memb_note = "Note";
         $this->memb_phone = "Phone";
         $this->read_at_sign = "<!DOCTYPE html>
<html>
<head>
<style>
.justify-text {
  text-align: justify;
  padding: 0px 50px 10px 50px;
  color: #800000; 
}
.bold-text {
  font-weight: bold;
}
</style>
</head>
<body>
<div class=\"justify-text\">
I verify that the information given in this application is complete and accurate. Use of the Portland Flower market Buyer's Pass is subject to the conditions of this application. <span class=\"bold-text\">Failure to observe these conditions will result in revocation of the pass.</span>
</div>
</body>
</html>
";
         $this->rules = "<html>
<body>
       <h4>RULES & REGULATIONS</h4>
	<ul>
        <li>The Portland Flower Market operates on a membership-only basis.</li>
        <li>We are not open for public shopping.</li>
        <li>No clients or customers, No brides / bridal parties, No baby shower parties are allowed in the market.</li>
        <li>All guests require a $5 visitor pass. Up to 3 guests are allowed per day and must remain with membership holders the entire time while in the market.</li>
        <li>Buyers must wear their buyer's pass at all times.</li>
    </ul>
</body>
</html>";
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_membershipid' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'membershipid');
          }
          if ('validate_co_name' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'co_name');
          }
          if ('validate_client_id' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'client_id');
          }
          if ('validate_mailing_address' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'mailing_address');
          }
          if ('validate_memb_status_id' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'memb_status_id');
          }
          if ('validate_city' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'city');
          }
          if ('validate_pricing_level_id' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pricing_level_id');
          }
          if ('validate_state' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'state');
          }
          if ('validate_bus_cat_id' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'bus_cat_id');
          }
          if ('validate_zip_code' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'zip_code');
          }
          if ('validate_bus_subcat_id' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'bus_subcat_id');
          }
          if ('validate_permanent_member_date' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'permanent_member_date');
          }
          if ('validate_bus_subcat_other' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'bus_subcat_other');
          }
          if ('validate_renewal_date' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'renewal_date');
          }
          if ('validate_acct_instagram' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'acct_instagram');
          }
          if ('validate_website_url' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'website_url');
          }
          if ('validate_acct_facebook' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'acct_facebook');
          }
          if ('validate_js_prod_price' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'js_prod_price');
          }
          if ('validate_js_strp_price_id' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'js_strp_price_id');
          }
          if ('validate_js_mbr_ct' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'js_mbr_ct');
          }
          if ('validate_js_client_id' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'js_client_id');
          }
          if ('validate_main_contact_name' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'main_contact_name');
          }
          if ('validate_main_contact_phone' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'main_contact_phone');
          }
          if ('validate_main_contact_email' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'main_contact_email');
          }
          if ('validate_main_contact_title' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'main_contact_title');
          }
          if ('validate_main_contact_img_id' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'main_contact_img_id');
          }
          if ('validate_memb_list' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'memb_list');
          }
          if ('validate_docs' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'docs');
          }
          if ('validate_client_pmts' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'client_pmts');
          }
          if ('validate_notes' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'notes');
          }
          form_clients_staff_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_bus_cat_id_onchange' == $this->NM_ajax_opcao)
          {
              $this->bus_cat_id_onChange();
          }
          if ('event_bus_subcat_id_onchange' == $this->NM_ajax_opcao)
          {
              $this->bus_subcat_id_onChange();
          }
          if ('event_main_contact_email_onchange' == $this->NM_ajax_opcao)
          {
              $this->main_contact_email_onChange();
          }
          if ('event_main_contact_name_onchange' == $this->NM_ajax_opcao)
          {
              $this->main_contact_name_onChange();
          }
          if ('event_main_contact_phone_onchange' == $this->NM_ajax_opcao)
          {
              $this->main_contact_phone_onChange();
          }
          if ('event_main_contact_title_onchange' == $this->NM_ajax_opcao)
          {
              $this->main_contact_title_onChange();
          }
          if ('event_memb_qty_onchange' == $this->NM_ajax_opcao)
          {
              $this->memb_qty_onChange();
          }
          if ('event_memb_status_id_onchange' == $this->NM_ajax_opcao)
          {
              $this->memb_status_id_onChange();
          }
          if ('event_scajaxbutton_btn_delete_backend_onclick' == $this->NM_ajax_opcao)
          {
              $this->scajaxbutton_btn_delete_backend_onClick();
          }
          form_clients_staff_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          if (is_array($this->archive))
          {
              $x = 0; 
              $this->archive_1 = $this->archive;
              $this->archive = ""; 
              if ($this->archive_1 != "") 
              { 
                  foreach ($this->archive_1 as $dados_archive_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->archive .= ";";
                      } 
                      $this->archive .= $dados_archive_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->doc_type))
          {
              $x = 0; 
              $this->doc_type_1 = $this->doc_type;
              $this->doc_type = ""; 
              if ($this->doc_type_1 != "") 
              { 
                  foreach ($this->doc_type_1 as $dados_doc_type_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->doc_type .= ";";
                      } 
                      $this->doc_type .= $dados_doc_type_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->paid))
          {
              $x = 0; 
              $this->paid_1 = $this->paid;
              $this->paid = ""; 
              if ($this->paid_1 != "") 
              { 
                  foreach ($this->paid_1 as $dados_paid_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->paid .= ";";
                      } 
                      $this->paid .= $dados_paid_1;
                      $x++ ; 
                  } 
              } 
          } 
          $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_clients_staff_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          if ($this->nmgp_opcao != "incluir")
          {
              $this->scFormFocusErrorName = '';
          }
          $_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_clients_staff_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, 4);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro, '', true, true); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir" && $nm_apl_dependente == 1) 
              { 
                  $this->nm_flag_saida_novo = "S";; 
              }
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && 1 == $nm_form_submit && $this->nmgp_opcao != "menu_link" && $this->nmgp_opcao != "recarga_mobile")
      {
      }
//
      if ($this->nmgp_opcao != "nada")
      {
          $this->nm_acessa_banco();
      }
      else
      {
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload(false);
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_evento == "update")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_evento == "delete")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_clients_staff_pack_ajax_response();
          exit;
      }
      $this->nm_formatar_campos();
      if ($this->NM_ajax_flag)
      {
          $this->NM_ajax_info['result'] = 'OK';
          if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'])
          {
              $this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmu']);
          }
          form_clients_staff_pack_ajax_response();
          exit;
      }
      $this->nm_gera_html();
      $this->NM_close_db(); 
      $this->nmgp_opcao = ""; 
      if ($this->Change_Menu)
      {
          $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
          $Arr_rastro = array();
          if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
              {
                 $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
              }
              $ult_apl = count($Arr_rastro) - 1;
              unset($Arr_rastro[$ult_apl]);
              $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     if (parent.writeFastMenu)
     {
         parent.writeFastMenu(link_atual);
     }
  </script>
<?php
          }
          else
          {
?>
  <script type="text/javascript">
     if (parent.clearFastMenu)
     {
        parent.clearFastMenu();
     }
  </script>
<?php
          }
      }
   }
  function html_export_print($nm_arquivo_html, $nmgp_password)
  {
      $Html_password = "";
          $Arq_base  = $this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_html;
          $Parm_pass = ($Html_password != "") ? " -p" : "";
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_clients_staff.zip";
          $Arq_htm = $this->Ini->path_imag_temp . "/" . $Zip_name;
          $Arq_zip = $this->Ini->root . $Arq_htm;
          $Zip_f     = (FALSE !== strpos($Arq_zip, ' ')) ? " \"" . $Arq_zip . "\"" :  $Arq_zip;
          $Arq_input = (FALSE !== strpos($Arq_base, ' ')) ? " \"" . $Arq_base . "\"" :  $Arq_base;
           if (is_file($Arq_zip)) {
               unlink($Arq_zip);
           }
           $str_zip = "";
           if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
           {
               chdir($this->Ini->path_third . "/zip/windows");
               $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $Html_password . " " . $Zip_f . " " . $Arq_input;
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
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
           {
               chdir($this->Ini->path_third . "/zip/mac/bin");
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
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
           foreach ($this->Ini->Img_export_zip as $cada_img_zip)
           {
               $str_zip      = "";
              $cada_img_zip = '"' . $cada_img_zip . '"';
               if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
               {
                   $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $Html_password . " " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
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
           }
           if (is_file($Arq_zip)) {
               unlink($Arq_base);
           } 
          $path_doc_md5 = md5($Arq_htm);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff'][$path_doc_md5][1] = $Zip_name;
?><!DOCTYPE html>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("PFM - Buyers Pass App") ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
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
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/6/css/all.min.css" /> 
  <link rel="shortcut icon" href="../_lib/img/grp__NM__bg__NM__pfm_img.png">
</HEAD>
<BODY class="scExportPage">
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: top">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">PRINT</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
   <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "", '', '', '', '', '', '', '', '', "");?>

    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo  $this->form_encode_input($Arq_htm) ?>" target="_self" style="display: none"> 
</form>
<form name="Fdown" method="get" action="form_clients_staff_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_clients_staff"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="./" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nmgp_opcao" value="<?php echo $this->nmgp_opcao ?>"> 
</form> 
         </BODY>
         </HTML>
<?php
          exit;
  }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access);
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
       if ($this->SC_log_atv)
       {
           $this->NM_gera_log_output();
       }
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_gera_log_insert($orig="Scriptcase", $evento="", $texto="")
   {
       $delim  = "'";
       $delim1 = "'";
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_access))
       { 
           $delim  = "#";
           $delim1 = "#";
       } 
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['SC_sep_date']))
       {
           $delim  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['SC_sep_date'];
           $delim1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['SC_sep_date1'];
       }
       $dt  = $delim . date('Y-m-d H:i:s') . $delim1;
       $usr = isset($_SESSION['usr_login']) ? $_SESSION['usr_login'] : "";
       if (strtolower($_SESSION['scriptcase']['glo_tpbanco']) == 'pdo_sqlsrv' || strtolower($_SESSION['scriptcase']['glo_tpbanco']) == 'pdo_dblib')
       { 
           $dt  = $delim . date('Ymd H:i:s') . $delim1;
       } 
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_access))
       { 
           $dt  = $delim . date('Y-m-d H:i:s') . $delim1;
       } 
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_informix))
       { 
           $dt  = "EXTEND(" . $dt . ", YEAR TO FRACTION)";
       } 
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_access))
       { 
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, `action`, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'form_clients_staff', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       elseif (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_sqlite))
       { 
           $comando = "INSERT INTO sc_log (id, inserted_date, username, application, creator, ip_user, action, description) VALUES (NULL, $dt, " . $this->Db->qstr($usr) . ", 'form_clients_staff', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       else
       { 
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, action, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'form_clients_staff', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
       $rlog = $this->Db->Execute($comando); 
       if ($rlog === false)  
       { 
           $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
           if ($this->NM_ajax_flag)
           {
               form_clients_staff_pack_ajax_response();
               exit; 
           }
       }
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
           $this->Ini->nm_db_conn_mysql_qb->Close(); 
       } 
   }
   function sc_btn_pdf_download() 
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;
 
     ob_start();
?>
<!DOCTYPE html>

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
 <head>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

      if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
      {
?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
      }

?>
        <link rel="shortcut icon" href="../_lib/img/grp__NM__bg__NM__pfm_img.png">
    <SCRIPT type="text/javascript">
      var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
      var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
      var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
      var sc_userSweetAlertDisplayed = false;
    </SCRIPT>
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_third; ?>jquery/js/jquery.js"></SCRIPT>
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
<?php
include_once("form_clients_staff_sajax_js.php");
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
    <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
    <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
  <?php 
  if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
  { 
  ?> 
  <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
  <?php 
  } 
  ?> 
 </head>
  <body class="scFormPage">
      <table class="scFormTabela" align="center"><tr><td>
<?php
      $nmgp_opcao_saida_php = "igual";
      $nmgp_opc_ant_saida_php = "";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['opc_ant'] == "novo" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['opc_ant'] == "incluir")
      {
          $nmgp_opc_ant_saida_php = "novo";
          $nmgp_opcao_saida_php   = "recarga";
      }
      $nm_f_saida = "./";
      nm_limpa_numero($this->membershipid, $this->field_config['membershipid']['symbol_grp']) ; 
      nm_limpa_numero($this->client_id, $this->field_config['client_id']['symbol_grp']) ; 
      $this->nm_tira_mask($this->state, "aa", "(){}[].,;:-+/ "); 
      $this->nm_tira_mask($this->zip_code, "99999-9999", "(){}[].,;:-+/ "); 
      nm_limpa_data($this->permanent_member_date, $this->field_config['permanent_member_date']['date_sep']) ; 
      nm_limpa_data($this->renewal_date, $this->field_config['renewal_date']['date_sep']) ; 
      $this->nm_tira_mask($this->main_contact_phone, "(999) 999 - 9999", "(){}[].,;:-+/ "); 
      $this->nm_converte_datas();
      $_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'on';
   if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form("http://pdxflowermarket.com/wp-content/uploads/2021/03/BP-Application-2021.pdf", $this->nm_location, "","_blank", '', 440, 630);
 };
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'off'; 
    echo ob_get_clean();
?>
      </td></tr><tr><td align="center">
      <form name="FPHP" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value=""/>
      <input type=hidden name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"/>
      <input type=hidden name="client_id" value="<?php echo $this->form_encode_input($this->client_id) ?>"/>
      <input type=hidden name="nmgp_opcao" value="<?php echo $this->form_encode_input($nmgp_opcao_saida_php); ?>"/>
      <input type=hidden name="nmgp_opc_ant" value="<?php echo $this->form_encode_input($nmgp_opc_ant_saida_php); ?>"/>
      <input type=submit name="nmgp_bok" value="<?php echo $this->Ini->Nm_lang['lang_btns_cfrm'] ?>"/>
      </form>
      </td></tr></table>
      </body>
      </html>
<?php
       if (isset($this->redir_modal) && !empty($this->redir_modal))
       {
           echo "<script type=\"text/javascript\">" . $this->redir_modal . "</script>";
           $this->redir_modal = "";
       }
   }
   function sc_btn_email_client_if_active() 
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;
 
     ob_start();
?>
<!DOCTYPE html>

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
 <head>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

      if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
      {
?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
      }

?>
        <link rel="shortcut icon" href="../_lib/img/grp__NM__bg__NM__pfm_img.png">
    <SCRIPT type="text/javascript">
      var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
      var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
      var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
      var sc_userSweetAlertDisplayed = false;
    </SCRIPT>
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_third; ?>jquery/js/jquery.js"></SCRIPT>
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
<?php
include_once("form_clients_staff_sajax_js.php");
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
    <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
    <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
  <?php 
  if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
  { 
  ?> 
  <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
  <?php 
  } 
  ?> 
 </head>
  <body class="scFormPage">
      <table class="scFormTabela" align="center"><tr><td>
<?php
      $varloc_btn_php = array();
      $nmgp_opcao_saida_php = "igual";
      $nmgp_opc_ant_saida_php = "";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['opc_ant'] == "novo" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['opc_ant'] == "incluir")
      {
          $nmgp_opc_ant_saida_php = "novo";
          $nmgp_opcao_saida_php   = "recarga";
      }
      else
      {
          if (!isset($this->client_id) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dados_form']['client_id']))
          {
              $varloc_btn_php['client_id'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dados_form']['client_id'];
          }
          if (!isset($this->client_id) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dados_form']['client_id']))
          {
              $varloc_btn_php['client_id'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dados_form']['client_id'];
          }
          if (!isset($this->client_id) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dados_form']['client_id']))
          {
              $varloc_btn_php['client_id'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dados_form']['client_id'];
          }
          if (!isset($this->client_id) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dados_form']['client_id']))
          {
              $varloc_btn_php['client_id'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dados_form']['client_id'];
          }
          if (!isset($this->client_id) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dados_form']['client_id']))
          {
              $varloc_btn_php['client_id'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dados_form']['client_id'];
          }
          if (!isset($this->co_name) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dados_form']['co_name']))
          {
              $varloc_btn_php['co_name'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dados_form']['co_name'];
          }
          if (!isset($this->main_contact_email) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dados_form']['main_contact_email']))
          {
              $varloc_btn_php['main_contact_email'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dados_form']['main_contact_email'];
          }
          if (!isset($this->client_id) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dados_form']['client_id']))
          {
              $varloc_btn_php['client_id'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dados_form']['client_id'];
          }
      }
      $nm_f_saida = "./";
      nm_limpa_numero($this->membershipid, $this->field_config['membershipid']['symbol_grp']) ; 
      nm_limpa_numero($this->client_id, $this->field_config['client_id']['symbol_grp']) ; 
      $this->nm_tira_mask($this->state, "aa", "(){}[].,;:-+/ "); 
      $this->nm_tira_mask($this->zip_code, "99999-9999", "(){}[].,;:-+/ "); 
      nm_limpa_data($this->permanent_member_date, $this->field_config['permanent_member_date']['date_sep']) ; 
      nm_limpa_data($this->renewal_date, $this->field_config['renewal_date']['date_sep']) ; 
      $this->nm_tira_mask($this->main_contact_phone, "(999) 999 - 9999", "(){}[].,;:-+/ "); 
      $this->nm_converte_datas();
      foreach ($varloc_btn_php as $cmp => $val_cmp)
      {
          $this->$cmp = $val_cmp;
      }
      $_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'on';
if (!isset($this->sc_temp_gv_from_grid)) {$this->sc_temp_gv_from_grid = (isset($_SESSION['gv_from_grid'])) ? $_SESSION['gv_from_grid'] : "";}
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
if (!isset($this->sc_temp_gv_last_memb_status_id)) {$this->sc_temp_gv_last_memb_status_id = (isset($_SESSION['gv_last_memb_status_id'])) ? $_SESSION['gv_last_memb_status_id'] : "";}
  echo("Email sent successfully!");

     $nm_select ="UPDATE clients SET memb_status_id = 3 WHERE client_id = " . $this->client_id ; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_clients_staff_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      	
$ip_user = $_SERVER['REMOTE_ADDR'];  
$cust_id = $this->client_id ;
$status_old = $this->sc_temp_gv_last_memb_status_id;
$descript = "--> keys <-- client_id : $cust_id||--> fields <-- memb_status_id (old)  : $status_old||memb_status_id (new)  : 3||memb_status_id (label)  : Membership Status";
$sql_log_upd = "INSERT INTO sc_log (
    inserted_date,
    username,
    application,
    creator,
    ip_user,
    action,
    description
) VALUES (
    NOW(),
    '".$this->sc_temp_usr_login."', 
    'form_clients_staff',  
    'User',
    '$ip_user',  
    'Update',
    '$descript'
)";

     $nm_select = $sql_log_upd; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_clients_staff_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
       

$insert_sql = "INSERT INTO sec_approvals (client_id, login, memb_status_id, ts) 
			   VALUES (" . $this->client_id  . ", '" . $this->sc_temp_usr_login . "', 3, NOW())";

     $nm_select = $insert_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_clients_staff_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      

$sql = "UPDATE clients 
SET renewal_date = 
    CASE 
        WHEN renewal_date IS NULL THEN DATE_ADD(CURDATE(), INTERVAL 1 YEAR)
        ELSE DATE_ADD(renewal_date, INTERVAL 1 YEAR)
    END 
WHERE client_id = " . $this->client_id ;

     $nm_select = $sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_clients_staff_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
       

if ( $this->sc_temp_gv_from_grid == 'Renewals' ) {
	$sql = "UPDATE sec_renewals SET applied = NOW() WHERE client_id = " . $this->client_id  . " AND applied IS NULL";    
	
     $nm_select = $sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_clients_staff_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      
}

$company_name 			= $this->co_name ;
$primary_contact_email 	= $this->main_contact_email ;

$sql = "SELECT msg_subject, msg_body 
		FROM notifications 
		WHERE descript = 'approved_membership' AND active
		UNION
		SELECT 'Membership application email error', 'ERROR: Please contact Portland Flower Administrator'
		WHERE NOT EXISTS (
			SELECT 1 
			FROM notifications 
			WHERE descript = 'approved_membership' AND active
		);";

 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 

if ( isset($this->ds[0][0]) ) {
	$subject = $this->ds[0][0];
	$message = $this->ds[0][1];
	$message = str_replace("~COMPANY NAME~", $company_name, $message);

	   $this->sendEmail($primary_contact_email, $subject, $message); 
}

 if (isset($this->sc_temp_gv_last_memb_status_id)) { $_SESSION['gv_last_memb_status_id'] = $this->sc_temp_gv_last_memb_status_id;}
 if (isset($this->sc_temp_usr_login)) { $_SESSION['usr_login'] = $this->sc_temp_usr_login;}
 if (isset($this->sc_temp_gv_from_grid)) { $_SESSION['gv_from_grid'] = $this->sc_temp_gv_from_grid;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('form_clients_staff') . "/", $this->nm_location, "client_id?#?" . NM_encode_input($this->client_id ) . "?@?","_self", '', 440, 630);
 };
if (isset($this->sc_temp_gv_last_memb_status_id)) { $_SESSION['gv_last_memb_status_id'] = $this->sc_temp_gv_last_memb_status_id;}
if (isset($this->sc_temp_usr_login)) { $_SESSION['usr_login'] = $this->sc_temp_usr_login;}
if (isset($this->sc_temp_gv_from_grid)) { $_SESSION['gv_from_grid'] = $this->sc_temp_gv_from_grid;}
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'off'; 
    echo ob_get_clean();
?>
      </td></tr><tr><td align="center">
      <form name="FPHP" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value=""/>
      <input type=hidden name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"/>
      <input type=hidden name="client_id" value="<?php echo $this->form_encode_input($this->client_id) ?>"/>
      <input type=hidden name="nmgp_opcao" value="<?php echo $this->form_encode_input($nmgp_opcao_saida_php); ?>"/>
      <input type=hidden name="nmgp_opc_ant" value="<?php echo $this->form_encode_input($nmgp_opc_ant_saida_php); ?>"/>
      <input type=submit name="nmgp_bok" value="<?php echo $this->Ini->Nm_lang['lang_btns_cfrm'] ?>"/>
      </form>
      </td></tr></table>
      </body>
      </html>
<?php
       if (isset($this->redir_modal) && !empty($this->redir_modal))
       {
           echo "<script type=\"text/javascript\">" . $this->redir_modal . "</script>";
           $this->redir_modal = "";
       }
   }
//
//--------------------------------------------------------------------------------------
   function Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, $mode = 3) 
   {
       switch ($mode)
       {
           case 1:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 2:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta, true);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 3:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;

           case 4:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros_SweetAlert($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;
       }
   }

   function Formata_Campos_Falta($Campos_Falta, $table = false) 
   {
       $Campos_Falta = array_unique($Campos_Falta);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_reqd'] . ' ' . implode('; ', $Campos_Falta);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Falta);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Falta as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_reqd'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Crit($Campos_Crit, $table = false) 
   {
       $Campos_Crit = array_unique($Campos_Crit);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . implode('; ', $Campos_Crit);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Crit);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Crit as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_flds'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros($Campos_Erros) 
   {
       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= '<tr>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Recupera_Nome_Campo($campo) . ':</td>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', array_unique($erros)) . '</td>';
           $sError .= '</tr>';
       }

       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros_SweetAlert($Campos_Erros) 
   {
       $sError  = '';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= $this->Recupera_Nome_Campo($campo) . ': ' . implode('<br />', array_unique($erros)) . '<br />';
       }

       return $sError;
   }

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'dummy02':
               return "";
               break;
           case 'membershipid':
               return "Membership No.";
               break;
           case 'co_name':
               return "Company Name";
               break;
           case 'client_id':
               return "Membership No.";
               break;
           case 'mailing_address':
               return "Mailing Address";
               break;
           case 'memb_status_id':
               return "Membership Status";
               break;
           case 'city':
               return "City";
               break;
           case 'pricing_level_id':
               return "Membership Level";
               break;
           case 'state':
               return "State";
               break;
           case 'bus_cat_id':
               return "Business Category";
               break;
           case 'zip_code':
               return "Zip Code";
               break;
           case 'bus_subcat_id':
               return "Subcategory";
               break;
           case 'permanent_member_date':
               return "Member since";
               break;
           case 'bus_subcat_other':
               return "If Other";
               break;
           case 'renewal_date':
               return "Renewal Date";
               break;
           case 'acct_instagram':
               return "Instagram";
               break;
           case 'website_url':
               return "Company Website";
               break;
           case 'acct_facebook':
               return "Facebook";
               break;
           case 'js_prod_price':
               return "js_prod_price";
               break;
           case 'js_strp_price_id':
               return "js_strp_price_id";
               break;
           case 'js_mbr_ct':
               return "js_mbr_ct";
               break;
           case 'js_client_id':
               return "js_client_id";
               break;
           case 'dummy07':
               return "";
               break;
           case 'dummy08':
               return "";
               break;
           case 'main_contact_name':
               return "Contact Name";
               break;
           case 'main_contact_phone':
               return "Contact Phone";
               break;
           case 'main_contact_email':
               return "Contact Email";
               break;
           case 'main_contact_title':
               return "Contact Title";
               break;
           case 'main_contact_img_id':
               return "Contact Driver<br>License or ID";
               break;
           case 'memb_list':
               return "Buyers";
               break;
           case 'docs':
               return "Docs";
               break;
           case 'client_pmts':
               return "Payments";
               break;
           case 'notes':
               return "Notes";
               break;
           case 'appn_id':
               return "Appn Id";
               break;
           case 'ofa_contact':
               return "Ofa Contact";
               break;
           case 'street_address':
               return "Street Address";
               break;
           case 'phone_number':
               return "Phone Number";
               break;
           case 'home_phone':
               return "Home Phone";
               break;
           case 'fax_number':
               return "Fax Number";
               break;
           case 'email':
               return "Email";
               break;
           case 'business_type':
               return "Business Type";
               break;
           case 'fresh_cut_allowed':
               return "Fresh Cut Allowed";
               break;
           case 'business_license':
               return "Business License";
               break;
           case 'nursery_license':
               return "Nursery License";
               break;
           case 'federal_tax_id':
               return "Federal Tax Id";
               break;
           case 'temporary_pass':
               return "Temporary Pass";
               break;
           case 'ofa_member':
               return "Ofa Member";
               break;
           case 'starting_date':
               return "Starting Date";
               break;
           case 'expiration_date':
               return "Expiration Date";
               break;
           case 'canceled':
               return "Canceled";
               break;
           case 'cancel_date':
               return "Cancel Date";
               break;
           case 'canceled_by':
               return "Canceled By";
               break;
           case 'reason_canceled':
               return "Reason Canceled";
               break;
           case 'retire_date':
               return "Retire Date";
               break;
           case 'verified_receipts':
               return "Verified Receipts";
               break;
           case 'date_last_updated':
               return "Date Last Updated";
               break;
           case 'restricted':
               return "Restricted";
               break;
           case 'committee_approval_required':
               return "Committee Approval Required";
               break;
           case 'type_company':
               return "Company Type (Dep)";
               break;
           case 'archive':
               return "";
               break;
           case 'archive_date':
               return "Archive Date";
               break;
           case 'store_front_address':
               return "Store Front Address";
               break;
           case 'store_front_city':
               return "Store Front City";
               break;
           case 'store_front_zip':
               return "Store Front Zip";
               break;
           case 'home_base_address':
               return "Home Base Address";
               break;
           case 'home_base_city':
               return "Home Base City";
               break;
           case 'home_base_zip':
               return "Home Base Zip";
               break;
           case 'store_front_state':
               return "Store Front State";
               break;
           case 'home_base_state':
               return "Home Base State";
               break;
           case 'record_created':
               return "Record Created";
               break;
           case 'appn_date':
               return "Application Date";
               break;
           case 'appn_note':
               return "Appn Note";
               break;
           case 'doc_sec_of_state':
               return "Doc Sec Of State";
               break;
           case 'doc_city_bus_lic':
               return "Doc City Bus Lic";
               break;
           case 'doc_agric_lic':
               return "Doc Agric Lic";
               break;
           case 'doc_last_year_tax':
               return "Doc Last Year Tax";
               break;
           case 'qb_id':
               return "Qb Id";
               break;
           case 'main_contact_img_file':
               return "Main Contact Img File";
               break;
           case 'main_contact_img_size':
               return "Main Contact Img Size";
               break;
           case 'main_contact_img_id_prev':
               return "Main Contact Img Id Prev";
               break;
           case 'memb_qty':
               return "Memb Qty";
               break;
           case 'doc_type':
               return "Choose ONE Document from the options below to Upload:";
               break;
           case 'doc_file':
               return "Attachment:";
               break;
           case 'doc_filename':
               return "Doc Filename";
               break;
           case 'doc_filesize':
               return "Doc Filesize";
               break;
           case 'applicant_name':
               return "Applicant Name";
               break;
           case 'applicant_signature':
               return "Applicant Signature";
               break;
           case 'applicant_title':
               return "Applicant Title";
               break;
           case 'addtl_memb_mail':
               return "Email";
               break;
           case 'adtl_memb_name':
               return "Name";
               break;
           case 'adtl_memb_note':
               return "Note";
               break;
           case 'adtl_memb_phone':
               return "Phone";
               break;
           case 'dummy01':
               return "";
               break;
           case 'dummy03':
               return "";
               break;
           case 'dummy04':
               return "";
               break;
           case 'dummy05':
               return "";
               break;
           case 'dummy06':
               return "#";
               break;
           case 'dummy09':
               return "";
               break;
           case 'dummy10':
               return "";
               break;
           case 'dummy11':
               return "";
               break;
           case 'dummy12':
               return "";
               break;
           case 'dummy13':
               return "dummy13";
               break;
           case 'est_memb_cost':
               return "Membership";
               break;
           case 'main_contact_title_lbl':
               return "Title";
               break;
           case 'memb_01':
               return "1";
               break;
           case 'memb_02':
               return "2";
               break;
           case 'memb_03':
               return "3";
               break;
           case 'memb_04':
               return "#4";
               break;
           case 'memb_05':
               return "#5";
               break;
           case 'memb_06':
               return "#6";
               break;
           case 'memb_07':
               return "#7";
               break;
           case 'memb_08':
               return "#8";
               break;
           case 'memb_09':
               return "#9";
               break;
           case 'memb_10':
               return "#10";
               break;
           case 'memb_11':
               return "#11";
               break;
           case 'memb_12':
               return "#12";
               break;
           case 'memb_13':
               return "#13";
               break;
           case 'memb_email':
               return "Email";
               break;
           case 'memb_levels':
               return "memb_levels";
               break;
           case 'memb_name':
               return "Name";
               break;
           case 'memb_note':
               return "Note";
               break;
           case 'memb_phone':
               return "Phone";
               break;
           case 'paid':
               return "Completed membership payment?";
               break;
           case 'pay':
               return "Pay Membership";
               break;
           case 'read_at_sign':
               return "";
               break;
           case 'rules':
               return "";
               break;
           case 'rules_warn':
               return "rules_warn";
               break;
           case 'submitted':
               return "Submitted";
               break;
           case 'transaction':
               return "Transaction";
               break;
           case 'xlsx_sample':
               return "If more than 10 buyers are needed, you can use an <b>Excel file</b> to upload any additional buyers beyond the 10 already entered.<br>Please create, fill out, and upload an <b>Excel file</b> including the column headers listed in the example below:<br>";
               break;
       }

       return $campo;
   }

   function dateDefaultFormat()
   {
       if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
       {
           $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
           $sDate = str_replace('mm',   'm', $sDate);
           $sDate = str_replace('dd',   'd', $sDate);
           return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
       }
       elseif ('en_us' == $this->Ini->str_lang)
       {
           return 'm/d/Y';
       }
       else
       {
           return 'd/m/Y';
       }
   } // dateDefaultFormat

//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser, $teste_validade;
     if (is_array($filtro) && empty($filtro)) {
         $filtro = '';
     }
//---------------------------------------------------------
     $this->scFormFocusErrorName = '';
     $this->sc_force_zero = array();

     if (!is_array($filtro) && '' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_form_clients_staff']) || !is_array($this->NM_ajax_info['errList']['geral_form_clients_staff']))
              {
                  $this->NM_ajax_info['errList']['geral_form_clients_staff'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_clients_staff'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'membershipid' == $filtro)) || (is_array($filtro) && in_array('membershipid', $filtro)))
        $this->ValidateField_membershipid($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "membershipid";

      if ((!is_array($filtro) && ('' == $filtro || 'co_name' == $filtro)) || (is_array($filtro) && in_array('co_name', $filtro)))
        $this->ValidateField_co_name($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "co_name";

      if ((!is_array($filtro) && ('' == $filtro || 'client_id' == $filtro)) || (is_array($filtro) && in_array('client_id', $filtro)))
        $this->ValidateField_client_id($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "client_id";

      if ((!is_array($filtro) && ('' == $filtro || 'mailing_address' == $filtro)) || (is_array($filtro) && in_array('mailing_address', $filtro)))
        $this->ValidateField_mailing_address($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "mailing_address";

      if ((!is_array($filtro) && ('' == $filtro || 'memb_status_id' == $filtro)) || (is_array($filtro) && in_array('memb_status_id', $filtro)))
        $this->ValidateField_memb_status_id($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "memb_status_id";

      if ((!is_array($filtro) && ('' == $filtro || 'city' == $filtro)) || (is_array($filtro) && in_array('city', $filtro)))
        $this->ValidateField_city($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "city";

      if ((!is_array($filtro) && ('' == $filtro || 'pricing_level_id' == $filtro)) || (is_array($filtro) && in_array('pricing_level_id', $filtro)))
        $this->ValidateField_pricing_level_id($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "pricing_level_id";

      if ((!is_array($filtro) && ('' == $filtro || 'state' == $filtro)) || (is_array($filtro) && in_array('state', $filtro)))
        $this->ValidateField_state($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "state";

      if ((!is_array($filtro) && ('' == $filtro || 'bus_cat_id' == $filtro)) || (is_array($filtro) && in_array('bus_cat_id', $filtro)))
        $this->ValidateField_bus_cat_id($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "bus_cat_id";

      if ((!is_array($filtro) && ('' == $filtro || 'zip_code' == $filtro)) || (is_array($filtro) && in_array('zip_code', $filtro)))
        $this->ValidateField_zip_code($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "zip_code";

      if ((!is_array($filtro) && ('' == $filtro || 'bus_subcat_id' == $filtro)) || (is_array($filtro) && in_array('bus_subcat_id', $filtro)))
        $this->ValidateField_bus_subcat_id($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "bus_subcat_id";

      if ((!is_array($filtro) && ('' == $filtro || 'permanent_member_date' == $filtro)) || (is_array($filtro) && in_array('permanent_member_date', $filtro)))
        $this->ValidateField_permanent_member_date($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "permanent_member_date";

      if ((!is_array($filtro) && ('' == $filtro || 'bus_subcat_other' == $filtro)) || (is_array($filtro) && in_array('bus_subcat_other', $filtro)))
        $this->ValidateField_bus_subcat_other($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "bus_subcat_other";

      if ((!is_array($filtro) && ('' == $filtro || 'renewal_date' == $filtro)) || (is_array($filtro) && in_array('renewal_date', $filtro)))
        $this->ValidateField_renewal_date($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "renewal_date";

      if ((!is_array($filtro) && ('' == $filtro || 'acct_instagram' == $filtro)) || (is_array($filtro) && in_array('acct_instagram', $filtro)))
        $this->ValidateField_acct_instagram($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "acct_instagram";

      if ((!is_array($filtro) && ('' == $filtro || 'website_url' == $filtro)) || (is_array($filtro) && in_array('website_url', $filtro)))
        $this->ValidateField_website_url($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "website_url";

      if ((!is_array($filtro) && ('' == $filtro || 'acct_facebook' == $filtro)) || (is_array($filtro) && in_array('acct_facebook', $filtro)))
        $this->ValidateField_acct_facebook($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "acct_facebook";

      if ((!is_array($filtro) && ('' == $filtro || 'js_prod_price' == $filtro)) || (is_array($filtro) && in_array('js_prod_price', $filtro)))
        $this->ValidateField_js_prod_price($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "js_prod_price";

      if ((!is_array($filtro) && ('' == $filtro || 'js_strp_price_id' == $filtro)) || (is_array($filtro) && in_array('js_strp_price_id', $filtro)))
        $this->ValidateField_js_strp_price_id($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "js_strp_price_id";

      if ((!is_array($filtro) && ('' == $filtro || 'js_mbr_ct' == $filtro)) || (is_array($filtro) && in_array('js_mbr_ct', $filtro)))
        $this->ValidateField_js_mbr_ct($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "js_mbr_ct";

      if ((!is_array($filtro) && ('' == $filtro || 'js_client_id' == $filtro)) || (is_array($filtro) && in_array('js_client_id', $filtro)))
        $this->ValidateField_js_client_id($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "js_client_id";

      if ((!is_array($filtro) && ('' == $filtro || 'main_contact_name' == $filtro)) || (is_array($filtro) && in_array('main_contact_name', $filtro)))
        $this->ValidateField_main_contact_name($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "main_contact_name";

      if ((!is_array($filtro) && ('' == $filtro || 'main_contact_phone' == $filtro)) || (is_array($filtro) && in_array('main_contact_phone', $filtro)))
        $this->ValidateField_main_contact_phone($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "main_contact_phone";

      if ((!is_array($filtro) && ('' == $filtro || 'main_contact_email' == $filtro)) || (is_array($filtro) && in_array('main_contact_email', $filtro)))
        $this->ValidateField_main_contact_email($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "main_contact_email";

      if ((!is_array($filtro) && ('' == $filtro || 'main_contact_title' == $filtro)) || (is_array($filtro) && in_array('main_contact_title', $filtro)))
        $this->ValidateField_main_contact_title($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "main_contact_title";

      if ((!is_array($filtro) && ('' == $filtro || 'main_contact_img_id' == $filtro)) || (is_array($filtro) && in_array('main_contact_img_id', $filtro)))
        $this->ValidateField_main_contact_img_id($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "main_contact_img_id";

      if ((!is_array($filtro) && ('' == $filtro || 'memb_list' == $filtro)) || (is_array($filtro) && in_array('memb_list', $filtro)))
        $this->ValidateField_memb_list($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "memb_list";

      if ((!is_array($filtro) && ('' == $filtro || 'docs' == $filtro)) || (is_array($filtro) && in_array('docs', $filtro)))
        $this->ValidateField_docs($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "docs";

      if ((!is_array($filtro) && ('' == $filtro || 'client_pmts' == $filtro)) || (is_array($filtro) && in_array('client_pmts', $filtro)))
        $this->ValidateField_client_pmts($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "client_pmts";

      if ((!is_array($filtro) && ('' == $filtro || 'notes' == $filtro)) || (is_array($filtro) && in_array('notes', $filtro)))
        $this->ValidateField_notes($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName) && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "notes";

      $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros);
//-- converter datas   
          $this->nm_converte_datas();
//---

      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_bus_cat_id = $this->bus_cat_id;
    $original_bus_subcat_id = $this->bus_subcat_id;
    $original_client_id = $this->client_id;
    $original_js_client_id = $this->js_client_id;
    $original_js_mbr_ct = $this->js_mbr_ct;
    $original_js_prod_price = $this->js_prod_price;
    $original_js_strp_price_id = $this->js_strp_price_id;
}
  $this->members_ct();	

if ($this->membershipid != 0 && $this->nmgp_dados_form['membershipid'] != $this->membershipid ) {
    $check_sql = "SELECT 1 FROM clients WHERE MembershipID = " . $this->Db->qstr($this->membershipid );
     
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 


    if (isset($this->ds[0][0])) {
        
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Membership ID already exists. Please enter a different one.";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_form_clients_staff';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_form_clients_staff';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "Membership ID already exists. Please enter a different one.";
 }
;
        if (isset($this->Campos_Mens_erro) && !empty($this->Campos_Mens_erro))
{
    if ($this->NM_ajax_flag)
    {
        $_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'off';
        form_clients_staff_pack_ajax_response();
        exit;
    }
    $Sc_Lixo = ob_get_clean();
    $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro);
    $_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'off';
    $this->Campos_Mens_erro = "";
    if ($this->nmgp_opcao == "incluir") {$this->nmgp_opcao = "novo";};
    $this->nm_proc_onload();
    $this->nm_formatar_campos();
    $this->nm_gera_html();
    $this->NM_close_db();
    exit;
}
}
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_bus_cat_id != $this->bus_cat_id || (isset($bFlagRead_bus_cat_id) && $bFlagRead_bus_cat_id)))
    {
        $this->ajax_return_values_bus_cat_id(true);
    }
    if (($original_bus_subcat_id != $this->bus_subcat_id || (isset($bFlagRead_bus_subcat_id) && $bFlagRead_bus_subcat_id)))
    {
        $this->ajax_return_values_bus_subcat_id(true);
    }
    if (($original_client_id != $this->client_id || (isset($bFlagRead_client_id) && $bFlagRead_client_id)))
    {
        $this->ajax_return_values_client_id(true);
    }
    if (($original_js_client_id != $this->js_client_id || (isset($bFlagRead_js_client_id) && $bFlagRead_js_client_id)))
    {
        $this->ajax_return_values_js_client_id(true);
    }
    if (($original_js_mbr_ct != $this->js_mbr_ct || (isset($bFlagRead_js_mbr_ct) && $bFlagRead_js_mbr_ct)))
    {
        $this->ajax_return_values_js_mbr_ct(true);
    }
    if (($original_js_prod_price != $this->js_prod_price || (isset($bFlagRead_js_prod_price) && $bFlagRead_js_prod_price)))
    {
        $this->ajax_return_values_js_prod_price(true);
    }
    if (($original_js_strp_price_id != $this->js_strp_price_id || (isset($bFlagRead_js_strp_price_id) && $bFlagRead_js_strp_price_id)))
    {
        $this->ajax_return_values_js_strp_price_id(true);
    }
}
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'off'; 
      }
      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!empty($this->sc_force_zero))
          {
              foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
              {
                  eval('$this->' . $sc_force_zero_field . ' = "";');
                  unset($this->sc_force_zero[$i_force_zero]);
              }
          }
      }
   }

    function ValidateField_membershipid(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['membershipid'])) {
          nm_limpa_numero($this->membershipid, $this->field_config['membershipid']['symbol_grp']) ; 
          return;
      }
      if ($this->membershipid === "" || is_null($this->membershipid))  
      { 
          $this->membershipid = 0;
          $this->sc_force_zero[] = 'membershipid';
      } 
      nm_limpa_numero($this->membershipid, $this->field_config['membershipid']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->membershipid != '')  
          { 
              $iTestSize = 10;
              if (strlen($this->membershipid) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Membership No.: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['membershipid']))
                  {
                      $Campos_Erros['membershipid'] = array();
                  }
                  $Campos_Erros['membershipid'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['membershipid']) || !is_array($this->NM_ajax_info['errList']['membershipid']))
                  {
                      $this->NM_ajax_info['errList']['membershipid'] = array();
                  }
                  $this->NM_ajax_info['errList']['membershipid'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->membershipid, 10, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Membership No.; " ; 
                  if (!isset($Campos_Erros['membershipid']))
                  {
                      $Campos_Erros['membershipid'] = array();
                  }
                  $Campos_Erros['membershipid'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['membershipid']) || !is_array($this->NM_ajax_info['errList']['membershipid']))
                  {
                      $this->NM_ajax_info['errList']['membershipid'] = array();
                  }
                  $this->NM_ajax_info['errList']['membershipid'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'membershipid';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_membershipid

    function ValidateField_co_name(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['co_name'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['co_name']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['co_name'] == "on")) 
      { 
          if ($this->co_name == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Company Name" ; 
              if (!isset($Campos_Erros['co_name']))
              {
                  $Campos_Erros['co_name'] = array();
              }
              $Campos_Erros['co_name'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['co_name']) || !is_array($this->NM_ajax_info['errList']['co_name']))
                  {
                      $this->NM_ajax_info['errList']['co_name'] = array();
                  }
                  $this->NM_ajax_info['errList']['co_name'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->co_name) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Company Name " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['co_name']))
              {
                  $Campos_Erros['co_name'] = array();
              }
              $Campos_Erros['co_name'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['co_name']) || !is_array($this->NM_ajax_info['errList']['co_name']))
              {
                  $this->NM_ajax_info['errList']['co_name'] = array();
              }
              $this->NM_ajax_info['errList']['co_name'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'co_name';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_co_name

    function ValidateField_client_id(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['client_id'])) {
          nm_limpa_numero($this->client_id, $this->field_config['client_id']['symbol_grp']) ; 
          return;
      }
      if ($this->client_id === "" || is_null($this->client_id))  
      { 
          $this->client_id = 0;
      } 
      nm_limpa_numero($this->client_id, $this->field_config['client_id']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir" || 'validate_client_id' == $this->NM_ajax_opcao)
      { 
          if ($this->client_id != '')  
          { 
              $iTestSize = 10;
              if (strlen($this->client_id) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Membership No.: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['client_id']))
                  {
                      $Campos_Erros['client_id'] = array();
                  }
                  $Campos_Erros['client_id'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['client_id']) || !is_array($this->NM_ajax_info['errList']['client_id']))
                  {
                      $this->NM_ajax_info['errList']['client_id'] = array();
                  }
                  $this->NM_ajax_info['errList']['client_id'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->client_id, 10, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Membership No.; " ; 
                  if (!isset($Campos_Erros['client_id']))
                  {
                      $Campos_Erros['client_id'] = array();
                  }
                  $Campos_Erros['client_id'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['client_id']) || !is_array($this->NM_ajax_info['errList']['client_id']))
                  {
                      $this->NM_ajax_info['errList']['client_id'] = array();
                  }
                  $this->NM_ajax_info['errList']['client_id'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'client_id';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_client_id

    function ValidateField_mailing_address(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['mailing_address'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['mailing_address']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['mailing_address'] == "on")) 
      { 
          if ($this->mailing_address == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Mailing Address" ; 
              if (!isset($Campos_Erros['mailing_address']))
              {
                  $Campos_Erros['mailing_address'] = array();
              }
              $Campos_Erros['mailing_address'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['mailing_address']) || !is_array($this->NM_ajax_info['errList']['mailing_address']))
                  {
                      $this->NM_ajax_info['errList']['mailing_address'] = array();
                  }
                  $this->NM_ajax_info['errList']['mailing_address'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->mailing_address) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Mailing Address " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['mailing_address']))
              {
                  $Campos_Erros['mailing_address'] = array();
              }
              $Campos_Erros['mailing_address'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['mailing_address']) || !is_array($this->NM_ajax_info['errList']['mailing_address']))
              {
                  $this->NM_ajax_info['errList']['mailing_address'] = array();
              }
              $this->NM_ajax_info['errList']['mailing_address'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'mailing_address';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_mailing_address

    function ValidateField_memb_status_id(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['memb_status_id'])) {
       return;
   }
               if (!empty($this->memb_status_id) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_memb_status_id']) && !in_array($this->memb_status_id, $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_memb_status_id']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['memb_status_id']))
                   {
                       $Campos_Erros['memb_status_id'] = array();
                   }
                   $Campos_Erros['memb_status_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['memb_status_id']) || !is_array($this->NM_ajax_info['errList']['memb_status_id']))
                   {
                       $this->NM_ajax_info['errList']['memb_status_id'] = array();
                   }
                   $this->NM_ajax_info['errList']['memb_status_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'memb_status_id';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_memb_status_id

    function ValidateField_city(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['city'])) {
          return;
      }
      $this->city = ucfirst(substr($this->city, 0, 1)) . substr($this->city, 1); 
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['city']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['city'] == "on")) 
      { 
          if ($this->city == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "City" ; 
              if (!isset($Campos_Erros['city']))
              {
                  $Campos_Erros['city'] = array();
              }
              $Campos_Erros['city'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['city']) || !is_array($this->NM_ajax_info['errList']['city']))
                  {
                      $this->NM_ajax_info['errList']['city'] = array();
                  }
                  $this->NM_ajax_info['errList']['city'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->city) > 100) 
          { 
              $hasError = true;
              $Campos_Crit .= "City " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['city']))
              {
                  $Campos_Erros['city'] = array();
              }
              $Campos_Erros['city'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['city']) || !is_array($this->NM_ajax_info['errList']['city']))
              {
                  $this->NM_ajax_info['errList']['city'] = array();
              }
              $this->NM_ajax_info['errList']['city'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
          $this->city = ucfirst(substr($this->city, 0, 1)) . substr($this->city, 1); 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'city';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_city

    function ValidateField_pricing_level_id(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['pricing_level_id'])) {
       return;
   }
               if (!empty($this->pricing_level_id) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_pricing_level_id']) && !in_array($this->pricing_level_id, $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_pricing_level_id']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['pricing_level_id']))
                   {
                       $Campos_Erros['pricing_level_id'] = array();
                   }
                   $Campos_Erros['pricing_level_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['pricing_level_id']) || !is_array($this->NM_ajax_info['errList']['pricing_level_id']))
                   {
                       $this->NM_ajax_info['errList']['pricing_level_id'] = array();
                   }
                   $this->NM_ajax_info['errList']['pricing_level_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'pricing_level_id';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_pricing_level_id

    function ValidateField_state(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['state'])) {
          return;
      }
      $this->nm_tira_mask($this->state, "aa", "(){}[].,;:-+/ "); 
      $this->state = sc_strtoupper($this->state); 
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['state']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['state'] == "on")) 
      { 
          if ($this->state == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "State" ; 
              if (!isset($Campos_Erros['state']))
              {
                  $Campos_Erros['state'] = array();
              }
              $Campos_Erros['state'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['state']) || !is_array($this->NM_ajax_info['errList']['state']))
                  {
                      $this->NM_ajax_info['errList']['state'] = array();
                  }
                  $this->NM_ajax_info['errList']['state'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->state) > 2) 
          { 
              $hasError = true;
              $Campos_Crit .= "State " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['state']))
              {
                  $Campos_Erros['state'] = array();
              }
              $Campos_Erros['state'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['state']) || !is_array($this->NM_ajax_info['errList']['state']))
              {
                  $this->NM_ajax_info['errList']['state'] = array();
              }
              $this->NM_ajax_info['errList']['state'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'state';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_state

    function ValidateField_bus_cat_id(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['bus_cat_id'])) {
       return;
   }
      if ($this->bus_cat_id == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['bus_cat_id']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['bus_cat_id'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "Business Category" ; 
          if (!isset($Campos_Erros['bus_cat_id']))
          {
              $Campos_Erros['bus_cat_id'] = array();
          }
          $Campos_Erros['bus_cat_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['bus_cat_id']) || !is_array($this->NM_ajax_info['errList']['bus_cat_id']))
          {
              $this->NM_ajax_info['errList']['bus_cat_id'] = array();
          }
          $this->NM_ajax_info['errList']['bus_cat_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->bus_cat_id) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_cat_id']) && !in_array($this->bus_cat_id, $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_cat_id']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['bus_cat_id']))
              {
                  $Campos_Erros['bus_cat_id'] = array();
              }
              $Campos_Erros['bus_cat_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['bus_cat_id']) || !is_array($this->NM_ajax_info['errList']['bus_cat_id']))
              {
                  $this->NM_ajax_info['errList']['bus_cat_id'] = array();
              }
              $this->NM_ajax_info['errList']['bus_cat_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'bus_cat_id';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_bus_cat_id

    function ValidateField_zip_code(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['zip_code'])) {
          return;
      }
      $this->nm_tira_mask($this->zip_code, "99999-9999", "(){}[].,;:-+/ "); 
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['zip_code']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['zip_code'] == "on")) 
      { 
          if ($this->zip_code == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Zip Code" ; 
              if (!isset($Campos_Erros['zip_code']))
              {
                  $Campos_Erros['zip_code'] = array();
              }
              $Campos_Erros['zip_code'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['zip_code']) || !is_array($this->NM_ajax_info['errList']['zip_code']))
                  {
                      $this->NM_ajax_info['errList']['zip_code'] = array();
                  }
                  $this->NM_ajax_info['errList']['zip_code'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->zip_code) > 100) 
          { 
              $hasError = true;
              $Campos_Crit .= "Zip Code " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['zip_code']))
              {
                  $Campos_Erros['zip_code'] = array();
              }
              $Campos_Erros['zip_code'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['zip_code']) || !is_array($this->NM_ajax_info['errList']['zip_code']))
              {
                  $this->NM_ajax_info['errList']['zip_code'] = array();
              }
              $this->NM_ajax_info['errList']['zip_code'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'zip_code';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_zip_code

    function ValidateField_bus_subcat_id(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
   if (isset($this->Field_no_validate['bus_subcat_id'])) {
       return;
   }
      if ($this->bus_subcat_id == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['bus_subcat_id']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['bus_subcat_id'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "Subcategory" ; 
          if (!isset($Campos_Erros['bus_subcat_id']))
          {
              $Campos_Erros['bus_subcat_id'] = array();
          }
          $Campos_Erros['bus_subcat_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['bus_subcat_id']) || !is_array($this->NM_ajax_info['errList']['bus_subcat_id']))
          {
              $this->NM_ajax_info['errList']['bus_subcat_id'] = array();
          }
          $this->NM_ajax_info['errList']['bus_subcat_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->bus_subcat_id) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_subcat_id']) && !in_array($this->bus_subcat_id, $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_subcat_id']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['bus_subcat_id']))
              {
                  $Campos_Erros['bus_subcat_id'] = array();
              }
              $Campos_Erros['bus_subcat_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['bus_subcat_id']) || !is_array($this->NM_ajax_info['errList']['bus_subcat_id']))
              {
                  $this->NM_ajax_info['errList']['bus_subcat_id'] = array();
              }
              $this->NM_ajax_info['errList']['bus_subcat_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'bus_subcat_id';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_bus_subcat_id

    function ValidateField_permanent_member_date(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->permanent_member_date, $this->field_config['permanent_member_date']['date_sep']) ; 
      if (isset($this->Field_no_validate['permanent_member_date'])) {
          return;
      }
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['permanent_member_date']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['permanent_member_date']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['permanent_member_date']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['permanent_member_date']['date_sep']) ; 
          if (trim($this->permanent_member_date) != "")  
          { 
              $validateTest = $teste_validade->Data($this->permanent_member_date, $Format_Data, $trab_dt_min, $trab_dt_max);
              if ($validateTest == false)
              { 
                  $hasError = true;
                  $Campos_Crit .= "Member since; " ; 
                  if (!isset($Campos_Erros['permanent_member_date']))
                  {
                      $Campos_Erros['permanent_member_date'] = array();
                  }
                  $Campos_Erros['permanent_member_date'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['permanent_member_date']) || !is_array($this->NM_ajax_info['errList']['permanent_member_date']))
                  {
                      $this->NM_ajax_info['errList']['permanent_member_date'] = array();
                  }
                  $this->NM_ajax_info['errList']['permanent_member_date'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['permanent_member_date']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'permanent_member_date';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_permanent_member_date

    function ValidateField_bus_subcat_other(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['bus_subcat_other'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->bus_subcat_other) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "If Other " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['bus_subcat_other']))
              {
                  $Campos_Erros['bus_subcat_other'] = array();
              }
              $Campos_Erros['bus_subcat_other'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['bus_subcat_other']) || !is_array($this->NM_ajax_info['errList']['bus_subcat_other']))
              {
                  $this->NM_ajax_info['errList']['bus_subcat_other'] = array();
              }
              $this->NM_ajax_info['errList']['bus_subcat_other'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'bus_subcat_other';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_bus_subcat_other

    function ValidateField_renewal_date(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->renewal_date, $this->field_config['renewal_date']['date_sep']) ; 
      if (isset($this->Field_no_validate['renewal_date'])) {
          return;
      }
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['renewal_date']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['renewal_date']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['renewal_date']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['renewal_date']['date_sep']) ; 
          if (trim($this->renewal_date) != "")  
          { 
              $validateTest = $teste_validade->Data($this->renewal_date, $Format_Data, $trab_dt_min, $trab_dt_max);
              if ($validateTest == false)
              { 
                  $hasError = true;
                  $Campos_Crit .= "Renewal Date; " ; 
                  if (!isset($Campos_Erros['renewal_date']))
                  {
                      $Campos_Erros['renewal_date'] = array();
                  }
                  $Campos_Erros['renewal_date'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['renewal_date']) || !is_array($this->NM_ajax_info['errList']['renewal_date']))
                  {
                      $this->NM_ajax_info['errList']['renewal_date'] = array();
                  }
                  $this->NM_ajax_info['errList']['renewal_date'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['renewal_date']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'renewal_date';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_renewal_date

    function ValidateField_acct_instagram(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['acct_instagram'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->acct_instagram) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'acct_instagram';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_acct_instagram

    function ValidateField_website_url(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['website_url'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->website_url) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'website_url';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_website_url

    function ValidateField_acct_facebook(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['acct_facebook'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->acct_facebook) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'acct_facebook';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_acct_facebook

    function ValidateField_js_prod_price(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['js_prod_price'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->js_prod_price) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "js_prod_price " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['js_prod_price']))
              {
                  $Campos_Erros['js_prod_price'] = array();
              }
              $Campos_Erros['js_prod_price'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['js_prod_price']) || !is_array($this->NM_ajax_info['errList']['js_prod_price']))
              {
                  $this->NM_ajax_info['errList']['js_prod_price'] = array();
              }
              $this->NM_ajax_info['errList']['js_prod_price'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'js_prod_price';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_js_prod_price

    function ValidateField_js_strp_price_id(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['js_strp_price_id'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->js_strp_price_id) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "js_strp_price_id " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['js_strp_price_id']))
              {
                  $Campos_Erros['js_strp_price_id'] = array();
              }
              $Campos_Erros['js_strp_price_id'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['js_strp_price_id']) || !is_array($this->NM_ajax_info['errList']['js_strp_price_id']))
              {
                  $this->NM_ajax_info['errList']['js_strp_price_id'] = array();
              }
              $this->NM_ajax_info['errList']['js_strp_price_id'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'js_strp_price_id';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_js_strp_price_id

    function ValidateField_js_mbr_ct(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['js_mbr_ct'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->js_mbr_ct) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "js_mbr_ct " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['js_mbr_ct']))
              {
                  $Campos_Erros['js_mbr_ct'] = array();
              }
              $Campos_Erros['js_mbr_ct'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['js_mbr_ct']) || !is_array($this->NM_ajax_info['errList']['js_mbr_ct']))
              {
                  $this->NM_ajax_info['errList']['js_mbr_ct'] = array();
              }
              $this->NM_ajax_info['errList']['js_mbr_ct'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'js_mbr_ct';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_js_mbr_ct

    function ValidateField_js_client_id(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['js_client_id'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->js_client_id) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "js_client_id " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['js_client_id']))
              {
                  $Campos_Erros['js_client_id'] = array();
              }
              $Campos_Erros['js_client_id'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['js_client_id']) || !is_array($this->NM_ajax_info['errList']['js_client_id']))
              {
                  $this->NM_ajax_info['errList']['js_client_id'] = array();
              }
              $this->NM_ajax_info['errList']['js_client_id'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'js_client_id';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_js_client_id

    function ValidateField_main_contact_name(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['main_contact_name'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['main_contact_name']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['main_contact_name'] == "on")) 
      { 
          if ($this->main_contact_name == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Contact Name" ; 
              if (!isset($Campos_Erros['main_contact_name']))
              {
                  $Campos_Erros['main_contact_name'] = array();
              }
              $Campos_Erros['main_contact_name'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['main_contact_name']) || !is_array($this->NM_ajax_info['errList']['main_contact_name']))
                  {
                      $this->NM_ajax_info['errList']['main_contact_name'] = array();
                  }
                  $this->NM_ajax_info['errList']['main_contact_name'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->main_contact_name) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Contact Name " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['main_contact_name']))
              {
                  $Campos_Erros['main_contact_name'] = array();
              }
              $Campos_Erros['main_contact_name'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['main_contact_name']) || !is_array($this->NM_ajax_info['errList']['main_contact_name']))
              {
                  $this->NM_ajax_info['errList']['main_contact_name'] = array();
              }
              $this->NM_ajax_info['errList']['main_contact_name'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'main_contact_name';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_main_contact_name

    function ValidateField_main_contact_phone(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['main_contact_phone'])) {
          return;
      }
      $this->nm_tira_mask($this->main_contact_phone, "(999) 999 - 9999", "(){}[].,;:-+/ "); 
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['main_contact_phone']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['main_contact_phone'] == "on")) 
      { 
          if ($this->main_contact_phone == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Contact Phone" ; 
              if (!isset($Campos_Erros['main_contact_phone']))
              {
                  $Campos_Erros['main_contact_phone'] = array();
              }
              $Campos_Erros['main_contact_phone'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['main_contact_phone']) || !is_array($this->NM_ajax_info['errList']['main_contact_phone']))
                  {
                      $this->NM_ajax_info['errList']['main_contact_phone'] = array();
                  }
                  $this->NM_ajax_info['errList']['main_contact_phone'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->main_contact_phone) > 100) 
          { 
              $hasError = true;
              $Campos_Crit .= "Contact Phone " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['main_contact_phone']))
              {
                  $Campos_Erros['main_contact_phone'] = array();
              }
              $Campos_Erros['main_contact_phone'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['main_contact_phone']) || !is_array($this->NM_ajax_info['errList']['main_contact_phone']))
              {
                  $this->NM_ajax_info['errList']['main_contact_phone'] = array();
              }
              $this->NM_ajax_info['errList']['main_contact_phone'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'main_contact_phone';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_main_contact_phone

    function ValidateField_main_contact_email(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['main_contact_email'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->main_contact_email) != "")  
          { 
              if ($teste_validade->Email($this->main_contact_email) == false)  
              { 
                  $hasError = true;
                      $Campos_Crit .= "Contact Email; " ; 
                  if (!isset($Campos_Erros['main_contact_email']))
                  {
                      $Campos_Erros['main_contact_email'] = array();
                  }
                  $Campos_Erros['main_contact_email'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                      if (!isset($this->NM_ajax_info['errList']['main_contact_email']) || !is_array($this->NM_ajax_info['errList']['main_contact_email']))
                      {
                          $this->NM_ajax_info['errList']['main_contact_email'] = array();
                      }
                      $this->NM_ajax_info['errList']['main_contact_email'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['main_contact_email']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['main_contact_email'] == "on") 
          { 
              $hasError = true;
              $Campos_Falta[] = "Contact Email" ; 
              if (!isset($Campos_Erros['main_contact_email']))
              {
                  $Campos_Erros['main_contact_email'] = array();
              }
              $Campos_Erros['main_contact_email'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['main_contact_email']) || !is_array($this->NM_ajax_info['errList']['main_contact_email']))
                  {
                      $this->NM_ajax_info['errList']['main_contact_email'] = array();
                  }
                  $this->NM_ajax_info['errList']['main_contact_email'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'main_contact_email';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_main_contact_email

    function ValidateField_main_contact_title(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['main_contact_title'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['main_contact_title']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['main_contact_title'] == "on")) 
      { 
          if ($this->main_contact_title == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Contact Title" ; 
              if (!isset($Campos_Erros['main_contact_title']))
              {
                  $Campos_Erros['main_contact_title'] = array();
              }
              $Campos_Erros['main_contact_title'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['main_contact_title']) || !is_array($this->NM_ajax_info['errList']['main_contact_title']))
                  {
                      $this->NM_ajax_info['errList']['main_contact_title'] = array();
                  }
                  $this->NM_ajax_info['errList']['main_contact_title'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->main_contact_title) > 100) 
          { 
              $hasError = true;
              $Campos_Crit .= "Contact Title " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['main_contact_title']))
              {
                  $Campos_Erros['main_contact_title'] = array();
              }
              $Campos_Erros['main_contact_title'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['main_contact_title']) || !is_array($this->NM_ajax_info['errList']['main_contact_title']))
              {
                  $this->NM_ajax_info['errList']['main_contact_title'] = array();
              }
              $this->NM_ajax_info['errList']['main_contact_title'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'main_contact_title';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_main_contact_title

    function ValidateField_main_contact_img_id(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['main_contact_img_id'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['main_contact_img_id']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['main_contact_img_id'] == "on")) 
      { 
          if (($this->main_contact_img_id == "" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dados_select']['main_contact_img_id'] == "") || "S" == $this->main_contact_img_id_limpa)
          { 
              $hasError = true;
              $Campos_Falta[] =  "Contact Driver<br>License or ID" ; 
              if (!isset($Campos_Erros['main_contact_img_id']))
              {
                  $Campos_Erros['main_contact_img_id'] = array();
              }
              $Campos_Erros['main_contact_img_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['main_contact_img_id']) || !is_array($this->NM_ajax_info['errList']['main_contact_img_id']))
                  {
                      $this->NM_ajax_info['errList']['main_contact_img_id'] = array();
                  }
                  $this->NM_ajax_info['errList']['main_contact_img_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
        if ($this->nmgp_opcao != "excluir")
        {
            $sTestFile = $this->main_contact_img_id;
            if ("" != $this->main_contact_img_id && "S" != $this->main_contact_img_id_limpa && !$teste_validade->ArqExtensao($this->main_contact_img_id, array('jpg', 'jpeg', 'png', 'tiff', 'gif', 'bmp', 'pdf')))
            {
                $hasError = true;
                $Campos_Crit .= "Contact Driver<br>License or ID: " . $this->Ini->Nm_lang['lang_errm_file_invl']; 
                if (!isset($Campos_Erros['main_contact_img_id']))
                {
                    $Campos_Erros['main_contact_img_id'] = array();
                }
                $Campos_Erros['main_contact_img_id'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                if (!isset($this->NM_ajax_info['errList']['main_contact_img_id']) || !is_array($this->NM_ajax_info['errList']['main_contact_img_id']))
                {
                    $this->NM_ajax_info['errList']['main_contact_img_id'] = array();
                }
                $this->NM_ajax_info['errList']['main_contact_img_id'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
            }
            if (!$hasError && "" != $this->main_contact_img_id && "S" != $this->main_contact_img_id_limpa) {
                if (!function_exists('sc_upload_unprotect_chars')) {
                    include_once 'form_clients_staff_doc_name.php';
                }
                $pathParts = pathinfo(sc_upload_unprotect_chars($sTestFile));
                $fileSize = filesize(sc_upload_unprotect_chars($sTestFile));
                $sizeErrorSuffix = '';
                if ('jpg' == strtolower($pathParts['extension']) && 5242880 < $fileSize) {
                    $sizeErrorSuffix = ' (JPG < 5 MB)';
                    $hasError = true;
                }
                if ('jpeg' == strtolower($pathParts['extension']) && 5242880 < $fileSize) {
                    $sizeErrorSuffix = ' (JPEG < 5 MB)';
                    $hasError = true;
                }
                if ('png' == strtolower($pathParts['extension']) && 5242880 < $fileSize) {
                    $sizeErrorSuffix = ' (PNG < 5 MB)';
                    $hasError = true;
                }
                if ('tiff' == strtolower($pathParts['extension']) && 5242880 < $fileSize) {
                    $sizeErrorSuffix = ' (TIFF < 5 MB)';
                    $hasError = true;
                }
                if ('gif' == strtolower($pathParts['extension']) && 5242880 < $fileSize) {
                    $sizeErrorSuffix = ' (GIF < 5 MB)';
                    $hasError = true;
                }
                if ('bmp' == strtolower($pathParts['extension']) && 5242880 < $fileSize) {
                    $sizeErrorSuffix = ' (BMP < 5 MB)';
                    $hasError = true;
                }
                if ('pdf' == strtolower($pathParts['extension']) && 5242880 < $fileSize) {
                    $sizeErrorSuffix = ' (PDF < 5 MB)';
                    $hasError = true;
                }
                if ($hasError) {
                    $Campos_Crit .= "Contact Driver<br>License or ID: " . $this->Ini->Nm_lang['lang_errm_file_size'] . $sizeErrorSuffix;
                    if (!isset($Campos_Erros['main_contact_img_id']))
                    {
                        $Campos_Erros['main_contact_img_id'] = array();
                    }
                    $Campos_Erros['main_contact_img_id'][] = $this->Ini->Nm_lang['lang_errm_file_size'] . $sizeErrorSuffix;
                    if (!isset($this->NM_ajax_info['errList']['main_contact_img_id']) || !is_array($this->NM_ajax_info['errList']['main_contact_img_id']))
                    {
                        $this->NM_ajax_info['errList']['main_contact_img_id'] = array();
                    }
                    $this->NM_ajax_info['errList']['main_contact_img_id'][] = $this->Ini->Nm_lang['lang_errm_file_size'] . $sizeErrorSuffix;
                }
            }
        }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'main_contact_img_id';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_main_contact_img_id

    function ValidateField_memb_list(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['memb_list'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->memb_list) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'memb_list';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_memb_list

    function ValidateField_docs(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['docs'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->docs) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'docs';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_docs

    function ValidateField_client_pmts(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['client_pmts'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->client_pmts) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'client_pmts';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_client_pmts

    function ValidateField_notes(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (isset($this->Field_no_validate['notes'])) {
          return;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->notes) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'notes';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_notes
//
//--------------------------------------------------------------------------------------
   function upload_img_doc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser;
     if (!empty($Campos_Crit) || !empty($Campos_Falta))
     {
          return;
     }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->nmgp_opcao == "incluir" && ($this->main_contact_img_id == "none" || ($this->main_contact_img_id == "" && $this->main_contact_img_id_salva == "")) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['main_contact_img_id']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['php_cmp_required']['main_contact_img_id'] == "on")) 
          { 
              $Campos_Falta[] = "Contact Driver<br>License or ID" ; 
              if (!isset($Campos_Erros['main_contact_img_id']))
              {
                  $Campos_Erros['main_contact_img_id'] = array();
              }
              $Campos_Erros['main_contact_img_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['main_contact_img_id']) || !is_array($this->NM_ajax_info['errList']['main_contact_img_id']))
                  {
                      $this->NM_ajax_info['errList']['main_contact_img_id'] = array();
                  }
                  $this->NM_ajax_info['errList']['main_contact_img_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
          if ($this->main_contact_img_id == "none") 
          { 
              $this->main_contact_img_id = ""; 
          } 
          if ($this->main_contact_img_id != "") 
          { 
              if (!function_exists('sc_upload_unprotect_chars'))
              {
                  include_once 'form_clients_staff_doc_name.php';
              }
              $this->main_contact_img_id = sc_upload_unprotect_chars($this->main_contact_img_id, true);
              $this->main_contact_img_id_scfile_name = sc_upload_unprotect_chars($this->main_contact_img_id_scfile_name, true);
              if (!is_file($this->main_contact_img_id) && isset($_SESSION['scriptcase']['charset']) && $_SESSION['scriptcase']['charset'] != 'UTF-8') {
                  $mbConvertFileName = mb_convert_encoding($this->main_contact_img_id, $_SESSION['scriptcase']['charset'], 'UTF-8');
                  $mbConvertScFileName = mb_convert_encoding($this->main_contact_img_id_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
                  if (is_file($mbConvertFileName)) {
                      $this->main_contact_img_id = $mbConvertFileName;
                      $this->main_contact_img_id_scfile_name = $mbConvertScFileName;
                  }
              }
              if (is_file($this->main_contact_img_id))  
              { 
                  $this->NM_size_docs[$this->main_contact_img_id_scfile_name] = $this->sc_file_size($this->main_contact_img_id);
                  $this->main_contact_img_file = $this->main_contact_img_id_scfile_name;
                  $this->main_contact_img_size = $this->NM_size_docs[$this->main_contact_img_id_scfile_name];
                  $reg_main_contact_img_id = file_get_contents($this->main_contact_img_id); 
                  $this->main_contact_img_id = $reg_main_contact_img_id; 
              } 
              else 
              { 
                  $Campos_Crit .= "Contact Driver<br>License or ID " . $this->Ini->Nm_lang['lang_errm_upld']; 
                  $this->main_contact_img_id = "";
                  if (!isset($Campos_Erros['main_contact_img_id']))
                  {
                      $Campos_Erros['main_contact_img_id'] = array();
                  }
                  $Campos_Erros['main_contact_img_id'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                  if (!isset($this->NM_ajax_info['errList']['main_contact_img_id']) || !is_array($this->NM_ajax_info['errList']['main_contact_img_id']))
                  {
                      $this->NM_ajax_info['errList']['main_contact_img_id'] = array();
                  }
                  $this->NM_ajax_info['errList']['main_contact_img_id'][] = $this->Ini->Nm_lang['lang_errm_upld'];
              } 
          } 
      } 
   }

    function removeDuplicateDttmError($aErrDate, &$aErrTime)
    {
        if (empty($aErrDate) || empty($aErrTime))
        {
            return;
        }

        foreach ($aErrDate as $sErrDate)
        {
            foreach ($aErrTime as $iErrTime => $sErrTime)
            {
                if ($sErrDate == $sErrTime)
                {
                    unset($aErrTime[$iErrTime]);
                }
            }
        }
    } // removeDuplicateDttmError

   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['dummy02'] = $this->dummy02;
    $this->nmgp_dados_form['membershipid'] = $this->membershipid;
    $this->nmgp_dados_form['co_name'] = $this->co_name;
    $this->nmgp_dados_form['client_id'] = $this->client_id;
    $this->nmgp_dados_form['mailing_address'] = $this->mailing_address;
    $this->nmgp_dados_form['memb_status_id'] = $this->memb_status_id;
    $this->nmgp_dados_form['city'] = $this->city;
    $this->nmgp_dados_form['pricing_level_id'] = $this->pricing_level_id;
    $this->nmgp_dados_form['state'] = $this->state;
    $this->nmgp_dados_form['bus_cat_id'] = $this->bus_cat_id;
    $this->nmgp_dados_form['zip_code'] = $this->zip_code;
    $this->nmgp_dados_form['bus_subcat_id'] = $this->bus_subcat_id;
    $this->nmgp_dados_form['permanent_member_date'] = (strlen(trim($this->permanent_member_date)) > 19) ? str_replace(".", ":", $this->permanent_member_date) : trim($this->permanent_member_date);
    $this->nmgp_dados_form['bus_subcat_other'] = $this->bus_subcat_other;
    $this->nmgp_dados_form['renewal_date'] = (strlen(trim($this->renewal_date)) > 19) ? str_replace(".", ":", $this->renewal_date) : trim($this->renewal_date);
    $this->nmgp_dados_form['acct_instagram'] = $this->acct_instagram;
    $this->nmgp_dados_form['website_url'] = $this->website_url;
    $this->nmgp_dados_form['acct_facebook'] = $this->acct_facebook;
    $this->nmgp_dados_form['js_prod_price'] = $this->js_prod_price;
    $this->nmgp_dados_form['js_strp_price_id'] = $this->js_strp_price_id;
    $this->nmgp_dados_form['js_mbr_ct'] = $this->js_mbr_ct;
    $this->nmgp_dados_form['js_client_id'] = $this->js_client_id;
    $this->nmgp_dados_form['dummy07'] = $this->dummy07;
    $this->nmgp_dados_form['dummy08'] = $this->dummy08;
    $this->nmgp_dados_form['main_contact_name'] = $this->main_contact_name;
    $this->nmgp_dados_form['main_contact_phone'] = $this->main_contact_phone;
    $this->nmgp_dados_form['main_contact_email'] = $this->main_contact_email;
    $this->nmgp_dados_form['main_contact_title'] = $this->main_contact_title;
    if (empty($this->main_contact_img_id))
    {
        $this->main_contact_img_id = $this->nmgp_dados_form['main_contact_img_id'];
    }
    $this->nmgp_dados_form['main_contact_img_id'] = $this->main_contact_img_id;
    $this->nmgp_dados_form['main_contact_img_id_limpa'] = $this->main_contact_img_id_limpa;
    $this->nmgp_dados_form['memb_list'] = $this->memb_list;
    $this->nmgp_dados_form['docs'] = $this->docs;
    $this->nmgp_dados_form['client_pmts'] = $this->client_pmts;
    $this->nmgp_dados_form['notes'] = $this->notes;
    $this->nmgp_dados_form['appn_id'] = $this->appn_id;
    $this->nmgp_dados_form['ofa_contact'] = $this->ofa_contact;
    $this->nmgp_dados_form['street_address'] = $this->street_address;
    $this->nmgp_dados_form['phone_number'] = $this->phone_number;
    $this->nmgp_dados_form['home_phone'] = $this->home_phone;
    $this->nmgp_dados_form['fax_number'] = $this->fax_number;
    $this->nmgp_dados_form['email'] = $this->email;
    $this->nmgp_dados_form['business_type'] = $this->business_type;
    $this->nmgp_dados_form['fresh_cut_allowed'] = $this->fresh_cut_allowed;
    $this->nmgp_dados_form['business_license'] = $this->business_license;
    $this->nmgp_dados_form['nursery_license'] = $this->nursery_license;
    $this->nmgp_dados_form['federal_tax_id'] = $this->federal_tax_id;
    $this->nmgp_dados_form['temporary_pass'] = $this->temporary_pass;
    $this->nmgp_dados_form['ofa_member'] = $this->ofa_member;
    $this->nmgp_dados_form['starting_date'] = $this->starting_date;
    $this->nmgp_dados_form['expiration_date'] = $this->expiration_date;
    $this->nmgp_dados_form['canceled'] = $this->canceled;
    $this->nmgp_dados_form['cancel_date'] = $this->cancel_date;
    $this->nmgp_dados_form['canceled_by'] = $this->canceled_by;
    $this->nmgp_dados_form['reason_canceled'] = $this->reason_canceled;
    $this->nmgp_dados_form['retire_date'] = $this->retire_date;
    $this->nmgp_dados_form['verified_receipts'] = $this->verified_receipts;
    $this->nmgp_dados_form['date_last_updated'] = $this->date_last_updated;
    $this->nmgp_dados_form['restricted'] = $this->restricted;
    $this->nmgp_dados_form['committee_approval_required'] = $this->committee_approval_required;
    $this->nmgp_dados_form['type_company'] = $this->type_company;
    $this->nmgp_dados_form['archive'] = $this->archive;
    $this->nmgp_dados_form['archive_date'] = $this->archive_date;
    $this->nmgp_dados_form['store_front_address'] = $this->store_front_address;
    $this->nmgp_dados_form['store_front_city'] = $this->store_front_city;
    $this->nmgp_dados_form['store_front_zip'] = $this->store_front_zip;
    $this->nmgp_dados_form['home_base_address'] = $this->home_base_address;
    $this->nmgp_dados_form['home_base_city'] = $this->home_base_city;
    $this->nmgp_dados_form['home_base_zip'] = $this->home_base_zip;
    $this->nmgp_dados_form['store_front_state'] = $this->store_front_state;
    $this->nmgp_dados_form['home_base_state'] = $this->home_base_state;
    $this->nmgp_dados_form['record_created'] = $this->record_created;
    $this->nmgp_dados_form['appn_date'] = $this->appn_date;
    $this->nmgp_dados_form['appn_note'] = $this->appn_note;
    if (empty($this->doc_sec_of_state))
    {
        $this->doc_sec_of_state = $this->nmgp_dados_form['doc_sec_of_state'];
    }
    $this->nmgp_dados_form['doc_sec_of_state'] = $this->doc_sec_of_state;
    $this->nmgp_dados_form['doc_sec_of_state_limpa'] = $this->doc_sec_of_state_limpa;
    if (empty($this->doc_city_bus_lic))
    {
        $this->doc_city_bus_lic = $this->nmgp_dados_form['doc_city_bus_lic'];
    }
    $this->nmgp_dados_form['doc_city_bus_lic'] = $this->doc_city_bus_lic;
    $this->nmgp_dados_form['doc_city_bus_lic_limpa'] = $this->doc_city_bus_lic_limpa;
    if (empty($this->doc_agric_lic))
    {
        $this->doc_agric_lic = $this->nmgp_dados_form['doc_agric_lic'];
    }
    $this->nmgp_dados_form['doc_agric_lic'] = $this->doc_agric_lic;
    $this->nmgp_dados_form['doc_agric_lic_limpa'] = $this->doc_agric_lic_limpa;
    if (empty($this->doc_last_year_tax))
    {
        $this->doc_last_year_tax = $this->nmgp_dados_form['doc_last_year_tax'];
    }
    $this->nmgp_dados_form['doc_last_year_tax'] = $this->doc_last_year_tax;
    $this->nmgp_dados_form['doc_last_year_tax_limpa'] = $this->doc_last_year_tax_limpa;
    $this->nmgp_dados_form['qb_id'] = $this->qb_id;
    $this->nmgp_dados_form['main_contact_img_file'] = $this->main_contact_img_file;
    $this->nmgp_dados_form['main_contact_img_size'] = $this->main_contact_img_size;
    if (empty($this->main_contact_img_id_prev))
    {
        $this->main_contact_img_id_prev = $this->nmgp_dados_form['main_contact_img_id_prev'];
    }
    $this->nmgp_dados_form['main_contact_img_id_prev'] = $this->main_contact_img_id_prev;
    $this->nmgp_dados_form['main_contact_img_id_prev_limpa'] = $this->main_contact_img_id_prev_limpa;
    $this->nmgp_dados_form['memb_qty'] = $this->memb_qty;
    $this->nmgp_dados_form['doc_type'] = $this->doc_type;
    if (empty($this->doc_file))
    {
        $this->doc_file = $this->nmgp_dados_form['doc_file'];
    }
    $this->nmgp_dados_form['doc_file'] = $this->doc_file;
    $this->nmgp_dados_form['doc_file_limpa'] = $this->doc_file_limpa;
    $this->nmgp_dados_form['doc_filename'] = $this->doc_filename;
    $this->nmgp_dados_form['doc_filesize'] = $this->doc_filesize;
    $this->nmgp_dados_form['applicant_name'] = $this->applicant_name;
    if (empty($this->applicant_signature))
    {
        $this->applicant_signature = $this->nmgp_dados_form['applicant_signature'];
    }
    $this->nmgp_dados_form['applicant_signature'] = $this->applicant_signature;
    $this->nmgp_dados_form['applicant_signature_limpa'] = $this->applicant_signature_limpa;
    $this->nmgp_dados_form['applicant_title'] = $this->applicant_title;
    $this->nmgp_dados_form['addtl_memb_mail'] = $this->addtl_memb_mail;
    $this->nmgp_dados_form['adtl_memb_name'] = $this->adtl_memb_name;
    $this->nmgp_dados_form['adtl_memb_note'] = $this->adtl_memb_note;
    $this->nmgp_dados_form['adtl_memb_phone'] = $this->adtl_memb_phone;
    $this->nmgp_dados_form['dummy01'] = $this->dummy01;
    $this->nmgp_dados_form['dummy03'] = $this->dummy03;
    $this->nmgp_dados_form['dummy04'] = $this->dummy04;
    $this->nmgp_dados_form['dummy05'] = $this->dummy05;
    $this->nmgp_dados_form['dummy06'] = $this->dummy06;
    $this->nmgp_dados_form['dummy09'] = $this->dummy09;
    $this->nmgp_dados_form['dummy10'] = $this->dummy10;
    $this->nmgp_dados_form['dummy11'] = $this->dummy11;
    $this->nmgp_dados_form['dummy12'] = $this->dummy12;
    $this->nmgp_dados_form['dummy13'] = $this->dummy13;
    $this->nmgp_dados_form['est_memb_cost'] = $this->est_memb_cost;
    $this->nmgp_dados_form['main_contact_title_lbl'] = $this->main_contact_title_lbl;
    $this->nmgp_dados_form['memb_01'] = $this->memb_01;
    $this->nmgp_dados_form['memb_02'] = $this->memb_02;
    $this->nmgp_dados_form['memb_03'] = $this->memb_03;
    $this->nmgp_dados_form['memb_04'] = $this->memb_04;
    $this->nmgp_dados_form['memb_05'] = $this->memb_05;
    $this->nmgp_dados_form['memb_06'] = $this->memb_06;
    $this->nmgp_dados_form['memb_07'] = $this->memb_07;
    $this->nmgp_dados_form['memb_08'] = $this->memb_08;
    $this->nmgp_dados_form['memb_09'] = $this->memb_09;
    $this->nmgp_dados_form['memb_10'] = $this->memb_10;
    $this->nmgp_dados_form['memb_11'] = $this->memb_11;
    $this->nmgp_dados_form['memb_12'] = $this->memb_12;
    $this->nmgp_dados_form['memb_13'] = $this->memb_13;
    $this->nmgp_dados_form['memb_email'] = $this->memb_email;
    $this->nmgp_dados_form['memb_levels'] = $this->memb_levels;
    $this->nmgp_dados_form['memb_name'] = $this->memb_name;
    $this->nmgp_dados_form['memb_note'] = $this->memb_note;
    $this->nmgp_dados_form['memb_phone'] = $this->memb_phone;
    $this->nmgp_dados_form['paid'] = $this->paid;
    $this->nmgp_dados_form['pay'] = $this->pay;
    $this->nmgp_dados_form['read_at_sign'] = $this->read_at_sign;
    $this->nmgp_dados_form['rules'] = $this->rules;
    $this->nmgp_dados_form['rules_warn'] = $this->rules_warn;
    $this->nmgp_dados_form['submitted'] = $this->submitted;
    $this->nmgp_dados_form['transaction'] = $this->transaction;
    $this->nmgp_dados_form['xlsx_sample'] = $this->xlsx_sample;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['membershipid'] = $this->membershipid;
      nm_limpa_numero($this->membershipid, $this->field_config['membershipid']['symbol_grp']) ; 
      $this->Before_unformat['client_id'] = $this->client_id;
      nm_limpa_numero($this->client_id, $this->field_config['client_id']['symbol_grp']) ; 
      $this->Before_unformat['state'] = $this->state;
      $this->nm_tira_mask($this->state, "aa", "(){}[].,;:-+/ "); 
      $this->Before_unformat['zip_code'] = $this->zip_code;
      $this->nm_tira_mask($this->zip_code, "99999-9999", "(){}[].,;:-+/ "); 
      $this->Before_unformat['permanent_member_date'] = $this->permanent_member_date;
      nm_limpa_data($this->permanent_member_date, $this->field_config['permanent_member_date']['date_sep']) ; 
      $this->Before_unformat['renewal_date'] = $this->renewal_date;
      nm_limpa_data($this->renewal_date, $this->field_config['renewal_date']['date_sep']) ; 
      $this->Before_unformat['main_contact_phone'] = $this->main_contact_phone;
      $this->nm_tira_mask($this->main_contact_phone, "(999) 999 - 9999", "(){}[].,;:-+/ "); 
      $this->Before_unformat['appn_id'] = $this->appn_id;
      nm_limpa_numero($this->appn_id, $this->field_config['appn_id']['symbol_grp']) ; 
      $this->Before_unformat['phone_number'] = $this->phone_number;
      $this->nm_tira_mask($this->phone_number, "(999) 999 - 9999", "(){}[].,;:-+/ "); 
      $this->Before_unformat['starting_date'] = $this->starting_date;
      nm_limpa_data($this->starting_date, $this->field_config['starting_date']['date_sep']) ; 
      $this->Before_unformat['expiration_date'] = $this->expiration_date;
      nm_limpa_data($this->expiration_date, $this->field_config['expiration_date']['date_sep']) ; 
      $this->Before_unformat['cancel_date'] = $this->cancel_date;
      nm_limpa_data($this->cancel_date, $this->field_config['cancel_date']['date_sep']) ; 
      $this->Before_unformat['retire_date'] = $this->retire_date;
      nm_limpa_data($this->retire_date, $this->field_config['retire_date']['date_sep']) ; 
      $this->Before_unformat['date_last_updated'] = $this->date_last_updated;
      nm_limpa_data($this->date_last_updated, $this->field_config['date_last_updated']['date_sep']) ; 
      $this->Before_unformat['archive_date'] = $this->archive_date;
      nm_limpa_data($this->archive_date, $this->field_config['archive_date']['date_sep']) ; 
      $this->Before_unformat['record_created'] = $this->record_created;
      $this->Before_unformat['record_created_hora'] = $this->record_created_hora;
      nm_limpa_data($this->record_created, $this->field_config['record_created']['date_sep']) ; 
      nm_limpa_hora($this->record_created_hora, $this->field_config['record_created']['time_sep']) ; 
      $this->Before_unformat['appn_date'] = $this->appn_date;
      nm_limpa_data($this->appn_date, $this->field_config['appn_date']['date_sep']) ; 
      $this->Before_unformat['qb_id'] = $this->qb_id;
      nm_limpa_numero($this->qb_id, $this->field_config['qb_id']['symbol_grp']) ; 
      $this->Before_unformat['memb_qty'] = $this->memb_qty;
      nm_limpa_numero($this->memb_qty, $this->field_config['memb_qty']['symbol_grp']) ; 
      $this->Before_unformat['submitted'] = $this->submitted;
      nm_limpa_data($this->submitted, $this->field_config['submitted']['date_sep']) ; 
   }
   function sc_add_currency(&$value, $symbol, $pos)
   {
       if ('' == $value)
       {
           return;
       }
       $value = (1 == $pos || 3 == $pos) ? $symbol . ' ' . $value : $value . ' ' . $symbol;
   }
   function sc_remove_currency(&$value, $symbol_dec, $symbol_tho, $symbol_mon)
   {
       $value = preg_replace('~&#x0*([0-9a-f]+);~i', '', $value);
       $sNew  = str_replace($symbol_mon, '', $value);
       if ($sNew != $value)
       {
           $value = str_replace(' ', '', $sNew);
           return;
       }
       $aTest = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', $symbol_dec, $symbol_tho);
       $sNew  = '';
       for ($i = 0; $i < strlen($value); $i++)
       {
           if ($this->sc_test_currency_char($value[$i], $aTest))
           {
               $sNew .= $value[$i];
           }
       }
       $value = $sNew;
   }
   function sc_test_currency_char($char, $test)
   {
       $found = false;
       foreach ($test as $test_char)
       {
           if ($char === $test_char)
           {
               $found = true;
           }
       }
       return $found;
   }
   function nm_clear_val($Nome_Campo)
   {
      if ($Nome_Campo == "membershipid")
      {
          nm_limpa_numero($this->membershipid, $this->field_config['membershipid']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "client_id")
      {
          nm_limpa_numero($this->client_id, $this->field_config['client_id']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "state")
      {
          $this->nm_tira_mask($this->state, "aa", "(){}[].,;:-+/ "); 
      }
      if ($Nome_Campo == "zip_code")
      {
          $this->nm_tira_mask($this->zip_code, "99999-9999", "(){}[].,;:-+/ "); 
      }
      if ($Nome_Campo == "main_contact_phone")
      {
          $this->nm_tira_mask($this->main_contact_phone, "(999) 999 - 9999", "(){}[].,;:-+/ "); 
      }
      if ($Nome_Campo == "appn_id")
      {
          nm_limpa_numero($this->appn_id, $this->field_config['appn_id']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "phone_number")
      {
          $this->nm_tira_mask($this->phone_number, "(999) 999 - 9999", "(){}[].,;:-+/ "); 
      }
      if ($Nome_Campo == "qb_id")
      {
          nm_limpa_numero($this->qb_id, $this->field_config['qb_id']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "memb_qty")
      {
          nm_limpa_numero($this->memb_qty, $this->field_config['memb_qty']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
      if ('' !== $this->membershipid || (!empty($format_fields) && isset($format_fields['membershipid'])))
      {
          nmgp_Form_Num_Val($this->membershipid, $this->field_config['membershipid']['symbol_grp'], $this->field_config['membershipid']['symbol_dec'], "0", "S", $this->field_config['membershipid']['format_neg'], "", "", "-", $this->field_config['membershipid']['symbol_fmt']) ; 
      }
      if ('' !== $this->client_id || (!empty($format_fields) && isset($format_fields['client_id'])))
      {
          nmgp_Form_Num_Val($this->client_id, $this->field_config['client_id']['symbol_grp'], $this->field_config['client_id']['symbol_dec'], "0", "S", $this->field_config['client_id']['format_neg'], "", "", "-", $this->field_config['client_id']['symbol_fmt']) ; 
      }
      if (!empty($this->state) || (!empty($format_fields) && isset($format_fields['state'])))
      {
          $this->nm_gera_mask($this->state, "aa"); 
      }
      if (!empty($this->zip_code) || (!empty($format_fields) && isset($format_fields['zip_code'])))
      {
          $this->nm_gera_mask($this->zip_code, "99999-9999"); 
      }
      if ((!empty($this->permanent_member_date) && 'null' != $this->permanent_member_date) || (!empty($format_fields) && isset($format_fields['permanent_member_date'])))
      {
          nm_volta_data($this->permanent_member_date, $this->field_config['permanent_member_date']['date_format']) ; 
          nmgp_Form_Datas($this->permanent_member_date, $this->field_config['permanent_member_date']['date_format'], $this->field_config['permanent_member_date']['date_sep']) ;  
      }
      elseif ('null' == $this->permanent_member_date || '' == $this->permanent_member_date)
      {
          $this->permanent_member_date = '';
      }
      if ((!empty($this->renewal_date) && 'null' != $this->renewal_date) || (!empty($format_fields) && isset($format_fields['renewal_date'])))
      {
          nm_volta_data($this->renewal_date, $this->field_config['renewal_date']['date_format']) ; 
          nmgp_Form_Datas($this->renewal_date, $this->field_config['renewal_date']['date_format'], $this->field_config['renewal_date']['date_sep']) ;  
      }
      elseif ('null' == $this->renewal_date || '' == $this->renewal_date)
      {
          $this->renewal_date = '';
      }
      if (!empty($this->main_contact_phone) || (!empty($format_fields) && isset($format_fields['main_contact_phone'])))
      {
          $this->nm_gera_mask($this->main_contact_phone, "(999) 999 - 9999"); 
      }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $new_campo = '';
          $a_mask_ord  = array();
          $i_mask_size = -1;

          foreach (explode(';', $nm_mask) as $str_mask)
          {
              $a_mask_ord[ $this->nm_conta_mask_chars($str_mask) ] = $str_mask;
          }
          ksort($a_mask_ord);

          foreach ($a_mask_ord as $i_size => $s_mask)
          {
              if (-1 == $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
              elseif (strlen($nm_campo) >= $i_size && strlen($nm_campo) > $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
          }
          $nm_mask = $a_mask_ord[$i_mask_size];

          for ($i = 0; $i < strlen($nm_mask); $i++)
          {
              $test_mask = substr($nm_mask, $i, 1);
              
              if ('9' == $test_mask || 'a' == $test_mask || '*' == $test_mask)
              {
                  $new_campo .= substr($nm_campo, 0, 1);
                  $nm_campo   = substr($nm_campo, 1);
              }
              else
              {
                  $new_campo .= $test_mask;
              }
          }

                  $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
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
              if ($cont1 < $cont2 && $tam_campo <= $cont2 && $tam_campo > $cont1)
              {
                  $trab_mask = $ver_duas[1];
              }
              elseif ($cont1 > $cont2 && $tam_campo <= $cont2)
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
          $nm_campo = $trab_saida;
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
      $nm_campo = $trab_saida;
   } 
   function nm_conta_mask_chars($sMask)
   {
       $iLength = 0;

       for ($i = 0; $i < strlen($sMask); $i++)
       {
           if (in_array($sMask[$i], array('9', 'a', '*')))
           {
               $iLength++;
           }
       }

       return $iLength;
   }
   function nm_tira_mask(&$nm_campo, $nm_mask, $nm_chars = '')
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $raw_campo = $this->sc_clear_mask($nm_campo, $nm_chars);
          $raw_mask  = $this->sc_clear_mask($nm_mask, $nm_chars);
          $new_campo = '';

          $test_mask = substr($raw_mask, 0, 1);
          $raw_mask  = substr($raw_mask, 1);

          while ('' != $raw_campo)
          {
              $test_val  = substr($raw_campo, 0, 1);
              $raw_campo = substr($raw_campo, 1);
              $ord       = ord($test_val);
              $found     = false;

              switch ($test_mask)
              {
                  case '9':
                      if (48 <= $ord && 57 >= $ord)
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case 'a':
                      if ((65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case '*':
                      if ((48 <= $ord && 57 >= $ord) || (65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;
              }

              if ($found)
              {
                  $test_mask = substr($raw_mask, 0, 1);
                  $raw_mask  = substr($raw_mask, 1);
              }
          }

          $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
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
          for ($x=0; $x < strlen($mask_dados); $x++)
          {
              if (is_numeric(substr($mask_dados, $x, 1)))
              {
                  $trab_saida .= substr($mask_dados, $x, 1);
              }
          }
          $nm_campo = $trab_saida;
          return;
      }
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }

   function sc_clear_mask($value, $chars)
   {
       $new = '';

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (false === strpos($chars, $value[$i]))
           {
               $new .= $value[$i];
           }
       }

       return $new;
   }
//
   function nm_limpa_alfa(&$str)
   {
   }
//
//-- 
   function nm_converte_datas($use_null = true, $bForce = false)
   {
      $guarda_format_hora = $this->field_config['permanent_member_date']['date_format'];
      if ($this->permanent_member_date != "")  
      { 
          nm_conv_data($this->permanent_member_date, $this->field_config['permanent_member_date']['date_format']) ; 
          $this->permanent_member_date_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->permanent_member_date_hora = substr($this->permanent_member_date_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->permanent_member_date_hora = substr($this->permanent_member_date_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->permanent_member_date_hora = substr($this->permanent_member_date_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->permanent_member_date_hora = substr($this->permanent_member_date_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->permanent_member_date_hora = substr($this->permanent_member_date_hora, 0, -4);
          }
          $this->permanent_member_date .= " " . $this->permanent_member_date_hora ; 
      } 
      if ($this->permanent_member_date == "" && $use_null)  
      { 
          $this->permanent_member_date = "null" ; 
      } 
      $this->field_config['permanent_member_date']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['renewal_date']['date_format'];
      if ($this->renewal_date != "")  
      { 
          nm_conv_data($this->renewal_date, $this->field_config['renewal_date']['date_format']) ; 
          $this->renewal_date_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->renewal_date_hora = substr($this->renewal_date_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->renewal_date_hora = substr($this->renewal_date_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->renewal_date_hora = substr($this->renewal_date_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->renewal_date_hora = substr($this->renewal_date_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->renewal_date_hora = substr($this->renewal_date_hora, 0, -4);
          }
          $this->renewal_date .= " " . $this->renewal_date_hora ; 
      } 
      if ($this->renewal_date == "" && $use_null)  
      { 
          $this->renewal_date = "null" ; 
      } 
      $this->field_config['renewal_date']['date_format'] = $guarda_format_hora;
   }
//
   function nm_prep_date_change($cmp_date, $format_dt)
   {
       $vl_return  = "";
       if ($cmp_date != 'null') {
           $vl_return .= (strpos($format_dt, "yy") !== false) ? substr($cmp_date,  0, 4) : "";
           $vl_return .= (strpos($format_dt, "mm") !== false) ? substr($cmp_date,  5, 2) : "";
           $vl_return .= (strpos($format_dt, "dd") !== false) ? substr($cmp_date,  8, 2) : "";
           $vl_return .= (strpos($format_dt, "hh") !== false) ? substr($cmp_date, 11, 2) : "";
           $vl_return .= (strpos($format_dt, "ii") !== false) ? substr($cmp_date, 14, 2) : "";
           $vl_return .= (strpos($format_dt, "ss") !== false) ? substr($cmp_date, 17, 2) : "";
       }
       return $vl_return;
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
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
           nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
           return $dt_out;
       }
   }

   function returnWhere($aCond, $sOp = 'AND')
   {
       $aWhere = array();
       foreach ($aCond as $sCond)
       {
           $this->handleWhereCond($sCond);
           if ('' != $sCond)
           {
               $aWhere[] = $sCond;
           }
       }
       if (empty($aWhere))
       {
           return '';
       }
       else
       {
           return ' WHERE (' . implode(') ' . $sOp . ' (', $aWhere) . ')';
       }
   } // returnWhere

   function handleWhereCond(&$sCond)
   {
       $sCond = trim($sCond);
       if ('where' == strtolower(substr($sCond, 0, 5)))
       {
           $sCond = trim(substr($sCond, 5));
       }
   } // handleWhereCond

   function ajax_return_values()
   {
          $this->ajax_return_values_dummy02();
          $this->ajax_return_values_membershipid();
          $this->ajax_return_values_co_name();
          $this->ajax_return_values_client_id();
          $this->ajax_return_values_mailing_address();
          $this->ajax_return_values_memb_status_id();
          $this->ajax_return_values_city();
          $this->ajax_return_values_pricing_level_id();
          $this->ajax_return_values_state();
          $this->ajax_return_values_bus_cat_id();
          $this->ajax_return_values_zip_code();
          $this->ajax_return_values_bus_subcat_id();
          $this->ajax_return_values_permanent_member_date();
          $this->ajax_return_values_bus_subcat_other();
          $this->ajax_return_values_renewal_date();
          $this->ajax_return_values_acct_instagram();
          $this->ajax_return_values_website_url();
          $this->ajax_return_values_acct_facebook();
          $this->ajax_return_values_js_prod_price();
          $this->ajax_return_values_js_strp_price_id();
          $this->ajax_return_values_js_mbr_ct();
          $this->ajax_return_values_js_client_id();
          $this->ajax_return_values_dummy07();
          $this->ajax_return_values_dummy08();
          $this->ajax_return_values_main_contact_name();
          $this->ajax_return_values_main_contact_phone();
          $this->ajax_return_values_main_contact_email();
          $this->ajax_return_values_main_contact_title();
          $this->ajax_return_values_main_contact_img_id();
          $this->ajax_return_values_memb_list();
          $this->ajax_return_values_docs();
          $this->ajax_return_values_client_pmts();
          $this->ajax_return_values_notes();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['client_id']['keyVal'] = form_clients_staff_pack_protect_string($this->nmgp_dados_form['client_id']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_client_pmts_script_case_init'] ]['form_client_pmts']['foreign_key']['client_id'] = $this->nmgp_dados_form['client_id'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_client_pmts_script_case_init'] ]['form_client_pmts']['where_filter'] = "client_id = " . $this->nmgp_dados_form['client_id'] . "";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_client_pmts_script_case_init'] ]['form_client_pmts']['where_detal']  = "client_id = " . $this->nmgp_dados_form['client_id'] . "";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_client_pmts_script_case_init'] ]['form_client_pmts']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_client_pmts_script_case_init'] ]['form_client_pmts']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_client_pmts_script_case_init'] ]['form_client_pmts']['total']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['grid_client_docs_2_script_case_init'] ]['grid_client_docs_2']['embutida_form_full'] = true;
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['grid_client_docs_2_script_case_init'] ]['grid_client_docs_2']['embutida_form']       = true;
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['grid_client_docs_2_script_case_init'] ]['grid_client_docs_2']['embutida_pai']        = "form_clients_staff";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['grid_client_docs_2_script_case_init'] ]['grid_client_docs_2']['embutida_form_parms'] = "gv_client_id*scin" . $this->nmgp_dados_form['client_id'] . "*scoutNMSC_inicial*scininicio*scoutNMSC_rows*scin5*scoutNMSC_paginacao*scinPARCIAL*scoutNMSC_cab*scinN*scoutlink_remove_margin*scinok*scoutlink_remove_border*scinok*scoutlink_remove_background*scinok*scout";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['grid_client_docs_2_script_case_init'] ]['grid_client_docs_2']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['grid_client_docs_2_script_case_init'] ]['grid_client_docs_2']['total']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_members_staff_script_case_init'] ]['form_members_staff']['foreign_key']['client_id'] = $this->nmgp_dados_form['client_id'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_members_staff_script_case_init'] ]['form_members_staff']['where_filter'] = "client_id = " . $this->nmgp_dados_form['client_id'] . "";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_members_staff_script_case_init'] ]['form_members_staff']['where_detal']  = "client_id = " . $this->nmgp_dados_form['client_id'] . "";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_members_staff_script_case_init'] ]['form_members_staff']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_members_staff_script_case_init'] ]['form_members_staff']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['form_members_staff_script_case_init'] ]['form_members_staff']['total']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['grid_client_notes_script_case_init'] ]['grid_client_notes']['embutida_form_full'] = true;
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['grid_client_notes_script_case_init'] ]['grid_client_notes']['embutida_form']       = true;
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['grid_client_notes_script_case_init'] ]['grid_client_notes']['embutida_pai']        = "form_clients_staff";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['grid_client_notes_script_case_init'] ]['grid_client_notes']['embutida_form_parms'] = "gv_client_id*scin" . $this->nmgp_dados_form['client_id'] . "*scoutNMSC_inicial*scininicio*scoutNMSC_rows*scin5*scoutNMSC_paginacao*scinPARCIAL*scoutNMSC_cab*scinN*scoutlink_remove_margin*scinok*scoutlink_remove_border*scinok*scoutlink_remove_background*scinok*scout";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['grid_client_notes_script_case_init'] ]['grid_client_notes']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['grid_client_notes_script_case_init'] ]['grid_client_notes']['total']);
          }
   } // ajax_return_values

          //----- dummy02
   function ajax_return_values_dummy02($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dummy02", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->dummy02);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['dummy02'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- membershipid
   function ajax_return_values_membershipid($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("membershipid", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->membershipid);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['membershipid'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- co_name
   function ajax_return_values_co_name($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("co_name", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->co_name);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['co_name'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- client_id
   function ajax_return_values_client_id($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("client_id", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->client_id);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['client_id'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("client_id", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- mailing_address
   function ajax_return_values_mailing_address($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("mailing_address", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->mailing_address);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['mailing_address'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- memb_status_id
   function ajax_return_values_memb_status_id($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("memb_status_id", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->memb_status_id);
              $aLookup = array();
              $this->_tmp_lookup_memb_status_id = $this->memb_status_id;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_memb_status_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_memb_status_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_memb_status_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_memb_status_id'] = array(); 
}
$aLookup[] = array(form_clients_staff_pack_protect_string('') => str_replace('<', '&lt;',form_clients_staff_pack_protect_string('Choose')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_memb_status_id'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_membershipid = $this->membershipid;
   $old_value_client_id = $this->client_id;
   $old_value_state = $this->state;
   $old_value_zip_code = $this->zip_code;
   $old_value_permanent_member_date = $this->permanent_member_date;
   $old_value_renewal_date = $this->renewal_date;
   $old_value_main_contact_phone = $this->main_contact_phone;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_membershipid = $this->membershipid;
   $unformatted_value_client_id = $this->client_id;
   $unformatted_value_state = $this->state;
   $unformatted_value_zip_code = $this->zip_code;
   $unformatted_value_permanent_member_date = $this->permanent_member_date;
   $unformatted_value_renewal_date = $this->renewal_date;
   $unformatted_value_main_contact_phone = $this->main_contact_phone;

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
   $paid_val_str = "''";
   if (!empty($this->paid))
   {
       if (is_array($this->paid))
       {
           $Tmp_array = $this->paid;
       }
       else
       {
           $Tmp_array = explode(";", $this->paid);
       }
       $paid_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $paid_val_str)
          {
             $paid_val_str .= ", ";
          }
          $paid_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT memb_status_id, status  FROM members_status  ORDER BY status";

   $this->membershipid = $old_value_membershipid;
   $this->client_id = $old_value_client_id;
   $this->state = $old_value_state;
   $this->zip_code = $old_value_zip_code;
   $this->permanent_member_date = $old_value_permanent_member_date;
   $this->renewal_date = $old_value_renewal_date;
   $this->main_contact_phone = $old_value_main_contact_phone;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_clients_staff_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_clients_staff_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_memb_status_id'][] = $rs->fields[0];
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
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"memb_status_id\"";
          if (isset($this->NM_ajax_info['select_html']['memb_status_id']) && !empty($this->NM_ajax_info['select_html']['memb_status_id']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['memb_status_id']);
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->memb_status_id == $sValue)
                  {
                      $this->_tmp_lookup_memb_status_id = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['memb_status_id'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['memb_status_id']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['memb_status_id']['valList'][$i] = form_clients_staff_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['memb_status_id']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['memb_status_id']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['memb_status_id']['labList'] = $aLabel;
          }
   }

          //----- city
   function ajax_return_values_city($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("city", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->city);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['city'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- pricing_level_id
   function ajax_return_values_pricing_level_id($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pricing_level_id", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->pricing_level_id);
              $aLookup = array();
              $this->_tmp_lookup_pricing_level_id = $this->pricing_level_id;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_pricing_level_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_pricing_level_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_pricing_level_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_pricing_level_id'] = array(); 
}
$aLookup[] = array(form_clients_staff_pack_protect_string('') => str_replace('<', '&lt;',form_clients_staff_pack_protect_string('Choose')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_pricing_level_id'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_membershipid = $this->membershipid;
   $old_value_client_id = $this->client_id;
   $old_value_state = $this->state;
   $old_value_zip_code = $this->zip_code;
   $old_value_permanent_member_date = $this->permanent_member_date;
   $old_value_renewal_date = $this->renewal_date;
   $old_value_main_contact_phone = $this->main_contact_phone;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_membershipid = $this->membershipid;
   $unformatted_value_client_id = $this->client_id;
   $unformatted_value_state = $this->state;
   $unformatted_value_zip_code = $this->zip_code;
   $unformatted_value_permanent_member_date = $this->permanent_member_date;
   $unformatted_value_renewal_date = $this->renewal_date;
   $unformatted_value_main_contact_phone = $this->main_contact_phone;

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
   $paid_val_str = "''";
   if (!empty($this->paid))
   {
       if (is_array($this->paid))
       {
           $Tmp_array = $this->paid;
       }
       else
       {
           $Tmp_array = explode(";", $this->paid);
       }
       $paid_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $paid_val_str)
          {
             $paid_val_str .= ", ";
          }
          $paid_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT memb_lev_id, descript  FROM members_level  WHERE active ORDER BY sort_by";

   $this->membershipid = $old_value_membershipid;
   $this->client_id = $old_value_client_id;
   $this->state = $old_value_state;
   $this->zip_code = $old_value_zip_code;
   $this->permanent_member_date = $old_value_permanent_member_date;
   $this->renewal_date = $old_value_renewal_date;
   $this->main_contact_phone = $old_value_main_contact_phone;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_clients_staff_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_clients_staff_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_pricing_level_id'][] = $rs->fields[0];
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
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"pricing_level_id\"";
          if (isset($this->NM_ajax_info['select_html']['pricing_level_id']) && !empty($this->NM_ajax_info['select_html']['pricing_level_id']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['pricing_level_id']);
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->pricing_level_id == $sValue)
                  {
                      $this->_tmp_lookup_pricing_level_id = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['pricing_level_id'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['pricing_level_id']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['pricing_level_id']['valList'][$i] = form_clients_staff_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['pricing_level_id']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['pricing_level_id']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['pricing_level_id']['labList'] = $aLabel;
          }
   }

          //----- state
   function ajax_return_values_state($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("state", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->state);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['state'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- bus_cat_id
   function ajax_return_values_bus_cat_id($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("bus_cat_id", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->bus_cat_id);
              $aLookup = array();
              $this->_tmp_lookup_bus_cat_id = $this->bus_cat_id;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_cat_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_cat_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_cat_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_cat_id'] = array(); 
}
$aLookup[] = array(form_clients_staff_pack_protect_string('') => str_replace('<', '&lt;',form_clients_staff_pack_protect_string('Choose')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_cat_id'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_membershipid = $this->membershipid;
   $old_value_client_id = $this->client_id;
   $old_value_state = $this->state;
   $old_value_zip_code = $this->zip_code;
   $old_value_permanent_member_date = $this->permanent_member_date;
   $old_value_renewal_date = $this->renewal_date;
   $old_value_main_contact_phone = $this->main_contact_phone;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_membershipid = $this->membershipid;
   $unformatted_value_client_id = $this->client_id;
   $unformatted_value_state = $this->state;
   $unformatted_value_zip_code = $this->zip_code;
   $unformatted_value_permanent_member_date = $this->permanent_member_date;
   $unformatted_value_renewal_date = $this->renewal_date;
   $unformatted_value_main_contact_phone = $this->main_contact_phone;

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
   $paid_val_str = "''";
   if (!empty($this->paid))
   {
       if (is_array($this->paid))
       {
           $Tmp_array = $this->paid;
       }
       else
       {
           $Tmp_array = explode(";", $this->paid);
       }
       $paid_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $paid_val_str)
          {
             $paid_val_str .= ", ";
          }
          $paid_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT bus_cat_id, bus_cat  FROM bus_categories  ORDER BY bus_cat";

   $this->membershipid = $old_value_membershipid;
   $this->client_id = $old_value_client_id;
   $this->state = $old_value_state;
   $this->zip_code = $old_value_zip_code;
   $this->permanent_member_date = $old_value_permanent_member_date;
   $this->renewal_date = $old_value_renewal_date;
   $this->main_contact_phone = $old_value_main_contact_phone;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_clients_staff_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_clients_staff_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_cat_id'][] = $rs->fields[0];
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
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"bus_cat_id\"";
          if (isset($this->NM_ajax_info['select_html']['bus_cat_id']) && !empty($this->NM_ajax_info['select_html']['bus_cat_id']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['bus_cat_id']);
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->bus_cat_id == $sValue)
                  {
                      $this->_tmp_lookup_bus_cat_id = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['bus_cat_id'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['bus_cat_id']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['bus_cat_id']['valList'][$i] = form_clients_staff_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['bus_cat_id']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['bus_cat_id']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['bus_cat_id']['labList'] = $aLabel;
          }
   }

          //----- zip_code
   function ajax_return_values_zip_code($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("zip_code", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->zip_code);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['zip_code'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- bus_subcat_id
   function ajax_return_values_bus_subcat_id($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("bus_subcat_id", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->bus_subcat_id);
              $aLookup = array();
              $this->_tmp_lookup_bus_subcat_id = $this->bus_subcat_id;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_subcat_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_subcat_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_subcat_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_subcat_id'] = array(); 
}
$aLookup[] = array(form_clients_staff_pack_protect_string('') => str_replace('<', '&lt;',form_clients_staff_pack_protect_string('Choose')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_subcat_id'][] = '';
if ($this->bus_cat_id != "")
{ 
   $this->nm_clear_val("bus_cat_id");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_membershipid = $this->membershipid;
   $old_value_client_id = $this->client_id;
   $old_value_state = $this->state;
   $old_value_zip_code = $this->zip_code;
   $old_value_permanent_member_date = $this->permanent_member_date;
   $old_value_renewal_date = $this->renewal_date;
   $old_value_main_contact_phone = $this->main_contact_phone;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_membershipid = $this->membershipid;
   $unformatted_value_client_id = $this->client_id;
   $unformatted_value_state = $this->state;
   $unformatted_value_zip_code = $this->zip_code;
   $unformatted_value_permanent_member_date = $this->permanent_member_date;
   $unformatted_value_renewal_date = $this->renewal_date;
   $unformatted_value_main_contact_phone = $this->main_contact_phone;

   $nm_comando = "SELECT bus_subcat_id, bus_subcategory  FROM bus_subcats  WHERE bus_cat_id = $this->bus_cat_id  ORDER BY sort_by";

   $this->membershipid = $old_value_membershipid;
   $this->client_id = $old_value_client_id;
   $this->state = $old_value_state;
   $this->zip_code = $old_value_zip_code;
   $this->permanent_member_date = $old_value_permanent_member_date;
   $this->renewal_date = $old_value_renewal_date;
   $this->main_contact_phone = $old_value_main_contact_phone;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_clients_staff_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_clients_staff_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_subcat_id'][] = $rs->fields[0];
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
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"bus_subcat_id\"";
          if (isset($this->NM_ajax_info['select_html']['bus_subcat_id']) && !empty($this->NM_ajax_info['select_html']['bus_subcat_id']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['bus_subcat_id']);
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->bus_subcat_id == $sValue)
                  {
                      $this->_tmp_lookup_bus_subcat_id = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['bus_subcat_id'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['bus_subcat_id']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['bus_subcat_id']['valList'][$i] = form_clients_staff_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['bus_subcat_id']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['bus_subcat_id']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['bus_subcat_id']['labList'] = $aLabel;
          }
   }

          //----- permanent_member_date
   function ajax_return_values_permanent_member_date($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("permanent_member_date", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->permanent_member_date);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['permanent_member_date'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- bus_subcat_other
   function ajax_return_values_bus_subcat_other($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("bus_subcat_other", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->bus_subcat_other);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['bus_subcat_other'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- renewal_date
   function ajax_return_values_renewal_date($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("renewal_date", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->renewal_date);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['renewal_date'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- acct_instagram
   function ajax_return_values_acct_instagram($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("acct_instagram", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->acct_instagram);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['acct_instagram'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- website_url
   function ajax_return_values_website_url($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("website_url", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->website_url);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['website_url'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- acct_facebook
   function ajax_return_values_acct_facebook($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("acct_facebook", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->acct_facebook);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['acct_facebook'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- js_prod_price
   function ajax_return_values_js_prod_price($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("js_prod_price", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->js_prod_price);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['js_prod_price'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- js_strp_price_id
   function ajax_return_values_js_strp_price_id($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("js_strp_price_id", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->js_strp_price_id);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['js_strp_price_id'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- js_mbr_ct
   function ajax_return_values_js_mbr_ct($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("js_mbr_ct", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->js_mbr_ct);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['js_mbr_ct'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- js_client_id
   function ajax_return_values_js_client_id($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("js_client_id", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->js_client_id);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['js_client_id'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- dummy07
   function ajax_return_values_dummy07($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dummy07", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->dummy07);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['dummy07'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- dummy08
   function ajax_return_values_dummy08($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dummy08", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->dummy08);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['dummy08'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- main_contact_name
   function ajax_return_values_main_contact_name($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("main_contact_name", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->main_contact_name);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['main_contact_name'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- main_contact_phone
   function ajax_return_values_main_contact_phone($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("main_contact_phone", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->main_contact_phone);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['main_contact_phone'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- main_contact_email
   function ajax_return_values_main_contact_email($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("main_contact_email", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->main_contact_email);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['main_contact_email'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- main_contact_title
   function ajax_return_values_main_contact_title($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("main_contact_title", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->main_contact_title);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['main_contact_title'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- main_contact_img_id
   function ajax_return_values_main_contact_img_id($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("main_contact_img_id", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->main_contact_img_id);
              $aLookup = array();
              $sTmpExtension = pathinfo($this->main_contact_img_file, PATHINFO_EXTENSION);
              $sTmpExtension = null == $sTmpExtension ? '' : '.' . $sTmpExtension;
              $sTmpFile      = 'sc_main_contact_img_id_' . md5(mt_rand(1, 1000) . microtime() . session_id()) . $sTmpExtension;
   if ($this->main_contact_img_id != "" && $this->main_contact_img_id != "none")   
   { 
       $out_main_contact_img_id = $this->Ini->path_imag_temp . "/" . $sTmpFile;
       $arq_main_contact_img_id = fopen($this->Ini->root . $out_main_contact_img_id, "w") ;  
       if (is_string($this->main_contact_img_id) && substr($this->main_contact_img_id, 0, 4) == "*nm*" && (strstr(strtoupper($this->Ini->nm_tpbanco),"MSSQL") || strstr(strtoupper($this->Ini->nm_tpbanco),"PDOSQLITE"))) 
       { 
           $this->main_contact_img_id = base64_decode($this->main_contact_img_id) ; 
       } 
       elseif (is_string($this->main_contact_img_id) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase)) 
       {
           $this->main_contact_img_id = str_replace("''", "'", $this->main_contact_img_id);
       }
       fwrite($arq_main_contact_img_id, (string)$this->main_contact_img_id) ;  
       fclose($arq_main_contact_img_id) ;  
       if (isset($this->NM_size_docs[$main_contact_img_file]))
       {
           if ($this->NM_size_docs[$main_contact_img_file] != filesize($this->Ini->root . $out_main_contact_img_id))
           {
           }
       }
       if (isset($this->NM_size_docs[$doc_filename]))
       {
           if ($this->NM_size_docs[$doc_filename] != filesize($this->Ini->root . $out_main_contact_img_id))
           {
           }
       }
   } 
              if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['download_filenames']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['download_filenames'] = array();
              }
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['download_filenames'][$sTmpFile] = $this->main_contact_img_file;
              $tmp_file_main_contact_img_id = trim(NM_charset_to_utf8($this->main_contact_img_file));
              $tmp_icon_main_contact_img_id = '';
              if ('' != $tmp_file_main_contact_img_id)
              {
                  $tmp_icon_main_contact_img_id = $this->gera_icone($tmp_file_main_contact_img_id);
              }
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['main_contact_img_id'] = array(
                       'row'    => '',
               'type'    => 'documento',
               'valList' => array($tmp_file_main_contact_img_id),
               'docLink' => "<a href=\"javascript:nm_mostra_doc('documento_db', '" . substr($sTmpFile, 3) . "', 'form_clients_staff')\">" . $tmp_file_main_contact_img_id . "</a>",
               'docIcon' => $tmp_icon_main_contact_img_id,
               'docReadonly' => "N",
              );
          }
   }

          //----- memb_list
   function ajax_return_values_memb_list($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("memb_list", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->memb_list);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['memb_list'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- docs
   function ajax_return_values_docs($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("docs", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->docs);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['docs'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- client_pmts
   function ajax_return_values_client_pmts($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("client_pmts", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->client_pmts);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['client_pmts'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- notes
   function ajax_return_values_notes($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("notes", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->notes);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['notes'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

    function fetchUniqueUploadName($originalName, $uploadDir, $fieldName)
    {
        $originalName = trim($originalName);
        if ('' == $originalName)
        {
            return $originalName;
        }
        if (!@is_dir($uploadDir))
        {
            return $originalName;
        }
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['upload_dir'][$fieldName][] = $newName;
            return $newName;
        }
    } // fetchUniqueUploadName

    function fetchFileNextName($uniqueName, $uniqueList)
    {
        $aPathinfo     = pathinfo($uniqueName);
        $fileExtension = $aPathinfo['extension'];
        $fileName      = $aPathinfo['filename'];
        $foundName     = false;
        $nameIt        = 1;
        if ('' != $fileExtension)
        {
            $fileExtension = '.' . $fileExtension;
        }
        while (!$foundName)
        {
            $testName = $fileName . '(' . $nameIt . ')' . $fileExtension;
            if (in_array($testName, $uniqueList))
            {
                $nameIt++;
            }
            else
            {
                $foundName = true;
                return $testName;
            }
        }
    } // fetchFileNextName

   function ajax_add_parameters()
   {
       $this->NM_ajax_info['summary_line'] = $this->getSummaryLine();
   } // ajax_add_parameters
  function nm_proc_onload($bFormat = true)
  {
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Field_no_validate'] = array();
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_bus_cat_id = $this->bus_cat_id;
    $original_bus_subcat_id = $this->bus_subcat_id;
    $original_bus_subcat_other = $this->bus_subcat_other;
    $original_client_id = $this->client_id;
    $original_co_name = $this->co_name;
    $original_js_client_id = $this->js_client_id;
    $original_js_mbr_ct = $this->js_mbr_ct;
    $original_js_prod_price = $this->js_prod_price;
    $original_js_strp_price_id = $this->js_strp_price_id;
    $original_main_contact_name = $this->main_contact_name;
    $original_memb_status_id = $this->memb_status_id;
}
if (!isset($this->sc_temp_gv_from_grid)) {$this->sc_temp_gv_from_grid = (isset($_SESSION['gv_from_grid'])) ? $_SESSION['gv_from_grid'] : "";}
if (!isset($this->sc_temp_gv_last_memb_status_id)) {$this->sc_temp_gv_last_memb_status_id = (isset($_SESSION['gv_last_memb_status_id'])) ? $_SESSION['gv_last_memb_status_id'] : "";}
  $this->sc_temp_gv_last_memb_status_id = $this->memb_status_id ;

$subcat_id = $this->bus_subcat_id  ?? 0;
 
      $nm_select = "SELECT bus_subcategory FROM bus_subcats WHERE bus_subcat_id = $subcat_id"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 

if (preg_match('/\bother\b/i', $this->ds[0][0])) {
	$this->nmgp_cmp_hidden["bus_subcat_other"] = 'on'; $this->NM_ajax_info['fieldDisplay']['bus_subcat_other'] = 'on';		
} else {
	$this->nmgp_cmp_hidden["bus_subcat_other"] = 'off'; $this->NM_ajax_info['fieldDisplay']['bus_subcat_other'] = 'off';	
}





$this->members_ct();


$sql = "SELECT payment_status FROM transactions WHERE cust_db_id = $this->client_id ";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql_qb->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Ini->nm_db_conn_mysql_qb->ErrorMsg();
      } 

$this->transaction  = ucfirst($this->ds[0][0]);

$appn_date_fld_val = $this->appn_date ;
if ($appn_date_fld_val !== null) {
    $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $appn_date_fld_val);
    $this->submitted = $dateTime->format('m-d-Y h:i A');
} else {
    $this->submitted = "n/a"; 
}


if ( $this->sc_temp_gv_from_grid == 'renewals' ) {	
    ?>
    <script>
        parent.document.querySelector('#aba_td_txt_form_clients_staff').innerHTML = 'Renewal - <?php echo $this->co_name ." (".$this->client_id .")"; ?>';
    </script>
    <?php
}

$sql = "SELECT Count(member_name) AS Ct " .
		"FROM members " .
		"WHERE client_id = " . $this->client_id  . " AND TRIM(member_name) = '" . trim($this->main_contact_name ) ."'";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 


if ( isset($this->ds[0][0]) && $this->ds[0][0] == 0 ) {	
	$sql = "INSERT INTO members (client_id, main_contact, member_name, phone1, email) " .
			  "SELECT " .
				"client_id, " .
				"1 AS main_contact, " .
				"main_contact_name, " .
				"main_contact_phone, " .
				"main_contact_email " .
			  "FROM clients " .
			  "WHERE client_id = " . $this->client_id  . " AND main_contact_name IS NOT NULL";
	
     $nm_select = $sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_clients_staff_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      
}
if (isset($this->sc_temp_gv_last_memb_status_id)) { $_SESSION['gv_last_memb_status_id'] = $this->sc_temp_gv_last_memb_status_id;}
if (isset($this->sc_temp_gv_from_grid)) { $_SESSION['gv_from_grid'] = $this->sc_temp_gv_from_grid;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_bus_cat_id != $this->bus_cat_id || (isset($bFlagRead_bus_cat_id) && $bFlagRead_bus_cat_id)))
    {
        $this->ajax_return_values_bus_cat_id(true);
    }
    if (($original_bus_subcat_id != $this->bus_subcat_id || (isset($bFlagRead_bus_subcat_id) && $bFlagRead_bus_subcat_id)))
    {
        $this->ajax_return_values_bus_subcat_id(true);
    }
    if (($original_bus_subcat_other != $this->bus_subcat_other || (isset($bFlagRead_bus_subcat_other) && $bFlagRead_bus_subcat_other)))
    {
        $this->ajax_return_values_bus_subcat_other(true);
    }
    if (($original_client_id != $this->client_id || (isset($bFlagRead_client_id) && $bFlagRead_client_id)))
    {
        $this->ajax_return_values_client_id(true);
    }
    if (($original_co_name != $this->co_name || (isset($bFlagRead_co_name) && $bFlagRead_co_name)))
    {
        $this->ajax_return_values_co_name(true);
    }
    if (($original_js_client_id != $this->js_client_id || (isset($bFlagRead_js_client_id) && $bFlagRead_js_client_id)))
    {
        $this->ajax_return_values_js_client_id(true);
    }
    if (($original_js_mbr_ct != $this->js_mbr_ct || (isset($bFlagRead_js_mbr_ct) && $bFlagRead_js_mbr_ct)))
    {
        $this->ajax_return_values_js_mbr_ct(true);
    }
    if (($original_js_prod_price != $this->js_prod_price || (isset($bFlagRead_js_prod_price) && $bFlagRead_js_prod_price)))
    {
        $this->ajax_return_values_js_prod_price(true);
    }
    if (($original_js_strp_price_id != $this->js_strp_price_id || (isset($bFlagRead_js_strp_price_id) && $bFlagRead_js_strp_price_id)))
    {
        $this->ajax_return_values_js_strp_price_id(true);
    }
    if (($original_main_contact_name != $this->main_contact_name || (isset($bFlagRead_main_contact_name) && $bFlagRead_main_contact_name)))
    {
        $this->ajax_return_values_main_contact_name(true);
    }
    if (($original_memb_status_id != $this->memb_status_id || (isset($bFlagRead_memb_status_id) && $bFlagRead_memb_status_id)))
    {
        $this->ajax_return_values_memb_status_id(true);
    }
}
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'off'; 
      }
      if (empty($this->record_created))
      {
          $this->record_created_hora = $this->record_created;
      }
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//----------- 

   function controle_navegacao()
   {
      global $sc_where;

          if (false && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['total']))
          {
               $sc_where_pos = " WHERE ((client_id < $this->client_id))";
               if ('' != $sc_where)
               {
                   if ('where ' == strtolower(substr(trim($sc_where), 0, 6)))
                   {
                       $sc_where = substr(trim($sc_where), 6);
                   }
                   if ('and ' == strtolower(substr(trim($sc_where), 0, 4)))
                   {
                       $sc_where = substr(trim($sc_where), 4);
                   }
                   $sc_where_pos .= ' AND (' . $sc_where . ')';
                   $sc_where = ' WHERE ' . $sc_where;
               }
               $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where;
               $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
               $rsc = $this->Db->Execute($nmgp_sel_count); 
               if ($rsc === false && !$rsc->EOF)  
               { 
                   $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                   exit; 
               }  
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['total'] = $rsc->fields[0];
               $rsc->Close(); 
               if ('' != $this->client_id)
               {
               $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
               $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
               $rsc = $this->Db->Execute($nmgp_sel_count); 
               if ($rsc === false && !$rsc->EOF)  
               { 
                   $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                   exit; 
               }  
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['inicio'] = $rsc->fields[0];
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['inicio'] < 0)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['inicio'] = 0;
               }
               $rsc->Close(); 
               }
               else
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['inicio'] = 0;
               }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['qt_reg_grid'] = 1;
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['inicio']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['inicio'] = 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['final']  = 0;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['opcao'] = $this->NM_ajax_info['param']['nmgp_opcao'];
          if (in_array($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['opcao'], array('incluir', 'alterar', 'excluir')))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['opcao'] = '';
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['opcao'] == 'inicio')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['inicio'] = 0;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['opcao'] == 'retorna')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['inicio'] = 0 ;
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['opcao'] == 'avanca' && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['total']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['total'] > $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['final']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['final'];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['opcao'] == 'final')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['inicio'] = 0;
              }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['final'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['qt_reg_grid'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['final'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['opcao'] = '';

   }

   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       if ($rsc === false && !$rsc->EOF)
       {
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
           exit; 
       }
       $iTotal = $rsc->fields[0];
       $rsc->Close();
       return 0 < $iTotal;
   } // temRegistros

   function deletaRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'DELETE FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       $bResult = $rsc;
       $rsc->Close();
       return $bResult == true;
   } // deletaRegistros
    function handleDbErrorMessage(&$dbErrorMessage, $dbErrorCode)
    {
        if (1267 == $dbErrorCode) {
            $dbErrorMessage = $this->Ini->Nm_lang['lang_errm_db_invalid_collation'];
        }
    }

   function restore_zeros_null()
   {
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if (!empty($this->NM_val_null))
      {
          foreach ($this->NM_val_null as $i_val_null => $sc_val_null_field)
          {
              eval('$this->' . $sc_val_null_field . ' = "";');
          }
      }
      $this->NM_val_null = array();
   }

   function nm_acessa_banco() 
   { 
      global  $nm_form_submit, $teste_validade, $sc_where;
 
      $this->NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      $this->SC_log_atv = false;
      if ("alterar" == $this->nmgp_opcao || "excluir" == $this->nmgp_opcao)
      {
          $this->NM_gera_log_key($this->nmgp_opcao);
      }
      if ("alterar" == $this->nmgp_opcao || "excluir" == $this->nmgp_opcao)
      {
          $this->NM_gera_log_old();
      }
      $this->restore_zeros_null();
    if ("excluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_client_id = $this->client_id;
}
  $check_sql = "SELECT COUNT(*) FROM pfm.members WHERE client_id = " . $this->client_id ;
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 


if ($this->rs[0][0] > 0) {
    
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Cannot delete: Related member(s) exist for this client.";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_form_clients_staff';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_form_clients_staff';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "Cannot delete: Related member(s) exist for this client.";
 }
;
    if (isset($this->Campos_Mens_erro) && !empty($this->Campos_Mens_erro))
{
    if ($this->NM_ajax_flag)
    {
        $_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'off';
        form_clients_staff_pack_ajax_response();
        exit;
    }
    $Sc_Lixo = ob_get_clean();
    $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro);
    $_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'off';
    $this->Campos_Mens_erro = "";
    if ($this->nmgp_opcao == "incluir") {$this->nmgp_opcao = "novo";};
    $this->nm_proc_onload();
    $this->nm_formatar_campos();
    $this->nm_gera_html();
    $this->NM_close_db();
    exit;
}
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_client_id != $this->client_id || (isset($bFlagRead_client_id) && $bFlagRead_client_id)))
    {
        $this->ajax_return_values_client_id(true);
    }
}
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $this->nmgp_opcao ; 
          if ($this->nmgp_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          else
          { 
              $this->sc_evento = ""; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->NM_rollback_db(); 
          $this->Campos_Mens_erro = ""; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo" && $this->sc_evento != "incluir") 
      { 
          $this->sc_evento = ""; 
      } 
      if ((!isset($this->Ini->nm_bases_access) || !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Ini->sc_tem_trans_banco = $this->Db->BeginTrans(); 
      } 
      $NM_val_form['dummy02'] = $this->dummy02;
      $NM_val_form['membershipid'] = $this->membershipid;
      $NM_val_form['co_name'] = $this->co_name;
      $NM_val_form['client_id'] = $this->client_id;
      $NM_val_form['mailing_address'] = $this->mailing_address;
      $NM_val_form['memb_status_id'] = $this->memb_status_id;
      $NM_val_form['city'] = $this->city;
      $NM_val_form['pricing_level_id'] = $this->pricing_level_id;
      $NM_val_form['state'] = $this->state;
      $NM_val_form['bus_cat_id'] = $this->bus_cat_id;
      $NM_val_form['zip_code'] = $this->zip_code;
      $NM_val_form['bus_subcat_id'] = $this->bus_subcat_id;
      $NM_val_form['permanent_member_date'] = $this->permanent_member_date;
      $NM_val_form['bus_subcat_other'] = $this->bus_subcat_other;
      $NM_val_form['renewal_date'] = $this->renewal_date;
      $NM_val_form['acct_instagram'] = $this->acct_instagram;
      $NM_val_form['website_url'] = $this->website_url;
      $NM_val_form['acct_facebook'] = $this->acct_facebook;
      $NM_val_form['js_prod_price'] = $this->js_prod_price;
      $NM_val_form['js_strp_price_id'] = $this->js_strp_price_id;
      $NM_val_form['js_mbr_ct'] = $this->js_mbr_ct;
      $NM_val_form['js_client_id'] = $this->js_client_id;
      $NM_val_form['dummy07'] = $this->dummy07;
      $NM_val_form['dummy08'] = $this->dummy08;
      $NM_val_form['main_contact_name'] = $this->main_contact_name;
      $NM_val_form['main_contact_phone'] = $this->main_contact_phone;
      $NM_val_form['main_contact_email'] = $this->main_contact_email;
      $NM_val_form['main_contact_title'] = $this->main_contact_title;
      $NM_val_form['main_contact_img_id'] = $this->main_contact_img_id;
      $NM_val_form['memb_list'] = $this->memb_list;
      $NM_val_form['docs'] = $this->docs;
      $NM_val_form['client_pmts'] = $this->client_pmts;
      $NM_val_form['notes'] = $this->notes;
      $NM_val_form['appn_id'] = $this->appn_id;
      $NM_val_form['ofa_contact'] = $this->ofa_contact;
      $NM_val_form['street_address'] = $this->street_address;
      $NM_val_form['phone_number'] = $this->phone_number;
      $NM_val_form['home_phone'] = $this->home_phone;
      $NM_val_form['fax_number'] = $this->fax_number;
      $NM_val_form['email'] = $this->email;
      $NM_val_form['business_type'] = $this->business_type;
      $NM_val_form['fresh_cut_allowed'] = $this->fresh_cut_allowed;
      $NM_val_form['business_license'] = $this->business_license;
      $NM_val_form['nursery_license'] = $this->nursery_license;
      $NM_val_form['federal_tax_id'] = $this->federal_tax_id;
      $NM_val_form['temporary_pass'] = $this->temporary_pass;
      $NM_val_form['ofa_member'] = $this->ofa_member;
      $NM_val_form['starting_date'] = $this->starting_date;
      $NM_val_form['expiration_date'] = $this->expiration_date;
      $NM_val_form['canceled'] = $this->canceled;
      $NM_val_form['cancel_date'] = $this->cancel_date;
      $NM_val_form['canceled_by'] = $this->canceled_by;
      $NM_val_form['reason_canceled'] = $this->reason_canceled;
      $NM_val_form['retire_date'] = $this->retire_date;
      $NM_val_form['verified_receipts'] = $this->verified_receipts;
      $NM_val_form['date_last_updated'] = $this->date_last_updated;
      $NM_val_form['restricted'] = $this->restricted;
      $NM_val_form['committee_approval_required'] = $this->committee_approval_required;
      $NM_val_form['type_company'] = $this->type_company;
      $NM_val_form['archive'] = $this->archive;
      $NM_val_form['archive_date'] = $this->archive_date;
      $NM_val_form['store_front_address'] = $this->store_front_address;
      $NM_val_form['store_front_city'] = $this->store_front_city;
      $NM_val_form['store_front_zip'] = $this->store_front_zip;
      $NM_val_form['home_base_address'] = $this->home_base_address;
      $NM_val_form['home_base_city'] = $this->home_base_city;
      $NM_val_form['home_base_zip'] = $this->home_base_zip;
      $NM_val_form['store_front_state'] = $this->store_front_state;
      $NM_val_form['home_base_state'] = $this->home_base_state;
      $NM_val_form['record_created'] = $this->record_created;
      $NM_val_form['appn_date'] = $this->appn_date;
      $NM_val_form['appn_note'] = $this->appn_note;
      $NM_val_form['doc_sec_of_state'] = $this->doc_sec_of_state;
      $NM_val_form['doc_city_bus_lic'] = $this->doc_city_bus_lic;
      $NM_val_form['doc_agric_lic'] = $this->doc_agric_lic;
      $NM_val_form['doc_last_year_tax'] = $this->doc_last_year_tax;
      $NM_val_form['qb_id'] = $this->qb_id;
      $NM_val_form['main_contact_img_file'] = $this->main_contact_img_file;
      $NM_val_form['main_contact_img_size'] = $this->main_contact_img_size;
      $NM_val_form['main_contact_img_id_prev'] = $this->main_contact_img_id_prev;
      $NM_val_form['memb_qty'] = $this->memb_qty;
      $NM_val_form['doc_type'] = $this->doc_type;
      $NM_val_form['doc_file'] = $this->doc_file;
      $NM_val_form['doc_filename'] = $this->doc_filename;
      $NM_val_form['doc_filesize'] = $this->doc_filesize;
      $NM_val_form['applicant_name'] = $this->applicant_name;
      $NM_val_form['applicant_signature'] = $this->applicant_signature;
      $NM_val_form['applicant_title'] = $this->applicant_title;
      $NM_val_form['addtl_memb_mail'] = $this->addtl_memb_mail;
      $NM_val_form['adtl_memb_name'] = $this->adtl_memb_name;
      $NM_val_form['adtl_memb_note'] = $this->adtl_memb_note;
      $NM_val_form['adtl_memb_phone'] = $this->adtl_memb_phone;
      $NM_val_form['dummy01'] = $this->dummy01;
      $NM_val_form['dummy03'] = $this->dummy03;
      $NM_val_form['dummy04'] = $this->dummy04;
      $NM_val_form['dummy05'] = $this->dummy05;
      $NM_val_form['dummy06'] = $this->dummy06;
      $NM_val_form['dummy09'] = $this->dummy09;
      $NM_val_form['dummy10'] = $this->dummy10;
      $NM_val_form['dummy11'] = $this->dummy11;
      $NM_val_form['dummy12'] = $this->dummy12;
      $NM_val_form['dummy13'] = $this->dummy13;
      $NM_val_form['est_memb_cost'] = $this->est_memb_cost;
      $NM_val_form['main_contact_title_lbl'] = $this->main_contact_title_lbl;
      $NM_val_form['memb_01'] = $this->memb_01;
      $NM_val_form['memb_02'] = $this->memb_02;
      $NM_val_form['memb_03'] = $this->memb_03;
      $NM_val_form['memb_04'] = $this->memb_04;
      $NM_val_form['memb_05'] = $this->memb_05;
      $NM_val_form['memb_06'] = $this->memb_06;
      $NM_val_form['memb_07'] = $this->memb_07;
      $NM_val_form['memb_08'] = $this->memb_08;
      $NM_val_form['memb_09'] = $this->memb_09;
      $NM_val_form['memb_10'] = $this->memb_10;
      $NM_val_form['memb_11'] = $this->memb_11;
      $NM_val_form['memb_12'] = $this->memb_12;
      $NM_val_form['memb_13'] = $this->memb_13;
      $NM_val_form['memb_email'] = $this->memb_email;
      $NM_val_form['memb_levels'] = $this->memb_levels;
      $NM_val_form['memb_name'] = $this->memb_name;
      $NM_val_form['memb_note'] = $this->memb_note;
      $NM_val_form['memb_phone'] = $this->memb_phone;
      $NM_val_form['paid'] = $this->paid;
      $NM_val_form['pay'] = $this->pay;
      $NM_val_form['read_at_sign'] = $this->read_at_sign;
      $NM_val_form['rules'] = $this->rules;
      $NM_val_form['rules_warn'] = $this->rules_warn;
      $NM_val_form['submitted'] = $this->submitted;
      $NM_val_form['transaction'] = $this->transaction;
      $NM_val_form['xlsx_sample'] = $this->xlsx_sample;
      if ($this->client_id === "" || is_null($this->client_id))  
      { 
          $this->client_id = 0;
      } 
      if ($this->membershipid === "" || is_null($this->membershipid))  
      { 
          $this->membershipid = 0;
          $this->sc_force_zero[] = 'membershipid';
      } 
      if ($this->memb_status_id === "" || is_null($this->memb_status_id))  
      { 
          $this->memb_status_id = 0;
          $this->sc_force_zero[] = 'memb_status_id';
      } 
      if ($this->appn_id === "" || is_null($this->appn_id))  
      { 
          $this->appn_id = 0;
          $this->sc_force_zero[] = 'appn_id';
      } 
      if ($this->fresh_cut_allowed === "" || is_null($this->fresh_cut_allowed))  
      { 
          $this->fresh_cut_allowed = 0;
          $this->sc_force_zero[] = 'fresh_cut_allowed';
      } 
      if ($this->temporary_pass === "" || is_null($this->temporary_pass))  
      { 
          $this->temporary_pass = 0;
          $this->sc_force_zero[] = 'temporary_pass';
      } 
      if ($this->ofa_member === "" || is_null($this->ofa_member))  
      { 
          $this->ofa_member = 0;
          $this->sc_force_zero[] = 'ofa_member';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->restricted === "" || is_null($this->restricted))  
      { 
          $this->restricted = 0;
          $this->sc_force_zero[] = 'restricted';
      } 
      if ($this->committee_approval_required === "" || is_null($this->committee_approval_required))  
      { 
          $this->committee_approval_required = 0;
          $this->sc_force_zero[] = 'committee_approval_required';
      } 
      if ($this->archive === "" || is_null($this->archive))  
      { 
          $this->archive = 0;
          $this->sc_force_zero[] = 'archive';
      } 
      if ($this->pricing_level_id === "" || is_null($this->pricing_level_id))  
      { 
          $this->pricing_level_id = 0;
          $this->sc_force_zero[] = 'pricing_level_id';
      } 
      if ($this->bus_cat_id === "" || is_null($this->bus_cat_id))  
      { 
          $this->bus_cat_id = 0;
          $this->sc_force_zero[] = 'bus_cat_id';
      } 
      if ($this->bus_subcat_id === "" || is_null($this->bus_subcat_id))  
      { 
          $this->bus_subcat_id = 0;
          $this->sc_force_zero[] = 'bus_subcat_id';
      } 
      if ($this->qb_id === "" || is_null($this->qb_id))  
      { 
          $this->qb_id = 0;
          $this->sc_force_zero[] = 'qb_id';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, $this->Ini->nm_bases_db2, array('pdo_sqlsrv'));
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->co_name_before_qstr = $this->co_name;
          $this->co_name = substr($this->Db->qstr($this->co_name), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->co_name = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->co_name);
          }
          if ($this->co_name == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->co_name = "null"; 
              $this->NM_val_null[] = "co_name";
          } 
          $this->ofa_contact_before_qstr = $this->ofa_contact;
          $this->ofa_contact = substr($this->Db->qstr($this->ofa_contact), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->ofa_contact = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->ofa_contact);
          }
          if ($this->ofa_contact == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ofa_contact = "null"; 
              $this->NM_val_null[] = "ofa_contact";
          } 
          $this->street_address_before_qstr = $this->street_address;
          $this->street_address = substr($this->Db->qstr($this->street_address), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->street_address = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->street_address);
          }
          if ($this->street_address == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->street_address = "null"; 
              $this->NM_val_null[] = "street_address";
          } 
          $this->mailing_address_before_qstr = $this->mailing_address;
          $this->mailing_address = substr($this->Db->qstr($this->mailing_address), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->mailing_address = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->mailing_address);
          }
          if ($this->mailing_address == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->mailing_address = "null"; 
              $this->NM_val_null[] = "mailing_address";
          } 
          $this->city_before_qstr = $this->city;
          $this->city = substr($this->Db->qstr($this->city), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->city = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->city);
          }
          if ($this->city == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->city = "null"; 
              $this->NM_val_null[] = "city";
          } 
          $this->state_before_qstr = $this->state;
          $this->state = substr($this->Db->qstr($this->state), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->state = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->state);
          }
          if ($this->state == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->state = "null"; 
              $this->NM_val_null[] = "state";
          } 
          $this->zip_code_before_qstr = $this->zip_code;
          $this->zip_code = substr($this->Db->qstr($this->zip_code), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->zip_code = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->zip_code);
          }
          if ($this->zip_code == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->zip_code = "null"; 
              $this->NM_val_null[] = "zip_code";
          } 
          $this->phone_number_before_qstr = $this->phone_number;
          $this->phone_number = substr($this->Db->qstr($this->phone_number), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->phone_number = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->phone_number);
          }
          if ($this->phone_number == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->phone_number = "null"; 
              $this->NM_val_null[] = "phone_number";
          } 
          $this->home_phone_before_qstr = $this->home_phone;
          $this->home_phone = substr($this->Db->qstr($this->home_phone), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->home_phone = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->home_phone);
          }
          if ($this->home_phone == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->home_phone = "null"; 
              $this->NM_val_null[] = "home_phone";
          } 
          $this->fax_number_before_qstr = $this->fax_number;
          $this->fax_number = substr($this->Db->qstr($this->fax_number), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fax_number = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->fax_number);
          }
          if ($this->fax_number == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->fax_number = "null"; 
              $this->NM_val_null[] = "fax_number";
          } 
          $this->email_before_qstr = $this->email;
          $this->email = substr($this->Db->qstr($this->email), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->email = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->email);
          }
          if ($this->email == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->email = "null"; 
              $this->NM_val_null[] = "email";
          } 
          $this->business_type_before_qstr = $this->business_type;
          $this->business_type = substr($this->Db->qstr($this->business_type), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->business_type = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->business_type);
          }
          if ($this->business_type == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->business_type = "null"; 
              $this->NM_val_null[] = "business_type";
          } 
          $this->business_license_before_qstr = $this->business_license;
          $this->business_license = substr($this->Db->qstr($this->business_license), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->business_license = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->business_license);
          }
          if ($this->business_license == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->business_license = "null"; 
              $this->NM_val_null[] = "business_license";
          } 
          $this->nursery_license_before_qstr = $this->nursery_license;
          $this->nursery_license = substr($this->Db->qstr($this->nursery_license), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->nursery_license = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->nursery_license);
          }
          if ($this->nursery_license == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nursery_license = "null"; 
              $this->NM_val_null[] = "nursery_license";
          } 
          $this->federal_tax_id_before_qstr = $this->federal_tax_id;
          $this->federal_tax_id = substr($this->Db->qstr($this->federal_tax_id), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->federal_tax_id = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->federal_tax_id);
          }
          if ($this->federal_tax_id == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->federal_tax_id = "null"; 
              $this->NM_val_null[] = "federal_tax_id";
          } 
          if ($this->starting_date == "")  
          { 
              $this->starting_date = "null"; 
              $this->NM_val_null[] = "starting_date";
          } 
          if ($this->renewal_date == "")  
          { 
              $this->renewal_date = "null"; 
              $this->NM_val_null[] = "renewal_date";
          } 
          if ($this->expiration_date == "")  
          { 
              $this->expiration_date = "null"; 
              $this->NM_val_null[] = "expiration_date";
          } 
          $this->canceled_before_qstr = $this->canceled;
          $this->canceled = substr($this->Db->qstr($this->canceled), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->canceled = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->canceled);
          }
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->canceled == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->canceled = "null"; 
                  $this->NM_val_null[] = "canceled";
              } 
          }
          if ($this->cancel_date == "")  
          { 
              $this->cancel_date = "null"; 
              $this->NM_val_null[] = "cancel_date";
          } 
          $this->canceled_by_before_qstr = $this->canceled_by;
          $this->canceled_by = substr($this->Db->qstr($this->canceled_by), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->canceled_by = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->canceled_by);
          }
          if ($this->canceled_by == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->canceled_by = "null"; 
              $this->NM_val_null[] = "canceled_by";
          } 
          $this->reason_canceled_before_qstr = $this->reason_canceled;
          $this->reason_canceled = substr($this->Db->qstr($this->reason_canceled), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->reason_canceled = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->reason_canceled);
          }
          if ($this->reason_canceled == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->reason_canceled = "null"; 
              $this->NM_val_null[] = "reason_canceled";
          } 
          if ($this->retire_date == "")  
          { 
              $this->retire_date = "null"; 
              $this->NM_val_null[] = "retire_date";
          } 
          $this->verified_receipts_before_qstr = $this->verified_receipts;
          $this->verified_receipts = substr($this->Db->qstr($this->verified_receipts), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->verified_receipts = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->verified_receipts);
          }
          if ($this->verified_receipts == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->verified_receipts = "null"; 
              $this->NM_val_null[] = "verified_receipts";
          } 
          if ($this->date_last_updated == "")  
          { 
              $this->date_last_updated = "null"; 
              $this->NM_val_null[] = "date_last_updated";
          } 
          $this->type_company_before_qstr = $this->type_company;
          $this->type_company = substr($this->Db->qstr($this->type_company), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->type_company = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->type_company);
          }
          if ($this->type_company == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->type_company = "null"; 
              $this->NM_val_null[] = "type_company";
          } 
          if ($this->archive_date == "")  
          { 
              $this->archive_date = "null"; 
              $this->NM_val_null[] = "archive_date";
          } 
          $this->store_front_address_before_qstr = $this->store_front_address;
          $this->store_front_address = substr($this->Db->qstr($this->store_front_address), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->store_front_address = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->store_front_address);
          }
          if ($this->store_front_address == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->store_front_address = "null"; 
              $this->NM_val_null[] = "store_front_address";
          } 
          $this->store_front_city_before_qstr = $this->store_front_city;
          $this->store_front_city = substr($this->Db->qstr($this->store_front_city), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->store_front_city = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->store_front_city);
          }
          if ($this->store_front_city == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->store_front_city = "null"; 
              $this->NM_val_null[] = "store_front_city";
          } 
          $this->store_front_zip_before_qstr = $this->store_front_zip;
          $this->store_front_zip = substr($this->Db->qstr($this->store_front_zip), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->store_front_zip = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->store_front_zip);
          }
          if ($this->store_front_zip == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->store_front_zip = "null"; 
              $this->NM_val_null[] = "store_front_zip";
          } 
          $this->home_base_address_before_qstr = $this->home_base_address;
          $this->home_base_address = substr($this->Db->qstr($this->home_base_address), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->home_base_address = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->home_base_address);
          }
          if ($this->home_base_address == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->home_base_address = "null"; 
              $this->NM_val_null[] = "home_base_address";
          } 
          $this->home_base_city_before_qstr = $this->home_base_city;
          $this->home_base_city = substr($this->Db->qstr($this->home_base_city), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->home_base_city = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->home_base_city);
          }
          if ($this->home_base_city == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->home_base_city = "null"; 
              $this->NM_val_null[] = "home_base_city";
          } 
          $this->home_base_zip_before_qstr = $this->home_base_zip;
          $this->home_base_zip = substr($this->Db->qstr($this->home_base_zip), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->home_base_zip = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->home_base_zip);
          }
          if ($this->home_base_zip == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->home_base_zip = "null"; 
              $this->NM_val_null[] = "home_base_zip";
          } 
          $this->store_front_state_before_qstr = $this->store_front_state;
          $this->store_front_state = substr($this->Db->qstr($this->store_front_state), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->store_front_state = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->store_front_state);
          }
          if ($this->store_front_state == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->store_front_state = "null"; 
              $this->NM_val_null[] = "store_front_state";
          } 
          $this->home_base_state_before_qstr = $this->home_base_state;
          $this->home_base_state = substr($this->Db->qstr($this->home_base_state), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->home_base_state = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->home_base_state);
          }
          if ($this->home_base_state == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->home_base_state = "null"; 
              $this->NM_val_null[] = "home_base_state";
          } 
          if ($this->record_created == "")  
          { 
              $this->record_created = "null"; 
              $this->NM_val_null[] = "record_created";
          } 
          if ($this->permanent_member_date == "")  
          { 
              $this->permanent_member_date = "null"; 
              $this->NM_val_null[] = "permanent_member_date";
          } 
          $this->acct_instagram_before_qstr = $this->acct_instagram;
          $this->acct_instagram = substr($this->Db->qstr($this->acct_instagram), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->acct_instagram = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->acct_instagram);
          }
          if ($this->acct_instagram == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->acct_instagram = "null"; 
              $this->NM_val_null[] = "acct_instagram";
          } 
          $this->acct_facebook_before_qstr = $this->acct_facebook;
          $this->acct_facebook = substr($this->Db->qstr($this->acct_facebook), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->acct_facebook = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->acct_facebook);
          }
          if ($this->acct_facebook == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->acct_facebook = "null"; 
              $this->NM_val_null[] = "acct_facebook";
          } 
          $this->website_url_before_qstr = $this->website_url;
          $this->website_url = substr($this->Db->qstr($this->website_url), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->website_url = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->website_url);
          }
          if ($this->website_url == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->website_url = "null"; 
              $this->NM_val_null[] = "website_url";
          } 
          $this->bus_subcat_other_before_qstr = $this->bus_subcat_other;
          $this->bus_subcat_other = substr($this->Db->qstr($this->bus_subcat_other), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->bus_subcat_other = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->bus_subcat_other);
          }
          if ($this->bus_subcat_other == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->bus_subcat_other = "null"; 
              $this->NM_val_null[] = "bus_subcat_other";
          } 
          if ($this->appn_date == "")  
          { 
              $this->appn_date = "null"; 
              $this->NM_val_null[] = "appn_date";
          } 
          $this->appn_note_before_qstr = $this->appn_note;
          $this->appn_note = substr($this->Db->qstr($this->appn_note), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->appn_note = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->appn_note);
          }
          if ($this->appn_note == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->appn_note = "null"; 
              $this->NM_val_null[] = "appn_note";
          } 
          if ($this->doc_sec_of_state == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->doc_sec_of_state = "null"; 
              $this->NM_val_null[] = "doc_sec_of_state";
          } 
          if ($this->doc_city_bus_lic == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->doc_city_bus_lic = "null"; 
              $this->NM_val_null[] = "doc_city_bus_lic";
          } 
          if ($this->doc_agric_lic == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->doc_agric_lic = "null"; 
              $this->NM_val_null[] = "doc_agric_lic";
          } 
          if ($this->doc_last_year_tax == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->doc_last_year_tax = "null"; 
              $this->NM_val_null[] = "doc_last_year_tax";
          } 
          $this->main_contact_name_before_qstr = $this->main_contact_name;
          $this->main_contact_name = substr($this->Db->qstr($this->main_contact_name), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->main_contact_name = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->main_contact_name);
          }
          if ($this->main_contact_name == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->main_contact_name = "null"; 
              $this->NM_val_null[] = "main_contact_name";
          } 
          $this->main_contact_phone_before_qstr = $this->main_contact_phone;
          $this->main_contact_phone = substr($this->Db->qstr($this->main_contact_phone), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->main_contact_phone = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->main_contact_phone);
          }
          if ($this->main_contact_phone == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->main_contact_phone = "null"; 
              $this->NM_val_null[] = "main_contact_phone";
          } 
          $this->main_contact_email_before_qstr = $this->main_contact_email;
          $this->main_contact_email = substr($this->Db->qstr($this->main_contact_email), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->main_contact_email = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->main_contact_email);
          }
          if ($this->main_contact_email == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->main_contact_email = "null"; 
              $this->NM_val_null[] = "main_contact_email";
          } 
          $this->main_contact_title_before_qstr = $this->main_contact_title;
          $this->main_contact_title = substr($this->Db->qstr($this->main_contact_title), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->main_contact_title = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->main_contact_title);
          }
          if ($this->main_contact_title == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->main_contact_title = "null"; 
              $this->NM_val_null[] = "main_contact_title";
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) 
          { 
              if (substr($this->main_contact_img_id, 0, 4) != "*nm*" && $this->main_contact_img_id != 'null') 
              { 
                  $this->main_contact_img_id = "*nm*" . base64_encode($this->main_contact_img_id) ; 
              } 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase)) 
          {
              $this->main_contact_img_id = str_replace("'", "''", $this->main_contact_img_id);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
          { 
              if ($this->Ini->nm_tpbanco != "pdo_sqlsrv" && substr($this->main_contact_img_id, 0, 4) != "*nm*" && $this->main_contact_img_id != 'null') 
              { 
                  $this->main_contact_img_id = "*nm*" . base64_encode($this->main_contact_img_id) ; 
              } 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle)) 
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase)) 
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { }
          else
          { 
              $this->main_contact_img_id =  substr($this->Db->qstr($this->main_contact_img_id), 1, -1);
          } 
          if ($this->main_contact_img_id == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->main_contact_img_id = "null"; 
              $this->NM_val_null[] = "main_contact_img_id";
          } 
          $this->main_contact_img_file_before_qstr = $this->main_contact_img_file;
          $this->main_contact_img_file = substr($this->Db->qstr($this->main_contact_img_file), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->main_contact_img_file = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->main_contact_img_file);
          }
          if ($this->main_contact_img_file == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->main_contact_img_file = "null"; 
              $this->NM_val_null[] = "main_contact_img_file";
          } 
          $this->main_contact_img_size_before_qstr = $this->main_contact_img_size;
          $this->main_contact_img_size = substr($this->Db->qstr($this->main_contact_img_size), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->main_contact_img_size = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->main_contact_img_size);
          }
          if ($this->main_contact_img_size == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->main_contact_img_size = "null"; 
              $this->NM_val_null[] = "main_contact_img_size";
          } 
          if ($this->main_contact_img_id_prev == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->main_contact_img_id_prev = "null"; 
              $this->NM_val_null[] = "main_contact_img_id_prev";
          } 
          $this->memb_qty_before_qstr = $this->memb_qty;
          $this->memb_qty = substr($this->Db->qstr($this->memb_qty), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->memb_qty = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->memb_qty);
          }
          if ($this->memb_qty == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->memb_qty = "null"; 
              $this->NM_val_null[] = "memb_qty";
          } 
          $this->doc_type_before_qstr = $this->doc_type;
          $this->doc_type = substr($this->Db->qstr($this->doc_type), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->doc_type = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->doc_type);
          }
          if ($this->doc_type == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->doc_type = "null"; 
              $this->NM_val_null[] = "doc_type";
          } 
          if ($this->doc_file == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->doc_file = "null"; 
              $this->NM_val_null[] = "doc_file";
          } 
          $this->doc_filename_before_qstr = $this->doc_filename;
          $this->doc_filename = substr($this->Db->qstr($this->doc_filename), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->doc_filename = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->doc_filename);
          }
          if ($this->doc_filename == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->doc_filename = "null"; 
              $this->NM_val_null[] = "doc_filename";
          } 
          $this->doc_filesize_before_qstr = $this->doc_filesize;
          $this->doc_filesize = substr($this->Db->qstr($this->doc_filesize), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->doc_filesize = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->doc_filesize);
          }
          if ($this->doc_filesize == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->doc_filesize = "null"; 
              $this->NM_val_null[] = "doc_filesize";
          } 
          $this->applicant_name_before_qstr = $this->applicant_name;
          $this->applicant_name = substr($this->Db->qstr($this->applicant_name), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->applicant_name = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->applicant_name);
          }
          if ($this->applicant_name == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->applicant_name = "null"; 
              $this->NM_val_null[] = "applicant_name";
          } 
          if ($this->applicant_signature == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->applicant_signature = "null"; 
              $this->NM_val_null[] = "applicant_signature";
          } 
          $this->applicant_title_before_qstr = $this->applicant_title;
          $this->applicant_title = substr($this->Db->qstr($this->applicant_title), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->applicant_title = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->applicant_title);
          }
          if ($this->applicant_title == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->applicant_title = "null"; 
              $this->NM_val_null[] = "applicant_title";
          } 
          $this->client_pmts_before_qstr = $this->client_pmts;
          $this->client_pmts = substr($this->Db->qstr($this->client_pmts), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->client_pmts = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->client_pmts);
          }
          if ($this->client_pmts == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->client_pmts = "null"; 
              $this->NM_val_null[] = "client_pmts";
          } 
          $this->docs_before_qstr = $this->docs;
          $this->docs = substr($this->Db->qstr($this->docs), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->docs = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->docs);
          }
          if ($this->docs == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->docs = "null"; 
              $this->NM_val_null[] = "docs";
          } 
          $this->memb_list_before_qstr = $this->memb_list;
          $this->memb_list = substr($this->Db->qstr($this->memb_list), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->memb_list = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->memb_list);
          }
          if ($this->memb_list == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->memb_list = "null"; 
              $this->NM_val_null[] = "memb_list";
          } 
          $this->notes_before_qstr = $this->notes;
          $this->notes = substr($this->Db->qstr($this->notes), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->notes = str_replace(array("\\r\\n", "\\n", "\r\n"), array("\r\n", "\n", "\n"), $this->notes);
          }
          if ($this->notes == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->notes = "null"; 
              $this->NM_val_null[] = "notes";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where client_id = $this->client_id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where client_id = $this->client_id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where client_id = $this->client_id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where client_id = $this->client_id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where client_id = $this->client_id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where client_id = $this->client_id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where client_id = $this->client_id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where client_id = $this->client_id "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where client_id = $this->client_id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where client_id = $this->client_id "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_clients_staff_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              $aDoNotUpdate = array();
              if ($this->membershipid == 0) {
                  $this->membershipid = $this->client_id;
              }
              if ($this->main_contact_img_id_limpa == "S") 
              { 
                  if ($this->main_contact_img_file != "null") 
                  { 
                      $this->main_contact_img_file = ''; 
                  } 
                  $NM_val_form['main_contact_img_file'] = ''; 
                  $this->main_contact_img_size = 0; 
                  $NM_val_form['main_contact_img_size'] = 0; 
              } 
              if ($this->doc_file_limpa == "S") 
              { 
                  if ($this->doc_filename != "null") 
                  { 
                      $this->doc_filename = ''; 
                  } 
                  $NM_val_form['doc_filename'] = ''; 
                  $this->doc_filesize = 0; 
                  $NM_val_form['doc_filesize'] = 0; 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "MembershipID = $this->membershipid, memb_status_id = $this->memb_status_id, co_name = '$this->co_name', mailing_address = '$this->mailing_address', city = '$this->city', state = '$this->state', zip_code = '$this->zip_code', renewal_date = #$this->renewal_date#, pricing_level_id = $this->pricing_level_id, permanent_member_date = #$this->permanent_member_date#, acct_instagram = '$this->acct_instagram', acct_facebook = '$this->acct_facebook', website_url = '$this->website_url', bus_cat_id = $this->bus_cat_id, bus_subcat_id = $this->bus_subcat_id, bus_subcat_other = '$this->bus_subcat_other', main_contact_name = '$this->main_contact_name', main_contact_phone = '$this->main_contact_phone', main_contact_email = '$this->main_contact_email', main_contact_title = '$this->main_contact_title'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "MembershipID = $this->membershipid, memb_status_id = $this->memb_status_id, co_name = '$this->co_name', mailing_address = '$this->mailing_address', city = '$this->city', state = '$this->state', zip_code = '$this->zip_code', renewal_date = " . $this->Ini->date_delim . $this->renewal_date . $this->Ini->date_delim1 . ", pricing_level_id = $this->pricing_level_id, permanent_member_date = " . $this->Ini->date_delim . $this->permanent_member_date . $this->Ini->date_delim1 . ", acct_instagram = '$this->acct_instagram', acct_facebook = '$this->acct_facebook', website_url = '$this->website_url', bus_cat_id = $this->bus_cat_id, bus_subcat_id = $this->bus_subcat_id, bus_subcat_other = '$this->bus_subcat_other', main_contact_name = '$this->main_contact_name', main_contact_phone = '$this->main_contact_phone', main_contact_email = '$this->main_contact_email', main_contact_title = '$this->main_contact_title'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "MembershipID = $this->membershipid, memb_status_id = $this->memb_status_id, co_name = '$this->co_name', mailing_address = '$this->mailing_address', city = '$this->city', state = '$this->state', zip_code = '$this->zip_code', renewal_date = " . $this->Ini->date_delim . $this->renewal_date . $this->Ini->date_delim1 . ", pricing_level_id = $this->pricing_level_id, permanent_member_date = " . $this->Ini->date_delim . $this->permanent_member_date . $this->Ini->date_delim1 . ", acct_instagram = '$this->acct_instagram', acct_facebook = '$this->acct_facebook', website_url = '$this->website_url', bus_cat_id = $this->bus_cat_id, bus_subcat_id = $this->bus_subcat_id, bus_subcat_other = '$this->bus_subcat_other', main_contact_name = '$this->main_contact_name', main_contact_phone = '$this->main_contact_phone', main_contact_email = '$this->main_contact_email', main_contact_title = '$this->main_contact_title'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "MembershipID = $this->membershipid, memb_status_id = $this->memb_status_id, co_name = '$this->co_name', mailing_address = '$this->mailing_address', city = '$this->city', state = '$this->state', zip_code = '$this->zip_code', renewal_date = EXTEND('$this->renewal_date', YEAR TO FRACTION), pricing_level_id = $this->pricing_level_id, permanent_member_date = EXTEND('$this->permanent_member_date', YEAR TO FRACTION), acct_instagram = '$this->acct_instagram', acct_facebook = '$this->acct_facebook', website_url = '$this->website_url', bus_cat_id = $this->bus_cat_id, bus_subcat_id = $this->bus_subcat_id, bus_subcat_other = '$this->bus_subcat_other', main_contact_name = '$this->main_contact_name', main_contact_phone = '$this->main_contact_phone', main_contact_email = '$this->main_contact_email', main_contact_title = '$this->main_contact_title'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "MembershipID = $this->membershipid, memb_status_id = $this->memb_status_id, co_name = '$this->co_name', mailing_address = '$this->mailing_address', city = '$this->city', state = '$this->state', zip_code = '$this->zip_code', renewal_date = " . $this->Ini->date_delim . $this->renewal_date . $this->Ini->date_delim1 . ", pricing_level_id = $this->pricing_level_id, permanent_member_date = " . $this->Ini->date_delim . $this->permanent_member_date . $this->Ini->date_delim1 . ", acct_instagram = '$this->acct_instagram', acct_facebook = '$this->acct_facebook', website_url = '$this->website_url', bus_cat_id = $this->bus_cat_id, bus_subcat_id = $this->bus_subcat_id, bus_subcat_other = '$this->bus_subcat_other', main_contact_name = '$this->main_contact_name', main_contact_phone = '$this->main_contact_phone', main_contact_email = '$this->main_contact_email', main_contact_title = '$this->main_contact_title'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "MembershipID = $this->membershipid, memb_status_id = $this->memb_status_id, co_name = '$this->co_name', mailing_address = '$this->mailing_address', city = '$this->city', state = '$this->state', zip_code = '$this->zip_code', renewal_date = " . $this->Ini->date_delim . $this->renewal_date . $this->Ini->date_delim1 . ", pricing_level_id = $this->pricing_level_id, permanent_member_date = " . $this->Ini->date_delim . $this->permanent_member_date . $this->Ini->date_delim1 . ", acct_instagram = '$this->acct_instagram', acct_facebook = '$this->acct_facebook', website_url = '$this->website_url', bus_cat_id = $this->bus_cat_id, bus_subcat_id = $this->bus_subcat_id, bus_subcat_other = '$this->bus_subcat_other', main_contact_name = '$this->main_contact_name', main_contact_phone = '$this->main_contact_phone', main_contact_email = '$this->main_contact_email', main_contact_title = '$this->main_contact_title'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "MembershipID = $this->membershipid, memb_status_id = $this->memb_status_id, co_name = '$this->co_name', mailing_address = '$this->mailing_address', city = '$this->city', state = '$this->state', zip_code = '$this->zip_code', renewal_date = " . $this->Ini->date_delim . $this->renewal_date . $this->Ini->date_delim1 . ", pricing_level_id = $this->pricing_level_id, permanent_member_date = " . $this->Ini->date_delim . $this->permanent_member_date . $this->Ini->date_delim1 . ", acct_instagram = '$this->acct_instagram', acct_facebook = '$this->acct_facebook', website_url = '$this->website_url', bus_cat_id = $this->bus_cat_id, bus_subcat_id = $this->bus_subcat_id, bus_subcat_other = '$this->bus_subcat_other', main_contact_name = '$this->main_contact_name', main_contact_phone = '$this->main_contact_phone', main_contact_email = '$this->main_contact_email', main_contact_title = '$this->main_contact_title'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['appn_id']) && $NM_val_form['appn_id'] == "null"  && $this->nmgp_dados_select['appn_id'] == "") ? "null" : $this->nmgp_dados_select['appn_id'];
              if (isset($NM_val_form['appn_id']) && $NM_val_form['appn_id'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "appn_id = $this->appn_id"; 
              } 
              $Prep_Tst = (isset($NM_val_form['ofa_contact']) && $NM_val_form['ofa_contact'] == "null"  && $this->nmgp_dados_select['ofa_contact'] == "") ? "null" : $this->nmgp_dados_select['ofa_contact'];
              if (isset($NM_val_form['ofa_contact']) && $NM_val_form['ofa_contact'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "ofa_contact = '$this->ofa_contact'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['street_address']) && $NM_val_form['street_address'] == "null"  && $this->nmgp_dados_select['street_address'] == "") ? "null" : $this->nmgp_dados_select['street_address'];
              if (isset($NM_val_form['street_address']) && $NM_val_form['street_address'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "street_address = '$this->street_address'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['phone_number']) && $NM_val_form['phone_number'] == "null"  && $this->nmgp_dados_select['phone_number'] == "") ? "null" : $this->nmgp_dados_select['phone_number'];
              if (isset($NM_val_form['phone_number']) && $NM_val_form['phone_number'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "phone_number = '$this->phone_number'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['home_phone']) && $NM_val_form['home_phone'] == "null"  && $this->nmgp_dados_select['home_phone'] == "") ? "null" : $this->nmgp_dados_select['home_phone'];
              if (isset($NM_val_form['home_phone']) && $NM_val_form['home_phone'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "home_phone = '$this->home_phone'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['fax_number']) && $NM_val_form['fax_number'] == "null"  && $this->nmgp_dados_select['fax_number'] == "") ? "null" : $this->nmgp_dados_select['fax_number'];
              if (isset($NM_val_form['fax_number']) && $NM_val_form['fax_number'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "fax_number = '$this->fax_number'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['email']) && $NM_val_form['email'] == "null"  && $this->nmgp_dados_select['email'] == "") ? "null" : $this->nmgp_dados_select['email'];
              if (isset($NM_val_form['email']) && $NM_val_form['email'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "email = '$this->email'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['business_type']) && $NM_val_form['business_type'] == "null"  && $this->nmgp_dados_select['business_type'] == "") ? "null" : $this->nmgp_dados_select['business_type'];
              if (isset($NM_val_form['business_type']) && $NM_val_form['business_type'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "business_type = '$this->business_type'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['fresh_cut_allowed']) && $NM_val_form['fresh_cut_allowed'] == "null"  && $this->nmgp_dados_select['fresh_cut_allowed'] == "") ? "null" : $this->nmgp_dados_select['fresh_cut_allowed'];
              if (isset($NM_val_form['fresh_cut_allowed']) && $NM_val_form['fresh_cut_allowed'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "fresh_cut_allowed = $this->fresh_cut_allowed"; 
              } 
              $Prep_Tst = (isset($NM_val_form['business_license']) && $NM_val_form['business_license'] == "null"  && $this->nmgp_dados_select['business_license'] == "") ? "null" : $this->nmgp_dados_select['business_license'];
              if (isset($NM_val_form['business_license']) && $NM_val_form['business_license'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "business_license = '$this->business_license'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['nursery_license']) && $NM_val_form['nursery_license'] == "null"  && $this->nmgp_dados_select['nursery_license'] == "") ? "null" : $this->nmgp_dados_select['nursery_license'];
              if (isset($NM_val_form['nursery_license']) && $NM_val_form['nursery_license'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "nursery_license = '$this->nursery_license'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['federal_tax_id']) && $NM_val_form['federal_tax_id'] == "null"  && $this->nmgp_dados_select['federal_tax_id'] == "") ? "null" : $this->nmgp_dados_select['federal_tax_id'];
              if (isset($NM_val_form['federal_tax_id']) && $NM_val_form['federal_tax_id'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "federal_tax_id = '$this->federal_tax_id'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['temporary_pass']) && $NM_val_form['temporary_pass'] == "null"  && $this->nmgp_dados_select['temporary_pass'] == "") ? "null" : $this->nmgp_dados_select['temporary_pass'];
              if (isset($NM_val_form['temporary_pass']) && $NM_val_form['temporary_pass'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "temporary_pass = $this->temporary_pass"; 
              } 
              $Prep_Tst = (isset($NM_val_form['ofa_member']) && $NM_val_form['ofa_member'] == "null"  && $this->nmgp_dados_select['ofa_member'] == "") ? "null" : $this->nmgp_dados_select['ofa_member'];
              if (isset($NM_val_form['ofa_member']) && $NM_val_form['ofa_member'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "ofa_member = $this->ofa_member"; 
              } 
              $Prep_Tst = (isset($NM_val_form['starting_date']) && $NM_val_form['starting_date'] == "null"  && $this->nmgp_dados_select['starting_date'] == "") ? "null" : $this->nmgp_dados_select['starting_date'];
              if (isset($NM_val_form['starting_date']) && $NM_val_form['starting_date'] != $Prep_Tst) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "starting_date = #$this->starting_date#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "starting_date = EXTEND('" . $this->starting_date . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "starting_date = " . $this->Ini->date_delim . $this->starting_date . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              $Prep_Tst = (isset($NM_val_form['expiration_date']) && $NM_val_form['expiration_date'] == "null"  && $this->nmgp_dados_select['expiration_date'] == "") ? "null" : $this->nmgp_dados_select['expiration_date'];
              if (isset($NM_val_form['expiration_date']) && $NM_val_form['expiration_date'] != $Prep_Tst) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "expiration_date = #$this->expiration_date#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "expiration_date = EXTEND('" . $this->expiration_date . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "expiration_date = " . $this->Ini->date_delim . $this->expiration_date . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              $Prep_Tst = (isset($NM_val_form['canceled']) && $NM_val_form['canceled'] == "null"  && $this->nmgp_dados_select['canceled'] == "") ? "null" : $this->nmgp_dados_select['canceled'];
              if (isset($NM_val_form['canceled']) && $NM_val_form['canceled'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "canceled = '$this->canceled'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['cancel_date']) && $NM_val_form['cancel_date'] == "null"  && $this->nmgp_dados_select['cancel_date'] == "") ? "null" : $this->nmgp_dados_select['cancel_date'];
              if (isset($NM_val_form['cancel_date']) && $NM_val_form['cancel_date'] != $Prep_Tst) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "cancel_date = #$this->cancel_date#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "cancel_date = EXTEND('" . $this->cancel_date . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "cancel_date = " . $this->Ini->date_delim . $this->cancel_date . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              $Prep_Tst = (isset($NM_val_form['canceled_by']) && $NM_val_form['canceled_by'] == "null"  && $this->nmgp_dados_select['canceled_by'] == "") ? "null" : $this->nmgp_dados_select['canceled_by'];
              if (isset($NM_val_form['canceled_by']) && $NM_val_form['canceled_by'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "canceled_by = '$this->canceled_by'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['reason_canceled']) && $NM_val_form['reason_canceled'] == "null"  && $this->nmgp_dados_select['reason_canceled'] == "") ? "null" : $this->nmgp_dados_select['reason_canceled'];
              if (isset($NM_val_form['reason_canceled']) && $NM_val_form['reason_canceled'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "reason_canceled = '$this->reason_canceled'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['retire_date']) && $NM_val_form['retire_date'] == "null"  && $this->nmgp_dados_select['retire_date'] == "") ? "null" : $this->nmgp_dados_select['retire_date'];
              if (isset($NM_val_form['retire_date']) && $NM_val_form['retire_date'] != $Prep_Tst) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "retire_date = #$this->retire_date#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "retire_date = EXTEND('" . $this->retire_date . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "retire_date = " . $this->Ini->date_delim . $this->retire_date . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              $Prep_Tst = (isset($NM_val_form['verified_receipts']) && $NM_val_form['verified_receipts'] == "null"  && $this->nmgp_dados_select['verified_receipts'] == "") ? "null" : $this->nmgp_dados_select['verified_receipts'];
              if (isset($NM_val_form['verified_receipts']) && $NM_val_form['verified_receipts'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "verified_receipts = '$this->verified_receipts'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['date_last_updated']) && $NM_val_form['date_last_updated'] == "null"  && $this->nmgp_dados_select['date_last_updated'] == "") ? "null" : $this->nmgp_dados_select['date_last_updated'];
              if (isset($NM_val_form['date_last_updated']) && $NM_val_form['date_last_updated'] != $Prep_Tst) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "date_last_updated = #$this->date_last_updated#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "date_last_updated = EXTEND('" . $this->date_last_updated . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "date_last_updated = " . $this->Ini->date_delim . $this->date_last_updated . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              $Prep_Tst = (isset($NM_val_form['restricted']) && $NM_val_form['restricted'] == "null"  && $this->nmgp_dados_select['restricted'] == "") ? "null" : $this->nmgp_dados_select['restricted'];
              if (isset($NM_val_form['restricted']) && $NM_val_form['restricted'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "restricted = $this->restricted"; 
              } 
              $Prep_Tst = (isset($NM_val_form['committee_approval_required']) && $NM_val_form['committee_approval_required'] == "null"  && $this->nmgp_dados_select['committee_approval_required'] == "") ? "null" : $this->nmgp_dados_select['committee_approval_required'];
              if (isset($NM_val_form['committee_approval_required']) && $NM_val_form['committee_approval_required'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "committee_approval_required = $this->committee_approval_required"; 
              } 
              $Prep_Tst = (isset($NM_val_form['type_company']) && $NM_val_form['type_company'] == "null"  && $this->nmgp_dados_select['type_company'] == "") ? "null" : $this->nmgp_dados_select['type_company'];
              if (isset($NM_val_form['type_company']) && $NM_val_form['type_company'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "type_company = '$this->type_company'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['archive']) && $NM_val_form['archive'] == "null"  && $this->nmgp_dados_select['archive'] == "") ? "null" : $this->nmgp_dados_select['archive'];
              if (isset($NM_val_form['archive']) && $NM_val_form['archive'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "archive = $this->archive"; 
              } 
              $Prep_Tst = (isset($NM_val_form['archive_date']) && $NM_val_form['archive_date'] == "null"  && $this->nmgp_dados_select['archive_date'] == "") ? "null" : $this->nmgp_dados_select['archive_date'];
              if (isset($NM_val_form['archive_date']) && $NM_val_form['archive_date'] != $Prep_Tst) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "archive_date = #$this->archive_date#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "archive_date = EXTEND('" . $this->archive_date . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "archive_date = " . $this->Ini->date_delim . $this->archive_date . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              $Prep_Tst = (isset($NM_val_form['store_front_address']) && $NM_val_form['store_front_address'] == "null"  && $this->nmgp_dados_select['store_front_address'] == "") ? "null" : $this->nmgp_dados_select['store_front_address'];
              if (isset($NM_val_form['store_front_address']) && $NM_val_form['store_front_address'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "store_front_address = '$this->store_front_address'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['store_front_city']) && $NM_val_form['store_front_city'] == "null"  && $this->nmgp_dados_select['store_front_city'] == "") ? "null" : $this->nmgp_dados_select['store_front_city'];
              if (isset($NM_val_form['store_front_city']) && $NM_val_form['store_front_city'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "store_front_city = '$this->store_front_city'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['store_front_zip']) && $NM_val_form['store_front_zip'] == "null"  && $this->nmgp_dados_select['store_front_zip'] == "") ? "null" : $this->nmgp_dados_select['store_front_zip'];
              if (isset($NM_val_form['store_front_zip']) && $NM_val_form['store_front_zip'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "store_front_zip = '$this->store_front_zip'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['home_base_address']) && $NM_val_form['home_base_address'] == "null"  && $this->nmgp_dados_select['home_base_address'] == "") ? "null" : $this->nmgp_dados_select['home_base_address'];
              if (isset($NM_val_form['home_base_address']) && $NM_val_form['home_base_address'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "home_base_address = '$this->home_base_address'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['home_base_city']) && $NM_val_form['home_base_city'] == "null"  && $this->nmgp_dados_select['home_base_city'] == "") ? "null" : $this->nmgp_dados_select['home_base_city'];
              if (isset($NM_val_form['home_base_city']) && $NM_val_form['home_base_city'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "home_base_city = '$this->home_base_city'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['home_base_zip']) && $NM_val_form['home_base_zip'] == "null"  && $this->nmgp_dados_select['home_base_zip'] == "") ? "null" : $this->nmgp_dados_select['home_base_zip'];
              if (isset($NM_val_form['home_base_zip']) && $NM_val_form['home_base_zip'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "home_base_zip = '$this->home_base_zip'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['store_front_state']) && $NM_val_form['store_front_state'] == "null"  && $this->nmgp_dados_select['store_front_state'] == "") ? "null" : $this->nmgp_dados_select['store_front_state'];
              if (isset($NM_val_form['store_front_state']) && $NM_val_form['store_front_state'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "store_front_state = '$this->store_front_state'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['home_base_state']) && $NM_val_form['home_base_state'] == "null"  && $this->nmgp_dados_select['home_base_state'] == "") ? "null" : $this->nmgp_dados_select['home_base_state'];
              if (isset($NM_val_form['home_base_state']) && $NM_val_form['home_base_state'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "home_base_state = '$this->home_base_state'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['record_created']) && $NM_val_form['record_created'] == "null"  && $this->nmgp_dados_select['record_created'] == "") ? "null" : $this->nmgp_dados_select['record_created'];
              if (isset($NM_val_form['record_created']) && $NM_val_form['record_created'] != $Prep_Tst) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "record_created = #$this->record_created#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "record_created = EXTEND('" . $this->record_created . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "record_created = " . $this->Ini->date_delim . $this->record_created . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              $Prep_Tst = (isset($NM_val_form['appn_date']) && $NM_val_form['appn_date'] == "null"  && $this->nmgp_dados_select['appn_date'] == "") ? "null" : $this->nmgp_dados_select['appn_date'];
              if (isset($NM_val_form['appn_date']) && $NM_val_form['appn_date'] != $Prep_Tst) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "appn_date = #$this->appn_date#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "appn_date = EXTEND('" . $this->appn_date . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "appn_date = " . $this->Ini->date_delim . $this->appn_date . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              $Prep_Tst = (isset($NM_val_form['appn_note']) && $NM_val_form['appn_note'] == "null"  && $this->nmgp_dados_select['appn_note'] == "") ? "null" : $this->nmgp_dados_select['appn_note'];
              if (isset($NM_val_form['appn_note']) && $NM_val_form['appn_note'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "appn_note = '$this->appn_note'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['qb_id']) && $NM_val_form['qb_id'] == "null"  && $this->nmgp_dados_select['qb_id'] == "") ? "null" : $this->nmgp_dados_select['qb_id'];
              if (isset($NM_val_form['qb_id']) && $NM_val_form['qb_id'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "qb_id = $this->qb_id"; 
              } 
              $Prep_Tst = (isset($NM_val_form['main_contact_img_file']) && $NM_val_form['main_contact_img_file'] == "null"  && $this->nmgp_dados_select['main_contact_img_file'] == "") ? "null" : $this->nmgp_dados_select['main_contact_img_file'];
              if (isset($NM_val_form['main_contact_img_file']) && $NM_val_form['main_contact_img_file'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "main_contact_img_file = '$this->main_contact_img_file'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['main_contact_img_size']) && $NM_val_form['main_contact_img_size'] == "null"  && $this->nmgp_dados_select['main_contact_img_size'] == "") ? "null" : $this->nmgp_dados_select['main_contact_img_size'];
              if (isset($NM_val_form['main_contact_img_size']) && $NM_val_form['main_contact_img_size'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "main_contact_img_size = '$this->main_contact_img_size'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['memb_qty']) && $NM_val_form['memb_qty'] == "null"  && $this->nmgp_dados_select['memb_qty'] == "") ? "null" : $this->nmgp_dados_select['memb_qty'];
              if (isset($NM_val_form['memb_qty']) && $NM_val_form['memb_qty'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "memb_qty = '$this->memb_qty'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['doc_type']) && $NM_val_form['doc_type'] == "null"  && $this->nmgp_dados_select['doc_type'] == "") ? "null" : $this->nmgp_dados_select['doc_type'];
              if (isset($NM_val_form['doc_type']) && $NM_val_form['doc_type'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "doc_type = '$this->doc_type'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['doc_filename']) && $NM_val_form['doc_filename'] == "null"  && $this->nmgp_dados_select['doc_filename'] == "") ? "null" : $this->nmgp_dados_select['doc_filename'];
              if (isset($NM_val_form['doc_filename']) && $NM_val_form['doc_filename'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "doc_filename = '$this->doc_filename'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['doc_filesize']) && $NM_val_form['doc_filesize'] == "null"  && $this->nmgp_dados_select['doc_filesize'] == "") ? "null" : $this->nmgp_dados_select['doc_filesize'];
              if (isset($NM_val_form['doc_filesize']) && $NM_val_form['doc_filesize'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "doc_filesize = '$this->doc_filesize'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['applicant_name']) && $NM_val_form['applicant_name'] == "null"  && $this->nmgp_dados_select['applicant_name'] == "") ? "null" : $this->nmgp_dados_select['applicant_name'];
              if (isset($NM_val_form['applicant_name']) && $NM_val_form['applicant_name'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "applicant_name = '$this->applicant_name'"; 
              } 
              $Prep_Tst = (isset($NM_val_form['applicant_title']) && $NM_val_form['applicant_title'] == "null"  && $this->nmgp_dados_select['applicant_title'] == "") ? "null" : $this->nmgp_dados_select['applicant_title'];
              if (isset($NM_val_form['applicant_title']) && $NM_val_form['applicant_title'] != $Prep_Tst) 
              { 
                  $SC_fields_update[] = "applicant_title = '$this->applicant_title'"; 
              } 
              $temp_cmd_sql = "";
              if ($this->main_contact_img_id_limpa == "S")
              {
                  if ($this->main_contact_img_id != "null")
                  {
                      $this->main_contact_img_id = '';
                  }
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
                  {
                  }
                  else
                  {
                      $temp_cmd_sql = "main_contact_img_id = '" . $this->main_contact_img_id . "'";
                  }
                  $this->main_contact_img_id = "";
              }
              else
              {
                  if ($this->main_contact_img_id != "none" && $this->main_contact_img_id != "")
                  {
                      $NM_conteudo =  $this->main_contact_img_id;
                      if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
                      {
                      }
                      else
                      {
                          $temp_cmd_sql .= " main_contact_img_id = '$NM_conteudo'";
                      }
                  }
                  else
                  {
                      $aDoNotUpdate[] = "main_contact_img_id";
                  }
              }
              if (!empty($temp_cmd_sql))
              {
                  $SC_fields_update[] = $temp_cmd_sql;
              }
              if ($this->main_contact_img_id_limpa == "S" || ($this->main_contact_img_id != "none" && $this->main_contact_img_id != "" && in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase)) 
                  { 
                      $SC_fields_update[] = "main_contact_img_id = ''"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql)) 
                  { 
                      $SC_fields_update[] = "main_contact_img_id = ''"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) 
                  { 
                      $SC_fields_update[] = "main_contact_img_id = ''"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
                  { 
                      $SC_fields_update[] = "main_contact_img_id = null"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite)) 
                  { 
                      $SC_fields_update[] = "main_contact_img_id = ''"; 
                  } 
                  else 
                  { 
                      $SC_fields_update[] = "main_contact_img_id = empty_blob()"; 
                  } 
              } 
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE client_id = $this->client_id ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE client_id = $this->client_id ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE client_id = $this->client_id ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE client_id = $this->client_id ";  
              }  
              else  
              {
                  $comando .= " WHERE client_id = $this->client_id ";  
              }  
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              $useUpdateProcedure = false;
              if (!empty($SC_fields_update) || $useUpdateProcedure)
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
                  $rs = $this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $dbErrorMessage = $this->Db->ErrorMsg();
                          $dbErrorCode = $this->Db->ErrorNo();
                          $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $dbErrorMessage, true);
                          if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $dbErrorMessage;
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  form_clients_staff_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
              { 
              }   
              $this->co_name = $this->co_name_before_qstr;
              $this->ofa_contact = $this->ofa_contact_before_qstr;
              $this->street_address = $this->street_address_before_qstr;
              $this->mailing_address = $this->mailing_address_before_qstr;
              $this->city = $this->city_before_qstr;
              $this->state = $this->state_before_qstr;
              $this->zip_code = $this->zip_code_before_qstr;
              $this->phone_number = $this->phone_number_before_qstr;
              $this->home_phone = $this->home_phone_before_qstr;
              $this->fax_number = $this->fax_number_before_qstr;
              $this->email = $this->email_before_qstr;
              $this->business_type = $this->business_type_before_qstr;
              $this->business_license = $this->business_license_before_qstr;
              $this->nursery_license = $this->nursery_license_before_qstr;
              $this->federal_tax_id = $this->federal_tax_id_before_qstr;
              $this->canceled = $this->canceled_before_qstr;
              $this->canceled_by = $this->canceled_by_before_qstr;
              $this->reason_canceled = $this->reason_canceled_before_qstr;
              $this->verified_receipts = $this->verified_receipts_before_qstr;
              $this->type_company = $this->type_company_before_qstr;
              $this->store_front_address = $this->store_front_address_before_qstr;
              $this->store_front_city = $this->store_front_city_before_qstr;
              $this->store_front_zip = $this->store_front_zip_before_qstr;
              $this->home_base_address = $this->home_base_address_before_qstr;
              $this->home_base_city = $this->home_base_city_before_qstr;
              $this->home_base_zip = $this->home_base_zip_before_qstr;
              $this->store_front_state = $this->store_front_state_before_qstr;
              $this->home_base_state = $this->home_base_state_before_qstr;
              $this->acct_instagram = $this->acct_instagram_before_qstr;
              $this->acct_facebook = $this->acct_facebook_before_qstr;
              $this->website_url = $this->website_url_before_qstr;
              $this->bus_subcat_other = $this->bus_subcat_other_before_qstr;
              $this->appn_note = $this->appn_note_before_qstr;
              $this->main_contact_name = $this->main_contact_name_before_qstr;
              $this->main_contact_phone = $this->main_contact_phone_before_qstr;
              $this->main_contact_email = $this->main_contact_email_before_qstr;
              $this->main_contact_title = $this->main_contact_title_before_qstr;
              $this->main_contact_img_file = $this->main_contact_img_file_before_qstr;
              $this->main_contact_img_size = $this->main_contact_img_size_before_qstr;
              $this->memb_qty = $this->memb_qty_before_qstr;
              $this->doc_type = $this->doc_type_before_qstr;
              $this->doc_filename = $this->doc_filename_before_qstr;
              $this->doc_filesize = $this->doc_filesize_before_qstr;
              $this->applicant_name = $this->applicant_name_before_qstr;
              $this->applicant_title = $this->applicant_title_before_qstr;
              $this->client_pmts = $this->client_pmts_before_qstr;
              $this->docs = $this->docs_before_qstr;
              $this->memb_list = $this->memb_list_before_qstr;
              $this->notes = $this->notes_before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  if ($this->main_contact_img_id_limpa == "S" && (!isset($this->Ini->nm_bases_oracle) || !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle)) && (!isset($this->Ini->nm_bases_informix) || !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))) 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ", \"main_contact_img_id\", \"\",  \"client_id = $this->client_id\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "main_contact_img_id", "",  "client_id = $this->client_id"); 
                  } 
                  else 
                  { 
                      if ($this->main_contact_img_id != "none" && $this->main_contact_img_id != "") 
                      { 
                          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ", \"main_contact_img_id\", $this->main_contact_img_id,  \"client_id = $this->client_id\")"; 
                          $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "main_contact_img_id", $this->main_contact_img_id,  "client_id = $this->client_id"); 
                      } 
                  } 
                  if ($rs === false) 
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_clients_staff_pack_ajax_response();
                      }
                      exit;  
                  }   
              }   
              if ($this->main_contact_img_id_limpa == "S")
              {
                  $this->NM_ajax_info['fldList']['main_contact_img_id_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
              $this->NM_gera_log_new();
              $this->NM_gera_log_compress();

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
                  $this->NM_ajax_info['fldList']['main_contact_img_id_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }


              if     (isset($NM_val_form) && isset($NM_val_form['client_id'])) { $this->client_id = $NM_val_form['client_id']; }
              elseif (isset($this->client_id)) { $this->nm_limpa_alfa($this->client_id); }
              if     (isset($NM_val_form) && isset($NM_val_form['membershipid'])) { $this->membershipid = $NM_val_form['membershipid']; }
              elseif (isset($this->membershipid)) { $this->nm_limpa_alfa($this->membershipid); }
              if     (isset($NM_val_form) && isset($NM_val_form['memb_status_id'])) { $this->memb_status_id = $NM_val_form['memb_status_id']; }
              elseif (isset($this->memb_status_id)) { $this->nm_limpa_alfa($this->memb_status_id); }
              if     (isset($NM_val_form) && isset($NM_val_form['co_name'])) { $this->co_name = $NM_val_form['co_name']; }
              elseif (isset($this->co_name)) { $this->nm_limpa_alfa($this->co_name); }
              if     (isset($NM_val_form) && isset($NM_val_form['mailing_address'])) { $this->mailing_address = $NM_val_form['mailing_address']; }
              elseif (isset($this->mailing_address)) { $this->nm_limpa_alfa($this->mailing_address); }
              if     (isset($NM_val_form) && isset($NM_val_form['city'])) { $this->city = $NM_val_form['city']; }
              elseif (isset($this->city)) { $this->nm_limpa_alfa($this->city); }
              if     (isset($NM_val_form) && isset($NM_val_form['state'])) { $this->state = $NM_val_form['state']; }
              elseif (isset($this->state)) { $this->nm_limpa_alfa($this->state); }
              if     (isset($NM_val_form) && isset($NM_val_form['zip_code'])) { $this->zip_code = $NM_val_form['zip_code']; }
              elseif (isset($this->zip_code)) { $this->nm_limpa_alfa($this->zip_code); }
              if     (isset($NM_val_form) && isset($NM_val_form['pricing_level_id'])) { $this->pricing_level_id = $NM_val_form['pricing_level_id']; }
              elseif (isset($this->pricing_level_id)) { $this->nm_limpa_alfa($this->pricing_level_id); }
              if     (isset($NM_val_form) && isset($NM_val_form['acct_instagram'])) { $this->acct_instagram = $NM_val_form['acct_instagram']; }
              elseif (isset($this->acct_instagram)) { $this->nm_limpa_alfa($this->acct_instagram); }
              if     (isset($NM_val_form) && isset($NM_val_form['acct_facebook'])) { $this->acct_facebook = $NM_val_form['acct_facebook']; }
              elseif (isset($this->acct_facebook)) { $this->nm_limpa_alfa($this->acct_facebook); }
              if     (isset($NM_val_form) && isset($NM_val_form['website_url'])) { $this->website_url = $NM_val_form['website_url']; }
              elseif (isset($this->website_url)) { $this->nm_limpa_alfa($this->website_url); }
              if     (isset($NM_val_form) && isset($NM_val_form['bus_cat_id'])) { $this->bus_cat_id = $NM_val_form['bus_cat_id']; }
              elseif (isset($this->bus_cat_id)) { $this->nm_limpa_alfa($this->bus_cat_id); }
              if     (isset($NM_val_form) && isset($NM_val_form['bus_subcat_id'])) { $this->bus_subcat_id = $NM_val_form['bus_subcat_id']; }
              elseif (isset($this->bus_subcat_id)) { $this->nm_limpa_alfa($this->bus_subcat_id); }
              if     (isset($NM_val_form) && isset($NM_val_form['bus_subcat_other'])) { $this->bus_subcat_other = $NM_val_form['bus_subcat_other']; }
              elseif (isset($this->bus_subcat_other)) { $this->nm_limpa_alfa($this->bus_subcat_other); }
              if     (isset($NM_val_form) && isset($NM_val_form['main_contact_name'])) { $this->main_contact_name = $NM_val_form['main_contact_name']; }
              elseif (isset($this->main_contact_name)) { $this->nm_limpa_alfa($this->main_contact_name); }
              if     (isset($NM_val_form) && isset($NM_val_form['main_contact_phone'])) { $this->main_contact_phone = $NM_val_form['main_contact_phone']; }
              elseif (isset($this->main_contact_phone)) { $this->nm_limpa_alfa($this->main_contact_phone); }
              if     (isset($NM_val_form) && isset($NM_val_form['main_contact_email'])) { $this->main_contact_email = $NM_val_form['main_contact_email']; }
              elseif (isset($this->main_contact_email)) { $this->nm_limpa_alfa($this->main_contact_email); }
              if     (isset($NM_val_form) && isset($NM_val_form['main_contact_title'])) { $this->main_contact_title = $NM_val_form['main_contact_title']; }
              elseif (isset($this->main_contact_title)) { $this->nm_limpa_alfa($this->main_contact_title); }
              if     (isset($NM_val_form) && isset($NM_val_form['client_pmts'])) { $this->client_pmts = $NM_val_form['client_pmts']; }
              elseif (isset($this->client_pmts)) { $this->nm_limpa_alfa($this->client_pmts); }
              if     (isset($NM_val_form) && isset($NM_val_form['docs'])) { $this->docs = $NM_val_form['docs']; }
              elseif (isset($this->docs)) { $this->nm_limpa_alfa($this->docs); }
              if     (isset($NM_val_form) && isset($NM_val_form['memb_list'])) { $this->memb_list = $NM_val_form['memb_list']; }
              elseif (isset($this->memb_list)) { $this->nm_limpa_alfa($this->memb_list); }
              if     (isset($NM_val_form) && isset($NM_val_form['notes'])) { $this->notes = $NM_val_form['notes']; }
              elseif (isset($this->notes)) { $this->nm_limpa_alfa($this->notes); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('dummy02', 'membershipid', 'co_name', 'client_id', 'mailing_address', 'memb_status_id', 'city', 'pricing_level_id', 'state', 'bus_cat_id', 'zip_code', 'bus_subcat_id', 'permanent_member_date', 'bus_subcat_other', 'renewal_date', 'acct_instagram', 'website_url', 'acct_facebook', 'js_prod_price', 'js_strp_price_id', 'js_mbr_ct', 'js_client_id', 'dummy07', 'dummy08', 'main_contact_name', 'main_contact_phone', 'main_contact_email', 'main_contact_title', 'main_contact_img_id', 'memb_list', 'docs', 'client_pmts', 'notes'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "client_id, ";
          } 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(client_id) from " . $this->Ini->nm_tabela; 
          $comando = "select max(client_id) from " . $this->Ini->nm_tabela; 
          $rs = $this->Db->Execute($comando); 
          if ($rs === false && !$rs->EOF)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
              $this->NM_rollback_db(); 
              if ($this->NM_ajax_flag)
              {
                  form_clients_staff_pack_ajax_response();
              }
              exit; 
          }  
          $this->client_id_before_qstr = $this->client_id = $rs->fields[0] + 1;
          if ($this->membershipid == 0) {
              $this->membershipid = $this->client_id;
          }
          $rs->Close(); 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_clients_staff_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              $_test_file = $this->fetchUniqueUploadName($this->main_contact_img_id_scfile_name, $dir_file, "main_contact_img_id");
              if (trim($this->main_contact_img_id_scfile_name) != $_test_file)
              {
                  $this->main_contact_img_id_scfile_name = $_test_file;
                  $this->main_contact_img_id = $_test_file;
              }
              $_test_file = $this->fetchUniqueUploadName($this->doc_sec_of_state_scfile_name, $dir_file, "doc_sec_of_state");
              if (trim($this->doc_sec_of_state_scfile_name) != $_test_file)
              {
                  $this->doc_sec_of_state_scfile_name = $_test_file;
                  $this->doc_sec_of_state = $_test_file;
              }
              $_test_file = $this->fetchUniqueUploadName($this->doc_city_bus_lic_scfile_name, $dir_file, "doc_city_bus_lic");
              if (trim($this->doc_city_bus_lic_scfile_name) != $_test_file)
              {
                  $this->doc_city_bus_lic_scfile_name = $_test_file;
                  $this->doc_city_bus_lic = $_test_file;
              }
              $_test_file = $this->fetchUniqueUploadName($this->doc_agric_lic_scfile_name, $dir_file, "doc_agric_lic");
              if (trim($this->doc_agric_lic_scfile_name) != $_test_file)
              {
                  $this->doc_agric_lic_scfile_name = $_test_file;
                  $this->doc_agric_lic = $_test_file;
              }
              $_test_file = $this->fetchUniqueUploadName($this->doc_last_year_tax_scfile_name, $dir_file, "doc_last_year_tax");
              if (trim($this->doc_last_year_tax_scfile_name) != $_test_file)
              {
                  $this->doc_last_year_tax_scfile_name = $_test_file;
                  $this->doc_last_year_tax = $_test_file;
              }
              $_test_file = $this->fetchUniqueUploadName($this->main_contact_img_id_prev_scfile_name, $dir_file, "main_contact_img_id_prev");
              if (trim($this->main_contact_img_id_prev_scfile_name) != $_test_file)
              {
                  $this->main_contact_img_id_prev_scfile_name = $_test_file;
                  $this->main_contact_img_id_prev = $_test_file;
              }
              $_test_file = $this->fetchUniqueUploadName($this->doc_file_scfile_name, $dir_file, "doc_file");
              if (trim($this->doc_file_scfile_name) != $_test_file)
              {
                  $this->doc_file_scfile_name = $_test_file;
                  $this->doc_file = $_test_file;
              }
              $_test_file = $this->fetchUniqueUploadName($this->applicant_signature_scfile_name, $dir_file, "applicant_signature");
              if (trim($this->applicant_signature_scfile_name) != $_test_file)
              {
                  $this->applicant_signature_scfile_name = $_test_file;
                  $this->applicant_signature = $_test_file;
              }
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->canceled != "")
                  { 
                       $compl_insert     .= ", canceled";
                       $compl_insert_val .= ", '$this->canceled'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (MembershipID, memb_status_id, appn_id, co_name, ofa_contact, street_address, mailing_address, city, state, zip_code, phone_number, home_phone, fax_number, email, business_type, fresh_cut_allowed, business_license, nursery_license, federal_tax_id, temporary_pass, ofa_member, starting_date, renewal_date, expiration_date, cancel_date, canceled_by, reason_canceled, retire_date, verified_receipts, date_last_updated, restricted, committee_approval_required, type_company, archive, archive_date, pricing_level_id, store_front_address, store_front_city, store_front_zip, home_base_address, home_base_city, home_base_zip, store_front_state, home_base_state, record_created, permanent_member_date, acct_instagram, acct_facebook, website_url, bus_cat_id, bus_subcat_id, bus_subcat_other, appn_date, appn_note, doc_sec_of_state, doc_city_bus_lic, doc_agric_lic, doc_last_year_tax, qb_id, main_contact_name, main_contact_phone, main_contact_email, main_contact_title, main_contact_img_id, main_contact_img_file, main_contact_img_size, main_contact_img_id_prev, memb_qty, doc_type, doc_file, doc_filename, doc_filesize, applicant_name, applicant_signature, applicant_title $compl_insert) VALUES ($this->membershipid, $this->memb_status_id, $this->appn_id, '$this->co_name', '$this->ofa_contact', '$this->street_address', '$this->mailing_address', '$this->city', '$this->state', '$this->zip_code', '$this->phone_number', '$this->home_phone', '$this->fax_number', '$this->email', '$this->business_type', $this->fresh_cut_allowed, '$this->business_license', '$this->nursery_license', '$this->federal_tax_id', $this->temporary_pass, $this->ofa_member, #$this->starting_date#, #$this->renewal_date#, #$this->expiration_date#, #$this->cancel_date#, '$this->canceled_by', '$this->reason_canceled', #$this->retire_date#, '$this->verified_receipts', #$this->date_last_updated#, $this->restricted, $this->committee_approval_required, '$this->type_company', $this->archive, #$this->archive_date#, $this->pricing_level_id, '$this->store_front_address', '$this->store_front_city', '$this->store_front_zip', '$this->home_base_address', '$this->home_base_city', '$this->home_base_zip', '$this->store_front_state', '$this->home_base_state', #$this->record_created#, #$this->permanent_member_date#, '$this->acct_instagram', '$this->acct_facebook', '$this->website_url', $this->bus_cat_id, $this->bus_subcat_id, '$this->bus_subcat_other', #$this->appn_date#, '$this->appn_note', '$this->doc_sec_of_state', '$this->doc_city_bus_lic', '$this->doc_agric_lic', '$this->doc_last_year_tax', $this->qb_id, '$this->main_contact_name', '$this->main_contact_phone', '$this->main_contact_email', '$this->main_contact_title', '$this->main_contact_img_id', '$this->main_contact_img_file', '$this->main_contact_img_size', '$this->main_contact_img_id_prev', '$this->memb_qty', '$this->doc_type', '$this->doc_file', '$this->doc_filename', '$this->doc_filesize', '$this->applicant_name', '$this->applicant_signature', '$this->applicant_title' $compl_insert_val)"; 
              }
              elseif ($this->Ini->nm_tpbanco == "pdo_sqlsrv")
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->canceled != "")
                  { 
                       $compl_insert     .= ", canceled";
                       $compl_insert_val .= ", '$this->canceled'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (MembershipID, memb_status_id, appn_id, co_name, ofa_contact, street_address, mailing_address, city, state, zip_code, phone_number, home_phone, fax_number, email, business_type, fresh_cut_allowed, business_license, nursery_license, federal_tax_id, temporary_pass, ofa_member, starting_date, renewal_date, expiration_date, cancel_date, canceled_by, reason_canceled, retire_date, verified_receipts, date_last_updated, restricted, committee_approval_required, type_company, archive, archive_date, pricing_level_id, store_front_address, store_front_city, store_front_zip, home_base_address, home_base_city, home_base_zip, store_front_state, home_base_state, record_created, permanent_member_date, acct_instagram, acct_facebook, website_url, bus_cat_id, bus_subcat_id, bus_subcat_other, appn_date, appn_note, doc_sec_of_state, doc_city_bus_lic, doc_agric_lic, doc_last_year_tax, qb_id, main_contact_name, main_contact_phone, main_contact_email, main_contact_title, main_contact_img_id, main_contact_img_file, main_contact_img_size, main_contact_img_id_prev, memb_qty, doc_type, doc_file, doc_filename, doc_filesize, applicant_name, applicant_signature, applicant_title $compl_insert) VALUES ($this->membershipid, $this->memb_status_id, $this->appn_id, '$this->co_name', '$this->ofa_contact', '$this->street_address', '$this->mailing_address', '$this->city', '$this->state', '$this->zip_code', '$this->phone_number', '$this->home_phone', '$this->fax_number', '$this->email', '$this->business_type', $this->fresh_cut_allowed, '$this->business_license', '$this->nursery_license', '$this->federal_tax_id', $this->temporary_pass, $this->ofa_member, " . $this->Ini->date_delim . $this->starting_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->renewal_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->expiration_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->cancel_date . $this->Ini->date_delim1 . ", '$this->canceled_by', '$this->reason_canceled', " . $this->Ini->date_delim . $this->retire_date . $this->Ini->date_delim1 . ", '$this->verified_receipts', " . $this->Ini->date_delim . $this->date_last_updated . $this->Ini->date_delim1 . ", $this->restricted, $this->committee_approval_required, '$this->type_company', $this->archive, " . $this->Ini->date_delim . $this->archive_date . $this->Ini->date_delim1 . ", $this->pricing_level_id, '$this->store_front_address', '$this->store_front_city', '$this->store_front_zip', '$this->home_base_address', '$this->home_base_city', '$this->home_base_zip', '$this->store_front_state', '$this->home_base_state', " . $this->Ini->date_delim . $this->record_created . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->permanent_member_date . $this->Ini->date_delim1 . ", '$this->acct_instagram', '$this->acct_facebook', '$this->website_url', $this->bus_cat_id, $this->bus_subcat_id, '$this->bus_subcat_other', " . $this->Ini->date_delim . $this->appn_date . $this->Ini->date_delim1 . ", '$this->appn_note', '', '', '', '', $this->qb_id, '$this->main_contact_name', '$this->main_contact_phone', '$this->main_contact_email', '$this->main_contact_title', '', '$this->main_contact_img_file', '$this->main_contact_img_size', '', '$this->memb_qty', '$this->doc_type', '', '$this->doc_filename', '$this->doc_filesize', '$this->applicant_name', '', '$this->applicant_title' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->canceled != "")
                  { 
                       $compl_insert     .= ", canceled";
                       $compl_insert_val .= ", '$this->canceled'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (MembershipID, memb_status_id, appn_id, co_name, ofa_contact, street_address, mailing_address, city, state, zip_code, phone_number, home_phone, fax_number, email, business_type, fresh_cut_allowed, business_license, nursery_license, federal_tax_id, temporary_pass, ofa_member, starting_date, renewal_date, expiration_date, cancel_date, canceled_by, reason_canceled, retire_date, verified_receipts, date_last_updated, restricted, committee_approval_required, type_company, archive, archive_date, pricing_level_id, store_front_address, store_front_city, store_front_zip, home_base_address, home_base_city, home_base_zip, store_front_state, home_base_state, record_created, permanent_member_date, acct_instagram, acct_facebook, website_url, bus_cat_id, bus_subcat_id, bus_subcat_other, appn_date, appn_note, doc_sec_of_state, doc_city_bus_lic, doc_agric_lic, doc_last_year_tax, qb_id, main_contact_name, main_contact_phone, main_contact_email, main_contact_title, main_contact_img_id, main_contact_img_file, main_contact_img_size, main_contact_img_id_prev, memb_qty, doc_type, doc_file, doc_filename, doc_filesize, applicant_name, applicant_signature, applicant_title $compl_insert) VALUES ($this->membershipid, $this->memb_status_id, $this->appn_id, '$this->co_name', '$this->ofa_contact', '$this->street_address', '$this->mailing_address', '$this->city', '$this->state', '$this->zip_code', '$this->phone_number', '$this->home_phone', '$this->fax_number', '$this->email', '$this->business_type', $this->fresh_cut_allowed, '$this->business_license', '$this->nursery_license', '$this->federal_tax_id', $this->temporary_pass, $this->ofa_member, " . $this->Ini->date_delim . $this->starting_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->renewal_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->expiration_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->cancel_date . $this->Ini->date_delim1 . ", '$this->canceled_by', '$this->reason_canceled', " . $this->Ini->date_delim . $this->retire_date . $this->Ini->date_delim1 . ", '$this->verified_receipts', " . $this->Ini->date_delim . $this->date_last_updated . $this->Ini->date_delim1 . ", $this->restricted, $this->committee_approval_required, '$this->type_company', $this->archive, " . $this->Ini->date_delim . $this->archive_date . $this->Ini->date_delim1 . ", $this->pricing_level_id, '$this->store_front_address', '$this->store_front_city', '$this->store_front_zip', '$this->home_base_address', '$this->home_base_city', '$this->home_base_zip', '$this->store_front_state', '$this->home_base_state', " . $this->Ini->date_delim . $this->record_created . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->permanent_member_date . $this->Ini->date_delim1 . ", '$this->acct_instagram', '$this->acct_facebook', '$this->website_url', $this->bus_cat_id, $this->bus_subcat_id, '$this->bus_subcat_other', " . $this->Ini->date_delim . $this->appn_date . $this->Ini->date_delim1 . ", '$this->appn_note', '$this->doc_sec_of_state', '$this->doc_city_bus_lic', '$this->doc_agric_lic', '$this->doc_last_year_tax', $this->qb_id, '$this->main_contact_name', '$this->main_contact_phone', '$this->main_contact_email', '$this->main_contact_title', '$this->main_contact_img_id', '$this->main_contact_img_file', '$this->main_contact_img_size', '$this->main_contact_img_id_prev', '$this->memb_qty', '$this->doc_type', '$this->doc_file', '$this->doc_filename', '$this->doc_filesize', '$this->applicant_name', '$this->applicant_signature', '$this->applicant_title' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->canceled != "")
                  { 
                       $compl_insert     .= ", canceled";
                       $compl_insert_val .= ", '$this->canceled'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (MembershipID, memb_status_id, appn_id, co_name, ofa_contact, street_address, mailing_address, city, state, zip_code, phone_number, home_phone, fax_number, email, business_type, fresh_cut_allowed, business_license, nursery_license, federal_tax_id, temporary_pass, ofa_member, starting_date, renewal_date, expiration_date, cancel_date, canceled_by, reason_canceled, retire_date, verified_receipts, date_last_updated, restricted, committee_approval_required, type_company, archive, archive_date, pricing_level_id, store_front_address, store_front_city, store_front_zip, home_base_address, home_base_city, home_base_zip, store_front_state, home_base_state, record_created, permanent_member_date, acct_instagram, acct_facebook, website_url, bus_cat_id, bus_subcat_id, bus_subcat_other, appn_date, appn_note, doc_sec_of_state, doc_city_bus_lic, doc_agric_lic, doc_last_year_tax, qb_id, main_contact_name, main_contact_phone, main_contact_email, main_contact_title, main_contact_img_id, main_contact_img_file, main_contact_img_size, main_contact_img_id_prev, memb_qty, doc_type, doc_file, doc_filename, doc_filesize, applicant_name, applicant_signature, applicant_title $compl_insert) VALUES ($this->membershipid, $this->memb_status_id, $this->appn_id, '$this->co_name', '$this->ofa_contact', '$this->street_address', '$this->mailing_address', '$this->city', '$this->state', '$this->zip_code', '$this->phone_number', '$this->home_phone', '$this->fax_number', '$this->email', '$this->business_type', $this->fresh_cut_allowed, '$this->business_license', '$this->nursery_license', '$this->federal_tax_id', $this->temporary_pass, $this->ofa_member, " . $this->Ini->date_delim . $this->starting_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->renewal_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->expiration_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->cancel_date . $this->Ini->date_delim1 . ", '$this->canceled_by', '$this->reason_canceled', " . $this->Ini->date_delim . $this->retire_date . $this->Ini->date_delim1 . ", '$this->verified_receipts', " . $this->Ini->date_delim . $this->date_last_updated . $this->Ini->date_delim1 . ", $this->restricted, $this->committee_approval_required, '$this->type_company', $this->archive, " . $this->Ini->date_delim . $this->archive_date . $this->Ini->date_delim1 . ", $this->pricing_level_id, '$this->store_front_address', '$this->store_front_city', '$this->store_front_zip', '$this->home_base_address', '$this->home_base_city', '$this->home_base_zip', '$this->store_front_state', '$this->home_base_state', " . $this->Ini->date_delim . $this->record_created . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->permanent_member_date . $this->Ini->date_delim1 . ", '$this->acct_instagram', '$this->acct_facebook', '$this->website_url', $this->bus_cat_id, $this->bus_subcat_id, '$this->bus_subcat_other', " . $this->Ini->date_delim . $this->appn_date . $this->Ini->date_delim1 . ", '$this->appn_note', '$this->doc_sec_of_state', '$this->doc_city_bus_lic', '$this->doc_agric_lic', '$this->doc_last_year_tax', $this->qb_id, '$this->main_contact_name', '$this->main_contact_phone', '$this->main_contact_email', '$this->main_contact_title', '$this->main_contact_img_id', '$this->main_contact_img_file', '$this->main_contact_img_size', '$this->main_contact_img_id_prev', '$this->memb_qty', '$this->doc_type', '$this->doc_file', '$this->doc_filename', '$this->doc_filesize', '$this->applicant_name', '$this->applicant_signature', '$this->applicant_title' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->canceled != "")
                  { 
                       $compl_insert     .= ", canceled";
                       $compl_insert_val .= ", '$this->canceled'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "MembershipID, memb_status_id, appn_id, co_name, ofa_contact, street_address, mailing_address, city, state, zip_code, phone_number, home_phone, fax_number, email, business_type, fresh_cut_allowed, business_license, nursery_license, federal_tax_id, temporary_pass, ofa_member, starting_date, renewal_date, expiration_date, cancel_date, canceled_by, reason_canceled, retire_date, verified_receipts, date_last_updated, restricted, committee_approval_required, type_company, archive, archive_date, pricing_level_id, store_front_address, store_front_city, store_front_zip, home_base_address, home_base_city, home_base_zip, store_front_state, home_base_state, record_created, permanent_member_date, acct_instagram, acct_facebook, website_url, bus_cat_id, bus_subcat_id, bus_subcat_other, appn_date, appn_note, doc_sec_of_state, doc_city_bus_lic, doc_agric_lic, doc_last_year_tax, qb_id, main_contact_name, main_contact_phone, main_contact_email, main_contact_title, main_contact_img_id, main_contact_img_file, main_contact_img_size, main_contact_img_id_prev, memb_qty, doc_type, doc_file, doc_filename, doc_filesize, applicant_name, applicant_signature, applicant_title $compl_insert) VALUES (" . $NM_seq_auto . "$this->membershipid, $this->memb_status_id, $this->appn_id, '$this->co_name', '$this->ofa_contact', '$this->street_address', '$this->mailing_address', '$this->city', '$this->state', '$this->zip_code', '$this->phone_number', '$this->home_phone', '$this->fax_number', '$this->email', '$this->business_type', $this->fresh_cut_allowed, '$this->business_license', '$this->nursery_license', '$this->federal_tax_id', $this->temporary_pass, $this->ofa_member, " . $this->Ini->date_delim . $this->starting_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->renewal_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->expiration_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->cancel_date . $this->Ini->date_delim1 . ", '$this->canceled_by', '$this->reason_canceled', " . $this->Ini->date_delim . $this->retire_date . $this->Ini->date_delim1 . ", '$this->verified_receipts', " . $this->Ini->date_delim . $this->date_last_updated . $this->Ini->date_delim1 . ", $this->restricted, $this->committee_approval_required, '$this->type_company', $this->archive, " . $this->Ini->date_delim . $this->archive_date . $this->Ini->date_delim1 . ", $this->pricing_level_id, '$this->store_front_address', '$this->store_front_city', '$this->store_front_zip', '$this->home_base_address', '$this->home_base_city', '$this->home_base_zip', '$this->store_front_state', '$this->home_base_state', " . $this->Ini->date_delim . $this->record_created . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->permanent_member_date . $this->Ini->date_delim1 . ", '$this->acct_instagram', '$this->acct_facebook', '$this->website_url', $this->bus_cat_id, $this->bus_subcat_id, '$this->bus_subcat_other', " . $this->Ini->date_delim . $this->appn_date . $this->Ini->date_delim1 . ", '$this->appn_note', EMPTY_BLOB(), EMPTY_BLOB(), EMPTY_BLOB(), EMPTY_BLOB(), $this->qb_id, '$this->main_contact_name', '$this->main_contact_phone', '$this->main_contact_email', '$this->main_contact_title', EMPTY_BLOB(), '$this->main_contact_img_file', '$this->main_contact_img_size', EMPTY_BLOB(), '$this->memb_qty', '$this->doc_type', EMPTY_BLOB(), '$this->doc_filename', '$this->doc_filesize', '$this->applicant_name', EMPTY_BLOB(), '$this->applicant_title' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->canceled != "")
                  { 
                       $compl_insert     .= ", canceled";
                       $compl_insert_val .= ", '$this->canceled'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "MembershipID, memb_status_id, appn_id, co_name, ofa_contact, street_address, mailing_address, city, state, zip_code, phone_number, home_phone, fax_number, email, business_type, fresh_cut_allowed, business_license, nursery_license, federal_tax_id, temporary_pass, ofa_member, starting_date, renewal_date, expiration_date, cancel_date, canceled_by, reason_canceled, retire_date, verified_receipts, date_last_updated, restricted, committee_approval_required, type_company, archive, archive_date, pricing_level_id, store_front_address, store_front_city, store_front_zip, home_base_address, home_base_city, home_base_zip, store_front_state, home_base_state, record_created, permanent_member_date, acct_instagram, acct_facebook, website_url, bus_cat_id, bus_subcat_id, bus_subcat_other, appn_date, appn_note, doc_sec_of_state, doc_city_bus_lic, doc_agric_lic, doc_last_year_tax, qb_id, main_contact_name, main_contact_phone, main_contact_email, main_contact_title, main_contact_img_id, main_contact_img_file, main_contact_img_size, main_contact_img_id_prev, memb_qty, doc_type, doc_file, doc_filename, doc_filesize, applicant_name, applicant_signature, applicant_title $compl_insert) VALUES (" . $NM_seq_auto . "$this->membershipid, $this->memb_status_id, $this->appn_id, '$this->co_name', '$this->ofa_contact', '$this->street_address', '$this->mailing_address', '$this->city', '$this->state', '$this->zip_code', '$this->phone_number', '$this->home_phone', '$this->fax_number', '$this->email', '$this->business_type', $this->fresh_cut_allowed, '$this->business_license', '$this->nursery_license', '$this->federal_tax_id', $this->temporary_pass, $this->ofa_member, " . $this->Ini->date_delim . $this->starting_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->renewal_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->expiration_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->cancel_date . $this->Ini->date_delim1 . ", '$this->canceled_by', '$this->reason_canceled', " . $this->Ini->date_delim . $this->retire_date . $this->Ini->date_delim1 . ", '$this->verified_receipts', " . $this->Ini->date_delim . $this->date_last_updated . $this->Ini->date_delim1 . ", $this->restricted, $this->committee_approval_required, '$this->type_company', $this->archive, " . $this->Ini->date_delim . $this->archive_date . $this->Ini->date_delim1 . ", $this->pricing_level_id, '$this->store_front_address', '$this->store_front_city', '$this->store_front_zip', '$this->home_base_address', '$this->home_base_city', '$this->home_base_zip', '$this->store_front_state', '$this->home_base_state', " . $this->Ini->date_delim . $this->record_created . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->permanent_member_date . $this->Ini->date_delim1 . ", '$this->acct_instagram', '$this->acct_facebook', '$this->website_url', $this->bus_cat_id, $this->bus_subcat_id, '$this->bus_subcat_other', " . $this->Ini->date_delim . $this->appn_date . $this->Ini->date_delim1 . ", '$this->appn_note', EMPTY_BLOB(), EMPTY_BLOB(), EMPTY_BLOB(), EMPTY_BLOB(), $this->qb_id, '$this->main_contact_name', '$this->main_contact_phone', '$this->main_contact_email', '$this->main_contact_title', EMPTY_BLOB(), '$this->main_contact_img_file', '$this->main_contact_img_size', EMPTY_BLOB(), '$this->memb_qty', '$this->doc_type', EMPTY_BLOB(), '$this->doc_filename', '$this->doc_filesize', '$this->applicant_name', EMPTY_BLOB(), '$this->applicant_title' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->canceled != "")
                  { 
                       $compl_insert     .= ", canceled";
                       $compl_insert_val .= ", '$this->canceled'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "MembershipID, memb_status_id, appn_id, co_name, ofa_contact, street_address, mailing_address, city, state, zip_code, phone_number, home_phone, fax_number, email, business_type, fresh_cut_allowed, business_license, nursery_license, federal_tax_id, temporary_pass, ofa_member, starting_date, renewal_date, expiration_date, cancel_date, canceled_by, reason_canceled, retire_date, verified_receipts, date_last_updated, restricted, committee_approval_required, type_company, archive, archive_date, pricing_level_id, store_front_address, store_front_city, store_front_zip, home_base_address, home_base_city, home_base_zip, store_front_state, home_base_state, record_created, permanent_member_date, acct_instagram, acct_facebook, website_url, bus_cat_id, bus_subcat_id, bus_subcat_other, appn_date, appn_note, doc_sec_of_state, doc_city_bus_lic, doc_agric_lic, doc_last_year_tax, qb_id, main_contact_name, main_contact_phone, main_contact_email, main_contact_title, main_contact_img_id, main_contact_img_file, main_contact_img_size, main_contact_img_id_prev, memb_qty, doc_type, doc_file, doc_filename, doc_filesize, applicant_name, applicant_signature, applicant_title $compl_insert) VALUES (" . $NM_seq_auto . "$this->membershipid, $this->memb_status_id, $this->appn_id, '$this->co_name', '$this->ofa_contact', '$this->street_address', '$this->mailing_address', '$this->city', '$this->state', '$this->zip_code', '$this->phone_number', '$this->home_phone', '$this->fax_number', '$this->email', '$this->business_type', $this->fresh_cut_allowed, '$this->business_license', '$this->nursery_license', '$this->federal_tax_id', $this->temporary_pass, $this->ofa_member, EXTEND('$this->starting_date', YEAR TO FRACTION), EXTEND('$this->renewal_date', YEAR TO FRACTION), EXTEND('$this->expiration_date', YEAR TO FRACTION), EXTEND('$this->cancel_date', YEAR TO FRACTION), '$this->canceled_by', '$this->reason_canceled', EXTEND('$this->retire_date', YEAR TO FRACTION), '$this->verified_receipts', EXTEND('$this->date_last_updated', YEAR TO FRACTION), $this->restricted, $this->committee_approval_required, '$this->type_company', $this->archive, EXTEND('$this->archive_date', YEAR TO FRACTION), $this->pricing_level_id, '$this->store_front_address', '$this->store_front_city', '$this->store_front_zip', '$this->home_base_address', '$this->home_base_city', '$this->home_base_zip', '$this->store_front_state', '$this->home_base_state', EXTEND('$this->record_created', YEAR TO FRACTION), EXTEND('$this->permanent_member_date', YEAR TO FRACTION), '$this->acct_instagram', '$this->acct_facebook', '$this->website_url', $this->bus_cat_id, $this->bus_subcat_id, '$this->bus_subcat_other', EXTEND('$this->appn_date', YEAR TO FRACTION), '$this->appn_note', null, null, null, null, $this->qb_id, '$this->main_contact_name', '$this->main_contact_phone', '$this->main_contact_email', '$this->main_contact_title', null, '$this->main_contact_img_file', '$this->main_contact_img_size', null, '$this->memb_qty', '$this->doc_type', null, '$this->doc_filename', '$this->doc_filesize', '$this->applicant_name', null, '$this->applicant_title' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->canceled != "")
                  { 
                       $compl_insert     .= ", canceled";
                       $compl_insert_val .= ", '$this->canceled'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "MembershipID, memb_status_id, appn_id, co_name, ofa_contact, street_address, mailing_address, city, state, zip_code, phone_number, home_phone, fax_number, email, business_type, fresh_cut_allowed, business_license, nursery_license, federal_tax_id, temporary_pass, ofa_member, starting_date, renewal_date, expiration_date, cancel_date, canceled_by, reason_canceled, retire_date, verified_receipts, date_last_updated, restricted, committee_approval_required, type_company, archive, archive_date, pricing_level_id, store_front_address, store_front_city, store_front_zip, home_base_address, home_base_city, home_base_zip, store_front_state, home_base_state, record_created, permanent_member_date, acct_instagram, acct_facebook, website_url, bus_cat_id, bus_subcat_id, bus_subcat_other, appn_date, appn_note, doc_sec_of_state, doc_city_bus_lic, doc_agric_lic, doc_last_year_tax, qb_id, main_contact_name, main_contact_phone, main_contact_email, main_contact_title, main_contact_img_id, main_contact_img_file, main_contact_img_size, main_contact_img_id_prev, memb_qty, doc_type, doc_file, doc_filename, doc_filesize, applicant_name, applicant_signature, applicant_title $compl_insert) VALUES (" . $NM_seq_auto . "$this->membershipid, $this->memb_status_id, $this->appn_id, '$this->co_name', '$this->ofa_contact', '$this->street_address', '$this->mailing_address', '$this->city', '$this->state', '$this->zip_code', '$this->phone_number', '$this->home_phone', '$this->fax_number', '$this->email', '$this->business_type', $this->fresh_cut_allowed, '$this->business_license', '$this->nursery_license', '$this->federal_tax_id', $this->temporary_pass, $this->ofa_member, " . $this->Ini->date_delim . $this->starting_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->renewal_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->expiration_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->cancel_date . $this->Ini->date_delim1 . ", '$this->canceled_by', '$this->reason_canceled', " . $this->Ini->date_delim . $this->retire_date . $this->Ini->date_delim1 . ", '$this->verified_receipts', " . $this->Ini->date_delim . $this->date_last_updated . $this->Ini->date_delim1 . ", $this->restricted, $this->committee_approval_required, '$this->type_company', $this->archive, " . $this->Ini->date_delim . $this->archive_date . $this->Ini->date_delim1 . ", $this->pricing_level_id, '$this->store_front_address', '$this->store_front_city', '$this->store_front_zip', '$this->home_base_address', '$this->home_base_city', '$this->home_base_zip', '$this->store_front_state', '$this->home_base_state', " . $this->Ini->date_delim . $this->record_created . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->permanent_member_date . $this->Ini->date_delim1 . ", '$this->acct_instagram', '$this->acct_facebook', '$this->website_url', $this->bus_cat_id, $this->bus_subcat_id, '$this->bus_subcat_other', " . $this->Ini->date_delim . $this->appn_date . $this->Ini->date_delim1 . ", '$this->appn_note', '', '', '', '', $this->qb_id, '$this->main_contact_name', '$this->main_contact_phone', '$this->main_contact_email', '$this->main_contact_title', '', '$this->main_contact_img_file', '$this->main_contact_img_size', '', '$this->memb_qty', '$this->doc_type', '', '$this->doc_filename', '$this->doc_filesize', '$this->applicant_name', '', '$this->applicant_title' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->canceled != "")
                  { 
                       $compl_insert     .= ", canceled";
                       $compl_insert_val .= ", '$this->canceled'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "MembershipID, memb_status_id, appn_id, co_name, ofa_contact, street_address, mailing_address, city, state, zip_code, phone_number, home_phone, fax_number, email, business_type, fresh_cut_allowed, business_license, nursery_license, federal_tax_id, temporary_pass, ofa_member, starting_date, renewal_date, expiration_date, cancel_date, canceled_by, reason_canceled, retire_date, verified_receipts, date_last_updated, restricted, committee_approval_required, type_company, archive, archive_date, pricing_level_id, store_front_address, store_front_city, store_front_zip, home_base_address, home_base_city, home_base_zip, store_front_state, home_base_state, record_created, permanent_member_date, acct_instagram, acct_facebook, website_url, bus_cat_id, bus_subcat_id, bus_subcat_other, appn_date, appn_note, doc_sec_of_state, doc_city_bus_lic, doc_agric_lic, doc_last_year_tax, qb_id, main_contact_name, main_contact_phone, main_contact_email, main_contact_title, main_contact_img_id, main_contact_img_file, main_contact_img_size, main_contact_img_id_prev, memb_qty, doc_type, doc_file, doc_filename, doc_filesize, applicant_name, applicant_signature, applicant_title $compl_insert) VALUES (" . $NM_seq_auto . "$this->membershipid, $this->memb_status_id, $this->appn_id, '$this->co_name', '$this->ofa_contact', '$this->street_address', '$this->mailing_address', '$this->city', '$this->state', '$this->zip_code', '$this->phone_number', '$this->home_phone', '$this->fax_number', '$this->email', '$this->business_type', $this->fresh_cut_allowed, '$this->business_license', '$this->nursery_license', '$this->federal_tax_id', $this->temporary_pass, $this->ofa_member, " . $this->Ini->date_delim . $this->starting_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->renewal_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->expiration_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->cancel_date . $this->Ini->date_delim1 . ", '$this->canceled_by', '$this->reason_canceled', " . $this->Ini->date_delim . $this->retire_date . $this->Ini->date_delim1 . ", '$this->verified_receipts', " . $this->Ini->date_delim . $this->date_last_updated . $this->Ini->date_delim1 . ", $this->restricted, $this->committee_approval_required, '$this->type_company', $this->archive, " . $this->Ini->date_delim . $this->archive_date . $this->Ini->date_delim1 . ", $this->pricing_level_id, '$this->store_front_address', '$this->store_front_city', '$this->store_front_zip', '$this->home_base_address', '$this->home_base_city', '$this->home_base_zip', '$this->store_front_state', '$this->home_base_state', " . $this->Ini->date_delim . $this->record_created . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->permanent_member_date . $this->Ini->date_delim1 . ", '$this->acct_instagram', '$this->acct_facebook', '$this->website_url', $this->bus_cat_id, $this->bus_subcat_id, '$this->bus_subcat_other', " . $this->Ini->date_delim . $this->appn_date . $this->Ini->date_delim1 . ", '$this->appn_note', '', '', '', '', $this->qb_id, '$this->main_contact_name', '$this->main_contact_phone', '$this->main_contact_email', '$this->main_contact_title', '', '$this->main_contact_img_file', '$this->main_contact_img_size', '', '$this->memb_qty', '$this->doc_type', '', '$this->doc_filename', '$this->doc_filesize', '$this->applicant_name', '', '$this->applicant_title' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->canceled != "")
                  { 
                       $compl_insert     .= ", canceled";
                       $compl_insert_val .= ", '$this->canceled'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "MembershipID, memb_status_id, appn_id, co_name, ofa_contact, street_address, mailing_address, city, state, zip_code, phone_number, home_phone, fax_number, email, business_type, fresh_cut_allowed, business_license, nursery_license, federal_tax_id, temporary_pass, ofa_member, starting_date, renewal_date, expiration_date, cancel_date, canceled_by, reason_canceled, retire_date, verified_receipts, date_last_updated, restricted, committee_approval_required, type_company, archive, archive_date, pricing_level_id, store_front_address, store_front_city, store_front_zip, home_base_address, home_base_city, home_base_zip, store_front_state, home_base_state, record_created, permanent_member_date, acct_instagram, acct_facebook, website_url, bus_cat_id, bus_subcat_id, bus_subcat_other, appn_date, appn_note, doc_sec_of_state, doc_city_bus_lic, doc_agric_lic, doc_last_year_tax, qb_id, main_contact_name, main_contact_phone, main_contact_email, main_contact_title, main_contact_img_id, main_contact_img_file, main_contact_img_size, main_contact_img_id_prev, memb_qty, doc_type, doc_file, doc_filename, doc_filesize, applicant_name, applicant_signature, applicant_title $compl_insert) VALUES (" . $NM_seq_auto . "$this->membershipid, $this->memb_status_id, $this->appn_id, '$this->co_name', '$this->ofa_contact', '$this->street_address', '$this->mailing_address', '$this->city', '$this->state', '$this->zip_code', '$this->phone_number', '$this->home_phone', '$this->fax_number', '$this->email', '$this->business_type', $this->fresh_cut_allowed, '$this->business_license', '$this->nursery_license', '$this->federal_tax_id', $this->temporary_pass, $this->ofa_member, " . $this->Ini->date_delim . $this->starting_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->renewal_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->expiration_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->cancel_date . $this->Ini->date_delim1 . ", '$this->canceled_by', '$this->reason_canceled', " . $this->Ini->date_delim . $this->retire_date . $this->Ini->date_delim1 . ", '$this->verified_receipts', " . $this->Ini->date_delim . $this->date_last_updated . $this->Ini->date_delim1 . ", $this->restricted, $this->committee_approval_required, '$this->type_company', $this->archive, " . $this->Ini->date_delim . $this->archive_date . $this->Ini->date_delim1 . ", $this->pricing_level_id, '$this->store_front_address', '$this->store_front_city', '$this->store_front_zip', '$this->home_base_address', '$this->home_base_city', '$this->home_base_zip', '$this->store_front_state', '$this->home_base_state', " . $this->Ini->date_delim . $this->record_created . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->permanent_member_date . $this->Ini->date_delim1 . ", '$this->acct_instagram', '$this->acct_facebook', '$this->website_url', $this->bus_cat_id, $this->bus_subcat_id, '$this->bus_subcat_other', " . $this->Ini->date_delim . $this->appn_date . $this->Ini->date_delim1 . ", '$this->appn_note', '', '', '', '', $this->qb_id, '$this->main_contact_name', '$this->main_contact_phone', '$this->main_contact_email', '$this->main_contact_title', '', '$this->main_contact_img_file', '$this->main_contact_img_size', '', '$this->memb_qty', '$this->doc_type', '', '$this->doc_filename', '$this->doc_filesize', '$this->applicant_name', '', '$this->applicant_title' $compl_insert_val)"; 
              }
              else
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->canceled != "")
                  { 
                       $compl_insert     .= ", canceled";
                       $compl_insert_val .= ", '$this->canceled'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "MembershipID, memb_status_id, appn_id, co_name, ofa_contact, street_address, mailing_address, city, state, zip_code, phone_number, home_phone, fax_number, email, business_type, fresh_cut_allowed, business_license, nursery_license, federal_tax_id, temporary_pass, ofa_member, starting_date, renewal_date, expiration_date, cancel_date, canceled_by, reason_canceled, retire_date, verified_receipts, date_last_updated, restricted, committee_approval_required, type_company, archive, archive_date, pricing_level_id, store_front_address, store_front_city, store_front_zip, home_base_address, home_base_city, home_base_zip, store_front_state, home_base_state, record_created, permanent_member_date, acct_instagram, acct_facebook, website_url, bus_cat_id, bus_subcat_id, bus_subcat_other, appn_date, appn_note, doc_sec_of_state, doc_city_bus_lic, doc_agric_lic, doc_last_year_tax, qb_id, main_contact_name, main_contact_phone, main_contact_email, main_contact_title, main_contact_img_id, main_contact_img_file, main_contact_img_size, main_contact_img_id_prev, memb_qty, doc_type, doc_file, doc_filename, doc_filesize, applicant_name, applicant_signature, applicant_title $compl_insert) VALUES (" . $NM_seq_auto . "$this->membershipid, $this->memb_status_id, $this->appn_id, '$this->co_name', '$this->ofa_contact', '$this->street_address', '$this->mailing_address', '$this->city', '$this->state', '$this->zip_code', '$this->phone_number', '$this->home_phone', '$this->fax_number', '$this->email', '$this->business_type', $this->fresh_cut_allowed, '$this->business_license', '$this->nursery_license', '$this->federal_tax_id', $this->temporary_pass, $this->ofa_member, " . $this->Ini->date_delim . $this->starting_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->renewal_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->expiration_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->cancel_date . $this->Ini->date_delim1 . ", '$this->canceled_by', '$this->reason_canceled', " . $this->Ini->date_delim . $this->retire_date . $this->Ini->date_delim1 . ", '$this->verified_receipts', " . $this->Ini->date_delim . $this->date_last_updated . $this->Ini->date_delim1 . ", $this->restricted, $this->committee_approval_required, '$this->type_company', $this->archive, " . $this->Ini->date_delim . $this->archive_date . $this->Ini->date_delim1 . ", $this->pricing_level_id, '$this->store_front_address', '$this->store_front_city', '$this->store_front_zip', '$this->home_base_address', '$this->home_base_city', '$this->home_base_zip', '$this->store_front_state', '$this->home_base_state', " . $this->Ini->date_delim . $this->record_created . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->permanent_member_date . $this->Ini->date_delim1 . ", '$this->acct_instagram', '$this->acct_facebook', '$this->website_url', $this->bus_cat_id, $this->bus_subcat_id, '$this->bus_subcat_other', " . $this->Ini->date_delim . $this->appn_date . $this->Ini->date_delim1 . ", '$this->appn_note', '$this->doc_sec_of_state', '$this->doc_city_bus_lic', '$this->doc_agric_lic', '$this->doc_last_year_tax', $this->qb_id, '$this->main_contact_name', '$this->main_contact_phone', '$this->main_contact_email', '$this->main_contact_title', '$this->main_contact_img_id', '$this->main_contact_img_file', '$this->main_contact_img_size', '$this->main_contact_img_id_prev', '$this->memb_qty', '$this->doc_type', '$this->doc_file', '$this->doc_filename', '$this->doc_filesize', '$this->applicant_name', '$this->applicant_signature', '$this->applicant_title' $compl_insert_val)"; 
              }
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
              $rs = $this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $dbErrorMessage = $this->Db->ErrorMsg();
                      $dbErrorCode = $this->Db->ErrorNo();
                      $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $dbErrorMessage, true);
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
                      { 
                          $this->sc_erro_insert = $dbErrorMessage;
                          $this->nmgp_opcao     = 'refresh_insert';
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_clients_staff_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase)) 
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select @@identity"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_clients_staff_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->client_id =  $rsy->fields[0];
                 $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  {
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_id()"; 
                  }
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->client_id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SELECT dbinfo('sqlca.sqlerrd1') FROM " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->client_id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select .currval from dual"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->client_id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
              { 
                  $str_tabela = "SYSIBM.SYSDUMMY1"; 
                  if($this->Ini->nm_con_use_schema == "N") 
                  { 
                          $str_tabela = "SYSDUMMY1"; 
                  } 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SELECT IDENTITY_VAL_LOCAL() FROM " . $str_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->client_id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select CURRVAL('')"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->client_id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_rowid()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->client_id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              $this->co_name = $this->co_name_before_qstr;
              $this->ofa_contact = $this->ofa_contact_before_qstr;
              $this->street_address = $this->street_address_before_qstr;
              $this->mailing_address = $this->mailing_address_before_qstr;
              $this->city = $this->city_before_qstr;
              $this->state = $this->state_before_qstr;
              $this->zip_code = $this->zip_code_before_qstr;
              $this->phone_number = $this->phone_number_before_qstr;
              $this->home_phone = $this->home_phone_before_qstr;
              $this->fax_number = $this->fax_number_before_qstr;
              $this->email = $this->email_before_qstr;
              $this->business_type = $this->business_type_before_qstr;
              $this->business_license = $this->business_license_before_qstr;
              $this->nursery_license = $this->nursery_license_before_qstr;
              $this->federal_tax_id = $this->federal_tax_id_before_qstr;
              $this->canceled = $this->canceled_before_qstr;
              $this->canceled_by = $this->canceled_by_before_qstr;
              $this->reason_canceled = $this->reason_canceled_before_qstr;
              $this->verified_receipts = $this->verified_receipts_before_qstr;
              $this->type_company = $this->type_company_before_qstr;
              $this->store_front_address = $this->store_front_address_before_qstr;
              $this->store_front_city = $this->store_front_city_before_qstr;
              $this->store_front_zip = $this->store_front_zip_before_qstr;
              $this->home_base_address = $this->home_base_address_before_qstr;
              $this->home_base_city = $this->home_base_city_before_qstr;
              $this->home_base_zip = $this->home_base_zip_before_qstr;
              $this->store_front_state = $this->store_front_state_before_qstr;
              $this->home_base_state = $this->home_base_state_before_qstr;
              $this->acct_instagram = $this->acct_instagram_before_qstr;
              $this->acct_facebook = $this->acct_facebook_before_qstr;
              $this->website_url = $this->website_url_before_qstr;
              $this->bus_subcat_other = $this->bus_subcat_other_before_qstr;
              $this->appn_note = $this->appn_note_before_qstr;
              $this->main_contact_name = $this->main_contact_name_before_qstr;
              $this->main_contact_phone = $this->main_contact_phone_before_qstr;
              $this->main_contact_email = $this->main_contact_email_before_qstr;
              $this->main_contact_title = $this->main_contact_title_before_qstr;
              $this->main_contact_img_file = $this->main_contact_img_file_before_qstr;
              $this->main_contact_img_size = $this->main_contact_img_size_before_qstr;
              $this->memb_qty = $this->memb_qty_before_qstr;
              $this->doc_type = $this->doc_type_before_qstr;
              $this->doc_filename = $this->doc_filename_before_qstr;
              $this->doc_filesize = $this->doc_filesize_before_qstr;
              $this->applicant_name = $this->applicant_name_before_qstr;
              $this->applicant_title = $this->applicant_title_before_qstr;
              $this->client_pmts = $this->client_pmts_before_qstr;
              $this->docs = $this->docs_before_qstr;
              $this->memb_list = $this->memb_list_before_qstr;
              $this->notes = $this->notes_before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
              { 
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  if (trim($this->doc_sec_of_state ) != "") 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  doc_sec_of_state , $this->doc_sec_of_state,  \"client_id = $this->client_id\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "doc_sec_of_state", $this->doc_sec_of_state,  "client_id = $this->client_id"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_clients_staff_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
                  if (trim($this->doc_city_bus_lic ) != "") 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  doc_city_bus_lic , $this->doc_city_bus_lic,  \"client_id = $this->client_id\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "doc_city_bus_lic", $this->doc_city_bus_lic,  "client_id = $this->client_id"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_clients_staff_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
                  if (trim($this->doc_agric_lic ) != "") 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  doc_agric_lic , $this->doc_agric_lic,  \"client_id = $this->client_id\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "doc_agric_lic", $this->doc_agric_lic,  "client_id = $this->client_id"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_clients_staff_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
                  if (trim($this->doc_last_year_tax ) != "") 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  doc_last_year_tax , $this->doc_last_year_tax,  \"client_id = $this->client_id\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "doc_last_year_tax", $this->doc_last_year_tax,  "client_id = $this->client_id"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_clients_staff_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
                  if (trim($this->main_contact_img_id ) != "") 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  main_contact_img_id , $this->main_contact_img_id,  \"client_id = $this->client_id\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "main_contact_img_id", $this->main_contact_img_id,  "client_id = $this->client_id"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_clients_staff_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
                  if (trim($this->main_contact_img_id_prev ) != "") 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  main_contact_img_id_prev , $this->main_contact_img_id_prev,  \"client_id = $this->client_id\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "main_contact_img_id_prev", $this->main_contact_img_id_prev,  "client_id = $this->client_id"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_clients_staff_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
                  if (trim($this->doc_file ) != "") 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  doc_file , $this->doc_file,  \"client_id = $this->client_id\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "doc_file", $this->doc_file,  "client_id = $this->client_id"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_clients_staff_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
                  if (trim($this->applicant_signature ) != "") 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  applicant_signature , $this->applicant_signature,  \"client_id = $this->client_id\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "applicant_signature", $this->applicant_signature,  "client_id = $this->client_id"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_clients_staff_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
              }  
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->co_name = $this->co_name_before_qstr;
              $this->ofa_contact = $this->ofa_contact_before_qstr;
              $this->street_address = $this->street_address_before_qstr;
              $this->mailing_address = $this->mailing_address_before_qstr;
              $this->city = $this->city_before_qstr;
              $this->state = $this->state_before_qstr;
              $this->zip_code = $this->zip_code_before_qstr;
              $this->phone_number = $this->phone_number_before_qstr;
              $this->home_phone = $this->home_phone_before_qstr;
              $this->fax_number = $this->fax_number_before_qstr;
              $this->email = $this->email_before_qstr;
              $this->business_type = $this->business_type_before_qstr;
              $this->business_license = $this->business_license_before_qstr;
              $this->nursery_license = $this->nursery_license_before_qstr;
              $this->federal_tax_id = $this->federal_tax_id_before_qstr;
              $this->canceled = $this->canceled_before_qstr;
              $this->canceled_by = $this->canceled_by_before_qstr;
              $this->reason_canceled = $this->reason_canceled_before_qstr;
              $this->verified_receipts = $this->verified_receipts_before_qstr;
              $this->type_company = $this->type_company_before_qstr;
              $this->store_front_address = $this->store_front_address_before_qstr;
              $this->store_front_city = $this->store_front_city_before_qstr;
              $this->store_front_zip = $this->store_front_zip_before_qstr;
              $this->home_base_address = $this->home_base_address_before_qstr;
              $this->home_base_city = $this->home_base_city_before_qstr;
              $this->home_base_zip = $this->home_base_zip_before_qstr;
              $this->store_front_state = $this->store_front_state_before_qstr;
              $this->home_base_state = $this->home_base_state_before_qstr;
              $this->acct_instagram = $this->acct_instagram_before_qstr;
              $this->acct_facebook = $this->acct_facebook_before_qstr;
              $this->website_url = $this->website_url_before_qstr;
              $this->bus_subcat_other = $this->bus_subcat_other_before_qstr;
              $this->appn_note = $this->appn_note_before_qstr;
              $this->main_contact_name = $this->main_contact_name_before_qstr;
              $this->main_contact_phone = $this->main_contact_phone_before_qstr;
              $this->main_contact_email = $this->main_contact_email_before_qstr;
              $this->main_contact_title = $this->main_contact_title_before_qstr;
              $this->main_contact_img_file = $this->main_contact_img_file_before_qstr;
              $this->main_contact_img_size = $this->main_contact_img_size_before_qstr;
              $this->memb_qty = $this->memb_qty_before_qstr;
              $this->doc_type = $this->doc_type_before_qstr;
              $this->doc_filename = $this->doc_filename_before_qstr;
              $this->doc_filesize = $this->doc_filesize_before_qstr;
              $this->applicant_name = $this->applicant_name_before_qstr;
              $this->applicant_title = $this->applicant_title_before_qstr;
              $this->client_pmts = $this->client_pmts_before_qstr;
              $this->docs = $this->docs_before_qstr;
              $this->memb_list = $this->memb_list_before_qstr;
              $this->notes = $this->notes_before_qstr;
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              $this->NM_gera_log_key("incluir");
              $this->NM_gera_log_new();
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao   = "igual"; 
              $this->nmgp_opc_ant = "igual"; 
              $this->nmgp_botoes['btn_exit_app'] = "on";
              $this->nmgp_botoes['pdf_download'] = "on";
              $this->nmgp_botoes['btn_back_reqs'] = "on";
              $this->nmgp_botoes['btn_back_renewals'] = "on";
              $this->nmgp_botoes['email_client_if_active'] = "on";
              $this->nmgp_botoes['back_clients'] = "on";
              $this->nmgp_botoes['close_tab'] = "on";
              $this->nmgp_botoes['btn_delete_backend'] = "on";
              $this->nmgp_botoes['coll_pmt_js'] = "on";
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->client_id = substr($this->Db->qstr($this->client_id), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';
          if ($bDelecaoOk)
          {
              $sDetailWhere = "client_id = " . $this->client_id . "";
              $this->form_client_pmts->ini_controle();
              if ($this->form_client_pmts->temRegistros($sDetailWhere))
              {
                  $bDelecaoOk = false;
                  $sMsgErro   = $this->Ini->Nm_lang['lang_errm_fkvi'];
              }
          }
          if ($bDelecaoOk)
          {
              $sDetailWhere = "client_id = " . $this->client_id . "";
              $this->form_members_staff->ini_controle();
              if ($this->form_members_staff->temRegistros($sDetailWhere))
              {
                  $bDelecaoOk = false;
                  $sMsgErro   = $this->Ini->Nm_lang['lang_errm_fkvi'];
              }
          }

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where client_id = $this->client_id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where client_id = $this->client_id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where client_id = $this->client_id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where client_id = $this->client_id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where client_id = $this->client_id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where client_id = $this->client_id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where client_id = $this->client_id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where client_id = $this->client_id "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where client_id = $this->client_id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where client_id = $this->client_id "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_dele_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where client_id = $this->client_id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where client_id = $this->client_id "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where client_id = $this->client_id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where client_id = $this->client_id "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where client_id = $this->client_id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where client_id = $this->client_id "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where client_id = $this->client_id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where client_id = $this->client_id "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where client_id = $this->client_id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where client_id = $this->client_id "); 
              }  
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_clients_staff_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              if (empty($this->sc_erro_delete)) {
                  $this->record_delete_ok = true;
              }
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['total']);
              }

              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
          }

          }
          else
          {
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "igual"; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sMsgErro); 
          }

      }  
      $this->restore_zeros_null();
    if ("insert" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        $_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'on';
  $this->sc_ajax_javascript('refresh_member_list');
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'off'; 
    }
    if ("delete" == $this->sc_evento && $this->nmgp_opcao != "nada") {
      $_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'on';
  $this->sc_ajax_javascript('refresh_member_list');
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $salva_opcao ; 
          if ($salva_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->sc_evento = ""; 
          $this->NM_rollback_db(); 
          return; 
      }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['parms'] = "client_id?#?$this->client_id?@?"; 
      }
      $this->nmgp_dados_form['main_contact_img_id'] = ""; 
      $this->main_contact_img_id_limpa = ""; 
      $this->main_contact_img_id_salva = ""; 
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->client_id = null === $this->client_id ? null : substr($this->Db->qstr($this->client_id), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['where_filter'] . ")";
          }
      }
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "inicio")
      { 
          $this->nmgp_opcao = "igual"; 
      } 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT client_id, MembershipID, memb_status_id, appn_id, co_name, ofa_contact, street_address, mailing_address, city, state, zip_code, phone_number, home_phone, fax_number, email, business_type, fresh_cut_allowed, business_license, nursery_license, federal_tax_id, temporary_pass, ofa_member, str_replace (convert(char(10),starting_date,102), '.', '-') + ' ' + convert(char(8),starting_date,20), str_replace (convert(char(10),renewal_date,102), '.', '-') + ' ' + convert(char(8),renewal_date,20), str_replace (convert(char(10),expiration_date,102), '.', '-') + ' ' + convert(char(8),expiration_date,20), canceled, str_replace (convert(char(10),cancel_date,102), '.', '-') + ' ' + convert(char(8),cancel_date,20), canceled_by, reason_canceled, str_replace (convert(char(10),retire_date,102), '.', '-') + ' ' + convert(char(8),retire_date,20), verified_receipts, str_replace (convert(char(10),date_last_updated,102), '.', '-') + ' ' + convert(char(8),date_last_updated,20), restricted, committee_approval_required, type_company, archive, str_replace (convert(char(10),archive_date,102), '.', '-') + ' ' + convert(char(8),archive_date,20), pricing_level_id, store_front_address, store_front_city, store_front_zip, home_base_address, home_base_city, home_base_zip, store_front_state, home_base_state, str_replace (convert(char(10),record_created,102), '.', '-') + ' ' + convert(char(8),record_created,20), str_replace (convert(char(10),permanent_member_date,102), '.', '-') + ' ' + convert(char(8),permanent_member_date,20), acct_instagram, acct_facebook, website_url, bus_cat_id, bus_subcat_id, bus_subcat_other, str_replace (convert(char(10),appn_date,102), '.', '-') + ' ' + convert(char(8),appn_date,20), appn_note, doc_sec_of_state, doc_city_bus_lic, doc_agric_lic, doc_last_year_tax, qb_id, main_contact_name, main_contact_phone, main_contact_email, main_contact_title, main_contact_img_id, main_contact_img_file, main_contact_img_size, main_contact_img_id_prev, memb_qty, doc_type, doc_file, doc_filename, doc_filesize, applicant_name, applicant_signature, applicant_title from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT client_id, MembershipID, memb_status_id, appn_id, co_name, ofa_contact, street_address, mailing_address, city, state, zip_code, phone_number, home_phone, fax_number, email, business_type, fresh_cut_allowed, business_license, nursery_license, federal_tax_id, temporary_pass, ofa_member, convert(char(23),starting_date,121), convert(char(23),renewal_date,121), convert(char(23),expiration_date,121), canceled, convert(char(23),cancel_date,121), canceled_by, reason_canceled, convert(char(23),retire_date,121), verified_receipts, convert(char(23),date_last_updated,121), restricted, committee_approval_required, type_company, archive, convert(char(23),archive_date,121), pricing_level_id, store_front_address, store_front_city, store_front_zip, home_base_address, home_base_city, home_base_zip, store_front_state, home_base_state, convert(char(23),record_created,121), convert(char(23),permanent_member_date,121), acct_instagram, acct_facebook, website_url, bus_cat_id, bus_subcat_id, bus_subcat_other, convert(char(23),appn_date,121), appn_note, doc_sec_of_state, doc_city_bus_lic, doc_agric_lic, doc_last_year_tax, qb_id, main_contact_name, main_contact_phone, main_contact_email, main_contact_title, main_contact_img_id, main_contact_img_file, main_contact_img_size, main_contact_img_id_prev, memb_qty, doc_type, doc_file, doc_filename, doc_filesize, applicant_name, applicant_signature, applicant_title from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT client_id, MembershipID, memb_status_id, appn_id, co_name, ofa_contact, street_address, mailing_address, city, state, zip_code, phone_number, home_phone, fax_number, email, business_type, fresh_cut_allowed, business_license, nursery_license, federal_tax_id, temporary_pass, ofa_member, starting_date, renewal_date, expiration_date, canceled, cancel_date, canceled_by, reason_canceled, retire_date, verified_receipts, date_last_updated, restricted, committee_approval_required, type_company, archive, archive_date, pricing_level_id, store_front_address, store_front_city, store_front_zip, home_base_address, home_base_city, home_base_zip, store_front_state, home_base_state, record_created, permanent_member_date, acct_instagram, acct_facebook, website_url, bus_cat_id, bus_subcat_id, bus_subcat_other, appn_date, appn_note, doc_sec_of_state, doc_city_bus_lic, doc_agric_lic, doc_last_year_tax, qb_id, main_contact_name, main_contact_phone, main_contact_email, main_contact_title, main_contact_img_id, main_contact_img_file, main_contact_img_size, main_contact_img_id_prev, memb_qty, doc_type, doc_file, doc_filename, doc_filesize, applicant_name, applicant_signature, applicant_title from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT client_id, MembershipID, memb_status_id, appn_id, co_name, ofa_contact, street_address, mailing_address, city, state, zip_code, phone_number, home_phone, fax_number, email, business_type, fresh_cut_allowed, business_license, nursery_license, federal_tax_id, temporary_pass, ofa_member, EXTEND(starting_date, YEAR TO FRACTION), EXTEND(renewal_date, YEAR TO FRACTION), EXTEND(expiration_date, YEAR TO FRACTION), canceled, EXTEND(cancel_date, YEAR TO FRACTION), canceled_by, reason_canceled, EXTEND(retire_date, YEAR TO FRACTION), verified_receipts, EXTEND(date_last_updated, YEAR TO FRACTION), restricted, committee_approval_required, type_company, archive, EXTEND(archive_date, YEAR TO FRACTION), pricing_level_id, store_front_address, store_front_city, store_front_zip, home_base_address, home_base_city, home_base_zip, store_front_state, home_base_state, EXTEND(record_created, YEAR TO FRACTION), EXTEND(permanent_member_date, YEAR TO FRACTION), acct_instagram, acct_facebook, website_url, bus_cat_id, bus_subcat_id, bus_subcat_other, EXTEND(appn_date, YEAR TO FRACTION), appn_note, LOTOFILE(doc_sec_of_state, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_doc_sec_of_state', 'client'), LOTOFILE(doc_city_bus_lic, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_doc_city_bus_lic', 'client'), LOTOFILE(doc_agric_lic, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_doc_agric_lic', 'client'), LOTOFILE(doc_last_year_tax, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_doc_last_year_tax', 'client'), qb_id, main_contact_name, main_contact_phone, main_contact_email, main_contact_title, LOTOFILE(main_contact_img_id, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_main_contact_img_id', 'client'), main_contact_img_file, main_contact_img_size, LOTOFILE(main_contact_img_id_prev, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_main_contact_img_id_prev', 'client'), memb_qty, doc_type, LOTOFILE(doc_file, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_doc_file', 'client'), doc_filename, doc_filesize, applicant_name, LOTOFILE(applicant_signature, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_applicant_signature', 'client'), applicant_title from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT client_id, MembershipID, memb_status_id, appn_id, co_name, ofa_contact, street_address, mailing_address, city, state, zip_code, phone_number, home_phone, fax_number, email, business_type, fresh_cut_allowed, business_license, nursery_license, federal_tax_id, temporary_pass, ofa_member, starting_date, renewal_date, expiration_date, canceled, cancel_date, canceled_by, reason_canceled, retire_date, verified_receipts, date_last_updated, restricted, committee_approval_required, type_company, archive, archive_date, pricing_level_id, store_front_address, store_front_city, store_front_zip, home_base_address, home_base_city, home_base_zip, store_front_state, home_base_state, record_created, permanent_member_date, acct_instagram, acct_facebook, website_url, bus_cat_id, bus_subcat_id, bus_subcat_other, appn_date, appn_note, doc_sec_of_state, doc_city_bus_lic, doc_agric_lic, doc_last_year_tax, qb_id, main_contact_name, main_contact_phone, main_contact_email, main_contact_title, main_contact_img_id, main_contact_img_file, main_contact_img_size, main_contact_img_id_prev, memb_qty, doc_type, doc_file, doc_filename, doc_filesize, applicant_name, applicant_signature, applicant_title from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "client_id = $this->client_id"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $aWhere[] = "client_id = $this->client_id"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $aWhere[] = "client_id = $this->client_id"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $aWhere[] = "client_id = $this->client_id"; 
              }  
              else  
              {
                  $aWhere[] = "client_id = $this->client_id"; 
              }  
              if (!empty($sc_where_filter))  
              {
                  $teste_select = $nmgp_select . $this->returnWhere($aWhere);
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $teste_select; 
                  $rs = $this->Db->Execute($teste_select); 
                  if ($rs->EOF)
                  {
                     $aWhere = array($sc_where_filter);
                  }  
                  $rs->Close(); 
              }  
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "client_id";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['select'] = ""; 
              } 
          } 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rs = $this->Db->Execute($nmgp_select) ; 
          if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs->EOF) 
          { 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['btn_exit_app'] = $this->nmgp_botoes['btn_exit_app'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['pdf_download'] = $this->nmgp_botoes['pdf_download'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['btn_back_reqs'] = $this->nmgp_botoes['btn_back_reqs'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['btn_back_renewals'] = $this->nmgp_botoes['btn_back_renewals'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['email_client_if_active'] = $this->nmgp_botoes['email_client_if_active'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['back_clients'] = $this->nmgp_botoes['back_clients'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['close_tab'] = $this->nmgp_botoes['close_tab'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['btn_delete_backend'] = $this->nmgp_botoes['btn_delete_backend'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['coll_pmt_js'] = $this->nmgp_botoes['coll_pmt_js'] = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['empty_filter'] = true;
                  return; 
              }
              if ($this->nmgp_botoes['insert'] != "on")
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
              }
              $this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes['update'] = "off";
              $this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes['delete'] = "off";
              return; 
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->client_id = $rs->fields[0] ; 
              $this->nmgp_dados_select['client_id'] = $this->client_id;
              $this->membershipid = $rs->fields[1] ; 
              $this->nmgp_dados_select['membershipid'] = $this->membershipid;
              $this->memb_status_id = $rs->fields[2] ; 
              $this->nmgp_dados_select['memb_status_id'] = $this->memb_status_id;
              $this->appn_id = $rs->fields[3] ; 
              $this->nmgp_dados_select['appn_id'] = $this->appn_id;
              $this->co_name = $rs->fields[4] ; 
              $this->nmgp_dados_select['co_name'] = $this->co_name;
              $this->ofa_contact = $rs->fields[5] ; 
              $this->nmgp_dados_select['ofa_contact'] = $this->ofa_contact;
              $this->street_address = $rs->fields[6] ; 
              $this->nmgp_dados_select['street_address'] = $this->street_address;
              $this->mailing_address = $rs->fields[7] ; 
              $this->nmgp_dados_select['mailing_address'] = $this->mailing_address;
              $this->city = $rs->fields[8] ; 
              $this->nmgp_dados_select['city'] = $this->city;
              $this->state = $rs->fields[9] ; 
              $this->nmgp_dados_select['state'] = $this->state;
              $this->zip_code = $rs->fields[10] ; 
              $this->nmgp_dados_select['zip_code'] = $this->zip_code;
              $this->phone_number = $rs->fields[11] ; 
              $this->nmgp_dados_select['phone_number'] = $this->phone_number;
              $this->home_phone = $rs->fields[12] ; 
              $this->nmgp_dados_select['home_phone'] = $this->home_phone;
              $this->fax_number = $rs->fields[13] ; 
              $this->nmgp_dados_select['fax_number'] = $this->fax_number;
              $this->email = $rs->fields[14] ; 
              $this->nmgp_dados_select['email'] = $this->email;
              $this->business_type = $rs->fields[15] ; 
              $this->nmgp_dados_select['business_type'] = $this->business_type;
              $this->fresh_cut_allowed = $rs->fields[16] ; 
              $this->nmgp_dados_select['fresh_cut_allowed'] = $this->fresh_cut_allowed;
              $this->business_license = $rs->fields[17] ; 
              $this->nmgp_dados_select['business_license'] = $this->business_license;
              $this->nursery_license = $rs->fields[18] ; 
              $this->nmgp_dados_select['nursery_license'] = $this->nursery_license;
              $this->federal_tax_id = $rs->fields[19] ; 
              $this->nmgp_dados_select['federal_tax_id'] = $this->federal_tax_id;
              $this->temporary_pass = $rs->fields[20] ; 
              $this->nmgp_dados_select['temporary_pass'] = $this->temporary_pass;
              $this->ofa_member = $rs->fields[21] ; 
              $this->nmgp_dados_select['ofa_member'] = $this->ofa_member;
              $this->starting_date = $rs->fields[22] ; 
              if (substr($this->starting_date, 10, 1) == "-") 
              { 
                 $this->starting_date = substr($this->starting_date, 0, 10) . " " . substr($this->starting_date, 11);
              } 
              if (substr($this->starting_date, 13, 1) == ".") 
              { 
                 $this->starting_date = substr($this->starting_date, 0, 13) . ":" . substr($this->starting_date, 14, 2) . ":" . substr($this->starting_date, 17);
              } 
              $this->nmgp_dados_select['starting_date'] = $this->starting_date;
              $this->renewal_date = $rs->fields[23] ; 
              if (substr($this->renewal_date, 10, 1) == "-") 
              { 
                 $this->renewal_date = substr($this->renewal_date, 0, 10) . " " . substr($this->renewal_date, 11);
              } 
              if (substr($this->renewal_date, 13, 1) == ".") 
              { 
                 $this->renewal_date = substr($this->renewal_date, 0, 13) . ":" . substr($this->renewal_date, 14, 2) . ":" . substr($this->renewal_date, 17);
              } 
              $this->nmgp_dados_select['renewal_date'] = $this->renewal_date;
              $this->expiration_date = $rs->fields[24] ; 
              if (substr($this->expiration_date, 10, 1) == "-") 
              { 
                 $this->expiration_date = substr($this->expiration_date, 0, 10) . " " . substr($this->expiration_date, 11);
              } 
              if (substr($this->expiration_date, 13, 1) == ".") 
              { 
                 $this->expiration_date = substr($this->expiration_date, 0, 13) . ":" . substr($this->expiration_date, 14, 2) . ":" . substr($this->expiration_date, 17);
              } 
              $this->nmgp_dados_select['expiration_date'] = $this->expiration_date;
              $this->canceled = $rs->fields[25] ; 
              $this->nmgp_dados_select['canceled'] = $this->canceled;
              $this->cancel_date = $rs->fields[26] ; 
              if (substr($this->cancel_date, 10, 1) == "-") 
              { 
                 $this->cancel_date = substr($this->cancel_date, 0, 10) . " " . substr($this->cancel_date, 11);
              } 
              if (substr($this->cancel_date, 13, 1) == ".") 
              { 
                 $this->cancel_date = substr($this->cancel_date, 0, 13) . ":" . substr($this->cancel_date, 14, 2) . ":" . substr($this->cancel_date, 17);
              } 
              $this->nmgp_dados_select['cancel_date'] = $this->cancel_date;
              $this->canceled_by = $rs->fields[27] ; 
              $this->nmgp_dados_select['canceled_by'] = $this->canceled_by;
              $this->reason_canceled = $rs->fields[28] ; 
              $this->nmgp_dados_select['reason_canceled'] = $this->reason_canceled;
              $this->retire_date = $rs->fields[29] ; 
              if (substr($this->retire_date, 10, 1) == "-") 
              { 
                 $this->retire_date = substr($this->retire_date, 0, 10) . " " . substr($this->retire_date, 11);
              } 
              if (substr($this->retire_date, 13, 1) == ".") 
              { 
                 $this->retire_date = substr($this->retire_date, 0, 13) . ":" . substr($this->retire_date, 14, 2) . ":" . substr($this->retire_date, 17);
              } 
              $this->nmgp_dados_select['retire_date'] = $this->retire_date;
              $this->verified_receipts = $rs->fields[30] ; 
              $this->nmgp_dados_select['verified_receipts'] = $this->verified_receipts;
              $this->date_last_updated = $rs->fields[31] ; 
              if (substr($this->date_last_updated, 10, 1) == "-") 
              { 
                 $this->date_last_updated = substr($this->date_last_updated, 0, 10) . " " . substr($this->date_last_updated, 11);
              } 
              if (substr($this->date_last_updated, 13, 1) == ".") 
              { 
                 $this->date_last_updated = substr($this->date_last_updated, 0, 13) . ":" . substr($this->date_last_updated, 14, 2) . ":" . substr($this->date_last_updated, 17);
              } 
              $this->nmgp_dados_select['date_last_updated'] = $this->date_last_updated;
              $this->restricted = $rs->fields[32] ; 
              $this->nmgp_dados_select['restricted'] = $this->restricted;
              $this->committee_approval_required = $rs->fields[33] ; 
              $this->nmgp_dados_select['committee_approval_required'] = $this->committee_approval_required;
              $this->type_company = $rs->fields[34] ; 
              $this->nmgp_dados_select['type_company'] = $this->type_company;
              $this->archive = $rs->fields[35] ; 
              $this->nmgp_dados_select['archive'] = $this->archive;
              $this->archive_date = $rs->fields[36] ; 
              if (substr($this->archive_date, 10, 1) == "-") 
              { 
                 $this->archive_date = substr($this->archive_date, 0, 10) . " " . substr($this->archive_date, 11);
              } 
              if (substr($this->archive_date, 13, 1) == ".") 
              { 
                 $this->archive_date = substr($this->archive_date, 0, 13) . ":" . substr($this->archive_date, 14, 2) . ":" . substr($this->archive_date, 17);
              } 
              $this->nmgp_dados_select['archive_date'] = $this->archive_date;
              $this->pricing_level_id = $rs->fields[37] ; 
              $this->nmgp_dados_select['pricing_level_id'] = $this->pricing_level_id;
              $this->store_front_address = $rs->fields[38] ; 
              $this->nmgp_dados_select['store_front_address'] = $this->store_front_address;
              $this->store_front_city = $rs->fields[39] ; 
              $this->nmgp_dados_select['store_front_city'] = $this->store_front_city;
              $this->store_front_zip = $rs->fields[40] ; 
              $this->nmgp_dados_select['store_front_zip'] = $this->store_front_zip;
              $this->home_base_address = $rs->fields[41] ; 
              $this->nmgp_dados_select['home_base_address'] = $this->home_base_address;
              $this->home_base_city = $rs->fields[42] ; 
              $this->nmgp_dados_select['home_base_city'] = $this->home_base_city;
              $this->home_base_zip = $rs->fields[43] ; 
              $this->nmgp_dados_select['home_base_zip'] = $this->home_base_zip;
              $this->store_front_state = $rs->fields[44] ; 
              $this->nmgp_dados_select['store_front_state'] = $this->store_front_state;
              $this->home_base_state = $rs->fields[45] ; 
              $this->nmgp_dados_select['home_base_state'] = $this->home_base_state;
              $this->record_created = $rs->fields[46] ; 
              if (substr($this->record_created, 10, 1) == "-") 
              { 
                 $this->record_created = substr($this->record_created, 0, 10) . " " . substr($this->record_created, 11);
              } 
              if (substr($this->record_created, 13, 1) == ".") 
              { 
                 $this->record_created = substr($this->record_created, 0, 13) . ":" . substr($this->record_created, 14, 2) . ":" . substr($this->record_created, 17);
              } 
              $this->nmgp_dados_select['record_created'] = $this->record_created;
              $this->permanent_member_date = $rs->fields[47] ; 
              if (substr($this->permanent_member_date, 10, 1) == "-") 
              { 
                 $this->permanent_member_date = substr($this->permanent_member_date, 0, 10) . " " . substr($this->permanent_member_date, 11);
              } 
              if (substr($this->permanent_member_date, 13, 1) == ".") 
              { 
                 $this->permanent_member_date = substr($this->permanent_member_date, 0, 13) . ":" . substr($this->permanent_member_date, 14, 2) . ":" . substr($this->permanent_member_date, 17);
              } 
              $this->nmgp_dados_select['permanent_member_date'] = $this->permanent_member_date;
              $this->acct_instagram = $rs->fields[48] ; 
              $this->nmgp_dados_select['acct_instagram'] = $this->acct_instagram;
              $this->acct_facebook = $rs->fields[49] ; 
              $this->nmgp_dados_select['acct_facebook'] = $this->acct_facebook;
              $this->website_url = $rs->fields[50] ; 
              $this->nmgp_dados_select['website_url'] = $this->website_url;
              $this->bus_cat_id = $rs->fields[51] ; 
              $this->nmgp_dados_select['bus_cat_id'] = $this->bus_cat_id;
              $this->bus_subcat_id = $rs->fields[52] ; 
              $this->nmgp_dados_select['bus_subcat_id'] = $this->bus_subcat_id;
              $this->bus_subcat_other = $rs->fields[53] ; 
              $this->nmgp_dados_select['bus_subcat_other'] = $this->bus_subcat_other;
              $this->appn_date = $rs->fields[54] ; 
              if (substr($this->appn_date, 10, 1) == "-") 
              { 
                 $this->appn_date = substr($this->appn_date, 0, 10) . " " . substr($this->appn_date, 11);
              } 
              if (substr($this->appn_date, 13, 1) == ".") 
              { 
                 $this->appn_date = substr($this->appn_date, 0, 13) . ":" . substr($this->appn_date, 14, 2) . ":" . substr($this->appn_date, 17);
              } 
              $this->nmgp_dados_select['appn_date'] = $this->appn_date;
              $this->appn_note = $rs->fields[55] ; 
              $this->nmgp_dados_select['appn_note'] = $this->appn_note;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $this->doc_sec_of_state = $this->Db->BlobDecode($rs->fields[56]) ; 
              } 
              elseif ($this->Ini->nm_tpbanco == 'pdo_oracle')
              { 
                  $this->doc_sec_of_state = $this->Db->BlobDecode($rs->fields[56]) ; 
              } 
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              { 
                  $this->doc_sec_of_state = $this->Db->BlobDecode($rs->fields[56]) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  if(isset($rs->fields[56]) && !empty($rs->fields[56]) && is_file($rs->fields[56])) 
                  { 
                     $this->doc_sec_of_state = file_get_contents($rs->fields[56]);
                  }else 
                  { 
                     $this->doc_sec_of_state = ''; 
                  } 
              } 
              else
              { 
                  $this->doc_sec_of_state = $rs->fields[56] ; 
              } 
              $this->nmgp_dados_select['doc_sec_of_state'] = $this->doc_sec_of_state;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $this->doc_city_bus_lic = $this->Db->BlobDecode($rs->fields[57]) ; 
              } 
              elseif ($this->Ini->nm_tpbanco == 'pdo_oracle')
              { 
                  $this->doc_city_bus_lic = $this->Db->BlobDecode($rs->fields[57]) ; 
              } 
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              { 
                  $this->doc_city_bus_lic = $this->Db->BlobDecode($rs->fields[57]) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  if(isset($rs->fields[57]) && !empty($rs->fields[57]) && is_file($rs->fields[57])) 
                  { 
                     $this->doc_city_bus_lic = file_get_contents($rs->fields[57]);
                  }else 
                  { 
                     $this->doc_city_bus_lic = ''; 
                  } 
              } 
              else
              { 
                  $this->doc_city_bus_lic = $rs->fields[57] ; 
              } 
              $this->nmgp_dados_select['doc_city_bus_lic'] = $this->doc_city_bus_lic;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $this->doc_agric_lic = $this->Db->BlobDecode($rs->fields[58]) ; 
              } 
              elseif ($this->Ini->nm_tpbanco == 'pdo_oracle')
              { 
                  $this->doc_agric_lic = $this->Db->BlobDecode($rs->fields[58]) ; 
              } 
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              { 
                  $this->doc_agric_lic = $this->Db->BlobDecode($rs->fields[58]) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  if(isset($rs->fields[58]) && !empty($rs->fields[58]) && is_file($rs->fields[58])) 
                  { 
                     $this->doc_agric_lic = file_get_contents($rs->fields[58]);
                  }else 
                  { 
                     $this->doc_agric_lic = ''; 
                  } 
              } 
              else
              { 
                  $this->doc_agric_lic = $rs->fields[58] ; 
              } 
              $this->nmgp_dados_select['doc_agric_lic'] = $this->doc_agric_lic;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $this->doc_last_year_tax = $this->Db->BlobDecode($rs->fields[59]) ; 
              } 
              elseif ($this->Ini->nm_tpbanco == 'pdo_oracle')
              { 
                  $this->doc_last_year_tax = $this->Db->BlobDecode($rs->fields[59]) ; 
              } 
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              { 
                  $this->doc_last_year_tax = $this->Db->BlobDecode($rs->fields[59]) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  if(isset($rs->fields[59]) && !empty($rs->fields[59]) && is_file($rs->fields[59])) 
                  { 
                     $this->doc_last_year_tax = file_get_contents($rs->fields[59]);
                  }else 
                  { 
                     $this->doc_last_year_tax = ''; 
                  } 
              } 
              else
              { 
                  $this->doc_last_year_tax = $rs->fields[59] ; 
              } 
              $this->nmgp_dados_select['doc_last_year_tax'] = $this->doc_last_year_tax;
              $this->qb_id = $rs->fields[60] ; 
              $this->nmgp_dados_select['qb_id'] = $this->qb_id;
              $this->main_contact_name = $rs->fields[61] ; 
              $this->nmgp_dados_select['main_contact_name'] = $this->main_contact_name;
              $this->main_contact_phone = $rs->fields[62] ; 
              $this->nmgp_dados_select['main_contact_phone'] = $this->main_contact_phone;
              $this->main_contact_email = $rs->fields[63] ; 
              $this->nmgp_dados_select['main_contact_email'] = $this->main_contact_email;
              $this->main_contact_title = $rs->fields[64] ; 
              $this->nmgp_dados_select['main_contact_title'] = $this->main_contact_title;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $this->main_contact_img_id = $this->Db->BlobDecode($rs->fields[65]) ; 
              } 
              elseif ($this->Ini->nm_tpbanco == 'pdo_oracle')
              { 
                  $this->main_contact_img_id = $this->Db->BlobDecode($rs->fields[65]) ; 
              } 
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              { 
                  $this->main_contact_img_id = $this->Db->BlobDecode($rs->fields[65]) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  if(isset($rs->fields[65]) && !empty($rs->fields[65]) && is_file($rs->fields[65])) 
                  { 
                     $this->main_contact_img_id = file_get_contents($rs->fields[65]);
                  }else 
                  { 
                     $this->main_contact_img_id = ''; 
                  } 
              } 
              else
              { 
                  $this->main_contact_img_id = $rs->fields[65] ; 
              } 
              $this->nmgp_dados_select['main_contact_img_id'] = $this->main_contact_img_id;
              $this->main_contact_img_file = $rs->fields[66] ; 
              $this->nmgp_dados_select['main_contact_img_file'] = $this->main_contact_img_file;
              $this->main_contact_img_size = $rs->fields[67] ; 
              $this->nmgp_dados_select['main_contact_img_size'] = $this->main_contact_img_size;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $this->main_contact_img_id_prev = $this->Db->BlobDecode($rs->fields[68]) ; 
              } 
              elseif ($this->Ini->nm_tpbanco == 'pdo_oracle')
              { 
                  $this->main_contact_img_id_prev = $this->Db->BlobDecode($rs->fields[68]) ; 
              } 
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              { 
                  $this->main_contact_img_id_prev = $this->Db->BlobDecode($rs->fields[68]) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  if(isset($rs->fields[68]) && !empty($rs->fields[68]) && is_file($rs->fields[68])) 
                  { 
                     $this->main_contact_img_id_prev = file_get_contents($rs->fields[68]);
                  }else 
                  { 
                     $this->main_contact_img_id_prev = ''; 
                  } 
              } 
              else
              { 
                  $this->main_contact_img_id_prev = $rs->fields[68] ; 
              } 
              $this->nmgp_dados_select['main_contact_img_id_prev'] = $this->main_contact_img_id_prev;
              $this->memb_qty = $rs->fields[69] ; 
              $this->nmgp_dados_select['memb_qty'] = $this->memb_qty;
              $this->doc_type = $rs->fields[70] ; 
              $this->nmgp_dados_select['doc_type'] = $this->doc_type;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $this->doc_file = $this->Db->BlobDecode($rs->fields[71]) ; 
              } 
              elseif ($this->Ini->nm_tpbanco == 'pdo_oracle')
              { 
                  $this->doc_file = $this->Db->BlobDecode($rs->fields[71]) ; 
              } 
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              { 
                  $this->doc_file = $this->Db->BlobDecode($rs->fields[71]) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  if(isset($rs->fields[71]) && !empty($rs->fields[71]) && is_file($rs->fields[71])) 
                  { 
                     $this->doc_file = file_get_contents($rs->fields[71]);
                  }else 
                  { 
                     $this->doc_file = ''; 
                  } 
              } 
              else
              { 
                  $this->doc_file = $rs->fields[71] ; 
              } 
              $this->nmgp_dados_select['doc_file'] = $this->doc_file;
              $this->doc_filename = $rs->fields[72] ; 
              $this->nmgp_dados_select['doc_filename'] = $this->doc_filename;
              $this->doc_filesize = $rs->fields[73] ; 
              $this->nmgp_dados_select['doc_filesize'] = $this->doc_filesize;
              $this->applicant_name = $rs->fields[74] ; 
              $this->nmgp_dados_select['applicant_name'] = $this->applicant_name;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $this->applicant_signature = $this->Db->BlobDecode($rs->fields[75]) ; 
              } 
              elseif ($this->Ini->nm_tpbanco == 'pdo_oracle')
              { 
                  $this->applicant_signature = $this->Db->BlobDecode($rs->fields[75]) ; 
              } 
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              { 
                  $this->applicant_signature = $this->Db->BlobDecode($rs->fields[75]) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  if(isset($rs->fields[75]) && !empty($rs->fields[75]) && is_file($rs->fields[75])) 
                  { 
                     $this->applicant_signature = file_get_contents($rs->fields[75]);
                  }else 
                  { 
                     $this->applicant_signature = ''; 
                  } 
              } 
              else
              { 
                  $this->applicant_signature = $rs->fields[75] ; 
              } 
              $this->nmgp_dados_select['applicant_signature'] = $this->applicant_signature;
              $this->applicant_title = $rs->fields[76] ; 
              $this->nmgp_dados_select['applicant_title'] = $this->applicant_title;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->client_id = (string)$this->client_id; 
              $this->membershipid = (string)$this->membershipid; 
              $this->memb_status_id = (string)$this->memb_status_id; 
              $this->appn_id = (string)$this->appn_id; 
              $this->fresh_cut_allowed = (string)$this->fresh_cut_allowed; 
              $this->temporary_pass = (string)$this->temporary_pass; 
              $this->ofa_member = (string)$this->ofa_member; 
              $this->restricted = (string)$this->restricted; 
              $this->committee_approval_required = (string)$this->committee_approval_required; 
              $this->archive = (string)$this->archive; 
              $this->pricing_level_id = (string)$this->pricing_level_id; 
              $this->bus_cat_id = (string)$this->bus_cat_id; 
              $this->bus_subcat_id = (string)$this->bus_subcat_id; 
              $this->qb_id = (string)$this->qb_id; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['parms'] = "client_id?#?$this->client_id?@?";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['sub_dir'][0]  = "";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['sub_dir'][1]  = "";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['sub_dir'][2]  = "";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['sub_dir'][3]  = "";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['sub_dir'][4]  = "";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['sub_dir'][5]  = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->controle_navegacao();
          }
      } 
      if ($this->nmgp_opcao == "novo" || $this->nmgp_opcao == "refresh_insert") 
      { 
          $this->sc_evento_old = $this->sc_evento;
          $this->sc_evento = "novo";
          if ('refresh_insert' == $this->nmgp_opcao)
          {
              $this->nmgp_opcao = 'novo';
          }
          else
          {
              $this->nm_formatar_campos();
              $this->client_id = "";  
              $this->nmgp_dados_form["client_id"] = $this->client_id;
              $this->membershipid = "";  
              $this->nmgp_dados_form["membershipid"] = $this->membershipid;
              $this->memb_status_id = "";  
              $this->nmgp_dados_form["memb_status_id"] = $this->memb_status_id;
              $this->appn_id = "";  
              $this->nmgp_dados_form["appn_id"] = $this->appn_id;
              $this->co_name = "";  
              $this->nmgp_dados_form["co_name"] = $this->co_name;
              $this->ofa_contact = "";  
              $this->nmgp_dados_form["ofa_contact"] = $this->ofa_contact;
              $this->street_address = "";  
              $this->nmgp_dados_form["street_address"] = $this->street_address;
              $this->mailing_address = "";  
              $this->nmgp_dados_form["mailing_address"] = $this->mailing_address;
              $this->city = "";  
              $this->nmgp_dados_form["city"] = $this->city;
              $this->state = "";  
              $this->nmgp_dados_form["state"] = $this->state;
              $this->zip_code = "";  
              $this->nmgp_dados_form["zip_code"] = $this->zip_code;
              $this->phone_number = "";  
              $this->nmgp_dados_form["phone_number"] = $this->phone_number;
              $this->home_phone = "";  
              $this->nmgp_dados_form["home_phone"] = $this->home_phone;
              $this->fax_number = "";  
              $this->nmgp_dados_form["fax_number"] = $this->fax_number;
              $this->email = "";  
              $this->nmgp_dados_form["email"] = $this->email;
              $this->business_type = "";  
              $this->nmgp_dados_form["business_type"] = $this->business_type;
              $this->fresh_cut_allowed = "";  
              $this->nmgp_dados_form["fresh_cut_allowed"] = $this->fresh_cut_allowed;
              $this->business_license = "";  
              $this->nmgp_dados_form["business_license"] = $this->business_license;
              $this->nursery_license = "";  
              $this->nmgp_dados_form["nursery_license"] = $this->nursery_license;
              $this->federal_tax_id = "";  
              $this->nmgp_dados_form["federal_tax_id"] = $this->federal_tax_id;
              $this->temporary_pass = "";  
              $this->nmgp_dados_form["temporary_pass"] = $this->temporary_pass;
              $this->ofa_member = "";  
              $this->nmgp_dados_form["ofa_member"] = $this->ofa_member;
              $this->starting_date = "";  
              $this->starting_date_hora = "" ;  
              $this->nmgp_dados_form["starting_date"] = $this->starting_date;
              $this->renewal_date = "";  
              $this->renewal_date_hora = "" ;  
              $this->nmgp_dados_form["renewal_date"] = $this->renewal_date;
              $this->expiration_date = "";  
              $this->expiration_date_hora = "" ;  
              $this->nmgp_dados_form["expiration_date"] = $this->expiration_date;
              $this->canceled = "";  
              $this->nmgp_dados_form["canceled"] = $this->canceled;
              $this->cancel_date = "";  
              $this->cancel_date_hora = "" ;  
              $this->nmgp_dados_form["cancel_date"] = $this->cancel_date;
              $this->canceled_by = "";  
              $this->nmgp_dados_form["canceled_by"] = $this->canceled_by;
              $this->reason_canceled = "";  
              $this->nmgp_dados_form["reason_canceled"] = $this->reason_canceled;
              $this->retire_date = "";  
              $this->retire_date_hora = "" ;  
              $this->nmgp_dados_form["retire_date"] = $this->retire_date;
              $this->verified_receipts = "";  
              $this->nmgp_dados_form["verified_receipts"] = $this->verified_receipts;
              $this->date_last_updated = "";  
              $this->date_last_updated_hora = "" ;  
              $this->nmgp_dados_form["date_last_updated"] = $this->date_last_updated;
              $this->restricted = "";  
              $this->nmgp_dados_form["restricted"] = $this->restricted;
              $this->committee_approval_required = "";  
              $this->nmgp_dados_form["committee_approval_required"] = $this->committee_approval_required;
              $this->type_company = "";  
              $this->nmgp_dados_form["type_company"] = $this->type_company;
              $this->archive = "";  
              $this->nmgp_dados_form["archive"] = $this->archive;
              $this->archive_date = "";  
              $this->archive_date_hora = "" ;  
              $this->nmgp_dados_form["archive_date"] = $this->archive_date;
              $this->pricing_level_id = "";  
              $this->nmgp_dados_form["pricing_level_id"] = $this->pricing_level_id;
              $this->store_front_address = "";  
              $this->nmgp_dados_form["store_front_address"] = $this->store_front_address;
              $this->store_front_city = "";  
              $this->nmgp_dados_form["store_front_city"] = $this->store_front_city;
              $this->store_front_zip = "";  
              $this->nmgp_dados_form["store_front_zip"] = $this->store_front_zip;
              $this->home_base_address = "";  
              $this->nmgp_dados_form["home_base_address"] = $this->home_base_address;
              $this->home_base_city = "";  
              $this->nmgp_dados_form["home_base_city"] = $this->home_base_city;
              $this->home_base_zip = "";  
              $this->nmgp_dados_form["home_base_zip"] = $this->home_base_zip;
              $this->store_front_state = "";  
              $this->nmgp_dados_form["store_front_state"] = $this->store_front_state;
              $this->home_base_state = "";  
              $this->nmgp_dados_form["home_base_state"] = $this->home_base_state;
              $this->record_created = "";  
              $this->record_created_hora = "" ;  
              $this->nmgp_dados_form["record_created"] = $this->record_created;
              $this->permanent_member_date = "";  
              $this->permanent_member_date_hora = "" ;  
              $this->nmgp_dados_form["permanent_member_date"] = $this->permanent_member_date;
              $this->acct_instagram = "";  
              $this->nmgp_dados_form["acct_instagram"] = $this->acct_instagram;
              $this->acct_facebook = "";  
              $this->nmgp_dados_form["acct_facebook"] = $this->acct_facebook;
              $this->website_url = "";  
              $this->nmgp_dados_form["website_url"] = $this->website_url;
              $this->bus_cat_id = "";  
              $this->nmgp_dados_form["bus_cat_id"] = $this->bus_cat_id;
              $this->bus_subcat_id = "";  
              $this->nmgp_dados_form["bus_subcat_id"] = $this->bus_subcat_id;
              $this->bus_subcat_other = "";  
              $this->nmgp_dados_form["bus_subcat_other"] = $this->bus_subcat_other;
              $this->appn_date =  date('Y') . "-" . date('m')  . "-" . date('d');
              $this->nmgp_dados_form["appn_date"] = $this->appn_date;
              $this->appn_note = "";  
              $this->nmgp_dados_form["appn_note"] = $this->appn_note;
              $this->doc_sec_of_state = "";  
              $this->doc_sec_of_state_ul_name = "" ;  
              $this->doc_sec_of_state_ul_type = "" ;  
              $this->nmgp_dados_form["doc_sec_of_state"] = $this->doc_sec_of_state;
              $this->doc_city_bus_lic = "";  
              $this->doc_city_bus_lic_ul_name = "" ;  
              $this->doc_city_bus_lic_ul_type = "" ;  
              $this->nmgp_dados_form["doc_city_bus_lic"] = $this->doc_city_bus_lic;
              $this->doc_agric_lic = "";  
              $this->doc_agric_lic_ul_name = "" ;  
              $this->doc_agric_lic_ul_type = "" ;  
              $this->nmgp_dados_form["doc_agric_lic"] = $this->doc_agric_lic;
              $this->doc_last_year_tax = "";  
              $this->doc_last_year_tax_ul_name = "" ;  
              $this->doc_last_year_tax_ul_type = "" ;  
              $this->nmgp_dados_form["doc_last_year_tax"] = $this->doc_last_year_tax;
              $this->qb_id = "";  
              $this->nmgp_dados_form["qb_id"] = $this->qb_id;
              $this->main_contact_name = "";  
              $this->nmgp_dados_form["main_contact_name"] = $this->main_contact_name;
              $this->main_contact_phone = "";  
              $this->nmgp_dados_form["main_contact_phone"] = $this->main_contact_phone;
              $this->main_contact_email = "";  
              $this->nmgp_dados_form["main_contact_email"] = $this->main_contact_email;
              $this->main_contact_title = "";  
              $this->nmgp_dados_form["main_contact_title"] = $this->main_contact_title;
              $this->main_contact_img_id = "";  
              $this->main_contact_img_id_ul_name = "" ;  
              $this->main_contact_img_id_ul_type = "" ;  
              $this->nmgp_dados_form["main_contact_img_id"] = $this->main_contact_img_id;
              $this->main_contact_img_file = "";  
              $this->nmgp_dados_form["main_contact_img_file"] = $this->main_contact_img_file;
              $this->main_contact_img_size = "";  
              $this->nmgp_dados_form["main_contact_img_size"] = $this->main_contact_img_size;
              $this->main_contact_img_id_prev = "";  
              $this->main_contact_img_id_prev_ul_name = "" ;  
              $this->main_contact_img_id_prev_ul_type = "" ;  
              $this->nmgp_dados_form["main_contact_img_id_prev"] = $this->main_contact_img_id_prev;
              $this->memb_qty = "";  
              $this->nmgp_dados_form["memb_qty"] = $this->memb_qty;
              $this->doc_type = "";  
              $this->nmgp_dados_form["doc_type"] = $this->doc_type;
              $this->doc_file = "";  
              $this->doc_file_ul_name = "" ;  
              $this->doc_file_ul_type = "" ;  
              $this->nmgp_dados_form["doc_file"] = $this->doc_file;
              $this->doc_filename = "";  
              $this->nmgp_dados_form["doc_filename"] = $this->doc_filename;
              $this->doc_filesize = "";  
              $this->nmgp_dados_form["doc_filesize"] = $this->doc_filesize;
              $this->applicant_name = "";  
              $this->nmgp_dados_form["applicant_name"] = $this->applicant_name;
              $this->applicant_signature = "";  
              $this->applicant_signature_ul_name = "" ;  
              $this->applicant_signature_ul_type = "" ;  
              $this->nmgp_dados_form["applicant_signature"] = $this->applicant_signature;
              $this->applicant_title = "";  
              $this->nmgp_dados_form["applicant_title"] = $this->applicant_title;
              $this->nmgp_dados_form["addtl_memb_mail"] = $this->addtl_memb_mail;
              $this->nmgp_dados_form["adtl_memb_name"] = $this->adtl_memb_name;
              $this->nmgp_dados_form["adtl_memb_note"] = $this->adtl_memb_note;
              $this->nmgp_dados_form["adtl_memb_phone"] = $this->adtl_memb_phone;
              $this->client_pmts = "";  
              $this->nmgp_dados_form["client_pmts"] = $this->client_pmts;
              $this->docs = "";  
              $this->nmgp_dados_form["docs"] = $this->docs;
              $this->nmgp_dados_form["dummy01"] = $this->dummy01;
              $this->nmgp_dados_form["dummy02"] = $this->dummy02;
              $this->nmgp_dados_form["dummy03"] = $this->dummy03;
              $this->nmgp_dados_form["dummy04"] = $this->dummy04;
              $this->nmgp_dados_form["dummy05"] = $this->dummy05;
              $this->nmgp_dados_form["dummy06"] = $this->dummy06;
              $this->nmgp_dados_form["dummy07"] = $this->dummy07;
              $this->nmgp_dados_form["dummy08"] = $this->dummy08;
              $this->nmgp_dados_form["dummy09"] = $this->dummy09;
              $this->dummy10 = "";  
              $this->nmgp_dados_form["dummy10"] = $this->dummy10;
              $this->nmgp_dados_form["dummy11"] = $this->dummy11;
              $this->nmgp_dados_form["dummy12"] = $this->dummy12;
              $this->nmgp_dados_form["dummy13"] = $this->dummy13;
              $this->nmgp_dados_form["est_memb_cost"] = $this->est_memb_cost;
              $this->main_contact_title_lbl = "";  
              $this->nmgp_dados_form["main_contact_title_lbl"] = $this->main_contact_title_lbl;
              $this->nmgp_dados_form["memb_01"] = $this->memb_01;
              $this->nmgp_dados_form["memb_02"] = $this->memb_02;
              $this->nmgp_dados_form["memb_03"] = $this->memb_03;
              $this->nmgp_dados_form["memb_04"] = $this->memb_04;
              $this->nmgp_dados_form["memb_05"] = $this->memb_05;
              $this->nmgp_dados_form["memb_06"] = $this->memb_06;
              $this->nmgp_dados_form["memb_07"] = $this->memb_07;
              $this->nmgp_dados_form["memb_08"] = $this->memb_08;
              $this->nmgp_dados_form["memb_09"] = $this->memb_09;
              $this->nmgp_dados_form["memb_10"] = $this->memb_10;
              $this->nmgp_dados_form["memb_11"] = $this->memb_11;
              $this->nmgp_dados_form["memb_12"] = $this->memb_12;
              $this->nmgp_dados_form["memb_13"] = $this->memb_13;
              $this->nmgp_dados_form["memb_email"] = $this->memb_email;
              $this->nmgp_dados_form["memb_levels"] = $this->memb_levels;
              $this->memb_list = "";  
              $this->nmgp_dados_form["memb_list"] = $this->memb_list;
              $this->nmgp_dados_form["memb_name"] = $this->memb_name;
              $this->nmgp_dados_form["memb_note"] = $this->memb_note;
              $this->nmgp_dados_form["memb_phone"] = $this->memb_phone;
              $this->notes = "";  
              $this->nmgp_dados_form["notes"] = $this->notes;
              $this->paid = "";  
              $this->nmgp_dados_form["paid"] = $this->paid;
              $this->pay = "";  
              $this->nmgp_dados_form["pay"] = $this->pay;
              $this->nmgp_dados_form["read_at_sign"] = $this->read_at_sign;
              $this->nmgp_dados_form["rules"] = $this->rules;
              $this->rules_warn = "";  
              $this->nmgp_dados_form["rules_warn"] = $this->rules_warn;
              $this->submitted = "";  
              $this->submitted_hora = "" ;  
              $this->nmgp_dados_form["submitted"] = $this->submitted;
              $this->transaction = "";  
              $this->nmgp_dados_form["transaction"] = $this->transaction;
              $this->xlsx_sample = "";  
              $this->nmgp_dados_form["xlsx_sample"] = $this->xlsx_sample;
              $this->js_prod_price = "";  
              $this->nmgp_dados_form["js_prod_price"] = $this->js_prod_price;
              $this->js_strp_price_id = "";  
              $this->nmgp_dados_form["js_strp_price_id"] = $this->js_strp_price_id;
              $this->js_mbr_ct = "";  
              $this->nmgp_dados_form["js_mbr_ct"] = $this->js_mbr_ct;
              $this->js_client_id = "";  
              $this->nmgp_dados_form["js_client_id"] = $this->js_client_id;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
      }  
//
//
//-- 
      if ($this->nmgp_opcao != "novo") 
      {
      }
      if (!isset($this->nmgp_refresh_fields)) 
      { 
          $this->nm_proc_onload();
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_members_staff']['embutida_parms'] = "SC_glo_par_gv_members_ct*scingv_members_ct*scoutgv_client_id*scin" . $this->nmgp_dados_form['client_id'] . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinS*scoutlink_remove_margin*scinok*scoutlink_remove_border*scinok*scoutlink_remove_background*scinok*scout";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_client_docs_2']['embutida_parms'] = "gv_client_id*scin" . $this->nmgp_dados_form['client_id'] . "*scoutNMSC_inicial*scininicio*scoutNMSC_rows*scin5*scoutNMSC_paginacao*scinPARCIAL*scoutNMSC_cab*scinN*scoutlink_remove_margin*scinok*scoutlink_remove_border*scinok*scoutlink_remove_background*scinok*scout";
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_client_pmts']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scoutlink_remove_margin*scinok*scoutlink_remove_border*scinok*scoutlink_remove_background*scinok*scout";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_client_notes']['embutida_parms'] = "gv_client_id*scin" . $this->nmgp_dados_form['client_id'] . "*scoutNMSC_inicial*scininicio*scoutNMSC_rows*scin5*scoutNMSC_paginacao*scinPARCIAL*scoutNMSC_cab*scinN*scoutlink_remove_margin*scinok*scoutlink_remove_border*scinok*scoutlink_remove_background*scinok*scout";
  }
// 
   function NM_gera_log_key($evt) 
   {
       $this->SC_log_arr = array();
       $this->SC_log_atv = true;
       if ($evt == "incluir")
       {
           $this->SC_log_evt = "insert";
       }
       if ($evt == "alterar")
       {
           $this->SC_log_evt = "update";
       }
       if ($evt == "excluir")
       {
           $this->SC_log_evt = "delete";
       }
       $this->SC_log_arr['keys']['client_id'] =  $this->client_id;
   }
// 
   function NM_gera_log_old() 
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dados_select']))
       {
           $nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dados_select'];
           $this->SC_log_arr['fields']['MembershipID']['0'] =  $nmgp_dados_select['membershipid'];
           $this->SC_log_arr['fields']['memb_status_id']['0'] =  $nmgp_dados_select['memb_status_id'];
           $this->SC_log_arr['fields']['appn_id']['0'] =  $nmgp_dados_select['appn_id'];
           $this->SC_log_arr['fields']['co_name']['0'] =  $nmgp_dados_select['co_name'];
           $this->SC_log_arr['fields']['ofa_contact']['0'] =  $nmgp_dados_select['ofa_contact'];
           $this->SC_log_arr['fields']['street_address']['0'] =  $nmgp_dados_select['street_address'];
           $this->SC_log_arr['fields']['mailing_address']['0'] =  $nmgp_dados_select['mailing_address'];
           $this->SC_log_arr['fields']['city']['0'] =  $nmgp_dados_select['city'];
           $this->SC_log_arr['fields']['state']['0'] =  $nmgp_dados_select['state'];
           $this->SC_log_arr['fields']['zip_code']['0'] =  $nmgp_dados_select['zip_code'];
           $this->SC_log_arr['fields']['phone_number']['0'] =  $nmgp_dados_select['phone_number'];
           $this->SC_log_arr['fields']['home_phone']['0'] =  $nmgp_dados_select['home_phone'];
           $this->SC_log_arr['fields']['fax_number']['0'] =  $nmgp_dados_select['fax_number'];
           $this->SC_log_arr['fields']['email']['0'] =  $nmgp_dados_select['email'];
           $this->SC_log_arr['fields']['business_type']['0'] =  $nmgp_dados_select['business_type'];
           $this->SC_log_arr['fields']['fresh_cut_allowed']['0'] =  $nmgp_dados_select['fresh_cut_allowed'];
           $this->SC_log_arr['fields']['business_license']['0'] =  $nmgp_dados_select['business_license'];
           $this->SC_log_arr['fields']['nursery_license']['0'] =  $nmgp_dados_select['nursery_license'];
           $this->SC_log_arr['fields']['federal_tax_id']['0'] =  $nmgp_dados_select['federal_tax_id'];
           $this->SC_log_arr['fields']['temporary_pass']['0'] =  $nmgp_dados_select['temporary_pass'];
           $this->SC_log_arr['fields']['ofa_member']['0'] =  $nmgp_dados_select['ofa_member'];
           $this->SC_log_arr['fields']['starting_date']['0'] =  $nmgp_dados_select['starting_date'];
           $this->SC_log_arr['fields']['renewal_date']['0'] =  $nmgp_dados_select['renewal_date'];
           $this->SC_log_arr['fields']['expiration_date']['0'] =  $nmgp_dados_select['expiration_date'];
           $this->SC_log_arr['fields']['canceled']['0'] =  $nmgp_dados_select['canceled'];
           $this->SC_log_arr['fields']['cancel_date']['0'] =  $nmgp_dados_select['cancel_date'];
           $this->SC_log_arr['fields']['canceled_by']['0'] =  $nmgp_dados_select['canceled_by'];
           $this->SC_log_arr['fields']['reason_canceled']['0'] =  $nmgp_dados_select['reason_canceled'];
           $this->SC_log_arr['fields']['retire_date']['0'] =  $nmgp_dados_select['retire_date'];
           $this->SC_log_arr['fields']['verified_receipts']['0'] =  $nmgp_dados_select['verified_receipts'];
           $this->SC_log_arr['fields']['date_last_updated']['0'] =  $nmgp_dados_select['date_last_updated'];
           $this->SC_log_arr['fields']['restricted']['0'] =  $nmgp_dados_select['restricted'];
           $this->SC_log_arr['fields']['committee_approval_required']['0'] =  $nmgp_dados_select['committee_approval_required'];
           $this->SC_log_arr['fields']['type_company']['0'] =  $nmgp_dados_select['type_company'];
           $this->SC_log_arr['fields']['archive']['0'] =  $nmgp_dados_select['archive'];
           $this->SC_log_arr['fields']['archive_date']['0'] =  $nmgp_dados_select['archive_date'];
           $this->SC_log_arr['fields']['pricing_level_id']['0'] =  $nmgp_dados_select['pricing_level_id'];
           $this->SC_log_arr['fields']['store_front_address']['0'] =  $nmgp_dados_select['store_front_address'];
           $this->SC_log_arr['fields']['store_front_city']['0'] =  $nmgp_dados_select['store_front_city'];
           $this->SC_log_arr['fields']['store_front_zip']['0'] =  $nmgp_dados_select['store_front_zip'];
           $this->SC_log_arr['fields']['home_base_address']['0'] =  $nmgp_dados_select['home_base_address'];
           $this->SC_log_arr['fields']['home_base_city']['0'] =  $nmgp_dados_select['home_base_city'];
           $this->SC_log_arr['fields']['home_base_zip']['0'] =  $nmgp_dados_select['home_base_zip'];
           $this->SC_log_arr['fields']['store_front_state']['0'] =  $nmgp_dados_select['store_front_state'];
           $this->SC_log_arr['fields']['home_base_state']['0'] =  $nmgp_dados_select['home_base_state'];
           $this->SC_log_arr['fields']['record_created']['0'] =  $nmgp_dados_select['record_created'];
           $this->SC_log_arr['fields']['permanent_member_date']['0'] =  $nmgp_dados_select['permanent_member_date'];
           $this->SC_log_arr['fields']['acct_instagram']['0'] =  $nmgp_dados_select['acct_instagram'];
           $this->SC_log_arr['fields']['acct_facebook']['0'] =  $nmgp_dados_select['acct_facebook'];
           $this->SC_log_arr['fields']['website_url']['0'] =  $nmgp_dados_select['website_url'];
           $this->SC_log_arr['fields']['bus_cat_id']['0'] =  $nmgp_dados_select['bus_cat_id'];
           $this->SC_log_arr['fields']['bus_subcat_id']['0'] =  $nmgp_dados_select['bus_subcat_id'];
           $this->SC_log_arr['fields']['bus_subcat_other']['0'] =  $nmgp_dados_select['bus_subcat_other'];
           $this->SC_log_arr['fields']['appn_date']['0'] =  $nmgp_dados_select['appn_date'];
           $this->SC_log_arr['fields']['appn_note']['0'] =  $nmgp_dados_select['appn_note'];
           $this->SC_log_arr['fields']['qb_id']['0'] =  $nmgp_dados_select['qb_id'];
           $this->SC_log_arr['fields']['main_contact_name']['0'] =  $nmgp_dados_select['main_contact_name'];
           $this->SC_log_arr['fields']['main_contact_phone']['0'] =  $nmgp_dados_select['main_contact_phone'];
           $this->SC_log_arr['fields']['main_contact_email']['0'] =  $nmgp_dados_select['main_contact_email'];
           $this->SC_log_arr['fields']['main_contact_title']['0'] =  $nmgp_dados_select['main_contact_title'];
           $this->SC_log_arr['fields']['main_contact_img_file']['0'] =  $nmgp_dados_select['main_contact_img_file'];
           $this->SC_log_arr['fields']['main_contact_img_size']['0'] =  $nmgp_dados_select['main_contact_img_size'];
           $this->SC_log_arr['fields']['memb_qty']['0'] =  $nmgp_dados_select['memb_qty'];
           $this->SC_log_arr['fields']['doc_type']['0'] =  $nmgp_dados_select['doc_type'];
           $this->SC_log_arr['fields']['doc_filename']['0'] =  $nmgp_dados_select['doc_filename'];
           $this->SC_log_arr['fields']['doc_filesize']['0'] =  $nmgp_dados_select['doc_filesize'];
           $this->SC_log_arr['fields']['applicant_name']['0'] =  $nmgp_dados_select['applicant_name'];
           $this->SC_log_arr['fields']['applicant_title']['0'] =  $nmgp_dados_select['applicant_title'];
           $this->SC_log_arr['fields']['client_pmts']['0'] =  $nmgp_dados_select['client_pmts'];
           $this->SC_log_arr['fields']['docs']['0'] =  $nmgp_dados_select['docs'];
           $this->SC_log_arr['fields']['memb_list']['0'] =  $nmgp_dados_select['memb_list'];
           $this->SC_log_arr['fields']['notes']['0'] =  $nmgp_dados_select['notes'];
       }
   }
// 
   function NM_gera_log_new() 
   {
       $this->SC_log_arr['fields']['MembershipID']['1'] =  $this->membershipid;
       $this->SC_log_arr['fields']['memb_status_id']['1'] =  $this->memb_status_id;
       $this->SC_log_arr['fields']['appn_id']['1'] =  $this->appn_id;
       $this->SC_log_arr['fields']['co_name']['1'] =  $this->co_name;
       $this->SC_log_arr['fields']['ofa_contact']['1'] =  $this->ofa_contact;
       $this->SC_log_arr['fields']['street_address']['1'] =  $this->street_address;
       $this->SC_log_arr['fields']['mailing_address']['1'] =  $this->mailing_address;
       $this->SC_log_arr['fields']['city']['1'] =  $this->city;
       $this->SC_log_arr['fields']['state']['1'] =  $this->state;
       $this->SC_log_arr['fields']['zip_code']['1'] =  $this->zip_code;
       $this->SC_log_arr['fields']['phone_number']['1'] =  $this->phone_number;
       $this->SC_log_arr['fields']['home_phone']['1'] =  $this->home_phone;
       $this->SC_log_arr['fields']['fax_number']['1'] =  $this->fax_number;
       $this->SC_log_arr['fields']['email']['1'] =  $this->email;
       $this->SC_log_arr['fields']['business_type']['1'] =  $this->business_type;
       $this->SC_log_arr['fields']['fresh_cut_allowed']['1'] =  $this->fresh_cut_allowed;
       $this->SC_log_arr['fields']['business_license']['1'] =  $this->business_license;
       $this->SC_log_arr['fields']['nursery_license']['1'] =  $this->nursery_license;
       $this->SC_log_arr['fields']['federal_tax_id']['1'] =  $this->federal_tax_id;
       $this->SC_log_arr['fields']['temporary_pass']['1'] =  $this->temporary_pass;
       $this->SC_log_arr['fields']['ofa_member']['1'] =  $this->ofa_member;
       $this->SC_log_arr['fields']['starting_date']['1'] =  $this->starting_date;
       $this->SC_log_arr['fields']['renewal_date']['1'] =  $this->renewal_date;
       $this->SC_log_arr['fields']['expiration_date']['1'] =  $this->expiration_date;
       $this->SC_log_arr['fields']['canceled']['1'] =  $this->canceled;
       $this->SC_log_arr['fields']['cancel_date']['1'] =  $this->cancel_date;
       $this->SC_log_arr['fields']['canceled_by']['1'] =  $this->canceled_by;
       $this->SC_log_arr['fields']['reason_canceled']['1'] =  $this->reason_canceled;
       $this->SC_log_arr['fields']['retire_date']['1'] =  $this->retire_date;
       $this->SC_log_arr['fields']['verified_receipts']['1'] =  $this->verified_receipts;
       $this->SC_log_arr['fields']['date_last_updated']['1'] =  $this->date_last_updated;
       $this->SC_log_arr['fields']['restricted']['1'] =  $this->restricted;
       $this->SC_log_arr['fields']['committee_approval_required']['1'] =  $this->committee_approval_required;
       $this->SC_log_arr['fields']['type_company']['1'] =  $this->type_company;
       $this->SC_log_arr['fields']['archive']['1'] =  $this->archive;
       $this->SC_log_arr['fields']['archive_date']['1'] =  $this->archive_date;
       $this->SC_log_arr['fields']['pricing_level_id']['1'] =  $this->pricing_level_id;
       $this->SC_log_arr['fields']['store_front_address']['1'] =  $this->store_front_address;
       $this->SC_log_arr['fields']['store_front_city']['1'] =  $this->store_front_city;
       $this->SC_log_arr['fields']['store_front_zip']['1'] =  $this->store_front_zip;
       $this->SC_log_arr['fields']['home_base_address']['1'] =  $this->home_base_address;
       $this->SC_log_arr['fields']['home_base_city']['1'] =  $this->home_base_city;
       $this->SC_log_arr['fields']['home_base_zip']['1'] =  $this->home_base_zip;
       $this->SC_log_arr['fields']['store_front_state']['1'] =  $this->store_front_state;
       $this->SC_log_arr['fields']['home_base_state']['1'] =  $this->home_base_state;
       $this->SC_log_arr['fields']['record_created']['1'] =  $this->record_created;
       $this->SC_log_arr['fields']['permanent_member_date']['1'] =  $this->permanent_member_date;
       $this->SC_log_arr['fields']['acct_instagram']['1'] =  $this->acct_instagram;
       $this->SC_log_arr['fields']['acct_facebook']['1'] =  $this->acct_facebook;
       $this->SC_log_arr['fields']['website_url']['1'] =  $this->website_url;
       $this->SC_log_arr['fields']['bus_cat_id']['1'] =  $this->bus_cat_id;
       $this->SC_log_arr['fields']['bus_subcat_id']['1'] =  $this->bus_subcat_id;
       $this->SC_log_arr['fields']['bus_subcat_other']['1'] =  $this->bus_subcat_other;
       $this->SC_log_arr['fields']['appn_date']['1'] =  $this->appn_date;
       $this->SC_log_arr['fields']['appn_note']['1'] =  $this->appn_note;
       $this->SC_log_arr['fields']['qb_id']['1'] =  $this->qb_id;
       $this->SC_log_arr['fields']['main_contact_name']['1'] =  $this->main_contact_name;
       $this->SC_log_arr['fields']['main_contact_phone']['1'] =  $this->main_contact_phone;
       $this->SC_log_arr['fields']['main_contact_email']['1'] =  $this->main_contact_email;
       $this->SC_log_arr['fields']['main_contact_title']['1'] =  $this->main_contact_title;
       $this->SC_log_arr['fields']['main_contact_img_file']['1'] =  $this->main_contact_img_file;
       $this->SC_log_arr['fields']['main_contact_img_size']['1'] =  $this->main_contact_img_size;
       $this->SC_log_arr['fields']['memb_qty']['1'] =  $this->memb_qty;
       $this->SC_log_arr['fields']['doc_type']['1'] =  $this->doc_type;
       $this->SC_log_arr['fields']['doc_filename']['1'] =  $this->doc_filename;
       $this->SC_log_arr['fields']['doc_filesize']['1'] =  $this->doc_filesize;
       $this->SC_log_arr['fields']['applicant_name']['1'] =  $this->applicant_name;
       $this->SC_log_arr['fields']['applicant_title']['1'] =  $this->applicant_title;
       $this->SC_log_arr['fields']['client_pmts']['1'] =  $this->client_pmts;
       $this->SC_log_arr['fields']['docs']['1'] =  $this->docs;
       $this->SC_log_arr['fields']['memb_list']['1'] =  $this->memb_list;
       $this->SC_log_arr['fields']['notes']['1'] =  $this->notes;
   }
// 
   function NM_gera_log_compress() 
   {
       foreach ($this->SC_log_arr['fields'] as $fild => $data_f)
       {
           if ($data_f[0] == $data_f[1] || ($data_f[0] == "" && $data_f[1] == "null"))
           {
               unset($this->SC_log_arr['fields'][$fild]);
           }
       }
   }
// 
   function NM_gera_log_output() 
   {
       $Log_output = "";
       $prim_delim = "";
       $Log_labels = array();
       $Log_labels['MembershipID'] =  "Membership No.";
       $Log_labels['memb_status_id'] =  "Membership Status";
       $Log_labels['appn_id'] =  "Appn Id";
       $Log_labels['co_name'] =  "Company Name";
       $Log_labels['ofa_contact'] =  "Ofa Contact";
       $Log_labels['street_address'] =  "Street Address";
       $Log_labels['mailing_address'] =  "Mailing Address";
       $Log_labels['city'] =  "City";
       $Log_labels['state'] =  "State";
       $Log_labels['zip_code'] =  "Zip Code";
       $Log_labels['phone_number'] =  "Phone Number";
       $Log_labels['home_phone'] =  "Home Phone";
       $Log_labels['fax_number'] =  "Fax Number";
       $Log_labels['email'] =  "Email";
       $Log_labels['business_type'] =  "Business Type";
       $Log_labels['fresh_cut_allowed'] =  "Fresh Cut Allowed";
       $Log_labels['business_license'] =  "Business License";
       $Log_labels['nursery_license'] =  "Nursery License";
       $Log_labels['federal_tax_id'] =  "Federal Tax Id";
       $Log_labels['temporary_pass'] =  "Temporary Pass";
       $Log_labels['ofa_member'] =  "Ofa Member";
       $Log_labels['starting_date'] =  "Starting Date";
       $Log_labels['renewal_date'] =  "Renewal Date";
       $Log_labels['expiration_date'] =  "Expiration Date";
       $Log_labels['canceled'] =  "Canceled";
       $Log_labels['cancel_date'] =  "Cancel Date";
       $Log_labels['canceled_by'] =  "Canceled By";
       $Log_labels['reason_canceled'] =  "Reason Canceled";
       $Log_labels['retire_date'] =  "Retire Date";
       $Log_labels['verified_receipts'] =  "Verified Receipts";
       $Log_labels['date_last_updated'] =  "Date Last Updated";
       $Log_labels['restricted'] =  "Restricted";
       $Log_labels['committee_approval_required'] =  "Committee Approval Required";
       $Log_labels['type_company'] =  "Company Type (Dep)";
       $Log_labels['archive'] =  "";
       $Log_labels['archive_date'] =  "Archive Date";
       $Log_labels['pricing_level_id'] =  "Membership Level";
       $Log_labels['store_front_address'] =  "Store Front Address";
       $Log_labels['store_front_city'] =  "Store Front City";
       $Log_labels['store_front_zip'] =  "Store Front Zip";
       $Log_labels['home_base_address'] =  "Home Base Address";
       $Log_labels['home_base_city'] =  "Home Base City";
       $Log_labels['home_base_zip'] =  "Home Base Zip";
       $Log_labels['store_front_state'] =  "Store Front State";
       $Log_labels['home_base_state'] =  "Home Base State";
       $Log_labels['record_created'] =  "Record Created";
       $Log_labels['permanent_member_date'] =  "Member since";
       $Log_labels['acct_instagram'] =  "Instagram";
       $Log_labels['acct_facebook'] =  "Facebook";
       $Log_labels['website_url'] =  "Company Website";
       $Log_labels['bus_cat_id'] =  "Business Category";
       $Log_labels['bus_subcat_id'] =  "Subcategory";
       $Log_labels['bus_subcat_other'] =  "If Other";
       $Log_labels['appn_date'] =  "Application Date";
       $Log_labels['appn_note'] =  "Appn Note";
       $Log_labels['qb_id'] =  "Qb Id";
       $Log_labels['main_contact_name'] =  "Contact Name";
       $Log_labels['main_contact_phone'] =  "Contact Phone";
       $Log_labels['main_contact_email'] =  "Contact Email";
       $Log_labels['main_contact_title'] =  "Contact Title";
       $Log_labels['main_contact_img_file'] =  "Main Contact Img File";
       $Log_labels['main_contact_img_size'] =  "Main Contact Img Size";
       $Log_labels['memb_qty'] =  "Memb Qty";
       $Log_labels['doc_type'] =  "Choose ONE Document from the options below to Upload:";
       $Log_labels['doc_filename'] =  "Doc Filename";
       $Log_labels['doc_filesize'] =  "Doc Filesize";
       $Log_labels['applicant_name'] =  "Applicant Name";
       $Log_labels['applicant_title'] =  "Applicant Title";
       $Log_labels['client_pmts'] =  "Payments";
       $Log_labels['docs'] =  "Docs";
       $Log_labels['memb_list'] =  "Buyers";
       $Log_labels['notes'] =  "Notes";
       foreach ($this->SC_log_arr as $type => $dats)
       {
           if ($type == "keys")
           {
               $Log_output .= "--> keys <-- ";
               foreach ($dats as $key => $data)
               {
                   $Log_output .=  $prim_delim . $key . " : " . $data;
                   $prim_delim  = "||";
               }
           }
           if ($type == "fields")
           {
               $Log_output .= $prim_delim . "--> fields <-- ";
               $prim_delim = "";
               if (empty($dats) && $this->SC_log_evt == "update")
               {
                   return;
               }
               foreach ($dats as $key => $data)
               {
                   foreach ($data as $tp => $val)
                   {
                      $tpok = ($tp == 0) ? " (old) " : " (new) ";
                      $Log_output .= $prim_delim . $key . $tpok . " : " . $val;
                      $prim_delim  = "||";
                   }
                   $Log_output .= $prim_delim . $key . " (label) " . " : " . $Log_labels[$key];
               }
           }
       }
       $this->NM_gera_log_insert("Scriptcase", $this->SC_log_evt, $Log_output);
   }
        function initializeRecordState() {
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

// 
 function gera_icone($doc) 
 {
    $cam_icone = "";
    $path =  $this->Ini->root . $this->Ini->path_icones . "/";
    if (is_dir($path))
    {
        $nm_icones = nm_list_icon($path); 
        $nm_tipo = strtolower(substr($doc, strrpos($doc, ".") + 1));
        $nm_tipo = str_replace(array('docx', 'xlsx'), array('doc', 'xls'), $nm_tipo);
        if (isset($nm_icones[$nm_tipo]) && !empty($nm_icones[$nm_tipo]))
        {
            $cam_icone = $this->Ini->path_icones . "/" . $nm_icones[$nm_tipo];
        }
        else
        {
            $cam_icone = $this->Ini->path_icones . "/" . $nm_icones["default"];
        }
    }
    return $cam_icone;
 } 
//
function cancelDelete() {
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'on';
  

$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'off';
}
function bus_cat_id_onChange()
{
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'on';
if (!isset($this->sc_temp_gv_bus_cat)) {$this->sc_temp_gv_bus_cat = (isset($_SESSION['gv_bus_cat'])) ? $_SESSION['gv_bus_cat'] : "";}
  
$original_bus_cat_id = $this->bus_cat_id;
$original_client_id = $this->client_id;
$original_bus_subcat_id = $this->bus_subcat_id;
$original_js_prod_price = $this->js_prod_price;
$original_js_strp_price_id = $this->js_strp_price_id;
$original_js_mbr_ct = $this->js_mbr_ct;
$original_js_client_id = $this->js_client_id;

$this->members_ct();
$this->sc_temp_gv_bus_cat = $this->bus_cat_id ;



$this->stripe_frm_upd();





if (isset($this->sc_temp_gv_bus_cat)) { $_SESSION['gv_bus_cat'] = $this->sc_temp_gv_bus_cat;}
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'off';
$modificado_bus_cat_id = $this->bus_cat_id;
$modificado_client_id = $this->client_id;
$modificado_bus_subcat_id = $this->bus_subcat_id;
$modificado_js_prod_price = $this->js_prod_price;
$modificado_js_strp_price_id = $this->js_strp_price_id;
$modificado_js_mbr_ct = $this->js_mbr_ct;
$modificado_js_client_id = $this->js_client_id;
$this->nm_formatar_campos('bus_cat_id', 'client_id', 'bus_subcat_id', 'js_prod_price', 'js_strp_price_id', 'js_mbr_ct', 'js_client_id');
if ($original_bus_cat_id !== $modificado_bus_cat_id || isset($this->nmgp_cmp_readonly['bus_cat_id']) || (isset($bFlagRead_bus_cat_id) && $bFlagRead_bus_cat_id))
{
    $this->ajax_return_values_bus_cat_id(true);
}
if ($original_client_id !== $modificado_client_id || isset($this->nmgp_cmp_readonly['client_id']) || (isset($bFlagRead_client_id) && $bFlagRead_client_id))
{
    $this->ajax_return_values_client_id(true);
}
if ($original_bus_subcat_id !== $modificado_bus_subcat_id || isset($this->nmgp_cmp_readonly['bus_subcat_id']) || (isset($bFlagRead_bus_subcat_id) && $bFlagRead_bus_subcat_id))
{
    $this->ajax_return_values_bus_subcat_id(true);
}
if ($original_js_prod_price !== $modificado_js_prod_price || isset($this->nmgp_cmp_readonly['js_prod_price']) || (isset($bFlagRead_js_prod_price) && $bFlagRead_js_prod_price))
{
    $this->ajax_return_values_js_prod_price(true);
}
if ($original_js_strp_price_id !== $modificado_js_strp_price_id || isset($this->nmgp_cmp_readonly['js_strp_price_id']) || (isset($bFlagRead_js_strp_price_id) && $bFlagRead_js_strp_price_id))
{
    $this->ajax_return_values_js_strp_price_id(true);
}
if ($original_js_mbr_ct !== $modificado_js_mbr_ct || isset($this->nmgp_cmp_readonly['js_mbr_ct']) || (isset($bFlagRead_js_mbr_ct) && $bFlagRead_js_mbr_ct))
{
    $this->ajax_return_values_js_mbr_ct(true);
}
if ($original_js_client_id !== $modificado_js_client_id || isset($this->nmgp_cmp_readonly['js_client_id']) || (isset($bFlagRead_js_client_id) && $bFlagRead_js_client_id))
{
    $this->ajax_return_values_js_client_id(true);
}
$this->NM_ajax_info['event_field'] = 'bus';
form_clients_staff_pack_ajax_response();
exit;
}
function bus_subcat_id_onChange()
{
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'on';
  
$original_client_id = $this->client_id;
$original_bus_cat_id = $this->bus_cat_id;
$original_bus_subcat_id = $this->bus_subcat_id;
$original_js_prod_price = $this->js_prod_price;
$original_js_strp_price_id = $this->js_strp_price_id;
$original_js_mbr_ct = $this->js_mbr_ct;
$original_js_client_id = $this->js_client_id;
$original_bus_subcat_other = $this->bus_subcat_other;

$this->other_bus_subcat();
$this->members_ct();


$modificado_client_id = $this->client_id;
$modificado_bus_cat_id = $this->bus_cat_id;
$modificado_bus_subcat_id = $this->bus_subcat_id;
$modificado_js_prod_price = $this->js_prod_price;
$modificado_js_strp_price_id = $this->js_strp_price_id;
$modificado_js_mbr_ct = $this->js_mbr_ct;
$modificado_js_client_id = $this->js_client_id;
$modificado_bus_subcat_other = $this->bus_subcat_other;
$this->nm_formatar_campos('client_id', 'bus_cat_id', 'bus_subcat_id', 'js_prod_price', 'js_strp_price_id', 'js_mbr_ct', 'js_client_id', 'bus_subcat_other');
if ($original_client_id !== $modificado_client_id || isset($this->nmgp_cmp_readonly['client_id']) || (isset($bFlagRead_client_id) && $bFlagRead_client_id))
{
    $this->ajax_return_values_client_id(true);
}
if ($original_bus_cat_id !== $modificado_bus_cat_id || isset($this->nmgp_cmp_readonly['bus_cat_id']) || (isset($bFlagRead_bus_cat_id) && $bFlagRead_bus_cat_id))
{
    $this->ajax_return_values_bus_cat_id(true);
}
if ($original_bus_subcat_id !== $modificado_bus_subcat_id || isset($this->nmgp_cmp_readonly['bus_subcat_id']) || (isset($bFlagRead_bus_subcat_id) && $bFlagRead_bus_subcat_id))
{
    $this->ajax_return_values_bus_subcat_id(true);
}
if ($original_js_prod_price !== $modificado_js_prod_price || isset($this->nmgp_cmp_readonly['js_prod_price']) || (isset($bFlagRead_js_prod_price) && $bFlagRead_js_prod_price))
{
    $this->ajax_return_values_js_prod_price(true);
}
if ($original_js_strp_price_id !== $modificado_js_strp_price_id || isset($this->nmgp_cmp_readonly['js_strp_price_id']) || (isset($bFlagRead_js_strp_price_id) && $bFlagRead_js_strp_price_id))
{
    $this->ajax_return_values_js_strp_price_id(true);
}
if ($original_js_mbr_ct !== $modificado_js_mbr_ct || isset($this->nmgp_cmp_readonly['js_mbr_ct']) || (isset($bFlagRead_js_mbr_ct) && $bFlagRead_js_mbr_ct))
{
    $this->ajax_return_values_js_mbr_ct(true);
}
if ($original_js_client_id !== $modificado_js_client_id || isset($this->nmgp_cmp_readonly['js_client_id']) || (isset($bFlagRead_js_client_id) && $bFlagRead_js_client_id))
{
    $this->ajax_return_values_js_client_id(true);
}
if ($original_bus_subcat_other !== $modificado_bus_subcat_other || isset($this->nmgp_cmp_readonly['bus_subcat_other']) || (isset($bFlagRead_bus_subcat_other) && $bFlagRead_bus_subcat_other))
{
    $this->ajax_return_values_bus_subcat_other(true);
}
$this->NM_ajax_info['event_field'] = 'bus';
form_clients_staff_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'off';
}
function main_contact_email_onChange()
{
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'on';
  
$original_client_id = $this->client_id;
$original_main_contact_email = $this->main_contact_email;
$original_bus_cat_id = $this->bus_cat_id;
$original_bus_subcat_id = $this->bus_subcat_id;
$original_js_prod_price = $this->js_prod_price;
$original_js_strp_price_id = $this->js_strp_price_id;
$original_js_mbr_ct = $this->js_mbr_ct;
$original_js_client_id = $this->js_client_id;

$memb_ct = 0;
$sql = "SELECT COUNT(member_id) FROM members WHERE client_id = $this->client_id ";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 

if ( isset($this->ds[0][0]) ) {
	$memb_ct = 	$this->ds[0][0];
}

if ( $memb_ct == 1 ) {
	$sql = "UPDATE members SET email = '$this->main_contact_email' WHERE client_id = $this->client_id ";
	
     $nm_select = $sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_clients_staff_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      
	$this->members_ct();
	$this->sc_ajax_javascript('refresh_member_list');
}




$modificado_client_id = $this->client_id;
$modificado_main_contact_email = $this->main_contact_email;
$modificado_bus_cat_id = $this->bus_cat_id;
$modificado_bus_subcat_id = $this->bus_subcat_id;
$modificado_js_prod_price = $this->js_prod_price;
$modificado_js_strp_price_id = $this->js_strp_price_id;
$modificado_js_mbr_ct = $this->js_mbr_ct;
$modificado_js_client_id = $this->js_client_id;
$this->nm_formatar_campos('client_id', 'main_contact_email', 'bus_cat_id', 'bus_subcat_id', 'js_prod_price', 'js_strp_price_id', 'js_mbr_ct', 'js_client_id');
if ($original_client_id !== $modificado_client_id || isset($this->nmgp_cmp_readonly['client_id']) || (isset($bFlagRead_client_id) && $bFlagRead_client_id))
{
    $this->ajax_return_values_client_id(true);
}
if ($original_main_contact_email !== $modificado_main_contact_email || isset($this->nmgp_cmp_readonly['main_contact_email']) || (isset($bFlagRead_main_contact_email) && $bFlagRead_main_contact_email))
{
    $this->ajax_return_values_main_contact_email(true);
}
if ($original_bus_cat_id !== $modificado_bus_cat_id || isset($this->nmgp_cmp_readonly['bus_cat_id']) || (isset($bFlagRead_bus_cat_id) && $bFlagRead_bus_cat_id))
{
    $this->ajax_return_values_bus_cat_id(true);
}
if ($original_bus_subcat_id !== $modificado_bus_subcat_id || isset($this->nmgp_cmp_readonly['bus_subcat_id']) || (isset($bFlagRead_bus_subcat_id) && $bFlagRead_bus_subcat_id))
{
    $this->ajax_return_values_bus_subcat_id(true);
}
if ($original_js_prod_price !== $modificado_js_prod_price || isset($this->nmgp_cmp_readonly['js_prod_price']) || (isset($bFlagRead_js_prod_price) && $bFlagRead_js_prod_price))
{
    $this->ajax_return_values_js_prod_price(true);
}
if ($original_js_strp_price_id !== $modificado_js_strp_price_id || isset($this->nmgp_cmp_readonly['js_strp_price_id']) || (isset($bFlagRead_js_strp_price_id) && $bFlagRead_js_strp_price_id))
{
    $this->ajax_return_values_js_strp_price_id(true);
}
if ($original_js_mbr_ct !== $modificado_js_mbr_ct || isset($this->nmgp_cmp_readonly['js_mbr_ct']) || (isset($bFlagRead_js_mbr_ct) && $bFlagRead_js_mbr_ct))
{
    $this->ajax_return_values_js_mbr_ct(true);
}
if ($original_js_client_id !== $modificado_js_client_id || isset($this->nmgp_cmp_readonly['js_client_id']) || (isset($bFlagRead_js_client_id) && $bFlagRead_js_client_id))
{
    $this->ajax_return_values_js_client_id(true);
}
$this->NM_ajax_info['event_field'] = 'main';
form_clients_staff_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'off';
}
function main_contact_name_onChange()
{
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'on';
  
$original_client_id = $this->client_id;
$original_main_contact_name = $this->main_contact_name;
$original_bus_cat_id = $this->bus_cat_id;
$original_bus_subcat_id = $this->bus_subcat_id;
$original_js_prod_price = $this->js_prod_price;
$original_js_strp_price_id = $this->js_strp_price_id;
$original_js_mbr_ct = $this->js_mbr_ct;
$original_js_client_id = $this->js_client_id;

$memb_ct = 0;
$sql = "SELECT COUNT(member_id) FROM members WHERE client_id = $this->client_id ";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 

if ( isset($this->ds[0][0]) ) {
	$memb_ct = 	$this->ds[0][0];
}

if ( $memb_ct == 1 ) {
	$sql = "UPDATE members SET member_name = '$this->main_contact_name', main_contact = 1 WHERE client_id = $this->client_id ";
	
     $nm_select = $sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_clients_staff_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      
	$this->members_ct();
	$this->sc_ajax_javascript('refresh_member_list');
}

if ( empty($this->applicant_name ) ) {
	$this->applicant_name  = $this->main_contact_name ;
}






$modificado_client_id = $this->client_id;
$modificado_main_contact_name = $this->main_contact_name;
$modificado_bus_cat_id = $this->bus_cat_id;
$modificado_bus_subcat_id = $this->bus_subcat_id;
$modificado_js_prod_price = $this->js_prod_price;
$modificado_js_strp_price_id = $this->js_strp_price_id;
$modificado_js_mbr_ct = $this->js_mbr_ct;
$modificado_js_client_id = $this->js_client_id;
$this->nm_formatar_campos('client_id', 'main_contact_name', 'bus_cat_id', 'bus_subcat_id', 'js_prod_price', 'js_strp_price_id', 'js_mbr_ct', 'js_client_id');
if ($original_client_id !== $modificado_client_id || isset($this->nmgp_cmp_readonly['client_id']) || (isset($bFlagRead_client_id) && $bFlagRead_client_id))
{
    $this->ajax_return_values_client_id(true);
}
if ($original_main_contact_name !== $modificado_main_contact_name || isset($this->nmgp_cmp_readonly['main_contact_name']) || (isset($bFlagRead_main_contact_name) && $bFlagRead_main_contact_name))
{
    $this->ajax_return_values_main_contact_name(true);
}
if ($original_bus_cat_id !== $modificado_bus_cat_id || isset($this->nmgp_cmp_readonly['bus_cat_id']) || (isset($bFlagRead_bus_cat_id) && $bFlagRead_bus_cat_id))
{
    $this->ajax_return_values_bus_cat_id(true);
}
if ($original_bus_subcat_id !== $modificado_bus_subcat_id || isset($this->nmgp_cmp_readonly['bus_subcat_id']) || (isset($bFlagRead_bus_subcat_id) && $bFlagRead_bus_subcat_id))
{
    $this->ajax_return_values_bus_subcat_id(true);
}
if ($original_js_prod_price !== $modificado_js_prod_price || isset($this->nmgp_cmp_readonly['js_prod_price']) || (isset($bFlagRead_js_prod_price) && $bFlagRead_js_prod_price))
{
    $this->ajax_return_values_js_prod_price(true);
}
if ($original_js_strp_price_id !== $modificado_js_strp_price_id || isset($this->nmgp_cmp_readonly['js_strp_price_id']) || (isset($bFlagRead_js_strp_price_id) && $bFlagRead_js_strp_price_id))
{
    $this->ajax_return_values_js_strp_price_id(true);
}
if ($original_js_mbr_ct !== $modificado_js_mbr_ct || isset($this->nmgp_cmp_readonly['js_mbr_ct']) || (isset($bFlagRead_js_mbr_ct) && $bFlagRead_js_mbr_ct))
{
    $this->ajax_return_values_js_mbr_ct(true);
}
if ($original_js_client_id !== $modificado_js_client_id || isset($this->nmgp_cmp_readonly['js_client_id']) || (isset($bFlagRead_js_client_id) && $bFlagRead_js_client_id))
{
    $this->ajax_return_values_js_client_id(true);
}
$this->NM_ajax_info['event_field'] = 'main';
form_clients_staff_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'off';
}
function main_contact_phone_onChange()
{
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'on';
  
$original_client_id = $this->client_id;
$original_main_contact_phone = $this->main_contact_phone;
$original_bus_cat_id = $this->bus_cat_id;
$original_bus_subcat_id = $this->bus_subcat_id;
$original_js_prod_price = $this->js_prod_price;
$original_js_strp_price_id = $this->js_strp_price_id;
$original_js_mbr_ct = $this->js_mbr_ct;
$original_js_client_id = $this->js_client_id;

$memb_ct = 0;
$sql = "SELECT COUNT(member_id) FROM members WHERE client_id = $this->client_id ";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 

if ( isset($this->ds[0][0]) ) {
	$memb_ct = 	$this->ds[0][0];
}

if ( $memb_ct == 1 ) {
	$sql = "UPDATE members SET phone1 = '$this->main_contact_phone' WHERE client_id = $this->client_id ";
	
     $nm_select = $sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_clients_staff_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      
	$this->members_ct();
	$this->sc_ajax_javascript('refresh_member_list');
}



$modificado_client_id = $this->client_id;
$modificado_main_contact_phone = $this->main_contact_phone;
$modificado_bus_cat_id = $this->bus_cat_id;
$modificado_bus_subcat_id = $this->bus_subcat_id;
$modificado_js_prod_price = $this->js_prod_price;
$modificado_js_strp_price_id = $this->js_strp_price_id;
$modificado_js_mbr_ct = $this->js_mbr_ct;
$modificado_js_client_id = $this->js_client_id;
$this->nm_formatar_campos('client_id', 'main_contact_phone', 'bus_cat_id', 'bus_subcat_id', 'js_prod_price', 'js_strp_price_id', 'js_mbr_ct', 'js_client_id');
if ($original_client_id !== $modificado_client_id || isset($this->nmgp_cmp_readonly['client_id']) || (isset($bFlagRead_client_id) && $bFlagRead_client_id))
{
    $this->ajax_return_values_client_id(true);
}
if ($original_main_contact_phone !== $modificado_main_contact_phone || isset($this->nmgp_cmp_readonly['main_contact_phone']) || (isset($bFlagRead_main_contact_phone) && $bFlagRead_main_contact_phone))
{
    $this->ajax_return_values_main_contact_phone(true);
}
if ($original_bus_cat_id !== $modificado_bus_cat_id || isset($this->nmgp_cmp_readonly['bus_cat_id']) || (isset($bFlagRead_bus_cat_id) && $bFlagRead_bus_cat_id))
{
    $this->ajax_return_values_bus_cat_id(true);
}
if ($original_bus_subcat_id !== $modificado_bus_subcat_id || isset($this->nmgp_cmp_readonly['bus_subcat_id']) || (isset($bFlagRead_bus_subcat_id) && $bFlagRead_bus_subcat_id))
{
    $this->ajax_return_values_bus_subcat_id(true);
}
if ($original_js_prod_price !== $modificado_js_prod_price || isset($this->nmgp_cmp_readonly['js_prod_price']) || (isset($bFlagRead_js_prod_price) && $bFlagRead_js_prod_price))
{
    $this->ajax_return_values_js_prod_price(true);
}
if ($original_js_strp_price_id !== $modificado_js_strp_price_id || isset($this->nmgp_cmp_readonly['js_strp_price_id']) || (isset($bFlagRead_js_strp_price_id) && $bFlagRead_js_strp_price_id))
{
    $this->ajax_return_values_js_strp_price_id(true);
}
if ($original_js_mbr_ct !== $modificado_js_mbr_ct || isset($this->nmgp_cmp_readonly['js_mbr_ct']) || (isset($bFlagRead_js_mbr_ct) && $bFlagRead_js_mbr_ct))
{
    $this->ajax_return_values_js_mbr_ct(true);
}
if ($original_js_client_id !== $modificado_js_client_id || isset($this->nmgp_cmp_readonly['js_client_id']) || (isset($bFlagRead_js_client_id) && $bFlagRead_js_client_id))
{
    $this->ajax_return_values_js_client_id(true);
}
$this->NM_ajax_info['event_field'] = 'main';
form_clients_staff_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'off';
}
function main_contact_title_onChange()
{
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'on';
  
$original_main_contact_title = $this->main_contact_title;
$original_client_id = $this->client_id;
$original_bus_cat_id = $this->bus_cat_id;
$original_bus_subcat_id = $this->bus_subcat_id;
$original_js_prod_price = $this->js_prod_price;
$original_js_strp_price_id = $this->js_strp_price_id;
$original_js_mbr_ct = $this->js_mbr_ct;
$original_js_client_id = $this->js_client_id;

if ( empty($this->applicant_title ) ) {
	$this->applicant_title  = $this->main_contact_title ;
}
$this->members_ct();

$modificado_main_contact_title = $this->main_contact_title;
$modificado_client_id = $this->client_id;
$modificado_bus_cat_id = $this->bus_cat_id;
$modificado_bus_subcat_id = $this->bus_subcat_id;
$modificado_js_prod_price = $this->js_prod_price;
$modificado_js_strp_price_id = $this->js_strp_price_id;
$modificado_js_mbr_ct = $this->js_mbr_ct;
$modificado_js_client_id = $this->js_client_id;
$this->nm_formatar_campos('main_contact_title', 'client_id', 'bus_cat_id', 'bus_subcat_id', 'js_prod_price', 'js_strp_price_id', 'js_mbr_ct', 'js_client_id');
if ($original_main_contact_title !== $modificado_main_contact_title || isset($this->nmgp_cmp_readonly['main_contact_title']) || (isset($bFlagRead_main_contact_title) && $bFlagRead_main_contact_title))
{
    $this->ajax_return_values_main_contact_title(true);
}
if ($original_client_id !== $modificado_client_id || isset($this->nmgp_cmp_readonly['client_id']) || (isset($bFlagRead_client_id) && $bFlagRead_client_id))
{
    $this->ajax_return_values_client_id(true);
}
if ($original_bus_cat_id !== $modificado_bus_cat_id || isset($this->nmgp_cmp_readonly['bus_cat_id']) || (isset($bFlagRead_bus_cat_id) && $bFlagRead_bus_cat_id))
{
    $this->ajax_return_values_bus_cat_id(true);
}
if ($original_bus_subcat_id !== $modificado_bus_subcat_id || isset($this->nmgp_cmp_readonly['bus_subcat_id']) || (isset($bFlagRead_bus_subcat_id) && $bFlagRead_bus_subcat_id))
{
    $this->ajax_return_values_bus_subcat_id(true);
}
if ($original_js_prod_price !== $modificado_js_prod_price || isset($this->nmgp_cmp_readonly['js_prod_price']) || (isset($bFlagRead_js_prod_price) && $bFlagRead_js_prod_price))
{
    $this->ajax_return_values_js_prod_price(true);
}
if ($original_js_strp_price_id !== $modificado_js_strp_price_id || isset($this->nmgp_cmp_readonly['js_strp_price_id']) || (isset($bFlagRead_js_strp_price_id) && $bFlagRead_js_strp_price_id))
{
    $this->ajax_return_values_js_strp_price_id(true);
}
if ($original_js_mbr_ct !== $modificado_js_mbr_ct || isset($this->nmgp_cmp_readonly['js_mbr_ct']) || (isset($bFlagRead_js_mbr_ct) && $bFlagRead_js_mbr_ct))
{
    $this->ajax_return_values_js_mbr_ct(true);
}
if ($original_js_client_id !== $modificado_js_client_id || isset($this->nmgp_cmp_readonly['js_client_id']) || (isset($bFlagRead_js_client_id) && $bFlagRead_js_client_id))
{
    $this->ajax_return_values_js_client_id(true);
}
$this->NM_ajax_info['event_field'] = 'main';
form_clients_staff_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'off';
}
function memb_qty_onChange()
{
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'on';
  
$original_client_id = $this->client_id;
$original_bus_cat_id = $this->bus_cat_id;
$original_bus_subcat_id = $this->bus_subcat_id;
$original_js_prod_price = $this->js_prod_price;
$original_js_strp_price_id = $this->js_strp_price_id;
$original_js_mbr_ct = $this->js_mbr_ct;
$original_js_client_id = $this->js_client_id;

$this->members_ct();
$this->stripe_frm_upd();



$modificado_client_id = $this->client_id;
$modificado_bus_cat_id = $this->bus_cat_id;
$modificado_bus_subcat_id = $this->bus_subcat_id;
$modificado_js_prod_price = $this->js_prod_price;
$modificado_js_strp_price_id = $this->js_strp_price_id;
$modificado_js_mbr_ct = $this->js_mbr_ct;
$modificado_js_client_id = $this->js_client_id;
$this->nm_formatar_campos('client_id', 'bus_cat_id', 'bus_subcat_id', 'js_prod_price', 'js_strp_price_id', 'js_mbr_ct', 'js_client_id');
if ($original_client_id !== $modificado_client_id || isset($this->nmgp_cmp_readonly['client_id']) || (isset($bFlagRead_client_id) && $bFlagRead_client_id))
{
    $this->ajax_return_values_client_id(true);
}
if ($original_bus_cat_id !== $modificado_bus_cat_id || isset($this->nmgp_cmp_readonly['bus_cat_id']) || (isset($bFlagRead_bus_cat_id) && $bFlagRead_bus_cat_id))
{
    $this->ajax_return_values_bus_cat_id(true);
}
if ($original_bus_subcat_id !== $modificado_bus_subcat_id || isset($this->nmgp_cmp_readonly['bus_subcat_id']) || (isset($bFlagRead_bus_subcat_id) && $bFlagRead_bus_subcat_id))
{
    $this->ajax_return_values_bus_subcat_id(true);
}
if ($original_js_prod_price !== $modificado_js_prod_price || isset($this->nmgp_cmp_readonly['js_prod_price']) || (isset($bFlagRead_js_prod_price) && $bFlagRead_js_prod_price))
{
    $this->ajax_return_values_js_prod_price(true);
}
if ($original_js_strp_price_id !== $modificado_js_strp_price_id || isset($this->nmgp_cmp_readonly['js_strp_price_id']) || (isset($bFlagRead_js_strp_price_id) && $bFlagRead_js_strp_price_id))
{
    $this->ajax_return_values_js_strp_price_id(true);
}
if ($original_js_mbr_ct !== $modificado_js_mbr_ct || isset($this->nmgp_cmp_readonly['js_mbr_ct']) || (isset($bFlagRead_js_mbr_ct) && $bFlagRead_js_mbr_ct))
{
    $this->ajax_return_values_js_mbr_ct(true);
}
if ($original_js_client_id !== $modificado_js_client_id || isset($this->nmgp_cmp_readonly['js_client_id']) || (isset($bFlagRead_js_client_id) && $bFlagRead_js_client_id))
{
    $this->ajax_return_values_js_client_id(true);
}
$this->NM_ajax_info['event_field'] = 'memb';
form_clients_staff_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'off';
}
function memb_status_id_onChange()
{
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'on';
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
  
$original_memb_status_id = $this->memb_status_id;
$original_client_id = $this->client_id;


$this->insMembrStatusChg($this->client_id , $this->sc_temp_usr_login, $this->memb_status_id );	



if (isset($this->sc_temp_usr_login)) { $_SESSION['usr_login'] = $this->sc_temp_usr_login;}
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'off';
$modificado_memb_status_id = $this->memb_status_id;
$modificado_client_id = $this->client_id;
$this->nm_formatar_campos('memb_status_id', 'client_id');
if ($original_memb_status_id !== $modificado_memb_status_id || isset($this->nmgp_cmp_readonly['memb_status_id']) || (isset($bFlagRead_memb_status_id) && $bFlagRead_memb_status_id))
{
    $this->ajax_return_values_memb_status_id(true);
}
if ($original_client_id !== $modificado_client_id || isset($this->nmgp_cmp_readonly['client_id']) || (isset($bFlagRead_client_id) && $bFlagRead_client_id))
{
    $this->ajax_return_values_client_id(true);
}
$this->NM_ajax_info['event_field'] = 'memb';
form_clients_staff_pack_ajax_response();
exit;
}
function members_ct()
{
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'on';
if (!isset($this->sc_temp_gv_membership_price)) {$this->sc_temp_gv_membership_price = (isset($_SESSION['gv_membership_price'])) ? $_SESSION['gv_membership_price'] : "";}
if (!isset($this->sc_temp_gv_descript)) {$this->sc_temp_gv_descript = (isset($_SESSION['gv_descript'])) ? $_SESSION['gv_descript'] : "";}
if (!isset($this->sc_temp_gv_cost_adtl_buyer)) {$this->sc_temp_gv_cost_adtl_buyer = (isset($_SESSION['gv_cost_adtl_buyer'])) ? $_SESSION['gv_cost_adtl_buyer'] : "";}
if (!isset($this->sc_temp_gv_memb_cost)) {$this->sc_temp_gv_memb_cost = (isset($_SESSION['gv_memb_cost'])) ? $_SESSION['gv_memb_cost'] : "";}
if (!isset($this->sc_temp_gv_strp_id)) {$this->sc_temp_gv_strp_id = (isset($_SESSION['gv_strp_id'])) ? $_SESSION['gv_strp_id'] : "";}
if (!isset($this->sc_temp_gv_cust_id)) {$this->sc_temp_gv_cust_id = (isset($_SESSION['gv_cust_id'])) ? $_SESSION['gv_cust_id'] : "";}
if (!isset($this->sc_temp_gv_members_ct)) {$this->sc_temp_gv_members_ct = (isset($_SESSION['gv_members_ct'])) ? $_SESSION['gv_members_ct'] : "";}
  
 
      $nm_select = "SELECT COUNT(client_id) FROM members WHERE client_id = $this->client_id "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds = array();
     if ($this->client_id != "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 
     } 
	
$this->memb_qty  = (isset($this->ds[0][0])) ? $this->ds[0][0] : 0;
$this->sc_temp_gv_members_ct = $this->memb_qty ;
$this->sc_temp_gv_cust_id = $this->client_id ;



$sql = "SELECT
  C.bus_cat,
  C.stripe_price_id,
  L.curr_price,
  L.num_of_buyers,
  L.price_after,
  L.pricing_level
FROM bus_categories C
  INNER JOIN members_level L
    ON C.memb_lev_id = L.memb_lev_id
WHERE C.bus_cat_id = " . $this->bus_cat_id ;
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 

$bus_cat			= $this->ds[0][0];
$strp_id			= $this->ds[0][1];
$memb_cost			= $this->ds[0][2];
$incl_buyers		= $this->ds[0][3];
$cost_adtl_buyer	= $this->ds[0][4];
$pricing_level		= $this->ds[0][5];

$this->sc_temp_gv_strp_id = $strp_id;

$sql = " SELECT
  SC.bus_subcategory
FROM bus_subcats SC
  INNER JOIN bus_categories C
    ON SC.bus_cat_id = C.bus_cat_id
WHERE SC.bus_subcat_id = " . $this->bus_subcat_id  .
" AND C.bus_cat_id = " . $this->bus_cat_id ;
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 

$bus_subcat = $this->ds[0][0];



 
      $nm_select = "select pricing_level_id from clients where client_id = $this->client_id "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds = array();
     if ($this->client_id != "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 
     } 

$price_lev_num = $this->ds[0][0];



$sql = "SELECT curr_price, price_after, stripe_price_id, descript " .
		"FROM members_level " .
		"WHERE active AND memb_lev_id = " . $price_lev_num . " " .  
		"ORDER BY sort_by";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 

$this->sc_temp_gv_memb_cost			= $this->rs[0][0] ?? 999;
$this->sc_temp_gv_cost_adtl_buyer	= $this->rs[0][1] ?? 999;
$this->sc_temp_gv_strp_id			= $this->rs[0][2];
$this->sc_temp_gv_descript			= $this->rs[0][3];

$memb_est_cost = 0;
if ( $this->memb_qty  <= 3 ) {
	$memb_est_cost = $this->sc_temp_gv_memb_cost;	
} else {
	$memb_est_cost = $this->sc_temp_gv_memb_cost + ($this->sc_temp_gv_cost_adtl_buyer * ($this->memb_qty  - 3));
}
$this->sc_temp_gv_membership_price = $memb_est_cost;
$this->js_prod_price  = $memb_est_cost;



$est = "The annual membership fee<br> for the <b>" . $bus_cat ."</b> (" . $bus_subcat . ") category with <b>" . $this->memb_qty . "</b> member(s)<br>will be <b>$" . $memb_est_cost . " Per Year.</b>";

$this->est_memb_cost  = $est;

$price_id = $strp_id; 	
$this->js_strp_price_id  = $this->sc_temp_gv_strp_id; 	
$prod_price = $this->sc_temp_gv_membership_price;
$member_ct = $this->sc_temp_gv_members_ct; 
$this->js_mbr_ct  = $member_ct;
$cust_id = $this->client_id ;
$this->js_client_id  = $cust_id;
if ($this->localEnviron() === 1) {
	$path_lib = "http://localhost/scriptcase/devel/conf/grp/PFM_Staff/libraries/stripe_qb/"; }
else {
	$path_lib = "https://pfm-app.com/_lib/libraries/grp/stripe_qb/";
}
$redirect_url = $path_lib . "index.php?price_id=$price_id&prod_price=$prod_price&member_ct=$member_ct&cust_id=$cust_id";
if (isset($this->sc_temp_gv_members_ct)) { $_SESSION['gv_members_ct'] = $this->sc_temp_gv_members_ct;}
if (isset($this->sc_temp_gv_cust_id)) { $_SESSION['gv_cust_id'] = $this->sc_temp_gv_cust_id;}
if (isset($this->sc_temp_gv_strp_id)) { $_SESSION['gv_strp_id'] = $this->sc_temp_gv_strp_id;}
if (isset($this->sc_temp_gv_memb_cost)) { $_SESSION['gv_memb_cost'] = $this->sc_temp_gv_memb_cost;}
if (isset($this->sc_temp_gv_cost_adtl_buyer)) { $_SESSION['gv_cost_adtl_buyer'] = $this->sc_temp_gv_cost_adtl_buyer;}
if (isset($this->sc_temp_gv_descript)) { $_SESSION['gv_descript'] = $this->sc_temp_gv_descript;}
if (isset($this->sc_temp_gv_membership_price)) { $_SESSION['gv_membership_price'] = $this->sc_temp_gv_membership_price;}
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'off';
}
function other_bus_subcat()
{
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'on';
  
 
      $nm_select = "SELECT bus_subcategory FROM bus_subcats WHERE bus_subcat_id = " . $this->bus_subcat_id ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds = array();
     if ($this->bus_subcat_id != "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 
     } 

if (preg_match('/\bother\b/i', $this->ds[0][0])) {
	$this->nmgp_cmp_hidden["bus_subcat_other"] = 'on'; $this->NM_ajax_info['fieldDisplay']['bus_subcat_other'] = 'on';		
	$this->sc_set_focus('bus_subcat_other');
} else {
	$this->nmgp_cmp_hidden["bus_subcat_other"] = 'off'; $this->NM_ajax_info['fieldDisplay']['bus_subcat_other'] = 'off';	
	$this->bus_subcat_other  = null;
}
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'off';
}
function php_del_client()
{
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'on';
  

     $nm_select ="DELETE FROM members WHERE client_id = " . $this->client_id ; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_clients_staff_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      

     $nm_select ="DELETE FROM client_docs WHERE client_id = " . $this->client_id ; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_clients_staff_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      

     $nm_select ="DELETE FROM client_pmts WHERE client_id = " . $this->client_id ; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_clients_staff_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      

     $nm_select ="DELETE FROM client_notes WHERE client_id = " . $this->client_id ; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_clients_staff_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      

$this->sc_ajax_javascript("nm_atualiza", array("excluir"));
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'off';
}
function stripe_frm_upd()
{
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'on';
if (!isset($this->sc_temp_gv_cust_id)) {$this->sc_temp_gv_cust_id = (isset($_SESSION['gv_cust_id'])) ? $_SESSION['gv_cust_id'] : "";}
if (!isset($this->sc_temp_gv_members_ct)) {$this->sc_temp_gv_members_ct = (isset($_SESSION['gv_members_ct'])) ? $_SESSION['gv_members_ct'] : "";}
if (!isset($this->sc_temp_gv_membership_price)) {$this->sc_temp_gv_membership_price = (isset($_SESSION['gv_membership_price'])) ? $_SESSION['gv_membership_price'] : "";}
if (!isset($this->sc_temp_gv_strp_id)) {$this->sc_temp_gv_strp_id = (isset($_SESSION['gv_strp_id'])) ? $_SESSION['gv_strp_id'] : "";}
  
$price_id = $this->sc_temp_gv_strp_id;	
$prod_price = $this->sc_temp_gv_membership_price;
$member_ct = $this->sc_temp_gv_members_ct;
$cust_id = $this->sc_temp_gv_cust_id;
if ($this->localEnviron() === 1) {
	$path_lib = "http://localhost/scriptcase/devel/conf/grp/PFM_Staff/libraries/stripe_qb/"; }
else {
	$path_lib = "https://pfm-app.com/_lib/libraries/grp/stripe_qb/";
}
$redirect_url = $path_lib . "index.php?price_id=$price_id&prod_price=$prod_price&member_ct=$member_cte&cust_id=$cust_id";
$this->dummy12  = "<iframe src='$redirect_url' width='100%' height='100%' frameborder='0'></iframe>";


if (isset($this->sc_temp_gv_strp_id)) { $_SESSION['gv_strp_id'] = $this->sc_temp_gv_strp_id;}
if (isset($this->sc_temp_gv_membership_price)) { $_SESSION['gv_membership_price'] = $this->sc_temp_gv_membership_price;}
if (isset($this->sc_temp_gv_members_ct)) { $_SESSION['gv_members_ct'] = $this->sc_temp_gv_members_ct;}
if (isset($this->sc_temp_gv_cust_id)) { $_SESSION['gv_cust_id'] = $this->sc_temp_gv_cust_id;}
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'off';
}
function scajaxbutton_btn_delete_backend_onClick()
{
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'on';
  
$original_client_id = $this->client_id;

$this->php_del_client();

$modificado_client_id = $this->client_id;
$this->nm_formatar_campos('client_id');
if ($original_client_id !== $modificado_client_id || isset($this->nmgp_cmp_readonly['client_id']) || (isset($bFlagRead_client_id) && $bFlagRead_client_id))
{
    $this->ajax_return_values_client_id(true);
}
$this->NM_ajax_info['event_field'] = 'scajaxbutton';
form_clients_staff_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'off';
}
function sendEmail($emails, $subject, $body, $attachment = null) {
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'on';
  

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

$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'off';
}
function localEnviron() {
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'on';
  

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

$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'off';
}
function insMembrStatusChg($client_id, $login, $memb_status_id) {
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'on';
  

    $insert_sql = "INSERT INTO sec_approvals (client_id, login, memb_status_id, ts) 
                   VALUES (" . $this->client_id . ", '" . $login . "', " . $this->memb_status_id . ", NOW())";

    
     $nm_select = $insert_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_clients_staff_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      
$_SESSION['scriptcase']['form_clients_staff']['contr_erro'] = 'off';
}
//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form, $NM_run_iframe;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
      if (isset($NM_run_iframe) && $NM_run_iframe == 1)
      {
          $this->nmgp_botoes['exit'] = "off";
      }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
         $this->Campos_Mens_erro = "";
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_clients_staff_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE html>

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
//-- 
   if ($this->nmgp_opcao == "novo")
   { 
       $out_main_contact_img_id = "";  
   } 
   else 
   { 
       $out_main_contact_img_id = $this->main_contact_img_id;  
   } 
   if ($this->main_contact_img_id != "" && $this->main_contact_img_id != "none")   
   { 
       $sTmpExtension = pathinfo($this->main_contact_img_file, PATHINFO_EXTENSION);
       $sTmpExtension = null == $sTmpExtension ? '' : '.' . $sTmpExtension;
       $sTmpFile_main_contact_img_file = 'sc_main_contact_img_id_' . md5(mt_rand(1, 1000) . microtime() . session_id()) . $sTmpExtension;
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['download_filenames']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['download_filenames'] = array();
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['download_filenames'][$sTmpFile_main_contact_img_file] = $this->main_contact_img_file;
       $out_main_contact_img_id = $this->Ini->path_imag_temp . "/" . $sTmpFile_main_contact_img_file;
       $arq_main_contact_img_id = fopen($this->Ini->root . $out_main_contact_img_id, "w") ;  
       if (is_string($this->main_contact_img_id) && substr($this->main_contact_img_id, 0, 4) == "*nm*" && (strstr(strtoupper($this->Ini->nm_tpbanco),"MSSQL") || strstr(strtoupper($this->Ini->nm_tpbanco),"PDOSQLITE"))) 
       { 
           $this->main_contact_img_id = base64_decode($this->main_contact_img_id) ; 
       } 
       fwrite($arq_main_contact_img_id, (string)$this->main_contact_img_id) ;  
       fclose($arq_main_contact_img_id) ;  
       if (isset($this->NM_size_docs[$main_contact_img_file]))
       {
           if ($this->NM_size_docs[$main_contact_img_file] != filesize($this->Ini->root . $out_main_contact_img_id))
           {
               echo "<font=3><b>" . $this->Ini->Nm_lang['lang_errm_dcmt'] . $main_contact_img_file . "</font></b>";
           }
       }
       if (isset($this->NM_size_docs[$doc_filename]))
       {
           if ($this->NM_size_docs[$doc_filename] != filesize($this->Ini->root . $out_main_contact_img_id))
           {
               echo "<font=3><b>" . $this->Ini->Nm_lang['lang_errm_dcmt'] . $doc_filename . "</font></b>";
           }
       }
   } 
        $this->initFormPages();
    include_once("form_clients_staff_form0.php");
        $this->hideFormPages();
 }

        function initFormPages() {
        } // initFormPages

        function hideFormPages() {
        } // hideFormPages

    function form_format_readonly($field, $value)
    {
        $result = $value;

        $this->form_highlight_search($result, $field, $value);

        return $result;
    }

    function form_highlight_search(&$result, $field, $value)
    {
        if ($this->proc_fast_search) {
            $this->form_highlight_search_quicksearch($result, $field, $value);
        }
    }

    function form_highlight_search_quicksearch(&$result, $field, $value)
    {
        $searchOk = false;
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array(""))) {
            $searchOk = true;
        }
        elseif ($field == $this->nmgp_fast_search && in_array($field, array("membershipid", "co_name", "client_id", "mailing_address", "memb_status_id", "city", "pricing_level_id", "state", "bus_cat_id", "zip_code", "bus_subcat_id", "permanent_member_date", "bus_subcat_other", "renewal_date", "acct_instagram", "website_url", "acct_facebook", "main_contact_name", "main_contact_phone", "main_contact_email", "main_contact_title", "main_contact_img_id", "memb_list", "docs", "client_pmts", "notes"))) {
            $searchOk = true;
        }

        if (!$searchOk || '' == $this->nmgp_arg_fast_search) {
            return;
        }

        $htmlIni = '<div class="highlight" style="background-color: #fafaca; display: inline-block">';
        $htmlFim = '</div>';

        if ('qp' == $this->nmgp_cond_fast_search) {
            $keywords = preg_quote($this->nmgp_arg_fast_search, '/');
            $result = preg_replace('/'. $keywords .'/i', $htmlIni . '$0' . $htmlFim, $result);
        } elseif ('eq' == $this->nmgp_cond_fast_search) {
            if (strcasecmp($this->nmgp_arg_fast_search, $value) == 0) {
                $result = $htmlIni. $result .$htmlFim;
            }
        }
    }


    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input

   function jqueryCalendarDtFormat($sFormat, $sSep)
   {
       $sFormat = chunk_split(str_replace('yyyy', 'yy', $sFormat), 2, $sSep);

       if ($sSep == substr($sFormat, -1))
       {
           $sFormat = substr($sFormat, 0, -1);
       }

       return $sFormat;
   } // jqueryCalendarDtFormat

   function jqueryCalendarTimeStart($sFormat, $value)
   {
       $aDateParts = explode(';', $sFormat);

       if (2 == sizeof($aDateParts))
       {
           $sTime = $aDateParts[1];
       }
       else
       {
           $sTime = 'hh:mm:ss';
       }

       if ('now' == $value) {
           return str_replace(array('hh', 'mm', 'ii', 'ss'), array(date('H'), date('i'), date('i'), date('s')), $sTime);
       } elseif ('end' == $value) {
           return str_replace(array('hh', 'mm', 'ii', 'ss'), array('23', '59', '59', '59'), $sTime);
       } else {
           return str_replace(array('h', 'm', 'i', 's'), array('0', '0', '0', '0'), $sTime);
       }
   } // jqueryCalendarTimeStart

   function jqueryCalendarWeekInit($sDay)
   {
       switch ($sDay) {
           case 'MO': return 1; break;
           case 'TU': return 2; break;
           case 'WE': return 3; break;
           case 'TH': return 4; break;
           case 'FR': return 5; break;
           case 'SA': return 6; break;
           default  : return 7; break;
       }
   } // jqueryCalendarWeekInit

   function jqueryIconFile($sModule)
   {
       $sImage = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && 'image' == $this->arr_buttons['bcalendario']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalendario']['display'])
           {
               $sImage = $this->arr_buttons['bcalendario']['image'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && 'image' == $this->arr_buttons['bcalculadora']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalculadora']['display'])
           {
               $sImage = $this->arr_buttons['bcalculadora']['image'];
           }
       }

       return '' == $sImage ? '' : $this->Ini->path_icones . '/' . $sImage;
   } // jqueryIconFile

   function jqueryFAFile($sModule)
   {
       $sFA = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
           {
               $sFA = $this->arr_buttons['bcalendario']['fontawesomeicon'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
           {
               $sFA = $this->arr_buttons['bcalculadora']['fontawesomeicon'];
           }
       }

       return '' == $sFA ? '' : "<span class='scButton_fontawesome " . $sFA . "'></span>";
   } // jqueryFAFile

   function jqueryButtonText($sModule)
   {
       $sClass = '';
       $sText  = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalendario']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalendario']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalendario']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i>";
                   }
               }
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalculadora']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalculadora']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalculadora']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> ";
                   }
               }
           }
       }

       return '' == $sText ? array('', '') : array($sText, $sClass);
   } // jqueryButtonText


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['csrf_token'];
    }

    function scCsrfGenerateToken()
    {
        $aSources = array(
            'abcdefghijklmnopqrstuvwxyz',
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            '1234567890',
            '!@$*()-_[]{},.;:'
        );

        $sRandom = '';

        $aSourcesSizes = array();
        $iSourceSize   = sizeof($aSources) - 1;
        for ($i = 0; $i <= $iSourceSize; $i++)
        {
            $aSourcesSizes[$i] = strlen($aSources[$i]) - 1;
        }

        for ($i = 0; $i < 64; $i++)
        {
            $iSource = $this->scCsrfRandom(0, $iSourceSize);
            $sRandom .= substr($aSources[$iSource], $this->scCsrfRandom(0, $aSourcesSizes[$iSource]), 1);
        }

        return $sRandom;
    }

    function scCsrfRandom($iMin, $iMax)
    {
        return mt_rand($iMin, $iMax);
    }

        function addUrlParam($url, $param, $value) {
                $urlParts  = explode('?', $url);
                $urlParams = isset($urlParts[1]) ? explode('&', $urlParts[1]) : array();
                $objParams = array();
                foreach ($urlParams as $paramInfo) {
                        $paramParts = explode('=', $paramInfo);
                        $objParams[ $paramParts[0] ] = isset($paramParts[1]) ? $paramParts[1] : '';
                }
                $objParams[$param] = $value;
                $urlParams = array();
                foreach ($objParams as $paramName => $paramValue) {
                        $urlParams[] = $paramName . '=' . $paramValue;
                }
                return $urlParts[0] . '?' . implode('&', $urlParams);
        }
 function allowedCharsCharset($charlist)
 {
     if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
     {
         $charlist = NM_conv_charset($charlist, $_SESSION['scriptcase']['charset'], 'UTF-8');
     }
     return str_replace("'", "\'", $charlist);
 }

function sc_file_size($file, $format = false)
{
    if ('' == $file) {
        return '';
    }
    if (!@is_file($file)) {
        return '';
    }
    $fileSize = @filesize($file);
    if ($format) {
        $suffix = '';
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' KB';
        }
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' MB';
        }
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' GB';
        }
        $fileSize = $fileSize . $suffix;
    }
    return $fileSize;
}


 function new_date_format($type, $field)
 {
     $new_date_format_out = '';

     if ('DT' == $type)
     {
         $date_format  = $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = $this->field_config[$field]['date_display'];
         $time_format  = '';
         $time_sep     = '';
         $time_display = '';
     }
     elseif ('DH' == $type)
     {
         $date_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , 0, strpos($this->field_config[$field]['date_format'] , ';')) : $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], 0, strpos($this->field_config[$field]['date_display'], ';')) : $this->field_config[$field]['date_display'];
         $time_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , strpos($this->field_config[$field]['date_format'] , ';') + 1) : '';
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], strpos($this->field_config[$field]['date_display'], ';') + 1) : '';
     }
     elseif ('HH' == $type)
     {
         $date_format  = '';
         $date_sep     = '';
         $date_display = '';
         $time_format  = $this->field_config[$field]['date_format'];
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = $this->field_config[$field]['date_display'];
     }

     if ('DT' == $type || 'DH' == $type)
     {
         $date_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_format); $i++)
         {
             $char = strtolower(substr($date_format, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $date_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $date_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $disp_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_display); $i++)
         {
             $char = strtolower(substr($date_display, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $disp_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $disp_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $date_final = array();
         foreach ($date_array as $date_part)
         {
             if (in_array($date_part, $disp_array))
             {
                 $date_final[] = $date_part;
             }
         }

         $date_format = implode($date_sep, $date_final);
     }
     if ('HH' == $type || 'DH' == $type)
     {
         $time_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_format); $i++)
         {
             $char = strtolower(substr($time_format, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $time_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $time_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $disp_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_display); $i++)
         {
             $char = strtolower(substr($time_display, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $disp_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $disp_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $time_final = array();
         foreach ($time_array as $time_part)
         {
             if (in_array($time_part, $disp_array))
             {
                 $time_final[] = $time_part;
             }
         }

         $time_format = implode($time_sep, $time_final);
     }

     if ('DT' == $type)
     {
         $old_date_format = $date_format;
     }
     elseif ('DH' == $type)
     {
         $old_date_format = $date_format . ';' . $time_format;
     }
     elseif ('HH' == $type)
     {
         $old_date_format = $time_format;
     }

     for ($i = 0; $i < strlen($old_date_format); $i++)
     {
         $char = substr($old_date_format, $i, 1);
         if ('/' == $char)
         {
             $new_date_format_out .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format_out .= $time_sep;
         }
         else
         {
             $new_date_format_out .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format_out;
     if ('DH' == $type)
     {
         $new_date_format_out                                  = explode(';', $new_date_format_out);
         $this->field_config[$field]['date_format_js']        = $new_date_format_out[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format_out[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

   function Form_lookup_memb_status_id()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_memb_status_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_memb_status_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_memb_status_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_memb_status_id'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_memb_status_id']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_memb_status_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_memb_status_id']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_memb_status_id'] = array(); 
    }

   $old_value_membershipid = $this->membershipid;
   $old_value_client_id = $this->client_id;
   $old_value_state = $this->state;
   $old_value_zip_code = $this->zip_code;
   $old_value_permanent_member_date = $this->permanent_member_date;
   $old_value_renewal_date = $this->renewal_date;
   $old_value_main_contact_phone = $this->main_contact_phone;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_membershipid = $this->membershipid;
   $unformatted_value_client_id = $this->client_id;
   $unformatted_value_state = $this->state;
   $unformatted_value_zip_code = $this->zip_code;
   $unformatted_value_permanent_member_date = $this->permanent_member_date;
   $unformatted_value_renewal_date = $this->renewal_date;
   $unformatted_value_main_contact_phone = $this->main_contact_phone;

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
   $paid_val_str = "''";
   if (!empty($this->paid))
   {
       if (is_array($this->paid))
       {
           $Tmp_array = $this->paid;
       }
       else
       {
           $Tmp_array = explode(";", $this->paid);
       }
       $paid_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $paid_val_str)
          {
             $paid_val_str .= ", ";
          }
          $paid_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT memb_status_id, status  FROM members_status  ORDER BY status";

   $this->membershipid = $old_value_membershipid;
   $this->client_id = $old_value_client_id;
   $this->state = $old_value_state;
   $this->zip_code = $old_value_zip_code;
   $this->permanent_member_date = $old_value_permanent_member_date;
   $this->renewal_date = $old_value_renewal_date;
   $this->main_contact_phone = $old_value_main_contact_phone;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_memb_status_id'][] = $rs->fields[0];
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
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_pricing_level_id()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_pricing_level_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_pricing_level_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_pricing_level_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_pricing_level_id'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_pricing_level_id']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_pricing_level_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_pricing_level_id']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_pricing_level_id'] = array(); 
    }

   $old_value_membershipid = $this->membershipid;
   $old_value_client_id = $this->client_id;
   $old_value_state = $this->state;
   $old_value_zip_code = $this->zip_code;
   $old_value_permanent_member_date = $this->permanent_member_date;
   $old_value_renewal_date = $this->renewal_date;
   $old_value_main_contact_phone = $this->main_contact_phone;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_membershipid = $this->membershipid;
   $unformatted_value_client_id = $this->client_id;
   $unformatted_value_state = $this->state;
   $unformatted_value_zip_code = $this->zip_code;
   $unformatted_value_permanent_member_date = $this->permanent_member_date;
   $unformatted_value_renewal_date = $this->renewal_date;
   $unformatted_value_main_contact_phone = $this->main_contact_phone;

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
   $paid_val_str = "''";
   if (!empty($this->paid))
   {
       if (is_array($this->paid))
       {
           $Tmp_array = $this->paid;
       }
       else
       {
           $Tmp_array = explode(";", $this->paid);
       }
       $paid_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $paid_val_str)
          {
             $paid_val_str .= ", ";
          }
          $paid_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT memb_lev_id, descript  FROM members_level  WHERE active ORDER BY sort_by";

   $this->membershipid = $old_value_membershipid;
   $this->client_id = $old_value_client_id;
   $this->state = $old_value_state;
   $this->zip_code = $old_value_zip_code;
   $this->permanent_member_date = $old_value_permanent_member_date;
   $this->renewal_date = $old_value_renewal_date;
   $this->main_contact_phone = $old_value_main_contact_phone;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_pricing_level_id'][] = $rs->fields[0];
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
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_bus_cat_id()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_cat_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_cat_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_cat_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_cat_id'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_cat_id']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_cat_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_cat_id']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_cat_id'] = array(); 
    }

   $old_value_membershipid = $this->membershipid;
   $old_value_client_id = $this->client_id;
   $old_value_state = $this->state;
   $old_value_zip_code = $this->zip_code;
   $old_value_permanent_member_date = $this->permanent_member_date;
   $old_value_renewal_date = $this->renewal_date;
   $old_value_main_contact_phone = $this->main_contact_phone;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_membershipid = $this->membershipid;
   $unformatted_value_client_id = $this->client_id;
   $unformatted_value_state = $this->state;
   $unformatted_value_zip_code = $this->zip_code;
   $unformatted_value_permanent_member_date = $this->permanent_member_date;
   $unformatted_value_renewal_date = $this->renewal_date;
   $unformatted_value_main_contact_phone = $this->main_contact_phone;

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
   $paid_val_str = "''";
   if (!empty($this->paid))
   {
       if (is_array($this->paid))
       {
           $Tmp_array = $this->paid;
       }
       else
       {
           $Tmp_array = explode(";", $this->paid);
       }
       $paid_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $paid_val_str)
          {
             $paid_val_str .= ", ";
          }
          $paid_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT bus_cat_id, bus_cat  FROM bus_categories  ORDER BY bus_cat";

   $this->membershipid = $old_value_membershipid;
   $this->client_id = $old_value_client_id;
   $this->state = $old_value_state;
   $this->zip_code = $old_value_zip_code;
   $this->permanent_member_date = $old_value_permanent_member_date;
   $this->renewal_date = $old_value_renewal_date;
   $this->main_contact_phone = $old_value_main_contact_phone;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_cat_id'][] = $rs->fields[0];
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
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_bus_subcat_id()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_subcat_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_subcat_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_subcat_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_subcat_id'] = array(); 
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_subcat_id']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_subcat_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_subcat_id']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_subcat_id'] = array(); 
    }

   $old_value_membershipid = $this->membershipid;
   $old_value_client_id = $this->client_id;
   $old_value_state = $this->state;
   $old_value_zip_code = $this->zip_code;
   $old_value_permanent_member_date = $this->permanent_member_date;
   $old_value_renewal_date = $this->renewal_date;
   $old_value_main_contact_phone = $this->main_contact_phone;
   $this->nm_tira_formatacao();
   if ($this->nmgp_opcao != "nada") {
       $this->nm_converte_datas(false);
   }


   $unformatted_value_membershipid = $this->membershipid;
   $unformatted_value_client_id = $this->client_id;
   $unformatted_value_state = $this->state;
   $unformatted_value_zip_code = $this->zip_code;
   $unformatted_value_permanent_member_date = $this->permanent_member_date;
   $unformatted_value_renewal_date = $this->renewal_date;
   $unformatted_value_main_contact_phone = $this->main_contact_phone;

   $nm_comando = "SELECT bus_subcat_id, bus_subcategory  FROM bus_subcats  WHERE bus_cat_id = $this->bus_cat_id  ORDER BY sort_by";

   $this->membershipid = $old_value_membershipid;
   $this->client_id = $old_value_client_id;
   $this->state = $old_value_state;
   $this->zip_code = $old_value_zip_code;
   $this->permanent_member_date = $old_value_permanent_member_date;
   $this->renewal_date = $old_value_renewal_date;
   $this->main_contact_phone = $old_value_main_contact_phone;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['Lookup_bus_subcat_id'][] = $rs->fields[0];
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
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode(";", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
         unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dyn_search_and_or']);
         unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dyn_search_cache']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_clients_staff_pack_ajax_response();
              exit;
          }
          return;
      }
      $comando = "";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($data_search))
      {
          $data_search = NM_conv_charset($data_search, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $sv_data = $data_search;
      foreach ($fields as $field) {
          if ($field == "membershipid") 
          {
              $this->SC_monta_condicao($comando, "MembershipID", $arg_search, str_replace(",", ".", $data_search), "INT", false);
          }
          if ($field == "co_name") 
          {
              $this->SC_monta_condicao($comando, "co_name", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "client_id") 
          {
              $this->SC_monta_condicao($comando, "client_id", $arg_search, str_replace(",", ".", $data_search), "BIGINT", false);
          }
          if ($field == "mailing_address") 
          {
              $this->SC_monta_condicao($comando, "mailing_address", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "memb_status_id") 
          {
              $data_lookup = $this->SC_lookup_memb_status_id($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "memb_status_id", $arg_search, $data_lookup, "INT", false);
              }
          }
          if ($field == "city") 
          {
              $this->SC_monta_condicao($comando, "city", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "pricing_level_id") 
          {
              $data_lookup = $this->SC_lookup_pricing_level_id($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "pricing_level_id", $arg_search, $data_lookup, "INT", false);
              }
          }
          if ($field == "state") 
          {
              $this->SC_monta_condicao($comando, "state", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "bus_cat_id") 
          {
              $data_lookup = $this->SC_lookup_bus_cat_id($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "bus_cat_id", $arg_search, $data_lookup, "INT", false);
              }
          }
          if ($field == "zip_code") 
          {
              $this->SC_monta_condicao($comando, "zip_code", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "bus_subcat_id") 
          {
              $data_lookup = $this->SC_lookup_bus_subcat_id($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "bus_subcat_id", $arg_search, $data_lookup, "INT", false);
              }
          }
          if ($field == "permanent_member_date") 
          {
              $this->SC_monta_condicao($comando, "permanent_member_date", $arg_search, $data_search, "DATETIME", false);
          }
          if ($field == "bus_subcat_other") 
          {
              $this->SC_monta_condicao($comando, "bus_subcat_other", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "renewal_date") 
          {
              $this->SC_monta_condicao($comando, "renewal_date", $arg_search, $data_search, "DATETIME", false);
          }
          if ($field == "acct_instagram") 
          {
              $this->SC_monta_condicao($comando, "acct_instagram", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "website_url") 
          {
              $this->SC_monta_condicao($comando, "website_url", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "acct_facebook") 
          {
              $this->SC_monta_condicao($comando, "acct_facebook", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "main_contact_name") 
          {
              $this->SC_monta_condicao($comando, "main_contact_name", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "main_contact_phone") 
          {
              $this->SC_monta_condicao($comando, "main_contact_phone", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "main_contact_email") 
          {
              $this->SC_monta_condicao($comando, "main_contact_email", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "main_contact_title") 
          {
              $this->SC_monta_condicao($comando, "main_contact_title", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "main_contact_img_id") 
          {
              $this->SC_monta_condicao($comando, "main_contact_img_id", $arg_search, $data_search, "BLOB", false);
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['where_filter_form'] . " and (" . $comando . ")";
      }
      else
      {
         $sc_where = " where " . $comando;
      }
      $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_clients_staff = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['total'] = $qt_geral_reg_form_clients_staff;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_clients_staff_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_clients_staff_pack_ajax_response();
          exit;
      }
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="", $tp_unaccent=false)
   {
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $nm_numeric = array();
      $Nm_datas   = array();
      $nm_esp_postgres = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $Nm_accent = $this->Ini->Nm_accent_no;
      if ($tp_unaccent) {
          $Nm_accent = $this->Ini->Nm_accent_yes;
      }
      $nm_numeric[] = "client_id";$nm_numeric[] = "membershipid";$nm_numeric[] = "memb_status_id";$nm_numeric[] = "appn_id";$nm_numeric[] = "fresh_cut_allowed";$nm_numeric[] = "temporary_pass";$nm_numeric[] = "ofa_member";$nm_numeric[] = "restricted";$nm_numeric[] = "committee_approval_required";$nm_numeric[] = "archive";$nm_numeric[] = "pricing_level_id";$nm_numeric[] = "bus_cat_id";$nm_numeric[] = "bus_subcat_id";$nm_numeric[] = "qb_id";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['decimal_db'] == ".")
         {
             $nm_aspas  = "";
             $nm_aspas1 = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
      }
      if (is_array($campo)) {
          foreach ($campo as $Ind => $Cmp) {
             if ($Cmp != null) {
                 $campo[$Ind] = substr($this->Ini->Db->qstr($Cmp), 1, -1);
             }
          }
      }
      else {
          $campo = substr($this->Ini->Db->qstr($campo), 1, -1);
      }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_esp_postgres) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS VARCHAR)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS VARCHAR(255))";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
      $Nm_datas["starting_date"] = "datetime";$Nm_datas["renewal_date"] = "datetime";$Nm_datas["expiration_date"] = "datetime";$Nm_datas["cancel_date"] = "datetime";$Nm_datas["retire_date"] = "datetime";$Nm_datas["date_last_updated"] = "datetime";$Nm_datas["archive_date"] = "datetime";$Nm_datas["record_created"] = "datetime";$Nm_datas["permanent_member_date"] = "datetime";$Nm_datas["appn_date"] = "datetime";$Nm_datas[""] = "date";
         if (isset($Nm_datas[$campo_join]))
         {
             for ($x = 0; $x < strlen($campo); $x++)
             {
                 $tst = substr($campo, $x, 1);
                 if (!is_numeric($tst) && ($tst != "-" && $tst != ":" && $tst != " "))
                 {
                     return;
                 }
             }
         }
          if (isset($Nm_datas[$campo_join]))
          {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
             $nm_aspas  = "#";
             $nm_aspas1 = "#";
          }
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['SC_sep_date1'];
              }
          }
      if (isset($Nm_datas[$campo_join]) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP" || strtoupper($condicao) == "DF"))
      {
          if (strtoupper($condicao) == "DF")
          {
              $condicao = "NP";
          }
          if (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD')";
          }
          elseif ($Nm_datas[$campo_join] == "time" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $nome = "convert(char(10)," . $nome . ",121)";
          }
          elseif (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $nome = "convert(char(19)," . $nome . ",121)";
          }
          elseif (($Nm_datas[$campo_join] == "times" || $Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $nome  = "TO_DATE(TO_CHAR(" . $nome . ", 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "datetime" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $nome = "EXTEND(" . $nome . ", YEAR TO FRACTION)";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $nome = "EXTEND(" . $nome . ", YEAR TO DAY)";
          }
          elseif ($Nm_datas[$campo_join] == "datetime" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD')";
          }
      }
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 $prep .= $nm_ini_lower . $nm_aspas . $Cmp . $nm_aspas1 . $nm_fim_lower;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas1 : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         $cond_tst = strtoupper($condicao);
         if ($cond_tst == "II" || $cond_tst == "QP" || $cond_tst == "NP")
         {
             if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && $this->NM_case_insensitive)
             {
                 $op_like      = " ilike ";
                 $nm_ini_lower = "";
                 $nm_fim_lower = "";
             }
             else
             {
                 $op_like = " like ";
             }
         }
         switch ($cond_tst)
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $Nm_accent['cmp_i'] . $nome . $Nm_accent['cmp_f'] . $nm_fim_lower . $Nm_accent['cmp_apos'] . $op_like . $nm_ini_lower . "'" . $Nm_accent['arg_i'] . sc_sql_escape($this->Ini->nm_tpbanco, $campo) . $Nm_accent['arg_f'] . "%'" . $nm_fim_lower . $Nm_accent['arg_apos'] . $_SESSION['sc_session']['sc_sql_escape'];
            break;
            case "QP":     // 
               $comando        .= $nm_ini_lower . $Nm_accent['cmp_i'] . $nome . $Nm_accent['cmp_f'] . $nm_fim_lower . $Nm_accent['cmp_apos'] . $op_like . $nm_ini_lower . "'%" . $Nm_accent['arg_i'] . sc_sql_escape($this->Ini->nm_tpbanco, $campo) . $Nm_accent['arg_f'] . "%'" . $nm_fim_lower . $Nm_accent['arg_apos'] . $_SESSION['sc_session']['sc_sql_escape'];
            break;
            case "NP":     // 
               $comando        .= $nm_ini_lower . $Nm_accent['cmp_i'] . $nome . $Nm_accent['cmp_f'] . $nm_fim_lower . $Nm_accent['cmp_apos'] . " not" . $op_like . $nm_ini_lower . "'%" . $Nm_accent['arg_i'] . sc_sql_escape($this->Ini->nm_tpbanco, $campo) . $Nm_accent['arg_f'] . "%'" . $nm_fim_lower . $Nm_accent['arg_apos'] . $_SESSION['sc_session']['sc_sql_escape'];
            break;
            case "DF":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "GT":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " > " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "GE":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " >= " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "LT":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " < " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "LE":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <= " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
         }
   }
   function SC_lookup_memb_status_id($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT status, memb_status_id FROM members_status WHERE (#cmp_istatus#cmp_f#cmp_apos LIKE '%#arg_i" . $campo . "#arg_f%'#arg_apos)" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "LIKE '#arg_i" . $campo . "#arg_f%'", $nm_comando);
       }
       if ($condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "NOT LIKE '%#arg_i" . $campo . "#arg_f%'", $nm_comando);
       }
       if ($condicao == "df")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "<> '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "> '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", ">= '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "< '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "<= '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       $nm_comando = str_replace(array('#cmp_i','#cmp_f','#cmp_apos','#arg_i','#arg_f','#arg_apos'), array('','','','','',''), $nm_comando); 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           $campo = $campo_orig;
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
   function SC_lookup_pricing_level_id($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       if (isset($this->Ini->nm_bases_postgres) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && ($condicao == "eq" || $condicao == "qp" || $condicao == "np" || $condicao == "ii" || $condicao == "df"))
       {
           $nm_comando = "SELECT descript, memb_lev_id FROM members_level WHERE (CAST (memb_lev_id AS TEXT) LIKE '%$campo%') AND (active)" ; 
       }
       else
       {
           $nm_comando = "SELECT descript, memb_lev_id FROM members_level WHERE (#cmp_idescript#cmp_f#cmp_apos LIKE '%#arg_i" . $campo . "#arg_f%'#arg_apos) AND (active)" ; 
       }
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "LIKE '#arg_i" . $campo . "#arg_f%'", $nm_comando);
       }
       if ($condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "NOT LIKE '%#arg_i" . $campo . "#arg_f%'", $nm_comando);
       }
       if ($condicao == "df")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "<> '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "> '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", ">= '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "< '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "<= '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       $nm_comando = str_replace(array('#cmp_i','#cmp_f','#cmp_apos','#arg_i','#arg_f','#arg_apos'), array('','','','','',''), $nm_comando); 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           $campo = $campo_orig;
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
   function SC_lookup_bus_cat_id($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT bus_cat, bus_cat_id FROM bus_categories WHERE (#cmp_ibus_cat#cmp_f#cmp_apos LIKE '%#arg_i" . $campo . "#arg_f%'#arg_apos)" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "LIKE '#arg_i" . $campo . "#arg_f%'", $nm_comando);
       }
       if ($condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "NOT LIKE '%#arg_i" . $campo . "#arg_f%'", $nm_comando);
       }
       if ($condicao == "df")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "<> '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "> '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", ">= '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "< '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "<= '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       $nm_comando = str_replace(array('#cmp_i','#cmp_f','#cmp_apos','#arg_i','#arg_f','#arg_apos'), array('','','','','',''), $nm_comando); 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           $campo = $campo_orig;
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
   function SC_lookup_bus_subcat_id($condicao, $campo)
   {
       return $campo;
   }
function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['scriptcase']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page];
   }
   if ($tipo == 2)
   {
       $nmgp_saida_form = "form_clients_staff_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_clients_staff_fim.php";
   }
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       $sTarget = '_self';
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = $sTarget;
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       form_clients_staff_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE html>

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
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
   </HEAD>
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo $this->form_encode_input($nmgp_saida_form); ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($this->nm_location); ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['masterValue']);
?>
}
<?php
    }
}
?>
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
function nmgp_redireciona_form($nm_apl_dest, $nm_apl_retorno, $nm_apl_parms, $nm_target="", $opc="", $alt_modal=430, $larg_modal=630)
{
   if (isset($this->NM_is_redirected) && $this->NM_is_redirected)
   {
       return;
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_members_staff']['reg_start'] = "";
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_members_staff']['total']);
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_client_pmts']['reg_start'] = "";
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_client_pmts']['total']);
   if (is_array($nm_apl_parms))
   {
       $tmp_parms = "";
       foreach ($nm_apl_parms as $par => $val)
       {
           $par = trim($par);
           $val = trim($val);
           $tmp_parms .= str_replace(".", "_", $par) . "?#?";
           if (substr($val, 0, 1) == "$")
           {
               $tmp_parms .= $$val;
           }
           elseif (substr($val, 0, 1) == "{")
           {
               $val        = substr($val, 1, -1);
               $tmp_parms .= $this->$val;
           }
           elseif (substr($val, 0, 1) == "[")
           {
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff'][substr($val, 1, -1)];
           }
           else
           {
               $tmp_parms .= $val;
           }
           $tmp_parms .= "?@?";
       }
       $nm_apl_parms = $tmp_parms;
   }
   if (empty($opc))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['opc_ant'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           form_clients_staff_pack_ajax_response();
           exit;
       }
       echo "<SCRIPT language=\"javascript\">";
       if (strtolower($nm_target) == "_blank")
       {
           echo "window.open ('" . $nm_apl_dest . "');";
           echo "</SCRIPT>";
           return;
       }
       else
       {
           echo "window.location='" . $nm_apl_dest . "';";
           echo "</SCRIPT>";
           $this->NM_close_db();
           exit;
       }
   }
   $dir = explode("/", $nm_apl_dest);
   if (count($dir) == 1)
   {
       $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
       $nm_apl_dest = $this->Ini->path_link . SC_dir_app_name($nm_apl_dest) . "/" . $nm_apl_dest . ".php";
   }
   if ($this->NM_ajax_flag)
   {
       $nm_apl_parms = str_replace("?#?", "*scin", NM_charset_to_utf8($nm_apl_parms));
       $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
       $this->NM_ajax_info['redir']['metodo']     = 'post';
       $this->NM_ajax_info['redir']['action']     = $nm_apl_dest;
       $this->NM_ajax_info['redir']['nmgp_parms'] = $nm_apl_parms;
       $this->NM_ajax_info['redir']['target']     = $nm_target_form;
       $this->NM_ajax_info['redir']['h_modal']    = $alt_modal;
       $this->NM_ajax_info['redir']['w_modal']    = $larg_modal;
       if ($nm_target_form == "_blank")
       {
           $this->NM_ajax_info['redir']['nmgp_outra_jan'] = 'true';
       }
       else
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida']      = $nm_apl_retorno;
           $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       }
       form_clients_staff_pack_ajax_response();
       exit;
   }
   if ($nm_target == "modal")
   {
       if (!empty($nm_apl_parms))
       {
           $nm_apl_parms = str_replace("?#?", "*scin", $nm_apl_parms);
           $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
           $nm_apl_parms = "nmgp_parms=" . $nm_apl_parms . "&";
       }
       $par_modal = "?script_case_init=" . $this->Ini->sc_page . "&nmgp_outra_jan=true&nmgp_url_saida=modal&NMSC_modal=ok&";
       $this->redir_modal = "$(function() { tb_show('', '" . $nm_apl_dest . $par_modal . $nm_apl_parms . "TB_iframe=true&modal=true&height=" . $alt_modal . "&width=" . $larg_modal . "', '') })";
       $this->NM_is_redirected = true;
       return;
   }
   if ($nm_target == "_blank")
   {
?>
<form name="Fredir" method="post" target="_blank" action="<?php echo $nm_apl_dest; ?>">
  <input type="hidden" name="nmgp_parms" value="<?php echo $this->form_encode_input($nm_apl_parms); ?>"/>
</form>
<script type="text/javascript">
setTimeout(function() { document.Fredir.submit(); }, 250);
</script>
<?php
    return;
   }
?>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
?>
<!DOCTYPE html>

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
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
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_third; ?>jquery/js/jquery.js"></SCRIPT>
   </HEAD>
   <BODY>
<?php
   }
?>
<form name="Fredir" method="post" 
                  target="_self"> 
  <input type="hidden" name="nmgp_parms" value="<?php echo $this->form_encode_input($nm_apl_parms); ?>"/>
<?php
   if ($nm_target_form == "_blank")
   {
?>
  <input type="hidden" name="nmgp_outra_jan" value="true"/> 
<?php
   }
   else
   {
?>
  <input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nm_apl_retorno) ?>">
  <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"/> 
<?php
   }
?>
</form> 
   <SCRIPT type="text/javascript">
<?php
   if ($nm_target_form == "modal")
   {
?>
       $(document).ready(function(){
           tb_show('', '<?php echo $nm_apl_dest ?>?script_case_init=<?php echo $this->Ini->sc_page; ?>&nmgp_url_saida=modal&nmgp_parms=<?php echo $this->form_encode_input($nm_apl_parms); ?>&nmgp_outra_jan=true&TB_iframe=true&height=<?php echo $alt_modal; ?>&width=<?php echo $larg_modal; ?>&modal=true', '');
       });
<?php
   }
   else
   {
?>
    $(function() {
       document.Fredir.target = "<?php echo $nm_target_form ?>"; 
       document.Fredir.action = "<?php echo $nm_apl_dest ?>";
       document.Fredir.submit();
    });
<?php
   }
?>
   </SCRIPT>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
?>
   </BODY>
   </HTML>
<?php
   }
?>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
       $this->NM_close_db();
       if ($this->Ini->nm_db_conn_mysql_qb)
       {
           $this->Ini->nm_db_conn_mysql_qb->Close();
       }
       exit;
   }
}
    function sc_set_focus($sFieldName)
    {
        $sFieldName = strtolower($sFieldName);
        $aFocus = array(
                        'dummy02' => 'dummy02',
                        'membershipid' => 'membershipid',
                        'co_name' => 'co_name',
                        'client_id' => 'client_id',
                        'mailing_address' => 'mailing_address',
                        'memb_status_id' => 'memb_status_id',
                        'city' => 'city',
                        'pricing_level_id' => 'pricing_level_id',
                        'state' => 'state',
                        'bus_cat_id' => 'bus_cat_id',
                        'zip_code' => 'zip_code',
                        'bus_subcat_id' => 'bus_subcat_id',
                        'permanent_member_date' => 'permanent_member_date',
                        'bus_subcat_other' => 'bus_subcat_other',
                        'renewal_date' => 'renewal_date',
                        'acct_instagram' => 'acct_instagram',
                        'website_url' => 'website_url',
                        'acct_facebook' => 'acct_facebook',
                        'js_prod_price' => 'js_prod_price',
                        'js_strp_price_id' => 'js_strp_price_id',
                        'js_mbr_ct' => 'js_mbr_ct',
                        'js_client_id' => 'js_client_id',
                        'dummy07' => 'dummy07',
                        'dummy08' => 'dummy08',
                        'main_contact_name' => 'main_contact_name',
                        'main_contact_phone' => 'main_contact_phone',
                        'main_contact_email' => 'main_contact_email',
                        'main_contact_title' => 'main_contact_title',
                        'main_contact_img_id' => 'main_contact_img_id',
                        'memb_list' => 'memb_list',
                        'docs' => 'docs',
                        'client_pmts' => 'client_pmts',
                        'notes' => 'notes',
                       );
        if (isset($aFocus[$sFieldName]))
        {
            $this->NM_ajax_info['focus'] = $aFocus[$sFieldName];
        }
    } // sc_set_focus
    function sc_ajax_javascript($sJsFunc, $aParam = array())
    {
        if ($this->NM_ajax_flag)
        {
            foreach ($aParam as $i => $v)
            {
                $aParam[$i] = NM_charset_to_utf8($v);
            }
            $this->NM_ajax_info['ajaxJavascript'][] = array(NM_charset_to_utf8($sJsFunc), $aParam);
        }
        else
        {
            foreach ($aParam as $i => $v)
            {
                $aParam[$i] = '"' . str_replace('"', '\"', $v) . '"';
            }
            $this->NM_non_ajax_info['ajaxJavascript'][] = array($sJsFunc, $aParam);
        }
    } // sc_ajax_javascript
    function sc_btn_label($buttonName, $buttonLabel)
    {
        $buttonName = strtolower($buttonName);
        $buttonList = $this->getButtonIds($buttonName);
        foreach ($buttonList as $buttonId) {
            $this->NM_ajax_info['btnLabel'][$buttonId] = $buttonLabel;
        }
        $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['btn_label'][$buttonName] = $buttonLabel;
    } // sc_btn_label

    function getButtonIds($buttonName) {
        switch ($buttonName) {
            case "update":
                return array("sc_b_upd_t.sc-unique-btn-1", "sc_b_upd_b.sc-unique-btn-3");
                break;
            case "btn_delete_backend":
                return array("sc_btn_delete_backend_top", "sc_btn_delete_backend_bot");
                break;
            case "coll_pmt_js":
                return array("sc_coll_pmt_js_top");
                break;
            case "email_client_if_active":
                return array("sc_email_client_if_active_top");
                break;
            case "breload":
                return array("sc_b_reload_t.sc-unique-btn-2", "sc_b_reload_b.sc-unique-btn-4");
                break;
            case "btn_back_reqs":
                return array("sc_btn_back_reqs_top", "sc_btn_back_reqs_bot");
                break;
            case "btn_back_renewals":
                return array("sc_btn_back_renewals_top", "sc_btn_back_renewals_bot");
                break;
            case "back_clients":
                return array("sc_back_clients_top", "sc_back_clients_bot");
                break;
            case "close_tab":
                return array("sc_close_tab_top");
                break;
            case "exit":
                return array("sc_b_sai_b.sc-unique-btn-5");
                break;
        }

        return array($buttonName);
    } // getButtonIds

    function displayAppHeader()
    {
    }

    function displayAppFooter()
    {
    }

    function displayAppToolbars()
    {
        if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['run_iframe'] != "R") {
        } else {
            return false;
        }
        return true;
    } // displayAppToolbars

    function displayTopToolbar()
    {
        if (!$this->displayAppToolbars()) {
            return;
        }
    } // displayTopToolbar

    function displayBottomToolbar()
    {
        if (!$this->displayAppToolbars()) {
            return;
        }
    } // displayBottomToolbar

    function getSummaryLine()
    {
        $summaryLine = "[" . $this->Ini->Nm_lang['lang_othr_smry_info_simp'] . "]";
        $summaryLine = str_replace(
            [
                '?final?',
                '?total?',
            ],
            [
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['reg_start'] + 1,
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['total'] + 1,
            ],
            $summaryLine
        );

        return $summaryLine;
    } // getSummaryLine

    function scGetColumnOrderRule($fieldName, &$orderColName, &$orderColOrient, &$orderColRule)
    {
        $sortRule = 'nosort';
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['ordem_cmp'] == $fieldName) {
            $orderColName = $fieldName;
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_clients_staff']['ordem_ord'] == " desc") {
                $orderColOrient = $nome_img = $this->Ini->Label_sort_desc;
                $orderColRule = $sortRule = 'desc';
            } else {
                $orderColOrient = $nome_img = $this->Ini->Label_sort_asc;
                $orderColRule = $sortRule = 'asc';
            }
        }
        return $sortRule;
    }

    function scGetColumnOrderIcon($fieldName, $sortRule)
    {        if ('desc' == $sortRule) {
            return "<img src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_desc . "\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-" . $fieldName . "\" />";
        } elseif ('asc' == $sortRule) {
            return "<img src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_asc . "\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-" . $fieldName . "\" />";
        } elseif ('' != $this->Ini->Label_sort) {
            return "<img src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Label_sort . "\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-" . $fieldName . "\" />";
        } else {
            return '';
        }
    }

    function scIsFieldNumeric($fieldName)
    {
        switch ($fieldName) {
            case "MembershipID":
                return true;
            case "client_id":
                return true;
            case "appn_id":
                return true;
            case "qb_id":
                return true;
            case "memb_qty":
                return true;
            default:
                return false;
        }
        return false;
    }

    function scGetDefaultFieldOrder($fieldName)
    {
        switch ($fieldName) {
            case "MembershipID":
                return 'desc';
            case "client_id":
                return 'desc';
            case "memb_status_id":
                return 'desc';
            case "pricing_level_id":
                return 'desc';
            case "bus_cat_id":
                return 'desc';
            case "bus_subcat_id":
                return 'desc';
            case "permanent_member_date":
                return 'desc';
            case "renewal_date":
                return 'desc';
            case "appn_id":
                return 'desc';
            case "starting_date":
                return 'desc';
            case "expiration_date":
                return 'desc';
            case "cancel_date":
                return 'desc';
            case "retire_date":
                return 'desc';
            case "date_last_updated":
                return 'desc';
            case "archive_date":
                return 'desc';
            case "record_created":
                return 'desc';
            case "appn_date":
                return 'desc';
            case "qb_id":
                return 'desc';
            case "memb_qty":
                return 'desc';
            default:
                return 'asc';
        }
        return 'asc';
    }

}
?>
