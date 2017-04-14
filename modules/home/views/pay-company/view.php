<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\home\models\PayCompany */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '支付公司', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pay-company-view">

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'pay_channel_id',
            'name:ntext',
            'is_license',
            'grade',
            'control_user',
            'status',
        ],
    ]) ?>

</div>
