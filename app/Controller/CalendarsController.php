<?php

class CalendarsController extends AppController {

    public function add() {
    	$this->loadModel('Calendar');
    
        if ($this->request->is('post')) {   
            $this->Calendar->create();
            if ($this->Calendar->save($this->request->data)) {
                $this->Session->setFlash(__('Event saved!'));
                $this->redirect(array('action' => 'index'));
            } 
            else {
                $this->Session->setFlash(__('The event could not be saved'));
            }   
        }
    }
    
    public function index() {
    	$user = $this->Session->read('Auth.User');
    	$userId = $this->Session->read('Auth.User.id');
        $events = $this->Calendar->find('all',array('conditions' => array('user_id' => $userId)));
        $this->set('events', $events);
        $this->set('daysInMonth',parent::daysInMonth());
        $this->set('isLastWeek',$this->isLastWeek());
        $this->set('weekNumber',$this->weekNumber());
        $this->set('prevPage',$this->referer());
        
        
    	/*$weekday = date('w');
    	$number = date('d');
    	$this->set('weekday',$weekday);
    	$this->set('number',$number);
    	$days = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
    	$this->set('day',$days[$weekday]);
    	$weekNumber = weekNumber();
    	$this->set('weekNumber',$weekNumber);*/
    	
    	
        
    }
    
    
    
    
    
    
    
    public function edit($id = null) {
    
    	$userId = $this->Session->read('Auth.User.id');
    	$user = $this->Session->read('Auth.User');
    	$tasks = $this->Calendar->find('all',array('conditions' => array('user_id' => $userId)));


 
        if (!$id) {
            $this->Session->setFlash('Error: no task selected');
            $this->redirect(array('action'=>'index'));
        }
 
        $task = $this->Calendar->findById($id);
        if (!$task) {
            $this->Session->setFlash('Error: invalid task');
            $this->redirect(array('action'=>'index'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Calendar->id = $id;
            if ($this->Calendar->save($this->request->data)) {
                $this->Session->setFlash(__('Changes saved'));
                $this->redirect(array('action' => 'edit', $id));
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
            $this->Session->setFlash('Please provide a user id');
            $this->redirect(array('action'=>'index'));
        }
         
        $this->Calendar->id = $id;
        if (!$this->Calendar->exists()) {
            $this->Session->setFlash('Invalid user id provided');
            $this->redirect(array('action'=>'index'));
        }
        if ($this->Calendar->saveField('status', 0)) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Event was not deleted'));
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