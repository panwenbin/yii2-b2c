<?php

use vova07\imperavi\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $productDetail common\models\gii\ProductDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price_original')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stock')->textInput() ?>

    <?= $form->field($model, 'thumbnail_path')->textInput(['maxlength' => true]) ?>

    <?= $form->field($productDetail, 'introduction_html')->widget(Widget::className(), [
        'settings' => [
            'lang' => 'zh_cn',
            'minHeight' => 200,
            'imageUpload' => Url::to(['/site/image-upload']),
            'plugins' => [
                'clips',
                'fullscreen',
                'imagemanager',
            ]
        ]]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app/product', 'Create') : Yii::t('app/product', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
