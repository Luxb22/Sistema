<?php
    require_once "models/User.php";
    class Users {
        public function main(){
            header("Location:?c=Dashboard");
        }

        //Crear Usuario
        public function userCreate(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/modules/users/crear.usuario.view.php";
            } 
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new User(
                $_POST['rolCode'],
                null,
                $_POST['userName'],
                $_POST['userLastname'],
                $_POST['userId'],
                $_POST['userMail'],
                $_POST['userPhone'],
                $_POST['userPassword'],
                $_POST['userStatus']
            );
            $user->createUser();
            header("Location:?c=Users&a=userRead");  
            }
        }
        // Consultar Usuarios
        public function userRead(){            
            $users = new User();
            $users = $users->readUser();
            require_once "views/modules/users/leer.usuario.view.php";
        }
        // Actualizar Usuarios
        public function userUpdate(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $user = new User();
                $user = $user->getUserById($_GET['userCode']);
                echo "Formulario de Actualización";                
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $user = new User(
                    $_POST['userCode'],
                    $_POST['userName'],
                    $_POST['userLastname'],
                    $_POST['userId'],
                    $_POST['userMail'],
                    $_POST['userPhone'],
                    $_POST['userPassword'],
                    $_POST['userStatus']                    
                );            
                $user->updateUser();
            }
        }
        // Eliminar Roles
        public function userDelete() {
            $user = new User;
            $user->deleteUser($_GET['userCode']);
        }
    }
?>