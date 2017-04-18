<?php

namespace app\modules\home\models;

/**
 * This is the ActiveQuery class for [[ContactUser]].
 *
 * @see ContactUser
 */
class ContactRoleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ContactUser[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ContactUser|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
