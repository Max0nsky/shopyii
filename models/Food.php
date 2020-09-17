<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Модель конкретного товара из одной категории
 */
class Food extends ActiveRecord
{

    public function getCategory()
    {
        return $this->hasMany(Category::className(), ['id' => 'id_category']);
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_category' => 'Категория',
            'name' => 'Название',
            'price' => 'Цена',
            'description' => 'Описание',
            'img' => 'Изображение',
            'popular' => 'Популярность',
            'quantity' => 'Количество',
        ];
    }

    public function rules()
    {
        return [
            [['id_category', 'name', 'price', 'description', 'img', 'popular', 'quantity'], 'required'],
            [['price', 'quantity'], 'integer', 'min' => 0, 'max' => 99999],
            ['popular', 'boolean'],
            ['id_category', 'default', 'value' => 1]
        ];
    }
}
