<?php
App::uses('AuthComponent', 'Controller/Component');
 
class Complete extends AppModel {

    public $belongsTo = array('User','Task');
    
    public $validate = array(
        'user_id' => array(
            'numeric' => array(
            	'rule' => 'numeric',
            	'message' => 'user_id error'
            )
        ),
        'task_id' => array(
            'numeric' => array(
            	'rule' => 'numeric',
            	'message' => 'task_id error'
            )
        )
    );
}
?>