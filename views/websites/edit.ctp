<div id="main">
    <!-- content of main -->
    <div class="content">      
    
    
    	<!-- Intro page -->
        <div class="intro">
        	<h2 class="underlined">Contact</h2>
        </div>
    	<!-- /Intro page -->  
        
        
        
        <!-- col_270_left -->

              <?php echo $this->element("leftaccount"); ?>
   
        <!-- /col_270_left --> 	
        
        <!-- Left part 600px -->
        <div id="left_part">
        
        	<!-- Form block -->
            <div class="form_block">
                <div class="inside">
       <?php echo $this->Form->create('Website');?>
				
                    <div class="separator"></div>
                    <div class="form_textarea">
                    	<label for="contact_message">About US</label>
          	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('aboutus',array("label"=>""));
	?>
                    </div>
                    <div class="clear"></div>
                    
                    
                    
                    
                       <div id="getit" class="form_right">
                          
									            <div class="clear"></div>
                                <div class="form_submit">
                                    <div id="submitter"><?php echo $this->Form->end(__('Submit', true));?></div>
                                </div>
                    
                    
                    
                    
                    
					
      
                    </div>
                </form>
                </div>
            </div>
        	<!-- /Form block -->
            
		</div>
        <!-- /Left part 600px -->
    
    
    <br class="clear" />
    </div>
    <!-- /content of main -->
</div>