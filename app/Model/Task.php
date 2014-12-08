<?php
App::uses('AuthComponent', 'Controller/Component');
 
class Task extends AppModel {

    public $belongsTo = 'User';
    
    public $validate = array(
        'task_name' => array(
            'custom' => array(
            	'rule' => array('custom', '/^[a-z0-9 ]*$/i'),
            	'required' => true,
            	'message' => 'This field accepts letters and numbers only.'
            ),
            'maxLength' => array(
            	'rule' => array('maxLength', 50),
            	'message' => 'Task name cannot exceed 50 characters'
            )
        )
    );
}
?>