<?php

use yii\helpers\Url;

$this->title = 'Меню';
?>
<div class="admin-default-index">
    <h1>Панель администратора</h1>
    <p>
        <a href="<?= Url::to(['manage/index']);?>"> - Управление продукцией</a><br>
    </p>
</div>
