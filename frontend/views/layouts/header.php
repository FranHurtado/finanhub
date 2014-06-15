<header>
	
	<div class="content">
	
		<nav class="navbar" role="navigation">
			<div class="container">
			
				<a href="<?php echo Yii::app()->createURL(""); ?>">
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
						<?php echo Yii::t("home", "Sign in"); ?>
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
		<?php echo Yii::t("home", "Sign in"); ?>
	</a>
</div> <!-- /#mobile-menu -->

<div id="login-popup" class="popup mfp-hide" style="max-width: 370px;">
	
	<div id="login-form">
		<h1>Finan<span>Hub</span></h1>
		
		<p><input type="text" name="username" id="username" placeholder="<?php echo Yii::t("loginform", "Your username"); ?>"  data-error="<?php echo Yii::t("loginform", "Your username is mandatory"); ?>" /></p>
		<p><input type="password" name="password" id="password" placeholder="<?php echo Yii::t("loginform", "Your password"); ?>"  data-error="<?php echo Yii::t("loginform", "Your password is mandatory"); ?>" /></p>
		
		<p class="text-center">
			<a href="#" class="btn btn-login radius"><?php echo Yii::t("loginform", "Sign in"); ?></a>
			<a href="#" class="btn btn-login btn-red radius" id="btn-join-popup"><?php echo Yii::t("loginform", "Need an account?"); ?></a>
		</p>
		
		<p class="text-center">
			<a href="#" class=" brand-grey"><?php echo Yii::t("loginform", "Forgot your password?"); ?></a>
		</p>
	</div> <!-- /.login-form -->
	
	<div id="join-form">
		<h1>Finan<span>Hub</span></h1>
		
		<p><?php echo Yii::t("joinform", "Hi! Please fill all the fields to create your account."); ?></p>
		
		<p>
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6">	
					<input type="text" name="firstname" id="firstname" placeholder="<?php echo Yii::t("joinform", "Your first name"); ?>"  data-error="<?php echo Yii::t("joinform", "Your first name is mandatory"); ?>" />
				</div>
				<div class="col-xs-6 col-sm6 col-md-6">
					<input type="text" name="lastname" id="lastname" placeholder="<?php echo Yii::t("joinform", "Your last name"); ?>"  data-error="<?php echo Yii::t("joinform", "Your last name is mandatory"); ?>" />
				</div>
			</div>
		</p>
		
		<p><input type="text" name="username" id="username" placeholder="<?php echo Yii::t("joinform", "Your username"); ?>"  data-error="<?php echo Yii::t("joinform", "Your username is mandatory"); ?>" /></p>
		<p><input type="password" name="password" id="password" placeholder="<?php echo Yii::t("joinform", "Your password"); ?>"  data-error="<?php echo Yii::t("joinform", "Your password is mandatory"); ?>" /></p>
		<p><input type="email" name="email" id="email" placeholder="<?php echo Yii::t("joinform", "Your email"); ?>"  data-error="<?php echo Yii::t("joinform", "Your email is mandatory"); ?>" /></p>

		<p class="text-center">
			<a href="#" class="btn btn-login radius"><?php echo Yii::t("joinform", "Sign up"); ?></a>
			<a href="#" class="btn btn-login btn-red radius" id="btn-login-popup"><?php echo Yii::t("joinform", "Already member"); ?></a>
		</p>

	</div> <!-- /.login-form -->

</div> <!-- /#login-popup -->