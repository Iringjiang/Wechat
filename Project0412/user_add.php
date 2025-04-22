<?php
	session_start();

	$email = $_POST['email'];
	$password=$_POST['password'];

	$link = mysqli_connect("localhost", "root", "", "sakuhin");


    $res = mysqli_query($link, "select email from user where email = '$email'");

    
    if($res->num_rows == 0){
        echo "OK";
        mysqli_query($link, "insert into user (email, password) values ('".$email."', '$password')");
    }else{
      echo "NG";
    }

