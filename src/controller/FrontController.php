<?php

namespace P4\src\controller;

use P4\config\Parameter;

class FrontController extends Controller
{

    public function home()
    {
        $posts = $this->postManager->getPosts();
        return $this->view->render('home', [
            'posts' => $posts
        ]);
    }

    public function post($postId)
    {
        $post = $this->postManager->getPost($postId);
        $comments = $this->commentManager->getCommentsFromPost($postId);
        return $this->view->render('single', [
            'post' => $post,
            'comments' => $comments
        ]);
    }

    public function addComment(Parameter $post, $postId)
    {
        if ($post->get('submit')) {
            $this->commentManager->addComment($post, $postId);
            $this->session->set('add_comment', 'Le nouveau commentaire a bien été ajouté');
            header('Location: ../public/index.php?route=post&postId=' . $postId);
        }
    }
}
