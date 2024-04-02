<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");

require_once 'usermodel.php';

$userModel = new UserModel();
$id = $_GET['id'];
$data = [
    'name' => $_GET['name'],
    'lname' => $_GET['lname']
];
$users = $userModel->updateuser($id , $data);
echo json_encode($users);
?>