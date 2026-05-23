<?php
class AddCustomer
{	
	//REQUEST TO ADD NEW CUSTOMER IN QUICKBOOKS ms
	static public function addCustomerRequest($requestID, $user, $action, $ID, $extra, &$err, $last_action_time, $last_actionident_time, $version, $locale)
	{
		global $conn;
		$xml = '';
		$CustomerAdd='';

		$contactQuery="select customer_name,customer_email from transactions where id='".$ID."'";
		$result_get = $conn->query($contactQuery);	
     	while($contactRow=$result_get->fetch_assoc())
	       {
				
		       	$notes='';
				$Customer_Name =substr($contactRow['customer_name'], 0, 40);		
				$Customer_Email = htmlentities($contactRow['customer_email']);
				$customerNameRes=explode(' ',$Customer_Name);
				$firstName='';
				$lastName='';
				if(isset($customerNameRes[0])){
					$firstName=preg_replace('/[^A-Za-z0-9\-]/',' ',substr($customerNameRes[0],0,24));
				}
				if(isset($customerNameRes[1])){
					$lastName=preg_replace('/[^A-Za-z0-9\-]/',' ',substr($customerNameRes[1],0,24));
				}
				

            $BillAddress1=$BillAddress2=$BillCity=$BillState=$BillPostalCode=$BillCountry='';
            $ShipAddress1=$ShipAddress2=$ShipCity=$ShipState=$ShipPostalCode=$ShipCountry=$phone='';
                
          
				
				$CustomerAdd.='<CustomerAdd>
						<Name>'.$Customer_Name.'</Name>			
                        <FirstName>'.$firstName.'</FirstName>
                        <LastName>'.$lastName.'</LastName>
						<BillAddress>
							<Addr1>'.$BillAddress1.' </Addr1>
							<City>'.$BillCity.'</City>
							<State>'.$BillState.'</State>
							<PostalCode>'.$BillPostalCode.'</PostalCode>
							<Country>'.$BillCountry.'</Country>
						</BillAddress>
						<ShipAddress>
							<Addr1>'.$BillAddress1.' </Addr1>
							 <City>'.$BillCity.'</City>
							<State>'.$BillState.'</State>
							<PostalCode>'.$BillPostalCode.'</PostalCode>
							<Country>'.$BillCountry.'</Country>
						</ShipAddress>
						<Phone>'.$phone.'</Phone>
					    <Email>'.$Customer_Email.'</Email>
					</CustomerAdd>';
				
		}	
		$xml ='<?xml version="1.0"?>
			  <?qbxml version="13.0"?>
			  <QBXML>
				 <QBXMLMsgsRq onError="continueOnError">
					<CustomerAddRq requestID="' .$requestID. '">
						'.$CustomerAdd.'
					</CustomerAddRq>
				 </QBXMLMsgsRq>
			  </QBXML>';	
		
		file_put_contents("debug/addCustomerInfo.txt","\n".print_r($xml,true),FILE_APPEND);	  
	   	
		return $xml;
	}
	
	//RESPONSE FROM QUICKBOOK FOR ADD CUSTOMER REQUEST
	
	static public function addCustomerResponse($requestID, $user, $action, $ID, $extra, &$err, $last_action_time, $last_actionident_time, $xml, $idents)
	{
		global $conn;
		
	    file_put_contents("debug/addCustomerInfo.txt","\n".print_r($idents ,true),FILE_APPEND);
	
		$user = mysqli_real_escape_string($conn,$user);
		$ListID = $idents['ListID'];
		//$EditSequence = $idents['EditSequence'];

		$updateQuery = "UPDATE transactions SET customer_id ='".$ListID."' WHERE id = '".$ID."'";
		file_put_contents("debug/addCustomerInfo.txt","\n".print_r($updateQuery ,true),FILE_APPEND);
		$updateQueryResult = $conn->query($updateQuery);
	}
}

?>