<?php
class User extends EMongoDocument
{
	public $firstname;
	public $lastname;
	public $email;
	public $active = 0;
    
    function collectionName(){
        return 'user';
    }

    public static function model($className=__CLASS__){
        return parent::model($className);
    }
 
    // We can define rules for fields, just like in normal CModel/CActiveRecord classes
    public function rules()
    {
        return array(
			array('firstname', 'EMongoUniqueValidator', 'className' => 'User', 'attributeName' => 'username'),
			array('email', 'EMongoUniqueValidator', 'className' => 'User', 'attributeName' => 'email')
        );
    }
 
    // Name of the fields
    public function attributeNames()
    {
        return array(
            'email' => 'E-Mail Address',
        );
    }

}