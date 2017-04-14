<?php

namespace app\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class GController extends Controller
{
    public $layout = '@app/views/layouts/global';

    /**
     * @inheritdoc
     */

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
//                'only' => ['logout','index','rate','sent-index','wait-index','received-index','root-set','summary','ip-lock','record'],
                'rules' => [
                    [
                        'actions' => ['delete'],
                        'allow' => false,
                    ],
                    [
                        'allow' => true,
                        'actions' => ['entry','captcha','code','get-push-data'],
                        'roles' => ['?'],
                    ],
                    [
//                        'actions' => ['logout',],
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @param \yii\base\Action $action
     * @return bool
     */
    public function beforeAction($action)
    {
        $this->layout = '@app/views/layouts/right';
        return parent::beforeAction($action);

    }

    /**
     * @param array $response
     */
    public function ajaxResponse($response = ['code'=>0, 'msg'=>'操作成功', 'data'=>[]])
    {
        header('Content-Type: application/json');
        exit(json_encode($response, JSON_UNESCAPED_UNICODE));
    }

}
