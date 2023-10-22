<?php
    require_once "models/Sale.php";
    class Sales {
        public function main (){
            echo "Contralador de Ventas";
        }
        //Crear Venta
        public function saleCreate(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/modules/sales/crear.sale.view.php";
            }        
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {          
            $sale = new Sale(
                null,
                $_POST['userSale'],
                $_POST['clientSale']
            );           
            $sale->createSale();
            echo "Vista de crear venta";
            }

        }
    }

?>