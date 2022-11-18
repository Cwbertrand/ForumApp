<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;
use Model\Entities\Categorie;

class CategorieManager extends Manager{
    protected $className = "Model\Entities\Categorie";
    protected $tableName = "categorie";

    public function __construct(){
        parent::connect();
    }

    public function deleteCategorie($id){
        $sql = "DELETE FROM  ".$this->tableName."
                WHERE id_categorie = :id";
                
        return $this->getOneOrNullResult(
            DAO::delete($sql, ['id' => $id]),
            $this->className
        );
    }

    public function editCategorie($id, $newNomCategorie){
        $sql = "UPDATE ".$this->tableName."
                SET nomCategorie = :newNomCategorie
                WHERE id_categorie = :id";
                
        return $this->getOneOrNullResult(
            DAO::update($sql, [
                'newNomCategorie' => $newNomCategorie,
                'id' => $id
            ]),$this->className
        );
    }
}