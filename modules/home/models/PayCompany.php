<?php

namespace app\modules\home\models;

#use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "pay_company".
 *
 * @property integer $id
 * @property string $pay_channel_id
 * @property string $pay_plate_name
 * @property string $name
 * @property integer $is_license
 * @property string $grade
 * @property string $control_user
 * @property string $contact
 * @property integer $status
 */
class PayCompany extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pay_company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'grade', 'control_user', 'pay_plate_name', 'pay_channel_id'], 'required'],
            [['is_license', 'status'], 'integer'],
            [['name','contact'], 'string'],
            [['grade', 'control_user'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '编号',
            'pay_channel_id' => '支付渠道',
            'pay_plate_name' => '支付平台名称',
            'name' => '支付公司名称',
            'is_license' => '有无执照',
            'grade' => '合作等级',
            'control_user' => '实际控制人',
            'contact' => '联系方式',
            'status' => '状态',
        ];
    }

    public function beforeSave($insert) {
        if($this->pay_channel_id) {
            $this->pay_channel_id = implode(',',$this->pay_channel_id);

        }
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    public function afterFind() {
        $this->pay_channel_id = explode(',',$this->pay_channel_id);
        parent::afterFind();
    }

    public function getGradeLabel()
    {
        return [1=>'A',2=>'B',3=>'C',4=>'D'];
    }

    /**
     * @inheritdoc
     * @return PayCompanyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PayCompanyQuery(get_called_class());
    }

    public function channelList()
    {
        $channel = PayChannel::find();
        return $channel->select(['name','id'])->indexBy('id')->column();
    }

    public function getChannel()
    {
        return $this->hasMany(PayChannel::className(),['id'=>'pay_channel_id']);
    }
}