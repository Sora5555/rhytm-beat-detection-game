<?php 
require __DIR__ . '/../models/Song.php';
require __DIR__ . "/../repositories/SongRepository.php";

class DashboardController {
    private $songModel;
    private $songRepo;
    
    public function __construct(){
        $this->songModel = new Song();
        $this->songRepo = new SongRepository();
    }
    public function index(){
        if(!isset($_SESSION["id"])){
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
        $songs = $this->songRepo->getAllSong();
        require "../views/dashboard.php";
    }
}