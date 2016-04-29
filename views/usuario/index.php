<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioBusca */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuários';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-index">

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
            'nome',
            [
                'attribute' => 'sexo',
                'filter' => array("m" => "Masculino", "f" => "Feminino"),
                'value' => function ($data) {
                            return ($data->sexo == "m") ? "Masculino" : "Feminino";
                           }
            ],
            'cargo',
            'setor',
            [
                'attribute' => 'ativo',
                'filter' => array(0 => "Não", 1 => "Sim"),
                'value' => function ($data) {
                            return ($data->ativo == 0) ? "Não" : "Sim";
                           }
            ],
            [
                'attribute' => 'dataCriacao',
                /*'filter' => DatePicker::widget([
                    'attribute' => 'dataCriacao',
                    'language' => 'pt', 
                    'model' => $searchModel,
                    'dateFormat' => 'dd-MM-yyyy',
                ]),*/
                'format' => ['datetime', 'php:d-m-Y'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
