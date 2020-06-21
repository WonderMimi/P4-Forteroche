<?php

namespace P4\src\controller;

use P4\config\Parameter;

class FrontController extends Controller
{

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
}
