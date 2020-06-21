<?php

namespace P4\src\constraint;

use P4\config\Parameter;

class PostValidation extends Validation
{
    private $errors = [];
    private $constraint;

    public function __construct()
    {
        $this->constraint = new Constraint();
    }

    public function check(Parameter $form_post) //gets all data via all method from Parameter class
    {
        foreach ($form_post->all() as $key => $value) {
            $this->checkField($key, $value);
        }
        return $this->errors;
    }

    private function checkField($name, $value) // checks each individual field
    {
        if ($name === 'title') {
            $error = $this->checkTitle($name, $value);
            $this->addError($name, $error);
        } elseif ($name === 'content') {
            $error = $this->checkContent($name, $value);
            $this->addError($name, $error);
        } elseif ($name === 'author') {
            $error = $this->checkAuthor($name, $value);
            $this->addError($name, $error);
        }
    }

    private function addError($name, $error) //adds an error if a field is not valid
    {
        if ($error) {
            $this->errors += [
                $name => $error
            ];
        }
    }

    private function checkTitle($name, $value)  //checks the title field against each constraint
    {
        if ($this->constraint->notBlank($name, $value)) // the title field cannot be blank
        {
            return $this->constraint->notBlank('titre', $value);
        }
        if ($this->constraint->minLength($name, $value, 5)) // the title field must be at least 5 characters long
        {
            return $this->constraint->minLength('titre', $value, 5);
        }
        if ($this->constraint->maxLength($name, $value, 150)) // the title field cannot be more than 150 characters long
        {
            return $this->constraint->maxLength('titre', $value, 150);
        }
    }

    private function checkContent($name, $value) //checks the content field against each constraint
    {
        if ($this->constraint->notBlank($name, $value)) // the content field cannot be blank
        {
            return $this->constraint->notBlank('contenu', $value);
        }
        if ($this->constraint->minLength($name, $value, 20)) // the content must be at least 20 characters long
        {
            return $this->constraint->minLength('contenu', $value, 20);
        }
    }

    private function checkAuthor($name, $value) //checks the author field against each constraint
    {
        if ($this->constraint->notBlank($name, $value)) // the author field cannot be blank
        {
            return $this->constraint->notBlank('auteur', $value);
        }
        if ($this->constraint->minLength($name, $value, 3)) // the author field must be at least 3 characters long
        {
            return $this->constraint->minLength('auteur', $value, 3);
        }
        if ($this->constraint->maxLength($name, $value, 25)) // the author field cannot be more than 25 characters long
        {
            return $this->constraint->maxLength('auteur', $value, 25);
        }
    }
}
