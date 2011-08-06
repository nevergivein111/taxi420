<?php
class ChatsController extends AppController {
	var $paginate =array('limit'=>'15','order' => array("Chat.id" => 'DESC'));

	var $name = 'Chats';
	
		function beforeFilter()
	{
	
	// $this->Auth->allow('index','view');
		$this->user_id = $this->Auth->user('id');
		//if ($this->only(array('delete','edit','view','changepassword'))) 
		//{ $this->usercanEdit('User', $this->params['pass'][0]); }
		$this->loadModel('Onstage');
		$cityList = $this->Onstage->find('all',array('order'=>array('Onstage.id'=>'desc')));
		$this->set(compact('cityList'));
$unread = $this->Chat->find('count',array('conditions'=>array('Chat.toUser'=>$this->user_id,'Chat.read'=>'no')));

$this->set(compact('unread'));	
	$this->set("title_for_layout","Single On Stage");
	
	}
		
	function checkboxdel()
	{
	
	$checks=$_POST['d'];
	
	
	if($_POST['opt']=='delete')
	{
		
	foreach($checks as $check)
	{
	$message = $this->Chat->find('first',array('conditions'=>array('Chat.id'=>$check)));
	
	
	if($message['Chat']['del']==0)
	{
	
	
		$data['Chat']['id']=$check;
		$data['Chat']['del']=$this->user_id;
		$data['Chat']['read']="yes";
		
		$reader= $this->Chat->find('all',array('conditions'=>array('Chat.refid'=>$check)));
if(!empty($reader)) {
	foreach ($reader as $reads)
	{
			$dating['Chat']['id']=$reads["Chat"]["id"];
			$dating['Chat']['read']="yes";
	
		$this->Chat->save($dating);
		}
}
		
		
			
	$this->Chat->save($data);
			$this->Session->setFlash(__('The chat has been deleted', true));
		
			
	
	}
	else 
	{
			
			
			
	$this->Chat->delete($check);
	
	$delets = $this->Chat->find('all',array('conditions'=>array('Chat.refid'=>$check)));

	foreach ($delets as $del)
	{
		
		$this->Chat->delete($del["Chat"]["id"]);
		
		}
	
		$this->Session->setFlash(__('The chat has been deleted', true));
			
			
	
			
			}
		
		
		}
		

		
		
	}

	$this->redirect(array('action' => 'index'));
	
}
	
	

	function index() {
		$this->Chat->recursive = 2;
		
		$cond=array( "Chat.refid"=>"0",
		"Chat.del <>"=>$this->user_id,
		"OR" => array (
	"Chat.user_id" => $this->user_id,
	"Chat.toUser" => $this->user_id
    )
);

$this->loadModel("Single");
$chats=$this->paginate($cond);







$unreadArray=array();


$noread = $this->Chat->find('all',array('conditions'=>array('Chat.toUser'=>$this->user_id,'Chat.read'=>'no')));


foreach ($noread as $read)
{
	if($read["Chat"]["refid"] == 0)
	{
		$unreadArray[]= $read["Chat"]["id"];
		
		}
		else{
$unreadArray[]= $read["Chat"]["refid"];
		}
}






$i=0;	
// for displaying pictures on index
foreach ($chats as $chat)
{
	if($chat["Chat"]["user_id"] == $this->user_id)
	{
		$othersingle = $this->Single->find('first',array('conditions'=>array('Single.user_id'=>$chat["Chat"]["toUser"])));	
	$chats[$i]["other"]=$othersingle;
	
		if(in_array($chat["Chat"]["id"],$unreadArray))
	{
		$chats[$i]["new"]="yes";
		
		}
			$i++;
		
		}
		
	elseif($chat["Chat"]["toUser"] == $this->user_id) 
	{
$othersingle = $this->Single->find('first',array('conditions'=>array('Single.user_id'=>$chat["Chat"]["user_id"])));	
	$chats[$i]["other"]=$othersingle;
		
		
		if(in_array($chat["Chat"]["id"],$unreadArray))
	{
		$chats[$i]["new"]="yes";
		
		}
		$i++;
		
	}
	
	
	
}  //endforach



	
	
	//for unread msgs

	
$unread = $this->Chat->find('count',array('conditions'=>array('Chat.toUser'=>$this->user_id,'Chat.read'=>'no')));




//for diffrntiat creat profile ,edit profile 

	$stage = $this->Single->find('first',array('conditions'=>array('Single.user_id'=>$this->user_id)));
$this->set(compact('chats','stage','unread','unreadArray'));
	}

	function view($id = null) {
		$this->Chat->recursive = 2;
		if (!$id) {
			$this->Session->setFlash('Invalid chat','flash_error');
			$this->redirect(array('action' => 'index'));
			
		}
		
	
$conditions=array( "OR" => array (
	"Chat.id" => $id,
	"Chat.refid " =>$id
    )
);


$chats =$this->Chat->find('all', array('conditions' => $conditions));

foreach ($chats as $chat)
{
	
	
	
		
	if($chat["Chat"]["toUser"] == $this->user_id) 
	{

	$data["Chat"]["id"]=$chat["Chat"]["id"];
	$data["Chat"]["read"]="yes";

	$this->Chat->save($data);
	}

	}
	
	
	$chat=$this->Chat->read(null,$id);
	$this->loadModel("Single");
$stage = $this->Single->find('first',array('conditions'=>array('Single.user_id'=>$this->user_id)));
			
	
		$this->set(compact('chat','chats',"stage"));
	}








function view2($id = null) {
		$this->Chat->recursive = 2;
		if (!$id) {
			$this->Session->setFlash('Invalid chat','flash_error');
			$this->redirect(array('action' => 'index'));
			
		}
		
	
$conditions=array( "OR" => array (
	"Chat.id" => $id,
	"Chat.refid " =>$id
    )
);


$chats =$this->Chat->find('all', array('conditions' => $conditions));

foreach ($chats as $chat)
{
	
	
	
		
	if($chat["Chat"]["toUser"] == $this->user_id) 
	{

	$data["Chat"]["id"]=$chat["Chat"]["id"];
	$data["Chat"]["read"]="yes";

	$this->Chat->save($data);
	}

	}
	
	
	$chat=$this->Chat->read(null,$id);
	$this->loadModel("Single");
$stage = $this->Single->find('first',array('conditions'=>array('Single.user_id'=>$this->user_id)));
			
	
		$this->set(compact('chat','chats',"stage"));
	}
















	function add($to) {
		$this->layout="hmm";
			if (empty($to)) {
			$this->Session->setFlash('Invalid chat','flash_error');
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
		
		$this->loadModel("Single");
		
		$user=$this->Chat->User->findById($to); 
		
		
		$result=$this->Single->find('first', array(
    'conditions' => array('Single.id'=>$user["Single"]["0"]["id"]), //array of conditions
    'fields' => array('wantToMarry', 'wantToFlirt','wantToRelationship','dontKnow') //array of field names
));

		if(empty($this->data['Chat']['message']))
		{
			
					$this->Session->setFlash('message Cant Be Empty','flash_error');
			$this->redirect(array('controller'=>'singles','action' =>'view',$user["Single"]["0"]["slug"]));
			
			}


		if(!empty($this->data['Chat']['wantToMarry']))
		{
			$wantmarry=$result["Single"]["wantToMarry"]+1;
			$this->Single->id=$user["Single"]["0"]["id"];
		    $this->Single->saveField('wantToMarry', $wantmarry);
		
			
			}
			
			if(!empty($this->data['Chat']['wantToFlirt']))
		{
			$wantToFlirt=$result["Single"]["wantToFlirt"]+1;
			$this->Single->id=$user["Single"]["0"]["id"];
		    $this->Single->saveField('wantToFlirt', $wantToFlirt);
		
			
			}
			
			if(!empty($this->data['Chat']['wantToRelationship']))
		{
			$wantToRelationship=$result["Single"]["wantToRelationship"]+1;
			$this->Single->id=$user["Single"]["0"]["id"];
		    $this->Single->saveField('wantToRelationship', $wantToRelationship);
		
			
			}
			
			if(!empty($this->data['Chat']['dontKnow']))
		{
			$dontKnow=$result["Single"]["dontKnow"]+1;
			$this->Single->id=$user["Single"]["0"]["id"];
		    $this->Single->saveField('dontKnow', $dontKnow);
		
			
			}
		
			
			
		
		
			$this->data['Chat']['toUser']=$to;
			$this->data['Chat']['user_id']=$this->user_id;
			$this->data['Chat']['date']=time();
			if(isset($this->data['Chat']['ref']))
			{
				$this->data['Chat']['refid']=$this->data['Chat']['ref'];
				$chate=$this->Chat->findById($this->data['Chat']['ref']); 
				if($chate["Chat"]["del"] != "0")
				{
					$this->Chat->id=$this->data['Chat']['ref'];
					$this->Chat->saveField('del', '0');
					
					}
			
				}
		
			//if($this->data['Chat'][''])
			$this->Chat->create();
			if ($this->Chat->save($this->data)) {
				$this->Session->setFlash(__('The Message has been sent', true));
				if(isset($this->data['Chat']['ref']))
			{
				$this->redirect(array('action' => 'view',$this->data['Chat']['ref']));
				}
				
				$this->redirect(array('action' => 'view',$this->Chat->id));
			} else {
				$this->Session->setFlash('The message could not be send. Please, try again.','flash_error');
			}
		}
	
		$users = $this->Chat->User->find('list');
		$this->set(compact('users','to'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalid chat','flash_error');
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Chat->save($this->data)) {
				$this->Session->setFlash(__('The chat has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The chat could not be saved. Please, try again.','flash_error');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Chat->read(null, $id);
		}
		$users = $this->Chat->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for chat','flash_error');
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Chat->delete($id)) {
			$this->Session->setFlash(__('Chat deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash('Chat was not deleted','flash_error');
		$this->redirect(array('action' => 'index'));
	}
}
?>