<?php
App::uses('TagsController', 'Controller');

/**
 * Class TagsController
 */
class TagsController extends AppController
{
    public $helpers = array('Html', 'Form');

    /**
     * @method index
     * - This method sets all tags in view/Tags/index.ctp index.
     */
    public function index()
    {
        $this->set('tags', $this->Tag->find('all'));
    }

    /**
     * @method view
     * @param int $id
     * - This method valid if exists an id and find some tag by id. After that,
     *      it sets the tag found in view/Tags/index.ctp index
     */
    public function view($id = null)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid tag'));
        }

        $tag = $this->Tag->findById($id);
        if (!$tag) {
            throw new NotFoundException(__('Invalid tag'));
        }
        $this->set('tag', $tag);
    }

    /**
     * @method add
     * - This method inserts a tag and redirect to index
     */
    public function add()
    {
        if ($this->request->data) {
            $this->Tag->create();
            if ($this->Tag->save($this->request->data)) {
                $this->Flash->success(__('Your tag has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to add your tag.'));
        }
    }

    /**
     * @method edit
     * @param int
     * - This method edits a tag found by id
     */
    public function edit($id = null)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid tag'));
        }

        $tag = $this->Tag->findById($id);
        if (!$tag) {
            throw new NotFoundException(__('Invalid tag'));
        }

        if ($this->request->is(array('tag', 'put'))) {
            $this->Tag->id = $id;
            if ($this->Tag->save($this->request->data)) {
                $this->Flash->success(__('Your tag has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to update your tag.'));
        }

        if (!$this->request->data) {
            $this->request->data = $tag;
        }
    }

    /**
     * @method delete
     * @param int $id
     * - This method delete a tag by id
     */
    public function delete($id = null)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid tag'));
        }

        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Tag->delete($id)) {
            $this->Flash->success(
                __('The tag with id: %s has been deleted.', h($id))
            );
        } else {
            $this->Flash->error(
                __('The tag with id: %s could not be deleted.', h($id))
            );
        }

        return $this->redirect(array('action' => 'index'));
    }
}