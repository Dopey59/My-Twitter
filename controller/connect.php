<?php
include './controller.php';
// include '../model/class_instance.php';
$user = new UserDB();
$data = new UserController();
session_start();

$mail = $_POST['mail'];
$password = $_POST['pass'];
$_SESSION['mail'] = $mail;

$value = $user->get_name($mail);
foreach($value as $val){
    $_SESSION['nick'] = $val["nickname"];
}
echo $data->do_user_exist($mail, $password);