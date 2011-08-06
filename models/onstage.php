<?php
class Onstage extends AppModel {
	var $name = 'Onstage';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Single' => array(
			'className' => 'Single',
			'foreignKey' => 'single_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>