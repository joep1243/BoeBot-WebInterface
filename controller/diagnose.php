<?php
// get database connection
include_once '../models/db.php';
  
// instantiate BotAccount object
include_once '../models/log.php';

// instantiate BotAccount object
include_once '../views/modals/Warning.php';

function getdiagnose(){

    $database = new Database();
    $db = $database->getConnection();
  
    $Log = new Log($db);

    $log = $Log->read();

    return $log['diagnostics'];
}

function setdiagnose($btn, $value){

    $database = new Database();
    $db = $database->getConnection();
  
    $Log = new Log($db);

    $Log->btn = $btn;
    $Log->value = $value;

    $Log->setdia();
}