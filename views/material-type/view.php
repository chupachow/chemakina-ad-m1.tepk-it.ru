<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\MaterialTypeModel $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Тип материала Модель', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="material-type-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'ID_material_type' => $model->ID_material_type], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'ID_material_type' => $model->ID_material_type], [
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
            'ID_material_type',
            'name',
            'percent_loss_material',
        ],
    ]) ?>

</div>
