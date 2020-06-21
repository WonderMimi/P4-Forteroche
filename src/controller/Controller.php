<?php

namespace P4\src\controller;

// These calsses will then be also available to the children classes (BackVontroller & FrontController)
use P4\config\Request;
use P4\src\constraint\Validation;
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
    protected $form_post;
    protected $session;
    protected $validation;

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
        $this->view = new View();
        $this->validation = new Validation();
        $this->request = new Request();
        $this->get = $this->request->getGet();
        $this->form_post = $this->request->getFormPost();
        $this->session = $this->request->getSession();
    }
}
