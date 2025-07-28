<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reservation Entity
 *
 * @property int $id
 * @property int $students_id
 * @property int $houses_id
 * @property \Cake\I18n\Date $reservation_date
 * @property \Cake\I18n\Date $start_date
 * @property \Cake\I18n\Date $end_date
 * @property string $contact
 * @property string $nric
 * @property string $studentcard
 * @property string $studentcard_dir
 * @property int $status
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Student $student
 * @property \App\Model\Entity\House $house
 */
class Reservation extends Entity
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
        'students_id' => true,
        'houses_id' => true,
        'reservation_date' => true,
        'start_date' => true,
        'end_date' => true,
        'contact' => true,
        'nric' => true,
        'studentcard' => true,
        'studentcard_dir' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'student' => true,
        'house' => true,
    ];
}
