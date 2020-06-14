<?php

namespace P4\src\controller;

use P4\config\Parameter;

class BackController extends Controller
{
    public function addPost(Parameter $post)
    {
        if($post->get('submit')) {
            $this->postManager->addPost($post);
            $this->session->set('add_post', 'Le nouvel article a bien été ajouté');
            header('Location: ../public/index.php');
        }
        return $this->view->render('add_post', [
            'post' => $post
        ]);
    }

    public function editPost(Parameter $post, $postId)
    {
        $article = $this->postManager->getPost($postId);
        if($post->get('submit')) {
            $this->postManager->editPost($post, $postId);
            $this->session->set('edit_post', 'L\' article a bien été modifié');
            header('Location: ../public/index.php');
        }
        return $this->view->render('edit_post', [
            'post' => $article
        ]);
    }
}
