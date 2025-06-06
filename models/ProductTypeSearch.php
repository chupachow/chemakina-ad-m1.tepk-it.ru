<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductTypeModel;

/**
 * ProductTypeSearch represents the model behind the search form of `app\models\ProductTypeModel`.
 */
class ProductTypeSearch extends ProductTypeModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_product_type'], 'integer'],
            [['name'], 'safe'],
            [['сoeficent_type_product'], 'number'],
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
        $query = ProductTypeModel::find();

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
            'ID_product_type' => $this->ID_product_type,
            'сoeficent_type_product' => $this->сoeficent_type_product,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
