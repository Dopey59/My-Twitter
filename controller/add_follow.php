<?php
include '../model/class_instance.php';
$user = new UserDB;
$allFollow = $user->get_all_follow($_POST["main_id"]);
foreach($allFollow as $follow){
    if($follow["follows"] == NULL){
        $content = $_POST['user_id'];
    }
    else{
        $content = $follow["follows"] . "," . $_POST['user_id'];
    }
}
$user->update_follow($_POST["main_id"], $content);
