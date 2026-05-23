<?php 

class SearchCustomer{
	/**
	 * Build a request to import customers already in QuickBooks into our application
	 */
	static public function customerSearchRequest($requestID, $user, $action, $ID, $extra, &$err, $last_action_time, $last_actionident_time, $version, $locale)
	{
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

		$contactQuery="select customer_name,customer_email from transactions where id='".$ID."'";
		$result_get = $conn->query($contactQuery);	
     	while($contactRow=$result_get->fetch_assoc())
	       {

      			// Build the request
				$xml = '<?xml version="1.0" encoding="utf-8"?>
					<?qbxml version="13.0"?>
					<QBXML>
						<QBXMLMsgsRq onError="stopOnError">
							<CustomerQueryRq' . $attr_iterator . ' ' . $attr_iteratorID . ' requestID="' . $requestID . '">
								<MaxReturned>' . QB_QUICKBOOKS_MAX_RETURNED . '</MaxReturned>
								<NameFilter>
									<MatchCriterion>Contains</MatchCriterion> 
									<Name>'.str_replace('&','&amp;',$contactRow['customer_name']).'</Name> 
								</NameFilter>
								<OwnerID>0</OwnerID>
							</CustomerQueryRq>	
						</QBXMLMsgsRq>
					</QBXML>';
				
				file_put_contents("debug/searchCustomerInfo.txt","\n".print_r($xml ,true),FILE_APPEND);	
				return $xml;
				
	      	}
	}
	/** 
	 * Handle a customer export response from QuickBooks 
	 */
	static public function customerSearchResponse($requestID, $user, $action, $ID, $extra, &$err, $last_action_time, $last_actionident_time, $xml, $idents)
	{	
		global $conn;
		
	    file_put_contents("debug/searchCustomerInfo.txt","\n".print_r($idents ,true),FILE_APPEND);
	
		$updateQuery = "UPDATE transactions SET customer_id ='".$idents['ListID']."' WHERE id = '".$ID."'";
		file_put_contents("debug/addCustomerInfo.txt","\n".print_r($updateQuery ,true),FILE_APPEND);
		$updateQueryResult = $conn->query($updateQuery);
	
		return true;
	}
}

?>