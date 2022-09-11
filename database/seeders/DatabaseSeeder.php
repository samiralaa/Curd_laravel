<?php
use Database\Factories;

namespace Database\Seeders;

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
      
        \App\Models\page::factory(10)->create();
        \App\Models\post::factory(25)->create();
    }
}
