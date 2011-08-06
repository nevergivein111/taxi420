<?php
/* Chat Fixture generated on: 2011-04-25 05:04:34 : 1303708714 */
class ChatFixture extends CakeTestFixture {
	var $name = 'Chat';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'subject' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 300, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'message' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 600, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'toUser' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'refid' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'subject' => 'Lorem ipsum dolor sit amet',
			'message' => 'Lorem ipsum dolor sit amet',
			'user_id' => 1,
			'toUser' => 1,
			'refid' => 1
		),
	);
}
?>