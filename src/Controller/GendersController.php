<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Genders Controller
 *
 * @property \App\Model\Table\GendersTable $Genders
 *
 * @method \App\Model\Entity\Gender[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GendersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $genders = $this->paginate($this->Genders);

        $this->set(compact('genders'));
    }

    /**
     * View method
     *
     * @param string|null $id Gender id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gender = $this->Genders->get($id, [
            'contain' => ['Employees']
        ]);

        $this->set('gender', $gender);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gender = $this->Genders->newEntity();
        if ($this->request->is('post')) {
            $gender = $this->Genders->patchEntity($gender, $this->request->getData());
            if ($this->Genders->save($gender)) {
                $this->Flash->success(__('The {0} has been saved.', 'Gender'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Gender'));
        }
        $this->set(compact('gender'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Gender id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gender = $this->Genders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gender = $this->Genders->patchEntity($gender, $this->request->getData());
            if ($this->Genders->save($gender)) {
                $this->Flash->success(__('The {0} has been saved.', 'Gender'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Gender'));
        }
        $this->set(compact('gender'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Gender id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gender = $this->Genders->get($id);
        if ($this->Genders->delete($gender)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Gender'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Gender'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
