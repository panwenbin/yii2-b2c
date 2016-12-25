<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[\common\models\gii\Product]].
 *
 * @see \common\models\gii\Product
 */
class ProductQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\gii\Product[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\gii\Product|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
