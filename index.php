<?php

// ACCT_fft4jtroskox199
if(isset($_GET['pay'])) {

    $email = $_GET['email_address'];

    $url = "https://api.paystack.co/transaction/initialize";
    $fields = [
      'email' => $email,
      'amount' => "2000000",
      'subaccount' => "ACCT_fft4jtroskox199",
      "bearer" => "subaccount"
    ];
    $fields_string = http_build_query($fields);
    //open connection
    $ch = curl_init();
    
    //set the url, number of POST vars, POST data
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      "Authorization: Bearer sk_test_fd20ca4e220a38750623dcd5bb9b39ab3c484336",
      "Cache-Control: no-cache",
    ));
    
    //So that curl_exec returns the contents of the cURL; rather than echoing it
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
    
    //execute post
    $result = curl_exec($ch);
    $data = json_decode($result);
    $redirect = $data->data->authorization_url;

    if($result) {

        header('Location: ' . $redirect);
    }
} else {

 echo "You have to input your email to make payment";
}
?>

<html>
    <head>
        Paystack Split Payment Integration
    </head>

    <body>
      <form id="paymentForm" method="GET" action="index.php">

        <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" name="email_address" required />
        </div>

        <!-- <div class="form-group">
        <label for="amount">Amount</label>
        <input type="tel" id="amount" required />
        </div> -->

        <div cl ass="form-submit">
        <button type="submit" name="pay" > Pay </button>
        </div>

      </form>

    <body>

</html>
