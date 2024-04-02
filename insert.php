<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");

require_once 'usermodel.php';

$userModel = new UserModel();
$data = [
    'name' => $_POST['name'],
    'lname' => $_POST['lname']
];
$users = $userModel->insertuser($data);
echo json_encode($users);
?>