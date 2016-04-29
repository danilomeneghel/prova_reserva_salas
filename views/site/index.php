<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Reserva de Salas';
?>

<div class="row margem-painel-chart">
    <div class="col-md-6">
        <div class="panel panel-chart">
            <div class="panel-heading">Reserva de Salas</div>
            <div class="panel-body">
                <div class="canvas-wrapper painel-chart-view">
                    <canvas class="chart" id="pie-chart1" ></canvas>
                </div>
                <div class="painel-chart-texto">
                    <div>
                        Total de salas: 5 <br>
                        Total de usuários: 10
                    </div>
                    <div>
                        1M <?= Html::img('@web/img/icone_bola_verde.png'); ?>
                        2M <?= Html::img('@web/img/icone_bola_amarela.png'); ?>
                        1Y <?= Html::img('@web/img/icone_bola_vermelha.png'); ?>
                    </div>
                    <?= Html::submitButton('Ver Mais', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="display:block; height:190px"></div>
