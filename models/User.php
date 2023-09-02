<?php
    class User{
        # PARTE I: Programación Orientada a Objetos (Diagrama Clases)
        private $dbh;
        private $rolCodigo;
        private $userCode;
        private $userName;
        private $userLastname;
        private $userId;
        private $userMail;
        private $userPhone;
        private $userPassword;
        private $userStatus;

        public function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this, $f = '__construct' . $i)) {
                call_user_func_array(array($this, $f), $a);
            }
        }
        public function __construct9($rolCodigo,$userCode,$userName,$userLastname,$userId,$userMail,$userPhone,$userPassword,$userStatus){
            $this->rolCodigo = $rolCodigo;
            $this->userCode = $userCode;
            $this->userName = $userName;
            $this->userLastname = $userLastname;
            $this->userId = $userId;
            $this->userMail = $userMail;
            $this->userPhone = $userPhone;
            $this->userPassword = $userPassword;
            $this->userStatus = $userStatus;
        }
        // rolCodigo
        public function setRolCodigo($rolCodigo){
            $this->rolCodigo = $rolCodigo;
        }
        public function getRolCodigo(){
            return $this->rolCodigo;
        }
        // userCode
        public function setUserCode($userCode){
            $this->userCode = $userCode;
        }
        public function getUserCode(){
            return $this->userCode;
        }
        // userName
        public function setUserName($userName){
            $this->userName = $userName;
        }
        public function getUserName(){
            return $this->userName;
        }
        // userLastname
        public function setUserLastname($userLastname){
            $this->userLastname = $userLastname;
        }
        public function getUserLastname(){
            return $this->userLastname;
        }
        // userId
        public function setUserId($userId){
            $this->userId = $userId;
        }
        public function getUserId(){
            return $this->userId;
        }
        // userMail
        public function setUserMail($userMail){
            $this->userMail = $userMail;
        }
        public function getUserMail(){
            return $this->userMail;
        }
        // userPhone
        public function setUserPhone($userPhone){
            $this->userPhone = $userPhone;
        }
        public function getUserPhone(){
            return $this->userPhone;
        }
        // userPassword
        public function setUserPassword($userPassword){
            $this->userPassword = $userPassword;
        }
        public function getUserPassword(){
            return $this->userPassword;
        }
        // userStatus
        public function setUserStatus($userStatus){
            $this->userStatus = $userStatus;
        }
        public function getUserStatus(){
            return $this->userStatus;
        }

        # PARTE II: Persistencia a la Base de Datos (Casos de Uso, CRUD)

        // CUXX - Registrar Usuario
        public function createUser(){
            try {                
                $sql = 'INSERT INTO USERS VALUES (:rolCodigo,:userCode,:userName,:userLastname,:userId,:userMail,:userPhone,:userPassword,:userStatus)';  
                $stmt = $this->dbh->prepare($sql);             
                $stmt->bindValue('rolCodigo', $this->getRolCodigo());
                $stmt->bindValue('userCode', $this->getUserCode()); 
                $stmt->bindValue('userName', $this->getUserName());
                $stmt->bindValue('userLastname', $this->getUserLastname());
                $stmt->bindValue('userId', $this->getUserId());
                $stmt->bindValue('userMail', $this->getUserMail());
                $stmt->bindValue('userPhone', $this->getUserPhone());
                $stmt->bindValue('userPassword', $this->getUserPassword());
                $stmt->bindValue('userStatus', $this->getUserStatus());               
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
    }


?>