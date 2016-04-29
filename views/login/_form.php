<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Usuario;

/* @var $this yii\web\View */
/* @var $model app\models\Login */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="login-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-user"></i> Dados do Login</h4></div>
        <div class="panel-body">
            
                <div class="row">
                    <div class="col-sm-4">
                        <?= $form->field($model, 'idUsuario')->dropDownList(ArrayHelper::map(Usuario::find()->all(), 'idUsuario', 'nome'))->label("Nome") ?>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-4">
                        <?= $form->field($model, 'usuario')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <?= $form->field($model, 'senha')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2">
                        <?= $form->field($model, 'nivel')->dropDownList(array(1=>'Administrador', 2=>'Gerente', 3=>'Usuário')) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2">
                        <?= $form->field($model, 'ativo')->dropDownList(array(0=>'Não', 1=>'Sim')) ?>
                    </div>
                </div>
    
        </div>
    </div>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Adicionar' : 'Alterar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
