<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReservaSalaBusca */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reserva de Salas';
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
                'attribute' => 'idUsuario',
                'value' => 'usuario'
            ],
            [
                'attribute' => 'idSala',
                'value' => 'nro_sala'
            ],
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
