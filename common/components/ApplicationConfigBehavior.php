<?php
 
/**
 * ApplicationConfigBehavior is a behavior for the application.
 * It loads additional config parameters that cannot be statically 
 * written in config/main
 */
class ApplicationConfigBehavior extends CBehavior
{
    /**
     * Declares events and the event handler methods
     * See yii documentation on behavior
     */
    public function events()
    {
        return array_merge(parent::events(), array(
            'onBeginRequest'=>'beginRequest',
        ));
    }
 
    /**
     * Load configuration that cannot be put in config/main
     */
    public function beginRequest()
    {
    	// Set preferred language based on Navigator language
    	Yii::app()->language = substr(Yii::app()->request->getPreferredLanguage(), 0, 2);
    	Yii::app()->sourceLanguage = Yii::app()->request->getPreferredLanguage();
    	
    	// If language session we use session to configure language
    	if(Yii::app()->getSession()->get('myLanguage')) :
    		Yii::app()->language = substr(Yii::app()->getSession()->get('myLanguage'), 0, 2);
    		Yii::app()->sourceLanguage = Yii::app()->getSession()->get('myLanguage');
    	endif;
    }
}