<?php echo $this->Element("sidebarBlock"); ?>


<div id="pageContent">

<h1 class="bigHeader">Tasks
<?php
   echo $this->Html->image("plus.jpg", array('alt' => 'Add a Task','id' => 'addButton','url' => array('action' => 'add')));
?>
</h1>
<div id="taskViews">
    <?php
    	echo $this->Form->button('All',array('id' => 'allTasks','class' => 'viewButton'));
    	echo $this->Form->button('Daily',array('id' => 'dailyTasks','class' => 'viewButton'));
    	echo $this->Form->button('Weekly',array('id' => 'weeklyTasks','class' => 'viewButton'));
    	echo $this->Form->button('Monthly',array('id' => 'monthlyTasks','class' => 'viewButton'));
    	echo $this->Form->button('Unscheduled',array('id' => 'unscheduledTasks','class' => 'viewButton'));
    ?>
</div>
	<?php $listCount = 0;
	foreach( $tasks as $task) {
		if ($task['Task']['frequency'] == 0) {
			$listCount++;
		}
	} ?>
	
<div id="unscheduled"
<?php if ($listCount == 0) {
    echo " style=\"display:none\" ";
} ?>
>
	
    <p class="welcomeText">Unscheduled Tasks</p>
    <ul class="taskList">
    <?php
    	
    	foreach ($tasks as $task) {
    	   if ($task['Task']['frequency'] == 0) {
    	   	
    	   	echo "<li>";
    		echo $task['Task']['task_name'];
    		echo "&nbsp;";
    		echo $this->Html->image('edit.ico', array(
	    	'alt' => 'Edit Task',
	    	'id' => 'editButton',
	    	'url' => array('controller' => 'tasks','action'=>'edit',$task['Task']['id'])
	    	));
	    	echo "&nbsp;";
    		echo $this->Html->image('delete.png', array(
	    	'alt' => 'Delete',
	    	'class' => 'deleteButton',
	    	'url' => array('controller' => 'tasks','action'=>'delete',$task['Task']['id'])
	    	));	 	   
    		echo "</li>";
    	   }
    	}
    	if ($listCount == 0) {
    	   echo "<li>You have no unscheduled tasks</li>";
    	   
    	}
    ?>
</div>
<div id="taskTypes">
<div id="tasksDaily">
    <p class="welcomeText">Daily Tasks</p>
    <ul class="taskList">
    <?php 
    	$listCount = 0;
    	foreach ($tasks as $task) {
    	    if ($task['Task']['frequency'] == 1) {
    	    	$listCount++;
        	echo "<li>";
    		echo $task['Task']['task_name'];
    		echo "&nbsp;";
    		echo $this->Html->image('edit.ico', array(
	    	'alt' => 'Edit Task',
	    	'id' => 'editButton',
	    	'url' => array('controller' => 'tasks','action'=>'edit',$task['Task']['id'])
	    	));	   
	    	echo "&nbsp;";
    		echo $this->Html->image('delete.png', array(
	    	'alt' => 'Delete',
	    	'class' => 'deleteButton',
	    	'url' => array('controller' => 'tasks','action'=>'delete',$task['Task']['id'])
	    	));	   
    		echo "</li>";
    	    }
	}
	if ($listCount == 0) {
    	   echo "<li>You have no daily tasks</li>";
    	   
    	}
    ?> 
    </ul>
</div>

<div id="tasksWeekly">
    <p class="welcomeText">Weekly Tasks</p>
    <ul class="taskList" id="weeklyList">
    	
    	<li class="dayLabel">Sunday
    	    <?php 
    	    	$listCount = 0;
    	    	foreach ($tasks as $task) {
    	    	if ($task['Task']['frequency'] == 2) {
    	    	    if ($task['Task']['day'] == 0) {
    	    	    	$listCount++;
    	    	    	echo "<li>";
    			echo $task['Task']['task_name'];
    			echo "&nbsp;";
    			echo $this->Html->image('edit.ico', array(
	    		'alt' => 'Edit Task',
	    		'id' => 'editButton',
	    		'url' => array('controller' => 'tasks','action'=>'edit',$task['Task']['id'])
	    		));	
	    		echo "&nbsp;";
    			echo $this->Html->image('delete.png', array(
	    		'alt' => 'Delete',
	    		'class' => 'deleteButton',
	    		'url' => array('controller' => 'tasks','action'=>'delete',$task['Task']['id'])
	    		));	   
    			echo "</li>";
    	    	    }
    	    	}
    	    } ?>
    	</li><li class="dayLabel"><br/>Monday
    	    <?php foreach ($tasks as $task) {
    	    	if ($task['Task']['frequency'] == 2) {
    	    	    if ($task['Task']['day'] == 1) {
    	    	    	$listCount++;
    	    	    	echo "<li>";
    			echo $task['Task']['task_name'];
    			echo "&nbsp;";
    			echo $this->Html->image('edit.ico', array(
	    		'alt' => 'Edit Task',
	    		'id' => 'editButton',
	    		'url' => array('controller' => 'tasks','action'=>'edit',$task['Task']['id'])
	    		));
	    		echo "&nbsp;";
    			echo $this->Html->image('delete.png', array(
	    		'alt' => 'Delete',
	    		'class' => 'deleteButton',
	    		'url' => array('controller' => 'tasks','action'=>'delete',$task['Task']['id'])
	    		));	  	  
    			echo "</li>";
    	    	    }
    	    	}
    	    } ?>
    	</li><li class="dayLabel"><br/>Tuesday</li>
    	    <?php foreach ($tasks as $task) {
    	    	if ($task['Task']['frequency'] == 2) {
    	    	    if ($task['Task']['day'] == 2) {
    	    	    	$listCount++;
    	    	    	echo "<li>";
    			echo $task['Task']['task_name'];
    			echo "&nbsp;";
    			echo $this->Html->image('edit.ico', array(
	    		'alt' => 'Edit Task',
	    		'id' => 'editButton',
	    		'url' => array('controller' => 'tasks','action'=>'edit',$task['Task']['id'])
	    		));
	    		echo "&nbsp;";
    			echo $this->Html->image('delete.png', array(
	    		'alt' => 'Delete',
	    		'class' => 'deleteButton',
	    		'url' => array('controller' => 'tasks','action'=>'delete',$task['Task']['id'])
	    		));	  	
    			echo "</li>";
    	    	    }
    	    	}
    	    } ?>
    	</li><li class="dayLabel"><br/>Wednesday
    	    <?php foreach ($tasks as $task) {
    	    	if ($task['Task']['frequency'] == 2) {
    	    	    if ($task['Task']['day'] == 3) {
    	    	    	$listCount++;
    	    	    	echo "<li>";
    			echo $task['Task']['task_name'];
    			echo "&nbsp;";
    			echo $this->Html->image('edit.ico', array(
	    		'alt' => 'Edit Task',
	    		'id' => 'editButton',
	    		'url' => array('controller' => 'tasks','action'=>'edit',$task['Task']['id'])
	    		));
	    		echo "&nbsp;";
    			echo $this->Html->image('delete.png', array(
	    		'alt' => 'Delete',
	    		'class' => 'deleteButton',
	    		'url' => array('controller' => 'tasks','action'=>'delete',$task['Task']['id'])
	    		));	  	
    			echo "</li>";
    	    	    }
    	    	}
    	    } ?>
    	</li><li class="dayLabel"><br/>Thursday
    	    <?php foreach ($tasks as $task) {
    	    	if ($task['Task']['frequency'] == 2) {
    	    	    if ($task['Task']['day'] == 4) {
    	    	    	$listCount++;
    	    	    	echo "<li>";
    			echo $task['Task']['task_name'];
    			echo "&nbsp;";
    			echo $this->Html->image('edit.ico', array(
	    		'alt' => 'Edit Task',
	    		'id' => 'editButton',
	    		'url' => array('controller' => 'tasks','action'=>'edit',$task['Task']['id'])
	    		));
	    		echo "&nbsp;";
    			echo $this->Html->image('delete.png', array(
	    		'alt' => 'Delete',
	    		'class' => 'deleteButton',
	    		'url' => array('controller' => 'tasks','action'=>'delete',$task['Task']['id'])
	    		));	  	
    			echo "</li>";
    	    	    }
    	    	}
    	    } ?>
    	</li><li class="dayLabel"><br/>Friday
    	    <?php foreach ($tasks as $task) {
    	    	if ($task['Task']['frequency'] == 2) {
    	    	    if ($task['Task']['day'] == 5) {
    	    	    	$listCount++;
    	    	    	echo "<li>";
    			echo $task['Task']['task_name'];
    			echo "&nbsp;";
    			echo $this->Html->image('edit.ico', array(
	    		'alt' => 'Edit Task',
	    		'id' => 'editButton',
	    		'url' => array('controller' => 'tasks','action'=>'edit',$task['Task']['id'])
	    		));
	    		echo "&nbsp;";
    			echo $this->Html->image('delete.png', array(
	    		'alt' => 'Delete',
	    		'class' => 'deleteButton',
	    		'url' => array('controller' => 'tasks','action'=>'delete',$task['Task']['id'])
	    		));	  	
    			echo "</li>";
    	    	    }
    	    	}
    	    } ?>
    	</li><li class="dayLabel"><br/>Saturday
    	    <?php foreach ($tasks as $task) {
    	    	if ($task['Task']['frequency'] == 2) {
    	    	    if ($task['Task']['day'] == 6) {
    	    	    	$listCount++;
    	    	    	echo "<li>";
    			echo $task['Task']['task_name'];
    			echo "&nbsp;";
    			echo $this->Html->image('edit.ico', array(
	    		'alt' => 'Edit Task',
	    		'id' => 'editButton',
	    		'url' => array('controller' => 'tasks','action'=>'edit',$task['Task']['id'])
	    		));
	    		echo "&nbsp;";
    			echo $this->Html->image('delete.png', array(
	    		'alt' => 'Delete',
	    		'class' => 'deleteButton',
	    		'url' => array('controller' => 'tasks','action'=>'delete',$task['Task']['id'])
	    		));	  	
    			echo "</li>";
    	    	    }
    	    	}
    	    }
    	    if ($listCount == 0) {
    	   echo "<li>You have no unscheduled tasks</li>";
    	   
    	} ?>
    </ul>
</div>

<div id="tasksMonthly">
    <p class="welcomeText">Monthly Tasks</p>
    <ul class="taskList">
    	<?php 
    	$listCount = 0;
    	foreach ($tasks as $task) {
    	    if ($task['Task']['frequency'] == 3) {
    	    	$listCount++;
    	    	echo "<li>";
    	    	echo $task['Task']['task_name'];
    	    	echo "&nbsp;";
    			echo $this->Html->image('edit.ico', array(
	    		'alt' => 'Edit Task',
	    		'id' => 'editButton',
	    		'url' => array('controller' => 'tasks','action'=>'edit',$task['Task']['id'])
	    		));
	    		echo "&nbsp;";
    			echo $this->Html->image('delete.png', array(
	    		'alt' => 'Delete',
	    		'class' => 'deleteButton',
	    		'url' => array('controller' => 'tasks','action'=>'delete',$task['Task']['id'])
	    		));	  	
    	    	echo "</li>";
    	    	if ($task['Task']['month_type'] == 1) {
    	    	    
    	    	    echo "<li>&nbsp;&nbsp;&nbsp;On the ";
    	    	    echo $task['Task']['month_number'];
    	    	    echo "</li>";
    	    	}
    	    	if ($task['Task']['month_type'] == 2) {
    	    	    echo "<li>&nbsp;&nbsp;&nbsp;On the ";
    	    	    echo $task['Task']['day_number'];
    	    	    if ($task['Task']['day_number'] == 1 || $task['Task']['day_number'] == 21 || $task['Task']['day_number'] == 31) {
    	    	    	echo "st ";
    	    	    }
    	    	    else if ($task['Task']['day_number'] == 2 || $task['Task']['day_number'] == 22) {
    	    	    	echo "nd ";
    	    	    }
    	    	    else if ($task['Task']['day_number'] == 3 || $task['Task']['day_number'] == 23) {
    	    	    	echo "rd ";
    	    	    }
    	    	    else {
    	    	    	echo "th ";
    	    	    }
    	    	    $daysList = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
    	    	    echo $daysList[$task['Task']['month_day']];
    	    	    echo "</li>";
    	    	    
    	    	}
    	    }
    	}
    	if ($listCount == 0) {
    	   echo "<li>You have no unscheduled tasks</li>";
    	   
    	}
    	 ?>
    </ul>
</div>

</div>
<br/><br/><br/>
</div>