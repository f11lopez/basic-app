<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
// use Illuminate\Support\Facades\DB;
// use Faker\Factory as Faker;
// use DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create();

        // $categories = [];

        // foreach (range(1, 5) as $index) {
        //     $categories[] = [
        //         'name' => $faker->text(20),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ];
        // }

        //DB::table('categories')->insert($categories);

        $categories = Category::factory()->count(8)->create();
    }
}
