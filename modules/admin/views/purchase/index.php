<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="purchase-index">
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
<h1>Заказы</h1>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ФИО</th>
                <th>Номер телефона</th>
                <th>Адрес</th>
                <th>Персон</th>
                <th>Сумма</th>
                <th>Дата</th>
                <th>Товары</th>
                <th>Статус</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($purchases as $purchase) : ?>
                <tr>
                    <td><?= $purchase->firstname . " " . $purchase->lastname . " " . $purchase->patronymic ?></td>
                    <td><?= $purchase->phone_number ?></td>
                    <td><?= $purchase->address ?></td>
                    <td><?= $purchase->persons ?></td>
                    <td><?= $purchase->final_sum ?></td>
                    <td><?= $purchase->date ?></td>
                    <td>
                        <?php foreach ($purchase->purchaseItem as $item)
                            echo "[ "
                                . $item->name . ", "
                                . $item->price . "р, "
                                . $item->quantity . "шт ] <br>";
                        ?>
                    </td>
                    <form action="/admin/purchase/index" method="GET">
                        <input type="hidden" value="<?= $purchase->id ?>" name="id"/>
                        <td>
                            <?php if ($purchase->condition_order == 'Выполнено') {
                                echo $purchase->condition_order;
                            } else {
                                echo Html::submitButton('Ожидание', ['class' => 'btn btn-link']);
                            }
                            ?>
                        </td>
                    </form>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


</div>