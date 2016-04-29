<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Usuarioemail */

$this->title = 'Create Usuarioemail';
$this->params['breadcrumbs'][] = ['label' => 'Usuarioemails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarioemail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
