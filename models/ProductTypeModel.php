<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Product_type".
 *
 * @property int $ID_product_type
 * @property string $name
 * @property float $сoeficent_type_product
 *
 * @property Product[] $products
 */
class ProductTypeModel extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Product_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'сoeficent_type_product'], 'required'],
            [['сoeficent_type_product'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_product_type' => 'Id Product Type',
            'name' => 'Название',
            'сoeficent_type_product' => 'Коэффициент типа продукции',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['product_type_id' => 'ID_product_type']);
    }

    public function getTypeProduct()
    {
        $workshops = \app\models\ProductWorkshopModel::find()
            ->where(['product_id' => $this->ID_product])
            ->all();

        $total = 0;
        foreach ($workshops as $w) {
            $total += (float)$w->time_craft;
        }

        return ceil($total); // округление вверх

    }

}
