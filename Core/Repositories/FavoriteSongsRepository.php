<?php

namespace Core\Repositories;

use Core\Database\Database;
use Core\Interfaces\RepositoryInterface;

class FavoriteSongsRepository extends BaseRepository
{
    public function findAll() :array
    {
        return $this->db->query("SELECT * FROM favorite_songs");
    }

    public function findByID(int $id) :array
    {
        return $this->db->query("SELECT * FROM favorite_songs WHERE id = $id");
    }

    public function findByUserUD(int $userID) :array
    {
        return $this->db->query("SELECT * FROM favorite_songs WHERE respondent_id = $userID");
    }

    public function makeRecordsByParams(array $parameters) :array
    {
        $filterValue = $parameters['value'];

        if ($parameters['parameters'] == 1)
        {
            $arParams = explode(' ', $filterValue);
            $operator = $arParams[0];
            $year = date('Y') - $arParams[1];

            $filter = "DATE_FORMAT(age, '%Y') $operator $year";
        } else {
            $filter = "gender = $filterValue";
        }
        
        return $this->db->query("SELECT songs.title, songs.artist, favorite_songs.rate 
                                        FROM respondents 
                                        JOIN favorite_songs ON respondents.id = favorite_songs.respondent_id
                                        JOIN songs ON favorite_songs.song_id = songs.id
                                        WHERE $filter
                                        AND favorite_songs.rate >= 4");
    }
}