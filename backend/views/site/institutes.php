<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Utils;
use common\models\Institutes;
use frontend\models\LookupData;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BatchDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Institutes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="batch-details-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Institute', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'company_name',
            [
            'attribute'=>'business_type',
            'content'=>function($data){
            	return Utils::getLookupdataVal($data->business_type);
            },
            'filter'=>LookupData::getDropdownDetails(7,1),
            ],
            'sub_users',
            'email',
            'sender_id',
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

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view}',
             ],
        ],
    ]); ?>
</div>
