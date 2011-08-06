<div id="main">
<div class="content">      
    
    
    	<!-- Intro page -->
        <div class="intro">
        
        	<h2 class="underlined">SIGN IN </h2>
            <h4>&nbsp;</h4>
   
            
        </div>
    	<!-- /Intro page -->  
        
        
        
        <!-- col_270_left --><!-- /col_270_left --> 	
        
        <!-- Left part 600px -->
        
      <div id="left_part"> 
        
        
        	<!-- Form block -->
            <div class="form_block">
                <div class="inside">
<?php echo $this->Session->flash(); ?>

			<?php
 echo $session->flash('auth');
	  echo "<br>"; 
    echo $form->create('User', array('action' =>'login'));
	?>
				                	<div class="form_left">
                    	<label for="contact_name">Username  </label>
                        	<?php
 echo $form->input('username',array("label"=>""));
 ?>
                       
  </div>
                	<div class="form_right">
                    	<label for="contact_email">Password</label>
                              	<?php
 echo $form->input('password',array("label"=>""));
 ?>
                	</div>
                  <div class="separator"></div>
                  
                  
                <div class="clear"></div>
                               
                    <div class="form_submit">
                      <div id="submitter" style="opacity: ; ">-</div>
       <?php echo $form->end('  LogIN  ');?>
                    </div>
                </form><br />
                <a href="<?php echo LINK; ?>users/forgot"><h4>Forgot Password?</h4></a><br />
                 <a href="<?php echo LINK; ?>users/add"> <h4>Dont have account? SIGN UP now</h4></a>
                </div>
            </div>
        	<!-- /Form block -->
            
		</div>
        <!-- /Left part 600px -->
    
    
    <br class="clear" />
    </div>
</div>