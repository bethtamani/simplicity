<?php

class TasksController extends AppController {


    public function add() {
    	$this->loadModel('Task');
    	$previous = $this->referer();
	$this->set('previous',$previous);
    	
        if ($this->request->is('post')) {   
            $this->Task->create();
            if ($this->Task->save($this->request->data)) {
            	if (isset($this->params['data']['cancel'])) {
                    $this->Session->setFlash(__('Changes were not saved. User canceled.'));
                    $this->redirect(array('controller' => 'tasks','action' => 'index'));
                }
                else {
                $this->Session->setFlash(__('Task saved!'));
                $this->redirect(array('action' => 'index'));
                }
            } 
            else {
                $this->Session->setFlash(__('The task could not be saved'));
            }   
        }
    }
    
    public function index() {
    	$this->loadModel('Complete');
    	$user = $this->Session->read('Auth.User');
    	$userId = $this->Session->read('Auth.User.id');
        $tasks = $this->Task->find('all',array('conditions' => array('user_id' => $userId)));
        $this->set('tasks', $tasks);
        
        $this->set('daysInMonth',parent::daysInMonth());
        $this->set('isLastWeek',$this->isLastWeek());
        $this->set('weekNumber',$this->weekNumber());
        $this->set('prevPage',$this->referer());
        
        
    	$weekday = date('w');
    	$number = date('d');
    	
        
    }
    
    
    
    
    
    
    
    public function edit($id = null) {
    
    	$userId = $this->Session->read('Auth.User.id');
    	$user = $this->Session->read('Auth.User');
    	$tasks = $this->Task->find('all',array('conditions' => array('user_id' => $userId)));
	$this->set('tasks',$tasks);
	
	$previous = $this->referer();
	$this->set('previous',$previous);

 
        if (!$id) {
            $this->Session->setFlash('Error: no task selected');
            $this->redirect(array('action'=>'index'));
        }
 
        $task = $this->Task->findById($id);
        if (!$task) {
            $this->Session->setFlash('Error: invalid task');
            $this->redirect(array('action'=>'index'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Task->id = $id;
            if (isset($this->request->data['cancel'])) {
                    $this->Session->setFlash(__('Changes were not saved. User canceled.'));
                    $this->redirect(array('controller' => 'tasks','action' => 'index'));
                }
            if ($this->Task->save($this->request->data)) {
                $this->Session->setFlash(__('Changes saved'));
                $this->redirect(array('controller' => 'tasks','action' => 'index'));
            }
            else{
                $this->Session->setFlash(__('Unable to update your user.'));
            }
        }
        if (!$this->request->data) {
            $this->request->data = $user;
        }
    }
 
    public function delete($id = null) {
         
        if (!$id) {
            $this->Session->setFlash('Please provide a task id');
            $this->redirect(array('action'=>'index'));
        }
         
        $this->Task->id = $id;
        if (!$this->Task->exists()) {
            $this->Session->setFlash('Invalid task id provided');
            $this->redirect(array('action'=>'index'));
        }
        if ($this->Task->delete($this->request->data('Task.id'))) {
            $this->Session->setFlash(__('Task deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Task was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
    
    public function weekNumber() {
    
    	$number = date('d');
    	$weekNumber = 0;
    	if ($number >= 1 && $number <= 7) {
    		$weekNumber = 1;
    	}
    	if ($number >= 8 && $number <= 14) {
    		$weekNumber = 2;
    	}
    	if ($number >= 15 && $number <= 21) {
    		$weekNumber = 3;
    	}
    	if ($number >= 22 && $number <= 28) {
    		$weekNumber = 4;
    	}
    	if ($number >=  29) {
    		$weekNumber = 5;
    	}
    	return $weekNumber;
    }
    
    public function isLastWeek() {
    
    	$number = date('d');
    	$month = date('m');
    	$isLastWeek = 0;
    	if ($month == 10) {
    		if ('d' >= 25) {
    			$isLastWeek = 1;
    		}
    	}
    	if (in_array($month,array(04,06,09,11))) {
    		if ('d' >= 24) {
    			$isLastWeek = 1;
    		}
    	}
    	if ($month == 02) {
    		if ('d' >= 22) {
    			$isLastWeek = 1;
    		}
    	}
    	return $isLastWeek;
    	
    
    }
    
    public function daysInMonth() {
    	
    	$month = date('m');
    	$daysInMonth = 0;
    	if (in_array($month,array(01,03,05,07,08,10,12))) {
    		$daysInMonth = 31;
    	}
    	if (in_array($month,array(04,06,09,11))) {
    		$daysInMonth = 30;
    	}
    	if ($month == 02) {
    		$daysInMonth = 28;
    	}
    	return $daysInMonth;
    	
    }
}

?>