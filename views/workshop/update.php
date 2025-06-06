<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\WorkshopModel $model */

$this->title = 'Update Workshop Model: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Workshop Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'ID_workshop' => $model->ID_workshop]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="workshop-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
