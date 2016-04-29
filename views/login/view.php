<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Login */

$this->title = 'Visualizar Login: ' . $model->idLogin;
$this->params['breadcrumbs'][] = ['label' => 'Logins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idLogin' => $model->idLogin, 'idUsuario' => $model->idUsuario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idLogin' => $model->idLogin, 'idUsuario' => $model->idUsuario], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-user"></i> Dados do Login</h4></div>
        <div class="panel-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'idLogin',
                    'idUsuario',
                    'usuario',
                    [
                        'attribute' => 'nivel',
                        'value' => $nivel,
                    ],
                    [
                        'attribute' => 'ativo',
                        'value'=> ($model->ativo == 0) ? 'Não' : 'Sim',
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>
