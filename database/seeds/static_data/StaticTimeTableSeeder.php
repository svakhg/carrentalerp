<?php

use Illuminate\Database\Seeder;

class StaticTimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $path = 'database/seeds/static_data/data/static_times_seeder.sql';
        $output = shell_exec('cat '.$path);
        DB::unprepared($output);
        
        $this->command->info('StaticTime table seeded!');
    }
}
