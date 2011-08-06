<?php
$user = $this->Session->read('Auth');
if(isset($user['User']['id']))
{
$myuserid=$user['User']['id'];
}

if($myuserid == $chat["Chat"]["toUser"])
{
	$to=$chat["Chat"]["user_id"];
	
	}
elseif($myuserid == $chat["Chat"]["user_id"]) 
{
	
	$to=$chat["Chat"]["toUser"];
	
	}
else{
	
	$this->redirect('/');
	}

?>
<div id="main">
    <!-- content of main -->
    
                   <iframe id="wait" src="/single/chats/view/19" width="500" height="150" style="display: fixed">
  <p>Your browser does not support iframes.</p>
</iframe>
        
        
        
        
        
        
        <!-- Form block -->
            <div class="form_block">
                <div class="inside">
    <?php echo $this->Form->create('Chat',array("action"=>"add/".$to));?>
                  <div class="form_textarea">
                  <?php
			echo $this->Form->input('id');
		echo $this->Form->input('message');
		echo $this->Form->input('ref',array("type"=>"hidden","value"=>$this->params["pass"]["0"]));
    ?>
                  </div>
                  <div class="clear"></div>
                               
                    <div class="form_submit">
                      <div id="submitter" style="opacity: 1; ">-</div>
                      <input type="submit" name="contact_submit" id="contact_submit" value="Reply" class="cufon">
                    </div>
                </form>
                </div>
            </div>
        	<!-- /Form block -->
            
  
        
        
        <div class="form_block">
      <div class="inside">
                
          </div>
          </div>
        	<!-- /Form block -->
            
		</div>
        <!-- /Left part 600px -->
    
    
    <br class="clear" />
    </div>
    
    
    
    
     
    
    
    <div class="content"><!-- Left part 600px --><!-- /Left part 600px -->
        
        
        
        <!-- Sidebar 270px --><!-- /Sidebar 270px --> 	
    
    
    <br class="clear" />
    </div>
    <!-- /content of main -->
</div>
