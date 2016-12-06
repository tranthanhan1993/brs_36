<?php

use Illuminate\Database\Seeder;
use App\Models\Mark;

class MarkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mark::truncate();
        factory(Mark::class, 10)->create();
    }
}
