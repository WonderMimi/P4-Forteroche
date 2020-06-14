<?php

namespace P4\src\controller;

use P4\src\manager\PostManager;
use P4\src\manager\CommentManager;
use P4\src\model\View;

abstract class Controller
{
    protected $postManager;
    protected $commentManager;
    protected $view;

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
        $this->view = new View();
    }
}
