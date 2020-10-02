<?php

use yii\helpers\Url;
use yii\bootstrap\Html;
/* @var $this yii\web\View */

$this->title = $categories[$_GET['id']]['name'];
?>
<!-- Start slides -->
<div id="slides" class="cover-slides">
    <ul class="slides-container">
        <li class="text-left">
            <img src="/images/slider-01.jpg" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>У нас самые<br> свежие продукты</strong></h1>
                        <p class="m-b-40">See how your users experience your website in realtime or view <br>
                            trends to see any changes in performance over time.</p>
                        <p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Reservation</a></p>
                    </div>
                </div>
            </div>
        </li>
        <li class="text-left">
            <img src="/images/slider-02.jpg" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>У нас самые<br> низкие цены</strong></h1>
                        <p class="m-b-40">See how your users experience your website in realtime or view <br>
                            trends to see any changes in performance over time.</p>
                        <p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Reservation</a></p>
                    </div>
                </div>
            </div>
        </li>
        <li class="text-left">
            <img src="/images/slider-03.jpg" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>У нас самая<br> быстрая доставка</strong></h1>
                        <p class="m-b-40">See how your users experience your website in realtime or view <br>
                            trends to see any changes in performance over time.</p>
                        <p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Reservation</a></p>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <div class="slides-navigation">
        <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
        <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
    </div>
</div>
<!-- End slides -->


<!-- Start Menu -->
<div class="menu-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-title text-center">
                    <h2><?= $categories[$_GET['id']]['name'] ?></h2>
                    <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>-->
                </div>
            </div>
        </div>
        <div class="row inner-menu-box">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <?php foreach ($categories as $category) : ?>
                        <a href="<?= Url::to(['/category/view', 'id' => $category['id']]) ?>" <?php
                                                                                                if ($_GET['id'] == $category['id']) {
                                                                                                    echo 'class="nav-link active"';
                                                                                                } else {
                                                                                                    echo 'class="nav-link"';
                                                                                                }
                                                                                                ?> id="v-pills-profile-tab" role="tab" aria-controls="v-pills-profile">
                            <?= $category['name'] ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="row">
                        <?php foreach ($food as $product) : ?>
                            <div class="col-lg-4 col-md-6 special-grid dinner">
                                <a href="<?= Url::to(['/food/view', 'id' => $product['id']]) ?>">
                                    <div class="gallery-single fix">
                                        <?= Html::img("@web/images/food/{$product['img']}", ['alt' => $product['name'], 'class' => 'img-fluid']) ?>
                                        <div class="why-text">
                                            <h4><?= $product['name'] ?></h4>
                                            <h5><?= $product['price'] ?>р</h5>
                                        </div>
                                    </div>
                                </a>
                                <div class="crt" style="text-align: center;">
                                    <a href="<?= Url::to(['/cart/add', 'id' => $product['id']]) ?>" data-id="<?= $product['id'] ?>" class="btn btn-default add-to-cart">В корзину</a>
                                </div>

                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<!-- End Menu -->

<!-- Start QT -->
<div class="qt-box qt-background">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto text-center">
                <p class="lead ">
                    "Есть — значит жить, значит работать, значит строить, творить, мыслить. . "
                </p>
                <span class="lead">Автор неизвестен</span>
            </div>
        </div>
    </div>
</div>
<!-- End QT -->

<!-- Start Gallery -->
<div class="gallery-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-title text-center">
                    <h2>Галерея</h2>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="tz-gallery">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <a class="lightbox" href="/images/gallery-img-01.jpg">
                        <img class="img-fluid" src="/images/gallery-img-01.jpg" alt="Gallery Images">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <a class="lightbox" href="/images/gallery-img-02.jpg">
                        <img class="img-fluid" src="/images/gallery-img-02.jpg" alt="Gallery Images">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <a class="lightbox" href="/images/gallery-img-03.jpg">
                        <img class="img-fluid" src="/images/gallery-img-03.jpg" alt="Gallery Images">
                    </a>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <a class="lightbox" href="/images/gallery-img-04.jpg">
                        <img class="img-fluid" src="/images/gallery-img-04.jpg" alt="Gallery Images">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <a class="lightbox" href="/images/gallery-img-05.jpg">
                        <img class="img-fluid" src="/images/gallery-img-05.jpg" alt="Gallery Images">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <a class="lightbox" href="/images/gallery-img-06.jpg">
                        <img class="img-fluid" src="/images/gallery-img-06.jpg" alt="Gallery Images">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Gallery -->