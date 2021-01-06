<?php

namespace app\controllers;

use app\models\Food;
use app\models\Cart;
use GuzzleHttp\Psr7\Request;
use Yii;
use app\models\PurchaseItem;
use app\models\Purchase;

class CartController extends AppController
{
    /**
     * Получение id товара и добавление в корзину
     */
    public function actionAdd()
    {
        $id = Yii::$app->request->get('id');
        $quantity = (int)Yii::$app->request->get('quantity');
        $quantity = !$quantity ? 1 : $quantity;
        $food = Food::findOne($id);
        if (empty($food)) {
            return false;
        }
        if(isset($_SESSION['cart'][$food->id]['quantity']))
        {
            if ($quantity + $_SESSION['cart'][$food->id]['quantity'] > $food->quantity)
            {
                echo "<script>alert(\"Извините, у нас нет необходимого количества данного товара :( \");</script>";
                $quantity = 0; 
            }
        }
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($food, $quantity);
        if (!Yii::$app->request->isAjax) {
            return $this->redirect(Yii::$app->request->referrer);
        }
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

    /**
     * Оформление заказа
     */
    public function actionView()
    {
        $session = Yii::$app->session;
        $session->open();
        $purchase = new Purchase();
        if ($purchase->load(Yii::$app->request->post())) {
            $purchase->final_quantity = $session['cart.quantity'];
            $purchase->final_sum = $session['cart.sum'];
            $purchase->condition_order = "Ожидание";
            $purchase->date = date("Y-m-d H:i:s");
            if ($purchase->save()) {
                $this->savePurchaseItem($session['cart'], $purchase->id);
                Yii::$app->session->setFlash('success', 'Заказ принят, ожидайте звонок в ближайшее время.');
                
                // Очистка корзины
                $session->remove('cart');
                $session->remove('cart.quantity');
                $session->remove('cart.sum');

                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Извините, произошла ошибка при оформлении заказа.');
            }
        }
        return $this->render('view', compact('session', 'purchase'));
    }

    /**
     * Добавление позиций в таблицу purchase_item к заказу из purchase
     */
    public function savePurchaseItem($items, $purchase_id)
    {
        foreach ($items as $id => $item) {
            $purchase_item = new PurchaseItem();
            $purchase_item->purchase_id = $purchase_id;
            $purchase_item->food_id = $id;
            $purchase_item->name = $item['name'];
            $purchase_item->price = $item['price'];
            $purchase_item->quantity = $item['quantity'];
            $purchase_item->sum = $item['quantity'] * $item['price'];
            $purchase_item->save();
        }
    }
}
