<?php
    # Programacion orientada a objetos
    class Supplie{
        private $dbh;
        private $supplieid;
        private $suppliename;
        private $suppliedate;
        private $supplieamount;

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
        public function __construct4($supplieid,$suppliename,$suppliedate,$supplieamount){
            $this->supplieid = $supplieid;
            $this->suppliename = $suppliename;
            $this->suppliedate = $suppliedate;
            $this->supplieamount = $supplieamount;
        }
        // supplieId
        public function setSupplieId($supplieid){
            $this->supplieid = $supplieid;
        }
        public function getSupplieId(){
            return $this->supplieid;
        }
        // supplieName
        public function setSupplieName($suppliename){
            $this->suppliename = $suppliename;
        }
        public function getSupplieName(){
            return $this->suppliename;
        } 
        // supplieDate
        public function setSupplieDate($suppliedate){
            $this->suppliedate = $suppliedate;
        }
        public function getSupplieDate(){
            return $this->suppliedate;
        } 
        // supplieAmount
        public function setSupplieAmount($supplieamount){
            $this->supplieamount = $supplieamount;
        }
        public function getSupplieAmount(){
            return $this->supplieamount;
        } 

        // CUXX - Registrar Insumo
        public function createSupplie(){
            try {
                $sql = 'INSERT INTO SUPPLIES VALUES (:supplieid,:suppliename,:suppliedate,:supplieamount)';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('supplieid', $this->getSupplieId());
                $stmt->bindValue('suppliename', $this->getSupplieName());
                $stmt->bindValue('suppliedate', $this->getSupplieDate());
                $stmt->bindValue('supplieamount', $this->getSupplieAmount());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            } 
        }
        // CUXX - Consultar Insumo
        public function readSupplie(){
            try {
                $supplieList = [];
                $sql = 'SELECT * FROM SUPPLIES';
                $stmt = $this->dbh->query($sql);
                foreach ($stmt->fetchAll() as $supplie) {
                    $supplieList[] = new Supplie(
                        $supplie['supplie_code'],
                        $supplie['supplie_code'],
                        $supplie['supplie_code'],
                        $supplie['supplie_name']
                    );
                }
                return $rolList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

    }
?>