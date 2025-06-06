<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ProductWorkshopSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-workshop-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_product_workshop') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'workshop_id') ?>

    <?= $form->field($model, 'time_craft') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
