<?php

namespace Core\Repositories;

use Core\Database\Database;
use Core\Interfaces\RepositoryInterface;

class SongsRepository extends BaseRepository
{
    public function findAll() :array
    {
        return $this->db->query('SELECT * FROM songs');
    }

    public function findByID(array|int $id) :array
    {
        if (is_array($id)) {
            $id = implode(', ', $id);
        }

        return $this->db->query("SELECT * FROM songs WHERE id IN ($id)");
    }

    public function findAllWithRate() :array
    {
        return $this->db->query("SELECT songs.title, songs.artist, favorite_songs.rate, respondents.id
                                        FROM respondents 
                                        JOIN favorite_songs ON respondents.id = favorite_songs.respondent_id
                                        JOIN songs ON favorite_songs.song_id = songs.id");
    }
}