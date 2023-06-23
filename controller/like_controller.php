<?php
include './controller.php';
$data = new UserController;
$data->add_like($_POST['cuiit_id'], $_POST['user_id']);