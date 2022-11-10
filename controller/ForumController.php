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
                    "subjects" => $subjectManager->findSubjectByCategorie($id),
                    'idcategorie' => $id
                ]
            ];
        
        }

        public function listCategorie(){

            $categorieManager = new CategorieManager();

            return [
                "view" => VIEW_DIR."forum/listCategorie.php",
                "data" => [
                    "categories" => $categorieManager->findAll(['nomCategorie', 'DESC']),
                    
                ]
            ];
        
        }

        public function listMessage($id){
            
            $messageManager = new MessageManager();
            return [
                "view" => VIEW_DIR."forum/listMessage.php",
                "data" => [
                    //the findMessageBySubject is from the messageManager, this function gets all the messages related to a particular subject
                    'messages' => $messageManager->findMessageBySubject($id),
                    //idtopic is passed in the listmessage so as to be able to add messages patterning to a particular subject
                    'idtopic' => $id
                ]
            ];
        }

        //// INSERT CATEGORYn ///
        public function insertCategorie(){
            
            $categoryManager = new CategorieManager();

            //filtre l'input
            $categorie = filter_input(INPUT_POST, 'categorie', FILTER_SANITIZE_SPECIAL_CHARS);

                if($categorie){
                    $categoryManager->add(["nomCategorie" => $categorie]);
                }

                //this redirectTo() is from AbstractController class which demands 1 parameters
                $this->redirectTo('forum', 'listCategorie');
        }

        //// INSERT SUJET /////
        /*public function insertSubject($id){
            
            $messageManager = new MessageManager();
            $subjectManager = new SubjectManager();
            //userid is diclared to be fixed which is = to userid 1
            $userId = 3;
            $status = true;
            
            //filtre l'input
            $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_SPECIAL_CHARS);
            $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
                if($subject && $message){
                    //the add() function is from the manager.php which demands that you pass some parameters to be able to insert values
                    $subjectid = $subjectManager->add(["categorie_id" => $id, "statuspost" => $status, "user_id" => $userId, "Theme" => $subject]);

                    $messageManager->add(['message' => $message, 'user_id' => $userId, 'subject_id' => $subjectid]);
                }

                //this redirectTo() is from AbstractController class which demands 3 parameters
                $this->redirectTo('forum', 'listSubject', $id);
        }*/

        ///// INSERT MESSAGES ///
        public function insertMessage($id){
            
            $MessageManager = new MessageManager();
            //userid is diclared to be fixed which is = to userid 1
            $userId = 1;

            //filtre l'input
            $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS);
                if($comment){
                    //the add() function is from the manager.php which demands that you pass some parameters to be able to insert values
                    $MessageManager->add(["subject_id" => $id, "user_id" => $userId, "message" => $comment]);
                }

                //this redirectTo() is from AbstractController class which demands 3 parameters
                $this->redirectTo('forum', 'listMessage', $id);
        }

        // public function addMessage($id){

        //     $categorieManager = new CategorieManager();
        //     $subjectManager = new SubjectManager();
        //     $MessageManager = new MessageManager();

        //     $userId = 3;
        //     $status = true;

        //     $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_SPECIAL_CHARS);
        //     $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);

        //     if($subject && $message){
        //         $lastInsertId = $subjectManager->add(["categorie_id" => $id, "statusPost" => $status, "user_id" => $userId, "theme" => $subject]);

        //         $MessageManager->add(['message' => $message, 'user_id' => $userId, 'subject_id' => $lastInsertId]);

        //         $this->redirectTo('forum', 'listSubject', $id);
        //     }

        //     return [
        //         "view" => VIEW_DIR."forum/AddMessage.php",
        //         "data" => [
        //             "categories" => $categorieManager->findAll(['nomCategorie', 'DESC'])
        //         ]
        //     ];
        
        // }
    }
