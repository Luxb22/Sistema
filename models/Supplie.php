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
                        $supplie['supplie_id'],
                        $supplie['supplie_name'],
                        $supplie['supplie_date'],
                        $supplie['supplie_amount']
                    );
                }
                return $supplieList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CUXX - Obtener Insumo por Id
        public function getSupplieById($supplieId){
            try {
                $sql = "SELECT * FROM SUPPLIES WHERE supplie_id=:supplieId";
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('supplieId', $supplieId);
                $stmt->execute();
                $supplieDb = $stmt->fetch();
                $supplie = new Supplie(
                    $supplieDb['supplie_id'],
                    $supplieDb['supplie_name'],
                    $supplieDb['supplie_date'],
                    $supplieDb['supplie_amount']
                );
                return $supplie; 
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CUXX - Actualizar Insumo
        public function updateSupplie(){
            try {               
                $sql = 'UPDATE SUPPLIES SET
                            supplie_id = :supplieId,
                            supplie_name = :supplieName,
                            supplie_date = :supplieDate,
                            supplie_amount = :supplieAmount
                        WHERE supplie_code = :supplieCode';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('supplieId', $this->getSupplieId());
                $stmt->bindValue('supplieName', $this->getSupplieName());
                $stmt->bindValue('supplieDate', $this->getSupplieDate());
                $stmt->bindValue('supplieAmount', $this->getSupplieAmount());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CUXX - Eliminar Insumo
        public function deleteSupplie($supplieId){
            try {
                $sql = 'DELETE FROM SUPPLIES WHERE supplie_id = :supplieId';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('supplieId', $supplieId);
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }            
        }
        
    }
?>