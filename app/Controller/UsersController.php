<?php
class UsersController extends AppController {

    
 
    public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
        'order' => array('User.username' => 'asc' ) 
    );
     
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login','add'); 
    }
     
 
 
    public function login() {
         
        //if already logged-in, redirect
        if($this->Session->check('Auth.User')){
            $this->redirect(array('action' => 'index'));      
        }
         
        // if we get the post information, try to authenticate
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->Session->setFlash(__('Welcome, '. $this->Auth->user('username')));
                $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Session->setFlash(__('Invalid username or password'));
            }
        } 
    }
 
    public function logout() {
        $this->redirect($this->Auth->logout());
    }
 
    public function index() {
    
    	//gather info
        $this->loadModel('Task');
        $this->loadModel('Complete');
        $this->loadModel('Calendar');
        $userId = $this->Session->read('Auth.User.id');
        $tasks = $this->Task->find('all',array('conditions' => array('user_id' => $userId)));
        $this->set('tasks', $tasks);
        $today = date('Y-m-d');
        $completes = $this->Complete->find('all',array('conditions' => array('date' => $today)));
        $completeTasks = array();
        foreach ($completes as $complete) {
            array_push($completeTasks,$complete['Complete']['task_id']);
        }
        $this->set('completes',$completeTasks);
        
        $events = $this->Calendar->find('all',array('conditions' => array('user_id' => $userId)));
        $this->set('events', $events);
        
    
        $this->set('daysInMonth',parent::daysInMonth());
        $this->set('isLastWeek',$this->isLastWeek());
        $this->set('weekNumber',$this->weekNumber());
        $this->set('prevPage',$this->referer());
        
    }
 
 
    public function add() {
        if ($this->request->is('post')) {
                 
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Your account has been created! Please login to continue'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be created. Please, try again.'));
            }   
        }
    }
    
    /*public function edit() {
    	$userId = $this->Session->read('Auth.User.id');
    	if (!$userId) {
    	    $this->Session->setFlash('Error: no user selected');
    	    $this->redirect(array('action' => 'index'));
    	}
    	if ($this->request->is('post') || $this->request->is('put')) {
    	    $this->User->id = $userId;
    	    if ($this->User->save($this->request->data)) {
    	    	$this->Session->setFlash('Changes saved');
    	    	$this->redirect(array('action' => 'index'));
    	    }
    	    else {
    	    	$this->Session->setFlash('Unable to update');
    	    }
    	}
    	
    }*/
    
    public function edit($id = null) {
    
    	$userId = $this->Session->read('Auth.User.id');
    	$user = $this->Session->read('Auth.User');
	
	$previous = $this->referer();
	$this->set('previous',$previous);


        if (!$user) {
            $this->Session->setFlash('Error: invalid user');
            $this->redirect(array('action'=>'index'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->User->id = $userId;
            if (isset($this->request->data['cancel'])) {
                    $this->Session->setFlash(__('Changes were not saved. User canceled.'));
                    $this->redirect(array('controller' => 'users','action' => 'index'));
                }
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Changes saved'));
                $this->redirect(array('controller' => 'users','action' => 'index'));
            }
            else{
                $this->Session->setFlash(__('Unable to update your user.'));
                $this->redirect(array('controller' => 'calendars','action' => 'index'));
            }
        }
        if (!$this->request->data) {
            $this->request->data = $user;
        }
    }
 
    /*public function edit($id = null) {
 
            if (!$id) {
                $this->Session->setFlash('Please provide a user id');
                $this->redirect(array('action'=>'index'));
            }
 
            $user = $this->Session->read('Auth.User');
            if (!$user) {
                $this->Session->setFlash('Invalid User ID Provided');
                $this->redirect(array('action'=>'index'));
            }
 
            if ($this->request->is('post') || $this->request->is('put')) {
                $this->User->id = $id;
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('The user has been updated'));
                    $this->redirect(array('action' => 'index'));
                }else{
                    $this->Session->setFlash(__('Unable to update your user.'));
                }
            }
 
            if (!$this->request->data) {
                $this->request->data = $user;
            }
    }*/
 
    public function delete($id = null) {
         
        if (!$id) {
            $this->Session->setFlash('Please provide a user id');
            $this->redirect(array('action'=>'index'));
        }
         
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided');
            $this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 0)) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
     
    public function activate($id = null) {
         
        if (!$id) {
            $this->Session->setFlash('Please provide a user id');
            $this->redirect(array('action'=>'index'));
        }
         
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided');
            $this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 1)) {
            $this->Session->setFlash(__('User re-activated'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not re-activated'));
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