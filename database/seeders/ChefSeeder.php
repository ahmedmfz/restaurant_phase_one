<?php

namespace Database\Seeders;

use App\Models\Chef;
use Illuminate\Database\Seeder;

class ChefSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Chef::factory()->times(6)->create();
    }
}
