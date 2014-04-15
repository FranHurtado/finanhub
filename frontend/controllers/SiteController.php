<?php
/**
 *
 * SiteController class
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @copyright 2013 2amigOS! Consultation Group LLC
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
class SiteController extends EController
{
	public $layout = "//layouts/main";
		
	public function actionIndex()
	{
		//$modelPlan = Plan::model()->findByAttributes(array("destacado" => 1));
		
		$criteria = new CDbCriteria;
		//$criteria->compare('planID', $modelPlan->ID);
		$criteria->order = "name asc";
		
		$modelCursos = Curso::model()->findAll($criteria);
		
		$modelAlumno = new Alumno;
		
		$modelSearch = new CursoSearch;
		
		//$modelSearch->plan = $modelPlan->ID;
				
		$this->render('index', array('modelCursos' => $modelCursos, /*'modelPlan' => $modelPlan,*/ 'modelAlumno' => $modelAlumno, 'modelSearch' => $modelSearch));
	}
	
	public function actionLoadCursos($plan=0, $titulo='', $modalidad=0, $estado=2){
		
		$criteria=new CDbCriteria;
		
		$plan =      isset($_POST["plan"]) ? $_POST["plan"] : 0;
		$titulo =    isset($_POST["titulo"]) ? $_POST["titulo"] : '';
		$modalidad = isset($_POST["modalidad"]) ? $_POST["modalidad"] : 0;
		$estado =    isset($_POST["estado"]) ? $_POST["estado"] : 2;

		if($plan != 0):
			$criteria->compare('planID', $plan);
		endif;
		
		if(strlen($titulo) > 0):
			$criteria->compare('name', $titulo, true);
		endif;
		
		if($modalidad != 0):
			$criteria->compare('modalidadID',$modalidad);
		endif;
		
		if($estado != 2):
			$criteria->compare('estado',$estado);
		endif;
		
		$modelCursos = Curso::model()->findAll($criteria);
		
		$modelAlumno = new Alumno;
		
		$modelPlan = Plan::model()->findByPK($plan) ? Plan::model()->findByPK($plan) : NULL;
		
		$this->renderPartial('_cursos', array('modelCursos' => $modelCursos, 'modelPlan' => $modelPlan, 'modelAlumno' => $modelAlumno), false, true);
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
	
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form') :
			echo CActiveForm::validate($model);
			Yii::app()->end();
		endif;

		// collect user input data
		if(isset($_POST['LoginForm'])):
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		endif;
		
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->createURL("/Admin"));
	}
	
	/**
	 * Displays the register page
	 */
	public function actionRegister()
	{
		
		$model = new User;

		// collect user input data
		if(isset($_POST['User'])):
			$model->attributes=$_POST['User'];
			
			// validate user input and redirect to registration ok page.
			if($model->save())
				$this->redirect(array("registerOK"));
		endif;
		
		// display the login form
		$this->render('register',array('model'=>$model));
	}
	
	public function actionSection($id)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = "ID = :id";
		$criteria->params = array(':id' => $id);
		
		$model = Section::model()->find($criteria);
		
		if($model->ID == 2): // Asociate
			$modelDatos = Datos::model()->find();
			$modelForm = new Members;
			
			if(isset($_POST["Members"])):
				$modelForm->attributes = $_POST["Members"];
				if($modelForm->save()):
					// Send contact email
					$body = "Hola! Has recibido una ficha en el formulario asociate de Upta Murcia.<br /><br />";
					$body.= "<b>Nombre:</b> " . $modelForm->name . "<br /><br />";
					$body.= "<b>Apellidos:</b> " . $modelForm->surname . "<br /><br />";
					$body.= "<b>Email:</b> " . $modelForm->email . "<br /><br />";
					$body.= "<b>Telefono:</b> " . $modelForm->phone . "<br /><br />";
					$body.= "<b>Actividad:</b> " . $modelForm->profession . "<br /><br />";
					$body.= "<b>Empresa:</b> " . $modelForm->company . "<br /><br />";			
					
					Functions::SendEmail("info@uptamurcia.com","info@uptamurcia.com","Formulario Asociate Upta Murcia",utf8_encode($body));
					
					$this->redirect(array('section', 'id' => $model->ID, 's' => 'OK'));
				endif;
			endif;
			
			$this->render('section', array('model' => $model, 'modelForm' => $modelForm, 'modelDatos' => $modelDatos));
		else:
			$this->render('section', array('model' => $model));
		endif;
	}
	
	public function actionContact()
	{	
		$model = Datos::model()->find();
		$modelForm = new ContactForm;
		
		if(isset($_POST["ContactForm"])):
			$modelForm->attributes = $_POST["ContactForm"];
			if($modelForm->validate()):
				// Send contact email
				$body = "Hola! Has recibido una consulta en el formulario web de Upta Murcia.<br /><br />";
				$body.= "<b>Nombre:</b> " . $modelForm->name . "<br /><br />";
				$body.= "<b>Email:</b> " . $modelForm->email . "<br /><br />";
				$body.= "<b>Consulta:</b><br /> " . $modelForm->text . "<br /><br />";				
				
				Functions::SendEmail("info@uptamurcia.com","info@uptamurcia.com","Formulario web Upta Murcia",utf8_encode($body));
				
				$this->redirect(array('contact', 's' => 'OK'));
			endif;
		endif;
		
		$this->render('contact', array('model' => $model, 'modelForm' => $modelForm));
	}
	
	public function actionDocument()
	{
		$criteria = new CDbCriteria;
		$criteria->order = "ID desc";
		
		$model = Document::model()->findAll($criteria);
		
		$this->render('document', array('model' => $model));
	}
	
	/*
	**	Shows particular news
	*/
	public function actionNews($id)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = "ID = " . $id;
		$criteria->order = "ID desc";
		
		$model = News::model()->findAll($criteria);
		
		$this->render('news', array('model' => $model));
	}
	
	/*
	**	Shows news list
	*/
	public function actionNewsList()
	{
		$this->layout = "//layouts/main-no-jq";
		
		$model=new News('search');
		$model->unsetAttributes();
		
		$this->render('newslist', array('model' => $model));
	}
	
	/*
	**	Shows particular top
	*/
	public function actionTop($id)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = "ID = " . $id;
		$criteria->order = "ID desc";
		
		$model = Top::model()->findAll($criteria);
		
		$this->render('top', array('model' => $model));
	}
	
	/*
	**	Shows services
	*/
	public function actionServices()
	{	
		$model = Service::model()->findByPK(1);
		
		$this->render('services', array('model' => $model));
	}
	
	/*
	**	Join curso
	*/
	public function actionJoin()
	{	
		$modelAlumno = new Alumno;

		$modelAlumno->name = isset($_POST['name']) ? $_POST['name'] : "";
		$modelAlumno->surname = isset($_POST['surname']) ? $_POST['surname'] : "";
		$modelAlumno->phone = isset($_POST['phone']) ? $_POST['phone'] : "";
		$modelAlumno->email = isset($_POST['email']) ? $_POST['email'] : "";
		$modelAlumno->email2 = isset($_POST['email2']) ? $_POST['email2'] : "";
		$modelAlumno->age = isset($_POST['age']) ? $_POST['age'] : "";
		$modelAlumno->laboralID = isset($_POST['laboralID']) ? $_POST['laboralID'] : "";
        
        if($modelAlumno->save())
        {   
            $modelAlumnoCurso = new AlumnoCurso;
            
            $modelAlumnoCurso->cursoID = $_POST["cursoID"];
            $modelAlumnoCurso->alumnoID = $modelAlumno->ID;
            $modelAlumnoCurso->status = 0;
            $modelAlumnoCurso->date = date("Y-m-d H:i:s");
            
            if($modelAlumnoCurso->save()):
            	echo "<br />Gracias por preinscribirse. Esta preinscripci&oacute;n no garantiza su plaza en el curso. En breve nos pondremos en contacto con usted desde Upta para formalizar la inscripci&oacute;n.<br /><br /> Gracias por confiar en nosotros.<br /><br />";
            	
            	$body = "Hola! Has recibido una inscripci&oacute;n en los cursos de Upta.<br /><br /> Entra en el panel de control para 
            				validarla haciendo click <a href='http://admin.formacion.upta.es/'aqu&iacute;</a>.";		
				
				Functions::SendEmail("secretaria-dptoformacion@upta.es","secretaria-dptoformacion@upta.es","Formulario Aviso Preinscripcion",utf8_encode($body));
				
				if($modelAlumnoCurso->curso->consultant):
					$body = "Hola! Has recibido una inscripci&oacute;n en los cursos de Upta.<br /><br /> Entra en el panel de control para 
	            				validarla haciendo click <a href='http://admin.formacion.upta.es/'aqu&iacute;</a>.";		
					
					Functions::SendEmail("secretaria-dptoformacion@upta.es",$modelAlumnoCurso->curso->consultant->email,"Formulario Aviso Preinscripcion",utf8_encode($body));
				endif;
				
				
				$body = "Hemos recibido tu inscripci&oacute;n en los cursos de Upta. En breve te contactaremos para formalizar la inscripci&oacute;n.<br /><br />";		
				
				Functions::SendEmail("secretaria-dptoformacion@upta.es",$modelAlumno->email,"Presinscripcion recibida en Upta formacion",utf8_encode($body));
            	
            endif;
        }else{				
			$this->renderPartial('_formJoin', array('modelAlumno' => $modelAlumno)); 
		}
	}
	
	/*
	**	Shows services
	*/
	public function actionLopd()
	{	
		$this->render('lopd');
	}

}