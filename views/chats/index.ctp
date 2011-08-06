<div id="main">
    <!-- content of main -->
    
    
    	<form name="frmannouncement" action="<?php echo LINK; ?>chats/checkboxdel" method="post">
<input type="hidden" name="opt" value="">
    
    
    <div class="content">      
    
    
    	<!-- Intro page -->
        <div class="intro">
        	<h2 class="underlined">Messages</h2>
        </div>
    	<!-- /Intro page -->  
        
        
        
        <!-- col_270_left -->
       <?php 

	   echo $this->element("leftaccount"); ?>
        <!-- /col_270_left --> 	
        
        <!-- Left part 600px -->
        
        <div id="left_part">
        
                
                <div id="manageprofiledelete"><a onClick="javascript:confdel();" href="#" >	
	Delete</a></div>
    

                
                <div id="checkbox2">
                
                <input type="checkbox" align="absmiddle" id="mohsin" onClick="javascript:selectall();"  style="color:#0000FF" class="button">
              <label>select all</label>  
              </div>
                
                
                
                <div class="numbered3"> </div>  
                <?php if($unread != 0)
			{ ?>
                <div class="numbered3"><a href="">unread</a></div> 
                <div class="numbered2"><?php echo $unread; ?></div>
                <?php }?>

        <br />
        
         	<?php
	$i = 0;
	foreach ($chats as $chat):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}


	?>
    
    
        <div id="messageintro2">
        <div id="checkbox">
        	<?php 
	$row['id']=$chat['Chat']["id"]; ?>
	<input type="checkbox" align="absmiddle" name="d[]" value="<?php echo $row['id']; ?>">
        
        </div>
        
        
        
		<?php if(!empty($chat["new"])){ ?>
        
        <div class="numbered4">
        <a href="<?php echo LINK; ?>chats/view/<?php echo $chat['Chat']["id"] ?>">unread</a>
		
		</div>
		<?php } ?>
        
        
        <div id="messageintropic2">
        <a href="<?php echo LINK; ?>chats/view/<?php echo $chat['Chat']["id"]; ?>">
  	  
		<?php if(empty($chat["other"]['Single']['image'])): ?>
		<img src="<?php echo ROOTE;?>imageholder.jpg" width="46" height="30" alt="Listing Image" class="listingimage" />
		</a>
		<?php else: ?>
				  
		<?php if($html->findExt($chat["other"]['Single']['image'])): ?>
				  
		<img src="<?php echo ROOTE;?>uploads/small/<?php echo $chat["other"]['Single']['image'];?>" width="46" height="30"  alt="Listing Image" class="listingimage" />
		<?php else: ?>
              	<img src="<?php echo ROOTE;?>uploads/<?php echo $chat["other"]['Single']['image'];?>" width="46" height="30"  alt="Listing Image" class="listingimage" />
              	<?php endif; ?>
             	<?php endif; ?>
       
        
        
        
        
        
        
        
        
        
        
        
        
        </a>
        </div>
        <div id="messageintroname"><a href="<?php echo LINK; ?>singles/view/<?php echo $chat["other"]['Single']['slug'];?>"><?php  echo $chat["other"]['Single']['name']; ?></a></div>
        <div id="messageintrosubject"><a href="<?php echo LINK; ?>chats/view/<?php echo $chat['Chat']["id"]; ?>">	 <?php echo $text->truncate(strip_tags(
    $chat['Chat']['subject']),
    50,
    array(
        'ending' => '...',
        'exact' => false
    )
);
?> </a></div>
        <div id="messageintromessage"><a href="<?php echo LINK; ?>chats/view/<?php echo $chat['Chat']["id"] ?>">
        				 <?php echo $text->truncate(strip_tags(
    $chat['Chat']['message']),
    50,
    array(
        'ending' => '...',
        'exact' => false
    )
);
?>
        
        </a></div>
        </div>
        
        
        <?php endforeach; ?>
        
        
        
        <br />
        	<!-- Form block -->
            <div class="form_block">
                <div class="inside">
                
                </div>
            </div>
        	<!-- /Form block -->
            
		</div>
        <!-- /Left part 600px -->
        	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
    
    
    <br class="clear" />
    </div>
    
    
    
    
     
    
    
    <div class="content"><!-- Left part 600px --><!-- /Left part 600px -->
        
        
        
        <!-- Sidebar 270px --><!-- /Sidebar 270px --> 	
    
    
    <br class="clear" />
    </div>
    <!-- /content of main -->
    </form>
</div>
<script language="JavaScript">


function confdel(){
	for(i=0;i<document.frmannouncement.length;i++){
		if(document.frmannouncement.elements[i].type=='checkbox' && document.frmannouncement.elements[i].checked == true){
			selected = true;
			break;
		}
		else {
			selected = false;
		}
	}
	if(!selected){
		alert("Please select the announcement to delete.");
		return false;
	}
	var cf = confirm('Are you sure to delete the selected announcement?');
	if(cf){
		document.frmannouncement.opt.value='delete';
		document.frmannouncement.submit();
	}
	return true;
}

function selectall(){
	for(i=0;i<document.frmannouncement.length;i++){
	    if(document.getElementById("mohsin").checked == true){
		     document.frmannouncement.elements[i].checked = true;
				 
	      }else{
		    document.frmannouncement.elements[i].checked = false;
	 }
	}

	 return true;
}
</script>