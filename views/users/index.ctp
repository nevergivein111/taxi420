<div id="main">
    <!-- content of main -->
    <?php

    ?>
    
    
    
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
        <div id="left_part">
        
      	<?php
	$i = 0;
	foreach ($users as $user):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
      <strong>
      	 <?php echo "&nbsp "."Username : ".$user['User']['username']; ?>,
        </strong>
        <strong>
          <?php echo "&nbsp Profile : ";
		  
		  if(!empty($user['Single']['0']['name']))
		  {
			echo $this->Html->link(__($user['Single']['0']['name'], true), array('controller'=>'singles','action' => 'view', $user['Single']['0']['id'])); 
			   
			  }
			  else {
				  
				  echo "No Profile";
				  }
		  
		   ?>
           </strong>
    
        
        <div id="messageintro">
    
        <div id="messageintropic">
  
		
		
	  
		<?php if(empty($user['Single']['0']['image'])): ?>
        <a  href="<?php echo LINK; ?>users/view/<?php echo $user['User']['id'];?>"> 
		<img src="<?php echo ROOTE;?>imageholder.jpg" width="100" height="100" alt="Listing Image" class="listingimage" />
		</a>
		<?php else: ?>
				  
		<?php if($html->findExt($user['Single']['0']['image'])): ?>
		<a  href="<?php echo LINK; ?>users/view/<?php echo $user['User']['id'];?>">  
		<img src="<?php echo ROOTE;?>uploads/small/<?php echo $user['Single']['0']['image'];?>" width="130" height="100"  alt="Listing Image" class="listingimage" />
		</a>		
		<?php else: ?>
		<a  href="<?php echo LINK; ?>users/view/<?php echo $user['User']['id'];?>"> 
              	<img src="<?php echo ROOTE;?>uploads/<?php echo $user['Single']['0']['image'];?>" width="100" height="100"  alt="Listing Image" class="listingimage" />
				</a>
              	<?php endif; ?>
             	<?php endif; ?>
                
		
		
		
		
		</div>
    
    
    <?php if(($user['User']['active']=="1")): ?>
    
        <div id="manageprofiledelete"><a id="manageprofiledelete" href="<?php echo LINK; ?>users/suspend/<?php echo $user['User']['id'];?>">suspend</a></div>
        
    <?php elseif(($user['User']['active']=="0")): ?>
     <div id="manageprofiledelete"><a id="manageprofiledelete" href="<?php echo LINK; ?>users/reactivate/<?php echo $user['User']['id'];?>">Activate</a></div>
	
	<?php endif; ?> 
        
				
		<div id="manageprofileview"><a target="_blank" href="<?php echo LINK; ?>users/view/<?php echo $user['User']['id'];?>">view</a></div>
        
        
        
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
    
    
    
    
     	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
    
    
    <div class="content"><!-- Left part 600px --><!-- /Left part 600px -->
        
        
        
        <!-- Sidebar 270px --><!-- /Sidebar 270px --> 	
    
    
    <br class="clear" />
    </div>
    
    
    <!-- /content of main -->

</div>





