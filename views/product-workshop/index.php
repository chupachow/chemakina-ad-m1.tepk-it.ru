<?php

use app\models\ProductWorkshopModel;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProductWorkshopSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Продукт цеха Модели';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-workshop-model-index">

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

            //'ID_product_workshop',
            'product_id',
            'workshop_id',
            'time_craft',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ProductWorkshopModel $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID_product_workshop' => $model->ID_product_workshop]);
                 }
            ],
        ],
    ]); ?>


</div>
