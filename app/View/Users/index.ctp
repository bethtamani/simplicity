<?php 
    $userFirst = $this->Session->read('Auth.User.first');
    $userId = $this->Session->read('Auth.User.id');

    echo $this->Element("sidebarBlock");
    
    //create task arrays
    
    $todayTasks = array();
    $todayComplete = array();
    $weekday = date('w');
    $number = date('d');
    foreach ($tasks as $task) {
      
    	 if ($task['Task']['frequency'] == 1) {
    	   array_push($todayTasks,$task);
    	 }
    	 if ($task['Task']['frequency'] == 2) {
    	    if ($task['Task']['day'] == $weekday) {
    	    	  array_push($todayTasks,$task);    
    	    }
    	 }
    	 if ($task['Task']['frequency'] == 3) {
    	    if ($task['Task']['month_type'] == 1) {
    	    	if ($task['Task']['month_number'] == $number) {
    	    	      array_push($todayTasks,$task);
		}
    	    }
    	    if ($task['Task']['month_type'] == 2) {
    	    	if ($task['Task']['month_day'] == $weekday && $task['Task']['day_number'] == $weekNumber) {
    	    	      array_push($todayTasks,$task);
		}
    	    }
    	 }
      
    }
    
    //create calendar arrays
    
    $todayDate = date('Y-m-d');
    
    $todayEvents = array();
    foreach ($events as $event) {
    	if ($event['Calendar']['date'] == $todayDate) {
    	    array_push($todayEvents,$event);
    	}
    	if ($event['Calendar']['recurring'] == 1) {
    	    if ($event['Calendar']['type'] == 1) {
    	    	if ($event['Calendar']['day'] == $weekday) {
    	    	    array_push($todayEvents,$event);
    	    	}
    	    }
    	    if ($event['Calendar']['type'] == 2) {
    	    	if ($event['Calendar']['month_number'] == $number) {
    	    	    array_push($todayEvents,$event);
    	    	}
    	    }
    	    if ($event['Calendar']['type'] == 3) {
    	    	if ($event['Calendar']['month_day'] == $weekday && $event['Calendar']['month_weekly'] == $weekNumber) {
    	    	    array_push($todayEvents,$event);
    	    	}
    	    }
    	}
    }
    
    
    
?>
<div id="pageContent">
<h1 class="bigHeader">
<?php
    echo "Welcome, " . $userFirst . "!<br/><span class=\"accountLinks\">";
    echo $this->Html->image("button.jpg", array('alt' => 'Logout','url' => array('action' => 'logout')));
    
    
    
    
?>
</span>
</h1>



<div id="taskList">

	<table class="taskList">
    	<col width="100">
  	<col width="300">
	<th class="welcomeText" colspan=2>
    	Today&#39;s Tasks
    	<?php
    	    echo $this->Html->image('plus.jpg', array(
    		'alt' => 'Add a New Task',
    		'id' => 'addButton',
    		'url' => array('controller' => 'tasks', 'action' => 'add')
	    ));
    	?>
    	</th>    
    	<?php 
    	
    	foreach ($todayTasks as $task) {
    	  if (!in_array($task['Task']['id'],$completes)) {
    		
    	    echo "<tr>";
    	    echo "<td align=\"right\">";
    	    
    	    echo $this->Form->create('Complete',array('controller' => 'completes','action' => 'add'));
	    echo $this->Form->hidden('user_id', array('value' => $userId));
	    echo $this->Form->hidden('task_id', array('value' => $task['Task']['id']));
	    echo $this->Form->hidden('date',array('value' => date('Y-m-d')));
	    echo $this->Form->submit('check.jpg',array('class' => 'checkButton'));
	    echo $this->Form->end();
	    
	    
	   
	    echo "</td><td align=\"left\">";   
	    echo $task['Task']['task_name'];
	    echo "&nbsp;";    
	    
	    echo $this->Html->image('edit.ico', array(
	    	'alt' => 'Edit Task',
	    	'id' => 'editButton',
	    	'url' => array('controller' => 'tasks','action'=>'edit',$task['Task']['id'])
	    	));	    
	    echo "</td></tr>";	  
	  }  
	}
	
	echo "<tr class=\"smallHeader\"><td colspan=3 height=\"100\">Completed Tasks</td></tr>";
	
	foreach ($todayTasks as $task) {
	  if (in_array($task['Task']['id'],$completes)) {
	    echo "<tr><td>&nbsp;</td><td align=\"left\">";
	    echo $task['Task']['task_name'];
	    echo "</td></tr>";
	  }
	}
    	    
	echo "</table>";
	
    ?> 
</div>
<div id="calendarList">
    <table class="taskList">
    <col width="100">
  	<col width="300">
    <th class="welcomeText" colspan=2>Today&apos;s Events
    <?php
    	    echo $this->Html->image('plus.jpg', array(
    		'alt' => 'Add a New Event',
    		'id' => 'addButton',
    		'url' => array('controller' => 'calendars', 'action' => 'add')
	    ));
    	?></th>
    <?php
    foreach ($todayEvents as $event) {
    	echo "<tr><td align=\"right\">";
    	echo $this->Time->format($event['Calendar']['start_time'], '%l:%M %P');
    	
    	echo "</td><td align=\"left\">&nbsp;&nbsp;&nbsp;&nbsp;";
    	echo $event['Calendar']['event_name'];
    }
    ?>
    </table>
    
</div>
</div>
	
	
	
	
	