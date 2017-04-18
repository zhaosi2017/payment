<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\home\models\ContactUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contact-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pay_company_id')->hiddenInput(['value'=>Yii::$app->request->get('company_id')])->label(false) ?>

    <?= $form->field($model, 'contact_role_id')->hiddenInput(['value'=>Yii::$app->request->get('role_id')])->label(false) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

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
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
