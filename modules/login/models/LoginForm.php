<?php

namespace app\modules\login\models;

use app\modules\user\models\LoginLogs;
use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $code;
    private $identity = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password','code'], 'required'],
            ['username', 'validateAccount'],
            ['password', 'validatePassword'],
            ['code', 'captcha', 'message'=>'验证码输入不正确，请重新输入！3次输入错误，账号将被锁定1年！', 'captchaAction'=>'/login/default/captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'password' => '密码',
            'code'     => '验证码',
        ];
    }


    public function validateAccount($attribute)
    {
        if (!$this->hasErrors()) {
            $identity = $this->getIdentity();
            if(!$identity){
                $this->addError($attribute, '用户名不存在。');
            }else{
                if($identity->login_permission==1 || !$identity->password){
                    $this->addError($attribute, '当前用户无权登录该系统。');
                }
            }

        }
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     */
    public function validatePassword($attribute)
    {
        if (!$this->hasErrors()) {
            $identity = $this->getIdentity();

            if (!Yii::$app->getSecurity()->validatePassword($this->password, $identity->password)) {
                $this->addError($attribute, '密码错误。');
            }

        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        return Yii::$app->user->login($this->getIdentity());
    }

    public function preLogin()
    {
        if($this->validate(['username','password'])){
            return true;
        }
        return false;
    }

    public function getIdentity()
    {
        if($this->identity === false){
            $accounts = User::find()->select(['id','account'])->indexBy('account')->column();
            foreach ($accounts as $account => $id){
                $this->username == Yii::$app->security->decryptByKey(base64_decode($account),Yii::$app->params['inputKey'])
                && $this->identity = User::findOne(['id'=>$id]);
            }
            //$this->identity = User::findOne(['account' => $this->username]);
        }

        return $this->identity;
    }


}
