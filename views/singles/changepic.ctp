<div id="main">
    <!-- content of main -->
    
    
    
    
    
    <div class="content">      
    
    
    	<!-- Intro page -->
        <div class="intro">
        	<h2 class="underlined">Add a Single </h2>
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
     <?php echo $this->Form->create('Single',array('enctype' => 'multipart/form-data'));?>
     		<?php echo $this->Form->input('id'); ?>
		
      <div class="form_left">
  <label for="SingleYoutube">Replace your Display Pic</label>
                    	<?php echo $form->file("File.submittedfile"); ?>
        </div>

                      
                      
               	                   <div class="separator"></div>
                  
                  
                </div>
                </fieldset>
                  <div class="clear"></div>
                               
                    <div class="form_submit">
                      <div id="submitter" style="opacity: 1; ">-</div>
      <?php echo $this->Form->end(__('Submit', true));?>
                    </div>
                </form>
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