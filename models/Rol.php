<?php
    class Rol{
        # PARTE I: Programación Orientada a Objetos (Diagrama Clases)
        private $dbh;
        private $rolCode;
        private $rolName;

        public function __construct(){
            try {
                $this->dbh = DataBase::connection();
                $a = func_get_args();
                $i = func_num_args();
                if (method_exists($this, $f = '__construct' . $i)) {
                    call_user_func_array(array($this, $f), $a);
                }                
            } catch (Exception $e) {
                die($e->getMessage());
            } 
        }
        public function __construct2($rolCode, $rolName){
            $this->rolCode = $rolCode;
            $this->rolName = $rolName;
        }
        // $rolCode
        public function setRolCode($rolCode){
            $this->rolCode = $rolCode;
        }
        public function getRolCode(){
            return $this->rolCode;
        }
        // $rolName
        public function setRolName($rolName){
            $this->rolName = $rolName;
        }
        public function getRolName(){
            return $this->rolName;
        }
        
        # PARTE II: Persistencia a la Base de Datos (Casos de Uso, CRUD)
        
        // CUXX - Registrar Rol
        public function createRol(){
            try {                
                $sql = 'INSERT INTO ROLES VALUES (:rolCode,:rolName)';  
                $stmt = $this->dbh->prepare($sql);                
                $stmt->bindValue('rolCode', $this->getRolCode());
                $stmt->bindValue('rolName', $this->getRolName());                
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
    }
?>