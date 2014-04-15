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
	'language'=>'es',
	'sourceLanguage'=>'es',
	
	'behaviors' => array('ApplicationConfigBehavior'),
	
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
		'application.models.*'
	),
	'components' => array(
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
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
					/*'levels'       => 'trace, error, warning',*/
					'levels'       => '', // All levels 
				),
			),
		),
	),
	'params' => array(
		// php configuration
		'php.defaultCharset' => 'utf-8',
		'php.timezone'       => 'UTC',
		'imgPath'            => './img/userfiles/',
		'imgPublicPath'      => '/img/userfiles/',
		'siteURL'            => 'http://formacion.upta.es',
		'pagesize'			 => '50',
		// mailer variables
		'appMailServer'=>'mail.hucaconsulting.es',
        'appMailPort'=>25,
        'appMailUser'=>'no-reply@hucaconsulting.es',
        'appMailPass'=>'send00Z',
        'backendUserFiles' => dirname(__FILE__) . '/../..' . '/backend/www/img/userfiles/',
        'frontendUserFiles' => dirname(__FILE__) . '/../..' . '/frontend/www/img/userfiles/'
	)
);