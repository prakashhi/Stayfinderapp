<?php
require '../Process/cnn.php';
include '../Customer_pages/email.php';


$id = $_GET['id'];


$bookd = mysqli_query($cnn,"select * from booking_list where Room_id ='$id' ");
$bookdate = mysqli_fetch_array($bookd);
$dta = $bookdate['Checkin_Date'];




$cid = $bookdate['Customer_id'];
$customer_data = mysqli_query($cnn,"select * from c_register where Uc_id = '$cid'");
$customerfetch_data = mysqli_fetch_array($customer_data);

$cutomer_email =  $customerfetch_data['Email'];



$today = new DateTime(); // Automatically uses current date ()
$givenDate = new DateTime($dta);
$interval = $today->diff($givenDate);
$ge = $interval->days;
$ac = $ge;

$refund = 0;

if($ac >= 7)
{
    $refund = 40;
}
if($ac <= 6 && $ac >= 4)
{
    $refund = 15;
}
if($ac <=3 )
{
   $refund = 9;
}
else
{
    $refund = 50;
}


$pay = ($bookdate['Amount'] * $refund)/100;

$message = "Dear ".$customerfetch_data['Username'].",

        I hope this message finds you well.Please find the details of your canceled booking below:
        
            Payment ID:  ".$bookdate['Payment_id']."
            Guest Name: ".$bookdate['Customer_name']."
            Check-in Date: ".$bookdate['Checkin_Date']."
            Check-out Date: ".$bookdate['Checkout_Date']."
            Total Amount Paid: ₹ ".$bookdate['Amount']."
        
        We sincerely apologize for any inconvenience this cancellation may have caused. As a result of this cancellation, you are eligible for a refund of ".$refund."% of the total amount paid, equating to ₹ ".$pay.". The refund will be processed to your original payment method within 7 working days from today.
        
        If you have any questions or require further assistance, please do not hesitate to contact us at [Hotel Email Address] or [Hotel Phone Number]. We value your understanding and hope to have the opportunity to serve you again in the future.
        
        Thank you for your patience and cooperation.
        
        Warm regards,
        
        [StayFinder Team]";
        
 sendSMTPMail($cutomer_email, "Cancellation of Your Reservation", $message);


 

 $hid= $bookdate['Hotel_id'];

 $hdata = mysqli_query($cnn,"select* from m_register where Hotel_id = '$hid' ");
 $hdatafetch = mysqli_fetch_array($hdata);
 $hemail = $hdatafetch['Email'];

 echo $message2 = "Dear Hotel Team,

 A customer has canceled their hotel booking, and a refund needs to be processed. Please find the details of the cancellation below:
 
     Customer Username: ".$customerfetch_data['Username']."
     Payment ID: ".$bookdate['Payment_id']."
     Guest Name: ".$bookdate['Customer_name']."
     Check-in Date: ".$bookdate['Checkin_Date']."
     Check-out Date: ".$bookdate['Checkout_Date']."
     Total Amount Paid: ₹".$bookdate['Amount']."
     Refund Percentage: ".$refund."%
     Refund Amount: ₹".$pay."
 
 As per our policy, the refund of ₹".$pay." must be processed to the customer’s original payment method within 7 working days from today. Please ensure this is completed promptly to maintain customer satisfaction.
 
 For any questions or clarification, please contact the support team at support@stayfinder.com .
 
 Thank you for your attention to this matter.
 
 Regards,  
 The StayFinder System Team";
 
sendSMTPMail($hemail, "Customer Cancellation Notification - Refund Processing Required", $message2);


 


mysqli_query($cnn,"UPDATE booking_list SET `Status`='Canceled' WHERE Room_id = '$id' ");

$gh = mysqli_query($cnn,"UPDATE `room_list` SET `Booking_status`='Canceled' WHERE Room_id ='$id' ");

if($gh)
{
    header("location:../Mybooking.php");
}







?>
