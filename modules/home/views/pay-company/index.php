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
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'pager'=>[
            //'options'=>['class'=>'hidden']//关闭自带分页
            'firstPageLabel'=>"首页",
            'prevPageLabel'=>'上一页',
            'nextPageLabel'=>'下一页',
            'lastPageLabel'=>'末页',
            'maxButtonCount' => 9,
        ],
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'pay_plate_name',
            'name:ntext',

            'support_channel:ntext',

            'market_info:ntext',

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
    <?php Pjax::end(); ?>
</div>
