<?php
/* @var $this UserController */
/* @var $model User */

$this->widget('zii.widgets.CBreadcrumbs', array(
    'homeLink'=>CHtml::link('Inicio', array('/Admin')),
    'links'=>array(
		'Usuario'=>array('index'),
		'Ver / Editar',
	),
));

?>

<h1>Ver / Editar usuario  <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>