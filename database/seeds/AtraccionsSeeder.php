<?php

use Illuminate\Database\Seeder;
use App\Atraccion;

class AtraccionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
        factory(Atraccion::class)->times(10)->create();

     }
}
