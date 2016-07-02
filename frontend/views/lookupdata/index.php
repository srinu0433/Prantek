<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Utils;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\LookupDataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lookup Data';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-data-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lookup Data', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            /*[
            'attribute'=>'institute_id',
            'content'=>function($data){
            	return Utils::getInstituteName($data->institute_id);
            },
            'filter'=>Utils::getAllInstitutes(),
            ],*/
            [
            'attribute'=>'drop_down',
            'content'=>function($data){
            	return Utils::getDropdownName($data->drop_down);
            },
            'filter'=>Utils::getAllDropDowns(),
            ],
            'dd_value',
            [
            'attribute'=>'status',
            'content'=>function($data){
            	return Utils::getStatusVal($data->status);
            },
            'filter'=>Utils::getStatusArr(),
            ],
            // 'created_date',
            // 'modified_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
