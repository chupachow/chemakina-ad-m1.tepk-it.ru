<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProductWorkshopModel $model */

$this->title = 'Обновить продукт цеха: ' . $model->ID_product_workshop;
$this->params['breadcrumbs'][] = ['label' => 'Продукт цеха модели', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_product_workshop, 'url' => ['view', 'ID_product_workshop' => $model->ID_product_workshop]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="product-workshop-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
