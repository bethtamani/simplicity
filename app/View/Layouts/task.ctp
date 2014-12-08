<!DOCTYPE html>
<html>
<head>
	<link href='http://fonts.googleapis.com/css?family=Schoolbell' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Coming+Soon' rel='stylesheet' type='text/css'>
	<?php echo $this->Html->charset(); ?>
	<title>Simplicity Home Management</title>
	<?php
		echo $this->Html->meta('icon');
		
		echo $this->Html->script('task');
		echo $this->Html->css('task');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="left"></div>
	<div id="right"></div>
	<div id="top"></div>
	<div id="bottom"></div>
	
	<div id="content">

			

			<?php echo $this->fetch('content'); ?>
		</div>
	
		
</body>

</html>