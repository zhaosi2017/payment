<?php

namespace app\modules\home\models;

/**
 * This is the ActiveQuery class for [[PayCompany]].
 *
 * @see PayCompany
 */
class PayCompanyQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PayCompany[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PayCompany|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

}
