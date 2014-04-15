<?php

/*
 * Essential functions that you can use in the application.
 * Functions::methodName(values); 
 */

class Functions extends CApplicationComponent
{
	public static function stringCut($string,$size){
        if(strlen($string)<$size)
            return $string;
        
        return substr($string,0,strrpos(substr($string,0,$size)," "))."...";
    }
    
	public static function SendEmail($emailSender,$emailReceiver,$subject,$body) {
         $mailer = Yii::createComponent('common.extensions.mailer.EMailer');
         $mailer->IsSMTP();
         $mailer->IsHTML(true);
         $mailer->SMTPAuth = true;
         $mailer->Host = Yii::app()->params->appMailServer;
         $mailer->Port = Yii::app()->params->appMailPort;
         $mailer->Username = Yii::app()->params->appMailUser;
         $mailer->Password = Yii::app()->params->appMailPass;
         $mailer->From = $emailSender;
         $mailer->FromName = "Formacion Upta";
         $mailer->AddAddress($emailReceiver);
         $mailer->Subject = utf8_decode($subject);
         $mailer->Body = utf8_decode($body);
         if(!$mailer->Send()) {
              return false;
         }else{
             return true;
         }
    }
    
    public static function copyUserFiles($src,$dst) { 
	    $dir = opendir($src); 
	    @mkdir($dst); 
	    while(false !== ( $file = readdir($dir)) ) { 
	        if (( $file != '.' ) && ( $file != '..' ) && ( $file != '.svn' )) { 
	            if ( is_dir($src . '/' . $file) ) { 
	                Functions::copyUserFiles($src . '/' . $file,$dst . '/' . $file); 
	            } 
	            else { 
	                copy($src . '/' . $file,$dst . '/' . $file); 
	            } 
	        } 
	    } 
	    closedir($dir); 
	}
}