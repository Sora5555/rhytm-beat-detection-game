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
             $checkExist = $this->scoreRepo->addScore($this->scoreModel);
        } else {
            $checkExist = $this->scoreRepo->updateScore($this->scoreModel->score, $this->scoreModel->song_id, $this->scoreModel->user_id);
            
        }
        $score = $this->scoreRepo->getScore($_POST["song_id"]);
        $checkPosition = array_search($checkExist, $score);
        require "../views/gameScore.php";
        
    }
 }