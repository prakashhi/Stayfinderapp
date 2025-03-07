
<?php
session_start();

include 'cnn.php';
$tb = "c_register";

$name = $_POST['r_name'];
$email = $_POST['r_email'];
$mobile = $_POST['r_mobile'];
$pass = $_POST['r_pass'];
$cpass = $_POST['c_pass'];


$molen = strlen($mobile);
$paalen = strlen($pass);
$namelen = strlen($name);


if ($pass !== $cpass) {
    $_SESSION['error'] = "Password and Confirm password do not match.";
    header("location:../register.php");
    exit();
}
elseif($molen !== 10)
{
    $_SESSION['error'] = "Mobile number must be exactly 10 digits.";
    header("location: ../register.php");
    exit();
}
elseif($paalen <= 6 || $paalen > 10)
{
    $_SESSION['error'] = "Password must be between 6 and 10 characters.";
    header("location: ../register.php");
    exit();
}
elseif($namelen >= 20 ){
    $_SESSION['error'] = "Username must be between 6 and 20 characters.";
    header("location: ../register.php");
    exit();
}

else {

    $pass2 = password_hash($pass, PASSWORD_BCRYPT);
    $u = uniqid("C", true);

    $li = mysqli_query($cnn, "Select * from `{$tb}` where Username ='$name' OR Email='$email'");

    $no = mysqli_num_rows($li);

    if ($no == 1) {
        $_SESSION['error'] = "Username Or Email already exists.";
        header("location: ../register.php");
        exit();
    } else {
        mysqli_query($cnn, "insert into `{$tb}` values('$u','$name','$email','$mobile','$pass2')");
        header("location:../login.php");
    }
}





?>
