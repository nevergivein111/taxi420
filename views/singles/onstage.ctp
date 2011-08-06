<div id="main">
<div class="content">      
    
    
    	<!-- Intro page -->
        <div class="intro">
        
        	<h2 class="underlined">Set the Timer</h2>
            <h4>&nbsp;</h4>
   
            
        </div>
    	<!-- /Intro page -->  
        
        
        
        <!-- col_270_left --><!-- /col_270_left --> 	
        
        <!-- Left part 600px -->
        
      <div id="left_part"> 
        
        
        	<!-- Form block -->
            <div class="form_block">
                <div class="inside">

		

<?php echo $this->Form->create('Single', array('action' => 'onstage')); ?>

				                	<div class="form_left">
 <?php /*?>          <label for="contact_email">Time From</label>
                              	<?php
	
		echo $this->Form->input('timefrom',array('label'=>'','type'=>'date','minYear' => 2011));
 ?>
      <?php */?> 
                       
  </div>
                	<div class="form_right">
                    
                                    
                    	<label for="contact_name">To which Date You want to Display this Single On stage  </label>
                        	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('time',array('label'=>'','type'=>'date','minYear' => 2011));
 ?>
         	</div>
                  
                  
               <div class="form_left">
                    
                        	<?php
		if(!empty($single['Single']['youtube']) || !empty($single['Single']['file']) )
		{
	echo '<label for="contact_name">Check if you want to select Video Instead of Picture   </label>';
	echo $this->Form->input('photo', array(
'type'  => 'checkbox',
'value' =>'no',
'label' => ''
));      
		}
		echo $this->Form->input('newid',array('type'=>'hidden','value'=>$this->params['pass']['0']));
	
 ?>
                       
  </div>
                  
                  
                  <div class="separator"></div>
                  
                  
                  
                  
                  
                <div class="clear"></div>
                               
                    <div class="form_submit">
                      <div id="submitter" style="opacity: 1; ">-</div>
<?php echo $this->Form->end(__('Submit', true));?>
                    </div>
                </form><br />

                </div>
            </div>
        	<!-- /Form block -->
            
		</div>
        <!-- /Left part 600px -->
    
    
    <br class="clear" />
    </div>
</div>




