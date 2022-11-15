<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;

    class UserManager extends Manager{

        protected $className = "Model\Entities\User";
        protected $tableName = "user";


        public function __construct(){
            parent::connect();
        }

        public function UserPassword($email){
            $sql = "SELECT password FROM  ".$this->tableName."
                    WHERE email = :email";
            
            // this selects only the password of the user    
            return $this->getSingleScalarResult(
                DAO::select($sql, ['email' => $email])
            );
        }

        public function UserEmail($email){
            $sql = "SELECT id_user, email, pseudo, role FROM  ".$this->tableName."
                    WHERE email = :email";
                    
            return $this->getSingleScalarResult(
                DAO::select($sql, ['email' => $email])
            );
        }


    }