<div id="messages">
<?php

echo $this->Session->flash();

   if ($messages = $session->read('Message.multiFlash')) {



 foreach($messages as $k=>$v)
 {

 echo $this->Session->flash('multiFlash.'.$k);
   
}
  
unset($_SESSION["Message"]);


	        }


?>
</div>