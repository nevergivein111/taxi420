<?php
/* Chat Test cases generated on: 2011-04-25 05:04:35 : 1303708715*/
App::import('Model', 'Chat');

class ChatTestCase extends CakeTestCase {
	var $fixtures = array('app.chat', 'app.user', 'app.single', 'app.city', 'app.picture', 'app.onstage', 'app.photo');

	function startTest() {
		$this->Chat =& ClassRegistry::init('Chat');
	}

	function endTest() {
		unset($this->Chat);
		ClassRegistry::flush();
	}

}
?>