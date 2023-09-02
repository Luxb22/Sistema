<?php
require_once "models/Production.php";  

class Productions {
    public function main() {}
    
    // Crear Produccion
    public function productionCreate(){
        $production = new Production(
            1,
            "Chaqueta de cuero",
            10,
            12,
            1,
            "Chaqueta"
        );
        $production->createProduction();
    }
}
?>
