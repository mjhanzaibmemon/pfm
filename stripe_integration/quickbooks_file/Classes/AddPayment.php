<?php 
class AddPayment {

	static public function addPaymentRequest($requestID, $user, $action, $ID, $extra, &$err, $last_action_time, $last_actionident_time, $version, $locale) {
		global $conn;

		$ReqXml = '';
		$Term = '';
		$InvoiceQuery="select * from transactions where id='".$ID."'";
		//file_put_contents("debug/AddPaymentResponseXML.xml",print_r($InvoiceQuery,true),FILE_APPEND);
		
		$InvoiceQueryResult = $conn->query($InvoiceQuery);

		while($InvoiceRow=$InvoiceQueryResult->fetch_assoc()) {   
           
            //$RefNumber=substr($InvoiceRow['txn_id'],0,11);
			$created_at=$InvoiceRow['created'];
			
			$date = strtotime($created_at);
           	$dates = date('Y-m-d');

			$ReqXml='<?xml version="1.0" encoding="utf-8"?>
				     <?qbxml version="13.0"?>
					 <QBXML>
						<QBXMLMsgsRq onError="continueOnError">
						<ReceivePaymentAddRq>
							<ReceivePaymentAdd > 
								<CustomerRef>
								   <ListID>'.$InvoiceRow['customer_id'].'</ListID>
								</CustomerRef>
							    <TxnDate>'.$dates.'</TxnDate>
							    
							    <TotalAmount>'.number_format($InvoiceRow['item_price'], 2).'</TotalAmount>
							    <AppliedToTxnAdd>
									<TxnID>'.$InvoiceRow['invoice_id'].'</TxnID>
									<PaymentAmount>'.number_format($InvoiceRow['item_price'], 2).'</PaymentAmount>
								</AppliedToTxnAdd>
						    </ReceivePaymentAdd >
						</ReceivePaymentAddRq>
					</QBXMLMsgsRq>
			    </QBXML>';
		}	

		file_put_contents("debug/AddPaymentResponseXML.xml","\n".print_r($ReqXml,true),FILE_APPEND);

		return $ReqXml;		

	}

	static public function addPaymentResponse($requestID, $user, $action, $ID, $extra, &$err, $last_action_time, $last_actionident_time, $ResXml, $idents)
    {

    	file_put_contents("debug/AddPaymentResponseXML.txt","\n".print_r($ResXml ,true),FILE_APPEND);
    	
    	global $conn;
		$errnum = 0;
		$errmsg = '';
		$date = date("Y-m-d h:i");
		$count = 0;
        $updatePayment = "UPDATE transactions SET payment_id ='".$idents['TxnID']."' WHERE id = '".$ID."'";
        file_put_contents("debug/AddPaymentResponseXML.txt","\n".print_r($updatePayment ,true),FILE_APPEND);
        $updatePaymentResult=$conn->query($updatePayment);

      
    }	
}