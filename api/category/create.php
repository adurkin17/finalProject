<?php

header('Access-Control-Allow-Orgion: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

include_once '../../config/Database.php';
include_once '../../model/categorydb.php';

$database = new Database();
$db = $database->connect();

$category = new catgeoryClass($db);

$data = json_decode(file_get_cont("php://input"));


$category->category = $data->category;

if($category->create())
{
    echo json_encode(array('message' => 'Category Created'));
}
else {
    echo json_encode(array('message' => 'Category not Created'));
}