<?php

use app\models\WorkshopModel;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\WorkshopSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Цех Модели';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workshop-model-index">

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

            //'ID_workshop',
            'name',
            'workshop_type_id',
            'number_of_people',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, WorkshopModel $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID_workshop' => $model->ID_workshop]);
                 }
            ],
        ],
    ]); ?>


</div>
