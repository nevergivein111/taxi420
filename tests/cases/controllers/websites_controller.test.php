<?php
/* Websites Test cases generated on: 2011-05-23 14:31:23 : 1306143083*/
App::import('Controller', 'Websites');

class TestWebsitesController extends WebsitesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class WebsitesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.website');

	function startTest() {
		$this->Websites =& new TestWebsitesController();
		$this->Websites->constructClasses();
	}

	function endTest() {
		unset($this->Websites);
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