<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use Codeception\Util\Uri;
use PHPUnit\Framework\MockObject\Builder\Identity;
use yii\bootstrap4\Modal;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
     -->
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>
    <nav class="navbar sticky-top navbar-expand-sm navbar-light bg-light border-bottom ">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="/images/logo.png" class="logo" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Информация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="return getCart()">Корзина</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Контакты</a>
                    </li>
                </ul>
                <form class="d-flex" method="get">
                    <input type="search" placeholder="Поиск" name="queryWord" class="form-cntrol mr-2">
                    <button class="btn btn-secondary" formaction="<?= Url::to(['category/search']) ?>">Найти</button>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="<?= Url::to('/admin') ?>">Вход</a></li>
                    <?php if (!Yii::$app->user->isGuest) : ?>
                        <li class="nav-item"><a class="nav-link" href="<?= Url::to(['/site/logout']) ?>"> <?= Yii::$app->user->identity['username'] ?> (Выход)</a></li>
                    <?php endif; ?>
                </ul>

                <!-- <a class="nav-link login" href="#">[Войти]</a> -->
            </div>
        </div>
    </nav>

    <main>

        <div class="content-menu">
            <?= $content; ?>
        </div>

    </main>

    <footer class="pt-4 my-md-5 pt-md-5 border-top text-center bg-light">
        <div class="row">
            <div class="col-12 col-md">
                <h5>Категория 1</h5>
                <ul class="list-unstyled text-small">
                    <li>
                        <a href="" class="link-secondary">Ссылка</a>
                    </li>
                    <li>
                        <a href="" class="link-secondary">Ссылка</a>
                    </li>
                    <li>
                        <a href="" class="link-secondary">Ссылка</a>
                    </li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Категория 2</h5>
                <ul class="list-unstyled text-small">
                    <li>
                        <a href="" class="link-secondary">Ссылка</a>
                    </li>
                    <li>
                        <a href="" class="link-secondary">Ссылка</a>
                    </li>
                    <li>
                        <a href="" class="link-secondary">Ссылка</a>
                    </li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Категория 3</h5>
                <ul class="list-unstyled text-small">
                    <li>
                        <a href="" class="link-secondary">Ссылка</a>
                    </li>
                    <li>
                        <a href="" class="link-secondary">Ссылка</a>
                    </li>
                    <li>
                        <a href="" class="link-secondary">Ссылка</a>
                    </li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Категория 4</h5>
                <ul class="list-unstyled text-small">
                    <li>
                        <a href="" class="link-secondary">Ссылка</a>
                    </li>
                    <li>
                        <a href="" class="link-secondary">Ссылка</a>
                    </li>
                    <li>
                        <a href="" class="link-secondary">Ссылка</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>


    <?php
    Modal::begin([
        'title' => 'Корзина',
        'id' => 'cart',
        'size' => 'modal-lg',
        'footer' => '<button type="button" class="btn btn-secondary" data-dismiss="modal">Продолжить покупки</button>
		<a href="' . Url::to(['/cart/view']) . '" class="btn btn-primary">Оформить заказ</a>
		<button type="button" class="btn btn-danger" onclick="clearCart()">Очистить корзину</button>'
    ]);
    Modal::end();
    ?>

    <!-- 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script> 
    -->
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>