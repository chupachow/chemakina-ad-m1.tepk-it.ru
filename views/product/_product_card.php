<?php
use yii\helpers\Html;
/* @var $model \app\models\Product */
/* @var $model \app\models\ProductType */
?>
<div class="card h-100">
    <div class="card-body position-relative">
        <!-- Блок стоимости в правом верхнем углу
        <div class="position-absolute top-0 end-0 p-3">
            <?= $sum = 0.00;
            $sum .= number_format($model->getCraftTime(), 2, '.', ' ') ?> ₽
        </div>-->
        <!-- Время изготовления -->
        <div class="position-absolute top-0 end-0 p-3">
            Время изготовления (ч): <?= Html::encode($model->getCraftTime()) ?>
        </div>

        <!-- Основная информация -->
        <div class="d-flex flex-column">
            <!-- 1. Название продукта -->
            <h5 class="card-title mb-1">
                <?= Html::encode($model->name ?? 'Название не указано') ?>
            </h5>

            <!-- 2. Артикул -->
            <div class="text-muted small mb-1">
                Артикул: <?= Html::encode($model->article ?? 'Артикул не указан') ?>
            </div>

            <!-- 3. Минимальная стоимость для партнера -->
            <div class="mb-1">
                Минимальная стоимость для партнера: <?= Html::encode($model->min_price ?? 'Минимальная стоимость не указана') ?>
            </div>

            <!-- 4. ID Тип материала -->
            <div class="mb-1">
                ID Типа материала: <?= Html::encode($model->material_type_id ?? 'Тип не указан') ?>
            </div>


        </div>

        <!-- Кнопка просмотра -->
         <div class="mt-3 text-end">
            <?= Html::a('Просмотр', ['view', 'ID_product' => $model->ID_product], ['class' => 'btn btn-sm btn-outline-primary']) ?>
        </div>
    </div>
</div>
