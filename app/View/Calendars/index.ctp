<?php echo $this->Element("sidebarBlock"); ?>
<div id="pageContent">
<h1 class="bigHeader">Calendar
<?php
    	    echo $this->Html->image('plus.jpg', array(
    		'alt' => 'Add a New Event',
    		'id' => 'addButton',
    		'url' => array('controller' => 'calendars', 'action' => 'add')
	    ));
    	?></h1>
<p>This feature will be available soon</p>
</div>