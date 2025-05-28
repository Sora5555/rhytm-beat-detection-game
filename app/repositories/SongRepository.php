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
    public function addSong(Song $song, $user_id){
        $query = $this->conn->prepare("insert into {$this->table_name} (song_name, song_path, user_id) values (?, ?, ?)");
        return $query->execute([$song->songName, $song->songPath, $user_id]);
    }
    public function getOneSong($id){
        $query = $this->conn->prepare("select * from {$this->table_name} where id = ?");
        $query->execute([$id]);
        return $query->fetchObject("Song");
    }
    public function deleteOneSong($id){
        $query = $this->conn->prepare("DELETE FROM {$this->table_name} where id = ?");
        return $query->execute([$id]);
    }
    
}