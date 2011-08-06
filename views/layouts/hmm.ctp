<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<!-- METAS -->
    <meta name="description" content="Description..." />
    <meta name="keywords" content="Keywords..." />

	<title>
		<?php __('CakePHP: the rapid development php framework:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('colorbox');

		echo $scripts_for_layout;
	?>
		<script src="<?php echo LINK; ?>webroot/js/jw/swfobject.js"></script>
</head>
<body>


		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>
</body>
</html>