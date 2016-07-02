<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\LookupData */

$this->title = 'Create Lookup Data';
$this->params['breadcrumbs'][] = ['label' => 'Lookup Data', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
