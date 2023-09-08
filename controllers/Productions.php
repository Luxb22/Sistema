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
        header("Location:?c=Production&a=rolProduction")
    }
}
?>
