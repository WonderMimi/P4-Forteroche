<?php

namespace P4\src\constraint;

class Validation
{
    public function validate($data, $name) // Called from the Controller class
    {
        if($name === 'Post') {
            $postValidation = new PostValidation();
            $errors = $postValidation->check($data);
            return $errors;
        }
    }
}
