<?php

use Core\Repositories\FavoriteSongsRepository;

$favoriteSongs = new FavoriteSongsRepository();


if (empty($_REQUEST['parameters']) || empty($_REQUEST['value'])) {
    echo json_encode([
        'error' => true,
        'message' => 'null parameters'
    ]);

    exit();
}


$parameters = [
    'parameters' => $_REQUEST['parameters'],
    'value' => $_REQUEST['value'],
];

$result = $favoriteSongs->makeRecordsByParams($parameters);


echo json_encode($result);