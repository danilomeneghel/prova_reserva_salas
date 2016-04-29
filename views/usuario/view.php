<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = 'Visualizar Usuário: ' . $model->idUsuario;
$this->params['breadcrumbs'][] = ['label' => 'Usuários', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Alterar', ['update', 'id' => $model->idUsuario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->idUsuario], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Confirma a exclusão deste item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    
    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-home"></i> Dados do Usuário</h4></div>
        <div class="panel-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'idUsuario',
                    'nome',
                    [
                        'attribute' => 'sexo',
                        'value' => ($model->sexo == "m") ? "Masculino" : "Feminino",
                    ],
                    'cargo',
                    'setor',
                    [
                        'attribute' => 'ativo',
                        'value' => ($model->ativo == 0) ? "Não" : "Sim",
                    ],
                    [
                        'attribute' => 'dataCriacao',
                        'format' => ['date', 'php:d-m-Y H:i:s']
                    ]
                ],
            ]) ?>
        </div>
    </div>
    
    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Email</h4></div>
        <div class="panel-body">
            <table class="table table-striped table-bordered detail-view">
                <?php foreach ($model->usuarioEmails as $email): ?>
                <tr>
                    <td><?php echo $email->email; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
        
</div>
