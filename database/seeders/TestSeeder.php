<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Test;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TestSeeder extends Seeder
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
            $test = array(
                'name' => Str::random(10),
                'order_id' => Order::all()->random()->id,
            );
            Test::insert( $test );
            $test=null;
        }
    }
}
