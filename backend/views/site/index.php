<div class="container">
	
	<p>Bienvenido al panel de control.</p><br />
	
	<?php if(Yii::app()->user->role != "consultant"): ?>

    <div style="width:19%;float:left;margin:3%;background:#ededed;border:1px solid #cdcdcd;padding:2em;text-align:center;cursor:pointer;">
    	<a href="<?php echo $this->createURL("user/"); ?>" style="display:block;width:100%;haight:100%;">
    		Usuarios
    	</a>
    </div>
    
    <div style="width:19%;float:left;margin:3%;background:#ededed;border:1px solid #cdcdcd;padding:2em;text-align:center;cursor:pointer;">
    	<a href="<?php echo $this->createURL("plan/"); ?>" style="display:block;width:100%;haight:100%;">
    		Planes
    	</a>
    </div>
    
    <div style="width:19%;float:left;margin:3%;background:#ededed;border:1px solid #cdcdcd;padding:2em;text-align:center;cursor:pointer;">
    	<a href="<?php echo $this->createURL("curso/"); ?>" style="display:block;width:100%;haight:100%;">
    		Cursos
    	</a>
    </div>
    
    <div style="width:19%;float:left;margin:3%;background:#ededed;border:1px solid #cdcdcd;padding:2em;text-align:center;cursor:pointer;">
    	<a href="<?php echo $this->createURL("consultant/"); ?>" style="display:block;width:100%;haight:100%;">
	    	Consultoras
    	</a>
    </div>
    
    <?php endif; ?>
    
    <?php $pending = count(AlumnoCurso::model()->searchPending()); ?>
    
    <div data-notifications="<?php echo $pending; ?>" style="width:19%;float:left;margin:3%;background:#ededed;border:1px solid #cdcdcd;padding:2em;text-align:center;cursor:pointer;">
    	<a href="<?php echo $this->createURL("inscripcion/"); ?>" style="display:block;width:100%;haight:100%;">
    		Gesti&oacute;n Preinscripciones
    	</a>
    </div>
    
    <?php if(Yii::app()->user->role != "consultant"): ?>
    
    <div style="width:19%;float:left;margin:3%;background:#ededed;border:1px solid #cdcdcd;padding:2em;text-align:center;cursor:pointer;">
    	<a href="<?php echo $this->createURL("alumno/"); ?>" style="display:block;width:100%;haight:100%;">
    		Base de datos Alumnos
    	</a>
    </div>
    
    <?php endif; ?>
    
    <!-- <div style="width:19%;float:left;margin:3%;background:#ededed;border:1px solid #cdcdcd;padding:2em;text-align:center;cursor:pointer;">
    	Mail Masivo
    </div> -->
    
    <!-- <div style="width:19%;float:left;margin:3%;background:#ededed;border:1px solid #cdcdcd;padding:2em;text-align:center;cursor:pointer;">
    	Subir documentos
    </div>
    
    <!-- <div style="width:19%;float:left;margin:3%;background:#ededed;border:1px solid #cdcdcd;padding:2em;text-align:center;cursor:pointer;">
    	Intranet
    </div> -->
    
    <!-- <div style="width:19%;float:left;margin:3%;background:#ededed;border:1px solid #cdcdcd;padding:2em;text-align:center;cursor:pointer;">
    	Otro 1
    </div> -->
    
    <!-- <div style="width:19%;float:left;margin:3%;background:#ededed;border:1px solid #cdcdcd;padding:2em;text-align:center;cursor:pointer;">
    	Otro 2
    </div> -->
    
    <!-- <div style="width:19%;float:left;margin:3%;background:#ededed;border:1px solid #cdcdcd;padding:2em;text-align:center;cursor:pointer;">
    	Otro 3
    </div> -->
	
	<div style="clear:both;"></div>
	
</div>