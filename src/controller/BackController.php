<?php

namespace P4\src\controller;

use P4\src\manager\PostManager;
use P4\src\model\View;

class BackController
{
    private $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function addPost($post)
    {
        if(isset($post['submit'])) {  // if form has been submitted
            $postManager = new PostManager();
            $postManager->addPost($post);
            header('Location: ../public/index.php');
        }
        return $this->view->render('add_post', [
            'post' => $post
        ]);
    }
}
