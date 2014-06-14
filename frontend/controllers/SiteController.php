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
		$model = User::model()->findAll();
				
		$this->render('index', array('model' => $model));
	}
	
	public function actionInsert()
	{
		$model = new User;
		$model->firstname = "Frank";
		$model->lastname = "Hurtado";
		$model->username = "bossm4";
		$model->email = "b@a.es";
				
		$model->save();
		
		echo CHtml::errorSummary($model);
	}
	
	public function actionDelete()
	{
		$criteria=new EMongoCriteria;
		$criteria->compare('name', 'Fran');
		$model = User::model()->findOne($criteria);
				
		$model->delete();
		
		echo CHtml::errorSummary($model);
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

}