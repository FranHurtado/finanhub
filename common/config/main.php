<?php
/**
 *
 * main.php configuration file
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @copyright 2013 2amigOS! Consultation Group LLC
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
return array(		
	'preload' => array('log'),
	'aliases' => array(
		'frontend' => dirname(__FILE__) . '/../..' . '/frontend',
		'common' => dirname(__FILE__) . '/../..' . '/common',
		'backend' => dirname(__FILE__) . '/../..' . '/backend',
		'vendor' => dirname(__FILE__) . '/../..' . '/common/lib/vendor'
	),
	'import' => array(
		'common.extensions.components.*',
		'common.components.*',
		'common.helpers.*',
		'common.models.*',
		'application.controllers.*',
		'application.extensions.*',
		'application.helpers.*',
		'application.models.*',
		'common.extensions.MongoYii.*',
		'common.extensions.MongoYii.validators.*',
		'common.extensions.MongoYii.behaviors.*',
		'common.extensions.MongoYii.util.*'
	),
	'modules' => array(
		'gii' => array(
			'class' => 'system.gii.GiiModule',
			'password' => 'chuloc0',
			'ipFilters' => array('127.0.0.1','::1'),
		),
	),
	'components' => array(
		'db' => array(
			'connectionString' => 'mysql:host=localhost;dbname=finanhub',
			'username' => 'fran',
			'password' => 'fran00Z',
			'enableProfiling' => true,
			'enableParamLogging' => true,
			'charset' => 'utf8',
		),
		'messages'=>array(
			'basePath'=>dirname(__FILE__) . '/../..' . '/common/messages',
		),
		
		'errorHandler' => array(
			'errorAction' => 'site/error',
		),
		'log' => array(
			'class'  => 'CLogRouter',
			'routes' => array(
				array(
					'class'        => 'CDbLogRoute',
					'connectionID' => 'db',
					'levels'       => 'trace, error, warning',
					/* 'levels'       => '', // All levels */ 
				),
			),
		),
	),
	'params' => array(
		// php configuration
		'defaultLanguage'    => 'en',
		'php.defaultCharset' => 'utf-8',
		'php.timezone'       => 'UTC',
		'imgPath'            => './img/userfiles/',
		'imgPublicPath'      => '/img/userfiles/',
		'siteRoot'           => 'http://finanhub.local/',
		'pagesize'			 => '50',
		// mailer variables
		'appMailServer'      => '',
        'appMailPort'        => 25,
        'appMailUser'        => '',
        'appMailPass'        => '',
        'backendUserFiles'   => dirname(__FILE__) . '/../..' . '/backend/www/img/userfiles/',
        'frontendUserFiles'  => dirname(__FILE__) . '/../..' . '/frontend/www/img/userfiles/'
	),
);