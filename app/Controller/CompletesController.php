<?php

class CompletesController extends AppController {

    public function add() {
    	$this->loadModel('Complete');
        if ($this->request->is('post')) {   
            $this->Complete->create();
            if ($this->Complete->save($this->request->data)) {
                $this->Session->setFlash(__('Task completed!'));
                $this->redirect(array('action' => 'index'));
            } 
            else {
                $this->redirect(array('controller' => 'tasks','action' => 'index'));
            }   
        }
    }
    
    public function index() {
        $this->set('prevPage',$this->referer());
        $this->redirect(array('controller' => 'users','action' => 'index'));
        $today = date('Y-m-d');
        $completes = $this->Complete->find('all',array('conditions' => array('date' => $today)));
        $this->set('completes',$completes);
    }
    
}
?>