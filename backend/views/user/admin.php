<?php
/* @var $this UserController */
/* @var $model User */

$this->widget('zii.widgets.CBreadcrumbs', array(
    'homeLink'=>CHtml::link('Inicio', array('site/index')),
    'links'=>array(
		'Usuarios'=>array('index'),
		'Listado',
	),
));

?>

<h1>Gesti&oacute;n de usuarios</h1>

<a href="<?php echo Yii::app()->createURL("user/create"); ?>" class="btn btn-inverse">CREAR USUARIO</a><br /><br />

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$model->search(),
    'filter'=>$model, 
    'template'=>"{items} {pager} {summary}",
    'columns'=>array(
		array(
            'name'=>'name',
            'value'=>'$data->name',
            'headerHtmlOptions'=>array(
                'style'=>'width:30%;text-align:left !important;',
            ),
        ),
        array(
            'name'=>'email',
            'value'=>'$data->email',
            'headerHtmlOptions'=>array(
                'style'=>'width:30%;text-align:left !important;',
            ),
        ),
        array(
            'name'=>'username',
            'value'=>'$data->username',
            'headerHtmlOptions'=>array(
                'style'=>'width:30%;text-align:left !important;',
            ),
        ),
		array(
			'class'=>'CButtonColumn',
			'header'=>'Acciones',
			'template'=>'{update} {delete}',
			'buttons'=>array(
        		'update' => array(
            		'imageUrl'=>Yii::app()->request->baseUrl.'/img/edit.png',
            		'label'=>Yii::t('admin', 'Ver/Editar'),
        		),
        		'delete' => array(
            		'imageUrl'=>Yii::app()->request->baseUrl.'/img/delete.png',
            		'label'=>Yii::t('admin', 'Borrar'),
        		),
		    ),
		    'htmlOptions'=>array(
                'style'=>'text-align:center !important;',
            ),
            'headerHtmlOptions'=>array(
                'style'=>'text-align:center !important;',
            ),
		    
		),
	),
	
	'emptyText' => 'No hay registros. <a href="'.$this->createURL('create').'">Pincha</a> para crear uno.',
    'summaryText' => 'Mostrando del {start} al {end} de {count} registro(s).',

)); ?>
