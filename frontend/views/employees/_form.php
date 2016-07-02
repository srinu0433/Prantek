<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Utils;
use frontend\models\LookupData;

/* @var $this yii\web\View */
/* @var $model frontend\models\Employees */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
/*#employees-gender{display:inline-block;}*/
#employees-gender label {padding-right:15px;}
</style>
<div class="employees-form">
<?php $inst_id = \Yii::$app->user->identity->institute_id; ?>
    <?php $form = ActiveForm::begin([
							'id' => 'employee-form',
							'options'=>[ 'enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'emp_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'f_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'l_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->radioList(Utils::getGengersList()); ?>
    
    <?= $form->field($model, 'dob')->widget(\yii\jui\DatePicker::classname(), [
    'language' => 'en',
    'dateFormat' => 'yyyy-MM-dd',
    'clientOptions' => [
    	'changeMonth'=>true,
    	'changeYear'=>true,
    ],
]) ?>
    
    <?= $form->field($model, 'hire_date')->widget(\yii\jui\DatePicker::classname(), [
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

    <?= 
    $form->field($model, 'emp_type')->dropDownList(
    		LookupData::getDropdownDetails(8, $inst_id),
    		['prompt'=>'Select']);
    ?>

    <?= 
    $form->field($model, 'designation')->dropDownList(
    		LookupData::getDropdownDetails(1, $inst_id),
    		['prompt'=>'Select']);
    ?>
    
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aadhar')->textInput(['maxlength' => true]) ?>

   	<?= $form->field($model, 'address')->textarea(['maxlength' => true]); ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pincode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'annual_salary')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'monthly_salary')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo')->fileInput(); ?>

    <?= $form->field($model, 'id_proof')->fileInput(); ?>

    <?= $form->field($model, 'address_proof')->fileInput(); ?>

    <?php echo 
    	$form->field($model, 'status')->dropDownList(
    		Utils::getStatusArr(),
    		['prompt'=>'Select']);
    ?>
    
    <?= $form->field($model, 'bank_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'account_name')->dropDownList(
    		Utils::getBankAccountTypeArr(),
    		['prompt'=>'Select']); ?>

    <?= $form->field($model, 'account_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'branch')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ifsc_code')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
