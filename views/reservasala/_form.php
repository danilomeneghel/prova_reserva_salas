<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Usuario;
use app\models\Sala;

/* @var $this yii\web\View */
/* @var $model app\models\ReservaSala */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="login-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-user"></i> Dados da Reserva de Sala</h4></div>
        <div class="panel-body">
            
                <div class="row">
                    <div class="col-sm-4">
                        <?= $form->field($model, 'idUsuario')->dropDownList(ArrayHelper::map(Usuario::find()->all(), 'idUsuario', 'nome'))->label("Nome") ?>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-sm-4">
                        <?= $form->field($model, 'idSala')->dropDownList(ArrayHelper::map(Sala::find()->all(), 'idSala', 'nro_sala'))->label("Nro Sala") ?>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-4">
                        <?= $form->field($model, 'periodo')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <?= $form->field($model, 'duracao')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
    
        </div>
    </div>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Adicionar' : 'Alterar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
