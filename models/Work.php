<?php
    class Work {
        # Programacion Orientada a objetos
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

        //CUXX - Registrar Labor
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
        # CUXX - Consultar Labores
        public function readWork(){
            try {
                $workList = [];
                $sql = 'SELECT * FROM WORKS';
                $stmt = $this->dbh->query($sql);
                foreach ($stmt->fetchAll() as $work) {
                    $workList[] = new Work(
                        $work['work_id'],
                        $work['work_asign']
                    );
                }
                return $workList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CUXX - Obtener Labor por Id
        public function getWorkById($workCode){
            try {
                $sql = "SELECT * FROM WORKS WHERE work_id=:workId";
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('workId', $workId);
                $stmt->execute();
                $workDb = $stmt->fetch();
                $work = new Work(
                    $workDb['work_id'],
                    $workDb['work_asign']
                );
                return $work;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CUXX - Actualizar Labor
        public function updateWork(){
            try {                
                $sql = 'UPDATE WORKS SET
                            work_id = :workId,
                            work_asign = :workAsign
                        WHERE work_id = :workId';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('workId', $this->getWorkId());
                $stmt->bindValue('workasign', $this->getWorkAsign());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CUXX - Eliminar Labor
        public function deleteWork($workId){
            try {
                $sql = 'DELETE FROM WORKS WHERE work_id = :workId';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('workId', $workId);
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }            
        }
    }
?>