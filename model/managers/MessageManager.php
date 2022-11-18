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

        public function deleteMessage($id){
            $sql = "DELETE FROM  ".$this->tableName." m
                    WHERE m.subject_id = :id";
                    
            return $this->getOneOrNullResult(
                DAO::delete($sql, ['id' => $id]),
                $this->className
            );
            
        }

        public function editMessage($id, $editMessage){
            $sql = "UPDATE ".$this->tableName."
                    SET message = :editmessage
                    WHERE id_message = :id";
                    
            return $this->getOneOrNullResult(
                DAO::update($sql, [
                    'editmessage' => $editMessage,
                    'id' => $id
                ]),$this->className
            );
        }

    }