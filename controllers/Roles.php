<?php
    require_once "models/Rol.php";
    class Roles {
        public function main(){}

        // Crear Rol
        public function createRol(){            
            $rol = new Rol(
                3,
                "Costomer"
            );            
            echo "<br>Código: " . $rol->getRolCode();
            echo "<br>Nombre: " . $rol->getRolName();
        }
    }
?>