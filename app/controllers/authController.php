<?php
session_start();
require __DIR__ . '/../models/User.php';
require __DIR__ . "/../repositories/UserRepository.php";
require __DIR__ . "/../repositories/SongRepository.php";
class AuthController{
    private $userRepo;
    private $userModel;
    private $songRepo;
    public function __construct(){
        $this->userRepo = new UserRepository();
        $this->userModel = new User();
        $this->songRepo = new SongRepository();
    }
    public function loginView(){
        if(isset($_SESSION["id"])){
            header("Location: ../router/router.php");
         }else {
             require "../views/auth/login.php";
         }
    }
    public function registerView() {
         if(isset($_SESSION["id"])){
            header("Location: ../router/router.php");
         } else {
              require "../views/auth/register.php";
         }
       
    }
    public function login(){
            try {
                $userOne = $this->userRepo->getOneUser($_POST["username"]);
                if($_COOKIE["username"]){
                    $userOne = $this->userRepo->getOneUser($_COOKIE["username"]);
                }
                
                
                if(password_verify($_POST["password"], $userOne->password)){

                    $_SESSION["id"] = $userOne->id;
                    $_SESSION["username"] = $userOne->username;
                    if(isset($_POST["remember"])){
                        setcookie("username", $userOne->username, time() + (86400 * 30), "/");
                    }
                     header('Location: ../router/router.php');
                } else {
                     header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
            } catch (\Throwable $th) {
                //throw $th;
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
           
    }
    public function store(){
        if(isset($_POST["username"]) && isset($_POST["password"]) && $_POST["password"] == $_POST["reconfirm_password"]){
            $this->userModel->username = $_POST["username"];
            $this->userModel->password = $_POST["password"];

            try {
                $this->userRepo->addUser($this->userModel);
                header("Location: ../router/router.php?action=login");
            } catch (\Throwable $th) {
                //throw $th;
                echo $th->getMessage();
            }
        } else {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }
    public function logout(){
        session_unset();
        session_destroy();
        header("Location: ../router/router.php?action=login");
    }
    public function profile(){
        if(!isset($_SESSION["id"])){
            header("Location: ../router/router.php");
         } else {
            $userOne = $this->userRepo->getOneUser($_SESSION["username"]);
            $songs = $this->userRepo->getUserSongs($_SESSION["id"]);
             require "../views/auth/profile.php";
         }
    }
    public function updateProfile(){
        if(isset($_POST["password"])){
            if($_POST["password"] == $_POST["reconfirm_password"]){
                $this->userRepo->updateUser($_POST["username"], $_POST["password"]);
                $_SESSION["username"] = $_POST["username"];
            }
        } else {
            $this->userRepo->updateUser($_POST["username"]);
            $_SESSION["username"] = $_POST["username"];
        }

        header("Location: ../router/router.php?action=profile");
    }
    public function deleteSong(){
        $song = $this->songRepo->getOneSong($_POST["song_id"]);
        $deleted = $this->songRepo->deleteOneSong($_POST["song_id"]);
        if($song){
            $deleted = unlink("../public/{$song->song_name}");
            if ($deleted){
                $this->songRepo->deleteOneSong($_POST["song_id"]);
                header("Location: ../router/router.php?action=profile");
            }
        } else {
            header("Location: ../router/router.php?action=profile");
        }
    }
}