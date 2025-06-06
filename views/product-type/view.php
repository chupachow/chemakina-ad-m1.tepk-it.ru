<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\ProductTypeModel $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Product Type Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-type-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ID_product_type' => $model->ID_product_type], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ID_product_type' => $model->ID_product_type], [
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
            'ID_product_type',
            'name',
            'сoeficent_type_product',
        ],
    ]) ?>

</div>
