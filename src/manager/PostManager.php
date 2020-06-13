<?php

namespace P4\src\manager;

class PostManager extends DatabaseManager
{

    public function getPosts()
    {

        $sql = 'SELECT id, title, content, author, created_date FROM posts ORDER BY id DESC LIMIT 5';
        return $this->createQuery($sql);

    }

    public function getPost($postId)  // gets a specific post based on its id
   {

       $sql = 'SELECT id, title, content, author, created_date FROM posts WHERE id = ?';
       return $this->createQuery($sql, [$postId]);
   }
}
