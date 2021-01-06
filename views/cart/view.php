<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Корзина';
?>

<div class="container cpt-4 my-md-5 pt-md-5">

    <?php if (Yii::$app->session->hasFlash('success')) : ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif; ?>

    <?php if (Yii::$app->session->hasFlash('error')) : ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('error'); ?>
        </div>
    <?php endif; ?>


    <?php if (!empty($session['cart'])) : ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered ">
                <thead>
                    <tr>
                        <th>Изображение</th>
                        <th>Количество</th>
                        <th>Название</th>
                        <th>Цена</th>
                        <th>Сумма</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($session['cart'] as $id => $item) : ?>
                        <tr>
                            <td><a href="<?= Url::to(['/food/view', 'id' => $id]) ?>"><?= Html::img("@web/images/food/{$item['img']}", ['alt' => $item['name'], 'height' => 50]) ?></a></td>
                            <td><?= $item['quantity'] ?></td>
                            <td><?= $item['name'] ?></td>
                            <td><?= $item['price'] ?></td>
                            <td><?= $item['quantity'] * $item['price'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="4">Итого товаров: </td>
                        <td><?= $session['cart.quantity'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="4">На сумму: </td>
                        <td><?= $session['cart.sum'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="cpt-4 my-md-5 pt-md-5">
            <?php $form = ActiveForm::begin() ?>
            <?= $form->field($purchase, 'firstname') ?>
            <?= $form->field($purchase, 'lastname') ?>
            <?= $form->field($purchase, 'patronymic') ?>
            <?= $form->field($purchase, 'phone_number') ?>
            <?= $form->field($purchase, 'address') ?>
            <?= $form->field($purchase, 'persons') ?>
            <?= Html::submitButton('Заказать', ['class' => 'btn btn-success']) ?>
            <?php ActiveForm::end() ?>
        </div>
    <?php else : ?>
        <h3>Корзина пуста</h3>
    <?php endif; ?>
</div>