<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductModel;

/**
 * ProductSearch represents the model behind the search form of `app\models\ProductModel`.
 */
class ProductSearch extends ProductModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_product', 'product_type_id', 'article', 'material_type_id'], 'integer'],
            [['name'], 'safe'],
            [['min_price'], 'number'],
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
        $query = ProductModel::find();

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
            'ID_product' => $this->ID_product,
            'product_type_id' => $this->product_type_id,
            'article' => $this->article,
            'min_price' => $this->min_price,
            'material_type_id' => $this->material_type_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
