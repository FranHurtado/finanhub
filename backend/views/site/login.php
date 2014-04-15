<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

//print_r(Yii::app()->messages);

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('Site', 'Enter to panel');
$this->breadcrumbs=array(
	'Login',
);
?>

<div class="container login">
	
	<h1><?php echo Yii::t('Site', 'Enter to panel'); ?></h1>
	
	<div class="form">
	
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'enableClientValidation'=>false,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
		)); ?>
		
			<div class="rowForm">
				<?php echo $form->labelEx($model,'username'); ?>
				<?php echo $form->textField($model,'username', array("value"=>"daimon")); ?>
				<?php echo $form->error($model,'username'); ?>
			</div>
		
			<div class="rowForm">
				<?php echo $form->labelEx($model,'password'); ?>
				<?php echo $form->passwordField($model,'password', array("value"=>"exito")); ?>
				<?php echo $form->error($model,'password'); ?>
			</div>
		
			<div class="rowForm rememberMe">
				<?php echo $form->checkBox($model,'rememberMe'); ?>
				<?php echo $form->label($model,'rememberMe', array('class' => 'checkbox')); ?>
				<?php echo $form->error($model,'rememberMe'); ?>
			</div>
		
			<div class="rowForm buttons">
				<?php echo CHtml::submitButton(Yii::t('Site', 'Send')); ?>
			</div>
		
		<?php $this->endWidget(); ?>
		
	</div> <!-- .form -->

	<?php $this->renderPartial('_foot'); ?>

</div> <!-- .container -->