<?php
require_once __DIR__ . '/../models/Song.php';
require_once __DIR__ . '/../../config/conn.php';

class SongRepository{
      private $conn;
    private $table_name = "songs";
    public function __construct() {
        $connection = new Conn();
        $this->conn = $connection->connect();
    }
    public function getAllSong(){
        $query = $this->conn->prepare("SELECT * FROM {$this->table_name}");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}