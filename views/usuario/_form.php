<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-home"></i> Dados do Usuário</h4></div>
        <div class="panel-body">
            <div class="form-group">
                <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <?= $form->field($model, 'sexo')->radioList(array("m" => "Masculino", "f" => "Feminino")) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <?= $form->field($model, 'cargo')->textInput() ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <?= $form->field($model, 'setor')->textInput() ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Email</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-emails', // required: css class selector
                'widgetItem' => '.item-email', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-email', // css class
                'deleteButton' => '.remove-email', // css class
                'model' => $modelsEmail[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'email',
                ],
            ]); ?>

            <div class="container-emails">
            <?php foreach ($modelsEmail as $i => $modelEmail): ?>
                <div class="item-email">
                        <div class="pull-right">
                            <button type="button" class="add-email btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-email btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                        <?php
                            if (! $modelEmail->isNewRecord) {
                                echo Html::activeHiddenInput($modelEmail, "[{$i}]idUsuarioEmail");
                            }
                        ?>
                        <?= $form->field($modelEmail, "[{$i}]email")->textInput(['maxlength' => true]) ?>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-2">
            <?= $form->field($model, 'ativo')->dropDownList(array(0=>'Não', 1=>'Sim')) ?>
        </div>
    </div>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Adicionar' : 'Alterar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
