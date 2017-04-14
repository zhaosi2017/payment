<?php

namespace app\modules\login\controllers;

use yii\helpers\Url;
use app\modules\login\models\LoginForm;
use yii;
use app\controllers\GController;

/**
 * Default controller for the `login` module
 */
class DefaultController extends GController
{

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'height' => 35,
                'width' => 80,
                'minLength' => 4,
                'maxLength' => 4
            ],
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionEntry()
    {
        $this->layout = '@app/views/layouts/global';
        $homeUrl = Url::to(['/home/default/index']);
        if (!Yii::$app->user->isGuest) {
            $this->redirect($homeUrl);
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post())) {

            //禁用拦截
//            $forbidden = $model->forbidden();
            $forbidden = false;

            if($forbidden){
//                return $this->render('locked',$forbidden);
            }else{
                if($model->preLogin()){
                    $email = $model->getIdentity()->email;

                    $verifyCode = Yii::createObject('yii\captcha\CaptchaAction', ['__captcha', $this])->getVerifyCode();

                    return $this->render('code',['model' => $model,'email'=>$email,'vcode'=>$verifyCode]);
                }

            }

        }
        return $this->render('entry', [
            'model' => $model,
        ]);
    }


    public function actionCode()
    {
        // $verifyCode = Yii::createObject('yii\captcha\CaptchaAction', ['__captcha', $this])->getVerifyCode();
        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post())) {
            $captcha = $this->createAction('captcha');
            if($captcha->validate($model->code, false)){
                if($model->login()){
                    $homeUrl = Url::to(['/home/default/index']);
                    return $this->redirect($homeUrl);
                }
            }else{
                $model->addError('code','验证码输入不正确，请重新输入！3次输入错误，账号将被锁定1年！');
            }
        }
        return $this->render('code',['model'=>$model]);
    }


    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(Url::to(['/login/default/entry']));
    }


}
