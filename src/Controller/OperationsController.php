<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Operations Controller
 *
 * @property \App\Model\Table\OperationsTable $Operations
 *
 * @method \App\Model\Entity\Operation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OperationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $operations = $this->paginate($this->Operations);

        $this->set(compact('operations'));
    }

    /**
     * View method
     *
     * @param string|null $id Operation id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $operation = $this->Operations->get($id, [
            'contain' => ['Comments']
        ]);

        $this->set('operation', $operation);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $operation = $this->Operations->newEntity();
        if ($this->request->is('post')) {
            $operation = $this->Operations->patchEntity($operation, $this->request->getData());
            if ($this->Operations->save($operation)) {
                $this->Flash->success(__('The {0} has been saved.', 'Operation'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Operation'));
        }
        $this->set(compact('operation'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Operation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $operation = $this->Operations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $operation = $this->Operations->patchEntity($operation, $this->request->getData());
            if ($this->Operations->save($operation)) {
                $this->Flash->success(__('The {0} has been saved.', 'Operation'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Operation'));
        }
        $this->set(compact('operation'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Operation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $operation = $this->Operations->get($id);
        if ($this->Operations->delete($operation)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Operation'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Operation'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
