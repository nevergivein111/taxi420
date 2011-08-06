<?php 
class OnstagesController extends AppController {

	var $name = 'Onstages';
	var $paginate =array('limit'=>'6','order' => array("Onstage.id" => 'DESC'));
		function beforeFilter()
	{
		 
		$user = $this->Session->read('Auth');
	
	if(isset($user['User']['id']))
	{
	$this->user_id=$user['User']['id'];
	$this->username=$user['User']['username'];
	}
	


	$this->Auth->allow('index','video','home','view');
	
	
	

	
	
	
		//if ($this->only(array('delete','edit','view','changepassword'))) 
		//{ $this->usercanEdit('User', $this->params['pass'][0]); }
		if ($this->only(array('index','view','home'))) 
		{		$this->loadModel('Single');
				$profiles = $this->Single->find('all',array('order'=>array('Single.id'=>'desc'),'limit'=>'7','fields'=>array('Single.id,Single.name,Single.slug'),array('recursive' => 1)));
				$this->set(compact('profiles'));
			}
		$cityList = $this->Onstage->find('all',array('order'=>array('Onstage.id'=>'desc')));
		$this->set(compact('cityList'));
		$this->set("title_for_layout","Taxi420 Girls and boys Everywhere"); 	
	
	}


	function index() {

		$this->set('onstages', $this->paginate());
	}
	
	function home() {
$this->loadModel('Photo');
  /*  $new=$this->Photo->query("SELECT Singles.name,Singles.id, Singles.city, Onstages.time
FROM Singles
INNER JOIN Onstages
ON Singles.id=Onstages.single_id
ORDER BY Singles.id");
pr($new);
exit();
*/
		
		$this->Onstage->recursive = 2;
		$onstage = $this->Onstage->find('first',array('conditions'=>array('Onstage.home'=>'1')));
		$this->loadModel('Photo');
		$photos = $this->Photo->find('all',array('conditions'=>array('Photo.single_id'=>$onstage['Single']['id'])));
	$onstages = $this->Onstage->find('all',array('order'=>array('Onstage.id'=>'desc'),'limit'=>'4'));
 		$onstageCity=$onstage['Single']['city'];
		$countphotos=count($photos);
	$this->set("title_for_layout",$onstage['Single']['name']); 
	$this->set("meta_description",$onstage['Single']['details']);
    $this->set("meta_keywords", "single,girls,boys,dating,pictures");
	
		$this->set(compact('onstage','onstageCity','photos','onstages','profiles','countphotos'));
		
		}
	
	function homepage($id){
			if($this->username != "admin" ) {  
	 $this->Session->setFlash('Invalid Admin Access','flash_error');
			$this->redirect(array('controller'=>'onstages','action' => 'home'));
		}
		
		
		$this->autoRender = false;
	

$home = $this->Onstage->find('first',array('conditions'=>array('Onstage.home'=>'1')));

if(!empty($home)){
		$data['Onstage']['id']=$home['Onstage']['id'];
		$data['Onstage']['home']="0";
         $this->Onstage->save($data); 
		
	}
		$newdata['Onstage']['id']=$id;
		$newdata['Onstage']['home']="1";
         if($this->Onstage->save($newdata)){
			 	$this->Session->setFlash(__('New Home Stage Set', true));
				$this->redirect(array('action' =>'index'));
			 
			 } 
		

	}
	
	function video($id) {
		$this->layout="hmm";
$single = $this->Onstage->Single->find('first',array('conditions'=>array('Single.id'=>$id)));	
		
			$this->set(compact('single'));
		
		}

	function view($id = null,$slug=null) {
			$this->Onstage->recursive = 2;
		if (!$id) {
			$this->Session->setFlash('Invalid onstage','flash_error');
			$this->redirect(array('action' => 'index'));
			
		}
		$onstage= $this->Onstage->read(null, $id);
		$this->loadModel('Photo');
		$photos = $this->Photo->find('all',array('conditions'=>array('Photo.single_id'=>$onstage['Single']['id'])));
	$onstages = $this->Onstage->find('all',array('order'=>array('Onstage.id'=>'desc'),'limit'=>'4'));
	$cityList = $this->Onstage->find('all',array('order'=>array('Onstage.id'=>'desc')));
 		$onstageCity=$onstage['Single']['city'];
		
		$countphotos=count($photos);
		
      $this->set("title_for_layout",$onstage['Single']['name']); 
		   $this->set("meta_description", $onstage['Single']['details']);
    $this->set("meta_keywords", "single,girls,boys,dating,pictures");
	
		$this->set(compact('onstage','onstageCity','photos','onstages','cityList','countphotos'));
	}



	function edit($id = null) {
				if($this->username != "admin" ) {  
	 $this->Session->setFlash('Invalid Admin Access','flash_error');
			$this->redirect(array('controller'=>'onstages','action' => 'home'));
		}
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalid onstage', 'flash_error');
			$this->redirect(array('action' => 'index'));
		}
	
		
		if (!empty($this->data)) {
	
				if(empty($this->data['Onstage']['photo']))
	{
	$this->data['Onstage']['photo']="yes";
	}
			
			if ($this->Onstage->save($this->data)) {
				$this->Session->setFlash(__('The onstage has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The onstage could not be saved. Please, try again.','flash_error');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Onstage->read(null, $id);
		}
		$single = $this->Onstage->read(null, $id);
		$this->set(compact('single'));
	}

	function delete($id = null) {
				if($this->username != "admin" ) {  
	 $this->Session->setFlash('Invalid Admin Access','flash_error');
			$this->redirect(array('controller'=>'onstages','action' => 'home'));
		}
		if (!$id) {
			$this->Session->setFlash('Invalid id for onstage','flash_error');
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Onstage->delete($id)) {
			$this->Session->setFlash(__('Onstage deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash('Onstage was not deleted','flash_error');
		$this->redirect(array('action' => 'index'));
	}
}
?>