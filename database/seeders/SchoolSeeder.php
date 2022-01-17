<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $no_of_rows = 5;
        for( $i=0; $i < $no_of_rows; $i++ ){
            $school = array(
                'name' => Str::random(10),
                'description' => Str::random(500),
            );
            School::insert( $school );
            $school=null;
        }
    }
}
