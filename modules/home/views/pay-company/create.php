<?php

/* @var $this yii\web\View */
/* @var $model app\modules\home\models\PayCompany */

$this->title = '新增支付公司';
$this->params['breadcrumbs'][] = ['label' => '支付公司', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pay-company-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
