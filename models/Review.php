<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Модель таблицы отзывов для продукции "review".
 *
 * @property int $id
 * @property int $id_food
 * @property string $mail
 * @property string $name
 * @property string $text
 * @property string $date
 *
 * @property Food $food
 */
class Review extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_food', 'mail', 'name', 'text', 'date'], 'required'],
            [['id_food'], 'integer'],
            [['text'], 'string', 'max' => 255],
            [['date'], 'safe'],
            [['mail', 'name'], 'string', 'max' => 100],
            [['id_food'], 'exist', 'skipOnError' => true, 'targetClass' => Food::className(), 'targetAttribute' => ['id_food' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_food' => 'Id Food',
            'mail' => 'Email',
            'name' => 'Имя',
            'text' => 'Текст',
            'date' => 'Дата',
        ];
    }

    /**
     * Связь с таблицей Food.
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFood()
    {
        return $this->hasOne(Food::className(), ['id' => 'id_food']);
    }
}
