<?php

    require_once '../models/UsersModel.php';
    require_once '../helpers/session_helper.php';
    require_once('../controllers/BaseController.php');

    class UsersController extends BaseController{

        private $userModel;
        
        public function __construct(){
            $this->userModel = new UsersModel;
            $this->folder = 'pages';
        }

        public function register(){
            //Process form
            
            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Init data
            $data = [
                'usersName' => trim($_POST['usersName']),
                'usersEmail' => trim($_POST['usersEmail']),
                'usersUid' => trim($_POST['usersUid']),
                'usersPwd' => trim($_POST['usersPwd']),
                'pwdRepeat' => trim($_POST['pwdRepeat'])
            ];
 
            //Validate inputs
            if(empty($data['usersName']) || empty($data['usersEmail']) || empty($data['usersUid']) || 
            empty($data['usersPwd']) || empty($data['pwdRepeat'])){
                redirect("../index.php?controller=pages&action=signup");
            }

            if(!preg_match("/^[a-zA-Z0-9]*$/", $data['usersUid'])){
                redirect("../index.php?controller=pages&action=signup");
            }

            if(!filter_var($data['usersEmail'], FILTER_VALIDATE_EMAIL)){
                redirect("../index.php?controller=pages&action=signup");
            }

            if(strlen($data['usersPwd']) < 6){
                redirect("../index.php?controller=pages&action=signup");
            } else if($data['usersPwd'] !== $data['pwdRepeat']){
                redirect("../index.php?controller=pages&action=signup");
            }

            //User with the same email or password already exists
            if($this->userModel->findUserByEmailOrUsername($data['usersEmail'], $data['usersName'])){
                redirect("../index.php?controller=pages&action=signup");
            }

            //Passed all validation checks.
            //Now going to hash password
            $data['usersPwd'] = password_hash($data['usersPwd'], PASSWORD_DEFAULT);

            //Register User
            if($this->userModel->register($data)){
                redirect("../index.php");
            }else{
                die("Something went wrong");
            }
        }

    public function login(){
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //Init data
        $data=[
            'name/email' => trim($_POST['name/email']),
            'usersPwd' => trim($_POST['usersPwd'])
        ];

        if(empty($data['name/email']) || empty($data['usersPwd'])){
            redirect("../index.php");
            exit();
        }

        //Check for user/email
        if($this->userModel->findUserByEmailOrUsername($data['name/email'], $data['name/email'])){
            //User Found
            $loggedInUser = $this->userModel->login($data['name/email'], $data['usersPwd']);
            if($loggedInUser){
                //Create session
                $this->createUserSession($loggedInUser);
            }else{
                redirect("../index.php");
            }
        }else{
            redirect("../index.php");
        }
    }
    

    public function createUserSession($user){
        $_SESSION['usersId'] = $user->usersId;
        $_SESSION['usersName'] = $user->usersName;
        $_SESSION['usersEmail'] = $user->usersEmail;
        redirect("../index.php");
    }

    public function logout(){
        unset($_SESSION['usersId']);
        unset($_SESSION['usersName']);
        unset($_SESSION['usersEmail']);
        session_destroy();
        redirect("../index.php");
    }
}

    $init = new UsersController;

    // Ensure that user is sending a post request
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        switch($_POST['type']){
            case 'register':
                $init->register();
                break;
            case 'login':
                $init->login();
                break;
            default:
                redirect("../index.php");
        }
        
    }else{
        switch($_GET['q']){
            case 'logout':
                $init->logout();
                break;
            default:
            redirect("../index.php");
        }
    }

    