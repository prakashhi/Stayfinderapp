<?php

$host="localhost";
$user="root";
$pass="";
$db="stay_finderdb";

$cnn = mysqli_connect($host,$user,$pass,$db);
         if (!$cnn) {
                die(json_encode(["error" => "Database connection failed: " . mysqli_connect_error()]));
            }
?>