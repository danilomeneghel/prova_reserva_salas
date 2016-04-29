<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Login */

$this->title = 'Alterar Login: ' . ' ' . $model->idLogin;
$this->params['breadcrumbs'][] = ['label' => 'Logins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idLogin, 'url' => ['view', 'idLogin' => $model->idLogin, 'idUsuario' => $model->idUsuario]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="login-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
