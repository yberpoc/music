<?php
/**
 * @var $templateData;
 */
?>

<section class="user">
    <div class="title-v1">Личный кабинет</div>
    <div class="user-data">
        <div class="user-name"><strong>Имя:</strong> <?= $templateData['user']['name'] ?> <?= $templateData['user']['surname'] ?></div>
        <button><a href="/personal/?logout=yes">Выйти</a></button>
    </div>

    <div class="title-v1">Оценённые песни</div>
    <ul>
        <? foreach ($templateData['items'] as $song): ?>
            <li><?= $song['title'] . ' - ' . $song['artist'] ?></li>
        <? endforeach; ?>
    </ul>
</section>