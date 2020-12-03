<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'title' => 'Thien Tran',
                'content' => 'thientran98qb@email.com',
                'slug' => bcrypt('Thien123'),
                'status'=>1,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime,
            ]
        ]);
    }
}
