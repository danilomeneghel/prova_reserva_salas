<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sala */

$this->title = 'Visualizar Sala: ' . $model->idSala;
$this->params['breadcrumbs'][] = ['label' => 'Salas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idSala], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idSala], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-user"></i> Dados da Sala</h4></div>
        <div class="panel-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'idSala',
                    'nro_sala',
                    [
                        'attribute' => 'tipo',
                        'value'=> ($model->tipo == 0) ? 'Reunião' : 'Evento',
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
