<?php

namespace app\modules\home\models;

use yii\db\ActiveRecord;
/**
 * This is the model class for table "pay_channel".
 *
 * @property integer $id
 * @property string $name
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
            [['name', 'source_company'], 'string'],
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
            'status' => 'Status',
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
}
