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
        try{
            if(isset($route))
            {
                if($route === 'post'){
                    $this->frontController->post($this->request->getGet()->get('postId'));
                }
                elseif ($route === 'addPost'){ //NOTE addPost OK
                    $this->backController->addPost($this->request->getPost()); //NOTE addPost OK
                }
                else{
                    echo "Page introuvable";
                }
            }
            else{
                $this->frontController->home();
            }
        }
        catch (Exception $e)
        {
            echo "Erreur";
        }
    }
}
