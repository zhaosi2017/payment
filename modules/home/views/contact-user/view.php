<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\home\models\ContactUser */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Contact Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'name',
            'remark:ntext',
            'pay_company_id',
            'contact_role_id',
        ],
    ]) ?>

</div>
