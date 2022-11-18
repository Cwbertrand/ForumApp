<?php

    namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\MessageManager;
use Model\Managers\SubjectManager;
use Model\Managers\CategorieManager;

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
                    //idsubject is passed in the listmessage so as to be able to add messages patterning to a particular subject
                    'idsubject' => $id
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
        public function insertSubject($id){
            
            $messageManager = new MessageManager();
            $subjectManager = new SubjectManager();

            //userid is diclared to be fixed which is = to userid 1
            $userId = \App\Session::getUser()->getId();
            //var_dump($userId); die();
            
            //filtre l'input
            $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_SPECIAL_CHARS);
            $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
            $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_NUMBER_INT);
                if($subject && $message){
                    //the add() function is from the manager.php which demands that you pass some parameters to be able to insert values
                    $subjectid = $subjectManager->add(["categorie_id" => $id, "statuspost" => $status, "user_id" => $userId, "Theme" => $subject]);

                    $messageManager->add(['message' => $message, 'user_id' => $userId, 'subject_id' => $subjectid]);
                }

                //this redirectTo() is from AbstractController class which demands 3 parameters
                $this->redirectTo('forum', 'listSubject', $id);
        }

        ///// INSERT MESSAGES ///
        public function insertMessage($id){
            
            $MessageManager = new MessageManager();
            //userid is diclared to be fixed which is = to userid 1
            $userId = \App\Session::getUser()->getId();
            //var_dump(\App\Session::getUser()); die;
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

        //profile Page
        public function profilePage(){
                
            return [
                "view" => VIEW_DIR."forum/profilepage.php"
            ];
        }

        //voir la page modifiersubject
        public function editSubject($id){
            $subjectManager = new SubjectManager();

            return [
                "view" => VIEW_DIR."forum/ModifierSubject.php",
                "data" => [
                    'subjects' => $subjectManager->findOneById($id)
                ]
            ];
        }
        //voir la page modifiermessage 
        public function editmessage($id){
            $messageManager = new MessageManager();
            return [
                "view" => VIEW_DIR."forum/ModifierMessage.php",
                "data" => [
                    'messages' => $messageManager->findOneById($id)
                ]
            ];
        }
        
        ///// DELETE BY ADMIN ///
        public function deleteCategorie($id){
            $categorieManager = new CategorieManager;
            $categorieManager->deleteCategorie($id);
            $this->redirectTo('forum', 'listCategorie');
        }

        public function deleteSubject($id){
            $messageManager = new MessageManager();
            $subjectManager = new SubjectManager;
            $messageManager->deleteMessage($id);
            $subjectManager->deleteSubject($id);
            $this->redirectTo('forum', 'listCategorie', $id);
        }

        ////// MODIFIER PAR ADMIN //////
        public function modifierCategorie($id){
            $newNomCategorie = filter_input(INPUT_POST, 'newNomCategorie', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if($newNomCategorie){
                $categorieManager = new CategorieManager;
                $categorieManager->editCategorie($id, $newNomCategorie);
            }
            $this->redirectTo('forum', 'listCategorie');
        }

        public function modifierSubject($id){
            $subjectManager = new SubjectManager();
            $subject = $subjectManager->findOneById($id);

            $editSubject = filter_input(INPUT_POST, 'editsubject', FILTER_SANITIZE_SPECIAL_CHARS);
            $editStatus = filter_input(INPUT_POST, 'editStatus', FILTER_VALIDATE_BOOL);
            //var_dump($editSubject); die;
            //var_dump($editStatus); die;
            if($editSubject && $editStatus){
                $subjectManager->editSubject($id, $editSubject, $editStatus);
                //var_dump($editStatus); die;
            }
            $this->redirectTo('forum', 'listSubject', $subject->getCategorie()->getId());
        }

        public function modifierMessage($id){
            $messageManager = new MessageManager();

            $message = $messageManager->findOneById($id);
            $editMessage = filter_input(INPUT_POST, 'editmessage', FILTER_SANITIZE_SPECIAL_CHARS);

            if($editMessage){
                $messageManager->editMessage($id, $editMessage);
            }
            $this->redirectTo('forum', 'listMessage', $message->getSubject()->getId());
        }

        ///// LOCK subject ////
        public function lockSubject($id) {
            $subjectManager = new SubjectManager();
            $subject = $subjectManager->findOneById($id);

            if($_SESSION['user']) {
                $userId = $_SESSION['user']->getId();

                if($userId==$subject->getUser()->getId()) {
                    $subjectManager->lockSubject($id);
                    $this->redirectTo("forum","listSubject", $subject->getCategorie()->getId());
                } else {
                    Session::addFlash("error","vous n'êtes pas autorisé à modifier ce sujet");
                    $this->redirectTo("forum","listSubject", $subject->getCategorie()->getId());
                }

            } else {
                Session::addFlash("error","vous n'êtes pas autorisé à modifier ce sujet");
                    $this->redirectTo("forum","listSubject", $subject->getCategorie()->getId());
            }
        }

        public function unlockSubject($id) {
            $subjectManager = new SubjectManager();
            $messageManager = new MessageManager();
            $subject = $subjectManager->findOneById($id);
            $message = $messageManager->findOneById($id);

            if($_SESSION['user']) {
                $userId = $_SESSION['user']->getId();
                if($userId == $subject->getUser()->getId()) {
                    $subjectManager->unlockSubject($id);
                    $this->redirectTo("forum",'listMessage', $message->getSubject()->getId());
                } else {
                    Session::addFlash("error","");
                    $this->redirectTo("forum","listSubject", $subject->getCategorie()->getId());
                }

            } else {
                Session::addFlash("error","");
                $this->redirectTo("forum","listSubject", $subject->getCategorie()->getId());
            }
    }
}
