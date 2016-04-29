<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Sala;

/* @var $this yii\web\View */
/* @var $model app\models\Login */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="login-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-user"></i> Dados da Sala</h4></div>
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-4">
                    <?= $form->field($model, 'nro_sala')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-2">
                    <?= $form->field($model, 'tipo')->dropDownList(array(0 => 'Reunião', 1 => 'Evento')) ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-2">
                    <?= $form->field($model, 'ativo')->dropDownList(array(0 => 'Não', 1 => 'Sim')) ?>
                </div>
            </div>

        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Adicionar' : 'Alterar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
