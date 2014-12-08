<?php 
    $userId = $this->Session->read('Auth.User.id');


echo $this->Form->create('User', array('id' => 'usersForm','class' => 'taskForm'));?>
    <fieldset>
        <legend class="welcomeText"><?php echo __('Edit Account Information'); ?></legend>
        <?php 
        echo "<p>Username and E-mail can't be changed<br/>";
        echo "Username: ";
        echo $this->Session->read('Auth.User.username');
        echo "<br/>Email: ";
        echo $this->Session->read('Auth.User.email');
        echo "</p>";
        
        
        
        echo $this->Form->input('first',array('label' => 'First Name','value' => $this->Session->read('Auth.User.first')));
        echo $this->Form->input('last',array('label' => 'Last Name','value' => $this->Session->read('Auth.User.last')));
        
        echo $this->Form->submit('Save Changes', array('class' => 'formSubmit',  'title' => 'Click here to save changes') );
?>
    </fieldset>
<?php echo $this->Form->end(); ?> 