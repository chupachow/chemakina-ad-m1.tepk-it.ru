<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProductWorkshopModel $model */

$this->title = 'Create Product Workshop Model';
$this->params['breadcrumbs'][] = ['label' => 'Product Workshop Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-workshop-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
