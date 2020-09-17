<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

/**
 * Контроллер по умолчанию для модуля `admin`
 */
class DefaultController extends AppAdminController
{
    /**
     * Отображает индексное представление для модуля администратора
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
