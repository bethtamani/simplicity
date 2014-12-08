 
<?php echo $this->Form->create('User', array('id' => 'usersForm'));?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('email');
        echo $this->Form->input('password');
        echo $this->Form->input('password_confirm', array('label' => 'Confirm Password *', 'maxLength' => 255, 'title' => 'Confirm password', 'type'=>'password'));
        echo $this->Form->input('first',array('label' => 'First Name'));
        echo $this->Form->input('last',array('label' => 'Last Name'));
         
        echo $this->Form->submit('Add User', array('class' => 'form-submit',  'title' => 'Create Account') ); 
?>
    </fieldset>
<?php echo $this->Form->end(); ?>
<?php 
if($this->Session->check('Auth.User')){
echo $this->Html->link( "Return to Dashboard",   array('action'=>'index') ); 
echo "<br>";
echo $this->Html->link( "Logout",   array('action'=>'logout') ); 
}else{
echo $this->Html->link( "Return to Login Screen",   array('action'=>'login') ); 
}
?>