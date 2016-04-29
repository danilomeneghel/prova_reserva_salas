<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LoginBusca */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Logins';
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
                'attribute' => 'nivel',
                'filter' => array(1 => "Administrador", 2 => "Gerente", 3 => "Usuário"),
                'value' => function ($data){
                            return ($data->nivel == 1) ? "Administrador" : ($data->nivel == 2 ? "Gerente" : "Usuário");
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
