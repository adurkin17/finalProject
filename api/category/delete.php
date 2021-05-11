<?php

header('Access-Control-Allow-Orgion: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

include_once '../../config/Database.php';
include_once '../../model/categorydb.php';

$database = new Database();
$db = $database->connect();

$category = new categoryClass($db);

$data = json_decode(file_get_cont("php://input"));


$category->id = $data->id;

if($category->delete())
{
    echo json_encode(array('message' => 'Category Deleted'));
}
else {
    echo json_encode(array('message' => 'Category not Deleted'));
}