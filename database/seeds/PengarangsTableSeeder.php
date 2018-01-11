<?php

use Illuminate\Database\Seeder;

class PengarangsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Pengarang::class, 10)->create();
    }
}
