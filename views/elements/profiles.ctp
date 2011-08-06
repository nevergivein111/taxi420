

       </div>

  <div class="inner_padding">



  
  
       
            <h4>Lastest Profiles</h4>
       
            <ul>               
            <?php foreach($profiles as $profile): ?>
          
            
             <li><a href="<?php echo LINK; ?>singles/view/<?php echo $profile["Single"]["slug"]; ?>" title="<?php echo $profile["Single"]["name"]; ?>"><span><?php echo $profile["Single"]["name"]; ?></span></a></li>
                            
                            <?php endforeach; ?>
                            </ul>
        </div>
