<?php

use Core\Repositories\SongsRepository;
use Core\Models\User;

$user = new User();
$songs = new SongsRepository();

$templateData['user'] = $user->curUser();
$templateData['songs'] = $songs->findAllWithRate();

if ($templateData['user']) {
    foreach ($templateData['songs'] as &$song) {
        if ($song['id'] == $templateData['user']['id']) {
            $song['is_voted'] = true;
        }
    }
}



include __DIR__ . '/Template/template.php';