<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LoginBusca */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="login-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idLogin') ?>

    <?= $form->field($model, 'idUsuario') ?>

    <?= $form->field($model, 'usuario') ?>

    <?= $form->field($model, 'senha') ?>

    <?= $form->field($model, 'nivel') ?>

    <?php // echo $form->field($model, 'ativo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
