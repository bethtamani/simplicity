<?php
class TestsController extends AppController {
	public $helpers = array('Html','Form');
	public function index() {
		$this->set('tests',$this->Test->find('all'));
	}
	
	public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $test = $this->Test->findById($id);
        if (!$test) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('test', $test);
    	}
    	
    	public function add() {
        if ($this->request->is('post')) {
            $this->Test->create();
            if ($this->Test->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your post.'));
        }
    	}
}
?>