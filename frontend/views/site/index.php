<?php 
	$this->widget("ext.magnific-popup.EMagnificPopup", array(
		'target' => '.btnInscripcion',
		'type' => 'inline',
	));
?>

<div id="home">
	
	<div id="listado">
	
		<div class="buscador">
		
			<h1>Buscador de cursos</h1>
			
			<div class="form">
			
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'search-form',
				'enableAjaxValidation'=>false,
			)); ?>
				
				<div class="rowForm" style="float:left; width:47.5%; margin-right: 2.5%;">
					<?php echo $form->labelEx($modelSearch,'plan'); ?>
					<?php echo $form->dropDownList($modelSearch,'plan', 
								CHtml::listData(Plan::model()->findAll(array('order' => 'name ASC')), 'ID', 'name'), 
								array('style'=>'width: 100%;background:#fec2c2;font-weight:bold;border-radius:8px;border: 2px solid #999;', 'empty' => '- Selecciona un plan formativo -')); ?>
					<?php echo $form->error($modelSearch,'plan'); ?>
				</div>
				
				<div class="rowForm" style="float:left; width:47.5%; margin-left: 2.5%;">	
					<?php echo $form->labelEx($modelSearch,'titulo'); ?>
					<?php echo $form->textField($modelSearch,'titulo',array('style'=>'width: 100%;','maxlength'=>150, 'placeholder' => 'Nombre del curso, palabras clave, etc...')); ?>
					<?php echo $form->error($modelSearch,'titulo'); ?>
				</div>
				
				<div style="clear:both;"></div>
				
				<div class="rowForm" style="float:left; width:20%; margin-right: 2.5%;">	
					<?php echo $form->labelEx($modelSearch,'modalidad'); ?>
					<?php echo $form->dropDownList($modelSearch,'modalidad', 
								CHtml::listData(Modalidad::model()->findAll(array('order' => 'name ASC')), 'ID', 'name'), 
								array('style'=>'width: 100%;', 'empty' => '- Selecciona modalidad -')); ?>
					<?php echo $form->error($modelSearch,'modalidad'); ?>
				</div>
				
				<div class="rowForm" style="float:left; width:20%; margin-left: 2.5%;">	
					<?php echo $form->labelEx($modelSearch,'estado'); ?>
					<?php echo $form->dropDownList($modelSearch,'estado', array('0' => 'Cerrado', '1' => 'Abierto'), array('style'=>'width: 100%;', 'empty' => '- Selecciona estado -')); ?>
					<?php echo $form->error($modelSearch,'estado'); ?>
				</div>
				
				<div class="rowForm" style="float:left; margin-left: 2.5%; padding-top: 1em;">	
					<?php echo CHtml::submitButton('Buscar', array('class' => 'btn', 'id' => 'sendForm')); ?>
				</div>
				
				<div style="clear:both;"></div>
				
			<?php $this->endWidget(); ?>
				
			</div>
			
		</div>		
		
		<?php if(isset($modelPlan) && $modelPlan !== NULL): ?>
		
			<?php $this->renderPartial('_cursos', array('modelCursos' => $modelCursos, 'modelPlan' => $modelPlan, 'modelAlumno' => $modelAlumno), false, true); ?>
			
		<?php else: ?>
		
			<div id="cursos">
		
				<p>Debes seleccionar un Plan formativo en el buscador para ver los cursos disponibles.</p>
			
			</div>
			
		<?php endif; ?>
			
	</div><!-- /#listado -->
	
</div> <!-- /#home -->


<script>
	$(".line").click(function(){
		$(".contentCurso").each(function(){
			$(this).hide(100);
		});
		
		if($(this).find(".contentCurso").css("display") == "none"){
			$(this).find(".contentCurso").show(100);
		}else{
			$(this).find(".contentCurso").hide(100);
		}
	});
	
	$(".btnInscripcion").click(function(){
		$("#nombre_curso").html("Curso: <strong>" + $(this).attr("data-curso") + "</strong>");
		$("#cursoID").val($(this).attr("data-id"));
		$(this).parent().parent().show();
	});
	
	$("#sendForm").click(function(e){
		e.preventDefault();
			
		var request = $.ajax({
	        url: "<?php echo $this->createURL("site/LoadCursos"); ?>",
	        type: "POST",
	        data: { 
	        	plan: $("#CursoSearch_plan").val(),
	        	titulo: $("#CursoSearch_titulo").val(),
	        	modalidad: $("#CursoSearch_modalidad").val(),
	        	estado: $("#CursoSearch_estado").val(),
	        },
	        dataType: "html"
	    });
	    
	    request.done(function(msg) {
    		$("#cursos").html(msg);
        });
	});

</script>