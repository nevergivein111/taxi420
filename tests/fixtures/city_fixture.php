<?php
/* City Fixture generated on: 2011-04-13 10:04:33 : 1302689673 */
class CityFixture extends CakeTestFixture {
	var $name = 'City';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 300, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'onstage' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'availableUntil' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'indexes' => array(),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'onstage' => 1,
			'availableUntil' => '2011-04-13'
		),
	);
}
?>