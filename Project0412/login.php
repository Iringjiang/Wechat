<?php
session_start();


$email = $_POST['email'];
$password = $_POST['password'];

$link = mysqli_connect("localhost", "root", "", "test2");
$res = mysqli_query($link, "select email from users where email = '$email'");

if($res->num_rows == 0){
    
   
echo "NG";
}else{
$_SESSION["email"] = $email;
echo "OK";
}


?>