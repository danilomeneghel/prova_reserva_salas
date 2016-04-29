<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ReservaSala */

$this->title = 'Alterar Reserva de Sala: ' . ' ' . $model->idReservaSala;
$this->params['breadcrumbs'][] = ['label' => 'Reserva de Salas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idReservaSala, 'url' => ['view', 'idReservaSala' => $model->idReservaSala, 'idUsuario' => $model->idUsuario, 'idSala' => $model->idSala]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="login-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
