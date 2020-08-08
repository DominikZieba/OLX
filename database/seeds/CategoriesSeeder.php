<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ["Motoryzacja","Nieruchomości","Dom i ogród","Elektronika","Moda","Rolnictwo",
            "Zwierzęta","Dla dzieci","Sport i hobby","Muzyka i edukacja"];

        for ($i = 0; $i < 10; $i++)
        {
            $table = new Category();
            $table->name = $categories[$i];
            $table->save();
        }
    }
}
