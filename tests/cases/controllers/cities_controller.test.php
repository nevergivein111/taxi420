<?php
/* Cities Test cases generated on: 2011-04-13 10:04:42 : 1302689802*/
App::import('Controller', 'Cities');

class TestCitiesController extends CitiesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class CitiesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.city', 'app.single', 'app.picture', 'app.user');

	function startTest() {
		$this->Cities =& new TestCitiesController();
		$this->Cities->constructClasses();
	}

	function endTest() {
		unset($this->Cities);
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