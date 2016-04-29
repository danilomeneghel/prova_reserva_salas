<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SalaBusca */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Salas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Adicionar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'idSala',
                'value' => 'nro_sala'
            ],
            [
                'attribute' => 'tipo',
                'filter' => array(0 => "Renião", 1 => "Evento"),
                'value' => function ($data) {
                            return ($data->tipo == 0) ? "Reunião" : "Evento";
                           }
            ],
            [
                'attribute' => 'ativo',
                'filter' => array(0 => "Não", 1 => "Sim"),
                'value' => function ($data) {
                            return ($data->ativo == 0) ? "Não" : "Sim";
                           }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
