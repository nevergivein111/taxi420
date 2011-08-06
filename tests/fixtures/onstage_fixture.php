<?php
/* Onstage Fixture generated on: 2011-04-18 13:04:37 : 1303134157 */
class OnstageFixture extends CakeTestFixture {
	var $name = 'Onstage';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'single_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'time' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'single_id' => 1,
			'time' => '2011-04-18'
		),
	);
}
?>