<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Leave Entity
 *
 * @property int $id
 * @property int $employee_id
 * @property int $days_entitled
 * @property int $previous_outstanding
 * @property int $days_requested
 * @property int $outstanding_days
 * @property \Cake\I18n\FrozenTime $commencement_date
 * @property int|null $staff_signature
 * @property int $relieving_officer
 * @property int $hou_comments
 * @property int $hod_comments
 * @property int $hrm_comments
 * @property int $md_comments
 * @property int $status_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\Status $status
 */
class Leave extends Entity
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
        'days_entitled' => true,
        'previous_outstanding' => true,
        'days_requested' => true,
        'outstanding_days' => true,
        'commencement_date' => true,
        'staff_signature' => true,
        'relieving_officer' => true,
        'hou_comments' => true,
        'hod_comments' => true,
        'hrm_comments' => true,
        'md_comments' => true,
        'status_id' => true,
        'created' => true,
        'modified' => true,
        'employee' => true,
        'status' => true
    ];
}
