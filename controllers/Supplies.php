<?php
    require_once "models/Supplie.php";

    class Supplies {
        public function main() {
            header("Location:?c=Dashboard");
        }
        //Crear Insumo
        public function supplieCreate(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                echo "Formulario Crear Insumo";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
            $supplie = new Supplie(
                1,
                "Cuero",
                "10/09/2023",
                10
            );
            $supplie->createSupplie();
            header("Location:?c=Supplies&a=rolSupplie");
            }
        }
        // Consultar Insumos
        public function supplieRead(){            
            $supplies = new Supplie();
            $supplies = $supplies->readSupplie();
            echo "Formulario Consultar Insumo";
        }
        // Actualizar Insumos
        public function supplieUpdate(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $supplie = new Supplie();
                $supplie = $supplie->getSupplieById($_GET['supplieId']);
                echo "Formulario de Actualización";                
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $supplie = new Supplie(
                    $_POST['supplieId'],
                    $_POST['supplieName'],
                    $_POST['supplieDate'],
                    $_POST['supplieAmount']                    
                );            
                $supplie->updateSupplie();
            }
        }
        // Eliminar Roles
        public function supplieDelete() {
            $supplie = new Supplie;
            $supplie->deleteSupplie($_GET['supplieId']);
        }
    }
?>