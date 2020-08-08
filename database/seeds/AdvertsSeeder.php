<?php

use Faker\Factory;
use App\Advert;
use Illuminate\Database\Seeder;

class AdvertsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 32; $i++)
        {
            $table = new Advert();
            $table->category_id = $faker->numberBetween(1,10);
            $table->title = $faker->realText(30);
            $table->description = $faker->realText();
            $table->price = $faker->numberBetween(10,10000);
            $table->save();
        }
    }
}
