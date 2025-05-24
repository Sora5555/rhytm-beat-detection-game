<?php
require_once __DIR__ . '/../models/Song.php';
require_once __DIR__ . "/../repositories/SongRepository.php";
class GameController {
    private $songModel;
    private $songRepo;
    public function __construct(){
        $this->songModel = new Song();
        $this->songRepo = new SongRepository();
    }
    public function index($id) {  
        $songParam = $this->songRepo->getOneSong($id);
        require "../views/gameStart.php";
    }
}