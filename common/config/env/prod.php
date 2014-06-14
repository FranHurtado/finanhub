<?php
/**
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @copyright 2013 2amigOS! Consultation Group LLC
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
return array(
	'components' => array(
		'mongodb' => array(
	        'class'             => 'EMongoDB',
	        'connectionString'  => 'mongodb://fran:fran00Z@ds053808.mongolab.com:53808/franmongo',
	        'dbName'            => 'franmongo',
	        'fsyncFlag'         => false,
	        'safeFlag'          => false,
	        'useCursor'         => false,
	    ),
	),
	'params' => array(
		'yii.debug' => false,
		'yii.traceLevel' => 0,
		'yii.handleErrors'   => APP_CONFIG_NAME !== 'test',
	)
);