<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\home\models\PayChannelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '支付日志';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pay-channel-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('增加接入', ['create','company_id'=>Yii::$app->request->get('company_id')], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name:ntext',
            'source_company:ntext',
//            'status',

            ['header'=>'接入情况', 'format'=>'html', 'value'=>function($model){
                return $model->remark;
            }],

            'access_amount',
            ['header'=>'接入时间', 'value'=>function($model){
                return date('Y-m-d H:i:s', $model->access_time);
            }],

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template' => '{update} {switch}',
                'buttons' => [
                    'switch' => function($url, $model){
                        $btn_link = '';
                        switch ($model->status){
                            case 0:
                                $btn_link = Html::a('停止接入',
                                    $url . '&status=1',
                                    [
                                        'style' => 'color:red',
                                        'data-method' => 'post',
                                        'data' => ['confirm' => '你确定要停止接入吗?']
                                    ]);
                                break;
                            case 1:
                                $btn_link = Html::a('恢复接入',
                                    $url . '&status=0',
                                    [
                                        'data-method' => 'post',
                                        'data' => ['confirm' => '你确定要恢复接入吗?']
                                    ]);
                                break;
                        }
                        return $btn_link;
                    },
                ],
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
