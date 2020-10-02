<?php

namespace app\controllers;

use app\models\Food;
use yii\data\Pagination;
use Yii;

class FoodController extends AppController
{
    public function actionIndex($id)
    {
        $id = Yii::$app->request->get('id');
        $food = Food::findOne($id);

        return $this->render('view', compact('food'));
    }
}