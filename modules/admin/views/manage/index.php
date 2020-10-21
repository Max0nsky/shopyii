<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продукты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="food-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить продукт', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'id_category',
            'name',
            'price',
            //'description:ntext',
            //'img',
            'popular',
            'quantity',
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a(
                            '<span class="view-food">V</span>',
                            $url
                        );
                    },
                    'update' => function ($url, $model) {
                        return Html::a(
                            '<span class="update-food">U</span>',
                            $url
                        );
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="fa fa-trash">D</span>', $url, [
                            'title'        => 'delete',
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method'  => 'post',
                        ]);
                    },
                    'link' => function ($url, $model, $key) {
                        return Html::a('Действие', $url);
                    },
                ],
            ],
        ],
    ]); ?>


</div>