<?php
class Route{
  
    // database connection and table name
    private $conn;
    private $table_name = "bot_route";
    private $botid = "1";
  
    // object properties
    public $ID;
    public $BOT_ID;
    public $MAX_X;
    public $MAX_Y;
    public $start;
    public $end;
    public $blockade;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    
    // read users
    function read(){
    
        // select all query
        $query = "SELECT ID, BOT_ID, MAX_X, MAX_Y, start, end, blockade FROM " . $this->table_name . " WHERE BOT_ID = " . $this->botid . "";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $log = $stmt->fetch(PDO::FETCH_ASSOC);
    }


}
?>