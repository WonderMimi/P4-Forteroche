<?php

namespace P4\src\model;

class Post
{
    private $id;
    private $title;
    private $content;
    private $author;
    private $created_date;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getCreated_date()
    {
        return $this->created_date;
    }

    public function setCreated_date($created_date)
    {
        $this->created_date = $created_date;
    }
}
