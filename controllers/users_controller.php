<?php
uses('sanitize');
class UsersController extends AppController {

	var $name = 'Users';
	var $paginate =array('limit'=>'7','order' => array("User.id" =>'DESC'));
	var $components = array('Email');
	
function beforeFilter()
	{
		
		
		parent::beforeFilter();

	
		
	if(isset($user['User']['id']))
	{
	$this->user_id=$user['User']['id'];
	$this->username=$user['User']['username'];
	}
	

	$this->Auth->allow('add','forgot','activate');
	

		//if ($this->only(array('delete','edit','view','changepassword'))) 
		//{ $this->usercanEdit('User', $this->params['pass'][0]); }
	$this->Session->write('Auth.redirect', null);
		$this->loadModel('Onstage');
		
		$cityList = $this->Onstage->find('all',array('order'=>array('Onstage.id'=>'desc')));
		$this->set(compact('cityList'));

$this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'login'); 
	$this->set("title_for_layout","Taxi420 Girls and boys Everywhere"); 	

	}
	
	
	
	
	
	
	
	
	function login() {
	
	$this->Session->write('Auth.redirect', null);
	$this->Auth->flashElement="auth";

                // Check for incoming login request.
           
                        // Use the AuthComponent's login action
                        if ($this->Auth->user('id')) {
							
							$user = $this->Session->read('Auth.User');
							
					
                                // Retrieve user data
   $results = $this->User->find(array('User.username' => $user['username']), array('User.active'), null, false);
   
 
                                // Check to see if the User's account isn't active
                                if ($results['User']['active'] == 0) {
                                        // Uh Oh!
                                        $this->Session->setFlash('Your account has not been activated yet!','flash_error');
                                        $this->Auth->logout();
                                        $this->redirect('/users/login');
                                }
                                // Cool, user is active, redirect post login
                                else {
                                        $this->redirect('/singles/account');
                                }
                        }
           
        }
	
	
	function __getActivationHash()
	{
	$this->autoRender = false;
	        if (!isset($this->User->id)) {
                        return false;
                }
		
	
 return substr(Security::hash(Configure::read('Security.salt') . $this->User->field('created')), 0, 8);
        
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
/*	function login() {

     		if($this->user_id==17)
		{
		$user = $this->Session->read('Auth');
  $this->redirect('/singles/account'); 
		}
    }  */
	



		
		  function logout() {
			  $this->Auth->flashElement="auth";
  $this->Session->destroy('user');
  $this->Session->setFlash('You\'ve successfully logged out.','auth');
   $this->redirect('login'); 
  }
  
  
  
  

  
  
  
  function changepassword() {
                if (!empty($this->data)) {
                        $this->User->recursive = -1;
                        $user = $this->User->findById($this->Auth->User('id'));
if($this->Auth->password($this->data['User']['old_password'])==$user['User']['password'])
 {
$this->data['User']['password']= $this->Auth->password($this->data['User']['password']);
$this->data['User']['id']=$this->Auth->User('id');
     if ($this->User->save($this->data)) {
     $this->Session->setFlash('Password reseted.');
   $this->redirect(array('controller'=>'singles','action'=>'account'));
 } else {
    $this->Session->setFlash('Password not reseted','flash_error');
         }
        }
      else
         $this->Session->setFlash('The old password is not right. Please
write it again.','flash_error');
                }

                if (isset($this->data['User']['password']))
                        unset($this->data['User']['password']);
                if (isset($this->data['User']['password_confirm']))
                        unset($this->data['User']['password_confirm']);
                if (isset($this->data['User']['old_password']))
                        unset($this->data['User']['old_password']);
						
						
						
	$this->loadModel("Single");
		$stage = $this->Single->find('first',array('conditions'=>array('Single.user_id'=>$this->user_id)));
	
	
		$this->loadModel("Chat");
			$unread = $this->Chat->find('count',array('conditions'=>array('Chat.toUser'=>$this->user_id,'Chat.read'=>'no')));
		
		$this->set(compact('stage','unread'));
						
						
						
        } 
		
		
	function forgot() {
  if(!empty($this->data)) {
	    $user =$this->User->find('first',array('conditions'=>array('User.email'=>$this->data['User']['email'])));

    if($user) {
      $user['User']['tmp_password'] = $this->User->createTempPassword(7);
      $user['User']['password'] = $this->Auth->password($user['User']['tmp_password']);
      if($this->User->save($user, false)) {
        $this->__sendPasswordEmail($user, $user['User']['tmp_password'],$user['User']['username']);
        $this->Session->setFlash('An email has been sent with your new password.');
        $this->redirect($this->referer());
      }
    } else {
      $this->Session->setFlash('No user was found with the submitted email address.','flash_error');
    }
  }
}
	

	function __sendPasswordEmail($user, $password,$username) {
  if ($user === false) {
    debug(__METHOD__." failed to retrieve User data for user.id: {$user['User']['id']}");
    return false;
  }
  $this->set('user', $username);
  $this->set('password', $password);
  $this->Email->to = $user['User']['email'];
  $this->Email->bcc = array('Password Change Request');
  $this->Email->subject = 'Password Change Request';
  $this->Email->from = 'contact@taxi420.com.com';
    $this->Email->template = 'contact2';
    $this->Email->sendAs = 'html'; // because we like to send pretty mail
  $this->Session->setFlash('A new password has been sent to your supplied email address.');
  return $this->Email->send();
}
			 
			 
						 
		
	

	
  
  
  
								 
	function index() {
					if($this->username != "admin" ) {  
	 $this->Session->setFlash('Invalid Admin Access','flash_error');
			$this->redirect(array('controller'=>'onstages','action' => 'home'));
		}
	
		$this->User->recursive = 2;
		$this->set('users', $this->paginate());
	


	
	$this->loadModel("Single");
		$stage = $this->Single->find('first',array('conditions'=>array('Single.user_id'=>$this->user_id)));
	
	
		$this->loadModel("Chat");
			$unread = $this->Chat->find('count',array('conditions'=>array('Chat.toUser'=>$this->user_id,'Chat.read'=>'no')));
		
		$this->set(compact('stage','unread'));
					







	}
	

	function view($id = null) {
					if($this->username != "admin" ) {  
	 $this->Session->setFlash('Invalid Admin Access','flash_error');
			$this->redirect(array('controller'=>'onstages','action' => 'home'));
		}
		
		if (!$id) {
			$this->Session->setFlash('Invalid user','flash_error');
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			
			if(($this->data["User"]["ist"]+$this->data["User"]["2nd"]) != $_POST["check"]) {$this->redirect(array('action' => 'add')); }
			
				if( ($this->params['form']['DateOfBirth_Month'] != "123") && ($this->params['form']['DateOfBirth_Year'] != "123") ) 	
	 	
					{
						$how =	$this->params['form']['DateOfBirth_Day'];
						$how .=	"-".$this->params['form']['DateOfBirth_Month'];
						$how .=	"-".$this->params['form']['DateOfBirth_Year'];
	
						$this->data['User']['dateOfBirth']=$how;
						$p_strDate=$how;
						list($d,$m,$Y)    = explode("-",$p_strDate);
    
						$years            = date("Y") - $Y;
    
						if( date("md") < $m.$d ) { $years--; }
						$this->data['User']['age']=$years;
						
						$this->User->create();
						if ($this->User->save($this->data)) {
							
							$this->__sendActivationEmail($this->User->getLastInsertID());
				
							$this->Session->setFlash(__('Email has been sent to you Email to comform you as a Valid user', true));
							$this->redirect(array('action' => 'login'));
						} else {
							$this->Session->setFlash('The user could not be saved. Please, try again.','flash_error');
						}
					
					}
					
				elseif(($this->params['form']['DateOfBirth_Month'] == "123") || ($this->params['form']['DateOfBirth_Year'] == "123") ) 
					{
				$this->Session->setFlash('The User could not be saved without proper date of birth','flash_error');
				$this->redirect(array('action' => 'add'));
					
					}
	
		}
	}
	
	
	
	
	
	  function __sendActivationEmail($user_id) {
                $user = $this->User->find(array('User.id' => $user_id), array('User.email', 'User.username','User.id'), null, false);
			
			
                if ($user === false) {
                        debug(__METHOD__." failed to retrieve User data for user.id: {$user_id}");
                        return false;
                }

                // Set data for the "view" of the Email
                $this->set('activate_url', 'http://' . env('SERVER_NAME') .LINK. 'users/activate/' . $user['User']['id'] . '/' . $this->__getActivationHash());
				
		$url= 'http://' . env('SERVER_NAME') .LINK. 'users/activate/' . $user['User']['id'] . '/' . $this->__getActivationHash();
	

                $this->set('username', $user['User']['username']);
               
                $this->Email->to = $user['User']['email'];
                $this->Email->subject = env('SERVER_NAME') . ' – Please confirm your email address';
                $this->Email->from = 'taxi420@' . env('SERVER_NAME');
                $this->Email->template = 'user_confirm';
                $this->Email->sendAs = 'text';   // you probably want to use both :)   
                return $this->Email->send();
        }
		

function activate($user_id = null, $in_hash = null) {
	$this->autoRender = false;
        $this->User->id = $user_id;
        if ($this->User->exists() && ($in_hash == $this->__getActivationHash()))
        {
                // Update the active flag in the database
                $this->User->saveField('active', 1);
               
                // Let the user know they can now log in!
				$this->Session->setFlash('Your account has been activated, please log in below','auth');
				$this->redirect(array('controller'=>'users','action' => 'login'));
        }
		else{
					$this->Session->setFlash('Invalid Code for user SO Verification is failed','auth');
			$this->redirect(array('action' => 'login'));
			
			}
       
        // Activation failed, render '/views/user/activate.ctp' which should tell the user.
}


function suspend($user_id = null)
{
				if($this->username != "admin" ) {  
	 $this->Session->setFlash('Invalid Admin Access','flash_error');
			$this->redirect(array('controller'=>'onstages','action' => 'home'));
		}
		$this->autoRender = false;
        $this->User->id = $user_id;
        if ($this->User->exists())
        {
                // Update the active flag in the database
                $this->User->saveField('active', 0);
               
                // Let the user know they can now log in!
                $this->Session->setFlash('account has been Suspended');
                $this->redirect('/users');
        }
	
	
	}
	
	
function reactivate($user_id = null)
{
				if($this->username != "admin" ) {  
	 $this->Session->setFlash('Invalid Admin Access','flash_error');
			$this->redirect(array('controller'=>'onstages','action' => 'home'));
		}
		$this->autoRender = false;
        $this->User->id = $user_id;
        if ($this->User->exists())
        {
                // Update the active flag in the database
                $this->User->saveField('active', 1);
               
                // Let the user know they can now log in!
                $this->Session->setFlash(' account has been activated');
                $this->redirect('/users');
        }
	
	
	}
	
	
	
	
	
	
	
	

	function edit($id = null) {
					if($this->username != "admin" ) {  
	 $this->Session->setFlash('Invalid Admin Access','flash_error');
			$this->redirect(array('controller'=>'onstages','action' => 'home'));
		}
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalid user','flash_error');
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The user could not be saved. Please, try again.','flash_error');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
	}

	function delete($id = null) {
					if($this->username != "admin" ) {  
	 $this->Session->setFlash('Invalid Admin Access','flash_error');
			$this->redirect(array('controller'=>'onstages','action' => 'home'));
		}
		if (!$id) {
			$this->Session->setFlash('Invalid id for user','flash_error');
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash('User was not deleted','flash_error');
		$this->redirect(array('action' => 'index'));
	}
}
?>