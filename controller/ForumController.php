<?php

    namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Entities\Categorie;
use Model\Managers\CategorieManager;
use Model\Managers\TopicManager;
use Model\Managers\PostManager;
    
    class ForumController extends AbstractController implements ControllerInterface{

        public function index(){

            $topicManager = new TopicManager();

            return [
                "view" => VIEW_DIR."forum/listTopics.php",
                "data" => [
                    "topics" => $topicManager->findAll(["creationdate", "DESC"])
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

        

    }
