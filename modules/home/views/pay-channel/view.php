<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\home\models\PayChannel */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '支付渠道', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pay-channel-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定删除?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name:ntext',
            'source_company:ntext',
            'status',
        ],
    ]) ?>

</div>
