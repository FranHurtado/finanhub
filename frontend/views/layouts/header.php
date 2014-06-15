<header>
	
	<div class="content">
	
		<nav class="navbar" role="navigation">
			<div class="container">
			
				<a href="#">
					<h1>Finan<span>Hub</span></h1>
				</a> <!-- /#logo -->
				
				<div class="btn-group pull-right">
					
					<a href="#" class="btn btn-header no-radius">
						<?php echo Yii::t("home", "How it works"); ?>
					</a>
	
					<a href="#" class="btn btn-header no-radius">
						<?php echo Yii::t("home", "View Demo"); ?>
					</a>
	
					<a href="#" class="btn btn-header no-radius">
						<?php echo Yii::t("home", "Contact"); ?>
					</a>
					
					<a href="#login-popup" class="btn btn-header btn-blue radius" id="btn-login">
						<?php echo Yii::t("home", "Log in"); ?>
					</a>
					
					<a href="#" class="hide" id="btnMenuMobile">
						<img src="<?php echo Yii::app()->params->siteRoot; ?>img/btn-menu-mobile.png" />
					</a>
					
				</div> <!-- /.btn-group -->
				
			</div> <!-- /.container -->
		</nav>
	
		<div style="clear: both;"></div>
	
	</div> <!-- /.content -->

</header>

<div id="mobile-menu" class="hide">
	<a href="#" class="btn btn-mobile no-radius">
		<?php echo Yii::t("home", "How it works"); ?>
	</a>

	<a href="#" class="btn btn-mobile no-radius">
		<?php echo Yii::t("home", "View Demo"); ?>
	</a>

	<a href="#" class="btn btn-mobile no-radius">
		<?php echo Yii::t("home", "Contact"); ?>
	</a>
	
	<a href="#login-popup" class="btn btn-mobile no-radius" id="btn-login-mobile">
		<?php echo Yii::t("home", "Log in"); ?>
	</a>
</div> <!-- /#mobile-menu -->

<div id="login-popup" class="popup mfp-hide">
	
</div> <!-- /#login-popup -->