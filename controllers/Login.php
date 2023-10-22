<?php
    require_once "models/User.php";    
    class Login{
        public function __construct(){}
        public function main(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/company/login.view.php";       
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $userObj = new User(
                    $_POST['userMail'],
                    $_POST['userPassword']
                );
                $userObj = $userObj->login();                
                if ($userObj) {                    
                    header("Location:?c=Dashboard");               
                } else {                  
                    require_once "views/company/login.view.php";
                    echo "El Usuario no está registrado";
                }                
            }
        }
    }    
?>