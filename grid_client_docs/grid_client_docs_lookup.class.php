<?php
class grid_client_docs_lookup
{
//  
   function lookup_doc_type(&$doc_type) 
   {
      $conteudo = "" ; 
      $doc_type_1 = explode(";", $doc_type) ;
      if (in_array("Active Secretary of State Registration", $doc_type_1))
      { 
          $conteudo .= "Active Secretary of State Registration" . " ";
      } 
      if (in_array("City Business License", $doc_type_1))
      { 
          $conteudo .= "City Business License" . " ";
      } 
      if (in_array("Agricultural License", $doc_type_1))
      { 
          $conteudo .= "Agricultural License" . " ";
      } 
      if (in_array("Other type of document", $doc_type_1))
      { 
          $conteudo .= "Other type of document" . " ";
      } 
      if (!empty($conteudo)) 
      { 
          $doc_type = $conteudo; 
      } 
   }  
}
?>
