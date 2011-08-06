<?php
/* Onstages Test cases generated on: 2011-04-18 13:04:09 : 1303134189*/
App::import('Controller', 'Onstages');

class TestOnstagesController extends OnstagesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class OnstagesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.onstage', 'app.single', 'app.city', 'app.picture', 'app.user');

	function startTest() {
		$this->Onstages =& new TestOnstagesController();
		$this->Onstages->constructClasses();
	}

	function endTest() {
		unset($this->Onstages);
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

}
?>