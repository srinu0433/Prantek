<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Utils;
use frontend\models\LookupData;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BatchDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Batch Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="batch-details-index">
<?php $inst_id = \Yii::$app->user->identity->institute_id; ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Batch Details', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'batch_no',
            [
            'attribute'=>'mode_of_training',
            'content'=>function($data){
            	return Utils::getLookupdataVal($data->mode_of_training);
            },
            'filter'=>LookupData::getDropdownDetails(3, $inst_id),
            ],
            [
            'attribute'=>'training_program',
            'content'=>function($data){
            	return Utils::getLookupdataVal($data->training_program);
            },
            'filter'=>LookupData::getDropdownDetails(2, $inst_id),
            ],
            [
            'attribute'=>'session_time',
            'content'=>function($data){
            	return Utils::getLookupdataVal($data->session_time);
            },
            'filter'=>LookupData::getDropdownDetails(4, $inst_id),
            ],
             'trainer',
             'amount',
             [
             'attribute'=>'status',
             'content'=>function($data){
             	return Utils::getStatusVal($data->status);
             },
             'filter'=>Utils::getStatusArr(),
             ],
            // 'created_by',
            // 'created_date',
            // 'modified_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
