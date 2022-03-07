<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OtherDepartments Controller
 *
 * @property \App\Model\Table\OtherDepartmentsTable $OtherDepartments
 *
 * @method \App\Model\Entity\OtherDepartment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OtherDepartmentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Employees', 'Departments']
        ];
        $otherDepartments = $this->paginate($this->OtherDepartments);

        $this->set(compact('otherDepartments'));
    }

    /**
     * View method
     *
     * @param string|null $id Other Department id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $otherDepartment = $this->OtherDepartments->get($id, [
            'contain' => ['Employees', 'Departments']
        ]);

        $this->set('otherDepartment', $otherDepartment);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $otherDepartment = $this->OtherDepartments->newEntity();
        if ($this->request->is('post')) {
            $otherDepartment = $this->OtherDepartments->patchEntity($otherDepartment, $this->request->getData());
            if ($this->OtherDepartments->save($otherDepartment)) {
                $this->Flash->success(__('The {0} has been saved.', 'Other Department'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Other Department'));
        }
        $employees = $this->OtherDepartments->Employees->find('list', ['limit' => 200]);
        $departments = $this->OtherDepartments->Departments->find('list', ['limit' => 200]);
        $this->set(compact('otherDepartment', 'employees', 'departments'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Other Department id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $otherDepartment = $this->OtherDepartments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $otherDepartment = $this->OtherDepartments->patchEntity($otherDepartment, $this->request->getData());
            if ($this->OtherDepartments->save($otherDepartment)) {
                $this->Flash->success(__('The {0} has been saved.', 'Other Department'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Other Department'));
        }
        $employees = $this->OtherDepartments->Employees->find('list', ['limit' => 200]);
        $departments = $this->OtherDepartments->Departments->find('list', ['limit' => 200]);
        $this->set(compact('otherDepartment', 'employees', 'departments'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Other Department id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $otherDepartment = $this->OtherDepartments->get($id);
        if ($this->OtherDepartments->delete($otherDepartment)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Other Department'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Other Department'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
