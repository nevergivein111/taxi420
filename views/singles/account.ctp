<?php
$user = $this->Session->read('Auth');
if(isset($user['User']['id']))
{
$myusername=$user['User']['username'];
}
?>
<div id="main">
    <!-- content of main -->

    <div class="content">      
     
     <div class="intro">
        	<h2 class="underlined">Welcome </h2>
        </div>

        <!-- col_270_left -->
      <?php echo $this->element("leftaccount"); ?>
        <!-- /col_270_left --> 	
        
        <!-- Left part 600px -->
        
        <div id="left_part">
        <br />

        <h3>Welcome <?php echo $myusername; ?>! to your account at </h3>
        <br />
        <h1>Taxi 420</h1>  
        
        
         <br />
        <?php if(empty($stage)): ?>
		   <br />
        <h4>
  	<div class="chattingboxlowerlefttab"><a href="<?php echo LINK; ?>singles/add">Create Your Profile </div>
    
</h4>
 <br />
      <h4>And Present your self On stage !</h4> 
      
      <?php else: ?>
       <br />
        <br />
      
      <h4>Find ! Where are you  are on taxi420.com!</h4> 
          <h4>
  	<div class="chattingboxlowerlefttab"><a href="<?php echo LINK; ?>singles/view/<?php echo $stage['Single']['slug']; ?>">My Profile </div>
    
</h4>
      
		
		<?php endif; ?>   	   
            
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