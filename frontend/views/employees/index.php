<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Utils;
use frontend\models\LookupData;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\EmployeesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employees-index">
<?php $inst_id = \Yii::$app->user->identity->institute_id; ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Employees', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'emp_id',
            'f_name',
            //'institute_id',
            //'l_name',
            [
            'attribute'=>'gender',
            'content'=>function($data){
            	return Utils::getGender($data->gender);
            },
            'filter'=>Utils::getGengersList(),
            ],
            // 'dob',
            // 'hire_date',
            // 'end_date',
            [
            'attribute'=>'emp_type',
            'content'=>function($data){
            	return Utils::getLookupdataVal($data->emp_type);
            },
            'filter'=>LookupData::getDropdownDetails(8, $inst_id),
            ],
            [
            'attribute'=>'designation',
            'content'=>function($data){
            	return Utils::getLookupdataVal($data->designation);
            },
            'filter'=>LookupData::getDropdownDetails(1, $inst_id),
            ],
            // 'phone',
             'mobile',
            'email:email',
            // 'aadhar',
            // 'address',
            // 'city',
            // 'state',
            // 'country',
            // 'pincode',
            // 'annual_salary',
            // 'monthly_salary',
            // 'photo',
            // 'id_proof',
            // 'address_proof',
            // 'bank_name',
            // 'account_name',
            // 'account_number',
            // 'branch',
            // 'ifsc_code',
            // 'created_date',
            // 'modified_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
