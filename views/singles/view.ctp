<?php
$user = $this->Session->read('Auth');
if(isset($user['User']['id']))
{
$myuserid=$user['User']['id'];
}
?>
<div id="main">
    <!-- content of main -->
    <div class="content">
  
        
        <div id="indexvideo">
        
        <div class="indexvideoleft">
        
        <div class="indexvideolefttop">
        
            <?php 
		if(isset($user['User']['id'])): ?>
        
   
  <?php
  if(isset($onstage['Single']['User']['id'])): ?>
  
  
 <?php if($onstage['Single']['User']['id'] == $myuserid): ?>
 
  	   <p><a class='button2 black ' href="<?php echo LINK; ?>singles/account" title="">MY account</a></p>
  
  <?php else: ?>
  	   <p><a class='example5 button2 black lightblue' href="<?php echo LINK; ?>chats/add/<?php echo $onstage['Single']['User']['id']; ?>" title="">Get In Touch With Me</a></p>
       
       <?php endif; ?>
  <?php
 elseif(isset($onstage['User']['id'])): 
	 ?>
     <?php if($onstage['User']['id'] == $myuserid): ?>
 
  	   <p><a class=' button2 black lightblue' href="<?php echo LINK; ?>singles/account" title="">MY account</a></p>
  
  <?php else: ?>
  	  <p><a class='example5 button2 black lightblue' href="<?php echo LINK; ?>chats/add/<?php echo $onstage['User']['id'];?>" title="">Get In Touch With Me</a></p> 
       
       <?php endif; ?>
     
    
	
	<?php endif; ?>

<?php 
else:
?>
 <a href="<?php echo LINK; ?>users/login" class="button2 black">Get In Touch With Me</a>

 <?php endif; ?>
 
 
 
        <h5>Single on Stage</h5><br />
        <h3> <?php echo $onstage['Single']['name']; ?> <?php echo $onstage['User']['age']; ?> years old</h3>
        </div>
        
        <div id="videomain">
		
	<center>
    	
	

        
        
        
        
        
        <?php if(empty($onstage['Single']['image'])): ?>
        
        
        
		<img src="<?php echo ROOTE;?>imageholder.jpg" width="220" height="100" alt="Listing Image" class="listingimage" />
		</a>
		
		
		<?php else: ?>
				  
		<?php if($html->findExt($onstage['Single']['image'])): ?>
				  
      	<img id="imagebox" style="display:block" src="<?php echo ROOTE;?>uploads/medium/<?php echo $onstage['Single']['image']; ?>" alt="<?php echo $onstage['Single']['name']; ?>" title="<?php echo $onstage['Single']['name']; ?>"  />
		<?php else: ?>
     <img id="imagebox" style="display:block" src="<?php echo ROOTE;?>uploads/<?php echo $onstage['Single']['image']; ?>" width="600" height="340" alt="<?php echo $onstage['Single']['name']; ?>" title="<?php echo $onstage['Single']['name']; ?>"  />
              	<?php endif; ?>
             	<?php endif; ?>
        
        
        
        
        
        
        
        
        
        
        
	</center>
        </div>
        
           <?php echo $this->element('bar',array('onstage'=>$onstage)); ?>  
        <div class="indexvideoright">
        
  
           <?php echo $this->element('counter'); ?>
        
        
        
    
        
        
        
        <!-- Social counters -->
    
        <!-- /Social counters -->
        
        
        
        <div id="social_counters">
        
      <?php 

$user = $this->Session->read('Auth');
if(isset($user['User']['id']))
{
$myuserid=$user['User']['id'];
}
?>  
        
        
        
         <?php 
		if(isset($user['User']['id'])): ?>

   <a href="<?php echo LINK; ?>singles/account" class="button4 aqua">be the next on stage</a>

<?php 
else:
?>
     
        <a href="<?php echo LINK; ?>users/add" class="button4 aqua">be the next on stage</a>
        

 <?php endif; ?>
 


 
            
        </div>
        
      
        
        
        
        
        
        
        
         <div id="social_counters">
<center>

   <a href="<?php echo LINK; ?>singles/news" class="button4 aqua">Get Newslatters</a>
</center>

        </div>
        
        
             <div id="social_counters">
<center>   
        
          
        
        
        
        </center>

        </div>
        
        
        
        
        
        
        <div id="social_counters">
        <center>
        
        
        
      <div class="inner_padding">
<strong>Search Singles By Entering City</strong>:


<form method="get" action="<?php echo LINK; ?>singles/search">

<input class="input" name="city" type="text" size="30"  value='<?php echo (isset($this->params['named']['city']) ? $this->params['named']['city'] : ''); ?>'/>



    <input type="submit" class="button" value="Search" /></div>

</form>
</center>

        </div>

        
        
        
        
        </div>  
        
           
        </div>
        
        
        
        
        
        
        
        
        <!-- Left part 600px -->
        <div id="left_part">
        
        	        	<!-- Blog entry -->
            <div class="blog_entry">
            	
                <!-- inside -->
            	<div class="inside">
                
        		<!-- Thumbnail -->
            	
        		<!-- /Thumbnail -->
                
        		<!-- Resume -->
            	<div class="resume">
                	<h3 class="cufon">A few words about me</h3>
                    <p class="bigline"><?php echo $onstage['Single']['details']; ?>               </p>
            	</div>
        		<!-- /Resume -->
                
                <br class="clear" />
             	</div>   
                <!-- /inside -->
                
                
                
                <!-- /profile-->
               <div id="indexprofile">
                <h3>My Profile</h3>
                <br />
                <div class="indexprofileleft">
       			
                <div class="indexprofilerightentity">Relationship Status</div>
                <div class="indexprofilerightentity">Nationality</div>
                <div class="indexprofilerightentity">Sex</div>
                <div class="indexprofilerightentity">Languages</div>
                <div class="indexprofilerightentity">Eyes </div>
                <div class="indexprofilerightentity">Hair</div>
                <div class="indexprofilerightentity">Body type</div>
                <div class="indexprofilerightentity">Age</div>
                <div class="indexprofilerightentity">Weight(kg)</div>
                </div>
               
                <div class="indexprofileright">
                
		  <div class="indexprofilerightentity"><?php echo $onstage['Single']['relationshipStatus']; ?>.</div>
                <div class="indexprofilerightentity"><?php echo $onstage['Single']['country']; ?>.</div>
                <div class="indexprofilerightentity"><?php echo $onstage['User']['sex']; ?>.</div>
                <div class="indexprofilerightentity"><?php echo $onstage['Single']['language']; ?>.</div>
                <div class="indexprofilerightentity"><?php echo $onstage['Single']['eyes']; ?>.</div>
                <div class="indexprofilerightentity"><?php echo $onstage['Single']['hairs']; ?>.</div>
                <div class="indexprofilerightentity"><?php echo $onstage['Single']['bodyType']; ?>.</div>
                <div class="indexprofilerightentity"><?php echo $onstage['User']['age']; ?>.</div>
                <div class="indexprofilerightentity"><?php echo $onstage['Single']['weight']; ?>.</div>
                
                </div>
                
                </div>
                
                
                
                
                
                
        		<!-- info -->
            	<!--<div class="info">
                	<p class="date cufon">Eric bell 24 years old , DALLAS ,TX</p>
                	<p class="comments"><a href="./news_read/stereoline-the-new-php-template/index.html#comments">
					3 comments</a></p>
                	<p class="readmore cufon"><a href="./news_read/stereoline-the-new-php-template/index.html" title="Sunday 12 September 2010 at 07:30 pm">Read More</a></p>
              </div>-->
        		<!-- /info -->
            </div>
            <!-- /Blog entry -->
            
                        
                       <?php echo $this->element("facetweet"); ?>    
            <!-- VIDEO Last -->
                   
            <h3 class="underlined">
          
            
            <div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:comments href="<?php print(selfURL()); ?>" num_posts="10" width="600"></fb:comments>
            
            </h3>
            
            <h3 class="underlined">Recent On stage</h3>
                                <!-- Video item -->
                <?php echo $this->element('list2'); ?> 
               					 <!-- Video item -->
        
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
       
        <!-- /Recents Interviews -->
        
        <!-- Recents Interviews -->
       
      <?php echo $this->element("profiles"); ?>        <!-- /Recents Interviews -->
        
        <div class="separator"></div>
        
        
        
        
        
        <div class="separator"></div>
        
        <!-- Advertisings -->
  
        <!-- /Advertisings -->        
        </div>
        </div>
        <!-- /Sidebar 270px --> 	
    
    
    <br class="clear" />
    </div>

    <!-- /content of main -->
</div>


