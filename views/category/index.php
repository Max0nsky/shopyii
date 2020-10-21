<?php

use yii\helpers\Url;
use yii\bootstrap4\Html;
/* @var $this yii\web\View */

$this->title = 'Популярные товары';
?>

<div id="carouselControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/images/slider-01.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="/images/slider-02.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="/images/slider-03.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only"></span>
    </a>
    <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only"></span>
    </a>
</div>
<div class="container my-5">
    <div class="row">
        <div class="col-md-3 categories">
            <div class="menu-name">
                <h5><b>Категория</b></h5>
            </div>
            <ul class="nav nav-pills flex-sm-column">
                <?php foreach ($categories as $category) : ?>
                    <li class="nav-item">
                        <a class="nav-link menu" aria-current="page" href="<?= Url::to(['/category/view', 'id' => $category['id']]) ?>"><?= $category['name'] ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div class="row">

                        <?php foreach ($food as $product) : ?>
                            <div class="col-lg-4 col-md-6 special-grid drinks">
                                <div class="card" style="width: 18rem;">
                                    <a href="<?= Url::to(['/food/view', 'id' => $product['id']]) ?>">
                                        <?= Html::img("@web/images/food/{$product['img']}", ['alt' => $product['name'], 'class' => 'card-img-top']) ?>
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $product['name'] ?></h5>
                                        <p class="card-text">Цена: <b><?= $product['price'] ?>р</b></p>
                                        <a href="<?= Url::to(['/cart/add', 'id' => $product['id']]) ?>" data-id="<?= $product['id'] ?>" class="btn btn-outline-secondary add-to-cart">В корзину</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>