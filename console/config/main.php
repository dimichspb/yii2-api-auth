<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'controllerMap' => [
        'migrate' => [
            'class'=>'console\controllers\MigrateController',
            'migrationLookup'=>[
                '@mdm/admin/migrations',
                '@mdm/autonumber/migrations',
                '@yii/rbac/migrations',
                '@mdm/upload/migrations',
                // add other migration path here
            ]
        ],
        'rbac' => [
            'class' => 'console\controllers\RbacController',
        ],
    ],
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],

    ],
    'params' => $params,
];
