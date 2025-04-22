<?php

session_start();
$id = $_SESSION["email"];

$to_id = $_POST["to_id"];


$link = mysqli_connect("localhost", "root", "", "test");

	mysqli_query($link, "insert into ms (from_id, to_id) values ('".$_SESSION["email"]."', '$to_id')");


?>