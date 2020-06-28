<?php

namespace P4\src\controller;

use P4\config\Parameter;

class FrontController extends Controller
{

    // the FrontController's role is to render requested page based on route

    public function home() //renders the home page with the last 5 posts
    {
        $posts = $this->postManager->getPosts();
        return $this->view->render('home', [
            'posts' => $posts
        ]);
    }

    public function post($postId)  // Renders the single page with one single post and any associated comments
    {
        $post = $this->postManager->getPost($postId);
        $comments = $this->commentManager->getCommentsFromPost($postId);
        return $this->view->render('single', [
            'post' => $post,
            'comments' => $comments
        ]);
    }

    public function addComment(Parameter $form_post, $postId)
    {
        if ($form_post->get('submit')) {
            $errors = $this->validation->validate($form_post, 'Comment');
            if (!$errors) {  // if there's no error the comment is added
                $this->commentManager->addComment($form_post, $postId);
                $this->session->set('add_comment', 'Le nouveau commentaire a bien été ajouté');
                header('Location: ../public/index.php');
            }
            $post = $this->postManager->getPost($postId);
            $comments = $this->commentManager->getCommentsFromPost($postId);
            return $this->view->render('single', [
                'post' => $post,  // refers to the specific post
                'comments' => $comments, // refers to all comments attached to this post
                'form_post' => $form_post,  // returns data entered in the form
                'errors' => $errors // returns errors if any
            ]);
        }
    }

    public function flagComment($commentId)
    {
        $this->commentManager->flagComment($commentId);
        $this->session->set('flag_comment', 'Le commentaire a bien été signalé');
        header('Location: ../public/index.php');
    }

    public function book() //renders the page with all the posts
    {
        $posts = $this->postManager->getAllPosts();
        return $this->view->render('book', [
            'posts' => $posts
        ]);
    }

    public function register(Parameter $form_post)
    {
        if ($form_post->get('submit')) {
            $errors = $this->validation->validate($form_post, 'User');
            if ($this->userManager->checkUserName($form_post)) {  // calls checkUserName method from UserManager to make sure username send via form is unique
                $errors['pseudo'] = $this->userManager->checkUserName($form_post);
            }
            if (!$errors) {
                $this->userManager->register($form_post);
                $this->session->set('register', 'Vous êtes maintenant inscrit(e)');
                header('Location: ../public/index.php');
            }
            return $this->view->render('register', [
                'form_post' => $form_post,
                'errors' => $errors
            ]);
        }
        return $this->view->render('register');
    }

    public function login(Parameter $form_post)
    {
    if($form_post->get('submit')) {
        $result = $this->userManager->login($form_post);

        if($result && $result['isPasswordValid']) {
            $this->session->set('login', 'Content de vous revoir');
            $this->session->set('id', $result['result']['id']);
            $this->session->set('groups', $result['result']['role']);
            $this->session->set('pseudo', $form_post->get('pseudo'));
            header('Location: ../public/index.php');
        }
        else {
            $this->session->set('error_login', 'Le pseudo ou le mot de passe sont incorrects');
            return $this->view->render('login', [
                'form_post'=> $form_post
            ]);
        }
    }
        return $this->view->render('login');
    }
}
