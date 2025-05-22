<?php
 require_once '../app/controllers/scoreController.php';
 require_once '../app/controllers/authController.php';
 require_once '../app/controllers/DashboardController.php';
//  session_start();
 $scoreController = new ScoreController();
 $authController = new AuthController();
 $dashboardController = new DashboardController();
 $action = $_GET['action'] ?? 'index';
if(isset($_SESSION["id"])){
    switch ($action) {
    case 'index':
        $dashboardController->index();
        break;
    case 'create':
        echo "coming soon";
        break;
    case 'store':
        echo "coming soon";
        break;
    case 'edit':
        echo "coming soon";
        break;
    case 'update':
        $scoreController->update();
        break;
    case 'delete':
        echo "coming soon";
        break;
    default:
        echo "404 Not Found";
    break;
    }

} else {
    if(empty($_POST["route"])){
         switch ($action) {
        
       
        case "register":
            $authController->registerView();
            break;
        case "store":
            $authController->store();
            break;
        case "game":
            header("Location: ../views/gameStart.php");
            break;
        default:
            $authController->loginView();
            break;
        }
    } else {
        switch ($_POST["route"]) {
            case "registerStore":
                $authController->store();
                break;
            case "auth":
                $authController->login();
                break;
            }
    }
        
}