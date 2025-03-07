<?php
session_start();

include 'cnn.php';
$tb = "m_register";

$u = uniqid("M", true);
$name = $_POST['m_name'];
$email = $_POST['m_email'];
$pass = $_POST['m_pass'];
$cpass = $_POST['c_pass'];




$pass2 = password_hash($pass, PASSWORD_BCRYPT);

$h = uniqid("H", true);
$hname = $_POST['h_name'];
$hadd = $_POST['h_address'];
$hmobile = $_POST['h_mobile'];
$hbank = $_POST['h_bank'];
$hbno = $_POST['h_bno'];
$hcode = $_POST['h_code'];

$molen = strlen($hmobile);
$paalen = strlen($pass);
$namelen = strlen($name);
$hlen = strlen($hname);
$hnolen = strlen($hbno);
$hcolen = strlen($hcode);


if($molen !== 10)
{
    $_SESSION['error'] = "Mobile number must be exactly 10 digits.";
    header("location: ../merchant_re.php");
    exit();
}
elseif($pass !== $cpass)
{
    $_SESSION['error'] = "Password and Confirm password do not match."; 
    
    header("location: ../merchant_re.php");
    exit();
}
elseif($paalen <= 6 || $paalen > 10)
{
    $_SESSION['error'] = "Password must be between 6 and 10 characters."; // Store error message in session
    header("location: ../merchant_re.php");
    exit();
}
elseif($namelen >= 20)
{
    $_SESSION['error'] = "Username must be less than 20 characters."; // Store error message in session
    header("location: ../merchant_re.php");
    exit();
}
elseif($hlen >= 100)
{
    $_SESSION['error'] = "Hotel name must be less than 100 characters."; // Store error message in session
    header("location: ../merchant_re.php");
    exit();
}
elseif($hnolen <= 11 || $hnolen > 17 )
{
    $_SESSION['error'] = "Bank Account number must be between 11 and 16 digits."; // Store error message in session
    header("location: ../merchant_re.php");
    exit();
}
elseif($hcolen !== 11 )
{
    $_SESSION['error'] = "Bank IFSC Code always 11 digits."; // Store error message in session
    header("location: ../merchant_re.php");
    exit();
}

else
{
    $li = mysqli_query($cnn, "Select * from `{$tb}` where Username ='$name'");

    $no = mysqli_num_rows($li);

    if ($no == 1) {
        $_SESSION['error'] = "Username already exists."; // Store error message in session
        header("location: ../merchant_re.php");
        exit();
    } else {
        mysqli_query($cnn, "insert into `{$tb}` values('$u','$name','$email','$pass2','$h','$hname','$hadd','$hmobile','$hbank','$hbno','$hcode','Not Verify')");

        header("location:../merchant_l.php");
    
    }

}

?>

