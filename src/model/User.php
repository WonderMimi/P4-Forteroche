<?php

namespace P4\src\model;

class User
{

    private $id;
    private $pseudo;
    private $password;
    private $created_date;
    private $role;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getCreated_date()
    {
        return $this->created_date;
    }

    public function setCreated_date($created_date)
    {
        $this->created_date = $created_date;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }
}
