<?php
include './controller.php';
$nickname = $_POST['nickname']; 
$email = $_POST['email'];
$pass = $_POST['password'];
$picutre = $_POST['img'];

$token;

$user = new UserDB();
$data = new UserController();
$result = $data->verify_mail($email);

if($result == 1){
    $user->add_to_db($nickname, $email, $pass, $picture);
    $token = 1;    
}else {
    $token = 0;
}
echo $token;