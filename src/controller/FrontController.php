<?php

namespace P4\src\controller;
use P4\src\manager\PostManager;
use P4\src\manager\CommentManager;
use P4\src\model\View;

class FrontController
{
    private $postManager;
    private $commentManager;
    private $view;

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
        $this->view = new View();
    }

    public function home()
    {
        $posts = $this->postManager->getPosts();
        return $this->view->render('home', [
            'posts' => $posts
        ]);
    }

    public function post($postId)
    {
        $post = $this->postManager->getPost($postId);
        $comments = $this->commentManager->getCommentsFromPost($postId);
        return $this->view->render('home', [
            'posts' => $posts,
            'comments' => $comments
        ]);
    }
}
