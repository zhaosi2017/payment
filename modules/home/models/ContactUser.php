<?php

namespace app\modules\home\models;

//use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "contact_user".
 *
 * @property integer $id
 * @property string $name
 * @property string $remark
 * @property integer $pay_company_id
 * @property integer $contact_role_id
 */
class ContactUser extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['remark'], 'string'],
            [['pay_company_id', 'contact_role_id'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['name'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '编号',
            'name' => '姓名',
            'remark' => '联系方式',
            'pay_company_id' => '所属公司',
            'contact_role_id' => '角色',
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
        return $this->hasOne(PayCompany::className(),['id'=>'pay_company_id']);
    }

    public function getRole()
    {
        return $this->hasOne(ContactRole::className(),['id'=>'contact_role_id']);
    }

}
