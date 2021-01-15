<?php

namespace app\controllers;

use yii\web\HttpException;
use app\models\Food;
use app\models\Review;
use Yii;

class FoodController extends AppController
{
    /**
     * Страница карточки отдельного товара с возможностью оставлять отзывы
     */
    public function actionView($id)
    {
        $food = Food::findOne($id);
        if (empty($food)) {
            throw new HttpException(404, 'Такого товара не существует.');
        }
        $reviews = Review::find()->where(['id_food' => $id])->orderBy('date DESC')->all();

        // Создаем модель нового отзыва, заполняем дату и id_food
        $modelReview = new Review();
        $modelReview->id_food = $id;
        $modelReview->date = date("Y-m-d H:i:s");

        // Если модель отзыва передана и прошла валидацию - сохраняем в базу данных
        if ($modelReview->load(Yii::$app->request->post()) && $modelReview->validate()) {
            $modelReview->save();
            return $this->refresh();
        }
        
        return $this->render('view', ['food' => $food, 'reviews' => $reviews, 'modelReview' => $modelReview]);
    }
}
