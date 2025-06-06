<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\WorkshopModel $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Workshop Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="workshop-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ID_workshop' => $model->ID_workshop], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ID_workshop' => $model->ID_workshop], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_workshop',
            'name',
            'workshop_type_id',
            'number_of_people',
        ],
    ]) ?>

</div>
