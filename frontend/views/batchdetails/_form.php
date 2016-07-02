<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Utils;
use frontend\models\LookupData;
/* @var $this yii\web\View */
/* @var $model frontend\models\BatchDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="batch-details-form">
<?php $inst_id = \Yii::$app->user->identity->institute_id; ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'batch_no')->textInput(['maxlength' => true]) ?>

    <?= 
    $form->field($model, 'mode_of_training')->dropDownList(
    		LookupData::getDropdownDetails(3, $inst_id),
    		['prompt'=>'Select']);
    ?>

    <?= 
    $form->field($model, 'training_program')->dropDownList(
    		LookupData::getDropdownDetails(2, $inst_id),
    		['prompt'=>'Select']);
    ?>

    <?= 
    $form->field($model, 'session_time')->dropDownList(
    		LookupData::getDropdownDetails(4, $inst_id),
    		['prompt'=>'Select']);
    ?>
    
    <?= $form->field($model, 'trainer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>

	<?php echo 
    	$form->field($model, 'status')->dropDownList(
    		Utils::getStatusArr(),
    		['prompt'=>'Select']);
    ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
