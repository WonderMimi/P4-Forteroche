<?php

namespace P4\src\controller;

use P4\config\Parameter;

class BackController extends Controller
{
    public function addPost(Parameter $post) //$post is all the data entered in the form
    {
        if ($post->get('submit'))
        {
            $errors = $this->validation->validate($post, 'Post');
            if(!$errors)
            {
                $this->postManager->addPost($post);
                $this->session->set('add_post', 'Le nouvel article a bien été ajouté');
                header('Location: ../public/index.php');
            }
            return $this->view->render('add_post', [
                'post' => $post,
                'errors' => $errors
            ]);
        }
        return $this->view->render('add_post');
    }

    public function editPost(Parameter $post, $postId)
    {
        $article = $this->postManager->getPost($postId);
        if($post->get('submit'))
        {
            $this->postManager->editPost($post, $postId);
            $this->session->set('edit_post', 'L\' article a bien été modifié');
            header('Location: ../public/index.php');
        }
        return $this->view->render('edit_post', [
            'post' => $article
        ]);
    }
}
