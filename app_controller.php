<?php
date_default_timezone_set('Asia/Karachi');
?>
<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */
define('LINK','/single/');
define('JSS','/single/webroot/js/');
define('ROOTE','/single/webroot/img/');
define('PATH','c:/wamp/www/single/webroot/img/uploads/');
//define('PATH','/srv/www/vhosts/singleonstage.com/httpdocs/single/webroot/img/uploads/');
define('VIDEOPATH','c:/wamp/www/single/webroot/img/videos/');
//define('VIDEOPATH','/srv/www/vhosts/singleonstage.com/httpdocs/single/webroot/img/videos/');
define('PATH2','c:/wamp/www/single/webroot/img/uploads/small/');
//define('PATH2','/srv/www/vhosts/singleonstage.com/httpdocs/single/webroot/img/uploads/small/');
define('PATH3','c:/wamp/www/single/webroot/img/uploads/medium/');
//define('PATH3','/srv/www/vhosts/singleonstage.com/httpdocs/single/webroot/img/uploads/medium/');
class AppController extends Controller {
var $components = array('Session','Auth');
var $helpers = array('Html','Form','Session','Text','Javascript');

	
function beforeFilter()
	{

	$this->Auth->flashElement="auth";
	$user = $this->Session->read('Auth');
	if(isset($user['User']['id']))
	{
	$this->user_id=$user['User']['id'];
	$this->username=$user['User']['username'];
	}

	}

	function _flash($message,$type='message') {
		$messages = (array)$this->Session->read('Message.multiFlash');
	$messages[] = array(
    'message' => $message, 
    'element' => 'default', 
    'params' => array( 'class' => $type ),
);
		$this->Session->write('Message.multiFlash', $messages);
	}
		
		



function redirectToNamed()
	{
		
	  $urlArray = $this->params['url'];
		unset($urlArray['url']);
		unset($urlArray['x']);
		unset($urlArray['y']);
		if (!empty($urlArray)) 
		{
		  $this->redirect($urlArray, null, true);
		}
		
	}
	
function __findExtvideo($filename){
    $exts = array(
        '.flv' => 'video',
		'.FLV' => 'video',
		'.mp4'=>'mp4',
		'.MP4'=>'MP4'

    );
    $ext = strrchr($filename,'.');

    if (array_key_exists($ext,$exts)) 
	{ return $ext; }
    else 
	{ return NULL; }
}


	
	  function only($actions = array())
  	{
  	  foreach ($actions as $action) 
  	  {
  	    if ($action == $this->params['action']) 
  	    {
  	      return true;
  	    }
  	  }
  	  return false;
  	}
	
	function canEdit($model, $id)
	{

    $record = $this->{$model}->find(array("$model.id" => $id));
		if ($record[$model]['user_id'] != $this->Auth->user('id') && $this->username != "admin") 
		{
		 $this->Session->setFlash('you are not allowed to do this','flash_error');
		 $this->redirect("/");
		}
	}
	
	function __findExt($filename){
    $exts = array(
        '.jpg' => 'image',
        '.png' => 'image',
		'.bmp' => 'image',
		'.gif' => 'image',
		'.JPG' => 'image',
        '.PNG' => 'image',
		'.BMP' => 'image',
		'.GIF' => 'image'
    );
    $ext = strrchr($filename,'.');
    if (array_key_exists($ext, $exts)) 
	{ return $ext; }
    else 
	{ return NULL; }
}
	
	
	
	
	// var $components = array('Session','Auth');
}
