<?php

class Post {

    public function getPosts()
    {
        $db = new Database();
        $connection = $db->getConnection();
        $result = $connection->query('SELECT id, title, content, author, created_date FROM posts ORDER BY id DESC');
        return $result;

    }

    public function getPost($postId)  // gets a specific post based on its id
   {
       $db = new Database();
       $connection = $db->getConnection();
       $result = $connection->prepare('SELECT id, title, content, author, created_date FROM posts WHERE id = ?');
       $result->execute([
           $postId
       ]);
       return $result;
   }



}
