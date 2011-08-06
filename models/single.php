<?php
class Single extends AppModel {
	var $name = 'Single';
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'City' => array(
			'className' => 'City',
			'foreignKey' => 'city_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Picture' => array(
			'className' => 'Picture',
			'foreignKey' => 'picture_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Onstage' => array(
			'className' => 'Onstage',
			'foreignKey' => 'single_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
			'Photo' => array(
			'className' => 'Photo',
			'foreignKey' => 'single_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	var $validate = array(
      'name' => array(
	             'between' => array(
	            'rule' => '/^[a-z0-9 _]{1,}$/i',
	             'allowEmpty' => false,
	             'message' => 'Name must Be Valid'
	            )					 
	       ),
		   
		   
		      'details' => array(
	    'rule' => array('minLength', 1),
		'allowEmpty' => false,
	    'message' => 'Details is required.'
	    ),
		    'city' => array(
	    'rule' => array('minLength', 1),
		'allowEmpty' => false,
	    'message' => 'City is required.'
	    )					 
	
		   
	);
		   
function update_post($params)
	{
	//$query = sprintf("SELECT name FROM users WHERE name='%s'", $searchString);
  $query2 = sprintf("UPDATE singles SET image = '%s' WHERE id ='%s'",mysql_real_escape_string($params['image']),mysql_real_escape_string($params['id']));
	$result=mysql_query($query2);
		
		if (!$result)
		{
		  return false;
		}
		else
		{
		  return true;
		}
		
	}
	
	function delete_post($no)
	{
	//$query = sprintf("SELECT name FROM users WHERE name='%s'", $searchString);
  $query2 = sprintf(" DELETE FROM singles WHERE id ='%s'",mysql_real_escape_string($no));
	$result=mysql_query($query2);
		
	
		
	}

}
?>