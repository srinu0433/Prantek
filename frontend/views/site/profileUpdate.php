<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\jui\DatePicker;
use common\models\Utils;

$this->title = 'Update: ' . $model->company_name;
$this->params['breadcrumbs'][] = ['label' => 'Profile', 'url' => ['profile']];
$this->params['breadcrumbs'][] = 'Update';

?>
<style>
#institutes-logo_display .radio{display:inline-block;}
#institutes-logo_display .radio label {padding-right:15px;}
</style>
<div class="profile-update">

    <h1><?= Html::encode($this->title) ?></h1>
<div class="profile-form">

    <?php $form = ActiveForm::begin([
							'id' => 'update-profile',
							'options'=>[ 'enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'logo')->fileInput(); ?>
    
    <?= $form->field($model, 'logo_display')->radioList(Utils::getLogoDisplayArr()); ?>

    <?= $form->field($model, 'address')->textarea(); ?>
    
    <?= $form->field($model, 'mobile')->textInput() ?>
    
    <?= $form->field($model, 'mobile2')->textInput() ?>
    
    <?= $form->field($model, 'phone2')->textInput() ?>
    
    <?= $form->field($model, 'email2')->textInput() ?>
    
    <?= $form->field($model, 'website')->textInput() ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>