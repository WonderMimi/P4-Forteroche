<?php

namespace P4\config;
use P4\src\controller\FrontController;
use P4\src\controller\BackController;
use Exception;

class Router
{
    private $frontController;
    private $backController;

    public function __construct()
    {
        $this->frontController = new FrontController();
        $this->backController = new BackController();
    }

    public function run()
    {
        try{
            if(isset($_GET['route']))
            {
                if ($_GET['route'] === 'post'){
                    $this->frontController->post($_GET['postId']);
                }
                elseif ($_GET['route'] === 'addPost'){
                    $this->backController->addPost($_POST);
                }
                else {
                    echo 'page inconnue';
                }
            }
            else{
                $this->frontController->home();
            }
        }
        catch (Exception $e)
        {
            echo 'Erreur';
        }
    }
}
