<?php
/* Onstage Test cases generated on: 2011-04-18 13:04:37 : 1303134157*/
App::import('Model', 'Onstage');

class OnstageTestCase extends CakeTestCase {
	var $fixtures = array('app.onstage', 'app.single', 'app.city', 'app.picture', 'app.user');

	function startTest() {
		$this->Onstage =& ClassRegistry::init('Onstage');
	}

	function endTest() {
		unset($this->Onstage);
		ClassRegistry::flush();
	}

}
?>