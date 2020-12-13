<?PHP

// get database connection
include_once '../models/db.php';
  
// instantiate BotAccount object
include_once '../models/user.php';
include_once '../models/command.php';

// instantiate BotAccount object
include_once '../views/modals/Warning.php';

function str_rand(int $length = 64){ // 64 = 32
    $length = ($length < 4) ? 4 : $length;
    return bin2hex(random_bytes(($length-($length%2))/2));
}
  

function UserLogin($UN, $PW){

    $database = new Database();
    $db = $database->getConnection();
  
    $User = new User($db);
    $Command = new Command($db);

    //destroy session then start a session
    session_start();
    
    //function needs to have these values
    if (empty($UN) && empty($PW)) {

        Warning("LOGIN","U moet allebij de velden invullen","warning");
        
    }else{

        $User->username = $UN;
        $User->password = $PW;

        $user = $User->read();

        // check if more than 0 record found
        if(!empty($user)){
            if ($PW == $user['password']) {

                // Verification success! User has loggedin!
                // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
                session_regenerate_id();

                //make a random key
                $Key = str_rand();

                $_SESSION['loggedin'] = TRUE;
                $_SESSION['logged_in'] = time();
                $_SESSION['KEY'] = $Key;

                $Command->command = 0;
            
                $Command->UpdateCommand();

                //send to home page with random key
               header('Location: home.php/?KEY='.$Key.'');
                        
               exit;
            }else{Warning("LOGIN","Het wachtwoord klopt niet","warning");}
        }else{Warning("LOGIN","Het username klopt niet","warning");} 
    }   
}

?>