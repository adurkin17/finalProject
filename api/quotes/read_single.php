<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/quotesDb.php';


  $database = new Database();
  $db = $database->connect();


  $quotes = new quotesClass($db);


  $quotes->id = isset($_GET['id']) ? $_GET['id'] : die();


  $quotes->read_single();


  $quotes_arr = array(
    'id' => $quotes->id,
    'quote' => $quotes->quote,
    'author' => $quotes->author,
    'category' => $quotes->category,
  );

  print_r(json_encode($post_arr));