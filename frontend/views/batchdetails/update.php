<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\BatchDetails */

$this->title = 'Update Batch Details: ' . $model->batch_no;
$this->params['breadcrumbs'][] = ['label' => 'Batch Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->batch_no, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="batch-details-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
