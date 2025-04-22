<?php
    session_start();
 
    $peng_id=$_POST['peng_id'];



    $com = mysqli_connect("localhost", "root", "", "test");
    $res = mysqli_query($com, "select content from ping where peng_id = '$peng_id'");

    $data = "";
    while($row = mysqli_fetch_assoc($res)){
        $data = $data.$row["content"]."<br>";
    }
    

    echo $data;

   
?>