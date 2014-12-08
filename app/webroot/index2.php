<?php 
	$userFirst = $this->Session->read('Auth.User.first');
	?>
	
	<h1 class="bigHeader">
	<?php
	  echo "Welcome, " . $userFirst . "!";
	  ?>
	</h1>
	<p class="welcomeText">
	  This site is under construction. Please check back soon.
	</p>

<?php
echo $this->Html->link( "Logout",   array('action'=>'logout') ); 
?>