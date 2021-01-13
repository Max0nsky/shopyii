<?php

use yii\helpers\Url;
use yii\bootstrap\Html;
/* @var $this yii\web\View */

$this->title = $food['name'];
?>
<div class="container">
    <div class="food-details my-md-5 pt-md-5 ">
        <div class="row">
            <!--food-details-->
            <div class="col-sm-6">
                <div class="view-food">
                    <?= Html::img("@web/images/food/{$food->img}", ['alt' => $food->name, 'class' => 'img-thumbnail']) ?>
                </div>
            </div>
            <div class="col-sm-6 food-information">
                <!--/food-information-->
                <h2><?= $food->name ?></h2>
                <b>Цена: </b><?= $food->price; ?>p
                <p><b>Описание: </b><?= $food->description ?></p>
                <p><b>Колиичество: </b><input type="number" min="1" max="99999" value="1" id="quantity" /></p>
                <div class="crt">
                    <a href="<?= Url::to(['/cart/add', 'id' => $food->id]) ?>" data-id="<?= $food->id ?>" class="btn btn-default add-to-cart btn-secondary">Добавить в корзину</a>
                </div>
                <!--/food-information-->
            </div>
        </div>
    </div>
    <!--/food-details-->
</div><br>