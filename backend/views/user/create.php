<?php
/* @var $this UserController */
/* @var $model User */

$this->widget('zii.widgets.CBreadcrumbs', array(
    'homeLink'=>CHtml::link('Inicio', array('/Admin')),
    'links'=>array(
		'Usuarios'=>array('index'),
		'Crear',
	),
));

?>

<h1>Crear usuario</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>