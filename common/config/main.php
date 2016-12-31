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
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/product' => 'app/product.php',
                    ]
                ]
            ]
        ],
    ],
];
