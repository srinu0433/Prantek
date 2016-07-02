<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\LookupData */

$this->title = 'Update Lookup Data: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lookup Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lookup-data-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
