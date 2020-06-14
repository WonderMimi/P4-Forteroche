<?php

namespace P4\src\controller;

class BackController extends Controller
{
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
