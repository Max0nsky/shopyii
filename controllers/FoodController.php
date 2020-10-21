<?php

namespace app\controllers;

use app\models\Food;
use Yii;

class FoodController extends AppController
{
    public function actionView($id)
    {
        $id = Yii::$app->request->get('id');
        $food = Food::findOne($id);

        return $this->render('view', compact('food'));
    }
}