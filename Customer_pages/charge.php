<?php


session_start();
include '../Process/cnn.php';
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

    // Payment successful
    $transactionId = $stripeResponse['id'];
    $customerEmail = $email; // Use the customer's email from the form
    $merchantEmail = $m1data['Email']; // Replace with your merchant email
    $adminEmail = "ecommerce3112003@gmail.com"; // Replace with admin email

    $pay_id = uniqid("Pay", true);

    // Transaction details for the customer email
    $subject = "Payment Successful";
    $message = "Dear $fullName,\n\nYour payment of " . ($amount) . "₹ was successfully processed.\n\nYour Payment ID: " . $pay_id . "\n\nTransaction ID: " . $transactionId . "\n\nRoom ID: " . $r_id . "\n\nDate of Booking: " . $check_in . " To " . $check_out . "\n\nThank you for your Booking!";
    
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
    $merchantMessage = "Dear Merchant,\n\nA new payment of " . ($amount) . "₹ has been received. Here are the details:\n\nTransaction ID: " . $transactionId . "\nAmount: " . ($amount) . "₹ \n\nCustomer ID: " . $g . " \n\nCustomer Email: " . $customerEmail;
    sendSMTPMail($merchantEmail, $merchantSubject, $merchantMessage);

    // Send email to the admin
    $adminSubject = "New Payment Alert";
    $adminMessage = "Dear Admin,\n\nA new payment of " . ($amount) . "₹ has been successfully processed. Here are the details:\n\nTransaction ID: " . $transactionId . "\nAmount: " . ($amount) . "₹ \nCustomer Email: " . $customerEmail . "\n\n Merchant ID: " . $m_id . "\n\nPlease review the transaction.";
    sendSMTPMail($adminEmail, $adminSubject, $adminMessage);

    echo json_encode(["success" => true, "transaction_id" => $transactionId]);
    exit;
} 
else {
    // Payment failed
    echo json_encode(["error" => $stripeResponse['error']['message']]);
    exit;
}



// Function to send email using PHPMailer and Gmail's SMTP
function sendSMTPMail($to, $subject, $message) {

    require_once  '../PHPMailer-master/src/Exception.php';
    require_once  '../PHPMailer-master/src/PHPMailer.php';
    require_once  '../PHPMailer-master/src/SMTP.php';
    

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    
    try {
        // Set PHPMailer to use SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Gmail SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'ecommerce3112003@gmail.com';  // Gmail email address (your email)
        $mail->Password = 'svut kclu snrd rqdb';  // Gmail email password or App password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;  // Gmail SMTP port

        // Sender information
        $mail->setFrom('your-email@gmail.com', 'StayFinderTeam');
        $mail->addReplyTo('noreply@gmail.com', 'StayFinderTeam');
        
        // Recipient
        $mail->addAddress($to);

        // Email content
        $mail->isHTML(false);  // Use plain text email format
        $mail->Subject = $subject;
        $mail->Body    = $message;

        // Send email
        if (!$mail->send()) {
            error_log("Mailer Error: " . $mail->ErrorInfo);
            return false;
        } else {
            return true;
        }
    } catch (Exception $e) {
        error_log("Mailer Error: " . $mail->ErrorInfo);
        return false;
    }
}
?>

