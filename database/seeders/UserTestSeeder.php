<?php

namespace Database\Seeders;

use App\Models\Test;
use App\Models\User;
use App\Models\UserTest;
use Illuminate\Database\Seeder;

class UserTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $no_of_rows = 20;
        for( $i=0; $i < $no_of_rows; $i++ ){
            $userTests = array(
                'user_id' => User::all()->random()->id,
                'test_id' => Test::all()->random()->id,
            );
            UserTest::insert( $userTests );
            $userTests=null;
        }
        
        //
    }
}
