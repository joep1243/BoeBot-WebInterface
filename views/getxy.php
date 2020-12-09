<?PHP
// get database connection
include_once '../models/db.php';
  
// instantiate BotAccount object
include_once '../models/route.php';
include_once '../models/log.php';

// instantiate BotAccount object
include_once '../views/modals/Warning.php';


    $database = new Database();
    $db = $database->getConnection();
  
    $Route = new Route($db);
    $Log = new Log($db);

    $xy = $Route->read();
    $log = $Log->read();

    //str_replace(find,replace,string,count)
    $location = str_replace(".","/" ,$log['location']);

    print($xy['MAX_X'].'.'.$xy['MAX_Y'].'.'.$location);

?>