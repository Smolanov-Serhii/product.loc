<?php

namespace Database\Seeders;

use App\Models\Languages;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [
            ['iso' => 'uk', 'enabled' => false],
            ['iso' => 'en', 'enabled' => true],
            ['iso' => 'ru', 'enabled' => false],
        ];

        foreach ($seeds as $seed) {
            DB::table('languages')
                ->insert($seed  );
        }
    }
}
