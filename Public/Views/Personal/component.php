<?php

use Core\Models\User;
use Core\Repositories\FavoriteSongsRepository;
use Core\Repositories\SongsRepository;

$user = new User();


$template = 'login'; //default template

if (array_key_exists('logout', $_REQUEST) && $_REQUEST['logout'] == 'yes') {
    $user->logoutUser();
}


if (!empty($user->curUser()[0]) && !array_key_exists('logout', $_REQUEST))
{
    $template = 'cabinet'; //set template
    $templateData['user'] = $user->curUser()[0];

    /*
     | -----------------------------------------
     | init repositories
     | -----------------------------------------
     */
    $favoriteSongsRepository = new FavoriteSongsRepository();
    $songsRepository = new SongsRepository();


    
    $favoriteSongs = $favoriteSongsRepository->findByUserUD(intval($templateData['user']['id']));

    $favoriteSongIDs = array_column($favoriteSongs, 'song_id');

    $templateData['items'] = $songsRepository->findByID($favoriteSongIDs);
}

include __DIR__ . '/Template/' . $template . '.php';


