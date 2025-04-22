<?php
session_start();
//登录成功后，再次连接数据库查找用户信息:
$com = mysqli_connect("localhost", "root", "", "test");
$res = mysqli_query($com, "select email,password,name, sex,ids from users where email = '".$_SESSION["email"]."'");
$data = mysqli_fetch_assoc($res);

//将查找结果展示出来:
include("my.html");
?>