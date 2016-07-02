<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\BatchDetails */

$this->title = 'Create Batch Details';
$this->params['breadcrumbs'][] = ['label' => 'Batch Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="batch-details-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
