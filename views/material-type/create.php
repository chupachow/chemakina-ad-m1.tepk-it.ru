<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MaterialTypeModel $model */

$this->title = 'Create Material Type Model';
$this->params['breadcrumbs'][] = ['label' => 'Material Type Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-type-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
