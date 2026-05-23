<?php
class AddItem {

    static public function addItemRequest($requestID, $user, $action, $ID, $extra, &$err, $last_action_time, $last_actionident_time, $version, $locale)
	{
		global $conn;
		$xml = '';
	
		$getItemQuery="select * from qbd_item where id='".$ID."'";
		$getItemResult = $conn->query($getItemQuery);
		while($ItemRows=$getItemResult->fetch_assoc())
		{

			$SalesDesc = preg_replace('/[^A-Za-z0-9-& ]/',' ',substr($ItemRows['description'],0,4000));
			
	        $item_name=substr($ItemRows['name'],0,31);
			if($SalesDesc !=""){
				$SalesDesc = $item_name;
			}
			$unitPrice =$ItemRows['amount'];
		
			$xml = '<?xml version="1.0" encoding="utf-8"?>
	                <?qbxml version="13.0"?>
			        <QBXML>
	                   <QBXMLMsgsRq onError="continueOnError">
                          <ItemServiceAddRq>
                             <ItemServiceAdd>
        							<Name>'.$item_name.'</Name> 						
        							<IsActive >true</IsActive>
									<SalesAndPurchase>
        							<SalesDesc >'.$SalesDesc.'</SalesDesc>
        							<SalesPrice >'.$unitPrice.'</SalesPrice>
        							<IncomeAccountRef>
        									<FullName>Cost of Goods Sold</FullName>
        							</IncomeAccountRef>
        							<ExpenseAccountRef>
        									<FullName>Cost of Goods Sold</FullName>
        							</ExpenseAccountRef>	                                    
                                    </SalesAndPurchase>
                              </ItemServiceAdd>
                           </ItemServiceAddRq>
						</QBXMLMsgsRq>
					</QBXML>';	

		file_put_contents("debug/addItemInfo.txt","\n".print_r($xml ,true),FILE_APPEND);

		return $xml;
	   }
	}
	//RESPONSE FROM QUICKBOOK FOR ADD item REQUEST
	static public function addItemResponse($requestID, $user, $action, $ID, $extra, &$err, $last_action_time, $last_actionident_time, $xml, $idents)
	{
		global $conn;

		file_put_contents("debug/addItemInfo.txt","\n".print_r($xml ,true),FILE_APPEND);

		$user = mysqli_real_escape_string($conn,$user);
		$ListID = $idents['ListID'];
		$EditSequence = $idents['EditSequence'];
		$updateItemQ = "UPDATE qbd_item SET item_id= '".$ListID."',edit_sequence = '".$EditSequence."',qbd_sync='1' WHERE id ='".$ID."'";
		$updateItemQResult = $conn->query($updateItemQ);

		file_put_contents("debug/addItemInfo.txt","\n".print_r($updateItemQ ,true),FILE_APPEND);
  	}

  }
	?>