<?php
    require_once "models/Rol.php";
    class Roles {
        public function main(){
            header("Location:?c=Dashboard");
        }

        // Crear Rol
        public function rolCreate(){  
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/modules/roles/crear.rol.view.php";
            }        
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {          
            $rol = new Rol(
                null,
                $_POST['rolName'],
            );           
            $rol->createRol();
            header("Location:?c=Roles&a=rolRead");
            }

        }
        // Consultar Roles
        public function rolRead(){            
            $roles = new Rol();
            $roles = $roles->readRol();
            require_once "views/modules/roles/leer.rol.view.php";
        }
        // Actualizar Roles
        public function rolUpdate(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $rol = new Rol();
                $rol = $rol->getRolById($_GET['rolCode']);
                echo "Formulario de Actualización";                
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $rol = new Rol(
                    $_POST['rolCode'],
                    $_POST['rolName']                    
                );            
                $rol->updateRol();
            }
        }
        // Eliminar Roles
        public function rolDelete() {
            $rol = new Rol;
            $rol->deleteRol($_GET['rolCode']);
        }
    }
?>