<?php
    require_once "models/Work.php";

    class Works {
        public function main(){
            header("Location:?c=Dashboard");
        }
        // Crear Labor
        public function workCreate(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                echo "Formulario de Crear Labores";
            }     
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {   
            $work = new Work(
                1,
                "Alberto"
            );
            $work->createWork();
            header("Location:?c=Works&a=workRead");
            }
        }
        // Consultar Labores
        public function workRead(){            
            $works = new Work();
            $works = $works->readWork();
            echo "Formulario de Consultar Labores";
        }
        // Actualizar Labores
        public function workUpdate(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $work = new Work();
                $work = $work->getWorkById($_GET['workCode']);
                echo "Formulario de Actualización";                
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $work = new Work(
                    $_POST['workId'],
                    $_POST['workAsign']                    
                );            
                $work->updateWork();
            }
        }
        // Eliminar Labores
        public function workDelete() {
            $work = new Work;
            $work->deleteWork($_GET['workCode']);
        }
    }
?>