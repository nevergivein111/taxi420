<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<!-- METAS -->
   <?php if(isset($meta_description) && isset($meta_keywords)): ?>

<?php echo $html->meta(
    'description',$meta_description
   );?>

<?php echo $html->meta(
    'keywords',$meta_keywords
);?>

<?php else: ?>
<meta name="description" content="Singles! Who want to present there self for marrige, friendship ,dating anything" />
<meta name="keywords" content="single,girls,boys,dating,pictures" />
<?php endif; ?>

	<title>
    
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('styles');
		echo $this->Html->css('royal');
		echo $this->Html->css('colorbox');

		echo $scripts_for_layout;
	?>

		<script src="<?php echo LINK; ?>webroot/js/jw/swfobject.js"></script>
    <script src="<?php echo JSS; ?>jquery-1.4.4.min.js"></script>
      <script src="<?php echo JSS; ?>jquery.easing.1.3.js"></script>
          <script src="<?php echo JSS; ?>custom.js"></script>
            <script src="<?php echo JSS; ?>jquery.colorbox.js"></script>
              <script src="<?php echo JSS; ?>slide.js"></script>
                <script src="<?php echo JSS; ?>cufon-yui.js"></script>
              <script src="<?php echo JSS; ?>bebas_400.font.js"></script>


   
    
    
    

    
    
    
    
          
    <!--[if IE 6]>
        <script type="text/javascript" src="http://www.littlekillian.com/js/DD_belatedPNG.js"></script>
        <script src="http://www.littlekillian.com/js/DD_belatedPNG.js"></script>
        <script>
          /* EXAMPLE */
          DD_belatedPNG.fix('*');
        </script>
	<![endif]-->
    
    
    
    
    
    
    <script>
		$(document).ready(function(){
			//Examples of how to assign the ColorBox event to elements
			$("a[rel='example1']").colorbox();
			$("a[rel='example2']").colorbox({transition:"fade"});
			$("a[rel='example3']").colorbox({transition:"none", width:"100%", height:"100%"});
			$("a[rel='example4']").colorbox({slideshow:true});
			$(".example5").colorbox({width:"64%", height:"90%"});
			$(".example6").colorbox({iframe:true, innerWidth:600, innerHeight:600});
			$(".example7").colorbox({width:"80%", height:"90%", iframe:true});
			$(".example8").colorbox({width:"50%", inline:true, href:"#inline_example1"});
			$(".example9").colorbox({
				onOpen:function(){ alert('onOpen: colorbox is about to open'); },
				onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
				onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
				onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
				onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
			});
			
			//Example of preserving a JavaScript event for inline calls.
			$("#click").click(function(){ 
				$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
				return false;
			});
		});
	</script>
    
    
    
    
     
     
			
<meta charset="UTF-8"></head>

<body>

<!-- WRAP -->
<div class="wrap">


<!-- HEADER -->
<div id="header">
    <!-- content of header -->
    <div class="content">
    
    	<!-- Demo theme -->
		<div class="demo_theme">
        <script type="text/javascript">
		<!--
		function MM_jumpMenu(targ,selObj,restore){ //v3.0
		  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
		  if (restore) selObj.selectedIndex=0;
		}
		//-->
		</script>
        	
        	
        </div>
    	<!-- Demo theme -->
        
        <!-- Top Nav -->
        <div id="top_nav">
            <ul>
            <li class="home"><a href="<?php echo LINK; ?>" class="current">Home</a></li>
            <li class="about"><a href="<?php echo LINK; ?>websites/view/1" >About</a></li>
             <li class="mail"><a href="<?php echo LINK; ?>singles/contact" >Contact</a></li>
         	 <?php 
$user = $this->Session->read('Auth');
if(isset($user['User']['id']))
{
$myuserid=$user['User']['id'];
$myusername=$user['User']['username'];

}
?>
                 <?php if(isset($myuserid)): ?>
            <li class="mail"><a href="<?php echo LINK; ?>users/logout" >LogOut (<?php echo $myusername; ?>)</a></li>
            <?php else: ?>
			  <li class="mail"><a href="<?php echo LINK; ?>users/login" >LogIn</a></li>
			<?php endif; ?>
            
                <?php if(isset($myuserid)): ?>
            <li class="mail"><a href="<?php echo LINK; ?>singles/account/<?php echo $myuserid; ?>" >My Account</a></li>
         
	
			<?php endif; ?>
            
            
            </ul>
        </div>
        <!-- /Top Nav -->

<br class="clear" />
        <!-- Logo block -->
        <div id="logo">
        
        <div class="logolocationchange">
        <center>
    
    
    

    
    <SCRIPT>
<!--
function jump(menu){
  var loc = menu[menu.selectedIndex].value.split("|");
  if(loc.length == 2)
    window.open(loc[1], loc[0]);
}
//-->
</SCRIPT>


    
        get the daily single on your city
        <SELECT onChange="jump(this)">
        
  <OPTION>Choose your destination:</OPTION>
      <?php
		 foreach ($cityList as $city): ?>
  <OPTION VALUE="_self|<?php echo LINK; ?>onstages/view/<?php echo $city['Onstage']['id']; ?>"><?php echo $city['Single']['city']; ?></OPTION>
  <?php endforeach; ?>
</SELECT>
        
        
		</center>
        </div>
        <?php
        if(!empty($onstageCity)):
		?>
        <div class="logolocation">
        
      OnStage in <h99> <?php echo $onstageCity; ?></h99>
        <br />
      
        
        </div>
        <?php endif; ?>
            
        </div>
        <!-- /Logo block -->
        
            
        <!-- Sign up button -->
        <div class="signup"><a href="<?php echo LINK; ?>users/add"><span class="inv">Sign up</span></a></div>
        <!-- /Sign up button -->


        <!-- Navigation -->
<?php echo $this->element("menu"); ?>
        <!-- /Navigation -->
        
        
        <!-- Search form -->

        
        
        <div id="search_engine">
         <form method="get" action="<?php echo LINK; ?>singles/search">
                <div class="field">
                
                
                
                <input type="text"  name="q"  id="keyword" title="Search..." value="<?php echo (isset($this->params['named']['q']) ? $this->params['named']['q'] : 'Search Singles...'); ?>" onfocus="if (this.value == 'Search Singles...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search Singles...';}" /></div>
                <div>
                  	 
                     
                     
                     
                     
                     
                     
                <input type="submit" class="button" value=" " /></div>
                <div class="clear"></div>
            </form>
        </div>
        <!-- /Search form -->
        
        
        <!-- Sign in Panel -->
        <div id="signin_panel">
        		<?php
	  echo "<br>"; 
    echo $form->create('User', array('action' => 'login'));
	?>
            	<div class="field">
                	<label for="sign_login">Login</label>
                     <?php echo $form->input('username',array('label'=>'')); ?>
                	
                </div>
            	<div class="field">
                	<label for="sign_pass">Password</label>
                   <?php echo $form->input('password',array('label'=>'')); ?>
                </div>
            	<div class="submitter">
                	<input type="submit" name="signin_go" id="sign_go" value="" />
                </div>
                <div class="clear"></div>
            </form>
        	<div class="instructions">
            	<p>Fill the signin form and go to your private zone.</p>
                <p><a href="<?php echo LINK; ?>users/forgot">Forgotten password?</a></p>
            </div>
                <br class="clear" />
        </div>
        <!-- /Sign in Panel -->
    
    
    </div>
    <!-- /content of header -->
</div>
<!-- /HEADER -->




<!-- MAIN -->

			<?php  echo $this->Session->flash(); ?>
            <?php
              if ($messages = $session->read('Message.multiFlash')) {

if(!empty($messages)){

 foreach($messages as $k=>$v)
 {

 echo $this->Session->flash('multiFlash.'.$k);
   
}
  
unset($_SESSION["Message"]);
}

	        }
            ?>
            

			<?php echo $content_for_layout; ?>
<!-- /MAIN -->






<!-- FOOTER -->
<div id="footer">
    <!-- content of footer -->
    <div class="content">
    
    
    	<!-- Bottom navigation -->
        <div class="bottom_nav">
        	<ul>
            <li><a href="<?php echo LINK; ?>" class="current">Home</a></li>
            <li><a href="<?php echo LINK; ?>websites/view/1" >About</a></li>
            <li><a href="<?php echo LINK; ?>singles/contact" >Contact </a></li>
            <li><a href="<?php echo LINK; ?>singles/" >Profiles</a></li>
            <li><a href="<?php echo LINK; ?>onstages/" >On stage</a></li>
            <li><a href="<?php echo LINK; ?>users/login" >SignIn</a></li>
      
            </ul>
        </div>
    	<!-- /Bottom navigation -->
        
        
    	<!-- Go top link -->
        <div class="go_top">
        	<a href="#top"><span class="inv">Go Top</span></a>
        </div>
    	<!-- /Go top link -->
        
        
    	<!-- Copyright -->
        <div class="copyright">
       	  © Copyright taxi420.com  </div>
    	<!-- /Copyright -->
        
        
        <br class="clear" />
        
        
        <!-- 3 cols -->
        <div class="footer_3cols">
        
        	<!-- Col -->
        	<div class="col">
            	<h4>.</h4>
                <ul>
				               
                                </ul>
            </div>
        	<!-- /Col -->
        
        	<!-- Col middle -->
        	<div class="col_middle">
                <a href="<?php echo LINK; ?>" class="footer_logo" title="Single on stage"><span>taxi 420</span></a>
            </div>
        	<!-- /Col middle -->
        
        	<!-- Col -->
        	<div class="col">
            	<h4>.</h4>
              
            </div>
        	<!-- /Col -->
            
        <br class="clear" />
        </div>
        <!-- /3 cols -->
    
    
    </div>
    <!-- /content of footer -->
</div>
<!-- /FOOTER -->

</div>
<!-- /WRAP -->
 





</body>
</html>