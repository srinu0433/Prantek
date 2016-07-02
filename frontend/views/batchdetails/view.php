<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Utils;
use frontend\models\LookupData;
/* @var $this yii\web\View */
/* @var $model frontend\models\BatchDetails */

$this->title = $model->batch_no;
$this->params['breadcrumbs'][] = ['label' => 'Batch Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="batch-details-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'batch_no',
            [
            'attribute'=>'mode_of_training',
            'value'=>Utils::getLookupdataVal($model->mode_of_training),
            ],
            [
            		'attribute'=>'training_program',
            		'value'=>Utils::getLookupdataVal($model->training_program),
            ],
            [
            'attribute'=>'session_time',
            'value'=>Utils::getLookupdataVal($model->session_time),
            ],
            'trainer',
            'amount',
            [
            		'attribute'=>'status',
            		'value'=>Utils::getStatusVal($model->status),
            ],
            'created_date',
            'modified_date',
        ],
    ]) ?>

</div>
