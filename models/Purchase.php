<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;
use yii\behaviors\TimestampBehavior;
use app\models\PurchaseItem;

/**
 * This is the model class for table "purchase".
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $patronymic
 * @property int $final_sum
 * @property int $final_quantity
 * @property int $phone_number
 * @property string $address
 * @property int $persons
 * @property string $date
 * @property string $condition_order
 *
 * @property PurchaseItem[] $purchaseItem
 */
class Purchase extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'purchase';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'patronymic', 'phone_number', 'address', 'persons'], 'required'],
            [['phone_number', 'persons'], 'integer'],
            [['firstname', 'lastname', 'patronymic'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'firstname' => 'Имя',
            'lastname' => 'Фамилия',
            'patronymic' => 'Отчество',
            //'final_sum' => 'Финальная сумма',
            //'final_quantity' => 'Финальное количество',
            'phone_number' => 'Номер телефона',
            'address' => 'Адрес',
            'persons' => 'Количество персон',
            //'date' => 'Дата',
            //'condition_order' => 'Состояние заказа',
        ];
    }

    /**
     * Gets query for [[PurchaseItem]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseItem()
    {
        return $this->hasMany(PurchaseItem::className(), ['purchase_id' => 'id']);
    }
}