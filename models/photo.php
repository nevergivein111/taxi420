<?php
class Photo extends AppModel {
	var $name = 'Photo';
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Single' => array(
			'className' => 'Single',
			'foreignKey' => 'single_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		);

	function delete_pic($no)
	{
	//$query = sprintf("SELECT name FROM users WHERE name='%s'", $searchString);
  $query2 = sprintf(" DELETE FROM photos WHERE name ='%s'",mysql_real_escape_string($no));
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

}
?>