<?php
/* Pictures Test cases generated on: 2011-04-13 10:04:09 : 1302689829*/
App::import('Controller', 'Pictures');

class TestPicturesController extends PicturesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class PicturesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.picture', 'app.single', 'app.city', 'app.user');

	function startTest() {
		$this->Pictures =& new TestPicturesController();
		$this->Pictures->constructClasses();
	}

	function endTest() {
		unset($this->Pictures);
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