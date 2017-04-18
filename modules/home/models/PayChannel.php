<?php

namespace app\modules\home\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "pay_channel".
 *
 * @property integer $id
 * @property integer $pay_company_id
 * @property integer $access_amount
 * @property integer $access_time
 * @property string $name
 * @property string $remark
 * @property string $source_company
 * @property integer $status
 */
class PayChannel extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pay_channel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'source_company'], 'required'],
            [['name', 'source_company','remark'], 'string'],
            [['pay_company_id','access_amount','access_time'], 'integer'],
            [['status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '编号',
            'name' => '渠道名称',
            'source_company' => '源头公司',
            'remark' => '接入情况',
            'pay_company_id' => '合作公司',
            'status' => '状态',
            'access_amount' => '接入量',
        ];
    }

    /**
     * @inheritdoc
     * @return PayChannelQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PayChannelQuery(get_called_class());
    }

    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)){
            if($this->isNewRecord){
                $this->access_time = $_SERVER['REQUEST_TIME'];
            }
            return true;
        }
        return false;
    }
}
