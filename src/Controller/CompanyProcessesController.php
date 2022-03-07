<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CompanyProcesses Controller
 *
 * @property \App\Model\Table\CompanyProcessesTable $CompanyProcesses
 *
 * @method \App\Model\Entity\CompanyProcess[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CompanyProcessesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $companyProcesses = $this->paginate($this->CompanyProcesses);

        $this->set(compact('companyProcesses'));
    }

    /**
     * View method
     *
     * @param string|null $id Company Process id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $companyProcess = $this->CompanyProcesses->get($id, [
            'contain' => []
        ]);

        $this->set('companyProcess', $companyProcess);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $companyProcess = $this->CompanyProcesses->newEntity();
        if ($this->request->is('post')) {
            $companyProcess = $this->CompanyProcesses->patchEntity($companyProcess, $this->request->getData());
            if ($this->CompanyProcesses->save($companyProcess)) {
                $this->Flash->success(__('The {0} has been saved.', 'Company Process'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Company Process'));
        }
        $this->set(compact('companyProcess'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Company Process id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $companyProcess = $this->CompanyProcesses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $companyProcess = $this->CompanyProcesses->patchEntity($companyProcess, $this->request->getData());
            if ($this->CompanyProcesses->save($companyProcess)) {
                $this->Flash->success(__('The {0} has been saved.', 'Company Process'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Company Process'));
        }
        $this->set(compact('companyProcess'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Company Process id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $companyProcess = $this->CompanyProcesses->get($id);
        if ($this->CompanyProcesses->delete($companyProcess)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Company Process'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Company Process'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
