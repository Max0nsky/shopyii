<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Модель категории товаров
 */
class Category extends ActiveRecord
{
    public function getFood()
    {
        return $this->hasMany(Food::classname(), ['id_category' => 'id']);
    }

}

//$this->data = Category::find()->indexBy('id')->asArray()->all();

