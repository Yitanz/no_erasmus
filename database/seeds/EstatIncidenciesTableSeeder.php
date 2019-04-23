<?php

use Illuminate\Database\Seeder;

class EstatIncidenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Incidencia::class)->times(10)->create();

    }
}
