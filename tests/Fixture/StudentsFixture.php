<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StudentsFixture
 */
class StudentsFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'matrix_number' => 'Lorem ip',
                'faculty' => 'Lorem ipsum dolor sit amet',
                'program' => 'Lorem ipsum dolor sit amet',
                'semester' => 1,
                'status' => 1,
                'created' => '2025-07-19 21:47:15',
                'modified' => '2025-07-19 21:47:15',
            ],
        ];
        parent::init();
    }
}
