<?php
/**
 * Created by PhpStorm.
 * User: panwenbin
 * Date: 2016/12/24
 * Time: 22:35
 */

namespace backend\behaviors;


use Yii;
use yii\base\Behavior;
use yii\helpers\ArrayHelper;
use yii\web\User;

/**
 * 用于验证后台登录用户邮箱是否为参数设置的管理员邮箱，否则不允许登录
 * Class AdminEmailValidateBehavior
 * @package backend\behaviors
 */
class AdminEmailValidateBehavior extends Behavior
{
    public function events()
    {
        return [
            User::EVENT_BEFORE_LOGIN => 'beforeLogin',
        ];
    }

    public function beforeLogin($event)
    {
        if ($event->identity instanceof \common\models\User) {
            if (strcmp($event->identity->email, ArrayHelper::getValue(Yii::$app->params, 'adminEmail')) == 0) {
                $event->isValid = true;
                return;
            }
        }
        $event->isValid = false;
        Yii::$app->getSession()->setFlash('error', Yii::t('app', 'Sorry, you have NO rights to login to this system!'));
    }
}