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
        DB::table('users')->insert([
            ['name' => 'スネ夫',
            'email' => 'user1@example.com',
            'sex' => '0',
            'self_introduction' => 'スネ夫です',
            'img_name' => 'sample001.jpg',
            'password' => Hash::make('password123'),
            ],
            ['name' => '出木杉',
            'email' => 'user2@example.com',
            'sex' => '1',
            'self_introduction' => '出木杉です',
            'img_name' => 'sample002.jpg',
            'password' => Hash::make('password123'),
            ],
            ['name' => 'さくらももこ',
            'email' => 'user3@example.com',
            'sex' => '0',
            'self_introduction' => 'さくらももこです',
            'img_name' => 'sample003.jpg',
            'password' => Hash::make('password123'),
            ],
            ['name' => 'たまちゃん',
            'email' => 'user4@example.com',
            'sex' => '0',
            'self_introduction' => 'たまちゃんです',
            'img_name' => 'sample004.jpg',
            'password' => Hash::make('password123'),
            ],
        ]);
    }
}
