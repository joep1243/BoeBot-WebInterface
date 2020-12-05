<?PHP
// get database connection
include_once '../models/db.php';
  
// instantiate BotAccount object
include_once '../models/bot.php';
include_once '../models/log.php';

// instantiate BotAccount object
include_once '../views/modals/Warning.php';


    $database = new Database();
    $db = $database->getConnection();
  
    $Bot = new Bot($db);
    $Log = new Log($db);

    $bot = $Bot->read();
    $Log = $Log->read();

    //print_r($bot['API_code']);


    if(!empty($bot['API_code']) && $bot['API_code'] !== NULL){

       // echo"test1";
       //echo "Bot is Online";

        $diff = strtotime(date("Y-m-d h:i:sa")) - strtotime($Log['updated_at']);

        if($diff < 300){
            print "Bot is Online";
            //return "Bot is Online";
        }else{
            print "Bot is Ofline";
            //return "Bot is Ofline";
        }
    }else{
        print "Bot is Ofline";
        //return "Bot is Ofline";
    }

?>