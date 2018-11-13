<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
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
        		'name' => 'Trà sữa trân châu trắng',
        		'price' => 12345,
        		'description' => 'Trà sữa trân châu thường có 2 loại là trân châu đen và trân châu trắng.',
        		'category_id' => 4,
                'quantity' => 100,
        	], [
                'name' => 'Trà sữa Oreo Cake Cream',
                'price' => 312312,
                'description' => 'Trà sữa Oreo Cake Cream về cơ bản là trà sữa thông thường, tuy nhiên không dùng bột pha trực tiếp, tạo nên vị trà thơm',
                'category_id' => 1,
                'quantity' => 80,
            ], [
                'name' => 'Trà sữa trân châu đường đen',
                'price' => 123,
                'description' => 'Trà sữa trân châu đường đen là loại thức uống “lên ngôi” vào hè 2018 với giới trẻ cả 2 miền Bắc, Nam',
                'category_id' => 3,
                'quantity' => 12,
            ], [
                'name' => 'Trà xoài kem cheese',
                'price' => 123213,
                'description' => 'Trà xoài kem cheese được làm từ trà, xoài tươi cùng với phần kem cheese, tạo nên loại thức uống độc đáo có vị thơm đặc trưng của xoài',
                'category_id' => 2,
                'quantity' => 43,
            ], [
                'name' => 'Trà sữa khoai môn',
                'price' => 4234324,
                'description' => 'Trà sữa khoai môn tuy không phải là thức uống mới nhưng nó vẫn giữ được độ hot với giới trẻ, đặc biệt là vào các khoảng thời gian hè nắng nóng',
                'category_id' => 4,
                'quantity' => 23,
            ], [
                'name' => 'Trà sữa matcha đậu đỏ',
                'price' => 12312,
                'description' => 'Là thức uống quá quen thuộc và phổ biến thì trà sữa matcha đậu đỏ lại là sản phẩm mới, thích hợp giải nhiệt dành cho mùa hè nắng nóng.',
                'category_id' => 1,
                'quantity' => 76,
            ],
        ];

        DB::table('products')->insert($data);
    }
}
