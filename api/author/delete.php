<?php

header('Access-Control-Allow-Orgion: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

include_once '../../config/Database.php';
include_once '../../model/authorDb.php';

$database = new Database();
$db = $database->connect();

$author = new authorClass($db);

$data = json_decode(file_get_cont("php://input"));


$author->id = $data->id;

if($author->delete())
{
    echo json_encode(array('message' => 'Author Deleted'));
}
else {
    echo json_encode(array('message' => 'Author not Deleted'));
}