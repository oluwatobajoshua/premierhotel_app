<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Education Entity
 *
 * @property int $id
 * @property int $employee_id
 * @property string $institution
 * @property int $highest_education_id
 * @property string $course_of_study
 * @property \Cake\I18n\FrozenDate $date
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\HighestEducation $highest_education
 */
class Education extends Entity
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
        'institution' => true,
        'highest_education_id' => true,
        'course_of_study' => true,
        'date' => true,
        'created' => true,
        'modified' => true,
        'employee' => true,
        'highest_education' => true
    ];
}
