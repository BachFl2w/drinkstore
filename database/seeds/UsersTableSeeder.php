<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
                'name' => 'Nguyen Chi',
                'email' => 'nnchi1998@gmail.com',
                'phone' => str_random(10),
                'password' => bcrypt('123456'),
                'address' => strtolower(str_random(20)),
                'role_id' => 1,
            ],
            [
                'name' => 'Bach Nguyen',
                'email' => 'bach@gmail.com',
                'phone' => str_random(10),
                'password' => bcrypt('123456'),
                'address' => strtolower(str_random(20)),
                'role_id' => 1,
            ]
        ];

        for ($i = 0 ; $i < 2 ; $i++) {
            $user = [
                'name' => str_random(6),
                'phone' => str_random(10),
                'email' => strtolower(str_random(6)) . '@gmail.com',
                'password' => bcrypt('123456'),
                'address' => strtolower(str_random(20)),
                'role_id' => rand(2,3),
            ];

            $data[] = $user;
        }

        DB::table('users')->insert($data);
    }
}
