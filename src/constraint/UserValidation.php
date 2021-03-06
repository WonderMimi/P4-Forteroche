<?php

namespace P4\src\constraint;

use P4\config\Parameter;

class UserValidation extends Validation
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
        if ($name === 'pseudo') {
            $error = $this->checkPseudo($name, $value);
            $this->addError($name, $error);
        } elseif ($name === 'password') {
            $error = $this->checkPassword($name, $value);
            $this->addError($name, $error);
        } elseif ($name === 'confirmpassword') {
            $error = $this->checkPassword($name, $value);
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

    private function checkPseudo($name, $value)
    {
        if ($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('pseudo', $value);
        }
        if ($this->constraint->minLength($name, $value, 3)) {
            return $this->constraint->minLength('pseudo', $value, 3);
        }
        if ($this->constraint->maxLength($name, $value, 50)) {
            return $this->constraint->maxLength('pseudo', $value, 50);
        }
    }

    private function checkPassword($name, $value)
    {
        if ($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('password', $value);
        }
        if ($this->constraint->minLength($name, $value, 8)) {
            return $this->constraint->minLength('password', $value, 8);
        }
        if ($this->constraint->maxLength($name, $value, 100)) {
            return $this->constraint->maxLength('password', $value, 100);
        }
        if ($this->constraint->areIdentical($name, $value)) {
            return $this->constraint->areIdentical('password', $value);
        }

    }
}
