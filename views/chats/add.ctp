<div id="left_part">


        
        	<!-- Form block -->
            <div class="form_block">
                <div class="inside">
  <?php echo $this->Form->create('Chat',array("action"=>"add/".$to));?>
  	<?php echo $this->Form->input('id'); ?>
    
    
    
    
    
    
    	<h4>Select The Reason of Contact</h4>
        <br />
    
    
    
                  <div class="form_left">
                    	<label for="contact_name">Want to Marry</label>
                  <?php echo $this->Form->checkbox('wantToMarry', array('value' =>"yes")); ?>
               	  </div>
                	<div class="form_right">
                    	<label for="contact_email">Want a Flirt </label>
                 		<?php echo $this->Form->checkbox('wantToFlirt', array('value' =>"yes")); ?>
                	</div>
                  <div class="separator"></div>
                  
                  <div class="form_left">
                    	<label for="contact_name">Want a Relationship</label>
                 		<?php echo $this->Form->checkbox('wantToRelationship', array('value' =>"yes")); ?>
               	  </div>
                	<div class="form_right">
                    	<label for="contact_email">Dont Know</label>
                 	<?php echo $this->Form->checkbox('dontKnow', array('value' =>"yes")); ?>
                	</div>
                  <div class="separator"></div>
                  
    
    
    
    
    
    <h4>Enter Your Message</h4>
    
    <br />
    
    
				          
                	<div class="form_right">
                    	<label for="contact_email">Subject</label>
	<?php echo $this->Form->input('subject',array("label"=>"")); ?>
                	</div>
                  <div class="separator"></div>
                  <div class="form_textarea">
               	    <label for="contact_message">Message</label>
                <?php
		
	
		echo $this->Form->input('message',array("label"=>""));
		?>
                  </div>
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

