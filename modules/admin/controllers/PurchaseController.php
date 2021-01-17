<?php

namespace app\modules\admin\controllers;

use app\models\Food;
use Yii;
use app\models\Purchase;
use app\models\PurchaseItem;
use yii\data\ActiveDataProvider;
use app\modules\admin\controllers\AppAdminController;

/**
 * PurchaseController реализует обработку пользовательских заказов.
 */
class PurchaseController extends AppAdminController
{
    /**
     * Список всех заказов.
     * @return mixed
     */
    public function actionIndex()
    {
        $purchases = Purchase::find()->with('purchaseItem')->orderBy('condition_order DESC')->all();
        return $this->render('index', ['purchases' => $purchases]);
    }
    /**
     * Выполнить заказ по переданному $purchase_id
     *  @param integer $purchase_id
     */
    public function actionExecute($purchase_id)
    {
        Purchase::executePurchase($purchase_id);
        return $this->redirect('/admin/purchase/index');
    }

    /**
     * Удалить заказ по переданному $purchase_id
     * @param integer $purchase_id
     */
    public function actionDelete($purchase_id)
    {
        $purchase = Purchase::findOne($purchase_id);
        $purchase->delete();
        return $this->redirect('/admin/purchase/index');
    }
}
