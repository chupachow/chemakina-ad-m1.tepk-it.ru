<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/comfort.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <style>
        body, h1, h2, h3, h4, h5, h6, input, textarea, button {
            font-family: 'Candara', sans-serif!important;
            background-color: #FFFFFF;

        }
        .btn {
            background-color: #355CBD !important;
            border-color: #355CBD !important;
            color: white !important;
        }
        .bg {
            background-color: #D2DFFF !important;
        }
        a {
          color: black !important;
        }
    </style>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/comfort.ico', ['alt' => 'Логотип', 'style' => 'height:30px;']) . ' ' . Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-light bg fixed-top']
    ]);
    $menuItems = [];

    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => '', 'url' => ['/site/login']];
    } else {
        $menuItems[] = ['label' => 'Тип материала', 'url' => ['/material-type/index']];
        $menuItems[] = ['label' => 'Цех', 'url' => ['/workshop/index']];
        $menuItems[] = ['label' => 'Тип цеха', 'url' => ['/workshop-type/index']];
        $menuItems[] = ['label' => 'Продукт', 'url' => ['/product/index']];
        $menuItems[] = ['label' => 'Тип продукта', 'url' => ['/product-type/index']];
        $menuItems[] = ['label' => 'Продукт цеха', 'url' => ['/product-workshop/index']];
        $menuItems[] = ['label' => 'Контакты', 'url' => ['/site/contact']];

    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $menuItems,
    ]);
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start text-dark" > <a href="https://github.com/chupachow/chemakina-ad-m1.tepk-it.ru">My GitHub</a> <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
