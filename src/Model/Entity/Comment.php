<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Comment Entity
 *
 * @property int $id
 * @property string $body
 * @property int $comment_from
 * @property int $comment_to
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $operation_id
 * @property int $comment_reply_to
 *
 * @property \App\Model\Entity\Operation $operation
 */
class Comment extends Entity
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
        'body' => true,
        'comment_from' => true,
        'comment_to' => true,
        'created' => true,
        'modified' => true,
        'operation_id' => true,
        'comment_reply_to' => true,
        'operation' => true
    ];
}
