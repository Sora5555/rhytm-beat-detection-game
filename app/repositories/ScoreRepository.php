<?php
require_once __DIR__ . '/../models/Score.php';
require_once __DIR__ . '/../../config/conn.php';

class ScoreRepository{
      private $conn;
    private $table_name = "scores";
    public function __construct() {
        $connection = new Conn();
        $this->conn = $connection->connect();
    }
    public function getScore($song_id){
        $query = $this->conn->prepare("SELECT * FROM {$this->table_name} JOIN users on users.id = scores.user_id where song_id = ?");
        $query->execute([$song_id]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getUserScore($song_id, $user_id){
        $query = $this->conn->prepare("SELECT * FROM {$this->table_name} JOIN users on users.id = scores.user_id where song_id = ? AND user_id = ? ORDER BY score DESC");
        $query->execute([$song_id, $user_id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function addScore(Score $score){
        $query = $this->conn->prepare("insert into {$this->table_name} (user_id, song_id, score) values (?, ?, ?)");
        $query->execute([$score->user_id, $score->song_id, $score->score]);
        return $this->getUserScore($score->user_id, $score->song_id);
    }
    public function updateScore($score, $song_id, $user_id){
        $query = $this->conn->prepare("UPDATE {$this->table_name} SET score = ? where user_id = ? AND song_id = ?");
        $query->execute([$score, $user_id, $song_id]);
        return $this->getUserScore($song_id, $user_id);
    }
}