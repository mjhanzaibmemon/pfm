<?php 
// Include configuration file   
require_once 'config.php';  
?>

<html>
    <head>
            <title> Stripe Payment Gateway Integration in PHP </title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            
            <!-- Stylesheet file -->
            <link href="css/style.css" rel="stylesheet">
            
    </head>
    <body>

        
<div class="container">
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-8"><!-- Display errors returned by checkout session -->
        <div id="paymentResponse" class="hidden"></div>
            
        <!-- Product details -->
        <h2><?php echo $productName; ?></h2>
        <img src="images/images.jpg"/>
        <p>All members start at this.</p>
        <p>Product Name: <b><?php echo $productName; ?></b></p>
        <p>Product Id: <b><?php echo $productID; ?></b></p>
        <p>Price: <b>$<?php echo $productPrice.' '.strtoupper($currency); ?></b></p>

        <!-- Payment button -->
        <button class="stripe-button" id="payButton">
            <div class="spinner hidden" id="spinner"></div>
            <span id="buttonText">Pay Now <?php echo '$'.$productPrice; ?></span>
        </button></div>
  
</div>
        
</div>
        
      <script src="https://js.stripe.com/v3/"></script>
      <script>
// Set Stripe publishable key to initialize Stripe.js
const stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');

// Select payment button
const payBtn = document.querySelector("#payButton");

// Payment request handler
payBtn.addEventListener("click", function (evt) {
    setLoading(true);

    createCheckoutSession().then(function (data) {
        if(data.sessionId){
            stripe.redirectToCheckout({
                sessionId: data.sessionId,
            }).then(handleResult);
        }else{
            handleResult(data);
        }
    });
});
    
// Create a Checkout Session with the selected product
const createCheckoutSession = function (stripe) {
    return fetch("payment_init.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            createCheckoutSession: 1,
        }),
    }).then(function (result) {
        return result.json();
    });
};

// Handle any errors returned from Checkout
const handleResult = function (result) {
    if (result.error) {
        showMessage(result.error.message);
    }
    
    setLoading(false);
};

// Show a spinner on payment processing
function setLoading(isLoading) {
    if (isLoading) {
        // Disable the button and show a spinner
        payBtn.disabled = true;
        document.querySelector("#spinner").classList.remove("hidden");
        document.querySelector("#buttonText").classList.add("hidden");
    } else {
        // Enable the button and hide spinner
        payBtn.disabled = false;
        document.querySelector("#spinner").classList.add("hidden");
        document.querySelector("#buttonText").classList.remove("hidden");
    }
}

// Display message
function showMessage(messageText) {
    const messageContainer = document.querySelector("#paymentResponse");
	
    messageContainer.classList.remove("hidden");
    messageContainer.textContent = messageText;
	
    setTimeout(function () {
        messageContainer.classList.add("hidden");
        messageText.textContent = "";
    }, 5000);
}
</script>
    </body>
</html>