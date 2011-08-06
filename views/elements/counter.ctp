<?php /*?>
<?php 
		
		
		if ( !empty($onstage['Single']['wantToMarry']) || !empty($onstage['Single']['wantToFlirt']) || !empty($onstage['Single']['wantToRelationship']) || !empty($onstage['Single']['dontKnow'])  )
		{
			   
       
			$count=array();
			
			if(!empty($onstage['Single']['wantToMarry']))
			{
				$count["wantToMarry"]=1;
				
				}
				
				
				if(!empty($onstage['Single']['wantToFlirt']))
			{
				$count["wantToFlirt"]=1;
				
				}
				
				if(!empty($onstage['Single']['wantToRelationship']))
			{
				$count["wantToRelationship"]=1;
				
				}
				
				if(!empty($onstage['Single']['dontKnow']))
			{
				$count["dontKnow"]=1;
				
				}
				
			$total=count($count);
			
			$percent=1000/$total;
			$percent=round($percent);

					if(!empty($onstage['Single']['wantToMarry']))
			{
				$count["wantToMarry"]=$percent;
				
				}
				
				
				if(!empty($onstage['Single']['wantToFlirt']))
			{
				$count["wantToFlirt"]=$percent;
				
				}
				
				if(!empty($onstage['Single']['wantToRelationship']))
			{
				$count["wantToRelationship"]=$percent;
				
				}
				
				if(!empty($onstage['Single']['dontKnow']))
			{
				$count["dontKnow"]=$percent;
				
				}
			
	
		

			}
			
		
			
		
		?>
        
        <?php */?>
        
        
        <div class="indexvideorightpeoplestatus">  
        <center><h5 style="color:#FFF">How Many People</h5></center>     
        <div class="indexvideorightportions">
        want to marry <h3>
        <?php

				echo $onstage['Single']['wantToMarry'];
				
				
        ?>
        
        </h3></center>
        </div>
        <div class="indexvideorightportions">
        want a flirt<h3>      <?php

				echo $onstage['Single']['wantToFlirt'];
				
				
        ?>
        </h3></center>
        </div>
        <div class="indexvideorightportions">
       relationship <h3>      <?php

				echo $onstage['Single']['wantToRelationship'];
				
				
        ?></h3></center>
        </div>
        <div class="indexvideorightportions">
        dont know <h3>      <?php

				echo $onstage['Single']['dontKnow'];
				
				
        ?></h3></center>
        </div>    
        </div>