<?php

namespace app\controllers;

use app\models\Food;
use app\models\Category;
use yii\data\Pagination;
use yii\web\HttpException;
use Yii;

class CategoryController extends AppController
{
    /**
     * Отображение главной страницы с популярными товарами
     */
    public function actionIndex()
    {
        $categories = Category::find()->indexBy('id')->asArray()->all();

        $query = Food::find()->where(['popular' => 1])->indexBy('id');
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 6, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $food = $query->offset($pages->offset)->limit($pages->limit)->asArray()->all();
        if(empty($food)) {
            throw new HttpException(404, 'Такой категории нет.');
        }
        return $this->render('index', ['food' => $food, 'pages' => $pages, 'categories' => $categories]);
    }

    /**
     * Отображние страниц категорий товаров
     */
    public function actionView()
    {
        $id = trim(Yii::$app->request->get('id'));
        $categories = Category::find()->indexBy('id')->all();
        $query = Food::find()->where(['id_category' => $id])->indexBy('id');
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 6, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $food = $query->offset($pages->offset)->limit($pages->limit)->asArray()->all();
        if(empty($food)) {
            throw new HttpException(404, 'Такой категории нет.');
        }

        return $this->render('view', ['food' => $food, 'pages' => $pages, 'categories' => $categories]);
    }

    /**
     * Отображение товаров для поискового запроса
     */
    public function actionSearch()
    {
        $queryWord = trim(Yii::$app->request->get('queryWord'));
        if (!$queryWord) {
            return $this->redirect('/category/index');
        }
        $food = Food::find()->where(['like', 'name', $queryWord])->asArray()->all();
        $categories = Category::find()->indexBy('id')->asArray()->all();

        return $this->render('search', ['food' => $food, 'categories' => $categories, 'queryWord' => $queryWord]);
    }
}
