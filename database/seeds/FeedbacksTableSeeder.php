<?php

use Illuminate\Database\Seeder;

class FeedbacksTableSeeder extends Seeder
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
                'user_id' => 1,
                'product_id' => 1,
                'content' => 'Tuyệt vời',
                'status' => 0,
            ],
        ];

        DB::table('feedbacks')->insert($data);
    }
}
