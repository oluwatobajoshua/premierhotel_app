<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Leaves Model
 *
 * @property \App\Model\Table\EmployeesTable&\Cake\ORM\Association\BelongsTo $Employees
 * @property \App\Model\Table\StatusesTable&\Cake\ORM\Association\BelongsTo $Statuses
 *
 * @method \App\Model\Entity\Leave get($primaryKey, $options = [])
 * @method \App\Model\Entity\Leave newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Leave[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Leave|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Leave saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Leave patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Leave[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Leave findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LeavesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('leaves');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Employees', [
            'foreignKey' => 'employee_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Statuses', [
            'foreignKey' => 'status_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('LeaveTypes', [
            'foreignKey' => 'leave_type_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('days_entitled')
            ->requirePresence('days_entitled', 'create')
            ->notEmptyString('days_entitled');

        $validator
            ->integer('previous_outstanding')
            ->requirePresence('previous_outstanding', 'create')
            ->notEmptyString('previous_outstanding');

        $validator
            ->integer('days_requested')
            ->requirePresence('days_requested', 'create')
            ->notEmptyString('days_requested');

        $validator
            ->integer('outstanding_days')
            ->requirePresence('outstanding_days', 'create')
            ->notEmptyString('outstanding_days');

        $validator
            ->dateTime('commencement_date')
            ->requirePresence('commencement_date', 'create')
            ->notEmptyDateTime('commencement_date');

        $validator
            ->integer('staff_signature')
            ->allowEmptyString('staff_signature');

        $validator
            ->integer('relieving_officer')
            ->requirePresence('relieving_officer', 'create')
            ->notEmptyString('relieving_officer');

        $validator
            ->integer('hou_comments')
            ->requirePresence('hou_comments', 'create')
            ->notEmptyString('hou_comments');

        $validator
            ->integer('hod_comments')
            ->requirePresence('hod_comments', 'create')
            ->notEmptyString('hod_comments');

        $validator
            ->integer('hrm_comments')
            ->requirePresence('hrm_comments', 'create')
            ->notEmptyString('hrm_comments');

        $validator
            ->integer('md_comments')
            ->requirePresence('md_comments', 'create')
            ->notEmptyString('md_comments');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['employee_id'], 'Employees'));
        $rules->add($rules->existsIn(['status_id'], 'Statuses'));

        return $rules;
    }
}