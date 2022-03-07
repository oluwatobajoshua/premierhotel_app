<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * NextOfKin Entity
 *
 * @property int $id
 * @property int $employee_id
 * @property string $name
 * @property int $relationship_id
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\Relationship $relationship
 */
class NextOfKin extends Entity
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
        'name' => true,
        'relationship_id' => true,
        'address' => true,
        'phone' => true,
        'email' => true,
        'created' => true,
        'modified' => true,
        'employee' => true,
        'relationship' => true
    ];
}
