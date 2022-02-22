<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [
            ['url'=> 'lushpin.com',	'created_at'=>'2021-02-25 14:09:40', 'updated_at'=>'2021-02-25 14:09:40'],
            ['url'=> 'artprintshome.com', 'created_at'=>'2021-02-25 14:10:52', 'updated_at'=>'2021-02-25 14:10:52'],
            ['url'=> 'lushpinartprints.com','created_at'=>'2021-02-25 14:10:52', 'updated_at'=>'2021-02-25 14:10:52'],
            ['url' => 'fineartfarm.com','created_at' =>'2021-02-25 14:10:52', 'updated_at' => '2021-02-25 14:10:52'],
        ];

        foreach ($seeds as $seed) {
            DB::table('sites')
                ->insert($seed);
        }
    }
}
