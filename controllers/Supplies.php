<?php
    require_once "models/Supplie.php";

    class Supplies {
        public function main() {}

        public function supplieCreate(){
            $supplie = new Supplie(
                1,
                "Cuero",
                "10/09/2023",
                10
            );
            $supplie->createSupplie();
        }
    }
?>