<?php 
$user = $this->Session->read('Auth');
if(isset($user['User']['id']))
{
$myuserid=$user['User']['id'];
}
?>

<div id="main">
    <!-- content of main -->
    <div class="content"><!-- Left part 600px -->
        <div id="left_part">
        
        	        	<!-- Blog entry --><!-- /Blog entry -->
                        
                        
            <!-- VIDEO Last -->
          <h3 class="underlined">Singles Profiles</h3>
          	<?php
	$i = 0;
	foreach ($singles as $single):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
          
          
                                <!-- Video item -->
                <div class="video_entry">
                    <div class="video_thumbnail"><span class="cufon"><a href="<?php echo LINK; ?>singles/view/<?php echo $single['Single']['slug']; ?>">View now</a></span>
                    
             


				  
		<?php if(empty($single['Single']['image'])): ?>
		<img src="<?php echo ROOTE;?>imageholder.jpg" width="220" height="100" alt="Listing Image" class="listingimage" />
		</a>
		<?php else: ?>
				  
		<?php if($html->findExt($single['Single']['image'])): ?>
				  
		<img src="<?php echo ROOTE;?>uploads/small/<?php echo $single['Single']['image'];?>" width="220" height="100"  alt="<?php echo $single['Single']['image'];?>" title="<?php echo $single['Single']['image'];?>" class="listingimage" />
		<?php else: ?>
              	<img src="<?php echo ROOTE;?>uploads/<?php echo $single['Single']['image'];?>" width="220" height="100"  alt="<?php echo $single['Single']['image'];?>" title="<?php echo $single['Single']['image'];?>" class="listingimage" />
              	<?php endif; ?>
             	<?php endif; ?>
        
                    </div>
                    <div class="video_resume">
                      <h4><a href="<?php echo LINK; ?>singles/view/<?php echo $single['Single']['slug']; ?>"><?php echo $single['Single']['name']; ?> From <?php echo $single['Single']['city'];  ?></a> </h4>
                      
                      
                      
                      
                  <?php if(isset($user['User']) && $user['User']['username']=="admin"): ?>
                      
                      
                      <div class="date cufon">
                   	<?php if(empty($single['there'])): ?>
                    
                      	<?php echo $this->Html->link(__('Put On stage', true), array('action' => 'onstage', $single['Single']['id'])); ?>
                        
                    <?php else: ?>
                    
                    	Already On Stage
                        
                        <?php endif; ?>
                        
                        
                        
                        
                        
                        ||
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $single['Single']['id'])); ?>||
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $single['Single']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $single['Single']['id'])); ?>||
              	<?php if($single["Single"]['active'] == 0): ?>
                    <strong>
                      	<?php echo $this->Html->link(__('Activate', true), array('action' => 'active', $single['Single']['id'])); ?>
                        </strong>
                    <?php elseif($single["Single"]['active'] == 1): ?>
                   
                                    	<?php echo $this->Html->link(__('Deactivate', true), array(
'action' => 'deactive', $single['Single']['id'])); ?>
 
                        <?php endif; ?>
            
                      
                 </div>
                      
                      
                            
                      	
                   <?php
				   else:
				   ?>
                   
                   
                    <div class="date cufon">
                      <?php 
					  
					  echo date('F j, Y',$single['Single']['date']);
					  
                      ?>
                           </div>
                      
                     
                      
                      
                      <?php endif; ?>
                      
                      
                        <p>
                   
						 <?php echo $text->truncate(strip_tags(
    $single['Single']['details']),
    200,
    array(
        'ending' => '...',
        'exact' => false
    )
);
?>
						
						</p>
                  </div>
                <br class="clear" />
                </div>
                
                <!-- Video item -->
                <?php endforeach; ?>
                
                
                
                
                
                
                
                
                 
                 
                 
                 
                 
                 
            <!-- /VIDEO Last -->
            
	  </div>
        <!-- /Left part 600px -->
        
        
        
        <!-- Sidebar 270px -->
        <div id="sidebar">
        <div class="inside">
        
        
        
        <div class="separator"></div>
        
        <!-- Recents Articles -->
        <div class="inner_padding">
<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like-box href="http://www.facebook.com/pages/Taxi420/224924310868480?created" width="240" show_faces="true" border_color="" stream="false" header="true"></fb:like-box>
        </div>
        <!-- /Recents Articles -->
        
        <div class="separator"></div>
       <?php echo $this->element("profiles"); ?>  
        <!-- Recents Interviews -->
        </div>
        <!-- /Recents Interviews -->
        
        <div class="separator"></div>
        
        
        
        
        
        <div class="separator"></div>
        
        <!-- Advertisings -->
 
        <!-- /Advertisings -->        
        </div>
        </div>
        <!-- /Sidebar 270px --> 	
    
    
    <br class="clear" />

	<div class="paging">
		<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
	</div>

    </div>
    <!-- /content of main -->
 

    
</div>
