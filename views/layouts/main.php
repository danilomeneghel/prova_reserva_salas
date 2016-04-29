<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Usuario;

AppAsset::register($this);

$idUsuario = Yii::$app->user->identity->idUsuario;
$usuario = Usuario::find()->where(['idUsuario' => $idUsuario])->one();
$nomeUsuario = $usuario->nome;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <div class="top">
        <div class="top-margem">
            <div class="top-logo">
                <?php
                    echo "<a href='".Yii::$app->homeUrl."'>".Html::img('@web/img/logo.png', ['height' => 28])."</a>";
                ?>
            </div>
            <div class="top-usuario">
                <?php 
                    echo "Olá, <b>".$nomeUsuario."</b>"; 
                ?>
            </div>
        </div>
        <?php
        NavBar::begin();
        echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Usuário', 'url' => ['/usuario']],
            ['label' => 'Login', 'url' => ['/login']],
            ['label' => 'Sala', 'url' => ['/sala']],
            ['label' => 'Reserva de Sala', 'url' => ['/reservasala']],
            ['label' => 'Suporte', 'url' => ['/site/suporte']],
            Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/site/login']] :
                [
                    'label' => 'Logout',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
            ],
        ]);
        NavBar::end();
        ?>
    </div>
</div>
<div class="filtro">
    <div class="filtro-margem">
        <div class="filtro-botao">&nbsp;</div>
        <div class="filtro-texto">
            <?php echo date("d/m/Y H:i"); ?>
        </div>
    </div>
</div>
<div class="container">
    <?php 
        //echo Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]);
    ?>
    <?= $content ?>
</div>
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Reserva de Salas</p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
