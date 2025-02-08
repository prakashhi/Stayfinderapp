<?php

session_start();
header('Content-Type: application/json');

// Get the JSON input from the front-end
$input = json_decode(file_get_contents('php://input'), true);
$stripeToken = $input['token'];
$fullName = $input['fullName'];  
$email = $input['email'];        
$Member = $input['Member'];        
$check_in = $input['check_in'];        
$check_out = $input['check_out'];     
$r_id = $input['r_id'];   
$h_id = $input['h_id'];        
$amount = $input['p1'] * 100 ; 
$name = $_SESSION['name'];





// Stripe API secret key (use your actual secret key here)
$secretKey = "sk_test_51QmtyvE3buiaQKWqmlAum9ywsVamxlQrLfCSC8tJzndNqr8GR1QG4UcFMg4duJYd88yff8QXBL196CsdUOZXKaP300Z1XmoAp1";  // Replace with your test secret key

// Create a payment using cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    'amount' => $amount,
    'currency' => 'usd',
    'source' => $stripeToken,
    'description' => 'Payment for ' . $fullName
]));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . $secretKey  // Bearer token with your secret key
]);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    // Curl error
    echo json_encode(["error" => "Curl error: " . curl_error($ch)]);
    exit;
}

curl_close($ch);

$stripeResponse = json_decode($response, true);

// Check if the payment was successful
if (isset($stripeResponse['id'])) {
    include '../Process/cnn.php';


    $mdata = mysqli_query($cnn,"Select * from m_register where Hotel_id= '$h_id'");
    $m1data = mysqli_fetch_array($mdata);




    // Payment successful
    $transactionId = $stripeResponse['id'];
    $customerEmail = $email; // Use the customer's email from the form
    $merchantEmail = $m1data['Email']; // Replace with your merchant email
    $adminEmail = "ecommerce3112003@gmail.com"; // Replace with admin email

    $pay_id = uniqid("Pay",true);



    // Transaction details for the customer email
    $subject = "Payment Successful";
    
    $message = "Dear $fullName,\n\nYour payment of $" . ($amount / 100) . "₹ was successfully processed.\n\nYour Payment ID: ". $pay_id ." \n\nTransaction ID: " . $transactionId . "\n\n and Room ID: ".$r_id."\n\nDate of Booking is : ". $check_in ." To ". $check_out ." \n\nThank you for your Booking!";
    $headers = "From: noreply@example.com\r\nReply-To: noreply@example.com";

    // Send email to the customer
    mail($customerEmail, $subject, $message, $headers);

    $c =  mysqli_query($cnn,"Select * from c_register where Username ='$name' ");

    $cdata = mysqli_fetch_array($c);

    $g =  $cdata['Uc_id'];
    mysqli_query($cnn,"INSERT INTO `booking_list` VALUES ('$pay_id','$r_id','$g','$h_id','$Member','$check_in','$check_out','$amount')");



    // Email for merchant
    $merchantSubject = "New Payment Received";
    $merchantMessage = "Dear Merchant,\n\nA new payment of $" . ($amount / 100) . " has been received. Here are the details:\n\nTransaction ID: " . $transactionId . "\nAmount: $" . ($amount / 100) . "\nCustomer Email: " . $customerEmail;
    $merchantHeaders = "From: noreply@example.com\r\nReply-To: noreply@example.com";

    // Send email to the merchant
    mail($merchantEmail, $merchantSubject, $merchantMessage, $merchantHeaders);

    // Email for admin
    $adminSubject = "New Payment Alert";
    $adminMessage = "Dear Admin,\n\nA new payment of $" . ($amount / 100) . " has been successfully processed. Here are the details:\n\nTransaction ID: " . $transactionId . "\nAmount: $" . ($amount / 100) . "\nCustomer Email: " . $customerEmail . "\n\nPlease review the transaction.";
    $adminHeaders = "From: noreply@example.com\r\nReply-To: noreply@example.com";

    // Send email to the admin
    mail($adminEmail, $adminSubject, $adminMessage, $adminHeaders);

    // Return success response to front-end
    echo json_encode(["success" => true]);
} else {
    // Payment failed
    echo json_encode(["error" => $stripeResponse['error']['message']]);
}
?>
