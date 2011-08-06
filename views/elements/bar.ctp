 <?php 
$user = $this->Session->read('Auth');
if(isset($user['User']['id']))
{
$myuserid=$user['User']['id'];
}
?>
  <div class="indexvideoleftbottom">
      
        <div class="indexvideoleftbottomdivider">
        
        <div class="indexvideoleftbottomdivider">
     
        
<script type="text/javascript">
<!--
  var viewer = new PhotoViewer();
  <?php foreach($photos as $photo): ?>
  viewer.add('<?php echo ROOTE; ?>uploads/<?php echo $photo['Photo']['name']; ?>');
  <?php endforeach; ?>
//--></script>
<a href="javascript:void(viewer.show(0))" class=" button3 lightblue">Picture(<?php echo $countphotos; ?>)</a>

        </div>       
      
             
        </div>
        
        <div class="indexvideoleftbottomdivider">
	
    <?php 
    if(!empty($onstage['Single']['file']) || !empty($onstage['Single']['youtube']) ):
?>
	      <p><a class='example5 button3 lightblue' href="<?php echo LINK; ?>onstages/video/<?php echo $onstage['Single']['id']; ?> " title="">Video</a></p>
	<?php 
 else:
	 ?>
 
	 
	 
     <?php endif; ?>
    
    
   
    
    
    
    
      
        
        </div>
        
        
        <div class="indexvideoleftbottomdivider">
        
        <?php 
		if(isset($user['User']['id'])): ?>
        
        
        
        
  
 <?php  if(isset($onstage['Single']['User']['id'])): ?>
 
 				
		 
  
				  <?php if($onstage['Single']['User']['id'] == $myuserid): ?>
  
						<p><a class=' button3 lightblue'
         		href="<?php echo LINK; ?>chats" title="">Messages</a></p>
	  
				 <?php else: ?>
	 
				<p><a class='example5 button3 lightblue'
         		href="<?php echo LINK; ?>chats/add/<?php echo $onstage['Single']['User']['id'] ?>" title="">Chat</a></p>
	 
	 			<?php endif; ?>
                
      <?php endif; ?>
      
       <?php  if(isset($onstage['User']['id'])): ?>          
                
                
                 <?php if($onstage['User']['id'] == $myuserid): ?>
  
						<p><a class=' button3 lightblue'
         		href="<?php echo LINK; ?>chats" title="">Messages</a></p>
	  
				 <?php else: ?>
	 
				<p><a class='example5 button3 lightblue'
         		href="<?php echo LINK; ?>chats/add/<?php echo $onstage['User']['id'] ?>" title="">Chat</a></p>
	 
	 			<?php endif; ?>

         
        <?php endif; ?>
        

<?php 
else:
?>
 <a href="<?php echo LINK; ?>users/add" class="button3 lightblue">Chat</a>

 <?php endif; ?>

</div>	
       </div>
        
        </div>
      