<?php

use app\models\MaterialTypeModel;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\MaterialTypeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Тип материала Модели';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-type-model-index">

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

            //'ID_material_type',
            'name',
            'percent_loss_material',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, MaterialTypeModel $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID_material_type' => $model->ID_material_type]);
                 }
            ],
        ],
    ]); ?>


</div>
