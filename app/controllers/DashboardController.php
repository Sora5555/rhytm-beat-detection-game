<?php 
require_once __DIR__ . '/../models/Song.php';
require_once __DIR__ . "/../repositories/SongRepository.php";

class DashboardController {
    private $songModel;
    private $songRepo;
    
    public function __construct(){
        $this->songModel = new Song();
        $this->songRepo = new SongRepository();
    }
    public function index(){
        if(!isset($_SESSION["id"])){
            header('Location: ../router/route.php?action=login');
            exit;
        }
        $songs = $this->songRepo->getAllSong();
        require "../views/dashboard.php";
    }
    public function songUpload(){
        $target_dir = "../public/";
        $target_file = $target_dir . basename($_FILES["songFile"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["songFile"]["tmp_name"]);
            if($check !== false) {
                echo "File is a song - " . $check["mime"] . ".";
                $uploadOk = 1;
        } else {
            echo "File is not a song.";
            $uploadOk = 0;
        }
        }

        if($imageFileType != "mp3" ) {
            echo "Sorry, mp3 formats only.";
            $uploadOk = 0;
        }


    if($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["songFile"]["tmp_name"], $target_file)) {
            $this->songModel->songName = $_FILES["songFile"]["name"];
            $this->songModel->songPath = $target_dir;
            $this->songRepo->addSong( $this->songModel );
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    }
}