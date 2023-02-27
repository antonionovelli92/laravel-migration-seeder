<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;
use Faker\Generator as Faker;

class TrainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            $train = new Train();

            $train->company = $faker->company();
            $train->departure_station = $faker->city();
            $train->arrival_station = $faker->city();
            $train->departure_time =  $faker->dateTimeThisCentury->format('Y-m-d H:i:s');
            $train->arrival_time =  $faker->dateTimeThisCentury->format('Y-m-d H:i:s');


            // NUMERI UNICI PE RIL TRAIN CODE
            $unique = false;
            do {
                $train_code = $faker->numberBetween(1, 1000);
                $existing_train = Train::where('train_code', $train_code)->first();
                $unique = ($existing_train == null);
            } while (!$unique);

            $train->train_code = $train_code;

            $train->number_of_carriages = $faker->numberBetween(1, 10);
            $train->on_time = $faker->boolean();
            $train->is_cancelled = $faker->boolean();


            $train->save();
        }
    }
}
