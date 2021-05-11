<?php

header('Access-Control-Allow-Orgion: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

include_once '../../config/Database.php';
include_once '../../model/authorDb.php';

$database = new Database();
$db = $database->connect();

$author = new authorClass($db);

$data = json_decode(file_get_cont("php://input"));


$author->name = $data->name;

if($author->update())
{
    echo json_encode(array('message' => 'Author updated'));
}
else {
    echo json_encode(array('message' => 'Author not updated'));
};
}