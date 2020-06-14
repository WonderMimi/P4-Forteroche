<?php

namespace P4\src\controller;

// These calsses will then be also available to the children classes (BackVontroller & FrontController)
use P4\config\Request;
use P4\src\manager\PostManager;
use P4\src\manager\CommentManager;
use P4\src\model\View;

abstract class Controller
{
    protected $postManager;
    protected $commentManager;
    protected $view;
    private $request;
    protected $get;
    protected $post;
    protected $session;

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
        $this->view = new View();
        $this->request = new Request();
        $this->get = $this->request->getGet();
        $this->post = $this->request->getPost();
        $this->session = $this->request->getSession();
    }
}
