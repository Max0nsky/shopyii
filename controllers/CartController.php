<?php

namespace app\controllers;

use app\models\Food;
use app\models\Cart;
use Yii;

class CartController extends AppController
{
    /**
     * Получение id товара и добавление в корзину
     */
    public function actionAdd()
    {
        $id = Yii::$app->request->get('id');
        $food = Food::findOne($id);
        if (empty($food)) {
            return false;
        }
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($food);
        $this->layout = false;

        return $this->render('cart-modal', compact('session'));
    }

    /**
     * Очистка всей корзины
     */
    public function actionClear()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.quantity');
        $session->remove('cart.sum');
        $this->layout = false;

        return $this->render('cart-modal', compact('session'));
    }

    /**
     * Удаление одного элемента из корзины
     */
    public function actionDelItem()
    {
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    /**
     * Показ корзины через кнопку в меню
     */
    public function actionShow()
    {
        $session = Yii::$app->session;
        $session->open();
        $this->layout = false;

        return $this->render('cart-modal', compact('session'));
    }
}
