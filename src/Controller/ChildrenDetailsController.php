<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ChildrenDetails Controller
 *
 * @property \App\Model\Table\ChildrenDetailsTable $ChildrenDetails
 *
 * @method \App\Model\Entity\ChildrenDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ChildrenDetailsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Employees', 'Genders']
        ];
        $childrenDetails = $this->paginate($this->ChildrenDetails);

        $this->set(compact('childrenDetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Children Detail id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $childrenDetail = $this->ChildrenDetails->get($id, [
            'contain' => ['Employees', 'Genders']
        ]);

        $this->set('childrenDetail', $childrenDetail);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $childrenDetail = $this->ChildrenDetails->newEntity();
        if ($this->request->is('post')) {
            $childrenDetail = $this->ChildrenDetails->patchEntity($childrenDetail, $this->request->getData());
            if ($this->ChildrenDetails->save($childrenDetail)) {
                $this->Flash->success(__('The {0} has been saved.', 'Children Detail'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Children Detail'));
        }
        $employees = $this->ChildrenDetails->Employees->find('list', ['limit' => 200]);
        $genders = $this->ChildrenDetails->Genders->find('list', ['limit' => 200]);
        $this->set(compact('childrenDetail', 'employees', 'genders'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Children Detail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $childrenDetail = $this->ChildrenDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $childrenDetail = $this->ChildrenDetails->patchEntity($childrenDetail, $this->request->getData());
            if ($this->ChildrenDetails->save($childrenDetail)) {
                $this->Flash->success(__('The {0} has been saved.', 'Children Detail'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Children Detail'));
        }
        $employees = $this->ChildrenDetails->Employees->find('list', ['limit' => 200]);
        $genders = $this->ChildrenDetails->Genders->find('list', ['limit' => 200]);
        $this->set(compact('childrenDetail', 'employees', 'genders'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Children Detail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $childrenDetail = $this->ChildrenDetails->get($id);
        if ($this->ChildrenDetails->delete($childrenDetail)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Children Detail'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Children Detail'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
