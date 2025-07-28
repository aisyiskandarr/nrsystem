<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ReservationsFixture
 */
class ReservationsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'students_id' => 1,
                'houses_id' => 1,
                'reservation_date' => '2025-07-18',
                'start_date' => '2025-07-18',
                'end_date' => '2025-07-18',
                'contact' => 'Lorem ipsum d',
                'nric' => 'Lorem ipsum dolor sit amet',
                'studentcard' => 'Lorem ipsum dolor sit amet',
                'studentcard_dir' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'created' => '2025-07-18 19:56:53',
                'modified' => '2025-07-18 19:56:53',
            ],
        ];
        parent::init();
    }
}
