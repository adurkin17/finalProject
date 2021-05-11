<?php

//start cookies
    $lifetime = 60*60*24*7;
    session_set_cookie_params($lifetime, '/');
    session_start();
    // Model 
    require('model/Database.php');
    require('model/authorDb.php');
    require('model/categorydb.php');
    require('model/quotesDb.php');

    // Get required data from Model
    $category = categoryDB::get_category();
    $author = authorClass::get_author();

    $action = filter_input(INPUT_GET,'action', FILTER_SANITIZE_STRING);
    $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
    $author_id = filter_input(INPUT_GET, 'author_id', FILTER_VALIDATE_INT);