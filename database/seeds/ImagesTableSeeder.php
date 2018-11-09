<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
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
                'name' => '1.jpg',
                'product_id' => 1,
            ], [
                'name' => '2.jpg',
                'product_id' => 5,
            ], [
                'name' => '4.jpg',
                'product_id' => 2,
            ], [
                'name' => '5.jpg',
                'product_id' => 4,
            ], [
                'name' => '11.jpg',
                'product_id' => 2,
            ], [
                'name' => '12.jpg',
                'product_id' => 3,
            ] ,[
                'name' => '9.jpg',
                'product_id' => 6,
            ], [
                'name' => '8.jpg',
                'product_id' => 2,
            ], [
                'name' => '3.jpg',
                'product_id' => 1,
            ], [
                'name' => '6.jpg',
                'product_id' => 3,
            ]
        ];

        DB::table('images')->insert($data);
    }
}
