<?php

  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/categorydb.php';

  $database = new Database();
  $db = $database->connect();

  $category = new categoryClass($db);


  $category->id = isset($_GET['id']) ? $_GET['id'] : die();


  $category->read_single();


  $category_arr = array(
    'id' => $category->id,
    'category' => $category->category
  );

  // Make JSON
  print_r(json_encode($category_arr));