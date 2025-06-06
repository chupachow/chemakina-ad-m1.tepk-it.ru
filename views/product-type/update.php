<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProductTypeModel $model */

$this->title = 'Update Product Type Model: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Product Type Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'ID_product_type' => $model->ID_product_type]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-type-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
