<script>

    function getCity(strURL)
    {     
	
	   var req = new XMLHttpRequest();
      // fuction to get xmlhttp object

      req.onreadystatechange = function()
     {
      if (req.readyState == 4) { //data is retrieved from server
       if (req.status == 200) { // which reprents ok status                    
         document.getElementById('citydiv').innerHTML=req.responseText;
      }
      else
      { 
         alert("There was a problem while using XMLHTTP:\n");
      }
      }            
      }        
    req.open("GET", strURL, true); //open url using get method
    req.send(null);
     
    }

</script>
<div id="main">
    <!-- content of main -->
    <div class="content">      
    
    
    	<!-- Intro page -->
        <div class="intro">
        	<h2 class="underlined">Get  Updates From Your Favourit CITY</h2>
        </div>
    	<!-- /Intro page -->  
        
        
        
        <!-- col_270_left -->

        <!-- /col_270_left --> 	
        
        <!-- Left part 600px -->
        <div id="left_part">
        
        	<!-- Form block -->
            <div class="form_block">
            
            <br />
          
                <div class="inside">
             <?php echo $this->Form->create('Single');?>
				                	<div class="form_left">
                    	<label for="contact_name">Country</label>
                                          
      <?php 
	
	echo $form->input('News.country', array(
	'type' =>'select',
	'onchange'=>'getCity("/single/singles/ok/"+this.value)',
	'label'=>"",
	'options' => $countries,
	'empty' => 'Select Country'
	));
	
    ?>
                        
                	</div>
                	<div class="form_right">
                    	<label for="contact_email">Email</label>
                          <?php echo $this->Form->input('News.email',array("label"=>"")); ?>
                	</div>
                    <div class="separator"></div>
                	<div class="form_left">
                        	<label for="contact_email">Name</label>
                        
  <?php echo $this->Form->input('News.name',array("label"=>"")); ?>
                   
 
                	</div>
                	<div class="form_right">
            	<label for="contact_name">City</label>
                        
                         <div id="citydiv">
                      <?php 
	
	echo $form->input('list cities', array(
	'type' =>'select',
	'label'=>"",
	'empty' => 'Select City'
	));
	
    ?>
                          </div>
                	</div>
                    <div class="separator"></div>
                    
                                        <div class="clear"></div>
					
             <div class="form_submit">
                      <div id="submitter" style="opacity: 1; ">-</div>
    <?php echo $this->Form->end(__('Submit', true));?>
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