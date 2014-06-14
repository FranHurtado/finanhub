<?php
$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<div class="container">
	<h2 style="margin-top: 12%;"><?php echo Yii::t("app", "Hubo un problema"); ?></h2>

	<div class="error">
		<p><?php echo Yii::t("app", "Hubo un problema y la pagina no se encuentra operativa. Intentelo de nuevo mas tarde o contacte con nosotros."); ?></p>
	</div>
	
</div><!-- .container -->