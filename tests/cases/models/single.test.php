<?php
/* Single Test cases generated on: 2011-04-13 10:04:03 : 1302689703*/
App::import('Model', 'Single');

class SingleTestCase extends CakeTestCase {
	var $fixtures = array('app.single', 'app.city', 'app.picture', 'app.user');

	function startTest() {
		$this->Single =& ClassRegistry::init('Single');
	}

	function endTest() {
		unset($this->Single);
		ClassRegistry::flush();
	}

}
?>