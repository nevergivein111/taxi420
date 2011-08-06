<?php $javascript->link('city.js', false); ?>
<script>
function WaitDiv()
{
	document.getElementById('wait').style.display = 'block';
}
</script>



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
<?php echo $this->Form->create('Single',array('enctype' => 'multipart/form-data','onsubmit'=>'WaitDiv()'));?>
				                	<div class="form_left">
                    	<label for="contact_name">Country</label>
<?php 
	
	echo $form->input('country', array(
	'type' =>'select',
	'onchange'=>'getCity("'.LINK.'singles/ok/"+this.value)',
	'label'=>"",
	'value'=>"NULL",
	'options' => $countries,
	'empty' => 'Select Country'
	));
	
    ?>
           
                    
                    </div>
                    
                    
                    
                	<div class="form_right">
                    
            
                    
                    
                    
                    
                    	<label for="contact_email">Your Name</label>
<?php echo $this->Form->input('name',array("label"=>"")); ?>

                	</div>
                  <div class="separator"></div>
                  <div class="form_left">
                    	<label for="contact_name">City</label>
                        
                         <div id="citydiv">
<?php 
	
	echo $form->input('city', array(
	'type' =>'select',
	'label'=>"",
	'empty' => 'Select City'
	));
	
    ?>
                          </div>
               	  </div>
                	<div class="form_right">
                    	<label for="contact_email">Language</label>
<?php echo $this->Form->input('language',array("label"=>"")); ?>
                                       	</div>
                  <div class="separator"></div>
                  
                  <div class="form_textarea">
               	    <label for="contact_message">Details</label>
<?php echo $this->Form->input('details',array("label"=>"")); ?>
                  </div>
                  <div class="separator">
                  </div>
        
        
                                   
                  <fieldset>
                    <div></div>
                    <br />
                    <div id="general">
                    <h3>Add Pictures</h3>
                    
      
                    
                    <p>Note: MAXIMUM File Siz:4 MB <br />
<?php echo $form->file("File.first.submittedfile"); ?>
                    <br />
<?php echo $form->file("File.second.submittedfile"); ?>
                    <br />
<?php echo $form->file("File.third.submittedfile"); ?>
                    <br />
<?php echo $form->file("File.fourth.submittedfile"); ?>
                    <br />
<?php echo $form->file("File.fivth.submittedfile"); ?>
                    <br />
<?php echo $form->file("File.sixth.submittedfile"); ?>
                    </p></div>
                    <p> 
                    <br /><br />
                    <div id="general2"><h3>Add Video file </h3>
                    <p>
<?php echo $form->file("File.video"); ?>
                      </p></div>
                    </p>
                    <br />
                    <div class="separator"></div>
                    <p><br /><div class="form_left">
                    
                      <label for="SingleYoutube">Enter Youtube (http://) Link</label>
                      	<?php echo $this->Form->input('youtube',array("label"=>"")); ?> 
                      
               	  </div>
                	<div class="form_right">
                    	<label for="contact_email">Eyes</label>
						<?php echo $this->Form->input('eyes',array("label"=>"")); ?>
                	</div>
                  <div class="separator"></div>
                  
                  <div class="form_left">
                      <label for="SingleYoutube">Hairs</label>
					  <?php echo $this->Form->input('hairs',array("label"=>"")); ?>
               	  </div>
                	<div class="form_right">
                    	<label for="contact_email">Body Type</label>
						<?php 	echo $this->Form->input('bodyType',array("label"=>"")); ?>
                	</div>
                  <div class="separator"></div>
                  
                  
                  
                  
                     <div class="form_left">
                <label for="SingleYoutube">Weight</label>
                 		<?php $option = array(
	'40 KG' => '40 Kg', 
	'50 KG' => '50 Kg',
	'60 KG' => '60 Kg',
	'70 Kg' => '70 Kg',
	'80 Kg' => '80 Kg',
	'90 Kg' => '90 Kg',
	'100 Kg' => '100 Kg'
	);
	echo $form->input('weight', array(
	'type' =>'select',
	'label'=>"", 
	'options' => $option,
	'empty' => 'Select weight'
	));
    ?>
                      
      
               	  </div>
                	<div class="form_right">
                <label for="contact_email">Relationship Status</label>
				<?php
                 		$options = array(
	'Single' => 'Single', 
	'Married' => 'Married',
	'Engaged' => 'Engaged',
	'Committed' => 'Committed',
	'Open' => 'Open'
	);
	echo $form->input('relationshipStatus', array(
	'type' =>'select', 
	'label'=>"",
	'options' => $options,
	'empty' => 'Relationship Status'
	));
		?>
                	</div>
                  <div class="separator"></div>
                  
                      <div class="clear"></div>
                               
                  <div id="getit" class="form_right">
                                    <label for="check">Are you a human ?</label>
<?php $is= rand(0, 10); ?>
<?php $sec= rand(0, 10); ?>
<?php 	echo $this->Form->input('ist',array("label"=>"","type"=>"hidden","value"=>$is)); ?>
<?php 	echo $this->Form->input('2nd',array("label"=>"","type"=>"hidden","value"=>$sec)); ?>
                                    
									<div><span id="num1"><?php echo $is; ?></span> + <span id="num2"><?php echo $sec; ?></span> = <input type="text" name="check" id="check" size="3" maxlength="3" class="field required number" /></div><span id="errorcaptcha"></span></div>                                <div class="clear"></div>
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
    
  
    
    
    
    
     
    
    
    <div class="content"><!-- Left part 600px --><!-- /Left part 600px -->
        
   
        
        <!-- Sidebar 270px --><!-- /Sidebar 270px --> 	
    
    
    <br class="clear" />
    </div>
  
    <!-- /content of main -->
</div>
         <div id="wait" style="display: none;">Please wait -While Uploading .............</div>	