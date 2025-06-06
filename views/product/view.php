<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\ProductModel $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Product Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'ID_product' => $model->ID_product], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'ID_product' => $model->ID_product], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_product',
            'product_type_id',
            'name',
            'article',
            'min_price',
            'material_type_id',
        ],
    ]) ?>

</div>
