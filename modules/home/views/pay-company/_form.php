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

    <?= $form->field($model, 'support_channel')->textInput() ?>

    <?= $form->field($model, 'market_info')->textInput() ?>

    <?php //echo $form->field($model, 'is_license')->radioList([1=>'是', 0=>'否']) ?>

    <?= $form->field($model, 'grade')->dropDownList([1 => 'A',2 => 'B',3 => 'C',4 => 'D']) ?>

    <?= $form->field($model, 'license_number')->textInput() ?>

    <?php
        if(empty($model->license)){
    ?>

    <?= $form->field($model, 'file',
        [
            'template' => "{label}\n<div class=\"col-sm-10\">{input}
            \n<span class=\"help-block m-b-none\">(当前附件仅允许上传jpg, jpeg, png, bmp格式的图片，且仅限上传一个附件！)</span></div>"
        ])->fileInput(['class'=>'form-control'])->label('上传执照') ?>

    <?php }else{ ?>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="paycompany-file">执照</label>
            <div class="col-sm-10">
                <a target="_blank" href="<?php echo \yii\helpers\Url::to('@web/uploads/') . $model->license ?>">查看图片</a>
<!--                <img id="license-image" class="hide" src="--><?php //echo \yii\helpers\Url::to('@web/uploads/') . $model->license ?><!--">-->
            </div>
        </div>
    <?php } ?>
    <div class="form-group">
        <div class="col-sm-6 col-sm-offset-2">
            <?= Html::submitButton($model->isNewRecord ? '添加' : '更新', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
