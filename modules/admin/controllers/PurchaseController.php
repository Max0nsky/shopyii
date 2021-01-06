<?php

namespace app\modules\admin\controllers;

use app\models\Food;
use Yii;
use app\models\Purchase;
use app\models\PurchaseItem;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

/**
 * PurchaseController реализует обработку пользовательских заказов.
 */
class PurchaseController extends Controller
{
    /**
     * Список всех заказов.
     * @return mixed
     */
    public function actionIndex()
    {
        $purchases = Purchase::find()->with('purchaseItem')->orderBy('condition_order DESC')->all();
        
        $purchase_id = Yii::$app->request->get('id');
        if (!empty($purchase_id)) {
            //Получаем id и quantity продуктов для уменьшения количества на складе
            $items = PurchaseItem::find()->where(['purchase_id' => $purchase_id])->all();

            //Уменьшаем количество каждого продукта из заказа
            foreach($items as $item) {
                $food = Food::findOne($item->food_id);
                if ($food->quantity >= $item->quantity) {
                    $food->quantity -= ($item->quantity);
                    $food->save(false);
                    Yii::$app->session->setFlash('success', 'Со склада: ' . $food->name);
                } else {
                    Yii::$app->session->setFlash('error', 'Не хватает на складе: ' . $food->name);
                }
            }

            //Изменяем статус заказа на "Выполнено"
            Purchase::updateAll(['condition_order' => 'Выполнено'], ['like', 'id', $purchase_id]);
            return $this->redirect('/admin/purchase/index');
        }
        return $this->render('index', ['purchases' => $purchases]);
    }
}
