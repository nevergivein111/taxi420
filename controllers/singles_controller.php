<?php
App::import('Sanitize');
class SinglesController extends AppController {

	var $name = 'Singles';
	var $paginate =array('limit'=>'7','order' => array("Single.id" =>'DESC'));
	var $components = array('Email');
	function beforeFilter()
	{

	
	$this->Auth->allow('index','view','search','contact','about','news','ok');
	
	
		 
		$user = $this->Session->read('Auth');
	
	if(isset($user['User']['id']))
	{
	$this->user_id=$user['User']['id'];
	$this->username=$user['User']['username'];
	}
	
	
	if ($this->only(array('delete','edit','removevideo','deletephoto','addpic','photos','changepic'))) 
	
		{ $this->canEdit('Single', $this->params['pass'][0]); }
		
		
		
		//if ($this->only(array('delete','edit','view','changepassword'))) 
		//{ $this->usercanEdit('User', $this->params['pass'][0]); }
			if ($this->only(array('index','view','search'))) 
		{	
$profiles = $this->Single->find('all',array('order'=>array('Single.id'=>'desc'),'limit'=>'7','fields'=>array('Single.id,Single.name,Single.slug'),array('recursive' => 1)));
				$this->set(compact('profiles'));
			}
			
			
					if ($this->only(array('account','edit','add','changepic','changepassword'))) 
		{	
		$this->loadModel("Chat");
$unread = $this->Chat->find('count',array('conditions'=>array('Chat.toUser'=>$this->user_id,'Chat.read'=>'no')));
				$this->set(compact('unread'));
					$this->set("title_for_layout","Taxi420 Girls and boys Everywhere");
			}
			
		
			

		$cityList = $this->Single->Onstage->find('all',array('order'=>array('Onstage.id'=>'desc')));
		$this->set(compact('cityList'));	
	
	}
	
		function messages() {
		$this->_flash(__('Normal message.', true),'message');
		$this->_flash(__('Info message.', true),'info');
		$this->_flash(__('Success message.', true),'success');
		$this->_flash(__('Warning message.', true),'warning');
		$this->_flash(__('Error message.', true),'error');
	  $this->Session->setFlash('Please Enter information again.','flash_error');
		
	}
	
	
	
	

	function index() {
		$this->Single->recursive = 0;
		
		if(isset($this->username) && $this->username == "admin")
		{
		
		$conditions = array("User.active"=>"1");
		
		}	else {
			
				$conditions = array("User.active"=>"1","Single.active"=>"1");
			}
		$singles=$this->paginate("Single",$conditions);

		$this->loadModel("Onstage");
	$i=0;

	foreach($singles as $single)
	{
	$stage = $this->Onstage->find('first',array('conditions'=>array('Onstage.single_id'=>$single['Single']['id'])));
	if(!empty($stage))
	{
		
		$singles[$i]["there"]="yes";
		
		}
	
	$i++;
	}
	$this->set("title_for_layout","Single Profiles");

 
    
 

		$this->set(compact("singles"));
	}
	
	function active($id)
	{
         
		if($this->username != "admin" ) {  
	 $this->Session->setFlash('Invalid Admin Access','flash_error');
			$this->redirect(array('controller'=>'onstages','action' => 'home'));
		}
		$this->autoRender = false;
	if (!$id) {
		 $this->Session->setFlash('Invalid Single','flash_error');
			$this->redirect(array('action' => 'index'));
			
		}
		$this->Single->id=$id;
		    $this->Single->saveField('active', '1');
			$this->Session->setFlash(__('Profile Activated', true));
			$this->redirect(array('action' => 'index'));

		}
		
	function deactive($id)
	{
		if($this->username != "admin" ) {  
		 $this->Session->setFlash('Invalid Admin Access','flash_error');
			$this->redirect(array('controller'=>'onstages','action' => 'home'));
		}
		
		$this->autoRender = false;
	if (!$id) {
			 $this->Session->setFlash('Invalid Single','flash_error');
			$this->redirect(array('action' => 'index'));
			
		}
		$this->Single->id=$id;
		    $this->Single->saveField('active', '0');
			$this->Session->setFlash(__('Profile Deactivated', true));
	$this->redirect(array('action' => 'index'));
		}
	
	
		function account() {
			
	
	$stage = $this->Single->find('first',array('conditions'=>array('Single.user_id'=>$this->user_id)));

	$this->loadModel("Chat");


		$this->set(compact("stage"));		
			
	}
	

	function view($slug = null) {
		
		$this->Onstage->recursive = 2;
		if (!$slug) {
			  $this->Session->setFlash('Invalid Single','flash_error');
		
			$this->redirect(array('action' => 'index'));
			
		}
		
		
		
		$onstage= $this->Single->findBySlug($slug);
		
	
		$this->loadModel('Photo');
		$photos = $this->Photo->find('all',array('conditions'=>array('Photo.single_id'=>$onstage['Single']['id'])));
	$onstages = $this->Single->Onstage->find('all',array('order'=>array('Onstage.id'=>'desc'),'limit'=>'4'));
	$countphotos=count($photos);	
	
 		$onstageCity=$onstage['Single']['city'];
		
		$this->set("title_for_layout",$onstage['Single']['name']); 
		   $this->set("meta_description", $onstage['Single']['details']);
    $this->set("meta_keywords", "single,girls,boys,dating,pictures");
		
		$this->set(compact('onstage','onstageCity','photos','onstages','countphotos'));
		
		
		
	}
	
	
	function search() {
	

	$this->Type->recursive = 0;	

	

	$conditions=array();
	
	if(isset($this->username) && $this->username == "admin")
		{
		
		// $conditions = array("User.active"=>"1");
		
		}	else {
			
				$conditions = array("User.active"=>"1","Single.active"=>"1");
			}
	

	$this->redirectToNamed();



$params = $this->params['named'];


	



if (!empty($params['q'])) 
		{
		$num=strlen($params['q']);
		if($num < 5)
			{
		$search=$params['q'];
		
$conditions = array("lower(Single.name) like '%".low($search)."%'");
         
	
			 }
		 
			else{
		
			 $conditions['MATCH(Single.name,Single.details,Single.city) AGAINST(? IN BOOLEAN MODE)'] =$params['q'];
	          
				  }

		}
		
		elseif(!empty($params['city'])) 
		{
		  $conditions['MATCH(Single.city) AGAINST(? IN BOOLEAN MODE)'] =$params['city'];
	
		}	
		
		
		else {
			
			 $this->Session->setFlash('Invalid search','flash_error');
		 $this->redirect(array('controller'=>'singles','action' => 'index'));
			}
			
		
			
		//  $conditions['Post.publish'] = 1;
		
	
			$singles=$this->paginate('Single',$conditions);
			
				if(!empty($params['city']) && empty($singles)) 
			{
				 $this->Session->setFlash('There was No single Found from Your City, You can Submit the request below ,If any single get On stage from your City we will inform you , If your city is not listed in our Cities than you can contact us By contact us page !','flash_error');
		 $this->redirect(array('controller'=>'singles','action' => 'news'));
				
				}
		
			
		$this->set(compact('singles'));
		
	}
	
	
	
function news()
{
	if(!empty($this->data))
	{
		$this->loadmodel("News");
		if(!empty($this->data["Single"]["city"]))
		{
		$this->data["News"]["city"]=$this->data["Single"]["city"];
		if($this->News->save($this->data))
		{
				   	 $this->Session->setFlash(__('Request Submitted', true));
		 $this->redirect(array('controller'=>'onstages','action' => 'home'));
			
			}
			else {
				 $this->Session->setFlash('Request is denied','flash_error');
				
				}
		
		}
		else{
		 $this->Session->setFlash('City name is Not selected','flash_error');	
		
			}

		}
	
	$this->loadModel("Country");
		$countries = $this->Country->find('list',array('fields' => array('Country.Code','Country.Name')));

		$users = $this->Single->User->find('list');
		$this->set(compact('countries'));
	
	
	}
	
	
function ok($code = null) {
	//this  is for city
	

	  $this->loadModel('City');
	  
	  
	$this->layout="hmm";
	
	//$cities = $this->City->find('list',array('conditions'=>array('City.CountryCode'=>$code),'fields' => array('City.ID','City.Name')));
	$cities = $this->City->find('list',array('conditions'=>array('City.CountryCode'=>$code),'fields' => array('City.Name','City.Name')));
	
	
	
		$this->set(compact('cities'));


	
	}

function add(){
$error=NULL;
$videoresult=NULL;
$stage = $this->Single->find('first',array('conditions'=>array('Single.user_id'=>$this->user_id)));

if(!empty($stage)){
	 $this->Session->setFlash('You already Applied For On Stage!','flash_error');	
	  
		 $this->redirect(array('controller'=>'onstages','action' => 'home'));
		 exit();
}
if (!empty($this->data)){
if(($this->data["Single"]["ist"]+$this->data["Single"]["2nd"]) != $_POST["check"]) {$this->redirect(array('action' => 'add'));exit(); 
}
			$matches=NULL;

     		if(!empty($this->data['File']['video']['name'])  || !empty($this->data['Single']['youtube'])){
				
 	 	  		if(!empty($this->data['File']['video']['name']) && !empty($this->data['Single']['youtube'])){
					
					$this->_flash(__('You can select only one Upload Source For your video!', true),'myerror');
					
					
 	 	
		 			$error=1;
 	 	 		}
 	 	 
				if(!empty($this->data['Single']['youtube'])){
 		 	
 		 	 		preg_match(
 		 	 		'/[\\?\\&]v=([^\\?\\&]+)/',
 		 	 	 	$this->data['Single']['youtube'],
 		 	 	 	$matches
 		 	 	 	);
						if (empty($matches[1])){
								$this->_flash(__('Youtube Link in not valid,Valid Link Should Look like (http://www.youtube.com/watch?v=abcde)!!', true),'myerror');
								
  			  	  		
  			  	  			$error=1;
	
  			  			}
					
				}
    	 	
				if(!empty($this->data['File']['video']['name'])){
    	 	 	 	
    	 	 	 	 $this->data['Document']['submittedfile'] = $this->data['File']['video'];
					 
    	 	 	 	 if($this->data['Document']['submittedfile']['error']=='4' || $this->data['Document']['submittedfile']['error']=='0'){
						 
						 
    	 	 	 	 	 if($this->data['Document']['submittedfile']['error']=='0'){
				   
				   	   		$extension=$this->__findExtvideo($this->data['Document']['submittedfile']['name']);
				   	   		if(empty($extension)){ 
							 $this->Session->setFlash('Wrong extension file.only can upload FLV Singles!','flash_error');
			
				   	   	   			$error=1;
				   	   		}
		
				   	  		if($this->data['Document']['submittedfile']['size'] > 9900000 ){ 
							
							 $this->Session->setFlash('File size should not be Larger than 9 MB','flash_error');
								
				   	   	  	$error=1;
				   	 		}
		
		

  
				   	  	 	$no=rand();
					
				   	 	 	$videofiles=$this->data['Document']['submittedfile'];
				   	   		$this->temp_path2  =   $videofiles['tmp_name'];
				   	 		  $this->videofilename   = ($no).basename($videofiles['name']);
				   	   		$this->videotype       = $videofiles['type'];
				   	  		 $this->videosize       = $videofiles['size'];
				   	  		 //-------------------------------------------------------------------------------------------
				   	  		 $target_path = VIDEOPATH.$this->videofilename;

				   	  		 if(file_exists($target_path)) {
	$this->Session->setFlash(sprintf(__('Duplicate Files %s plz change this file name', true), $this->filename ));
				   	   	  			 $error=1;
				   	  		 }
		  
							if(empty($error)){
				   	  		 	if(move_uploaded_file($this->temp_path2, $target_path)){
				   	   	  $videoresult=1;
		 			  		 	} 
								
					  			 else {
						  			$this->Session->setFlash('The file upload failed, possibly due to incorrect permissions on the upload folder.','flash_error');
									$error=1;
		 
							  	}
							} //error is set
		   
				  		 }   
				
				   		elseif($this->data['Document']['submittedfile']['error']=='4'){ 
				   	   //do nothing
				 		  }
		   

				 	} 
	
		
					 elseif(is_uploaded_file($this->data['Document']['submittedfile']['tmp_name']))
					 {
				 	 $this->Session->setFlash('not a rite uploadebale file','flash_error');
				 	$error=1;	
				 	}
			
					 elseif($this->data['Document']['submittedfile']['error']=='1')
				 	{ 
				 	 $this->Session->setFlash('File size is Larger than upload_max_filesize.','flash_error');
				 	 $error=1;		
				 	}
	//
		
			
				    elseif($this->data['Document']['submittedfile']['error']=='2')
					{
					$this->Session->setFlash('File size is  Larger than form MAX_FILE_SIZE','flash_error');
					$error=1;
				
					}
				     elseif($this->data['Document']['submittedfile']['error']=='3')
					{
					$this->Session->setFlash('Partial upload.','flash_error');
					$error=1;
					}
				      elseif($this->data['Document']['submittedfile']['error']=='5')
					{ 
					$this->Session->setFlash('No temporary directory','flash_error');
					$error=1;
					}
				     elseif($this->data['Document']['submittedfile']['error']=='6')
					{ 
					$this->Session->setFlash('Cant write to disk','flash_error');
					$error=1;
					}
				     elseif($this->data['Document']['submittedfile']['error']=='7')
					{ 
					$this->Session->setFlash('File upload stopped by extension','flash_error');
					$error=1;
					}
					
					if(!empty($this->videofilename)){
					$this->data['Single']['file']=$this->videofilename ;
					}
			

    	 	  }
	
	 	}
		
		
		$this->data['Single']['date']=time();
		$this->data['Single']['user_id']=$this->user_id;
		$str1=$this->stringToSlug($this->data['Single']['name']." From ".$this->data['Single']['city']);
		$str=$this->getUniqueUrl($str1);
		$this->data['Single']['slug']=$str;
		
		$this->Single->create();
		
		if ($this->Single->save($this->data)){
			if(empty($this->data['File']['first']['submittedfile']['name'])){
				$this->_flash(__('You have to upload atleast One Image!', true),'myerror');
			$error=1;
			// it wil delete the post in Else if error in Not equal to null down there
			
			}
			
			
	if(empty($error)) { // if error is not null so in else block it will delete the post
       		$i=0;
			
			$files=$this->data['File'];
			
			
			foreach($files as $filer){
	if(!empty($filer["submittedfile"]["name"]))
	{
	
				$this->data['Document']['submittedfile'] = $filer["submittedfile"];
	
	//

				if($this->data['Document']['submittedfile']['error']=='4' || $this->data['Document']['submittedfile']['error']=='0'){
					 if($this->data['Document']['submittedfile']['error']=='0'){
			  			 $extension=$this->__findExt($this->data['Document']['submittedfile']['name']);
			  			 if(empty($extension))
			  		 		{ 
			   	   			$this->Session->setFlash('Wrong extension file.only can upload jpg.gif,bmp and png','flash_error');
			   	  			 $this->Single->delete_post($this->Single->id);
							 	  if($videoresult == 1){
							unlink(VIDEOPATH.$this->videofilename); 
							}
			   	  			 $this->redirect(array('action' => 'add'));
							 exit();
			  				 }
		
			  				 if($this->data['Document']['submittedfile']['size'] > 4200000 ){ 
			   	  				 $this->Session->setFlash('File size should not be Larger than 4 MB.','flash_error');
								 	  if($videoresult == 1){
								unlink(VIDEOPATH.$this->videofilename); 
									}
			   	  				 $this->Single->delete_post($this->Single->id);
			   	  				 $this->redirect(array('action' => 'add'));
								 exit();
			   	   
			  				 }
		
		

  
			  				 $no=rand();
				
			  				 $files=$this->data['Document']['submittedfile'];
			  				 $this->temp_path  = $files['tmp_name'];
			 				  $this->filename   = ($no).basename($files['name']);
						   	$this->type       = $files['type'];
						 	 $this->size       = $files['size'];

			 				  $target_path = PATH.$this->filename;
			   					if(file_exists($target_path)) {
			   	  				 $this->Session->setFlash(sprintf(__('Duplicate Files %s plz change this file name', true), $this->filename ));
			   	  					 $this->Single->delete_post($this->Single->id);
			   	  					 $this->redirect(array('action' => 'add'));
									 exit();
							   }
			  					 if(move_uploaded_file($this->temp_path, $target_path)) {
			   	   						//$this->redirect( '/posts/view/'.$this->Post->id);
			   	   						if($extension=='.jpg' || $extension=='.JPG'){
			   	   	 						  $this->__small($this->filename);
			   	   	 						  $this->__medium($this->filename);
			   							}
			   	   						
			  	 						$dating['Photo']=$this->data['Document']['submittedfile'];
			   							$dating['Photo']['single_id']=$this->Single->id;
			   							$dating['Photo']['name']=$this->filename;
			  	 						if($i == 0){
			   							$params['id']=$this->Single->id;
			   							$params['image']=$this->filename;
			   							$this->Single->update_post($params);
										}
			   							$i=$i+1;
			   							$this->loadModel('Photo');
			   							$this->Photo->save($dating);
			   	 						 //$this->redirect( array('action'=>'view',$this->Post->id));
								}
			   					else {
								// File was not moved.
									$this->Session->setFlash('The file upload failed, possibly due to incorrect permissions on the upload folder.','flash_error');
									$this->Single->delete_post($this->Single->id);
									$this->redirect(array('action' => 'add'));	
									exit();
								
								}
				}   
				elseif($this->data['Document']['submittedfile']['error']=='4'){ 
		//do nothing 
				}
		   

			} 
	
		
			elseif(is_uploaded_file($this->data['Document']['submittedfile']['tmp_name']))
			{
			$this->Session->setFlash('not a rite uploadebale file','flash_error');
			$this->Single->delete_post($this->Single->id);
			$this->redirect(array('action' => 'add'));	
			exit();	
			}
		
			elseif($this->data['Document']['submittedfile']['error']=='1')
			{ 
			$this->Session->setFlash('File size is Larger than upload_max_filesize.','flash_error');
			$this->Single->delete_post($this->Single->id);
			$this->redirect(array('action' => 'add'));	
			exit();	
			}
//

	
		      elseif($this->data['Document']['submittedfile']['error']=='2')
				{
			$this->Session->setFlash('File size is  Larger than form MAX_FILE_SIZE','flash_error');
			$this->Single->delete_post($this->Single->id);
			$this->redirect(array('action' => 'add'));
			exit();
		
			}
		      elseif($this->data['Document']['submittedfile']['error']=='3')
			{
			$this->Session->setFlash('Partial upload.','flash_error');
			$this->Single->delete_post($this->Single->id);
			$this->redirect(array('action' => 'add'));
			exit();
			}
		      elseif($this->data['Document']['submittedfile']['error']=='5')
			{ 
			$this->Session->setFlash('No temporary directory','flash_error');
			$this->Single->delete_post($this->Single->id);
			$this->redirect(array('action' => 'add'));
			exit();
			}
		     elseif($this->data['Document']['submittedfile']['error']=='6')
			{ 
			$this->Session->setFlash('Cant write to disk','flash_error');
			$this->Single->delete_post($this->Single->id);
			$this->redirect(array('action' => 'add'));
			exit();
			}
		     elseif($this->data['Document']['submittedfile']['error']=='7')
			{ 
			$this->Session->setFlash('File upload stopped by extension','flash_error');
			$this->Single->delete_post($this->Single->id);
			$this->redirect(array('action' => 'add'));
			exit();
			}
	}
		} //end foreach	
			$this->Session->setFlash(__('The single has been saved', true));
				$this->redirect(array('action' => 'account'));	
		
				exit();
	
	} // when error is Set one
	else {
		  if($videoresult == 1){
				unlink(VIDEOPATH.$this->videofilename); 
				}
		
			if(!empty($this->Single->id)){
				$this->Single->delete_post($this->Single->id);
			}
			
		}
	
	} // save end
	
	else { // when THiss->save give error;
	  if($videoresult == 1){
				unlink(VIDEOPATH.$this->videofilename); 
				}
	
	$this->Session->setFlash('The single could not be saved. Please, try again.','flash_error');
	 } 
} //EMPTY THIS->DATA

		
		$this->loadModel("Country");
		$countries = $this->Country->find('list',array('fields' => array('Country.Code','Country.Name')));

		$users = $this->Single->User->find('list');
		$this->set(compact('users','stage','countries'));
}
	
	
	
	
	
			
function stringToSlug($str) {
	// turn into slug
	$str = Inflector::slug(utf8_encode(strtolower($str)),'_');

return $str;
}
	
		
	    function getUniqueUrl($string)
    {
        // Build URL
        
        $currentUrl = $string;
        
        // Look for same URL, if so try until we find a unique one
        
        $conditions =array('conditions'=>array('Single.slug LIKE'=> $currentUrl.'%'));
		
		
		
			
        
        $result = $this->Single->find('all',$conditions);
		
	
        if ($result !== false && count($result) > 0)
        {
            $sameUrls = array();
            
            foreach($result as $record)
            {
                $sameUrls[] = $record['Single']['slug'];
            }
        }
    
        if (isset($sameUrls) && count($sameUrls) > 0)
        {
            $currentBegginingUrl = $currentUrl;
    
            $currentIndex = 1;
    
            while($currentIndex > 0)
            {
                if (!in_array($currentBegginingUrl . '_' . $currentIndex, $sameUrls))
                {
                    $currentUrl = $currentBegginingUrl . '_' . $currentIndex;
    
                    $currentIndex = -1;
                }
    
                $currentIndex++;
            }
        }
        
        return $currentUrl;
    } 
	



	
function __small($filename)
	{
		
		$url_to_save=PATH2.$filename;
		$Source =PATH.$filename;
		$Type="scalecrop";

		if($Type=="scalecrop")
		{
			$image_size = getimagesize($Source);
			$image_width = $image_size[0];
			$image_height = $image_size[1];
			
			
			$future_width = 220;
			$future_height = 100;
			
			$im = imagecreatefromjpeg($Source) or die("S");
			
			$future_image = imagecreatetruecolor($future_width ,$future_height);


			if($image_height >= $image_width)
			{
				$del = $image_width/$future_width;
			}
			
			if($image_height < $image_width)
			{

				$del = $image_height/$future_width;
			}			
			
			$edited_width = $image_width / $del;
			$edited_height = $image_height / $del;
			
			$src_x = 0;
			$src_y = 0;
			
			if ($edited_height > $future_height)
			{
				$src_y = ($edited_height - $future_height);
			}
			
			if ($edited_width > $future_width)
			{
				$src_x = ($edited_width - $future_width);
			}			
				
			@imagecopyresampled($future_image, $im, 0, 0, $src_x, $src_y, $edited_width, $edited_height,$image_width ,$image_height);
			
			
			@imagejpeg($future_image,$url_to_save,100);
			@imagedestroy($im);
			@imagedestroy($future_image);			
		}
}
	
	
	
	
	
	

function __image_resize($filename){
	$width=75;
	$height=75;
	
		$dst=PATH2.$filename;
		$src =PATH.$filename;

  if(!list($w, $h) = getimagesize($src)) return "Unsupported picture type!";

  $type = strtolower(substr(strrchr($src,"."),1));
  if($type == 'jpeg') $type = 'jpg';
  switch($type){
    case 'bmp': $img = imagecreatefromwbmp($src); break;
    case 'gif': $img = imagecreatefromgif($src); break;
    case 'jpg': $img = imagecreatefromjpeg($src); break;
    case 'png': $img = imagecreatefrompng($src); break;
    default : return "Unsupported picture type!";
  }

  // resize
  
  $crop=1;
			
  
  
  if($crop){
    if($w < $width or $h < $height) return "Picture is too small!";
    $ratio = max($width/$w, $height/$h);
    $h = $height / $ratio;
    $x = ($w - $width / $ratio) / 2;
    $w = $width / $ratio;
  }
  else{
    if($w < $width and $h < $height) return "Picture is too small!";
    $ratio = min($width/$w, $height/$h);
    $width = $w * $ratio;
    $height = $h * $ratio;
    $x = 0;
  }

  $new = imagecreatetruecolor($width, $height);

  // preserve transparency
  if($type == "gif" or $type == "png"){
    imagecolortransparent($new, imagecolorallocatealpha($new, 0, 0, 0, 127));
    imagealphablending($new, false);
    imagesavealpha($new, true);
  }

  imagecopyresampled($new, $img, 0, 0, $x, 0, $width, $height, $w, $h);

  switch($type){
    case 'bmp': imagewbmp($new, $dst); break;
    case 'gif': imagegif($new, $dst); break;
    case 'jpg': imagejpeg($new, $dst); break;
    case 'png': imagepng($new, $dst); break;
  }
  return true;
}

	
	

	
 function __medium($filename)
 {
    // set original image location
			 $img =PATH.$filename;
		 //------------------------------------------------------------------------------------------------------------------------
		
		// set our image canvas
		$canvas_width  = 600;
		$canvas_height = 340;
	
		
		// get width and height of original image
		list($img_width, $img_height) = getimagesize($img);
		
		$ratio_orig = $img_width / $img_height;
		
		if($canvas_width / $canvas_height > $ratio_orig)
		{
		  $canvas_width = $canvas_height * $ratio_orig;	
		}
		else
		{
			$canvas_height = $canvas_width / $ratio_orig;
		}
		
	
				if($canvas_width > 600)
		{
			$canvas_width=600;
			}
			
		if($canvas_height > 340)
		{
			$canvas_height=340;
			}	
		
		
		
		
		// loading in our original image
		$original = imagecreatefromjpeg($img);
		
		// create a blank canvas
		$canvas = imagecreatetruecolor($canvas_width, $canvas_height);
		
     imagecopyresampled($canvas, $original, 0, 0, 0, 0, $canvas_width, $canvas_height, $img_width, $img_height);
		
		if(imagejpeg($canvas,PATH3.$filename, 80))
		{
		   return true	;
		}
		else
		{
		   return false;	
		}

 }
	
	
	function contact()
	{
		if(!empty($this->data))
		{


	if(!empty($this->data["Contact"]["email"]) && !empty($this->data["Contact"]["subject"]))

	{
		$email = $this->data["Contact"]["email"];



if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) {
	

 	if($this->__sendcontactmail($this->data["Contact"]["email"],$this->data["subject"]["email"],$this->data["Contact"]["message"]));
			{
					$this->Session->setFlash(__('The Message has been sent', true));
				$this->redirect(array('controller'=>'onstages','action' => 'home'));
				
				}

}

else {
	
 	$this->Session->setFlash('Valid email required','flash_error');

}

		
		

			
			}
			
		else {
			$this->Session->setFlash('Please Provide Valid email And subject','flash_error');
			}
		
		}
		
		
		
	}
	
		  function __sendcontactmail($email,$subject,$message) {
		  
			
			
                if ($email === false) {
                        debug(__METHOD__." failed to retrieve User data for user.id: {$email}");
                        return false;
                }

                // Set data for the "view" of the Email
 
		  $this->set('email', $email);		
		
  $this->set('message', $message);
                $this->set('subject', $subject);
               
                $this->Email->to = "nevergivein111@gmail.com";
                $this->Email->subject = env('SERVER_NAME') . ' –New single Found from your city';
                $this->Email->from = $email;
                $this->Email->template = 'contact';
                $this->Email->sendAs = 'html';   // you probably want to use both :)   
                return $this->Email->send();
        }
		
		
		




	function edit($id = null) {
		
	$stage = $this->Single->find('first',array('conditions'=>array('Single.id'=>$id)));
	
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalid single','flash_error');
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Single->save($this->data)) {
				$this->Session->setFlash(__('The single has been saved', true));
				$this->redirect(array('action' => 'account'));
			} else {
				$this->Session->setFlash('The single could not be saved. Please, try again.','flash_error');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Single->read(null, $id);
			
						$this->loadModel("Country");
						$this->loadModel("City");
			
		$countries = $this->Country->find('list',array('fields' => array('Country.Code','Country.Name')));
		
		$cities = $this->City->find('list',array('conditions'=>array('City.CountryCode'=>$this->data['Single']['country']),'fields' => array('City.Name','City.Name')));
		}
		

	
	


		$this->set(compact('stage','countries','cities'));

	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for single','flash_error');
			$this->redirect(array('action'=>'index'));
		}

$single = $this->Single->find('first',array('conditions'=>array('Single.id'=>$id)));

$onstage = $this->Single->Onstage->find('first',array('conditions'=>array('Single_id'=>$id)));
if(!empty($onstage))
{
	
	$this->Session->setFlash('This single is already on stage ,First Remove the signle from stage and then apply this action','flash_error');
			$this->redirect(array('action'=>'index'));
	
	}
	
	
	
	if ($this->Single->delete($id)) {
	
	if(!empty($single["Single"]["file"]))
	{
	unlink(VIDEOPATH.$single["Single"]["file"]); 
	}
		
	$this->loadModel("Photo");
	foreach($single["Photo"] as $pic)	{	


	if ($this->Photo->delete_pic($pic["name"])) {
			




	$extension=$this->__findExt($pic["name"]);
	
			if($extension=='.jpg' || $extension=='.JPG'){
			   	  
		unlink(PATH.$pic["name"]); 
		unlink(PATH2.$pic["name"]); 
		
			   	   						}
			else {
				unlink(PATH.$pic["name"]); 
				}
	
		
	
						}
		} //endforeach
		
		
			
			
			$this->Session->setFlash(__('Single deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Single was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function onstage($id=null){
			if($this->username != "admin" ) {  
	 $this->Session->setFlash('Invalid Admin Access','flash_error');
			$this->redirect(array('controller'=>'onstages','action' => 'home'));
		}
		
	if (!$id) {
			$this->Session->setFlash('Invalid single','flash_error');
			$this->redirect(array('action' => 'index'));
		}
		
	if(!empty($this->data)) {

	$home = $this->Single->Onstage->find('first',array('conditions'=>array('Onstage.single_id'=>$id)));
	if(!empty($home))
	{
		$this->Session->setFlash('Single Is already on stage','flash_error');
				$this->redirect(array('action' => 'index'));
		
		}
	
	$data['Onstage']['time']=$this->data['Single']['time'];
	//$data['Onstage']['timefrom']=$this->data['Single']['timefrom'];
	if(!empty($this->data['Single']['photo']))
	{
	$data['Onstage']['photo']=$this->data['Single']['photo'];
	}
	$data['Onstage']['single_id']=$this->data['Single']['newid'];
	
	$single = $this->Single->find('first',array('conditions'=>array('Single.id'=>$id)));

	
	$str1=$this->stringToSlug($single["User"]["username"]);
	$str=$this->getUniqueUrl($str1);
	$data['Onstage']['slug']=$str;
	
	
	
			$this->Single->Onstage->create();
			if ($this->Single->Onstage->save($data)) {
				$this->Session->setFlash(__('Single added on stage', true));
				
				$this->redirect(array('controller'=>'onstages','action' => 'index'));
			} else {
				$this->Session->setFlash('The single could not be saved. Please, try again.','flash_error');
			}
		}
		
	// $this->autoRender=false;
	//$this->loadModel('Onstage');
	if (empty($this->data)) {
			$this->data = $this->Single->read(null, $id);
		}
		
	$data['Onstage']['single_id']=$id;
	$single = $this->Single->read(null, $id);
	
	

	$this->set(compact('single','id'));
	
	
	
	}
	
	function sethome($name = null,$id= null)
	{
					if($this->username != "admin" ) {  
	 $this->Session->setFlash('Invalid Admin Access','flash_error');
			$this->redirect(array('controller'=>'onstages','action' => 'home'));
		}
		$this->autoRender=false;
		
		
		
		if(empty($name))
		{
		$this->Session->setFlash('Invalid Action','flash_error');
		$this->redirect(array('action' => 'account'));
		}
		if(empty($id))
		{
		$this->Session->setFlash('Invalid Action','flash_error');
		$this->redirect(array('action' => 'account'));
		}	
			
	$stage = $this->Single->find('first',array('conditions'=>array('Single.id'=>$id)));	
	
		$this->Single->id=$stage["Single"]["id"];
		    $this->Single->saveField('image', $name );
			$this->Session->setFlash(__('Picture Updated', true));

		$this->redirect(array('action' => 'view',$stage["Single"]["slug"]));
	
	


		
	}
	
	
	
	function removevideo($id = null){
		
		$single = $this->Single->find('first',array('conditions'=>array('Single.id'=>$id)));


	
	if(!empty($single["Single"]["file"]))
	{
	unlink(VIDEOPATH.$single["Single"]["file"]); 
		$this->Single->id=$id;
		
		$this->Single->saveField('file', NULL );
		$this->Session->setFlash(__('Video has been Deleted', true));
		
		$this->redirect(array('action' => 'edit',$single["Single"]["id"]));
	}
		

		
		}
	
	
		function deletephoto($id=null,$name = null) {
		$this->autoRender=false;
		if(empty($name))
		{
		$this->Session->setFlash('Not  deleted','flash_error');
		$this->redirect(array('action' => 'account'));
		}
		
		$this->loadModel('Photo');
		
$photos = $this->Photo->find('first',array('conditions'=>array('Photo.name'=>$name)));

		
$stage["Single"]=$photos["Single"];

if( $stage["Single"]["image"] == $name )
{
	$this->Session->setFlash('This Photo is Set on Your Profile So it cannot be Deleted','flash_error');
		$this->redirect(array('action' => 'photos',$stage["Single"]["id"]));
	
	
	}
		if($this->Photo->delete_pic($name)) {
			
//if()
	$extension=$this->__findExt($name);
	
			if($extension=='.jpg' || $extension=='.JPG'){
			   	  
		unlink(PATH.$name); 
		unlink(PATH2.$name); 
		
			   	   						}
			else {
				unlink(PATH.$name); 
				}
	
			$this->Session->setFlash(__('Photo deleted', true));
			$this->redirect(array('action'=>'photos',$stage["Single"]["id"]));
		}
		$this->Session->setFlash('photo Not deleted','flash_error');
		$this->redirect(array('action' => 'account'));
		
		}
	
	
	
	function addpic($id = null) {
		
$stage = $this->Single->find('first',array('conditions'=>array('Single.id'=>$id)));
		
		if(empty($id))
		{
 $this->Session->setFlash('Invalid Request','flash_error');
		 
		   $this->redirect(array('action' => 'account'));
			
			}
		
		if(!empty($this->data))
		{

		if(empty($this->data['File']['first']['submittedfile']['name']))
		{
			
	$this->Session->setFlash('You have to upload atleast One Image','flash_error');
	$this->redirect(array('action' => 'photos',$id));
		
		}
       $i=0;
	foreach($this->data['File'] as $file)
	{
		
		if(!empty($file["submittedfile"]["name"]))
	{
	
	$this->data['Document']['submittedfile'] = $file['submittedfile'];
	
	//

	if($this->data['Document']['submittedfile']['error']=='4' || $this->data['Document']['submittedfile']['error']=='0') 
		{
		 if($this->data['Document']['submittedfile']['error']=='0')
			{
			   $extension=$this->__findExt($this->data['Document']['submittedfile']['name']);
			   if(empty($extension))
			   { 
			   	   $this->Session->setFlash('Wrong extension file.only can upload jpg.gif,bmp and png','flash_error');
	
			   	   $this->redirect(array('action' => 'add'));
			   }
		
			   if($this->data['Document']['submittedfile']['size'] > 4200000 )
			   { 
			   	   $this->Session->setFlash('File size should not be Larger than 2 MB.','flash_error');
			 
			   	   $this->redirect(array('action' => 'add'));
			   	   
			   }
		
		

  
			   $no=rand();
				
			   $files=$this->data['Document']['submittedfile'];
			   $this->temp_path  = $files['tmp_name'];
			   $this->filename   = ($no).basename($files['name']);
			   $this->type       = $files['type'];
			   $this->size       = $files['size'];

			   $target_path = PATH.$this->filename;
			   if(file_exists($target_path)) {
			   	   $this->Session->setFlash(sprintf(__('Duplicate Files %s plz change this file name', true), $this->filename ));
			 
			   	   $this->redirect(array('action' => 'add'));
			   				}
			   if(move_uploaded_file($this->temp_path, $target_path)) {
			   	   //$this->redirect( '/posts/view/'.$this->Post->id);
			   	   if($extension=='.jpg' || $extension=='.JPG'){
			   	   	   $this->__small($this->filename);
			   	   	   $this->__medium($this->filename);
			   	   						}
			   	   						
			   	   $dating['Photo']=$this->data['Document']['submittedfile'];
			   	   $dating['Photo']['single_id']=$this->Single->id;
			   	   $dating['Photo']['name']=$this->filename;
			 
			   	  $this->loadModel('Photo');
			   	  $this->Photo->save($dating);
			   	  //$this->redirect( array('action'=>'view',$this->Post->id));
			          }
			          else {
				// File was not moved.
					$this->Session->setFlash('The file upload failed, possibly due to incorrect permissions on the upload folder.','flash_error');
					$this->Single->delete_post($this->Single->id);
					$this->redirect(array('action' => 'add'));	
					return false;
				  	}
				}   
		elseif($this->data['Document']['submittedfile']['error']=='4')
			{ 
		//do nothing 
			}
		   

	} 
	
		
	elseif(is_uploaded_file($this->data['Document']['submittedfile']['tmp_name']))
		{
			$this->Session->setFlash('not a rite uploadebale file','flash_error');
		
			$this->redirect(array('action' => 'add'));		
		}
		
	elseif($this->data['Document']['submittedfile']['error']=='1')
		{ 
			$this->Session->setFlash('File size is Larger than upload_max_filesize.','flash_error');
	
			$this->redirect(array('action' => 'add'));		
		}
//

	
		      elseif($this->data['Document']['submittedfile']['error']=='2')
		{
		$this->Session->setFlash('File size is  Larger than form MAX_FILE_SIZE','flash_error');
	
		$this->redirect(array('action' => 'add'));
		
		}
		      elseif($this->data['Document']['submittedfile']['error']=='3')
		{
		$this->Session->setFlash('Partial upload.','flash_error');
	
		$this->redirect(array('action' => 'add'));
		}
		      elseif($this->data['Document']['submittedfile']['error']=='5')
		{ 
		$this->Session->setFlash('No temporary directory','flash_error');
	
		$this->redirect(array('action' => 'add'));
		}
		     elseif($this->data['Document']['submittedfile']['error']=='6')
		{ 
		$this->Session->setFlash('Cant write to disk','flash_error');

		$this->redirect(array('action' => 'add'));
		}
		     elseif($this->data['Document']['submittedfile']['error']=='7')
		{ 
		$this->Session->setFlash('File upload stopped by extension','flash_error');

		$this->redirect(array('action' => 'add'));
		}
	}
	} //end foreach	
	
		$this->Session->setFlash(sprintf(__('Images Uploaded Successfully', true), 'post'));

		$this->redirect(array('action' => 'photos',$stage["Single"]["id"]));		
	
		
		
		}
		
		

	
	
		if (empty($this->data)) {
			$this->data = $this->Single->read(null, $id);
		}
		$this->loadModel("Chat");
			$unread = $this->Chat->find('count',array('conditions'=>array('Chat.toUser'=>$this->user_id,'Chat.read'=>'no')));
		
		$this->set(compact('stage','unread'));
		
		
		
	}
	function photos($id = null) {
		
		if(empty($id))
		{$this->Session->setFlash('Invalid Action.','flash_error');
			 	   $this->redirect(array('action' => 'account'));
			
			}
		
		$this->loadModel('Photo');
		
		$photos=$this->Photo->find('all',array('conditions'=>array('Photo.single_id'=>$id)));
		
			
		$stage = $this->Single->find('first',array('conditions'=>array('Single.user_id'=>$this->user_id)));
	
		if (empty($this->data)) {
			$this->data = $this->Single->read(null, $id);
		}
		$this->loadModel("Chat");
			$unread = $this->Chat->find('count',array('conditions'=>array('Chat.toUser'=>$this->user_id,'Chat.read'=>'no')));
		
		$this->set(compact('stage','unread','photos'));

		
		
		
		
		}
	
	
	function changepic($id = null)
	{
	if(empty($id))
	{
$this->Session->setFlash('Invalid Action.','flash_error');
			 	   $this->redirect(array('action' => 'account'));
		
		}
 	$i=0;
if (!empty($this->data)) {
	$this->data['Document']['submittedfile'] = $this->data["File"]['submittedfile'];


	if($this->data['Document']['submittedfile']['error']=='4' || $this->data['Document']['submittedfile']['error']=='0') 
		{
		 if($this->data['Document']['submittedfile']['error']=='0')
			{
			   $extension=$this->__findExt($this->data['Document']['submittedfile']['name']);
			   if(empty($extension))
			   { 
			   	   $this->Session->setFlash('Wrong extension file.only can upload jpg.gif,bmp and png','flash_error');
			  
			   	   $this->redirect(array('action' => 'account'));
			   }
		
			   if($this->data['Document']['submittedfile']['size'] > 4200000 )
			   { 
$this->Session->setFlash('File size should not be Larger than 4 MB.','flash_error');
			 	   $this->redirect(array('action' => 'account'));
			   	   
			   }
		
	
			   $no=rand();
				
			   $files=$this->data['Document']['submittedfile'];
			   $this->temp_path  = $files['tmp_name'];
			   $this->filename   = ($no).basename($files['name']);
			   $this->type       = $files['type'];
			   $this->size       = $files['size'];

			   $target_path = PATH.$this->filename;
			   if(file_exists($target_path)) {
			   	   $this->Session->setFlash(sprintf(__('Duplicate Files %s plz change this file name', true), $this->filename ));
			   
			   	   $this->redirect(array('action' => 'account'));
			   				}
			   if(move_uploaded_file($this->temp_path, $target_path)) {
			   	   //$this->redirect( '/posts/view/'.$this->Post->id);
			   	   if($extension=='.jpg' || $extension=='.JPG'){
			   	   	   $this->__small($this->filename);
			   	   	   $this->__medium($this->filename);
			   	   						}
			   	   						
			   	   $dating['Photo']=$this->data['Document']['submittedfile'];
			   	   $dating['Photo']['single_id']=$this->data["Single"]["id"];
			   	   $dating['Photo']['name']=$this->filename;
			   	   if($i == 0){
			   	   	   $params['id']=$this->data["Single"]["id"];;
			   	   	   $params['image']=$this->filename;
			   	   	   $this->Single->update_post($params);
			   	   		}
	
			   	  $this->loadModel('Photo');
			   	  $this->Photo->save($dating);
			   	  //$this->redirect( array('action'=>'view',$this->Post->id));
			          }
			          else {
				// File was not moved.
					$this->Session->setFlash('The file upload failed, possibly due to incorrect permissions on the upload folder.','flash_error');
		  $this->redirect(array('action' => 'account'));
					return false;
				  	}
				}   
		elseif($this->data['Document']['submittedfile']['error']=='4')
			{ 
$this->Session->setFlash('Field Could not be empty','flash_error');
  $this->redirect(array('action' => 'account'));
			}
		   

	} 
	
		
	elseif(is_uploaded_file($this->data['Document']['submittedfile']['tmp_name']))
		{
			$this->Session->setFlash('not a rite uploadebale file','flash_error');
  $this->redirect(array('action' => 'account'));	
		}
		
	elseif($this->data['Document']['submittedfile']['error']=='1')
		{ 
			$this->Session->setFlash('File size is Larger than upload_max_filesize.','flash_error');
  $this->redirect(array('action' => 'account'));;		
		}
//

	
		      elseif($this->data['Document']['submittedfile']['error']=='2')
		{
		$this->Session->setFlash('File size is  Larger than form MAX_FILE_SIZE','flash_error');
  $this->redirect(array('action' => 'account'));
		
		}
		      elseif($this->data['Document']['submittedfile']['error']=='3')
		{
		$this->Session->setFlash('Partial upload.','flash_error');
  $this->redirect(array('action' => 'account'));
		}

		      elseif($this->data['Document']['submittedfile']['error']=='5')
		{ 
		$this->Session->setFlash('No temporary directory','flash_error');
  $this->redirect(array('action' => 'account'));
		}
		     elseif($this->data['Document']['submittedfile']['error']=='6')
		{ 
		$this->Session->setFlash('Cant write to disk','flash_error');
  $this->redirect(array('action' => 'account'));
		}
		     elseif($this->data['Document']['submittedfile']['error']=='7')
		{ 
		$this->Session->setFlash('File upload stopped by extension','flash_error');
  $this->redirect(array('action' => 'account'));
		}

		$this->Session->setFlash(sprintf(__('Images Uploaded Successfully', true), 'post'));

		$this->redirect(array('action' => 'account'));		
}


		

		$stage = $this->Single->find('first',array('conditions'=>array('Single.user_id'=>$this->user_id)));
	
		if (empty($this->data)) {
			$this->data = $this->Single->read(null, $id);
		}
		$this->loadModel("Chat");

		
		$this->set(compact('stage'));

		

	
		
	}
	
	
	
	
	function crone(){
			$this->autoRender = false;
			
			
			$new=time();
		$count_from = date("Y-m-d",$new);
		//echo $onstage['Onstage']['timefrom'];

list($year, $month, $day) = explode('-', $count_from);


$single = $this->Single->find('all',array('conditions'=>array('Single.created'=>$year.'-'.$month.'-'.$day)));
	
$this->loadModel("News");

$news = $this->News->find('all');

foreach($news as $new)
{
	foreach($single as $sing)
	 {
	if($new["News"]["city"] == $sing["Single"]["city"])
		{
		$this->__sendnewsmail($new["News"]["city"],$new["News"]["email"],$sing["Single"]["slug"]);
		
		}
	 
	 
	 }
	}
	
	echo "Done";

		}
	
	
	
		
	  function __sendnewsmail($city,$email,$id) {
		  
			
			
                if ($email === false) {
                        debug(__METHOD__." failed to retrieve User data for user.id: {$email}");
                        return false;
                }

                // Set data for the "view" of the Email
                $this->set('activate_url', 'http://' . env('SERVER_NAME') .LINK. 'singles/view/' . $id);
				
		

                $this->set('city', $city);
               
                $this->Email->to = $email;
                $this->Email->subject = env('SERVER_NAME') . ' –New single Found from your city';
                $this->Email->from = 'singleonstage@' . env('SERVER_NAME');
                $this->Email->template = 'news';
                $this->Email->sendAs = 'html';   // you probably want to use both :)   
                return $this->Email->send();
        }
	
			
}
?>