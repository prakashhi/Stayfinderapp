<?php
include '../Process/cnn.php';

$id= $_GET['id'];

$d = mysqli_query($cnn,"Select * from m_register where Um_id='$id'");


?>
