<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="container site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        <b> Ошибка произошла во время обработки вашего запроса веб-сервером.</b>
    </p>
    <p>
        Свяжитесь с разработчиком, если вам есть что сказать. Спасибо)
    </p>

</div>