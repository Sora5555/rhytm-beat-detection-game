<?php
require_once __DIR__ . '/../models/Score.php';
require_once __DIR__ . "/../repositories/ScoreRepository.php";
 class ScoreController {
    private $scoreModel;
    private $scoreRepo;
    public function __construct(){
        $this->scoreModel = new Score();
        $this->scoreRepo = new ScoreRepository();
    }
    public function index() {
        $this->scoreModel->song_id = $_POST["song_id"];
        $this->scoreModel->user_id = $_POST["user_id"];
        $this->scoreModel->score = $_POST["score"];
        $checkExist = $this->scoreRepo->getUserScore($this->scoreModel->song_id, $this->scoreModel->user_id);
        if(empty($checkExist)){
             $this->scoreRepo->addScore($this->scoreModel);
        }
        $score = $this->scoreRepo->getScore($_POST["song_id"]);
        require "../views/gameScore.php";
        
    }
 }