<?php
session_start();

$id = $_SESSION["email"];
$to_id = $_POST["to_id"];

$com = mysqli_connect("localhost", "root", "", "test");
$res = mysqli_query($com, "select content from ms where from_id = '$id' or to_id = '$to_id' ");


$show = "";
if($res->num_rows == 0){
    echo "Not ms";
}else{
    while($data = mysqli_fetch_assoc($res)){
       
    $show .= "<p>".$data["content"]."</p>";
    }
    
}
echo $show;

?>