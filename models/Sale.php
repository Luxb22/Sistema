<?php
    class Sale{
        private $dbh;
        private $idSale;
        private $$idSale;
        private $clientSale;

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

        public function __construct3($$idSale, $$idSale, $clientSale){
            $this->rolCode = $rolCode;
            $this->rolName = $rolName;
            $this->rolName = $rolName;
        }
    }

?>