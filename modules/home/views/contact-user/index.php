<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\home\models\ContactUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '联系人列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-user-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建角色', ['/home/contact-role/create','company_id'=>Yii::$app->request->get('company_id')], ['class' => 'btn btn-success']) ?>
        <?= Html::a('角色列表', ['/home/contact-role/index','company_id'=>Yii::$app->request->get('company_id')], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',

            ['label'=>'联系方式', 'format'=>'html', 'value' => function($model){
                return $model->remark;
            }],

            ['label'=>'所属公司', 'format'=>'html', 'value' => function($model){
                return $model['company']['name'];
            }],

            ['label'=>'角色', 'format'=>'html', 'value' => function($model){
                return $model['role']['name'];
            }],

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
