<?php

namespace P4\src\controller;

use P4\config\Parameter;

class BackController extends Controller
{
    public function administration()
    {
        if($this->checkAdmin()) {
            $posts = $this->postManager->getAllPosts();
            $comments = $this->commentManager->getFlaggedComments();
            $users = $this->userManager->getUsers();
            return $this->view->render('administration', [
                'posts' => $posts,
                'comments' => $comments,
                'users' => $users
            ]);
        }
    }

    public function addPost(Parameter $form_post) //$form_post is all the data entered in the form
    {
        if($this->checkAdmin()) {
            if ($form_post->get('submit')) {
                $errors = $this->validation->validate($form_post, 'Post');
                if (!$errors) {
                    $this->postManager->addPost($form_post);
                    $this->session->set('add_post', 'Le nouveau billet a bien été ajouté');
                    header('Location: ../public/index.php?route=administration');
                }
                return $this->view->render('add_post', [
                    'form_post' => $form_post,
                    'errors' => $errors
                ]);
            }
            return $this->view->render('add_post');
        }
    }

    public function editPost(Parameter $form_post, $postId)
    {
        if($this->checkAdmin()) {
            $post = $this->postManager->getPost($postId);
            if ($form_post->get('submit')) {
                $errors = $this->validation->validate($form_post, 'Post');
                if (!$errors) {
                    $this->postManager->editPost($form_post, $postId);
                    $this->session->set('edit_post', 'Le billet a bien été modifié');
                    header('Location: ../public/index.php?route=administration');
                }
                return $this->view->render('edit_post', [
                    'post' => $post,
                    'errors' => $errors
                ]);
            }
            $form_post->set('id', $post->getId());
            $form_post->set('title', $post->getTitle());
            $form_post->set('content', $post->getContent());
            $form_post->set('author', $post->getAuthor());

            return $this->view->render('edit_post', [
                'form_post' => $form_post
            ]);
        }
    }

    public function deletePost($postId)
    {
        if($this->checkAdmin()) {
            $this->postManager->deletePost($postId);
            $this->session->set('delete_post', 'Le billet a bien été supprimé');
            header('Location: ../public/index.php?route=administration');
        }
    }

    public function deleteComment($commentId)
    {
        if($this->checkAdmin()) {
            $this->commentManager->deleteComment($commentId);
            $this->session->set('delete_comment', 'Le commentaire a bien été supprimé');
            header('Location: ../public/index.php?route=administration');
        }
    }

    public function deleteFlag($commentId)
    {
        if($this->checkAdmin()) {
            $this->commentManager->deleteFlag($commentId);
            $this->session->set('deleteFlag', 'Le commentaire a bien été autorisé');
            header('Location: ../public/index.php?route=administration');
        }
    }

    public function logout()
    {
        $this->session->stop();
        header('Location: ../public/index.php');
    }

    private function checkLoggedIn() //Checks if the user is connected. if not redirects to login page
    {
        if(!$this->session->get('pseudo')) {
            $this->session->set('need_login', 'Vous devez vous connecter pour accéder à cette page');
            header('Location: ../public/index.php?route=login');
        } else {
            return true;
        }
    }

    private function checkAdmin() //Checks if the logged in user has admin credentials
    {
        $this->checkLoggedIn();
        if(!($this->session->get('role') === 'admin')) {
            $this->session->set('not_admin', 'Vous n\'avez pas le droit d\'accéder à cette page');
            header('Location: ../public/index.php?route=login');
        } else {
            header('Location: ../public/index.php?route=administration');
            // return true;
        }
    }
}
