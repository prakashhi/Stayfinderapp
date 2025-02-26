<?php
session_start();
include '../Process/cnn.php';
include '../Customer_pages/email.php';

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
$amount = $input['p1']; 
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
if (isset($stripeResponse['id'])) 
{
    
   
    $mdata = mysqli_query($cnn, "SELECT * FROM m_register WHERE Hotel_id = '$h_id'");
    $m1data = mysqli_fetch_array($mdata);
    $m_id = $m1data['Um_id'];
    $m_name = $m1data['Hotel_Name'];

    // Payment successful
    $transactionId = $stripeResponse['id'];
    $customerEmail = $email; // Use the customer's email from the form
    $merchantEmail = $m1data['Email']; // Replace with your merchant email
    $adminEmail = "ecommerce3112003@gmail.com"; // Replace with admin email

    $pay_id = uniqid("Pay", true);

    // Transaction details for the customer email
    $subject = "Payment Successful";
    $message = "Dear $fullName,\n\n"
    . "We are pleased to inform you that your payment of ₹" . $amount . " has been successfully processed.\n\n"
    . "Please find the details of your transaction below:\n\n"
    . "Payment ID: " . $pay_id . "\n"
    . "Transaction ID: " . $transactionId . "\n"
    . "Room ID: " . $r_id . "\n"
    . "Booking Dates: " . $check_in . " to " . $check_out . "\n\n"
    . "Thank you for choosing us. We look forward to hosting you!\n\n"
    . "If you have any questions or need further assistance, feel free to contact us.\n\n"
    . "Best regards,\n"
    . "The [Hotel/ ".$m_name." ] Team";
    
    sendSMTPMail($customerEmail, $subject, $message);

    // Insert booking details into the database
    $c = mysqli_query($cnn, "SELECT * FROM c_register WHERE Username = '$name'");
    $cdata = mysqli_fetch_array($c);
    $g = $cdata['Uc_id'];
    $t = Date('Y-m-d H:i:s');
    mysqli_query($cnn, "INSERT INTO `booking_list` VALUES ('$pay_id','$r_id','$g','$fullName','$h_id','$Member','$check_in','$check_out','$amount','$t')");
    mysqli_query($cnn, "UPDATE room_list SET Booking_status = 'Booked' WHERE Room_id = '$r_id'");

    // Send email to the merchant
    $merchantSubject = "New Payment Received";
    $merchantMessage = "Dear Merchant,\n\n"
    . "We are pleased to inform you that a new payment of ₹" . $amount . " has been successfully received.\n\n"
    . "Here are the payment details:\n"
    . "-------------------------------------\n"
    . "Transaction ID: " . $transactionId . "\n"
    . "Amount: ₹" . $amount . "\n"
    . "Customer ID: " . $g . "\n"
    . "Customer Email: " . $customerEmail . "\n"
    . "-------------------------------------\n\n"
    . "If you require any further assistance, please feel free to contact us.\n\n"
    . "Best regards,\n"
    . "The [Stay Finder] Team";
    sendSMTPMail($merchantEmail, $merchantSubject, $merchantMessage);

    // Send email to the admin
    $adminSubject = "New Payment Alert";
    $adminMessage = "Dear Admin,\n\n"
    . "We are pleased to inform you that a new payment of ₹" . $amount . " has been successfully processed.\n\n"
    . "Please find the transaction details below:\n"
    . "-------------------------------------\n"
    . "Transaction ID: " . $transactionId . "\n"
    . "Amount: ₹" . $amount . "\n"
    . "Customer Email: " . $customerEmail . "\n"
    . "Merchant ID: " . $m_id . "\n"
    . "-------------------------------------\n\n"
    . "Kindly review the transaction at your earliest convenience.\n\n"
    . "Best regards,\n"
    . "The [Company Name] Team";
   $d =  sendSMTPMail($adminEmail, $adminSubject, $adminMessage);

    if($d)
    {
        echo json_encode(["success" => true]); 
    }
} 
else {
    // Payment failed
    echo json_encode(["error" => $stripeResponse['error']['message']]);
    exit;
}
