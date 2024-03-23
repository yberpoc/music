<?php
/**
 * @var $templateData;
 */

include 'include/popup.php'; ?>

<section class="records">
    <div class="title-v1">Популярные пластинки среди категорий</div>
    <div class="records__items">

        <? foreach ($templateData['items'] as $record): ?>
            <div class="records__item" data-attribute="<?=$record['value']?>" data-parameters="<?=$record['parameters']?>">
                <div class="cover"><?= $record['name'] ?></div>
                <div class="records__item--name"><b><?= $record['name'] ?></b></div>
            </div>
        <? endforeach; ?>

    </div>
</section>