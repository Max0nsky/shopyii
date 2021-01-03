<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<?php if (!empty($session['cart'])) : ?>
    <div class="camod">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Изображение</th>
                        <th>Количество</th>
                        <th>Название</th>
                        <th>Цена</th>
                        <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($session['cart'] as $id => $item) : ?>
                        <tr>
                            <td><a href="<?= Url::to(['/food/view', 'id' => $id]) ?>"><?= Html::img("@web/images/food/{$item['img']}", ['alt' => $item['name'], 'height' => 50]) ?></a></td>
                            <td><?= $item['quantity'] ?></td>
                            <td><?= $item['name'] ?></td>
                            <td><?= $item['price'] ?></td>
                            <td><span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"><b>X</b></span></td>
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
    <?php else : ?>
        <h3>Корзина пуста</h3>
    <?php endif; ?>
    </div>