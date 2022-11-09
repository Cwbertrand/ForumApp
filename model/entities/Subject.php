<?php

namespace Model\Entities;

use Model\Entities\User;
use App\Entity;
use Model\Entities\Categorie;

final class Subject extends Entity
{

        private $id;
        private $theme;
        private $datepost;
        private $statuspost;
        private ?Categorie $categorie = null;
        private ?User $user = null;

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
         * Get the value of theme
         */
        public function getTheme()
        {
                return $this->theme;
        }

        /**
         * Set the value of theme
         *
         * @return  self
         */
        public function setTheme($theme)
        {
                $this->theme = $theme;

                return $this;
        }

        public function getDatePost()
        {
                $formattedDate = $this->datepost->format("d/m/Y, H:i:s");
                return $formattedDate;
        }

        public function setDatePost($date)
        {
                $this->datepost = new \DateTime($date);
                return $this;
        }

        /**
         * Get the value of statuspost
         */
        public function getStatusPost(): ?bool
        {
                return $this->statuspost;
        }

        /**
         * Set the value of statuspost
         *
         * @return  self
         */
        public function setStatusPost(bool $statuspost): self
        {
                $this->statuspost = $statuspost;

                return $this;
        }

        public function getCategorie(): ?Categorie
        {
                return $this->categorie;
        }

        public function setCategorie(?Categorie $categorie): self
        {
                $this->categorie = $categorie;

                return $this;
        }

        public function getUser(): ?User
        {
                return $this->user;
        }

        public function setUser(?User $user): self
        {
                $this->user = $user;

                return $this;
        }
        
        public function __toString()
        {
                return $this->getTheme();
        }
}
