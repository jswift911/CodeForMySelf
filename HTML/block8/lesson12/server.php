<?php

$db = new mysqli('localhost','root','', 'jquery');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST;

    $sql = "INSERT INTO `messages` (name,text) VALUES ('".$data['name']."','".$data['text']."')";
    $db->query($sql);

    echo json_encode($data);
    exit();
}