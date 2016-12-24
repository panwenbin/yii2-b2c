<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
            'datetimeFormat' => 'yyyy/MM/dd, HH:mm:ss',
            'dateFormat' => 'yyyy/MM/dd',
            'timeFormat' => 'HH:mm:ss',
            'currencyCode' => 'CNY',
        ],
    ],
];
