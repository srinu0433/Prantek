<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\BatchDetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="batch-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'batch_no') ?>

    <?= $form->field($model, 'mode_of_training') ?>

    <?= $form->field($model, 'training_program') ?>

    <?= $form->field($model, 'time') ?>

    <?php // echo $form->field($model, 'trainer') ?>

    <?php // echo $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'modified_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
