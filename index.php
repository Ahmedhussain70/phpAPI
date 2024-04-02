<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");

require_once 'usermodel.php';

$userModel = new Usermodel();
$users = $userModel->getuser();

echo json_encode($users);
?>