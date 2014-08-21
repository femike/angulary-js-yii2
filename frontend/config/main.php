<?php
$params = array_merge(
	require(__DIR__ . '/../../common/config/params.php'),
	require(__DIR__ . '/params.php')
);
return [
	'id' => 'app-frontend',
	'basePath' => dirname(__DIR__),
	'bootstrap' => ['log'],
	'controllerNamespace' => 'frontend\controllers',
	'modules' => [
		'api' => [
			'controllerNamespace' => 'frontend\api\controllers',
		],
	],
	'components' => [
		'request' => [
			'class' => '\yii\web\Request',
			'enableCookieValidation' => false,
			'parsers' => [
				'application/json' => 'yii\web\JsonParser',
			],
		],
		'user' => [
			'identityClass' => 'common\models\User',
			'enableAutoLogin' => true,
		],
		'log' => [
			'traceLevel' => YII_DEBUG ? 3 : 0,
			'targets' => [
				[
					'class' => 'yii\log\FileTarget',
					'levels' => ['error', 'warning'],
				],
			],
		],
		'urlManager' => [
			'enablePrettyUrl' => true,
			'enableStrictParsing' => true,
			'showScriptName' => false,
			'rules' => [
				['class' => 'yii\rest\UrlRule', 'controller' => ['api/post','api/base']],
				'<controller>/<action>' => '<controller>/<action>',
				'<controller:\w+>/' => '<controller>/index',
				'<controller:\w+>/<id:\d+>' => '<controller>/view',
				'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
				'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
				'' => 'site/index',
			],
		],
	],
	'params' => $params,
];