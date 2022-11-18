<?php

Namespace Model\Entities;

use App\Entity;


class User extends Entity{
    private $id;
    private $pseudo;
    private $email;
    private $password;
    private $role;
    private $ban;

    public function __construct($data)
    {
        $this->hydrate($data);
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of psuedo
     */ 
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set the value of psuedo
     *
     * @return  self
     */ 
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function __toString()
    {
        return $this->getPseudo() .''. $this->getPassword();
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    public function showRole(){

        if ($this->role === 1) {
                return 'ADMIN';
        }else{
                return 'USER';
        }
}

    /**
     * Get the value of ban
     */ 
    public function getBan()
    {
        return $this->ban;
    }

    /**
     * Set the value of ban
     *
     * @return  self
     */ 
    public function setBan($ban)
    {
        $this->ban = $ban;

        return $this;
    }
}