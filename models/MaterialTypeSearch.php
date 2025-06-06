<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MaterialTypeModel;

/**
 * MaterialTypeSearch represents the model behind the search form of `app\models\MaterialTypeModel`.
 */
class MaterialTypeSearch extends MaterialTypeModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_material_type'], 'integer'],
            [['name'], 'safe'],
            [['percent_loss_material'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = MaterialTypeModel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID_material_type' => $this->ID_material_type,
            'percent_loss_material' => $this->percent_loss_material,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
