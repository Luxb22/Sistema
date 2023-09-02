<?php
    class Work {
        private $dbh;
        private $workid;
        private $workasign;

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
        public function __construct2($workId, $workAsign){
            $this->workId = $workId;
            $this->workAsign = $workAsign;
        }

        // workId
        public function setWorkId($workId){
            $this->workId = $workId;
        }
        public function getWorkId(){
            return $this->workId;
        }  
        // workAsign
        public function setWorkAsign($workAsign){
            $this->workAsign = $workAsign;
        }
        public function getWorkAsign(){
            return $this->workAsign;
        } 

        public function createWork(){
            try {                
                $sql = 'INSERT INTO WORKS VALUES (:workId,:workAsign)';  
                $stmt = $this->dbh->prepare($sql);                
                $stmt->bindValue('workId', $this->getWorkId());
                $stmt->bindValue('workAsign', $this->getWorkAsign());                
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
    }
?>