<?php

use Illuminate\Database\Seeder;

class PenerbitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Penerbit::class, 10)->create();
    }
}
