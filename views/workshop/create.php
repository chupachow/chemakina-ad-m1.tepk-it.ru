<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\WorkshopModel $model */

$this->title = 'Create Workshop Model';
$this->params['breadcrumbs'][] = ['label' => 'Workshop Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workshop-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
