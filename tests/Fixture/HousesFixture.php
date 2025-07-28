<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HousesFixture
 */
class HousesFixture extends TestFixture
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
                'users_id' => 1,
                'owner' => 'Lorem ipsum dolor sit amet',
                'housing_area' => 'Lorem ipsum dolor sit amet',
                'image' => 'Lorem ipsum dolor sit amet',
                'image_dir' => 'Lorem ipsum dolor sit amet',
                'address' => 'Lorem ipsum dolor sit amet',
                'rental_price' => 'Lorem ipsum dolor sit amet',
                'deposit' => 'Lorem ipsum dolor sit amet',
                'room_number' => 'Lorem ipsum dolor ',
                'capacity' => 1,
                'amount_person' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet',
                'contact' => 'Lorem ipsum d',
                'availability' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'created' => '2025-07-19 18:01:03',
                'modified' => '2025-07-19 18:01:03',
            ],
        ];
        parent::init();
    }
}
