<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Utils;
use frontend\models\LookupData;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model frontend\models\Employees */

$this->title = $model->emp_id;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employees-view">

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
            'emp_id',
            'f_name',
            //'institute_id',
            'l_name',
            [
            'attribute'=>'gender',
            'value'=>Utils::getGender($model->gender),
            ],
            'dob',
            'hire_date',
            'end_date',
            [
            'attribute'=>'emp_type',
            'value'=>Utils::getLookupdataVal($model->emp_type),
            ],
            [
            'attribute'=>'designation',
            'value'=>Utils::getLookupdataVal($model->designation),
            ],
            'phone',
            'mobile',
            'email:email',
            'aadhar',
            'address',
            'city',
            'state',
            'country',
            'pincode',
            'annual_salary',
            'monthly_salary',
            [
            'attribute'=>'photo',
            'value'=>Url::base().'/'.$model->photo,
            'format' => ['image',['width'=>'100','height'=>'100']],
            ],
            [
            'attribute'=>'id_proof',
            'value'=>Url::base().'/'.$model->id_proof,
            'format' => ['image',['width'=>'100','height'=>'100']],
            ],
            [
            'attribute'=>'address_proof',
            'value'=>Url::base().'/'.$model->address_proof,
            'format' => ['image',['width'=>'100','height'=>'100']],
            ],
            'bank_name',
            [
            'attribute'=>'account_name',
            'value'=>Utils::getBankAccountTye($model->account_name),
            ],
            'account_number',
            'branch',
            'ifsc_code',
            'created_date',
            'modified_date',
        ],
    ]) ?>

</div>
