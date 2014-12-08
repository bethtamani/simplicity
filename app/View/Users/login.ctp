<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User', array('class' => 'usersForm')); ?>
    <fieldset>
        <legend><?php echo __('Please Login to Continue'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    
<?php 
//echo $this->Form->end(__('Login',array('class' => 'viewButton'))); 
?>

<?php
 echo $this->Form->submit('Login',array('class' => 'formSubmit'));
 echo $this->Form->button('Create Account',array('action' => 'add','class' => 'formSubmit')); 
 echo $this->Form->end();
?>
</fieldset>