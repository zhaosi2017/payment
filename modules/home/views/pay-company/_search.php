<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\home\models\PayCompanySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pay-company-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'pay_channel_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'is_license') ?>

    <?= $form->field($model, 'grade') ?>

    <?php // echo $form->field($model, 'control_user') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
