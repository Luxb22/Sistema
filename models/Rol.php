<?php
    class Rol{
        # PARTE I: Programación Orientada a Objetos (Diagrama Clases)
        private $rolCode;
        private $rolName;

        public function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this, $f = '__construct' . $i)) {
                call_user_func_array(array($this, $f), $a);
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

    }
?>