<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ReservaSala */

$this->title = 'Visualizar Reserva de Sala: ' . $model->idReservaSala;
$this->params['breadcrumbs'][] = ['label' => 'Reserva de Salas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idReservaSala' => $model->idReservaSala, 'idUsuario' => $model->idUsuario, 'idSala' => $model->idSala], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idReservaSala' => $model->idReservaSala, 'idUsuario' => $model->idUsuario, 'idSala' => $model->idSala], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-user"></i> Dados da Reserva de Sala</h4></div>
        <div class="panel-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'idReservaSala',
                    'idUsuario',
                    'idSala',
                    'periodo',
                    'duracao'
                ],
            ]) ?>
        </div>
    </div>
</div>
