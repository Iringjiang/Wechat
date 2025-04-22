<?php
session_start();


$to_id = $_POST['to_id'];


$link = mysqli_connect("localhost", "root", "", "test");

	mysqli_query($link, "insert into guanxi (from_id, to_id, status) values ('".$_SESSION["email"]."', '$to_id', '1')");


echo "友達加入をしました。";

?>