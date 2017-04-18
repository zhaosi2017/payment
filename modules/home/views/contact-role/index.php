<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\home\models\ContactRoleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '角色列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-role-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建角色', ['create','company_id'=>Yii::$app->request->get('company_id')], ['class' => 'btn btn-success']) ?>
        <?= Html::a('联系人列表', ['/home/contact-user/index','company_id'=>Yii::$app->request->get('company_id')], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name:ntext',
            ['header'=>'所属公司', 'value'=>function($model){
                return $model['company']['name'];
            }],

            ['header'=>'操作', 'format'=>'html', 'value'=>function($model){
                return '<a href="'. Url::to(['/home/contact-user/create','role_id'=>$model->id, 'company_id'=>$model->pay_company_id]) .'">+联系人</a>';
            }],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
