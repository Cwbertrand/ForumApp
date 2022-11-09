<?php

namespace Model\Entities;

use App\Entity;
use Model\Entities\User;
use Model\Entities\Subject;

final class Message extends Entity
{

        private $id;
        private $message;
        private $createAt;
        private $user;
        private $subject;
        

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
         * Get the value of message
         */ 
        public function getMessage()
        {
                return $this->message;
        }

        /**
         * Set the value of message
         *
         * @return  self
         */ 
        public function setMessage($message)
        {
                $this->message = $message;

                return $this;
        }

        public function getCreateAt()
        {
                $formattedDate = $this->createAt->format("d/m/Y, H:i:s");
                return $formattedDate;
        }

        public function setCreateAt($date)
        {
                $this->createAt = new \DateTime($date);
                return $this;
        }

        public function getUser()
        {
                return $this->user;
        }

        public function setUser($user): self
        {
                $this->user = $user;

                return $this;
        }

        public function getSubject()
        {
                return $this->subject;
        }

        public function setSubject($subject): self
        {
                $this->subject = $subject;

                return $this;
        }

        public function __toString()
        {
                return $this->getMessage();
        }
}

