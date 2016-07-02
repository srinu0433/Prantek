<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Utils;
 
/* @var $this yii\web\View */
/* @var $model frontend\models\LookupData */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lookup-data-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo 
    $form->field($model, 'drop_down')->dropDownList(
    		Utils::getAllDropDowns(),
    		['prompt'=>'Select']);
    ?>

    <?= $form->field($model, 'dd_value')->textInput(['maxlength' => true]) ?>

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
