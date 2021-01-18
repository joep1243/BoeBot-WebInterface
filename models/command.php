<?php
class Command{
  
    // database connection and table name
    private $conn;
    private $table_name = "temp_command";
    private $botid = "1";
  
   // object properties
   public $ID;
   public $BOT_ID;
   public $command;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    
    // update location for bot
    function UpdateCommand(){
    
        // select all query
        $query = "UPDATE " . $this->table_name . " SET command=:command  WHERE BOT_ID=:BOT_ID";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->command=htmlspecialchars(strip_tags($this->command));
        $this->botid=htmlspecialchars(strip_tags($this->botid));
    
        // bind values
        $stmt->bindParam(":command", $this->command);
        $stmt->bindParam(":BOT_ID", $this->botid);

        $stmt->execute();
    }
}
?>