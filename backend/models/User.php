<?php
/**
 * Created by PhpStorm.
 * User: panwenbin
 * Date: 2016/12/24
 * Time: 17:51
 */

namespace backend\models;


use Yii;
use yii\helpers\ArrayHelper;

class User extends \common\models\User
{
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', 'Username'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'newPassword' => Yii::t('app', 'New Password'),
        ];
    }

    public function rules()
    {
        return array_merge(parent::rules(), [
            [['username', 'email', 'newPassword'], 'safe'],
        ]);
    }

    public function getStatusTxt()
    {
        return ArrayHelper::getValue(self::statusArr(), $this->status);
    }

    public function getNewPassword()
    {
        return '';
    }

    public function setNewPassword($newPassword)
    {
        if ($newPassword) parent::setPassword($newPassword);
    }
}