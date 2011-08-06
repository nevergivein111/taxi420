<div id="main">
    <!-- content of main -->
    <div class="content"><!-- Left part 600px -->
        <div id="left_part">
        
        	        	<!-- Blog entry --><!-- /Blog entry -->
                        
                        
            <!-- VIDEO Last -->
          <h3 class="underlined">Singles On Stage</h3>
	<?php echo $this->element('list'); ?>            
                
    
            <!-- /VIDEO Last -->
            
	  </div>
        <!-- /Left part 600px -->
        
        
        
        <!-- Sidebar 270px -->
        <div id="sidebar">
        <div class="inside">
        
        
        
        <div class="separator"></div>
        
        <!-- Recents Articles -->
      <div class="inner_padding">
<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like-box href="http://www.facebook.com/pages/Taxi420/224924310868480?created" width="240" show_faces="true" border_color="" stream="false" header="true"></fb:like-box>
        </div>
        <!-- /Recents Articles -->
        
        <div class="separator"></div>
        
        <!-- Recents Interviews -->
       <?php echo $this->element("profiles"); ?> 
               <!-- /Recents Interviews -->
        
        <div class="separator"></div>
        
        
        
        
        
        <div class="separator"></div>
        
        <!-- Advertisings -->
        <div class="advertisings">
        <a href="#"><img src="./temp/ad_125x125_v3.gif" alt="" /></a>
        <a href="#"><img src="./temp/ad_125x125_v3.gif" alt="" /></a>
        <a href="#"><img src="./temp/ad_125x125_v3.gif" alt="" /></a>
        <a href="#"><img src="./temp/ad_125x125_v3.gif" alt="" /></a></div>
        <!-- /Advertisings -->        
        </div>
        </div>
        <!-- /Sidebar 270px --> 	
    
    
    <br class="clear" />

	<div class="paging">
		<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
	</div>

    </div>
    <!-- /content of main -->
 

    
</div>

	