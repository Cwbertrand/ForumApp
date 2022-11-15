<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    //use Model\Managers\TopicManager;

    class SubjectManager extends Manager{

        protected $className = "Model\Entities\Subject";
        protected $tableName = "subject";


        public function __construct(){
            parent::connect();
        }

        public function findSubjectByCategorie($id){
            $sql = "SELECT * FROM  ".$this->tableName." s
                    WHERE s.categorie_id = :id
                    ORDER BY datePost";
                    
            return $this->getMultipleResults(
                DAO::select($sql, ['id' => $id]),
                $this->className
            );
            
        }

        public function deleteSubject($id){
            $sql = "SET FOREIGN_KEY_CHECKS=0;
                    DELETE FROM  ".$this->tableName." s
                    WHERE s.id_subject = :id";
                    
            return $this->getOneOrNullResult(
                DAO::delete($sql, ['id' => $id]),
                $this->className
            );
            
        }


    }