<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\WorkshopTypeModel $model */

$this->title = 'Create Workshop Type Model';
$this->params['breadcrumbs'][] = ['label' => 'Workshop Type Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workshop-type-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
