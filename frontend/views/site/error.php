<?php
$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<div class="container">
	<h2 style="margin-top: 12%;">Error <?php echo $code; ?></h2>

	<div class="error">
		<?php echo CHtml::encode($message); ?>
	</div>
	
</div><!-- .container -->