<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MaterialTypeModel $model */

$this->title = 'Создать Тип материала Модели';
$this->params['breadcrumbs'][] = ['label' => 'Тип материала модели', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-type-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
