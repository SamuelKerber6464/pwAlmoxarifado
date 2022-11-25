<?php

include("../Controllers/User.php");


$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$output = array();

$username = $data['username'];
$email = $data['email'];
$password = $data['password'];

$newUser = new User($username, $email, $password);

$newUser->insert();
