<?php

use Illuminate\Database\Seeder;
use App\Models\Rate;

class RateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rate::truncate();
        factory(Rate::class, 10)->create();
    }
}
