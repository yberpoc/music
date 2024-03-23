<?php

use Core\Models\User;

$user = new User();


if (empty($_REQUEST['login'])) {
    echo json_encode([
        'error' => true,
        'message' => 'null parameters'
    ]);

    exit();
}


$result = $user->loginUser($_REQUEST['login']);

if ($result) {
    echo json_encode([
        'success' => true,
        'message' => 'user auth'
    ]);
} else {
    echo json_encode([
        'error' => true,
        'message' => 'not found user'
    ]);
}