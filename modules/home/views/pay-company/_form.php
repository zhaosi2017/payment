<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\home\models\PayCompany */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pay-company-form">

    <?php $form = ActiveForm::begin([
        'options'=>['class'=>'form-horizontal m-t'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-sm-10\">{input}\n<span class=\"help-block m-b-none\">{error}</span></div>",
            'labelOptions' => ['class' => 'col-sm-2 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'pay_plate_name')->textInput() ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'pay_channel_id')->checkboxList($model->channelList()) ?>

    <?= $form->field($model, 'is_license')->radioList([1=>'是', 0=>'否']) ?>

    <?= $form->field($model, 'grade')->dropDownList([1 => 'A',2 => 'B',3 => 'C',4 => 'D']) ?>

    <?= $form->field($model, 'control_user')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'contact')->textInput() ?>

    <div class="form-group">
        <div class="col-sm-6 col-sm-offset-2">
            <?= Html::submitButton($model->isNewRecord ? '添加' : '更新', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
