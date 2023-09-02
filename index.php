<?php
    require_once "models/DataBase.php";    
    require_once "controllers/Works.php";        
    $controller = new Works;
    $controller->workCreate();   
?>