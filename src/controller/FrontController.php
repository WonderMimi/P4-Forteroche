<?php

namespace P4\src\controller;
use P4\src\manager\PostManager;
use P4\src\manager\CommentManager;

class FrontController
{
    public function home()
    {
        $post = new PostManager();
        $posts = $post->getPosts();
        require '../templates/home.php';
    }

    public function post($postId)
    {
        $post = new PostManager();
        $posts = $post->getPost($postId);
        $comment = new CommentManager();
        $comments = $comment->getCommentsFromPost($postId);
        require '../templates/single.php';
    }
}
