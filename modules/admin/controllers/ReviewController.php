<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Review;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

/**
 * ReviewController реализует обработку отзывов на стороне администратора.
 */
class ReviewController extends Controller
{
    /**
     * Удалить заказ по переданному $id
     * @param integer $id
     */
    public function actionDelete($id)
    {
        $purchase =  Review::findOne($id);
        $purchase->delete();
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }
}
