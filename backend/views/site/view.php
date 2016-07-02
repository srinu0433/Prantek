<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Utils;
/* @var $this yii\web\View */
/* @var $model frontend\models\BatchDetails */

$this->title = $model->institute->company_name;
$this->params['breadcrumbs'][] = ['label' => 'Institutes', 'url' => ['institutes']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="batch-details-view">

    <h1><?= Html::encode($this->title) ?></h1>
<?php /*
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
*/?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            [
            	'label'=>'Company Name',
            	'value'=>$model->institute->company_name,
            ],
            [
            	'label'=>'Business Type',
            	'value'=>Utils::getLookupdataVal($model->institute->business_type),
            ],
            [
            'label'=>'Sub Users',
            'value'=>$model->institute->sub_users,
            ],
            [
            'label'=>'Email',
            'value'=>$model->institute->email,
            ],
            [
            'label'=>'Phone',
            'value'=>$model->institute->phone,
            ],
            [
            'label'=>'SMS Credits',
            'value'=>$model->institute->sms_credits,
            ],
            [
            'label'=>'Sender Id',
            'value'=>$model->institute->sender_id,
            ],
            [
            'label'=>'Start Date',
            'value'=>$model->institute->start_date,
            ],
            [
            'label'=>'End Date',
            'value'=>$model->institute->end_date,
            ],
            [
            'label'=>'Logo',
            'value'=>$model->institute->logo,
            ],
            [
            'label'=>'Logo Display',
            'value'=>Utils::getLogoDisplayVal($model->institute->logo_display),
            ],
            [
            'label'=>'Address',
            'value'=>$model->institute->address,
            ],
            [
            'label'=>'Mobile',
            'value'=>$model->institute->mobile,
            ],
            [
            'label'=>'Alternative Mobile',
            'value'=>$model->institute->mobile2,
            ],
            [
            'label'=>'Alternative Phone',
            'value'=>$model->institute->phone2,
            ],
            [
            'label'=>'Alternative Email',
            'value'=>$model->institute->email2,
            ],
            [
            'label'=>'Website',
            'value'=>$model->institute->website,
            ],
            [
            'label'=>'Created Date',
            'value'=>$model->institute->created_date,
            ],
            [
            'label'=>'Modified Date',
            'value'=>$model->institute->modified_date,
            ],
        ],
    ]) ?>

</div>
