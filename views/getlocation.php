<?PHP
// get database connection
include_once '../models/db.php';
  
// instantiate BotAccount object
include_once '../models/log.php';

// instantiate BotAccount object
include_once '../views/modals/Warning.php';


    $database = new Database();
    $db = $database->getConnection();
  
    $Log = new Log($db);

    $Log = $Log->read();

    print($Log['location']);

   

?>