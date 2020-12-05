<?php
class log{
  
    // database connection and table name
    private $conn;
    private $table_name = "temp_log";
    private $botid = "1";
  
    // object properties
    public $ID;
    public $BOT_ID;
    public $log;
    public $diagnostics;
    public $location;
    public $updated_at;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    
    // read users
    function read(){
    
        // select all query
        $query = "SELECT ID, BOT_ID, log, diagnostics, location, updated_at FROM " . $this->table_name . " WHERE BOT_ID = " . $this->botid . "";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $user = $stmt->fetch(PDO::FETCH_ASSOC);
    }


}
?>