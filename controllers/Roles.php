<?php
    require_once "models/Rol.php";
    class Roles {
        public function main(){}

        // Crear Rol
        public function rolCreate(){            
            $rol = new Rol(
                null,
                "seller"
            );            
            $rol->createRol();
        }
    }
?>