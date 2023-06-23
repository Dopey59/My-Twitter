<?php
include '../model/class_instance.php';
session_start();
$data = new UserDB;

$data->modify_user_data($_POST['nickname'], $_POST['email'], $_POST['password'], $_POST['picture'], $_SESSION['mail']);
$verif = 1;

echo $verif;
$_SESSION['mail'] = $_POST['email'];
$_SESSION['nick'] = $_POST['nickname'];