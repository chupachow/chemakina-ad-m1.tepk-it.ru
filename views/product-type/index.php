<?php

use app\models\ProductTypeModel;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProductTypeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Тип продукта Модели';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-type-model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ID_product_type',
            'name',
            'сoeficent_type_product',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ProductTypeModel $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID_product_type' => $model->ID_product_type]);
                 }
            ],
        ],
    ]); ?>


</div>
