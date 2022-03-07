<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Leaves Controller
 *
 * @property \App\Model\Table\LeavesTable $Leaves
 *
 * @method \App\Model\Entity\Leave[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LeavesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Employees', 'Statuses']
        ];
        $leaves = $this->paginate($this->Leaves);

        $this->set(compact('leaves'));
    }

    /**
     * View method
     *
     * @param string|null $id Leave id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $leave = $this->Leaves->get($id, [
            'contain' => ['Employees', 'Statuses']
        ]);

        $this->set('leave', $leave);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $leave = $this->Leaves->newEntity();
        if ($this->request->is('post')) {
            $leave = $this->Leaves->patchEntity($leave, $this->request->getData());
            if ($this->Leaves->save($leave)) {
                $this->Flash->success(__('The {0} has been saved.', 'Leave'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Leave'));
        }
        $leavetypes = $this->Leaves->LeaveTypes->find('list', ['limit'=> 200]);
        $employees = $this->Leaves->Employees->find('list', ['limit' => 200]);
        $statuses = $this->Leaves->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('leave', 'employees', 'statuses', 'leavetypes'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Leave id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $leave = $this->Leaves->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $leave = $this->Leaves->patchEntity($leave, $this->request->getData());
            if ($this->Leaves->save($leave)) {
                $this->Flash->success(__('The {0} has been saved.', 'Leave'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Leave'));
        }
        $employees = $this->Leaves->Employees->find('list', ['limit' => 200]);
        $statuses = $this->Leaves->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('leave', 'employees', 'statuses'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Leave id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $leave = $this->Leaves->get($id);
        if ($this->Leaves->delete($leave)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Leave'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Leave'));
        }

        return $this->redirect(['action' => 'index']);
    }
}