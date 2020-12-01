<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Thien Tran',
                'email' => 'thientran98qb@email.com',
                'password' => bcrypt('Thien123'),
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime,
            ]
        ]);
    }
}
