<?php
session_start();
$id = $_SESSION["email"];

$show = "";

$com = mysqli_connect("localhost", "root", "", "test");
$res = mysqli_query($com, "select from_id, to_id from guanxi where from_id = '$id' or to_id= '$id'");


if($res->num_rows == 0){
    echo "Not Found User";
}else{

    
    while($data = mysqli_fetch_assoc($res)){
        if($data["from_id"]== $id)
        $show .= "<a href='ms.html?to_id=".$data["to_id"]."'>".$data["to_id"]."</a><br>";
    else
    $show .= "<a href='ms.html?to_id=".$data["from_id"]."'>".$data["from_id"]."</a><br>";
    }
    
}

include("frends.html");
?>