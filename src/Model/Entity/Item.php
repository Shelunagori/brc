<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity
 *
 * @property int $id
 * @property int $item_sub_category_id
 * @property string $name
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int $created_by
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\ItemSubCategory $item_sub_category
 */
class Item extends Entity
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
        'item_sub_category_id' => true,
        'name' => true,
        'created_on' => true,
        'created_by' => true,
        'is_deleted' => true,
        'item_sub_category' => true
    ];
}
