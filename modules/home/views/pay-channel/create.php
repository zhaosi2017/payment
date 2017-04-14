<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\home\models\PayChannel */

$this->title = '创建支付渠道';
$this->params['breadcrumbs'][] = ['label' => '支付渠道', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pay-channel-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
