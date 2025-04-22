<?php
session_start();
$id = $_SESSION["Email"];
$name = $_SESSION["Username"];

$link = mysqli_connect("localhost", "root", "", "realestate");
$res = mysqli_query($link, "SELECT * FROM fangyuan ORDER BY time DESC");

$showResources = [];
if ($res->num_rows == 0) {
    echo "Not Resources";
} else {
    while ($data = mysqli_fetch_assoc($res)) {
        $uniqueID = "resource_" . $data["id"];
        $reservationID = "reservationInfo_" . $data["id"];

        $showResources[] .= "<div style='margin-bottom: 30px;' id='$uniqueID'>"
            . "<div id='PYQmaker'>{$data["username"]}</div>"
            . "<div><b>物件名：</b><h5 id='name'>{$data["O"]}</h5></div>"
            . "<div><b>最寄り駅：</b><p id='station'>{$data["P"]}</p><b>所在地：</b><p id='address'>{$data["Q"]}</p></div>"
            . "<table>"
            . "<tbody>"
            . "<tr>"
            . "<th>築年数:</th><td id='hear'>{$data["R"]}</td>"
            . "<th>構造:</th><td id='gouzao'>{$data["S"]}</td>"
            . "<th>総階数:</th><td id='cengshu'>{$data["T"]}</td>"
            . "</tr>"
            . "</tbody>"
            . "</table>"
            . "<table>"
            . "<tbody>"
            . "<tr>"
            . "<th>階数</th><th>賃料/管理費</th><th>敷金/礼金</th><th>部屋の広さ</th><th>向き</th><th>内見</th><th></th>"
            . "</tr>"
            . "<tr>"
            . "<td>{$data["U"]}</td>"
            . "<td><p>{$data["V"]}</p></td>"
            . "<td><span>{$data["W"]}</span></td>"
            . "<td>{$data["X"]}</td>"
            . "<td><span>{$data["Y"]}</span></td>"
            . "<td><button class='cancelResource' data-id='{$data["id"]}' style='border: none; border-radius: 5px; padding: 5px 10px;position: relative;left: 245px;bottom: 130px; background-color: crimson; color: #fff;font-size: smaller;'>削除房源</button></td>"
            . "</tr>"
            . "</tbody>"
            . "</table>"
            . "<div id='$reservationID'>"
            . "内見希望日：<input type='date' id='a_$uniqueID'>"
            . "時間帯：<select id='b_$uniqueID'>"
            . "<option>10:00~11:00</option>"
            . "<option>11:00~12:00</option>"
            . "<option>12:00~13:00</option>"
            . "<option>13:00~14:00</option>"
            . "<option>14:00~15:00</option>"
            . "<option>15:00~16:00</option>"
            . "</select>"
            . "人数：<input type='number' id='c_$uniqueID'>"
            . "<br>"
            . "予約人名前：<input type='text' id='d_$uniqueID'>"
            . "予約人電話番号：<input type='text' id='e_$uniqueID'>"
            . "<br>"
            . "<button class='submitReservation' data-id='{$data["id"]}' style='border: none; border-radius: 5px; padding: 5px 10px; position: relative;left: 700px; bottom: 45px;background-color: #0df328;'>提交预约信息</button>"
            ."<button class='zan' data-id='{$data["id"]}'>感兴趣</button>"."<br>"."<div cla