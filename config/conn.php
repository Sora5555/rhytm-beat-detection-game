<?php

class Conn {
  private $servername = "localhost";
  private $username= "root";
  private $password = "";
  
  public $conn;
  
  public function connect(){
    try {
       $this->conn = new PDO("mysql:host=$this->servername;dbname=beatgame", $this->username, $this->password);
 
       $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $th) {
      //throw $th;
       echo "Connection failed: " . $th->getMessage();
    }
    return $this->conn;
  }
}