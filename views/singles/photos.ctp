<div id="main">
    <!-- content of main -->
    
    
    
    
    
    <div class="content">      
    
    
    	<!-- Intro page -->
        <div class="intro">
        	<h2 class="underlined">Manage Pictures</h2>
        </div>
    	<!-- /Intro page -->  
        
        
        
        <!-- col_270_left -->
     <?php echo $this->element("leftaccount"); ?>
        <!-- /col_270_left --> 	
        
        <!-- Left part 600px -->
      
       <h4><a href="<?php echo LINK; ?>singles/addpic/<?php echo $this->params["pass"]["0"]; ?>">Add More Pictures</a></h4>
        <div id="left_part">
        
        <?php foreach($photos as $photo): ?>
        <div id="messageintro">
        <div id="messageintropic">
		
		
	  
		<?php if(empty($photo['Photo']['name'])): ?>
		<img src="<?php echo ROOTE;?>imageholder.jpg" width="100" height="100" alt="Listing Image" class="listingimage" />
		</a>
		<?php else: ?>
				  
		<?php if($html->findExt($photo['Photo']['name'])): ?>
		<a target="_blank" href="<?php echo ROOTE; ?>uploads/<?php echo $photo['Photo']['name'];?>">  
		<img src="<?php echo ROOTE;?>uploads/small/<?php echo $photo['Photo']['name'];?>" width="130" height="100"  alt="Listing Image" class="listingimage" />
		</a>		
		<?php else: ?>
		<a target="_blank" href="<?php echo ROOTE; ?>uploads/<?php echo $photo['Photo']['name'];?>">
              	<img src="<?php echo ROOTE;?>uploads/<?php echo $photo['Photo']['name'];?>" width="100" height="100"  alt="Listing Image" class="listingimage" />
				</a>
              	<?php endif; ?>
             	<?php endif; ?>
		
		
		
		
		</div>
        
       <div id="manageprofiledelete"><a id="manageprofiledelete" href="<?php echo LINK; ?>singles/sethome/<?php echo $photo['Photo']['name'];?>/<?php echo $this->params["pass"]["0"]; ?>">Set Home</a></div>
    
        <div id="manageprofiledelete"><a id="manageprofiledelete" href="<?php echo LINK; ?>singles/deletephoto/<?php echo $photo['Photo']['single_id'];?>/<?php echo $photo['Photo']['name'];?>">Delete</a></div>
     
        
				
		<div id="manageprofileview"><a target="_blank" href="<?php echo ROOTE; ?>uploads/<?php echo $photo['Photo']['name'];?>">view</a></div>
        
        
        
        </div>
		<?php endforeach; ?>
        
   
        
        
        
        
        <br />
        	<!-- Form block -->
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