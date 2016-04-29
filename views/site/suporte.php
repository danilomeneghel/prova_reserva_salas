<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Suporte';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-user"></i> Suporte</h4></div>
        <div class="panel-body">
        
            <?php if (Yii::$app->session->hasFlash('suporteForm')): ?>
            
            <div class="alert alert-success">
                Obrigado por entrar em contato. <br>Iremos retornar assim que possível.
            </div>

            <?php else: ?>

            <p>
                Se você tiver dúvidas ou problemas no sistema, por favor preencha os seguintes campos para entrar em contato conosco.
            </p>

            <div class="row">
                <div class="col-lg-5">

                    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                        <?= $form->field($model, 'nome') ?>

                        <?= $form->field($model, 'email') ?>

                        <?= $form->field($model, 'assunto') ?>

                        <?= $form->field($model, 'mensagem')->textArea(['rows' => 6]) ?>

                        <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                        ]) ?>

                        <div class="form-group">
                            <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                        </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
    
            <?php endif; ?>
            
        </div>
    </div>
    
</div>
