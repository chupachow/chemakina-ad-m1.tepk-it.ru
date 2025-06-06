<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Workshop".
 *
 * @property int $ID_workshop
 * @property string $name
 * @property int $workshop_type_id
 * @property int $number_of_people
 *
 * @property ProductWorkshop[] $productWorkshops
 * @property WorkshopType $workshopType
 */
class WorkshopModel extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Workshop';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'workshop_type_id', 'number_of_people'], 'required'],
            [['workshop_type_id', 'number_of_people'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['workshop_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => WorkshopType::class, 'targetAttribute' => ['workshop_type_id' => 'ID_workshop_type']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            //'ID_workshop' => 'Id Workshop',
            'name' => 'Название',
            'workshop_type_id' => 'ID Типа цеха',
            'number_of_people' => 'Кол-во человек выполняющих работу',
        ];
    }

    /**
     * Gets query for [[ProductWorkshops]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductWorkshops()
    {
        return $this->hasMany(ProductWorkshop::class, ['workshop_id' => 'ID_workshop']);
    }

    /**
     * Gets query for [[WorkshopType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkshopType()
    {
        return $this->hasOne(WorkshopType::class, ['ID_workshop_type' => 'workshop_type_id']);
    }

}
