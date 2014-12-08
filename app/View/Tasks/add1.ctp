<?php echo $this->Form->create('Task', array('id' => 'taskForm'));
$userId = $this->Session->read('Auth.User.id');?>
    <fieldset>
        <legend><?php echo __('Add Task'); ?></legend>
        <?php 
            echo $this->Form->hidden('user_id', array('value' => $userId));
        echo $this->Form->input('task_name');
        
         
        echo $this->Form->submit('Add Task', array('class' => 'form-submit',  'title' => 'Create Account') ); 
?>
    </fieldset>
<?php echo $this->Form->end(); ?>