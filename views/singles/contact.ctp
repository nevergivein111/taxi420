<div id="main">
    <!-- content of main -->
    <div class="content">      
    
    
    	<!-- Intro page -->
        <div class="intro">
        	<h2 class="underlined">Contact</h2>
        </div>
    	<!-- /Intro page -->  
        
        
        
        <!-- col_270_left -->

        
   
        <!-- /col_270_left --> 	
        
        <!-- Left part 600px -->
        <div id="left_part">
        
        	<!-- Form block -->
            <div class="form_block">
                <div class="inside">
          <?php echo $this->Form->create('Single');?>
				                	<div class="form_left">
                    	<label for="contact_name">Name</label>
                        <input type="text" name="data[Contact][email]" id= "contact_name" id="contact_name" class="required" />
                	</div>
                	<div class="form_right">
                    	<label for="contact_email">Email</label>
                        <input type="text" name="data[Contact][email]" id="contact_email" class="required email" />
                	</div>
                    <div class="separator"></div>
                	<div class="form_left">
                    	<label for="contact_web">http://</label>
                        <input type="text" name="data[Contact][http]" id="contact_web" />
                	</div>
                	<div class="form_right">
                    	<label for="contact_subject">Subject</label>
                        <input type="text" name="data[Contact][subject]" id="contact_subject" class="required" />
                	</div>
                    <div class="separator"></div>
                    <div class="form_textarea">
                    	<label for="contact_message">Message</label>
                    	<textarea name="data[Contact][message]" id="contact_message" class="required" rows="5" cols="5"></textarea>
                    </div>
                    <div class="clear"></div>
                    
                    
                    
                    
                       <div id="getit" class="form_right">
                                    <label for="check">Are you a human ?</label>
									<div><span id="num1"><?php echo rand(0, 10); ?></span> + <span id="num2"><?php echo rand(0, 10); ?></span> = <input type="text" name="check" id="check" size="3" maxlength="3" class="field required number" /></div><span id="errorcaptcha"></span></div>                                <div class="clear"></div>
                                <div class="form_submit">
                                    <div id="submitter"></div>
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