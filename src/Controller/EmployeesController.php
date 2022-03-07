<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\I18n\Date;


/**
 * Employees Controller
 *
 * @property \App\Model\Table\EmployeesTable $Employees
 *
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployeesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function isAuthorized($user)
    {

        //debug($user['role_id']);
        // All registered users can add articles
        // Prior to 3.4.0 $this->request->param('action') was used.
        if ($user['role_id'] == 1) {
            return true;
        }

        // The owner of an article can edit and delete it
        // Prior to 3.4.0 $this->request->param('action') was used.
        if (in_array($this->request->getParam('action'), ['edit', 'view'])) {
            // Prior to 3.4.0 $this->request->params('pass.0')
            $employeeId = (int)$this->request->getParam('pass.0');

            if ($this->Employees->isOwnedBy($employeeId, $user['id'])) {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $employees = $this->Employees->find()->where(['status_id !=' => 3]);
        $keyword = '';
        $staff_no = '';

        if ($this->request->is('post')) {
            //delete using id
            $keyword = $this->request->getData('staff_no');
            if (!empty($keyword) && is_numeric($keyword)) {
                $emp = $this->Employees->find()->where(['staff_no' => $keyword]);
                if ($emp->count() > 0) {
                    $employees = $emp;
                } else {
                    $this->Flash->error(__('There is no employee with staff no {0} ', $keyword));
                }
            } else {
                if (!empty($keyword) && is_string($keyword)) {
                    $emp = $this->Employees->find()->where(['Employees.first_name LIKE' => '%' . $keyword . '%']);
                    if ($emp->count() > 0) {
                        $employees = $emp;
                    } elseif ($emp = $this->Employees->find()->where(['Employees.last_name LIKE' => '%' . $keyword . '%'])) {
                        if ($emp->count() > 0) {
                            $employees = $emp;
                        } else {
                            $this->Flash->error(__('There is no employee with first or last name {0} ', $keyword));
                        }
                    }
                }
            }
        }

        $this->paginate = [
            'contain' => ['Genders', 'Branches', 'Banks', 'ServiceCharges', 'Departments', 'Grades', 'Designations', 'Statuses', 'Cadres'],
            'limit' => 500,
            'order' => [
                'staff_no' => 'asc'
            ],
            'sortWhitelist' => [
                'id', 'first_name', 'last_name', 'Departments.id', 'staff_no', 'Grades.name'
            ]
        ];


        $employees = $this->paginate($employees);

        $this->set(compact('employees'));
    }

    /**
     * View method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        if ($this->request->is('post') &&  $this->request->getData('id')) {
            //delete using id
            $id = $this->request->getData('id');

            return $this->redirect(['action' => 'view', $id]);
            /*
            $employee = $this->Employees->get($id, [
                'contain' => [
                    'HighestEducations', 'Religions', 'MaritalStatuses', 'PhysicalPostures', 'Locals',
                    'StateOfOrigins', 'Genders', 'Banks', 'ServiceCharges', 'Departments', 'Grades', 'Designations', 'Statuses',
                    'Cadres', 'Transactions', 'Users'
                ]
            ]);*/
        }

        $employee = $this->Employees->get($id, [
            'contain' => [
                'HighestEducations', 'Religions', 'MaritalStatuses', 'PhysicalPostures', 'Locals', 'StateOfOrigins',
                'Genders', 'Branches', 'Banks', 'ServiceCharges', 'Departments', 'Grades', 'Designations', 'Statuses',
                'Addresses.AddressTypes', 'OtherDepartments.Departments',
                'Cadres', 'Transactions', 'Users', 'NextOfKins.Relationships', 'WorkDetails', 'Educations.HighestEducations', 'ChildrenDetails.Genders'
            ]
        ]);

        //debug($this->request->getParam('pass.0'));        

        $datetime1 = new Time($employee->date_of_birth);
        $datetime2 = new Time('-1 day');
        $interval = $datetime1->diff($datetime2);

        //debug($interval->format('%y years %m months and %d days'));    

        $employees = $this->Employees->find('list', ['limit' => 200]);
        $this->set('employee', $employee);
        $this->set('employees', $employees);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $datetime1 = null;
        $datetime2 = null;
        $interval  = null;

        $employee = $this->Employees->newEntity();
        if ($this->request->is('post')) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            //debug($employee);
            $datetime1 = $employee->date_of_birth;
            $datetime2 = Time::now();
            $interval = $datetime1->diff($datetime2);

            //debug($interval->format('%y years %m months and %d days'));

            $employee->age = $interval->format('%y');

            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }

        $maritalStatuses = $this->Employees->MaritalStatuses->find('list', ['limit' => 200]);
        $physicalPostures = $this->Employees->PhysicalPostures->find('list', ['limit' => 200]);
        $genders = $this->Employees->Genders->find('list', ['limit' => 200]);
        $banks = $this->Employees->Banks->find('list', ['limit' => 200]);
        $religions = $this->Employees->Religions->find('list', ['limit' => 200]);
        $locations = $this->Employees->Locals->find('list', ['limit' => 200]);
        $stateoforigins = $this->Employees->StateOfOrigins->find('list', ['limit' => 200]);
        $highestEducations = $this->Employees->HighestEducations->find('list', ['limit' => 200]);
        $serviceCharges = $this->Employees->ServiceCharges->find('list', ['limit' => 200]);
        $departments = $this->Employees->Departments->find('list', ['limit' => 200]);
        $grades = $this->Employees->Grades->find('list', ['limit' => 200]);
        $designations = $this->Employees->Designations->find('list', ['limit' => 200]);
        $branches = $this->Employees->Branches->find('list', ['limit' => 200]);
        $statuses = $this->Employees->Statuses->find('list', ['limit' => 200]);
        $cadres = $this->Employees->Cadres->find('list', ['limit' => 200]);

        $this->set(compact(
            'stateoforigins',
            'physicalPostures',
            'genders',
            'maritalStatuses',
            'religions',
            'highestEducations',
            'locations',
            'branches',
            'employee',
            'banks',
            'serviceCharges',
            'departments',
            'grades',
            'designations',
            'statuses',
            'cadres'
        ));
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function ajax()
    {

        $this->autoRender = false;
        $stateId = $this->request->getData('data');

        $locals = $this->Employees->Locals->find()->where(['Locals.state_id' => $stateId])->toArray();

        $json_data = json_encode($locals);
        $response = $this->response->withType('json')->withStringBody($json_data);
        return $response;
    }

    public function edit($id = null)
    {

        //debug($this->Auth->user('role_id'));

        $employee = $this->Employees->get($id, [
            'contain' => ['NextOfKins', 'WorkDetails', 'Educations', 'ChildrenDetails', 'Addresses', 'OtherDepartments.Departments']
        ]);

        $childCount         = count($employee->children_details) ? count($employee->children_details) : 0;
        $nextOfKinCount     = count($employee->next_of_kins) ? count($employee->next_of_kins) : 1;
        $educationCount     = count($employee->educations) ? count($employee->educations) : 1;
        $workCount          = count($employee->work_details) ? count($employee->work_details) : 1;
        $addressCount       = count($employee->addresses) ? count($employee->addresses) : 1;
        $otherDepartmentCount = count($employee->other_departments) ? count($employee->other_departments) : 1;

        if ($this->request->is('post') && $this->request->getData('educationCount')) {
            $educationCount = $this->request->getData('educationCount');
            //debug($this->request->getData());
            //exit;
        }
        if ($this->request->is('post') && $this->request->getData('workCount')) {
            $workCount = $this->request->getData('workCount');
            //debug($this->request->getData());s
            //exit;
        }
        if ($this->request->is('post') && $this->request->getData('childCount')) {
            $childCount = $this->request->getData('childCount');
            //debug($this->request->getData());s
            //exit;
        }
        if ($this->request->is('post') && $this->request->getData('addressCount')) {
            $addressCount = $this->request->getData('addressCount');
            //debug($this->request->getData());s
            //exit;
        }

        //debug(count($employee->children_details));
        if ($this->request->is(['patch', 'post', 'put']) && !$this->request->getData('workCount') && !$this->request->getData('childCount') && !$this->request->getData('educationCount')) {
            //debug($this->request->getData()); exit;
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'view', $employee->id]);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }

        $maritalStatuses = $this->Employees->MaritalStatuses->find('list', ['limit' => 200]);
        $physicalPostures = $this->Employees->PhysicalPostures->find('list', ['limit' => 200]);
        $genders = $this->Employees->Genders->find('list', ['limit' => 200]);
        $banks = $this->Employees->Banks->find('list', ['limit' => 200]);
        $religions = $this->Employees->Religions->find('list', ['limit' => 200]);
        $locals = $this->Employees->Locals->find('list')->where(['Locals.state_id' => $employee->state_of_origin_id]);
        $stateoforigins = $this->Employees->StateOfOrigins->find('list', ['limit' => 200]);
        $highestEducations = $this->Employees->HighestEducations->find('list', ['limit' => 200]);
        $serviceCharges = $this->Employees->ServiceCharges->find('list', ['limit' => 200]);
        $departments = $this->Employees->Departments->find('list', ['limit' => 200]);
        $grades = $this->Employees->Grades->find('list', ['limit' => 200]);
        $designations = $this->Employees->Designations->find('list', ['limit' => 200]);
        $branches = $this->Employees->Branches->find('list', ['limit' => 200]);
        $statuses = $this->Employees->Statuses->find('list', ['limit' => 200]);
        $cadres = $this->Employees->Cadres->find('list', ['limit' => 200]);
        $relationships = $this->Employees->NextOfKins->Relationships->find('list', ['limit' => 200]);
        $addressTypes = $this->Employees->Addresses->AddressTypes->find('list', ['limit' => 200]);
        $users = $this->Employees->Users->find('list', ['limit' => 200]);
        $viewVars = [
            'stateoforigins',
            'physicalPostures',
            'genders',
            'maritalStatuses',
            'users',
            'religions',
            'highestEducations',
            'locals',
            'branches',
            'employee',
            'banks',
            'serviceCharges',
            'departments',
            'grades',
            'designations',
            'statuses',
            'cadres',
            'relationships',
            'addressTypes',
            'childCount',
            'nextOfKinCount',
            'educationCount',
            'workCount',
            'addressCount',
            'otherDepartmentCount'
        ];
        $this->set(compact($viewVars));
        if ($this->request->is('ajax')) {
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([$viewVars]));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employee = $this->Employees->get($id);
        if ($this->Employees->delete($employee)) {
            $this->Flash->success(__('The employee has been deleted.'));
        } else {
            $this->Flash->error(__('The employee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function change($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employee = $this->Employees->get($id);

        debug($employee);

        //return $this->redirect(['action' => 'index']);
    }
}
