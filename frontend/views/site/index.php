<?php 
	$this->widget("ext.magnific-popup.EMagnificPopup", array(
		'target' => '.btnInscripcion',
		'type' => 'inline',
	));
?>

<section id="slider">
	<div class="content">
		<h2>Problems with your home budget?</h2>
		
		<div class="row">
			<div class="col-xs-4 col-sm-5 col-md-5"></div>
			
			<div class="col-xs-4 col-sm-2 col-md-2">
				<a href="#login-popup" class="btn-join-home" id="btn-join"><?php echo Yii::t("home", "JOIN NOW"); ?></a>
			</div>
			
			<div class="col-xs-4 col-sm-5 col-md-5"></div>
		</div> <!-- /.row -->
	</div> <!-- /.content -->
</section>

<?php foreach($model as $user): ?>
	<p><?php echo $user->firstname; ?> <?php echo $user->lastname; ?> <?php echo $user->email; ?> <?php echo $user->active; ?></p>
<?php endforeach; ?>

<br /><br /><br /><br /><br /><br /><br /><br /><br />
		

<?php 
	Yii::app()->clientScript->registerScript('home-script',
	'
	
	'
	, CClientScript::POS_READY);
?>