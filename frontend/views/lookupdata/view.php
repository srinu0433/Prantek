<?php

use yii\helpers\Html;
use common\models\Utils;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\LookupData */

$this->title = $model->dd_value;
$this->params['breadcrumbs'][] = ['label' => 'Lookup Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-data-view">

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
            [
            'attribute'=>'institute_id',
            'value'=>Utils::getInstituteName($model->institute_id),
            ],
            [
            'attribute'=>'drop_down',
            'value'=>Utils::getDropdownName($model->drop_down),
            ],
            'dd_value',
            [
            'attribute'=>'status',
            'value'=>Utils::getStatusVal($model->status),
            ],
            'created_date',
            'modified_date',
        ],
    ]) ?>

</div>
