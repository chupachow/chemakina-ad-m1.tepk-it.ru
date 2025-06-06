<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\WorkshopTypeModel $model */

$this->title = 'Update Workshop Type Model: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Workshop Type Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'ID_workshop_type' => $model->ID_workshop_type]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="workshop-type-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
