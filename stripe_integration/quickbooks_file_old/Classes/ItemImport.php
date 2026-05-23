<?php
	class ItemImport
	{
		
		static public function itemImportRequest($requestID, $user, $action, $ID, $extra, &$err, $last_action_time, $last_actionident_time, $version, $locale) {
	    global $conn;
		$xml = '';
		$attr_iteratorID = '';
			$attr_iterator = ' iterator="Start" ';
			if (empty($extra['iteratorID']))
			{
				// This is the first request in a new batch
				$last = _quickbooks_get_last_run($user, $action);
				_quickbooks_set_last_run($user, $action);			// Update the last run time to NOW()
				// Set the current run to $last
				$now = date('Y-m-d') . 'T' . date('H:i:s');
				_quickbooks_set_current_run($user, $action, $last);
			}
			else
			{
				// This is a continuation of a batch
				$attr_iteratorID = ' iteratorID="' . $extra['iteratorID'] . '" ';
				$attr_iterator = ' iterator="Continue" ';
			
				$last = _quickbooks_get_current_run($user, $action);
			}
        //xml body get all item
			$xml = '<?xml version="1.0" encoding="utf-8"?>
			<?qbxml version="' . $version . '"?>
			<QBXML>
				<QBXMLMsgsRq onError="continueOnError">
					<ItemQueryRq ' . $attr_iterator . ' ' . $attr_iteratorID . ' requestID="' . $requestID . '">
						<MaxReturned>' . QB_QUICKBOOKS_MAX_RETURNED . '</MaxReturned>
						<OwnerID>0</OwnerID>
					</ItemQueryRq>	
				</QBXMLMsgsRq>
			</QBXML>';
		//file_put_contents('debug/ItemReqXml.txt',"\n" . print_r($xml,true),FILE_APPEND);
			return $xml;
		}
static public function itemImportResponse($requestID, $user, $action, $ID, $extra, &$err, $last_action_time, $last_actionident_time, $xml, $idents) 
{
	
	

	
	
		    global $conn;		
			include("accessToken.php");
$token=GenrateZohoAccessToken($conn);			
			// Import all of the records
			$errnum = 0;
			$errmsg = '';
			$xml = $xml;
			$Parser = new QuickBooks_XML_Parser($xml);
			$date = date("Y-m-d");
			if ($Doc = $Parser->parse($errnum, $errmsg))
			{
				$Root = $Doc->getRoot();
				$List = $Root->getChildAt('QBXML/QBXMLMsgsRs/ItemQueryRs');
				
				$ListIDNew = array();
				
				foreach ($List->children() as $Item)
				{
					 file_put_contents('debug/Item.txt',"\n" . print_r($Item,true),FILE_APPEND);
					$ret = $Item->name();			
			  $itemArr = array(
					'listId' => $Item->getChildDataAt($ret . ' ListID'),
					'editSequence' => $Item->getChildDataAt($ret . ' EditSequence'),
					'productName' => $Item->getChildDataAt($ret . ' Name'),
					'rate' => $Item->getChildDataAt($ret . 'SalesOrPurchase Price'),
				        );
				
                         file_put_contents('arr.txt',"\n" . print_r($itemArr,true),FILE_APPEND);
				$i=0;
				foreach ($itemArr as $key => $value)
				{
					$arr2[$i] = $key."='".mysqli_real_escape_string($conn,$value)."'";
					$i++;
					$itemArr[$key] = mysqli_real_escape_string($conn,$value);
				}

                          $checkItemSql = "SELECT listId FROM `qb_product` where productName = '".mysqli_real_escape_string($conn,$itemArr['productName'])."'";
		$queryRes = $conn->query($checkItemSql);
		if($queryRes->num_rows>0) {

			$update_column=implode(",",$arr2);
			$itemUpdate = "UPDATE qb_product SET ".$update_column.",qb_status=1 where productName = '".mysqli_real_escape_string($conn,$itemArr['productName'])."'";
			$result_update = $conn->query($itemUpdate);
			//file_put_contents('debug/update.txt',"\n" . print_r($itemUpdate,true),FILE_APPEND);	
			
			$checkEstItem="select z_id from zinvoice_items where Item_Name='".$itemArr['productName']."'";
					
		            $checkEstItemRes=$conn->query($checkEstItem);
					if ($checkEstItemRes->num_rows > 0) {
					}else{
						
						 $token=GenrateZohoAccessToken($conn);
						
						
						$name = $itemArr['productName'];
						$rate = $itemArr['rate'];
											$fields=json_encode(
        array(
           "data"=>
            array(
            [
              "Product_Name"=>$name,
              "Unit_Price"=>$rate,
              "Description"=>$name,
			  "Qb_Sync"=>"Yes"
            ])
         
    ));


$accountUrl="https://www.zohoapis.com/crm/v2/products";


$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$accountUrl);
    
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_TIMEOUT,30);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);        
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch,CURLOPT_HTTPHEADER, array(
            "Authorization:".$token,
            "Content-Type: application/x-www-form-urlencoded;charset=UTF-8"
        ));
    

        $orderResData = curl_exec($ch);
		$err = curl_error($ch);
		


						curl_close($ch);

						if ($err) {
						  // echo "cURL Error #:" . $err;
						  file_put_contents("debug/Item_Z_Res_err.txt","\n".print_r($err,true),FILE_APPEND);
						} else {
							$custinsertData = json_decode($orderResData,true);
		file_put_contents("debug/Item_Z_Res.txt","\n".print_r($custinsertData,true),FILE_APPEND);
							if($custinsertData['data'][0]['code']=="SUCCESS"){
						 $itemID = $custinsertData['data'][0]['details']['id']; 
						  
						  // $itemID = $dataRes['item']['item_id'];
						  $sql = "INSERT INTO zinvoice_items (z_id, Item_Name)
							VALUES ('".$itemID."', '".$name."')";

							if ($conn->query($sql) === TRUE) {
							  // echo "New record created successfully";
							} else {
							  // echo "Error: " . $sql . "<br>" . $conn->error;
							}
							}
						  
						}
					}
			
			
			
		}else{
			
			$insertItem="INSERT INTO qb_product
						(
							".implode(", ", array_keys($itemArr)).",qb_status
						) VALUES (
							'".implode("','",array_values($itemArr))."','1'
				    	)";
						file_put_contents('insertItem.txt',"\n" . print_r($insertItem,true),FILE_APPEND);
			$result2 = $conn->query($insertItem);
			//file_put_contents('debug/insertItem.txt',"\n" . print_r($insertItem,true),FILE_APPEND);
			
			$checkEstItem="select z_id from zinvoice_items where Item_Name='".$itemArr['productName']."'";
					
		            $checkEstItemRes=$conn->query($checkEstItem);
					if ($checkEstItemRes->num_rows > 0) {
					}else{
						
						 $token=GenrateZohoAccessToken($conn);
						
						
						$name = $itemArr['productName'];
						$rate = $itemArr['rate'];
											$fields=json_encode(
        array(
           "data"=>
            array(
            [
              "Product_Name"=>$name,
              "Unit_Price"=>$rate,
              "Description"=>$name,
			  "Qb_Sync"=>"Yes"
            ])
         
    ));


$accountUrl="https://www.zohoapis.com/crm/v2/products";


$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$accountUrl);
    
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_TIMEOUT,30);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);        
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch,CURLOPT_HTTPHEADER, array(
            "Authorization:".$token,
            "Content-Type: application/x-www-form-urlencoded;charset=UTF-8"
        ));
    

        $orderResData = curl_exec($ch);
		$err = curl_error($ch);
		


						curl_close($ch);

						if ($err) {
						  // echo "cURL Error #:" . $err;
						  file_put_contents("debug/Item_Z_Res_err.txt","\n".print_r($err,true),FILE_APPEND);
						} else {
							$custinsertData = json_decode($orderResData,true);
		file_put_contents("debug/Item_Z_Res.txt","\n".print_r($custinsertData,true),FILE_APPEND);
							if($custinsertData['data'][0]['code']=="SUCCESS"){
						 $itemID = $custinsertData['data'][0]['details']['id']; 
						  
						  // $itemID = $dataRes['item']['item_id'];
						  $sql = "INSERT INTO zinvoice_items (z_id, Item_Name)
							VALUES ('".$itemID."', '".$name."')";

							if ($conn->query($sql) === TRUE) {
							  // echo "New record created successfully";
							  file_put_contents("debug/zinvoice_items_sql.txt","\n".print_r($sql,true),FILE_APPEND);
							} else {
							  // echo "Error: " . $sql . "<br>" . $conn->error;
							}
							}
						}
					}
		}

	     
		}
	}
		 return true;
		}
}
?>
