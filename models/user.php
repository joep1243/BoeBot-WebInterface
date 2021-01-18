<?php
class User{
  
    // database connection and table name
    private $conn;
    private $table_name = "user_account";
  
    // object properties
    public $ID;
    public $username;
    public $password;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    
    // read users
    function read(){
    
        // select all query
        $query = "SELECT ID, username, password FROM " . $this->table_name . " WHERE username = '" .$this->username. "'";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $user = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //check if person is loged in 
    function LoginCheck($key){

        if (!isset($_SESSION['loggedin']) && !isset($_SESSION['logged_in']) && !isset($_SESSION['KEY']) || $_SESSION["loggedin"] !== TRUE) {
          
             session_unset();
             session_destroy();
             session_write_close();
             setcookie(session_name(),'',0,'/');
             session_regenerate_id(true);
             
             header('Location: ../Index.php');
             exit;

        }elseif($key == $_SESSION['KEY']) {
 
             session_regenerate_id();
 
       }else{

         session_unset();
         session_destroy();
         session_write_close();
         setcookie(session_name(),'',0,'/');
         session_regenerate_id(true);
         
         header('Location: ../Index.php');
         exit;
       }
    }

    function logout(){
        session_unset();
        session_destroy();
        session_write_close();
        setcookie(session_name(),'',0,'/');
        session_regenerate_id(true);

        header('Location: ../Index.php');
        exit;
    }
}
?>