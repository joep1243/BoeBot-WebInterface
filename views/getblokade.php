<?PHP
// get database connection
include_once '../models/db.php';
  
// instantiate BotAccount object
include_once '../models/route.php';

// instantiate BotAccount object
include_once '../views/modals/Warning.php';


    $database = new Database();
    $db = $database->getConnection();
  
    $Route = new Route($db);

    $Route = $Route->read();



    print_r(json_decode($Route['blockade'], true));
    //print_r($Route['blockade']);

?>