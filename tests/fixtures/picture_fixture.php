<?php
/* Picture Fixture generated on: 2011-04-13 10:04:46 : 1302689686 */
class PictureFixture extends CakeTestFixture {
	var $name = 'Picture';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 100, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'single_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 100),
		'size' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 300, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'type' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'single_id' => 1,
			'size' => 'Lorem ipsum dolor sit amet',
			'type' => 1
		),
	);
}
?>