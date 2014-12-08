<?php 
	echo $this->Form->create('Task',array('class' => 'taskForm','type' => 'post'));
	$userId = $this->Session->read('Auth.User.id');?>
	
    <fieldset>
        <legend class="welcomeText"><?php echo __('Add a Task'); ?></legend>
        <?php 
        
            echo $this->Form->hidden('user_id', array('value' => $userId));

            echo $this->Form->input('task_name', array('label' => 'Task Name', 'maxLength' => 50));
   
            //set frequency
            echo "<p>How often should this task be done?</p>";
            $options = array(0 => 'Decide Later',1 => 'Daily',2 => 'Weekly',3 => 'Monthly');
            $attributes = array('value' => 0,'separator' => '<br/>','class' => 'frequencyRadio','legend' => false);
            echo $this->Form->radio('frequency', $options, $attributes);
            
            //optional answers
            
     	    //if "weekly" is selected
     	    echo "<div id=\"weeklyRadio\" style=\"display:none\">";
     	    echo "<p>Set a day of the week for this task?</p>";
            $options = array(9 => 'Decide later',0 => 'Sunday',1 => 'Monday',2 => 'Tuesday',3 => 'Wednesday',
            4 => 'Thursday',5 => 'Friday',6 => 'Saturday');
            $attributes = array('value' => 9,'separator' => '<br/>','class' => 'weeklyRadio','legend' => false);
            echo $this->Form->radio('day',$options,$attributes);
            echo "</div>"; 
            
            //if "monthly" is selected
            ?>
            <div id="monthlyRadio" style="display:none">
              	<p>Schedule this task?</p>
            	<input type="radio" name="data[Task][month_type]" id="TaskMonthType0" 
            		value=0 class="monthlyRadio" required="required" checked="checked" />
            	<label for="TaskMonthTypeUnset">Decide later</label><br/>
            	<input type="radio" name="data[Task][month_type]" id="TaskMonthType1" 
            		value=1 class="monthlyRadio" required="required" />
            	<label for="TaskMonthType1">
            	    <?php
            	    
            	    	echo "On the ";
            	    	$options = array(0 => '', 1 => '1st',2 => '2nd',3 => '3rd',4 => '4th',5 => '5th',6 => '6th',7 => '7th',
            	    	8 => '8th',9 => '9th',
            	    			10 => '10th',11 => '11th',12 => '12th',13 => '13th',14 => '14th',15 => '15th', 16 => '16th',
            	    			17 => '17th',18 => '18th',19 => '19th',20 => '20th',21 => '21st',22 => '22nd',23 => '23rd',
            	    			24 => '24th',25 => '25th',26 => '26th',27 => '27th',28 => '28th',29 => '29th',30 => '30th',31 => '31st');            	    	
            	    	echo $this->Form->select('month_number',$options,array('value' => 0,'empty' => false));
            	    	echo " of the month";
            	    ?>
            	</label><br/>
            	<input type="radio" name="data[Task][month_type]" id="TaskMonthType2" value=2 class="monthlyRadio" required="required" />
            	<label for="TaskMonthType2">
            	    <?php
            	    
            	    	echo "On the ";
            	    	$options = array(0 => '',1 => '1st',2 => '2nd',3 => '3rd',4 => '4th',5 => '5th',6 => 'last');
            	    	echo $this->Form->select('day_number',$options,array('value' => 0,'empty' => false));
            	    	echo "&nbsp";
            	    	$options = array(9 => '',0 => 'Sunday',1 => 'Monday',2 => 'Tuesday',3 => 'Wednesday',
            	    			4 => 'Thursday',5 => 'Friday',6 => 'Saturday',7 => 'Sunday');
            	    	echo $this->Form->select('month_day',$options,array('value' => 9,'empty' => false));
            	    	echo " of the month";
            	    ?>
            	</label>
            </div>
 
            
        
        
        <?php 
        echo $this->Form->submit('Add Task', array('title' => 'Create Task','class' => 'formSubmit') ); 
?>
    </fieldset>
    <?php echo $this->Form->end(); ?>