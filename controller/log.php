<?php
// get database connection
include_once '../models/db.php';
  
// instantiate BotAccount object
include_once '../models/log.php';

// instantiate BotAccount object
include_once '../views/modals/Warning.php';

function getlog(){

    $database = new Database();
    $db = $database->getConnection();
  
    $Log = new Log($db);

    $log =$Log->read();

    return $log['log'];

  
}