<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTypeTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_types')->insert([
            'id' => 1,
            'name' => 'Tin Tức',
        ]);

        DB::table('post_types')->insert([
            'id' => 2,
            'name' => 'Sự kiện',
        ]);
    }
}
