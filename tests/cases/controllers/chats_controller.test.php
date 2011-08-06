<?php
/* Chats Test cases generated on: 2011-04-25 05:04:39 : 1303708779*/
App::import('Controller', 'Chats');

class TestChatsController extends ChatsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ChatsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.chat', 'app.user', 'app.single', 'app.city', 'app.picture', 'app.onstage', 'app.photo');

	function startTest() {
		$this->Chats =& new TestChatsController();
		$this->Chats->constructClasses();
	}

	function endTest() {
		unset($this->Chats);
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