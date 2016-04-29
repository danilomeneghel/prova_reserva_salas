<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Login */

$this->title = 'Alterar Sala: ' . ' ' . $model->idSala;
$this->params['breadcrumbs'][] = ['label' => 'Salas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idSala, 'url' => ['view', 'idSala' => $model->idSala]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="login-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
