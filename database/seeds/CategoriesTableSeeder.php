<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Cafe',
            ], [
                'name' => 'Trà',
            ], [
                'name' => 'Sinh Tố',
            ], [
                'name' => 'Soda - Mojito',
            ],
        ];

        DB::table('categories')->insert($data);
    }
}
