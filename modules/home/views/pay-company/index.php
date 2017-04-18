<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\home\models\PayCompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '支付公司';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pay-company-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增支付公司', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'pay_plate_name',
            'name:ntext',

            ['label'=>'有无执照','value'=>function($model){
                return empty($model->license) ? '无' : '有';
            }],

            ['label'=>'合作级别','value'=>function($model){
                return $model['gradeLabel'][$model->grade];
            }],

            ['label'=>'联系人', 'format'=>'html', 'value' => function($model){
                return '<a href="'.Url::to(['/home/contact-user/index','company_id'=>$model->id]).'">联系人列表</a>';
            }],

            ['label'=>'支付日志', 'format'=>'html', 'value' => function($model){
                return '<a href="'.Url::to(['/home/pay-channel/index','company_id'=>$model->id]).'">进入</a>';
            }],

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>
</div>
