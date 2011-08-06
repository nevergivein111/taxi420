<?php
$user = $this->Session->read('Auth');
if(isset($user['User']['id']))
{
$myuserid=$user['User']['id'];
}

if($myuserid == $chat["Chat"]["toUser"])
{
	$to=$chat["Chat"]["user_id"];
	
	}
elseif($myuserid == $chat["Chat"]["user_id"]) 
{
	
	$to=$chat["Chat"]["toUser"];
	
	}
else{
	
echo "conflicts with Users id ,,Kindly signOut any other User if  login";
	}

?>
<div id="main">
    <!-- content of main -->
    
   

    
    
    
    <div class="content">      
    
    
    	<!-- Intro page -->
        <div class="intro">
        	<h2 class="underlined">Messages</h2>
        </div>
    	<!-- /Intro page -->  
        
        
        
        <!-- col_270_left -->
         <?php 

	   echo $this->element("leftaccount"); ?>
      
        <!-- /col_270_left --> 	
        
        <!-- Left part 600px -->
        
        <div id="left_part">
        
                
          <div id="manageprofiledelete"><a href="<?php echo LINK; ?>chats">Back to messages</a></div>
          		
               
                
                
                
                  <div class="numbered3"> </div>  
                <?php if($unread != 0)
			{ ?>
                <div class="numbered3"><a href="">unread</a></div> 
                <div class="numbered2"><?php echo $unread; ?></div>
                <?php }?>

        <br />
        
        <?php
	$i = 0;
	foreach ($chats as $chat):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}

	?>
    
        
        <div class="form_block">
                <div class="inside">
                
        
         <div id="messageintropic2">
         
            
  	  
		<?php if(empty($chat['User']['Single']['0']['id'])): ?>
		<img src="<?php echo ROOTE;?>imageholder.jpg" width="46" height="30" alt="Listing Image" class="listingimage" />
		</a>
		<?php else: ?>
				  
		<?php if($html->findExt($chat['User']['Single']['0']['image'])): ?>
				  
		<img src="<?php echo ROOTE;?>uploads/small/<?php echo $chat['User']['Single']['0']['image'];?>" width="46" height="30"  alt="Listing Image" class="listingimage" />
		<?php else: ?>
              	<img src="<?php echo ROOTE;?>uploads/<?php echo $chat['User']['Single']['0']['image'];?>" width="46" height="30"  alt="Listing Image" class="listingimage" />
              	<?php endif; ?>
             	<?php endif; ?>
       
        
   
        
        </div>
        <div id="messageintroname"><?php
		
		if(isset($chat['User']['Single']['0']['name'])):
		?>
		<a href="<?php echo LINK; ?>singles/view/<?php echo $chat['User']['Single']['0']['slug'] ?>"
		 echo $chat['User']['Single']['0']['name'];
		
		</a>
		
		<?php
		else: 
		
		echo $chat['User']['username']; 
		
		endif;
		 ?>
         
         
         </div>
        <br />
        <div id="messageintrosubject"><a href=""><?php echo $chat['Chat']['subject']; ?> </a></div>
        <br />
        <div id="messagebody">
        <?php echo $chat['Chat']['message']; ?> </div>
        </div></div>
        
    
              <?php endforeach; ?>
        
        
        
        
        
     
        
        
        
        
        
        
        
        
        <!-- Form block -->
            <div class="form_block">
                <div class="inside">
    <?php echo $this->Form->create('Chat',array("action"=>"add/".$to));?>
                  <div class="form_textarea">
                  <?php
			echo $this->Form->input('id');
		echo $this->Form->input('message');
		echo $this->Form->input('ref',array("type"=>"hidden","value"=>$this->params["pass"]["0"]));
    ?>
                  </div>
                  <div class="clear"></div>
                               
                    <div class="form_submit">
                      <div id="submitter" style="opacity: 1; ">-</div>
                      <input type="submit" name="contact_submit" id="contact_submit" value="Reply" class="cufon">
                    </div>
                </form>
                </div>
            </div>
        	<!-- /Form block -->
            
  
        
        
        <div class="form_block">
      <div class="inside">
                
          </div>
          </div>
        	<!-- /Form block -->
            
		</div>
        <!-- /Left part 600px -->
    
    
    <br class="clear" />
    </div>
    
    
    
    
     
    
    
    <div class="content"><!-- Left part 600px --><!-- /Left part 600px -->
        
        
        
        <!-- Sidebar 270px --><!-- /Sidebar 270px --> 	
    
    
    <br class="clear" />
    </div>
    <!-- /content of main -->
</div>
