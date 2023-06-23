<?php
include './controller.php';
$data = new UserController();
session_start();
$verify = $data->is_another_account($_POST["user_id"], $_POST["main_id"]);

if($verify == 1){
    $_SESSION["user_id"] = $_POST["user_id"];
}
else{}
echo $verify;