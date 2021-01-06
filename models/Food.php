<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Модель конкретного товара из одной категории
 */
class Food extends ActiveRecord
{

    public $imageFile;

    public function getCategory()
    {
        return $this->hasMany(Category::className(), ['id' => 'id_category']);
    }

    public function attributeLabels()
    {
        return [
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
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            ['id_category', 'default', 'value' => 1]
        ];
    }

    /**
     * Загрузка изображений на сервер
     */
    public function upload()
    {
        if ($this->validate()) {
            debug($this->imageFile);
            $this->imageFile->saveAs('images/food/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}
