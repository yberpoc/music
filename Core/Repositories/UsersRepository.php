<?php

namespace Core\Repositories;

use Core\Database\Database;
use Core\Interfaces\RepositoryInterface;

class UsersRepository extends BaseRepository
{
    public function findAll() :array
    {
        return $this->db->query("SELECT * FROM respondents");
    }

    public function findByID(int $id) :array
    {
        return $this->db->query("SELECT * FROM respondents WHERE id = $id");
    }

    public function findByLogin(string $login) :array
    {
        return $this->db->query("SELECT * FROM respondents WHERE name = '$login'");
    }
}