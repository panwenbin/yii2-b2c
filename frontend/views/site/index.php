<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

/* @var $dataProvider \yii\data\ActiveDataProvider */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <?php
            /* @var $product \frontend\models\Product */
            foreach($dataProvider->getModels() as $product):?>
            <div class="col-lg-4">
                <h2><?=$product->title?></h2>

                <p><?=$product->productDetail->introduction_html?></p>

                <p><a class="btn btn-default" href="<?=Url::to(['product/view', 'id' => $product->id])?>">购买</a></p>
            </div>
            <?php endforeach;?>
        </div>

    </div>
</div>
