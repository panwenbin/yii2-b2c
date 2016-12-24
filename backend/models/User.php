<?php
/**
 * Created by PhpStorm.
 * User: panwenbin
 * Date: 2016/12/24
 * Time: 17:51
 */

namespace backend\models;


use Yii;

class User extends \common\models\User
{
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', 'Username'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}