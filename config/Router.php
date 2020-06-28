<?php

namespace P4\config;

use P4\src\controller\BackController;
use P4\src\controller\FrontController;
use Exception;

class Router
{
    private $frontController;
    private $backController;
    private $request;

    public function __construct()
    {
        $this->request = new Request();
        $this->frontController = new FrontController();
        $this->backController = new BackController();
    }

    public function run()
    {
        $route = $this->request->getGet()->get('route');
        try {
            if (isset($route)) {
                if ($route === 'post') {
                    $this->frontController->post($this->request->getGet()->get('postId'));
                } elseif ($route === 'addPost') {
                    $this->backController->addPost($this->request->getFormPost());
                } elseif ($route === 'editPost') {
                    $this->backController->editPost($this->request->getFormPost(), $this->request->getGet()->get('postId'));
                } elseif ($route === 'deletePost') {
                    $this->backController->deletePost($this->request->getGet()->get('postId'));
                } elseif ($route === 'addComment') {
                    $this->frontController->addComment($this->request->getFormPost(), $this->request->getGet()->get('postId'));
                } elseif ($route === 'flagComment') {
                    $this->frontController->flagComment($this->request->getGet()->get('commentId'));
                } elseif ($route === 'deleteComment') {
                    $this->backController->deleteComment($this->request->getGet()->get('commentId'));
                } elseif ($route === 'deleteFlag') {
                    $this->backController->deleteFlag($this->request->getGet()->get('commentId'));
                } elseif($route === 'register'){
                    $this->frontController->register($this->request->getFormPost());
                } elseif($route === 'login'){
                    $this->frontController->login($this->request->getFormPost());
                } elseif ($route === 'administration') {
                    $this->backController->administration();
                } elseif ($route === 'book') {
                    $this->frontController->book();
                } else {
                    echo "page introuvable";
                }
            } else {
                $this->frontController->home();
            }
        } catch (Exception $e) {
            echo $e;
        }
    }
}
