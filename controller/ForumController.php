<?php

    namespace Controller;

use App\Session;
use Model\Managers\SubjectManager;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategorieManager;
use Model\Managers\MessageManager;

    class ForumController extends AbstractController implements ControllerInterface{

        public function listSubject($id){

            $subjectManager = new SubjectManager();

            return [
                "view" => VIEW_DIR."forum/listSubject.php",
                "data" => [
                    "subjects" => $subjectManager->findSubjectByCategorie($id)
                ]
            ];
        
        }

        public function listCategorie(){

            $listCategorie = new CategorieManager();

            return [
                "view" => VIEW_DIR."forum/listCategorie.php",
                "data" => [
                    "categories" => $listCategorie->findAll(['nomCategorie', 'DESC'])
                ]
            ];
        
        }

        public function listMessage($id){
            
            $listMessages = new MessageManager();
            return [
                "view" => VIEW_DIR."forum/listMessage.php",
                "data" => [
                    //the findMessageBySubject is from the messageManager, this function gets all the messages related to a particular subject
                    'messages' => $listMessages->findMessageBySubject($id),
                    //idtopic is passed in the listmessage so as to be able to add messages patterning to a particular subject
                    'idtopic' => $id
                ]
            ];
        }

        public function insertMessage($id){
            
            $MessageManager = new MessageManager();
            //userid is diclared to be fixed which is = to userid 1
            $userId = 1;

            $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS);
                if($comment){
                    //the add() function is from the manager.php which demands that you pass some parameters to be able to insert values
                    $MessageManager->add(["subject_id" => $id, "user_id" => $userId, "message" => $comment]);
                }
        }
        

        

    }
