<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Неизвестный пользователь',
                'email' => 'unknowuser@1.ru',
                'password' => bcrypt(Str::random(16))
            ],[
                'name' => 'Автор',
                'email' => 'author1@1.ru',
                'password' => bcrypt('123123')
            ]
        ];

        DB::table('users')->insert($users);
    }
}
