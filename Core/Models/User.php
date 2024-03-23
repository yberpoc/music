<?php

namespace Core\Models;

use Core\Repositories\UsersRepository;

class User
{
    private UsersRepository $user;

    public function __construct()
    {
        $this->user = new UsersRepository();
    }

    public function curUser() :array|bool
    {
        if (!$_SESSION || !array_key_exists('user_id', $_SESSION['user'])) {
            return false;
        }

        return $this->user->findByID($_SESSION['user']['user_id'])[0];
    }

    public function loginUser(string $login) :bool
    {
        $result = $this->user->findByLogin($login);
        
        if ($result)
        {
            $_SESSION['user']['user_id'] = $result[0]['id'];
            $_SESSION['user']['user_name'] = $result[0]['name'];

            return true;
        }

        return false;
    }

    public function logoutUser() :bool
    {
        if (array_key_exists('user', $_SESSION) && $_SESSION['user']) {
            unset($_SESSION['user']);
            return true;
        }

        return false;
    }

    public function registerUser()
    {
        // TODO register
    }


}