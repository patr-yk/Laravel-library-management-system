<?php

namespace Database\Seeders;

use App\Models\owner;
use Illuminate\Database\Seeder;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			if (owner::count() == 0) {
					owner::factory(10)->create();
			}
    }
}
