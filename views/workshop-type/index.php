<?php

use app\models\WorkshopTypeModel;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\WorkshopTypeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Тип цеха Модели';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workshop-type-model-index">

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

            //'ID_workshop_type',
            'name',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, WorkshopTypeModel $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID_workshop_type' => $model->ID_workshop_type]);
                 }
            ],
        ],
    ]); ?>


</div>
