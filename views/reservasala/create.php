<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ReservaSala */

$this->title = 'Adicionar Reserva de Sala';
$this->params['breadcrumbs'][] = ['label' => 'Reserva de Salas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php 
        if(!empty($error)) { 
            echo '<div class="alert alert-danger">' . $error . '</div>';
        } 
    ?>
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
