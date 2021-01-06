<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;
use app\models\Purchase;

/**
 * This is the model class for table "purchase_item".
 *
 * @property int $id
 * @property int $purchase_id
 * @property int $food_id
 * @property string $name
 * @property int $price
 * @property int $quantity
 * @property int $sum
 *
 * @property Purchase $purchase
 * @property Food $food
 */
class PurchaseItem extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'purchase_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['purchase_id', 'food_id', 'name', 'price', 'quantity', 'sum'], 'required'],
            [['purchase_id', 'food_id', 'price', 'quantity', 'sum'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['purchase_id'], 'exist', 'skipOnError' => true, 'targetClass' => Purchase::className(), 'targetAttribute' => ['purchase_id' => 'id']],
            [['food_id'], 'exist', 'skipOnError' => true, 'targetClass' => Food::className(), 'targetAttribute' => ['food_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'purchase_id' => 'ID заказа',
            'food_id' => 'ID продукта',
            'name' => 'Название продукта',
            'price' => 'Цена продукта',
            'quantity' => 'Количество',
            'sum' => 'Сумма',
        ];
    }

    /**
     * Gets query for [[Purchase]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPurchase()
    {
        return $this->hasOne(Purchase::className(), ['id' => 'purchase_id']);
    }

    /**
     * Gets query for [[Food]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFood()
    {
        return $this->hasOne(Food::className(), ['id' => 'food_id']);
    }
}
