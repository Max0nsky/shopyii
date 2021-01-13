<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Модель для таблицы категорий товаров "purchase".
 *
 * @property int $id
 * @property string $name
 */
class Category extends ActiveRecord
{
    public function getFood()
    {
        return $this->hasMany(Food::classname(), ['id_category' => 'id']);
    }

}
