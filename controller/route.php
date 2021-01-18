<?php
include_once '../models/db.php';
  
// instantiate BotAccount object
include_once '../models/route.php';

// instantiate BotAccount object
include_once '../views/modals/Warning.php';

function getroutedata(){

    $database = new Database();
    $db = $database->getConnection();
  
    $Route = new Route($db);

    return $Route->read();
}

function updateroute($x,$y,$start,$einde,$blokades,$key){

    $database = new Database();
    $db = $database->getConnection();
  
    $Route = new Route($db);

    $Route->MAX_X = $x;
    $Route->MAX_Y = $y;
    $Route->start = $start;
    $Route->end = $einde;
    $Route->blockade = $blokades;

    $Route->update($key);


}
?>