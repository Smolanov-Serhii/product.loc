<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Position;
use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Seeder;
use Symfony\Component\Console\Output\ConsoleOutput;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Position::factory(5)->create();
        User::factory(5)->create();

        $this->call([
            LanguageSeeder::class,
            SitesSeeder::class
        ]);
//
//        Employee::factory()
//            ->times(1)
//            ->create();
//
//        Employee::factory()
//            ->times(100)
//            ->create()
//        ;
//
//        Employee::factory()
//            ->times(1000)
//            ->create();
//
//        Employee::factory()
//            ->times(15000)
//            ->create();
//
//        Employee::factory()
//            ->times(30000)
//            ->create();



    }
}
