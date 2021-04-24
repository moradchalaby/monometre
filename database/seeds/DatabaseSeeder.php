<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('SettingsTableSeeder');
        $this->call('BlogsTableSeeder');
        $this->call('PagesTableSeeder');
        $this->call('SlidersTableSeeder');
    }
}
