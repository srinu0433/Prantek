<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use common\models\Utils;
use common\models\Institutes;
/* @var $this yii\web\View */
/* @var $model frontend\models\BatchDetails */

$this->title = $model->company_name;
$this->params['breadcrumbs'][] = ['label' => 'Institutes', 'url' => ['institutes']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="batch-details-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Update', ['profileupdate'], ['class' => 'btn btn-primary']) ?>
        <?php /* echo Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */ ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            [
            	'label'=>'Company Name',
            	'value'=>$model->company_name,
            ],
            [
            	'label'=>'Business Type',
            	'value'=>Utils::getLookupdataVal($model->business_type),
            ],
            [
            'label'=>'Sub Users',
            'value'=>$model->sub_users,
            ],
            [
            'label'=>'Email',
            'value'=>$model->email,
            ],
            [
            'label'=>'Phone',
            'value'=>$model->phone,
            ],
            [
            'label'=>'SMS Credits',
            'value'=>$model->sms_credits,
            ],
            [
            'label'=>'Sender Id',
            'value'=>$model->sender_id,
            ],
            [
            'label'=>'Start Date',
            'value'=>$model->start_date,
            ],
            [
            'label'=>'End Date',
            'value'=>$model->end_date,
            ],
            [
            'attribute'=>'Logo',
            'value'=>Url::base().'/'.$model->logo,
            'format' => ['image',['width'=>'100','height'=>'100']],
            ],
            [
            'label'=>'Logo Display',
            'value'=>Utils::getLogoDisplayVal($model->logo_display),
            ],
            [
            'label'=>'Address',
            'value'=>$model->address,
            ],
            [
            'label'=>'Mobile',
            'value'=>$model->mobile,
            ],
            [
            'label'=>'Alternative Mobile',
            'value'=>$model->mobile2,
            ],
            [
            'label'=>'Alternative Phone',
            'value'=>$model->phone2,
            ],
            [
            'label'=>'Alternative Email',
            'value'=>$model->email2,
            ],
            [
            'label'=>'Website',
            'value'=>$model->website,
            ],
            [
            'label'=>'Created Date',
            'value'=>$model->created_date,
            ],
            [
            'label'=>'Modified Date',
            'value'=>$model->modified_date,
            ],
        ],
    ]) ?>

</div>
