<?php

namespace P4\src\constraint;

class Constraint
{
    public function notBlank($name, $value)
    {
        if(empty($value))
        {
            return '<p class="red-msg">Le champ '.$name.' est obligatoire</p>';
        }
    }

    public function minLength($name, $value, $minSize)
    {
        if(strlen($value) < $minSize)
        {
            return '<p class="red-msg">Le champ '.$name.' doit contenir au moins '.$minSize.' caractères</p>';
        }
    }

    public function maxLength($name, $value, $maxSize)
    {
        if(strlen($value) > $maxSize)
        {
            return '<p class="red-msg">Le champ '.$name.' doit contenir au maximum '.$maxSize.' caractères</p>';
        }
    }

    public function areIdentical($name, $value)
    {
        if($value != 'password')
        {
            return '<p class="red-msg">Le mot de passe et sa confirmation sont différents</p>';
        }
    }
}
