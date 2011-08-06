<?php 

$user = $this->Session->read('Auth');
if(isset($user['User']['username']))
{
$myusername=$user['User']['username'];
}
?>

<div id="navigation">
            <ul>
            <li><a href="<?php echo LINK; ?>" >OnStage<span>meet your soul mates</span></a></li>
			
			      <?php if( isset($myusername) && $myusername=="admin"): ?>
				  
            <li><a href="<?php echo LINK; ?>singles/" >Manage New profiles<span>What's Next</span></a>
          
            </li>
			<?php else: ?>
				  
            <li><a href="<?php echo LINK; ?>singles/" >Profiles<span>What's Next</span></a>
          
            </li>
			
			
			<?php endif;?>
			
			
			     <?php if(isset($myusername) && $myusername=="admin"): ?>
				  
                    <li><a href="<?php echo LINK; ?>onstages/" >Manage OnStage<span>Learn to use it </span></a></li>
			<?php else: ?>
				  
                  <li><a href="<?php echo LINK; ?>onstages/" >Singles On Stage<span>Learn to use it </span></a></li>
			
			
			<?php endif;?>
			
			
			
			
			
			
			
			
			
			     <?php if(isset($myusername) && $myusername=="admin"): ?>
				  
               <li><a href="<?php echo LINK; ?>singles/account" >Site Manger<span>Manage Website</span></a>
            
            </li>
             <?php elseif(isset($myusername)): ?>
				  
                <li><a href="<?php echo LINK; ?>singles/account" >My Stage<span>Enter Your account</span></a>
            
            </li>
			
            
			<?php else: ?>
	    <li><a href="<?php echo LINK; ?>users/login" >My Stage<span>Enter Your account</span></a>
            
            </li>
			
			<?php endif;?>
			
			
			   <?php if(isset($myusername)): ?>
        
           
                <li><a href="<?php echo LINK; ?>users/logout">Logout<span>logout</span></a> </li>
            
            
            <?php else: ?>
             <li><a href="#" id="signin_show">Sign in<span></span></a></li>
           
            
            
            <?php endif; ?>
            </ul>
        </div>