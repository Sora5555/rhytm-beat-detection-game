<?php

require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../../config/conn.php';

class UserRepository {
   
    private $conn;
    private $table_name = "users";
    public function __construct() {
        $connection = new Conn();
        $this->conn = $connection->connect();
    }

    public function addUser(User $user){
        $sql = $this->conn->prepare("INSERT INTO  {$this->table_name} (username, password) values (?, ?)");
        $username = $user->username;
        $password = password_hash($user->password, PASSWORD_DEFAULT);
        return $sql->execute([$username, $password]);
    }
    public function getOneUser($username){
        $sql = $this->conn->prepare("SELECT * FROM {$this->table_name} where username = '{$username}'");
        $sql->execute();
        return $sql->fetchObject("User");
    }
    public function getUserSongs($user_id){
        $sql = $this->conn->prepare("SELECT * FROM SONGS WHERE user_id = ?");
        $sql->execute([$user_id]);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function updateUser($username, $password=false){
        if($password){
            $query = $this->conn->prepare("UPDATE {$this->table_name} SET username = ?, password = ? where id = ?");
            $password = password_hash($password, PASSWORD_DEFAULT);
            return $query->execute([$username, $password, $_SESSION["id"]]);
        } else {
            $query = $this->conn->prepare("UPDATE {$this->table_name} SET username = ? where id = ?");
            return $query->execute([$username, $_SESSION["id"]]);
        }
        
    }
}
