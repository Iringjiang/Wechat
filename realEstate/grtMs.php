<?php
session_start();

$id = $_SESSION["Email"];
$to_idemail = $_POST["to_idemail"];

$com = mysqli_connect("localhost", "root", "", "realestate");
if (!$com) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM message WHERE (from_id = '$id' AND to_idemail = '$to_idemail') OR (from_id = '$to_idemail' AND to_idemail = '$id') ORDER BY time ASC"; 
$res = mysqli_query($com, $sql);

$data_array = array();  // 存储消息记录
    if ($res && mysqli_num_rows($res) > 0) {
        while ($data = mysqli_fetch_assoc($res)) {
            $data_array[] = array(
                'from_id' => $data['from_id'],
                'content' => $data['content']
            );
        }
        // 返回数据：包括接收者邮箱和消息数组
        echo json_encode(array('to_idemail' => $to_idemail, 'messages' => $data_array)); 
    } else {
        // 返回空消息的情况下，也要确保返回合适的 JSON 格式
        echo json_encode(array('to_idemail' => $to_idemail, 'messages' => [])); 
    }
?>
