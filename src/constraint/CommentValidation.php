<?php

namespace P4\src\constraint;

use P4\config\Parameter;

class CommentValidation extends Validation
{
    private $errors = [];
    private $constraint;

    public function __construct()
    {
        $this->constraint = new Constraint();
    }

    public function check(Parameter $form_post)
    {
        foreach ($form_post->all() as $key => $value) {
            $this->checkField($key, $value);
        }
        return $this->errors;
    }

    private function checkField($name, $value)
    {
        if ($name === 'author') { // checks that the author field complies with validation rules
            $error = $this->checkAuthor($name, $value);
            $this->addError($name, $error);
        } elseif ($name === 'comment') { // checks that the comment field complies with validation rules
            $error = $this->checkComment($name, $value);
            $this->addError($name, $error);
        }
    }

    private function addError($name, $error)
    {
        if ($error) {
            $this->errors += [
                $name => $error
            ];
        }
    }

    private function checkAuthor($name, $value)
    {
        if ($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('author', $value);
        }
        if ($this->constraint->minLength($name, $value, 3)) {
            return $this->constraint->minLength('author', $value, 3);
        }
        if ($this->constraint->maxLength($name, $value, 25)) {
            return $this->constraint->maxLength('author', $value, 25);
        }
    }

    private function checkComment($name, $value)
    {
        if ($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('commenu', $value);
        }
        if ($this->constraint->minLength($name, $value, 3)) {
            return $this->constraint->minLength('commenu', $value, 3);
        }
    }
}
