<?php

header('Access-Control-Allow-Orgion: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

include_once '../../config/Database.php';
include_once '../../model/quotesDb.php';

$database = new Database();
$db = $database->connect();

$quote = new quotesClass($db);

$data = json_decode(file_get_cont("php://input"));


$quote->quote = $data->quote;
$quote->author_id = $data->author_id;
$quote->category_id = $data->category_id;

if($quote->create())
{
    echo json_encode(array('message' => 'Quote Created'));
}
else {
    echo json_encode(array('message' => 'Quote not Created'));
}