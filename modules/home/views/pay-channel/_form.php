<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\home\models\PayChannel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pay-channel-form">

    <?php $form = ActiveForm::begin([
        'options'=>['class'=>'form-horizontal m-t'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-sm-10\">{input}\n<span class=\"help-block m-b-none\">{error}</span></div>",
            'labelOptions' => ['class' => 'col-sm-2 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'pay_company_id')->hiddenInput(['value' => Yii::$app->request->get('company_id')])->label(false) ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'source_company')->textInput() ?>

    <?= $form->field($model, 'access_amount')->textInput() ?>

    <?= $form->field($model, 'remark')->widget(\yii\redactor\widgets\Redactor::className(),[
        'clientOptions' => [
            'lang' => 'zh_cn',
            'imageUpload' => false,
            'fileUpload' => false,
            'plugins' => [
                'clips',
                'fontcolor'
            ],
            'placeholder'=>'',
            'maxlength'=>500
        ]
    ]) ?>

    <div class="form-group">
        <div class="col-sm-6 col-sm-offset-2">
            <?= Html::submitButton($model->isNewRecord ? '添加' : '更新', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
