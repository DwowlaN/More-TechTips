<?php
    include_once(__DIR__ . "/Db.php");
    class Comment{
        private $text;
        private $postId;
        private $userId;
        

        /**
         * Get the value of text
         */ 
        public function getText()
        {
                return $this->text;
        }

        /**
         * Set the value of text
         *
         * @return  self
         */ 
        public function setText($text)
        {
            if(empty($text)){
                throw new Exception("comment can't be empty");
            }
        $this->text = $text;
        }

        /**
         * Get the value of postId
         */ 
        public function getPostId()
        {
                return $this->postId;
        }

        /**
         * Set the value of postId
         *
         * @return  self
         */ 
        public function setPostId($postId)
        {
                $this->postId = $postId;

                return $this;
        }

        /**
         * Get the value of userId
         */ 
        public function getUserId()
        {
                return $this->userId;
        }

        /**
         * Set the value of userId
         *
         * @return  self
         */ 
        public function setUserId($userId)
        {
                $this->userId = $userId;

                return $this;
        }

        public function save()
        {
            $text = $this->getText();
            $postId = $this->getPostId();
            $userId = $this->getUserId();

            $conn = Db::getConnection();
            $statement = $conn->prepare("insert into comments (text, post_id, user_id) values (:text, :postId, :userId)");

            $statement->bindValue(":text", $text);
            $statement->bindValue(":postId", $postId);
            $statement->bindValue(":userId", $userId);

            $result = $statement->execute();
            return $result;
        }

        public function getAllComments($postId)
        {
            $conn = Db::getConnection();
            $statement = $conn->prepare("select * from comments where post_id = :postId");
            $statement->bindValue(':postId', $postId);
            $result = $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }