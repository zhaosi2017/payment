<?php

namespace app\modules\home\models;

/**
 * This is the ActiveQuery class for [[PayChannel]].
 *
 * @see PayChannel
 */
class PayChannelQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PayChannel[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PayChannel|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
