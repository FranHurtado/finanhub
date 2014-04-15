<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="es"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>UPTA Murcia</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">
	
	<link href="http://uptamurcia.com/favicon.ico?v=2" rel="shortcut icon">

	<link rel="stylesheet" href="<?php echo Yii::app()->baseURL; ?>/css/ie.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->baseURL; ?>/css/print.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->baseURL; ?>/css/screen.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->baseURL; ?>/css/main.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css">
	
</head>
<body>
	<div id="container">
		
		<?php $this->renderPartial('//layouts/header'); ?>
		
		<?php echo $content; ?>
		
		<?php $this->renderPartial('//layouts/footer'); ?>
		
	</div> <!-- /#container -->
	
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/bootstrap.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>
	
</body>

</html>