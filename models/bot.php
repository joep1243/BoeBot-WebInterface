<?php
class Bot{
  
    // database connection and table name
    private $conn;
    private $table_name = "bot_account";
    private $botname = "bot1";
  
    // object properties
    public $ID;
    public $username;
    public $password;
    public $API_code;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    
    // read users
    function read(){
    
        // select all query
        $query = "SELECT ID, username, password, API_code FROM " . $this->table_name . " WHERE username = '" . $this->botname . "'";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $user = $stmt->fetch(PDO::FETCH_ASSOC);
    }


}
?>