<?php
// Retrieve the request's body and parse it as JSON
$input = @file_get_contents("php://input");
$data = json_decode($input);

$event = $data->event;
$created = $data->data->paid_at;
$amount = $data->data->amount;
$status = $data->data->status;
$fname = $data->customer->first_name;
$lname = $data->customer->last_name;
$email = $data->customer->email;
$bank = $data->authorization->bank;
$account_name = $data->authorization->account_name;
$fullname = $fname . ' ' . $lname;

if($event == 'charge.success') {

    require 'dbconnect.php';

    $db = new dbconnect();
    $query = "INSERT INTO paystack(id, fullname, email, statuss, amount, account_name, bank, createdAt) 
              VALUES('', :fullname, :email, :statuss, :amount, :account_name, bank, :createdAt)";

    $stmt = $db->connector()->prepare($query);

    $stmt->bindParam(':fullname', $fullname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':statuss', $status);
    $stmt->bindParam(':amount', $amount);
    $stmt->bindParam(':customer_code', $customer_code);
    $stmt->bindParam(':account_name', $account_name);
    $stmt->bindParam(':bank', $bank);
    $stmt->bindParam(':createdAt', $created);

    $stmt->execute();
    $stmt->close();

    } else {

        header("Location: error.html");
    }

// Do something with $event
http_response_code(200); // PHP 5.4 or greater
?>