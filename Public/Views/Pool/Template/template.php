<?php
/**
 * @var $templateData;
 */

//echo '<pre>';
//print_r($templateData);
//echo '</pre>';
?>

Опрос
<section class="song-list">
    <h3>Список песен:</h3>
    <ul>
        <? foreach ($templateData['songs'] as $song): ?>
            <li id="<?= $song['id'] ?>" class="song-list__item"><?= $song['title'] ?> - <?= $song['artist'] ?> Rate: <?=$song['rate'] ?></li>
        <? endforeach; ?>
    </ul>
</section>