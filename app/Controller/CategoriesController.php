<?php
App::uses('CategoriesController', 'Controller');

/**
 * Class CategoriesController
 */
class CategoriesController extends AppController
{
    public $helpers = array('Html', 'Form');

    /**
     * @method index
     * - This method sets all categories in view/Categories/index.ctp index.
     */
    public function index()
    {
        $this->set('categories', $this->Category->find('all'));
    }

    /**
     * @method view
     * @param int $id
     * - This method valid if exists an id and find some category by id. After that,
     *      it sets the category found in view/Categories/index.ctp index
     */
    public function view($id = null)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid category'));
        }

        $category = $this->Category->findById($id);
        if (!$category) {
            throw new NotFoundException(__('Invalid category'));
        }
        $this->set('category', $category);
    }

    /**
     * @method add
     * - This method inserts a category and redirect to index
     */
    public function add()
    {
        if ($this->request->data) {
            $this->Category->create();
            if ($this->Category->save($this->request->data)) {
                $this->Flash->success(__('Your category has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to add your category.'));
        }
    }

    /**
     * @method edit
     * @param int
     * - This method edits a category found by id
     */
    public function edit($id = null)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid category'));
        }

        $category = $this->Category->findById($id);
        if (!$category) {
            throw new NotFoundException(__('Invalid category'));
        }

        if ($this->request->is(array('category', 'put'))) {
            $this->Category->id = $id;
            if ($this->Category->save($this->request->data)) {
                $this->Flash->success(__('Your category has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to update your category.'));
        }

        if (!$this->request->data) {
            $this->request->data = $category;
        }
    }

    /**
     * @method delete
     * @param int $id
     * - This method delete a category by id
     */
    public function delete($id = null)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid category'));
        }

        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Category->delete($id)) {
            $this->Flash->success(
                __('The category with id: %s has been deleted.', h($id))
            );
        } else {
            $this->Flash->error(
                __('The category with id: %s could not be deleted.', h($id))
            );
        }

        return $this->redirect(array('action' => 'index'));
    }
}