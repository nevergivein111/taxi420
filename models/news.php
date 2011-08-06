<?php
class News extends AppModel {
	var $name = 'News';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

var $useTable = 'news';

	var $validate = array(
	       'name' => array(
	             'between' => array(
	            'rule' => '/^[a-z0-9 _]{2,}$/i',
	             'allowEmpty' => false,
	             'message' => 'Customer Name must Be Valid'
	            )					 
	       ),
		        'email' => array(
	             'between' => array(
	            'rule' => 'email',
	             'allowEmpty' => false,
	             'message' => 'Must provide Valid Email Address'
	            )					 
	       ),
		           'country' => array(
	             'between' => array(
	            'rule' => '/^[a-z0-9 _]{2,}$/i',
	             'allowEmpty' => false,
	             'message' => 'customerAddress must Be Valid'
	            )					 
	       ),
		          'city' => array(
	             'between' => array(
	            'rule' => '/^[a-z0-9 _]{2,}$/i',
	             'allowEmpty' => false,
	             'message' => 'customer Country must Be Valid'
	            )					 
	       )
		   
     

	);

}
?>