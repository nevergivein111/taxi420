<?php
/* Single Fixture generated on: 2011-04-13 10:04:03 : 1302689703 */
class SingleFixture extends CakeTestFixture {
	var $name = 'Single';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 16, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'sex' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'city_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 16),
		'age' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 16),
		'details' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'wantToMarry' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'wantToFlirt' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'wantToRelationship' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'dontKnow' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'picture_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 16),
		'photo' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'video' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 500, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'eyes' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 500, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'hairs' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 500, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'bodyType' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 500, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'weight' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 500, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'date' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'sex' => 'Lorem ipsum dolor sit amet',
			'city_id' => 1,
			'age' => 1,
			'details' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'wantToMarry' => 1,
			'wantToFlirt' => 1,
			'wantToRelationship' => 1,
			'dontKnow' => 1,
			'picture_id' => 1,
			'photo' => 1,
			'video' => 'Lorem ipsum dolor sit amet',
			'eyes' => 'Lorem ipsum dolor sit amet',
			'hairs' => 'Lorem ipsum dolor sit amet',
			'bodyType' => 'Lorem ipsum dolor sit amet',
			'weight' => 'Lorem ipsum dolor sit amet',
			'date' => '2011-04-13',
			'user_id' => 1
		),
	);
}
?>