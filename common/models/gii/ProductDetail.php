<?php

namespace common\models\gii;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%product_detail}}".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $introduction_html
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Product $product
 */
class ProductDetail extends \yii\db\ActiveRecord
{
    /**
    * @inheritdoc
    */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_detail}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id'], 'required'],
            [['product_id', 'created_at', 'updated_at'], 'integer'],
            [['introduction_html'], 'string'],
            [['product_id'], 'unique'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app/product', 'ID'),
            'product_id' => Yii::t('app/product', '商品ID'),
            'introduction_html' => Yii::t('app/product', '图文详情'),
            'created_at' => Yii::t('app/product', '创建时间'),
            'updated_at' => Yii::t('app/product', '更新时间'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
