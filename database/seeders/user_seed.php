<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


use Illuminate\Support\Facades\DB;

class user_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name'=>'zeynep',
            'last_name'=>'çelik',
            'birth_place'=>'çorum',
            'birth_date'=>'2000-02-14'
        ]);
    }
}
