<?php

//use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\home\models\ContactUser */

$this->title = '创建联系人';
$this->params['breadcrumbs'][] = ['label' => '联系人', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-user-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
