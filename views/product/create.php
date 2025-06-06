<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProductModel $model */

$this->title = 'Создать Продукт Модели';
$this->params['breadcrumbs'][] = ['label' => 'Продукт Модели', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
