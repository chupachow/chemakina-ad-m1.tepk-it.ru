<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Product_workshop".
 *
 * @property int $ID_product_workshop
 * @property int $product_id
 * @property int $workshop_id
 * @property float $time_craft
 *
 * @property Product $product
 * @property Workshop $workshop
 */
class ProductWorkshopModel extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Product_workshop';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'workshop_id', 'time_craft'], 'required'],
            [['product_id', 'workshop_id'], 'integer'],
            [['time_craft'], 'number'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'ID_product']],
            [['workshop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Workshop::class, 'targetAttribute' => ['workshop_id' => 'ID_workshop']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            //'ID_product_workshop' => 'Id Product Workshop',
            'product_id' => 'ID Продукта',
            'workshop_id' => 'ID Цеха',
            'time_craft' => 'Время изготовления',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['ID_product' => 'product_id']);
    }

    /**
     * Gets query for [[Workshop]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkshop()
    {
        return $this->hasOne(Workshop::class, ['ID_workshop' => 'workshop_id']);
    }

}
