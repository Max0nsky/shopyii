<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Модель конкретного товара из категории
 */
class Food extends ActiveRecord
{

    public function getCategory()
    {
        return $this->hasMany(Category::className(), ['id' => 'id_category']);
    }
}
