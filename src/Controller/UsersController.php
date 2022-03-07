<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
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
            //$userId = (int)$this->request->getParam('pass.0');

            if ($this->Users->isOwnedBy($user['id'])) {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);

                //redirect staff to their own view
                if ($user['role_id'] == 4 ) {
                    $employee = $this->Users->Employees->find()->where(['user_id' => $user['id']])->first();

                    //redirect staff to change their password
                    if (!$user['passwdIsValid'] ) {

                        return $this->redirect(['controller' => 'Users', 'action' => 'edit', $user['id']]);

                    }
                    return $this->redirect(['controller' => 'Employees', 'action' => 'view', $employee->id]);
                }
                return $this->redirect($this->Auth->redirectUrl());
                $this->Flash->success('You are logged in');
            }
            $this->Flash->error('Your username or password is wrong.');
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles'],
            'limit' => 50
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Employees', 'Grades', 'Profiles']
        ]);

        $this->set('user', $user);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The {0} has been saved.', 'User'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'User'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }


    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Employees']
        ]);

        //debug($user);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            //is password is 123
            if($this->request->getData('password') == 123){
                
                $this->Flash->error(__('123 is not a valid password'));
                return $this->redirect(['action' => 'edit', $user->id]);

            }

            $user->passwdIsValid = true;

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The {0} has been saved.', 'User'));

                if($user->role_id == 4){

                    return $this->redirect(['controller' => 'Employees', 'action' => 'view', $user->employees[0]->id]);

                }
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'User'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user','roles'));
    }


    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The {0} has been deleted.', 'User'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'User'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }

    public function addUsers()
    {
        $this->request->allowMethod(['post', 'delete']);

        
        $employees = $this->Users->Employees->find()->where(['cadre_id' => 5]);
        
        foreach ($employees as $employee) {

            $user = $this->Users->newEntity();

            //debug($employee->full_name);
            /**/
            $user->username = $employee->full_name;
            $user->role_id = 4;
            $user->password = 123;
            $user->raw_password = 123;

            if ($this->Users->save($user)) {
                $employee->user_id = $user->id;
                $this->Users->Employees->save($employee);
                $this->Flash->success(__('The {0} has been saved.', 'User'));

                //return $this->redirect(['action' => 'index']);
            }else{

                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'User'));

            }
            
            $this->Flash->success(__('All User has been added'));
            
        }
        return $this->redirect(['action' => 'index']);
    }

    
}
