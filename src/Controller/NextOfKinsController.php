<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * NextOfKins Controller
 *
 * @property \App\Model\Table\NextOfKinsTable $NextOfKins
 *
 * @method \App\Model\Entity\NextOfKin[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NextOfKinsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Employees', 'Relationships']
        ];
        $nextOfKins = $this->paginate($this->NextOfKins);

        $this->set(compact('nextOfKins'));
    }

    /**
     * View method
     *
     * @param string|null $id Next Of Kin id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nextOfKin = $this->NextOfKins->get($id, [
            'contain' => ['Employees', 'Relationships']
        ]);

        $this->set('nextOfKin', $nextOfKin);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $nextOfKin = $this->NextOfKins->newEntity();
        if ($this->request->is('post')) {
            $nextOfKin = $this->NextOfKins->patchEntity($nextOfKin, $this->request->getData());
            if ($this->NextOfKins->save($nextOfKin)) {
                $this->Flash->success(__('The {0} has been saved.', 'Next Of Kin'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Next Of Kin'));
        }
        $employees = $this->NextOfKins->Employees->find('list', ['limit' => 200]);
        $relationships = $this->NextOfKins->Relationships->find('list', ['limit' => 200]);
        $this->set(compact('nextOfKin', 'employees', 'relationships'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Next Of Kin id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $nextOfKin = $this->NextOfKins->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nextOfKin = $this->NextOfKins->patchEntity($nextOfKin, $this->request->getData());
            if ($this->NextOfKins->save($nextOfKin)) {
                $this->Flash->success(__('The {0} has been saved.', 'Next Of Kin'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Next Of Kin'));
        }
        $employees = $this->NextOfKins->Employees->find('list', ['limit' => 200]);
        $relationships = $this->NextOfKins->Relationships->find('list', ['limit' => 200]);
        $this->set(compact('nextOfKin', 'employees', 'relationships'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Next Of Kin id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $nextOfKin = $this->NextOfKins->get($id);
        if ($this->NextOfKins->delete($nextOfKin)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Next Of Kin'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Next Of Kin'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
