<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param=[
            'content'=>'test',
        ];
        DB::table('contents')->insert($param);

        $param=[
            'content'=>'test'
        ];
        DB::table('contents')->insert($param);
    }
}
