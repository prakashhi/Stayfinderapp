<?php


include 'cnn.php';
$tb = "m_register";

$u = uniqid("M", true);
$name = $_POST['m_name'];
$email = $_POST['m_email'];
$pass = $_POST['m_pass'];
$cpass = $_POST['cpass'];


if($pass !== $cpass)
{
 header("location:../merchant_re.php?cpss");
}

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


if($molen !== 10)
{
    header("location:../merchant_re.php?mo=no");
}
elseif($paalen <= 6 || $paalen > 10)
{
    header("location:../merchant_re.php?po=no");
}
else
{
    $li = mysqli_query($cnn, "Select * from `{$tb}` where Username ='$name'");

    $no = mysqli_num_rows($li);

    if ($no == 1) {
        header("location:../merchant_re.php?li=no");
    } else {
        mysqli_query($cnn, "insert into `{$tb}` values('$u','$name','$email','$pass2','$h','$hname','$hadd','$hmobile','$hbank','$hbno','$hcode','Not Verify')");

        header("location:../merchant_l.php");
    
    }

}

?>

