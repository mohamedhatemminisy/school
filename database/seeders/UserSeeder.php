<?php

namespace Database\Seeders;

use App\Models\School;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $no_of_rows = 50;
        for( $i=0; $i < $no_of_rows; $i++ ){
            $user = array(
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'password'  => bcrypt('12345678'),
                'school_id' => School::all()->random()->id,
            );
            User::insert( $user );
            $user=null;
        }
    }
}
