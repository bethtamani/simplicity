<?php 
	echo $this->Form->create('Calendar',array('class' => 'eventForm','type' => 'post'));
	$userId = $this->Session->read('Auth.User.id');
	
	
	
?>
	
    <fieldset>
        <legend class="welcomeText"><?php echo __('Add an Event'); ?></legend>
        <?php 
        
            echo $this->Form->hidden('user_id', array('value' => $userId));

            echo $this->Form->input('event_name', array('label' => 'Event Name', 'maxLength' => 50));
            
            //date input
            
            echo $this->Form->input('date',array('type' => 'date'));?>
            
            <?php
            /*<script type="text/javascript"
		src="http://www.snaphost.com/jquery/Calendar.aspx?dateFormat=dd/mm/yy"></script> 
		*/
		?>
	<?php
            
            echo $this->Form->input('start_time',array('type' => 'time','interval' => 5,'label' => 'Start time'));
            echo $this->Form->input('end_time',array('type' => 'time','interval' => 5,'label' => 'End time'));
   
            
            echo $this->Form->checkbox('recurring',array('class' => 'recurringBox'));
            echo "Recurring Event?"; ?>
            
            
            <div id="recurringDiv">
            <input type="radio" name="data[Calendar][type]" id="CalendarType0" value=0 class="calendarTypeRadio" />
            <label for="CalendarType0">Daily</label><br/>
            
            <input type="radio" name="data[Calendar][type]" id="CalendarType1" value=1 class="calendarTypeRadio" />
            <label for="CalendarType1">
            	<?php
            	  echo "Every ";
            	  $options = array(0 => 'Sunday',1 => 'Monday',2 => 'Tuesday',3 => 'Wednesday',4 => 'Thursday',5 => 'Friday',6 => 'Saturday');
            	  $attributes = array('disabled' => true,'empty' => false,);
            	  echo $this->Form->select('day',$options,$attributes);
            	?>
            </label><br/>
            <input type="radio" name="data[Calendar][type]" id="CalendarType2" value=2 class="calendarTypeRadio" />
            <label for="CalendarType2">
            	<?php
            	  echo "On the ";
            	  $options = array(0 => '', 1 => '1st',2 => '2nd',3 => '3rd',4 => '4th',5 => '5th',6 => '6th',7 => '7th',
            	    		   8 => '8th',9 => '9th',10 => '10th',11 => '11th',12 => '12th',13 => '13th',14 => '14th',
            	    		   15 => '15th', 16 => '16th',17 => '17th',18 => '18th',19 => '19th',20 => '20th',21 => '21st',
            	    		   22 => '22nd',23 => '23rd',24 => '24th',25 => '25th',26 => '26th',27 => '27th',28 => '28th',
            	    		   29 => '29th',30 => '30th',31 => '31st');
            	  $attributes = array('disabled' => true,'empty' => false,);
            	  echo $this->Form->select('month_number',$options,$attributes);
            	  echo " of the month";
            	?>
            </label><br/>
            <input type="radio" name="data[Calendar][type]" id="CalendarType3" value=3 class="calendarTypeRadio" />
            <label for="CalendarType3">
            	<?php
            	  echo "On the ";
            	  $options = array(0 => '', 1 => '1st',2 => '2nd',3 => '3rd',4 => '4th',5 => '5th');
            	  $attributes = array('disabled' => true,'empty' => false);
            	  echo $this->Form->select('month_weekly',$options,$attributes);
            	  $options = array(0 => 'Sunday',1 => 'Monday',2 => 'Tuesday',3 => 'Wednesday',4 => 'Thursday',5 => 'Friday',6 => 'Saturday');
            	  $attributes = array('disabled' => true,'empty' => false);
            	  echo $this->Form->select('month_day',$options,$attributes);
            	  echo " of the month";
            	?>
            </label>
            </div>
            
     
        
        <?php 
        echo $this->Form->submit('Add Event', array('title' => 'Create Event','class' => 'formSubmit') ); 
?>
    </fieldset>
    <?php echo $this->Form->end(); ?>
    