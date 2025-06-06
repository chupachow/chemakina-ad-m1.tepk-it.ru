<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Product".
 *
 * @property int $ID_product
 * @property int $product_type_id
 * @property string $name
 * @property int $article
 * @property float $min_price
 * @property int $material_type_id
 *
 * @property MaterialType $materialType
 * @property ProductType $productType
 * @property ProductWorkshop[] $productWorkshops
 */
class ProductModel extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_type_id', 'name', 'article', 'min_price', 'material_type_id'], 'required'],
            [['product_type_id', 'article', 'material_type_id'], 'integer'],
            [['min_price'], 'number'],
            [['name'], 'string', 'max' => 255],
            [['product_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductType::class, 'targetAttribute' => ['product_type_id' => 'ID_product_type']],
            [['material_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => MaterialType::class, 'targetAttribute' => ['material_type_id' => 'ID_material_type']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_product' => 'Id Product',
            'product_type_id' => 'ID Тип продукта',
            'name' => 'Название',
            'article' => 'Артикул',
            'min_price' => 'Минимальная стоимость для партнеров',
            'material_type_id' => 'ID Тип материала',
        ];
    }

    /**
     * Gets query for [[MaterialType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialType()
    {
        return $this->hasOne(MaterialType::class, ['ID_material_type' => 'material_type_id']);
    }

    /**
     * Gets query for [[ProductType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductType()
    {
        return $this->hasOne(ProductType::class, ['ID_product_type' => 'product_type_id']);
    }

    /**
     * Gets query for [[ProductWorkshops]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductWorkshops()
    {
        return $this->hasMany(ProductWorkshop::class, ['product_id' => 'ID_product']);
    }

    public function getCraftTime()
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
