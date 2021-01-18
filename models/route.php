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

    function update($key){
    
        // select all query
        $query = "UPDATE " . $this->table_name . " SET MAX_X=:MAX_X, MAX_Y=:MAX_Y, start=:start, end=:end, blockade=:blockade   WHERE BOT_ID = " . $this->botid . "";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->MAX_X=htmlspecialchars(strip_tags($this->MAX_X));
        $this->MAX_Y=htmlspecialchars(strip_tags($this->MAX_Y));
        $this->start=htmlspecialchars(strip_tags($this->start));
        $this->end=htmlspecialchars(strip_tags($this->end));

    
        // bind values
        $stmt->bindParam(":MAX_X", $this->MAX_X);
        $stmt->bindParam(":MAX_Y", $this->MAX_Y);
        $stmt->bindParam(":start", $this->start);
        $stmt->bindParam(":end", $this->end);
        $stmt->bindParam(":blockade", $this->blockade);

        // execute query
        if($stmt->execute()){
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }
}
?>