<?php 
// Include configuration file  
require_once 'config.php'; 
 
// Include database connection file  
include_once 'dbConnect.php'; 
 
$payment_id = $statusMsg = ''; 
$status = 'error'; 
 
// Check whether stripe checkout session is not empty 
if(!empty($_GET['session_id'])){ 
    $session_id = $_GET['session_id']; 
     
    // Fetch transaction data from the database if already exists 
    $sqlQ = "SELECT * FROM transactions WHERE stripe_checkout_session_id = ?"; 
    $stmt = $db->prepare($sqlQ);  
    $stmt->bind_param("s", $db_session_id); 
    $db_session_id = $session_id; 
    $stmt->execute(); 
    $result = $stmt->get_result(); 
 
    if($result->num_rows > 0){ 
        // Transaction details 
        $transData = $result->fetch_assoc(); 
        $payment_id = $transData['id']; 
        $transactionID = $transData['txn_id']; 
        $paidAmount = $transData['paid_amount']; 
        $paidCurrency = $transData['paid_amount_currency']; 
        $payment_status = $transData['payment_status']; 
         
        $customer_name = $transData['customer_name']; 
        $customer_email = $transData['customer_email']; 
         
        $status = 'success'; 
        $statusMsg = 'Your Payment has been Successful!'; 
    }else{ 
        // Include the Stripe PHP library 
        require_once 'stripe-php/init.php'; 
         
        // Set API key 
        $stripe = new \Stripe\StripeClient(STRIPE_API_KEY); 
         
        // Fetch the Checkout Session to display the JSON result on the success page 
        try { 
            $checkout_session = $stripe->checkout->sessions->retrieve($session_id); 
        } catch(Exception $e) {  
            $api_error = $e->getMessage();  
        } 
         
        if(empty($api_error) && $checkout_session){ 
            // Get customer details 
            $customer_details = $checkout_session->customer_details; 
 
            // Retrieve the details of a PaymentIntent 
            try { 
                $paymentIntent = $stripe->paymentIntents->retrieve($checkout_session->payment_intent); 
            } catch (\Stripe\Exception\ApiErrorException $e) { 
                $api_error = $e->getMessage(); 
            } 
             
            if(empty($api_error) && $paymentIntent){ 
                // Check whether the payment was successful 
                if(!empty($paymentIntent) && $paymentIntent->status == 'succeeded'){ 
                    // Transaction details  
                    $transactionID = $paymentIntent->id; 
                    $paidAmount = $paymentIntent->amount; 
                    $paidAmount = ($paidAmount/100); 
                    $paidCurrency = $paymentIntent->currency; 
                    $payment_status = $paymentIntent->status; 
                     
                    // Customer info 
                    $customer_name = $customer_email = ''; 
                    if(!empty($customer_details)){ 
                        $customer_name = !empty($customer_details->name)?$customer_details->name:''; 
                        $customer_email = !empty($customer_details->email)?$customer_details->email:''; 
                    } 
                     
                    // Check if any transaction data is exists already with the same TXN ID 
                    $sqlQ = "SELECT id FROM transactions WHERE txn_id = ?"; 
                    $stmt = $db->prepare($sqlQ);  
                    $stmt->bind_param("s", $transactionID); 
                    $stmt->execute(); 
                    $result = $stmt->get_result(); 
                    $prevRow = $result->fetch_assoc(); 
                     
                    if(!empty($prevRow)){ 
                        $payment_id = $prevRow['id']; 
                    }else{ 
                        // Insert transaction data into the database 
                        $sqlQ = "INSERT INTO transactions (customer_name,customer_email,item_name,item_number,item_price,item_price_currency,paid_amount,paid_amount_currency,txn_id,payment_status,stripe_checkout_session_id,created,modified) VALUES (?,?,?,?,?,?,?,?,?,?,?,NOW(),NOW())"; 
                        $stmt = $db->prepare($sqlQ); 
                        $stmt->bind_param("ssssdsdssss", $customer_name, $customer_email, $productName, $productID, $productPrice, $currency, $paidAmount, $paidCurrency, $transactionID, $payment_status, $session_id); 
                        $insert = $stmt->execute(); 
                         
                        if($insert){ 
                            $payment_id = $stmt->insert_id; 
                        } 
                    } 
                     
                    $status = 'success'; 
                    $statusMsg = 'Your Payment has been Successful!'; 
                }else{ 
                    $statusMsg = "Transaction has been failed!"; 
                } 
            }else{ 
                $statusMsg = "Unable to fetch the transaction details! $api_error";  
            } 
        }else{ 
            $statusMsg = "Invalid Transaction! $api_error";  
        } 
    } 
}else{ 
    $statusMsg = "Invalid Request!"; 
} 
?>
<html>
    <head>
            <title> Stripe Payment</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            
            <!-- Stylesheet file -->
            <link href="css/style.css" rel="stylesheet">
            <link href="css/tem_style.css" rel="stylesheet"> 
    </head>
    <body>
<?php 
if(!empty($payment_id)){

    notifyToCustomer($payment_id,$status,$statusMsg,$transactionID,$paidAmount,$payment_status,$customer_name,$customer_email,$productName,$productPrice,$currency,$paidCurrency);

 ?>
    <div class="container">
<div class="row">
    
  <div class="col-sm-12">
    <table class="body-wrap">
    <tbody>
        <tr>
        <td></td>
        <td class="container" width="800">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="content-wrap aligncenter">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                    <td class="content-block" style="text-align: center;">
                                        <h2>Thanks for using our app</h2>
                                        <h2 class="<?php echo $status; ?>"><?php echo $statusMsg; ?></h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <table class="invoice">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <h4>Payment Information</h4>
                                                    <p><b>Reference Number:</b> <?php echo $payment_id; ?></p>
                                                    <p><b>Transaction ID:</b> <?php echo $transactionID; ?></p>
                                                    <p><b>Paid Amount:</b> $<?php echo $paidAmount.' '.$paidCurrency; ?></p>
                                                    <p><b>Payment Status:</b> <?php echo $payment_status; ?></p></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h4>Customer Information</h4>
                                                    <p><b>Name:</b> <?php echo $customer_name; ?></p>
                                                    <p><b>Email:</b> <?php echo $customer_email; ?></p>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                        <tbody>

                                                        <tr>
                                                            <h4>Product Information</h4>
                                                            <td><?php echo $productName; ?></td>
                                                            <td class="alignright">$ <?php echo $productPrice.' '.$currency; ?></td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </td>
                                </tr>
                               
                                
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
                <div class="footer">
                    <table width="100%">
                        <tbody><tr>
                            <td class="aligncenter content-block">Questions? Email <a href="mailto:">support@company.inc</a></td>
                        </tr>
                    </tbody></table>
                </div></div>
        </td>
        <td></td>
    </tr>
</tbody></table>
<?php }else{ ?>
    <h1 class="error">Your Payment been failed!</h1>
    <p class="error"><?php echo $statusMsg; ?></p>
    </div>
</div>
</div>
</body>
</html>
<?php } ?>

<?php 

 function notifyToCustomer($payment_id,$status,$statusMsg,$transactionID,$paidAmount,$payment_status,$customer_name,$customer_email,$productName,$productPrice,$currency,$paidCurrency){

    $fromEmail='';

    $body = '<html>
            <head>
            <title> Stripe Payment Gateway Integration in PHP </title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            <link href="css/style.css" rel="stylesheet">
            <link href="css/tem_style.css" rel="stylesheet">       
    </head>
    <body>
    <div class="container">
    <div class="row">
    <div class="col-sm-12">
    <table class="body-wrap">
    <tbody>
        <tr>
        <td></td>
        <td class="container" width="800">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="content-wrap aligncenter">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                    <td class="content-block" style="text-align: center;">
                                        <h2>Thanks for using our app</h2>
                                        <h2 class="'.$status.'">'. $statusMsg.'</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <table class="invoice">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <h4>Payment Information</h4>
                                                    <p><b>Reference Number:</b>'. $payment_id.'</p>
                                                    <p><b>Transaction ID:</b> '. $transactionID.'</p>
                                                    <p><b>Paid Amount:</b> $'.  $paidAmount.' '.$paidCurrency.'</p>
                                                    <p><b>Payment Status:</b> '. $payment_status.'</p></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h4>Customer Information</h4>
                                                    <p><b>Name:</b> '. $customer_name.'</p>
                                                    <p><b>Email:</b> '. $customer_email.'</p>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                        <tbody>

                                                        <tr>
                                                            <h4>Product Information</h4>
                                                            <td>'. $productName.'</td>
                                                            <td class="alignright">$ '. $productPrice.' '.$currency.'</td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
                <div class="footer">
                    <table width="100%">
                        <tbody><tr>
                            <td class="aligncenter content-block">Questions? Email <a href="mailto:">support@company.inc</a></td>
                        </tr>
                    </tbody></table>
                </div>
            </div>
        </td>
        <td></td>
    </tr>
</tbody>
</table>
    </div>
</div>
</div>
</body>
</html>';
$subject = "Login Credentials";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <'.$fromEmail.'>' . "\r\n";
// $headers .= 'Cc: myboss@example.com' . "\r\n";
//$email_to = 'arunbikapur@gmail.com';

$send = mail($customer_email, $subject, $body, $headers);
if($send){
   // echo "Email Sent Successfully";
   }else{
    //echo "Email Not Sent Successfully";
   }
}

?>
