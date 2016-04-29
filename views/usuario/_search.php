<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioBusca */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idUsuario') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'sexo') ?>
    
    <?= $form->field($model, 'cargo') ?>
    
    <?= $form->field($model, 'setor') ?>

    <?php // echo $form->field($model, 'ativo') ?>

    <?php // echo $form->field($model, 'dataCriacao') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
