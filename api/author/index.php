<?php

header('Access-Control-Allow-Orgion: *');
header('Content-Type: application/json');


include_once '../../config/Database.php';
include_once '../../model/quotesDb.php';

$database = new Database();
$db = $database->connect();

$quote = new quotesClass($db);

$data = json_decode(file_get_cont("php://input"));
$results = $quote->read();

$num = $results->rowCount();

if($num > 0) {
    // Cat array
    $cat_arr = array();
    $cat_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $cat_item = array(
        'id' => $id,
        'name' => $name
      );

      array_push($cat_arr['data'], $cat_item);
    }

    echo json_encode($cat_arr);

} else {
    echo json_encode(
      array('message' => 'No Authors Found')
    );
}