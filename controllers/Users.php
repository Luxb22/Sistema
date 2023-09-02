<?php
    require_once "models/User.php";
    class Users {
        public function main(){}

        //Crear Usuario
        public function userCreate(){
            $user = new User(
                10,
                1,
                "David",
                "Rodriguez",
                1016005953,
                "david@rodriguez.com",
                3006473024,
                123456789,
                1
            );
            $user->createUser();          
        }
    }
?>