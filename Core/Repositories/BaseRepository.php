<?php

namespace Core\Repositories;

use Core\Database\Database;
use Core\Interfaces\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{
    protected Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    abstract function findAll() :array;
    abstract function findByID(int $id) :array;
}