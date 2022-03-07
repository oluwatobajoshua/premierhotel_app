<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Educations Controller
 *
 * @property \App\Model\Table\EducationsTable $Educations
 *
 * @method \App\Model\Entity\Education[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EducationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Employees', 'HighestEducations']
        ];
        $educations = $this->paginate($this->Educations);

        $this->set(compact('educations'));
    }

    /**
     * View method
     *
     * @param string|null $id Education id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $education = $this->Educations->get($id, [
            'contain' => ['Employees', 'HighestEducations']
        ]);

        $this->set('education', $education);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $education = $this->Educations->newEntity();
        if ($this->request->is('post')) {
            $education = $this->Educations->patchEntity($education, $this->request->getData());
            if ($this->Educations->save($education)) {
                $this->Flash->success(__('The {0} has been saved.', 'Education'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Education'));
        }
        $employees = $this->Educations->Employees->find('list', ['limit' => 200]);
        $highestEducations = $this->Educations->HighestEducations->find('list', ['limit' => 200]);
        $this->set(compact('education', 'employees', 'highestEducations'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Education id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $education = $this->Educations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $education = $this->Educations->patchEntity($education, $this->request->getData());
            if ($this->Educations->save($education)) {
                $this->Flash->success(__('The {0} has been saved.', 'Education'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Education'));
        }
        $employees = $this->Educations->Employees->find('list', ['limit' => 200]);
        $highestEducations = $this->Educations->HighestEducations->find('list', ['limit' => 200]);
        $this->set(compact('education', 'employees', 'highestEducations'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Education id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $education = $this->Educations->get($id);
        if ($this->Educations->delete($education)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Education'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Education'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
