<?php

namespace P4\src\Manager;

use P4\config\Parameter;
use P4\src\model\User;


class UserManager extends DatabaseManager
{
    private function buildObject($row)
    {
        $user = new User();
        $user->setId($row['id']);
        $user->setPseudo($row['pseudo']);
        $user->setCreated_date($row['created_date']);
        $user->setRole($row['role']);
        return $user;
    }

    public function getUsers()
    {
        $sql = 'SELECT users.id, users.pseudo, users.created_date, groups.role FROM users INNER JOIN groups ON users.role_id = groups.id ORDER BY users.id DESC';

        $result = $this->createQuery($sql);
        $users = [];
        foreach ($result as $row){
            $userId = $row['id'];
            $users[$userId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $users;
    }

    public function register(Parameter $form_post)
    {
        $this->checkUserName($form_post);
        $sql = 'INSERT INTO users (pseudo, password, created_date, role_id) VALUES (?, ?, NOW(), ?)';
        $this->createQuery($sql, [$form_post->get('pseudo'), password_hash($form_post->get('password'), PASSWORD_BCRYPT), 2]);  // our users are by default in the "member" group
    }

    public function checkUserName(Parameter $form_post)
    {
        $sql = 'SELECT COUNT(pseudo) FROM users WHERE pseudo = ?';
        $result = $this->createQuery($sql, [$form_post->get('pseudo')]);
        $alreadyExists = $result->fetchColumn();
        if ($alreadyExists) {
            return '<p class="red-msg">Ce pseudo existe déjà</p>';
        }
    }

    public function login(Parameter $form_post) // checks is pseudo already exists in DB users table
    {
        $sql = <<<SQL
        SELECT users.id, users.role_id, users.password, groups.role
        FROM users
        INNER JOIN groups
        ON groups.id  = users.role_id
        WHERE pseudo = ?
SQL;
        $data = $this->createQuery($sql, [$form_post->get('pseudo')]);
        $result = $data->fetch();
        $isPasswordValid = password_verify($form_post->get('password'), $result['password']);
        return [
            'result' => $result,
            'isPasswordValid' => $isPasswordValid
        ];
    }
}
