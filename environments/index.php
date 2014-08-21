<?php
return [
	'Development' => [
		'path' => 'dev',
		'setWritable' => [
			'frontend/runtime',
			'frontend/web/assets',
		],
		'setExecutable' => [
			'yii',
		],
		'setCookieValidationKey' => [
			'frontend/config/main-local.php',
		],
	]
];
