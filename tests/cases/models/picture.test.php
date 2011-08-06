<?php
/* Picture Test cases generated on: 2011-04-13 10:04:46 : 1302689686*/
App::import('Model', 'Picture');

class PictureTestCase extends CakeTestCase {
	var $fixtures = array('app.picture', 'app.single');

	function startTest() {
		$this->Picture =& ClassRegistry::init('Picture');
	}

	function endTest() {
		unset($this->Picture);
		ClassRegistry::flush();
	}

}
?>