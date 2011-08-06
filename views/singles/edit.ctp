<?php $javascript->link('city.js', false); ?>
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
                    	<label for="contact_name">Name</label>
                      	<?php echo $this->Form->input('name',array("label"=>"")); ?>
                	</div>
                	<div class="form_right">
                    	<label for="contact_email">Country</label>
                    <?php 
	
	echo $form->input('country', array(
	'type' =>'select',
	'onchange'=>'getCity("'.LINK.'singles/ok/"+this.value)',
	'label'=>"",
	'options' => $countries,
	'empty' => 'Select Country'
	));
	
    ?>
                	</div>
                  <div class="separator"></div>
                  <div class="form_left">
                    	<label for="contact_name">City</label>
                                  <div id="citydiv">
                  <?php
 
	
	echo $form->input('Single.city', array(
	'type' =>'select',
	'label'=>"",
	'options' => $cities,
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
                    <h3><a href="<?php echo LINK;?>singles/addpic/<?php echo $stage["Single"]["id"]; ?>">Add More Pictures</a></h3>
                    </div>
                             <br /><br />
                       <div id="general">
                    <h3><a href="<?php echo LINK;?>singles/photos/<?php echo $stage["Single"]["id"]; ?>">Manage Pictures</a></h3>
                    </div>
                    <p> 
                    <br /><br />
                       <div id="general2"><h3>
                    <?php if(!empty($stage["Single"]["file"]))
	  {
	  ?>
      	<a href="<?php echo LINK;?>singles/removevideo/<?php echo $stage["Single"]["id"]; ?>">Remove Current Video</a>
		<?php 
		}
		?>
      
      
                 </h3>
                    
                    </div>
                    </p>
                    <br />
                    <div class="separator"></div>
                    <p><br />
                               <?php if(empty($stage["Single"]["file"]))
	  {
	  ?>
      <div class="form_left">
  <label for="SingleYoutube">Enter Youtube (http://) Link</label>
                      	<?php echo $this->Form->input('youtube',array("label"=>"")); ?>
        </div>
		<?php 
		}
		?>
                      
                      
               	 
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