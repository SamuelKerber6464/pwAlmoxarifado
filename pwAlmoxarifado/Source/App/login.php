<?php
include("../Controllers/User.php");



$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$output = array();

$email = $data['email'];
$password = $data["password"];

$newUser = new User(NULL, $email, $password);
$newUser->Login();
