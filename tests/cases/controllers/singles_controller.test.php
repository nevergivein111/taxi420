<?php
/* Singles Test cases generated on: 2011-04-13 10:04:23 : 1302689843*/
App::import('Controller', 'Singles');

class TestSinglesController extends SinglesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class SinglesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.single', 'app.city', 'app.picture', 'app.user');

	function startTest() {
		$this->Singles =& new TestSinglesController();
		$this->Singles->constructClasses();
	}

	function endTest() {
		unset($this->Singles);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

	function testAdminIndex() {

	}

	function testAdminView() {

	}

	function testAdminAdd() {

	}

	function testAdminEdit() {

	}

	function testAdminDelete() {

	}

}
?>