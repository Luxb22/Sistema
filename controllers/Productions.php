<?php
    require_once "models/Production.php";  

    class Productions {
        public function main() {}
    
        // Crear Produccion
        public function productionCreate(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                echo "Formulario de crear produccion";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $production = new Production(
                1,
                "Chaqueta de cuero",
                10,
                12,
                1,
                "Chaqueta"
            );
            $production->createProduction();
            header("Location:?c=Production&a=rolProduction");
            }
        }
        // Consultar Produccion
        public function productionRead(){            
            $productions = new Production();
            $productions = $productions->readProduction();
            echo "Formulario de Consultar produccion";
        }
        // Actualizar Produccion
        public function productionUpdate(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $production = new Production();
                $production = $production->getProdById($_GET['prodCode']);
                echo "Formulario de Actualización de produccion";                
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $production = new Production(
                    $_POST['prodCode'],
                    $_POST['prodDescription'],
                    $_POST['prodDate'],
                    $_POST['prodAmount'],
                    $_POST['prodId'],
                    $_POST['prodName']                    
                );            
                $production->updateProduction();
            }
        }
        // Eliminar Produccion
        public function productionDelete() {
            $prod = new Production;
            $prod->deleteprod($_GET['prodCode']);
        }
    }
?>
