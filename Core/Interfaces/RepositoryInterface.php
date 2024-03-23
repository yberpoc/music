<?php

namespace Core\Interfaces;

interface RepositoryInterface
{
    public function findAll() :array;
    public function findByID(int $id) :array;
}