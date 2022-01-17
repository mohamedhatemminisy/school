<?php

namespace Tests\Unit;

use Tests\TestCase;

class DatabaseTest extends TestCase
{
    /**
     * Check if student exist in db
     *
     * @return void
     */
    public function test_student_exist()
    {
        $this->assertDatabaseHas('users',[
            'name' => 'fpKtenzRDq'
        ]);
    }

    /**
     * Check if student no exist in db
     *
     * @return void
     */
    public function test_student_not_exist()
    {
        $this->assertDatabaseHas('users',[
            'name' => 'fpKtenzRDqww'
        ]);
    }

}
