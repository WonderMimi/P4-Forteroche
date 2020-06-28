<?php

namespace P4\src\Manager;

use P4\config\Parameter;

class UserManager extends DatabaseManager
{
    public function register(Parameter $form_post)
    {
        $sql = 'INSERT INTO users (pseudo, password, created_date) VALUES (?, ?, NOW())';
        $this->createQuery($sql, [$form_post->get('pseudo'), password_hash($form_post->get('password'), PASSWORD_BCRYPT)]);
    }

    public function checkUserName(Parameter $form_post)
    {
        $sql = 'SELECT COUNT(pseudo) FROM users WHERE pseudo = ?';
        $result = $this->createQuery($sql, [$form_post->get('pseudo')]);
        $isUnique = $result->fetchColumn();
        if ($isUnique) {
            return '<p>Ce pseudo existe déjà</p>';
        }
    }

    public function login(Parameter $form_post) // checks is pseudo already exists in DB users table
    {
        $sql = 'SELECT id, password FROM users WHERE pseudo = ?';
        $data = $this->createQuery($sql, [$form_post->get('pseudo')]);
        $result = $data->fetch();
        $isPasswordValid = password_verify($form_post->get('password'), $result['password']);
        return [
            'result' => $result,
            'isPasswordValid' => $isPasswordValid
        ];
    }
}
