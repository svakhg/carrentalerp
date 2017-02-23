<?php

use Illuminate\Database\Seeder;

class SeasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $path = 'database/seeds/static_data/data/seasons_seeder.sql';
        $output = shell_exec('cat '.$path);
        DB::unprepared($output);
        
        $this->command->info('Seasons table seeded!');
    }
}