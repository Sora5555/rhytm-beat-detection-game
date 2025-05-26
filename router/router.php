<?php
 require_once '../app/controllers/scoreController.php';
 require_once '../app/controllers/authController.php';
 require_once '../app/controllers/dashboardController.php';
 require_once '../app/controllers/gameController.php';
//  session_start();
 $scoreController = new ScoreController();
 $authController = new AuthController();
 $dashboardController = new DashboardController();
 $gameController = new GameController();
 $action = $_GET['action'] ?? 'index';
if(empty($_POST["route"])){
    switch ($action) {
    case "gameStart":
        $gameController->index($_GET["id"]);
        break;
    case 'index':
        $dashboardController->index();
        break;
    case "register":
        $authController->registerView();
        break;
    case "store":
        $authController->store();
        break;
    case "login":
        $authController->loginView();
        break;
    default:
        echo "404 Not Found";
        break;
    }
    } else {
        switch ($_POST["route"]){
            case "songUpload":
                $dashboardController->songUpload();
                break;
            case "gameScore":
                $scoreController->index();
                break;
             case "registerStore":
                $authController->store();
                break;
            case "auth":
                $authController->login();
                break;
            
        }
    }
