<?php 
class AddInvoice {

	static public function addInvoiceRequest($requestID, $user, $action, $ID, $extra, &$err, $last_action_time, $last_actionident_time, $version, $locale) {
		global $conn;

		$ReqXml = '';
		$Term = '';
		$InvoiceQuery="select * from transactions where id='".$ID."'";
		//file_put_contents("debug/AddInvoiceDebug.xml",print_r($InvoiceQuery,true),FILE_APPEND);
		
		$InvoiceQueryResult = $conn->query($InvoiceQuery);

		while($InvoiceRow=$InvoiceQueryResult->fetch_assoc()) {   
           
            //$RefNumber=substr($InvoiceRow['txn_id'],0,11);
			$created_at=$InvoiceRow['created'];
			
			$Term = "";	
			
			$date = strtotime($created_at);
           	$dates = date('Y-m-d');

            $description='';       
            // variable declation
			$billinfoXml='';
			$BillState=$BillPostalCode=$BillCountry='';
			$BillAddress1=$billing_address2=$BillCity='';

			//shipping variable declaration
			$shipinfoXml='';
            $ShipState=$ShipPostalCode='';
            $ShipAddress1=$ShipCity='';
            $ShipCountry='';
			$customerListId="";
                        
			$InvoiceLineXml='';			
	        
	        //get item list id from qb product table for line item
			$itemQuery="SELECT item_id FROM qbd_item where name='".$InvoiceRow['item_name']."'";
            $itemQResult=$conn->query($itemQuery);
     		$itemData=mysqli_fetch_assoc($itemQResult);
     		$itemId='';
     		if(isset($itemData['item_id']) && $itemData['item_id']!=''){
     			$itemId=$itemData['item_id'];
     		}

            $lineDescription='';
            $lineDescription=preg_replace('/[^A-Za-z0-9-& ]/','',substr($InvoiceRow['item_number'],0,3999));
			
			$InvoiceLineXml.='<InvoiceLineAdd>
		       <ItemRef>
					<FullName>' . $InvoiceRow['item_name'] . '</FullName>
				</ItemRef>
                
                
				<Desc>'.str_replace("&","&amp;",$lineDescription).'</Desc> 
				<Quantity>1</Quantity>				
				<Rate>'.$InvoiceRow['item_price'].'</Rate>			 							
		     </InvoiceLineAdd>';


	               
	 $TemplateRef = "Final Invoice";
				$ReqXml.='<?xml version="1.0" encoding="utf-8"?>
					     <?qbxml version="13.0"?>
						 <QBXML>
							<QBXMLMsgsRq onError="continueOnError">
							<InvoiceAddRq>
								<InvoiceAdd> 
									<CustomerRef>
									   <ListID>'.$InvoiceRow['customer_id'].'</ListID>
									</CustomerRef>
									
									    <TxnDate>'.$dates.'</TxnDate>';
									    
									$ReqXml .= $InvoiceLineXml;
												$ReqXml .= '</InvoiceAdd>
											</InvoiceAddRq>
										</QBXMLMsgsRq>
									    </QBXML>';
		}	

		file_put_contents("debug/AddInvoiceRequestXml.xml","\n".print_r($ReqXml,true),FILE_APPEND);

		return $ReqXml;		

	}
	static public function addInvoiceResponse($requestID, $user, $action, $ID, $extra, &$err, $last_action_time, $last_actionident_time, $ResXml, $idents)
    {

    	file_put_contents("debug/AddInvoiceResponseXML.txt","\n".print_r($ResXml ,true),FILE_APPEND);
    	
    	global $conn;
		$errnum = 0;
		$errmsg = '';
		$date = date("Y-m-d h:i");
		$count = 0;
        $updateInvoice = "UPDATE transactions SET invoice_id ='".$idents['TxnID']."' WHERE id = '".$ID."'";

        file_put_contents("debug/AddInvoiceResponseXML.txt","\n".print_r($updateInvoice ,true),FILE_APPEND);
        $updateInvoiceResult=$conn->query($updateInvoice);

      
    }	
}