<?php

namespace common\models\gii;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $price
 * @property string $price_original
 * @property integer $stock
 * @property string $thumbnail_path
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property ProductDetail $productDetail
 */
class Product extends \yii\db\ActiveRecord
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
        return '{{%product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'price'], 'required'],
            [['price', 'price_original'], 'number'],
            [['stock', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['thumbnail_path'], 'string', 'max' => 1024],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app/product', 'ID'),
            'title' => Yii::t('app/product', '标题'),
            'price' => Yii::t('app/product', '售价'),
            'price_original' => Yii::t('app/product', '原价'),
            'stock' => Yii::t('app/product', '库存数量'),
            'thumbnail_path' => Yii::t('app/product', '缩略图路径'),
            'created_at' => Yii::t('app/product', '创建时间'),
            'updated_at' => Yii::t('app/product', '更新时间'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductDetail()
    {
        return $this->hasOne(ProductDetail::className(), ['product_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\ProductQuery(get_called_class());
    }
}
