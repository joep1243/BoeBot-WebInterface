<?php
// get database connection
include_once '../models/db.php';
  
// instantiate BotAccount object
include_once '../models/command.php';

// instantiate BotAccount object
include_once '../views/modals/Warning.php';

function setcommand($CMD){

    $database = new Database();
    $db = $database->getConnection();
  
    $Command = new Command($db);

    $Command->command = $CMD;

    $Command->UpdateCommand();
}
?>