<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\I18n\Date;


/**
 * Reports Controller
 *
 * @property \App\Model\Table\ReportsTable $Reports
 *
 * @method \App\Model\Entity\Report[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReportsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Departments');
        $this->loadModel('Companies');
        $this->loadModel('Cadres');
        $this->loadModel('Banks');
        $this->loadModel('Employees');
    }

    /**
     * payrollRegister method
     *
     * @return \Cake\Http\Response|null
     */
    public function bioData()
    {        
        $dlist  = $this->Departments->find();
        $branches  = $this->Companies->Branches->find()->toList();
        $department_id = 1; 
        $cName = '';
        $bName = '';

        if($this->request->is('post')  &&  $this->request->getData('department') &&  $this->request->getData('branch'))
        {
            //get using id
            $department_id = $this->request->getData('department');  
            $dlist  = $this->Departments->find()->where(['Departments.id' => $department_id]);
            $dlist->contain([
                'Employees' => [
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $branch = $this->request->getData('branch');
                        return $q->order(['Employees.staff_no' => 'ASC'])
                        ->where(['Employees.branch_id' => $branch])
                        ->contain(['Transactions'=>[
                        'strategy' => 'subquery',
                        'queryBuilder' => function ($q) {
                            $company = $this->Companies->get(1);
                            //debug($cad);
                            return $q->where(['Transactions.date' => new Time($company->date)])
                            ->contain('Employees.Grades');                    
                        }]]);                                        
                    }
                ]
            ]);

        }

        if($this->request->is('post')  &&  $this->request->getData('branch'))
        {
            //get using id
            $bName = $this->Companies->Branches->get($this->request->getData('branch'));
            $this->set(compact('cName','bName'));
            $branch = $this->request->getData('branch');  
            $dlist->contain([
                'Employees' => [
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $cadre = $this->request->getData('cadres');
                        $branch = $this->request->getData('branch');
                        return $q->order(['Employees.staff_no' => 'ASC'])
                        ->where(['Employees.branch_id' => $branch])
                        ->contain(['Transactions'=>[
                        'strategy' => 'subquery',
                        'queryBuilder' => function ($q) {
                            $company = $this->Companies->get(1);
                            //debug($cad);
                            return $q->where(['Transactions.date' => new Time($company->date)])
                            ->contain('Employees.Grades');                    
                        }]]);                                        
                    }
                ]
            ]);
        }

        if($this->request->is('post')  &&  $this->request->getData('cadres') &&  $this->request->getData('branch'))
        {
            //get using id
            $cName = $this->Cadres->get($this->request->getData('cadres'));
            $bName = $this->Companies->Branches->get($this->request->getData('branch'));
            $this->set(compact('cName','bName'));
            
            $dlist = $dlist->contain([
                'Employees' => [
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $cadre = $this->request->getData('cadres');
                        $branch = $this->request->getData('branch');
                        return $q->order(['Employees.staff_no' => 'ASC'])->where(['Employees.cadre_id' => $cadre])
                        ->where(['Employees.branch_id' => $branch])
                        ->contain(['Transactions'=>[
                        'strategy' => 'subquery',
                        'queryBuilder' => function ($q) {
                            $company = $this->Companies->get(1);
                            //debug($cad);
                            return $q->where(['Transactions.date' => new Time($company->date)])
                            ->contain('Employees.Grades');                    
                        }]]);                                        
                    }
                ]
            ]);

        }

        if($this->request->is('post')  &&  $this->request->getData('cadres'))
        {
            //get using id
            $cName = $this->Cadres->get($this->request->getData('cadres'));
            $this->set(compact('cName','bName'));
            
            $dlist = $dlist->contain([
                'Employees' => [
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $cadre = $this->request->getData('cadres');
                        return $q->order(['Employees.staff_no' => 'ASC'])->where(['Employees.cadre_id' => $cadre]);                                                              
                    }
                ]
            ]);

        }

        $departments = $dlist->contain([
            'Employees' => [
                'strategy' => 'subquery',
                'queryBuilder' => function ($q) {
                    $company = $this->Companies->get(1);
                    return $q->order(['Employees.staff_no' => 'ASC'])
                    ->contain([
                        'Grades',
                        'NextOfKins.Relationships',
                        'Genders',
                        'StateOfOrigins',
                        'Locals',
                        'Designations',
                        'Cadres',
                        'MaritalStatuses',
                        'Religions',
                        'HighestEducations',
                        'WorkDetails', 'Educations', 'ChildrenDetails', 'OtherDepartments.Departments'

                    ]);                                        
                }
            ]
        ]);

        $company = $this->Companies->get(1);
        $depts = $this->Departments->find('list', ['limit' => 200]);
        $cadres = $this->Cadres->find('list', ['limit' => 200]);
        $branches = $this->Companies->Branches->find('list', ['limit' => 200]);

        $this->set(compact('departments','company','depts','cadres','branches','cName','bName'));
    }
    
    /**
     * payrollRegister method
     *
     * @return \Cake\Http\Response|null
     */
    public function payrollRegister()
    {        
        $dlist  = $this->Departments->find();
        $branches  = $this->Companies->Branches->find()->toList();
        $department_id = 1; 
        $cName = '';
        $bName = '';

        if($this->request->is('post')  &&  $this->request->getData('id') &&  $this->request->getData('branch'))
        {
            //get using id
            $department_id = $this->request->getData('id');  
            $dlist  = $this->Departments->find()->where(['Departments.id' => $department_id]);
            $dlist->contain([
                'Employees' => [
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $branch = $this->request->getData('branch');
                        return $q->order(['Employees.staff_no' => 'ASC'])
                        ->where(['Employees.branch_id' => $branch])
                        ->contain(['Transactions'=>[
                        'strategy' => 'subquery',
                        'queryBuilder' => function ($q) {
                            $company = $this->Companies->get(1);
                            //debug($cad);
                            return $q->where(['Transactions.date' => new Time($company->date)])
                            ->contain('Employees.Grades');                    
                        }]]);                                        
                    }
                ]
            ]);

        }

        if($this->request->is('post')  &&  $this->request->getData('branch'))
        {
            //get using id
            $bName = $this->Companies->Branches->get($this->request->getData('branch'));
            $this->set(compact('cName','bName'));
            $branch = $this->request->getData('branch');  
            $dlist->contain([
                'Employees' => [
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $cadre = $this->request->getData('cadres');
                        $branch = $this->request->getData('branch');
                        return $q->order(['Employees.staff_no' => 'ASC'])
                        ->where(['Employees.branch_id' => $branch])
                        ->contain(['Transactions'=>[
                        'strategy' => 'subquery',
                        'queryBuilder' => function ($q) {
                            $company = $this->Companies->get(1);
                            //debug($cad);
                            return $q->where(['Transactions.date' => new Time($company->date)])
                            ->contain('Employees.Grades');                    
                        }]]);                                        
                    }
                ]
            ]);
        }

        if($this->request->is('post')  &&  $this->request->getData('cadres') &&  $this->request->getData('branch'))
        {
            //get using id
            $cName = $this->Cadres->get($this->request->getData('cadres'));
            $bName = $this->Companies->Branches->get($this->request->getData('branch'));
            $this->set(compact('cName','bName'));
            
            $dlist = $dlist->contain([
                'Employees' => [
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $cadre = $this->request->getData('cadres');
                        $branch = $this->request->getData('branch');
                        return $q->order(['Employees.staff_no' => 'ASC'])->where(['Employees.cadre_id' => $cadre])
                        ->where(['Employees.branch_id' => $branch])
                        ->contain(['Transactions'=>[
                        'strategy' => 'subquery',
                        'queryBuilder' => function ($q) {
                            $company = $this->Companies->get(1);
                            //debug($cad);
                            return $q->where(['Transactions.date' => new Time($company->date)])
                            ->contain('Employees.Grades');                    
                        }]]);                                        
                    }
                ]
            ]);

        }

        $departments = $dlist->contain([
            'Employees' => [
                'strategy' => 'subquery',
                'queryBuilder' => function ($q) {
                    $company = $this->Companies->get(1);
                    return $q->order(['Employees.staff_no' => 'ASC'])
                    ->contain(['Transactions'=>[
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $company = $this->Companies->get(1);
                        return $q->where(['Transactions.date' => new Time($company->date)])
                        ->contain('Employees.Grades');                    
                    }]]);                                        
                }
            ]
        ]);

        $company = $this->Companies->get(1);

        $depts = $this->Departments->find('list', ['limit' => 200]);
        $cadres = $this->Cadres->find('list', ['limit' => 200]);
        $branches = $this->Companies->Branches->find('list', ['limit' => 200]);

        $this->set(compact('departments','company','depts','cadres','branches','cName','bName'));
    }


    /**
     * payrollRegister method
     *
     * @return \Cake\Http\Response|null
     */
    public function endOfYearBonus()
    {
        $departments = $this->Departments->find()->contain([
            'Employees' => [
                'strategy' => 'subquery',
                'queryBuilder' => function ($q) {
                    return $q->order(['Employees.staff_no' => 'ASC'])
                    ->contain(['Transactions'=>[
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $company = $this->Companies->get(1);
                        return $q->where(['Transactions.date' => new Time($company->date)])
                        ->contain('Employees.Grades');
                    
                        }]
                    ])
                    ->contain('Banks');                                        
                }
            ]
        ]);

        $company = $this->Companies->get(1);

        $this->set(compact('departments','company'));
    }


    /**
     * payrollRegister method
     *
     * @return \Cake\Http\Response|null
     */
    public function employeePayAdvice()
    {      

        $gpa = 1;

        $spa = 1;

        $dlist  = $this->Departments->find();

        $department_id = null; 

        if($this->request->is('post')  &&  $this->request->getData('department'))
        {
            //get using id
            $department_id = $this->request->getData('department'); 
            
            //get general pay advice checkbox value
            $gpa = $this->request->getData('gpa'); 

            //get service charge checkbox value
            $spa = $this->request->getData('spa'); 
            
            $dlist  = $this->Departments->find()->where(['Departments.id' => $department_id]);
        }
        if($this->request->is('post')  &&  $this->request->getData('employee'))
        {
            //get using id
            $department_id = 0; 

            //get general pay advice checkbox value
            $gpa = $this->request->getData('gpa'); 

            //get service charge checkbox value
            $spa = $this->request->getData('spa'); 

            $dlist  = $this->Departments->find()->contain([
                'Employees' => [
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $employee_id = $this->request->getData('employee');              
                        $emp = $this->Employees->get($employee_id);
                        return $q->where(['Employees.id' => $emp->id]);                                                                                   
                    }]
            ]);
            //debug($employee_id);
        }

        $departments = $dlist->contain([
            'Employees' => [
                'strategy' => 'subquery',
                'queryBuilder' => function ($q) {
                    $company = $this->Companies->get(1);
                    return $q->order(['Employees.staff_no' => 'ASC'])
                    ->contain(['Transactions'=>[
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $company = $this->Companies->get(1);
                        return $q->where(['Transactions.date' => new Time($company->date)])
                        ->contain('Employees.Grades')
                        ->contain('Employees.Cadres')
                        ->contain('Employees.Banks');                    
                    }]]);                                        
                }
            ]
        ]);

        $company = $this->Companies->get(1);
        $depts = $this->Departments->find('list', ['limit' => 200]);
        $employees = $this->Employees->find('list')
        ->contain(['Transactions'=>[
            'strategy' => 'subquery',
            'queryBuilder' => function ($q) {
                $company = $this->Companies->get(1);
                return $q->where(['Transactions.date' => new Time($company->date)]);                    
            }]]);
        $this->set(compact('departments','company','depts','employees','gpa','spa'));
    }

    /**
     * bankLetter method
     *
     * @return \Cake\Http\Response|null
     */
    public function bankLetter()
    {

        $banks  = $this->Banks->find();

        $bank_id = 1; 

        if($this->request->is('post')  &&  $this->request->getData('bank'))
        {
            //get using id
            $bank_id = $this->request->getData('bank');  
            $banks  = $this->Banks->find()->where(['Banks.id' => $bank_id]);
        }

        $company = $this->Companies->get(1,[
            'contain' => ['Employees']]);

        $bankList = $this->Banks->find('list', ['limit' => 200]);

        $this->set(compact('banks','company','bankList'));
    }

    /**
     * staff-List method
     *
     * @return \Cake\Http\Response|null
     */
    public function staffList()
    {      

        $bank  = $this->Banks->find();

        $bank_id = null; 
        $cadre_id = null;

        if($this->request->is('post')  &&  $this->request->getData('bank'))
        {
            //get using id
            $bank_id = $this->request->getData('bank');
            $cadre_id = $this->request->getData('cadre');  
            $bank  = $this->Banks->find()->where(['Banks.id' => $bank_id]);
            $cadre  = $this->Banks->Employees->Cadres->find()->where(['Cadres.id' => $cadre_id]);

        }

        $banks = $bank->contain([
            'Employees' => [
                'strategy' => 'subquery',
                'queryBuilder' => function ($q) {
                    return $q->order(['Employees.staff_no' => 'ASC'])
                    ->contain(['Transactions'=>[
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $company = $this->Companies->get(1);
                        return $q->where(['Transactions.date' => new Time($company->date)])
                        ->contain('Employees.Grades');                    
                    }]]);                                        
                }
            ]
        ]);

        $company = $this->Companies->get(1);

        $bankList = $this->Banks->find('list', ['limit' => 200]);
        $cadreList = $this->Banks->Employees->Cadres->find('list', ['limit' => 200]);

        $this->set(compact('banks','company','bankList','cadreList'));
    }

    /**
     * staffListIleyaXmas
     *
     * @return \Cake\Http\Response|null
     */
    public function staffListIleyaXmas()
    {
        //using the same function as staff list but different template
        return $this->staffList();

    }


    /**
     * staffListBonus
     *
     * @return \Cake\Http\Response|null
     */
    public function staffListBonus()
    {
        //using the same function as staff list but different template
        return $this->staffList();

    }


    /**
     * cashPayment
     *
     * @return \Cake\Http\Response|null
     */
    public function cashPayment()
    {
        //using the same function as staff list but different template
        return $this->endOfYearBonus();

    }

    /**
     * generalSummary
     *
     * @return \Cake\Http\Response|null
     */
    public function generalSummary()
    {
        //using the same function as staff list but different template
        return $this->payrollRegister();

    }

    /**
     * individualSummary
     *
     * @return \Cake\Http\Response|null
     */
    public function individualSummary()
    {
        //using the same function as staff list but different template
        return $this->payrollRegister();

    }

    /**
     * individual Pay Record
     *
     * @return \Cake\Http\Response|null
     */
    public function individualPayRecord()
    {
        //using the same function as staff list but different template
        return $this->payrollRegister();

    }


    /**
     * Service Charge General-staff 
     *
     * @return \Cake\Http\Response|null
     */
    public function generalStaff()
    {
        //using the same function as staff list but different template
        return $this->payrollRegister();

    }

    /**
     * Tax Schedule
     *
     * @return \Cake\Http\Response|null
     */
    public function taxSchedule()
    {
        //using the same function as staff list but different template
        return $this->payrollRegister();

    }

    /**
     * Deduction Schedule
     *
     * @return \Cake\Http\Response|null
     */
    public function deductionSchedule()
    {
        //using the same function as staff list but different template
        return $this->payrollRegister();

    }

    /**
     * Deduction Schedule
     *
     * @return \Cake\Http\Response|null
     */
    public function allowanceSchedule()
    {
        //using the same function as staff list but different template
        return $this->payrollRegister();

    }

    /**
     * Deduction Schedule
     *
     * @return \Cake\Http\Response|null
     */
    public function staffPerAnnum()
    {
        //using the same function as staff list but different template
        return $this->payrollRegister();

    }
    
}