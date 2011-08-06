<style type="text/css">
<!--
#cd {
	margin: auto;
	height: 25px;
	width: 200px;
	font-family: "Courier New", Courier, mono;
	font-size: 12pt;
	color: #000;
	text-align: center;
	font-weight: bold;
	background-image: url(back.jpg);
	vertical-align: middle;
}
-->
</style>

<h1 align="center">Counting Down to New Year's 2011</h1>
<SCRIPT language="JavaScript" SRC="/single/webroot/js/countdown.php?timezone=Asia/Kuala_Lumpur&countto=2011-05-18 00:00:00&do=t&data=WAWASAN 2011"></SCRIPT>
<p>&nbsp;</p>

<div class="singles index">
	<h2><?php __('Singles');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('sex');?></th>
			<th><?php echo $this->Paginator->sort('city_id');?></th>
			<th><?php echo $this->Paginator->sort('age');?></th>
			<th></th>
			<th><?php echo $this->Paginator->sort('wantToMarry');?></th>
			<th><?php echo $this->Paginator->sort('wantToFlirt');?></th>
			<th><?php echo $this->Paginator->sort('wantToRelationship');?></th>
			<th><?php echo $this->Paginator->sort('dontKnow');?></th>
			<th><?php echo $this->Paginator->sort('picture_id');?></th>
			
			<th><?php echo $this->Paginator->sort('video');?></th>
			<th><?php echo $this->Paginator->sort('eyes');?></th>
			<th><?php echo $this->Paginator->sort('hairs');?></th>
			<th><?php echo $this->Paginator->sort('bodyType');?></th>
			<th><?php echo $this->Paginator->sort('weight');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($singles as $single):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $single['Single']['id']; ?>&nbsp;</td>
		<td><?php echo $single['Single']['name']; ?>&nbsp;</td>
		<td><?php echo $single['Single']['sex']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($single['City']['name'], array('controller' => 'cities', 'action' => 'view', $single['City']['id'])); ?>
		</td>
		<td><?php echo $single['Single']['age']; ?>&nbsp;</td>
		<td>&nbsp;</td>
		<td><?php echo $single['Single']['wantToMarry']; ?>&nbsp;</td>
		<td><?php echo $single['Single']['wantToFlirt']; ?>&nbsp;</td>
		<td><?php echo $single['Single']['wantToRelationship']; ?>&nbsp;</td>
		<td><?php echo $single['Single']['dontKnow']; ?>&nbsp;</td>
	
		<td>			   
		<a href=<?php echo LINK; ?>singles/view/<?php echo $single['Single']['id']; ?> >


				  
		<?php if(empty($single['Single']['image'])): ?>
		<img src="<?php echo ROOTE;?>imageholder.jpg" width="100" height="100" alt="Listing Image" class="listingimage" />
		</a>
		<?php else: ?>
				  
		<?php if($html->findExt($single['Single']['image'])): ?>
				  
		<img src="<?php echo ROOTE;?>uploads/small/<?php echo $single['Single']['image'];?>" width="100" height="100"  alt="Listing Image" class="listingimage" />
		<?php else: ?>
              	<img src="<?php echo ROOTE;?>uploads/<?php echo $single['Single']['image'];?>" width="100" height="100"  alt="Listing Image" class="listingimage" />
              	<?php endif; ?>
             	<?php endif; ?>
             	</a>
		&nbsp;</td>
		<td><?php echo $single['Single']['video']; ?>&nbsp;</td>
		<td><?php echo $single['Single']['eyes']; ?>&nbsp;</td>
		<td><?php echo $single['Single']['hairs']; ?>&nbsp;</td>
		<td><?php echo $single['Single']['bodyType']; ?>&nbsp;</td>
		<td><?php echo $single['Single']['weight']; ?>&nbsp;</td>
		<td><?php echo $single['Single']['date']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('On stage', true), array('action' => 'onstage', $single['Single']['id'])); ?>
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $single['Single']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $single['Single']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $single['Single']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $single['Single']['id'])); ?>
		</td>
	</tr>

	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Single', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cities', true), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City', true), array('controller' => 'cities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pictures', true), array('controller' => 'pictures', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Picture', true), array('controller' => 'pictures', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
























































<div id="main">
    <!-- content of main -->
    <div class="content"><!-- Left part 600px -->
        <div id="left_part">
        
        	        	<!-- Blog entry --><!-- /Blog entry -->
                        
                        
            <!-- VIDEO Last -->
          <h3 class="underlined">Next On Stage</h3>
          	<?php
	$i = 0;
	foreach ($singles as $single):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
          
          
                                <!-- Video item -->
                <div class="video_entry">
                    <div class="video_thumbnail"><span class="cufon"><a href="<?php echo LINK; ?>singles/view/<?php echo $single['Single']['id']; ?>">Watch now</a></span>
                    
             


				  
		<?php if(empty($single['Single']['image'])): ?>
		<img src="<?php echo ROOTE;?>imageholder.jpg" width="220" height="100" alt="Listing Image" class="listingimage" />
		</a>
		<?php else: ?>
				  
		<?php if($html->findExt($single['Single']['image'])): ?>
				  
		<img src="<?php echo ROOTE;?>uploads/small/<?php echo $single['Single']['image'];?>" width="220" height="100"  alt="Listing Image" class="listingimage" />
		<?php else: ?>
              	<img src="<?php echo ROOTE;?>uploads/<?php echo $single['Single']['image'];?>" width="220" height="100"  alt="Listing Image" class="listingimage" />
              	<?php endif; ?>
             	<?php endif; ?>
        
                    </div>
                    <div class="video_resume">
                      <h4><a href="./videos/whitechapel-making-of-the-darkest-day-of-man.html">Amores Perros</a></h4>
                      <div class="date cufon">27.08.2010</div>
                        <p><?php echo $single['Single']['details']; ?> </p>
                  </div>
                <br class="clear" />
                </div>
                
                <!-- Video item -->
                <?php endforeach; ?>
                
                
                
                
                
                
                
                
                 
                 
                 
                 
                 
                 
            <!-- /VIDEO Last -->
            
	  </div>
        <!-- /Left part 600px -->
        
        
        
        <!-- Sidebar 270px -->
        <div id="sidebar">
        <div class="inside">
        
        
        
        <div class="separator"></div>
        
        <!-- Recents Articles -->
        <div class="inner_padding">
<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like-box href="http://www.facebook.com/pages/Singleonstage111/100140263406862" width="240" show_faces="true" stream="false" header="true"></fb:like-box>
            
        </div>
        <!-- /Recents Articles -->
        
        <div class="separator"></div>
        
        <!-- Recents Interviews -->
        <div class="inner_padding">
            <h4>Recent interviews</h4>
            <ul>                <li><a href="./interviews/devilcantburn-interview/index.html" title="Monday 13 September 2010 at 04:20 pm"><span>Interview with Devilcantburn</span></a></li>
                                <li><a href="./interviews/the-best-interview-of-the-world/index.html" title="Monday 13 September 2010 at 04:18 pm"><span>The best interview is here</span></a></li>
                                <li><a href="./interviews/pomidop-interview/index.html" title="Monday 13 September 2010 at 04:15 pm"><span>Don't you know Pompidop?</span></a></li>
                                <li><a href="./interviews/no-featured-intervew/index.html" title="Monday 13 September 2010 at 04:13 pm"><span>A new interview not featured</span></a></li>
                                <li><a href="./interviews/who-is-behind-the-best-template/index.html" title="Monday 13 September 2010 at 04:10 pm"><span>Whos is behind the best template?</span></a></li>
            </ul>
        </div>
        <!-- /Recents Interviews -->
        
        <div class="separator"></div>
        
        <!-- Recents Interviews -->
        <div class="inner_padding">
            <h4>Last videos</h4>
            <ul>                <li><a href="./videos/whitechapel-making-of-the-darkest-day-of-man.html" title="Friday 27 August 2010 at 05:03 am"><span>Whitechapel The making-of</span></a></li>
                                <li><a href="./videos/summer-teknival-italy-2009.html" title="Friday 27 August 2010 at 04:55 am"><span>Summer teknival north italy</span></a></li>
                                <li><a href="./videos/gojira--the-art-of-dying---live-tuska-2009.html" title="Friday 27 August 2010 at 04:42 am"><span>Gojira - The Art of Dying</span></a></li>
                                <li><a href="./videos/i-am-ghost-bone-garden.html" title="Friday 27 August 2010 at 04:32 am"><span>I am Ghost : Bone Garden</span></a></li>
            </ul>
        </div>
        <!-- /Recents Interviews -->
        
        <div class="separator"></div>
        
        
        
        
        
        <div class="separator"></div>
        
        <!-- Advertisings -->
        <div class="advertisings">
        <a href="#"><img src="./temp/ad_125x125_v3.gif" alt="" /></a>
        <a href="#"><img src="./temp/ad_125x125_v3.gif" alt="" /></a>
        <a href="#"><img src="./temp/ad_125x125_v3.gif" alt="" /></a>
        <a href="#"><img src="./temp/ad_125x125_v3.gif" alt="" /></a></div>
        <!-- /Advertisings -->        
        </div>
        </div>
        <!-- /Sidebar 270px --> 	
    
    
    <br class="clear" />
    </div>
    <!-- /content of main -->
</div>