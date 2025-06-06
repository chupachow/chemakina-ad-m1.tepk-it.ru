<?php

use app\models\ProductModel;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Продукция Модель';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php
    use yii\widgets\ListView;
    ?>
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_product_card',
        'viewParams' => [
            'somethingExtra' => 'some value',
        ],
        'layout' => "{items}\n{pager}",
        'options' => ['class' => 'row'],
        'itemOptions' => ['class' => 'col-md-6 mb-4'],
    ]) ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ID_product',
            'product_type_id',
            'name',
            [
                'label' => 'Время изготовления (ч)',
                'value' => function($model) {
                    return $model->getCraftTime();
                },
            ],
            'article',
            'min_price',
            'material_type_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ProductModel $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID_product' => $model->ID_product]);
                 }
            ],
        ],
    ]); ?>


</div>
