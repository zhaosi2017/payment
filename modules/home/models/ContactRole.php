<?php

namespace app\modules\home\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "contact_role".
 *
 * @property integer $id
 * @property string $name
 * @property integer $pay_company_id
 */
class ContactRole extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string'],
            [['pay_company_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '编号',
            'name' => '名称',
            'pay_company_id' => '所属公司',
        ];
    }

    /**
     * @inheritdoc
     * @return ContactRoleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContactRoleQuery(get_called_class());
    }

    public function getCompany()
    {
        return $this->hasOne(PayCompany::className(),['id' => 'pay_company_id']);
    }
}
