<?php
session_start();
require __DIR__ . '/../models/User.php';
require __DIR__ . "/../repositories/UserRepository.php";
class AuthController{
    private $userRepo;
    private $userModel;
    public function __construct(){
        $this->userRepo = new UserRepository();
        $this->userModel = new User();
    }
    public function loginView(){
        header("Location: ../views/auth/login.php");
    }
    public function registerView() {
        header("Location: ../views/auth/register.php");
    }
    public function login(){
            try {
                
                $userOne = $this->userRepo->getOneUser($_POST["username"]);
                
                if(password_verify($_POST["password"], $userOne->password)){
                    $_SESSION["id"] = $userOne->id;
                    header("Location: ../index.php");
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
                header("Location: ../index.php");
            } catch (\Throwable $th) {
                //throw $th;
                echo $th->getMessage();
            }
        } else {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }
}