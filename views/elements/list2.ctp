<?php 

$user = $this->Session->read('Auth');
if(isset($user['User']['id']))
{
$myuserid=$user['User']['id'];
}
?>


<?php
	$i = 0;
	foreach ($onstages as $onstage):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	         
                                <!-- Video item -->
                <div class="video_entry">
                    <div class="video_thumbnail"><span class="cufon"><a href="<?php echo LINK; ?>onstages/view/<?php echo $onstage['Onstage']['id']; ?>/<?php echo $onstage['Onstage']['slug']; ?>">View now</a></span>
                    
             


				  
		<?php if(empty($onstage['Single']['image'])): ?>
		<img src="<?php echo ROOTE;?>imageholder.jpg" width="220" height="100" alt="empty image" class="listingimage" />
		</a>
		<?php else: ?>
				  
		<?php if($html->findExt($onstage['Single']['image'])): ?>
				  
		<img src="<?php echo ROOTE;?>uploads/small/<?php echo $onstage['Single']['image'];?>" width="220" height="100" alt="<?php echo $onstage['Single']['name']; ?>" title="<?php echo $onstage['Single']['name']; ?>" class="listingimage" />
		<?php else: ?>
              	<img src="<?php echo ROOTE;?>uploads/<?php echo $onstage['Single']['image'];?>" width="220" height="100" alt="<?php echo $onstage['Single']['name']; ?>" title="<?php echo $onstage['Single']['name']; ?>" class="listingimage" />
              	<?php endif; ?>
             	<?php endif; ?>
        
                    </div>
                    <div class="video_resume">
                      <h4><a href="<?php echo LINK; ?>onstages/view/<?php echo $onstage['Onstage']['id']; ?>/<?php echo $onstage['Onstage']['slug']; ?>"><?php echo $onstage['Single']['name']; ?> From <?php echo $onstage['Single']['city']; ?></a></h4>
                      
                          
                   
                   <div class="date cufon">
                      <?php 
					  
					  echo date('F j, Y',$onstage['Single']['date']);
					  
                      ?>
                           </div>
                      
                     
                      
                        <p>
						 <?php echo $text->truncate(strip_tags(
    $onstage['Single']['details']),
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