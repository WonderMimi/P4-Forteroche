<?php

namespace P4\src\controller;

use P4\config\Parameter;

class BackController extends Controller
{
    public function addPost(Parameter $form_post) //$post is all the data entered in the form
    {
        if ($form_post->get('submit')) {
            $errors = $this->validation->validate($form_post, 'Post');
            if (!$errors) {
                $this->postManager->addPost($form_post);
                $this->session->set('add_post', 'Le nouvel article a bien été ajouté');
                header('Location: ../public/index.php');
            }
            return $this->view->render('add_post', [
                'form_post' => $form_post,
                'errors' => $errors
            ]);
        }
        return $this->view->render('add_post');
    }

    public function editPost(Parameter $form_post, $postId)
    {
        $post = $this->postManager->getPost($postId);
        if ($form_post->get('submit')) {
            $this->postManager->editPost($form_post, $postId);
            $this->session->set('edit_post', 'Le billet a bien été modifié');
            header('Location: ../public/index.php');
        }
        return $this->view->render('edit_post', [
            'post' => $post
        ]);
    }

    public function deletePost($postId)
    {
        $this->postManager->deletePost($postId);
        $this->session->set('delete_post', 'Le billet a bien été supprimé');
        header('Location: ../public/index.php');
    }
}
