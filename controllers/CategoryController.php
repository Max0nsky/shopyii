<?php

namespace app\controllers;

use app\models\Food;
use app\models\Category;
use Yii;

class CategoryController extends AppController
{
    public function actionIndex()
    {
        $categories = Category::find()->indexBy('id')->asArray()->all();
        $food = Food::find()->where(['popular' => 1])->indexBy('id')->asArray()->all();

        return $this->render('index', ['food' => $food, 'categories' => $categories]);
    }

    public function actionView()
    {
        $categories = Category::find()->indexBy('id')->asArray()->all();
        $food = Food::find()->where(['id_category' => $_GET['id']])->indexBy('id')->asArray()->all();

        return $this->render('view', ['food' => $food, 'categories' => $categories]);
    }
}



//     $query = Food::find();
//     $pagination = new Pagination([
//         'defaultPageSize' => 6,
//         'totalCount' => $query->count(),
//     ]);
//     $food = $query->orderBy('name')
//         ->offset($pagination->offset)
//         ->limit($pagination->limit)
//         ->all();
//    return $this->render('index', [
//         'countries' => $food,
//         'pagination' => $pagination,
//    ]);
