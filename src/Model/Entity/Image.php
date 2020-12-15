<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Image Entity
 *
 * @property int $id
 * @property int $post_id
 * @property string $name
 * @property string $path
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\Post $post
 */
class Image extends Entity
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
        'post_id' => true,
        'name' => true,
        'path' => true,
        'created' => true,
        'post' => true,
    ];
}
