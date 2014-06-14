<?php

class UrlManager extends CUrlManager{
 
    /*
    * rewriten behavior
    */
    public function createUrl($route, $params = array(), $ampersand = '&') {
    	
    	if(isset($params["lang"])):
    		$route = $params["lang"].'/'.$route;
    		$params = Array();
    	else:
    		$route = Yii::app()->getLanguage().'/'.$route;
    	endif;
    	
        return parent::createUrl($route, $params, $ampersand);
    }

}