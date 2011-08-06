		<?php
$user = $this->Session->read('Auth');
if(isset($user['User']['id']))
{
$myusername=$user['User']['username'];
$myuserid=$user['User']['id'];
}
?>
<!-- Intro page -->
       
    	<!-- /Intro page -->  
        
<div class="col_270_left design">
	  
	  <?php if(empty($stage["Single"]["image"])): ?>
		<img src="<?php echo ROOTE;?>imageholder.jpg" width="220" height="100" alt="Listing Image" class="listingimage" />
		</a>
		<?php else: ?>
				  
		<?php if($html->findExt($stage["Single"]["image"])): ?>
				  
		<img src="<?php echo ROOTE;?>uploads/small/<?php echo $stage["Single"]["image"];?>" width="134" height="75"  alt="<?php echo $stage['Single']['image'];?>" title="<?php echo $stage['Single']['image'];?>" class="listingimage" />
          <a href="<?php echo LINK; ?>singles/changepic/<?php echo $stage["Single"]["id"]; ?>">Change Picture</a>
		<?php else: ?>
              	<img src="<?php echo ROOTE;?>uploads/<?php echo $stage["Single"]["image"];?>" width="134" height="75"  alt="<?php echo $stage['Single']['image'];?>" title="<?php echo $stage['Single']['image'];?>" class="listingimage" />
                  <a href="<?php echo LINK; ?>singles/changepic/<?php echo $stage["Single"]["id"]; ?>">Change Picture</a>
              	<?php endif; ?>
             	<?php endif; ?>
	  
	
	        
        <a href=" "><h3 align="justify"><?php echo $myusername; ?></h3></a>
        
    
		        <!-- Google Map Plugin -->
        <div class="google_map">
        	<div id="map_canvas"><div id="chattingboxlowerleft">
       
	    <div class="chattingboxlowerlefttab"><a href="<?php echo LINK; ?>singles/account">Main</div>
		
		  <?php if(!empty($stage)): ?>
		  
        <div class="chattingboxlowerlefttab"><a href="<?php echo LINK; ?>singles/edit/<?php echo $stage["Single"]["id"]; ?>">Edit Profile</div>
        
		<?php else: ?>
	<div class="chattingboxlowerlefttab"><a href="<?php echo LINK; ?>singles/add">Create Profile</div>
		
		<?php endif; ?>
        
          <?php if(isset($stage["Single"]["id"]))
	  {
	  ?>
        
		
        <div class="chattingboxlowerlefttab"><a href="<?php echo LINK; ?>chats">Massages</a>
        
        
        
          <?php if($unread != 0)
			{ ?>
              
                <div class="numbered"><?php echo $unread; ?></div>
                <?php }?>
        

        </div>
        
      <?php } ?>
        
            <?php if(isset($stage["Single"]["id"]))
	  {
	  ?>
        
           <div class="chattingboxlowerlefttab"><a href="<?php echo LINK; ?>singles/photos/<?php echo $stage["Single"]["id"]; ?>">Pictures</a></div>
           
           
               <?php } ?>
        
               <div class="chattingboxlowerlefttab"><a href="<?php echo LINK; ?>users/changepassword/<?php echo $stage["Single"]["id"]; ?>">Change Password</a></div>
        
        <?php if($myusername == "admin"): ?>
        
                <div class="chattingboxlowerlefttab"><a href="<?php echo LINK; ?>users">Manage users</a></div>
                
                <?php endif; ?>
                
                <?php if($myusername == "admin"): ?>
        <div class="chattingboxlowerlefttab"><a href="<?php echo LINK; ?>websites/edit/1">Website</a></div>
  <?php endif; ?>
        
        </div></div>
        </div>
        <!-- /Google Map -->

   
      </div>