  <div id="container4"></div>
    
		<?php 	
		
		    if(!empty($single['Single']['youtube'])  || !empty($single['Single']['file']) ) 
 	 {
 	 	 if(!empty($single['Single']['file']))
 	 {
 	 
 	 ?>
 	   <script type="text/javascript">
      var so = new SWFObject("<?php echo LINK; ?>webroot/js/jw/player.swf","phpmotion","560","420","7");
      so.addParam("wmode","transparent");
      so.addParam("allowScriptAccess", "always");
      so.addParam("allowfullscreen","true");
      so.addVariable("bufferlength", "5");
      so.addVariable("fullscreen","true");
      so.addVariable("width","560");
      so.addVariable("height","420");
      so.addVariable("stretching", "exactfit");
      so.addVariable("autostart", "false");
        so.addVariable("image", "<?php echo ROOTE; ?>uploads/<?php echo $single['Single']['image']; ?>");
      so.addVariable("file", "<?php echo ROOTE; ?>videos/<?php echo $single['Single']['file']; ?>");
      so.addVariable("skin", "<?php echo LINK; ?>webroot/js/jw/Snel.swf");
      so.addVariable("controlbar", "bottom");
      so.addVariable("volume", "100");
so.write("container4");
  </script>
 	 <?php 
 	 }
 	 
 	 elseif(!empty($single['Single']['youtube']))
 	 {
 	 ?>
  <div id="container4"></div>
    
    
  <script type="text/javascript">
      var so = new SWFObject("<?php echo LINK; ?>webroot/js/jw/player.swf","phpmotion","560","420","7");
      so.addParam("wmode","transparent");
      so.addParam("allowScriptAccess", "always");
      so.addParam("allowfullscreen","true");
      so.addVariable("bufferlength", "5");
      so.addVariable("fullscreen","true");
      so.addVariable("width","560");
      so.addVariable("height","420");
      so.addVariable("stretching", "exactfit");
      so.addVariable("autostart", "false");
      so.addVariable("file", "<?php echo $single['Single']['youtube']; ?>");
      so.addVariable("skin", "<?php echo LINK; ?>webroot/js/jw/Snel.swf");
      so.addVariable("controlbar", "bottom");
      so.addVariable("volume", "100");
      so.write("container4");
  </script>
 	
  <?php
 	 
 	 }
 	 	 
 	 	 
 	 }
 	 ?>
		
		
		
	