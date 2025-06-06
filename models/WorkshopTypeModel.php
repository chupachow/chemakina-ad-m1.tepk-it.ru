<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Workshop_type".
 *
 * @property int $ID_workshop_type
 * @property string $name
 *
 * @property Workshop[] $workshops
 */
class WorkshopTypeModel extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Workshop_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            //'ID_workshop_type' => 'Id Workshop Type',
            'name' => 'Название',
        ];
    }

    /**
     * Gets query for [[Workshops]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkshops()
    {
        return $this->hasMany(Workshop::class, ['workshop_type_id' => 'ID_workshop_type']);
    }

}
