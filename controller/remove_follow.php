<?php
include '../model/class_instance.php';
$user = new UserDB;
$all_follow = $user->get_all_follow($_POST["main_id"]);

foreach($all_follow as $array_follow){
    $follow = $array_follow["follows"];
}

$explode_follow = explode(",", $follow);

for ($index = 0 ; $index < count($explode_follow) ; $index++){
    if($explode_follow[$index] == $_POST["user_id"]){
        unset($explode_follow[$index]);
    }
}

$content = implode(",", $explode_follow);
var_dump($content);
echo $user->update_follow($_POST["main_id"], $content);