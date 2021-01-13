<?php

namespace app\controllers;

use yii\web\HttpException;
use app\models\Food;
use Yii;

class FoodController extends AppController
{
    /**
     * Отображение карточки отдельного товара
     */
    public function actionView($id)
    {
        $id = trim(Yii::$app->request->get('id'));
        $food = Food::findOne($id);
        if(empty($food)) {
            throw new HttpException(404, 'Такого товара не существует.');
        }

        return $this->render('view', compact('food'));
    }
}