<?php
/* Website Test cases generated on: 2011-05-23 09:30:58 : 1306143058*/
App::import('Model', 'Website');

class WebsiteTestCase extends CakeTestCase {
	var $fixtures = array('app.website');

	function startTest() {
		$this->Website =& ClassRegistry::init('Website');
	}

	function endTest() {
		unset($this->Website);
		ClassRegistry::flush();
	}

}
?>