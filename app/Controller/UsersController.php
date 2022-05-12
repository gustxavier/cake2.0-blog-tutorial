<?php
App::uses('UsersController', 'Controller');

/**
 * Class UsersController
 */
class UsersController extends AppController
{
    public $helpers = array('Html', 'Form');

    /**
     * @method index
     * - This method sets all users in view/Users/index.ctp index.
     */
    public function index()
    {
        $this->set('users', $this->User->find('all'));
    }

    /**
     * @method view
     * @param int $id
     * - This method valid if exists an id and find some user by id. After that,
     *      it sets the user found in view/Users/index.ctp index
     */
    public function view($id = null)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }

        $user = $this->User->findById($id);
        if (!$user) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $user);
    }

    /**
     * @method add
     * - This method inserts a user and redirect to index
     */
    public function add()
    {
        if ($this->request->data) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('Your user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to add your user.'));
        }
    }

    /**
     * @method edit
     * @param int
     * - This method edits a user found by id
     */
    public function edit($id = null)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }

        $user = $this->User->findById($id);
        if (!$user) {
            throw new NotFoundException(__('Invalid user'));
        }

        if ($this->request->is(array('user', 'put'))) {
            $this->User->id = $id;
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('Your user has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to update your user.'));
        }

        if (!$this->request->data) {
            $this->request->data = $user;
        }
    }

    /**
     * @method delete
     * @param int $id
     * - This method delete a user by id
     */
    public function delete($id = null)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }

        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->User->delete($id)) {
            $this->Flash->success(
                __('The user with id: %s has been deleted.', h($id))
            );
        } else {
            $this->Flash->error(
                __('The user with id: %s could not be deleted.', h($id))
            );
        }

        return $this->redirect(array('action' => 'index'));
    }
}