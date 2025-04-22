<?php



$email = $_POST['email'];
$password = $_POST['password'];

$link = mysqli_connect("localhost", "root", "", "test2");
$res = mysqli_query($link, "select email from users where email = '$email'");

if($res->num_rows == 0){
	
	mysqli_query($link, "insert into  users (email, password) values ('$email', '$password')");

echo "注册成功！";
}else{
echo "这个信箱已被其他用户用于注册。";
}


?>