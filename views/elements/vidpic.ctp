 <?php 
$user = $this->Session->read('Auth');
if(isset($user['User']['id']))
{
$myuserid=$user['User']['id'];
}
?>
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
 
 

 
        
 
 
 
        <h5>Today Single on Stage</h5><br />
        <h3> <?php echo $onstage['Single']['name']; ?> <?php echo $onstage['Single']['User']['age']; ?> years old</h3>
        </div>
    
		
		
        <div id="videomain">
        
      	
        <?php
	
		 if($onstage['Onstage']['photo'] == "yes"): ?>
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
		<?php else: ?>
		
        
		  <div id="container4"><a href="http://www.macromedia.com/go/getflashplayer">Get the Flash Player</a> to see this player.</div>
		<?php 	
	
		    if(!empty($onstage['Single']['youtube'])  || !empty($onstage['Single']['file']) ) 
 	 {
 	 	 if(!empty($onstage['Single']['file']))
 	 {
 	 
 	 ?>
 	   <script type="text/javascript">
      var so = new SWFObject("<?php echo LINK; ?>webroot/js/jw/player.swf","phpmotion","600","340","7");
      so.addParam("wmode","transparent");
      so.addParam("allowScriptAccess", "always");
      so.addParam("allowfullscreen","true");
      so.addVariable("bufferlength", "5");
      so.addVariable("fullscreen","true");
      so.addVariable("width","560");
      so.addVariable("height","420");
      so.addVariable("stretching", "exactfit");
      so.addVariable("autostart", "false");
        so.addVariable("image", "<?php echo ROOTE; ?>uploads/medium/<?php echo $onstage['Single']['image']; ?>");
      so.addVariable("file", "<?php echo ROOTE; ?>videos/<?php echo $onstage['Single']['file']; ?>");
      so.addVariable("skin", "<?php echo LINK; ?>webroot/js/jw/Snel.swf");
      so.addVariable("controlbar", "bottom");
      so.addVariable("volume", "100");
so.write("container4");
  </script>
 	 <?php 
 	 }
 	 
 	 elseif(!empty($onstage['Single']['youtube']))
 	 {
 	 ?>
  <div id="container4"><a href="http://www.macromedia.com/go/getflashplayer"></a></div>
    
    
  <script type="text/javascript">
      var so = new SWFObject("<?php echo LINK; ?>webroot/js/jw/player.swf","phpmotion","600","340","7");
      so.addParam("wmode","transparent");
      so.addParam("allowScriptAccess", "always");
      so.addParam("allowfullscreen","true");
      so.addVariable("bufferlength", "5");
      so.addVariable("fullscreen","true");
      so.addVariable("width","560");
      so.addVariable("height","420");
      so.addVariable("stretching", "exactfit");
      so.addVariable("autostart", "false");
      so.addVariable("file", "<?php echo $onstage['Single']['youtube']; ?>");
      so.addVariable("skin", "<?php echo LINK; ?>webroot/js/jw/Snel.swf");
      so.addVariable("controlbar", "bottom");
      so.addVariable("volume", "100");
      so.write("container4");
  </script>
 	
  <?php
 	 
 	 }
 	 	 
 	 	 
 	 }
 	 ?>
		
		
		
	
		

		<?php endif; ?>
       

        
        </div>
        
       