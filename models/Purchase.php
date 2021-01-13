<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;
use app\models\PurchaseItem;

/**
 * Модель для таблицы заказов "purchase".
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
            [['phone_number'], 'integer', 'max' => 99999999999],
            [['persons'], 'integer', 'min' => 1, 'max' => 10],
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
            'firstname' => 'Имя',
            'lastname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'phone_number' => 'Номер телефона',
            'address' => 'Адрес',
            'persons' => 'Количество персон',
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

    public static function executePurchase($purchase_id)
    {
        //Получаем id и quantity продуктов для уменьшения количества на складе
        $items = PurchaseItem::find()->where(['purchase_id' => $purchase_id])->all();
        //Уменьшаем количество каждого продукта из заказа
        foreach ($items as $item) {
            $food = Food::findOne($item->food_id);
            if ($food->quantity >= $item->quantity) {
                $food->quantity -= ($item->quantity);
                $food->save(false);
                Yii::$app->session->setFlash('success', 'Со склада: ' . $food->name);
            } else {
                Yii::$app->session->setFlash('error', 'Не хватает на складе: ' . $food->name);
            }
        }
        //Изменяем статус заказа на "Выполнено"
        Purchase::updateAll(['condition_order' => 'Выполнено'], ['like', 'id', $purchase_id]);
    }
}
