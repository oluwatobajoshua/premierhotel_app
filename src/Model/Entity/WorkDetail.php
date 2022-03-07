<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * WorkDetail Entity
 *
 * @property int $id
 * @property int $employee_id
 * @property string $organization
 * @property string $department
 * @property string $job_title
 * @property string|null $job_class
 * @property \Cake\I18n\FrozenDate $start_date
 * @property \Cake\I18n\FrozenDate $end_date
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Employee $employee
 */
class WorkDetail extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'employee_id' => true,
        'organization' => true,
        'department' => true,
        'job_title' => true,
        'job_class' => true,
        'start_date' => true,
        'end_date' => true,
        'created' => true,
        'modified' => true,
        'employee' => true
    ];
}
