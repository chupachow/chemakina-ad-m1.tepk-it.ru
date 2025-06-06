<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\WorkshopTypeModel $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Workshop Type Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="workshop-type-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ID_workshop_type' => $model->ID_workshop_type], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ID_workshop_type' => $model->ID_workshop_type], [
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
            'ID_workshop_type',
            'name',
        ],
    ]) ?>

</div>
