<?php

use yii\helpers\Url;
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
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
    <div class="container">
        <div class="row">
            <div class="reviews col-sm-6 ">
                <p>
                <h4> Написать отзыв:</h4>
                </p>
                <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($modelReview, 'name')->textInput() ?>
                <?= $form->field($modelReview, 'mail')->input('email')->hint('Вида: example@mail.ru'); ?>
                <?= $form->field($modelReview, 'text')->textarea(['rows' => 2, 'cols' => 5]) ?>
                <div class="form-group">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-secondary']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
            <div class="reviews col-sm-6 ">
                <p>
                <h4> Отзывы и пожелания:</h4>
                </p>
                <?php foreach ($reviews as $review) : ?>
                    <div class="review">
                        <p>
                            <b><?= $review->name ?> (<?= $review->mail ?>)</b>
                            <?php if (!empty(Yii::$app->user->identity['username'])) : ?>
                                <?php if (Yii::$app->user->identity['username'] == 'admin') : ?>
                                    <a href="<?= Url::to(['/admin/review/delete', 'id' => $review->id]) ?>" class="delete-review">[Удалить]</a>
                                <?php endif; ?>
                            <?php endif; ?><br>
                            <?= $review->text ?> <br>
                            <?= $review->date ?>
                        </p>
                    </div>
                <?php endforeach; ?>
                <?php if (empty($reviews)) echo "Отзывы для данного продукта отсутствуют." ?>
            </div>
        </div>
    </div>
</div><br>