<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Processes Controller
 *
 * @property \App\Model\Table\ProcessesTable $Processes
 *
 * @method \App\Model\Entity\Process[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProcessesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $processes = $this->paginate($this->Processes);

        $this->set(compact('processes'));
    }

    /**
     * View method
     *
     * @param string|null $id Process id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $process = $this->Processes->get($id, [
            'contain' => []
        ]);

        $this->set('process', $process);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $process = $this->Processes->newEntity();
        if ($this->request->is('post')) {
            $process = $this->Processes->patchEntity($process, $this->request->getData());
            if ($this->Processes->save($process)) {
                $this->Flash->success(__('The {0} has been saved.', 'Process'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Process'));
        }
        $this->set(compact('process'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Process id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $process = $this->Processes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $process = $this->Processes->patchEntity($process, $this->request->getData());
            if ($this->Processes->save($process)) {
                $this->Flash->success(__('The {0} has been saved.', 'Process'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Process'));
        }
        $this->set(compact('process'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Process id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $process = $this->Processes->get($id);
        if ($this->Processes->delete($process)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Process'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Process'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
