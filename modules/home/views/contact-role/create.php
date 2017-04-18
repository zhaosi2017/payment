<?php

//use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\home\models\ContactRole */

$this->title = '创建角色';
$this->params['breadcrumbs'][] = ['label' => '联系人角色', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-role-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
