<?php


/* @var $this yii\web\View */
/* @var $model app\modules\home\models\PayChannel */

$this->title = '编辑支付渠道: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '支付渠道', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '编辑';
?>
<div class="pay-channel-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
