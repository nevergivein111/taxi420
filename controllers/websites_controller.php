<?php
class WebsitesController extends AppController {

	var $name = 'Websites';
	
function beforeFilter()
	{
		
			$user = $this->Session->read('Auth');
	
	if(isset($user['User']['id']))
	{
	$this->user_id=$user['User']['id'];
	$this->username=$user['User']['username'];
	
		$this->loadModel("Single");
	
		$stage = $this->Single->find('first',array('conditions'=>array('Single.user_id'=>$this->user_id)));
	
	
		$this->loadModel("Chat");
			$unread = $this->Chat->find('count',array('conditions'=>array('Chat.toUser'=>$this->user_id,'Chat.read'=>'no')));
		
		$this->set(compact('stage','unread'));
	
	}

		//if ($this->only(array('delete','edit','view','changepassword'))) 
		//{ $this->usercanEdit('User', $this->params['pass'][0]); }

		$this->Auth->allow('view');

	
	}
	
	
	function index() {
					if($this->username != "admin" ) {  
	 $this->Session->setFlash('Invalid Admin Access','flash_error');
			$this->redirect(array('controller'=>'onstages','action' => 'home'));
		}
		$this->Website->recursive = 0;
		$this->set('websites', $this->paginate());
	}

	function view($id = null) {

		if (!$id) {
			$this->Session->setFlash(__('Invalid website', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('website', $this->Website->read(null, $id));
	}

	function add() {
					if($this->username != "admin" ) {  
	 $this->Session->setFlash('Invalid Admin Access','flash_error');
			$this->redirect(array('controller'=>'onstages','action' => 'home'));
		}
		if (!empty($this->data)) {
			$this->Website->create();
			if ($this->Website->save($this->data)) {
				$this->Session->setFlash(__('The website has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The website could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
					if($this->username != "admin" ) {  
	 $this->Session->setFlash('Invalid Admin Access','flash_error');
			$this->redirect(array('controller'=>'onstages','action' => 'home'));
		}
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalid website','flash_error');
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Website->save($this->data)) {
				$this->Session->setFlash(__('The website has been saved', true));
				$this->redirect(array('controller'=>'singles','action' =>'account'));
			} else {
				$this->Session->setFlash('The website could not be saved. Please, try again.','flash_error');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Website->read(null, $id);
		}
	}

	function delete($id = null) {
					if($this->username != "admin" ) {  
	 $this->Session->setFlash('Invalid Admin Access','flash_error');
			$this->redirect(array('controller'=>'onstages','action' => 'home'));
		}
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for website', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Website->delete($id)) {
			$this->Session->setFlash(__('Website deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Website was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>