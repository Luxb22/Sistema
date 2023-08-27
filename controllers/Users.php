<?php
    require_once "models/User.php";
    class Users {
        public function main(){}

        //Crear Usuario
        public function userCreate(){
            $user = new User(
                null,
                4,
                "Juan",
                "Perez",
                1016005953,
                "juan@perez.com",
                3006473024,
                123456789,
                "active"
            );
            $user->createUser();           
        }
    }
?>