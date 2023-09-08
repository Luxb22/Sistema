<?php
    class Production{
        // Programacion orientada a objetos
        private $dbh; 
        private $prodCode;
        private $prodDescription;
        private $prodDate;
        private $prodAmount;
        private $prodId;
        private $prodName;

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
        public function __construct6($prodCode,$prodDescription,$prodDate,$prodAmount,$prodId,$prodName){
            $this->prodCode = $prodCode;
            $this->prodDescription = $prodDescription;
            $this->prodDate = $prodDate;
            $this->prodAmount = $prodAmount;
            $this->prodId = $prodId;
            $this->prodName = $prodName;
        }
        // prodCode
        public function setProdCode($prodCode){
            $this->prodCode = $prodCode;
        }
        public function getProdCode(){
            return $this->prodCode;
        }
        // prodDescription
        public function setProdDescription($prodDescription){
            $this->prodDescription = $prodDescription;
        }
        public function getProdDescription(){
            return $this->prodDescription;
        }
        // prodDate
        public function setProdDate($prodDate){
            $this->prodDate = $prodDate;
        }
        public function getProdDate(){
            return $this->prodDate;
        }
        // prodAmount
        public function setProdAmount($prodAmount){
            $this->prodAmount = $prodAmount;
        }
        public function getProdAmount(){
            return $this->prodAmount;
        }
        // prodId
        public function setProdId($prodId){
            $this->prodId = $prodId;
        }
        public function getProdId(){
            return $this->prodId;
        }
        // prodName
        public function setProdName($prodName){
            $this->prodName = $prodName;
        }
        public function getProdName(){
            return $this->prodName;
        }

        //Persistencia de la base de datos

        //CCXX - Crear Produccion

        public function createProduction(){
            try {                
                $sql = 'INSERT INTO PRODUCTIONS VALUES (:prodCode,:prodDescription,:prodDate,:prodAmount,:prodId,:prodName)';  
                $stmt = $this->dbh->prepare($sql);                
                $stmt->bindValue('prodCode', $this->getProdCode());
                $stmt->bindValue('prodDescription', $this->getProdDescription());
                $stmt->bindValue('prodDate', $this->getProdDate());
                $stmt->bindValue('prodAmount', $this->getProdAmount());
                $stmt->bindValue('prodId', $this->getProdId());
                $stmt->bindValue('prodName', $this->getProdName());                
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            } 
        }
        # CUXX - Consultar Produccion
        public function readProduction(){
            try {
                $prodList = [];
                $sql = 'SELECT * FROM PRODUCTION';
                $stmt = $this->dbh->query($sql);
                foreach ($stmt->fetchAll() as $prod) {
                    $prodList[] = new Production(
                        $prod['prod_code'],
                        $prod['prod_description']
                        $prod['prod_date'],
                        $prod['prod_amount'],
                        $prod['prod_id'],
                        $prod['prod_name']
                    );
                }
                return $prodList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CUXX - Obtener Produccion por Id
        public function getProductionById($productionCode){
            try {
                $sql = "SELECT * FROM PRODUCTION WHERE prod_code=:prodCode";
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('prodCode', $prodCode);
                $stmt->execute();
                $prodDb = $stmt->fetch();
                $prod = new Production(
                    $prodDb['prod_code'],
                    $prodDb['prod_description'],
                    $prodDb['prod_date'],
                    $prodDb['prod_amount'],
                    $prodDb['prod_id'],
                    $prodDb['prod_name']
                );
                return $rol;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CUXX - Actualizar Produccion
        public function updateProduction(){
            try {                
                $sql = 'UPDATE PRODUCTION SET
                            prod_code = :prodCode,
                            prod_description = :prodDescription,
                            prod_date = :prodDate,
                            prod_amount = :prodAmount,
                            prod_id = :prodId,
                            prod_name = :prodName
                        WHERE prod_code = :prodCode';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('prodCode', $this->getProdCode());
                $stmt->bindValue('prodDescription', $this->getProdDescription());
                $stmt->bindValue('prodDate', $this->getProdDate());
                $stmt->bindValue('prodAmount', $this->getProdDate());
                $stmt->bindValue('prodId', $this->getProdId());
                $stmt->bindValue('prodName', $this->getProdName());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CUXX - Eliminar Produccion
        public function deleteProduction($prodCode){
            try {
                $sql = 'DELETE FROM PRODUCTION WHERE prod_code = :prodCode';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('prodCode', $prodCode);
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }            
        }
    }
?>