<?php


/* @var $this yii\web\View */
/* @var $model app\modules\home\models\PayCompany */

$this->title = '编辑公司: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '支付公司', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="pay-company-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
