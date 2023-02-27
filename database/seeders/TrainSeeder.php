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
            $train->departure_time = $faker->time();
            $train->arrival_time = $faker->time();
            $train->train_code = $faker->numberBetween(1, 100);
            $train->number_of_carriages = $faker->numberBetween(1, 10);
            $train->on_time = $faker->boolean();
            $train->is_cancelled = $faker->boolean();


            $train->save();
        }



        $new_train = new Train();


        $new_train->company = 'CICCIO';
        $new_train->departure_station = 'CICCIO';
        $new_train->arrival_station = 'ciccio';
        $new_train->departure_time = '2023-02-27 10:45:00';
        $new_train->arrival_time = '2023-02-27 10:45:00';
        $new_train->train_code = '54';
        $new_train->number_of_carriages = 5;
        $new_train->on_time = true;
        $new_train->is_cancelled = false;


        // salvo su db
        $new_train->save();
    }
}
