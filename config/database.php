<?php
// used to get mysql database connection
class Database{
 
    //specify your own database credentials
    // private $host = "localhost";
    // private $db_name = "zuridb";
    // private $username = "root";
    // private $password = "";
    // public $conn;

    private $host = "remotemysql.com";
    private $db_name = "qnW6GtII8g";
    private $username = "qnW6GtII8g";
    private $password = "ilztEyWXc6";
    public $conn;

    // get the database connection
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>

