<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;

    class MessageManager extends Manager{

        protected $className = "Model\Entities\Message";
        protected $tableName = "message";


        public function __construct(){
            parent::connect();
        }

        public function findMessageBySubject($id){
            $sql = "SELECT * FROM  ".$this->tableName." m
                    WHERE m.subject_id = :id
                    ORDER BY createAt";
                    
            return $this->getMultipleResults(
                DAO::select($sql, ['id' => $id]),
                $this->className
            );
        }

    }