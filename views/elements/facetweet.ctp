       <?php 
function selfURL() { $s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : ""; $protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s; $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]); return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI']; } function strleft($s1, $s2) { return substr($s1, 0, strpos($s1, $s2)); }




?>
   
    <div class="sharing">
                	<ul class="share_left">
                    <li><a href="http://www.facebook.com/sharer.php?u=<?php print(selfURL()); ?>"><img src="<?php echo ROOTE; ?>facebook_32.png" alt="" /><span>Share on Facebook</span></a></li>
                   
         
                   
                    </ul>
                	<ul class="share_right">
                               <li><a href="http://twitter.com/home?status=<?php print(selfURL()); ?>"><img src="<?php echo ROOTE; ?>twitter_32.png" alt="" /><span>Tweet it!</span></a></li>
                               
                    </ul>
          </div>
    
