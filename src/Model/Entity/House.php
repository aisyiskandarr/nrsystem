<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * House Entity
 *
 * @property int $id
 * @property int $users_id
 * @property string $owner
 * @property string $housing_area
 * @property string $image
 * @property string $image_dir
 * @property string $address
 * @property string $rental_price
 * @property string $deposit
 * @property string $room_number
 * @property int $capacity
 * @property string $amount_person
 * @property string $description
 * @property string $contact
 * @property string $availability
 * @property int $status
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class House extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'users_id' => true,
        'owner' => true,
        'housing_area' => true,
        'image' => true,
        'image_dir' => true,
        'address' => true,
        'rental_price' => true,
        'deposit' => true,
        'room_number' => true,
        'capacity' => true,
        'amount_person' => true,
        'description' => true,
        'contact' => true,
        'availability' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
    ];
}
