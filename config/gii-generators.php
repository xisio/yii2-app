<?php

/**
 * Configure yiisoft/yii2-gii Module::$generators
 */
return [
    'api' => [
            'class' => \cebe\yii2openapi\generator\ApiGenerator::class,
            'urlConfigFile' => '@api/config/url-rules.rest.php',
            'controllerNamespace' => 'api\\controllers',
            'modelNamespace' => 'common\\models',
            'migrationPath' => '@common/migrations',
	],

	'enhanced-gii-crud' => [
			'class' => 'mootensai\enhancedgii\crud\Generator',
			'templates' => [
				'xisio' => '@backend/views/yii2-enhanced-gii/crud/xisio/'
			]
	],
	'enhanced-gii-model' => [
			'class' => 'mootensai\enhancedgii\model\Generator',
			'templates' => [
					'xisio' => '@backend/views/yii2-enhanced-gii/model/xisio/'
			]
	],
    'rbac-generator' => [
            'class' => \xisio\rbacgenerator\generator\RbacGenerator::class,
            'accessClassNamespace' => 'common\\access',
            'migrationPath' => '@common/migrations',
	],
];
