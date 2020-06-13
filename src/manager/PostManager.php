<?php

namespace P4\src\manager;
use P4\src\model\Post;

class PostManager extends DatabaseManager
{
    private function buildObject($row)
    {
        $post = new Post();
        $post->setId($row['id']);
        $post->setTitle($row['title']);
        $post->setContent($row['content']);
        $post->setAuthor($row['author']);
        $post->setCreated_date($row['created_date']);
        return $post;
    }

    public function getPosts()
    {
        $sql = 'SELECT id, title, content, author, created_date FROM posts ORDER BY id DESC LIMIT 5';
        return $this->createQuery($sql);
        $posts = [];
        foreach ($result as $row){
            $postId = $row['id'];
            $posts[$postId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $posts;
    }

    public function getPost($postId)  // gets a specific post based on its id
   {
       $sql = 'SELECT id, title, content, author, created_date FROM posts WHERE id = ?';
       return $this->createQuery($sql, [$postId]);
       $post = $result->fetch();
       $result->closeCursor();
       return $this->buildObject($post);
   }
}
