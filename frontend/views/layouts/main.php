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
	<title><?php echo Yii::app()->name; ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">
	
	<link rel="stylesheet" href="<?php echo Yii::app()->params->siteRoot; ?>css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->params->siteRoot; ?>css/bootstrap-theme.css">
</head>

<body>
	<div id="container">
		
		<?php $this->renderPartial('//layouts/header'); ?>
		
		<?php echo $content; ?>
		
		<?php $this->renderPartial('//layouts/footer'); ?>
		
	</div> <!-- /#container -->
	
	<script src="<?php echo Yii::app()->params->siteRoot; ?>js/bootstrap.min.js"></script>
</body>

</html>