<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\ActiveForm;
use app\assets\AppAsset;

AppAsset::register($this);
$this->title = 'Login';
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
    <body class="bg-login">
        <?php $this->beginBody() ?>
        <div class="login">
            <div class="login-box">
                <div class="titulo-sistema">Reserva de Salas</div>
                <div class="login-box-form">
                    <div class="titulo-login">Login de Acesso</div>
                    <?php
                    $form = ActiveForm::begin([
                                'id' => 'login-form',
                                'options' => ['class' => 'form-horizontal'],
                                'fieldConfig' => [
                                    'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                                    'labelOptions' => ['class' => 'col-lg-1 control-label'],
                                ],
                    ]);
                    ?>
                    <?= $form->field($model, 'username') ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                    <div class="form-group">
                        <div class="col-lg-1 control-label"></div>
                        <div class="col-lg-offset-1 col-lg-3">
                            <?= Html::submitButton('Entrar', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
