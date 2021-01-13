<?php

namespace app\models;

use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
    /**
     * Добавление товара в корзину
     */
    public function addToCart($food, $quantity = 1)
    {
        // Если товар существует - добавляем его количество.
        // Иначе - формируем массив для товара и добавляем в сессию.
        if (isset($_SESSION['cart'][$food->id])) {
            if ($_SESSION['cart'][$food->id]['quantity'] + $quantity  <= $food->quantity) {
                $_SESSION['cart'][$food->id]['quantity'] += $quantity;
            } else {
                echo "<script>alert(\"Извините, на складе осталось только $food->quantity шт\");</script>";
                return false;
            }
        } elseif ($quantity <= $food->quantity) {
            $_SESSION['cart'][$food->id] = [
                'quantity' => $quantity,
                'name' => $food->name,
                'price' => $food->price,
                'img' => $food->img
            ];
        } else {
            return false;
        }

        // Добавляем общее количество всех видов товара
        if (isset($_SESSION['cart.quantity'])) {
            $_SESSION['cart.quantity'] += $quantity;
        } else {
            $_SESSION['cart.quantity'] = $quantity;
        }

        // Добавляем общую сумму заказа
        if (isset($_SESSION['cart.sum'])) {
            $_SESSION['cart.sum'] += ($quantity * $food->price);
        } else {
            $_SESSION['cart.sum'] = ($quantity * $food->price);
        }
    }

    /**
     * Пересчёт суммы и количества товаров для удаления
     */
    public function recalc($id)
    {
        if (!isset($_SESSION['cart'][$id])) {
            return false;
        }
        $quantityMinus = $_SESSION['cart'][$id]['quantity'];
        $sumMinus = $_SESSION['cart'][$id]['quantity'] * $_SESSION['cart'][$id]['price'];
        $_SESSION['cart.quantity'] -= $quantityMinus;
        $_SESSION['cart.sum'] -= $sumMinus;
        unset($_SESSION['cart'][$id]);
    }
}
