<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\Utils;
use frontend\models\LookupData;

$this->title = 'Create Institute';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to create new institute:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'password_repeat')->passwordInput() ?>
                <?= $form->field($model, 'company_name')->textInput() ?>
                <?= 
			    	$form->field($model, 'business_type')->dropDownList(
			    		LookupData::getDropdownDetails(7,1),
			    		['prompt'=>'Select']);
			    ?>
                <?= $form->field($model, 'sub_users')->textInput() ?>
                
                <?= $form->field($model, 'phone')->textInput() ?>
                <?= $form->field($model, 'start_date')->widget(\yii\jui\DatePicker::classname(), [
    'language' => 'en',
    'dateFormat' => 'yyyy-MM-dd',
                		'clientOptions' => [
                				'changeMonth'=>true,
                				'changeYear'=>true,
                		],
]) ?>
                <?= $form->field($model, 'end_date')->widget(\yii\jui\DatePicker::classname(), [
    'language' => 'en',
    'dateFormat' => 'yyyy-MM-dd',
                		'clientOptions' => [
                				'changeMonth'=>true,
                				'changeYear'=>true,
                		],
]) ?>
                <?= $form->field($model, 'sms_credits')->textInput() ?>
                <?= $form->field($model, 'sender_id')->textInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Create', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
