<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
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
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'pay_plate_name',
            'name:ntext',

            ['label'=>'有无执照','value'=>function($model){
                return $model->is_license==0 ? '无' : '有';
            }],

            ['label'=>'合作级别','value'=>function($model){
                return $model['gradeLabel'][$model->grade];
            }],

            'control_user',

            ['label'=>'合作支付渠道','value' => function($model){

                $name = '';
                foreach ($model['channel'] as $item){
                    $name .= $item['name'] .' ';
                }
                return $name;
            }],

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
