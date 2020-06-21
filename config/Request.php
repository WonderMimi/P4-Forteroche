<?php

namespace P4\config;

class Request
{
    private $get;
    private $form_post;
    private $session;

    public function __construct()
    {
        $this->get = new Parameter($_GET);
        $this->form_post = new Parameter($_POST);
        $this->session = new Session($_SESSION);
    }

    public function getGet()
    {
        return $this->get;
    }

    public function getFormPost()
    {
        return $this->form_post;
    }

    public function getSession()
    {
        return $this->session;
    }
}
