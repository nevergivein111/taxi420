<div id="main">
    <!-- content of main -->
    <div class="content">
  
        
        <div id="indexvideo">
        
        <div class="indexvideoleft">
        
       
       
       
       <?php echo $this->element('vidpic'); ?>
         <?php echo $this->element('bar'); ?>
      
        
        <div class="indexvideoright">
        
     
        <?php $new=time();
		$count_from = date("Y-m-d H:i:s",$new);
		//echo $onstage['Onstage']['timefrom'];

list($date, $time) = explode(' ',$count_from);
list($year, $month, $day) = explode('-', $date);
list($hour, $minute, $second) = explode(':', $time);


//echo $hour.":".$minute.":".$second;


$timestamp = mktime($hour, $minute, $second, $month, $day, $year);

$count_from = date("Y-m-d H:i:s",$timestamp);

list($year2, $month2, $day2) = explode('-', $onstage['Onstage']['time']);

$timestamp2 = mktime(24, 0, 0, $month2, $day2, $year2);

//echo $count_from2 = date("Y-m-d H:i:s",$timestamp2);

if($timestamp2 > $timestamp):
		 ?>
            <div class="counterarea" >
		<center><h3>Avilable Untill</h3></center>
        </div>
        <div class="counterarea" >
<SCRIPT language="JavaScript" SRC="<?php echo LINK; ?>webroot/js/countdown.php?timezone=Asia/Karachi&countfrom=<?php echo $count_from; ?>&countto=<?php echo $onstage['Onstage']['time']; ?> 23:59:59&do=t&data=EXPIRED 2011"></SCRIPT>
        </div>
        <?php else: ?>
        
     <h2>Off Stage</h2>
        <?php endif; ?>
        
        
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
                  <?php echo $this->element('profile'); ?>
                
                
                
                
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
                     
                            
            <h3 class="underlined">
          
            
            <div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:comments href="<?php print(selfURL()); ?>" num_posts="10" width="600"></fb:comments>
            
            </h3>
                        
            <!-- VIDEO Last -->
            <h3 class="underlined">Recent On stage</h3>
                                <!-- Video item -->
                <?php echo $this->element('list'); ?> 
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
       <?php echo $this->element("profiles"); ?> 
        <!-- /Recents Interviews -->
        
        <div class="separator"></div>
        
        
        
        
        
        <div class="separator"></div>
        
        <!-- Advertisings -->

        </div>
        <!-- /Sidebar 270px --> 	
    
    
    <br class="clear" />
    </div>
    
    <!-- /content of main -->
</div>


