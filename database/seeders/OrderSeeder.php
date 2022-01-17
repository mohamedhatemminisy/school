<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\School;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
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
            $order = array(
                'name' => Str::random(10),
                'status' => 'pending',
                'school_id' => School::all()->random()->id,
            );
            Order::insert( $order );
            $order=null;
        }
    }
}
