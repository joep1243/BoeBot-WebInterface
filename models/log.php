<?php
class Log{
  
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
    public $btn;
    public $value;


  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    function getarrays(){
        // select all query
        $query = "SELECT log, diagnostics, location FROM " . $this->table_name . " WHERE BOT_ID = 1";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();

        return $stmt;
    }
    
    // read users
    function read(){
    
        // select all query
        $query = "SELECT ID, BOT_ID, log, diagnostics, location, updated_at FROM " . $this->table_name . " WHERE BOT_ID = " . $this->botid . "";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $log = $stmt->fetch(PDO::FETCH_ASSOC);
    }


    function setdia(){

        $getarray = $this->getarrays();

        while ($row = $getarray->fetch(PDO::FETCH_ASSOC)){
            $diagnostics = $row['diagnostics'];
        }

        $arr = json_decode($diagnostics, TRUE); 

        $arr[$this->value]=$this->btn;

        $json = json_encode($arr);

        // select all query
        $query = "UPDATE " . $this->table_name . " SET diagnostics=:diagnostics  WHERE BOT_ID= 1";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->BOT_ID=htmlspecialchars(strip_tags($this->BOT_ID));

        // bind values
        $stmt->bindParam(":diagnostics", $json);

        // execute query
        if($stmt->execute()){
            return true;
        }
        return false;
    }


}
?>