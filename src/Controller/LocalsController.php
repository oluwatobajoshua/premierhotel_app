<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Locals Controller
 *
 * @property \App\Model\Table\LocalsTable $Locals
 *
 * @method \App\Model\Entity\Local[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LocalsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['States']
        ];
        $locals = $this->paginate($this->Locals);

        $this->set(compact('locals'));
    }

    /**
     * View method
     *
     * @param string|null $id Local id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $local = $this->Locals->get($id, [
            'contain' => ['States', 'Employees']
        ]);

        $this->set('local', $local);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $local = $this->Locals->newEntity();
        if ($this->request->is('post')) {
            $local = $this->Locals->patchEntity($local, $this->request->getData());
            if ($this->Locals->save($local)) {
                $this->Flash->success(__('The {0} has been saved.', 'Local'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Local'));
        }
        $states = $this->Locals->States->find('list', ['limit' => 200]);
        $this->set(compact('local', 'states'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Local id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $local = $this->Locals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $local = $this->Locals->patchEntity($local, $this->request->getData());
            if ($this->Locals->save($local)) {
                $this->Flash->success(__('The {0} has been saved.', 'Local'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Local'));
        }
        $states = $this->Locals->States->find('list', ['limit' => 200]);
        $this->set(compact('local', 'states'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Local id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $local = $this->Locals->get($id);
        if ($this->Locals->delete($local)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Local'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Local'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
