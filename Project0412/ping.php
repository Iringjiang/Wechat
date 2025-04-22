<?php
	session_start();
    
	$content = $_POST['content'];
	$peng_id=$_POST['peng_id'];
    $from_id = $_SESSION["email"];

	$link = mysqli_connect("localhost", "root", "", "test");

	mysqli_query($link, "insert into ping (content, peng_id,from_id) values ('$content', '$peng_id','$from_id')");
	
?>