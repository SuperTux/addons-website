<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Addons Controller
 *
 * @property \App\Model\Table\AddonsTable $Addons
 */
class AddonsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $addons = $this->paginate($this->Addons);

        $this->set(compact('addons'));
        $this->set('_serialize', ['addons']);
    }

    /**
     * View method
     *
     * @param string|null $id Addon id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $addon = $this->Addons->get($id, [
            'contain' => ['AddonVersions']
        ]);

        $this->set('addon', $addon);
        $this->set('_serialize', ['addon']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $addon = $this->Addons->newEntity();
        if ($this->request->is('post')) {
            $addon = $this->Addons->patchEntity($addon, $this->request->data);
            if ($this->Addons->save($addon)) {
                $this->Flash->success(__('The addon has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The addon could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('addon'));
        $this->set('_serialize', ['addon']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Addon id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $addon = $this->Addons->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $addon = $this->Addons->patchEntity($addon, $this->request->data);
            if ($this->Addons->save($addon)) {
                $this->Flash->success(__('The addon has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The addon could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('addon'));
        $this->set('_serialize', ['addon']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Addon id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $addon = $this->Addons->get($id);
        if ($this->Addons->delete($addon)) {
            $this->Flash->success(__('The addon has been deleted.'));
        } else {
            $this->Flash->error(__('The addon could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
