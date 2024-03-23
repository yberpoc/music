<?php

namespace Core\Repositories;

class RecordsRepository extends BaseRepository
{
    public function findAll() :array
    {
        return $this->db->query("SELECT * FROM records");
    }

    public function findByID(int $id) :array
    {
        return $this->db->query("SELECT * FROM records WHERE id = $id");
    }
}