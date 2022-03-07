<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OtherDepartment Entity
 *
 * @property int $id
 * @property int $employee_id
 * @property int|null $department_id
 * @property string|null $comment
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\Department $department
 */
class OtherDepartment extends Entity
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
        'department_id' => true,
        'comment' => true,
        'created' => true,
        'modified' => true,
        'employee' => true,
        'department' => true
    ];
}
