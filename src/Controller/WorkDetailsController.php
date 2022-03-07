<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * WorkDetails Controller
 *
 * @property \App\Model\Table\WorkDetailsTable $WorkDetails
 *
 * @method \App\Model\Entity\WorkDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WorkDetailsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Employees']
        ];
        $workDetails = $this->paginate($this->WorkDetails);

        $this->set(compact('workDetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Work Detail id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $workDetail = $this->WorkDetails->get($id, [
            'contain' => ['Employees']
        ]);

        $this->set('workDetail', $workDetail);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $workDetail = $this->WorkDetails->newEntity();
        if ($this->request->is('post')) {
            $workDetail = $this->WorkDetails->patchEntity($workDetail, $this->request->getData());
            if ($this->WorkDetails->save($workDetail)) {
                $this->Flash->success(__('The {0} has been saved.', 'Work Detail'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Work Detail'));
        }
        $employees = $this->WorkDetails->Employees->find('list', ['limit' => 200]);
        $this->set(compact('workDetail', 'employees'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Work Detail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $workDetail = $this->WorkDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $workDetail = $this->WorkDetails->patchEntity($workDetail, $this->request->getData());
            if ($this->WorkDetails->save($workDetail)) {
                $this->Flash->success(__('The {0} has been saved.', 'Work Detail'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Work Detail'));
        }
        $employees = $this->WorkDetails->Employees->find('list', ['limit' => 200]);
        $this->set(compact('workDetail', 'employees'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Work Detail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $workDetail = $this->WorkDetails->get($id);
        if ($this->WorkDetails->delete($workDetail)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Work Detail'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Work Detail'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
