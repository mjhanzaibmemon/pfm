<?php

    // I always program in E_STRICT error mode... 
	error_reporting(E_ALL | E_STRICT);
	ini_set('display_errors', 1);

	// We need to make sure the correct time zone is set, or some PHP installations will complain
	if (function_exists('date_default_timezone_set'))
	{
		//date_default_timezone_set('Asia/Kolkata');
		date_default_timezone_set('America/New_York');
	}
	// Require the framework
	require_once 'QuickBooks.php';
	require_once 'QuickBooks/WebConnector/Handlers.php';
	require_once 'Classes/include.php';
	require_once '../dbConnect.php';

	$user = 'quickbooks';
	$pass = 'password';

	/**
	 * Configuration parameter for the quickbooks_config table, used to keep track of the last time the QuickBooks sync ran
	 */
	define('QB_QUICKBOOKS_CONFIG_LAST', 'last');

	define('QB_QUICKBOOKS_CONFIG_CURR', 'curr');

	define('QB_QUICKBOOKS_MAX_RETURNED', 1000);

	// Map QuickBooks actions to handler functions
	$map = array(
	
		
		QUICKBOOKS_ADD_CUSTOMER=>array('AddCustomer::addCustomerRequest','AddCustomer::addCustomerResponse'),
		QUICKBOOKS_SEARCH_CUSTOMER=>array('SearchCustomer::customerSearchRequest','SearchCustomer::customerSearchResponse'),
		QUICKBOOKS_ADD_ITEM=>array('AddItem::addItemRequest','AddItem::addItemResponse'),
		QUICKBOOKS_ADD_Invoice=>array('AddInvoice::addInvoiceRequest','AddInvoice::addInvoiceResponse'),
		QUICKBOOKS_ADD_PAYMENT=>array('AddPayment::addPaymentRequest','AddPayment::addPaymentResponse'),
	);

	// Error handlers
	$errmap = array(
		500 => '_quickbooks_error_e500_notfound', 			// Catch errors caused by searching for things not present in QuickBooks
		1 => '_quickbooks_error_e500_notfound', 
		'*' => '_quickbooks_error_catchall', 				// Catch any other errors that might occur
		);

	// An array of callback hooks
	$hooks = array(
		QuickBooks_WebConnector_Handlers::HOOK_LOGINSUCCESS => '_quickbooks_hook_loginsuccess', 	// call this whenever a successful login occurs
		QuickBooks_WebConnector_Handlers::HOOK_CLOSECONNECTION => '_quickbooks_hook_closeconnection', 	// call this whenever a successful login occurs
		);

	// Logging level
	//$log_level = QUICKBOOKS_LOG_DEBUG;				// Use this level until you're sure everything works!!!
	$log_level = QUICKBOOKS_LOG_DEVELOP;

	// What SOAP server you're using 
	$soapserver = QUICKBOOKS_SOAPSERVER_BUILTIN;		// A pure-PHP SOAP server (no PHP ext/soap extension required, also makes debugging easier)

	$soap_options = array(			// See http://www.php.net/soap
		);

	$handler_options = array(		// See the comments in the QuickBooks/Server/Handlers.php file
		'deny_concurrent_logins' => false, 
		'deny_reallyfast_logins' => false, 
		);		

	$driver_options = array(		// See the comments in the QuickBooks/Driver/<YOUR DRIVER HERE>.php file ( i.e. 'Mysql.php', etc. )
		);

	$callback_options = array(
		);

	// * MAKE SURE YOU CHANGE THE DATABASE CONNECTION STRING BELOW TO A VALID MYSQL USERNAME/PASSWORD/HOSTNAME *

	$dsn = 'mysqli://'.$username.':'.$password.'@'.$servername.'/'.$dbname;	

	/**
	 * Constant for the connection string (because we'll use it in other places in the script)
	 */
	define('QB_QUICKBOOKS_DSN', $dsn);

	// If we haven't done our one-time initialization yet, do it now!
	if (!QuickBooks_Utilities::initialized($dsn))
	{
		// Create the database tables
		QuickBooks_Utilities::initialize($dsn);
		
		// Add the default authentication username/password
		QuickBooks_Utilities::createUser($dsn, $user, $pass);
	}

	// Initialize the queue
	QuickBooks_WebConnector_Queue_Singleton::initialize($dsn);

	// Create a new server and tell it to handle the requests
	$Server = new QuickBooks_WebConnector_Server($dsn, $map, $errmap, $hooks, $log_level, $soapserver, QUICKBOOKS_WSDL, $soap_options, $handler_options, $driver_options, $callback_options);
	$response = $Server->handle(true, true);

/**
 * Login success hook - perform an action when a user logs in via the Web Connector 
 */
function _quickbooks_hook_loginsuccess($requestID, $user, $hook, &$err, $hook_data, $callback_config)
{
	// For new users, we need to set up a few things
	// Fetch the queue instance
	$Queue = QuickBooks_WebConnector_Queue_Singleton::getInstance();
	global $conn;
	global $map;
	
    $sql = $conn->query("truncate quickbooks_log");
    $sql = $conn->query("truncate quickbooks_queue");
	$date = '1983-01-02 12:01:01';
   
   
    // Note:-  High priority queue exicute first.

    //here some extra logic trying.
	$customerSearchQuery="SELECT id,customer_email FROM `transactions` WHERE `customer_id` IS NULL";
    $customerSearchRes =$conn->query($customerSearchQuery);
    if($customerSearchRes->num_rows>0) {
      	while($cusData = mysqli_fetch_assoc($customerSearchRes)) {

      			$Queue->enqueue(QUICKBOOKS_SEARCH_CUSTOMER,$cusData['id'],110,null,$user,null,false);
      	}
    }


	$ID ='';
	$addCustomerInQb="SELECT * FROM `transactions` WHERE `customer_id` IS NULL";
	$resultsql_customer=mysqli_query($conn,$addCustomerInQb); 
	if ($resultsql_customer->num_rows > 0) { 
	    $row_add_customer=mysqli_fetch_all($resultsql_customer,MYSQLI_ASSOC); 
		foreach ($row_add_customer as $row_add) {	    
			    $ID_add_customer = $row_add['id']; 
		        $Queue->enqueue(QUICKBOOKS_ADD_CUSTOMER,$ID_add_customer,70,null,$user,null,false);
	    }
	}

	$addProductInQb="SELECT * FROM `qbd_item` WHERE `qbd_sync` = '0'";
	$addProductInQbResult=mysqli_query($conn,$addProductInQb);  
	if($addProductInQbResult->num_rows > 0) { 
	    while($addItemRow=$addProductInQbResult->fetch_assoc()) {
		     $Queue->enqueue(QUICKBOOKS_ADD_ITEM,$addItemRow['id'],50,null,$user,null,false);
	    }
	}    
	
    $createInvoice="SELECT id from transactions WHERE `invoice_id` IS NULL";
    $createInvoiceResult=mysqli_query($conn,$createInvoice); 
    if($createInvoiceResult->num_rows > 0) { 

	    while($InvoiceRow = $createInvoiceResult->fetch_assoc()) {
	 
			$Queue->enqueue(QUICKBOOKS_ADD_Invoice,$InvoiceRow['id'],35,null,$user,null,false);

	    }
	} 

	//define('QUICKBOOKS_ADD_PAYMENT','addPayments');
	$createPayment="SELECT id from transactions WHERE `invoice_id` IS NOT NULL AND `payment_id` IS NULL";
    $createPaymentResult=mysqli_query($conn,$createPayment); 
    if($createPaymentResult->num_rows > 0) { 

	    while($paymentRow = $createPaymentResult->fetch_assoc()) {
	 
			$Queue->enqueue(QUICKBOOKS_ADD_PAYMENT,$paymentRow['id'],35,null,$user,null,false);

	    }
	}

}

/**
 * Get the last date/time the QuickBooks sync ran
 */
function _quickbooks_get_last_run($user, $action)
{
	$type = null;
	$opts = null;
	return QuickBooks_Utilities::configRead(QB_QUICKBOOKS_DSN, $user, md5(__FILE__), QB_QUICKBOOKS_CONFIG_LAST . '-' . $action, $type, $opts);
}

/**
 * Set the last date/time the QuickBooks sync ran to NOW
 */
function _quickbooks_set_last_run($user, $action, $force = null)
{
	$value = date('Y-m-d') . 'T' . date('H:i:s');
	
	if ($force)
	{
		$value = date('Y-m-d', strtotime($force)) . 'T' . date('H:i:s', strtotime($force));
	}
	
	return QuickBooks_Utilities::configWrite(QB_QUICKBOOKS_DSN, $user, md5(__FILE__), QB_QUICKBOOKS_CONFIG_LAST . '-' . $action, $value);
}

function _quickbooks_get_current_run($user, $action)
{
	$type = null;
	$opts = null;
	return QuickBooks_Utilities::configRead(QB_QUICKBOOKS_DSN, $user, md5(__FILE__), QB_QUICKBOOKS_CONFIG_CURR . '-' . $action, $type, $opts);	
}

function _quickbooks_set_current_run($user, $action, $force = null)
{
	$value = date('Y-m-d') . 'T' . date('H:i:s');
	
	if ($force)
	{
		$value = date('Y-m-d', strtotime($force)) . 'T' . date('H:i:s', strtotime($force));
	}
	
	return QuickBooks_Utilities::configWrite(QB_QUICKBOOKS_DSN, $user, md5(__FILE__), QB_QUICKBOOKS_CONFIG_CURR . '-' . $action, $value);	
}

	
function _quickbooks_error_e500_notfound($requestID, $user, $action, $ID, $extra, &$err, $xml, $errnum, $errmsg)
{
	$Queue = QuickBooks_WebConnector_Queue_Singleton::getInstance();
	//file_put_contents("error_e500_notfound.xml","\n" . print_r($errmsg,true),FILE_APPEND);
	return true;
}


/**
 * Catch any errors that occur
 * 
 * @param string $requestID			
 * @param string $action
 * @param mixed $ID
 * @param mixed $extra
 * @param string $err
 * @param string $xml
 * @param mixed $errnum
 * @param string $errmsg
 * @return void
 */
function _quickbooks_error_catchall($requestID, $user, $action, $ID, $extra, &$err, $xml, $errnum, $errmsg)
{
	//file_put_contents("error_catchall.xml","\n" . print_r($errmsg,true),FILE_APPEND);
	global $conn;
	
	$date = date("Y-m-d h:i"); 
	
	$Insert = "INSERT INTO error_log (action,record_id,errornum,errormsg,syncdate) VALUES ('$action','$ID','$errnum','$errmsg','$date')";
	
	$retInsert = mysqli_query($conn, $Insert);
	
	return true;
}

function _quickbooks_hook_closeconnection($obj)
{
	//CURL call
	/* $url ='';

	// ini_set('max_execution_time', 1200);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_VERBOSE, true);
	curl_exec($ch);
	
	return true;  */
}

?>
