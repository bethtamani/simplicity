	<div id="sidebar">
	   <p class="navIcons">
	    <?php
		echo $this->Html->image("home.jpg", array(
    		"alt" => "Home",
    		'url' => array('controller' => 'users', 'action' => 'index')
		));
		
	    ?>
	   </p>
	   <p class="navIcons">
	    <?php
		echo $this->Html->image("tasks.jpg", array(
    		"alt" => "Tasks",
    		'url' => array('controller' => 'tasks', 'action' => 'index')
		));
		
	    ?>
	   </p>
	   <p class="navIcons">
	    <?php
		echo $this->Html->image("calendar.jpg", array(
    		"alt" => "Calendar",
    		'url' => array('controller' => 'calendars', 'action' => 'index')
		));
		
	    ?>
	   </p>
	</div>
