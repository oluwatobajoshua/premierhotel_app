<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LeaveTypes Controller
 *
 * @property \App\Model\Table\LeaveTypesTable $LeaveTypes
 *
 * @method \App\Model\Entity\LeaveType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LeaveTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $leaveTypes = $this->paginate($this->LeaveTypes);

        $this->set(compact('leaveTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Leave Type id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $leaveType = $this->LeaveTypes->get($id, [
            'contain' => ['Leaves']
        ]);

        $this->set('leaveType', $leaveType);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $leaveType = $this->LeaveTypes->newEntity();
        if ($this->request->is('post')) {
            $leaveType = $this->LeaveTypes->patchEntity($leaveType, $this->request->getData());
            if ($this->LeaveTypes->save($leaveType)) {
                $this->Flash->success(__('The {0} has been saved.', 'Leave Type'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Leave Type'));
        }
        $this->set(compact('leaveType'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Leave Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $leaveType = $this->LeaveTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $leaveType = $this->LeaveTypes->patchEntity($leaveType, $this->request->getData());
            if ($this->LeaveTypes->save($leaveType)) {
                $this->Flash->success(__('The {0} has been saved.', 'Leave Type'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Leave Type'));
        }
        $this->set(compact('leaveType'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Leave Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $leaveType = $this->LeaveTypes->get($id);
        if ($this->LeaveTypes->delete($leaveType)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Leave Type'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Leave Type'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
