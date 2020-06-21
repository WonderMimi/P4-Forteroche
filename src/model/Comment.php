<?php

namespace P4\src\model;

class Comment
{

    private $id;
    private $author;
    private $comment;
    private $created_date;
    private $flag;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    public function getCreated_date()
    {
        return $this->created_date;
    }

    public function setCreated_date($created_date)
    {
        $this->created_date = $created_date;
    }

    public function isFlagged()
    {
        return $this->flag;
    }

    public function setFlag($flag)
    {
        $this->flag = $flag;
    }
}
