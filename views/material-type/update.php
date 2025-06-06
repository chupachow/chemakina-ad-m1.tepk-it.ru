<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MaterialTypeModel $model */

$this->title = 'Обновить тип материала Модель: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Material Type Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'ID_material_type' => $model->ID_material_type]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="material-type-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
