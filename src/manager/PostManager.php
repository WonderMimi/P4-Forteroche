<?php

namespace P4\src\manager;

use P4\config\Parameter;
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

    public function getPosts() // gets last 5 posts
    {
        $sql = 'SELECT id, title, content, author, created_date FROM posts ORDER BY id DESC LIMIT 5';
        $result = $this->createQuery($sql);
        $posts = [];
        foreach ($result as $row) {
            $posts[$row['id']] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $posts;
    }

    public function getPost($postId)  // gets a specific post based on its id
    {
        $sql = 'SELECT id, title, content, author, created_date FROM posts WHERE id = ?';
        $result = $this->createQuery($sql, [$postId]);
        $post = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($post);
    }

    public function addPost(Parameter $form_post)
    {
        $sql = 'INSERT INTO posts (title, content, author, created_date) VALUES (?, ?, ?, NOW())';
        $this->createQuery($sql, [$form_post->get('title'), $form_post->get('content'), $form_post->get('author')]);
    }

    public function editPost(Parameter $form_post, $postId)
    {
        $sql = 'UPDATE posts SET title=:title, content=:content, author=:author WHERE id=:postId';
        $this->createQuery($sql, [
            'title' => $form_post->get('title'),
            'content' => $form_post->get('content'),
            'author' => $form_post->get('author'),
            'postId' => $postId
        ]);
    }

    public function deletePost($postId)
    {
        $sql = 'DELETE FROM comments WHERE post_id = ?';
        $this->createQuery($sql, [$postId]);
        $sql = 'DELETE FROM posts WHERE id=?';
        $this->createQuery($sql, [$postId]);
    }
}
